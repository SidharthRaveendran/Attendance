<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\User;
use App\Attendance;
use App\Department;

class AttendanceResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Users = User::all();
        $Departments = Department::all();
        return view('staff.attendance.create', compact('Users', 'Departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required|date',
        ]);

        $Attendance = [];

        $Users = $request->except('_token', 'date', 'department_id', 'batch', 'datatable_length');

        foreach ($Users as $ID => $Status) {
            $Attendance[] = [
                'user_id' => $ID,
                'department_id' => $request->department_id,
                'date' => Carbon::parse($request->date),
                'attendance' => $Status,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        Attendance::insert($Attendance);

        return redirect()->route('staff.attendance.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
