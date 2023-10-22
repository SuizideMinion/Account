<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_servers', function (Blueprint $table) {
            $table->id();

            $table->string('tag');
            $table->string('name');
            $table->string('wt')->default(0);
            $table->string('kt')->default(0);
            $table->string('desc');
            $table->string('host');
            $table->string('url');
            $table->integer('payserver');
            $table->string('lang');
            $table->string('database');
            $table->string('database_host');
            $table->string('database_username');
            $table->string('database_password');
            $table->string('user_data_table');
            $table->integer('status')->default(0);

            $table->foreignId('game_id')->references('id')->on('games');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_servers');
    }
};
