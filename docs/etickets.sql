-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2014 at 04:29 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `etickets`
--
DROP DATABASE IF EXISTS etickets;
CREATE DATABASE IF NOT EXISTS `etickets` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `etickets`;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `placeID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(100),
  `dateTime` datetime NOT NULL,
  `delete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`event_id`),
  KEY `fk_event_place_idx` (`placeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
  `place_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `photo` varchar(100),
  `description` text,
  PRIMARY KEY (`place_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `place_has_section`
--

CREATE TABLE IF NOT EXISTS `place_has_section` (
  `placeID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  KEY `fk_place_has_section_place1_idx` (`placeID`),
  KEY `fk_place_has_section_section1_idx` (`sectionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `date` date NOT NULL,
  `confirmation` varchar (100),
  `bank` varchar(30), 
  `state` enum('PROCESSING','DELIVERED') NOT NULL DEFAULT 'PROCESSING',
  `more` text,
  PRIMARY KEY (`reservation_id`),
  KEY `fk_reservation_user1_idx` (`userID`),
  KEY `fk_reservation_event1_idx` (`eventID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  `default` tinyint(1) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`, `default`) VALUES
(1, 'admin', 0),
(2, 'organizador', 0),
(3, 'vendedor', 0),
(4, 'cliente', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE IF NOT EXISTS `seat` (
  `seat_id` int(11) NOT NULL AUTO_INCREMENT,
  `sectionID` int(11) NOT NULL,
  `number_row` int(11) NOT NULL,
  `number_seat` int(11) NOT NULL,
  `occupied` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`seat_id`),
  KEY `fk_seat_section1_idx` (`sectionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `rows` int(11) NOT NULL,
  `seats_per_rows` int(11) NOT NULL,
  `price` float NOT NULL,
  `description` text,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sf_config`
--

CREATE TABLE IF NOT EXISTS `sf_config` (
  `sf_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `sf_table` varchar(64) NOT NULL DEFAULT '',
  `sf_field` varchar(64) NOT NULL DEFAULT '',
  `sf_type` varchar(16) DEFAULT 'default',
  `sf_related` varchar(100) DEFAULT '',
  `sf_label` varchar(64) DEFAULT '',
  `sf_desc` tinytext,
  `sf_order` int(3) DEFAULT NULL,
  `sf_hidden` int(1) DEFAULT '0',
  PRIMARY KEY (`sf_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `sf_config`
--

INSERT INTO `sf_config` (`sf_id`, `sf_table`, `sf_field`, `sf_type`, `sf_related`, `sf_label`, `sf_desc`, `sf_order`, `sf_hidden`) VALUES
(1, 'event', 'id', 'default', '|', '', '', 0, 1),
(2, 'event', 'place_id', 'related', 'place|place_id|place|name', 'Lugar', 'Lugar del evento', 1, 0),
(3, 'event', 'name', 'default', '|', 'Nombre', 'Nombre del evento', 2, 0),
(4, 'event', 'photo', 'file', '|', 'Foto', 'Foto del evento', 3, 0),
(5, 'event', 'dateTime', 'default', '|', 'Fecha', 'Fecha y Hora del evento', 4, 0),
(6, 'event', 'delete', 'checkbox', '|', '', '', 5, 1),
(7, 'place', 'id', 'default', '|', '', '', 0, 0),
(8, 'place', 'name', 'default', '|', 'Nombre', 'Nombre del lugar', 1, 0),
(9, 'place', 'photo', 'file', '|', 'Foto', 'Foto del Lugar', 2, 0),
(10, 'place', 'description', 'default', '|', 'Descripcion', 'Desripcion del Lugar', 3, 0),
(11, 'place_has_section', 'place_id', 'related', 'place|place_id|place|name', 'Lugar', 'Id del lugar', 0, 0),
(12, 'place_has_section', 'section_id', 'related', 'section|section_id|section|description', 'Seccion', 'Id de la sección', 1, 0),
(13, 'reservation', 'id', 'default', '|', '', '', 0, 0),
(14, 'reservation', 'user_id', 'default', '|', '', '', 1, 0),
(15, 'reservation', 'event_id', 'default', '|', '', '', 2, 0),
(16, 'reservation', 'date', 'default', '|', '', '', 3, 0),
(17, 'reservation', 'state', 'default', '|', '', '', 4, 0),
(18, 'reservation', 'more', 'default', '|', '', '', 5, 0),
(19, 'role', 'id', 'default', '|', '', '', 0, 0),
(20, 'role', 'role', 'default', '|', '', '', 1, 0),
(21, 'role', 'default', 'default', '|', '', '', 2, 0),
(22, 'seat', 'id', 'default', '|', '', '', 0, 0),
(23, 'seat', 'section_id', 'default', '|', '', '', 1, 0),
(24, 'seat', 'number_row', 'default', '|', '', '', 2, 0),
(25, 'seat', 'number_seat', 'default', '|', '', '', 3, 0),
(26, 'seat', 'occupied', 'default', '|', '', '', 4, 0),
(27, 'section', 'id', 'default', '|', '', '', 0, 0),
(28, 'section', 'rows', 'default', '|', '', '', 1, 0),
(29, 'section', 'seats_per_rows', 'default', '|', '', '', 2, 0),
(30, 'section', 'price', 'default', '|', '', '', 3, 0),
(31, 'section', 'description', 'default', '|', '', '', 4, 0),
(32, 'user', 'id', 'default', '|', '', '', 0, 0),
(33, 'user', 'name', 'default', '|', '', '', 2, 0),
(34, 'user', 'email', 'default', '|', '', '', 3, 0),
(35, 'user', 'username', 'default', '|', '', '', 4, 0),
(36, 'user', 'role_id', 'default', '|', '', '', 5, 0),
(37, 'user', 'delete', 'default', '|', '', '', 6, 0),
(38, 'user_profile', 'id', 'default', '|', '', '', 0, 0),
(39, 'user_profile', 'user_id', 'default', '|', '', '', 1, 0),
(40, 'user_profile', 'address', 'default', '|', '', '', 2, 0),
(41, 'user_profile', 'city', 'default', '|', '', '', 3, 0),
(42, 'user_profile', 'province', 'default', '|', '', '', 4, 0),
(43, 'user_profile', 'zipcode', 'default', '|', '', '', 5, 0),
(44, 'user_profile', 'phone', 'default', '|', '', '', 6, 0),
(45, 'user_profile', 'celular', 'default', '|', '', '', 7, 0),
(46, 'user_profile', 'role_id', 'default', '|', '', '', 8, 0),
(47, 'user_profile', 'delete', 'default', '|', '', '', 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--


CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(80) NOT NULL,
  `username` varchar(45) NOT NULL,
  `roleID` int(11) NOT NULL, 
  `delete` tinyint(1) NOT NULL DEFAULT '0',
  FOREIGN KEY(`roleID`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `user` (`name`, `password`, `email`, `username`, `roleID`, `delete` ) VALUES
	('admin', 'admin', 'admin@etickets.com', 'admin', 1, 0 );

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `address` varchar(80) NOT NULL,
  `city` varchar(45) NOT NULL,
  `province` varchar(40) NOT NULL,
  `zipcode` varchar(45) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  PRIMARY KEY (`profile_id`),
  KEY `user_id` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_event_place` FOREIGN KEY (`placeID`) REFERENCES `place` (`place_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `place_has_section`
--
ALTER TABLE `place_has_section`
  ADD CONSTRAINT `fk_place_has_section_place1` FOREIGN KEY (`placeID`) REFERENCES `place` (`place_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_place_has_section_section1` FOREIGN KEY (`sectionID`) REFERENCES `section` (`section_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_reservation_event1` FOREIGN KEY (`eventID`) REFERENCES `event` (`event_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservation_user1` FOREIGN KEY (`userID`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `fk_seat_section1` FOREIGN KEY (`sectionID`) REFERENCES `section` (`section_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;


--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;