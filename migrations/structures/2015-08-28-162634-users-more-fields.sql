ALTER TABLE `users`
ADD `nick` varchar(100) COLLATE 'utf8mb4_czech_ci' NOT NULL,
ADD `password` char(60) COLLATE 'utf8mb4_czech_ci' NOT NULL AFTER `nick`,
ADD `bio` varchar(250) COLLATE 'utf8mb4_czech_ci' NULL AFTER `password`;
