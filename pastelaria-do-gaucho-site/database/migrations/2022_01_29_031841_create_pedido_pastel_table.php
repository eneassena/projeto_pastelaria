<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoPastelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_pastel', function (Blueprint $table) {
            $table->id('id_pedido_pastel');
            $table->unsignedBigInteger('fk3_pedido_id');
            $table->unsignedBigInteger('fk1_pastel_id');
            $table->timestamps();

            $table->foreign('fk3_pedido_id')
                ->references('id_pedido')->on('pedido')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('fk1_pastel_id')
                ->references('id_pastel')->on('pastel')
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
        Schema::dropIfExists('pedido_pastel');
    }
}
