<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller{
    
    // public function index(Request $request) {
    //     if (isset($request->id))
    //     {
    //         $items = DB::select('select * from people');
    //         return view('hello.index', ['items'=>$items]);
    //     }
    // }

    // メソッドチェーン
        public function index(Request $request) {
            $items = DB::table('people')->get();
            return view('hello.index', ['items'=>$items]);
        }
            // メソッドチェーン where検索
        public function show(Request $request) {
            
            // whereRaw範囲検索
            $min = $request->min;
            $max = $request->max;
            $items = DB::table('people')
            ->whereRaw('age >=  ? and age <=?', [$min, $max])->get();
            return view('hello.show', ['items' => $items]);
            
            //  OorWhere いずれかに一致する
            // $name = $request->name;
            // $items = DB::table('people')
            // ->where('name', 'like', '%' . $name .'%')
            // ->orWhere('mail', 'like', '%'. $name . '%')->get();
            // return view('hello.show', ['items' => $items]);
        }

    
    // クエリ文
    // public function index(Request $request) {
    //     if (isset($request->id))
    //     {
    //     $param = ['id' => $request->id];
    //     $items = DB::select('select * from people where id = :id',$param);
    //     } else{
    //         $items = DB::select('select * from people');
    //     }
    //     return view('hello.index', ['items'=>$items]);
    // }

    public function post(Request $request) {
        $items = DB::select('select * from people');
        return view('hello.index', ['items'=>$items]);
    }
    
    public function add(Request $request){
        return view('hello.add');
    }
    
    public function create(Request $request){
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
            ];
            DB::table(people)->insert($param);
            return redirect('/hello');
    }
    
    public function edit(Request $request) {
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id',$param);
        return view('hello.edit', ['form'=>$item[0]]);
    }
    
    public function update(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')
            ->where('id', $request->id)
            ->update($param);
        //DB::update('update people set name =:name, mail = :mail, age = :age where id = :id', $param);
        return redirect('/hello');
    }
    
    public function del(Request $request)
    {
        $item = DB::table('people')
            ->where('id', $request->id)->first();
        return view('hello.del', ['form' => $item]);
    }

    public function remove(Request $request)
    {
        DB::table('people')
            ->where('id', $request->id)->delete();
        return redirect('/hello');
    }
}