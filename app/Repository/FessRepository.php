<?php
namespace App\Repository;

use App\Models\Classroom;
use App\Models\fees;
use App\Models\Grade;
use App\Models\Student;

class FessRepository implements FessRepositoryInterface
{

    public function create()
    {

        $Grades= Grade::all();
        return view('page.Fees.add' , compact('Grades'));

    }

    public function index()
    {
        $Grades= Grade::all();
        $fees = Fees::all();
        return view('page.Fees.index' , compact('Grades' , 'fees'));
    }

    public function edit($id)
    {
        $fee = Fees::findOrFail($id);
        $Grades= Grade::all();
        return view('page.Fees.edit' , compact( 'fee'  , 'Grades'));

    }

    public function store($request)
    {

        try {

            $fees = new fees();
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount  =$request->amount;
            $fees->Grade_id  =$request->Grade_id;
            $fees->Classroom_id  =$request->Classroom_id;
            $fees->description  =$request->description;
            $fees->year  =$request->year;
            $fees->Free_type = $request->Free_type;
            $fees->save();
            toastr()->success(trans('messages.success'));
            return redirect()->back();

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {
            $fees = fees::findorfail($request->id);
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount  =$request->amount;
            $fees->Grade_id  =$request->Grade_id;
            $fees->Classroom_id  =$request->Classroom_id;
            $fees->description  =$request->description;
            $fees->year  =$request->year;
            $fees->Free_type = $request->Free_type;
            $fees->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            fees::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
}
