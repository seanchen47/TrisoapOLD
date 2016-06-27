-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2016 年 06 月 27 日 13:03
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `MSGMAS`
--

INSERT INTO `MSGMAS` (`MSGNO`, `EMAIL`, `MSGTXT`, `MSGPHOTO`, `MSGPHOTOTYPE`, `MSGVIDEO`, `MSGSTAT`, `REWARDSTAT`, `CREATEDATE`, `PUBLICDATE`, `ACTCODE`) VALUES
(100000, 'B02705028', '123', '', '', '', 'A', 0, '2016-06-23 01:47:02', '0000-00-00 00:00:00', 1),
(100001, 'a0922825881@gmail.com', '123123', '', '', '', 'A', 0, '2016-06-23 01:49:55', '0000-00-00 00:00:00', 1),
(100002, 'tim841206@yahoo.com.tw', '123', '', '', '', 'A', 0, '2016-06-23 01:56:49', '0000-00-00 00:00:00', 1),
(100003, 'B02705028', '1231', '', '', '', 'A', 0, '2016-06-25 16:08:54', '0000-00-00 00:00:00', 1),
(100004, 'B02705028', '123', '', '', '', 'A', 0, '2016-06-25 16:09:05', '0000-00-00 00:00:00', 1),
(100005, 'B02705028', '123', '', '', '', 'A', 0, '2016-06-25 16:09:18', '0000-00-00 00:00:00', 1),
(100006, 'B02705028', '123', '', '', '', 'A', 0, '2016-06-25 16:10:32', '0000-00-00 00:00:00', 1),
(100007, 'B02705028', '123', '', '', '', 'A', 0, '2016-06-25 16:11:00', '0000-00-00 00:00:00', 1),
(100008, 'a0922825881@gmail.com', '123', '', '', '', 'A', 0, '2016-06-25 16:11:56', '0000-00-00 00:00:00', 1),
(100009, 'a0922825881@gmail.com', '123', '', '', '', 'A', 0, '2016-06-25 16:12:09', '0000-00-00 00:00:00', 1),
(100010, 'a0922825881@gmail.com', '123', '', '', '', 'A', 0, '2016-06-25 16:19:34', '0000-00-00 00:00:00', 1),
(100011, 'a0922825881@gmail.com', '123', '', '', '', 'A', 0, '2016-06-25 16:19:43', '0000-00-00 00:00:00', 1),
(100012, 'a0922825881@gmail.com', '123', '', '', '', 'A', 0, '2016-06-25 16:28:21', '0000-00-00 00:00:00', 1),
(100013, 'a0922825881@gmail.com', '333', '', '', '', 'A', 0, '2016-06-25 16:31:53', '0000-00-00 00:00:00', 1),
(100014, 'a0922825881@gmail.com', '123', '', '', '', 'A', 0, '2016-06-25 16:32:13', '0000-00-00 00:00:00', 1),
(100015, 'a0922825881@gmail.com', '123123', '', '', '', 'A', 0, '2016-06-25 16:48:58', '0000-00-00 00:00:00', 1),
(100016, 'a0922825881@gmail.com', '123', '', '', '', 'A', 0, '2016-06-25 16:52:53', '0000-00-00 00:00:00', 1),
(100017, 'a0922825881@gmail.com', '123', '', '', '', 'A', 0, '2016-06-25 16:53:03', '0000-00-00 00:00:00', 1),
(100018, 'a0922825881@gmail.com', '123', '', '', '', 'A', 0, '2016-06-25 16:55:20', '0000-00-00 00:00:00', 1),
(100019, 'a0922825881@gmail.com', '123', '', '', '', 'A', 0, '2016-06-25 16:55:43', '0000-00-00 00:00:00', 1),
(100020, 'a0922825881@gmail.com', '123', '', '', '', 'A', 0, '2016-06-25 16:56:20', '0000-00-00 00:00:00', 1),
(100021, 'a0922825881@gmail.com', '123', '', '', '', 'A', 0, '2016-06-25 17:02:08', '0000-00-00 00:00:00', 1),
(100022, 'a0922825881@gmail.com', '123123', '', '', '', 'A', 0, '2016-06-25 17:02:23', '0000-00-00 00:00:00', 1),
(100023, 'a0922825881@gmail.com', '嗨嗨', '', '', '', 'A', 0, '2016-06-25 17:05:20', '0000-00-00 00:00:00', 1),
(100024, 'a0922825881@gmail.com', '123', '', '', '', 'A', 0, '2016-06-25 17:07:41', '0000-00-00 00:00:00', 1),
(100025, 'a0922825881@gmail.com', '123', '', '', '', 'A', 0, '2016-06-25 17:10:08', '0000-00-00 00:00:00', 1),
(100026, 'a0922825881@gmail.com', '123', '', '', '', 'A', 0, '2016-06-25 17:16:01', '0000-00-00 00:00:00', 1),
(100027, 'a0922825881@gmail.com', '123', '', '', '', 'A', 0, '2016-06-25 17:16:53', '0000-00-00 00:00:00', 1),
(100028, 'a0922825881@gmail.com', '123', '', '', '', 'A', 0, '2016-06-25 17:17:35', '0000-00-00 00:00:00', 1),
(100029, 'a0922825881@gmail.com', '123', '', '', '', 'A', 0, '2016-06-25 17:19:57', '0000-00-00 00:00:00', 1),
(100030, 'a0922825881@gmail.com', '121212', '', '', '', 'A', 0, '2016-06-25 17:21:48', '0000-00-00 00:00:00', 1),
(100031, 'a0922825881@gmail.com', '123', '', '', '', 'A', 0, '2016-06-25 17:26:45', '0000-00-00 00:00:00', 1),
(100032, 'a0922825881@gmail.com', '123', '', '', '', 'A', 0, '2016-06-25 17:39:04', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `ORDITEMMAS`
--

CREATE TABLE `ORDITEMMAS` (
  `ORDNO` int(15) NOT NULL,
  `ITEMNO` int(15) NOT NULL,
  `ORDAMT` int(8) DEFAULT NULL,
  `CREATEDATE` datetime NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `PAYTYPE` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ORDINST` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `TOTALPRICE` int(8) DEFAULT '0',
  `REALPRICE` int(8) NOT NULL,
  `SHIPFEE` int(8) DEFAULT '0',
  `TOTALAMT` int(8) DEFAULT '0',
  `DATEREQ` date DEFAULT NULL,
  `CREATEDATE` datetime NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `OWNMAS`
--

INSERT INTO `OWNMAS` (`COMNM`, `COMADD`, `COMTEL`, `COMEMAIL`, `COMTAXID`, `NORDNOG`, `NORDNOS`, `NMSGNO`) VALUES
('Trisoap', '', '', '', '', 100000000, 900000000, 100033);

--
-- 已匯出資料表的索引
--

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
  ADD PRIMARY KEY (`ORDNO`,`ITEMNO`);

--
-- 資料表索引 `ORDMAS`
--
ALTER TABLE `ORDMAS`
  ADD PRIMARY KEY (`ORDNO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
