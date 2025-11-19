<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditCashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_cash', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bank_id')->unsigned();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('subtitle')->nullable();
            $table->string('ref_link')->nullable();
            $table->decimal('rating', 5, 2)->default(0.00);

            $table->decimal('min_amount', 11, 2)->default(0.00);
            $table->decimal('max_amount', 11, 2)->default(0.00);
            $table->integer('min_term')->default(0);
            $table->integer('max_term')->default(0);
            $table->integer('time_review')->default(0);
            $table->boolean('repayment_annuity')->default(0);
            $table->boolean('repayment_differentiated')->default(0);
            $table->boolean('repayment_bullitny')->default(0);
            $table->text('fine')->nullable();
            $table->text('insurance')->nullable();
            $table->text('additional_terms')->nullable();
            $table->integer('min_age')->default(0);
            $table->integer('max_age')->default(0);
            $table->string('experience')->nullable();
            $table->string('registration')->nullable();
            $table->string('nationality')->nullable();
            $table->text('optional_documents')->nullable();
            $table->text('special_offer')->nullable();


            $table->timestamps();

            //Index
            $table->index(['name']);

            $table->index(['min_amount', 'max_amount']);

            $table->index(['min_term', 'max_term']);

            $table->index(['min_age', 'max_age']);

            $table->index(['time_review']);

            //Foreign
            $table->foreign('bank_id')
                ->references('id')->on('banks')
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
        Schema::dropIfExists('credit_cash');
    }
}
