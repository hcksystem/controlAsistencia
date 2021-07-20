<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_banks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id')->index();
            $table->foreign('company_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->string('bank_name')->nullable();
            $table->string('bank_addres')->nullable();
            $table->string('swift_code')->nullable();
            $table->string('aba')->nullable();
            $table->string('benefaccount_ibank')->nullable();
            $table->unsignedBigInteger('acc_currency')->index();
            $table->foreign('acc_currency')->references('id')->on('currencies')->onDelete('cascade');
            $table->string('beneficiary_name')->nullable();
            $table->string('intermediary_info')->nullable();
            $table->tinyInteger('curren_account')->nullable();
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
        Schema::dropIfExists('partner_banks');
    }
}
