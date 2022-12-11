<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feed_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->string('feed_url');
            $table->string('title')->nullable();
            $table->integer('story_count')->nullable();
            $table->string('public_id');

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
        Schema::dropIfExists('feed_lists');
    }
};
