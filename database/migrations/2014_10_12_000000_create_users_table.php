<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('code',30)->nullable();
            $table->enum('type',['admin','c_individuel','s_public','s_privee']);
            $table->string('adresse' ,'300')->nullable();
            $table->string('tel',100)->nullable();
            $table->string('website',100)->nullable();
            $table->string('logo_path',100)->nullable();
            $table->string('res_grade',100)->nullable();
            $table->string('nom_res',100)->nullable();
            $table->BigInteger('num_ifu')->nullable();
            $table->string('num_rccm',100)->nullable();
            $table->text('qualifications')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
