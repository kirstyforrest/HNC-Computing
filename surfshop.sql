-- phpMyAdmin SQL Dump
-- version 3.3.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2010 at 12:20 PM
-- Server version: 5.1.49
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: 'surfshop'
--

-- --------------------------------------------------------

--
-- Table structure for table 'customers'
--

DROP TABLE IF EXISTS customers;
CREATE TABLE IF NOT EXISTS customers (
  customerno int(8) NOT NULL AUTO_INCREMENT,
  firstname varchar(64) DEFAULT NULL,
  lastname varchar(64) DEFAULT NULL,
  address varchar(128) DEFAULT NULL,
  town varchar(64) DEFAULT NULL,
  postcode varchar(16) DEFAULT NULL,
  email varchar(128) DEFAULT NULL,
  username varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (customerno)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'customers'
--

INSERT INTO customers (customerno, firstname, lastname, address, town, postcode, email, username, `password`) VALUES
(1, 'Joe', 'Bloggs', '123 High St', 'Elgin', 'IV30 1BW', 'joey@gmail.com', 'joey', 'password'),
(2, 'Jane', 'Doe', '12 Moray St', 'Elgin', 'IV30 1LN', 'jane@yahoo.com', 'janey', 'password');

-- --------------------------------------------------------

--
-- Table structure for table 'orderlines'
--

DROP TABLE IF EXISTS orderlines;
CREATE TABLE IF NOT EXISTS orderlines (
  orderno int(8) NOT NULL DEFAULT '0',
  itemno int(8) NOT NULL DEFAULT '0',
  quantity int(8) DEFAULT NULL,
  PRIMARY KEY (orderno,itemno),
  KEY itemno (itemno)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'orderlines'
--


-- --------------------------------------------------------

--
-- Table structure for table 'orders'
--

DROP TABLE IF EXISTS orders;
CREATE TABLE IF NOT EXISTS orders (
  orderno int(8) NOT NULL AUTO_INCREMENT,
  customerno int(8) DEFAULT NULL,
  PRIMARY KEY (orderno),
  KEY customerno (customerno)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'orders'
--


-- --------------------------------------------------------

--
-- Table structure for table 'products'
--

DROP TABLE IF EXISTS products;
CREATE TABLE IF NOT EXISTS products (
  itemno int(8) NOT NULL DEFAULT '0',
  itemname varchar(32) DEFAULT NULL,
  description varchar(128) DEFAULT NULL,
  price decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (itemno)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'products'
--

INSERT INTO products (itemno, itemname, description, price) VALUES
(1, 'Boogie board', 'A short wide foam surfboard designed for riding waves in the prone position.', 79.95),
(2, 'Hawiian shirt', 'Flourescent yellow, orange and pink; one size fits all.', 16.95),
(3, 'Sun hat', 'Wide-brimmed straw hat.', 12.95),
(4, 'Board shorts', 'Pure cotton, blue and white, very cool.', 19.95),
(5, 'Sunglasses', 'Big, bad dark glasses to protect your eyes from UV rays.', 39.95),
(6, 'Zinc cream', 'Get the Shane Warne look and keep the sun off your nose at the same time!', 4.95);


-- Adding blob

ALTER TABLE products;
ADD image blob;

UPDATE products SET image= LOAD_FILE('H:/Ecommerce assessment/surfshop/boogie-board.JPG') WHERE itemno = '1';
UPDATE products SET image= LOAD_FILE('H:/Ecommerce assessment/surfshop/hawaiaan-shirt.JPG') WHERE itemno = '2';
UPDATE products SET image= LOAD_FILE('H:/Ecommerce assessment/surfshop/sun-hat.JPG')WHERE itemno = '3';
UPDATE products SET image= LOAD_FILE('H:/Ecommerce assessment/surfshop/board-shorts.JPG')WHERE itemno = '4';
UPDATE products SET image= LOAD_FILE('H:/Ecommerce assessment/surfshop/sunglasses.JPG')WHERE itemno = '5';
UPDATE products SET image= LOAD_FILE('H:/Ecommerce assessment/surfshop/zinc-cream.JPG')WHERE itemno = '6';
