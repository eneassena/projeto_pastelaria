<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    /** @var stirng[$table] */
    protected $table = 'pedido';

    /** @var string[$primaryKey] */
    protected $primaryKey = 'id_pedido';

    /** @var array[$fillable]*/
    protected $fillable = [
        'valor_total',
        'delivery',
        'situacao',
        'data_pedido',
        'fk2_user_id'
    ];


}
