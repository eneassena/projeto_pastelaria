<?php


namespace Src\models;

use CoffeeCode\DataLayer\DataLayer;


class EnderecoModel extends DataLayer
{
    /** @var array[$attributes] */
    private $attributes = [ 'bairro', 'numero', 'complemento' ];

	public function __construct()
	{
		parent::__construct("endereco", $this->attributes, "idEndereco");
	}

    /**
     * @param array[$data]
     * @return EnderecoModel
     */
    public function cadastrarEndereco(array $data): EnderecoModel
    {
        $this->bairro = $data['bairro'];
        $this->numero = $data['numero'];
        $this->complemento = $data['complemento'];
        // $this->save();
        return $this;
    }
}
