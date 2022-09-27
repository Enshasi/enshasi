<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Response;
use App\Http\Requests\storeGrades;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;
use SebastianBergmann\Type\Exception;

class GradeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $grades = Grade::all() ;
     return view('page.grades.Grades' , compact('grades'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  public function store(storeGrades $request)
  {

      try {

          $validated = $request->validated();
          $grade = new Grade() ;

          $grade->name = ['en' => $request->Name_en , 'ar' => $request->Name];
          $grade->Notes = $request->Notes ;

          $grade->save();
          toastr()->success(trans('messages.success'));
          return redirect()->back() ;
      }
      catch (\Exception $e){
            return redirect()->back()->withErrors(['error' =>$e->getMessage()]) ;
      }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(storeGrades $request){

    try {
         $validated = $request->validated();
//        $grades = Grade::where('id' , $request->id)->first(); //Or
        $grades = Grade::findOrFail($request->id); // name  === id
        $grades->update([
            $grades->name =  ['ar' => $request->Name, 'en' =>$request->Name_en],
            $grades->notes  = $request->Notes ,
        ]);
        toastr()->success(trans('messages.Update'));
        return  redirect()->back();


    }
      catch (\Exception $e){
            return redirect()->back()->withErrors(['error' =>$e->getMessage()]) ;
    }

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
      $MyClass_id = Classroom::where('Grade_id' , $request->id)->pluck('Grade_id') ;

      if($MyClass_id->count() == 0 )
      {


          $grades = Grade::where('id' , $request->id)->first();
          $grades->delete();
          toastr()->error(trans('messages.Delete'));

          return  redirect()->back();
      }
      else {
          toastr()->error(trans('grades_trans.delete_Grade_Error'));
          return  redirect()->back();

      }
  }



}

?>


<!--
try {
$grades = Grade::where('id' , $request->id)->first();
$grades->delete();
toastr()->success(trans('messages.Delete'));

return  redirect()->back();
}
catch (\Exception $e){
return redirect()->back()->withErrors(['error' =>$e->getMessage()]) ;
}
-->
