


CREATE TABLE IF NOT EXISTS `think_data`(
    `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
    `data` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

INSERT INTO `think_data`(`id`,`data`) VALUES
    (1,'thinkphp'),
    (2,'php'),
    (3,'framework');



CREATE TABLE IF NOT EXISTS `zwy_data`(
    `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL COMMENT '名称',
    `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
    PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;
INSERT INTO `zwy_data`(`id`,`name`,`status`) VALUES
    (1,'thinkphp',1),
    (2,'onethink',1),
    (3,'topthink',1);




CREATE TABLE IF NOT EXISTS `think_user`(
    `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
    `nickname` varchar(50) NOT NULL COMMENT '昵称',
    `email` varchar(255) NULL DEFAULT NULL COMMENT '邮箱',
    `birthday` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '生日',
    `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
    `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '注册时间',
    `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
    PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;





CREATE TABLE IF NOT EXISTS zwy_student(
  id INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  studentName VARCHAR(16) NOT NULL,
  studentAge  TINYINT(3) NOT NULL,
    createTime INT(11) NOT NULL
)ENGINE=MyISAM CHARSET=utf8;


#关联 一个用户对应一份档案
CREATE TABLE IF NOT EXISTS `think_profile` (
    `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    `truename` varchar(25) NOT NULL,
    `birthday` int(11) NOT NULL,
    `address` varchar(255) DEFAULT NULL,
    `email` varchar(255) DEFAULT NULL,
    `user_id` int(6) UNSIGNED NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


#一个用户对应多本图书
DROP TABLE IF EXISTS `think_book`;
CREATE TABLE IF NOT EXISTS `think_book` (
    `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `publish_time` int(11) UNSIGNED DEFAULT NULL,
    `create_time` int(11) UNSIGNED NOT NULL,
    `update_time` int(11) UNSIGNED NOT NULL,
    `status` tinyint(1) NOT NULL,
    `user_id` int(6) UNSIGNED NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


#一个用户会有多个角色，同时一个角色也会包含多个用户，这就是一个典型的多对多关联
DROP TABLE IF EXISTS `think_role`;
CREATE TABLE IF NOT EXISTS `think_role` (
    `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` varchar(25) NOT NULL,
    `title` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


#多对多关联通常一定会有一个中间表，也称为枢纽表，所以需要创建一个用户角色的中间表
DROP TABLE IF EXISTS `think_access`;
CREATE TABLE IF NOT EXISTS `think_access` (
    `user_id` int(8) UNSIGNED NOT NULL,
    `role_id` int(5) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;






