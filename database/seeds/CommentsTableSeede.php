<?php

use Illuminate\Database\Seeder;

class CommentsTableSeede extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $times = date('Y:m:d H:i:s', time());
        DB::table('categories')->insert(
                array(
                    ['product_id' => 1, 'author' => 'Trần Minh Anh'],
                )
        );
    }

}
