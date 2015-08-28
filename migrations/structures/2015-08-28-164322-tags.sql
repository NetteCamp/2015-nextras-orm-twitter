CREATE TABLE `tags` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(100) COLLATE utf8mb4_czech_ci NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;
