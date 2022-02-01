<?php

namespace Source\Models\site;

use CoffeeCode\DataLayer\DataLayer;


class BebidaModel extends DataLayer
{
  private $attributes = [
    'tipoDaBebida',
    'quantidadeEmMl',
    'valorUnidade'
  ];

  public function __construct()
  {
    parent::__construct('bebida', $this->attributes, 'idBebida');
  }

  /**
   * @param string[$tipo]
   * @return void
   */
  public function setTipoDaBebida(string $tipo): void
  {
    $this->tipoDaBebida = $tipo;
  }

  /**
   * @return string
   */
  public function getTipoDaBebida(): string
  {
    return $this->tipoDaBebida;
  }

  /**
   * @param array[$data]
   * @return BebidaModel
   */
  public function create_bebida(array $data): BebidaModel
  {
    $bebida = new BebidaModel;
    $bebida->tipoDaBebida = $data['tipoDaBebida'];
    $bebida->sabor = $data['sabor'];
    $bebida->fruto = $data['fruto'];
    $bebida->quantidadeEmMl = $data['quantidadeEmMl'];
    $bebida->valorUnidade = $data['valorUnidade'];
    $bebida->success = $bebida->save();
    return $bebida;
  }

  /**
   * @param array[$data]
   * @return BebidaModel
   */
  public function edit_bebida(array $data): BebidaModel
  {
    $this->tipoDaBebida = $data['tipoDaBebida'];
    $this->sabor = $data['sabor'];
    $this->fruto = $data['fruto'];
    $this->quantidadeEmMl = $data['quantidadeEmMl'];
    $this->valorUnidade = $data['valorUnidade'];
    $this->success = $this->save();
    return $this;
  }

  /**
   * @param array[$data]
   * @return BebidaModel
   */
  public function delete_bebida(array $data): BebidaModel
  {
    $this->bebida = $this->findById((int) $data['idBebida']);

    if ($this->bebida) {
      $this->bebida->destroy();
      $this->success = true;
    } else {
      $this->success = false;
    }
    return $this;
  }
}
