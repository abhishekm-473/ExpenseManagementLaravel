<?php

namespace App\Http\Controllers;

class AboutController extends Controller{
    public function aboutIndex(){
        return view('about');
    }
}