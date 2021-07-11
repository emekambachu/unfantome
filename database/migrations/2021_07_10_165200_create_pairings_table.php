<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePairingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pairings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('payer_id')->unsigned();
            $table->bigInteger('receiver_id')->unsigned();
            $table->integer('amount');
            $table->text('proof_of_payment');
            $table->boolean('approved')->default(0);
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
        Schema::dropIfExists('pairings');
    }
}
