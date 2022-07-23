<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->status = new Status();
    }

    /**
     * 登録画面
     */
    public function create(Request $request)
    {
        $statuses = $this->status->get();
        return view('todo.create', compact('statuses'));
    }
}
