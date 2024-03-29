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
-- Table `affiliate`.`site`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `affiliate`.`site` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(45) NULL,
  `intro` VARCHAR(1024) NULL,
  `meta_title` VARCHAR(128) NULL,
  `meta_description` VARCHAR(1025) NULL,
  `meta_image` VARCHAR(128) NULL,
  `description` VARCHAR(1024) NULL,
  `background` VARCHAR(128) NULL,
  `quotation_text` VARCHAR(1024) NULL,
  `quotation_author` VARCHAR(128) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `unique` (`url` ASC))
ENGINE = InnoDB

-- -----------------------------------------------------
-- Table `affiliate`.`topic`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `affiliate`.`topic` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `intro` VARCHAR(1024) NULL,
  `site_id` INT NULL,
  `meta_title` VARCHAR(128) NULL,
  `meta_description` VARCHAR(128) NULL,
  `meta_image` VARCHAR(128) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `unique` (`name` ASC))
ENGINE = InnoDB


-- -----------------------------------------------------
-- Table `affiliate`.`feature`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `affiliate`.`feature` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `product_id` INT NULL,
  `group_id` INT NULL,
  `value` VARCHAR(128) NULL,
  `type` VARCHAR(24) NULL
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `affiliate`.`attribute`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `affiliate`.`attribute` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `product_id` INT NULL,
  `value` VARCHAR(128) NULL,
  `type` VARCHAR(24) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `affiliate`.`group`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `affiliate`.`group` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `icon` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `unique` (`name` ASC))
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
  `name` VARCHAR(255) NULL,
  `provider` VARCHAR(255) NULL,
  `link` VARCHAR(1024) NULL,
  `identifier` VARCHAR(45) NULL,
  `image` VARCHAR(128) NULL,
  `price` INT NULL,
  `review_count` INT NULL,
  `review_value` INT NULL,
  `topic_id` INT NULL,
  `updated_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `affiliate`.`article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `affiliate`.`article` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `header` VARCHAR(45) NULL,
  `text` TEXT NULL,
  `image` VARCHAR(128) NULL,
  `topic_id` INT NULL,
  `updated_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `affiliate`.`info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `affiliate`.`info` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `header` VARCHAR(45) NULL,
  `text` TEXT NULL,
  `topic_id` INT NULL,
  `updated_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
