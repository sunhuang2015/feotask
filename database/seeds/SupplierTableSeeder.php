<?php

use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('suppliers')->delete();
        DB::table('suppliers')->insert([
            'name'=>'空','email'=>"null@null.com",'contact_person'=>'null','phone'=>'null'
        ]);
    }
}
