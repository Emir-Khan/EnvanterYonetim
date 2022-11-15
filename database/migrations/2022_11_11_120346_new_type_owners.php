<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewTypeOwners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_type_owners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('new_type_id')->unique();
            $table->unsignedBigInteger('owner_id');
            $table->timestamp('created_at');
            $table->foreign('new_type_id')->references('id')->on('new_types');
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
        Schema::dropIfExists('new_type_owners');
        Schema::table('new_type_owners', function (Blueprint $table) {
            $table->dropForeign(['new_type_id']);
            $table->dropForeign(['owner_id']);
        });
    }
}
