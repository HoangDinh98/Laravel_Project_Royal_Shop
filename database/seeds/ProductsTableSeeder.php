<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $times = date('Y:m:d H:i:s', time());
        DB::table('products')->insert(
                array(
                    ['category_id' => 5, 'provider_id' => 1, 'promotion_id' => 1, 'name' => 'Đồng Hồ V101', 'quantity' => 139, 'weight' => 90, 'price' => 3999000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 5, 'provider_id' => 2, 'promotion_id' => 3, 'name' => 'Đồng Hồ V202', 'quantity' => 80, 'weight' => 70, 'price' => 1500000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 6, 'provider_id' => 3, 'promotion_id' => 4, 'name' => 'Đồng Hồ BK101', 'quantity' => 30, 'weight' => 80, 'price' => 2500000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 7, 'provider_id' => 2, 'promotion_id' => 2, 'name' => 'Đồng Hồ B101', 'quantity' => 40, 'weight' => 100, 'price' => 1200000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 8, 'provider_id' => 1, 'promotion_id' => 8, 'name' => 'Nhẫn KC101', 'quantity' => 23, 'weight' => 120, 'price' => 19800000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 8, 'provider_id' => 5, 'promotion_id' => 5, 'name' => 'Nhẫn KC203', 'quantity' => 45, 'weight' => 110, 'price' => 16780000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 9, 'provider_id' => 1, 'promotion_id' => 1, 'name' => 'Nhẫn BK101', 'quantity' => 30, 'weight' => 40, 'price' => 4500000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 6, 'provider_id' => 1, 'promotion_id' => 5, 'name' => 'Đồng Hồ BK102', 'quantity' => 15, 'weight' => 150, 'price' => 3500000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 10, 'provider_id' => 1, 'promotion_id' => 6, 'name' => 'Nhẫn V101', 'quantity' => 45, 'weight' => 20, 'price' => 3200000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    
                    ['category_id' => 5, 'provider_id' => 5, 'promotion_id' => 5, 'name' => 'Dây Chuyền BK101', 'quantity' => 45, 'weight' => 40, 'price' => 5000000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 10, 'provider_id' => 1, 'promotion_id' =>8, 'name' => 'Nhẫn V102', 'quantity' => 20, 'weight' => 40, 'price' => 4500000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 10, 'provider_id' => 1, 'promotion_id' => 1, 'name' => 'Dây Chuyền V101', 'quantity' => 35, 'weight' => 40, 'price' => 2590000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 6, 'provider_id' => 1, 'promotion_id' => 5, 'name' => 'Dây Chuyền KC101', 'quantity' => 75, 'weight' => 40, 'price' => 3990000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 6, 'provider_id' => 2, 'promotion_id' => 1, 'name' => 'Dây Chuyền V102', 'quantity' => 40, 'weight' => 40, 'price' => 2590000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 10, 'provider_id' => 1, 'promotion_id' => 6, 'name' => 'Dây Chuyền KC101', 'quantity' => 20, 'weight' => 40, 'price' => 2590000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 5, 'provider_id' => 5, 'promotion_id' => 8, 'name' => 'Dây Chuyền V103', 'quantity' => 10, 'weight' => 40, 'price' => 2590000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 8, 'provider_id' => 3, 'promotion_id' => 3, 'name' => 'Dây Chuyền KC102', 'quantity' => 25, 'weight' => 40, 'price' => 2590000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 8, 'provider_id' => 1, 'promotion_id' => 4, 'name' => 'Nhẫn BK102', 'quantity' => 45, 'weight' => 40, 'price' => 2590000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 9, 'provider_id' => 2, 'promotion_id' => 2, 'name' => 'Đồng Hồ BK104', 'quantity' => 50, 'weight' => 40, 'price' => 2590000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 6, 'provider_id' => 1, 'promotion_id' => 5, 'name' => 'Bông Tai BK101', 'quantity' => 65, 'weight' => 40, 'price' => 2590000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 10, 'provider_id' => 1, 'promotion_id' => 2, 'name' => 'Nhẫn V105', 'quantity' => 35, 'weight' => 40, 'price' => 2590000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 7, 'provider_id' => 2, 'promotion_id' => 3, 'name' => 'Bông Tai V101', 'quantity' => 15, 'weight' => 40, 'price' => 2590000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 8, 'provider_id' => 1, 'promotion_id' => 4, 'name' => 'Bông Tai KC404', 'quantity' => 20, 'weight' => 40, 'price' => 2590000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 6, 'provider_id' => 5, 'promotion_id' => 4, 'name' => 'Dây Chuyền V106', 'quantity' => 15, 'weight' => 40, 'price' => 2590000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 10, 'provider_id' => 1, 'promotion_id' =>5, 'name' => 'Dây Chuyền KC104', 'quantity' => 10, 'weight' => 40, 'price' => 2590000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 5, 'provider_id' => 3, 'promotion_id' => 1, 'name' => 'Nhẫn V304', 'quantity' => 50, 'weight' => 40, 'price' => 2590000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 9, 'provider_id' => 5, 'promotion_id' => 6, 'name' => 'Nhẫn BK201', 'quantity' => 35, 'weight' => 40, 'price' => 2590000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    ['category_id' => 7, 'provider_id' => 1, 'promotion_id' => 5, 'name' => 'Dây Chuyền V202', 'quantity' => 40, 'weight' => 40, 'price' => 2590000, 'is_delete' => 0, 'description' => '', 'created_at' => $times, 'updated_at' => $times],
                    
        ));
    }

}
