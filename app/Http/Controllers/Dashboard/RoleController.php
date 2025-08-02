<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Exceptions\RoleAlreadyExists;

class RoleController extends Controller
{

    // Role Controller
    // Removed duplicate roleIndex method
    
    public function index()
    {
        // Fetch roles or whatever data you want to display
        $roles = Role::all();
    
        return view('roles.role-index', compact('roles'));
    }

    // Permission Controller
    public function permissionIndex()
    {
        $permissions = QueryBuilder::for(Permission::class)->paginate();

        return view('roles.permission-index', [
            'permissions' => $permissions,
        ]);
    }

    public function permissionCreate()
    {
        return view('roles.permission-create');
    }

    public function permissionStore(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'group_name' => 'required|string',
        ];

        $validatedData = $request->validate($rules);

        Permission::create($validatedData);

        return Redirect::route('permission.index')->with('success', '¡Se ha creado el permiso!');
    }

    public function permissionEdit(Int $id)
    {
        $permission = Permission::findById($id);

        return view('roles.permission-edit', [
            'permission' => $permission,
        ]);
    }

    public function permissionUpdate(Request $request, Int $id)
    {
        $rules = [
            'name' => 'required|string',
            'group_name' => 'required|string',
        ];

        $validatedData = $request->validate($rules);

        Permission::findOrFail($id)->update($validatedData);

        return Redirect::route('permission.index')->with('success', '¡El permiso ha sido actualizado!');
    }

    public function permissionDestroy(Int $id)
    {
        Permission::destroy($id);

        return Redirect::route('permission.index')->with('success', '¡El permiso ha sido eliminado!');
    }

    // Role Controller
    public function roleIndex()
    {
        $roles = QueryBuilder::for(Role::class)->paginate();

        return view('roles.role-index', [
            'roles' => $roles,
        ]);
    }

    public function roleCreate()
    {
        return view('roles.role-create');
    }

    public function roleStore(Request $request)
    {
        $rules = [
            'name' => 'required|string',
        ];
    
        $validatedData = $request->validate($rules);
    
        try {
            Role::create(['name' => $validatedData['name']]);
        } catch (RoleAlreadyExists $e) {
            return Redirect::route('roles.index')->with('error', 'Role already exists!');
        }
    
        return Redirect::route('roles.index')->with('success', '¡El rol ha sido creado!');
    }

    public function roleEdit(Int $id)
    {
        $role = Role::findById($id);

        return view('roles.role-edit', [
            'role' => $role,
        ]);
    }

    public function roleUpdate(Request $request, Int $id)
    {
        $rules = [
            'name' => 'required|string',
        ];

        $validatedData = $request->validate($rules);

        Role::findOrFail($id)->update($validatedData);

        return Redirect::route('roles.index')->with('success', '¡El rol ha sido actualizado!');
    }

    public function roleDestroy(Int $id)
    {
        Role::destroy($id);

        return Redirect::route('roles.index')->with('success', '¡El rol ha sido eliminado!');
    }

    public function rolePermissionIndex()
    {
        $roles = QueryBuilder::for(Role::class)->paginate();

        return view('roles.role-permission-index', [
            'roles' => $roles,
        ]);
    }


    // Role has Permissions
    public function rolePermissionCreate()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();

        return view('roles.role-permission-create', [
            'roles' => $roles,
            'permissions' => $permissions,
            'permission_groups' => $permission_groups
        ]);
    }

    public function rolePermissionStore(Request $request)
    {
        $permissions = $request->permission_id;

        foreach ($permissions as $permission) {
            $exists = DB::table('role_has_permissions')
                ->where('role_id', $request->role_id)
                ->where('permission_id', $permission)
                ->exists();

            if (!$exists) {
                DB::table('role_has_permissions')->insert([
                    'role_id' => $request->role_id,
                    'permission_id' => $permission,
                ]);
            }
        }

        $role = Role::find($request->role_id);
        $role->givePermissionTo($permissions);

        return Redirect::route('rolePermission.index')->with('success', '¡Se ha creado el permiso de rol!');
    }

    public function rolePermissionEdit(Int $id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();

        return view('roles.role-permission-edit', [
            'role' => $role,
            'permissions' => $permissions,
            'permission_groups' => $permission_groups
        ]);
    }

    public function rolePermissionUpdate(Request $request, Int $id)
    {
        $role = Role::findOrFail($id);
        $permissions = $request->permission_id;

        if(!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        return Redirect::route('rolePermission.index')->with('success', '¡Se ha actualizado el permiso de rol!');
    }

    public function rolePermissionDestroy(Int $id)
    {
        $role = Role::findOrFail($id);

        if(!is_null($role)) {
            $role->delete();
        }

        return Redirect::route('rolePermission.index')->with('success', '¡El permiso del rol ha sido eliminado!');
    }
}
