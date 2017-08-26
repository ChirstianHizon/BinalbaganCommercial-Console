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
  `bar_id` bigint(255) NOT NULL AUTO_INCREMENT,
  `bar_code` longtext NOT NULL,
  `bar_status` int(1) NOT NULL DEFAULT '1',
  `prd_id` bigint(255) NOT NULL,
  PRIMARY KEY (`bar_id`),
  KEY `prd_id` (`prd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_barcode: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_barcode` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_barcode` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_cart
CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `cart_id` bigint(225) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(225) DEFAULT '0',
  `cart_datestamp` date DEFAULT NULL,
  `cart_timestamp` time DEFAULT NULL,
  `prd_id` int(225) DEFAULT '0',
  `cart_prd_qty` int(225) DEFAULT '0',
  `cart_status` int(1) DEFAULT '1',
  PRIMARY KEY (`cart_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30000062 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_cart: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_cart` DISABLE KEYS */;
INSERT INTO `tbl_cart` (`cart_id`, `user_id`, `cart_datestamp`, `cart_timestamp`, `prd_id`, `cart_prd_qty`, `cart_status`) VALUES
	(30000061, 1001, '2017-08-18', '00:07:28', 20000070, 1, 1);
/*!40000 ALTER TABLE `tbl_cart` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_category
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` bigint(255) NOT NULL AUTO_INCREMENT,
  `cat_name` text,
  `cat_desc` text,
  `cat_status` int(1) DEFAULT '1',
  `cat_datestamp` date DEFAULT NULL,
  `cat_timestamp` time DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10000041 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_category: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_desc`, `cat_status`, `cat_datestamp`, `cat_timestamp`) VALUES
	(10000037, 'Wood Products', 'All Items that are made of Wood.', 1, '2017-08-13', '01:54:20'),
	(10000038, 'Cement', 'All Cement Based Products', 1, '2017-08-15', '17:19:49'),
	(10000039, 'Aniversary Promo', 'For 2016-12-01 only ', 1, '2017-08-16', '18:20:56'),
	(10000040, 'Motorcycle Parts', 'limited Motorcycle parts', 1, '2017-08-16', '18:21:50');
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_product
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `prd_id` int(11) NOT NULL AUTO_INCREMENT,
  `prd_name` text NOT NULL,
  `prd_desc` longtext NOT NULL,
  `prd_price` float(255,2) NOT NULL DEFAULT '0.00',
  `prd_datestamp` date NOT NULL,
  `prd_timestamp` time NOT NULL,
  `prd_status` int(1) NOT NULL DEFAULT '1',
  `prd_level` bigint(255) NOT NULL DEFAULT '0',
  `prd_optimal` bigint(255) NOT NULL DEFAULT '0',
  `prd_warning` bigint(255) NOT NULL DEFAULT '0',
  `prd_image` longtext NOT NULL,
  `cat_id` bigint(20) NOT NULL,
  PRIMARY KEY (`prd_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20000077 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_product: ~8 rows (approximately)
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` (`prd_id`, `prd_name`, `prd_desc`, `prd_price`, `prd_datestamp`, `prd_timestamp`, `prd_status`, `prd_level`, `prd_optimal`, `prd_warning`, `prd_image`, `cat_id`) VALUES
	(20000068, 'Marine Plywood', 'Wood Made From Marine Oak', 50.69, '2017-08-13', '15:51:48', 1, 10, 50, 10, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fno-image.png3232?alt=media&token=8b00ba10-cf65-4126-bc74-9662cd5db9ca', 10000037),
	(20000069, 'Oak Wood Bundle 5/pcs', 'It is a Bundle', 500.00, '2017-08-14', '14:35:31', 1, 210, 100, 50, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fno-image.png3232?alt=media&token=8b00ba10-cf65-4126-bc74-9662cd5db9ca', 10000037),
	(20000070, '1kg Davis Quick Dry Cement', 'Cement 1kg Quick Dry', 500.00, '2017-08-15', '17:21:16', 1, 205, 100, 50, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fno-image.png3232?alt=media&token=8b00ba10-cf65-4126-bc74-9662cd5db9ca', 10000038),
	(20000071, '4x4 Hardwood Plank Bundle 1', 'Bundle 1 - 5pcs 4x3 Hardwood Plank', 78.00, '2017-08-16', '18:13:43', 1, 200, 100, 20, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fno-image.png3232?alt=media&token=8b00ba10-cf65-4126-bc74-9662cd5db9ca', 10000037),
	(20000072, '4x4 Hardwood Plank Bundle 2', 'Bundle - 2 Hardwood Plank with 10pcs Hardwood 30pcs Hardwood BCD quality', 200.00, '2017-08-16', '18:15:00', 1, 200, 20, 10, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fno-image.png3232?alt=media&token=8b00ba10-cf65-4126-bc74-9662cd5db9ca', 10000037),
	(20000073, '4x4 Hardwood Plank Bundle3', '10 pcs Hardwood Bundle with 5pcs Hardwood Bundle Low Quality Cuts', 50.00, '2017-08-16', '18:16:20', 1, 60, 20, 10, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fno-image.png3232?alt=media&token=8b00ba10-cf65-4126-bc74-9662cd5db9ca', 10000037),
	(20000074, 'Oak Wood 10x20 ', '1 pc Oak wood Bundle', 20.00, '2017-08-16', '18:17:31', 1, 40, 20, 5, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fno-image.png3232?alt=media&token=8b00ba10-cf65-4126-bc74-9662cd5db9ca', 10000037),
	(20000075, 'Oak Wood 10x10', '1 pc Oak Wood 10x10', 60.00, '2017-08-16', '18:18:07', 1, 40, 20, 10, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fno-image.png3232?alt=media&token=8b00ba10-cf65-4126-bc74-9662cd5db9ca', 10000037),
	(20000076, 'Oak Wood 5x5', '1pc 5x5 Oak wood ', 30.00, '2017-08-16', '18:18:49', 1, 100, 50, 10, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fno-image.png3232?alt=media&token=8b00ba10-cf65-4126-bc74-9662cd5db9ca', 10000037);
/*!40000 ALTER TABLE `tbl_product` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_sales
CREATE TABLE IF NOT EXISTS `tbl_sales` (
  `sales_id` int(255) NOT NULL AUTO_INCREMENT,
  `sales_datestamp` date DEFAULT NULL,
  `sales_timestamp` time DEFAULT NULL,
  `customer_id` int(255) DEFAULT '0',
  `user_id` bigint(255) DEFAULT '0',
  `sales_type` text,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40000058 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_sales: ~9 rows (approximately)
/*!40000 ALTER TABLE `tbl_sales` DISABLE KEYS */;
INSERT INTO `tbl_sales` (`sales_id`, `sales_datestamp`, `sales_timestamp`, `customer_id`, `user_id`, `sales_type`) VALUES
	(40000049, '2017-08-17', '16:23:40', 0, 1001, 'walk-in'),
	(40000050, '2017-08-17', '16:25:22', 0, 1001, 'walk-in'),
	(40000051, '2017-08-17', '16:26:40', 0, 1001, 'walk-in'),
	(40000052, '2017-08-17', '16:28:41', 0, 1001, 'walk-in'),
	(40000053, '2017-08-17', '16:30:47', 0, 1001, 'walk-in'),
	(40000054, '2017-08-17', '16:32:57', 0, 1001, 'walk-in'),
	(40000055, '2017-08-17', '16:34:12', 0, 1001, 'walk-in'),
	(40000056, '2017-08-17', '16:51:03', 0, 1001, 'walk-in'),
	(40000057, '2017-08-17', '22:26:45', 0, 1001, 'walk-in');
/*!40000 ALTER TABLE `tbl_sales` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_sales_list
CREATE TABLE IF NOT EXISTS `tbl_sales_list` (
  `sales_list_id` bigint(255) NOT NULL AUTO_INCREMENT,
  `prd_id` bigint(255) DEFAULT '0',
  `prd_qty` bigint(255) DEFAULT '0',
  `sales_id` bigint(255) DEFAULT '0',
  PRIMARY KEY (`sales_list_id`),
  KEY `prd_id` (`prd_id`),
  KEY `sales_id` (`sales_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50000061 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_sales_list: ~9 rows (approximately)
/*!40000 ALTER TABLE `tbl_sales_list` DISABLE KEYS */;
INSERT INTO `tbl_sales_list` (`sales_list_id`, `prd_id`, `prd_qty`, `sales_id`) VALUES
	(50000052, 20000070, 2, 40000049),
	(50000053, 20000070, 2, 40000050),
	(50000054, 20000070, 3, 40000051),
	(50000055, 20000070, 2, 40000052),
	(50000056, 20000070, 1, 40000053),
	(50000057, 20000070, 1, 40000054),
	(50000058, 20000070, 3, 40000055),
	(50000059, 20000070, 5, 40000056),
	(50000060, 20000070, 5, 40000057);
/*!40000 ALTER TABLE `tbl_sales_list` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
