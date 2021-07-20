<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
        $table->bigIncrements('id')->unsigned();
        $table->unsignedBigInteger('document_type_id')->index();
        $table->foreign('document_type_id')->references('id')->on('document_types')->onDelete('cascade');
        $table->unsignedBigInteger('account_id')->index();
        $table->foreign('account_id')->references('id')->on('accounts');
        $table->unsignedBigInteger('operation_id')->index();
        $table->foreign('operation_id')->references('id')->on('operations')->onDelete('cascade');
        $table->string('name');
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
        Schema::dropIfExists('documents');
    }
}
