<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bebidas extends Model
{
    use HasFactory;

    /** @var string[$table] */
    protected $table = 'bebidas';

    /** @var string[$primaryKey] */
    protected $primaryKey = 'id_bebida';

    /** @var array[$fillable] */
    protected $fillable = [
        'tipo_bebida',
        'tamanho',
        'valor'
    ];

}
