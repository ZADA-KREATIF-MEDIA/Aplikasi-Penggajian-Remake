<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nip')->nullable(); 
            $table->string('pendidikan')->nullable(); 
            $table->string('kota_lahir')->nullable(); 
            $table->string('tgl_lahir')->nullable(); 
            $table->string('jk')->nullable(); 
            $table->string('agama')->nullable(); 
            $table->text('alamat')->nullable(); 
            $table->integer('jabatan_id')->nullable();
            $table->string('level');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
