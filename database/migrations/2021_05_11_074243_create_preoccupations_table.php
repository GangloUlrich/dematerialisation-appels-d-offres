<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreoccupationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preoccupations', function (Blueprint $table) {
            $table->id();
            $table->string('objet',300);
            $table->longText('description');
            $table->enum('type_preoccupation',['question','recours']);
            $table->string('doc_path',200);
            $table->timestamps();
            $table->unsignedBigInteger('marche_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('marche_id')->references('id')->on('marches');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preoccupations');
    }
}
