<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function contact(){
        // $var = "Contact Page";
        // return view('contact' , compact('var') );
        return view('contact' , [
            'var' => "Contact Page",
        ]);
    }

    function about(){
        // $var = "Contact Page";
        // return view('contact' , compact('var') );
        return view('about' , [
            'var' => "about page",
        ]);
    }
}
