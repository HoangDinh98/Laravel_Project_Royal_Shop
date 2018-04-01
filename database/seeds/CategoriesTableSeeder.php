<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $times = date('Y:m:d H:i:s', time());
        DB::table('categories')->insert(
                array(
                    ['name' => 'Đồng Hồ', 'parent_id' => 0, 'is_active' => 1, 'created_at' => $times, 'updated_at' => $times],
                    ['name' => 'Nhẫn', 'parent_id' => 0, 'is_active' => 1, 'created_at' => $times, 'updated_at' => $times],
                    ['name' => 'Dây Chuyền', 'parent_id' => 0, 'is_active' => 1, 'created_at' => $times, 'updated_at' => $times],
                    ['name' => 'Hoa Tai', 'parent_id' => 0, 'is_active' => 1, 'created_at' => $times, 'updated_at' => $times],
                    ['name' => 'Đồng Hồ Vàng', 'parent_id' => 1, 'is_active' => 1, 'created_at' => $times, 'updated_at' => $times],
                    ['name' => 'Đồng Hồ Bạch Kim', 'parent_id' => 1, 'is_active' => 1, 'created_at' => $times, 'updated_at' => $times],
                    ['name' => 'Đồng Hồ Bạc', 'parent_id' => 1, 'is_active' => 1, 'created_at' => $times, 'updated_at' => $times],
                    ['name' => 'Nhẫn Kim Cương', 'parent_id' => 2, 'is_active' => 1, 'created_at' => $times, 'updated_at' => $times],
                    ['name' => 'Nhẫn Bạch Kim', 'parent_id' => 2, 'is_active' => 1, 'created_at' => $times, 'updated_at' => $times],
                    ['name' => 'Nhẫn Vàng', 'parent_id' => 2, 'is_active' => 1, 'created_at' => $times, 'updated_at' => $times],
                    ['name' => 'Dây Chuyền Vàng', 'parent_id' => 3, 'is_active' => 1, 'created_at' => $times, 'updated_at' => $times],
                )
        );
    }

}
