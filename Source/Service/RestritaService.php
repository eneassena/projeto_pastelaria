<?php

namespace Source\Service;


use Source\Models\site\BebidaModel;
use Source\Models\site\CardapioPastelModel;

class RestritaService {

  public function setAttributesPastel($pastel, $dataFormPost)
  {
    $pastel->saborDoPastel = $dataFormPost['saborDoPastel'];
    $pastel->ingrediente = $dataFormPost['ingrediente'];
    $pastel->valorUnitario = $dataFormPost['valorUnitario'];
    return $pastel;
  }

	public function editar_pastel(array $dataFormPost) : bool
	{
      $idPastel = isset($dataFormPost['idPastel']) ? (int) $dataFormPost['idPastel'] : 0;

	    $pastel = (new CardapioPastelModel)->findById($idPastel);

      if($pastel) {

        $pastel = $this->setAttributesPastel($pastel, $dataFormPost);

        return $pastel->save();

      } else {

        $pastel = (new CardapioPastelModel)->new_cardapio($dataFormPost);

        return $pastel->success;
        }
	}

  public function setAttributesBebida($bebida, $dataFormPost)
  {
    $bebida->tipoDaBebida = $dataFormPost['tipo_bebida'];
    $bebida->sabor = $dataFormPost['sabor'];
    $bebida->fruto = $dataFormPost['fruto'];
    $bebida->quantidadeEmMl = $dataFormPost['quantidadeEmMl'];
    $bebida->valorUnidade = $dataFormPost['valor_unidade'];
    return $bebida;
  }

  public function editar_bebida(array $dataFormPost) : bool
  {
      $idBebida = isset($dataFormPost['id_bebida']) ? (int) $dataFormPost['id_bebida'] : 0;

      $bebida = (new BebidaModel)->findById($idBebida);

      if($bebida){

        $bebida = (new BebidaModel)->edit_bebida($dataFormPost);

        return $bebida->save();

      } else {
            $bebida = (new BebidaModel)->create_bebida($dataFormPost);

            return $bebida->success;
        }
  }
}
