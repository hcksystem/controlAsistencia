<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->tinyInteger('active')->nullable();
            $table->timestamps();
        });

        Schema::create('bank_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bank_id')->index();
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
            $table->decimal('amount', 11, 2);
            $table->decimal('amount_init', 11, 2);
            $table->string('reference');
            $table->date('date');
            $table->unsignedBigInteger('user')->index();
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('type');
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amount_before', 11, 2);
            $table->decimal('amount_after', 11, 2);
            $table->unsignedBigInteger('transaction_id')->index();
            $table->foreign('transaction_id')->references('id')->on('bank_transactions')->onDelete('cascade');
            $table->decimal('amount', 11, 2);
            $table->string('type');
            $table->decimal('before', 11, 2);
            $table->decimal('after', 11, 2);
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
        Schema::dropIfExists('bank');
        Schema::dropIfExists('bank_transaction');
        Schema::dropIfExists('payments');
    }
}
