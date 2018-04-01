<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $times = date('Y:m:d H:i:s', time());
        DB::table('users')->insert(
                array(
                    ['name' => 'Đinh Thanh Hoàng', 'email' => 'dinhhoangit98@gmail.com', 'password' => bcrypt('11112222'), 'phone' => '0929282077', 'role_id' => 1, 'is_active' => 1, 'created_at' => $times, 'updated_at' => $times],
                    ['name' => 'Hồ Ngọc Anh', 'email' => 'ngocanh@gmail.com', 'password' => bcrypt('123'), 'phone' => '0123456123', 'role_id' => 2, 'is_active' => 1, 'created_at' => $times, 'updated_at' => $times],
                    ['name' => 'Trương Dương Thị Trường Sinh', 'email' => 'sinhtruong@gmail.com', 'password' => bcrypt('123'), 'phone' => '0168234222', 'role_id' => 3, 'is_active' => 1, 'created_at' => $times, 'updated_at' => $times],
                    ['name' => 'Nguyễn Thị Kim Xuyến', 'email' => 'xuyennguyen@gmail.com', 'password' => bcrypt('123'), 'phone' => '0966170189', 'role_id' => 3, 'is_active' => 1, 'created_at' => $times, 'updated_at' => $times],
                    ['name' => 'Nguyễn Nhật Minh', 'email' => 'minhnguyen@gmail.com', 'password' => bcrypt('123'), 'phone' => '0989167888', 'role_id' => 1, 'is_active' => 1, 'created_at' => $times, 'updated_at' => $times],
                    ['name' => 'Phan Hữu Anh', 'email' => 'anhphan@gmail.com', 'password' => bcrypt('123'), 'phone' => '0169222567', 'role_id' => 2, 'is_active' => 1, 'created_at' => $times, 'updated_at' => $times],
                )
        );
    }

}
