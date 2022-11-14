<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ColorCodeOwners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_code_owners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('color_code_id')->unique();
            $table->unsignedBigInteger('owner_id');
            $table->timestamp('created_at');
            $table->foreign('color_code_id')->references('id')->on('color_codes');
            $table->foreign('owner_id')->references('id')->on('user');       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_code_owners');
        Schema::table('color_code_owners', function (Blueprint $table) {
            $table->dropForeign(['color_code_id']);
            $table->dropForeign(['owner_id']);
        });
    }
}
