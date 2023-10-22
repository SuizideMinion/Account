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
        Schema::create('ticket_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('text');
            $table->string('image');
            $table->integer('user_id');
            $table->integer('group_id');
            $table->integer('ticket_id');
            $table->integer('status');
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
        Schema::dropIfExists('ticket_posts');
    }
};
