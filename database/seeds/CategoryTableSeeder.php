<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
            ['name'=>'Network'],
            ['name'=>'Task'],
            ['name'=>'Telecom'],
        ]);


    }
}
