<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('mfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->unique();

            $table->string('name');
            $table->text('ref_link')->nullable();
            $table->decimal('rating', 5, 2)->default(0.00);
            $table->string('registration')->nullable();
            $table->string('license')->nullable();
            $table->decimal('first_credit', 11, 2)->default(0.00);
            $table->text('free_credit_description')->nullable();
            $table->decimal('free_credit_bid', 11, 2)->default(0.00);
            $table->decimal('free_credit_amount', 11, 2)->default(0.00);
            $table->decimal('min_amount', 11, 2)->default(0.00);
            $table->decimal('max_amount', 11, 2)->default(0.00);
            $table->decimal('repeat_credit_bid', 11, 2)->default(0.00);
            $table->integer('min_term')->default(0);
            $table->integer('max_term')->default(0);
            $table->integer('min_age')->default(0);
            $table->integer('max_age')->default(0);
            $table->integer('time_review')->default(0);
            $table->boolean('receiving_method_card')->default(0);
            $table->boolean('receiving_method_cash')->default(0);
            $table->text('special_offer')->nullable();
            $table->text('preview')->nullable();
            $table->string('web_site')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('postcode')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('street');
            $table->string('house')->nullable();
            $table->text('work_time')->nullable();


            $table->index(['name']);
            $table->index(['min_amount', 'max_amount'], 'mfo_amount_index');
            $table->index(['min_term', 'max_term'], 'mfo_term_index');
            $table->index(['min_age', 'max_age'], 'mfo_age_index');
            $table->index(['free_credit_bid'], 'mfo_free_credit_bid_index');


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
        Schema::dropIfExists('mfo');
    }
}
