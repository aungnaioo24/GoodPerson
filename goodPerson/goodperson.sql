-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2017 at 05:00 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goodperson`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_pass`) VALUES
(1, 'aungnai0322', '$2y$10$UFhgqWpRSw633HtBNbyiTuCKtxRnJcU5MToIuxven8TmwlV3B8AZm');

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `dis_id` int(11) NOT NULL,
  `dis_dp_id` int(11) NOT NULL,
  `dis_user_id` int(11) NOT NULL,
  `dis_text` text NOT NULL,
  `dis_date` datetime NOT NULL,
  `dis_mdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`dis_id`, `dis_dp_id`, `dis_user_id`, `dis_text`, `dis_date`, `dis_mdate`) VALUES
(3, 1, 2, 'စမ္းထားတာေတြပါ bro', '2017-10-12 10:32:21', '2017-10-12 10:32:21'),
(6, 1, 2, 'lksjdfalkjs', '2017-10-12 12:22:34', '2017-10-12 12:22:34'),
(7, 1, 2, 'lksdfj', '2017-10-12 12:22:36', '2017-10-12 12:22:36');

-- --------------------------------------------------------

--
-- Table structure for table `discussionpost`
--

CREATE TABLE `discussionpost` (
  `dp_id` int(11) NOT NULL,
  `dp_heading` varchar(255) NOT NULL,
  `dp_text` text NOT NULL,
  `dp_delstatus` tinyint(4) NOT NULL,
  `dp_date` datetime NOT NULL,
  `dp_mdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discussionpost`
--

INSERT INTO `discussionpost` (`dp_id`, `dp_heading`, `dp_text`, `dp_delstatus`, `dp_date`, `dp_mdate`) VALUES
(2, 'လူေတ္ာ လူေကာင္း', 'လူေတ္ာ လူေကာင္း တစ္ေယာက္ ျဖစ္ရန္ လိုအပ္သည့္အျပဳအမူမ်ား၊ ေဆာင္ရန္ ေ႐ွာင္ရန္မ်ားကို ေဆြးေႏြးၾကမည္။', 0, '2017-10-12 16:49:17', '2017-10-12 16:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `dis_like`
--

CREATE TABLE `dis_like` (
  `dl_id` int(11) NOT NULL,
  `dl_dis_id` int(11) NOT NULL,
  `dl_dp_id` int(11) NOT NULL,
  `dl_user_id` int(11) NOT NULL,
  `dl_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dis_like`
--

INSERT INTO `dis_like` (`dl_id`, `dl_dis_id`, `dl_dp_id`, `dl_user_id`, `dl_value`) VALUES
(14, 2, 1, 1, 1),
(15, 2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dplike`
--

CREATE TABLE `dplike` (
  `id` int(11) NOT NULL,
  `dpl_dp_id` int(11) NOT NULL,
  `dpl_user_id` int(11) NOT NULL,
  `dpl_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dplike`
--

INSERT INTO `dplike` (`id`, `dpl_dp_id`, `dpl_user_id`, `dpl_value`) VALUES
(13, 1, 2, 1),
(14, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `knowledge`
--

CREATE TABLE `knowledge` (
  `k_id` int(11) NOT NULL,
  `k_title` varchar(255) NOT NULL,
  `k_text` text NOT NULL,
  `k_delstatus` tinyint(4) NOT NULL,
  `k_date` datetime NOT NULL,
  `k_mdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `k_like`
--

CREATE TABLE `k_like` (
  `kl_id` int(11) NOT NULL,
  `kl_k_id` int(11) NOT NULL,
  `kl_user_id` int(11) NOT NULL,
  `kl_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `k_like`
--

INSERT INTO `k_like` (`kl_id`, `kl_k_id`, `kl_user_id`, `kl_value`) VALUES
(2, 1, 1, 1),
(10, 2, 2, 1),
(11, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_city` varchar(255) NOT NULL,
  `u_address` text NOT NULL,
  `u_favquote` text NOT NULL,
  `u_ambition` text NOT NULL,
  `u_university` varchar(255) NOT NULL,
  `u_work` varchar(255) NOT NULL,
  `u_propic` varchar(255) NOT NULL,
  `u_delstatus` tinyint(4) NOT NULL,
  `u_date` datetime NOT NULL,
  `u_mdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `u_name`, `u_email`, `u_password`, `u_city`, `u_address`, `u_favquote`, `u_ambition`, `u_university`, `u_work`, `u_propic`, `u_delstatus`, `u_date`, `u_mdate`) VALUES
(1, 'aungnaioo', 'aungnai0322@gmail.com', '$2y$10$uW6QogBnIUFXyHZ/VlPf2eNzoPXqdDBWy9rdBqhSxHP5IR83XH7Vm', 'ရန္ကုန္', 'အမွတ္(၆၅)၊ အိုးဘိုလမ္း၊ ၾကည့္ျမင္တိုင္ၿမိဳ႕နယ္', 'အႀကီးမားဆံုး စြန္႕စားမွဳဟာ မစြန္႕စားရဲျခင္းပါ', 'Software Engineer, Web Developer, Entrepreneur', 'West Yangon Technological University', 'Engineering Student', 'DSC_0331.JPG', 0, '2017-10-12 09:35:12', '2017-10-12 10:18:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`dis_id`);

--
-- Indexes for table `discussionpost`
--
ALTER TABLE `discussionpost`
  ADD PRIMARY KEY (`dp_id`);

--
-- Indexes for table `dis_like`
--
ALTER TABLE `dis_like`
  ADD PRIMARY KEY (`dl_id`);

--
-- Indexes for table `dplike`
--
ALTER TABLE `dplike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledge`
--
ALTER TABLE `knowledge`
  ADD PRIMARY KEY (`k_id`);

--
-- Indexes for table `k_like`
--
ALTER TABLE `k_like`
  ADD PRIMARY KEY (`kl_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `u_name` (`u_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `discussionpost`
--
ALTER TABLE `discussionpost`
  MODIFY `dp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dis_like`
--
ALTER TABLE `dis_like`
  MODIFY `dl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `dplike`
--
ALTER TABLE `dplike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `knowledge`
--
ALTER TABLE `knowledge`
  MODIFY `k_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `k_like`
--
ALTER TABLE `k_like`
  MODIFY `kl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
