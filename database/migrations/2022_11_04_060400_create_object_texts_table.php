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
        Schema::create('object_texts', function (Blueprint $table) {
            $table->id();
            $table->string('object_type');
            $table->bigInteger('object_id')->unsigned();
            $table->string('stage');
            $table->string('text');
            $table->string('queen_ids')->default('');
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
        Schema::dropIfExists('object_texts');
    }
};
