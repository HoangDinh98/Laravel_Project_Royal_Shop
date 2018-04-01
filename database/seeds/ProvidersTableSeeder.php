<?php

use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $times = date('Y:m:d H:i:s', time());
        DB::table('providers')->insert(
                array(
                    ['name' => 'Công ty TNHH Tân Quang', 'address' => '98 Lý Quang Diêu, Hải Châu, Đà Nẵng', 'email' => 'support@tanquang.com', 'website' => 'tanquang.com.vn', 'phone' => '0989299899', 'is_delete' => 0, 'created_at' => $times, 'updated_at' => $times],
                    ['name' => 'Công ty Kim Ngân', 'address' => '123 Hùng Vương, Thanh Khê, Đà Nẵng', 'email' => 'gues@kimngan.com', 'website' => 'kimngan.vn', 'phone' => '0232567888', 'is_delete' => 0, 'created_at' => $times, 'updated_at' => $times],
                    ['name' => 'Công ty Thiên Thanh', 'address' => '39 Quang Trung, Hải Châu, Đà Nẵng', 'email' => 'contact@thienthanh.com', 'website' => 'thienthanh.com', 'phone' => '0977277899', 'is_delete' => 0, 'created_at' => $times, 'updated_at' => $times],
                    ['name' => 'Công ty TNHH Vương Anh', 'address' => '09 Nguyễn Hoàng, Thanh Khê, Đà Nẵng', 'email' => 'support@vuonganh.com', 'website' => 'vuonganh.com.vn', 'phone' => '0989767123', 'is_delete' => 0, 'created_at' => $times, 'updated_at' => $times],
                    ['name' => 'Công ty TNHH TDS', 'address' => '70 Nam Phong, Sơn Trà, Đà Nẵng', 'email' => 'support@tds.com', 'website' => 'tds.com.vn', 'phone' => '023678999', 'is_delete' => 0, 'created_at' => $times, 'updated_at' => $times],
                    ['name' => 'Công ty CP Hoàng Anh', 'address' => '30 Trần Quốc Tuấn, Sơn Trà, Đà Nẵng', 'email' => 'support@hoanganh.com', 'website' => 'hoanganh.vn', 'phone' => '0989333777', 'is_delete' => 0, 'created_at' => $times, 'updated_at' => $times],
                    ['name' => 'Công ty TNHH Mai Linh', 'address' => '89 Võ Nguyên Giáp, Sơn Trà, Đà Nẵng', 'email' => 'support@mailinh.com', 'website' => 'mailinh.com.vn', 'phone' => '0236555678', 'is_delete' => 0, 'created_at' => $times, 'updated_at' => $times],
                )
        );
    }
}
