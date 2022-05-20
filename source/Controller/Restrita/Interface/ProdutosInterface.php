<?php 


namespace Source\Controller\Restrita\Interface;
 

interface ProdutosInterface 
{
    // produtos da loja
    public function pastel(array $data): void;
    public function edit_pastel(array $data = []): void;
    public function store_pastel(): void;
    public function remove_pastel(array $data): void;

    public function bebida(array $data): void;
    public function edit_bebida(array $data= []): void;
    public function store_bebida(): void;
    public function remove_bebida(array $data): void;
}
