<?php

use Illuminate\Database\Seeder;

class OrderDetailsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $times = date('Y:m:d H:i:s', time());
        DB::table('order_details')->insert(
                array(
                    ['order_id' => 1, 'product_id' => 1, 'quantity' => 2, 'original_price' => 1250000, 'price' => 1250000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 1, 'product_id' => 3, 'quantity' => 1, 'original_price' => 35000000, 'price' => 35000000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 2, 'product_id' => 5, 'quantity' => 3, 'original_price' => 12000000, 'price' => 12000000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 2, 'product_id' => 7, 'quantity' => 2, 'original_price' => 500000, 'price' => 500000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 3, 'product_id' => 8, 'quantity' => 3, 'original_price' => 1000000, 'price' => 1000000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 3, 'product_id' => 9, 'quantity' => 3, 'original_price' => 1000000, 'price' => 1000000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 4, 'product_id' => 10, 'quantity' => 4, 'original_price' => 650000, 'price' => 650000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 4, 'product_id' => 6, 'quantity' => 5, 'original_price' => 8000000, 'price' => 8000000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 5, 'product_id' => 3, 'quantity' => 2, 'original_price' => 1200000, 'price' => 1200000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 5, 'product_id' => 2, 'quantity' => 3, 'original_price' => 950000, 'price' => 950000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 6, 'product_id' => 7, 'quantity' => 4, 'original_price' => 800000, 'price' => 800000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 6, 'product_id' => 8, 'quantity' => 5, 'original_price' => 900000, 'price' => 900000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 7, 'product_id' => 9, 'quantity' => 6, 'original_price' => 700000, 'price' => 700000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 7, 'product_id' => 1, 'quantity' => 7, 'original_price' => 55000000, 'price' => 55000000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 8, 'product_id' => 4, 'quantity' => 3, 'original_price' => 5000000, 'price' => 5000000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 8, 'product_id' => 5, 'quantity' => 5, 'original_price' => 4500000, 'price' => 4500000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 9, 'product_id' => 6, 'quantity' => 2, 'original_price' => 6000000, 'price' => 6000000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 9, 'product_id' => 7, 'quantity' => 3, 'original_price' => 3999000, 'price' => 3999000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 10, 'product_id' => 8, 'quantity' => 3, 'original_price' => 4999000, 'price' => 4999000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 10, 'product_id' => 9, 'quantity' => 3, 'original_price' => 3999000, 'price' => 3999000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 11, 'product_id' => 5, 'quantity' => 3, 'original_price' => 7999000, 'price' => 7999000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 11, 'product_id' => 1, 'quantity' => 3, 'original_price' => 4999000, 'price' => 4999000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 12, 'product_id' => 3, 'quantity' => 3, 'original_price' => 6999000, 'price' => 6999000, 'created_at' => $times, 'updated_at' => $times],
                    ['order_id' => 12, 'product_id' => 6, 'quantity' => 3, 'original_price' => 9999000, 'price' => 9999000, 'created_at' => $times, 'updated_at' => $times],
                )
        );
    }

}
