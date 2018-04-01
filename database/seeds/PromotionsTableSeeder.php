<?php

use Illuminate\Database\Seeder;

class PromotionsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $times = date('Y:m:d H:i:s', time());
        DB::table('promotions')->insert(
                array(
                    ['value' => 10, 'is_active' => 1, 'description' => ' ', 'created_at' => $times, 'updated_at' => $times],
                    ['value' => 20, 'is_active' => 1, 'description' => ' ', 'created_at' => $times, 'updated_at' => $times],
                    ['value' => 15, 'is_active' => 1, 'description' => ' ', 'created_at' => $times, 'updated_at' => $times],
                    ['value' => 30, 'is_active' => 1, 'description' => ' ', 'created_at' => $times, 'updated_at' => $times],
                    ['value' => 40, 'is_active' => 1, 'description' => ' ', 'created_at' => $times, 'updated_at' => $times],
                    ['value' => 50, 'is_active' => 1, 'description' => ' ', 'created_at' => $times, 'updated_at' => $times],
                    ['value' => 35, 'is_active' => 1, 'description' => ' ', 'created_at' => $times, 'updated_at' => $times],
                    ['value' => 19, 'is_active' => 1, 'description' => ' ', 'created_at' => $times, 'updated_at' => $times],
                    ['value' => 25, 'is_active' => 1, 'description' => ' ', 'created_at' => $times, 'updated_at' => $times],
        ));
    }

}
