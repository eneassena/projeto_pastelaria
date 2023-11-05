<?php

namespace Src\models;

use CoffeeCode\DataLayer\DataLayer;

class CardapioPastelModel extends DataLayer
{
  /** @var bool[$success] */
  public $success = false;

  /** @var array[$attributes] */
  private $attributes = [ 'saborDoPastel', 'valorUnitario' ];

  function __construct()
  {
    parent::__construct('cardapio_pastel', $this->attributes, 'idCardapioPastel');
  }

  /**
   * @param array[$data]
   * @return CardapioPastelModel
   */
  public function updateCardapio(array $data): CardapioPastelModel {
    $this->saborDoPastel = $data['saborDoPastel'];
    $this->ingrediente = $data['ingrediente'];
    $this->valorUnitario = $data['valorUnitario'];
    $this->save();
    return $this;
  }

  /**
   * @param array[$data]
   * @return CardapioPastelModel
   */
  public function new_cardapio(array $data): CardapioPastelModel
  {
    if(in_array('', $data)){
      $this->success = false;
      return $this;
    } else {
      $cad = new CardapioPastelModel();
      $cad->saborDoPastel = $data['saborDoPastel'];
      $cad->ingrediente = $data['ingrediente'];
      $cad->valorUnitario = $data['valorUnitario'];
      $this->success = $cad->save();
      return $this;
    }
  }

  /**
   * @param array[$data]
   * @return CardapioPastelModel
   */
  public function edit_pastel(array $dataEdit): CardapioPastelModel
  {
    $pastel = (new CardapioPastelModel)->findById((int)$dataEdit['idPastel']);

    if($pastel){
      $pastel->saborDoPastel = $dataEdit['saborDoPastel'];
      $pastel->ingrediente = $dataEdit['ingrediente'];
      $pastel->valorUnitario = $dataEdit['valorUnitario'];
      $this->success = $pastel->save();
    } else {
      $this->success = false;
    }

    return $this;
  }


  /**
   * @param int[$id_pastel]
   * @return CardapioPastelModel
   */
  public function delete_pastel(int $id_pastel): CardapioPastelModel
  {
    $pastel = $this->findById($id_pastel);

    if($pastel){ 
      $pastel->destroy();
      $this->success = true;
    } else {
      $this->success = false;
    }    
    return $this;
  }
}
