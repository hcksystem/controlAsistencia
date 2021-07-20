<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_metas', function (Blueprint $table) {
        $table->bigIncrements('id')->unsigned();
        $table->unsignedBigInteger('account_id')->index();
        $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
        $table->unsignedBigInteger('account_meta_type_id')->index();
        $table->foreign('account_meta_type_id')->references('id')->on('account_meta_types')->onDelete('cascade');
        $table->string('value');
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
       Schema::dropIfExists('account_metas');
    }
}
