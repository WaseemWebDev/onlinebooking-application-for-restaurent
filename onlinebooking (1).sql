-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 01:04 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlinebooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bussines_order`
--

CREATE TABLE IF NOT EXISTS `bussines_order` (
  `id` int(55) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `persons` int(55) NOT NULL,
  `restaurent_type` varchar(55) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(55) NOT NULL,
  `phonenumber` int(55) NOT NULL,
  `user` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bussines_order`
--

INSERT INTO `bussines_order` (`id`, `checkin`, `checkout`, `persons`, `restaurent_type`, `date`, `email`, `phonenumber`, `user`) VALUES
(2, '2020-04-16', '2020-04-02', 2, 'hall with 3 tables and 20 person capacity', '2020-04-23', 'sajjad123@gmail.com', 546465, 'sajjad123@gmail.com'),
(3, '2020-07-02', '2020-07-15', 2, 'hall with 1 table and 10 person capacity', '2020-07-08', 'waseemyousafzai@gmail.com', 12121212, 'waseemyousafzai@gmail.com'),
(4, '2020-07-01', '2020-07-17', 4, 'hall with 1 table and 10 person capacity', '2020-07-27', 'waseemyousafzai520@gmail.com', 12121212, 'waseemyousafzai520@gmail.com'),
(7, '2020-07-09', '2020-07-03', 2, 'hall with 3 tables and 20 person capacity', '2020-07-27', 'waseemyousafzai520@gmail.com', 12121212, 'sk0449210@gmail.com'),
(8, '2020-08-06', '2020-08-06', 2, 'hall with 1 table and 10 person capacity', '2020-08-27', 'waseemyousafzai@gmail.com', 12121212, 'sk0449210@gmail.com'),
(9, '2020-08-07', '2020-08-05', 2, 'hall with 3 tables and 20 person capacity', '2020-08-27', 'waseemyousafzai520@gmail.com', 12121212, 'sk0449210@gmail.com'),
(10, '2020-11-12', '2020-11-19', 4, 'hall with 1 table and 10 person capacity', '2020-11-01', 'waseemyousafzai@gmail.com', 12121212, 'sk0449210@gmail.com'),
(11, '2020-11-01', '2020-11-02', 2, 'hall with 1 table and 10 person capacity', '2020-11-01', 'waseemyousafzai@gmail.com', 12121212, 'sk0449210@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `check_rating`
--

CREATE TABLE IF NOT EXISTS `check_rating` (
  `id` int(55) NOT NULL,
  `table_id` int(55) NOT NULL,
  `user` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `check_rating`
--

INSERT INTO `check_rating` (`id`, `table_id`, `user`) VALUES
(6, 2, 'sohail@gmail.com'),
(8, 2, 'raheel23@gmail.com'),
(10, 2, 'waseem@gmail.com'),
(11, 3, 'waseem@gmail.com'),
(12, 3, 'sajjad123@gmail.com'),
(13, 4, 'sajjad123@gmail.com'),
(14, 3, 'sohail@gmail.com'),
(15, 4, 'sohail@gmail.com'),
(16, 2, 'sk0449210@gmail.com'),
(17, 4, 'sk0449210@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `check_restaurent_rating`
--

CREATE TABLE IF NOT EXISTS `check_restaurent_rating` (
  `id` int(11) NOT NULL,
  `restaurent_id` int(11) NOT NULL,
  `user` varchar(44) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `check_restaurent_rating`
--

INSERT INTO `check_restaurent_rating` (`id`, `restaurent_id`, `user`) VALUES
(1, 36, 'waseem@gmail.com'),
(2, 35, 'waseem@gmail.com'),
(6, 35, 'sajjad123@gmail.com'),
(7, 22, 'sajjad123@gmail.com'),
(8, 24, 'sajjad123@gmail.com'),
(9, 24, 'sohail@gmail.com'),
(10, 22, 'sohail@gmail.com'),
(11, 36, 'sk0449210@gmail.com'),
(12, 24, 'sk0449210@gmail.com'),
(13, 34, 'sk0449210@gmail.com'),
(14, 38, 'sk0449210@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `user_name` varchar(55) NOT NULL,
  `restaurent_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_name`, `restaurent_id`, `date`, `status`) VALUES
(1, 'very nyc awesome place', 'waseem', 25, '0000-00-00', 1),
(2, 'very nyc awesome placeascasc', 'sajjad khan', 25, '2020-04-23', 1),
(3, 'this is awesome place i just love it', 'sohail khan', 25, '2020-04-23', 1),
(4, 'nyc amazing', 'sajjad123@gmail.com', 35, '2020-04-23', 1),
(5, 'hahahhahah', 'sajjad123@gmail.com', 35, '2020-04-23', 1),
(6, 'lovly', 'sajjad123@gmail.com', 35, '2020-04-23', 1),
(7, 'awesome hotel i am giving it 5 stars', 'sajjad123@gmail.com', 24, '2020-04-23', 1),
(8, 'aa', 'sajjad123@gmail.com', 24, '2020-04-23', 1),
(16, 'nice', 'sk0449210@gmail.com', 34, '2020-04-23', 1),
(17, 'one of the best hotel in islamabad', 'sk0449210@gmail.com', 22, '2020-06-29', 1),
(18, 'nyc restaurent', 'sk0449210@gmail.com', 36, '2020-07-08', 1),
(19, 'very nyc restaurent', 'sk0449210@gmail.com', 24, '2020-07-08', 1),
(20, 'nyc', 'sk0449210@gmail.com', 35, '2020-07-27', 1),
(21, 'it is awesome', 'sk0449210@gmail.com', 34, '2020-08-27', 1),
(22, 'very yummy ', 'waseemyousafzai520@gmail.com', 37, '2020-09-23', 1),
(23, 'very good experience here', 'sk0449210@gmail.com', 39, '2020-09-24', 1),
(24, 'very nice', 'sk0449210@gmail.com', 40, '2020-09-25', 1),
(25, 'nyc', 'sk0449210@gmail.com', 42, '2020-09-25', 1),
(26, 'nyc', 'sk0449210@gmail.com', 41, '2020-11-01', 1),
(27, 'nyc', 'sk0449210@gmail.com', 37, '2020-11-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(55) NOT NULL,
  `totalvalue` int(55) NOT NULL,
  `ratings` int(55) NOT NULL,
  `restaurents_id` int(55) NOT NULL,
  `user` varchar(255) NOT NULL,
  `status` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `totalvalue`, `ratings`, `restaurents_id`, `user`, `status`) VALUES
(22, 17, 5, 35, 'sajjad123@gmail.com', ''),
(23, 10, 2, 25, '', ''),
(24, 9, 3, 34, 'sajjad123@gmail.com', ''),
(25, 18, 5, 36, 'sajjad123@gmail.com', ''),
(26, 14, 4, 24, 'sajjad123@gmail.com', ''),
(27, 20, 4, 0, 'sajjad123@gmail.com', ''),
(28, 11, 3, 22, 'sajjad123@gmail.com', ''),
(29, 8, 2, 38, 'waseemyousafzai520@gmail.com', ''),
(30, 4, 1, 39, 'sk0449210@gmail.com', ''),
(31, 4, 1, 41, 'sk0449210@gmail.com', ''),
(32, 5, 1, 42, 'sk0449210@gmail.com', ''),
(33, 5, 1, 37, 'sk0449210@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(55) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `firstname`, `lastname`, `email`, `password`, `role`, `token`, `status`) VALUES
(8, 'sajjad', 'khan', 'sajjad123@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'user', 'dba8bb0377c99896643dfff655936c66', 1),
(18, 'sajjadi', 'khani', 'sajjad1234@gmail.com', '96e79218965eb72c92a549dd5a330112', 'user', '9cf717e791c3cc52ee66a10def2bc8d6', 1),
(19, 'tamor', 'khan', 'waseem@gmail.com', '96e79218965eb72c92a549dd5a330112', 'user', 'f77b74b3cfa601e53acf425cac8920ef', 1),
(20, 'akbar bacha', 'pir', 'akabar@gmail.com', '96e79218965eb72c92a549dd5a330112', 'user', 'db1c92fee68a1b9290c57681df86d876', 0),
(21, 'lala', 'khan', 'lala@gmail.com', '96e79218965eb72c92a549dd5a330112', 'user', '232b6365e7823190f7d8b183f9e0b61e', 0),
(22, 'waseem', 'khan', 'raheel23@gmail.com', '96e79218965eb72c92a549dd5a330112', 'user', '422bed6cdb99e672f3c730d3d34ce3dc', 1),
(24, 'raheel', 'khan', 'adasd@gmail.com', '96e79218965eb72c92a549dd5a330112', 'user', 'fe959c423bf9951803354ec0320148af', 1),
(28, 'waseem', 'khan', 'waseemyousafzai@gmail.com', '96e79218965eb72c92a549dd5a330112', 'user', 'a90ba9c39cd71f7ec8aa13eecd8768e7', 1),
(36, 'waseem', 'khan', 'waseemyousafzai520@gmail.com', '96e79218965eb72c92a549dd5a330112', 'admin', '58a41328d84daaf1b417df7377a6ffbd', 1),
(41, 'waseem', 'khan', 'sk0449210@gmail.com', '96e79218965eb72c92a549dd5a330112', 'user', 'ef9b43a25d2cedbf008d049f0b7ad106', 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurents`
--

CREATE TABLE IF NOT EXISTS `restaurents` (
  `id` int(55) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(55) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(55) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_name` varchar(55) NOT NULL,
  `status` varchar(255) NOT NULL,
  `category` varchar(10) NOT NULL DEFAULT 'restaurent'
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurents`
--

INSERT INTO `restaurents` (`id`, `name`, `location`, `image`, `price`, `description`, `user_name`, `status`, `category`) VALUES
(37, 'Italian Pizza With Best Price', 'peshawer', 'upload_images/pizza.JPG', '1000', 'Italian pizza is one of the best pizza in pakistan ', '', 'review', 'restaurent'),
(38, 'Spicy Bbq ', 'peshawer', 'upload_images/bbq.JPG', '2000', '', '', 'review', 'restaurent'),
(39, 'Black tea', 'Chaye khana peshawer', 'upload_images/coffee_cup_pattern_plate_70209_1920x1080.jpg', '200', '', '', 'review', 'restaurent'),
(40, 'Best platter with good price', 'River Viw Nowshera', 'upload_images/dan-gold-E6HjQaB7UEA-unsplash.jpg', '2000', '', '', 'no review', 'restaurent'),
(41, 'Zinger Burger', 'Chief Burger Peshawer', 'upload_images/resize-1594367650577084428snack26350351920.jpg', '300', '', '', 'review', 'restaurent'),
(42, 'Cold Drinks', 'peshawer', 'upload_images/coca-cola_ice_glass_splashes_5379_1920x1080.jpg', '100', '', '', 'review', 'restaurent');

-- --------------------------------------------------------

--
-- Table structure for table `restaurent_special`
--

CREATE TABLE IF NOT EXISTS `restaurent_special` (
  `id` int(55) NOT NULL,
  `name` varchar(55) NOT NULL,
  `persons` int(55) NOT NULL,
  `booking_date` date NOT NULL,
  `restaurent_name` varchar(55) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `phone_number` int(55) NOT NULL,
  `restaurent_id` int(55) NOT NULL,
  `image` varchar(255) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` varchar(100) NOT NULL,
  `seenstatus` varchar(8) NOT NULL DEFAULT 'unseen',
  `orderstatus` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurent_special`
--

INSERT INTO `restaurent_special` (`id`, `name`, `persons`, `booking_date`, `restaurent_name`, `status`, `phone_number`, `restaurent_id`, `image`, `checkin`, `checkout`, `seenstatus`, `orderstatus`) VALUES
(45, 'waseemyousafzai520@gmail.com', 2, '2020-09-23', 'Spicy Bbq ', 1, 2232, 38, 'upload_images/bbq.JPG', '0000-00-00', ' mardan', 'seen', 'delivered'),
(46, 'sk0449210@gmail.com', 20, '2020-09-23', 'Zinger Burger', 1, 12121212, 41, 'upload_images/resize-1594367650577084428snack26350351920.jpg', '0000-00-00', ' mardan', 'seen', 'delivered'),
(47, 'sk0449210@gmail.com', 3, '2020-09-23', 'Cold Drinks', 1, 2134, 42, 'upload_images/coca-cola_ice_glass_splashes_5379_1920x1080.jpg', '0000-00-00', ' peshawer', 'seen', 'pending'),
(48, 'sk0449210@gmail.com', 23, '2020-09-24', 'Best platter with good price', 1, 2323, 40, 'upload_images/dan-gold-E6HjQaB7UEA-unsplash.jpg', '0000-00-00', ' peshawer', 'seen', 'pending'),
(49, 'sk0449210@gmail.com', 2, '2020-09-25', 'Best platter with good price', 1, 2232, 40, 'upload_images/dan-gold-E6HjQaB7UEA-unsplash.jpg', '0000-00-00', ' mardan', 'seen', 'delivered'),
(50, 'sk0449210@gmail.com', 2, '2020-11-01', 'Zinger Burger', 1, 12121212, 41, 'upload_images/resize-1594367650577084428snack26350351920.jpg', '0000-00-00', ' peshawer', 'seen', 'delivered'),
(51, 'sk0449210@gmail.com', 3, '2020-11-02', 'Italian Pizza With Best Price', 1, 12121212, 37, 'upload_images/pizza.JPG', '0000-00-00', ' mardan', 'seen', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `location` varchar(55) NOT NULL,
  `image` varchar(55) NOT NULL,
  `price` varchar(20) NOT NULL,
  `description` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL,
  `category` varchar(10) NOT NULL DEFAULT 'table'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `name`, `location`, `image`, `price`, `description`, `status`, `category`) VALUES
(2, 'crystal amoled table', 'mardan', 'upload_images/onetable.jpg', '3000', 'awdawd', 'review', 'table'),
(3, 'wooden table with 4 chairs', 'peshawer', 'upload_images/onetable.jpg', '4000', 'best modals in best rates', 'review', 'table'),
(4, 'best crystal and wooden', 'lahore', 'upload_images/table.jpg', '6000', 'best place in lahore town for meeting and birthday part', 'review', 'table'),
(5, 'wooden', 'peshawer', 'upload_images/meeting.png', '4000', 'best wooden table', 'review', 'table');

-- --------------------------------------------------------

--
-- Table structure for table `tables_orders`
--

CREATE TABLE IF NOT EXISTS `tables_orders` (
  `id` int(55) NOT NULL,
  `no_of_tables` int(55) NOT NULL,
  `user_name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phone_no` int(15) NOT NULL,
  `booking_date` date NOT NULL,
  `order_type` varchar(20) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `checkIn` date NOT NULL,
  `checkout` date NOT NULL,
  `table_name` varchar(55) NOT NULL,
  `image` varchar(55) NOT NULL,
  `no_of_persons` int(55) NOT NULL,
  `seenstatus` varchar(8) NOT NULL DEFAULT 'unseen'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tables_orders`
--

INSERT INTO `tables_orders` (`id`, `no_of_tables`, `user_name`, `email`, `phone_no`, `booking_date`, `order_type`, `status`, `checkIn`, `checkout`, `table_name`, `image`, `no_of_persons`, `seenstatus`) VALUES
(2, 2, 'sajjad123@gmail.com', 'waseemyousafzai520@gmail.com', 546465, '2020-04-21', 'special', 1, '2020-04-16', '2020-04-17', 'crystal amoled table', 'upload_images/onetable.jpg', 2, 'seen'),
(4, 3, 'sohail@gmail.com', 'waseemyousafzai520@gmail.com', 546465, '2020-04-22', 'special', 1, '2020-04-15', '2020-04-02', 'crystal amoled table', 'upload_images/onetable.jpg', 4, 'seen'),
(5, 2, 'sk0449210@gmail.com', 'waseemyousfzai520@gmail.com', 546465, '2020-04-23', 'quick', 1, '2020-04-01', '2020-04-27', 'Not avaiable because it is quick order', 'Not avaiable because it is quick order', 2, 'seen'),
(10, 3, 'sk0449210@gmail.com', 'waseemyousafzai@gmail.comawd', 234234, '2020-08-27', 'special', 1, '2020-08-25', '2020-08-13', 'best crystal and wooden', 'upload_images/table.jpg', 2, 'seen'),
(11, 2, 'sk0449210@gmail.com', 'waseem@gmail.com', 32323, '2020-09-24', 'quick', 1, '2020-09-02', '2020-09-14', 'Not avaiable because it is quick order', 'Not avaiable because it is quick order', -4, 'seen'),
(12, 3, 'sk0449210@gmail.com', 'waseemyousafzai@gmail.com', 12121212, '2020-09-24', 'special', 1, '2020-09-14', '2020-09-12', 'crystal amoled table', 'upload_images/onetable.jpg', 2, 'seen'),
(13, 2, 'sk0449210@gmail.com', 'waseemyousafzai@gmail.com', 12121212, '2020-11-01', 'quick', 1, '2020-11-01', '2020-11-02', 'Not avaiable because it is quick order', 'Not avaiable because it is quick order', 2, 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `tables_rating`
--

CREATE TABLE IF NOT EXISTS `tables_rating` (
  `id` int(55) NOT NULL,
  `totalvalue` int(55) NOT NULL,
  `ratings` int(55) NOT NULL,
  `tables_id` int(55) NOT NULL,
  `user` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tables_rating`
--

INSERT INTO `tables_rating` (`id`, `totalvalue`, `ratings`, `tables_id`, `user`, `status`) VALUES
(7, 35, 9, 2, 'sajjad123@gmail.com', ''),
(8, 25, 6, 3, 'sohail@gmail.com', ''),
(9, 13, 4, 4, 'waseem@gmail.com', ''),
(10, 5, 1, 0, 'sajjad123@gmail.com', ''),
(11, 5, 1, 5, 'sk0449210@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_comments`
--

CREATE TABLE IF NOT EXISTS `table_comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `user_name` varchar(55) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `table_id` int(55) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_comments`
--

INSERT INTO `table_comments` (`id`, `comment`, `user_name`, `status`, `table_id`, `date`) VALUES
(1, 'nice', 'sk0449210@gmail.com', 1, 2, '2020-04-23'),
(2, 'i want to book this ', 'sk0449210@gmail.com', 1, 2, '2020-04-23'),
(6, 'very nyc and amazing place for eating', 'sk0449210@gmail.com', 1, 4, '2020-04-23'),
(7, 'best table', 'sk0449210@gmail.com', 1, 2, '2020-07-27'),
(8, 'awesome', 'sk0449210@gmail.com', 1, 4, '2020-08-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bussines_order`
--
ALTER TABLE `bussines_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_rating`
--
ALTER TABLE `check_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_restaurent_rating`
--
ALTER TABLE `check_restaurent_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `restaurents`
--
ALTER TABLE `restaurents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurent_special`
--
ALTER TABLE `restaurent_special`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables_orders`
--
ALTER TABLE `tables_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables_rating`
--
ALTER TABLE `tables_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_comments`
--
ALTER TABLE `table_comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bussines_order`
--
ALTER TABLE `bussines_order`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `check_rating`
--
ALTER TABLE `check_rating`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `check_restaurent_rating`
--
ALTER TABLE `check_restaurent_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `restaurents`
--
ALTER TABLE `restaurents`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `restaurent_special`
--
ALTER TABLE `restaurent_special`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tables_orders`
--
ALTER TABLE `tables_orders`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tables_rating`
--
ALTER TABLE `tables_rating`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `table_comments`
--
ALTER TABLE `table_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
