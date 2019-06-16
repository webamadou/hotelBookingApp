<?php

use Illuminate\Database\Seeder;
#use Faker\Generator as Faker;
class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('hotels')->insert([
                                        'name' => $faker->company,
                                        'address' => $faker->address,
                                        'city' => $faker->city,
                                        'state' => $faker->state,
                                        'country' => $faker->country,
                                        'zip_code' => $faker->postcode,
                                        'phone_number' => $faker->phoneNumber,
                                        'email' => $faker->email,
                                        'image' => $faker->imageUrl(640, 480),
                                        'created_at' => date('Y-m-d H:i:s'),
                                        'updated_at' => date('Y-m-d H:i:s'),
                                    ]);
    }
}
