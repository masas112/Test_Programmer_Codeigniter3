-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.36 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for testprogrammer
CREATE DATABASE IF NOT EXISTS `testprogrammer` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `testprogrammer`;

-- Dumping structure for procedure testprogrammer.increment_store
DELIMITER //
CREATE PROCEDURE `increment_store`()
BEGIN
    CREATE TEMPORARY TABLE temp_products AS SELECT * FROM product ORDER BY id_produk ASC;
    
    SET @rank = 0;
    
    UPDATE temp_products
    SET id_produk = (@rank := @rank + 1);
    
    TRUNCATE TABLE product;
    
    INSERT INTO product SELECT * FROM temp_products;
    
    DROP TEMPORARY TABLE IF EXISTS temp_products;
    
    
END//
DELIMITER ;

-- Dumping structure for table testprogrammer.product
CREATE TABLE IF NOT EXISTS `product` (
  `id_produk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `harga` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_produk`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table testprogrammer.product: 5 rows
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id_produk`, `nama_produk`, `kategori`, `harga`, `status`) VALUES
	(1, 'ALCOHOL', 'L QUEENLY', 12500, 1),
	(2, 'Mizone', 'Minuman', 3000, 1),
	(3, 'ALUMUNIUM BULAT 30mm IM', 'L MTH AKSESORIS (IM)', 1000, 1),
	(4, 'ALCOHOL GEL POLISH CLEANSER', 'L QUEENLY', 12500, 0),
	(5, 'pitecantropus', 'manusia', 10000, 1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for trigger testprogrammer.increment
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `increment` BEFORE INSERT ON `product` FOR EACH ROW BEGIN
DECLARE max_id INT;
  SET max_id = (SELECT MAX(id_produk) FROM product);

  IF max_id IS NULL THEN
    SET NEW.id_produk = 1;
  ELSE
    SET NEW.id_produk = max_id + 1;
  END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
