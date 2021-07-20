<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation_documents', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->unsignedBigInteger('operation_id')->index();
            $table->foreign('operation_id')->references('id')->on('operations');
            $table->unsignedBigInteger('doc_status_id')->index();
            $table->foreign('doc_status_id')->references('id')->on('doc_statuses');
            $table->date('date_docs_ok')->nullable();
            $table->date('date_insured')->nullable();
            $table->date('date_legalized')->nullable();
            $table->text('docs_modification')->nullable();
            $table->date('date_telex')->nullable();
            $table->unsignedBigInteger('courrier_to_principal')->nullable();
            $table->foreign('courrier_to_principal')->references('id')->on('curriers');
            $table->string('cp_ref')->nullable();
            $table->date('cp_sent_on')->nullable();
            $table->unsignedBigInteger('customer_mailing_a')->index()->nullable();
            $table->foreign('customer_mailing_a')->references('id')->on('accounts_courriers');
            $table->integer('courrier_to_customer')->nullable();
            $table->string('cc_ref')->nullable();
            $table->date('cc_sent_on')->nullable();
            $table->date('cc_received_or')->nullable();
            $table->text('cargo_released_on')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operation_documents');
    }
}
