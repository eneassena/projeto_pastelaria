<?php


namespace Source\Models\site;

use CoffeeCode\DataLayer\DataLayer;

class LocalizacaoModel extends DataLayer
{
  public function __construct()
  {
    parent::__construct('localizacaos', ['nomeDoBairro'], 'idLocalizacao');
  }
}
