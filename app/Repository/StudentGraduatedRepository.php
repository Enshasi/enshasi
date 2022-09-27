<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Student;

class StudentGraduatedRepository implements StudentGraduatedRepositoryInterface
{


    public function index()
    {
        $students = Student::onlyTrashed()->get();
        return view('page.Students.Graduated.index' , compact('students'));
    }

    public function create()
    {
        $Grades = Grade::all();
        return view('page.Students.Graduated.create' , compact('Grades'));
    }

    public function softDelete($request)
    {
        $students = student::where('Grade_id',$request->Grade_id)->where('Classroom_id',$request->Classroom_id)->where('section_id',$request->section_id)->get();
        if($students->count() < 0) {
            return redirect()->back()->with('error_Graduated' , __('لا توجد بيانات في جدول الطلاب'));
        }
        foreach ($students as $student) {
            $ids = explode(',',$student->id); // [1,2,3,4,...]
            student::whereIn('id',$ids)->Delete();  /// array => wherein

        }
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();

    }
    public function returnDate($request){
        student::onlyTrashed()->where('id',$request->id)->first()->restore();
        toastr()->error(trans('messages.success'));
        return redirect()->back();
    }
    public function destroy($request){
        student::onlyTrashed()->where('id',$request->id)->first()->forceDelete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();

    }
}
