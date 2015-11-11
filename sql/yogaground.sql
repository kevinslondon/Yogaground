-- phpMyAdmin SQL Dump
-- version 3.5.0-beta1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 01, 2015 at 04:49 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


--
-- Database: `yogaground`
--

-- --------------------------------------------------------

--
-- Table structure for table `content_pages`
--

DROP TABLE IF EXISTS `content_pages`;
CREATE TABLE IF NOT EXISTS `content_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(15) NOT NULL,
  `header` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='site page content' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `content_pages`
--

INSERT INTO `content_pages` (`id`, `url`, `header`, `content`, `created_at`, `updated_at`) VALUES
  (1, 'home', 'Home Page Header', '<p>Home page</p>', '2015-06-30 15:40:14', '2015-06-30 15:40:14'),
  (2, 'about', 'About', '<p>About Page content</p>', '2015-06-30 15:40:14', '2015-06-30 15:40:14'),
  (3, 'workshops', 'Workshops', '<p>Workshop page content</p>', '2015-06-30 15:41:45', '2015-06-30 15:41:45'),
  (4, 'lessons', 'Lessons', '<p>Lesson page content</p>', '2015-06-30 15:41:45', '2015-06-30 15:41:45'),
  (5, 'yoga_one_to_one', 'One to one lessons', '<p>One to one lesson page content</p>', '2015-06-30 16:18:09', '2015-06-30 16:18:09'),
  (6, 'okido', 'Okido Yoga', '<p>Okido page content</p>', '2015-06-30 16:18:09', '2015-06-30 16:18:09'),
  (7, 'alexander_tech', 'The Alexander Technique', '<p>Alexander page content</p>', '2015-06-30 16:19:12', '2015-06-30 16:19:12');
-- --------------------------------------------------------

--
-- Table structure for table `mysite_testimonials`
--

DROP TABLE IF EXISTS `mysite_testimonials`;
CREATE TABLE IF NOT EXISTS `mysite_testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_name` varchar(255) NOT NULL,
  `testimonial_date` date NOT NULL,
  `testimonial_text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `mysite_testimonials`
--

INSERT INTO `mysite_testimonials` (`id`, `person_name`, `testimonial_date`, `testimonial_text`) VALUES
(1, 'Test 1', '2012-02-26', 'The classes have helped me learn to cut off from my everyday life and go within which has been very stress relieving'),
(2, 'Test 2', '2011-11-11', 'A really enjoyable, relaxing and focussed course. A little haven from the everyday rush'),
(3, 'Test 3', '2014-06-12', 'This course really helped me understand my body and my breathing. I feel more relaxed in general, not just after each class. Learning how to focus in my breathing has been very useful in stressful siutations, and I learned that here. Thank you!');

DROP TABLE IF EXISTS `mysite_workshop`;
CREATE TABLE IF NOT EXISTS `mysite_workshop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `default_workshop` enum('yes','no') NOT NULL,
  `name` text NOT NULL,
  `workshop_date` datetime NOT NULL,
  `deposit` float NOT NULL,
  `fullfee` float NOT NULL,
  `paypal_deposit` text NOT NULL,
  `paypal_fullfee` text NOT NULL,
  `paypal_email_deposit` text,
  `paypal_email_fullfee` text,
  `workshop_limit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `mysite_workshop`
--

INSERT INTO `mysite_workshop` (`id`, `default_workshop`, `name`, `workshop_date`, `deposit`, `fullfee`, `paypal_deposit`, `paypal_fullfee`, `paypal_email_deposit`, `paypal_email_fullfee`, `workshop_limit`) VALUES
  (1, 'yes', 'Wednesday 18th May 2025 at 7.30pm for 6 lessons', '2025-05-18 19:30:00', 10, 40, '', '', '','', 5);


CREATE TABLE IF NOT EXISTS `mysite_class_attedance` (
  `uid` int(11) NOT NULL,
  `wid` int(11) NOT NULL,
  `sign_date` datetime NOT NULL,
  `deposit` float DEFAULT NULL,
  `deposit_date` datetime DEFAULT NULL,
  `fullfee` float DEFAULT NULL,
  `fullfee_date` datetime DEFAULT NULL,
  PRIMARY KEY (`uid`,`wid`,`sign_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `yogablog_newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `address` mediumtext NOT NULL,
  `phone` varchar(255) NOT NULL,
  `token` varchar(50) NOT NULL DEFAULT '',
  `status` varchar(1) NOT NULL DEFAULT 'S',
  `group` int(11) NOT NULL DEFAULT '0',
  `profile` mediumtext,
  `list` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `surname` varchar(100) NOT NULL DEFAULT '',
  `sex` char(1) NOT NULL DEFAULT 'n',
  `feed` tinyint(4) NOT NULL DEFAULT '0',
  `feed_time` bigint(20) NOT NULL DEFAULT '0',
  `country` varchar(4) NOT NULL DEFAULT '',
  `list_1` tinyint(4) NOT NULL DEFAULT '0',
  `list_2` tinyint(4) NOT NULL DEFAULT '0',
  `list_3` tinyint(4) NOT NULL DEFAULT '0',
  `list_4` tinyint(4) NOT NULL DEFAULT '0',
  `list_5` tinyint(4) NOT NULL DEFAULT '0',
  `list_6` tinyint(4) NOT NULL DEFAULT '0',
  `list_7` tinyint(4) NOT NULL DEFAULT '0',
  `list_8` tinyint(4) NOT NULL DEFAULT '0',
  `list_9` tinyint(4) NOT NULL DEFAULT '0',
  `list_10` tinyint(4) NOT NULL DEFAULT '0',
  `list_11` tinyint(4) NOT NULL DEFAULT '0',
  `list_12` tinyint(4) NOT NULL DEFAULT '0',
  `list_13` tinyint(4) NOT NULL DEFAULT '0',
  `list_14` tinyint(4) NOT NULL DEFAULT '0',
  `list_15` tinyint(4) NOT NULL DEFAULT '0',
  `list_16` tinyint(4) NOT NULL DEFAULT '0',
  `list_17` tinyint(4) NOT NULL DEFAULT '0',
  `list_18` tinyint(4) NOT NULL DEFAULT '0',
  `list_19` tinyint(4) NOT NULL DEFAULT '0',
  `list_20` tinyint(4) NOT NULL DEFAULT '0',
  `profile_1` varchar(255) NOT NULL DEFAULT '',
  `profile_2` varchar(255) NOT NULL DEFAULT '',
  `profile_3` varchar(255) NOT NULL DEFAULT '',
  `profile_4` varchar(255) NOT NULL DEFAULT '',
  `profile_5` varchar(255) NOT NULL DEFAULT '',
  `profile_6` varchar(255) NOT NULL DEFAULT '',
  `profile_7` varchar(255) NOT NULL DEFAULT '',
  `profile_8` varchar(255) NOT NULL DEFAULT '',
  `profile_9` varchar(255) NOT NULL DEFAULT '',
  `profile_10` varchar(255) NOT NULL DEFAULT '',
  `profile_11` varchar(255) NOT NULL DEFAULT '',
  `profile_12` varchar(255) NOT NULL DEFAULT '',
  `profile_13` varchar(255) NOT NULL DEFAULT '',
  `profile_14` varchar(255) NOT NULL DEFAULT '',
  `profile_15` varchar(255) NOT NULL DEFAULT '',
  `profile_16` varchar(255) NOT NULL DEFAULT '',
  `profile_17` varchar(255) NOT NULL DEFAULT '',
  `profile_18` varchar(255) NOT NULL DEFAULT '',
  `profile_19` varchar(255) NOT NULL DEFAULT '',
  `profile_20` varchar(255) NOT NULL DEFAULT '',
  `referrer` varchar(50) NOT NULL DEFAULT '',
  `http_referer` varchar(255) NOT NULL DEFAULT '',
  `wp_user_id` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `test` tinyint(4) NOT NULL DEFAULT '0',
  `flow` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=243 ;

--
-- Dumping data for table `yogablog_newsletter`
--

INSERT INTO `yogablog_newsletter` (`name`, `email`, `address`, `phone`, `token`, `status`, `group`, `profile`, `list`, `created`, `surname`, `sex`, `feed`, `feed_time`, `country`, `list_1`, `list_2`, `list_3`, `list_4`, `list_5`, `list_6`, `list_7`, `list_8`, `list_9`, `list_10`, `list_11`, `list_12`, `list_13`, `list_14`, `list_15`, `list_16`, `list_17`, `list_18`, `list_19`, `list_20`, `profile_1`, `profile_2`, `profile_3`, `profile_4`, `profile_5`, `profile_6`, `profile_7`, `profile_8`, `profile_9`, `profile_10`, `profile_11`, `profile_12`, `profile_13`, `profile_14`, `profile_15`, `profile_16`, `profile_17`, `profile_18`, `profile_19`, `profile_20`, `referrer`, `http_referer`, `wp_user_id`, `ip`, `test`, `flow`) VALUES
  ('Kevin Test', 'kevintest@hotmail.com', 'address', '98098080', '40356caba97f76b', 'C', 0, '', 0, '2011-05-10 13:59:39', '', 'n', 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 1, 0),
  ('Tester', 'tester@hotmail.com', '', '+phone', 'a46c438815', 'C', 0, '', 0, '2011-05-09 17:08:49', '', 'n', 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, 0);


DROP TABLE IF EXISTS `yogablog_posts`;
CREATE TABLE IF NOT EXISTS `yogablog_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_category` int(4) NOT NULL DEFAULT '0',
  `post_excerpt` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`),
  KEY `post_name` (`post_name`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1810 ;

--
-- Dumping data for table `yogablog_posts`
--

INSERT INTO `yogablog_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_category`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
  (1793, 1, '2015-06-03 15:47:47', '2015-06-03 14:47:47', '<p>A test blog post </p>', 'Test blog post', 0, '', 'publish', 'open', 'open', '', 'yoga-test-blog-post', '', '', '2015-06-03 15:47:47', '2015-06-03 14:47:47', '', 0, 'http://www.yogaground.com/blog/?p=1793', 0, 'post', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `yogablog_terms`
--

DROP TABLE IF EXISTS `yogablog_terms`;
CREATE TABLE IF NOT EXISTS `yogablog_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `name` (`name`(191)),
  KEY `slug` (`slug`(191))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Table structure for table `yogablog_term_relationships`
--

DROP TABLE IF EXISTS `yogablog_term_relationships`;
CREATE TABLE IF NOT EXISTS `yogablog_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `yogablog_term_relationships`
--

INSERT INTO `yogablog_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
  (1793, 3, 0),
  (1793, 24, 0);

-- --------------------------------------------------------

--
-- Table structure for table `yogablog_term_taxonomy`
--

DROP TABLE IF EXISTS `yogablog_term_taxonomy`;
CREATE TABLE IF NOT EXISTS `yogablog_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=38 ;


CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--
-- Password for this user is testingt123
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
  (1, 'Admin Test', 'test@testing.com', '$2a$04$RI4kuK6xXBBc4HGncYQpheuoOagA1JLNcOFZvvTrtD3x6le2dJYpO', '', '2015-07-13 21:12:54', '2015-07-30 17:01:41');






SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
