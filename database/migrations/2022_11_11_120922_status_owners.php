<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StatusOwners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_owners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('status_id')->unique();
            $table->unsignedBigInteger('owner_id');
            $table->timestamp('created_at');
            $table->foreign('status_id')->references('id')->on('status');
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
        Schema::dropIfExists('status_owners');
        Schema::table('status_owners', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            $table->dropForeign(['owner_id']);
        });
    }
}
