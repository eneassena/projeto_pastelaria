<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardapioPastelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      
    public function up()
    {
        Schema::create('cardapio_pastel', function (Blueprint $table) {
            $table->id('id_cardapio');
            $table->string('nome_card');
            $table->text('ingrediente_card');
            $table->decimal('valor_unidade_card', 5, 2);
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
        Schema::dropIfExists('cardapio_pastel');
    }
}
