-- -----------------------------------------------------
-- Schema projeto_pastelaria
-- -----------------------------------------------------



CREATE SCHEMA IF NOT EXISTS `projeto_pastelaria` DEFAULT CHARACTER SET utf8 ;
USE `projeto_pastelaria` ;

-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`localizacaos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `localizacaos` (
  `idLocalizacao` INT(11) NOT NULL AUTO_INCREMENT,
  `nomeDoBairro` VARCHAR(255) NOT NULL,
  `taxa` DECIMAL(7,2) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`idLocalizacao`))
ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;
# AUTO_INCREMENT = 15 
 
-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `telefone` VARCHAR(15) NOT NULL,
  `tipoUsuario` VARCHAR(50) NOT NULL DEFAULT 'comun' COMMENT 'cliente|superuser|empreendedor|comun',
  `login` VARCHAR(100) NULL DEFAULT NULL unique,
  `senha` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`idUser`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `endereco` (
  `idEndereco` INT(11) NOT NULL AUTO_INCREMENT,
  `bairro` VARCHAR(200) NOT NULL,
  `numero` VARCHAR(15) NOT NULL,
  `complemento` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`idEndereco`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`cardapio_pastel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cardapio_pastel` (
  `idCardapioPastel` INT(11) NOT NULL AUTO_INCREMENT,
  `saborDoPastel` VARCHAR(150) NOT NULL,
  `valorUnitario` DECIMAL(8,2) NOT NULL,
  `ingrediente` TEXT NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`idCardapioPastel`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`bebida`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bebida` (
  `idBebida` INT(11) NOT NULL AUTO_INCREMENT,
  `tipoDaBebida` VARCHAR(100) NOT NULL,
  `sabor` VARCHAR(100) NULL DEFAULT NULL,
  `fruto` VARCHAR(50) NULL DEFAULT NULL,
  `quantidadeEmMl` VARCHAR(30) NOT NULL,
  `valorUnidade` DECIMAL(10,2) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`idBebida`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`forma_pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `forma_pagamento` (
	`idFormaPag` INT NOT NULL AUTO_INCREMENT,
	`tipoDoPagamento` VARCHAR(200) NOT NULL,
	`created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
	`updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
	PRIMARY KEY (`idFormaPag`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`detalhes_item_pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `detalhes_item_pedido` (
	`idDetalhesItemPedido` INT NOT NULL AUTO_INCREMENT,
	`quantidadeItems` INT NOT NULL,
	`total` DECIMAL(10,2) NOT NULL,
	`created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
	`updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
	PRIMARY KEY (`idDetalhesItemPedido`))
ENGINE = InnoDB;
  
-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedido` (
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
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`cliente_endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `endereco_user` (
	`idEnderecoUser` INT NOT NULL AUTO_INCREMENT,
	`fk2_user_id` INT NOT NULL,
	`fk1_idEndereco` INT NOT NULL,
	`created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
	`updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
	PRIMARY KEY (`idEnderecoUser`),
    CONSTRAINT `fk2_user_id` FOREIGN KEY (`fk2_user_id`) REFERENCES `users`(`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk1_idEndereco` FOREIGN KEY (`fk1_idEndereco`) REFERENCES `endereco`(`idEndereco`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`pedido_pastel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedido_pastel` (
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
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`pedido_bebida`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedido_bebida` (
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
) ENGINE = InnoDB;


-- create procedure

delimiter //
CREATE PROCEDURE `INSERT_IN_BEBIDA` (
	in tipoDaBebida varchar(150),
    in sabor varchar(100),
    in fruto varchar(50),
    in quantidadeEmMl varchar(30),
    in valorUnidade decimal(8, 2)
)
BEGIN 
	INSERT INTO `bebida` 
    VALUES (DEFAULT, tipoDaBebida,sabor, fruto, quantidadeEmMl, valorUnidade, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP() );
END //
delimiter ;


delimiter //
CREATE PROCEDURE `INSERT_IN_LOCALIZACAO` (
	in nomeDoBairro varchar(255),
    in taxa DECIMAL(8,2)
)
BEGIN
	INSERT INTO `localizacaos` 
    VALUES (DEFAULT, nomeDoBairro,taxa, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP() );
END //
delimiter ;

delimiter //
CREATE PROCEDURE `INSERT_IN_CARDAPIO_PASTEL` (
	in saborDoPastel varchar(150),
	in valorUnitario decimal(8,2),
	in ingrediente text   
)
BEGIN 
	INSERT INTO `cardapio_pastel` 
    VALUES (DEFAULT, saborDoPastel,valorUnitario, ingrediente, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP() );
END //
delimiter ;

delimiter //
CREATE PROCEDURE `INSERT_IN_FORMA_PAGAMENTO` (
	in tipoDoPagamento varchar(255)
)
BEGIN 
	INSERT INTO `forma_pagamento` 
    VALUES (DEFAULT, tipoDoPagamento, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP() );
END //
delimiter ;
 
SELECT 'Todas as sql foram executadas com êxito!';
