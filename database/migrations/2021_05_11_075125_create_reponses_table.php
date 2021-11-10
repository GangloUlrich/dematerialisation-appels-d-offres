<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reponses', function (Blueprint $table) {
            $table->id();
            $table->longText('reponse');
            $table->unsignedBigInteger('marche_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('preoccupation_id');
            $table->foreign('marche_id')->references('id')->on('marches');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('preoccupation_id')->references('id')->on('preoccupations');
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
        Schema::dropIfExists('reponses');
    }
}
