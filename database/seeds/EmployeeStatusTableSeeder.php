<?php

use Illuminate\Database\Seeder;

class EmployeeStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('employee_statuses')->delete();
                 DB::table('employee_statuses')->insert([
                     ['name'=>'在职'],
                     ['name'=>'离职'],
                     ['name'=>'辞退'],
                 ]);
    }
}
