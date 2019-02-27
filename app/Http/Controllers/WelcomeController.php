<?php

namespace App\Http\Controllers;

use App\image;
use App\Settings;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        return view("welcome")
            ->with("images",image::all())
            ->with("image",Settings::first()->path);
    }


    public function getImages(Request $request)
    {
        if(!$request->ajax()){
            return redirect()->route('welcome');
        }else{


        $randomImages = image::inRandomOrder()->take(5)->get();

        $newImages = image::where('path', 'LIKE', 'new' . '%')->get();

        if ($newImages->count() > 0) {

            foreach ($newImages as $img) {

                $newPath = substr($img->path, 3);
                $img->path = $newPath;
                $img->update();

                $randomImages->push($img);
            }
        }

        return $randomImages;
    }
    }
}
