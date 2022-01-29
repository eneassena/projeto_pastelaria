<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoBebidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_bebidas', function (Blueprint $table) {
            $table->id('id_pedido_bebida');
            $table->unsignedBigInteger('fk1_pedido_id');
            $table->unsignedBigInteger('fk1_bebida_id');
            $table->integer('quantidade');
            $table->timestamps();

            $table->foreign('fk1_pedido_id')
                ->references('id_pedido')->on('pedido')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('fk1_bebida_id')
                ->references('id_bebida')->on('bebidas')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_bebidas');
    }
}
