<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaselawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caselaws', function (Blueprint $table) {
            $table->increments('id');
            $table->string('citation');
            $table->string('journal_title');
            $table->string('title');
            $table->string('court');
            $table->string('bench');
            $table->string('date');
            $table->string('year');
            $table->string('lawyers');
            $table->string('areaoflaw');
            $table->string('keywords');
            $table->string('sourcescited');
            $table->string('text');
            $table->string('casescited');
            $table->string('file_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caselaws');
    }
}
