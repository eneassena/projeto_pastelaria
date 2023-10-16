<?php 


namespace Source\Controller\Restrita\Interface;

use stdClass;

interface GestaoLojaInterface 
{
    // gerenciamento do pedido
    public function pedido(array $data): void;
    public function storePedidoDetalhes(): void;
    public function remove_pedido(array $data): void;
    public function buscarPedidoDetalhes(array $data): void;
    public function updateSessionPastel(string $name = 'pastel'): bool;
}
