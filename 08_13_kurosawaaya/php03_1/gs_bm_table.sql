-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2019 年 1 月 31 日 22:49
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookmark`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE IF NOT EXISTS `gs_bm_table` (
`id` int(11) NOT NULL,
  `bookname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `bookURL` text COLLATE utf8_unicode_ci NOT NULL,
  `img` mediumblob NOT NULL,
  `naiyou` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `bookname`, `bookURL`, `img`, `naiyou`, `indate`) VALUES
(2, '彩', 'file:///Users/ayakurosawa/Desktop/php02%202/php02.pdf', '', 'ee', '2019-01-19 20:25:40'),
(3, 'laudree ファンデ', 'http://www.lm-laduree.com/products/foundation_powder/liquid_foundation/', 0x687474703a2f2f7777772e6c6d2d6c6164757265652e636f6d2f70726f64756374732f666f756e646174696f6e5f706f776465722f6c69717569645f666f756e646174696f6e2f696d616765732f6d61696e2d70686f746f2e706e67, 'うるつや', '2019-01-31 08:38:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
