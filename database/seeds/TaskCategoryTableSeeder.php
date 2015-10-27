<?php

use Illuminate\Database\Seeder;

class TaskCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('task_categories')->truncate();
                 DB::table('task_categories')->insert([
                     ['name'=>'Network'],

                     ['name'=>'Telecom'],
                 ]);
    }
}
