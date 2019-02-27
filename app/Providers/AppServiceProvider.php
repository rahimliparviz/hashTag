<?php

namespace App\Providers;

use App\image;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

//        $imagesForShow = [];

//        $randomImages = image::inRandomOrder()->take(5)->get();
//
//
//
//        //dd($randomImages);
//        $newImages = image::where('path','LIKE','new'.'%')->get();
//
//        if ($newImages->count() > 0){
//
//
//            foreach ($newImages as $img){
//
//                $newPath = substr($img->path,3);
//                $img->path = $newPath;
//                $img->update();
//
//                $randomImages->push($img);
//            }
//        }
//
//
//        dd($randomImages);
//        dd(image::all());


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
