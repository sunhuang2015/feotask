<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(EmployeeStatusTableSeeder::class);

        $this->call(EmployeeLevelTableSeeder::class);
        $this->call(TaskStepTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(TaskCategoryTableSeeder::class);
        $this->call(TaskStatusTableSeeder::class);
        $this->call(PhoneCategoryTableSeeder::class);

        $this->call(CdmaStatusTableSeeder::class);

        $this->call(EmployeeCategoryTableSeeder::class);
        Model::reguard();
    }
}
