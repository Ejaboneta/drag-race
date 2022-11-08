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
        Schema::create('episode_challange_queens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('episode_challenge_id')->constrained();
            $table->foreignId('queen_id')->constrained();
            $table->string('score')->nullable();
            $table->string('place')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episode_challange_queens');
    }
};
