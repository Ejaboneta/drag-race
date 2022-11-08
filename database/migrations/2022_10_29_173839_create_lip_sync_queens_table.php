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
        Schema::create('lip_sync_queens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lip_sync_id');
            $table->foreignId('queen_id');
            $table->integer('score')->unsigned();
            $table->integer('place')->unsigned();
            $table->string('judgement');
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
        Schema::dropIfExists('lip_sync_queens');
    }
};

