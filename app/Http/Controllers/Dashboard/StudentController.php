<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PaymentController;
use App\Models\Attendance;
use App\Models\Sections;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class StudentController extends Controller
{

    public function index()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', Auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();

        return view('page.Teachers.students.index', compact('ids', 'students'));

    }

    public function Section()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $sections = Sections::whereIn('id', $ids)->get();
        return view('page.Teachers.sections.index', compact('ids', 'sections'));
    }
    public function attendance(Request $request)
    {

        try {

            $attenddate = date('Y-m-d');
            foreach ($request->attendences as $studentid => $attendence) {

                if ($attendence == 'presence') {
                    $attendence_status = true;
                } else if ($attendence == 'absent') {
                    $attendence_status = false;
                }

                Attendance::updateorCreate(
                    [
                        'student_id'=> $studentid ,
                        'attendence_date' => $attenddate
                    ],[
                    'student_id' => $studentid,
                    'grade_id' => $request->grade_id,
                    'classroom_id' => $request->classroom_id,
                    'section_id' => $request->section_id,
                    'teacher_id' => 1,
                    'attendence_date' => $attenddate,
                    'attendence_status' => $attendence_status
                ]);
            }
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


//
//    public function editAttendance(Request $request)
//    {
//
//        try {
//            $date = date('Y-m-d');
//            $student_id = Attendance::where('attendence_date', $date)->where('student_id', $request->id)->first();
//            if ($request->attendences == 'presence') {
//                $attendence_status = true;
//            } else if ($request->attendences == 'absent') {
//                $attendence_status = false;
//            }
//            $student_id->update([
//                'attendence_status' => $attendence_status
//            ]);
//            toastr()->success(trans('messages.success'));
//            return redirect()->back();
//        } catch (\Exception $e) {
//            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
//        }
//
//    }
    public function  attendanceReport(){

        $ids = DB::table('teacher_section')->where('teacher_id', Auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        return view('page.Teachers.students.attendance_Report', compact('ids', 'students'));

    }
    public function  attendancesearch(Request $request){

//       $request->validate([
//            'from'  =>'required|date|date_format:Y-m-d',
//            'to'=> 'required|date|date_format:Y-m-d|after_or_equal:from'
//        ],[
//            'to.after_or_equal' => 'تاريخ النهاية لابد ان اكبر من تاريخ البداية او يساويه',
//            'from.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
//            'to.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
//        ]);


        $ids = DB::table('teacher_section')->where('teacher_id', Auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();

        if ($request->student_id  == 0)  //all
       {
           $Students = Attendance::whereBetween('attendence_date' , [$request->from , $request->to])->get();

           return view('page.Teachers.students.attendance_Report', compact('Students' , 'students'));

       }else{
           $Students = Attendance::whereBetween('attendence_date' , [$request->from , $request->to])->where('student_id' , $request->student_id)->get();

           return view('page.Teachers.students.attendance_Report', compact('Students' , 'students'));


       }
    }

}
