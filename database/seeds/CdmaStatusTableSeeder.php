<?php

use Illuminate\Database\Seeder;

class CdmaStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('cdma_statuses')->delete();
                 DB::table('cdma_statuses')->insert([
                     ['name'=>'开始','code'=>1],
                     ['name'=>'通知','code'=>2],
                     ['name'=>'完成','code'=>3],
                     ['name'=>'过期未办','code'=>4],


                 ]);
    }
}
