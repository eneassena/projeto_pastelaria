<?php 


namespace Source\Service;

use Source\Models\site\User;

class PedidoService
{
    public function user_logado() : null|User
    {
        $userLogado  = null;
        if (isset($_SESSION['user_cliente']['id']) ) { 
            
            $idUser = (int) $_SESSION['user_cliente']['id']; 

            $userLogado = (new User())->showUser($idUser);
        }
        return $userLogado;
    }
}