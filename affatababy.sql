SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `default_schema` ;
CREATE SCHEMA IF NOT EXISTS `default_schema` ;
DROP SCHEMA IF EXISTS `babyaffata` ;
CREATE SCHEMA IF NOT EXISTS `babyaffata` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci ;
USE `default_schema` ;

-- -----------------------------------------------------
-- Table `default_schema`.`tbl_alamat_kirim`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_alamat_kirim` (
  `alamat_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `pembeli_id` INT UNSIGNED NOT NULL ,
  `alamat` VARCHAR(100) NULL DEFAULT NULL ,
  `telp` VARCHAR(30) NULL DEFAULT NULL ,
  `hp` VARCHAR(30) NULL DEFAULT NULL ,
  PRIMARY KEY (`alamat_id`) ,
  UNIQUE INDEX `tbl_alamat_kirim_FKIndex1` (`pembeli_id` ASC) );


-- -----------------------------------------------------
-- Table `default_schema`.`tbl_brand`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_brand` (
  `brand_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `keterangan` VARCHAR(100) NULL DEFAULT NULL ,
  `logo` VARCHAR(50) NULL DEFAULT NULL ,
  `user_id` VARCHAR(30) NULL DEFAULT NULL ,
  `last_update` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`brand_id`) );


-- -----------------------------------------------------
-- Table `default_schema`.`tbl_cart`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_cart` (
  `cart_id` INT UNSIGNED NOT NULL,
  `no_cart` CHAR(10) NULL DEFAULT NULL ,
  `tgl_cart` DATE NULL DEFAULT NULL ,
  `qty` INT UNSIGNED NULL DEFAULT NULL ,
  `harga` FLOAT NULL DEFAULT NULL ,
  `diskon` FLOAT NULL DEFAULT NULL ,
  `status_cart` CHAR(15) NULL DEFAULT NULL ,
  PRIMARY KEY (`cart_id`) );


-- -----------------------------------------------------
-- Table `default_schema`.`tbl_detail_barang`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_detail_barang` (
  `detail_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `barang_id` INT UNSIGNED NOT NULL ,
  `nama_detail_id` INT UNSIGNED NOT NULL ,
  `keterangan` VARCHAR(300) NULL DEFAULT NULL ,
  `user_id` VARCHAR(30) NULL DEFAULT NULL ,
  `last_update` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`detail_id`) ,
  UNIQUE INDEX `tbl_detail_barang_FKIndex1` (`nama_detail_id` ASC) ,
  UNIQUE INDEX `tbl_detail_barang_FKIndex2` (`barang_id` ASC) );


-- -----------------------------------------------------
-- Table `default_schema`.`tbl_detail_cart`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_detail_cart` (
  `detail_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `cart_id` INT UNSIGNED NOT NULL ,
  `pembeli_id` INT UNSIGNED NOT NULL ,
  `barang_id` INT UNSIGNED NOT NULL ,
  `qty` INT UNSIGNED NULL DEFAULT NULL ,
  `harga` FLOAT NULL DEFAULT NULL ,
  `diskon` FLOAT NULL DEFAULT NULL ,
  PRIMARY KEY (`detail_id`) ,
  UNIQUE INDEX `tbl_detail_cart_FKIndex1` (`barang_id` ASC) ,
  UNIQUE INDEX `tbl_detail_cart_FKIndex2` (`pembeli_id` ASC) ,
  UNIQUE INDEX `tbl_detail_cart_FKIndex3` (`cart_id` ASC) );


-- -----------------------------------------------------
-- Table `default_schema`.`tbl_detail_pemesanan`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_detail_pemesanan` (
  `detail_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `barang_id` INT UNSIGNED NOT NULL ,
  `pemesanan_id` INT UNSIGNED NOT NULL ,
  `qty` INT UNSIGNED NULL DEFAULT NULL ,
  `harga` FLOAT NULL DEFAULT NULL ,
  `diskon` FLOAT NULL DEFAULT NULL ,
  PRIMARY KEY (`detail_id`) ,
  UNIQUE INDEX `tbl_detail_pemesanan_FKIndex1` (`pemesanan_id` ASC) ,
  UNIQUE INDEX `tbl_detail_pemesanan_FKIndex2` (`barang_id` ASC) );


-- -----------------------------------------------------
-- Table `default_schema`.`tbl_detail_promo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_detail_promo` (
  `detail_promo_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `barang_id` INT UNSIGNED NOT NULL ,
  `promo_id` INT UNSIGNED NOT NULL ,
  `diskon` FLOAT NULL DEFAULT NULL ,
  PRIMARY KEY (`detail_promo_id`) ,
  UNIQUE INDEX `tbl_detail_promo_FKIndex1` (`promo_id` ASC) ,
  UNIQUE INDEX `tbl_detail_promo_FKIndex2` (`barang_id` ASC) );


-- -----------------------------------------------------
-- Table `default_schema`.`tbl_harga_barang`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_harga_barang` (
  `harga_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `barang_id` INT UNSIGNED NOT NULL ,
  `harga_beli` FLOAT NULL DEFAULT 0 ,
  `harga_jual` FLOAT NULL DEFAULT 0 ,
  `diskon` FLOAT NULL DEFAULT 0 ,
  `ppn` FLOAT NOT NULL DEFAULT 2.5 ,
  `last_update` DATETIME NULL DEFAULT NULL ,
  `user_id` VARCHAR(30) NULL DEFAULT NULL ,
  PRIMARY KEY (`harga_id`) ,
  INDEX `tbl_harga_barang_FKIndex1` (`barang_id` ASC) ,
  UNIQUE INDEX `tbl_harga_barang_unik` (`barang_id` ASC) );


-- -----------------------------------------------------
-- Table `default_schema`.`tbl_kategori`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_kategori` (
  `kategori_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `keterangan` VARCHAR(100) NULL DEFAULT NULL ,
  `parent_id` INT UNSIGNED NULL DEFAULT NULL ,
  `is_publish` TINYINT UNSIGNED NULL DEFAULT 0 ,
  PRIMARY KEY (`kategori_id`) );


-- -----------------------------------------------------
-- Table `default_schema`.`tbl_kategori_barang`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_kategori_barang` (
  `kategori_barang_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `barang_id` INT UNSIGNED NOT NULL ,
  `kategori_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`kategori_barang_id`) ,
  INDEX `tbl_kategori_barang_FKIndex1` (`kategori_id` ASC) ,
  INDEX `tbl_kategori_barang_FKIndex2` (`barang_id` ASC) );


-- -----------------------------------------------------
-- Table `default_schema`.`tbl_mater_barang`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_mater_barang` (
  `barang_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `brand_id` INT UNSIGNED NOT NULL ,
  `nama_barang` VARCHAR(100) NULL DEFAULT NULL ,
  `kode_barang` VARCHAR(20) NULL DEFAULT NULL ,
  `alias_barang` VARCHAR(100) NULL DEFAULT NULL ,
  `sub_title` VARCHAR(50) NULL DEFAULT NULL ,
  `is_publish` TINYINT UNSIGNED NULL DEFAULT 0 ,
  `parent_id` INT UNSIGNED NULL DEFAULT 0 ,
  `user_id` VARCHAR(30) NULL DEFAULT NULL ,
  `last_update` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`barang_id`) ,
  INDEX `tbl_mater_barang_FKIndex1` (`brand_id` ASC) );


-- -----------------------------------------------------
-- Table `default_schema`.`tbl_nama_detail`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_nama_detail` (
  `nama_detail_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nama_detail` VARCHAR(30) NULL DEFAULT NULL ,
  PRIMARY KEY (`nama_detail_id`) ,
  UNIQUE INDEX `tbl_nama_detail_index42544` (`nama_detail` ASC) );


-- -----------------------------------------------------
-- Table `default_schema`.`tbl_new_product`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_new_product` (
  `new_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `barang_id` INT UNSIGNED NOT NULL ,
  `user_id` VARCHAR(30) NULL DEFAULT NULL ,
  `last_update` DATETIME NULL DEFAULT NULL ,
  `is_publish` TINYINT UNSIGNED NULL DEFAULT 0 ,
  PRIMARY KEY (`new_id`) ,
  INDEX `tbl_new_product_FKIndex1` (`barang_id` ASC) );


-- -----------------------------------------------------
-- Table `default_schema`.`tbl_pembeli`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_pembeli` (
  `pembeli_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nama` VARCHAR(60) NULL DEFAULT NULL ,
  `alamat` VARCHAR(100) NULL DEFAULT NULL ,
  `telp` VARCHAR(20) NULL DEFAULT NULL ,
  `hp` VARCHAR(20) NULL DEFAULT NULL ,
  `email` VARCHAR(50) NULL DEFAULT NULL ,
  PRIMARY KEY (`pembeli_id`) );


-- -----------------------------------------------------
-- Table `default_schema`.`tbl_pembelian`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_pembelian` (
  `pembelian_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `transaksi_id` INT UNSIGNED NOT NULL ,
  `pemesanan_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`pembelian_id`) ,
  INDEX `tbl_pembelian_FKIndex1` (`pemesanan_id` ASC) ,
  INDEX `tbl_pembelian_FKIndex2` (`transaksi_id` ASC) );


-- -----------------------------------------------------
-- Table `default_schema`.`tbl_pemesanan_barang`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_pemesanan_barang` (
  `pemesanan_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `no_faktur` VARCHAR(20) NULL DEFAULT NULL ,
  `tgl_faktur` DATE NULL DEFAULT NULL ,
  `qty` INT UNSIGNED NULL DEFAULT NULL ,
  `harga` FLOAT NULL DEFAULT NULL ,
  `diskon` FLOAT NULL DEFAULT NULL ,
  `user_id` VARCHAR(30) NULL DEFAULT NULL ,
  `last_update` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`pemesanan_id`) );


-- -----------------------------------------------------
-- Table `default_schema`.`tbl_penjualan`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_penjualan` (
  `penjualan_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `transaksi_id` INT UNSIGNED NOT NULL ,
  `cart_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`penjualan_id`) ,
  INDEX `tbl_transaksi_FKIndex1` (`cart_id` ASC) ,
  INDEX `tbl_penjualan_FKIndex2` (`transaksi_id` ASC) );


-- -----------------------------------------------------
-- Table `default_schema`.`tbl_promo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_promo` (
  `promo_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `judul` VARCHAR(60) NULL DEFAULT NULL ,
  `keterangan` VARCHAR(100) NULL DEFAULT NULL ,
  `tgl_mulai` DATE NULL DEFAULT NULL ,
  `tgl_selesai` DATE NULL DEFAULT NULL ,
  `user_id` VARCHAR(30) NULL DEFAULT NULL ,
  `last_update` DATETIME NULL DEFAULT NULL ,
  `is_publish` TINYINT UNSIGNED NULL DEFAULT 0 ,
  PRIMARY KEY (`promo_id`) );


-- -----------------------------------------------------
-- Table `default_schema`.`tbl_review`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_review` (
  `review_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `barang_id` INT UNSIGNED NOT NULL ,
  `pembeli_id` INT UNSIGNED NOT NULL ,
  `review` VARCHAR(200) NULL DEFAULT NULL ,
  `rating` INT UNSIGNED NULL DEFAULT NULL ,
  `last_update` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`review_id`) ,
  INDEX `tbl_review_FKIndex1` (`pembeli_id` ASC) ,
  INDEX `tbl_review_FKIndex2` (`barang_id` ASC) );


-- -----------------------------------------------------
-- Table `default_schema`.`tbl_stok_barang`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_stok_barang` (
  `stok_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `barang_id` INT UNSIGNED NOT NULL ,
  `qty` INT UNSIGNED NULL DEFAULT NULL ,
  `available` INT UNSIGNED NULL DEFAULT NULL ,
  `rejected` INT UNSIGNED NULL DEFAULT NULL ,
  `preorder` INT UNSIGNED NULL DEFAULT NULL ,
  `delivered` INT UNSIGNED NULL DEFAULT NULL ,
  `reserved` INT UNSIGNED NULL DEFAULT NULL ,
  `last_update` DATETIME NULL DEFAULT NULL ,
  `user_id` VARCHAR(30) NULL DEFAULT NULL ,
  PRIMARY KEY (`stok_id`) ,
  INDEX `tbl_stok_barang_FKIndex1` (`barang_id` ASC) ,
  UNIQUE INDEX `tbl_stok_barang_index42526` (`barang_id` ASC) );


-- -----------------------------------------------------
-- Table `default_schema`.`tbl_tag_barang`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_tag_barang` (
  `tag` VARCHAR(50) NOT NULL ,
  `barang_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`tag`, `barang_id`) ,
  INDEX `tbl_tag_barang_FKIndex1` (`barang_id` ASC) );


-- -----------------------------------------------------
-- Table `default_schema`.`tbl_transaksi`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`tbl_transaksi` (
  `transaksi_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `no_transaksi` CHAR(10) NULL DEFAULT NULL ,
  `tgl_transaksi` DATE NULL DEFAULT NULL ,
  `keterangan` VARCHAR(50) NULL DEFAULT NULL ,
  `bayar` FLOAT NULL DEFAULT NULL ,
  `harga` FLOAT NULL DEFAULT NULL ,
  `diskon` FLOAT NULL DEFAULT NULL ,
  PRIMARY KEY (`transaksi_id`) );

USE `babyaffata` ;

-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_alamat_kirim`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_alamat_kirim` (
  `alamat_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `pembeli_id` INT(10) UNSIGNED NOT NULL ,
  `alamat` VARCHAR(100) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `telp` VARCHAR(30) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `hp` VARCHAR(30) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  PRIMARY KEY (`alamat_id`) ,
  INDEX `tbl_alamat_kirim_FKIndex1` (`pembeli_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_brand`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_brand` (
  `brand_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `keterangan` VARCHAR(100) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `logo` VARCHAR(50) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `user_id` VARCHAR(30) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `last_update` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`brand_id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_cart`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_cart` (
  `cart_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `no_cart` CHAR(10) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `tgl_cart` DATE NULL DEFAULT NULL ,
  `qty` INT(10) UNSIGNED NULL DEFAULT NULL ,
  `harga` FLOAT NULL DEFAULT NULL ,
  `diskon` FLOAT NULL DEFAULT NULL ,
  `status_2` CHAR(15) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  PRIMARY KEY (`cart_id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_detail_barang`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_detail_barang` (
  `detail_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `barang_id` INT(10) UNSIGNED NOT NULL ,
  `nama_detail_id` INT(10) UNSIGNED NOT NULL ,
  `keterangan` VARCHAR(300) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `user_id` VARCHAR(30) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `last_update` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`detail_id`) ,
  INDEX `tbl_detail_barang_FKIndex1` (`nama_detail_id` ASC) ,
  INDEX `tbl_detail_barang_FKIndex2` (`barang_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_detail_cart`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_detail_cart` (
  `detail_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `cart_id` INT(10) UNSIGNED NOT NULL ,
  `pembeli_id` INT(10) UNSIGNED NOT NULL ,
  `barang_id` INT(10) UNSIGNED NOT NULL ,
  `qty` INT(10) UNSIGNED NULL DEFAULT NULL ,
  `harga` FLOAT NULL DEFAULT NULL ,
  `diskon` FLOAT NULL DEFAULT NULL ,
  PRIMARY KEY (`detail_id`) ,
  INDEX `tbl_detail_cart_FKIndex1` (`barang_id` ASC) ,
  INDEX `tbl_detail_cart_FKIndex2` (`pembeli_id` ASC) ,
  INDEX `tbl_detail_cart_FKIndex3` (`cart_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_detail_pemesanan`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_detail_pemesanan` (
  `detail_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `barang_id` INT(10) UNSIGNED NOT NULL ,
  `pemesanan_id` INT(10) UNSIGNED NOT NULL ,
  `qty` INT(10) UNSIGNED NULL DEFAULT NULL ,
  `harga` FLOAT NULL DEFAULT NULL ,
  `diskon` FLOAT NULL DEFAULT NULL ,
  PRIMARY KEY (`detail_id`) ,
  INDEX `tbl_detail_pemesanan_FKIndex1` (`pemesanan_id` ASC) ,
  INDEX `tbl_detail_pemesanan_FKIndex2` (`barang_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_detail_promo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_detail_promo` (
  `detail_promo_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `barang_id` INT(10) UNSIGNED NOT NULL ,
  `promo_id` INT(10) UNSIGNED NOT NULL ,
  `diskon` FLOAT NULL DEFAULT NULL ,
  PRIMARY KEY (`detail_promo_id`) ,
  INDEX `tbl_detail_promo_FKIndex1` (`promo_id` ASC) ,
  INDEX `tbl_detail_promo_FKIndex2` (`barang_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_harga_barang`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_harga_barang` (
  `harga_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `barang_id` INT(10) UNSIGNED NOT NULL ,
  `harga_beli` FLOAT NULL DEFAULT '0' ,
  `harga_jual` FLOAT NULL DEFAULT '0' ,
  `diskon` FLOAT NULL DEFAULT '0' ,
  `ppn` FLOAT NOT NULL DEFAULT '2.5' ,
  `last_update` DATETIME NULL DEFAULT NULL ,
  `user_id` VARCHAR(30) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  PRIMARY KEY (`harga_id`) ,
  UNIQUE INDEX `tbl_harga_barang_unik` (`barang_id` ASC) ,
  INDEX `tbl_harga_barang_FKIndex1` (`barang_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_kategori`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_kategori` (
  `kategori_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `keterangan` VARCHAR(100) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `parent_id` INT(10) UNSIGNED NULL DEFAULT NULL ,
  `is_publish` TINYINT(3) UNSIGNED NULL DEFAULT '0' ,
  PRIMARY KEY (`kategori_id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_kategori_barang`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_kategori_barang` (
  `kategori_barang_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `barang_id` INT(10) UNSIGNED NOT NULL ,
  `kategori_id` INT(10) UNSIGNED NOT NULL ,
  PRIMARY KEY (`kategori_barang_id`) ,
  INDEX `tbl_kategori_barang_FKIndex1` (`kategori_id` ASC) ,
  INDEX `tbl_kategori_barang_FKIndex2` (`barang_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_mater_barang`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_mater_barang` (
  `barang_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `brand_id` INT(10) UNSIGNED NOT NULL ,
  `nama_barang` VARCHAR(100) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `kode_barang` VARCHAR(20) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `alias_barang` VARCHAR(100) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `sub_title` VARCHAR(50) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `is_publish` TINYINT(3) UNSIGNED NULL DEFAULT '0' ,
  `parent_id` INT(10) UNSIGNED NULL DEFAULT '0' ,
  `user_id` VARCHAR(30) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `last_update` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`barang_id`) ,
  INDEX `tbl_mater_barang_FKIndex1` (`brand_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_nama_detail`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_nama_detail` (
  `nama_detail_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nama_detail` VARCHAR(30) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  PRIMARY KEY (`nama_detail_id`) ,
  UNIQUE INDEX `tbl_nama_detail_index42544` (`nama_detail` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_new_product`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_new_product` (
  `new_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `barang_id` INT(10) UNSIGNED NOT NULL ,
  `user_id` VARCHAR(30) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `last_update` DATETIME NULL DEFAULT NULL ,
  `is_publish` TINYINT(3) UNSIGNED NULL DEFAULT '0' ,
  PRIMARY KEY (`new_id`) ,
  INDEX `tbl_new_product_FKIndex1` (`barang_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_pembeli`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_pembeli` (
  `pembeli_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nama` VARCHAR(60) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `alamat` VARCHAR(100) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `telp` VARCHAR(20) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `hp` VARCHAR(20) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `email` VARCHAR(50) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  PRIMARY KEY (`pembeli_id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_pembelian`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_pembelian` (
  `pembelian_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `transaksi_id` INT(10) UNSIGNED NOT NULL ,
  `pemesanan_id` INT(10) UNSIGNED NOT NULL ,
  PRIMARY KEY (`pembelian_id`) ,
  INDEX `tbl_pembelian_FKIndex1` (`pemesanan_id` ASC) ,
  INDEX `tbl_pembelian_FKIndex2` (`transaksi_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_pemesanan_barang`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_pemesanan_barang` (
  `pemesanan_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `no_faktur` VARCHAR(20) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `tgl_faktur` DATE NULL DEFAULT NULL ,
  `qty` INT(10) UNSIGNED NULL DEFAULT NULL ,
  `harga` FLOAT NULL DEFAULT NULL ,
  `diskon` FLOAT NULL DEFAULT NULL ,
  `user_id` VARCHAR(30) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `last_update` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`pemesanan_id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_penjualan`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_penjualan` (
  `penjualan_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `transaksi_id` INT(10) UNSIGNED NOT NULL ,
  `cart_id` INT(10) UNSIGNED NOT NULL ,
  PRIMARY KEY (`penjualan_id`) ,
  INDEX `tbl_transaksi_FKIndex1` (`cart_id` ASC) ,
  INDEX `tbl_penjualan_FKIndex2` (`transaksi_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_promo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_promo` (
  `promo_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `judul` VARCHAR(60) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `keterangan` VARCHAR(100) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `tgl_mulai` DATE NULL DEFAULT NULL ,
  `tgl_selesai` DATE NULL DEFAULT NULL ,
  `user_id` VARCHAR(30) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `last_update` DATETIME NULL DEFAULT NULL ,
  `is_publish` TINYINT(3) UNSIGNED NULL DEFAULT '0' ,
  PRIMARY KEY (`promo_id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_review`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_review` (
  `review_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `barang_id` INT(10) UNSIGNED NOT NULL ,
  `pembeli_id` INT(10) UNSIGNED NOT NULL ,
  `review` VARCHAR(200) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `rating` INT(10) UNSIGNED NULL DEFAULT NULL ,
  `last_update` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`review_id`) ,
  INDEX `tbl_review_FKIndex1` (`pembeli_id` ASC) ,
  INDEX `tbl_review_FKIndex2` (`barang_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_stok_barang`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_stok_barang` (
  `stok_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `barang_id` INT(10) UNSIGNED NOT NULL ,
  `qty` INT(10) UNSIGNED NULL DEFAULT NULL ,
  `available` INT(10) UNSIGNED NULL DEFAULT NULL ,
  `rejected` INT(10) UNSIGNED NULL DEFAULT NULL ,
  `preorder` INT(10) UNSIGNED NULL DEFAULT NULL ,
  `delivered` INT(10) UNSIGNED NULL DEFAULT NULL ,
  `reserved` INT(10) UNSIGNED NULL DEFAULT NULL ,
  `last_update` DATETIME NULL DEFAULT NULL ,
  `user_id` VARCHAR(30) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  PRIMARY KEY (`stok_id`) ,
  UNIQUE INDEX `tbl_stok_barang_index42526` (`barang_id` ASC) ,
  INDEX `tbl_stok_barang_FKIndex1` (`barang_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_tag_barang`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_tag_barang` (
  `tag` VARCHAR(50) CHARACTER SET 'latin1' NOT NULL ,
  `barang_id` INT(10) UNSIGNED NOT NULL ,
  PRIMARY KEY (`tag`, `barang_id`) ,
  INDEX `tbl_tag_barang_FKIndex1` (`barang_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `babyaffata`.`tbl_transaksi`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `babyaffata`.`tbl_transaksi` (
  `transaksi_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `no_transaksi` CHAR(10) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `tgl_transaksi` DATE NULL DEFAULT NULL ,
  `keterangan` VARCHAR(50) CHARACTER SET 'latin1' NULL DEFAULT NULL ,
  `bayar` FLOAT NULL DEFAULT NULL ,
  `harga` FLOAT NULL DEFAULT NULL ,
  `diskon` FLOAT NULL DEFAULT NULL ,
  PRIMARY KEY (`transaksi_id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;

USE `default_schema` ;
USE `babyaffata` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
