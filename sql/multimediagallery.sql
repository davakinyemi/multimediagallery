--
-- Database: `multimediagallery`
--

CREATE DATABASE IF NOT EXISTS `multimediagallery` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `multimediagallery`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `email` varchar(100) NOT NULL,
    `password` varchar(255) NOT NULL,
    `about` varchar(255),
    `image` varchar(255) DEFAULT "default.png",
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `content`
--
DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    -- `channel_id` int(11) NOT NULL,
	`title` varchar(255) NOT NULL,
	`description` text NOT NULL,
	`media_file` varchar(255) NOT NULL,
	`thumbnail` varchar(255) NOT NULL DEFAULT '',
	`likes` int(11) NOT NULL DEFAULT 0,
    `dislikes` int(11) NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `channels`
--
/* DROP TABLE IF EXISTS `channels`;
CREATE TABLE IF NOT EXISTS `channels` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
	`title` varchar(255) NOT NULL,
	`description` text NOT NULL,
	`image` varchar(255) NOT NULL DEFAULT '',
	`content` text NOT NULL,
	`subscribers` text NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8; */

--
-- Table structure for table `playlist`
--
/* DROP TABLE IF EXISTS `playlist`;
CREATE TABLE IF NOT EXISTS `playlist` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
	`content_id` int(11) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8; */