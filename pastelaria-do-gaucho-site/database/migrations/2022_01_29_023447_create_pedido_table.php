<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->id('id_pedido');
            $table->decimal('valor_total', 5, 2);
            $table->string('forma_entrega', 50)->nullable(false);
            $table->string('situacao', 45)->default('em andamento');
            $table->date('data_pedido')->nullable(false);
            $table->decimal('taxa_entrega', 5, 2);
            $table->unsignedBigInteger('fk2_cliente_id');
            $table->timestamps();

            $table->foreign('fk2_cliente_id')
                ->references('id_cliente')->on('cliente')
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
        Schema::dropIfExists('pedido');
    }
}
