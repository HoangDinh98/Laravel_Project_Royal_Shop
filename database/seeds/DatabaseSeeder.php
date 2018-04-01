<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call([
            CategoriesTableSeeder::class,
            ProvidersTableSeeder::class,
            PromotionsTableSeeder::class,
            ProductsTableSeeder::class,
            UsersTableSeeder::class,
            OrdersTableSeeder::class,
            OrderDetailsTableSeeder::class,
            CommentsTableSeeder::class,
        ]);
    }

}
