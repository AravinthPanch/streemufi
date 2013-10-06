CREATE TABLE `test`.`artist` (
  `id` INT NOT NULL,
  `artist_user_name` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NULL,
  `phone_number` INT NOT NULL,
  `address` VARCHAR(45) NULL,
  `free_text` VARCHAR(45) NULL,
  `video_url` VARCHAR(45) NULL,
  `profile_url` VARCHAR(45) NULL,
  `scout_user_name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`, `artist_user_name`, `phone_number`));

CREATE TABLE `test`.`scout` (
  `id` INT NOT NULL,
  `scout_user_name` VARCHAR(45) NULL,
  `scout_name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));
