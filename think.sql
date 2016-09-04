


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