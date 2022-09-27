<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeStudentRequest;
use App\Repository\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    protected $Student;

    public function __construct(StudentRepositoryInterface $Student)
    {
         $this->Student = $Student;
    }

    public function index()
    {
            return $this->Student->Get_Student();
    }

    public function create()
    {
        return $this->Student->Create_Student() ;
    }


    public function store(Request $request)
    {
       return $this->Student->Store_Student($request);
    }

    public function show($id)
    {
       return $this->Student->Show_student($id);
    }


    public function edit($id)
    {
        return $this->Student->Edit_Student($id);

    }


    public function update(storeStudentRequest $request)
    {
        return $this->Student->Update_Student($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Student->Delete_Student($request);
    }

    public function Get_classrooms($id){
            return $this->Student->Get_classrooms($id);
    }
    public function Get_Sections($id){
        return $this->Student->Get_Sections($id);
    }
    public function Upload_attachment(Request  $request){
        return $this->Student->Upload_attachment($request);

    }
    public function Download_attachment($studentname,$filename){
        return $this->Student->Download_attachment($studentname , $filename);
    }
    public function Delete_attachment(Request $request){
        return $this->Student->Delete_attachment($request);
    }
}
