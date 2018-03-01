-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2017 at 08:30 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crent`
--

-- --------------------------------------------------------

--
-- Table structure for table `cr_car`
--

CREATE TABLE `cr_car` (
  `car_plat` varchar(7) NOT NULL,
  `car_name` varchar(50) NOT NULL,
  `car_pass` int(10) NOT NULL,
  `car_trans` varchar(50) NOT NULL,
  `car_rental` int(50) NOT NULL,
  `car_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cr_car`
--

INSERT INTO `cr_car` (`car_plat`, `car_name`, `car_pass`, `car_trans`, `car_rental`, `car_image`) VALUES
('JKR5410', 'PERODUA VIVA', 5, 'AUTO', 50, 'viva3.jpeg.jpg'),
('WHJ5404', 'PERODUA MYVI', 5, 'MANUAL', 40, 'myvi1.jpeg.jpg'),
('WJH3201', 'PERODUA AXIA ', 5, 'MANUAL', 60, 'axia2.jpeg.jpg'),
('WJN7810', 'PROTON SAGA', 5, 'MANUAL', 100, 'saga1.jpeg.jpg'),
('WJR5404', 'TOYOTA AVANZA', 7, 'MANUAL', 150, 'avanza1.jpeg.jpg'),
('WNH1010', 'PROTON IRIZ', 5, 'MANUAL', 60, 'iriz1.jpeg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cr_reservation`
--

CREATE TABLE `cr_reservation` (
  `reservation_id` varchar(50) NOT NULL,
  `user_code` varchar(50) NOT NULL,
  `car_plat` varchar(10) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(11) NOT NULL,
  `car_name` varchar(10) NOT NULL,
  `car_pickup` date NOT NULL,
  `car_return` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `total_rent` double NOT NULL,
  `car_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cr_reservation`
--

INSERT INTO `cr_reservation` (`reservation_id`, `user_code`, `car_plat`, `user_fullname`, `user_email`, `user_phone`, `car_name`, `car_pickup`, `car_return`, `address`, `total_rent`, `car_status`) VALUES
('CR_RCXIJK', 'CR_C171002', 'WJR5404', 'SITI SYAHIRAH BT ABDULLAH', 'stsyahirah@gmail.com', '0134169100', 'TOYOTA AVA', '2017-05-25', '2017-05-25', 'NO 28 JALAN UNIVERSITI 15 TAMAN UNIVERSITI 86400 P', 150, 'FINISH'),
('CR_RJOL3J', 'CR_C171002', 'WJH3201', 'SITI SYAHIRAH BT ABDULLAH', 'stsyahirah@gmail.com', '0134169100', 'PERODUA AX', '2017-05-17', '2017-05-17', 'NO 28 JALAN UNIVERSITI 15 TAMAN UNIVERSITI 86400 P', 60, 'NEW'),
('CR_ROT7NG', 'CR_C171002', 'WHJ5404', 'SITI SYAHIRAH BT ABDULLAH', 'stsyahirah@gmail.com', '0134169100', 'PERODUA MY', '2017-05-15', '2017-05-15', 'NO 28 JALAN UNIVERSITI 15 TAMAN UNIVERSITI 86400 P', 50, 'NEW');

-- --------------------------------------------------------

--
-- Table structure for table `cr_score`
--

CREATE TABLE `cr_score` (
  `score_id` varchar(50) NOT NULL,
  `reservation_id` varchar(50) NOT NULL,
  `car_plat` varchar(50) NOT NULL,
  `user_code` varchar(50) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `sc_service` varchar(10) NOT NULL,
  `sc_money` varchar(10) NOT NULL,
  `sc_cond` varchar(10) NOT NULL,
  `sc_loc` varchar(10) NOT NULL,
  `sc_friendly` varchar(10) NOT NULL,
  `sc_option` varchar(10) NOT NULL,
  `sc_feedback` varchar(50) NOT NULL,
  `sc_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cr_score`
--

INSERT INTO `cr_score` (`score_id`, `reservation_id`, `car_plat`, `user_code`, `user_fullname`, `user_email`, `sc_service`, `sc_money`, `sc_cond`, `sc_loc`, `sc_friendly`, `sc_option`, `sc_feedback`, `sc_total`) VALUES
('CR_S4SHMB', 'CR_RCXIJK', 'WJR5404', 'CR_C171002', 'SITI SYAHIRAH BT ABDULLAH', 'stsyahirah@gmail.com', '8.0', '8.0', '9.0', '10.0', '8.0', '8.0', 'service yang bagus', 8.5);

-- --------------------------------------------------------

--
-- Table structure for table `cr_user`
--

CREATE TABLE `cr_user` (
  `user_code` varchar(50) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_phone` varchar(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cr_user`
--

INSERT INTO `cr_user` (`user_code`, `user_fullname`, `username`, `user_phone`, `user_email`, `address`, `user_password`, `user_role`) VALUES
('CR_C171001', 'SITI SYAFIQAH BT ABDULLAH', 'SYAFIQAH', '0139061925', 'stsyafiqah95@gmail.com', 'TAMAN UNIVERSITI				', 'LxJkgS9zkUzqq+qfXM2VR86HVgotdwjojxp+z9Hoy9M/Vu03xfFw2lg4XaEQqvUwJI9xmAEPJnpTEe1IlFkYtMA4cDS6541oivcJ10HPWHd2WuDU9s+NC8Opn2IJpNloOlR05TWKV84GuOEBWGZzSPGnqbOYqibrnzGgNangrnE=', 'admin'),
('CR_C171002', 'SITI SYAHIRAH BT ABDULLAH', 'SYAHIRAH', '0134169100', 'stsyahirah@gmail.com', 'TAMAN UNIVERSITI  						', 'CMDC/OZUzTPvp65bWprwD51K1NaZr2zagKwrlnwWa37wPaPNDFBvNUbGIXh3ozSp9UBA8Nb/MDlpAXQJjf2l3wrLdo2tlkGlo0fLlml3abbp+KyqKsmw6OGKmIFtxQYveboKZ2dXvbgsf68u5LNmIGIDZTQtcAq3Fpk9xBpdReY=', 'customer'),
('CR_C171003', 'SITI SYIFAA BT ABDULLAH', 'SYIFAA', '0166278434', 'stsyifaa@gmail.com', 'TAMAN UNIVERSITI						', 'Qgr088NhDhaStErSBTt/SLlPqDiEYL0JCkqv68cq1qUsN+qu4Q+vBTpGCCTwzPmQAXN0v9tiZdrUidk612cdrB1q8SyM1uGhbSqIIvl7Av3aXX907cl+KBIPhcojComl+h+X8umydtA3udNyvWW3zFFjiRByVEh833XYlFvk3lg=', 'customer'),
('CR_C171004', 'MUHAMAD SYAHMI BIN ABDULLAH', 'SYAHMI', '0176613691', 'syahmi@gmail.com', 'TAMAN UNIVERSITI            						', 'K/QtS1zZIhD4hr+/KDGsarCZo87DKCv1PYJ66JFc9mqffmUhBW1POqNTS51fLYB2E8PU+HSQAIpUT3jav88A9mpB1k9YDqBB35LxNChgLyAX1zQBlfFL6BpdCeobQybN+RsEVvoAb3gBcm67C+Jp6inm6Z5LRIdJ1teF9g+8HYk=', 'customer'),
('CR_C171005', 'MUHAMMAD SYAKIR BIN ABDULLAH', 'SYAKIR', '01112939320', 'syakir@gmail.com', 'TAMAN UNIVERSITI				', 'QnhYXVZ28v24+xwZawzzVLEOhHnSGebMjxPF0mfv0zbr0eoDMdy2pKx3JmD5H0qgfFzPQNb5v+ktu8qrUMFS1vcZ7j5ZpfSdGCRdazLb7vJ8ILnrtCP7zXJq2MflDQRd64mu0PpL5W6pORjqPOyL8qY0NQXbEIw1cEU8yh2ov58=', 'customer'),
('CR_C171006', 'MUHAMMAD SYAHIR BIN ABDULLAH', 'SYAHIR', '01117920976', 'syahir@gmail.com', 'TAMAN UNIVERSITI				', 'O1gZgMOAbh752MXm7yPSbkl3ktu1b4Sydj4EuGPg17jxWx/XDscaUbCPzvdCKYjBPw9Vf2+XJ07BxRfseg0BFPa79/bR6GXtpKe6xNwXnDqdAIJ16wW4TOwKHJvSe+0Z4jpo2YB7H8oJBsAbP7/c+UBkE6OrdRwv8j+r5sgo8O0=', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cr_car`
--
ALTER TABLE `cr_car`
  ADD PRIMARY KEY (`car_plat`);

--
-- Indexes for table `cr_reservation`
--
ALTER TABLE `cr_reservation`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `cr_score`
--
ALTER TABLE `cr_score`
  ADD PRIMARY KEY (`score_id`);

--
-- Indexes for table `cr_user`
--
ALTER TABLE `cr_user`
  ADD PRIMARY KEY (`user_code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
