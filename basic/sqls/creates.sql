-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema klinbew_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema klinbew_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `klinbew_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `klinbew_db` ;

-- -----------------------------------------------------
-- Table `klinbew_db`.`project`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `klinbew_db`.`project` (
  `projectid` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  `alias` VARCHAR(45) NULL,
  `status` VARCHAR(45) NULL,
  `createdBy` INT NULL,
  `creationDate` DATETIME NULL,
  `modifyDate` DATETIME NULL,
  `fileName` VARCHAR(45) NULL,
  `productName` VARCHAR(45) NULL,
  `dokumentVersion` INT NULL,
  `productVersion` INT NULL,
  `referenceProjectId` INT NULL,
  `productDescription` VARCHAR(10000) NULL,
  PRIMARY KEY (`projectid`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `klinbew_db`.`reference`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `klinbew_db`.`reference` (
  `referenceId` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `file` VARCHAR(45) NULL,
  `version` INT NULL,
  PRIMARY KEY (`referenceId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `klinbew_db`.`referenceProject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `klinbew_db`.`referenceProject` (
  `referenceProjectId` INT NOT NULL AUTO_INCREMENT,
  `projectId` INT NULL,
  `referenceId` INT NULL,
  PRIMARY KEY (`referenceProjectId`),
  INDEX `project_idx` (`projectId` ASC),
  INDEX `reference_idx` (`referenceId` ASC),
  CONSTRAINT `project`
    FOREIGN KEY (`projectId`)
    REFERENCES `klinbew_db`.`project` (`projectid`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `reference`
    FOREIGN KEY (`referenceId`)
    REFERENCES `klinbew_db`.`reference` (`referenceId`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `klinbew_db`.`author`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `klinbew_db`.`author` (
  `authorId` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `fname` VARCHAR(45) NULL,
  PRIMARY KEY (`authorId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `klinbew_db`.`source`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `klinbew_db`.`source` (
  `sourceId` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(45) NULL,
  `authorId` INT NULL,
  `title` VARCHAR(45) NULL,
  `year` INT NULL,
  `place` VARCHAR(45) NULL,
  `publisher` VARCHAR(45) NULL,
  `keywords` VARCHAR(45) NULL,
  `text` VARCHAR(45) NULL,
  `status` INT NULL,
  `sourceRatingId` INT NULL,
  `summary` VARCHAR(45) NULL,
  PRIMARY KEY (`sourceId`),
  INDEX `authorId_idx` (`authorId` ASC),
  CONSTRAINT `authorId`
    FOREIGN KEY (`authorId`)
    REFERENCES `klinbew_db`.`author` (`authorId`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `klinbew_db`.`rating`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `klinbew_db`.`rating` (
  `ratingId` INT NOT NULL AUTO_INCREMENT,
  `ratedBy` INT NULL,
  `ratingDate` DATETIME NULL,
  `evidenceValue` INT NULL,
  `relevanceValue` INT NULL,
  `signValue` INT NULL,
  `use` INT NULL,
  `risk` INT NULL,
  `evidenceText` VARCHAR(45) NULL,
  `relevanceText` VARCHAR(45) NULL,
  `signText` VARCHAR(45) NULL,
  PRIMARY KEY (`ratingId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `klinbew_db`.`sourceProject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `klinbew_db`.`sourceProject` (
  `sourceProjectId` INT NOT NULL AUTO_INCREMENT,
  `projectId` INT NULL,
  `sourceId` INT NULL,
  `ratingId` INT NULL,
  PRIMARY KEY (`sourceProjectId`),
  INDEX `project_idx` (`projectId` ASC),
  INDEX `source_idx` (`sourceId` ASC),
  INDEX `ratingId_idx` (`ratingId` ASC),
  CONSTRAINT `projectId`
    FOREIGN KEY (`projectId`)
    REFERENCES `klinbew_db`.`project` (`projectid`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `sourceId`
    FOREIGN KEY (`sourceId`)
    REFERENCES `klinbew_db`.`source` (`sourceId`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `ratingId`
    FOREIGN KEY (`ratingId`)
    REFERENCES `klinbew_db`.`rating` (`ratingId`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
