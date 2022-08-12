<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        $todos = Todo::sortable()->paginate(5);
        return view('todo.index',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $todo  =  new Todo();
            $todo->title  =  $request->title;
            $todo->content  =  $request->content;
            $todo->deadline  =  $request->deadline;
            $todo->status  =  $request->status;
            $todo->save();
            DB::commit();
            return redirect()->route('todos.index');
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        return view('todo.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todo.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $todo = Todo::find($id);
            $todo->title  = $request->title;
            $todo->content = $request->content;
            $todo->deadline  =  $request->deadline;
            $todo->status  =  $request->status;
            $todo->save();
            DB::commit();
            return redirect()->route('todos.index');
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            Todo::destroy($id);
            DB::commit();
            return redirect()->route('todos.index');
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return back()->withInput();
    }
}
