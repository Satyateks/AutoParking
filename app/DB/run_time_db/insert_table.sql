//10-02-2024
ALTER TABLE `users` ADD `vehicle` INT NULL DEFAULT NULL AFTER `pincode`;
//vahicle update

ALTER TABLE `users` CHANGE `vehicle` `vehicle` VARCHAR(255) NULL DEFAULT NULL;

CREATE TABLE `auto_park_raushan`.`listing` (`id` INT NOT NULL AUTO_INCREMENT , `value1` INT NULL DEFAULT NULL , `value2` INT NULL DEFAULT NULL , `value3` INT NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


CREATE TABLE auto_park_raushan.listing (id INT NOT NULL AUTO_INCREMENT , value1 INT NULL DEFAULT NULL , value2 INT NULL DEFAULT NULL , value3 INT NULL DEFAULT NULL , PRIMARY KEY (id)) ENGINE = InnoDB;


INSERT INTO listing (id, value1, value2, value3) VALUES ('1', '11', '22', '33');



please add this query
on this date
13-02-2024
ALTER TABLE `recent_order` ADD `vehicle` INT NOT NULL DEFAULT '1' AFTER `feedback`;

Please add this query->13-02-2024
ALTER TABLE `vehiclenumber` ADD `user_id` VARCHAR(255) NOT NULL DEFAULT '1' AFTER `vehicle_number`;
