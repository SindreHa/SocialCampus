-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema applikasjon
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema applikasjon
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `applikasjon` DEFAULT CHARACTER SET utf8 ;
USE `applikasjon` ;

-- -----------------------------------------------------
-- Table `applikasjon`.`bruker_status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `applikasjon`.`bruker_status` ;

CREATE TABLE IF NOT EXISTS `applikasjon`.`bruker_status` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `applikasjon`.`bruker`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `applikasjon`.`bruker` ;

CREATE TABLE IF NOT EXISTS `applikasjon`.`bruker` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(255) NULL DEFAULT NULL,
  `fullt_navn` VARHCAR(255) NOT NULL,
  `laget` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` VARCHAR(245) NOT NULL,
  `bilde` BLOB NOT NULL,
  `er_moderator` TINYINT(1) NOT NULL,
  `siste_aktivitet` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bruker_status_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `bruker_status_id` (`bruker_status_id` ASC),
  CONSTRAINT `bruker_ibfk_1`
    FOREIGN KEY (`bruker_status_id`)
    REFERENCES `applikasjon`.`bruker_status` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `applikasjon`.`status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `applikasjon`.`status` ;

CREATE TABLE IF NOT EXISTS `applikasjon`.`status` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `applikasjon`.`kategori`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `applikasjon`.`kategori` ;

CREATE TABLE IF NOT EXISTS `applikasjon`.`kategori` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `beskrivelse` VARCHAR(45) NOT NULL,
  `skaper` INT(11) NOT NULL,
  `laget` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_id` INT(11) NOT NULL,
  `bruker_status_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `skaper_idx` (`skaper` ASC),
  INDEX `fk_kategori_status1_idx` (`status_id` ASC),
  INDEX `fk_kategori_bruker_status1_idx` (`bruker_status_id` ASC),
  CONSTRAINT `fk_kategori_bruker_status1`
    FOREIGN KEY (`bruker_status_id`)
    REFERENCES `applikasjon`.`bruker_status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_kategori_status1`
    FOREIGN KEY (`status_id`)
    REFERENCES `applikasjon`.`status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `skaper`
    FOREIGN KEY (`skaper`)
    REFERENCES `applikasjon`.`kategori` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `applikasjon`.`grupper`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `applikasjon`.`grupper` ;

CREATE TABLE IF NOT EXISTS `applikasjon`.`grupper` (
  `id` INT(11) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `kategori_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_grupper_kategori1_idx` (`kategori_id` ASC),
  CONSTRAINT `fk_grupper_kategori1`
    FOREIGN KEY (`kategori_id`)
    REFERENCES `applikasjon`.`kategori` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `applikasjon`.`grupper_har_brukere`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `applikasjon`.`grupper_har_brukere` ;

CREATE TABLE IF NOT EXISTS `applikasjon`.`grupper_har_brukere` (
  `grupper_id` INT(11) NOT NULL,
  `bruker_id` INT(11) NOT NULL,
  PRIMARY KEY (`grupper_id`, `bruker_id`),
  INDEX `fk_grupper_has_bruker_bruker1_idx` (`bruker_id` ASC),
  INDEX `fk_grupper_has_bruker_grupper1_idx` (`grupper_id` ASC),
  CONSTRAINT `fk_grupper_has_bruker_bruker1`
    FOREIGN KEY (`bruker_id`)
    REFERENCES `applikasjon`.`bruker` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_grupper_has_bruker_grupper1`
    FOREIGN KEY (`grupper_id`)
    REFERENCES `applikasjon`.`grupper` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `applikasjon`.`tråd`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `applikasjon`.`tråd` ;

CREATE TABLE IF NOT EXISTS `applikasjon`.`tråd` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `subjekt` VARCHAR(100) NOT NULL,
  `laget` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bruker_id` INT(11) NULL DEFAULT NULL,
  `status_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `bruker_id` (`bruker_id` ASC),
  INDEX `status_id` (`status_id` ASC),
  CONSTRAINT `tråd_ibfk_1`
    FOREIGN KEY (`bruker_id`)
    REFERENCES `applikasjon`.`bruker` (`id`),
  CONSTRAINT `tråd_ibfk_2`
    FOREIGN KEY (`status_id`)
    REFERENCES `applikasjon`.`status` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `applikasjon`.`post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `applikasjon`.`post` ;

CREATE TABLE IF NOT EXISTS `applikasjon`.`post` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `innhold` VARCHAR(100) NOT NULL,
  `laget` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tråd_id` INT(11) NULL DEFAULT NULL,
  `bruker_id` INT(11) NULL DEFAULT NULL,
  `status_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `tråd_id` (`tråd_id` ASC),
  INDEX `bruker_id` (`bruker_id` ASC),
  INDEX `status_id` (`status_id` ASC),
  CONSTRAINT `post_ibfk_1`
    FOREIGN KEY (`tråd_id`)
    REFERENCES `applikasjon`.`tråd` (`id`),
  CONSTRAINT `post_ibfk_2`
    FOREIGN KEY (`bruker_id`)
    REFERENCES `applikasjon`.`bruker` (`id`),
  CONSTRAINT `post_ibfk_3`
    FOREIGN KEY (`status_id`)
    REFERENCES `applikasjon`.`status` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `applikasjon`.`profil`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `applikasjon`.`profil` ;

CREATE TABLE IF NOT EXISTS `applikasjon`.`profil` (
  `id` INT(11) NOT NULL,
  `fornavn` VARCHAR(45) NOT NULL,
  `etternavn` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `newpassword` VARCHAR(255) NOT NULL,
  `bilde` BLOB NOT NULL,
  `moderator` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `applikasjon`.`stemmegivning`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `applikasjon`.`stemmegivning` ;

CREATE TABLE IF NOT EXISTS `applikasjon`.`stemmegivning` (
  `post_id` INT(11) NOT NULL,
  `tråd_id` INT(11) NOT NULL,
  `innhold` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`post_id`, `tråd_id`),
  INDEX `fk_post_has_tråd_tråd1_idx` (`tråd_id` ASC),
  INDEX `fk_post_has_tråd_post1_idx` (`post_id` ASC),
  CONSTRAINT `fk_post_has_tråd_post1`
    FOREIGN KEY (`post_id`)
    REFERENCES `applikasjon`.`post` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_post_has_tråd_tråd1`
    FOREIGN KEY (`tråd_id`)
    REFERENCES `applikasjon`.`tråd` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `bruker_stemme_info` UNIQUE (`post_id`, `tråd_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

