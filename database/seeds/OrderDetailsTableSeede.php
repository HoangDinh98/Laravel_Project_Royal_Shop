<?php

use Illuminate\Database\Seeder;

class OrderDetailsTableSeede extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $times = date('Y:m:d H:i:s', time());
        DB::table('categories')->insert(
                array(
                    ['order_id' => 1, product_id => 1, 'quantity' => 2, 'original_price' => 1250000, 'price' => 1250000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 1, product_id => 3, 'quantity' => 1, 'original_price' => 350000, 'price' => 30000000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 2, product_id => 5, 'quantity' => 3, 'original_price' => 1250000, 'price' => 1250000, 'created_at' => $times, 'updated_at' => $times],
                )
        );
    }

}
