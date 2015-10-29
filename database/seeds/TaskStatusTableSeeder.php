<?php

use Illuminate\Database\Seeder;

class TaskStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('task_statuses')->delete();
                 DB::table('task_statuses')->insert([
                     ['name'=>'进行中'],
                     ['name'=>'已退单'],
                     ['name'=>'完工'],
                 ]);
    }
}
