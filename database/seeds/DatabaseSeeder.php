<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(HotelsTableSeeder::class);
        $this->call(RoomTypeTableSeed::class);
        $this->call(RoomCapacityTableSeed::class);
        $this->call(RoomTableSeeder::class);
        $this->call(PriceTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
