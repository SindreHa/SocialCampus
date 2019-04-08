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
CREATE SCHEMA IF NOT EXISTS `application` DEFAULT CHARACTER SET latin1 ;
USE `application` ;

-- -----------------------------------------------------
-- Table `application`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `application`.`user` ;

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
-- Table `application`.`groups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `application`.`groups` ;

CREATE TABLE IF NOT EXISTS `application`.`groups` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  UNIQUE INDEX groups_name_unique(`name`),
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `application`.`post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `application`.`post` ;

CREATE TABLE IF NOT EXISTS `application`.`post` (
  `post_id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `content` VARCHAR(855) NOT NULL,
  `likes` INT(11) NULL DEFAULT NULL,
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` INT(11) NULL DEFAULT NULL,
  `groups_id` INT(11) NOT NULL,
  PRIMARY KEY (`post_id`),
  CONSTRAINT `fk_post_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `user` (`id`),
  CONSTRAINT `fk_post_groups`
    FOREIGN KEY (`groups_id`)
    REFERENCES `groups` (`id`)
)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `application`.`commentary`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `application`.`commentary` ;

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
-- Table `application`.`groups_has_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `application`.`groups_has_users` ;

CREATE TABLE IF NOT EXISTS `application`.`groups_has_users` (
  `groups_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`groups_id`, `user_id`),
  INDEX `fk_groups_has_users1_idx` (`user_id` ASC),
  INDEX `fk_groups_has_users2_idx` (`groups_id` ASC),
  CONSTRAINT `groups_has_users_foreign_key1`
    FOREIGN KEY (`user_id`)
    REFERENCES `application`.`user` (`id`)
  CONSTRAINT `groups_has_users_foreign_key2`
    FOREIGN KEY (`groups_id`)
    REFERENCES `application`.`groups` (`id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `application`.`likes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `application`.`likes` ;

CREATE TABLE IF NOT EXISTS `application`.`likes` (
  `id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  `post_id` INT(11) NOT NULL,
  `like_unlike` INT(2) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `likes_foreign_key1` (`user_id` ASC),
  INDEX `likes_foreign_key2` (`post_id` ASC),
  CONSTRAINT `likes_foreign_key1`
    FOREIGN KEY (`user_id`)
    REFERENCES `application`.`user` (`id`)
  CONSTRAINT `likes_foreign_key2`
    FOREIGN KEY (`post_id`)
    REFERENCES `application`.`post` (`post_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- Drop table
drop table if exists events;
drop table if exists category;