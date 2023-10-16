<?php 


namespace Source\Controller\Restrita\Interface;

use stdClass;

interface AuthInterface
{
    // user admin
    public function showUserOn(): stdClass|null;
    public function login_admin(array $data = []): void;
    public function login_validate(array $value = []): void;
    public function logout(): void;
}
