<?php

use Illuminate\Database\Seeder;

class RoomTypeTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $table_name = 'room_types';
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table($this->table_name)->insert([
            'name' => 'Delux',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table($this->table_name)->insert([
            'name' => 'Standard',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
