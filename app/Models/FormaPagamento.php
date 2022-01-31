<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaPagamento extends Model
{
    use HasFactory;

    /** @var string[$table] */
    protected $table = 'forma_pagamento';

    /** @var string[$primaryKey] */
    protected $primaryKey = 'id_forma_pagamento';

    /** @var array[$fillable] */
    protected $fillable = [
        'tipo_pagamento',
        'saldo_pago',
        'fk2_pedido_id',
    ];
}
