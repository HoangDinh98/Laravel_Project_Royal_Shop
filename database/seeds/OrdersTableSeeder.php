<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $times = date('Y:m:d H:i:s', time());
        DB::table('orders')->insert(
                array(
                    ['customer_name' => 'Nguyễn Văn Hải', 'email' => 'hai123@gmail.com', 'phone' => '0169877899', 'address' => '130 Lý Thường Kiệt, Hải Châu, Đà Nẵng', 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['customer_name' => 'Trần Mai Phương', 'email' => 'phuong123@gmail.com', 'phone' => '0868234567', 'address' => '72 Nguyễn Văn Linh, Hải Châu, Đà Nẵng', 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                )
        );
    }

}
