<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('payment_plan_id')->unsigned();
            $table->tinyInteger('withdraw_request')->default(0);
            $table->integer('amount');
            $table->integer('payment_balance');
            $table->integer('return_balance');
            $table->boolean('approved')->default(0);
            $table->boolean('completed_payments')->default(0);
            $table->boolean('completed_returns')->default(0);
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
        Schema::dropIfExists('payments');
    }
}
