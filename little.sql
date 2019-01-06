# Host: 127.0.0.1  (Version 5.5.5-10.1.36-MariaDB)
# Date: 2019-01-06 10:44:01
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "coin_record"
#

DROP TABLE IF EXISTS `coin_record`;
CREATE TABLE `coin_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) DEFAULT NULL,
  `master_id` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT '1970-01-01 00:00:00',
  `updated_at` datetime DEFAULT '1970-01-01 00:00:00',
  `status` tinyint(3) DEFAULT '0',
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

#
# Data for table "coin_record"
#

INSERT INTO `coin_record` VALUES (1,'',NULL,'1970-01-01 00:00:00','1970-01-01 00:00:00',0,NULL);

#
# Structure for table "login_record"
#

DROP TABLE IF EXISTS `login_record`;
CREATE TABLE `login_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT '1970-01-01 00:00:00',
  `updated_at` datetime DEFAULT '1970-01-01 00:00:00',
  `status` tinyint(3) DEFAULT '0',
  `desc` varchar(255) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

#
# Data for table "login_record"
#

INSERT INTO `login_record` VALUES (1,'1','1970-01-01 00:00:00','2019-01-06 00:00:00',2,NULL,NULL);

#
# Structure for table "master"
#

DROP TABLE IF EXISTS `master`;
CREATE TABLE `master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `blood` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `cron` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT '1970-01-01 00:00:00',
  `updated_at` datetime DEFAULT '1970-01-01 00:00:00',
  `status` tinyint(3) DEFAULT '0',
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

#
# Data for table "master"
#

INSERT INTO `master` VALUES (1,'初级怪物1','100','1','10','1970-01-01 00:00:00','1970-01-01 00:00:00',1,NULL),(2,'初级怪物2','120','1','12','1970-01-01 00:00:00','1970-01-01 00:00:00',1,NULL);

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) DEFAULT NULL,
  `openid` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `cron` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT '1970-01-01 00:00:00',
  `updated_at` datetime DEFAULT '1970-01-01 00:00:00',
  `status` tinyint(3) DEFAULT '0',
  `desc` varchar(255) DEFAULT NULL,
  `header_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'test','openid_test','aefjaofniaif','16515','1','1970-01-01 00:00:00','2019-01-06 02:18:12',1,NULL,NULL);

#
# Structure for table "user_weapon"
#

DROP TABLE IF EXISTS `user_weapon`;
CREATE TABLE `user_weapon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) DEFAULT NULL,
  `weapon_id` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT '1970-01-01 00:00:00',
  `updated_at` datetime DEFAULT '1970-01-01 00:00:00',
  `status` tinyint(3) DEFAULT '0',
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

#
# Data for table "user_weapon"
#

INSERT INTO `user_weapon` VALUES (1,'1','1','1970-01-01 00:00:00','1970-01-01 00:00:00',0,NULL),(2,'1','2','1970-01-01 00:00:00','1970-01-01 00:00:00',0,NULL);

#
# Structure for table "weapon"
#

DROP TABLE IF EXISTS `weapon`;
CREATE TABLE `weapon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT '1970-01-01 00:00:00',
  `updated_at` datetime DEFAULT '1970-01-01 00:00:00',
  `status` tinyint(3) DEFAULT '0',
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

#
# Data for table "weapon"
#

INSERT INTO `weapon` VALUES (1,'武器1','20','1970-01-01 00:00:00','1970-01-01 00:00:00',1,NULL),(2,'武器2','40','1970-01-01 00:00:00','1970-01-01 00:00:00',1,NULL);
