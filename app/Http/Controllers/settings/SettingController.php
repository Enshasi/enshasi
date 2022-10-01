<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $collection =  Setting::all();
        $setting['setting'] = $collection->flatMap(function($collection)  {
            return [ $collection->key => $collection->value];
        }) ;
        return view('page.setting.index' , $setting) ;
    }
    public function update(Request $request){
    try {
        $info = $request->except('_token' , 'logo');
        foreach($info as $key => $value){
            Setting::where('key' , $key)->update(['value'=>$value]);
            if($request->hasFile('logo')){
                $logo_name = $request->file('logo')->getClientOriginalName();
                Setting::where('key' , 'logo')->update(['value'=>$logo_name]);
                $new_name = rand().time().$request->file('logo')->getClientOriginalName();
                $request->file('logo')->move(public_path('attachments/logo/') ,$new_name );

            }
        }
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
}
