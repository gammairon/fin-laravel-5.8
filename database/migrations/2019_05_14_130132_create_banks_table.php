<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksTable extends Migration
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
            $table->bigInteger('tag_id')->unsigned();
            $table->string('slug')->unique();
            $table->string('name');
            $table->decimal('rating', 5, 2)->default(0.00);
            $table->string('title_h1');
            $table->text('description')->nullable();
            $table->text('shareholders')->nullable();
            $table->string('postcode')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('street');
            $table->string('house')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('web_site')->nullable();
            $table->string('mfo')->nullable();
            $table->string('egrdpou')->nullable();

            $table->string('ref_link')->nullable();
            $table->string('registration')->nullable();
            $table->string('license')->nullable();


            $table->text('direct_shareholders')->nullable();
            $table->string('country_capital')->nullable();
            $table->text('preview')->nullable();

            $table->timestamps();

            //Index
            $table->index(['name']);

            //Foreign
            $table->foreign('tag_id')
                ->references('id')->on('tags')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banks');
    }
}
