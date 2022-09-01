-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 02, 2022 at 12:22 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `revest`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(100) NOT NULL,
  `user_id` int(20) NOT NULL,
  `q1` varchar(255) NOT NULL,
  `q2` varchar(255) NOT NULL,
  `q3` varchar(255) NOT NULL,
  `q4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `q1`, `q2`, `q3`, `q4`) VALUES
(1, 7, 'I\'m just getting started', 'I need liquidity and havea short to medium-term horizon', '3-12 months', '$10,000-$100,000'),
(2, 7, 'I\'m just getting started', 'I need liquidity and havea short to medium-term horizon', '3-12 months', '$10,000-$100,000');

-- --------------------------------------------------------

--
-- Table structure for table `earnings`
--

CREATE TABLE `earnings` (
  `id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(100) NOT NULL,
  `date` varchar(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `earnings`
--

INSERT INTO `earnings` (`id`, `user_id`, `amount`, `date`) VALUES
(1, 1, 1200, '2022-08-20'),
(3, 2, 123, '2022-08-21'),
(6, 1, -200, '2022-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `date`) VALUES
(1, 'What is Vikkhome?', '\r\ncombined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or', '2022-08-25'),
(3, 'What are the benefits of investing via Revest?', 'combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or', '2022-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `property_id`, `name`) VALUES
(3, 2, '1351sat-practice-test-7.pdf'),
(4, 2, '5202SAT_6.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `property_id`, `name`) VALUES
(43, 2, '3170rainha.jpg'),
(46, 3, 'avatar5.png'),
(48, 3, 'queens logo.jpg'),
(51, 6, '95115206rainha.jpg'),
(52, 6, '9511avatar5.png'),
(53, 4, '2302279643.jpg'),
(54, 4, '6938187273.jpg'),
(56, 4, '6837PIrgYur.gif'),
(57, 4, '2869circuit-components.png'),
(58, 7, '8168download (46).jpg'),
(59, 7, '8168images (6).jpg'),
(60, 7, '8168download (42).jpg'),
(61, 7, '8168download (41).jpg'),
(62, 7, '8168download (3).png'),
(64, 2, '5769Akeem.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `amount_invested` int(25) NOT NULL,
  `user_id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `transaction_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`id`, `property_id`, `amount_invested`, `user_id`, `day`, `month`, `year`, `status`, `transaction_id`) VALUES
(2, 4, 55999, 2, 20, 8, 2022, 0, '0'),
(3, 4, 55999, 2, 19, 1, 2022, 0, '0'),
(4, 4, 55990, 2, 19, 1, 2022, 1, '0'),
(5, 4, 55999, 2, 19, 2, 2022, 0, '0'),
(6, 4, 55999, 2, 19, 8, 2022, 0, '0'),
(7, 4, 55999, 2, 19, 8, 2022, 0, '0'),
(8, 4, 55999, 2, 19, 2, 2022, 0, '0'),
(9, 4, 55999, 2, 19, 8, 2022, 0, '0'),
(10, 4, 55999, 2, 19, 8, 2022, 0, '0'),
(11, 4, 55999, 2, 19, 8, 2022, 0, '0'),
(12, 4, 5000, 2, 19, 8, 2022, 0, '0'),
(13, 4, 1234567, 2, 19, 6, 2022, 0, '0'),
(14, 4, 2345678, 2, 19, 2, 2022, 0, '0'),
(15, 4, 2345678, 2, 19, 2, 2022, 0, '0'),
(16, 4, 2345678, 2, 19, 2, 2022, 0, '0'),
(17, 4, 2345678, 2, 19, 6, 2022, 0, '0'),
(18, 4, 11113444, 2, 19, 2, 2022, 0, '0'),
(19, 4, 11113444, 2, 19, 3, 2022, 0, '0'),
(20, 4, 11113444, 2, 19, 2, 2022, 0, '0'),
(21, 4, 10000, 2, 19, 2, 2022, 0, '0'),
(22, 4, 10000, 2, 19, 8, 2022, 0, '0'),
(23, 4, 10000, 2, 19, 8, 2022, 0, '0'),
(24, 4, 10000, 2, 19, 8, 2022, 0, '0'),
(25, 4, 10000, 2, 20, 8, 2022, 1, '0'),
(26, 4, 10000, 2, 20, 8, 2022, 1, '0'),
(27, 4, 10000, 2, 19, 8, 2022, 0, '0'),
(28, 4, 10000, 2, 20, 8, 2022, 1, '0'),
(29, 4, 10000, 2, 20, 8, 2022, 1, '0'),
(30, 4, 10000, 2, 20, 8, 2022, 1, '0'),
(31, 4, 10000, 2, 20, 8, 2022, 1, '0'),
(32, 6, 3000, 2, 20, 8, 2022, 1, '0'),
(33, 6, 2860, 2, 20, 8, 2022, 1, '0'),
(35, 2, 15, 2, 20, 8, 2022, 1, 'rvst10000000'),
(36, 2, 1220, 1, 20, 1, 2022, 1, 'rvst10000000'),
(37, 2, 1223, 1, 20, 8, 2022, 1, 'rvst16346765'),
(38, 4, 490, 2, 29, 8, 2022, 1, 'rvst38607315'),
(40, 2, 2674, 1, 31, 8, 2022, 0, 'rvst58915046'),
(41, 7, 1200, 7, 31, 8, 2022, 0, 'rvst65350378'),
(42, 7, 1200, 7, 31, 8, 2022, 0, 'rvst87504940'),
(43, 7, 200, 7, 31, 8, 2022, 0, 'rvst90191799'),
(44, 5, 5000, 7, 31, 8, 2022, 0, 'rvst13027234'),
(45, 5, 5000, 7, 31, 8, 2022, 0, 'rvst80049191'),
(46, 5, 5000, 7, 31, 8, 2022, 0, 'rvst63287097'),
(47, 5, 5000, 7, 31, 8, 2022, 0, 'rvst86020303'),
(48, 5, 5000, 7, 31, 8, 2022, 0, 'rvst24220855'),
(49, 5, 2123, 7, 31, 8, 2022, 0, 'rvst36779712'),
(50, 5, 2123, 7, 31, 8, 2022, 0, 'rvst83447540'),
(51, 5, 2123, 7, 31, 8, 2022, 0, 'rvst66763464'),
(52, 5, 2123, 7, 31, 8, 2022, 0, 'rvst13640707'),
(53, 5, 2123, 7, 31, 8, 2022, 0, 'rvst90482897');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(22) NOT NULL,
  `page name` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page name`, `content`, `date`) VALUES
(1, 'About Us', '<blockquote>\r\n<h5 class=\"neutral-top\">Investing in real estate is now easier than buying stocks</h5>\r\n<h2>Make property Investing in simple, accessible and transparent</h2>\r\n<p class=\"neutral-bottom\">Our mission is to empower the world to build wealth through modern real estate investing.</p>\r\n</blockquote>', '2022-Aug-23'),
(2, 'Contact Us', '', ''),
(3, 'affiliate-program ', '<h5 class=\"neutral-top\">Earn Money</h5>\r\n<h2>Affiliate Program</h2>\r\n<p>Earn commission from every revest new user you help to bring.Join our affiliate program, refer your audience, and earn revenue.</p>', '2022-Aug-22'),
(4, 'how-it-works', '<h5 class=\"neutral-top\">Smart way to raise money</h5>\r\n<h2>Join Thousands of Investors</h2>\r\n<p class=\"neutral-bottom\">Individual and institutional investors invest $10&ndash;$100,000 per deal on Vikhomes.</p>', '2022-Aug-23'),
(5, 'privacy-policy', '<div class=\"terms__single\">\r\n<h3 class=\"neutral-top\">We\'re always looking for new ways to provide privacy for our customers.</h3>\r\n<p>Id ipsum mi tempor eget. Pretium consectetur scelerisque blandit habitasse non ullamcorper enim, diam quam id et, tempus massa. Sed nam vulputate pellentesque quis. Varius a, nunc faucibus proin elementum id odio auctor. Nunc, suspendisse consequat libero, pharetra tellus vulputate auctor venenatis tortor non rhoncus at duis. Pharetra ipsum mauris integer sit feugiat.</p>\r\n<ul>\r\n<li>Blandit dignissim nulla varius tristique a sed integer ut tempor.</li>\r\n<li>Augue interdum semper bibendum amet sed.</li>\r\n<li>Dis in at ultricies tortor sit tellus.</li>\r\n<li>Habitant ornare aenean maecenas pretium</li>\r\n</ul>\r\n</div>\r\n<hr />\r\n<div class=\"terms__single\">\r\n<h3 class=\"neutral-top\">Your data is safe with us, we will not share any information with external sources.</h3>\r\n<p>Id ipsum mi tempor eget. Pretium consectetur scelerisque blandit habitasse non ullamcorper enim, diam quam id et, tempus massa. Sed nam vulputate pellentesque quis. Varius a, nunc faucibus proin elementum id odio auctor. Nunc, suspendisse consequat libero, pharetra tellus vulputate auctor venenatis tortor non rhoncus at duis. Pharetra ipsum mauris integer sit feugiat.</p>\r\n<ul>\r\n<li>Blandit dignissim nulla varius tristique a sed integer ut tempor.</li>\r\n<li>Augue interdum semper bibendum amet sed.</li>\r\n<li>Dis in at ultricies tortor sit tellus.</li>\r\n<li>Habitant ornare aenean maecenas pretium</li>\r\n</ul>\r\n</div>\r\n<hr />\r\n<div class=\"terms__single\">\r\n<h3 class=\"neutral-top\">We\'re always looking for new ways to provide privacy for our customers.</h3>\r\n<p>Id ipsum mi tempor eget. Pretium consectetur scelerisque blandit habitasse non ullamcorper enim, diam quam id et, tempus massa. Sed nam vulputate pellentesque quis. Varius a, nunc faucibus proin elementum id odio auctor. Nunc, suspendisse consequat libero, pharetra tellus vulputate auctor venenatis tortor non rhoncus at duis. Pharetra ipsum mauris integer sit feugiat.</p>\r\n<p>Id ipsum mi tempor eget. Pretium consectetur scelerisque blandit habitasse non ullamcorper enim, diam quam id et, tempus massa.</p>\r\n&gt;\r\n<ul>\r\n<li>Blandit dignissim nulla varius tristique a sed integer ut tempor.</li>\r\n<li>Augue interdum semper bibendum amet sed.</li>\r\n<li>Dis in at ultricies tortor sit tellus.</li>\r\n<li>Habitant ornare aenean maecenas pretium</li>\r\n</ul>\r\n</div>', '2022-Aug-22'),
(6, 'terms-condition ', '<div class=\"terms__single\">\r\n<h3 class=\"neutral-top\">We\'re always looking for new ways to provide privacy for our customers.</h3>\r\n<p>Id ipsum mi tempor eget. Pretium consectetur scelerisque blandit habitasse non ullamcorper enim, diam quam id et, tempus massa. Sed nam vulputate pellentesque quis. Varius a, nunc faucibus proin elementum id odio auctor. Nunc, suspendisse consequat libero, pharetra tellus vulputate auctor venenatis tortor non rhoncus at duis. Pharetra ipsum mauris integer sit feugiat.</p>\r\n<ul>\r\n<li>Blandit dignissim nulla varius tristique a sed integer ut tempor.</li>\r\n<li>Augue interdum semper bibendum amet sed.</li>\r\n<li>Dis in at ultricies tortor sit tellus.</li>\r\n<li>Habitant ornare aenean maecenas pretium</li>\r\n</ul>\r\n</div>\r\n<hr />\r\n<div class=\"terms__single\">\r\n<h3 class=\"neutral-top\">Your data is safe with us, we will not share any information with external sources.</h3>\r\n<p>Id ipsum mi tempor eget. Pretium consectetur scelerisque blandit habitasse non ullamcorper enim, diam quam id et, tempus massa. Sed nam vulputate pellentesque quis. Varius a, nunc faucibus proin elementum id odio auctor. Nunc, suspendisse consequat libero, pharetra tellus vulputate auctor venenatis tortor non rhoncus at duis. Pharetra ipsum mauris integer sit feugiat.</p>\r\n<ul>\r\n<li>Blandit dignissim nulla varius tristique a sed integer ut tempor.</li>\r\n<li>Augue interdum semper bibendum amet sed.</li>\r\n<li>Dis in at ultricies tortor sit tellus.</li>\r\n<li>Habitant ornare aenean maecenas pretium</li>\r\n</ul>\r\n</div>\r\n<hr />\r\n<div class=\"terms__single\">\r\n<h3 class=\"neutral-top\">We\'re always looking for new ways to provide privacy for our customers.</h3>\r\n<p>Id ipsum mi tempor eget. Pretium consectetur scelerisque blandit habitasse non ullamcorper enim, diam quam id et, tempus massa. Sed nam vulputate pellentesque quis. Varius a, nunc faucibus proin elementum id odio auctor. Nunc, suspendisse consequat libero, pharetra tellus vulputate auctor venenatis tortor non rhoncus at duis. Pharetra ipsum mauris integer sit feugiat.</p>\r\n<p>Id ipsum mi tempor eget. Pretium consectetur scelerisque blandit habitasse non ullamcorper enim, diam quam id et, tempus massa.</p>\r\n&gt;\r\n<ul>\r\n<li>Blandit dignissim nulla varius tristique a sed integer ut tempor.</li>\r\n<li>Augue interdum semper bibendum amet sed.</li>\r\n<li>Dis in at ultricies tortor sit tellus.</li>\r\n<li>Habitant ornare aenean maecenas pretium</li>\r\n</ul>\r\n</div>', '2022-Aug-22'),
(7, 'cookie-policy', '<div class=\"terms__single\">\r\n<h3 class=\"neutral-top\">We\'re always looking for new ways to provide privacy for our customers.</h3>\r\n<p>Id ipsum mi tempor eget. Pretium consectetur scelerisque blandit habitasse non ullamcorper enim, diam quam id et, tempus massa. Sed nam vulputate pellentesque quis. Varius a, nunc faucibus proin elementum id odio auctor. Nunc, suspendisse consequat libero, pharetra tellus vulputate auctor venenatis tortor non rhoncus at duis. Pharetra ipsum mauris integer sit feugiat.</p>\r\n<ul>\r\n<li>Blandit dignissim nulla varius tristique a sed integer ut tempor.</li>\r\n<li>Augue interdum semper bibendum amet sed.</li>\r\n<li>Dis in at ultricies tortor sit tellus.</li>\r\n<li>Habitant ornare aenean maecenas pretium</li>\r\n</ul>\r\n</div>\r\n<hr />\r\n<div class=\"terms__single\">\r\n<h3 class=\"neutral-top\">Your data is safe with us, we will not share any information with external sources.</h3>\r\n<p>Id ipsum mi tempor eget. Pretium consectetur scelerisque blandit habitasse non ullamcorper enim, diam quam id et, tempus massa. Sed nam vulputate pellentesque quis. Varius a, nunc faucibus proin elementum id odio auctor. Nunc, suspendisse consequat libero, pharetra tellus vulputate auctor venenatis tortor non rhoncus at duis. Pharetra ipsum mauris integer sit feugiat.</p>\r\n<ul>\r\n<li>Blandit dignissim nulla varius tristique a sed integer ut tempor.</li>\r\n<li>Augue interdum semper bibendum amet sed.</li>\r\n<li>Dis in at ultricies tortor sit tellus.</li>\r\n<li>Habitant ornare aenean maecenas pretium</li>\r\n</ul>\r\n</div>\r\n<hr />\r\n<div class=\"terms__single\">\r\n<h3 class=\"neutral-top\">We\'re always looking for new ways to provide privacy for our customers.</h3>\r\n<p>Id ipsum mi tempor eget. Pretium consectetur scelerisque blandit habitasse non ullamcorper enim, diam quam id et, tempus massa. Sed nam vulputate pellentesque quis. Varius a, nunc faucibus proin elementum id odio auctor. Nunc, suspendisse consequat libero, pharetra tellus vulputate auctor venenatis tortor non rhoncus at duis. Pharetra ipsum mauris integer sit feugiat.</p>\r\n<p>Id ipsum mi tempor eget. Pretium consectetur scelerisque blandit habitasse non ullamcorper enim, diam quam id et, tempus massa.</p>\r\n&gt;\r\n<ul>\r\n<li>Blandit dignissim nulla varius tristique a sed integer ut tempor.</li>\r\n<li>Augue interdum semper bibendum amet sed.</li>\r\n<li>Dis in at ultricies tortor sit tellus.</li>\r\n<li>Habitant ornare aenean maecenas pretium</li>\r\n</ul>\r\n</div>', '2022-Aug-22'),
(8, 'key-risks', '<p>Investing in property can be rewarding but, as with any investment there are risks. The Info Packs and the Investment Terms and Conditions cover the risks specific to a particular investment but it is also important that, before investing, you understand the following general risks..</p>\r\n<p>&nbsp;</p>', '2022-Aug-22'),
(9, 'mail', 'principle@gmail.com', '2022-Aug-22'),
(10, 'mobile_number', '+70814567', '2022-Aug-22'),
(11, 'address', '1134 W Hubbard St. Floor 3, Chicago, IL, 60642, USA', '2022-Aug-25');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `owner` text NOT NULL,
  `price` int(100) NOT NULL,
  `returns` int(100) NOT NULL,
  `term` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `distribution` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `location`, `address`, `description`, `owner`, `price`, `returns`, `term`, `type`, `distribution`, `image`, `video`, `status`, `date`) VALUES
(2, 'San Francisco, CA', ' St, San Francisco', '<h1>About Us</h1>\r\n<p>Lorem ipsum</p>', '<p>Lorem ipsum</p>', 55102, 10, 12, 'Commercial', 'Annually', '8002aamirah.PNG', 'https://', 1, '15/Aug/2022'),
(3, 'The Weldon', 'Gastonia, NC', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laboru</p>', '<h3><strong>Lorem ipsum</strong> dolor sit amet,</h3>\r\n<p>\\r\\n</p>\r\n<p>&nbsp;</p>\r\n<p>\\r\\n</p>\r\n<p>consectetur adipisicing <strong>elit</strong>, sed do&nbsp;</p>\r\n<p>\\r\\n</p>\r\n<p>\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n</p>\r\n<table border=\"\\&quot;1\\&quot;\">\r\n<tbody>\r\n<tr>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>\\r\\n</p>\r\n<p><br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laboru</p>', 12009, 1222, 12, 'Commercial', 'Semi-annually', '43022042143.jpg', '', 1, '17/Aug/2022'),
(4, 'San Francisco, CA', '3335 21 St, San Francisco', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laboru</p>', '<h3><strong>Lorem ipsum</strong> dolor sit amet,</h3>\r\n<p>consectetur adipisicing <strong>elit</strong>, sed do&nbsp;</p>\r\n<p>\\r\\n</p>\r\n<p>\\r\\n\\r\\n\\r\\n\\r\\n</p>\r\n<table border=\"\\&quot;\\\\&quot;1\\\\&quot;\\&quot;\">\r\n<tbody>\r\n<tr>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p><br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laboru</p>', 11982, 13, 12, 'Residential', 'Monthly', '48024503757.jpg', '', 1, '17/Aug/2022'),
(5, 'Los Angeles', '8706 Herrick Ave, Los Angeles', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laboru</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laboru</p>', 100000, 7, 26, 'Commercial', 'Monthly', '7167fidelity+logo.jpg', '', 1, '17/Aug/2022'),
(6, 'San Diego', 'Colorado Springs, CO', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p>', 500000, 7, 36, 'Commercial', 'Monthly', '8628fidelity+logo.jpg', '', 1, '17/Aug/2022'),
(7, 'Los Angeles', 'The lily', '<p>Purpose of the loan To increase the company\\\\\\\'s working capital, magna a laoreet convallis, massa sapien tempor arcu, nec euismod elit justo in lacus. Maecenas mattis massa lectus, vel tincidunt augue porta non.</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<h2>Duis quis orci vehicula</h2>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>, fermentum tortor vitae, imperdiet sem. Quisque iaculis eu odio in lobortis. Sed vel ex non erat pellentesque lobortis vel vitae diam. Donec gravida eleifend pellentesque. Curabitur dictum blandit accumsan.</p>', '<p>Purpose of the loan To increase the company\\\\\\\'s working capital, magna a laoreet convallis, massa sapien tempor arcu, nec euismod elit justo in lacus. Maecenas mattis massa lectus, vel tincidunt augue porta non.</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>&nbsp;</p>', 123900, 5, 122, 'Commercial', 'Semi-annually', '8838picture+eng.jpg', '', 1, '18/Aug/2022');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `type` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(44) NOT NULL,
  `l_date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `firstname`, `lastname`, `password`, `email`, `phone`, `l_date`, `time`, `token`, `date`, `image`, `level`) VALUES
(1, 'particular', 'vikhomes', 'Admin', '123456', 'principle@gmail.com', '12345688', '31.08.2022', '09.23.29pm', '', '03/Aug/2022', '2314oyo logo.jpg', 1),
(7, 'particular', 'powerfully', 'powerful', '1234', 'support@vikhomes.com', '1', '31.08.2022', '06.12.00pm', '8b461191e6b0705ec1ce1199a20f370e3692', '28/Aug/2022', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `amount` int(100) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`id`, `user_id`, `amount`, `payment_type`, `date`, `status`) VALUES
(1, 1, 1000, 'paypal', '21/08/2022', 1),
(2, 2, 100, 'method', '2022-08-26', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `earnings`
--
ALTER TABLE `earnings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `earnings`
--
ALTER TABLE `earnings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
