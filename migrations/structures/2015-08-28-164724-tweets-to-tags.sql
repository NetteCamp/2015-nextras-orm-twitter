CREATE TABLE `tweets_x_tags` (
	`tweet_id` int(10) unsigned NOT NULL,
	`tag_id` int(10) unsigned NOT NULL,
	PRIMARY KEY (`tweet_id`,`tag_id`),
	KEY `tag_id` (`tag_id`),
	CONSTRAINT `tweets_x_tags_ibfk_1` FOREIGN KEY (`tweet_id`) REFERENCES `tweets` (`id`),
	CONSTRAINT `tweets_x_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;
