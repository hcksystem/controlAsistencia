<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('operation_id')->index()->nullable();
            $table->foreign('operation_id')->references('id')->on('operations')->onDelete('cascade');
            $table->integer('order_quantity')->nullable();
            $table->integer('product')->nullable();
            $table->string('specifications')->nullable();
            $table->string('packaging')->nullable();
            $table->string('brand')->nullable();
            $table->string('plant')->nullable();
            $table->unsignedBigInteger('shelflife_id')->index()->nullable();
            $table->foreign('shelflife_id')->references('id')->on('shelf_lifes')->onDelete('cascade');
            $table->decimal('purchase_price')->nullable();
            $table->decimal('est_purchase_sale')->nullable();
            $table->decimal('sale_price')->nullable();
            $table->decimal('est_sale')->nullable();
            $table->decimal('nb_package')->nullable();
            $table->decimal('net_qty')->nullable();
            $table->decimal('gross_weight')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
}
