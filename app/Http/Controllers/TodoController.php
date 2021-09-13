<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToDo\StoreRequest;
use App\Http\Requests\ToDo\UpdateRequest;
use App\Models\ToDo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index()
    {
        $items = ToDo::all();
        return view('index',['items' => $items]);
    }
    public function create(StoreRequest $request)
    {
        $item = new ToDo;
        $item->content = $request->content;
        $item->save();
        return redirect('/');
    }
    public function update(UpdateRequest $request)
    {
        $item = ToDo::find($request->id);
        $item->content = $request->get('content');
        $item->save();
        return redirect('/');
    }
    public function delete(Request $request)
    {
        $item = ToDo::find($request->id)->delete();
        return redirect('/');
    }
}
