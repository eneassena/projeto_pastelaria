<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecoClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco_cliente', function (Blueprint $table) {
            $table->id('id_endereco_cliente');
            $table->unsignedBigInteger('fk1_endereco_id');
            $table->unsignedBigInteger('fk1_user_id');

            $table->foreign('fk1_endereco_id')
                ->references('id_endereco')->on('endereco')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('fk1_user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('endereco_cliente');
    }
}
