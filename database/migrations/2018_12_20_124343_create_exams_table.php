<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->boolean('open');
            $table->boolean('passed');
            $table->integer('pre_A1');
            $table->boolean('pre_A1_pass');
            $table->integer('A1');
            $table->boolean('A1_pass');
            $table->integer('A2');
            $table->boolean('A2_pass');
            $table->integer('B1');
            $table->boolean('B1_pass');
            $table->integer('B2');
            $table->boolean('B2_pass');
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
        Schema::dropIfExists('exams');
    }
}
