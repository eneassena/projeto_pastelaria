/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.13-MariaDB : Database - exemplo_pastelaria_model
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`exemplo_pastelaria_model` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `exemplo_pastelaria_model`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `login` varchar(150) DEFAULT NULL,
  `senha` varchar(150) DEFAULT NULL,
  `perfil` varchar(50) DEFAULT 'administrador',
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`nome`,`login`,`senha`,`perfil`) values 
(1,'Pastelaria Gaucho','pastelariagaucho','1d1e68da861e8a91a717a490dc7cb603','administrador');

/*Table structure for table `bebidas` */

DROP TABLE IF EXISTS `bebidas`;

CREATE TABLE `bebidas` (
  `id_bebida` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_bebida` varchar(100) DEFAULT NULL,
  `sabor` varchar(100) DEFAULT NULL,
  `fruto` varchar(100) DEFAULT NULL,
  `quantidade_ml` varchar(20) DEFAULT NULL,
  `valor_unidade` decimal(18,2) DEFAULT NULL,
  PRIMARY KEY (`id_bebida`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

/*Data for the table `bebidas` */

insert  into `bebidas`(`id_bebida`,`tipo_bebida`,`sabor`,`fruto`,`quantidade_ml`,`valor_unidade`) values 
(5,'Cajú ','','Polpa','300ML',5.00),
(6,'Cajú com leite','','Polpa','300ML',5.00),
(8,'Cajá com leite','','Polpa','300ML',5.00),
(9,'Cacau','','Polpa','300ML',5.00),
(10,'Cacau com leite','','Polpa','300ML',5.00),
(11,'Goiaba','','Polpa','300ML',4.00),
(12,'Goiaba com leite','','Polpa','300ML',5.00),
(13,'Manga','','Polpa','300ML',4.00),
(14,'Manga com leite','','Polpa','300ML',5.00),
(15,'Maracujá','','Polpa','300ML',4.50),
(16,'Maracujá com leite','','Polpa','300ML',5.00),
(17,'Siriguela','','Polpa','300ML',5.00),
(18,'Siriguela com leite','','Polpa','300ML',5.00),
(19,'Umbú','','Polpa','300ML',4.00),
(20,'Umbú com leite','','Polpa','300ML',5.00),
(21,'Laranja','','Fruta','500ML',7.00),
(22,'Laranja com leite','','Fruta','500ML',8.00),
(23,'agua sem gas','','Fruta','500ML',3.00),
(24,'agua com gas','','Fruta','500ML',3.50),
(25,'refrigerante lata','','Fruta','500ML',4.00),
(26,'H2O','','Fruta','500ML',4.50),
(27,'refrigerante 1 litro','','Fruta','500ML',6.00);




/*Table structure for table `cardapio_pastel` */

DROP TABLE IF EXISTS `cardapio_pastel`;

CREATE TABLE `cardapio_pastel` (
  `id_cardapio_card` int(11) NOT NULL AUTO_INCREMENT,
  `nome_card` varchar(100) DEFAULT NULL,
  `ingrediente_card` text DEFAULT NULL,
  `valor_unidade_card` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_cardapio_card`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

/*Data for the table `cardapio_pastel` */

insert  into `cardapio_pastel`(`id_cardapio_card`,`nome_card`,`ingrediente_card`,`valor_unidade_card`) values 
(2,'Pastel de Frango','',7.00),
(3,'Pastel de Salada','Calabresa, Queijo mussarela, Batata, Cenoura',7.00),
(4,'Pastel Pizza','Queijo mussarela, Tomate, Orégano',7.00),
(5,'Pastel de Presunto','',7.00),
(6,'Pastel de Queijo','Mussarela',7.00),
(7,'Pastel Misto','',7.00),
(8,'Pastel Frango com Queijo','',7.00),
(10,'Pastel Real','Banana, Canela, Açúcar',7.00),
(11,'Pastel Romeu e Julieta','Queijo com Goiabada',7.00),
(13,'Pastel sol','queijo com Milho',7.00),
(14,'Pastel Dez','Queijo, Presunto, Tomate, Óregano',7.00),
(15,'Pastel Deslumbrante','Doce de leite, Catupiry, Mussarela',7.20),
(16,'Pastel Sonho','Chocolate com Amendoim',7.30),
(17,'Pastel Maravilha','Frango, Creme de Leite, Milho',7.30),
(18,'Pastel Especial com Queijo','Carne com Bacon e Cebola, Queijo mussarela',7.50),
(19,'Pastel de Palmito','Palmito com tomate e azeitona',7.50),
(20,'Pastel de Palmito e queijo','Palmito com tomate, azeitona e queijo mussarela',7.50),
(21,'Pastel de Palmito e catupiry','Palmito  com tomate, azeitona e catupury',7.50),
(22,'Pastel Delícia','Carne, Passas e Azeitona',7.50),
(24,'Pastel Frango com catupiry','',7.50),
(29,'Pastel Joe','Frango, Queijo, Milho verde, Ervilha e Orégano',7.60),
(30,'Pastel Maravilha - Catupiry','Frango, Creme de leite, Milho e Catupiry',7.70),
(31,'Pastel Calabresa','Calabresa, Queijo',7.70),
(33,'Pastel de Caranguejo','carangueijo puro',8.20),
(34,'Pastel de Caranguejo e Queijo','carangueijo com queijo mussarela',8.20),
(35,'Pastel de Carangueijo e catupiry','Carangueijo com catupiry',8.20),
(36,'Pastel de Camarão','Camarão refogado no repolho ralado',9.80),
(37,'Pastel de Camarão com queijo','Camarão refogado no repolho ralado e queijo mussarela',9.80),
(38,'Pastel de Camarão com catupiry','Camarão refogado no repolho ralado e catupiry',9.80),
(40,'Pastel Sertanejo com queijo','Carne do sol com Queijo mussarela',8.50),
(41,'Pastel Sertanejo com banana','Carne do sol com banana da terra',8.50),
(42,'Pastel Bobó de camarão','camarão refogado no repolho e pure de aipim',9.80),
(43,'Pastel de Bacalhau','Bacalhau puro',8.20),
(44,'Pastel de Bacalhau com queijo','Bacalhau com mussarela',8.20),
(45,'Pastel de Bacalhau com catupiry','Bacalhau com catupiry',8.20),
(46,'Pastelão','Carne, Frango, queijo, presunto',14.50),
(47,'Pastelão Super','Carne, Frango, queijo, presunto, cebola, pimentão, Ervilha, milho',16.00),
(48,'Pastel Peperone','Salame com queijo',8.00),
(49,'Pastel Borreca','Purê de Aipim, queijo e oregano',8.00);

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cli` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `login_cli` varchar(150) DEFAULT NULL,
  `senha_cli` varchar(150) DEFAULT NULL,
  `perfil_cli` varchar(100) DEFAULT 'cliente',
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `cliente` */

insert  into `cliente`(`id_cliente`,`nome_cli`,`telefone`,`login_cli`,`senha_cli`,`perfil_cli`) values 
(1,'maria','(75) 8190-2311','maria','95021724c3acfab92feecc6952189414','cliente'),
(2,'josias silva','5564-5698',NULL,NULL,'cliente'),
(3,'marina santos','1111-2222',NULL,NULL,'cliente'),
(4,'karine','(55) 55555-5555',NULL,NULL,'cliente'),
(5,'karine','(55) 55555-5555',NULL,NULL,'cliente'),
(6,'karine','(55) 55555-5555',NULL,NULL,'cliente'),
(7,'karine','(55) 55555-5555',NULL,NULL,'cliente'),
(8,'karine2','(55) 55555-5555',NULL,NULL,'cliente'),
(9,'karine2','(55) 55555-5555',NULL,NULL,'cliente'),
(10,'elisama','(55) 55555-5555',NULL,NULL,'cliente'),
(11,'dsd','(32) 2442-3',NULL,NULL,'cliente'),
(12,'eneas','(55) 55555-5555',NULL,NULL,'cliente'),
(13,'ayana','(22) 22222-2222',NULL,NULL,'cliente'),
(14,'hercules','(56) 49871-3213',NULL,NULL,'cliente'),
(15,'coelba','(23) 16546-5464',NULL,NULL,'cliente');

/*Table structure for table `endereco` */

DROP TABLE IF EXISTS `endereco`;

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `complemento_end` varchar(255) DEFAULT NULL,
  `numero_end` varchar(45) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_endereco`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `endereco` */

insert  into `endereco`(`id_endereco`,`complemento_end`,`numero_end`,`bairro`) values 
(1,'praça jose ronaldo','564','jardim cruzeiro'),
(2,'salao de evandro','654','calumbi'),
(3,'salao de evandro','98','calumbi'),
(4,'praç','654','bairro');

/*Table structure for table `endereco_cliente` */

DROP TABLE IF EXISTS `endereco_cliente`;

CREATE TABLE `endereco_cliente` (
  `pk_endereco_cliente` int(11) DEFAULT NULL,
  `pk_cliente_endereco` int(11) DEFAULT NULL,
  KEY `pk_endereco_cliente` (`pk_endereco_cliente`),
  KEY `pk_cliente_endereco` (`pk_cliente_endereco`),
  CONSTRAINT `endereco_cliente_ibfk_1` FOREIGN KEY (`pk_endereco_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `endereco_cliente_ibfk_2` FOREIGN KEY (`pk_cliente_endereco`) REFERENCES `endereco` (`id_endereco`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `endereco_cliente` */

insert  into `endereco_cliente`(`pk_endereco_cliente`,`pk_cliente_endereco`) values 
(1,1),
(2,2),
(10,3),
(14,4);

/*Table structure for table `forma_pagamento` */

DROP TABLE IF EXISTS `forma_pagamento`;

CREATE TABLE `forma_pagamento` (
  `id_forma_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `cartao` varchar(15) DEFAULT NULL,
  `saldo_pagar` decimal(10,2) DEFAULT NULL,
  `pk_tbpedido` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_forma_pagamento`),
  KEY `pk_tbpedido` (`pk_tbpedido`),
  CONSTRAINT `forma_pagamento_ibfk_1` FOREIGN KEY (`pk_tbpedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `forma_pagamento` */

/*Table structure for table `localizacao` */

DROP TABLE IF EXISTS `localizacao`;

CREATE TABLE `localizacao` (
  `id_localizacao` int(11) NOT NULL AUTO_INCREMENT,
  `nome_bairro` varchar(255) DEFAULT NULL,
  `taxa_entrega` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_localizacao`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `localizacao` */

insert  into `localizacao`(`id_localizacao`,`nome_bairro`,`taxa_entrega`) values 
(1,'Boca do Rio',0.00),
(2,'Imbui',0.00),
(3,'Pituba',0.00),
(4,'Pantamares',0.00),
(5,'Costa Azul',0.00);

/*Table structure for table `pastel` */

DROP TABLE IF EXISTS `pastel`;

CREATE TABLE `pastel` (
  `id_pastel` int(11) NOT NULL AUTO_INCREMENT,
  `sabor_pastel` varchar(100) DEFAULT NULL,
  `valor_unidade` decimal(10,2) DEFAULT NULL,
  `qtd_pastel` int(11) DEFAULT NULL,
  `pk_cardapio_pastel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pastel`),
  KEY `pk_cardapio_pastel` (`pk_cardapio_pastel`),
  CONSTRAINT `pastel_ibfk_1` FOREIGN KEY (`pk_cardapio_pastel`) REFERENCES `cardapio_pastel` (`id_cardapio_card`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pastel` */

insert  into `pastel`(`id_pastel`,`sabor_pastel`,`valor_unidade`,`qtd_pastel`,`pk_cardapio_pastel`) values 
(2,'Pastel de Frango',7.00,2,2),
(5,'Pastel Sonho',7.30,1,16),
(6,'Pastel de Frango',7.00,2,2),
(7,'Pastel de Frango',7.00,2,2),
(8,'Pastel Dez',7.00,2,14),
(9,'Pastel de Queijo',7.00,1,6),
(10,'Pastel de Frango',7.00,2,2),
(11,'Pastel de Frango',7.00,5,2),
(12,'Pastel de Frango',7.00,3,2),
(13,'Pastel de Frango',7.00,3,2),
(14,'Pastel de Salada',7.00,2,3);

/*Table structure for table `pedido` */

DROP TABLE IF EXISTS `pedido`;

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
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`pk_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pedido` */

/*Table structure for table `pedido_bebida` */

DROP TABLE IF EXISTS `pedido_bebida`;

CREATE TABLE `pedido_bebida` (
  `qtd_bebida` int(11) DEFAULT NULL,
  `pk_pedido_bebida` int(11) NOT NULL,
  `pk_bebida_pedido` int(11) NOT NULL,
  KEY `pk_pedido_bebida` (`pk_pedido_bebida`),
  KEY `pk_bebida_pedido` (`pk_bebida_pedido`),
  CONSTRAINT `pedido_bebida_ibfk_1` FOREIGN KEY (`pk_pedido_bebida`) REFERENCES `bebidas` (`id_bebida`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pedido_bebida_ibfk_2` FOREIGN KEY (`pk_bebida_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pedido_bebida` */

/*Table structure for table `pedido_pastel` */

DROP TABLE IF EXISTS `pedido_pastel`;

CREATE TABLE `pedido_pastel` (
  `pk_pedido_pastel` int(11) DEFAULT NULL,
  `pk_pastel_pedido` int(11) DEFAULT NULL,
  KEY `pk_pedido_pastel` (`pk_pedido_pastel`),
  KEY `pk_pastel_pedido` (`pk_pastel_pedido`),
  CONSTRAINT `pedido_pastel_ibfk_1` FOREIGN KEY (`pk_pedido_pastel`) REFERENCES `pastel` (`id_pastel`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pedido_pastel_ibfk_2` FOREIGN KEY (`pk_pastel_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pedido_pastel` */

/* Procedure structure for procedure `PROC_BUSCAR_BEBIDAS_PEDIDO` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_BUSCAR_BEBIDAS_PEDIDO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_BUSCAR_BEBIDAS_PEDIDO`( in id_consulta int )
BEGIN
	SELECT `bebidas`.`id_bebida`, `bebidas`.`tipo_bebida`,`bebidas`.`quantidade_ml`, `bebidas`.`valor_unidade` 
	FROM pedido_bebida
	JOIN bebidas ON pedido_bebida.pk_pedido_bebida = bebidas.id_bebida
	JOIN pedido ON pedido_bebida.pk_bebida_pedido = pedido.id_pedido
	WHERE pedido.id_pedido = id_consulta	
	ORDER BY pedido.id_pedido ASC;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `PROC_BUSCAR_CLIENTE` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_BUSCAR_CLIENTE` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_BUSCAR_CLIENTE`(in id_consulta int )
BEGIN
		SELECT cliente.nome_cli, cliente.telefone, endereco.complemento_end, endereco.numero_end , endereco.bairro
		FROM pedido
		JOIN cliente ON pedido.pk_cliente = cliente.id_cliente
		join endereco_cliente on cliente.id_cliente = endereco_cliente.pk_endereco_cliente
		join endereco on endereco_cliente.pk_cliente_endereco = endereco.id_endereco
		WHERE pedido.id_pedido = id_consulta;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `PROC_BUSCAR_PASTEL_PEDIDO` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_BUSCAR_PASTEL_PEDIDO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_BUSCAR_PASTEL_PEDIDO`(
	IN id_consulta int
    )
BEGIN
	SELECT pastel.sabor_pastel, pastel.valor_unidade, pastel.qtd_pastel, pastel.valor_unidade * pastel.qtd_pastel 'total'
	 FROM pedido_pastel
	JOIN pastel ON pedido_pastel.pk_pedido_pastel = pastel.id_pastel
	JOIN pedido ON pedido_pastel.pk_pastel_pedido = pedido.id_pedido
	WHERE pedido.id_pedido = id_consulta
	order by pastel.sabor_pastel asc;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `PROC_BUSCAR_POR_ID` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_BUSCAR_POR_ID` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_BUSCAR_POR_ID`(
IN id_consulta INT
)
BEGIN 
	SELECT cliente.nome_cli, cliente.telefone, endereco.complemento_end,  endereco.numero_end, endereco.bairro
	FROM endereco_cliente AS edc
	JOIN cliente ON edc.pk_endereco_cliente = cliente.id_cliente
	JOIN endereco ON edc.pk_cliente_endereco = endereco.id_endereco
	WHERE cliente.id_cliente = id_consulta;
END */$$
DELIMITER ;

/* Procedure structure for procedure `PROC_CADASTRAR_BAIRROS` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_CADASTRAR_BAIRROS` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_CADASTRAR_BAIRROS`(
	IN nome_bairro VARCHAR(255),
	IN taxa_entrega  VARCHAR(255)
  )
BEGIN
	INSERT INTO localizacao(nome_bairro, taxa_entrega)
	VALUES(nome_bairro, taxa_entrega);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `PROC_CADASTRAR_BEBIDA` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_CADASTRAR_BEBIDA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_CADASTRAR_BEBIDA`(
	in `tipo_bebida` varchar(255),
	in `sabor` varchar(255), 
	in `fruto` VARCHAR(255),
	in `quantidade_ml` VARCHAR(10),
	in `valor_unidade` decimal(10,2)
    )
BEGIN
	insert into `bebidas`(`tipo_bebida`,`sabor`,`fruto`,`quantidade_ml`,`valor_unidade`)
	values(`tipo_bebida`,`sabor`,`fruto`,`quantidade_ml`,`valor_unidade`);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `PROC_CADASTRA_CLIENTE_TESTE` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_CADASTRA_CLIENTE_TESTE` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_CADASTRA_CLIENTE_TESTE`(
	IN nome VARCHAR(255),
	IN phone VARCHAR(255)
)
BEGIN
	set @nome = nome;
    set @phone = phone;
	INSERT INTO cliente (nome_cli, telefone, perfil_cli) VALUES (@nome, @phone, DEFAULT);
    select last_insert_id() AS 'id_cliente';
END */$$
DELIMITER ;

/* Procedure structure for procedure `PROC_CADASTRA_PASTEL` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_CADASTRA_PASTEL` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_CADASTRA_PASTEL`(
	in `nome_card` varchar(255),
	in `ingrediente_card` VARCHAR(255),
	in `valor_unidade_card` decimal(10,2)
    )
BEGIN
	INSERT INTO cardapio_pastel(`nome_card`,`ingrediente_card`,`valor_unidade_card`)
	VALUES(`nome_card`,`ingrediente_card`,`valor_unidade_card`);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `PROC_CADAST_CLI_PEDIDO` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_CADAST_CLI_PEDIDO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_CADAST_CLI_PEDIDO`(
	IN nome_cli VARCHAR(255), IN telefone VARCHAR(255)
    )
BEGIN
	INSERT INTO cliente(nome_cli, telefone) VALUES (nome_cli, telefone);
	SET @idcliente = LAST_INSERT_ID();
	SELECT @idcliente;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `PROC_CONSULTA_PEDIDO_ID` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_CONSULTA_PEDIDO_ID` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_CONSULTA_PEDIDO_ID`(
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
	END */$$
DELIMITER ;

/* Procedure structure for procedure `PROC_DEL_BEBIDAS` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_DEL_BEBIDAS` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_DEL_BEBIDAS`(in id_delete int)
BEGIN
	delete from bebidas where id_bebida = id_delete;
END */$$
DELIMITER ;

/* Procedure structure for procedure `PROC_DEL_CARDAPIO_PASTEL` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_DEL_CARDAPIO_PASTEL` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_DEL_CARDAPIO_PASTEL`( in id_delete int)
BEGIN
	DELETE FROM cardapio_pastel WHERE id_cardapio_card = id_delete; 
	END */$$
DELIMITER ;

/* Procedure structure for procedure `PROC_DEL_PEDIDO` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_DEL_PEDIDO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_DEL_PEDIDO`(
	in id_delete int	
    )
BEGIN	
	DELETE FROM pedido
	WHERE id_pedido = id_delete and data_pedido = curdate();
	END */$$
DELIMITER ;

/* Procedure structure for procedure `PROC_INSERE_ENDERECO_CLIENTE` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_INSERE_ENDERECO_CLIENTE` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_INSERE_ENDERECO_CLIENTE`(
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

END */$$
DELIMITER ;

/* Procedure structure for procedure `PROC_INSERT_AMD` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_INSERT_AMD` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_INSERT_AMD`( 
	IN nome VARCHAR(255), 
	IN login VARCHAR(255),
	IN senha VARCHAR(50) 
	)
BEGIN
		INSERT INTO ADMIN(nome, login, senha) VALUES(nome, login, senha);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `PROC_IN_PEDIDO_BEBIDA` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_IN_PEDIDO_BEBIDA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_IN_PEDIDO_BEBIDA`(
	IN qtd_bebida INT, 
	IN pk_pedido_bebida INT,
	IN pk_bebida_pedido INT
    )
BEGIN
	INSERT INTO pedido_bebida(qtd_bebida,pk_pedido_bebida, pk_bebida_pedido) 
	VALUES (qtd_bebida,pk_pedido_bebida, pk_bebida_pedido);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `PROC_LOGAR_USUARIO` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_LOGAR_USUARIO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_LOGAR_USUARIO`(
	IN nome VARCHAR(150),
	IN senha VARCHAR(150)
    )
BEGIN
	set @login = nome;
	set @senha = senha;
	SELECT id_cliente FROM cliente wHERE login_cli = @login AND senha_cli = @senha;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `PROC_SEL_BEBIDA_ID` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_SEL_BEBIDA_ID` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_SEL_BEBIDA_ID`(IN id_consulta INT)
BEGIN
		SELECT * FROM `bebidas` WHERE `id_bebida` = id_consulta;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `PROC_SEL_PASTEL_ID` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_SEL_PASTEL_ID` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_SEL_PASTEL_ID`(IN id_consulta int)
BEGIN
		SELECT * FROM `cardapio_pastel` WHERE `id_cardapio_card` = id_consulta;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `PROC_UP_BEBIDA` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_UP_BEBIDA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_UP_BEBIDA`(
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
END */$$
DELIMITER ;

/* Procedure structure for procedure `PROC_UP_PASTEL` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_UP_PASTEL` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_UP_PASTEL`(
	IN id_update int,
	IN `nome_card` VARCHAR(255),
	IN `ingrediente_card` VARCHAR(255),
	IN `valor_unidade_card` DECIMAL(10,2)    
    )
BEGIN
	update cardapio_pastel
	set nome_card =nome_card, ingrediente_card= ingrediente_card, valor_unidade_card =valor_unidade_card
	where `id_cardapio_card` = id_update;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `PROC_UP_PEDIDO` */

/*!50003 DROP PROCEDURE IF EXISTS  `PROC_UP_PEDIDO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_UP_PEDIDO`(
	IN id_update INT,
	IN situacao VARCHAR(45),
	in taxa_entrega decimal(10,2)
)
BEGIN 
	UPDATE pedido
	SET situacao = situacao, taxa_entrega = taxa_entrega
	WHERE pedido.id_pedido = id_update;
END */$$
DELIMITER ;

/*Table structure for table `vw_consulta_bairros` */

DROP TABLE IF EXISTS `vw_consulta_bairros`;

/*!50001 DROP VIEW IF EXISTS `vw_consulta_bairros` */;
/*!50001 DROP TABLE IF EXISTS `vw_consulta_bairros` */;

/*!50001 CREATE TABLE  `vw_consulta_bairros`(
 `id_localizacao` int(11) ,
 `nome_bairro` varchar(255) ,
 `taxa_entrega` decimal(10,2) 
)*/;

/*Table structure for table `vw_consulta_bebidas` */

DROP TABLE IF EXISTS `vw_consulta_bebidas`;

/*!50001 DROP VIEW IF EXISTS `vw_consulta_bebidas` */;
/*!50001 DROP TABLE IF EXISTS `vw_consulta_bebidas` */;

/*!50001 CREATE TABLE  `vw_consulta_bebidas`(
 `id_bebida` int(11) ,
 `tipo_bebida` varchar(100) ,
 `sabor` varchar(100) ,
 `fruto` varchar(100) ,
 `quantidade_ml` varchar(20) ,
 `valor_unidade` decimal(18,2) 
)*/;

/*Table structure for table `vw_consulta_cardapio` */

DROP TABLE IF EXISTS `vw_consulta_cardapio`;

/*!50001 DROP VIEW IF EXISTS `vw_consulta_cardapio` */;
/*!50001 DROP TABLE IF EXISTS `vw_consulta_cardapio` */;

/*!50001 CREATE TABLE  `vw_consulta_cardapio`(
 `id_cardapio` int(11) ,
 `nome` varchar(100) ,
 `ingrediente` text ,
 `valor_unidade` decimal(10,2) 
)*/;

/*Table structure for table `vw_exibe_pedido_feito` */

DROP TABLE IF EXISTS `vw_exibe_pedido_feito`;

/*!50001 DROP VIEW IF EXISTS `vw_exibe_pedido_feito` */;
/*!50001 DROP TABLE IF EXISTS `vw_exibe_pedido_feito` */;

/*!50001 CREATE TABLE  `vw_exibe_pedido_feito`(
 `id_pedido` int(11) ,
 `valor_total` decimal(18,2) ,
 `forma_entrega` varchar(50) ,
 `situacao` varchar(45) ,
 `data_pedido` date ,
 `taxa_entrega` decimal(10,2) ,
 `nome_cli` varchar(255) ,
 `id_cliente` int(11) ,
 `cartao` varchar(15) 
)*/;

/*View structure for view vw_consulta_bairros */

/*!50001 DROP TABLE IF EXISTS `vw_consulta_bairros` */;
/*!50001 DROP VIEW IF EXISTS `vw_consulta_bairros` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_consulta_bairros` AS select `localizacao`.`id_localizacao` AS `id_localizacao`,`localizacao`.`nome_bairro` AS `nome_bairro`,`localizacao`.`taxa_entrega` AS `taxa_entrega` from `localizacao` */;

/*View structure for view vw_consulta_bebidas */

/*!50001 DROP TABLE IF EXISTS `vw_consulta_bebidas` */;
/*!50001 DROP VIEW IF EXISTS `vw_consulta_bebidas` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_consulta_bebidas` AS select `bebidas`.`id_bebida` AS `id_bebida`,`bebidas`.`tipo_bebida` AS `tipo_bebida`,`bebidas`.`sabor` AS `sabor`,`bebidas`.`fruto` AS `fruto`,`bebidas`.`quantidade_ml` AS `quantidade_ml`,`bebidas`.`valor_unidade` AS `valor_unidade` from `bebidas` */;

/*View structure for view vw_consulta_cardapio */

/*!50001 DROP TABLE IF EXISTS `vw_consulta_cardapio` */;
/*!50001 DROP VIEW IF EXISTS `vw_consulta_cardapio` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_consulta_cardapio` AS select `cardapio_pastel`.`id_cardapio_card` AS `id_cardapio`,`cardapio_pastel`.`nome_card` AS `nome`,`cardapio_pastel`.`ingrediente_card` AS `ingrediente`,`cardapio_pastel`.`valor_unidade_card` AS `valor_unidade` from `cardapio_pastel` */;

/*View structure for view vw_exibe_pedido_feito */

/*!50001 DROP TABLE IF EXISTS `vw_exibe_pedido_feito` */;
/*!50001 DROP VIEW IF EXISTS `vw_exibe_pedido_feito` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_exibe_pedido_feito` AS select `pedido`.`id_pedido` AS `id_pedido`,`pedido`.`valor_total` AS `valor_total`,`pedido`.`forma_entrega` AS `forma_entrega`,`pedido`.`situacao` AS `situacao`,`pedido`.`data_pedido` AS `data_pedido`,`pedido`.`taxa_entrega` AS `taxa_entrega`,`cliente`.`nome_cli` AS `nome_cli`,`cliente`.`id_cliente` AS `id_cliente`,`forma_pagamento`.`cartao` AS `cartao` from ((`pedido` join `cliente` on(`pedido`.`pk_cliente` = `cliente`.`id_cliente`)) join `forma_pagamento` on(`pedido`.`id_pedido` = `forma_pagamento`.`pk_tbpedido` and `pedido`.`situacao` = 'em andamento' or `pedido`.`situacao` = 'Recusado' or `pedido`.`situacao` = 'Confirmado' and `pedido`.`data_pedido` = curdate() and `pedido`.`valor_total` > 0)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
