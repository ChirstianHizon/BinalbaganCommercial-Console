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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_barcode: ~12 rows (approximately)
/*!40000 ALTER TABLE `tbl_barcode` DISABLE KEYS */;
INSERT INTO `tbl_barcode` (`bar_id`, `bar_code`, `bar_status`, `bar_datestamp`, `prd_id`) VALUES
	(1, '8432569751246', 1, '2017-09-28 23:42:26', 2),
	(2, '754850315458', 0, '2017-09-29 16:50:12', 8),
	(3, '5876321549', 0, '2017-09-29 16:50:32', 8),
	(4, '654232421111', 0, '2017-09-29 16:53:20', 8),
	(5, '1548521558', 0, '2017-09-29 17:03:14', 8),
	(6, '85136476232587', 0, '2017-09-29 17:05:27', 8),
	(7, 'sasassas', 0, '2017-09-29 17:05:44', 8),
	(8, 'ssss', 0, '2017-09-29 17:05:52', 8),
	(9, 'sss', 0, '2017-09-29 17:06:15', 8),
	(10, 'sample', 0, '2017-09-29 17:06:44', 8),
	(11, '463234', 0, '2017-09-29 17:07:35', 8),
	(12, 'asasasas', 0, '2017-09-29 17:07:44', 8);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_cart: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_cart` DISABLE KEYS */;
INSERT INTO `tbl_cart` (`cart_id`, `emp_id`, `cust_id`, `cart_datestamp`, `cart_timestamp`, `prd_id`, `cart_prd_qty`, `cart_status`) VALUES
	(8, 80000002, 0, '2017-09-29', '16:40:10', 7, 2, 1);
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

-- Dumping data for table db_binalbagancommercial.tbl_category: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_desc`, `cat_status`, `cat_datestamp`, `cat_timestamp`) VALUES
	(1, 'Paint ', 'Paint Products for Use anywhere', 1, '2017-09-28', '23:08:32'),
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

-- Dumping data for table db_binalbagancommercial.tbl_customer: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_customer` DISABLE KEYS */;
INSERT INTO `tbl_customer` (`cust_id`, `cust_datestamp`, `cust_username`, `cust_password`, `cust_firstname`, `cust_lastname`, `cust_contact`, `cust_image`) VALUES
	(110000011, '2017-09-13 22:08:35', 'customer', '91ec1f9324753048c0096d036a694f86', 'Swashinegro', 'Arnold', '094866663323', '');
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

-- Dumping data for table db_binalbagancommercial.tbl_delivery: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_delivery` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='order_type\r\n-----------------------------------\r\n0 -> PICK - UP \r\n1 -> DELIVERY\r\n\r\norder_status\r\n-----------------------------------\r\n0 -> PENDING\r\n1 -> APPROVED\r\n2 -> DECLINED\r\n100 -> COMPLETED\r\n200 -> ON DELIVERY\r\n\r\n';

-- Dumping data for table db_binalbagancommercial.tbl_order: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_order` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_order_list: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_order_list` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_product: ~8 rows (approximately)
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` (`prd_id`, `prd_name`, `prd_desc`, `prd_price`, `prd_datestamp`, `prd_timestamp`, `prd_status`, `prd_level`, `prd_optimal`, `prd_warning`, `prd_image`, `cat_id`) VALUES
	(1, 'Rain or Shine Elastomeric Paint', 'Rain or Shine Elastomeric Waterproofing paint is a self-priming water-based waterproofing paint for exteriorand interior concrete surfaces.', 300.00, '2017-09-28', '23:21:02', 1, 0, 20, 5, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2F1_elastomeric.pngRain%20or%20Shine%20Elastomeric%20Paint?alt=media&token=7af84218-d83c-49f4-bf81-52d7d93497da', 1),
	(2, 'DAVIES Roofshield Acrylic Roof Paint', 'A pure acrylic emulsion gloss roof paint designed for beautifying and protecting roofs and masonry walls.', 250.00, '2017-09-28', '23:32:30', 1, 0, 50, 10, 'https://firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2Fdavies-roofshield-acrylic-roof-paint.jpgDAVIES%20Roofshield%20Acrylic%20Roof%20Paint?alt=media&token=ff8c4a8e-519d-4753-a2ea-7e3069bac7ec', 1),
	(3, 'Davies Oil Woodstain', 'It brings out the natural beauty of wood. When clear coated with Davies Varnishes, Davies Oil Wood Stain highlight wood grains, add freshness and color.\n', 450.00, '2017-09-29', '13:17:50', 1, 0, 20, 10, 'https:///firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2FDavies-Oil-Woodstain.pngDavies%20Oil%20Woodstain?alt=media&token=2d0300df-adc7-40c3-b4db-f1682fe79c29', 1),
	(4, 'Davies Polyfloor', 'A two-pack coating system especially formulated for wood and parquet floors, heavy duty school and office furnitures. It dries to a top and flexible film with exceptional gloss and mar resistance.', 265.00, '2017-09-29', '13:22:32', 1, 0, 30, 10, 'https:///firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2FDavies-Polyfloor.pngDavies%20Polyfloor?alt=media&token=e2725d94-d858-461d-883a-79250a13fd77', 1),
	(5, 'Davies Epoxy Enamel', 'A two-component epoxy coating especially formulated for industry, building and marine applications. \r\n', 310.00, '2017-09-29', '13:25:27', 1, 0, 50, 10, 'https:///firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2FDavies-Epoxy-Enamel.pngDavies%20Epoxy%20Enamel?alt=media&token=ef114d09-5377-49c5-9dbf-04a2ebf6ba53', 1),
	(6, 'Davies Gloss-It', 'An all purpose alkyd based paint ideal for all types of wood and metal surfaces. It finds wide application in both decorative and protective coatings due to its high gloss, good color retention and outstanding durability.', 180.00, '2017-09-29', '13:27:26', 1, 0, 20, 10, 'https:///firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2FDavies-Quick-Drying-Enamel.pngDavies%20Gloss-It?alt=media&token=ca78f278-a970-46d7-94a9-ecd763c4a434', 1),
	(7, 'Davies Keramikote', 'A two pack, air drying, chemically-cured urethane coating system developed to achieve decorative requirements and protective function even in the aggressive, polluted air of cities and industrial regions', 278.00, '2017-09-29', '13:30:07', 1, 9, 60, 10, 'https:///firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2FDavies-Keramikote.pngDavies%20Keramikote?alt=media&token=3c88bbb3-2ccb-45e5-8c64-881cefb9de19', 1),
	(8, 'Davies Aqua Gloss-It', 'Davies Aqua Gloss-It is a high gloss 100% acrylic water-based paint formulated as an alternative to conventional solvent-based alkyd enamels.', 309.98, '2017-09-29', '16:43:02', 1, 20000025, 30, 20, 'https:///firebasestorage.googleapis.com/v0/b/binalbagancommercial-229c0.appspot.com/o/products%2FDavies-Aqua-Gloss-It.pngDavies%20Aqua%20Gloss-It?alt=media&token=535a2eeb-92a3-435c-bf8b-0086e9b3f9a4', 1);
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
  `supp_price` double(255,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`log_id`),
  KEY `prd_id` (`prd_id`),
  KEY `user_id` (`emp_id`),
  KEY `sales_id` (`sales_id`),
  KEY `sup_id` (`sup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_product_log: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_product_log` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_sales: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_sales` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_sales_list: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_sales_list` DISABLE KEYS */;
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

-- Dumping data for table db_binalbagancommercial.tbl_supplier: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_supplier` DISABLE KEYS */;
INSERT INTO `tbl_supplier` (`sup_id`, `sup_name`, `sup_desc`, `sup_status`, `sup_datestamp`) VALUES
	(150000114, 'Emars Electronic Shop', '1557 2nd Floor SM Bacolod.', 1, '2017-09-28 03:26:41'),
	(150000115, 'United Commercial', 'Paint, Electronic Equipment, Tools, Motorcycle Parts', 1, '2017-09-28 23:54:51'),
	(150000116, 'Bacolod Freedom', '- Insert Address Here', 1, '2017-09-28 23:56:03');
/*!40000 ALTER TABLE `tbl_supplier` ENABLE KEYS */;

-- Dumping structure for table db_binalbagancommercial.tbl_supplier_prices
CREATE TABLE IF NOT EXISTS `tbl_supplier_prices` (
  `sprice_id` int(11) NOT NULL AUTO_INCREMENT,
  `sprice_price` int(11) NOT NULL,
  `sprice_datestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prd_id` int(11) NOT NULL,
  `sup_id` int(11) NOT NULL,
  `sup_status` int(1) DEFAULT '1',
  PRIMARY KEY (`sprice_id`),
  KEY `prd_id` (`prd_id`),
  KEY `sup_id` (`sup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table db_binalbagancommercial.tbl_supplier_prices: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_supplier_prices` DISABLE KEYS */;
INSERT INTO `tbl_supplier_prices` (`sprice_id`, `sprice_price`, `sprice_datestamp`, `prd_id`, `sup_id`, `sup_status`) VALUES
	(5, 2, '2017-09-30 16:17:32', 7, 150000114, 1),
	(6, 1, '2017-09-30 16:29:54', 8, 150000114, 1),
	(7, 2, '2017-09-30 16:47:39', 8, 150000115, 1);
/*!40000 ALTER TABLE `tbl_supplier_prices` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
