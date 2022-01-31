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
            $table->string('delivery', 50)->default('Entrega');
            $table->string('situacao', 45)->default('em andamento');
            $table->date('data_pedido');
            $table->decimal('taxa_entrega', 5, 2)->nullable();
            $table->unsignedBigInteger('fk2_user_id');
            $table->timestamps();

            $table->foreign('fk2_user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
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
