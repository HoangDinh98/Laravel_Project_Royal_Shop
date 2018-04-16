<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone', 11)->nullable();
            $table->string('default_add_received')->nullable();
            $table->integer('role_id')->unsigned()->default(1);
            $table->tinyInteger('is_active')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::table('users', function($table) {
            $table->foreign('role_id')
                    ->references('id')->on('roles')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
