<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('people')->insert([
            'name' => 'taro',
            'mail' => 'taro@yamada.jp',
            'age' => '35'
        ]);
        DB::table('people')->insert([
            'name' => 'hanako',
            'mail' => 'hanako@flower.com',
            'age' => '24'
        ]);
    DB::table('people')->insert([
            'name' => 'sachiko',
            'mail' => 'sachi@happy.org',
            'age' => '47'
        ]);
    }
}
