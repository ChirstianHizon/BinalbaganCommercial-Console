-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_binalbagancommercial
CREATE DATABASE IF NOT EXISTS `db_binalbagancommercial` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_binalbagancommercial`;

-- Dumping structure for table db_binalbagancommercial.tbl_address
CREATE TABLE IF NOT EXISTS `tbl_address` (
  `add_id` int(11) NOT NULL AUTO_INCREMENT,
  `add_name` text NOT NULL,
  `add_notes` text NOT NULL,
  `add_datestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `add_lat` text NOT NULL,
  `add_lng` text NOT NULL,
  `add_status` int(1) NOT NULL DEFAULT '1',
  `cust_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`add_id`),
  KEY `cust_id` (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=120000003 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_address: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_address` DISABLE KEYS */;
INSERT INTO `tbl_address` (`add_id`, `add_name`, `add_notes`, `add_datestamp`, `add_lat`, `add_lng`, `add_status`, `cust_id`) VALUES
	(120000002, '123 Iron Heights Village Bacolod City', '', '2017-09-17 23:12:35', '', '', 0, 110000011);
/*!40000 ALTER TABLE `tbl_address` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_barcode
CREATE TABLE IF NOT EXISTS `tbl_barcode` (
  `bar_id` int(255) NOT NULL AUTO_INCREMENT,
  `bar_code` longtext NOT NULL,
  `bar_status` int(1) NOT NULL DEFAULT '1',
  `bar_datestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prd_id` int(255) NOT NULL,
  PRIMARY KEY (`bar_id`),
  KEY `prd_id` (`prd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100000031 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_barcode: ~20 rows (approximately)
/*!40000 ALTER TABLE `tbl_barcode` DISABLE KEYS */;
INSERT INTO `tbl_barcode` (`bar_id`, `bar_code`, `bar_status`, `bar_datestamp`, `prd_id`) VALUES
	(100000008, 'oakwoodbarcode123', 1, '2017-09-12 00:36:46', 20000076),
	(100000009, 'asdasdjkansdjka213', 0, '2017-09-12 15:28:19', 20000077),
	(100000010, 'asdasd1111', 0, '2017-09-12 15:28:23', 20000077),
	(100000011, '3qasedrftyhuiko', 0, '2017-09-12 15:28:35', 20000077),
	(100000012, 'ironbrush123', 0, '2017-09-12 16:36:17', 20000077),
	(100000013, '123ironbrush', 1, '2017-09-12 21:23:21', 20000077),
	(100000014, '321ironBrushSample', 1, '2017-09-12 22:45:12', 20000077),
	(100000015, '1421142', 1, '2017-09-14 14:14:16', 20000077),
	(100000016, '1421142', 1, '2017-09-14 15:56:17', 20000090),
	(100000018, 'ITEM321', 1, '2017-09-14 16:25:28', 20000093),
	(100000019, '1421142', 1, '2017-09-14 16:25:43', 20000093),
	(100000020, 'ITEM321', 0, '2017-09-14 16:25:53', 20000093),
	(100000021, 'ITEM111', 0, '2017-09-14 16:26:00', 20000091),
	(100000022, 'ITEM548', 1, '2017-09-14 16:26:05', 20000090),
	(100000023, 'ITEM678', 1, '2017-09-14 16:26:12', 20000087),
	(100000024, 'ITEM678', 1, '2017-09-14 16:26:25', 20000085),
	(100000025, 'ITEM678', 0, '2017-09-14 16:27:37', 20000091),
	(100000026, 'ITEM678', 0, '2017-09-14 16:28:05', 20000091),
	(100000027, 'ITEM678', 0, '2017-09-14 16:28:06', 20000091),
	(100000028, 'ITEM678', 1, '2017-09-14 16:28:09', 20000091),
	(100000029, 'test', 1, '2017-09-17 00:27:54', 20000098),
	(100000030, '\'123', 0, '2017-09-17 00:30:05', 20000097);
/*!40000 ALTER TABLE `tbl_barcode` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_cart
CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `cart_id` int(255) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT '0',
  `cust_id` int(11) DEFAULT '0',
  `cart_datestamp` date NOT NULL DEFAULT '0000-00-00',
  `cart_timestamp` time NOT NULL DEFAULT '00:00:00',
  `prd_id` int(225) DEFAULT '0',
  `cart_prd_qty` int(225) DEFAULT '0',
  `cart_status` int(1) DEFAULT '1',
  PRIMARY KEY (`cart_id`),
  KEY `user_id` (`emp_id`),
  KEY `cust_id` (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_cart: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_cart` DISABLE KEYS */;
INSERT INTO `tbl_cart` (`cart_id`, `emp_id`, `cust_id`, `cart_datestamp`, `cart_timestamp`, `prd_id`, `cart_prd_qty`, `cart_status`) VALUES
	(6, 0, 110000018, '2017-09-17', '23:11:29', 20000068, 1, 1),
	(7, 0, 110000018, '2017-09-17', '23:11:31', 20000077, 1, 1),
	(8, 0, 110000018, '2017-09-17', '23:11:32', 20000083, 1, 1),
	(9, 0, 110000018, '2017-09-17', '23:11:34', 20000085, 1, 1),
	(10, 80000002, 0, '2017-09-22', '02:20:55', 20000077, 1, 1);
/*!40000 ALTER TABLE `tbl_cart` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_category
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` int(255) NOT NULL AUTO_INCREMENT,
  `cat_name` text,
  `cat_desc` text,
  `cat_status` int(1) DEFAULT '1',
  `cat_datestamp` date NOT NULL DEFAULT '0000-00-00',
  `cat_timestamp` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10000050 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_category: ~9 rows (approximately)
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_desc`, `cat_status`, `cat_datestamp`, `cat_timestamp`) VALUES
	(10000037, 'Wood Products', 'All Items that are made of Wood.', 1, '2017-08-13', '01:54:20'),
	(10000038, 'Cement', 'All Cement Based Products', 1, '2017-08-15', '17:19:49'),
	(10000039, 'Aniversary Promo', 'For 2016-12-01 only ', 1, '2017-08-16', '18:20:56'),
	(10000040, 'Motorcycle Parts', 'limited Motorcycle parts', 1, '2017-08-16', '18:21:50'),
	(10000041, 'Electronic Parts', 'Large and Small Electronic Parts', 1, '2017-08-19', '15:25:55'),
	(10000043, 'Steel Products', 'Products which are made of steel', 1, '2017-09-14', '01:03:39'),
	(10000044, 'Sample Product', 'This is a Sample Product', 1, '2017-09-14', '01:08:40'),
	(10000045, 'Utilities', 'Hardware Utilities', 1, '2017-09-14', '15:28:05'),
	(10000046, 'Construction Supplies', 'Construction Materials Supplies ', 1, '2017-09-14', '15:54:44'),
	(10000047, 'Paint', 'Wall Paint', 1, '2017-09-14', '16:18:09'),
	(10000048, 'test', 'asas', 1, '2017-09-14', '22:11:00'),
	(10000049, '\'special', '\'special', 1, '2017-09-17', '00:34:27');
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_customer
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `cust_id` int(255) NOT NULL AUTO_INCREMENT,
  `cust_datestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cust_username` text NOT NULL,
  `cust_password` text NOT NULL,
  `cust_firstname` text NOT NULL,
  `cust_lastname` text NOT NULL,
  `cust_contact` text NOT NULL,
  `cust_image` text NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=110000024 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_customer: ~12 rows (approximately)
/*!40000 ALTER TABLE `tbl_customer` DISABLE KEYS */;
INSERT INTO `tbl_customer` (`cust_id`, `cust_datestamp`, `cust_username`, `cust_password`, `cust_firstname`, `cust_lastname`, `cust_contact`, `cust_image`) VALUES
	(110000001, '2017-09-13 01:51:58', 'customer', 'customer', 'Christian ', 'Hizon', '09984843243', ''),
	(110000010, '2017-09-13 20:48:48', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', '1234567890', ''),
	(110000011, '2017-09-13 22:08:35', 'customer', '91ec1f9324753048c0096d036a694f86', 'Waldo', 'Arnolds', '0123456789', ''),
	(110000015, '2017-09-14 09:29:09', 'mike', 'f6918a82743b05860740314a6220afe3', '\'\'', '\'\'', '123', ''),
	(110000016, '2017-09-14 15:57:12', 'rafael', '9135d8523ad3da99d8a4eb83afac13d1', 'Rafael', 'Dais', '9090', ''),
	(110000017, '2017-09-14 15:58:30', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', '123', ''),
	(110000018, '2017-09-14 16:18:14', 'sample', '5e8ff9bf55ba3508199d22e984129be6', 'sample1', 'sample1', '00000', ''),
	(110000019, '2017-09-14 16:44:46', 'rafael', '9135d8523ad3da99d8a4eb83afac13d1', 'rafael', 'davis', '09178082008', ''),
	(110000020, '2017-09-15 12:39:11', 'phil', 'd14ffd41334ec4b4b3f2c0d55c38be6f', 'Philip', 'Estacion', '0922989999', ''),
	(110000021, '2017-09-15 14:10:02', 'noobslayer123', '827ccb0eea8a706c4c34a16891f84e7b', 'kerwin', 'david', '09959728392', ''),
	(110000022, '2017-09-16 23:55:05', 'mike\'s angel 123', '5329ec9d4e9307bcf82db0722882b247', 'Mike ', 'Santos', '09984843243', ''),
	(110000023, '2017-09-17 00:16:26', 'Andrew,wales', '098f6bcd4621d373cade4e832627b4f6', 'andrew', 'wales', '0123456789', '');
/*!40000 ALTER TABLE `tbl_customer` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_delivery
CREATE TABLE IF NOT EXISTS `tbl_delivery` (
  `del_id` int(255) NOT NULL AUTO_INCREMENT,
  `del_start_datestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `del_end_datestamp` datetime DEFAULT NULL,
  `del_status` int(1) DEFAULT '1',
  `order_id` int(255) DEFAULT '0',
  PRIMARY KEY (`del_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=110000018 DEFAULT CHARSET=latin1 COMMENT='1    -> READY FOR DELIVERY\r\n200 - > COMPLETED\r\n';

-- Dumping data for table db_binalbagancommercial.tbl_delivery: ~7 rows (approximately)
/*!40000 ALTER TABLE `tbl_delivery` DISABLE KEYS */;
INSERT INTO `tbl_delivery` (`del_id`, `del_start_datestamp`, `del_end_datestamp`, `del_status`, `order_id`) VALUES
	(110000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 60000000),
	(110000001, '2017-09-13 02:30:28', '2017-09-13 03:17:09', 200, 60000000),
	(110000002, '2017-09-13 03:17:09', '2017-09-13 06:17:09', 200, 60000002),
	(110000014, '2017-09-22 01:46:20', '2017-09-22 01:49:31', 200, 60000012),
	(110000015, '2017-09-22 02:06:08', NULL, 1, 60000028),
	(110000016, '2017-09-22 02:06:31', '2017-09-22 02:07:06', 200, 60000028),
	(110000017, '2017-09-22 02:14:33', '2017-09-22 02:15:10', 200, 60000010);
/*!40000 ALTER TABLE `tbl_delivery` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_employee
CREATE TABLE IF NOT EXISTS `tbl_employee` (
  `emp_id` int(255) NOT NULL AUTO_INCREMENT,
  `emp_username` text,
  `emp_password` text,
  `emp_first_name` text,
  `emp_last_name` text,
  `emp_type` int(1) NOT NULL DEFAULT '0',
  `emp_image` text,
  `emp_datestamp` date DEFAULT NULL,
  `emp_timestamp` time DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=80000007 DEFAULT CHARSET=latin1 COMMENT='emp_type\r\n\r\n0->admin\r\n1->cashier\r\n2->delivery';

-- Dumping data for table db_binalbagancommercial.tbl_employee: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_employee` DISABLE KEYS */;
INSERT INTO `tbl_employee` (`emp_id`, `emp_username`, `emp_password`, `emp_first_name`, `emp_last_name`, `emp_type`, `emp_image`, `emp_datestamp`, `emp_timestamp`) VALUES
	(80000002, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Juan ', 'Dela Cruz', 0, '', '2017-08-21', '00:41:23'),
	(80000003, 'cashier', '6ac2470ed8ccf204fd5ff89b32a355cf', 'Mike', 'St. Johns', 1, '', '2017-08-22', '00:50:42'),
	(80000005, 'delivery', '7108537956afa2a526f96cc9da7b0c36', 'Arnold', 'Swasinegro', 2, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/employee%2FSketch_logo_frame.svg.pngdelivery?alt=media&token=a4c42110-37e2-497f-bf02-5965efea0cf3', '2017-08-25', '01:13:39'),
	(80000006, 'christian', '21232f297a57a5a743894a0e4a801fc3', 'Christian', 'Hizon', 0, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/employee%2Faasas.jfifchristian?alt=media&token=a4bc57a5-6b2e-4d2a-a648-8b7a51b47ec5', '2017-08-24', '01:15:20');
/*!40000 ALTER TABLE `tbl_employee` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_order
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` int(255) NOT NULL AUTO_INCREMENT,
  `order_datestamp` date NOT NULL DEFAULT '0000-00-00',
  `order_timestamp` time NOT NULL DEFAULT '00:00:00',
  `cust_id` int(255) NOT NULL DEFAULT '0',
  `order_status` int(1) NOT NULL DEFAULT '0',
  `order_type` int(1) NOT NULL DEFAULT '0',
  `receive_datestamp` date NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60000044 DEFAULT CHARSET=latin1 COMMENT='order_type\r\n-----------------------------------\r\n0 -> PICK - UP \r\n1 -> DELIVERY\r\n\r\norder_status\r\n-----------------------------------\r\n0 -> PENDING\r\n1 -> APPROVED\r\n2 -> DECLINED\r\n100 -> COMPLETED\r\n200 -> ON DELIVERY\r\n\r\n';

-- Dumping data for table db_binalbagancommercial.tbl_order: ~37 rows (approximately)
/*!40000 ALTER TABLE `tbl_order` DISABLE KEYS */;
INSERT INTO `tbl_order` (`order_id`, `order_datestamp`, `order_timestamp`, `cust_id`, `order_status`, `order_type`, `receive_datestamp`) VALUES
	(60000000, '2017-08-19', '16:07:44', 110000001, 1, 0, '2017-09-22'),
	(60000001, '2017-08-19', '17:54:50', 110000001, 1, 1, '2017-09-13'),
	(60000002, '2017-08-19', '17:54:50', 110000001, 1, 1, '2017-08-30'),
	(60000004, '2017-09-14', '14:49:33', 110000011, 0, 1, '0000-00-00'),
	(60000005, '2017-09-14', '15:07:47', 110000011, 0, 1, '0000-00-00'),
	(60000006, '2017-09-14', '15:08:37', 110000011, 0, 1, '0000-00-00'),
	(60000007, '2017-09-14', '15:09:20', 110000011, 0, 1, '0000-00-00'),
	(60000008, '2017-09-14', '15:14:54', 110000011, 0, 1, '0000-00-00'),
	(60000009, '2017-09-14', '15:15:36', 110000011, 0, 1, '0000-00-00'),
	(60000010, '2017-09-14', '15:15:36', 110000011, 100, 1, '2017-09-21'),
	(60000011, '2017-09-14', '15:18:17', 110000011, 0, 1, '0000-00-00'),
	(60000012, '2017-09-14', '15:18:17', 110000011, 1, 1, '2017-09-14'),
	(60000013, '2017-09-14', '16:31:08', 110000011, 0, 1, '0000-00-00'),
	(60000014, '2017-09-14', '16:31:08', 110000011, 1, 200, '2017-09-22'),
	(60000015, '2017-09-14', '16:31:11', 110000011, 0, 1, '0000-00-00'),
	(60000016, '2017-09-14', '16:32:48', 110000011, 0, 1, '0000-00-00'),
	(60000017, '2017-09-14', '16:32:48', 110000011, 200, 1, '2017-09-15'),
	(60000018, '2017-09-14', '16:32:52', 110000011, 0, 1, '0000-00-00'),
	(60000019, '2017-09-14', '16:36:16', 110000011, 0, 0, '0000-00-00'),
	(60000020, '2017-09-14', '16:36:16', 110000011, 1, 0, '2017-09-30'),
	(60000021, '2017-09-14', '16:36:17', 110000011, 0, 0, '0000-00-00'),
	(60000022, '2017-09-14', '16:50:21', 110000011, 0, 0, '0000-00-00'),
	(60000023, '2017-09-14', '16:50:21', 110000011, 1, 0, '2017-09-15'),
	(60000024, '2017-09-14', '16:53:52', 110000011, 0, 0, '0000-00-00'),
	(60000025, '2017-09-14', '16:53:52', 110000011, 1, 0, '2017-09-15'),
	(60000026, '2017-09-14', '16:54:33', 110000011, 1, 0, '2017-09-15'),
	(60000027, '2017-09-14', '16:54:43', 110000016, 100, 0, '2017-09-16'),
	(60000028, '2017-09-14', '16:59:50', 110000016, 100, 1, '2017-09-22'),
	(60000029, '2017-09-14', '17:35:08', 110000016, 0, 0, '0000-00-00'),
	(60000030, '2017-09-14', '17:36:56', 110000016, 0, 1, '0000-00-00'),
	(60000031, '2017-09-14', '17:43:56', 110000016, 1, 0, '2017-09-16'),
	(60000032, '2017-09-15', '00:12:54', 110000011, 0, 0, '0000-00-00'),
	(60000033, '2017-09-15', '12:41:49', 110000020, 0, 0, '0000-00-00'),
	(60000034, '2017-09-15', '12:48:29', 110000020, 0, 0, '0000-00-00'),
	(60000035, '2017-09-15', '13:58:51', 110000011, 0, 0, '0000-00-00'),
	(60000036, '2017-09-15', '14:04:44', 110000011, 0, 0, '0000-00-00'),
	(60000037, '2017-09-15', '14:10:47', 110000011, 0, 0, '0000-00-00'),
	(60000038, '2017-09-15', '14:11:36', 110000011, 0, 0, '0000-00-00'),
	(60000039, '2017-09-15', '14:22:29', 110000011, 0, 0, '0000-00-00'),
	(60000040, '2017-09-15', '14:27:38', 110000011, 0, 0, '0000-00-00'),
	(60000041, '2017-09-15', '14:38:17', 110000011, 0, 0, '0000-00-00'),
	(60000042, '2017-09-16', '19:24:48', 110000011, 0, 0, '0000-00-00'),
	(60000043, '2017-09-17', '23:17:48', 110000011, 0, 0, '0000-00-00');
/*!40000 ALTER TABLE `tbl_order` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_order_list
CREATE TABLE IF NOT EXISTS `tbl_order_list` (
  `order_list_id` int(255) NOT NULL AUTO_INCREMENT,
  `prd_id` int(255) DEFAULT NULL,
  `prd_qty` int(255) NOT NULL DEFAULT '0',
  `order_id` int(255) DEFAULT NULL,
  `prd_price` double(255,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`order_list_id`),
  KEY `prd_id` (`prd_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70000051 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_order_list: ~51 rows (approximately)
/*!40000 ALTER TABLE `tbl_order_list` DISABLE KEYS */;
INSERT INTO `tbl_order_list` (`order_list_id`, `prd_id`, `prd_qty`, `order_id`, `prd_price`) VALUES
	(70000000, 20000068, 5, 60000000, 0.00),
	(70000001, 20000068, 2, 60000001, 0.00),
	(70000002, 20000069, 3, 60000000, 0.00),
	(70000003, 20000068, 1, 60000010, 0.00),
	(70000004, 20000068, 1, 60000012, 0.00),
	(70000005, 20000072, 1, 60000012, 0.00),
	(70000006, 20000068, 1, 60000014, 0.00),
	(70000007, 20000077, 1, 60000017, 0.00),
	(70000008, 20000083, 15, 60000020, 0.00),
	(70000009, 20000077, 6, 60000023, 0.00),
	(70000010, 20000068, 1, 60000023, 0.00),
	(70000011, 20000087, 1, 60000023, 0.00),
	(70000012, 20000068, 1, 60000025, 0.00),
	(70000013, 20000068, 1, 60000026, 0.00),
	(70000014, 20000068, 30, 60000027, 0.00),
	(70000015, 20000088, 1, 60000028, 0.00),
	(70000016, 20000083, 20, 60000029, 0.00),
	(70000017, 20000086, 300, 60000030, 0.00),
	(70000018, 20000083, 15, 60000031, 0.00),
	(70000019, 20000086, 200, 60000031, 0.00),
	(70000020, 20000068, 1, 60000032, 0.00),
	(70000021, 20000090, 1, 60000033, 0.00),
	(70000022, 20000092, 1, 60000033, 0.00),
	(70000023, 20000093, 1, 60000033, 0.00),
	(70000024, 20000088, 1, 60000033, 0.00),
	(70000025, 20000088, 2, 60000034, 0.00),
	(70000026, 20000068, 2, 60000035, 0.00),
	(70000027, 20000092, 1, 60000035, 0.00),
	(70000028, 20000094, 1, 60000035, 0.00),
	(70000029, 20000077, 1, 60000035, 0.00),
	(70000030, 20000088, 2, 60000035, 0.00),
	(70000031, 20000093, 2, 60000036, 0.00),
	(70000032, 20000088, 2, 60000036, 0.00),
	(70000033, 20000088, 1, 60000037, 0.00),
	(70000034, 20000097, 1, 60000037, 0.00),
	(70000035, 20000088, 2, 60000038, 0.00),
	(70000036, 20000083, 1, 60000039, 0.00),
	(70000037, 20000088, 2, 60000039, 0.00),
	(70000038, 20000083, 112, 60000040, 0.00),
	(70000039, 20000085, 1, 60000041, 0.00),
	(70000040, 20000083, 1000, 60000041, 0.00),
	(70000041, 20000068, 1, 60000042, 0.00),
	(70000042, 20000083, 1, 60000042, 0.00),
	(70000043, 20000090, 1, 60000042, 0.00),
	(70000044, 20000086, 1, 60000042, 0.00),
	(70000045, 20000091, 1, 60000042, 0.00),
	(70000046, 20000093, 1, 60000042, 0.00),
	(70000047, 20000068, 1, 60000043, 0.00),
	(70000048, 20000077, 1, 60000043, 0.00),
	(70000049, 20000083, 1, 60000043, 0.00),
	(70000050, 20000085, 1, 60000043, 0.00);
/*!40000 ALTER TABLE `tbl_order_list` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_product
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `prd_id` int(255) NOT NULL AUTO_INCREMENT,
  `prd_name` text NOT NULL,
  `prd_desc` longtext NOT NULL,
  `prd_price` float(255,2) NOT NULL DEFAULT '0.00',
  `prd_datestamp` date NOT NULL DEFAULT '0000-00-00',
  `prd_timestamp` time NOT NULL DEFAULT '00:00:00',
  `prd_status` int(1) NOT NULL DEFAULT '1',
  `prd_level` bigint(255) NOT NULL DEFAULT '0',
  `prd_optimal` bigint(255) NOT NULL DEFAULT '0',
  `prd_warning` bigint(255) NOT NULL DEFAULT '0',
  `prd_image` longtext NOT NULL,
  `cat_id` int(255) NOT NULL,
  PRIMARY KEY (`prd_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20000099 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_product: ~14 rows (approximately)
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` (`prd_id`, `prd_name`, `prd_desc`, `prd_price`, `prd_datestamp`, `prd_timestamp`, `prd_status`, `prd_level`, `prd_optimal`, `prd_warning`, `prd_image`, `cat_id`) VALUES
	(20000068, 'Marine Plywood 18mm x 1220mm x 2440mm', 'A sheet material manufactured from thin layers or "plies" of wood veneer.', 50.00, '2017-08-13', '15:51:48', 1, 141, 50, 10, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2F18mm-x-1220mm-x-2440mm-far-eastern-marine-plywood-79c.jpgMarine%20Plywood%2018mm%20x%201220mm%20x%202440mm?alt=media&token=b633d4ad-4254-4bfd-b9d2-2f048781819f', 10000037),
	(20000077, 'Iron Brush', 'Steel Brush', 30.00, '2017-08-19', '15:16:54', 1, 30, 12, 10, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fl_oab-14006-no._39_-_4_row_extra_stiff_brazing_brush.pngIron%20Brush?alt=media&token=299487ea-bb9b-4e01-9780-329c14d4f63f', 10000039),
	(20000083, 'Marine Plywood 25mm', 'a type of strong thin wooden board consisting of two or more layers glued and pressed together with the direction of the grain alternating, and usually sold in sheets of four by eight feet.', 250.00, '2017-09-14', '15:02:04', 1, 89, 65, 40, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2F222222.jpgPlywood%2025mm?alt=media&token=ffef30db-5b29-4f11-bf85-999cb7f980b5', 10000037),
	(20000085, 'Marine Plywood 19mm', 'a type of strong thin wooden board consisting of two or more layers glued and pressed together with the direction of the grain alternating, and usually sold in sheets of four by eight feet.', 239.00, '2017-09-14', '15:12:11', 1, 50, 60, 20, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2F19mm-Plywood-Prices.jpg_350x350.jpgPlywood%2019mm?alt=media&token=8a4f4f5d-679b-460c-ab48-4cf270985c8e', 10000037),
	(20000086, 'Nails', 'Steel Nails', 3.00, '2017-09-14', '15:31:40', 1, 733, 300, 150, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2F51xVcWbVroL._SL1008_.jpgNails?alt=media&token=1db2292a-b693-44a4-b28f-50341158837f', 10000043),
	(20000087, 'Led Bulb 2w', 'Led Bulb EBI202DL', 110.00, '2017-09-14', '15:43:01', 1, 9, 111, 0, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Ffirefly-bulb.pngLed%20Bulb%202w?alt=media&token=32fc944f-2e57-4c1d-9f9e-dba23db278e9', 10000041),
	(20000088, 'Scorpion Covert Helmet', 'Motorcycle Protective Helmet', 3000.00, '2017-09-14', '15:46:46', 1, 924, 10, 2, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fscorpion_covert_helmet_matte_black_zoom.jpgScorpion%20Covert%20Helmet?alt=media&token=e6c01a4a-80d6-4295-85a7-7e29f0ce8c90', 10000040),
	(20000090, 'Steel Bar', 'Steel Supportive Bar', 124.00, '2017-09-14', '15:50:41', 1, 21, 50, 30, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fjrcompuesto_1_1427432194.jpgSteel%20Bar?alt=media&token=589a4cd5-b630-48c6-b2fd-546b4c5545f4', 10000043),
	(20000091, 'Triton Paint Black', 'Black Triton Pain', 185.00, '2017-09-14', '16:19:01', 1, 10, 30, 20, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2F100000110942.jpgTriton%20Paint%20Black?alt=media&token=2c293a11-8494-4183-a954-ab504f817933', 10000047),
	(20000092, 'Boysen Paint White', 'White Boysen Paint', 175.00, '2017-09-14', '16:20:45', 1, 0, 55, 20, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fboysen_can_pinpin_copy-1393490639268.jpgBoysen%20Paint%20White?alt=media&token=7e9c6eac-5725-4d50-b091-c31d1644a1d5', 10000047),
	(20000093, 'Rain or Shine Paint White', 'White Rain or Shine Paint', 195.00, '2017-09-14', '16:23:28', 1, 20, 45, 20, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Frain-or-shine-elastomeric-paint.jpgRain%20or%20Shine%20Paint%20White?alt=media&token=970a6576-aa3a-4e0b-94b4-2fc6bfacc921', 10000047),
	(20000094, ' StanleyÂ® Fat Max Retractable Knife', 'Buy One Stanley Knife or Blade Dispenser, Get One Free! ', 69.99, '2017-09-14', '22:47:07', 1, 5, 20, 10, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fcutter.jpg%20Stanley%C2%AE%20Fat%20Max%20Retractable%20Knife?alt=media&token=76f91a57-0217-4115-8752-b7c52e2f49e9', 10000045),
	(20000095, 'Stanley PowerlockÂ® Tape Rule', 'Tape Width: 1 in.\nTape Length: 25 ft.\nCase Material: Metal', 69.99, '2017-09-14', '22:50:53', 1, 30, 10, 5, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fpowerlock.jpgStanley%20Powerlock%C2%AE%20Tape%20Rule?alt=media&token=23f33a4c-54c4-463a-9e79-2357b426c1b1', 10000045),
	(20000097, 'Boysen Paint Red', 'Boysen Paint Red', 200.00, '2017-09-15', '12:32:32', 1, 0, 20, 10, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fboysen.jfifBoysen%20Paint%20Red?alt=media&token=f9b009fc-89ad-43f9-b546-c5cd5315601c', 10000047),
	(20000098, 'Davis\'s Wall Paint 2L', '2 Liters of Original anti Vandalism paint ', 400.00, '2017-09-17', '00:02:13', 1, 0, 10, 5, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fboysen.jfifDavis\'s%20Wall%20Paint%202L?alt=media&token=66adecf8-9b44-424f-9de5-1905c1f02765', 10000047);
/*!40000 ALTER TABLE `tbl_product` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_product_log
CREATE TABLE IF NOT EXISTS `tbl_product_log` (
  `log_id` int(255) NOT NULL AUTO_INCREMENT,
  `prd_id` int(255) DEFAULT '0',
  `log_qty` int(255) DEFAULT NULL,
  `log_datestamp` date NOT NULL,
  `log_timestamp` time NOT NULL,
  `emp_id` int(255) DEFAULT '0',
  `log_type` int(1) DEFAULT '0',
  `sales_id` int(255) DEFAULT NULL,
  PRIMARY KEY (`log_id`),
  KEY `prd_id` (`prd_id`),
  KEY `user_id` (`emp_id`),
  KEY `sales_id` (`sales_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90000066 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_product_log: ~44 rows (approximately)
/*!40000 ALTER TABLE `tbl_product_log` DISABLE KEYS */;
INSERT INTO `tbl_product_log` (`log_id`, `prd_id`, `log_qty`, `log_datestamp`, `log_timestamp`, `emp_id`, `log_type`, `sales_id`) VALUES
	(90000016, 20000077, 1, '2017-08-28', '12:41:28', 80000002, 0, 0),
	(90000018, 20000075, 2, '2017-08-27', '13:06:19', 80000002, 0, 0),
	(90000020, 20000070, 1, '2017-08-26', '13:45:40', 80000002, 1, 40000038),
	(90000021, 20000071, 2, '2017-08-25', '13:46:40', 80000002, 1, 40000039),
	(90000022, 20000077, 1, '2017-08-28', '12:41:28', 80000002, 1, 0),
	(90000023, 20000071, 2, '2017-08-25', '13:46:40', 80000002, 0, 40000039),
	(90000024, 20000070, 3, '2017-09-03', '16:06:26', 80000003, 1, 40000040),
	(90000025, 20000071, 1, '2017-09-03', '16:06:26', 80000003, 1, 40000040),
	(90000026, 20000070, 2, '2017-09-03', '20:40:26', 80000003, 1, 40000041),
	(90000027, 20000073, 1, '2017-09-03', '20:56:49', 80000003, 1, 40000042),
	(90000028, 20000068, 1, '2017-09-03', '21:12:13', 80000003, 1, 40000043),
	(90000029, 20000076, 1, '2017-09-03', '21:12:46', 80000003, 1, 40000044),
	(90000030, 20000070, 2, '2017-09-04', '10:53:40', 80000003, 1, 40000045),
	(90000031, 20000072, 2, '2017-09-04', '10:54:29', 80000003, 1, 40000046),
	(90000032, 20000070, 2, '2017-09-04', '15:30:06', 80000003, 1, 40000047),
	(90000033, 20000070, 5, '2017-09-04', '20:57:25', 80000003, 1, 40000048),
	(90000034, 20000070, 1, '2017-09-06', '15:45:35', 80000003, 1, 40000049),
	(90000035, 20000070, 1, '2017-09-06', '16:36:05', 80000002, 1, 40000050),
	(90000036, 20000070, 1, '2017-09-08', '18:19:36', 80000003, 1, 40000051),
	(90000037, 20000073, 5, '2017-09-08', '23:13:48', 80000003, 1, 40000052),
	(90000038, 20000070, 1, '2017-09-09', '20:08:31', 80000003, 1, 40000053),
	(90000039, 20000072, 2, '2017-09-09', '22:11:50', 80000003, 1, 40000054),
	(90000040, 20000076, 5, '2017-09-12', '00:40:34', 80000003, 1, 40000055),
	(90000041, 20000077, 2, '2017-09-12', '01:30:24', 80000003, 1, 40000056),
	(90000042, 20000069, 10, '2017-09-13', '14:26:04', 80000002, 1, 40000057),
	(90000043, 20000077, 1, '2017-09-14', '14:25:22', 80000002, 1, 40000058),
	(90000044, 20000068, 5, '2017-09-14', '16:40:29', 80000002, 1, 40000059),
	(90000045, 20000068, 1, '2017-09-14', '16:40:38', 80000002, 1, 40000060),
	(90000046, 20000068, 1, '2017-09-14', '16:41:09', 80000002, 1, 40000061),
	(90000047, 20000068, 1, '2017-09-14', '16:41:22', 80000002, 1, 40000062),
	(90000048, 20000083, 15, '2017-09-14', '16:41:48', 80000002, 1, 40000063),
	(90000049, 20000077, 1, '2017-09-14', '16:49:24', 80000002, 1, 40000064),
	(90000050, 20000068, 30, '2017-09-14', '16:55:16', 80000002, 1, 40000065),
	(90000051, 20000077, 6, '2017-09-14', '16:55:36', 80000002, 1, 40000066),
	(90000052, 20000087, 1, '2017-09-14', '16:55:36', 80000002, 1, 40000066),
	(90000053, 20000068, 1, '2017-09-14', '16:55:36', 80000002, 1, 40000066),
	(90000054, 20000068, 1, '2017-09-14', '16:59:44', 80000002, 1, 40000067),
	(90000055, 20000068, 1, '2017-09-14', '16:59:51', 80000002, 1, 40000068),
	(90000056, 20000088, 1, '2017-09-14', '17:00:13', 80000002, 1, 40000069),
	(90000057, 20000088, 900, '2017-09-14', '17:45:14', 80000002, 0, 0),
	(90000058, 20000086, 900, '2017-09-14', '17:45:22', 80000002, 0, 0),
	(90000059, 20000083, 100, '2017-09-14', '17:45:44', 80000002, 0, 0),
	(90000060, 20000083, 15, '2017-09-14', '17:45:52', 80000002, 1, 40000070),
	(90000061, 20000086, 200, '2017-09-14', '17:45:53', 80000002, 1, 40000070),
	(90000062, 20000085, 50, '2017-09-14', '17:47:08', 80000003, 1, 40000071),
	(90000063, 20000077, 1, '2017-09-15', '11:09:53', 80000002, 1, 40000072),
	(90000064, 20000068, 2, '2017-09-15', '11:10:06', 80000002, 1, 40000073),
	(90000065, 20000083, 1, '2017-09-15', '11:10:20', 80000002, 1, 40000074);
/*!40000 ALTER TABLE `tbl_product_log` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_route
CREATE TABLE IF NOT EXISTS `tbl_route` (
  `route_id` int(255) NOT NULL AUTO_INCREMENT,
  `route_lat` varchar(50) NOT NULL DEFAULT '0',
  `route_lng` varchar(50) NOT NULL DEFAULT '0',
  `route_datestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `del_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`route_id`),
  KEY `del_id` (`del_id`)
) ENGINE=InnoDB AUTO_INCREMENT=130000021 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_route: ~16 rows (approximately)
/*!40000 ALTER TABLE `tbl_route` DISABLE KEYS */;
INSERT INTO `tbl_route` (`route_id`, `route_lat`, `route_lng`, `route_datestamp`, `del_id`) VALUES
	(130000003, '10.194262', '122.862165', '2017-09-13 02:35:09', 110000001),
	(130000004, '10.194506', '122.856299', '2017-09-13 03:17:09', 110000001),
	(130000005, '10.194955', '122.858232', '2017-09-13 02:57:09', 110000001),
	(130000006, '10.195583', '122.860611', '2017-09-13 02:49:09', 110000001),
	(130000007, '10.195583', '122.860611', '2017-09-13 03:17:09', 110000002),
	(130000008, '10.194506', '122.856299', '2017-09-13 04:17:09', 110000002),
	(130000009, '10.194955', '122.858232', '2017-09-13 05:17:09', 110000002),
	(130000010, '10.194955', '122.858232', '2017-09-13 06:17:09', 110000002),
	(130000013, '10.7403311', '122.9651218', '2017-09-22 01:19:41', 110000010),
	(130000014, '10.7403311', '122.9651218', '2017-09-22 01:25:37', 110000011),
	(130000015, '10.7403311', '122.9651218', '2017-09-22 01:35:35', 110000012),
	(130000016, '10.7403311', '122.9651218', '2017-09-22 01:41:53', 110000013),
	(130000017, '10.7403311', '122.9651218', '2017-09-22 01:46:22', 110000014),
	(130000018, '10.7403311', '122.9651218', '2017-09-22 01:47:21', 110000014),
	(130000019, '10.7403311', '122.9651218', '2017-09-22 02:06:33', 110000016),
	(130000020, '10.7403311', '122.9651218', '2017-09-22 02:14:35', 110000017);
/*!40000 ALTER TABLE `tbl_route` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_sales
CREATE TABLE IF NOT EXISTS `tbl_sales` (
  `sales_id` int(255) NOT NULL AUTO_INCREMENT,
  `sales_datestamp` date NOT NULL DEFAULT '0000-00-00',
  `sales_timestamp` time NOT NULL DEFAULT '00:00:00',
  `emp_id` int(255) DEFAULT '0',
  `cust_id` int(255) DEFAULT '0',
  `receive_datetimestamp` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sales_type` int(1) DEFAULT '0',
  `order_id` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sales_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40000075 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_sales: ~44 rows (approximately)
/*!40000 ALTER TABLE `tbl_sales` DISABLE KEYS */;
INSERT INTO `tbl_sales` (`sales_id`, `sales_datestamp`, `sales_timestamp`, `emp_id`, `cust_id`, `receive_datetimestamp`, `sales_type`, `order_id`) VALUES
	(40000029, '2017-08-29', '15:54:55', 80000002, 0, '2017-08-29 15:54:55', 0, 0),
	(40000030, '2017-08-29', '15:56:13', 80000002, 0, '2017-08-29 15:56:13', 0, 0),
	(40000031, '2017-08-29', '15:56:41', 80000002, 0, '2017-08-29 15:56:41', 0, 0),
	(40000032, '2017-08-29', '15:57:07', 80000002, 0, '2017-08-29 15:57:07', 0, 0),
	(40000033, '2017-08-29', '15:57:53', 80000002, 0, '2017-08-29 15:57:53', 0, 0),
	(40000034, '2017-08-29', '16:32:34', 80000002, 0, '2017-08-29 16:32:34', 0, 0),
	(40000035, '2017-08-29', '17:09:40', 80000002, 0, '2017-08-29 17:09:40', 0, 60000000),
	(40000036, '2017-08-30', '13:04:32', 80000002, 0, '2017-08-30 13:04:32', 0, 0),
	(40000037, '2017-08-30', '13:38:55', 80000002, 0, '2017-08-30 13:38:55', 0, 0),
	(40000038, '2017-08-30', '13:45:40', 80000002, 0, '2017-08-30 13:45:40', 0, 0),
	(40000039, '2017-08-30', '13:46:39', 80000002, 0, '2017-08-30 13:46:39', 0, 0),
	(40000040, '2017-09-03', '16:06:26', 80000003, 0, '2017-09-03 16:06:26', 0, 0),
	(40000041, '2017-09-03', '20:40:26', 80000003, 0, '2017-09-03 20:40:26', 0, 0),
	(40000042, '2017-09-03', '20:56:49', 80000003, 0, '2017-09-03 20:56:49', 0, 0),
	(40000043, '2017-09-03', '21:12:13', 80000003, 0, '2017-09-03 21:12:13', 0, 0),
	(40000044, '2017-09-03', '21:12:45', 80000003, 0, '2017-09-03 21:12:45', 0, 0),
	(40000045, '2017-09-04', '10:53:40', 80000003, 0, '2017-09-04 10:53:40', 0, 0),
	(40000046, '2017-09-04', '10:54:29', 80000003, 0, '2017-09-04 10:54:29', 0, 0),
	(40000047, '2017-09-04', '15:30:06', 80000003, 0, '2017-09-04 15:30:06', 0, 0),
	(40000048, '2017-09-04', '20:57:25', 80000003, 0, '2017-09-04 20:57:25', 0, 0),
	(40000049, '2017-09-06', '15:45:35', 80000003, 0, '2017-09-06 15:45:35', 0, 0),
	(40000050, '2017-09-06', '16:36:05', 80000002, 0, '2017-09-06 16:36:05', 0, 0),
	(40000051, '2017-09-08', '18:19:35', 80000003, 0, '2017-09-08 18:19:35', 0, 0),
	(40000052, '2017-09-08', '23:13:48', 80000003, 0, '2017-09-08 23:13:48', 0, 0),
	(40000053, '2017-09-09', '20:08:31', 80000003, 0, '2017-09-09 20:08:31', 0, 0),
	(40000054, '2017-09-09', '22:11:50', 80000003, 0, '2017-09-09 22:11:50', 0, 0),
	(40000055, '2017-09-12', '00:40:34', 80000003, 0, '2017-09-12 00:40:34', 0, 0),
	(40000056, '2017-09-12', '01:30:24', 80000003, 0, '2017-09-12 01:30:24', 0, 0),
	(40000057, '2017-09-13', '14:26:04', 80000002, 0, '2017-09-13 14:26:04', 0, 0),
	(40000058, '2017-09-14', '14:25:21', 80000002, 0, '2017-09-14 14:25:21', 0, 0),
	(40000059, '2017-05-14', '16:40:29', 0, 110000001, '0000-00-00 00:00:00', 1, 60000000),
	(40000060, '2017-04-14', '16:40:38', 0, 110000011, '2017-09-22 02:15:10', 1, 60000010),
	(40000061, '2017-05-14', '16:41:08', 0, 110000011, '0000-00-00 00:00:00', 1, 60000012),
	(40000062, '2017-09-14', '16:41:22', 0, 110000011, '0000-00-00 00:00:00', 1, 60000014),
	(40000063, '2017-09-14', '16:41:48', 0, 110000011, '0000-00-00 00:00:00', 1, 60000020),
	(40000064, '2017-06-14', '16:49:24', 0, 110000011, '0000-00-00 00:00:00', 1, 60000017),
	(40000065, '2017-05-14', '16:55:16', 0, 110000016, '0000-00-00 00:00:00', 1, 60000027),
	(40000066, '2017-04-14', '16:55:36', 0, 110000011, '0000-00-00 00:00:00', 1, 60000023),
	(40000067, '2017-07-14', '16:59:44', 0, 110000011, '0000-00-00 00:00:00', 1, 60000025),
	(40000068, '2017-09-14', '16:59:50', 0, 110000011, '0000-00-00 00:00:00', 1, 60000026),
	(40000069, '2017-09-14', '17:00:13', 0, 110000016, '2017-09-22 02:07:06', 1, 60000028),
	(40000070, '2017-08-14', '17:45:52', 0, 110000016, '0000-00-00 00:00:00', 1, 60000031),
	(40000071, '2017-09-14', '17:47:08', 80000003, 0, '2017-09-14 17:47:08', 0, 0),
	(40000072, '2017-09-15', '11:09:53', 80000002, 0, '2017-09-15 11:09:53', 0, 0),
	(40000073, '2017-09-15', '11:10:06', 80000002, 0, '2017-09-15 11:10:06', 0, 0),
	(40000074, '2017-09-15', '11:10:20', 80000002, 0, '2017-09-15 11:10:20', 0, 0);
/*!40000 ALTER TABLE `tbl_sales` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_sales_list
CREATE TABLE IF NOT EXISTS `tbl_sales_list` (
  `sales_list_id` int(255) NOT NULL AUTO_INCREMENT,
  `prd_id` int(255) DEFAULT '0',
  `prd_qty` int(255) DEFAULT '0',
  `sales_id` int(255) DEFAULT '0',
  `prd_price` double(255,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`sales_list_id`),
  KEY `prd_id` (`prd_id`),
  KEY `sales_id` (`sales_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50000158 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_sales_list: ~49 rows (approximately)
/*!40000 ALTER TABLE `tbl_sales_list` DISABLE KEYS */;
INSERT INTO `tbl_sales_list` (`sales_list_id`, `prd_id`, `prd_qty`, `sales_id`, `prd_price`) VALUES
	(50000109, 20000070, 1, 40000031, 0.00),
	(50000110, 20000070, 1, 40000032, 0.00),
	(50000111, 20000070, 1, 40000033, 0.00),
	(50000112, 20000070, 3, 40000034, 0.00),
	(50000113, 20000070, 2, 40000035, 0.00),
	(50000114, 20000071, 1, 40000035, 0.00),
	(50000115, 20000070, 1, 40000036, 0.00),
	(50000116, 20000070, 1, 40000037, 0.00),
	(50000117, 20000070, 1, 40000038, 0.00),
	(50000118, 20000071, 1, 40000039, 0.00),
	(50000119, 20000070, 3, 40000040, 0.00),
	(50000120, 20000071, 1, 40000040, 0.00),
	(50000121, 20000070, 2, 40000041, 0.00),
	(50000122, 20000073, 1, 40000042, 0.00),
	(50000123, 20000068, 1, 40000043, 0.00),
	(50000124, 20000076, 1, 40000044, 0.00),
	(50000125, 20000070, 2, 40000045, 0.00),
	(50000126, 20000072, 2, 40000046, 0.00),
	(50000127, 20000070, 2, 40000047, 0.00),
	(50000128, 20000070, 5, 40000048, 0.00),
	(50000129, 20000070, 1, 40000049, 0.00),
	(50000130, 20000070, 1, 40000050, 0.00),
	(50000131, 20000070, 1, 40000051, 0.00),
	(50000132, 20000073, 5, 40000052, 0.00),
	(50000133, 20000070, 1, 40000053, 0.00),
	(50000134, 20000072, 2, 40000054, 0.00),
	(50000135, 20000076, 5, 40000055, 0.00),
	(50000136, 20000077, 2, 40000056, 0.00),
	(50000137, 20000069, 10, 40000057, 0.00),
	(50000138, 20000077, 1, 40000058, 0.00),
	(50000139, 20000068, 5, 40000059, 0.00),
	(50000140, 20000068, 1, 40000060, 0.00),
	(50000141, 20000068, 1, 40000061, 0.00),
	(50000142, 20000068, 1, 40000062, 0.00),
	(50000143, 20000083, 15, 40000063, 0.00),
	(50000144, 20000077, 1, 40000064, 0.00),
	(50000145, 20000068, 30, 40000065, 0.00),
	(50000146, 20000077, 6, 40000066, 0.00),
	(50000147, 20000087, 1, 40000066, 0.00),
	(50000148, 20000068, 1, 40000066, 0.00),
	(50000149, 20000068, 1, 40000067, 0.00),
	(50000150, 20000068, 1, 40000068, 0.00),
	(50000151, 20000088, 1, 40000069, 0.00),
	(50000152, 20000083, 15, 40000070, 0.00),
	(50000153, 20000086, 200, 40000070, 0.00),
	(50000154, 20000085, 50, 40000071, 0.00),
	(50000155, 20000077, 1, 40000072, 0.00),
	(50000156, 20000068, 2, 40000073, 0.00),
	(50000157, 20000083, 1, 40000074, 0.00);
/*!40000 ALTER TABLE `tbl_sales_list` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
