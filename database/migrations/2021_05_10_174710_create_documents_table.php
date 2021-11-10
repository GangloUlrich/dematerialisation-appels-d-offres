<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('reference',100);
            $table->enum('type_document',['dao','aao','pv_attribution_provisoire','pv_attribution_definitive','pv_ouverture']);
            $table->text('description')->nullable();
            $table->float('montant',20,5)->nullable();
            $table->string('doc_path',300);
            $table->datetime('date_ouverture')->nullable();
            $table->datetime('date_limite')->nullable();
            $table->text('meet_link')->nullable();
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
        Schema::dropIfExists('documents');
    }
}
