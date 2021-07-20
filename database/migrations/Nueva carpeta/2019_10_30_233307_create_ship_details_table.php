<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('operation_id')->index();
            $table->foreign('operation_id')->references('id')->on('operations')->onDelete('cascade');
            $table->string('vessel',255)->nullable();
            $table->string('bl',255)->nullable();
            $table->decimal('total_pcs')->nullable();
            $table->date('shipping_date')->nullable();
            $table->string('container',255)->nullable();
            $table->decimal('total_quantity')->nullable();
            $table->string('invoice_supplier',255)->nullable();
            $table->date('eta')->nullable();
            $table->string('seals',255)->nullable();
            $table->decimal('total_gw')->nullable();
            $table->string('invoice_ppl',255)->nullable();
            $table->date('update_eta_on')->nullable();
            $table->date('date_insured')->nullable();
            $table->string('invoice_forwarder',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ship_details');
    }
}
