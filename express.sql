DROP DATABASE IF EXISTS express;
CREATE DATABASE express;
USE express;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `id` integer(15) NOT NULL auto_increment,
    `firstname` varchar(35) NOT NULL default '',
    `lastname` varchar(35) NOT NULL default '',
    `password` varchar(35) NOT NULL default '',
    `email` varchar(35) NOT NULL default '',
    `role` varchar(20) NOT NULL default '',
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY  (`id`)
);

INSERT INTO `users` VALUES(1,'Computer','Doctors','expressdoc2140','cd@comp2140.com','Admin',CURRENT_TIMESTAMP),
                        (2,'Natonya','Stewart','expressdoc2140','ns@comp2140.com','Admin',CURRENT_TIMESTAMP),
                        (3,'Joel','Rhoden','expressdoc2140','jr@comp2140.com','Admin',CURRENT_TIMESTAMP),
                        (4,'Ricardo','Munda','expressdoc2140','rm@comp2140.com','Admin',CURRENT_TIMESTAMP), 
                        (5,'Rayon','Hart','expressdoc2140','rh@comp2140.com','Admin',CURRENT_TIMESTAMP), 
                        (6,'Aalyah','Johnson','expressdoc2140','aj@comp2140.com','Admin',CURRENT_TIMESTAMP), 
                        (7,'Jusayne','Chambers','expressdoc2140','jc@comp2140.com','Admin',CURRENT_TIMESTAMP);

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
    `id` integer(15) NOT NULL auto_increment,
    `firstname` varchar(35) NOT NULL default '',
    `lastname` varchar(35) NOT NULL default '',
    `email` varchar(35) NOT NULL default '',
    `telephone` varchar(20) NOT NULL default '',
    `assigned_to` integer(15) NOT NULL default '0',
    PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `device`;
CREATE TABLE `device` (
    `id` integer(15) NOT NULL auto_increment,
    `customer_id` varchar(35) NOT NULL default '',
    `brand` varchar(35) NOT NULL default '',
    `type` varchar(35) NOT NULL default '',
    `model_number` varchar(20) NOT NULL default '',
    `assigned_to` integer(15) NOT NULL default '0',
    PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
    `id` integer(15) NOT NULL auto_increment,
    `customer_id` integer(15) NOT NULL default '0',
    `payment_id` integer(15) NOT NULL default '0',
    `status` text NOT NULL default '',
    `amount` varchar(15) NOT NULL default '',
    `payment_date` integer(15) NOT NULL default '0',
    `last_update` integer(15) NOT NULL default '0',
    PRIMARY KEY  (`id`)
);


