<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
        $table->bigIncrements('id')->unsigned();
        $table->string('name');
        $table->string('identification')->nullable();
        $table->string('website')->nullable();
        $table->string('address')->nullable();
        $table->string('zipcode')->nullable();
        $table->unsignedBigInteger('country_id')->index();
        $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        $table->string('phone')->nullable();
        $table->string('email')->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
