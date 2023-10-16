<?php 

namespace Source\Controller\Cliente\Service;

class SessionService {
    public function __construct()
    {
        
    }
    function setSession(string $key, mixed $value) {
        $_SESSION[$key] = $value;
    }

    function getSession(string $key=''): mixed {
        if ($key) {
            return $_SESSION[$key];
        }
        return $_SESSION;
    } 
}