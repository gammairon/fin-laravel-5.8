<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigInteger('ratingable_id');
            $table->string('ratingable_type');
            $table->integer('votes')->default(0);
            $table->decimal('total', 11, 2)->default(0.00);
            $table->decimal('average', 3, 2)->default(0.00);

            $table->primary(['ratingable_id', 'ratingable_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
