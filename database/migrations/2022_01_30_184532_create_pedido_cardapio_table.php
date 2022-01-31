<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoCardapioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_cardapio', function (Blueprint $table) {
            $table->id('id_pedido_cardapio');
            $table->unsignedBigInteger('fk3_pedido_id');
            $table->unsignedBigInteger('fk1_cardapio_id');
            $table->Integer('quantidade');
            $table->timestamps();

            $table->foreign('fk3_pedido_id')
                ->references('id_pedido')->on('pedido')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('fk1_cardapio_id')
                ->references('id_cardapio')->on('cardapio')
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
        Schema::dropIfExists('pedido_cardapio');
    }
}
