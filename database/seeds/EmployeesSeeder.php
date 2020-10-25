<?php

use Illuminate\Database\Seeder;
use App\Employees;
use Faker\Factory as Faker;
class EmployeesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->truncate();
        $faker = Faker::create();
        foreach (range(1,100) as $i) {
            Employees::create([
                'first_name' => $faker->firstName(),
                'last_name'=>$faker->lastName(),
                'id_company'=>rand(1,2),
                'email'=>$faker->email(),
                'phone'=>$faker->phoneNumber()
            ]);
        }
    }
}
