-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema affiliate
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema affiliate
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `affiliate` DEFAULT CHARACTER SET utf8 ;
USE `affiliate` ;

-- -----------------------------------------------------
-- Table `affiliate`.`topic`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `affiliate`.`topic` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `affiliate`.`feature`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `affiliate`.`feature` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `product_id` INT NULL,
  `group_id` INT NULL,
  `value` VARCHAR(128) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `affiliate`.`group`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `affiliate`.`group` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `affiliate`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `affiliate`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(128) NULL,
  `password` VARCHAR(128) NULL,
  `remember_token` VARCHAR(128) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `affiliate`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `affiliate`.`product` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `link` VARCHAR(128) NULL,
  `identifier` VARCHAR(45) NULL,
  `topic_id` INT NULL,
  `updated_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
