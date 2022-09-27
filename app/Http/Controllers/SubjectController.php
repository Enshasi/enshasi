<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use App\Repository\SubjectRepositoryInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    protected  $Subject;
    public function __construct(SubjectRepositoryInterface  $Subject){
        $this->Subject = $Subject ;
    }
    public function index()
    {
      return $this->Subject->index();
    }


    public function create()
    {
        return $this->Subject->create();

    }


    public function store(Request $request)
    {
        return $this->Subject->store($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject ,$id)
    {
        return $this->Subject->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        return $this->Subject->update($request);

    }


    public function destroy(Request $request)
    {
        return $this->Subject->destroy($request);
    }
}
