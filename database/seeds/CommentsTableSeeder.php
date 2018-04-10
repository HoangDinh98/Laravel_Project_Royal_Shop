<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $times = date('Y:m:d H:i:s', time());
        DB::table('comments')->insert(
                array(
                    ['product_id' => 1, 'user_id' => 1, 'parent_id' => 0, 'content' => 'OK', 'created_at' => $times, 'updated_at' => $times],
                    ['product_id' => 1, 'user_id' => 2, 'parent_id' => 1, 'content' => 'Greate', 'created_at' => $times, 'updated_at' => $times],
                    ['product_id' => 1, 'user_id' => 3, 'parent_id' => 0, 'content' => 'Good', 'created_at' => $times, 'updated_at' => $times],
                    ['product_id' => 3, 'user_id' => 4, 'parent_id' => 0, 'content' => 'Awesome', 'created_at' => $times, 'updated_at' => $times],
                )
        );
    }

}
