create DATABASE projeto_pastelaria_v1;
USE projeto_pastelaria_v1;
 
-- 1: cliente com cadastrado
CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cli` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `login_cli` varchar(150) DEFAULT NULL,
  `senha_cli` varchar(150) DEFAULT NULL,
  `perfil_cli` varchar(100) DEFAULT 'cliente',
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
 

-- 2: endereco
CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `complemento_end` varchar(255) DEFAULT NULL,
  `numero_end` varchar(45) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3: endereco_cliente
CREATE TABLE `endereco_cliente` (
  `fk1_endereco_id` int(11) DEFAULT NULL,
  `fk1_cliente_id` int(11) DEFAULT NULL,
  CONSTRAINT `fk1_endereco_id` FOREIGN KEY (`fk1_endereco_id`) REFERENCES `cliente` (`id_cliente`)
  ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk1_cliente_id` FOREIGN KEY (`fk1_cliente_id`) REFERENCES `endereco` (`id_endereco`)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4: pedido
 CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `valor_total` decimal(18,2) DEFAULT NULL,
  `forma_entrega` varchar(50) NOT NULL,
  `situacao` varchar(45) DEFAULT 'em andamento',
  `data_pedido` date DEFAULT NULL,
  `taxa_entrega` decimal(10,2) DEFAULT 0.00,
  `fk2_cliente_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pedido`), 
  CONSTRAINT `fk2_cliente_id` FOREIGN KEY (`fk2_cliente_id`) REFERENCES `cliente` (`id_cliente`)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4;



-- 5: bebidas
CREATE TABLE `bebidas` (
  `id_bebida` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_bebida` varchar(100) DEFAULT NULL,
  `sabor` varchar(100) DEFAULT NULL,
  `fruto` varchar(100) DEFAULT NULL,
  `quantidade_ml` varchar(20) DEFAULT NULL,
  `valor_unidade` decimal(18,2) DEFAULT NULL,
  PRIMARY KEY (`id_bebida`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 6: pedido_bebida
CREATE TABLE `pedido_bebida` (
  `quantidade` int(11) DEFAULT NULL,
  `fk1_pedido_id` int(11) NOT NULL,
  `fk1_bebida_id` int(11) NOT NULL,
  CONSTRAINT `fk1_pedido_id` FOREIGN KEY (`fk1_pedido_id`)  REFERENCES `bebidas` (`id_bebida`)
  ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk1_bebida_id` FOREIGN KEY (`fk1_bebida_id`) REFERENCES `pedido` (`id_pedido`)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 7: forma_pagamento
 CREATE TABLE `forma_pagamento` (
  `id_forma_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `cartao` varchar(15) DEFAULT NULL,
  `saldo_pagar` decimal(10,2) DEFAULT NULL,
  `fl2_pedido_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_forma_pagamento`),
  
  CONSTRAINT `fl2_pedido_id` FOREIGN KEY (`fl2_pedido_id`) REFERENCES `pedido` (`id_pedido`)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
 
-- 8: cardapio_pastel 
 CREATE TABLE `cardapio_pastel` (
  `id_cardapio` int(11) NOT NULL AUTO_INCREMENT,
  `nome_card` varchar(100) DEFAULT NULL,
  `ingrediente_card` text DEFAULT NULL,
  `valor_unidade_card` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_cardapio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 9: pastel
 CREATE TABLE `pastel` (
  `id_pastel` int(11) NOT NULL AUTO_INCREMENT,
  `sabor_pastel` varchar(100) DEFAULT NULL,
  `valor_unidade` decimal(10,2) DEFAULT NULL,
  `qtd_pastel` int(11) DEFAULT NULL,
  `fk1_cardapio_pastel_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pastel`),
  CONSTRAINT `fk1_cardapio_pastel_id` 
  FOREIGN KEY (`fk1_cardapio_pastel_id`) 
  REFERENCES `cardapio_pastel` (`id_cardapio`)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 10: pedido_pastel
CREATE TABLE `pedido_pastel` (
  `fk3_pedido_id` int(11) DEFAULT NULL,
  `fk2_cardapio_pastel_id` int(11) DEFAULT NULL,
  CONSTRAINT `fk3_pedido_id` FOREIGN KEY (`fk3_pedido_id`) REFERENCES `pastel` (`id_pastel`)
  ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk2_cardapio_pastel_id` FOREIGN KEY (`fk2_cardapio_pastel_id`) REFERENCES `pedido` (`id_pedido`)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 11: localizacao
CREATE TABLE `localizacao` (
  `id_localizacao` int(11) NOT NULL AUTO_INCREMENT,
  `nome_bairro` varchar(255) DEFAULT NULL,
  `taxa_entrega` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_localizacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 12: admin
 CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `login` varchar(150) DEFAULT NULL,
  `senha` varchar(150) DEFAULT NULL,
  `perfil` varchar(50) DEFAULT 'administrador',
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- inserts na table cardapio_pastel
INSERT INTO `cardapio_pastel` VALUES
(DEFAULT, 'Pastel de Frango','',7.00),
(DEFAULT, 'Pastel de Carne','',7.00),
(DEFAULT, 'Pastel de Salada','Calabresa, Queijo mussarela, Batata, Cenoura',7.00),
(DEFAULT, 'Pastel Pizza','Queijo mussarela, Tomate, Orégano',7.00),
(DEFAULT, 'Pastel de Presunto','',7.00),
(DEFAULT, 'Pastel de Queijo','Mussarela',7.00),
(DEFAULT, 'Pastel Misto','',7.00),
(DEFAULT, 'Pastel Frango com Queijo','',7.00),
(DEFAULT, 'Pastel Carne com Queijo','',7.00),
(DEFAULT, 'Pastel Real','Banana, Canela, Açúcar',7.00),
(DEFAULT, 'Pastel Romeu e Julieta','Queijo com Goiabada',7.00),
(DEFAULT, 'Pastel Especial','Carne com Bacon e Cebola',7.00),
(DEFAULT, 'Pastel sol','queijo com Milho',7.00),
(DEFAULT, 'Pastel Dez','Queijo, Presunto, Tomate, Óregano',7.00),
(DEFAULT, 'Pastel Deslumbrante','Doce de leite, Catupiry, Mussarela',7.20),
(DEFAULT, 'Pastel Sonho','Chocolate com Amendoim',7.30),
(DEFAULT, 'Pastel Maravilha','Frango, Creme de Leite, Milho',7.30),
(DEFAULT, 'Pastel Especial com Queijo','Carne com Bacon e Cebola, Queijo mussarela',7.50),
(DEFAULT, 'Pastel de Palmito','Palmito com tomate e azeitona',7.50),
(DEFAULT, 'Pastel de Palmito e queijo','Palmito com tomate, azeitona e queijo mussarela',7.50),
(DEFAULT, 'Pastel de Palmito e catupiry','Palmito  com tomate, azeitona e catupury',7.50),
(DEFAULT, 'Pastel Delícia','Carne, Passas e Azeitona',7.50),
(DEFAULT, 'Pastel Biani','Abacaxi, queijo mussarela',7.50),
(DEFAULT, 'Pastel Frango com catupiry','',7.50),
(DEFAULT, 'Pastel Quatro Queijos','Catupiry, Mussarela, Provolone, Parmesão',7.50),
(DEFAULT, 'Pastel Atum','Atum puro',7.50),
(DEFAULT, 'Pastel Atum e queijo','Atum com Queijo mussarela',7.50),
(DEFAULT, 'Pastel Atum e Catupiry','Atum com Catupiry',7.50),
(DEFAULT, 'Pastel Joe','Frango, Queijo, Milho verde, Ervilha e Orégano',7.60),
(DEFAULT, 'Pastel Maravilha - Catupiry','Frango, Creme de leite, Milho e Catupiry',7.70),
(DEFAULT, 'Pastel Calabresa','Calabresa, Queijo',7.70),
(DEFAULT, 'Pastel A Moda','Carne, Queijo, Cebola, Pimentão',8.00),
(DEFAULT, 'Pastel de Caranguejo','carangueijo puro',8.20),
(DEFAULT, 'Pastel de Caranguejo e Queijo','carangueijo com queijo mussarela',8.20),
(DEFAULT, 'Pastel de Carangueijo e catupiry','Carangueijo com catupiry',8.20),
(DEFAULT, 'Pastel de Camarão','Camarão refogado no repolho ralado',9.80),
(DEFAULT, 'Pastel de Camarão com queijo','Camarão refogado no repolho ralado e queijo mussarela',9.80),
(DEFAULT, 'Pastel de Camarão com catupiry','Camarão refogado no repolho ralado e catupiry',9.80),
(DEFAULT, 'Pastel  Sertanejo','Carne do sol com pure de aipim',8.50),
(DEFAULT, 'Pastel Sertanejo com queijo','Carne do sol com Queijo mussarela',8.50),
(DEFAULT, 'Pastel Sertanejo com banana','Carne do sol com banana da terra',8.50),
(DEFAULT, 'Pastel Bobó de camarão','camarão refogado no repolho e pure de aipim',9.80),
(DEFAULT, 'Pastel de Bacalhau','Bacalhau puro',8.20),
(DEFAULT, 'Pastel de Bacalhau com queijo','Bacalhau com mussarela',8.20),
(DEFAULT, 'Pastel de Bacalhau com catupiry','Bacalhau com catupiry',8.20),
(DEFAULT, 'Pastelão','Carne, Frango, queijo, presunto',14.50),
(DEFAULT, 'Pastelão Super','Carne, Frango, queijo, presunto, cebola, pimentão, Ervilha, milho',16.00),
(DEFAULT, 'Pastel Peperone','Salame com queijo',8.00),
(DEFAULT, 'Pastel Borreca','Purê de Aipim, queijo e oregano',8.00);


-- insert table bebidas
INSERT INTO `bebidas` VALUES
(DEFAULT, 'Abacaxi',NULL,'Polpa','300ML',5.00),
(DEFAULT, 'Abacaxi com leite','','Polpa','300ML',5.00),
(DEFAULT, 'Acerola','','Polpa','300ML',4.00),
(DEFAULT, 'Acerola com leite','','Polpa','300ML',5.00),
(DEFAULT, 'Cajú ','','Polpa','300ML',5.00),
(DEFAULT, 'Cajú com leite','','Polpa','300ML',5.00),
(DEFAULT, 'Cajá','','Polpa','300ML',4.00),
(DEFAULT, 'Cajá com leite','','Polpa','300ML',5.00),
(DEFAULT, 'Cacau','','Polpa','300ML',5.00),
(DEFAULT, 'Cacau com leite','','Polpa','300ML',5.00),
(DEFAULT, 'Goiaba','','Polpa','300ML',4.00),
(DEFAULT, 'Goiaba com leite','','Polpa','300ML',5.00),
(DEFAULT, 'Manga','','Polpa','300ML',4.00),
(DEFAULT, 'Manga com leite','','Polpa','300ML',5.00),
(DEFAULT, 'Maracujá','','Polpa','300ML',4.50),
(DEFAULT, 'Maracujá com leite','','Polpa','300ML',5.00),
(DEFAULT, 'Siriguela','','Polpa','300ML',5.00),
(DEFAULT, 'Siriguela com leite','','Polpa','300ML',5.00),
(DEFAULT, 'Umbú','','Polpa','300ML',4.00),
(DEFAULT, 'Umbú com leite','','Polpa','300ML',5.00),
(DEFAULT, 'Laranja','','Fruta','500ML',7.00),
(DEFAULT, 'Laranja com leite','','Fruta','500ML',8.00),
(DEFAULT, 'agua sem gas','','Fruta','500ML',3.00),
(DEFAULT, 'agua com gas','','Fruta','500ML',3.50),
(DEFAULT, 'refrigerante lata','','Fruta','500ML',4.00),
(DEFAULT, 'H2O','','Fruta','500ML',4.50),
(DEFAULT, 'refrigerante 1 litro','','Fruta','500ML',6.00);


-- insert bairros
INSERT INTO localizacao VALUES
(DEFAULT, 'Boca do Rio', 0),
(DEFAULT, 'Imbui', 0),
(DEFAULT, 'Pituba', 0),
(DEFAULT, 'Pantamares', 0);

-- PROCEDURES


-- VIEWS
CREATE VIEW `vw_consulta_bairros` AS
  SELECT 
      `localizacao`.`id_localizacao` AS `id_localizacao`,
      `localizacao`.`nome_bairro` AS `nome_bairro`,
      `localizacao`.`taxa_entrega` AS `taxa_entrega`
  FROM
      `localizacao`; 
      
CREATE VIEW `vw_consulta_bebidas` AS
  SELECT 
      `bebidas`.`id_bebida` AS `id_bebida`,
      `bebidas`.`tipo_bebida` AS `tipo_bebida`,
      `bebidas`.`sabor` AS `sabor`,
      `bebidas`.`fruto` AS `fruto`,
      `bebidas`.`quantidade_ml` AS `quantidade_ml`,
      `bebidas`.`valor_unidade` AS `valor_unidade`
  FROM
      `bebidas`;
        
        
CREATE VIEW `vw_consulta_cardapio` AS
  SELECT 
      `cardapio_pastel`.`id_cardapio` AS `id_cardapio`,
      `cardapio_pastel`.`nome_card` AS `nome`,
      `cardapio_pastel`.`ingrediente_card` AS `ingrediente`,
      `cardapio_pastel`.`valor_unidade_card` AS `valor_unidade`
  FROM
      `cardapio_pastel`;
        
        
        
        
CREATE VIEW `vw_exibe_pedido_feito` AS
  SELECT 
      `pedido`.`id_pedido` AS `id_pedido`,
      `pedido`.`valor_total` AS `valor_total`,
      `pedido`.`forma_entrega` AS `forma_entrega`,
      `pedido`.`situacao` AS `situacao`,
      `pedido`.`data_pedido` AS `data_pedido`,
      `pedido`.`taxa_entrega` AS `taxa_entrega`,
      `cliente`.`nome_cli` AS `nome_cli`,
      `cliente`.`id_cliente` AS `id_cliente`,
      `forma_pagamento`.`cartao` AS `cartao`
  FROM
      ((`pedido`
      JOIN `cliente` ON (`pedido`.`pk_cliente` = `cliente`.`id_cliente`))
      JOIN `forma_pagamento` ON (`pedido`.`id_pedido` = `forma_pagamento`.`pk_tbpedido`
          AND `pedido`.`situacao` = 'em andamento'
          OR `pedido`.`situacao` = 'Recusado'
          OR `pedido`.`situacao` = 'Confirmado'
          AND `pedido`.`data_pedido` = CURDATE()
          AND `pedido`.`valor_total` > 0));
	 
