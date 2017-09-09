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

-- Dumping structure for table db_binalbagancommercial.tbl_barcode
CREATE TABLE IF NOT EXISTS `tbl_barcode` (
  `bar_id` int(255) NOT NULL AUTO_INCREMENT,
  `bar_code` longtext NOT NULL,
  `bar_status` int(1) NOT NULL DEFAULT '1',
  `prd_id` int(255) NOT NULL,
  PRIMARY KEY (`bar_id`),
  KEY `prd_id` (`prd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_barcode: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_barcode` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_barcode` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_cart
CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `cart_id` int(255) NOT NULL AUTO_INCREMENT,
  `emp_id` int(255) DEFAULT '0',
  `cart_datestamp` date NOT NULL DEFAULT '0000-00-00',
  `cart_timestamp` time NOT NULL DEFAULT '00:00:00',
  `prd_id` int(225) DEFAULT '0',
  `cart_prd_qty` int(225) DEFAULT '0',
  `cart_status` int(1) DEFAULT '1',
  PRIMARY KEY (`cart_id`),
  KEY `user_id` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_cart: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_cart` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=10000042 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_category: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_desc`, `cat_status`, `cat_datestamp`, `cat_timestamp`) VALUES
	(10000037, 'Wood Products', 'All Items that are made of Wood.', 1, '2017-08-13', '01:54:20'),
	(10000038, 'Cement', 'All Cement Based Products', 1, '2017-08-15', '17:19:49'),
	(10000039, 'Aniversary Promo', 'For 2016-12-01 only ', 1, '2017-08-16', '18:20:56'),
	(10000040, 'Motorcycle Parts', 'limited Motorcycle parts', 1, '2017-08-16', '18:21:50'),
	(10000041, 'Electronic Parts', 'Large and Small Electronic Parts', 1, '2017-08-19', '15:25:55');
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_customer
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `cust_id` int(255) NOT NULL AUTO_INCREMENT,
  `cust_username` text NOT NULL,
  `cust_password` text NOT NULL,
  `cust_firstname` text NOT NULL,
  `cust_lastname` text NOT NULL,
  `cust_address` text NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_customer: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_customer` ENABLE KEYS */;

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

-- Dumping data for table db_binalbagancommercial.tbl_employee: ~4 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=60000002 DEFAULT CHARSET=latin1 COMMENT='order_type\r\n-----------------------------------\r\n0 -> PICK - UP \r\n1 -> DELIVERY\r\n\r\norder_status\r\n-----------------------------------\r\n0 -> PENDING\r\n1 -> APPROVED\r\n2 -> DECLINED\r\n100 -> COMPLETED\r\n\r\n';

-- Dumping data for table db_binalbagancommercial.tbl_order: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_order` DISABLE KEYS */;
INSERT INTO `tbl_order` (`order_id`, `order_datestamp`, `order_timestamp`, `cust_id`, `order_status`, `order_type`, `receive_datestamp`) VALUES
	(60000000, '2017-08-19', '16:07:44', 1001, 0, 0, '2017-08-31'),
	(60000001, '2017-08-19', '17:54:50', 1002, 100, 0, '2017-08-30');
/*!40000 ALTER TABLE `tbl_order` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_order_list
CREATE TABLE IF NOT EXISTS `tbl_order_list` (
  `order_list_id` int(255) NOT NULL AUTO_INCREMENT,
  `prd_id` int(255) DEFAULT NULL,
  `prd_qty` int(255) NOT NULL DEFAULT '0',
  `order_id` int(255) DEFAULT NULL,
  PRIMARY KEY (`order_list_id`),
  KEY `prd_id` (`prd_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70000003 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_order_list: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_order_list` DISABLE KEYS */;
INSERT INTO `tbl_order_list` (`order_list_id`, `prd_id`, `prd_qty`, `order_id`) VALUES
	(70000000, 20000068, 5, 60000000),
	(70000001, 20000068, 2, 60000001),
	(70000002, 20000069, 3, 60000000);
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
) ENGINE=InnoDB AUTO_INCREMENT=20000078 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_product: ~10 rows (approximately)
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` (`prd_id`, `prd_name`, `prd_desc`, `prd_price`, `prd_datestamp`, `prd_timestamp`, `prd_status`, `prd_level`, `prd_optimal`, `prd_warning`, `prd_image`, `cat_id`) VALUES
	(20000068, 'Marine Plywood', 'Wood Made From Marine Oak', 50.69, '2017-08-13', '15:51:48', 1, 184, 50, 10, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fno-image.png3232?alt=media&token=8b00ba10-cf65-4126-bc74-9662cd5db9ca', 10000037),
	(20000069, 'Oak Wood Bundle 5/pcs', 'It is a Bundle', 500.00, '2017-08-14', '14:35:31', 1, 171, 100, 50, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fno-image.png3232?alt=media&token=8b00ba10-cf65-4126-bc74-9662cd5db9ca', 10000037),
	(20000070, '1kg Davis Quick Dry Cement', 'Cement 1kg Quick Dry', 500.00, '2017-08-15', '17:21:16', 1, 192, 100, 50, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fno-image.png3232?alt=media&token=8b00ba10-cf65-4126-bc74-9662cd5db9ca', 10000038),
	(20000071, '4x4 Hardwood Plank Bundle 1', 'Bundle 1 - 5pcs 4x3 Hardwood Plank', 78.00, '2017-08-16', '18:13:43', 1, 201, 100, 20, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fno-image.png3232?alt=media&token=8b00ba10-cf65-4126-bc74-9662cd5db9ca', 10000037),
	(20000072, '4x4 Hardwood Plank Bundle 2', 'Bundle - 2 Hardwood Plank with 10pcs Hardwood 30pcs Hardwood BCD quality', 200.00, '2017-08-16', '18:15:00', 1, 204, 20, 10, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fno-image.png3232?alt=media&token=8b00ba10-cf65-4126-bc74-9662cd5db9ca', 10000037),
	(20000073, '4x4 Hardwood Plank Bundle 3', '10 pcs Hardwood Bundle with 5pcs Hardwood Bundle Low Quality Cuts', 50.00, '2017-08-16', '18:16:20', 1, 54, 20, 10, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fno-image.png3232?alt=media&token=8b00ba10-cf65-4126-bc74-9662cd5db9ca', 10000037),
	(20000074, 'Oak Wood 10x20 ', '1 pc Oak wood Bundle', 20.00, '2017-08-16', '18:17:31', 1, 41, 20, 5, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fno-image.png3232?alt=media&token=8b00ba10-cf65-4126-bc74-9662cd5db9ca', 10000037),
	(20000075, 'Oak Wood 10x10', '1 pc Oak Wood 10x10', 60.00, '2017-08-16', '18:18:07', 1, 45, 20, 10, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fno-image.png3232?alt=media&token=8b00ba10-cf65-4126-bc74-9662cd5db9ca', 10000037),
	(20000076, 'Oak Wood 5x5', '1pc 5x5 Oak wood ', 30.00, '2017-08-16', '18:18:49', 1, 136, 50, 10, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fno-image.png3232?alt=media&token=8b00ba10-cf65-4126-bc74-9662cd5db9ca', 10000037),
	(20000077, 'Iron Brush', 'Steel Brush', 30.45, '2017-08-19', '15:16:54', 1, 41, 12, 10, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fno-image.png3232?alt=media&token=8b00ba10-cf65-4126-bc74-9662cd5db9ca', 10000039);
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
) ENGINE=InnoDB AUTO_INCREMENT=90000039 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_product_log: ~21 rows (approximately)
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
	(90000038, 20000070, 1, '2017-09-09', '20:08:31', 80000003, 1, 40000053);
/*!40000 ALTER TABLE `tbl_product_log` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_sales
CREATE TABLE IF NOT EXISTS `tbl_sales` (
  `sales_id` int(255) NOT NULL AUTO_INCREMENT,
  `sales_datestamp` date NOT NULL DEFAULT '0000-00-00',
  `sales_timestamp` time NOT NULL DEFAULT '00:00:00',
  `emp_id` int(255) DEFAULT '0',
  `receive_datetimestamp` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sales_type` int(1) DEFAULT '0',
  `order_id` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sales_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40000054 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_sales: ~25 rows (approximately)
/*!40000 ALTER TABLE `tbl_sales` DISABLE KEYS */;
INSERT INTO `tbl_sales` (`sales_id`, `sales_datestamp`, `sales_timestamp`, `emp_id`, `receive_datetimestamp`, `sales_type`, `order_id`) VALUES
	(40000029, '2017-08-29', '15:54:55', 80000002, '2017-08-29 15:54:55', 0, 0),
	(40000030, '2017-08-29', '15:56:13', 80000002, '2017-08-29 15:56:13', 0, 0),
	(40000031, '2017-08-29', '15:56:41', 80000002, '2017-08-29 15:56:41', 0, 0),
	(40000032, '2017-08-29', '15:57:07', 80000002, '2017-08-29 15:57:07', 0, 0),
	(40000033, '2017-08-29', '15:57:53', 80000002, '2017-08-29 15:57:53', 0, 0),
	(40000034, '2017-08-29', '16:32:34', 80000002, '2017-08-29 16:32:34', 0, 0),
	(40000035, '2017-08-29', '17:09:40', 80000002, '2017-08-29 17:09:40', 0, 60000000),
	(40000036, '2017-08-30', '13:04:32', 80000002, '2017-08-30 13:04:32', 0, 0),
	(40000037, '2017-08-30', '13:38:55', 80000002, '2017-08-30 13:38:55', 0, 0),
	(40000038, '2017-08-30', '13:45:40', 80000002, '2017-08-30 13:45:40', 0, 0),
	(40000039, '2017-08-30', '13:46:39', 80000002, '2017-08-30 13:46:39', 0, 0),
	(40000040, '2017-09-03', '16:06:26', 80000003, '2017-09-03 16:06:26', 0, 0),
	(40000041, '2017-09-03', '20:40:26', 80000003, '2017-09-03 20:40:26', 0, 0),
	(40000042, '2017-09-03', '20:56:49', 80000003, '2017-09-03 20:56:49', 0, 0),
	(40000043, '2017-09-03', '21:12:13', 80000003, '2017-09-03 21:12:13', 0, 0),
	(40000044, '2017-09-03', '21:12:45', 80000003, '2017-09-03 21:12:45', 0, 0),
	(40000045, '2017-09-04', '10:53:40', 80000003, '2017-09-04 10:53:40', 0, 0),
	(40000046, '2017-09-04', '10:54:29', 80000003, '2017-09-04 10:54:29', 0, 0),
	(40000047, '2017-09-04', '15:30:06', 80000003, '2017-09-04 15:30:06', 0, 0),
	(40000048, '2017-09-04', '20:57:25', 80000003, '2017-09-04 20:57:25', 0, 0),
	(40000049, '2017-09-06', '15:45:35', 80000003, '2017-09-06 15:45:35', 0, 0),
	(40000050, '2017-09-06', '16:36:05', 80000002, '2017-09-06 16:36:05', 0, 0),
	(40000051, '2017-09-08', '18:19:35', 80000003, '2017-09-08 18:19:35', 0, 0),
	(40000052, '2017-09-08', '23:13:48', 80000003, '2017-09-08 23:13:48', 0, 0),
	(40000053, '2017-09-09', '20:08:31', 80000003, '2017-09-09 20:08:31', 0, 0);
/*!40000 ALTER TABLE `tbl_sales` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_sales_list
CREATE TABLE IF NOT EXISTS `tbl_sales_list` (
  `sales_list_id` int(255) NOT NULL AUTO_INCREMENT,
  `prd_id` int(255) DEFAULT '0',
  `prd_qty` int(255) DEFAULT '0',
  `sales_id` int(255) DEFAULT '0',
  PRIMARY KEY (`sales_list_id`),
  KEY `prd_id` (`prd_id`),
  KEY `sales_id` (`sales_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50000134 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_sales_list: ~25 rows (approximately)
/*!40000 ALTER TABLE `tbl_sales_list` DISABLE KEYS */;
INSERT INTO `tbl_sales_list` (`sales_list_id`, `prd_id`, `prd_qty`, `sales_id`) VALUES
	(50000109, 20000070, 1, 40000031),
	(50000110, 20000070, 1, 40000032),
	(50000111, 20000070, 1, 40000033),
	(50000112, 20000070, 3, 40000034),
	(50000113, 20000070, 2, 40000035),
	(50000114, 20000071, 1, 40000035),
	(50000115, 20000070, 1, 40000036),
	(50000116, 20000070, 1, 40000037),
	(50000117, 20000070, 1, 40000038),
	(50000118, 20000071, 1, 40000039),
	(50000119, 20000070, 3, 40000040),
	(50000120, 20000071, 1, 40000040),
	(50000121, 20000070, 2, 40000041),
	(50000122, 20000073, 1, 40000042),
	(50000123, 20000068, 1, 40000043),
	(50000124, 20000076, 1, 40000044),
	(50000125, 20000070, 2, 40000045),
	(50000126, 20000072, 2, 40000046),
	(50000127, 20000070, 2, 40000047),
	(50000128, 20000070, 5, 40000048),
	(50000129, 20000070, 1, 40000049),
	(50000130, 20000070, 1, 40000050),
	(50000131, 20000070, 1, 40000051),
	(50000132, 20000073, 5, 40000052),
	(50000133, 20000070, 1, 40000053);
/*!40000 ALTER TABLE `tbl_sales_list` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
