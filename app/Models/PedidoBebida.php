<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoBebida extends Model
{
    use HasFactory;

    /** @var stirng[$table] */
    protected $table = 'pedido_bebidas';

    /** @var string[$primaryKey] */
    protected $primaryKey = 'id_pedido_bebida';

    /** @var array[$fillable]*/
    protected $fillable = [
        'fk1_pedido_id',
        'fk1_bebida_id',
        'quantidade',
    ];
}
