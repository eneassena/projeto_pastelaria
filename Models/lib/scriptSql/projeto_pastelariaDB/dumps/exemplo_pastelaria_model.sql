

-- 1: cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_cli` VARCHAR(255) NOT NULL,
  `telefone_cli` VARCHAR(50) NOT NULL,
  `login_cli` VARCHAR(255) NULL DEFAULT NULL,
  `senha_cli` VARCHAR(32) NULL DEFAULT NULL,
  `perfil_cli` VARCHAR(50) NULL DEFAULT 'cliente',
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



-- 2: endereco
CREATE TABLE IF NOT EXISTS `endereco` (
  `id_endereco` INT(11) NOT NULL AUTO_INCREMENT,
  `complemento_end` VARCHAR(255) NOT NULL,
  `numero_end` VARCHAR(45) NOT NULL,
  `bairro` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_endereco`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



-- 3: endereco_cliente
CREATE TABLE IF NOT EXISTS `endereco_cliente` (
  `pk_endereco_cliente` INT(11) ZEROFILL NOT NULL AUTO_INCREMENT,
  `pk_cliente_endereco` INT(11) NOT NULL,
  INDEX `fk_endereco_cliente_idx` (`pk_endereco_cliente` ASC) VISIBLE,
  INDEX `fk_cliente_endereco_idx` (`pk_cliente_endereco` ASC) VISIBLE,
  CONSTRAINT `pk_endereco_cliente`
    FOREIGN KEY (`pk_endereco_cliente`)
    REFERENCES `exemplo_pastelaria_model`.`cliente` (`id_cliente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `pk_cliente_endereco`
    FOREIGN KEY (`pk_cliente_endereco`)
    REFERENCES `exemplo_pastelaria_model`.`endereco` (`id_endereco`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- 4: pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` INT(11) ZEROFILL NOT NULL AUTO_INCREMENT,
  `valor_total` DECIMAL ZEROFILL NOT NULL,
  `forma_entrega` VARCHAR(50) NOT NULL,
  `status` VARCHAR(45) NOT NULL DEFAULT 'em andamento',
  `data_pedido` DATE NOT NULL,
  `pk_cliente` INT(11) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  INDEX `pk_pedido_cliente_idx` (`pk_cliente` ASC) VISIBLE,
  CONSTRAINT `pk_cliente`
    FOREIGN KEY (`pk_cliente`)
    REFERENCES `exemplo_pastelaria_model`.`cliente` (`id_cliente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- 5:  bebidas
CREATE TABLE IF NOT EXISTS `bebidas` (
  `id_bebidas` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo_bebida` VARCHAR(45) NOT NULL,
  `sabor` VARCHAR(150) NULL DEFAULT NULL,
  `fruto` VARCHAR(45) NULL DEFAULT NULL,
  `quantidade_ml` VARCHAR(20) NOT NULL,
  `valor_unidade` DECIMAL NOT NULL,
  PRIMARY KEY (`id_bebidas`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



-- 6:  pedido_bebida
CREATE TABLE IF NOT EXISTS `pedido_bedida` (
  `qtd_bebida` INT(11) NOT NULL,
  `pk_pedido_bebida` INT(11) NOT NULL,
  `pk_bebida_pedido` INT(11) NOT NULL,
  INDEX `fk_pedido_bebida_idx` (`pk_pedido_bebida` ASC) VISIBLE,
  INDEX `fk_bedida_pedido_idx` (`pk_bebida_pedido` ASC) VISIBLE,
  PRIMARY KEY (`qtd_bebida`),
  CONSTRAINT `pk_pedido_bebida`
    FOREIGN KEY (`pk_pedido_bebida`)
    REFERENCES `exemplo_pastelaria_model`.`bebidas` (`id_bebidas`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `pk_bedida_pedido`
    FOREIGN KEY (`pk_bebida_pedido`)
    REFERENCES `exemplo_pastelaria_model`.`pedido` (`id_pedido`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- 7:  forma_pagamento
CREATE TABLE IF NOT EXISTS `forma_pagamento` (
  `id_forma_pagamento` INT(11) NOT NULL AUTO_INCREMENT,
  `cartao` VARCHAR(15) NULL DEFAULT 'D' COMMENT 'C - Cartão | D - Dinheiro',
  `saldo_apagar` DECIMAL(18,2) NOT NULL,
  `pk_tbpedido` INT(11) NOT NULL,
  PRIMARY KEY (`id_forma_pagamento`),
  INDEX `fk_tbpedido_idx` (`pk_tbpedido` ASC) VISIBLE,
  CONSTRAINT `pk_tbpedido`
    FOREIGN KEY (`pk_tbpedido`)
    REFERENCES `exemplo_pastelaria_model`.`pedido` (`id_pedido`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- 8:  cardapio_pastel
CREATE TABLE IF NOT EXISTS `cardapio_pastel` (
  `id_cardapio` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_lanche` VARCHAR(100) NOT NULL,
  `ingrediente_lanche` TEXT NOT NULL,
  `valor_unidade_lanche` DECIMAL(5,2) NOT NULL,
  `observacao_lanche` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id_cardapio`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- 9:  pastel
CREATE TABLE IF NOT EXISTS `pastel` (
  `id_pastel` INT(11) NOT NULL AUTO_INCREMENT,
  `sabor_pastel` VARCHAR(45) NOT NULL,
  `valor_unidade` DECIMAL(10,2) NOT NULL,
  `qtd_pastel` INT(11) NOT NULL,
  `pk_cardapio_pastel` INT(11) NOT NULL,
  PRIMARY KEY (`id_pastel`),
  INDEX `fk_cardapio_pastel_idx` (`pk_cardapio_pastel` ASC) VISIBLE,
  CONSTRAINT `pk_cardapio_pastel`
    FOREIGN KEY (`pk_cardapio_pastel`)
    REFERENCES `exemplo_pastelaria_model`.`cardapio_pastel` (`id_cardapio`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- 10: pedido_pastel
CREATE TABLE IF NOT EXISTS `pedido_pastel` (
  `pk_pedido_pastel` INT(11) NOT NULL,
  `pk_pastel_pedido` INT(11) NOT NULL,
  INDEX `fk_pedido_pastel_idx` (`pk_pedido_pastel` ASC) VISIBLE,
  INDEX `fk_pastel_pedido_idx` (`pk_pastel_pedido` ASC) VISIBLE,
  CONSTRAINT `pk_pedido_pastel`
    FOREIGN KEY (`pk_pedido_pastel`)
    REFERENCES `exemplo_pastelaria_model`.`pastel` (`id_pastel`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `pk_pastel_pedido`
    FOREIGN KEY (`pk_pastel_pedido`)
    REFERENCES `exemplo_pastelaria_model`.`pedido` (`id_pedido`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



-- 11: localizacao
CREATE TABLE IF NOT EXISTS `localizacao` (
  `id_localizacao` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_bairro` VARCHAR(255) NOT NULL,
  `observacao` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_localizacao`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- 12: admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `login` VARCHAR(150) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  `perfil` VARCHAR(50) NOT NULL DEFAULT 'Administrador',
  PRIMARY KEY (`id_admin`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;













