<?php 

namespace Source\Controller\Cliente\Interface;



interface ClienteInterface {
    
    public function update();
    public function check_login(array $data): void;
    public function logout();
    public function create(array $data): void;
    public function store(array $data): void;
}  