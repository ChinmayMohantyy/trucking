ALTER TABLE `users` CHANGE `name` `first_name` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;
ALTER TABLE `users` ADD `last_name` VARCHAR(255) NULL DEFAULT NULL AFTER `first_name`;
ALTER TABLE `users` ADD `phone` VARCHAR(255) NULL DEFAULT NULL AFTER `password`;
ALTER TABLE `users` ADD `survey` VARCHAR(255) NULL DEFAULT NULL AFTER `phone`;
ALTER TABLE `users` ADD `user_type` VARCHAR(255) NULL DEFAULT NULL AFTER `survey`;
ALTER TABLE `users` ADD `organisation_type` VARCHAR(255) NULL DEFAULT NULL AFTER `user_type`;
ALTER TABLE `users` ADD `company_name` VARCHAR(255) NULL DEFAULT NULL AFTER `organisation_type`;
ALTER TABLE `users` ADD `business_types` VARCHAR(255) NULL DEFAULT NULL AFTER `company_name`;
ALTER TABLE `users` ADD `mc_ff_mx` VARCHAR(255) NULL DEFAULT NULL AFTER `business_types`;
ALTER TABLE `users` ADD `dot` VARCHAR(255) NULL DEFAULT NULL AFTER `mc_ff_mx`;
ALTER TABLE `users` ADD `tc_agreed` VARCHAR(255) NULL DEFAULT NULL AFTER `dot`;

ALTER TABLE `users` ADD `post_load` VARCHAR(255) NULL DEFAULT NULL AFTER `dot`;
ALTER TABLE `users` ADD `tms_use` VARCHAR(255) NULL DEFAULT NULL AFTER `post_load`;


--new alter
ALTER TABLE `addloads` ADD `distance` VARCHAR(255) NULL DEFAULT NULL AFTER `weight`;
ALTER TABLE `addloads` ADD `price` VARCHAR(255) NULL DEFAULT NULL AFTER `truck_type`;
ALTER TABLE `addloads` ADD `per_meter_price` VARCHAR(255) NULL DEFAULT NULL AFTER `price`;
ALTER TABLE `addloads` ADD `prepare_load` ENUM('yes','no') NOT NULL DEFAULT 'yes' AFTER `per_meter_price`;
ALTER TABLE `addloads` ADD `admin_id` BIGINT NULL DEFAULT NULL AFTER `id`;


ALTER TABLE `addloads` ADD `date` VARCHAR(255) NULL DEFAULT NULL AFTER `pickup`;