create DATABASE pastelaria_gaucho;
USE pastelaria_gaucho;
 
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
  `pk_endereco_cliente` int(11) DEFAULT NULL,
  `pk_cliente_endereco` int(11) DEFAULT NULL,
  KEY `pk_endereco_cliente` (`pk_endereco_cliente`),
  KEY `pk_cliente_endereco` (`pk_cliente_endereco`),
  CONSTRAINT `endereco_cliente_ibfk_1` FOREIGN KEY (`pk_endereco_cliente`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `endereco_cliente_ibfk_2` FOREIGN KEY (`pk_cliente_endereco`) REFERENCES `endereco` (`id_endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4: pedido
 CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `valor_total` decimal(18,2) DEFAULT NULL,
  `forma_entrega` varchar(50) NOT NULL,
  `situacao` varchar(45) DEFAULT 'em andamento',
  `data_pedido` date DEFAULT NULL,
  `taxa_entrega` decimal(10,2) DEFAULT 0.00,
  `pk_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `pk_cliente` (`pk_cliente`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`pk_cliente`) REFERENCES `cliente` (`id_cliente`)
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
  `qtd_bebida` int(11) DEFAULT NULL,
  `pk_pedido_bebida` int(11) NOT NULL,
  `pk_bebida_pedido` int(11) NOT NULL,
  KEY `pk_pedido_bebida` (`pk_pedido_bebida`),
  KEY `pk_bebida_pedido` (`pk_bebida_pedido`),
  CONSTRAINT `pedido_bebida_ibfk_1` FOREIGN KEY (`pk_pedido_bebida`) REFERENCES `bebidas` (`id_bebida`),
  CONSTRAINT `pedido_bebida_ibfk_2` FOREIGN KEY (`pk_bebida_pedido`) REFERENCES `pedido` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 7: forma_pagamento
 CREATE TABLE `forma_pagamento` (
  `id_forma_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `cartao` varchar(15) DEFAULT NULL,
  `saldo_pagar` decimal(10,2) DEFAULT NULL,
  `pk_tbpedido` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_forma_pagamento`),
  KEY `pk_tbpedido` (`pk_tbpedido`),
  CONSTRAINT `forma_pagamento_ibfk_1` FOREIGN KEY (`pk_tbpedido`) REFERENCES `pedido` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
 
-- 8: cardapio_pastel 
 CREATE TABLE `cardapio_pastel` (
  `id_cardapio_card` int(11) NOT NULL AUTO_INCREMENT,
  `nome_card` varchar(100) DEFAULT NULL,
  `ingrediente_card` text DEFAULT NULL,
  `valor_unidade_card` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_cardapio_card`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 9: pastel
 CREATE TABLE `pastel` (
  `id_pastel` int(11) NOT NULL AUTO_INCREMENT,
  `sabor_pastel` varchar(100) DEFAULT NULL,
  `valor_unidade` decimal(10,2) DEFAULT NULL,
  `qtd_pastel` int(11) DEFAULT NULL,
  `pk_cardapio_pastel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pastel`),
  KEY `pk_cardapio_pastel` (`pk_cardapio_pastel`),
  CONSTRAINT `pastel_ibfk_1` FOREIGN KEY (`pk_cardapio_pastel`) REFERENCES `cardapio_pastel` (`id_cardapio_card`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 10: pedido_pastel
CREATE TABLE `pedido_pastel` (
  `pk_pedido_pastel` int(11) DEFAULT NULL,
  `pk_pastel_pedido` int(11) DEFAULT NULL,
  KEY `pk_pedido_pastel` (`pk_pedido_pastel`),
  KEY `pk_pastel_pedido` (`pk_pastel_pedido`),
  CONSTRAINT `pedido_pastel_ibfk_1` FOREIGN KEY (`pk_pedido_pastel`) REFERENCES `pastel` (`id_pastel`),
  CONSTRAINT `pedido_pastel_ibfk_2` FOREIGN KEY (`pk_pastel_pedido`) REFERENCES `pedido` (`id_pedido`)
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
insert  into `cardapio_pastel`values 
(DEFAULT, 'Pastel de Carne','',7.00),
(DEFAULT, 'Pastel de Frango','',7.00),
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
insert  into `bebidas` values 
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
insert into localizacao values
(DEFAULT, 'Boca do Rio', 0),
(DEFAULT, 'Imbui', 0),
(DEFAULT, 'Pituba', 0),
(DEFAULT, 'Pantamares', 0),
(DEFAULT, 'Costa Azul', 0);

-- PROCEDURES

DELIMITER $$

CREATE PROCEDURE `PROC_BUSCAR_BEBIDAS_PEDIDO`( in id_consulta int )
BEGIN
	SELECT `bebidas`.`id_bebida`, `bebidas`.`tipo_bebida`,`bebidas`.`quantidade_ml`, `bebidas`.`valor_unidade` 
	FROM pedido_bebida
	JOIN bebidas ON pedido_bebida.pk_pedido_bebida = bebidas.id_bebida
	JOIN pedido ON pedido_bebida.pk_bebida_pedido = pedido.id_pedido
	WHERE pedido.id_pedido = id_consulta	
	ORDER BY pedido.id_pedido ASC;
	END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS  `PROC_BUSCAR_CLIENTE`;

DELIMITER $$

CREATE PROCEDURE `PROC_BUSCAR_CLIENTE`(in id_consulta int )
BEGIN
		SELECT cliente.nome_cli, cliente.telefone, endereco.complemento_end, endereco.numero_end , endereco.bairro
		FROM pedido
		JOIN cliente ON pedido.pk_cliente = cliente.id_cliente
		join endereco_cliente on cliente.id_cliente = endereco_cliente.pk_endereco_cliente
		join endereco on endereco_cliente.pk_cliente_endereco = endereco.id_endereco
		WHERE pedido.id_pedido = id_consulta;
	END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS  `PROC_BUSCAR_PASTEL_PEDIDO` ;

DELIMITER $$

CREATE PROCEDURE `PROC_BUSCAR_PASTEL_PEDIDO`(
	IN id_consulta int
    )
BEGIN
	SELECT pastel.sabor_pastel, pastel.valor_unidade, pastel.qtd_pastel, pastel.valor_unidade * pastel.qtd_pastel 'total'
	 FROM pedido_pastel
	JOIN pastel ON pedido_pastel.pk_pedido_pastel = pastel.id_pastel
	JOIN pedido ON pedido_pastel.pk_pastel_pedido = pedido.id_pedido
	WHERE pedido.id_pedido = id_consulta
	order by pastel.sabor_pastel asc;
	END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS  `PROC_BUSCAR_POR_ID` ;

DELIMITER $$

CREATE PROCEDURE `PROC_BUSCAR_POR_ID`(
IN id_consulta INT
)
BEGIN 
	SELECT cliente.nome_cli, cliente.telefone, endereco.complemento_end,  endereco.numero_end, endereco.bairro
	FROM endereco_cliente AS edc
	JOIN cliente ON edc.pk_endereco_cliente = cliente.id_cliente
	JOIN endereco ON edc.pk_cliente_endereco = endereco.id_endereco
	WHERE cliente.id_cliente = id_consulta;
END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS  `PROC_CADASTRAR_BAIRROS`;

DELIMITER $$

CREATE PROCEDURE `PROC_CADASTRAR_BAIRROS`(
	IN nome_bairro VARCHAR(255),
	IN taxa_entrega  VARCHAR(255)
  )
BEGIN
	INSERT INTO localizacao(nome_bairro, taxa_entrega)
	VALUES(nome_bairro, taxa_entrega);
	END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS  `PROC_CADASTRAR_BEBIDA` ;

DELIMITER $$

CREATE PROCEDURE `PROC_CADASTRAR_BEBIDA`(
	in `tipo_bebida` varchar(255),
	in `sabor` varchar(255), 
	in `fruto` VARCHAR(255),
	in `quantidade_ml` VARCHAR(10),
	in `valor_unidade` decimal(10,2)
    )
BEGIN
	insert into `bebidas`(`tipo_bebida`,`sabor`,`fruto`,`quantidade_ml`,`valor_unidade`)
	values(`tipo_bebida`,`sabor`,`fruto`,`quantidade_ml`,`valor_unidade`);
	END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS  `PROC_CADASTRA_CLIENTE_TESTE` ;

DELIMITER $$

CREATE PROCEDURE `PROC_CADASTRA_CLIENTE_TESTE`(
	IN nome VARCHAR(255),
	IN phone VARCHAR(255)
)
BEGIN
	set @nome = nome;
    set @phone = phone;
	INSERT INTO cliente (nome_cli, telefone, perfil_cli) VALUES (@nome, @phone, DEFAULT);
    select last_insert_id() AS 'id_cliente';
END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS  `PROC_CADASTRA_PASTEL` ;

DELIMITER $$

CREATE PROCEDURE `PROC_CADASTRA_PASTEL`(
	in `nome_card` varchar(255),
	in `ingrediente_card` VARCHAR(255),
	in `valor_unidade_card` decimal(10,2)
    )
BEGIN
	INSERT INTO cardapio_pastel(`nome_card`,`ingrediente_card`,`valor_unidade_card`)
	VALUES(`nome_card`,`ingrediente_card`,`valor_unidade_card`);
	END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS  `PROC_CADAST_CLI_PEDIDO`;

DELIMITER $$

CREATE PROCEDURE `PROC_CADAST_CLI_PEDIDO`(
	IN nome_cli VARCHAR(255), IN telefone VARCHAR(255)
    )
BEGIN
	INSERT INTO cliente(nome_cli, telefone) VALUES (nome_cli, telefone);
	SET @idcliente = LAST_INSERT_ID();
	SELECT @idcliente;
	END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS  `PROC_CONSULTA_PEDIDO_ID` ;

DELIMITER $$

CREATE PROCEDURE `PROC_CONSULTA_PEDIDO_ID`(
	IN id_consulta int
    )
BEGIN
	SELECT pedido.id_pedido, pedido.valor_total, pedido.forma_entrega, pedido.situacao, pedido.data_pedido, pedido.taxa_entrega, forma_pagamento.`cartao`
	FROM pedido
	JOIN forma_pagamento ON pedido.id_pedido = forma_pagamento.pk_tbpedido
	WHERE  pedido.id_pedido = id_consulta
	and pedido.data_pedido = CURDATE() 
	AND pedido.`situacao` = 'em andamento'
	AND pedido.valor_total > 0;
	END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS  `PROC_DEL_BEBIDAS` ;

DELIMITER $$

CREATE PROCEDURE `PROC_DEL_BEBIDAS`(in id_delete int)
BEGIN
	delete from bebidas where id_bebida = id_delete;
END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS  `PROC_DEL_CARDAPIO_PASTEL` ;

DELIMITER $$

CREATE PROCEDURE `PROC_DEL_CARDAPIO_PASTEL`( in id_delete int)
BEGIN
	DELETE FROM cardapio_pastel WHERE id_cardapio_card = id_delete; 
	END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS  `PROC_DEL_PEDIDO` ;

DELIMITER $$

CREATE PROCEDURE `PROC_DEL_PEDIDO`(
	in id_delete int	
    )
BEGIN	
	DELETE FROM pedido
	WHERE id_pedido = id_delete and data_pedido = curdate();
	END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS  `PROC_INSERE_ENDERECO_CLIENTE` ;

DELIMITER $$

CREATE PROCEDURE `PROC_INSERE_ENDERECO_CLIENTE`(
	in complemento_end varchar(255),
	in numero_end varchar(255),
	in bairro varchar(255),
    in idCliente int
)
BEGIN
	insert into endereco values (DEFAULT, complemento_end, numero_end, bairro);
    -- CAPTURA O ID DO ENDERECO
    SET @idEndereco = last_insert_id();
    INSERT INTO endereco_cliente values(idCliente, @idEndereco);

END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS  `PROC_INSERT_AMD` ;

DELIMITER $$

CREATE PROCEDURE `PROC_INSERT_AMD`( 
	IN nome VARCHAR(255), 
	IN login VARCHAR(255),
	IN senha VARCHAR(50) 
	)
BEGIN
		INSERT INTO ADMIN(nome, login, senha) VALUES(nome, login, senha);
	END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS  `PROC_IN_PEDIDO_BEBIDA` ;

DELIMITER $$

CREATE PROCEDURE `PROC_IN_PEDIDO_BEBIDA`(
	IN qtd_bebida INT, 
	IN pk_pedido_bebida INT,
	IN pk_bebida_pedido INT
    )
BEGIN
	INSERT INTO pedido_bebida(qtd_bebida,pk_pedido_bebida, pk_bebida_pedido) 
	VALUES (qtd_bebida,pk_pedido_bebida, pk_bebida_pedido);
	END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS  `PROC_LOGAR_USUARIO` ;

DELIMITER $$

CREATE PROCEDURE `PROC_LOGAR_USUARIO`(
	IN nome VARCHAR(150),
	IN senha VARCHAR(150)
    )
BEGIN
	set @login = nome;
	set @senha = senha;
	SELECT id_cliente FROM cliente wHERE login_cli = @login AND senha_cli = @senha;
	END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS  `PROC_SEL_BEBIDA_ID` ;

DELIMITER $$

CREATE PROCEDURE `PROC_SEL_BEBIDA_ID`(IN id_consulta INT)
BEGIN
		SELECT * FROM `bebidas` WHERE `id_bebida` = id_consulta;
	END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS  `PROC_SEL_PASTEL_ID` ;

DELIMITER $$

CREATE PROCEDURE `PROC_SEL_PASTEL_ID`(IN id_consulta int)
BEGIN
		SELECT * FROM `cardapio_pastel` WHERE `id_cardapio_card` = id_consulta;
	END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS  `PROC_UP_BEBIDA` ;

DELIMITER $$

CREATE PROCEDURE `PROC_UP_BEBIDA`(
	IN id_update INT,
	IN `tipo_bebida` VARCHAR(255),
	IN `sabor` VARCHAR(255), 
	IN `fruto` VARCHAR(255),
	IN `quantidade_ml` VARCHAR(10),
	IN `valor_unidade` DECIMAL(10,2)    
)
BEGIN
	UPDATE bebidas
	SET tipo_bebida  = tipo_bebida, sabor = sabor, fruto = fruto, quantidade_ml = quantidade_ml, valor_unidade= valor_unidade
	WHERE `id_bebida` = id_update;
END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS  `PROC_UP_PASTEL` ;

DELIMITER $$

CREATE PROCEDURE `PROC_UP_PASTEL`(
	IN id_update int,
	IN `nome_card` VARCHAR(255),
	IN `ingrediente_card` VARCHAR(255),
	IN `valor_unidade_card` DECIMAL(10,2)    
    )
BEGIN
	update cardapio_pastel
	set nome_card =nome_card, ingrediente_card= ingrediente_card, valor_unidade_card =valor_unidade_card
	where `id_cardapio_card` = id_update;
	END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS  `PROC_UP_PEDIDO` ;

DELIMITER $$

CREATE PROCEDURE `PROC_UP_PEDIDO`(
	IN id_update INT,
	IN situacao VARCHAR(45),
	in taxa_entrega decimal(10,2)
)
BEGIN 
	UPDATE pedido
	SET situacao = situacao, taxa_entrega = taxa_entrega
	WHERE pedido.id_pedido = id_update;
END $$
DELIMITER ;





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
      `cardapio_pastel`.`id_cardapio_card` AS `id_cardapio`,
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
	 
