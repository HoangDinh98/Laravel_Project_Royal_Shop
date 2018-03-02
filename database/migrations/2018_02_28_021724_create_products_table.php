<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->integer('provider_id')->unsigned();
            $table->integer('promotion_id')->unsigned();
            $table->string('name', 255);
            $table->integer('quantity');
            $table->float('weight', 11, 2);
            $table->integer('price');
            $table->tinyInteger('is_delete');
            $table->text('description');
            $table->timestamps();
        });

        Schema::table('products', function($table) {
            $table->foreign('category_id')
                    ->references('id')->on('categories')
                    ->onDelete('cascade');
            $table->foreign('provider_id')
                    ->references('id')->on('providers')
                    ->onDelete('cascade');
            $table->foreign('promotion_id')
                    ->references('id')->on('promotions')
                    ->onDelete('cascade');
        });

        DB::statement('ALTER TABLE products ADD FULLTEXT fulltext_index (name, description)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('products');
    }

}
