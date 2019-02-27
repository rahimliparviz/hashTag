<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
   public function settings(){
       return view('admin.settings')
           ->with('settings',Settings::first());
   }


   public function store(Request $request){

       $this->validate($request,[
           'script'=>'required',

       ]);



       $settings = Settings::first();


       if($request->hasFile('image')){



           $img_path = public_path().'/'.$settings->path;


           if (file_exists($img_path)){unlink($img_path);}


           $image=$request->image;
           $image_new_name=time().$image->getClientOriginalName();
           $image->move('images/',$image_new_name);


           $settings->path = 'images/'.$image_new_name;


       }


       $settings->script = $request->script;
       $settings->update();

       return redirect()->back();

   }
}
