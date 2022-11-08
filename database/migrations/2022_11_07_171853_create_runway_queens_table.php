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
        Schema::create('runway_queens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('runway_id');
            $table->foreignId('queen_id');
            $table->integer('score')->unsigned();
            $table->integer('place')->unsigned();
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
        Schema::dropIfExists('runway_queens');
    }
};

