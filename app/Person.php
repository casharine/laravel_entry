<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ScopePerson;

class Person extends Model{
    // protected static function boot(){
    //     parent::boot();
    //     static::addGlobalScope(new ScopePerson);
    // }

    // public function boards()
    // {
    //     return $this->hasMany('App\Board');
    // }

    protected $guarded = array('id');
    
	public static $rules = array(
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:150'
    );
    
    //取得するデータと出力形式の指定
    public function getData()
    {
        return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
    }
    
    // // 入力した文字(名前)と一致するレコードを取得
    // public function scopeNameEqual($query, $str)
    // {
    //     return $query->where('name', $str)->first();
    // }
    
    // // 年齢以上のスコープ作成
    // public function scopeAgeGreaterThan($query, $n)
    // {
    //     return $query->where('age','>=', $n);
    // }
    
    // // 年齢以下のスコープの作成
    // public function scopeAgeLessThan($query, $n)
    // {
    //     return $query->where('age', '<=', $n);
    // }
}
