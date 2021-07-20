<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationShipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation_ships', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->unsignedBigInteger('operation')->index();
            $table->foreign('operation')->references('id')->on('operations');
            $table->integer('supplier_Admin')->nullable();
            $table->integer('supplier_ops')->nullable();
            $table->date('date_availability')->nullable();
            $table->tinyInteger('labels_received')->nullable();
            $table->tinyInteger('labels_oK')->nullable();
            $table->integer('cust_admin')->nullable();
            $table->integer('cust_ops')->nullable();
            $table->integer('docs_instruction')->nullable();
            $table->string('insp_ref')->nullable();
            $table->tinyInteger('licence_ok')->nullable();
            $table->date('date_appointment')->nullable();
            $table->text('pickup_location')->nullable();
            $table->text('instruction_inland')->nullable();
            $table->integer('freight_rate')->nullable();
            $table->date('cut_off_docs')->nullable();
            $table->date('cut_off_cargo')->nullable();
            $table->string('booking_ref')->nullable();
            $table->date('est_vessel')->nullable();
            $table->date('est_etd')->nullable();
            $table->date('est_eta')->nullable();
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
        Schema::dropIfExists('operation_ships');
    }
}
