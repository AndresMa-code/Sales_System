<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Attendence;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $row = (int) request('row', 10);
        $search = request('search');

        if ($row < 1 || $row > 100) {
            abort(400, 'The per-page parameter must be an integer between 1 and 100.');
        }

        $query = Attendence::sortable()
            ->select('date')
            ->groupBy('date')
            ->orderBy('date', 'desc');

        if (!empty($search)) {
            $query->where('date', 'LIKE', "%{$search}%");
        }

        return view('attendence.index', [
            'attendences' => $query->paginate($row)->appends(request()->query()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('attendence.create', [
            'employees' => Employee::all()->sortBy('name'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $countEmployee = count($request->employee_id);

        $rules = [
            'date' => 'required|date_format:Y-m-d|max:10',
        ];

        $validatedData = $request->validate($rules);

        // Delete if the date already exists (this is used to update the attendance)
        Attendence::where('date', $validatedData['date'])->delete();

        for ($i = 1; $i <= $countEmployee; $i++) {
            $status = 'status' . $i;
            $attend = new Attendence();

            $attend->date = $validatedData['date'];
            $attend->employee_id = $request->employee_id[$i];
            $attend->status = $request->$status;

            $attend->save();
        }

        return Redirect::route('attendence.index')->with('success', '¡Se ha creado la asistencia!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendence $attendence)
    {
        return view('attendence.edit', [
            'attendences' => Attendence::with(['employee'])->where('date', $attendence->date)->get(),
            'date' => $attendence->date
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendence $attendence)
    {
        // Add logic for updating attendance here
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($date)
    {
        // Delete attendance by date
        $attendence = Attendence::where('date', $date)->first();

        if ($attendence) {
            Attendence::where('date', $date)->delete(); // Ensure all entries of that date are removed
            return Redirect::route('attendence.index')->with('success', '¡La asistencia ha sido eliminada!');
        }

        return Redirect::route('attendence.index')->with('error', 'Attendance not found!');
    }
}
