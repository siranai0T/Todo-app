<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HellowWorldController extends Controller
{
    public function index()
    {
        $name = "田中";
        return view('hellow-world', compact('name'));
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        return view('hellow-world', compact('name'));
    }
}
