<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Repository\StudentGraduatedRepositoryInterface;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{
    protected  $Graduated ;
    public function __construct(StudentGraduatedRepositoryInterface $Graduated){
        $this->Graduated = $Graduated ;
    }
    public function index(Request $request)
    {
        return $this->Graduated->index();
    }


    public function create()
    {

        return $this->Graduated->create();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->Graduated->softDelete($request);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request)
    {
        return $this->Graduated->returnDate($request);
    }


    public function destroy(Request $request)
    {
        return $this->Graduated->destroy($request);
    }
}
