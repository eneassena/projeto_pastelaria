<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnderecoCliente extends Model
{
    use HasFactory;

    /** @var string[$table] */
    protected $table = 'endereco_cliente';

    /** @var string[$primaryKey] */
    protected $primaryKey = 'id_endereco_cliente';

    /**
    * campos visiveis para insert de novos registros
    * @var array[$fillable]
    */
    protected $fillable = [
        'fk1_endereco_id',
        'fk1_user_id'
    ];

    /**
    * @param int[$enderecoId]
    * @param int[$clienteId]
    * @return void
    */
    public function endereco_has_cliente(int $enderecoId, int $clienteId): void
    {
        $this->fk1_endereco_id = $enderecoId;
        $this->fk1_user_id = $clienteId;
        $this->save();
    }
}
