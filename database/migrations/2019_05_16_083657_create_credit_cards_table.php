<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bank_id')->unsigned();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('subtitle')->nullable();
            $table->string('ref_link')->nullable();
            $table->decimal('rating', 5, 2)->default(0.00);

            $table->boolean('pay_wave')->default(false);
            $table->boolean('visa')->default(false);
            $table->boolean('master_card')->default(false);
            $table->boolean('google_pay')->default(false);
            $table->boolean('app_store')->default(false);

            $table->decimal('min_percent_bid', 11, 2)->default(0.00);
            $table->decimal('max_percent_bid', 11, 2)->default(0.00);
            $table->decimal('min_credit_limit', 11, 2)->default(0.00);
            $table->decimal('max_credit_limit', 11, 2)->default(0.00);

            $table->integer('grace_period')->default(0);
            $table->decimal('service_cost', 11, 2)->default(0.00);
            $table->decimal('issue_fee', 11, 2)->default(0.00);

            $table->text('repayment_terms')->nullable();
            $table->text('fine')->nullable();
            $table->text('insurance')->nullable();

            $table->decimal('cashback_fee', 11, 2)->default(0.00);
            $table->text('cashback_text')->nullable();
            $table->text('additional_features')->nullable();

            $table->integer('min_age')->default(0);
            $table->integer('max_age')->default(0);

            $table->text('special_offer')->nullable();

            $table->timestamps();

            //Index
            $table->index(['name']);

            $table->index(['pay_wave', 'visa', 'master_card', 'google_pay', 'app_store'], 'credit_cards_services_index');

            $table->index(['min_percent_bid', 'max_percent_bid'], 'credit_cards_percent_bid_index');

            $table->index(['min_credit_limit', 'max_credit_limit'], 'credit_cards_credit_limit_index');

            $table->index(['min_age', 'max_age'], 'credit_cards_age_index');

            $table->index(['grace_period']);

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
        Schema::dropIfExists('credit_cards');
    }
}
