CREATE TABLE IF NOT EXISTS `#__jpframework_blocks` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`title` VARCHAR(150)  NOT NULL ,
`uniqid` VARCHAR(50)  NOT NULL ,
`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`type` VARCHAR(255)  NOT NULL ,
`position` VARCHAR(50)  NOT NULL ,
`language` CHAR(7)  NOT NULL DEFAULT '' ,
`menuitem` INT(11)  NOT NULL DEFAULT '0' ,
`params` TEXT NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;
