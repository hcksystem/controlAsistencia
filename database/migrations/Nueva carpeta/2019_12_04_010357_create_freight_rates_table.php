<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreightRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freight_rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('forwarder')->index();
            $table->foreign('forwarder')->references('id')->on('operations')->onDelete('cascade')->comment('Cuenta relativa al operador de flete');
            $table->integer('log_unit')->nullable()->comment('Logunit');
            $table->integer('pol')->nullable()->comment('Port of Loading');
            $table->integer('pod')->nullable()->comment('Point of Discharge');
            $table->integer('line')->nullable()->comment('Linea de flete');
            $table->integer('currency')->nullable()->comment('Currency');
            $table->decimal('basic_freight')->nullable()->default(0);
            $table->decimal('baf')->nullable()->default(0);
            $table->decimal('adds_on')->nullable();
            $table->decimal('freight_all_in')->nullable()->default(0);
            $table->decimal('transit_time')->nullable()->default(0);
            $table->decimal('days_free_plug')->nullable()->default(0);
            $table->decimal('days_free_storage')->nullable()->default(0);
            $table->decimal('days_free_dem')->nullable()->default(0);
            $table->date('valid_until')->nullable();
            $table->string('route')->nullable();
            $table->string('rate_sumary')->nullable();
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
        Schema::dropIfExists('freight_rates');
    }
}
