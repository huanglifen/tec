SET FOREIGN_KEY_CHECKS=0{;}
DROP TABLE IF EXISTS `hx_admin`{;}
CREATE TABLE `hx_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `time` datetime DEFAULT NULL,
  `default` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8{;}

DROP TABLE IF EXISTS `hx_config`{;}
CREATE TABLE `hx_config` (
  `name` varchar(50) NOT NULL,
  `value` varchar(100) NOT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8{;}

INSERT INTO `hx_config` VALUES ('siteTitle', '北京华信杰通科技有限公司', '2015-03-25 07:46:19'){;}

DROP TABLE IF EXISTS `hx_indexrow`{;}
CREATE TABLE `hx_indexrow` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `column_num` tinyint(3) NOT NULL,
  `height` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sort` tinyint(3) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8{;}

INSERT INTO `hx_indexrow` VALUES ('1', '3', '153', '第一行', '1', '2015-03-25 07:54:53'){;}

DROP TABLE IF EXISTS `hx_indexcolumn`{;}
CREATE TABLE `hx_indexcolumn` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `row_id` int(10) NOT NULL,
  `sort` tinyint(3) NOT NULL,
  `width` tinyint(3) NOT NULL,
  `content` text NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8{;}

INSERT INTO `hx_indexcolumn` VALUES ('1', '1', '1', '2', '<h2 style=\"font: bold 16px/normal Tahoma, 宋体; margin: 0px; padding: 0px; text-align: center; color: rgb(31, 77, 160); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal; -webkit-text-stroke-width: 0px;\">    关于华信杰通</h2><p>    <a class=\"link_txt\" style=\"font: 12px/normal Tahoma, 宋体; color: rgb(31, 77, 160); text-transform: none; text-indent: 0px; letter-spacing: normal; text-decoration: none; word-spacing: 0px; float: right; white-space: normal; font-size-adjust: none; font-stretch: normal; -webkit-text-stroke-width: 0px;\" href=\"/tec/page/17\">&gt;&gt;详情</a></p><p class=\"detail_txt\" style=\"font: 12px/20px 微软雅黑, 宋体; margin: 30px 0px 0px; padding: 0px; color: rgb(0, 0, 0); text-transform: none; text-indent: 2em; letter-spacing: normal; clear: both; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal; -webkit-text-stroke-width: 0px;\">    北京华信杰通科技有限公司，总部位于北京，集研发、销售、服务于一体，致力于为通信运营商提供端到端解决方案。</p><p>    &nbsp;</p>', '2015-03-25 07:54:53'){;}
INSERT INTO `hx_indexcolumn` VALUES ('2', '1', '3', '2', '<h2 style=\"font: bold 16px/normal Tahoma, 宋体; margin: 0px; padding: 0px; text-align: center; color: rgb(31, 77, 160); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal; -webkit-text-stroke-width: 0px;\">关于我们</h2><p><br/></p><p style=\"margin: 0px; padding: 0px; line-height: 20px; clear: both; font-family: 微软雅黑, 宋体; font-size: 12px;\">联系电话：0311-67792177</p><p style=\"margin: 0px; padding: 0px; line-height: 20px; clear: both; font-family: 微软雅黑, 宋体; font-size: 12px;\">传真电话：0311-67792177</p><p style=\"margin: 0px; padding: 0px; line-height: 20px; clear: both; font-family: 微软雅黑, 宋体; font-size: 12px;\">地址：河北石家庄长安区剑桥春雨</p><p>&nbsp;</p>', '2015-03-25 07:54:53'){;}
INSERT INTO `hx_indexcolumn` VALUES ('3', '1', '2', '5', '<h2 style=\"font: bold 16px/normal Tahoma, 宋体; margin: 0px; padding: 0px; text-align: center; color: rgb(31, 77, 160); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal; -webkit-text-stroke-width: 0px;\">产品&amp;解决方案</h2><p><a class=\"link_txt\" style=\"font: 12px/normal Tahoma, 宋体; color: rgb(31, 77, 160); text-transform: none; text-indent: 0px; letter-spacing: normal; text-decoration: none; word-spacing: 0px; float: right; white-space: normal; font-size-adjust: none; font-stretch: normal; -webkit-text-stroke-width: 0px;\" href=\"/tec/page/13\">&gt;&gt;详情</a></p><ul class=\" list-paddingleft-2\" style=\"margin: 0px auto; padding: 0px; width: 460px; color: rgb(0, 0, 0); text-transform: none; text-indent: 0px; letter-spacing: normal; overflow: hidden; word-spacing: 0px; white-space: normal; -webkit-text-stroke-width: 0px;\"><li><p style=\"margin: 10px 0px 0px; padding: 0px; text-align: center; line-height: 20px; clear: both; font-family: 微软雅黑, 宋体; font-size: 12px;\"><img title=\"1427266830105643.gif\" alt=\"product_ico1.gif\" src=\"public/ueditor/php/upload/image/20150325/1427266830105643.gif\" _src=\"public/ueditor/php/upload/image/20150325/1427266830105643.gif\"/></p><p style=\"margin: 10px 0px 0px; padding: 0px; text-align: center; line-height: 20px; clear: both; font-family: 微软雅黑, 宋体; font-size: 12px;\"><a style=\"color: rgb(31, 77, 160);\" href=\"/tec/admin/editRow/27#\" _href=\"/tec/admin/editRow/27#\">中国移动办公平台</a></p></li><li><p style=\"margin: 10px 0px 0px; padding: 0px; text-align: center; line-height: 20px; clear: both; font-family: 微软雅黑, 宋体; font-size: 12px;\"><img title=\"1427266849791268.gif\" alt=\"product_ico2.gif\" src=\"public/ueditor/php/upload/image/20150325/1427266849791268.gif\" _src=\"public/ueditor/php/upload/image/20150325/1427266849791268.gif\"/></p><p style=\"margin: 10px 0px 0px; padding: 0px; text-align: center; line-height: 20px; clear: both; font-family: 微软雅黑, 宋体; font-size: 12px;\"><a style=\"color: rgb(31, 77, 160);\" href=\"/tec/admin/editRow/27#\" _href=\"/tec/admin/editRow/27#\">卫生厅项目</a></p></li><li><p style=\"margin: 10px 0px 0px; padding: 0px; text-align: center; line-height: 20px; clear: both; font-family: 微软雅黑, 宋体; font-size: 12px;\"><img title=\"1427266877225228.gif\" alt=\"product_ico1.gif\" src=\"public/ueditor/php/upload/image/20150325/1427266877225228.gif\" _src=\"/tec/publicpublic/ueditor/php/upload/image/20150325/1427266877225228.gif\"/></p><p style=\"margin: 10px 0px 0px; padding: 0px; text-align: center; line-height: 20px; clear: both; font-family: 微软雅黑, 宋体; font-size: 12px;\"><a style=\"color: rgb(31, 77, 160);\" href=\"/tec/admin/editRow/27#\" _href=\"/tec/admin/editRow/27#\">中国移动办公平台</a></p></li></ul><p>&nbsp;</p>', '2015-03-25 07:54:53'){;}

DROP TABLE IF EXISTS `hx_nav`{;}
CREATE TABLE `hx_nav` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `sort` int(10) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8{;}

INSERT INTO `hx_nav` VALUES ('28', '联系我们', '18', '0', '1', '2', '2015-03-25 08:30:08', '4895c08c8305b6738b8492df5a446019.gif'){;}
INSERT INTO `hx_nav` VALUES ('29', '诚聘英才', '16', '0', '2', '2', '2015-03-25 08:30:27', '10c4e5d14da0f6de04555e89eba4d263.gif'){;}
INSERT INTO `hx_nav` VALUES ('30', '产品&解决方案', '13', '0', '1', '1', '2015-03-25 08:31:06', ''){;}
INSERT INTO `hx_nav` VALUES ('31', '服务客户', '14', '0', '2', '1', '2015-03-25 08:31:39', ''){;}
INSERT INTO `hx_nav` VALUES ('32', '合作伙伴', '15', '0', '3', '1', '2015-03-25 08:31:53', ''){;}
INSERT INTO `hx_nav` VALUES ('33', '诚聘英才', '16', '0', '4', '1', '2015-03-25 08:32:11', ''){;}
INSERT INTO `hx_nav` VALUES ('34', '关于我们', '17', '0', '5', '1', '2015-03-25 08:36:47', ''){;}

DROP TABLE IF EXISTS `hx_page`{;}
CREATE TABLE `hx_page` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `content` text,
  `parent_id` int(10) DEFAULT NULL,
  `keyword` varchar(50) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `default` tinyint(1) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `sort` tinyint(3) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8{;}

INSERT INTO `hx_page` VALUES ('12', '卫生厅办公平台', '<p><img src=\"../public/ueditor/php/upload/image/20150325/1427267044304191.jpg\" title=\"1427267044304191.jpg\" alt=\"产品解决方案_03.jpg\"/></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"><br/></span></p><p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">卫生厅办公平台</span></p><hr style=\"border:1px solid #DEDEE0\"/><p>&nbsp;&nbsp;&nbsp;&nbsp;</p><p style=\"white-space: normal; text-indent: 2em; line-height: 1.5em;\"><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">随着智能手机的普及，通过手机来进行公文处理和任务督办已经成为一大趋势。大齿集团的移动OA办公系统是利用移动引擎套件（Mobile Engine Suite)--MES进行二次开发来实现集团内的收文、发文、请求汇报等各类工作任务的处理，从而大大提高了工作效率。<br/></span></p><p style=\"white-space: normal; text-indent: 2em;\"><br/></p><p style=\"white-space: normal; text-indent: 2em; line-height: 1.5em;\"><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">移动引擎套件（Mobile Engine Suite），简称MES，是企业移动应用开发平台，该平台定位于便捷、安全、可靠、可扩展的企业级移动应用中间件。通过将复杂的移动通信协议和移动信息化应用处理技术封装起来，为企业、政府的移动信息化建设提供一套标准化、简单的开发环境和应用平台。实现与缘由的PC应用系统的无缝整合与快速部署，从而完成对原有应用系统的移动化。或者使用MES开发全新的移动应用系统，而不依赖于缘由的PC系统。</span></p><p style=\"white-space: normal; text-indent: 2em;\"><br/></p><p style=\"white-space: normal; text-indent: 2em; line-height: 1.5em;\"><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">MES提供了完整的企业移动应用解决方案平台，参照现代软件开发的最佳实战，采用插件式的架构方式，将MES设计为客户端、服务端、IDE（集成开发环境）、脚本、以及其它众多功能插件组成的强大移动开发平台。各部件、插件之间互不依赖有着较强的独立性，如此的软件架构保障了客户或合作伙伴可以更灵活的对MES平台进行组装选择或者自由扩展。</span></p><p style=\"white-space: normal; text-indent: 2em;\"><br/></p><p style=\"white-space: normal; text-indent: 2em; line-height: 1.5em;\"><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">目前支持各类主流的智能手机，操作系统包括：Android、苹果IOS、塞班等。</span></p><p><br/></p>', '0', '卫生厅,办公平台', '2015-03-25 08:06:04', '0', '产品&解决方案', '1', null){;}
INSERT INTO `hx_page` VALUES ('13', '移动OA办公平台', '<p><img src=\"../public/ueditor/php/upload/image/20150325/1427267215101223.jpg\" title=\"1427267215101223.jpg\" alt=\"产品解决方案_03.jpg\"/></p><p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"><br/></span></p><p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">移动OA办公平台</span></p><hr style=\"border:1px solid #DEDEE0\"/><p style=\"text-indent: 2em; line-height: 1.5em;\"><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">随着智能手机的普及，通过手机来进行公文处理和任务督办已经成为一大趋势。大齿集团的移动OA办公系统是利用移动引擎套件（Mobile Engine Suite)--MES进行二次开发来实现集团内的收文、发文、请求汇报等各类工作任务的处理，从而大大提高了工作效率。<br/></span></p><p style=\"text-indent: 2em;\"><br/></p><p style=\"text-indent: 2em; line-height: 1.5em;\"><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">移动引擎套件（Mobile Engine Suite），简称MES，是企业移动应用开发平台，该平台定位于便捷、安全、可靠、可扩展的企业级移动应用中间件。通过将复杂的移动通信协议和移动信息化应用处理技术封装起来，为企业、政府的移动信息化建设提供一套标准化、简单的开发环境和应用平台。实现与缘由的PC应用系统的无缝整合与快速部署，从而完成对原有应用系统的移动化。或者使用MES开发全新的移动应用系统，而不依赖于缘由的PC系统。</span></p><p style=\"text-indent: 2em;\"><br/></p><p style=\"text-indent: 2em; line-height: 1.5em;\"><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">MES提供了完整的企业移动应用解决方案平台，参照现代软件开发的最佳实战，采用插件式的架构方式，将MES设计为客户端、服务端、IDE（集成开发环境）、脚本、以及其它众多功能插件组成的强大移动开发平台。各部件、插件之间互不依赖有着较强的独立性，如此的软件架构保障了客户或合作伙伴可以更灵活的对MES平台进行组装选择或者自由扩展。</span></p><p style=\"text-indent: 2em;\"><br/></p><p style=\"text-indent: 2em; line-height: 1.5em;\"><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">目前支持各类主流的智能手机，操作系统包括：Android、苹果IOS、塞班等。</span></p>', '12', '移动,OA', '2015-03-25 08:16:46', '0', '', '1', null){;}
INSERT INTO `hx_page` VALUES ('14', '服务客户', '<p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">服务客户</span></p><hr style=\"border:1px solid #DEDEE0\"/><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<img src=\"../public/ueditor/php/upload/image/20150325/1427267890508076.jpg\" title=\"1427267890508076.jpg\" alt=\"服务客户_06.jpg\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../public/ueditor/php/upload/image/20150325/1427267890508076.jpg\" title=\"1427267890508076.jpg\" alt=\"服务客户_06.jpg\" style=\"white-space: normal;\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<img src=\"../public/ueditor/php/upload/image/20150325/1427267890508076.jpg\" title=\"1427267890508076.jpg\" alt=\"服务客户_06.jpg\" style=\"white-space: normal;\"/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国移动河北分公司&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国移动河北分公司&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国移动河北分公司<br/></p><p><br/></p><p><br/></p><p><br/></p><p style=\"white-space: normal;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src=\"../public/ueditor/php/upload/image/20150325/1427267890508076.jpg\" title=\"1427267890508076.jpg\" alt=\"服务客户_06.jpg\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../public/ueditor/php/upload/image/20150325/1427267890508076.jpg\" title=\"1427267890508076.jpg\" alt=\"服务客户_06.jpg\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<img src=\"../public/ueditor/php/upload/image/20150325/1427267890508076.jpg\" title=\"1427267890508076.jpg\" alt=\"服务客户_06.jpg\"/></p><p style=\"white-space: normal;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国移动河北分公司&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国移动河北分公司&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国移动河北分公司</p><p><br/></p><p><br/></p><p><br/></p><p style=\"white-space: normal;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src=\"../public/ueditor/php/upload/image/20150325/1427267890508076.jpg\" title=\"1427267890508076.jpg\" alt=\"服务客户_06.jpg\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../public/ueditor/php/upload/image/20150325/1427267890508076.jpg\" title=\"1427267890508076.jpg\" alt=\"服务客户_06.jpg\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<img src=\"../public/ueditor/php/upload/image/20150325/1427267890508076.jpg\" title=\"1427267890508076.jpg\" alt=\"服务客户_06.jpg\"/></p><p style=\"white-space: normal;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国移动河北分公司&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国移动河北分公司&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国移动河北分公司</p><p><br/></p>', '0', '服务,移动', '2015-03-25 08:19:19', '0', '服务客户', '1', '{\"origName\":\"\\u670d\\u52a1\\u5ba2\\u6237_03.jpg\",\"fileName\":\"f288f1bed1742c39fa16f9045eed6ffc.jpg\"}'){;}
INSERT INTO `hx_page` VALUES ('15', '合作伙伴', '<p style=\"white-space: normal;\">合作伙伴</p><hr style=\"border:1px solid #DEDEE0\"/><p style=\"white-space: normal;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<img src=\"../public/ueditor/php/upload/image/20150325/1427267890508076.jpg\" title=\"1427267890508076.jpg\" alt=\"服务客户_06.jpg\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../public/ueditor/php/upload/image/20150325/1427267890508076.jpg\" title=\"1427267890508076.jpg\" alt=\"服务客户_06.jpg\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<img src=\"../public/ueditor/php/upload/image/20150325/1427267890508076.jpg\" title=\"1427267890508076.jpg\" alt=\"服务客户_06.jpg\"/></p><p style=\"white-space: normal;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国移动河北分公司&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国移动河北分公司&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国移动河北分公司<br/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src=\"../public/ueditor/php/upload/image/20150325/1427267890508076.jpg\" title=\"1427267890508076.jpg\" alt=\"服务客户_06.jpg\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../public/ueditor/php/upload/image/20150325/1427267890508076.jpg\" title=\"1427267890508076.jpg\" alt=\"服务客户_06.jpg\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<img src=\"../public/ueditor/php/upload/image/20150325/1427267890508076.jpg\" title=\"1427267890508076.jpg\" alt=\"服务客户_06.jpg\"/></p><p style=\"white-space: normal;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国移动河北分公司&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国移动河北分公司&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国移动河北分公司</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src=\"../public/ueditor/php/upload/image/20150325/1427267890508076.jpg\" title=\"1427267890508076.jpg\" alt=\"服务客户_06.jpg\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../public/ueditor/php/upload/image/20150325/1427267890508076.jpg\" title=\"1427267890508076.jpg\" alt=\"服务客户_06.jpg\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<img src=\"../public/ueditor/php/upload/image/20150325/1427267890508076.jpg\" title=\"1427267890508076.jpg\" alt=\"服务客户_06.jpg\"/></p><p style=\"white-space: normal;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国移动河北分公司&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国移动河北分公司&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国移动河北分公司</p><p><br/></p>', '0', '合作伙伴', '2015-03-25 08:20:28', '0', '合作伙伴', '1', '{\"origName\":\"\\u670d\\u52a1\\u5ba2\\u6237_03.jpg\",\"fileName\":\"7128840a4cac283951f093c81132644a.jpg\"}'){;}
INSERT INTO `hx_page` VALUES ('16', '诚聘英才', '<p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(111, 111, 111); font-size: medium;\">诚聘英才</span><br/></p><hr style=\"border:1px solid #DEDEE0\"/><p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"><strong>&nbsp; &nbsp; &nbsp; <span style=\"font-size: 14px;\">JAVA高级软件工程师 3名</span></strong></span></p><p><br/></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;岗位描述</strong></span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"><strong><br/></strong></span></p><p><span style=\"font-size: 12px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; &nbsp; 1 、编写需求文档；</span></p><p><span style=\"font-size: 12px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"><br/></span></p><p><span style=\"font-size: 12px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; &nbsp; 2 、编写概要设计文档；<br/><br/></span></p><p><span style=\"font-size: 12px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; &nbsp; 3 、写详细设计文档；</span></p><p><span style=\"font-size: 12px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"><br/></span></p><p><span style=\"font-size: 12px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; &nbsp; 4 、编写程序代码；</span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"><br/></span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;职位要求:</strong></span></p><p><span style=\"font-size: 14px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"><strong><br/></strong></span></p><p><span style=\"font-size: 12px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; &nbsp; 1 、年龄35以下，具有良好的职业操守；</span></p><p><span style=\"font-size: 12px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"><br/></span></p><p><span style=\"font-size: 12px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; &nbsp; 2 、计算机类考业大考及以上学历毕业；<br/></span></p><p><span style=\"font-size: 12px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"><br/></span></p><p><span style=\"font-size: 12px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; &nbsp; 3 、在IT行业有不低于3年的研发编程工作经验；<br/></span></p><p><span style=\"font-size: 12px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"><br/></span></p><p><span style=\"font-size: 12px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; &nbsp; 4 、熟悉JAVA设计模式，熟悉Struts，Spring，Hibernate等流行框架；并能应用JavaScript进行编写客户端页面校&nbsp;验脚本；</span></p><p><span style=\"font-size: 12px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"><br/></span></p><p><span style=\"font-size: 12px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; &nbsp; 5 、掌握数握库基础知识，熟练使用Oracle/MS SQL/MYSQL等数握库中的一种或多种,熟练使用SQL语句, 对数据库进行操作与应用；</span></p><p><span style=\"font-size: 12px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"><br/></span></p><p><span style=\"font-size: 12px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; &nbsp; 6 、能够独立编写代码、独自处理开发中遇到问题,并了解单元测试工作；</span></p><p><span style=\"font-size: 12px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"><br/></span></p><p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 12px;\">&nbsp; &nbsp; &nbsp; &nbsp; 7 、思维清晰，善于沟通，有团队意识，能自觉服从团队的约定；</span><span style=\"font-family: 宋体, SimSun; font-size: 14px;\"><br/></span></p><p><br/></p>', '0', '招聘', '2015-03-25 08:24:00', '0', '诚聘英才', '1', '{\"origName\":\"\\u8bda\\u8058\\u82f1\\u624d_06.jpg\",\"fileName\":\"0e10ef4d7666892305bf4ac040709013.jpg\"}'){;}
INSERT INTO `hx_page` VALUES ('17', '公司概况', '<p><img src=\"../public/ueditor/php/upload/image/20150325/1427268282931939.jpg\" title=\"1427268282931939.jpg\" alt=\"关于我们_03.jpg\"/></p><p><br/></p><p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">关于我们</span></p><hr style=\"border:1px solid #DEDEE0\"/><p style=\"text-indent: 2em;\">北京华信杰通科技有限公司，总部位于北京，集研发、销售、服务于一体，致力于为通信运营商提供端到端解决方案。<br/></p>', '0', '公司简介', '2015-03-25 08:26:34', '0', '关于我们', '1', null){;}
INSERT INTO `hx_page` VALUES ('18', '联系方式', '<p>联系方式</p><hr style=\"border:1px solid #DEDEE0\"/><p style=\"white-space: normal; text-indent: 2em;\">&nbsp;联系电话：0311-67792177</p><p style=\"white-space: normal;\">&nbsp; &nbsp; &nbsp; &nbsp; 传真电话：0311-67792177</p><p style=\"white-space: normal; text-indent: 2em;\">&nbsp;地址：河北石家庄长安区剑桥春雨<br/></p>', '17', '联系方式', '2015-03-25 08:27:07', '0', '', '1', null){;}

DROP TABLE IF EXISTS `hx_source`{;}
CREATE TABLE `hx_source` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `path` varchar(255) NOT NULL,
  `origname` varchar(255) NOT NULL,
  `sort` tinyint(3) NOT NULL,
  `link` varchar(150) NOT NULL,
  `type` tinyint(3) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8{;}

