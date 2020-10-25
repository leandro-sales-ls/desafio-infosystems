<?php

use Illuminate\Database\Seeder;
use App\Companies;
use Faker\Factory as Faker;

class CompaniesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->truncate();
        $faker = Faker::create();
        foreach (range(1,2) as $i) {
            Companies::create([
                'name' => $faker->company(),
                'email'=>$faker->companyEmail(),
                'website'=>$faker->domainName(),
            ]);
        };
    }
}
