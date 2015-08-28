CREATE TABLE `tweets` (
	`id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`user_id` int(10) unsigned NOT NULL,
	`text` varchar(160) NOT NULL,
	`sent_at` datetime NOT NULL,
	FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);
