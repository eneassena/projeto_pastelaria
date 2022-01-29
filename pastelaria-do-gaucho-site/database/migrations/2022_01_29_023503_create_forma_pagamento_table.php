<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormaPagamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forma_pagamento', function (Blueprint $table) {
            $table->id('id_forma_pagamento');
            $table->string('cartao', 15);
            $table->decimal('saldo_pagar', 5,2);
            $table->unsignedBigInteger('fk2_pedido_id');
            $table->timestamps();

            $table->foreign('fk2_pedido_id')
                ->references('id_pedido')->on('pedido')
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
        Schema::dropIfExists('forma_pagamento');
    }
}
