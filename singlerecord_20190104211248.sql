ALTER TABLE `coin` ADD `user_id` INT(255) NOT NULL AFTER `value`;
ALTER TABLE `user` CHANGE `hashed_password` `hashed_password` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;
