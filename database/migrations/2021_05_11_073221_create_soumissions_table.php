<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoumissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soumissions', function (Blueprint $table) {
            $table->id();
            $table->integer('cout');
            $table->date('date_soumission')->nullable();
            $table->text('details');
            $table->enum('statut',['en cours','soumis'])->default('en cours');
            $table->integer('total_note')->nullable();
            $table->string('decision',300)->nullable();
            $table->mediumText('observations')->nullable();
            $table->string('lot',300)->nullable();
            $table->unsignedBigInteger('marche_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('marche_id')->references('id')->on('marches');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('soumissions');
    }
}
