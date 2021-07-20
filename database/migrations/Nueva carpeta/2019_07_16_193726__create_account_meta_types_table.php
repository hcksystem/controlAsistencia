<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountMetaTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_meta_types', function (Blueprint $table) {
        $table->bigIncrements('id')->unsigned();
        $table->string('metatype');
        $table->tinyInteger('required');
        $table->string('description')->nullable();
        $table->tinyInteger('active');
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
        Schema::dropIfExists('account_meta_types');
    }
}
