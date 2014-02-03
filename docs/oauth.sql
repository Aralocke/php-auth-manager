CREATE TABLE `oauth_clients` (
	`client_id` TEXT, 
	`client_secret` TEXT, 
	`redirect_uri` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `oauth_access_tokens` (
	`access_token` TEXT, 
	`client_id` TEXT, 
	`user_id` TEXT, 
	`expires` TIMESTAMP, 
	`scope` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `oauth_authorization_codes` (
	`authorization_code` TEXT, 
	`client_id` TEXT, 
	`user_id` TEXT, 
	`redirect_uri` TEXT, 
	`expires` TIMESTAMP, 
	`scope` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `oauth_refresh_tokens` (
	`refresh_token` TEXT, 
	`client_id` TEXT, 
	`user_id` TEXT, 
	`expires` TIMESTAMP, 
	`scope` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `oauth_users` (
	`username` TEXT, 
	`password` TEXT, 
	`first_name` TEXT, 
	`last_name` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;