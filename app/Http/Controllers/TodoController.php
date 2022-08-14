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
    // public function index()
    // {
    //     $todos = Todo::all();
    //     $todos = Todo::sortable()->paginate(5);
    //     return view('todo.index',compact('todos'));
    // }

    public function index(Request $request)
    {
        $query = Todo::query();

        //$request->input()で検索した項目を取得
        $statusId = $request->input('status');
        // $searchWord = $request->input('searchWord');

         // プルダウンメニューで指定なし以外を選択した場合、$query->whereで選択した好きな戦法と一致するカラムを取得します
        if ($statusId!=null) {
            $query->where('status', $statusId)->get();
        }

        // タイトル入力フォームで入力した文字列を含むカラムを取得します
        // if($searchWord!=null) {
        //     $query->where('title', 'LIKE', "%{$searchWord}%")
        //         ->orWhere('content', 'LIKE', "%{$searchWord}%")->get();
        // }

        $data = $query->sortable()->paginate(5);

        return view('todo.index',[
            //  'searchWord' => $searchWord,
             'data' => $data
        ]);
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
        $request->validate([
            'title' => 'required|max:20',
            'content' => 'max:50',
         ],
        );

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
        $request->validate([
            'title' => 'required|max:20',
            'content' => 'max:50',
         ],
       );

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
