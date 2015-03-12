/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : huaxin

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-03-12 10:43:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tableprefix_admin
-- ----------------------------
DROP TABLE IF EXISTS `tableprefix_admin`;
CREATE TABLE `tableprefix_admin` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tableprefix_config
-- ----------------------------
DROP TABLE IF EXISTS `tableprefix_config`;
CREATE TABLE `tableprefix_config` (
  `name` varchar(50) NOT NULL,
  `value` varchar(100) NOT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tableprefix_nav
-- ----------------------------
DROP TABLE IF EXISTS `tableprefix_nav`;
CREATE TABLE `tableprefix_nav` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `sort` int(10) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tableprefix_page
-- ----------------------------
DROP TABLE IF EXISTS `tableprefix_page`;
CREATE TABLE `tableprefix_page` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` text,
  `parent_id` int(10) DEFAULT NULL,
  `keyword` varchar(20) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tableprefix_source
-- ----------------------------
DROP TABLE IF EXISTS `tableprefix_source`;
CREATE TABLE `tableprefix_source` (
  `id` int(10) NOT NULL,
  `path` varchar(100) NOT NULL,
  `type` tinyint(3) NOT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
