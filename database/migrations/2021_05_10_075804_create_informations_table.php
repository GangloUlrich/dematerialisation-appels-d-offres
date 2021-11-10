<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->id();
            $table->string('code',30)->nullable();
            $table->enum('type',['admin','c_individuel','s_public','s_privee'])->default('admin');
            $table->string('adresse' ,'300')->nullable();
            $table->string('tel',100)->nullable();
            $table->string('website',100)->nullable();
            $table->string('logo_path',100)->nullable();
            $table->string('res_grade',100)->nullable();
            $table->string('nom_res',100)->nullable();
            $table->integer('num_ifu')->nullable();
            $table->string('num_rccm',100)->nullable();
            $table->text('qualifications')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('informations');
    }
}
