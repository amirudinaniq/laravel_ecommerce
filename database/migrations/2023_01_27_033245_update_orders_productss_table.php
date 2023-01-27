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
        //update table
        Schema::table('orders_products', function (Blueprint $table) {
            $table->string('product_name')->after('product_id');
            $table->float('product_price')->after('product_name');
            $table->float('total_price')->after('product_price');
            $table->integer('quantity')->after('total_price');
            $table->string('products_image')->after('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
