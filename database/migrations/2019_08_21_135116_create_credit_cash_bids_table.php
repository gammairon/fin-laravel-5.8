<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditCashBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_cash_bids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('credit_cash_id');
            $table->decimal('min_amount', 11, 2)->default(0.00);
            $table->decimal('max_amount', 11, 2)->default(0.00);
            $table->decimal('percent', 11, 2)->default(0.00);

            //Index
            $table->index(['min_amount', 'max_amount'], 'credit_cash_bids_amount_index');

            $table->index(['percent']);

            //Foreign

            $table->foreign('credit_cash_id')
                ->references('id')->on('credit_cash')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credit_cash_bids');
    }
}
