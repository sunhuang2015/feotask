<?php

use Illuminate\Database\Seeder;

class EmployeeLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('employee_levels')->truncate();
                 DB::table('employee_levels')->insert([
                     ['name'=>'25级','credit'=>'88'],
                     ['name'=>'26级','credit'=>'400'],
                     ['name'=>'27级','credit'=>'1000'],
                     ['name'=>'28级','credit'=>'1000'],
                     ['name'=>'29级','credit'=>'1500'],
                     ['name'=>'30级','credit'=>'2500'],

                 ]);
    }
}
