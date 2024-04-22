-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2024 at 06:52 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secondhandcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_body`
--

DROP TABLE IF EXISTS `tbl_body`;
CREATE TABLE IF NOT EXISTS `tbl_body` (
  `bod_id` int NOT NULL AUTO_INCREMENT,
  `bod_name` varchar(30) NOT NULL,
  PRIMARY KEY (`bod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_body`
--

INSERT INTO `tbl_body` (`bod_id`, `bod_name`) VALUES
(1, 'Hatchback'),
(2, 'Sedan'),
(3, 'Suv'),
(4, 'Muv'),
(5, 'vjbfj');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companyreg`
--

DROP TABLE IF EXISTS `tbl_companyreg`;
CREATE TABLE IF NOT EXISTS `tbl_companyreg` (
  `comp_id` int NOT NULL AUTO_INCREMENT,
  `comp_name` varchar(30) NOT NULL,
  PRIMARY KEY (`comp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_companyreg`
--

INSERT INTO `tbl_companyreg` (`comp_id`, `comp_name`) VALUES
(20, 'BENZ'),
(25, 'Hyundai'),
(24, 'Volkswagen'),
(14, 'BMW'),
(13, 'TaTa'),
(10, 'Maruthi Suzuki'),
(12, 'Kia'),
(11, 'Ford'),
(21, 'dodge'),
(23, 'Renault'),
(26, 'Jeep'),
(28, 'Nissan'),
(30, 'Porsche'),
(31, 'Lamborghini'),
(38, 'Jaguar'),
(40, 'MINI'),
(42, 'Land Rover');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cust`
--

DROP TABLE IF EXISTS `tbl_cust`;
CREATE TABLE IF NOT EXISTS `tbl_cust` (
  `cust_id` int NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` bigint NOT NULL,
  `housename` text NOT NULL,
  `dis_id` int NOT NULL,
  `loc_id` int NOT NULL,
  `pincode` int NOT NULL,
  `log_id` int NOT NULL,
  `id_proof` int NOT NULL,
  `imgc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `log_password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `reg_date` date NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_cust`
--

INSERT INTO `tbl_cust` (`cust_id`, `cust_name`, `email`, `contact`, `housename`, `dis_id`, `loc_id`, `pincode`, `log_id`, `id_proof`, `imgc`, `log_password`, `reg_date`) VALUES
(55, 'hi', 'aldrinbenny51@gmail.com', 78787880, 'village', 6, 6, 23232, 71, 12121, 's.jpg', 'hi123', '2023-09-01'),
(53, 'aldrin Benny', 'aldrinbenny09@gmail.com', 7902292361, 'village', 9, 11, 4545454, 69, 8787878, 'bunny.jpg', 'aldrin23', '2023-10-01'),
(54, 'aadhi', 'aldrinbenny51@gmail.com', 9544836096, 'village', 9, 11, 8787878, 70, 78878, 'aadhi.jpg', 'aadhi7', '2023-10-01'),
(52, 'Alen Abhilash', 'alenabhilash2@gmail.com', 3233332, 'Chirapurathu', 4, 5, 8787878, 68, 54545454, 'pexels-photo-3183198.jpeg', 'alen24', '2023-09-20'),
(56, 'james jhon', 'alanabhilash4@gmail.com', 9544835715, 'rose villa', 19, 105, 12345, 72, 12125, 'd0e700167398a684721711d51418af0d.jpg', 'james123', '2024-01-01'),
(57, 'kelvin george', 'aldrinbenny51@gmail.com', 7558878535, 'Nilayam', 9, 11, 78478, 73, 89475, '403078.webp', 'kelvin123', '2023-08-10'),
(58, 'benny k jose', 'alenabhilash2@gmail.com', 9961438446, 'green village', 5, 10, 77777, 74, 78945, 'IMG_20210217_190811.jpg', '1', '2023-12-01'),
(59, 'joel jomon', 'aleenaabhilash2002@gmail.com', 9747389686, 'Chirapurathu', 5, 10, 78945, 75, 12345, 'person.png', 'joel123', '2023-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dis`
--

DROP TABLE IF EXISTS `tbl_dis`;
CREATE TABLE IF NOT EXISTS `tbl_dis` (
  `dis_id` int NOT NULL AUTO_INCREMENT,
  `dis_name` varchar(30) NOT NULL,
  PRIMARY KEY (`dis_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_dis`
--

INSERT INTO `tbl_dis` (`dis_id`, `dis_name`) VALUES
(9, 'Ernakulam'),
(6, 'Kannur'),
(5, 'Idukki'),
(4, 'Wayanad'),
(13, 'kottayam'),
(16, 'Thiruvananthapuram'),
(17, 'Alappuzha'),
(18, 'Kasaragod'),
(19, 'Kollam'),
(20, 'Kozhikode'),
(21, 'Malappuram'),
(22, 'Palakkad'),
(23, 'Pathanamthitta'),
(24, 'Thrissur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fuel`
--

DROP TABLE IF EXISTS `tbl_fuel`;
CREATE TABLE IF NOT EXISTS `tbl_fuel` (
  `fuel_id` int NOT NULL AUTO_INCREMENT,
  `fuel_name` varchar(30) NOT NULL,
  PRIMARY KEY (`fuel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_fuel`
--

INSERT INTO `tbl_fuel` (`fuel_id`, `fuel_name`) VALUES
(1, 'Petrol'),
(13, 'Electric'),
(3, 'Diesel');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loc`
--

DROP TABLE IF EXISTS `tbl_loc`;
CREATE TABLE IF NOT EXISTS `tbl_loc` (
  `loc_id` int NOT NULL AUTO_INCREMENT,
  `loc_name` varchar(30) NOT NULL,
  `dis_id` int NOT NULL,
  PRIMARY KEY (`loc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=157 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_loc`
--

INSERT INTO `tbl_loc` (`loc_id`, `loc_name`, `dis_id`) VALUES
(9, 'Thodupuzha ', 5),
(2, 'Vythiri', 4),
(10, 'Vagamon', 5),
(5, 'Neelimala', 4),
(6, 'Kadachira', 6),
(11, 'Kavana', 9),
(16, 'Allapra', 9),
(14, 'pala', 13),
(17, 'Ambalamedu', 9),
(18, 'Angamaly', 9),
(19, 'Arakkunnam', 9),
(20, 'Chembarakky', 9),
(21, 'Chendamangalam', 9),
(22, 'Mattur', 9),
(23, 'Kaladi', 9),
(24, 'Malayattur', 9),
(25, 'Mookkannur', 9),
(26, 'Thuravur', 9),
(27, 'Manjapra', 9),
(28, 'Karukutti', 9),
(29, 'Aluva East', 9),
(30, 'Ayyampuzha', 9),
(31, 'Nedumbasseri', 9),
(32, 'Kanjoor', 9),
(33, 'Muvattupuzha', 9),
(34, 'Koothattukulam', 9),
(35, 'Memury', 9),
(36, 'Kalloorkkad', 9),
(37, 'Avoly', 9),
(38, 'Arakuzha', 9),
(39, 'Alakode', 6),
(40, 'Anjarakkandy', 6),
(41, 'Anthoor', 6),
(42, 'Azhikode', 6),
(43, ' Azhikkal', 6),
(44, 'Chakkarakkal', 6),
(45, 'Cheleri ', 6),
(46, 'Cherukunnu', 6),
(47, 'Narath', 6),
(48, 'Adimali', 5),
(49, 'Cheruthoni', 5),
(50, ' Kattappana', 5),
(51, 'Kumily', 5),
(52, 'Marayur', 5),
(53, 'Munnar', 5),
(54, ' Muthalakodam', 5),
(55, 'Nedumkandam', 5),
(56, 'Peermade', 5),
(57, ' Thopramkudy', 5),
(58, 'Vandiperiyar', 5),
(59, 'Kalpetta', 4),
(60, 'Kayakkunn', 4),
(61, 'Mananthavady', 4),
(62, ' Padinharethara', 4),
(63, 'Sultan Bathery', 4),
(64, 'Achickal', 13),
(65, 'Amalagiri', 13),
(66, 'Kanakkary', 13),
(67, ' Paika', 13),
(68, 'Bharananganam', 13),
(69, ' Panachikkad', 13),
(70, 'Lakkattoor', 13),
(71, 'Choondacherry', 13),
(72, 'Malloossery', 13),
(73, 'Melukavu', 13),
(74, 'Aakkulam', 16),
(75, 'Adimalathura', 16),
(76, ' Bonacaud', 16),
(77, 'Manamboor', 16),
(78, 'Ottoor', 16),
(79, 'Pazhavangadi', 16),
(80, 'Padmanabhapuram', 16),
(81, 'Shanghumukham', 16),
(82, 'Puthenmalika', 16),
(83, 'Kadinamkulam', 16),
(84, 'Mannarasala', 17),
(85, 'Alleppey', 17),
(86, 'Ambalapuzha ', 17),
(87, 'Marari ', 17),
(88, 'Haripad', 17),
(89, 'Kokkamangalam', 17),
(90, 'Mavelikkara', 17),
(91, ' Thumpoly', 17),
(92, 'Chettikulangara', 17),
(93, 'Padanilam', 17),
(94, 'Bekal', 18),
(95, 'Ranipuram', 18),
(96, 'Ananthapura', 18),
(97, ' Nileshwar', 18),
(98, 'Hosabettu ', 18),
(99, 'Shiriya', 18),
(100, 'Madhur', 18),
(101, 'Uppala', 18),
(102, 'Chengala', 18),
(103, ' Punalur', 19),
(104, 'Palaruvi ', 19),
(105, 'Karunagappally', 19),
(106, ' Thenmala', 19),
(107, ' Thirumullavaram', 19),
(108, 'Shendurney', 19),
(109, ' Thodiyoor', 19),
(110, 'Meenad', 19),
(111, 'Valakom', 19),
(112, 'Beypore', 20),
(113, 'Thiruvambadi', 20),
(114, ' Vatakara', 20),
(115, 'Cheruvannur', 20),
(116, 'Feroke', 20),
(117, ' Mavoor', 20),
(118, 'Elathur', 20),
(119, ' Kannancheri', 20),
(120, 'Kinassery', 20),
(121, ' Nilambur', 21),
(122, 'Manjeri', 21),
(123, ' Perinthalmanna', 21),
(124, ' Tirur', 21),
(125, 'Karippur', 21),
(126, 'Kondotty', 21),
(127, 'Triprangode', 21),
(128, ' Ponnani', 21),
(129, 'Kovilakams', 21),
(130, 'Athavanad', 21),
(131, 'Ottapalam', 22),
(132, 'Mangalam', 22),
(133, 'Malampuzha ', 22),
(134, 'Mannarkkad', 22),
(135, 'Thathamangalam', 22),
(136, 'Kanjirapuzha', 22),
(137, 'Thiruvalathur', 22),
(138, 'Meenvallam', 22),
(139, 'Adoor', 23),
(140, ' Kadapra', 23),
(141, 'Pullad', 23),
(142, ' Ranni', 23),
(143, ' Thiruvalla', 23),
(144, ' Vennikulam', 23),
(145, 'Parumala', 23),
(146, ' Mallapally', 23),
(147, 'Athirappilly', 24),
(148, 'Vadakkunnathan', 24),
(149, 'Kauthukapark.', 24),
(150, 'Snehatheeram', 24),
(151, 'Koodalmanikyam', 24),
(152, 'Annakara', 24),
(153, 'Chavakkad', 24),
(154, 'KODUNGALOOR', 24),
(155, 'THALAPPALLY', 24),
(156, 'KUNNAMKULAM', 24);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE IF NOT EXISTS `tbl_login` (
  `log_id` int NOT NULL AUTO_INCREMENT,
  `log_name` varchar(30) NOT NULL,
  `log_password` varchar(30) NOT NULL,
  `log_role` varchar(30) NOT NULL,
  `log_status` varchar(30) NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`log_id`, `log_name`, `log_password`, `log_role`, `log_status`) VALUES
(1, 'admin', 'admin', 'admin', 'Active'),
(71, 'hi', 'hi123', 'Customer', 'Notconfirmed'),
(69, 'aldrin', 'aldrin23', 'Customer', 'Notconfirmed'),
(70, 'aadhi', 'aadhi7', 'Customer', 'Notconfirmed'),
(68, 'alen', 'alen24', 'Customer', 'Notconfirmed'),
(72, 'james', 'james123', 'Customer', 'Notconfirmed'),
(73, 'kelvin', 'kelvin123', 'Customer', 'Notconfirmed'),
(74, 'benny', 'benny123', 'Customer', 'Notconfirmed'),
(75, 'joel', 'joel123', 'Customer', 'Notconfirmed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_model`
--

DROP TABLE IF EXISTS `tbl_model`;
CREATE TABLE IF NOT EXISTS `tbl_model` (
  `model_id` int NOT NULL AUTO_INCREMENT,
  `model_name` varchar(30) NOT NULL,
  `comp_id` int NOT NULL,
  PRIMARY KEY (`model_id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_model`
--

INSERT INTO `tbl_model` (`model_id`, `model_name`, `comp_id`) VALUES
(13, 'BMW-Q3', 14),
(11, 'kia Seltos', 12),
(14, 'BMW-T Series', 14),
(9, ' Ford EcoSport', 11),
(16, 'qqqqq', 16),
(17, 'Kavana', 17),
(18, 'sassdd', 18),
(19, 'asasasasa', 19),
(20, 'Mercedes Benz R3', 20),
(21, 'challenger', 21),
(22, 'HAI', 22),
(23, 'BMW iX1', 14),
(24, 'Mercedes-Benz GLA', 20),
(25, 'Mercedes-Benz S-Class', 20),
(26, 'Mercedes-Benz E-Class', 20),
(27, 'Mercedes-Benz GLS', 20),
(28, 'Mercedes-Benz EQS', 20),
(29, ' Mercedes-Benz GLE', 20),
(30, 'Hyundai Grand i10 Nios', 25),
(31, 'Hyundai Exter', 25),
(32, 'Hyundai Creta', 25),
(33, 'Hyundai Verna', 25),
(34, 'Volkswagen Virtus', 24),
(35, 'Volkswagen Taigun', 24),
(36, 'Volkswagen Tiguan', 24),
(37, 'Volkswagen ID.4', 24),
(38, 'BMW i7', 14),
(39, 'BMW 5 SERIES SEDAN', 14),
(40, 'Tata Tiago', 13),
(41, 'Tata Nexon', 13),
(42, 'Tata Tigor', 13),
(43, 'Tata Altroz', 13),
(44, ' Tata Harrier', 13),
(45, 'Maruti Suzuki Ertiga', 10),
(46, 'Maruti Suzuki Wagon R', 10),
(47, 'Maruti Suzuki Swift', 10),
(48, ' Maruti Suzuki Swift', 10),
(49, ' Maruti Alto', 10),
(50, 'Kia Sonet', 12),
(51, 'Kia EV6', 12),
(52, ' Ford Mustang', 11),
(53, ' Ford Fiesta', 11),
(54, ' Ford Focus', 11),
(55, ' Journey', 21),
(56, 'Durango', 21),
(57, 'Charger', 21),
(58, 'Renault Kwid', 23),
(59, 'Renault Triber', 23),
(60, 'Renault Kiger', 23),
(61, 'Meridian', 26),
(62, 'compass', 26),
(63, 'Nissan Magnite', 28),
(64, 'Nissan Qashqai', 28),
(65, 'Nissan X-Trail', 28),
(66, 'Porsche Cayenne', 30),
(67, 'Porsche Macan.', 30),
(68, 'Porsche Panamera', 30),
(69, 'Lamborghini Huracan Evo', 31),
(70, 'Lamborghini Urus Performante', 31),
(71, 'Jaguar F-Type', 38),
(72, 'Jaguar I-Pace', 38),
(73, 'MINI Countryman ', 40),
(74, 'MINI SE ', 40),
(75, 'Land Rover Range Rover', 42),
(76, 'Land Rover Defender', 42);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

DROP TABLE IF EXISTS `tbl_payment`;
CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `pay_id` int NOT NULL AUTO_INCREMENT,
  `req_id` int NOT NULL,
  `pay_date` date NOT NULL,
  `pay_amount` float NOT NULL,
  `pay_status` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fromaccount` float NOT NULL,
  `toaccount` int NOT NULL,
  `role` varchar(30) NOT NULL,
  `cust_id` int NOT NULL,
  `vehicle_id` int NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`pay_id`, `req_id`, `pay_date`, `pay_amount`, `pay_status`, `fromaccount`, `toaccount`, `role`, `cust_id`, `vehicle_id`) VALUES
(20, 37, '2024-05-14', 78787, 'payment done', 12121200, 78787878, 'done', 69, 29),
(24, 44, '2023-08-14', 78487, 'payment done', 12345700, 87456123, 'done', 71, 32),
(22, 43, '2023-01-14', 22222, 'payment done', 36363600, 23232323, 'done', 68, 33),
(26, 52, '2023-11-03', 8500000, 'payment done', 12345700000, 2147483647, 'done', 72, 40),
(27, 53, '2024-01-11', 300003, 'payment done', 123457000, 123456789, 'done', 68, 41);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_req`
--

DROP TABLE IF EXISTS `tbl_req`;
CREATE TABLE IF NOT EXISTS `tbl_req` (
  `req_id` int NOT NULL AUTO_INCREMENT,
  `cust_id` int NOT NULL,
  `req_date` date NOT NULL,
  `des` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `remark` text NOT NULL,
  `test_date` date NOT NULL,
  `status` text NOT NULL,
  `vehicle_id` int NOT NULL,
  PRIMARY KEY (`req_id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_req`
--

INSERT INTO `tbl_req` (`req_id`, `cust_id`, `req_date`, `des`, `remark`, `test_date`, `status`, `vehicle_id`) VALUES
(39, 69, '2023-10-14', 'liked your car intersed to by ', '', '0000-00-00', 'Rejected', 28),
(33, 69, '2023-10-03', 'nice car can by it', '', '0000-00-00', 'requested', 27),
(35, 68, '2023-10-03', 'nice to meet you', '', '0000-00-00', 'requested', 27),
(36, 68, '2023-10-03', 'liked this car can i get an test drive for the car ,i would like to buy', '', '0000-00-00', 'Rejected', 28),
(37, 69, '2023-10-03', 'liked this car can i get an test drive for the car ,i would like to buy', 'come to my locaton thodupuzha idukki we will make a test drive', '2023-10-12', 'booking completed', 29),
(40, 69, '2023-10-14', 'liked your car can buy can i buy it', '', '0000-00-00', 'Rejected', 28),
(42, 69, '2023-10-14', 'liked this car can i get an test drive for the car ,i would like to buy', 'come to your location we will make a text drive my location', '2023-10-27', 'booking completed', 32),
(43, 68, '2023-10-14', 'liked this car can i get an test drive for the car ,i would like to buy', 'come to your location we will make a text drive my location', '2023-10-21', 'booking completed', 33),
(44, 71, '2023-10-15', 'liked this car can i get an test drive for the car ,i would like to buy', 'come to this location we make test drive', '2023-10-20', 'accepted', 32),
(45, 70, '2023-10-15', 'liked this car can i get an test drive for the car ,i would like to buy', '', '0000-00-00', 'Rejected', 32),
(48, 68, '2023-10-20', 'liked this car can i get an test drive for the car ,i would like to buy', 'come to your location we will make a text drive my location', '2023-10-21', 'accepted', 34),
(52, 72, '2023-11-03', 'liked this car can i get an test drive for the car ,i would like to buy', 'come to your location we will make a text drive my location', '2023-11-18', 'booking completed', 40),
(53, 68, '2024-01-10', 'liked this car can i get an test drive for the car ,i would like to buy', 'come to your location we will make a text drive my location', '2024-01-13', 'booking completed', 41),
(54, 69, '2024-01-11', 'can i get a test drive in your location can i can come', 'come to this location thodupuzha idukki we will make a test drive ', '2024-01-13', 'accepted', 27);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle`
--

DROP TABLE IF EXISTS `tbl_vehicle`;
CREATE TABLE IF NOT EXISTS `tbl_vehicle` (
  `vehicle_id` int NOT NULL AUTO_INCREMENT,
  `cust_id` int NOT NULL,
  `fuel_id` int NOT NULL,
  `comp_id` int NOT NULL,
  `model_id` int NOT NULL,
  `cur_km` int NOT NULL,
  `owner_status` text NOT NULL,
  `img1` text NOT NULL,
  `img2` text NOT NULL,
  `img3` text NOT NULL,
  `desp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `post_date` date NOT NULL,
  `rate` float NOT NULL,
  `man_date` date NOT NULL,
  `bod_id` int NOT NULL,
  `dis_id` int NOT NULL,
  `loc_id` int NOT NULL,
  `ve_name` varchar(40) NOT NULL,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_vehicle`
--

INSERT INTO `tbl_vehicle` (`vehicle_id`, `cust_id`, `fuel_id`, `comp_id`, `model_id`, `cur_km`, `owner_status`, `img1`, `img2`, `img3`, `desp`, `post_date`, `rate`, `man_date`, `bod_id`, `dis_id`, `loc_id`, `ve_name`) VALUES
(35, 69, 13, 14, 14, 4547, 'best vehicle in the history', '10.webp', '20.webp', '30.webp', 'Nice one..........................', '2023-10-13', 1, '2023-10-10', 3, 9, 11, 'Honda city'),
(33, 69, 3, 21, 21, 1212, 'sold out', 'q.webp', 'w.webp', 'image (3).webp', 'hi.....................', '2023-10-29', 22222, '2023-10-28', 4, 13, 14, 'Maruti Suzuki Ignis'),
(34, 69, 1, 14, 14, 878887, 'the best car ever........................', 'a.webp', 'b.webp', 'c.webp', 'come..............................', '2023-10-17', 5656, '2023-10-03', 3, 6, 6, '  Bmw X3'),
(32, 68, 13, 11, 9, 121212, 'sold out', 'image (1).webp', 'image (2).webp', 'image.webp', 'the vehicle is good for your choice', '2023-10-02', 78487, '2023-10-25', 1, 4, 5, 'Honda'),
(29, 68, 13, 11, 9, 545454, 'sold out', '2020.jpg', '2020.jpg', '2020.jpg', 'car booking', '2023-10-12', 11111100, '2009-01-11', 2, 5, 10, 'dodge'),
(28, 69, 13, 14, 13, 87878, 'hello', '2022.jpg', '', '2022.jpg', 'hello', '2023-10-19', 787878, '2023-10-12', 1, 5, 9, 'BMW EWQ'),
(27, 70, 13, 21, 21, 7878, 'nice car', '2021.jpg', '2021.jpg', '2021.jpg', 'hello', '2023-10-11', 78878800, '2023-10-21', 2, 6, 6, 'dodge s'),
(36, 69, 13, 14, 23, 5600, 'hello', 'a.webp', 'b.webp', 'c.webp', 'hello....', '2023-10-21', 40000000, '2023-10-05', 3, 5, 9, 'Honda'),
(40, 73, 1, 14, 39, 454545, 'sold out', 'k1.webp', 'k2.webp', 'k3.webp', 'ADDITIONAL VEHICLE INFORMATION:\r\nABS: Yes\r\nAccidental: No\r\nAdjustable External Mirror: Power\r\nAdjustable Steering: Yes\r\nAir Conditioning: Automatic Climate Control\r\nAlloy Wheels: Yes\r\nAux Compatibility: Yes\r\nBluetooth: Yes\r\nColor: Brown\r\nParking Sensors: Yes\r\nPower steering: Yes\r\nPower Windows: Front & rear\r\nAM/FM Radio: Yes\r\nRegistration Place: DL\r\nSunroof: Yes\r\nUSB Compatibility: Yes', '2023-11-03', 8500000, '2023-11-08', 2, 16, 78, 'Bmw 5 Series'),
(41, 75, 1, 10, 45, 56000, 'sold out', 'vb1.avif', 'vb2.avif', 'vb3.avif', 'Make year\r\nMay 2014\r\nRegistration year\r\nAug 2014\r\nFuel type\r\nPetrol\r\nKm driven\r\n72K km\r\nTransmission\r\nManual (Regular)\r\nNo. of Owner\r\n1st Owner\r\nInsurance validity\r\nSep 2024\r\nInsurance type\r\nComprehensive\r\nRTO\r\nKL44', '2024-01-10', 300003, '2023-01-11', 2, 24, 153, 'Maruti Suzuki Ritz VXI');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
