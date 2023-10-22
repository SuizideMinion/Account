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
        Schema::create('user_accounts', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->integer('old_owner_id')->default(0);
            $table->integer('server_user_id');
            $table->string('loginkey');
            $table->date('blocked')->nullable();
            $table->date('delmode')->nullable();

            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('gameserver_id')->references('id')->on('game_servers');
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
        Schema::dropIfExists('user_accounts');
    }
};
