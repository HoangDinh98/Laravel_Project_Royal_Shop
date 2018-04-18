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
                    ['customer_name' => 'Nguyễn Văn Hải', 'phone' => '0169877899', 'email' => 'hai123@gmail.com', 'address' => '130 Lý Thường Kiệt, Hải Châu, Đà Nẵng', 'status' => 0, 'description' => 'Thành viên', 'created_at' => $times, 'updated_at' => $times],
                    ['customer_name' => 'Trần Mai Phương', 'phone' => '0868234567', 'email' => 'phuong123@gmail.com', 'address' => '72 Nguyễn Văn Linh, Hải Châu, Đà Nẵng', 'status' => 0, 'description' => 'Thành viên', 'created_at' => $times, 'updated_at' => $times],
                    ['customer_name' => 'Nguyễn Văn Hải', 'phone' => '0169877899', 'email' => 'hai98@gmail.com', 'address' => '101 Lê Hữu Trác, Sơn Trà, Đà Nẵng', 'status' => 0, 'description' => 'Thành viên', 'created_at' => $times, 'updated_at' => $times],
                    ['customer_name' => 'Đinh Thanh Hoàng', 'phone' => '0168393838', 'email' => 'hoangdth98@gmail.com', 'address' => '99 Nguyễn Du, Hòa Cường Bắc, Đà Nẵng', 'status' => 0, 'description' => 'Thành viên', 'created_at' => $times, 'updated_at' => $times],
                    ['customer_name' => 'Nguyễn Thị Kim Xuyến', 'phone' => '0169877888', 'email' => 'Xuyen8080@gmail.com', 'address' => '28 ĐỐng Đa, Hải Châu, Đà Nẵng', 'status' => 0, 'description' => 'Thành viên', 'created_at' => $times, 'updated_at' => $times],
                    ['customer_name' => 'Hồ Thị Ngọc Anh', 'phone' => '0169777999', 'email' => 'anh.ho@gmail.com', 'address' => '08 Nguyễn Thị mInh Khai, Hải Châu, Đà Nẵng', 'status' => 0, 'description' => 'Thành viên', 'created_at' => $times, 'updated_at' => $times],
                    ['customer_name' => 'Trương Dương Trường Sinh', 'phone' => '0169777899', 'email' => 'sinh.truong985@gmail.com', 'address' => '130 Lý Nhân Tông, Hải Châu, Đà Nẵng', 'status' => 0, 'description' => 'Thành viên', 'created_at' => $times, 'updated_at' => $times],
                    ['customer_name' => 'Nguyễn THị Tràng Hải', 'phone' => '0162887709', 'email' => 'hai.trang@gmail.com', 'address' => '24 Hùng Vương, Hải Châu, Đà Nẵng', 'status' => 0, 'description' => 'Thành viên', 'created_at' => $times, 'updated_at' => $times],
                    ['customer_name' => 'Nguyễn Thị Xuyến Xao', 'phone' => '0163875809', 'email' => 'xaoxuyen@gmail.com', 'address' => '99 Hồ Nghinh, Hải Châu, Đà Nẵng', 'status' => 0, 'description' => 'Thành viên', 'created_at' => $times, 'updated_at' => $times],
                    ['customer_name' => 'Lê THị Kim Quyên', 'phone' => '0165877800', 'email' => 'quyen@gmail.com', 'address' => '15 Lý Thường Kiệt, Hải Châu, Đà Nẵng', 'status' => 0, 'description' => 'Thành viên', 'created_at' => $times, 'updated_at' => $times],
                    ['customer_name' => 'Nguyễn Xuân Bảo', 'phone' => '0165693023', 'email' => 'xuanbao@gmail.com', 'address' => '90 Hồ Nghinh, Hải Châu, Đà Nẵng', 'status' => 0, 'description' => 'Thành viên', 'created_at' => $times, 'updated_at' => $times],
                    ['customer_name' => 'Lê Hoàng Anh', 'phone' => '01687074190', 'email' => 'hoanganh@gmail.com', 'address' => '100 Lý Bạch, Hải Châu, Đà Nẵng', 'status' => 0, 'description' => 'Thành viên', 'created_at' => $times, 'updated_at' => $times],
               
                    
                    )
        );
    }

}
