SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `tableprefix_admin`;
CREATE TABLE `tableprefix_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET utf8 COLLATE utf8_general_ci;
DROP TABLE IF EXISTS `tableprefix_config`;
CREATE TABLE `tableprefix_config` (
  `name` varchar(50) NOT NULL,
  `value` varchar(100) NOT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET utf8 COLLATE utf8_general_ci;
DROP TABLE IF EXISTS `tableprefix_nav`;
CREATE TABLE `tableprefix_nav` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `sort` int(10) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET utf8 COLLATE utf8_general_ci;
DROP TABLE IF EXISTS `tableprefix_page`;
CREATE TABLE `tableprefix_page` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `content` text,
  `parent_id` int(10) DEFAULT NULL,
  `keyword` varchar(20) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET utf8 COLLATE utf8_general_ci;
DROP TABLE IF EXISTS `tableprefix_source`;
CREATE TABLE `tableprefix_source` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) NOT NULL,
  `type` tinyint(3) NOT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET utf8 COLLATE utf8_general_ci;
