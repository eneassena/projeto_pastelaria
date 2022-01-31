<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
    use HasFactory;

    /** @var string[$table] */
    protected $table = 'cardapio';

    /** @var string[$primaryKey] */
    protected $primaryKey = 'id_cardapio';

    /** @var array[$fillable] */
    protected $fillable = [
        'sabor',
        'ingrediente',
        'valor',
    ];
}
