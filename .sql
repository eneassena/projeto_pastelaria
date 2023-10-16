-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`location`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `location` (
  `location_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `taxa` DECIMAL(7,2) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`location_id`))
ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;
# AUTO_INCREMENT = 15 
 
-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(100) NOT NULL,
  `last_name` VARCHAR(100),
  `phone` VARCHAR(15) NOT NULL,
  `user_type` VARCHAR(50) NOT NULL DEFAULT 'comun' COMMENT 'cliente|superuser|empreendedor|comun',
  `login` VARCHAR(100) NULL DEFAULT NULL unique,
  `password` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`user_id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `address` (
  `address_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `number` VARCHAR(15) NOT NULL,
  `complement` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`address_id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`cardapio_pastel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `menu_fried_pastry` (
  `menu_fried_pastry_id` INT(11) NOT NULL AUTO_INCREMENT,
  `flavor_of_pastel` VARCHAR(150) NOT NULL,
  `unitary_value` DECIMAL(8,2) NOT NULL,
  `ingredient` TEXT NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`menu_fried_pastry_id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`drink`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `drink` (
  `drink_id` INT(11) NOT NULL AUTO_INCREMENT,
  `type_of_drink` VARCHAR(100) NOT NULL,
  `flavor` VARCHAR(100) NULL DEFAULT NULL,
  `fruit` VARCHAR(50) NULL DEFAULT NULL,
  `quantity_in_ml` VARCHAR(30) NOT NULL,
  `unitary_value` DECIMAL(10,2) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`drink_id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`form_of_payment_id`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `form_of_payment` (
	`form_of_payment_id` INT NOT NULL AUTO_INCREMENT,
	`form_of_payment_name` ENUM('Dinheiro', 'Cartão') NOT NULL,
	`created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
	`updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
	PRIMARY KEY (`form_of_payment_id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`details_item_order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `details_item_order` (
	`details_item_order_id` INT NOT NULL AUTO_INCREMENT,
	`count_items` INT NOT NULL,
	`total` DECIMAL(10,2) NOT NULL,
	`created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
	`updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
	PRIMARY KEY (`details_item_order_id`))
ENGINE = InnoDB;
  
-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `order` (
	`order_id` INT NOT NULL AUTO_INCREMENT,
	`amount` DECIMAL(10,2) NULL default 0.00,
	`delivery_form` VARCHAR(45) NOT NULL,
	`situation` VARCHAR(45) NOT NULL DEFAULT 'em andamento',
	`request_date` DATE NOT NULL,
	`delivery_fee` DECIMAL(10,2) NULL DEFAULT 0.00,
	`fk1_form_of_payment_id` INT NOT NULL,
	`fk1_user_id` INT NOT NULL,
	`created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
	`updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
    PRIMARY KEY (`order_id`),
    CONSTRAINT `fk1_form_of_payment_id` FOREIGN KEY (`fk1_form_of_payment_id`) REFERENCES `form_of_payment`(`form_of_payment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk1_user_id` FOREIGN KEY (`fk1_user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`address_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `address_user` (
	`address_user_id` INT NOT NULL AUTO_INCREMENT,
	`fk2_user_id` INT NOT NULL,
	`fk1_address_id` INT NOT NULL,
	`created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
	`updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
	PRIMARY KEY (`address_user_id`),
    CONSTRAINT `fk2_user_id` FOREIGN KEY (`fk2_user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk1_address_id` FOREIGN KEY (`fk1_address_id`) REFERENCES `address`(`address_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`pastry_order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pastry_order` (
	`pastry_order_id` INT NOT NULL AUTO_INCREMENT,
	`fk1_menu_fried_pastry_id` INT NOT NULL,
	`fk1_order_id` INT NOT NULL,
	`fk1_details_item_order_id` INT NOT NULL,
	`created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
	`updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
	PRIMARY KEY (`pastry_order_id`),
    CONSTRAINT `fk1_order_id` FOREIGN KEY (`fk1_order_id`) REFERENCES `pedido`(`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk1_menu_fried_pastry_id` FOREIGN KEY (`fk1_menu_fried_pastry_id`) REFERENCES `cardapio_pastel`(`menu_fried_pastry_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk1_details_item_order_id` FOREIGN KEY (`fk1_details_item_order_id`) REFERENCES `detalhes_item_pedido`(`details_item_order_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `modelando_pastelaria`.`drink_order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `drink_order` (
	`drink_order_id` INT NOT NULL AUTO_INCREMENT,
	`fk1_drink_id` INT NOT NULL,
	`fk2_order_id` INT NOT NULL,
	`fk2_details_item_order_id` INT NOT NULL,
	`created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
	`updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
	PRIMARY KEY (`drink_order_id`),
    CONSTRAINT `fk2_order_id` FOREIGN KEY (`fk2_order_id`) REFERENCES `pedido`(`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk1_drink_id` FOREIGN KEY (`fk1_drink_id`) REFERENCES `bebida`(`drink_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk2_details_item_order_id` FOREIGN KEY (`fk2_details_item_order_id`) REFERENCES `detalhes_item_pedido`(`details_item_order_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;