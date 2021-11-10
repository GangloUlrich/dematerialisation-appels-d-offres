<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiecesNecessairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piecesnecessaires', function (Blueprint $table) {
            $table->id();
            $table->text('intitule');
            $table->boolean('eliminatoire');
            $table->unsignedBigInteger('marche_id');
            $table->foreign('marche_id')->references('id')->on('marches');
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
        Schema::dropIfExists('pieces_necessaires');
    }
}
