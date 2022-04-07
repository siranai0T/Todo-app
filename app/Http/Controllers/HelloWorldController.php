<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HelloWorld;

class HelloWorldController extends Controller
{
    public function index()
    {

        // $name = "田中";
        //return view('hello-world', compact('name'));

        $post = HelloWorld::select('name')->orderBy('id', 'desc')
            ->first();
        if (is_null($post)) {
            return view('hello-world', ['name' => '']);
        }
        return view('hello-world', ['name' => $post->name]);
    }

    public function store(Request $request)
    {
        // $name = $request->input('name');
        // return view('hello-world', compact('name'));
        $post = new HelloWorld();
        $post->name = $request->name;
        $post->save();
        return redirect('/hello');
    }
}
