<?php 


namespace Source\Controller\Cliente\Service;

use Source\Models\site\User;

class ClienteService {

    public function cliente_validate_login(array $credenciais): ?User {
        $data = filter_var_array($credenciais, FILTER_SANITIZE_SPECIAL_CHARS);

        return (new User)->login($data);
    }
}