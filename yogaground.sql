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
