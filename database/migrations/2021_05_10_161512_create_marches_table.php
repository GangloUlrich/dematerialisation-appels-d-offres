<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marches', function (Blueprint $table) {
            $table->id();
            $table->string('reference', 100);
            $table->mediumText('intitule');
            $table->enum('type_marche', ['fournitures', 'services', 'prestations intellectuelles', 'travaux']);
            $table->enum('type_source', ['budget_autonome', 'financement_exterieur', 'budget_national', 'don', 'partenariat']);
            $table->string('type_selection', 400);
            $table->enum('type_organe', ['DNCMP', 'CCMP']);
            $table->enum('mode_passation', ['aaoo', 'aaor', 'aaoi', 'dc', 'ami', 'amii', 'ddp']);
            $table->integer('nbr_lot')->nullable();
            $table->integer('total_note')->nullable();
            $table->enum('statut', ['en_cours', 'attribué', 'en_attente'])->default('en_attente');
            $table->boolean('lot');
            $table->float('montant', 20, 5);
            $table->string("attributaire", 100)->nullable();
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('marches');
    }
}
