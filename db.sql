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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_address: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_address` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_barcode: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_barcode` DISABLE KEYS */;
INSERT INTO `tbl_barcode` (`bar_id`, `bar_code`, `bar_status`, `bar_datestamp`, `prd_id`) VALUES
	(1, '8432569751246', 1, '2017-09-28 23:42:26', 2);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_cart: ~1 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_category: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_desc`, `cat_status`, `cat_datestamp`, `cat_timestamp`) VALUES
	(1, 'Paint ', 'Paint Products', 1, '2017-09-28', '23:08:32'),
	(2, 'Wood ', 'All Wood Products must be placed here', 1, '2017-09-29', '13:15:31');
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

-- Dumping data for table db_binalbagancommercial.tbl_customer: ~13 rows (approximately)
/*!40000 ALTER TABLE `tbl_customer` DISABLE KEYS */;
INSERT INTO `tbl_customer` (`cust_id`, `cust_datestamp`, `cust_username`, `cust_password`, `cust_firstname`, `cust_lastname`, `cust_contact`, `cust_image`) VALUES
	(110000001, '2017-09-13 01:51:58', 'chris', 'customer', 'Christian ', 'Hizon', '09984843243', ''),
	(110000010, '2017-09-13 20:48:48', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', '1234567890', ''),
	(110000011, '2017-09-13 22:08:35', 'customer', '91ec1f9324753048c0096d036a694f86', 'Swashinegro', 'Arnold', '094866663323', ''),
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
  `order_id` int(255) NOT NULL DEFAULT '0',
  `add_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`del_id`),
  KEY `order_id` (`order_id`),
  KEY `add_id` (`add_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='1    -> READY FOR DELIVERY\r\n200 - > COMPLETED\r\n';

-- Dumping data for table db_binalbagancommercial.tbl_delivery: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_delivery` DISABLE KEYS */;
INSERT INTO `tbl_delivery` (`del_id`, `del_start_datestamp`, `del_end_datestamp`, `del_status`, `order_id`, `add_id`) VALUES
	(1, '2017-09-29 11:22:15', '2017-09-29 12:27:29', 200, 1, 0);
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

-- Dumping data for table db_binalbagancommercial.tbl_employee: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_employee` DISABLE KEYS */;
INSERT INTO `tbl_employee` (`emp_id`, `emp_username`, `emp_password`, `emp_first_name`, `emp_last_name`, `emp_type`, `emp_image`, `emp_datestamp`, `emp_timestamp`) VALUES
	(80000002, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Juan ', 'Dela Cruz', 0, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/employee%2Faasas.jfifchristian?alt=media&token=a4bc57a5-6b2e-4d2a-a648-8b7a51b47ec5', '2017-08-21', '00:41:23'),
	(80000003, 'cashier', '6ac2470ed8ccf204fd5ff89b32a355cf', 'Mike', 'St. Johns', 1, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/employee%2Faasas.jfifchristian?alt=media&token=a4bc57a5-6b2e-4d2a-a648-8b7a51b47ec5', '2017-08-22', '00:50:42'),
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='order_type\r\n-----------------------------------\r\n0 -> PICK - UP \r\n1 -> DELIVERY\r\n\r\norder_status\r\n-----------------------------------\r\n0 -> PENDING\r\n1 -> APPROVED\r\n2 -> DECLINED\r\n100 -> COMPLETED\r\n200 -> ON DELIVERY\r\n\r\n';

-- Dumping data for table db_binalbagancommercial.tbl_order: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_order` DISABLE KEYS */;
INSERT INTO `tbl_order` (`order_id`, `order_datestamp`, `order_timestamp`, `cust_id`, `order_status`, `order_type`, `receive_datestamp`) VALUES
	(1, '2017-09-29', '11:19:07', 110000011, 100, 1, '2017-09-29'),
	(2, '2017-09-29', '13:37:08', 110000011, 0, 0, '0000-00-00'),
	(3, '2017-09-29', '13:50:08', 110000011, 1, 0, '2017-09-29');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_order_list: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_order_list` DISABLE KEYS */;
INSERT INTO `tbl_order_list` (`order_list_id`, `prd_id`, `prd_qty`, `order_id`, `prd_price`) VALUES
	(1, 1, 20, 1, 300.00),
	(2, 1, 1, 2, 300.00),
	(3, 1, 2, 3, 300.00);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_product: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` (`prd_id`, `prd_name`, `prd_desc`, `prd_price`, `prd_datestamp`, `prd_timestamp`, `prd_status`, `prd_level`, `prd_optimal`, `prd_warning`, `prd_image`, `cat_id`) VALUES
	(1, 'Rain or Shine Elastomeric Paint', 'Rain or Shine Elastomeric Waterproofing paint is a self-priming water-based waterproofing paint for exteriorand interior concrete surfaces.', 300.00, '2017-09-28', '23:21:02', 1, -2, 20, 5, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2F1_elastomeric.pngRain%20or%20Shine%20Elastomeric%20Paint?alt=media&token=7af84218-d83c-49f4-bf81-52d7d93497da', 1),
	(2, 'DAVIES Roofshield Acrylic Roof Paint', 'A pure acrylic emulsion gloss roof paint designed for beautifying and protecting roofs and masonry walls.', 250.00, '2017-09-28', '23:32:30', 1, 29, 50, 10, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fdavies-roofshield-acrylic-roof-paint.jpgDAVIES%20Roofshield%20Acrylic%20Roof%20Paint?alt=media&token=ff8c4a8e-519d-4753-a2ea-7e3069bac7ec', 1),
	(3, 'Davies Oil Woodstain', 'It brings out the natural beauty of wood. When clear coated with Davies Varnishes, Davies Oil Wood Stain highlight wood grains, add freshness and color.\n', 450.00, '2017-09-29', '13:17:50', 1, 0, 20, 10, 'https:///firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2FDavies-Oil-Woodstain.pngDavies%20Oil%20Woodstain?alt=media&token=2d0300df-adc7-40c3-b4db-f1682fe79c29', 1),
	(4, 'Davies Polyfloor', 'A two-pack coating system especially formulated for wood and parquet floors, heavy duty school and office furnitures. It dries to a top and flexible film with exceptional gloss and mar resistance.', 265.00, '2017-09-29', '13:22:32', 1, 0, 30, 10, 'https:///firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2FDavies-Polyfloor.pngDavies%20Polyfloor?alt=media&token=e2725d94-d858-461d-883a-79250a13fd77', 1),
	(5, 'Davies Epoxy Enamel', 'A two-component epoxy coating especially formulated for industry, building and marine applications. \r\n', 310.00, '2017-09-29', '13:25:27', 1, 0, 50, 10, 'https:///firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2FDavies-Epoxy-Enamel.pngDavies%20Epoxy%20Enamel?alt=media&token=ef114d09-5377-49c5-9dbf-04a2ebf6ba53', 1),
	(6, 'Davies Gloss-It', 'An all purpose alkyd based paint ideal for all types of wood and metal surfaces. It finds wide application in both decorative and protective coatings due to its high gloss, good color retention and outstanding durability.', 180.00, '2017-09-29', '13:27:26', 1, 0, 20, 10, 'https:///firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2FDavies-Quick-Drying-Enamel.pngDavies%20Gloss-It?alt=media&token=ca78f278-a970-46d7-94a9-ecd763c4a434', 1),
	(7, 'Davies Keramikote', 'A two pack, air drying, chemically-cured urethane coating system developed to achieve decorative requirements and protective function even in the aggressive, polluted air of cities and industrial regions', 278.00, '2017-09-29', '13:30:07', 1, 0, 60, 10, 'https:///firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2FDavies-Keramikote.pngDavies%20Keramikote?alt=media&token=3c88bbb3-2ccb-45e5-8c64-881cefb9de19', 1);
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
  `sup_id` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`log_id`),
  KEY `prd_id` (`prd_id`),
  KEY `user_id` (`emp_id`),
  KEY `sales_id` (`sales_id`),
  KEY `sup_id` (`sup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_product_log: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_product_log` DISABLE KEYS */;
INSERT INTO `tbl_product_log` (`log_id`, `prd_id`, `log_qty`, `log_datestamp`, `log_timestamp`, `emp_id`, `log_type`, `sales_id`, `sup_id`) VALUES
	(1, 2, 20, '2017-09-28', '23:57:43', 80000002, 0, 0, 150000115),
	(2, 1, 50, '2017-09-29', '11:19:54', 80000002, 0, 0, 150000115),
	(3, 1, 20, '2017-09-29', '11:20:12', 80000002, 1, 1, 0),
	(4, 1, 20, '2017-09-29', '11:21:05', 80000002, 0, 0, 150000116),
	(5, 1, 10, '2017-09-29', '12:52:32', 80000002, 0, 0, 150000115),
	(6, 2, 5, '2017-09-29', '12:58:54', 80000002, 0, 0, 150000115),
	(7, 2, 5, '2017-09-29', '12:59:28', 80000002, 0, 0, 150000115),
	(8, 2, 5, '2017-09-29', '13:00:28', 80000002, 0, 0, 150000115),
	(9, 2, 5, '2017-09-29', '13:35:28', 80000002, 1, 2, 0),
	(10, 2, 1, '2017-09-29', '13:44:19', 80000002, 1, 3, 0),
	(11, 1, 1, '2017-09-29', '13:46:05', 80000002, 1, 4, 0),
	(12, 1, 2, '2017-09-29', '13:50:22', 80000002, 1, 5, 0),
	(13, 1, 1, '2017-09-29', '13:55:10', 80000002, 1, 6, 0),
	(14, 1, 1, '2017-09-29', '13:56:36', 80000002, 1, 7, 0),
	(15, 1, 1, '2017-09-29', '13:58:00', 80000002, 1, 8, 0),
	(16, 1, 1, '2017-09-29', '13:59:08', 80000002, 1, 9, 0),
	(17, 1, 1, '2017-09-29', '13:59:41', 80000002, 1, 10, 0),
	(18, 1, 1, '2017-09-29', '14:02:13', 80000002, 1, 11, 0);
/*!40000 ALTER TABLE `tbl_product_log` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_route
CREATE TABLE IF NOT EXISTS `tbl_route` (
  `route_id` int(255) NOT NULL AUTO_INCREMENT,
  `route_lat` varchar(8) NOT NULL DEFAULT '0',
  `route_lng` varchar(8) NOT NULL DEFAULT '0',
  `route_datestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `del_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`route_id`),
  KEY `del_id` (`del_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_route: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_route` DISABLE KEYS */;
INSERT INTO `tbl_route` (`route_id`, `route_lat`, `route_lng`, `route_datestamp`, `del_id`) VALUES
	(1, '10.74033', '122.9651', '2017-09-29 11:22:15', 1),
	(2, '10.74026', '122.9653', '2017-09-29 11:28:45', 1),
	(3, '10.67971', '122.9635', '2017-09-29 11:57:06', 1),
	(4, '10.67875', '122.9625', '2017-09-29 12:04:07', 1),
	(5, '10.67873', '122.9626', '2017-09-29 12:04:27', 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_sales: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_sales` DISABLE KEYS */;
INSERT INTO `tbl_sales` (`sales_id`, `sales_datestamp`, `sales_timestamp`, `emp_id`, `cust_id`, `receive_datetimestamp`, `sales_type`, `order_id`) VALUES
	(1, '2017-09-29', '11:20:11', 0, 110000011, '2017-09-29 12:27:29', 1, 1),
	(2, '2017-09-29', '13:35:28', 80000002, 0, '2017-09-29 13:35:28', 2, 0),
	(3, '2017-09-29', '13:44:19', 80000002, 0, '2017-09-29 13:44:19', 2, 0),
	(4, '2017-09-29', '13:46:05', 80000002, 0, '2017-09-29 13:46:05', 2, 0),
	(5, '2017-09-29', '13:50:22', 0, 110000011, '0000-00-00 00:00:00', 1, 3),
	(6, '2017-09-29', '13:55:09', 0, 110000011, '0000-00-00 00:00:00', 1, 2),
	(7, '2017-09-29', '13:56:36', 0, 110000011, '0000-00-00 00:00:00', 1, 2),
	(8, '2017-09-29', '13:58:00', 0, 110000011, '0000-00-00 00:00:00', 1, 2),
	(9, '2017-09-29', '13:59:08', 0, 110000011, '0000-00-00 00:00:00', 1, 2),
	(10, '2017-09-29', '13:59:41', 0, 110000011, '0000-00-00 00:00:00', 1, 2),
	(11, '2017-09-29', '14:02:13', 0, 110000011, '0000-00-00 00:00:00', 1, 2);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_sales_list: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_sales_list` DISABLE KEYS */;
INSERT INTO `tbl_sales_list` (`sales_list_id`, `prd_id`, `prd_qty`, `sales_id`, `prd_price`) VALUES
	(1, 1, 20, 1, 300.00),
	(2, 2, 5, 2, 250.00),
	(3, 2, 1, 3, 250.00),
	(4, 1, 1, 4, 300.00),
	(5, 1, 2, 5, 300.00),
	(6, 1, 1, 6, 300.00),
	(7, 1, 1, 7, 300.00),
	(8, 1, 1, 8, 300.00),
	(9, 1, 1, 9, 300.00),
	(10, 1, 1, 10, 300.00),
	(11, 1, 1, 11, 300.00);
/*!40000 ALTER TABLE `tbl_sales_list` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_supplier
CREATE TABLE IF NOT EXISTS `tbl_supplier` (
  `sup_id` int(225) NOT NULL AUTO_INCREMENT,
  `sup_name` text NOT NULL,
  `sup_desc` text NOT NULL,
  `sup_status` int(1) DEFAULT '1',
  `sup_datestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=150000123 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_supplier: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_supplier` DISABLE KEYS */;
INSERT INTO `tbl_supplier` (`sup_id`, `sup_name`, `sup_desc`, `sup_status`, `sup_datestamp`) VALUES
	(150000111, 'Bacolod Paint Supply', 'Sample Hardware', 0, '2017-09-26 21:02:13'),
	(150000112, 'Ace Hardware Supplies', 'Bacolod Branch Ace Hardware', 0, '2017-09-28 03:19:43'),
	(150000113, 'Xin Chao Warehouse', 'Cheap China Hardware Products', 0, '2017-09-28 03:20:22'),
	(150000114, 'Emars Electronic Shop', '1557 2nd Floor SM Bacolod.', 1, '2017-09-28 03:26:41'),
	(150000115, 'United Commercial', 'Paint, Electronic Equipment, Tools, Motorcycle Parts', 1, '2017-09-28 23:54:51'),
	(150000116, 'Bacolod Freedom', '- Insert Address Here', 1, '2017-09-28 23:56:03'),
	(150000117, 'test supplier\'s of the product', 'sample\'s of different descriptions', 0, '2017-09-29 13:07:17'),
	(150000118, '////////////', '//////////////', 0, '2017-09-29 13:09:16'),
	(150000119, '/////////////////', '//////////////////', 0, '2017-09-29 13:09:24'),
	(150000120, '///////////////////', '//////////', 0, '2017-09-29 13:10:04'),
	(150000121, 'Emars Electronic Shop', 'sssssss', 0, '2017-09-29 13:10:36'),
	(150000122, '/////', '//////', 0, '2017-09-29 13:14:50');
/*!40000 ALTER TABLE `tbl_supplier` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
