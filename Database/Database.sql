-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema application
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema application
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `application` DEFAULT CHARACTER SET utf8 ;
USE `application` ;

-- -----------------------------------------------------
-- Table `application`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `application`.`category` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  `creator` INT(11) NOT NULL,
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `creator_idx` (`creator` ASC),
  CONSTRAINT `category_foreign_key3`
    FOREIGN KEY (`creator`)
    REFERENCES `application`.`category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `application`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `application`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(255) NULL DEFAULT NULL,
  `full_name` VARCHAR(255) NOT NULL,
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` VARCHAR(245) NOT NULL,
  `avatar` VARCHAR(100) NOT NULL,
  `moderator` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `application`.`post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `application`.`post` (
  `post_id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `content` VARCHAR(855) NOT NULL,
  `likes` INT(11) NULL DEFAULT NULL,
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  INDEX `user_id_idx` (`user_id` ASC),
  CONSTRAINT `post_foreign_key1`
    FOREIGN KEY (`user_id`)
    REFERENCES `application`.`user` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `application`.`commentary`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `application`.`commentary` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `content` VARCHAR(850) NOT NULL,
  `made` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_id` INT(11) NULL DEFAULT NULL,
  `user_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `post_id` (`post_id` ASC),
  INDEX `user_id` (`user_id` ASC),
  CONSTRAINT `commentary_foreign_key1`
    FOREIGN KEY (`post_id`)
    REFERENCES `application`.`post` (`post_id`),
  CONSTRAINT `commentary_foreign_key2`
    FOREIGN KEY (`user_id`)
    REFERENCES `application`.`user` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `application`.`events`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `application`.`events` (
  `id` INT(11) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `start_date` VARCHAR(50) NOT NULL,
  `end_date` VARCHAR(50) NOT NULL,
  `created` DATETIME NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `application`.`groups`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `application`.`groups` (
  `id` INT(11) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `category_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_group_category1_idx` (`category_id` ASC),
  CONSTRAINT `groups_foreign_key`
    FOREIGN KEY (`category_id`)
    REFERENCES `application`.`category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `application`.`groups_has_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `application`.`groups_has_users` (
  `groups_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`groups_id`, `user_id`),
  INDEX `fk_groups_has_users1_idx` (`user_id` ASC),
  INDEX `fk_groups_has_users2_idx` (`groups_id` ASC),
  CONSTRAINT `groups_has_users_foreign_key1`
    FOREIGN KEY (`user_id`)
    REFERENCES `application`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `groups_has_users_foreign_key2`
    FOREIGN KEY (`groups_id`)
    REFERENCES `application`.`groups` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `application`.`likes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `application`.`likes` (
  `user_id` INT(11) NOT NULL,
  `post_id` INT(11) NOT NULL,
  `id` INT(11) NOT NULL,
  `like_unlike` INT(2) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `likes_foreign_key1` (`user_id` ASC),
  INDEX `likes_foreign_key2` (`post_id` ASC),
  CONSTRAINT `likes_foreign_key1`
    FOREIGN KEY (`user_id`)
    REFERENCES `application`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `likes_foreign_key2`
    FOREIGN KEY (`post_id`)
    REFERENCES `application`.`post` (`post_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

USE `application` ;

-- -----------------------------------------------------
-- procedure newCat
-- -----------------------------------------------------

DELIMITER $$
USE `application`$$
CREATE DEFINER=`root`@`%` PROCEDURE `newCat`(
	in p_username varchar(45),
	in p_description varchar(45)
)
begin
	insert into category (username, description)
    values (p_username, p_description);
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure newUser
-- -----------------------------------------------------

DELIMITER $$
USE `application`$$
CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `newUser`(
in p_username varchar(50),
    in p_password varchar(255),
    in p_email varchar(245)
)
begin

    insert into user (username, password, email)
    values (p_username, p_password, p_email);
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure showCat
-- -----------------------------------------------------

DELIMITER $$
USE `application`$$
CREATE DEFINER=`root`@`%` PROCEDURE `showCat`()
begin
	select username, description
    from category;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure updateProfil
-- -----------------------------------------------------

DELIMITER $$
USE `application`$$
CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `updateProfil`(
in p_id int(11),
in p_full_name varchar(255),
    in p_picture blob
)
begin
update user
set
full_name = p_full_name,
        picture = p_picture
where id = p_id;
end$$

DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
