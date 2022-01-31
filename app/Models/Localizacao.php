<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localizacao extends Model
{
    use HasFactory;

    /** @var stirng[$table] */
    protected $table = 'localizacao';

    /** @var string[$primaryKey] */
    protected $primaryKey = 'id_localizacao';

    /** @var array[$fillable]*/
    protected $fillable = [
        'nome_bairro'
    ];
}
