<?php

namespace Source\Models\site;

use CoffeeCode\DataLayer\DataLayer;

class FormaPagamentoModel extends DataLayer
{
	/** @var array[$formas] */
    public static $formas = ['Dinheiro', 'Cartão'];

	public function __construct()
	{
		parent::__construct('forma_pagamento', ['tipoDoPagamento'], 'idFormaPag');
	}

	/**
	 * @param string[$fieldName]
	 * @return FormaPagamentoModel
	 */
	public function formaPagamento(string $fieldName): FormaPagamentoModel
	{
        $data = $this->find("tipoDoPagamento=:fieldName", "fieldName={$fieldName}")->fetch();
		return $data;
	}
}
