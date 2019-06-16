<?php

use Illuminate\Database\Seeder;

class RoomCapacityTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $table_name = 'room_capacities';

    public function run()
    {
        DB::table($this->table_name)->insert([
            'name' => 'Single',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table($this->table_name)->insert([
            'name' => 'Double',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table($this->table_name)->insert([
            'name' => 'Family',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
