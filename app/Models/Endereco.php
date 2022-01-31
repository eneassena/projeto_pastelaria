<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    /** @var string[$table] */
    protected $table = 'endereco';

    /** @var string[$primaryKey] */
    protected $primaryKey = 'id_endereco';

    /** @var array[$fillable] */
    protected $fillable = [
        'bairro',
        'numero',
        'complemento'
    ];
}
