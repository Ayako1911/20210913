<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToDo\StoreRequest;
use App\Models\ToDo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index()
    {
        //$items = DB::table('to_dos')->get();
        $items = ToDo::all();
        return view('index',['items' => $items]);
    }
    //public function add()
    //{
    //    return view('/todo/create');
    //}
    public function create(StoreRequest $request)
    {
        //$item = new ToDo();
        //$item->content = $request->content;
        //$item->save();
        
        //$param = [
        //    'content' => $request->content
        //];
        //DB::table('to_dos')->insert($param);
        //return redirect('/');

        $item = new ToDo;
        $item->content = $request->content;
        $item->save();
        return redirect('/');
    }
    public function delete(Request $request)
    {
        //↓で書くとエラー画面は表示されませんが、削除機能が動きません。教材のクリエビルダのデータ削除のコードを参考に書きました。
        //$param = ['id' => $request->id];
        //DB::table('to_dos')->where('id', //$request->id)->delete();

        //↓で書くと「Call to a member function delete() on null」というエラーメッセージが表示されます。
        $item = ToDo::find($request->id)->delete();
        return redirect('/');
    }
}
