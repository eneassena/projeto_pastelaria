<?php

use PHPUnit\Framework\TestCase;
use Source\Models\site\User;

final class RestritaTest extends TestCase {

    
    /**
     * Método realiza o caso de teste de criação de usuario admin
     */
    public function testCreateAdministrativo(): void
    {
        $resultAdmin = (new User)->create_user_superuser([
            'nome' => 'Paulo Perera',
            'celular' => '7595652312',
            'tipoUsuario' => 'superuser',
            'user_login' => 'paulo123',
            'user_senha' => '123456'
        ]);

        $this->assertTrue( $resultAdmin->success );
    }


    /**
     * Método realiza o caso de teste de login de usuario admin
     */
    public function testLoginAdministrativo(): void
    {
        $resultAdmin = (new User)->loginAdmin([
            'user_login' => 'paulo123',
            'user_senha' => '123456'
        ]);

        $this->assertTrue( $resultAdmin->success );
    }
}