<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductTypeOwners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_type_owners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_type_id')->unique();
            $table->unsignedBigInteger('owner_id');
            $table->timestamp('created_at');
            $table->foreign('product_type_id')->references('id')->on('product_types');
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
        Schema::dropIfExists('product_type_owners');
        Schema::table('product_type_owners', function (Blueprint $table) {
            $table->dropForeign(['product_type_id']);
            $table->dropForeign(['owner_id']);
        });
    }
}
