SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `applications` (
  `id` varchar(32) COLLATE utf8_bin NOT NULL,
  `app_name` varchar(64) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


CREATE TABLE `applications_metadata` (
  `id` varchar(32) COLLATE utf8_bin NOT NULL,
  `app_id` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

ALTER TABLE `applications_metadata`
  ADD CONSTRAINT `fk_app_metadata_id` FOREIGN KEY (`app_id`) 
  REFERENCES `applications` (`id`) ON UPDATE CASCADE;

CREATE TABLE `ldap_targets` (
  `id` varchar(32) COLLATE utf8_bin NOT NULL,
  `app_id` varchar(32) COLLATE utf8_bin NOT NULL,
  `secure` tinyint(1) NOT NULL DEFAULT '0',
  `hostname` varchar(32) COLLATE utf8_bin NOT NULL,
  `port` int(6) NOT NULL DEFAULT '389',
  PRIMARY KEY (`id`),
  KEY `app_id` (`app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

ALTER TABLE `ldap_targets`
  ADD CONSTRAINT `fk_ldap_app_id` FOREIGN KEY (`app_id`) 
  REFERENCES `applications` (`id`) ON UPDATE CASCADE;

CREATE TABLE `ldap_metadata` (
  `id` varchar(32) COLLATE utf8_bin NOT NULL,
  `target_id` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `target_id` (`target_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

ALTER TABLE `ldap_metadata`
  ADD CONSTRAINT `fk_ldap_meta_target_id` FOREIGN KEY (`target_id`) 
  REFERENCES `ldap_targets` (`id`) ON UPDATE CASCADE;

CREATE TABLE `users` (
  `id` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `first_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `users_metadata` (
  `app_id` varchar(32) COLLATE utf8_bin NOT NULL,
  `user_id` varchar(32) COLLATE utf8_bin NOT NULL,
  `auth_id` varchar(32) COLLATE utf8_bin NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`app_id`,`user_id`),
  KEY `auth_id` (`auth_id`),
  KEY `fk_umeta_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

ALTER TABLE `users_metadata`
  ADD CONSTRAINT `fk_umeta_app_id` FOREIGN KEY (`app_id`) 
  REFERENCES `applications` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_umeta_user_id` FOREIGN KEY (`user_id`) 
  REFERENCES `users` (`id`) ON UPDATE CASCADE;
