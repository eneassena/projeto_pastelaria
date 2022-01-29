<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 
         
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id('id_admin', 150);
            $table->string('nome', 150);
            $table->string('login', 150);
            $table->string('senha', 150);
            $table->string('perfil')->default('administrador');
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
        Schema::dropIfExists('admin');
    }
}
