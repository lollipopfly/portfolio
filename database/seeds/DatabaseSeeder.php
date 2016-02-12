<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('works')->delete();
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            DB::table('works')->insert([
                'title' => $faker->company,
                'overview' => $faker->text(),
                'image' => $faker->imageUrl(360,360),
                'platform' => $faker->lastName(),
                'role' => $faker->lastName(),
                'link' => $faker->domainName(),
                'tags' => $faker->text(20),
                'created_at' => date("Y-m-d H:i:s"), //timestamps
                'updated_at' => date("Y-m-d H:i:s"), //timestamps
            ]);
        }
    }
}
