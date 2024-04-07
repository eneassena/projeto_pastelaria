<?php
return array(
    'ddl_table' => [
        "CREATE TABLE IF NOT EXISTS `localizacaos` (
            `idLocalizacao` INT(11) NOT NULL AUTO_INCREMENT,
            `nomeDoBairro` VARCHAR(255) NOT NULL,
            `taxa` DECIMAL(7,2) NULL DEFAULT NULL,
            `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            PRIMARY KEY (`idLocalizacao`))
            ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;",
        "CREATE TABLE IF NOT EXISTS `users` (
            `idUser` INT(11) NOT NULL AUTO_INCREMENT,
            `nome` VARCHAR(100) NOT NULL,
            `telefone` VARCHAR(15) NOT NULL,
            `tipoUsuario` VARCHAR(50) NOT NULL DEFAULT 'comun' COMMENT 'cliente|superuser|empreendedor|comun',
            `login` VARCHAR(100) NULL DEFAULT NULL unique,
            `senha` VARCHAR(100) NULL DEFAULT NULL,
            `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            PRIMARY KEY (`idUser`)
        )  ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;",
        "CREATE TABLE IF NOT EXISTS `endereco` (
            `idEndereco` INT(11) NOT NULL AUTO_INCREMENT,
            `bairro` VARCHAR(200) NOT NULL,
            `numero` VARCHAR(15) NOT NULL,
            `complemento` VARCHAR(255) NOT NULL,
            `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            PRIMARY KEY (`idEndereco`)
        ) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;",
        "CREATE TABLE IF NOT EXISTS `cardapio_pastel` (
            `idCardapioPastel` INT(11) NOT NULL AUTO_INCREMENT,
            `saborDoPastel` VARCHAR(150) NOT NULL,
            `valorUnitario` DECIMAL(8,2) NOT NULL,
            `ingrediente` TEXT NULL DEFAULT NULL,
            `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            PRIMARY KEY (`idCardapioPastel`)
        ) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;",
        "CREATE TABLE IF NOT EXISTS `bebida` (
            `idBebida` INT(11) NOT NULL AUTO_INCREMENT,
            `tipoDaBebida` VARCHAR(100) NOT NULL,
            `sabor` VARCHAR(100) NULL DEFAULT NULL,
            `fruto` VARCHAR(50) NULL DEFAULT NULL,
            `quantidadeEmMl` VARCHAR(30) NOT NULL,
            `valorUnidade` DECIMAL(10,2) NOT NULL,
            `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            PRIMARY KEY (`idBebida`)
        ) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;",
        "CREATE TABLE IF NOT EXISTS `forma_pagamento` (
            `idFormaPag` INT NOT NULL AUTO_INCREMENT,
            `tipoDoPagamento` VARCHAR(200) NOT NULL,
            `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            PRIMARY KEY (`idFormaPag`))
        ENGINE = InnoDB;",
        "CREATE TABLE IF NOT EXISTS `detalhes_item_pedido` (
            `idDetalhesItemPedido` INT NOT NULL AUTO_INCREMENT,
            `quantidadeItems` INT NOT NULL,
            `total` DECIMAL(10,2) NOT NULL,
            `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            PRIMARY KEY (`idDetalhesItemPedido`))
        ENGINE = InnoDB;",
        "CREATE TABLE IF NOT EXISTS `pedido` (
            `idPedido` INT NOT NULL AUTO_INCREMENT,
            `valorTotal` DECIMAL(10,2) NULL default 0.00,
            `formaDeEntrega` VARCHAR(45) NOT NULL,
            `situacao` VARCHAR(45) NOT NULL DEFAULT 'em andamento',
            `dataDoPedido` DATE NOT NULL,
            `taxaDeEntrega` DECIMAL(10,2) NULL DEFAULT 0.00,
            `fk1_idFormaPag` INT NOT NULL,
            `fk1_user_id` INT NOT NULL,
            `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            PRIMARY KEY (`idPedido`),
            CONSTRAINT `fk1_idFormaPag` FOREIGN KEY (`fk1_idFormaPag`) REFERENCES `forma_pagamento`(`idFormaPag`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `fk1_user_id` FOREIGN KEY (`fk1_user_id`) REFERENCES `users`(`idUser`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE = InnoDB;",
        "CREATE TABLE IF NOT EXISTS `endereco_user` (
            `idEnderecoUser` INT NOT NULL AUTO_INCREMENT,
            `fk2_user_id` INT NOT NULL,
            `fk1_idEndereco` INT NOT NULL,
            `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            PRIMARY KEY (`idEnderecoUser`),
            CONSTRAINT `fk2_user_id` FOREIGN KEY (`fk2_user_id`) REFERENCES `users`(`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `fk1_idEndereco` FOREIGN KEY (`fk1_idEndereco`) REFERENCES `endereco`(`idEndereco`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE = InnoDB;",
        "CREATE TABLE IF NOT EXISTS `pedido_pastel` (
            `idPedidoPastel` INT NOT NULL AUTO_INCREMENT,
            `fk1_idPedido` INT NOT NULL,
            `fk1_idCardapioPastel` INT NOT NULL,
            `fk1_idDetalhesItemPedido` INT NOT NULL,
            `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            PRIMARY KEY (`idPedidoPastel`),
            CONSTRAINT `fk1_idPedido` FOREIGN KEY (`fk1_idPedido`) REFERENCES `pedido`(`idPedido`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `fk1_idCardapioPastel` FOREIGN KEY (`fk1_idCardapioPastel`) REFERENCES `cardapio_pastel`(`idCardapioPastel`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `fk1_idDetalhesItemPedido` FOREIGN KEY (`fk1_idDetalhesItemPedido`) REFERENCES `detalhes_item_pedido`(`idDetalhesItemPedido`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE = InnoDB;",
        "CREATE TABLE IF NOT EXISTS `pedido_bebida` (
            `idPedidoBebida` INT NOT NULL AUTO_INCREMENT,
            `fk2_idPedido` INT NOT NULL,
            `fk1_idBebida` INT NOT NULL,
            `fk2_idDetalhesItemPedido` INT NOT NULL,
            `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
            PRIMARY KEY (`idPedidoBebida`),
            CONSTRAINT `fk2_idPedido` FOREIGN KEY (`fk2_idPedido`) REFERENCES `pedido`(`idPedido`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `fk1_idBebida` FOREIGN KEY (`fk1_idBebida`) REFERENCES `bebida`(`idBebida`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `fk2_idDetalhesItemPedido` FOREIGN KEY (`fk2_idDetalhesItemPedido`) REFERENCES `detalhes_item_pedido`(`idDetalhesItemPedido`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE = InnoDB;",
    ],
    'ddl_procedures' => [
        "CREATE PROCEDURE `INSERT_IN_BEBIDA` (
            in tipoDaBebida varchar(150),
            in sabor varchar(100),
            in fruto varchar(50),
            in quantidadeEmMl varchar(30),
            in valorUnidade decimal(8, 2)
        )
        BEGIN 
            INSERT INTO `bebida` 
            VALUES (DEFAULT, tipoDaBebida,sabor, fruto, quantidadeEmMl, valorUnidade, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP() );
        END ;",
        "CREATE PROCEDURE `INSERT_IN_LOCALIZACAO` (
            in nomeDoBairro varchar(255),
            in taxa DECIMAL(8,2)
        )
        BEGIN
            INSERT INTO `localizacaos` 
            VALUES (DEFAULT, nomeDoBairro,taxa, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP() );
        END ;",
        "CREATE PROCEDURE `INSERT_IN_CARDAPIO_PASTEL` (
            in saborDoPastel varchar(150),
            in valorUnitario decimal(8,2),
            in ingrediente text   
        )
        BEGIN 
            INSERT INTO `cardapio_pastel` 
            VALUES (DEFAULT, saborDoPastel,valorUnitario, ingrediente, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP() );
        END ;",
        "CREATE PROCEDURE `INSERT_IN_FORMA_PAGAMENTO` (
            in tipoDoPagamento varchar(255)
        )
        BEGIN 
            INSERT INTO `forma_pagamento` 
            VALUES (DEFAULT, tipoDoPagamento, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP() );
        END ;"
    ],
    'ddl_inserts' => [
        'INSERT_IN_CARDAPIO_PASTEL' => [
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel de Carne', 7.00, NULL);",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel de Frango', 7.00, NULL);",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel de Salada', 7.00, 'Calabresa, Queijo mussarela, Batata, Cenoura');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Pizza',7.00 ,'Queijo mussarela, Tomate, OrÃ©gano');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel de Presunto',7.00,NULL);",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel de Queijo',7.00,'Mussarela');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Misto',7.00, NULL);",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Frango com Queijo',7.00, NULL);",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Carne com Queijo',7.00, NULL);",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Real',7.00,'Banana, Canela, AÃ§Ãºcar');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Romeu e Julieta',7.00,'Queijo com Goiabada');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Especial',7.00,'Carne com Bacon e Cebola');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel sol',7.00, 'queijo com Milho');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Dez',7.00, 'Queijo, Presunto, Tomate, Ã“regano');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Deslumbrante', 7.20, 'Doce de leite, Catupiry, Mussarela');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Sonho', 7.30, 'Chocolate com Amendoim');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Maravilha', 7.30, 'Frango, Creme de Leite, Milho');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Especial com Queijo', 7.50, 'Carne com Bacon e Cebola, Queijo mussarela');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel de Palmito', 7.50, 'Palmito com tomate e azeitona');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel de Palmito e queijo', 7.50, 'Palmito com tomate, azeitona e queijo mussarela');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel de Palmito e catupiry', 7.50,'Palmito  com tomate, azeitona e catupury');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel De ', 7.50, 'Carne, Passas e Azeitona');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Biani', 7.50, 'Abacaxi, queijo mussarela');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Frango com catupiry', 7.50, NULL);",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Quatro Queijos', 7.50, 'Catupiry, Mussarela, Provolone, ParmesÃ£o');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Atum', 7.50, 'Atum puro');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Atum e queijo', 7.50, 'Atum com Queijo mussarela');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Atum e Catupiry', 7.50, 'Atum com Catupiry');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Joe', 7.60, 'Frango, Queijo, Milho verde, Ervilha e OrÃ©gano');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Maravilha - Catupiry', 7.70, 'Frango, Creme de leite, Milho e Catupiry');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Calabresa', 7.70, 'Calabresa, Queijo');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel A Moda', 8.00, 'Carne, Queijo, Cebola, PimentÃ£o');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel de Caranguejo', 8.20, 'carangueijo puro');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel de Caranguejo e Queijo', 8.20, 'carangueijo com queijo mussarela');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel de Carangueijo e catupiry', 8.20, 'Carangueijo com catupiry');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel de CamarÃ£o', 9.80, 'CamarÃ£o refogado no repolho ralado');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel de CamarÃ£o com queijo', 9.80, 'CamarÃ£o refogado no repolho ralado e queijo mussarela');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel de CamarÃ£o com catupiry', 9.80,'CamarÃ£o refogado no repolho ralado e catupiry');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel  Sertanejo', 8.50, 'Carne do sol com pure de aipim');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Sertanejo com queijo', 8.50, 'Carne do sol com Queijo mussarela');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Sertanejo com banana', 8.50, 'Carne do sol com banana da terra');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel BobÃ³ de camarão', 9.80, 'camarão refogado no repolho e pure de aipim');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel de Bacalhau', 8.20, 'Bacalhau puro');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel de Bacalhau com queijo', 8.20, 'Bacalhau com mussarela');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel de Bacalhau com catupiry', 8.20, 'Bacalhau com catupiry');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('PastelÃ£o', 14.50, 'Carne, Frango, queijo, presunto');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('PastelÃ£o Super', 16.00, 'Carne, Frango, queijo, presunto, cebola, pimentÃ£o, Ervilha, milho');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Peperone', 8.00, 'Salame com queijo');",
            "CALL INSERT_IN_CARDAPIO_PASTEL('Pastel Borreca', 8.00, 'PurÃª de Aipim, queijo e oregano');",
        ],
        'INSERT_IN_BEBIDA' => [
            "CALL INSERT_IN_BEBIDA('Suco','Abacaxi', 'Polpa', '300ML',5.00);",
            "CALL INSERT_IN_BEBIDA('Suco', 'Abacaxi com leite', 'Polpa','300ML',5.00);",
            "CALL INSERT_IN_BEBIDA('Suco', 'Acerola', 'Polpa','300ML',4.00);",
            "CALL INSERT_IN_BEBIDA('Suco', 'Acerola com leite', 'Polpa','300ML',5.00);",
            "CALL INSERT_IN_BEBIDA('Suco', 'CajÃº ', 'Polpa','300ML',5.00);",
            "CALL INSERT_IN_BEBIDA('Suco', 'CajÃº com leite' ,'Polpa','300ML',5.00);",
            "CALL INSERT_IN_BEBIDA('Suco', 'CajÃ¡' ,'Polpa','300ML',4.00);",
            "CALL INSERT_IN_BEBIDA('Suco', 'CajÃ¡ com leite' ,'Polpa','300ML',5.00);",
            "CALL INSERT_IN_BEBIDA('Suco', 'Cacau', 'Polpa','300ML',5.00);",
            "CALL INSERT_IN_BEBIDA('Suco', 'Cacau com leite', 'Polpa','300ML',5.00);",
            "CALL INSERT_IN_BEBIDA('Suco', 'Goiaba', 'Polpa', '300ML',4.00);",
            "CALL INSERT_IN_BEBIDA('Suco', 'Goiaba com leite', 'Polpa','300ML',5.00);",
            "CALL INSERT_IN_BEBIDA('Suco', 'Manga', 'Polpa','300ML',4.00);",
            "CALL INSERT_IN_BEBIDA('Suco', 'Manga com leite', 'Polpa','300ML',5.00);",
            "CALL INSERT_IN_BEBIDA('Suco', 'MaracujÃ¡', 'Polpa','300ML',4.50);",
            "CALL INSERT_IN_BEBIDA('Suco', 'MaracujÃ¡ com leite', 'Polpa','300ML',5.00);",
            "CALL INSERT_IN_BEBIDA('Suco', 'Siriguela', 'Polpa','300ML',5.00);",
            "CALL INSERT_IN_BEBIDA('Suco', 'Siriguela com leite', 'Polpa','300ML',5.00);",
            "CALL INSERT_IN_BEBIDA('Suco', 'Umbaº', 'Polpa','300ML',4.00);",
            "CALL INSERT_IN_BEBIDA('Suco', 'UmbÃº com leite', 'Polpa','300ML',5.00);",
            "CALL INSERT_IN_BEBIDA('Suco', 'Laranja', 'Fruta','500ML',7.00);",
            "CALL INSERT_IN_BEBIDA('Suco', 'Laranja com leite', 'Fruta','500ML',8.00);",
            "CALL INSERT_IN_BEBIDA('agua','sem gas', NULL, '500ML', 3.00);",
            "CALL INSERT_IN_BEBIDA('agua','com gas', NULL, '500ML', 3.50);",
            "CALL INSERT_IN_BEBIDA('Refrigerante','Lata', 'Fruta', '500ML',4.00);",
            "CALL INSERT_IN_BEBIDA('H2O', NULL, 'Fruta', '500ML',4.50);",
            "CALL INSERT_IN_BEBIDA('Refrigerante','Garrafa','Fruta','1L', 6.00);",
        ],
        'INSERT_IN_LOCALIZACAO' => [
            "CALL INSERT_IN_LOCALIZACAO('Boca do Rio', 0);",
            "CALL INSERT_IN_LOCALIZACAO('Imbui', 0);",
            "CALL INSERT_IN_LOCALIZACAO('Pantamares', 0);",
            "CALL INSERT_IN_LOCALIZACAO('Costa Azul', 0);",
        ],
        'INSERT_IN_FORMA_PAGAMENTO' => [
            "CALL INSERT_IN_FORMA_PAGAMENTO('Dinheiro');",
            "CALL INSERT_IN_FORMA_PAGAMENTO('Cartão');",
        ],
    ]
);
