<?php

namespace App\Http\Controllers;

use App\Models\HelloWorld;
use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function index()
    {
        $post = HelloWorld::select('name')->orderBy('id', 'desc')->first();
        return view('hello-world', ['name' => $post?->name]);
    }

    public function store(Request $request)
    {
        $post       = new HelloWorld();
        $post->name = $request->name;
        $post->save();
        return redirect('/hello');
    }
}
