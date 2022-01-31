<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoCardapio extends Model
{
    use HasFactory;

    /** @var stirng[$table] */
    protected $table = 'pedido_cardapio';

    /** @var string[$primaryKey] */
    protected $primaryKey = 'id_pedido_cardapio';

    /** @var array[$fillable]*/
    protected $fillable = [
        'fk3_pedido_id',
        'fk1_cardapio_id',
        'quantidade'
    ];
}
