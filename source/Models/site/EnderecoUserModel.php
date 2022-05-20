<?php


namespace Source\Models\site;

use CoffeeCode\DataLayer\DataLayer;
use stdClass;

/**
 *
 */
class EnderecoUserModel extends DataLayer
{
	public function __construct()
	{
		parent::__construct("endereco_user", [
            'fk2_user_id',
            'fk1_idEndereco'
        ], 'idEnderecoUser');
	}

	/**
	 * @param User[$user]
	 * @param EnderecoModel[$endereco]
	 * @return EnderecoUserModel
	 */
	public function aplicarEnderecoUser(User $user, EnderecoModel $endereco): EnderecoUserModel {
		$this->fk2_user_id = $user->idUser;
		$this->fk1_idEndereco = $endereco->idEndereco;
		return $this;
	}

	/**
	 * @param User[$user]
	 * @param EnderecoModel[$endereco]
	 * @return bool
	 */
	public function adicionar_cliente(User $user, EnderecoModel $endereco): bool
	{
		return $this->aplicarEnderecoUser($user, $endereco)->save();
	}

	/**
	 * @param int[$userId]
	 * @return null|stdClass
	 */
	public function buscarEndereco(int $userId): null|stdClass
	{
        $user = (new User())->findById($userId);
        $user = $user->data();
        $ends = $this->find()->fetch(true);
        foreach($ends as $value) {
            if($value->fk2_user_id == $user->idUser)
                return (new EnderecoModel())->findById($value->fk1_idEndereco)->data();
        }
        return null;
	}


	/**
	 * @param User[$user]
	 * @return stdClass
	 */
	public function buscar_endereco(User $user): stdClass
	{
		return $this->buscarEndereco($user->idUser);
	}
}
