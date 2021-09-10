<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{

    public function index(Request $request)
    {
        $items = Board::with('person')->get();
        return view('board.index', ['items' => $items]);
    }

    public function add(Request $request)
    {
        return view('board.add');
    }

    public function create(Request $request)
    {
        //バリデーション
        $this->validate($request, Board::$rules);
        //インスタンス化
        $board = new Board;
        // すべて取得して$formに格納
        $form = $request->all();
        // トークンについてはformから除外
        unset($form['_token']);
        // fillメソッドでform内容をまとめてsaveで登録する
        $board->fill($form)->save();
        return redirect('/board');
    }

}

