<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSROsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_r_os', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('reference');
            $table->integer('year');
            $table->string('issuing_authority');
            $table->string('free_text');
            $table->string('file_name');
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
        Schema::dropIfExists('s_r_os');
    }
}
