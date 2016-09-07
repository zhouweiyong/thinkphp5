


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



















