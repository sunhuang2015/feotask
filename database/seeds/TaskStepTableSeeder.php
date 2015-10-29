<?php

use Illuminate\Database\Seeder;

class TaskStepTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('task_steps')->delete();
                 DB::table('task_steps')->insert([
                     ['name'=>'开始','order'=>1],
                     ['name'=>'SNC','order'=>2],
                     ['name'=>'IPS','order'=>3],
                     ['name'=>'PO','order'=>4],
                     ['name'=>'送货','order'=>5],
                     ['name'=>'施工','order'=>6],
                     ['name'=>'验收','order'=>7],
                     ['name'=>'完工','order'=>8],
                     ['name'=>'退单','order'=>99],


                 ]);
    }
}
