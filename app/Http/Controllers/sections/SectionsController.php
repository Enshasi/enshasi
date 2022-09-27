<?php

namespace App\Http\Controllers\sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSections;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Sections;
use App\Models\Teacher;
use Illuminate\Http\Request;
use function Symfony\Component\Mime\attach;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Grades = Grade::with(['Sections'])->get();

        $list_Grades = Grade::all();
        $teachers = Teacher::all();

        return view('page.Sections.Sections',compact('Grades','list_Grades' , 'teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSections $request)
    {
        try {

            $validated = $request->validated();
            $Sections = new Sections();
            $Sections->Name_Section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
            $Sections->Grade_id = $request->Grade_id;
            $Sections->Class_id = $request->Class_id;
            $Sections->Status = 1;



            $Sections->save();
            $Sections->teachers()->attach($request->teacher_id) ;
            toastr()->success(trans('messages.success'));

            return redirect()->back();
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(Sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(Sections $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSections $request)
    {
        try {
            $validated = $request->validated();

            $Sections = Sections::findOrFail($request->id) ;


            $Sections->Name_Section = ['ar' => $request->Name_Section_Ar , 'en' => $request->Name_Section_En];
            $Sections->Grade_id = $request->Grade_id ;
            $Sections->Class_id = $request->Class_id ;

            if(isset($request->Status)){
                $Sections->Status = 1;
            }else{
                $Sections->Status = 2;

            }

            if(isset($request->teacher_id)){
                $Sections->teachers()->sync($request->teacher_id);

            }else{
                $Sections->teachers()->sync(array());

            }
            $Sections->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->back() ;

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' =>$e->getMessage()]) ;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Sections::findOrFail($request->id)->Delete();
        toastr()->success(trans('messages.Delete'));
        return redirect()->back() ;

    }
    public function getclasses($id) {
        $list_classes = Classroom::where('Grade_id' , $id)->pluck('Name_Class' , 'id');
        return $list_classes ;
    }
}
