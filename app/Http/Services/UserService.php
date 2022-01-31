<?php

namespace App\Http\Services;

use App\Models\User;
use App\Models\Endereco;
use App\Models\EnderecoCliente;
use Illuminate\Support\Facades\Hash;

class UserService {
    /**
     * @param string[$login]
     * @return bool
     */
    public function checkFieldLoginUser(string $login): bool
    {
        $user = User::where('login', $login)->first();
        
        return $user ? $user->exists : false;
    }

    /**
     * @param array[$data]
     * @return bool
     */
    public function storeUser(array $data): bool {

        if($this->checkFieldLoginUser($data['login'])){
            return false;
        }

        $user = new User();
        $user->name = $data['name'];
        $user->telefone = $data['telefone'];
        $user->login = $data['login'];
        $user->password =  Hash::make($data['password']);
        $user->is_super_user = $data['is_super_user'];

        $end = new Endereco();
        $end->bairro = $data['bairro'];
        $end->complemento = $data['complemento'];
        $end->numero = $data['numero'];

        $user->save();
        $end->save();

        (new EnderecoCliente)->endereco_has_cliente($end->id_endereco, $user->id);

        return true;
    }

}
