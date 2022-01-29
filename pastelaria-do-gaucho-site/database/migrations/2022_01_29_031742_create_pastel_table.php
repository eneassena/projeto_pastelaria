<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastel', function (Blueprint $table) {
            $table->id('id_pastel');
            $table->string('sabor_pastel');
            $table->decimal('valor_unidade', 5, 2);
            $table->integer('qtd_pastel');
            $table->unsignedBigInteger('fk1_cardapio_pastel_id');
            $table->timestamps();

            $table->foreign('fk1_cardapio_pastel_id')
                ->references('id_cardapio')->on('cardapio_pastel')
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
        Schema::dropIfExists('pastel');
    }
}
