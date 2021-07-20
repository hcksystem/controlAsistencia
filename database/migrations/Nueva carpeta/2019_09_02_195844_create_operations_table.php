<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
        $table->bigIncrements('id')->unsigned();
        $table->string('code')->comment('formated code (YYYYMMDD - ####)');
        $table->string('date_order');
        $table->unsignedBigInteger('operation_status_id')->index()->comment('status.id');
        $table->foreign('operation_status_id')->references('id')->on('operation_status')->onDelete('CASCADE');
        $table->text('status_comments')->nullable();
        $table->unsignedBigInteger('business_line_id')->index();
        $table->foreign('business_line_id')->references('id')->on('business_lines')->onDelete('CASCADE');
        $table->unsignedBigInteger('principal_id')->index()->comment('acount.name where category = partner');
        $table->foreign('principal_id')->references('id')->on('accounts')->onDelete('CASCADE');
        $table->unsignedBigInteger('supplier_id')->index()->comment('acount.name where category = supplier');
        $table->foreign('supplier_id')->references('id')->on('accounts')->onDelete('CASCADE');
        $table->integer('supplier_commercial')->nullable()->comment('account_contact.fullname where id_account = supplier_id');
        $table->string('proforma')->nullable();
        $table->integer('cus_commercial_id')->nullable()->comment('account_contact.fullname where id_account=cus_commercial_id');
        $table->integer('cus_ref')->nullable();
        $table->unsignedBigInteger('purchase_by')->index()->comment('user.fullname');
        $table->foreign('purchase_by')->references('id')->on('users')->onDelete('CASCADE');
        $table->tinyInteger('su_po_signed')->nullable();
        $table->integer('sale_by')->nullable();
        $table->tinyInteger('cu_po_signed')->nullable();
        $table->integer('purchase_broker_id')->nullable()->comment('account.name where category = partner');
        $table->string('p_broker_com_mt')->nullable();
        $table->integer('sale_broker_id')->nullable()->comment('account.name where category = partner');
        $table->string('s_broker_com_mt')->nullable();
        $table->integer('supplier_bank_id')->nullable()->comment('partner_bank.account where account_id = customer_id');
        $table->integer('customer_bank_id')->nullable()->comment('partner_bank.account where account_id = customer_id');
        $table->unsignedBigInteger('p_modality')->nullable()->comment('order_pmt_terms.id');
        $table->foreign('p_modality')->references('id')->on('order_pmt_terms')->onDelete('CASCADE');
        $table->string('p_advanced')->nullable();
        $table->integer('p_days')->nullable();
        $table->unsignedBigInteger('s_modality')->nullable()->comment('order_pmt_terms.id');
        $table->foreign('s_modality')->references('id')->on('order_pmt_terms')->onDelete('CASCADE');
        $table->string('s_advanced')->nullable();
        $table->integer('s_days')->nullable();
        $table->unsignedBigInteger('purchase_incoterm')->nullable()->comment('iconterm.id');
        $table->foreign('purchase_incoterm')->references('id')->on('incoterms')->onDelete('CASCADE');
        $table->integer('purchase_curr')->nullable();
        $table->integer('p_incoterm_place')->nullable();
        $table->integer('customer_id')->nullable()->comment('account.id');
        $table->unsignedBigInteger('sale_incoterm')->nullable()->comment('iconterm.id');
        $table->foreign('sale_incoterm')->references('id')->on('incoterms')->onDelete('CASCADE');
        $table->integer('sale_curr')->nullable();
        $table->integer('s_incoterm_place')->nullable();
        $table->date('ship_from')->nullable();
        $table->date('dead_line_ship')->nullable();
        $table->unsignedBigInteger('cargo_unit')->nullable()->comment('cargo_units.id');
        $table->foreign('cargo_unit')->references('id')->on('cargo_units')->onDelete('CASCADE');
        $table->unsignedBigInteger('log_unit')->nullable()->comment('logunit.id');
        $table->foreign('log_unit')->references('id')->on('logunits')->onDelete('CASCADE');
        $table->integer('nb_log_units')->nullable()->comment('logunit.id');
        $table->integer('pol_id')->nullable()->comment('port.id');
        $table->integer('origin')->nullable()->comment('country.id');
        $table->integer('pod_id')->nullable()->comment('port.id');
        $table->integer('final_destination')->nullable()->comment('country.id');
        $table->decimal('est_freight_u')->nullable();
        $table->decimal('est_inland_u')->nullable();
        $table->decimal('est_legal_u')->nullable();
        $table->string('add_instructions')->nullable();
        $table->text('comments')->nullable();
        $table->integer('principal_bank')->nullable();
        $table->decimal('principal_com')->nullable();
        $table->timestamps();
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedBigInteger('operation_id')->index();
            $table->foreign('operation_id')->references('id')->on('operations')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operations');
    }
}
