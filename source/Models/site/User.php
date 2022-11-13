<?php

namespace Source\Models\site;
 

class User extends \CoffeeCode\DataLayer\DataLayer
{
    /** @var bool[$erro] */
    public $erro = false;
    /** @var bool[$success] */
    public $success = false;
    /** @var string[$message] */
    public $message = null;
    /** @var stdClass[$detalhes] */
    public $detalhes = null;

    public function __construct()
    {
        parent::__construct('users', ['nome', 'telefone', 'tipoUsuario'], 'idUser');
    }
 
    /**
     * Método responsável por cria um novo cliente com login e senha
     * */
    public function create_user_cliente(array $data): User
    { // 'cliente|superuser|empreendedor|comun'

        $user_exists = $this->find("login=:log", "log={$data['user_login']}")->fetch();

        if(is_null($user_exists))
        {
            if(strlen($data['user_login']) == 0 && strlen($data['user_senha']) == 0)
            {
                $this->success = false;
                return $this;
            }

            $this->create_user_comun([
                'nome' => $data['nome'],
                'telefone' => $data['celular'],
                'tipoUsuario' => 'cliente'
            ]);

            $this->hash_senha_user([
                'user_login' => $data['user_login'],
                'user_senha' => $data['user_senha']
            ]);

            $this->create_endereco_user([
                'bairro' => $data['bairro'],
                'numero' => $data['numero'],
                'complemento' => $data['complemento']
            ]);

            $this->success = true;
            return $this;

        } else {
            $this->success = false;
            return $this;
        }
    }

    /**
     * antes de salva um novo cliente a senha é encriptada
     * usando este método
     * */
    private function hash_senha_user(array $data_login): User
    {
        $this->login = $data_login['user_login'];

        $this->senha = password_hash($data_login['user_senha'], PASSWORD_DEFAULT, [PASSWORD_BCRYPT_DEFAULT_COST]);

        return $this;
    }

    /**
     * cria um cliente comun com nome e telefone
     * */
    public function create_user_comun(array $data): User
    { // 'cliente|superuser|empreendedor|comun'
        if(empty($data['nome']) || empty($data['telefone']) )
        {
            $this->success = false;
            return $this;
        } else
        {
            $this->nome =$data['nome'];
            $this->telefone =$data['telefone'];
            $this->tipoUsuario = $data['tipoUsuario'];
            return $this;
        }
    }

    /**
     * criar o endereço de um cliente
     * */
    public function create_endereco_user(array $data): User
    {
        if(empty($data['bairro']) || empty($data['numero']) || empty($data['complemento']) ){
            $this->success = false;
            return $this;
        } else {

            $endereco = (new EnderecoModel())->cadastrarEndereco([
                'bairro' => $data['bairro'],
                'numero' => $data['numero'],
                'complemento' => $data['complemento']
            ]);

            $this->save();
            $endereco->save();

            $endUser = (new EnderecoUserModel())->aplicarEnderecoUser($this, $endereco);
            // $endUser->save();

            $this->success = $endUser->save();
            return $this;
        }
    }

    /**
     * Método responsável por cria um novo administrador
     * @param array[$data]
     * @return User
     */
    public function create_user_superuser(array $data): User
    { // 'cliente|superuser|empreendedor|comun'

        $adm = $this->find("login=:log", "log={$data['user_login']}")->fetch();
        
        if(!$adm){
            $this->create_user_comun([
                'nome' => $data['nome'],
                'telefone' => $data['celular'],
                'tipoUsuario' => $data['tipoUsuario']
            ]);

            $this->hash_senha_user([
                'user_login' => $data['user_login'],
                'user_senha' => $data['user_senha']
            ]);

            $this->success = $this->save();

            // $this->save();
        } else {
            $this->success = false;
            return $this;
        }
        return $this;
    }

    /**
     * buscar um usuario com seu endereco pelo seu id
     * */
    public function showUser(int $iduser): User
    {
        $user = $this->findById($iduser);
        if($user){
            $end = (new EnderecoUserModel())->buscarEndereco($user->data()->idUser);
            $this->detalhes                 = new \stdClass();
            $this->detalhes->idUser         = $user->idUser;
            $this->detalhes->nome           = $user->nome;
            $this->detalhes->telefone       = $user->telefone;
            $this->detalhes->bairro         = $end->bairro;
            $this->detalhes->numero         = $end->numero;
            $this->detalhes->complemento    = $end->complemento;
            $this->success = true;
        } else {
            $this->success = false;
        }
        return $this;
    }

    /**
     * método responsável por buscar o cliente logado
     * */
    public function login(array $data): User
    {
        if(!empty($data['user_login']) && !empty($data['user_senha']))
        {
            $user = $this->find("login=:data_login", "data_login={$data['user_login']}")->fetch();
            if($user)
            {
                if(
                    password_verify($data['user_senha'], $user->data()->senha ) &&
                    $user->data()->tipoUsuario === 'cliente')
                { 
                    $this->user = $user;
                    $this->success = true;
                    return $this;
                } else {
                    $this->user = null;
                    $this->success = false;
                    return $this;
                }
            }
        }

        $this->success = false;
        return $this;
    }

    /**
     * Método responsável por ativa um Usuário
     */
    public function ativarUser(int $userId, string $action='1'): bool {
        $us = $this->findById((int) $userId);
        $us->ativo = $action;
        return $us->save();
    }


    /**
     * método responsável por buscar o usuario admin
     * */
    public function loginAdmin(array $data): User 
    {
        if(!empty($data['user_login']) && !empty($data['user_senha']))
        {
            $user = $this->find("login=:data_login", "data_login={$data['user_login']}")->fetch();

            if($user && password_verify($data['user_senha'], $user->data()->senha ))
            {
                if($user->data()->tipoUsuario == 'superuser')
                {
                    $this->user = $user->data();
                    $this->success = true;
                } else {
                    $this->user = null;
                }
            }
        } else
        {
            $this->success = false;
        }
        return $this;
    }
}
