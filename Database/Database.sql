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
DROP SCHEMA IF EXISTS `application`;
CREATE SCHEMA IF NOT EXISTS `application` DEFAULT CHARACTER SET utf8 ;
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
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` VARCHAR(245) NOT NULL,
  `avatar` VARCHAR(100) NOT NULL,
  `moderator` TINYINT(1) NOT NULL,
  UNIQUE INDEX username_unique (username),
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `application`.`groups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `application`.`groups` ;

CREATE TABLE IF NOT EXISTS `application`.`groups` (
  `id` INT(11) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(180) NOT NULL,
  `group_icon` VARCHAR(50) NOT NULL,
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
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `content` VARCHAR(855) NOT NULL,
  `likes` INT(11) NULL DEFAULT '0',
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` INT(11) NULL DEFAULT NULL,
  `group_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_post_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `user` (`id`),
  CONSTRAINT `fk_post_group_id`
    FOREIGN KEY (`group_id`)
    REFERENCES `groups` (`id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `application`.`commentary`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `application`.`commentary` ;

CREATE TABLE IF NOT EXISTS `application`.`commentary` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `content` VARCHAR(850) NOT NULL,
  `made` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` INT(11) NOT NULL DEFAULT '0',
  `post_id` INT(11) NULL DEFAULT NULL,
  `user_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `post_id` (`post_id` ASC),
  INDEX `user_id` (`user_id` ASC),
  CONSTRAINT `commentary_foreign_key1`
    FOREIGN KEY (`post_id`)
    REFERENCES `application`.`post` (`id`),
  CONSTRAINT `commentary_foreign_key2`
    FOREIGN KEY (`user_id`)
    REFERENCES `application`.`user` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `application`.`groups_has_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `application`.`groups_has_users` ;

CREATE TABLE IF NOT EXISTS `application`.`groups_has_users` (
  `group_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`group_id`, `user_id`),
  INDEX `fk_groups_has_users1_idx` (`user_id` ASC),
  INDEX `fk_groups_has_users2_idx` (`group_id` ASC),
  CONSTRAINT `groups_has_users_foreign_key1`
    FOREIGN KEY (`user_id`)
    REFERENCES `application`.`user` (`id`),
  CONSTRAINT `groups_has_users_foreign_key2`
    FOREIGN KEY (`group_id`)
    REFERENCES `application`.`groups` (`id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `application`.`likes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `application`.`likes` ;

CREATE TABLE IF NOT EXISTS `application`.`likes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `post_id` INT(11) NOT NULL,
  `commentary_id` INT(11) NULL,
  PRIMARY KEY (`id`),
  INDEX `likes_foreign_key1` (`user_id` ASC),
  INDEX `likes_foreign_key2` (`post_id` ASC),
  CONSTRAINT `user_foreign_key`
    FOREIGN KEY (`user_id`)
    REFERENCES `application`.`user` (`id`),
  CONSTRAINT `post_foreign_key`
    FOREIGN KEY (`post_id`)
    REFERENCES `application`.`post` (`id`),
  CONSTRAINT `commentary_foreign_key`
    FOREIGN KEY (`commentary_id`)
    REFERENCES `application`.`commentary` (`id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-- INSERT setninger for grupper --

INSERT INTO application.groups (id, name, description, group_icon)
VALUES
  ('1', 'Golf', 'Golf er en sport der enkeltspillere slÃ¥r en liten ball ved hjelp av forskjellige kÃ¸ller, med mÃ¥l om at den havner i et bestemt hull.', 'fas fa-golf-ball'),
  ('2', 'Bordtennis', 'Bordtennis er en racketsport som spilles, vanligvis innendÃ¸rs. Spillerne slÃ¥r med smÃ¥ racketer.', 'fas fa-table-tennis'), 
  ('3', 'Fotball', 'Fotball er en ballidrett mellom to lag, hvert bestÃ¥ende av elleve spillere, hvor formÃ¥let er Ã¥ fÃ¥ ballen flest ganger inn i motstanderlagets mÃ¥l.', 'fas fa-futbol'),
  ('4', 'Volleyball', 'Volleyball er en ballidrett med seks spillere pÃ¥ banen for hvert lag. Spillerne roterer med klokken rundt pÃ¥ banen slik at alle kommer pÃ¥ de ulike posisjonene.', 'fas fa-volleyball-ball'),
  ('5', 'Basketball', 'Basketball, basket eller kurvball er en lagsport der to lag, bestÃ¥ende av fem spillere, prÃ¸ver Ã¥ score poeng mot hverandre ved Ã¥ kaste en ball gjennom en ring.', 'fas fa-basketball-ball'),
  ('6', 'Spilling', 'Videospill er spill der deltakeren bruker elektronisk utstyr og en bildeskjerm. Slike spill innebÃ¦rer interaksjon med et brukergrensesnitt for Ã¥ generere en visuell tilbakemelding.', 'fas fa-gamepad'),
  ('7', 'Fotografering', 'Fotografi er en permanent gjengivelse av et bilde ved hjelp av lys, optikk og lysfÃ¸lsomme komponenter som kan lagre bildeinformasjonen.', 'fas fa-camera'),
  ('8', 'Bokklubb', 'Bok er en sammenbinding av flere blad av papir, pergament eller annet egnet materiale. Materialet er sammenfÃ¸yd langs en side, ryggen, og som regel innbundet i et mer robust materiale.', 'fas fa-book');