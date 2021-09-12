<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todo = ToDo::all();
        return view('todo.index')->with('todo', $todo);
    }
}
