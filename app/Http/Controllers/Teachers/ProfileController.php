<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class ProfileController extends Controller
{
    public function index(){
        $information = Teacher::findOrFail(Auth()->user()->id) ;
        return view('page.Teachers.profile.index' , compact('information'));
    }
    public function update(Request $request  , $id ){
        $information = Teacher::findOrFail($id) ;
        if(!empty($information->password)){
            $information->Name = ['en' => $request->Name_en , 'ar' => $request->Name_ar];
            $information->password = Hash::make($request->password) ;
            $information->save();
        }else{
            $information->name = ['en' => $request->Name_en , 'ar' => $request->Name_ar];
            $information->save();

        }
        toastr()->success(trans('messages.Update'));
        return redirect()->back();

    }
}
