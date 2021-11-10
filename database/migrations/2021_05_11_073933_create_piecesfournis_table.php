<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiecesfournisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piecesfournis', function (Blueprint $table) {
            $table->id();
            $table->string('doc_path',200);
            $table->boolean('validite')->nullable();
            $table->mediumText('observations')->nullable();
            $table->unsignedBigInteger('soumission_id');
            $table->foreign('soumission_id')->references('id')->on('soumissions');
            $table->unsignedBigInteger('piecenecessaire_id');
            $table->foreign('piecenecessaire_id')->references('id')->on('piecesnecessaires');
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
        Schema::dropIfExists('piecesfournis');
    }
}
