CREATE TABLE `users` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`username` varchar(255) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL,
	`role_id` INT NOT NULL DEFAULT 1,
	PRIMARY KEY (`id`)
);

CREATE TABLE `users_details` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`first_name` varchar(255) NOT NULL,
	`last_name` varchar(255) NOT NULL,
	`user_id` INT NOT NULL,
	`email` varchar(255) NOT NULL UNIQUE,
	`contact_number` varchar(255) NOT NULL,
	`address` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `roles` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `products` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL UNIQUE,
	`image_path` varchar(255) NOT NULL,
	`price` DECIMAL(13,2) NOT NULL,
	`description` TEXT NOT NULL,
	`category_id` INT,
	PRIMARY KEY (`id`)
);

CREATE TABLE `categories` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `statuses` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `payment_methods` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `orders` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`transaction_code` varchar(255) NOT NULL UNIQUE,
	`address` varchar(255) NOT NULL,
	`contact_number` varchar(255) NOT NULL,
	`date_created` DATETIME NOT NULL,
	`user_id` INT,
	`status_id` INT NOT NULL,
	`payement_method_id` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `order_details` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`quantity` INT NOT NULL,
	`product_id` INT,
	`order_id` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `leagues` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `team` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `players` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`user_details_id` INT NOT NULL,
	`team_id` INT,
	`league_id` INT,
	`jersey_number` INT NOT NULL,
	`transaction_code` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `users` ADD CONSTRAINT `users_fk0` FOREIGN KEY (`role_id`) REFERENCES `roles`(`id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `users_details` ADD CONSTRAINT `users_details_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE `products` ADD CONSTRAINT `products_fk0` FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`) ON UPDATE CASCADE ON DELETE SET NULL;

ALTER TABLE `orders` ADD CONSTRAINT `orders_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON UPDATE CASCADE ON DELETE SET NULL;

ALTER TABLE `orders` ADD CONSTRAINT `orders_fk1` FOREIGN KEY (`status_id`) REFERENCES `statuses`(`id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `orders` ADD CONSTRAINT `orders_fk2` FOREIGN KEY (`payement_method_id`) REFERENCES `payment_methods`(`id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `order_details` ADD CONSTRAINT `order_details_fk0` FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON UPDATE CASCADE ON DELETE SET NULL;

ALTER TABLE `order_details` ADD CONSTRAINT `order_details_fk1` FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `players` ADD CONSTRAINT `players_fk0` FOREIGN KEY (`user_details_id`) REFERENCES `users_details`(`id`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `players` ADD CONSTRAINT `players_fk1` FOREIGN KEY (`team_id`) REFERENCES `team`(`id`) ON UPDATE CASCADE ON DELETE SET NULL;

ALTER TABLE `players` ADD CONSTRAINT `players_fk2` FOREIGN KEY (`league_id`) REFERENCES `leagues`(`id`) ON UPDATE CASCADE ON DELETE SET NULL;

ALTER TABLE `players` ADD CONSTRAINT `players_fk3` FOREIGN KEY (`transaction_code`) REFERENCES `orders`(`transaction_code`) ON UPDATE CASCADE ON DELETE RESTRICT;

