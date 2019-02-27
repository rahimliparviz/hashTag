<?php

namespace App\Http\Controllers;

use App\Http\Middleware\isAdmin;
use App\image;
use App\Settings;
use Illuminate\Http\Request;

class ImagesController extends Controller
{

    public  function __construct()
    {
        $this->middleware('admin');
    }


    public function index(Request $request)
    {


        if(!$request->ajax()){
            return redirect()->route('welcome');
        }else {


            $image = new image();

            $image->path = "new" . $request->path;

            $image->save();
            return $request->path;

        }
    }


    public function allImages(){
        return view('admin.delete')->with('images',image::all());
    }


    public function deleteImage(Request $request){

        $img = image::find($request->id);

        $img->delete();

        return redirect()->back();

    }
}
