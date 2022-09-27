<?php

namespace App\Http\Controllers\Teachers;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeachers;
use App\Models\Gender;
use App\Models\specializations;
use App\Repository\TeacherRepositoryInterface ;
use Illuminate\Http\Request;
class TeachersController extends Controller
{
    protected $Teacher;

    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Teachers = $this->Teacher->getAllTeachers();
        return view('page.Teachers.Teachers', compact('Teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
   {
       $specializations  =  $this->Teacher->Getspecialization();
       $genders = $this->Teacher->Getgender();
       return view('page.Teachers.create' , compact('specializations' ,'genders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeachers $request)
    {
        return $this->Teacher->StoreTeachers($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Teachers = $this->Teacher->EditTeachers($id);
        $specializations = $this->Teacher->Getspecialization();
        $genders = $this->Teacher->Getgender();
        return view('page.Teachers.edit' , compact('Teachers' , 'genders' , 'specializations'));
    }


    public function update(Request $request)
    {
        return $this->Teacher->UpdateTeachers($request);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       return $this->Teacher->DeleteTeachers($request);
    }
}
