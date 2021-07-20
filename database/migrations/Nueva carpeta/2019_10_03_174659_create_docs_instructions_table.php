<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocsInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docs_instructions', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->unsignedBigInteger('account_id')->index();
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->string('cnee')->nullable();
            $table->tinyInteger('preshipmentinspection')->nullable();
            $table->string('agency')->nullable();
            $table->string('shipper')->nullable();
            $table->string('bnl_ntfly')->nullable();
            $table->string('bl_cnee')->nullable();
            $table->string('certs_cnee')->nullable();
            $table->tinyInteger('invoice')->nullable();
            $table->tinyInteger('co_forma')->nullable();
            $table->tinyInteger('packing_list')->nullable();
            $table->tinyInteger('hc')->nullable();
            $table->tinyInteger('halai')->nullable();
            $table->tinyInteger('haccp')->nullable();
            $table->tinyInteger('legalization')->nullable();
            $table->tinyInteger('quality_certificate')->nullable();
            $table->tinyInteger('exports_declaration')->nullable();
            $table->tinyInteger('waver_besc')->nullable();
            $table->tinyInteger('no_dioxyn')->nullable();
            $table->tinyInteger('lab_analysis')->nullable();
            $table->tinyInteger('no_radiation')->nullable();
            $table->string('aditional_requirements')->nullable();
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
        Schema::dropIfExists('docs_instructions');
    }
}
