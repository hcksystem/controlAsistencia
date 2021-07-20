<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductGenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_gens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_line_id')->index();
            $table->foreign('product_line_id')->references('id')->on('product_lines')->onDelete('cascade');
            $table->string('gen');
            $table->string('basic_spec')->nullable();
            $table->string('cold_chain')->nullable();
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
        Schema::dropIfExists('product_gens');
    }
}
