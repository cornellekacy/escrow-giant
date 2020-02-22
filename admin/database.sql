SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `escrow-giant` ;
CREATE SCHEMA IF NOT EXISTS `escrow-giant` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `escrow-giant` ;




CREATE TABLE `user` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL ,
  `email` varchar(255) NOT NULL ,
  `password` varchar(255) NOT NULL,
  UNIQUE (username),
  PRIMARY KEY (`user_id`))
ENGINE = InnoDB;

INSERT INTO `user` (`user_id`, `username`, `email`,`password`) VALUES
(1,  'supperuser','cornelle@gmail.com', md5('admin45'));

CREATE TABLE `payment` (
  `payment_id` INT NOT NULL AUTO_INCREMENT,
  `bitcoin` varchar(255) NOT NULL ,
  `paypal` varchar(255) NOT NULL,
  PRIMARY KEY (`payment_id`))
ENGINE = InnoDB;
INSERT INTO `payment` (`payment_id`, `bitcoin`, `paypal`) VALUES
(1,  'test','cornelle@gmail.com');

CREATE TABLE `dispute` (
  `dispute_id` INT NOT NULL AUTO_INCREMENT,
  `transaction-id` varchar(255) NOT NULL ,
  `fullname` varchar(255) NOT NULL,
  `trn-date` varchar(255) NOT NULL,
  `reasons` varchar(255) NOT NULL,
  PRIMARY KEY (`dispute_id`))
ENGINE = InnoDB;

DROP TABLE IF EXISTS `transaction` ;
CREATE TABLE `transaction` (
  `transaction_id` INT NOT NULL AUTO_INCREMENT,
  `trans_id` varchar(255) NOT NULL ,
  `name` varchar(255) NOT NULL ,
  `username` varchar(255) NOT NULL ,
  `country` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `who` varchar(255) NOT NULL,
  `what` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `bitcoinaddress` varchar(255) NOT NULL,
  `paypalemail` varchar(255) NOT NULL,
  `expected` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `descript` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `dstatus` varchar(255) NOT NULL,
  `funds` varchar(255) NOT NULL,
  PRIMARY KEY (`transaction_id`))
ENGINE = InnoDB;
