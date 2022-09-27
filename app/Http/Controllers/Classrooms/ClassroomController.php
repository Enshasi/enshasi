<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Response;
use App\Http\Requests\StoreClassroom;
use App\Http\Requests\storeGrades;
use App\Models\Classroom;
use App\Models\Grade;

use Illuminate\Http\Request;
use SebastianBergmann\Type\Exception;

class ClassroomController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $Grades = Grade::all();
      $My_Classes = Classroom::all() ;

         return view('page.My_Classes.My_Classes' , compact('My_Classes' , 'Grades' ));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreClassroom $request)
  {



      $List_Classes = $request->List_Classes ;

      try {
          $validated = $request->validated();

          foreach ($List_Classes as $List_Class) {
              $My_Classes = new Classroom();
              $My_Classes->Name_Class = ['en' => $List_Class['Name_class_en'] , 'ar' => $List_Class['Name']];
              $My_Classes->Grade_id = $List_Class['Grade_id'] ;
              $My_Classes->save();

          }
          toastr()->success(trans('messages.success'));

          return redirect()->back() ;


      }catch (\Exception $e){
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
  public function update(Request $request)
  {

      try {

          $Classroom = Classroom::findOrFail($request->id) ;
          $Classroom->update([
              $Classroom->Name_Class =  ['ar' => $request->Name  , 'en'=>$request->Name_en],
              $Classroom->Grade_id = $request->Grade_id ,
          ]);

          toastr()->success(trans('messages.Update'));
          return redirect()->back() ;


      }catch (\Exception $e){
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
      $Classroom = Classroom::findOrFail($request->id)->delete();
      toastr()->error(trans('messages.Delete'));
      return redirect()->back() ;


  }
  public  function deleteAll(Request $request){

    $delete_all_id = explode("," ,$request->delete_all_id) ;

   // dd($delete_all_id) ;

      Classroom::whereIn('id' , $delete_all_id)->Delete();
      toastr()->error(trans('messages.Delete'));
      return redirect()->back() ;

  }
    public function Filter_Classes(Request $request)
    {
        $Grades = Grade::all();
        $Search = Classroom::select('*')->where('Grade_id','=',$request->Grade_id)->get();
        return view('page.My_Classes.My_Classes' , compact('Grades'))->withDetails($Search);

    }
}

?>
