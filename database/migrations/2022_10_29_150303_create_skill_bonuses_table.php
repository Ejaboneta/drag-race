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
        Schema::create('skill_bonuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('queen_id')->constrained();
            $table->foreignId('season_id')->nullable()->constrained();
            $table->foreignId('episode_id')->nullable()->constrained();
            $table->foreignId('skill_id')->constrained();
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
        Schema::dropIfExists('skill_bonuses');
    }
};
