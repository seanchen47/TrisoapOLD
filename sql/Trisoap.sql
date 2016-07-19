-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2016 年 06 月 22 日 18:24
-- 伺服器版本: 10.1.13-MariaDB
-- PHP 版本： 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `Trisoap`
--

-- --------------------------------------------------------

--
-- 資料表結構 `cusmas`
--

CREATE TABLE `CUSMAS` (
  `EMAIL` varchar(50) COLLATE utf8_bin NOT NULL,
  `CUSPW` varchar(15) COLLATE utf8_bin NOT NULL,
  `CUSNM` varchar(30) COLLATE utf8_bin NOT NULL,
  `CUSIDT` varchar(1) COLLATE utf8_bin NOT NULL DEFAULT 'B',
  `CUSADD` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `CUSBIRTHY` tinyint(4) NOT NULL,
  `CUSBIRTHM` tinyint(2) NOT NULL,
  `CUSBIRTHD` tinyint(2) NOT NULL,
  `COUNTRY` varchar(15) COLLATE utf8_bin DEFAULT 'Taiwan',
  `ZCODE` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `TEL` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `CUSTYPE` varchar(1) COLLATE utf8_bin NOT NULL,
  `KNOWTYPE` varchar(1) COLLATE utf8_bin NOT NULL,
  `CREDITSTAT` varchar(1) COLLATE utf8_bin NOT NULL DEFAULT 'A',
  `TAXID` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `DISCOUNT` int(8) NOT NULL DEFAULT '0',
  `SALEAMTMTD` int(8) NOT NULL DEFAULT '0',
  `SALEAMTSTD` int(8) NOT NULL DEFAULT '0',
  `SALEAMTYTD` int(8) NOT NULL DEFAULT '0',
  `SALEAMT` int(8) NOT NULL DEFAULT '0',
  `CURAR` int(8) NOT NULL DEFAULT '0',
  `SPEINS` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `CREATEDATE` datetime DEFAULT NULL,
  `UPDATEDATE` datetime DEFAULT NULL,
  `ACTCODE` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 資料表的匯出資料 `CUSMAS`
--

INSERT INTO `CUSMAS` (`EMAIL`, `CUSPW`, `CUSNM`, `CUSIDT`, `CUSADD`, `CUSBIRTHY`, `CUSBIRTHM`, `CUSBIRTHD`, `COUNTRY`, `ZCODE`, `TEL`, `CUSTYPE`, `KNOWTYPE`, `CREDITSTAT`, `TAXID`, `DISCOUNT`, `SALEAMTMTD`, `SALEAMTSTD`, `SALEAMTYTD`, `SALEAMT`, `CURAR`, `SPEINS`, `CREATEDATE`, `UPDATEDATE`, `ACTCODE`) VALUES
('A02705028', '123', 'Tim', 'A', 'No', 0, 0, 0, '', '', '0922825881', 'A', 'A', 'A', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('B02705028', '123', 'Tim', 'B', 'No', 0, 0, 0, '', '', '0922825881', 'A', 'A', 'A', '', 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `ITEMMAS`
--

CREATE TABLE `ITEMMAS` (
  `ITEMNO` int(15) NOT NULL,
  `ITEMNM` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ITEMAMT` int(8) NOT NULL DEFAULT '0',
  `PRICE` int(8) DEFAULT NULL,
  `DESCRIPTION` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `PHOTO` mediumblob NOT NULL,
  `PHOTOTYPE` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `CREATEDATE` datetime NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 資料表的匯出資料 `ITEMMAS`
--

INSERT INTO `ITEMMAS` (`ITEMNO`, `ITEMNM`, `ITEMAMT`, `PRICE`, `DESCRIPTION`, `PHOTO`, `PHOTOTYPE`, `CREATEDATE`, `UPDATEDATE`, `ACTCODE`) VALUES
(1, '田靜山巒禾風皂', 0, 300, '', '', '', '2016-05-20 00:00:00', '2016-05-20 00:00:00', 0),
(2, '釋迦手感果力皂', 0, 300, '', '', '', '2016-05-20 00:00:00', '2016-05-20 00:00:00', 0),
(3, '金絲森林渲染皂', 0, 300, '', '', '', '2016-05-20 00:00:00', '2016-05-20 00:00:00', 0),
(4, '三三台東意象禮盒組', 0, 900, '', '', '', '2016-05-20 00:00:00', '2016-05-20 00:00:00', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `MSGMAS`
--

CREATE TABLE `MSGMAS` (
  `MSGNO` int(15) NOT NULL,
  `EMAIL` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `MSGTXT` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `MSGPHOTO` mediumblob NOT NULL,
  `MSGPHOTOTYPE` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `MSGVIDEO` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `MSGSTAT` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'A',
  `REWARDSTAT` tinyint(1) NOT NULL DEFAULT '0',
  `CREATEDATE` datetime NOT NULL,
  `PUBLICDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `ORDITEMMAS`
--

CREATE TABLE `ORDITEMMAS` (
  `ORDNO` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ITEMNO` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ORDAMT` int(8) DEFAULT NULL,
  `EMAIL` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `CREATEDATE` datetime NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `ORDMAS`
--

CREATE TABLE `ORDMAS` (
  `ORDNO` int(15) NOT NULL,
  `ORDTYPE` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `EMAIL` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `INVOICENO` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `BACKSTAT` tinyint(1) DEFAULT '1',
  `ORDSTAT` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'E',
  `PAYSTAT` tinyint(1) DEFAULT '0',
  `PAYTYPE` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ORDINST` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `TOTALPRICE` int(8) DEFAULT '0',
  `REALPRICE` int(8) NOT NULL,
  `SHIPFEE` int(8) DEFAULT '0',
  `TOTALAMT` int(8) DEFAULT '0',
  `DATEREQ` date DEFAULT NULL,
  `CREATEDATE` datetime NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `OWNMAS`
--

CREATE TABLE `OWNMAS` (
  `COMNM` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `COMADD` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `COMTEL` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `COMEMAIL` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `COMTAXID` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `NORDNOG` int(15) NOT NULL,
  `NORDNOS` int(15) NOT NULL,
  `NMSGNO` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 資料表的匯出資料 `OWNMAS`
--

INSERT INTO `OWNMAS` (`COMNM`, `COMADD`, `COMTEL`, `COMEMAIL`, `COMTAXID`, `NORDNOG`, `NORDNOS`, `NMSGNO`) VALUES
('Trisoap', '', '', '', '', 100000001, 900000001, 100001);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `CUSMAS`
--
ALTER TABLE `CUSMAS`
  ADD PRIMARY KEY (`EMAIL`);

--
-- 資料表索引 `ITEMMAS`
--
ALTER TABLE `ITEMMAS`
  ADD PRIMARY KEY (`ITEMNO`);

--
-- 資料表索引 `MSGMAS`
--
ALTER TABLE `MSGMAS`
  ADD PRIMARY KEY (`MSGNO`);

--
-- 資料表索引 `ORDITEMMAS`
--
ALTER TABLE `ORDITEMMAS`
  ADD PRIMARY KEY (`ORDNO`,`ITEMNO`,`EMAIL`);

--
-- 資料表索引 `ORDMAS`
--
ALTER TABLE `ORDMAS`
  ADD PRIMARY KEY (`ORDNO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
