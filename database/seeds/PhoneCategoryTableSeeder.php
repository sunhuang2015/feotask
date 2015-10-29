<?php

use Illuminate\Database\Seeder;

class PhoneCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('phone_categories')->delete();
                 DB::table('phone_categories')->insert([
                     ['name'=>'EXT'],
                     ['name'=>'EXT_CDMA'],
                     ['name'=>'CIRCUIT'],
                     ['name'=>'OTHERS'],

                 ]);
    }
}
