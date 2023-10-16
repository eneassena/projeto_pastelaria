<?php 


namespace Source\Controller\Cliente\Service;

use Source\Models\site\User;

class ClienteService {

    public function cliente_validate_login(array $credenciais): ?User {
        $data = filter_var_array($credenciais, FILTER_SANITIZE_SPECIAL_CHARS);

        return (new User)->login($data);
    }

    public function create_gestao_login($instance): string {
        if (!$instance->success) {
            return "Crendenciais invalidas";
        }
        if (strcmp($instance->user->tipoUsuario, 'cliente') == 0) {
            $_SESSION['user_' . $instance->user->tipoUsuario] = [
                'id' => $instance->user->idUser,
                'tipoUser' => $instance->user->tipoUsuario
            ];
            (new User)->ativarUser((int) $instance->user->idUser, '1');
            return sprintf("Usuário %s, logado com sucesso!", $instance->user->data()->login);
        }
        return "Crendenciais invalidas";
    }
}