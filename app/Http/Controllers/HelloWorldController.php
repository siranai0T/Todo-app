<?php

namespace App\Http\Controllers;

class HelloWorldController extends Controller
{
    public function index()
    {
        $name = "田中";
        return view('hello-world', compact('name'));
    }

}
