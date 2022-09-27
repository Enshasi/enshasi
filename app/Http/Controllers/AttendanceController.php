<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Repository\AttendanceRepositoryInterface;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    protected  $Attendance;
    public function __construct(AttendanceRepositoryInterface  $Attendance){
        $this->Attendance = $Attendance ;
    }
    public function index()
    {
        return $this->Attendance->index();
    }


    public function create($id)
    {

    }


    public function store(Request $request)
    {
        return $this->Attendance->store($request);

    }


    public function show(Request $request,$id)
    {
        return $this->Attendance->show($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
