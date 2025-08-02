<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\SupplierController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PaySalaryController;
use App\Http\Controllers\Dashboard\AttendenceController;
use App\Http\Controllers\Dashboard\AdvanceSalaryController;
use App\Http\Controllers\Dashboard\DatabaseBackupController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\PosController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\CategoryRestController;

/*
|--------------------------------------------------------------------------
API Routes
|--------------------------------------------------------------------------

Here is where you can register API routes for your application. These
routes are loaded by the RouteServiceProvider within a group which
is assigned the "api" middleware group. Enjoy building your API!

*/

// Categories
Route::get('/categories', [CategoryRestController::class, 'index']);
Route::post('/categories', [CategoryRestController::class, 'store']);
Route::put('/categories/{category}', [CategoryRestController::class, 'update']);
Route::delete('/categories/{category}', [CategoryRestController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Define your API routes here.
|
| All routes are loaded by the RouteServiceProvider and are grouped
| under the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes requiring API authentication
Route::middleware('auth:sanctum')->group(function () {

    // DEFAULT DASHBOARD & PROFILE
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');

    // Users
    Route::middleware(['permission:user.menu'])->group(function () {
        Route::resource('/users', UserController::class)->except(['show']);
    });

    // Customers
    Route::middleware(['permission:customer.menu'])->group(function () {
        Route::resource('/customers', CustomerController::class);
    });

    // Suppliers
    Route::middleware(['permission:supplier.menu'])->group(function () {
        Route::resource('/suppliers', SupplierController::class);
    });

    // Employees
    Route::middleware(['permission:employee.menu'])->group(function () {
        Route::resource('/employees', EmployeeController::class);
    });

    // Employee Attendance
    Route::middleware(['permission:attendence.menu'])->group(function () {
        Route::resource('/employee/attendence', AttendenceController::class)->except(['show', 'update', 'destroy']);
    });

    // Pay Salary
    Route::middleware(['permission:salary.menu'])->group(function () {
        Route::resource('/pay-salary', PaySalaryController::class)->except(['show', 'create', 'edit', 'update']);
        Route::get('/pay-salary/history', [PaySalaryController::class, 'payHistory'])->name('pay-salary.history');
        Route::get('/pay-salary/history/{id}', [PaySalaryController::class, 'payHistoryDetail'])->name('pay-salary.historyDetail');
        Route::get('/pay-salary/{id}', [PaySalaryController::class, 'paySalary'])->name('pay-salary.details');
        Route::resource('/advance-salary', AdvanceSalaryController::class)->except(['show']);
    });

    // Products
    Route::middleware(['permission:product.menu'])->group(function () {
        Route::get('/products/import', [ProductController::class, 'importView'])->name('products.importView');
        Route::post('/products/import', [ProductController::class, 'importStore'])->name('products.importStore');
        Route::get('/products/export', [ProductController::class, 'exportData'])->name('products.exportData');
        Route::resource('/products', ProductController::class);
    });

    // Category Products
    Route::middleware(['permission:category.menu'])->group(function () {
        Route::resource('/categories', CategoryController::class);
    });

    // POS
    Route::middleware(['permission:pos.menu'])->group(function () {
        Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
        Route::post('/pos/add', [PosController::class, 'addCart'])->name('pos.addCart');
        Route::post('/pos/update/{rowId}', [PosController::class, 'updateCart'])->name('pos.updateCart');
        Route::get('/pos/delete/{rowId}', [PosController::class, 'deleteCart'])->name('pos.deleteCart');
        Route::post('/pos/invoice/create', [PosController::class, 'createInvoice'])->name('pos.createInvoice');
        Route::post('/pos/invoice/print', [PosController::class, 'printInvoice'])->name('pos.printInvoice');
        Route::post('/pos/order', [OrderController::class, 'storeOrder'])->name('pos.storeOrder');
    });

    // Orders
    Route::middleware(['permission:orders.menu'])->group(function () {
        Route::get('/orders/pending', [OrderController::class, 'pendingOrders'])->name('order.pendingOrders');
        Route::get('/orders/complete', [OrderController::class, 'completeOrders'])->name('order.completeOrders');
        Route::get('/orders/details/{order_id}', [OrderController::class, 'orderDetails'])->name('order.details');
        Route::put('/orders/update/status', [OrderController::class, 'updateStatus'])->name('order.updateStatus');
        Route::get('/orders/invoice/download/{order_id}', [OrderController::class, 'invoiceDownload'])->name('order.invoiceDownload');
        Route::get('/pending/due', [OrderController::class, 'pendingDue'])->name('order.pendingDue');
        Route::get('/order/due/{id}', [OrderController::class, 'orderDueAjax'])->name('order.orderDueAjax');
        Route::post('/update/due', [OrderController::class, 'updateDue'])->name('order.updateDue');
        Route::get('/stock', [OrderController::class, 'stockManage'])->name('order.stockManage');
    });

    // Database Backup
    Route::middleware(['permission:database.menu'])->group(function () {
        Route::get('/database/backup', [DatabaseBackupController::class, 'index'])->name('backup.index');
        Route::get('/database/backup/now', [DatabaseBackupController::class, 'create'])->name('backup.create');
        Route::get('/database/backup/download/{getFileName}', [DatabaseBackupController::class, 'download'])->name('backup.download');
        Route::get('/database/backup/delete/{getFileName}', [DatabaseBackupController::class, 'delete'])->name('backup.delete');
    });

    // Roles and Permissions
    Route::middleware(['permission:roles.menu'])->group(function () {
        Route::get('/permission', [RoleController::class, 'permissionIndex'])->name('permission.index');
        Route::get('/permission/create', [RoleController::class, 'permissionCreate'])->name('permission.create');
        Route::post('/permission', [RoleController::class, 'permissionStore'])->name('permission.store');
        Route::get('/permission/edit/{id}', [RoleController::class, 'permissionEdit'])->name('permission.edit');
        Route::put('/permission/{id}', [RoleController::class, 'permissionUpdate'])->name('permission.update');
        Route::delete('/permission/{id}', [RoleController::class, 'permissionDestroy'])->name('permission.destroy');
        Route::resource('/roles', RoleController::class)->except(['show']);
    });

});

require __DIR__.'/auth.php';
