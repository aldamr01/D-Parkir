-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 Apr 2018 pada 08.45
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dparking`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `plat_nomor` varchar(30) NOT NULL,
  `tgl_masuk` varchar(30) NOT NULL,
  `tgl_keluar` varchar(30) NOT NULL,
  `no_laporan` int(11) NOT NULL,
  `val` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_laporan`
--

INSERT INTO `tb_laporan` (`plat_nomor`, `tgl_masuk`, `tgl_keluar`, `no_laporan`, `val`) VALUES
('W 666 YY', '16-04-2018', '2018-04-16 11:53:46', 1, 1),
('L 6452 TR', '16-04-2018', '2018-04-16 13:25:09', 2, 1),
('L 1927 ZZ', '16-04-2018', '2018-04-16 13:40:25', 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_report`
--

CREATE TABLE `tb_report` (
  `no_report` int(11) NOT NULL,
  `no_plat` char(15) NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `tgl_masuk` varchar(15) NOT NULL,
  `jam_masuk` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_report`
--

INSERT INTO `tb_report` (`no_report`, `no_plat`, `jenis_kendaraan`, `tgl_masuk`, `jam_masuk`, `status`) VALUES
(4, 'W 5153 ZZ', 'mobil pribadi', '16-04-2018', '2018-04-16 05:05:31.408772', 'on_area');

--
-- Trigger `tb_report`
--
DELIMITER $$
CREATE TRIGGER `laporan` AFTER DELETE ON `tb_report` FOR EACH ROW INSERT INTO tb_laporan
   ( plat_nomor,
     tgl_masuk,
     tgl_keluar,val)
   VALUES
   ( OLD.no_plat,
     OLD.tgl_masuk,
     SYSDATE(),"1" )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `no_ruang` int(11) NOT NULL,
  `id_ruang` char(5) NOT NULL,
  `lantai_ruang` char(10) NOT NULL,
  `kordinat_ruang` varchar(50) NOT NULL,
  `status_ruang` char(15) NOT NULL,
  `shape_ruang` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ruang`
--

INSERT INTO `tb_ruang` (`no_ruang`, `id_ruang`, `lantai_ruang`, `kordinat_ruang`, `status_ruang`, `shape_ruang`) VALUES
(1, 'LA1', 'floor_1', '2654,241,2537,293', 'W 5153 ZZ', 'rect'),
(2, 'LA2', 'floor_1', '2537,307,2659,359', 'W 4221 XZ', 'rect'),
(3, 'LA3', 'floor_1', '2533,405,2650,455', 'W 7271 ZZ', 'rect'),
(4, 'LA4', 'floor_1', '2532,465,2650,521', 'kosong', 'rect'),
(5, 'LA5', 'floor_1', '2537,549,2650,600', 'kosong', 'rect'),
(6, 'LA6', 'floor_1', '2537,619,2659,671', 'kosong', 'rect'),
(7, 'LA7', 'floor_1', '2537,690,2659,741', 'L 1927 WN', 'rect'),
(8, 'LA8', 'floor_1', '2537,765,2654,821', 'kosong', 'rect'),
(9, 'LA9', 'floor_1', '2537,835,2654,887', 'kosong', 'rect'),
(10, 'LA10', 'floor_1', '2537,915,2650,967', 'L 1927 ZZ', 'rect'),
(11, 'LA11', 'floor_1', '2537,985,2654,1037', 'kosong', 'rect'),
(12, 'LA12', 'floor_1', '2537,1065,2654,1117', 'kosong', 'rect'),
(13, 'LA13', 'floor_1', '2532,1131,2650,1183', 'kosong', 'rect'),
(14, 'LA14', 'floor_1', '2537,1206,2650,1258', 'kosong', 'rect'),
(15, 'LA15', 'floor_1', '2532,1277,2654,1328', 'kosong', 'rect'),
(16, 'LA16', 'floor_1', '2260,554,2377,600', 'W 5152 ZZ', 'rect'),
(17, 'LA17', 'floor_1', '2260,619,2377,666', 'kosong', 'rect'),
(18, 'LA18', 'floor_1', '2260,689,2377,740', 'kosong', 'rect'),
(19, 'LA19', 'floor_1', '2255,768,2377,825', 'kosong', 'rect'),
(20, 'LA20', 'floor_1', '2260,834,2377,886', 'kosong', 'rect'),
(21, 'LA21', 'floor_1', '2255,914,2377,966', 'kosong', 'rect'),
(22, 'LA22', 'floor_1', '2260,980,2373,1036', 'kosong', 'rect'),
(23, 'LA23', 'floor_1', '2255,1060,2373,1116', 'kosong', 'rect'),
(24, 'LA24', 'floor_1', '2260,1130,2377,1186', 'kosong', 'rect'),
(25, 'LA25', 'floor_1', '2063,543,2180,609', 'kosong', 'rect'),
(26, 'LA26', 'floor_1', '2067,627,2185,684', 'kosong', 'rect'),
(27, 'LA27', 'floor_1', '2067,693,2180,740', 'kosong', 'rect'),
(28, 'LA28', 'floor_1', '2063,764,2180,815', 'kosong', 'rect'),
(29, 'LA29', 'floor_1', '2067,830,2180,886', 'kosong', 'rect'),
(30, 'LA30', 'floor_1', '2063,910,2185,962', 'kosong', 'rect'),
(31, 'LA31', 'floor_1', '2067,971,2185,1032', 'kosong', 'rect'),
(32, 'LA32', 'floor_1', '2067,1056,2185,1112', 'kosong', 'rect'),
(33, 'LA33', 'floor_1', '2067,1121,2180,1178', 'kosong', 'rect'),
(34, 'LA34', 'floor_1', '1795,619,1912,670', 'kosong', 'rect'),
(35, 'LA35', 'floor_1', '1790,690,1908,741', 'kosong', 'rect'),
(36, 'LA36', 'floor_1', '1790,770,1912,826', 'kosong', 'rect'),
(37, 'LA37', 'floor_1', '1790,840,1912,892', 'kosong', 'rect'),
(38, 'LA38', 'floor_1', '1790,915,1908,966', 'kosong', 'rect'),
(39, 'LA39', 'floor_1', '1790,985,1908,1037', 'kosong', 'rect'),
(40, 'LA40', 'floor_1', '1790,1061,1908,1117', 'kosong', 'rect'),
(41, 'LA41', 'floor_1', '1790,1126,1908,1183', 'kosong', 'rect'),
(42, 'LA42', 'floor_1', '1598,238,1720,294', 'kosong', 'rect'),
(43, 'LA43', 'floor_1', '1598,308,1715,355', 'kosong', 'rect'),
(44, 'LA44', 'floor_1', '1603,407,1720,459', 'kosong', 'rect'),
(45, 'LA45', 'floor_1', '1598,473,1715,524', 'kosong', 'rect'),
(46, 'LA46', 'floor_1', '1598,557,1720,609', 'kosong', 'rect'),
(47, 'LA47', 'floor_1', '1598,642,1720,693', 'kosong', 'rect'),
(48, 'LA48', 'floor_1', '1598,707,1720,754', 'kosong', 'rect'),
(49, 'LA49', 'floor_1', '1593,773,1715,829', 'kosong', 'rect'),
(50, 'LA50', 'floor_1', '1603,840,1715,890', 'kosong', 'rect'),
(51, 'LA51', 'floor_1', '1593,918,1715,970', 'kosong', 'rect'),
(52, 'LA52', 'floor_1', '1598,984,1715,1040', 'kosong', 'rect'),
(53, 'LA53', 'floor_1', '1598,1063,1720,1124', 'kosong', 'rect'),
(54, 'LA54', 'floor_1', '1593,1133,1715,1190', 'kosong', 'rect'),
(55, 'LA55', 'floor_1', '1523,120,1574,238', 'kosong', 'rect'),
(56, 'LA56', 'floor_1', '1452,120,1509,238', 'kosong', 'rect'),
(57, 'LA57', 'floor_1', '1368,120,1424,233', 'kosong', 'rect'),
(58, 'LA58', 'floor_1', '1297,120,1358,233', 'kosong', 'rect'),
(59, 'LA59', 'floor_1', '1213,121,1269,234', 'kosong', 'rect'),
(60, 'LA60', 'floor_1', '1147,120,1199,238', 'kosong', 'rect'),
(61, 'LA61', 'floor_1', '1063,121,1119,234', 'kosong', 'rect'),
(62, 'LA62', 'floor_1', '988,121,1049,234', 'kosong', 'rect'),
(63, 'LA63', 'floor_1', '917,121,969,234', 'kosong', 'rect'),
(64, 'LA64', 'floor_1', '856,121,908,234', 'kosong', 'rect'),
(65, 'LA65', 'floor_1', '1368,398,1419,506', 'kosong', 'rect'),
(66, 'LA66', 'floor_1', '1297,397,1354,514', 'kosong', 'rect'),
(67, 'LA67', 'floor_1', '1218,398,1274,511', 'kosong', 'rect'),
(68, 'LA68', 'floor_1', '1142,398,1199,515', 'kosong', 'rect'),
(69, 'LA69', 'floor_1', '1063,398,1124,510', 'kosong', 'rect'),
(70, 'LA70', 'floor_1', '988,398,1049,510', 'kosong', 'rect'),
(71, 'LA71', 'floor_1', '1321,567,1438,618', 'kosong', 'rect'),
(72, 'LA72', 'floor_1', '1321,829,1438,885', 'kosong', 'rect'),
(73, 'LA73', 'floor_1', '1321,890,1434,923,1419,970,1302,942', 'kosong', 'poly'),
(74, 'LA74', 'floor_1', '1321,989,1438,1040', 'kosong', 'rect'),
(75, 'LA75', 'floor_1', '1326,1063,1438,1115', 'kosong', 'rect'),
(76, 'LA76', 'floor_1', '1326,1130,1443,1186', 'kosong', 'rect'),
(77, 'LA77', 'floor_1', '1321,1200,1448,1256', 'kosong', 'rect'),
(78, 'LA78', 'floor_1', '1255,613,1236,665,1335,698,1354,651', 'kosong', 'poly'),
(79, 'LA79', 'floor_1', '1222,689,1204,740,1316,769,1335,717', 'kosong', 'poly'),
(80, 'LA80', 'floor_1', '1194,773,1180,829,1293,857,1307,806', 'kosong', 'poly'),
(81, 'LA81', 'floor_1', '1175,853,1161,904,1274,937,1293,881', 'kosong', 'poly'),
(82, 'LA82', 'floor_1', '1152,932,1138,989,1246,1017,1269,965', 'kosong', 'poly'),
(83, 'LA83', 'floor_1', '1133,1008,1110,1059,1227,1092,1241,1036', 'kosong', 'poly'),
(84, 'LA84', 'floor_1', '1110,1083,1086,1139,1199,1172,1218,1120', 'kosong', 'poly'),
(85, 'LA85', 'floor_1', '1086,1163,1067,1214,1180,1252,1199,1195', 'kosong', 'poly'),
(86, 'LA86', 'floor_1', '992,547,978,594,1086,627,1110,580', 'kosong', 'poly'),
(87, 'LA87', 'floor_1', '969,618,955,670,1067,707,1081,651', 'kosong', 'poly'),
(88, 'LA88', 'floor_1', '945,702,936,754,1044,792,1058,735', 'kosong', 'poly'),
(89, 'LA89', 'floor_1', '922,777,908,829,1025,862,1039,806', 'kosong', 'poly'),
(90, 'LA90', 'floor_1', '903,857,889,914,997,947,1016,890', 'kosong', 'poly'),
(91, 'LA91', 'floor_1', '884,505,861,561,964,599,983,543', 'kosong', 'poly'),
(92, 'LA92', 'floor_1', '861,581,842,637,945,670,959,614', 'kosong', 'poly'),
(93, 'LA93', 'floor_1', '833,670,814,722,922,754,931,703', 'kosong', 'poly'),
(94, 'LA94', 'floor_1', '814,740,790,796,903,834,917,773', 'kosong', 'poly'),
(95, 'LA95', 'floor_1', '790,824,776,871,880,909,894,857', 'kosong', 'poly'),
(96, 'LA96', 'floor_1', '767,900,748,951,856,989,880,937', 'kosong', 'poly'),
(97, 'LA97', 'floor_1', '715,205,701,257,809,290,823,234', 'kosong', 'poly'),
(98, 'LA98', 'floor_1', '687,281,673,332,786,375,804,313', 'kosong', 'poly'),
(99, 'LA99', 'floor_1', '673,351,654,403,762,436,781,384', 'kosong', 'poly'),
(100, 'LA100', 'floor_1', '645,444,626,496,739,529,758,473', 'kosong', 'poly'),
(101, 'LA101', 'floor_1', '621,514,603,571,720,599,739,547', 'kosong', 'poly'),
(102, 'LA102', 'floor_1', '598,599,579,656,692,684,711,632', 'kosong', 'poly'),
(103, 'LA103', 'floor_1', '574,674,556,730,678,759,687,707', 'kosong', 'poly'),
(104, 'LA104', 'floor_1', '560,754,532,806,650,843,664,787', 'kosong', 'poly'),
(105, 'LA105', 'floor_1', '532,829,513,880,621,908,640,857', 'kosong', 'poly'),
(106, 'LA106', 'floor_1', '2058,1359,2067,1416,2180,1406,2175,1350', 'kosong', 'poly'),
(107, 'LA107', 'floor_1', '1912,1360,1790,1411', 'kosong', 'rect'),
(108, 'LA108', 'floor_1', '1593,1355,1711,1411', 'kosong', 'rect'),
(109, 'LB1', 'floor_2', '2654,241,2537,293', 'kosong', 'rect'),
(110, 'LB2', 'floor_2', '2537,307,2659,359', 'kosong', 'rect'),
(111, 'LB3', 'floor_2', '2533,405,2650,455', 'kosong', 'rect'),
(112, 'LB4', 'floor_2', '2532,465,2650,521', 'kosong', 'rect'),
(113, 'LB5', 'floor_2', '2537,549,2650,600', 'kosong', 'rect'),
(114, 'LB6', 'floor_2', '2537,619,2659,671', 'kosong', 'rect'),
(115, 'LB7', 'floor_2', '2537,690,2659,741', 'kosong', 'rect'),
(116, 'LB8', 'floor_2', '2537,765,2654,821', 'kosong', 'rect'),
(117, 'LB9', 'floor_2', '2537,835,2654,887', 'kosong', 'rect'),
(118, 'LB10', 'floor_2', '2537,915,2650,967', 'kosong', 'rect'),
(119, 'LB11', 'floor_2', '2537,985,2654,1037', 'kosong', 'rect'),
(120, 'LB12', 'floor_2', '2537,1065,2654,1117', 'kosong', 'rect'),
(121, 'LB13', 'floor_2', '2532,1131,2650,1183', 'kosong', 'rect'),
(122, 'LB14', 'floor_2', '2537,1206,2650,1258', 'kosong', 'rect'),
(123, 'LB15', 'floor_2', '2532,1277,2654,1328', 'kosong', 'rect'),
(124, 'LB16', 'floor_2', '2260,554,2377,600', 'kosong', 'rect'),
(125, 'LB17', 'floor_2', '2260,619,2377,666', 'kosong', 'rect'),
(126, 'LB18', 'floor_2', '2260,689,2377,740', 'kosong', 'rect'),
(127, 'LB19', 'floor_2', '2255,768,2377,825', 'kosong', 'rect'),
(128, 'LB20', 'floor_2', '2260,834,2377,886', 'kosong', 'rect'),
(129, 'LB21', 'floor_2', '2255,914,2377,966', 'kosong', 'rect'),
(130, 'LB22', 'floor_2', '2260,980,2373,1036', 'kosong', 'rect'),
(131, 'LB23', 'floor_2', '2255,1060,2373,1116', 'kosong', 'rect'),
(132, 'LB24', 'floor_2', '2260,1130,2377,1186', 'kosong', 'rect'),
(133, 'LB25', 'floor_2', '2063,543,2180,609', 'kosong', 'rect'),
(134, 'LB26', 'floor_2', '2067,627,2185,684', 'kosong', 'rect'),
(135, 'LB27', 'floor_2', '2067,693,2180,740', 'kosong', 'rect'),
(136, 'LB28', 'floor_2', '2063,764,2180,815', 'kosong', 'rect'),
(137, 'LB29', 'floor_2', '2067,830,2180,886', 'kosong', 'rect'),
(138, 'LB30', 'floor_2', '2063,910,2185,962', 'kosong', 'rect'),
(139, 'LB31', 'floor_2', '2067,971,2185,1032', 'kosong', 'rect'),
(140, 'LB32', 'floor_2', '2067,1056,2185,1112', 'kosong', 'rect'),
(141, 'LB33', 'floor_2', '2067,1121,2180,1178', 'kosong', 'rect'),
(142, 'LB34', 'floor_2', '1795,619,1912,670', 'kosong', 'rect'),
(143, 'LB35', 'floor_2', '1790,690,1908,741', 'kosong', 'rect'),
(144, 'LB36', 'floor_2', '1790,770,1912,826', 'kosong', 'rect'),
(145, 'LB37', 'floor_2', '1790,840,1912,892', 'kosong', 'rect'),
(146, 'LB38', 'floor_2', '1790,915,1908,966', 'kosong', 'rect'),
(147, 'LB39', 'floor_2', '1790,985,1908,1037', 'kosong', 'rect'),
(148, 'LB40', 'floor_2', '1790,1061,1908,1117', 'kosong', 'rect'),
(149, 'LB41', 'floor_2', '1790,1126,1908,1183', 'kosong', 'rect'),
(150, 'LB42', 'floor_2', '1598,238,1720,294', 'kosong', 'rect'),
(151, 'LB43', 'floor_2', '1598,308,1715,355', 'kosong', 'rect'),
(152, 'LB44', 'floor_2', '1603,407,1720,459', 'kosong', 'rect'),
(153, 'LB45', 'floor_2', '1598,473,1715,524', 'kosong', 'rect'),
(154, 'LB46', 'floor_2', '1598,557,1720,609', 'kosong', 'rect'),
(155, 'LB47', 'floor_2', '1598,642,1720,693', 'kosong', 'rect'),
(156, 'LB48', 'floor_2', '1598,707,1720,754', 'kosong', 'rect'),
(157, 'LB49', 'floor_2', '1593,773,1715,829', 'kosong', 'rect'),
(158, 'LB50', 'floor_2', '1603,840,1715,890', 'kosong', 'rect'),
(159, 'LB51', 'floor_2', '1593,918,1715,970', 'kosong', 'rect'),
(160, 'LB52', 'floor_2', '1598,984,1715,1040', 'kosong', 'rect'),
(161, 'LB53', 'floor_2', '1598,1063,1720,1124', 'kosong', 'rect'),
(162, 'LB54', 'floor_2', '1593,1133,1715,1190', 'kosong', 'rect'),
(163, 'LB55', 'floor_2', '1523,120,1574,238', 'kosong', 'rect'),
(164, 'LB56', 'floor_2', '1452,120,1509,238', 'kosong', 'rect'),
(165, 'LB57', 'floor_2', '1368,120,1424,233', 'kosong', 'rect'),
(166, 'LB58', 'floor_2', '1297,120,1358,233', 'kosong', 'rect'),
(167, 'LB59', 'floor_2', '1213,121,1269,234', 'kosong', 'rect'),
(168, 'LB60', 'floor_2', '1147,120,1199,238', 'kosong', 'rect'),
(169, 'LB61', 'floor_2', '1063,121,1119,234', 'kosong', 'rect'),
(170, 'LB62', 'floor_2', '988,121,1049,234', 'kosong', 'rect'),
(171, 'LB63', 'floor_2', '917,121,969,234', 'kosong', 'rect'),
(172, 'LB64', 'floor_2', '856,121,908,234', 'kosong', 'rect'),
(173, 'LB65', 'floor_2', '1368,398,1419,506', 'kosong', 'rect'),
(174, 'LB66', 'floor_2', '1297,397,1354,514', 'kosong', 'rect'),
(175, 'LB67', 'floor_2', '1218,398,1274,511', 'kosong', 'rect'),
(176, 'LB68', 'floor_2', '1142,398,1199,515', 'kosong', 'rect'),
(177, 'LB69', 'floor_2', '1063,398,1124,510', 'kosong', 'rect'),
(178, 'LB70', 'floor_2', '988,398,1049,510', 'kosong', 'rect'),
(179, 'LB71', 'floor_2', '1321,567,1438,618', 'kosong', 'rect'),
(180, 'LB72', 'floor_2', '1321,829,1438,885', 'kosong', 'rect'),
(181, 'LB73', 'floor_2', '1321,890,1434,923,1419,970,1302,942', 'kosong', 'poly'),
(182, 'LB74', 'floor_2', '1321,989,1438,1040', 'kosong', 'rect'),
(183, 'LB75', 'floor_2', '1326,1063,1438,1115', 'kosong', 'rect'),
(184, 'LB76', 'floor_2', '1326,1130,1443,1186', 'kosong', 'rect'),
(185, 'LB77', 'floor_2', '1321,1200,1448,1256', 'kosong', 'rect'),
(186, 'LB78', 'floor_2', '1255,613,1236,665,1335,698,1354,651', 'kosong', 'poly'),
(187, 'LB79', 'floor_2', '1222,689,1204,740,1316,769,1335,717', 'kosong', 'poly'),
(188, 'LB80', 'floor_2', '1194,773,1180,829,1293,857,1307,806', 'kosong', 'poly'),
(189, 'LB81', 'floor_2', '1175,853,1161,904,1274,937,1293,881', 'kosong', 'poly'),
(190, 'LB82', 'floor_2', '1152,932,1138,989,1246,1017,1269,965', 'kosong', 'poly'),
(191, 'LB83', 'floor_2', '1133,1008,1110,1059,1227,1092,1241,1036', 'kosong', 'poly'),
(192, 'LB84', 'floor_2', '1110,1083,1086,1139,1199,1172,1218,1120', 'kosong', 'poly'),
(193, 'LB85', 'floor_2', '1086,1163,1067,1214,1180,1252,1199,1195', 'kosong', 'poly'),
(194, 'LB86', 'floor_2', '992,547,978,594,1086,627,1110,580', 'kosong', 'poly'),
(195, 'LB87', 'floor_2', '969,618,955,670,1067,707,1081,651', 'kosong', 'poly'),
(196, 'LB88', 'floor_2', '945,702,936,754,1044,792,1058,735', 'kosong', 'poly'),
(197, 'LB89', 'floor_2', '922,777,908,829,1025,862,1039,806', 'kosong', 'poly'),
(198, 'LB90', 'floor_2', '903,857,889,914,997,947,1016,890', 'kosong', 'poly'),
(199, 'LB91', 'floor_2', '884,505,861,561,964,599,983,543', 'kosong', 'poly'),
(200, 'LB92', 'floor_2', '861,581,842,637,945,670,959,614', 'kosong', 'poly'),
(201, 'LB93', 'floor_2', '833,670,814,722,922,754,931,703', 'kosong', 'poly'),
(202, 'LB94', 'floor_2', '814,740,790,796,903,834,917,773', 'kosong', 'poly'),
(203, 'LB95', 'floor_2', '790,824,776,871,880,909,894,857', 'kosong', 'poly'),
(204, 'LB96', 'floor_2', '767,900,748,951,856,989,880,937', 'kosong', 'poly'),
(205, 'LB97', 'floor_2', '715,205,701,257,809,290,823,234', 'kosong', 'poly'),
(206, 'LB98', 'floor_2', '687,281,673,332,786,375,804,313', 'kosong', 'poly'),
(207, 'LB99', 'floor_2', '673,351,654,403,762,436,781,384', 'kosong', 'poly'),
(208, 'LB100', 'floor_2', '645,444,626,496,739,529,758,473', 'kosong', 'poly'),
(209, 'LB101', 'floor_2', '621,514,603,571,720,599,739,547', 'kosong', 'poly'),
(210, 'LB102', 'floor_2', '598,599,579,656,692,684,711,632', 'kosong', 'poly'),
(211, 'LB103', 'floor_2', '574,674,556,730,678,759,687,707', 'kosong', 'poly'),
(212, 'LB104', 'floor_2', '560,754,532,806,650,843,664,787', 'kosong', 'poly'),
(213, 'LB105', 'floor_2', '532,829,513,880,621,908,640,857', 'kosong', 'poly'),
(214, 'LB106', 'floor_2', '2058,1359,2067,1416,2180,1406,2175,1350', 'kosong', 'poly'),
(215, 'LB107', 'floor_2', '1912,1360,1790,1411', 'kosong', 'rect'),
(216, 'LB108', 'floor_2', '1593,1355,1711,1411', 'kosong', 'rect'),
(217, 'LB109', 'floor_2', '1302,1417,1419,1474', 'kosong', 'rect'),
(218, 'LB110', 'floor_2', '936,1394,903,1502,959,1521,988,1408', 'kosong', 'poly'),
(219, 'LB111', 'floor_2', '865,1375,833,1483,894,1507,922,1394', 'kosong', 'poly'),
(220, 'LB112', 'floor_2', '2429,155,2476,272', 'kosong', 'rect'),
(221, 'LB113', 'floor_2', '2297,155,2349,278', 'kosong', 'rect'),
(222, 'LB114', 'floor_2', '2236,160,2283,268', 'kosong', 'rect'),
(223, 'LB115', 'floor_2', '2152,155,2204,273', 'kosong', 'rect'),
(224, 'LB116', 'floor_2', '2081,155,2133,267', 'kosong', 'rect'),
(225, 'LB117', 'floor_2', '1997,155,2058,272', 'kosong', 'rect'),
(226, 'LB118', 'floor_2', '1927,155,1988,277', 'kosong', 'rect'),
(227, 'LC1', 'floor_3', '2654,241,2537,293', 'kosong', 'rect'),
(228, 'LC2', 'floor_3', '2537,307,2659,359', 'kosong', 'rect'),
(229, 'LC3', 'floor_3', '2533,405,2650,455', 'kosong', 'rect'),
(230, 'LC4', 'floor_3', '2532,465,2650,521', 'kosong', 'rect'),
(231, 'LC5', 'floor_3', '2537,549,2650,600', 'kosong', 'rect'),
(232, 'LC6', 'floor_3', '2537,619,2659,671', 'kosong', 'rect'),
(233, 'LC7', 'floor_3', '2537,690,2659,741', 'kosong', 'rect'),
(234, 'LC8', 'floor_3', '2537,765,2654,821', 'kosong', 'rect'),
(235, 'LC9', 'floor_3', '2537,835,2654,887', 'kosong', 'rect'),
(236, 'LC10', 'floor_3', '2537,915,2650,967', 'kosong', 'rect'),
(237, 'LC11', 'floor_3', '2537,985,2654,1037', 'kosong', 'rect'),
(238, 'LC12', 'floor_3', '2537,1065,2654,1117', 'kosong', 'rect'),
(239, 'LC13', 'floor_3', '2532,1131,2650,1183', 'kosong', 'rect'),
(240, 'LC14', 'floor_3', '2537,1206,2650,1258', 'kosong', 'rect'),
(241, 'LC15', 'floor_3', '2532,1277,2654,1328', 'kosong', 'rect'),
(242, 'LC16', 'floor_3', '2260,554,2377,600', 'kosong', 'rect'),
(243, 'LC17', 'floor_3', '2260,619,2377,666', 'kosong', 'rect'),
(244, 'LC18', 'floor_3', '2260,689,2377,740', 'kosong', 'rect'),
(245, 'LC19', 'floor_3', '2255,768,2377,825', 'kosong', 'rect'),
(246, 'LC20', 'floor_3', '2260,834,2377,886', 'kosong', 'rect'),
(247, 'LC21', 'floor_3', '2255,914,2377,966', 'kosong', 'rect'),
(248, 'LC22', 'floor_3', '2260,980,2373,1036', 'kosong', 'rect'),
(249, 'LC23', 'floor_3', '2255,1060,2373,1116', 'kosong', 'rect'),
(250, 'LC24', 'floor_3', '2260,1130,2377,1186', 'kosong', 'rect'),
(251, 'LC25', 'floor_3', '2063,543,2180,609', 'kosong', 'rect'),
(252, 'LC26', 'floor_3', '2067,627,2185,684', 'kosong', 'rect'),
(253, 'LC27', 'floor_3', '2067,693,2180,740', 'kosong', 'rect'),
(254, 'LC28', 'floor_3', '2063,764,2180,815', 'kosong', 'rect'),
(255, 'LC29', 'floor_3', '2067,830,2180,886', 'kosong', 'rect'),
(256, 'LC30', 'floor_3', '2063,910,2185,962', 'kosong', 'rect'),
(257, 'LC31', 'floor_3', '2067,971,2185,1032', 'kosong', 'rect'),
(258, 'LC32', 'floor_3', '2067,1056,2185,1112', 'kosong', 'rect'),
(259, 'LC33', 'floor_3', '2067,1121,2180,1178', 'kosong', 'rect'),
(260, 'LC34', 'floor_3', '1795,619,1912,670', 'kosong', 'rect'),
(261, 'LC35', 'floor_3', '1790,690,1908,741', 'kosong', 'rect'),
(262, 'LC36', 'floor_3', '1790,770,1912,826', 'kosong', 'rect'),
(263, 'LC37', 'floor_3', '1790,840,1912,892', 'kosong', 'rect'),
(264, 'LC38', 'floor_3', '1790,915,1908,966', 'kosong', 'rect'),
(265, 'LC39', 'floor_3', '1790,985,1908,1037', 'kosong', 'rect'),
(266, 'LC40', 'floor_3', '1790,1061,1908,1117', 'kosong', 'rect'),
(267, 'LC41', 'floor_3', '1790,1126,1908,1183', 'kosong', 'rect'),
(268, 'LC42', 'floor_3', '1598,238,1720,294', 'kosong', 'rect'),
(269, 'LC43', 'floor_3', '1598,308,1715,355', 'kosong', 'rect'),
(270, 'LC44', 'floor_3', '1603,407,1720,459', 'kosong', 'rect'),
(271, 'LC45', 'floor_3', '1598,473,1715,524', 'kosong', 'rect'),
(272, 'LC46', 'floor_3', '1598,557,1720,609', 'kosong', 'rect'),
(273, 'LC47', 'floor_3', '1598,642,1720,693', 'kosong', 'rect'),
(274, 'LC48', 'floor_3', '1598,707,1720,754', 'kosong', 'rect'),
(275, 'LC49', 'floor_3', '1593,773,1715,829', 'kosong', 'rect'),
(276, 'LC50', 'floor_3', '1603,840,1715,890', 'kosong', 'rect'),
(277, 'LC51', 'floor_3', '1593,918,1715,970', 'kosong', 'rect'),
(278, 'LC52', 'floor_3', '1598,984,1715,1040', 'kosong', 'rect'),
(279, 'LC53', 'floor_3', '1598,1063,1720,1124', 'kosong', 'rect'),
(280, 'LC54', 'floor_3', '1593,1133,1715,1190', 'kosong', 'rect'),
(281, 'LC55', 'floor_3', '1523,120,1574,238', 'kosong', 'rect'),
(282, 'LC56', 'floor_3', '1452,120,1509,238', 'kosong', 'rect'),
(283, 'LC57', 'floor_3', '1368,120,1424,233', 'kosong', 'rect'),
(284, 'LC58', 'floor_3', '1297,120,1358,233', 'kosong', 'rect'),
(285, 'LC59', 'floor_3', '1213,121,1269,234', 'kosong', 'rect'),
(286, 'LC60', 'floor_3', '1147,120,1199,238', 'kosong', 'rect'),
(287, 'LC61', 'floor_3', '1063,121,1119,234', 'kosong', 'rect'),
(288, 'LC62', 'floor_3', '988,121,1049,234', 'kosong', 'rect'),
(289, 'LC63', 'floor_3', '917,121,969,234', 'kosong', 'rect'),
(290, 'LC64', 'floor_3', '856,121,908,234', 'kosong', 'rect'),
(291, 'LC65', 'floor_3', '1368,398,1419,506', 'kosong', 'rect'),
(292, 'LC66', 'floor_3', '1297,397,1354,514', 'kosong', 'rect'),
(293, 'LC67', 'floor_3', '1218,398,1274,511', 'kosong', 'rect'),
(294, 'LC68', 'floor_3', '1142,398,1199,515', 'kosong', 'rect'),
(295, 'LC69', 'floor_3', '1063,398,1124,510', 'kosong', 'rect'),
(296, 'LC70', 'floor_3', '988,398,1049,510', 'kosong', 'rect'),
(297, 'LC71', 'floor_3', '1321,567,1438,618', 'kosong', 'rect'),
(298, 'LC72', 'floor_3', '1321,829,1438,885', 'kosong', 'rect'),
(299, 'LC73', 'floor_3', '1321,890,1434,923,1419,970,1302,942', 'kosong', 'poly'),
(300, 'LC74', 'floor_3', '1321,989,1438,1040', 'kosong', 'rect'),
(301, 'LC75', 'floor_3', '1326,1063,1438,1115', 'kosong', 'rect'),
(302, 'LC76', 'floor_3', '1326,1130,1443,1186', 'kosong', 'rect'),
(303, 'LC77', 'floor_3', '1321,1200,1448,1256', 'kosong', 'rect'),
(304, 'LC78', 'floor_3', '1255,613,1236,665,1335,698,1354,651', 'kosong', 'poly'),
(305, 'LC79', 'floor_3', '1222,689,1204,740,1316,769,1335,717', 'kosong', 'poly'),
(306, 'LC80', 'floor_3', '1194,773,1180,829,1293,857,1307,806', 'kosong', 'poly'),
(307, 'LC81', 'floor_3', '1175,853,1161,904,1274,937,1293,881', 'kosong', 'poly'),
(308, 'LC82', 'floor_3', '1152,932,1138,989,1246,1017,1269,965', 'kosong', 'poly'),
(309, 'LC83', 'floor_3', '1133,1008,1110,1059,1227,1092,1241,1036', 'kosong', 'poly'),
(310, 'LC84', 'floor_3', '1110,1083,1086,1139,1199,1172,1218,1120', 'kosong', 'poly'),
(311, 'LC85', 'floor_3', '1086,1163,1067,1214,1180,1252,1199,1195', 'kosong', 'poly'),
(312, 'LC86', 'floor_3', '992,547,978,594,1086,627,1110,580', 'kosong', 'poly'),
(313, 'LC87', 'floor_3', '969,618,955,670,1067,707,1081,651', 'kosong', 'poly'),
(314, 'LC88', 'floor_3', '945,702,936,754,1044,792,1058,735', 'kosong', 'poly'),
(315, 'LC89', 'floor_3', '922,777,908,829,1025,862,1039,806', 'kosong', 'poly'),
(316, 'LC90', 'floor_3', '903,857,889,914,997,947,1016,890', 'kosong', 'poly'),
(317, 'LC91', 'floor_3', '884,505,861,561,964,599,983,543', 'kosong', 'poly'),
(318, 'LC92', 'floor_3', '861,581,842,637,945,670,959,614', 'kosong', 'poly'),
(319, 'LC93', 'floor_3', '833,670,814,722,922,754,931,703', 'kosong', 'poly'),
(320, 'LC94', 'floor_3', '814,740,790,796,903,834,917,773', 'kosong', 'poly'),
(321, 'LC95', 'floor_3', '790,824,776,871,880,909,894,857', 'kosong', 'poly'),
(322, 'LC96', 'floor_3', '767,900,748,951,856,989,880,937', 'kosong', 'poly'),
(323, 'LC97', 'floor_3', '715,205,701,257,809,290,823,234', 'kosong', 'poly'),
(324, 'LC98', 'floor_3', '687,281,673,332,786,375,804,313', 'kosong', 'poly'),
(325, 'LC99', 'floor_3', '673,351,654,403,762,436,781,384', 'kosong', 'poly'),
(326, 'LC100', 'floor_3', '645,444,626,496,739,529,758,473', 'kosong', 'poly'),
(327, 'LC101', 'floor_3', '621,514,603,571,720,599,739,547', 'kosong', 'poly'),
(328, 'LC102', 'floor_3', '598,599,579,656,692,684,711,632', 'kosong', 'poly'),
(329, 'LC103', 'floor_3', '574,674,556,730,678,759,687,707', 'kosong', 'poly'),
(330, 'LC104', 'floor_3', '560,754,532,806,650,843,664,787', 'kosong', 'poly'),
(331, 'LC105', 'floor_3', '532,829,513,880,621,908,640,857', 'kosong', 'poly'),
(332, 'LC106', 'floor_3', '2058,1359,2067,1416,2180,1406,2175,1350', 'kosong', 'poly'),
(333, 'LC107', 'floor_3', '1912,1360,1790,1411', 'kosong', 'rect'),
(334, 'LC108', 'floor_3', '1593,1355,1711,1411', 'kosong', 'rect'),
(335, 'LC109', 'floor_3', '1302,1417,1419,1474', 'kosong', 'rect'),
(336, 'LC110', 'floor_3', '936,1394,903,1502,959,1521,988,1408', 'kosong', 'poly'),
(337, 'LC111', 'floor_3', '865,1375,833,1483,894,1507,922,1394', 'kosong', 'poly'),
(338, 'LC112', 'floor_3', '2429,155,2476,272', 'kosong', 'rect'),
(339, 'LC113', 'floor_3', '2297,155,2349,278', 'kosong', 'rect'),
(340, 'LC114', 'floor_3', '2236,160,2283,268', 'kosong', 'rect'),
(341, 'LC115', 'floor_3', '2152,155,2204,273', 'kosong', 'rect'),
(342, 'LC116', 'floor_3', '2081,155,2133,267', 'kosong', 'rect'),
(343, 'LC117', 'floor_3', '1997,155,2058,272', 'kosong', 'rect'),
(344, 'LC118', 'floor_3', '1927,155,1988,277', 'kosong', 'rect'),
(345, 'LT1', 'rooftop', '2654,241,2537,293', 'kosong', 'rect'),
(346, 'LT2', 'rooftop', '2537,307,2659,359', 'kosong', 'rect'),
(347, 'LT3', 'rooftop', '2533,405,2650,455', 'kosong', 'rect'),
(348, 'LT4', 'rooftop', '2532,465,2650,521', 'kosong', 'rect'),
(349, 'LT5', 'rooftop', '2537,549,2650,600', 'kosong', 'rect'),
(350, 'LT6', 'rooftop', '2537,619,2659,671', 'kosong', 'rect'),
(351, 'LT7', 'rooftop', '2537,690,2659,741', 'kosong', 'rect'),
(352, 'LT8', 'rooftop', '2537,765,2654,821', 'kosong', 'rect'),
(353, 'LT9', 'rooftop', '2537,835,2654,887', 'kosong', 'rect'),
(354, 'LT10', 'rooftop', '2537,915,2650,967', 'kosong', 'rect'),
(355, 'LT11', 'rooftop', '2537,985,2654,1037', 'kosong', 'rect'),
(356, 'LT12', 'rooftop', '2537,1065,2654,1117', 'kosong', 'rect'),
(357, 'LT13', 'rooftop', '2532,1131,2650,1183', 'kosong', 'rect'),
(358, 'LT14', 'rooftop', '2537,1206,2650,1258', 'kosong', 'rect'),
(359, 'LT15', 'rooftop', '2532,1277,2654,1328', 'kosong', 'rect'),
(360, 'LT16', 'rooftop', '2260,554,2377,600', 'kosong', 'rect'),
(361, 'LT17', 'rooftop', '2260,619,2377,666', 'kosong', 'rect'),
(362, 'LT18', 'rooftop', '2260,689,2377,740', 'kosong', 'rect'),
(363, 'LT19', 'rooftop', '2255,768,2377,825', 'kosong', 'rect'),
(364, 'LT20', 'rooftop', '2260,834,2377,886', 'kosong', 'rect'),
(365, 'LT21', 'rooftop', '2255,914,2377,966', 'kosong', 'rect'),
(366, 'LT22', 'rooftop', '2260,980,2373,1036', 'kosong', 'rect'),
(367, 'LT23', 'rooftop', '2255,1060,2373,1116', 'kosong', 'rect'),
(368, 'LT24', 'rooftop', '2260,1130,2377,1186', 'kosong', 'rect'),
(369, 'LT25', 'rooftop', '2063,543,2180,609', 'kosong', 'rect'),
(370, 'LT26', 'rooftop', '2067,627,2185,684', 'kosong', 'rect'),
(371, 'LT27', 'rooftop', '2067,693,2180,740', 'kosong', 'rect'),
(372, 'LT28', 'rooftop', '2063,764,2180,815', 'kosong', 'rect'),
(373, 'LT29', 'rooftop', '2067,830,2180,886', 'kosong', 'rect'),
(374, 'LT30', 'rooftop', '2063,910,2185,962', 'kosong', 'rect'),
(375, 'LT31', 'rooftop', '2067,971,2185,1032', 'kosong', 'rect'),
(376, 'LT32', 'rooftop', '2067,1056,2185,1112', 'kosong', 'rect'),
(377, 'LT33', 'rooftop', '2067,1121,2180,1178', 'kosong', 'rect'),
(378, 'LT34', 'rooftop', '1795,619,1912,670', 'kosong', 'rect'),
(379, 'LT35', 'rooftop', '1790,690,1908,741', 'kosong', 'rect'),
(380, 'LT36', 'rooftop', '1790,770,1912,826', 'kosong', 'rect'),
(381, 'LT37', 'rooftop', '1790,840,1912,892', 'kosong', 'rect'),
(382, 'LT38', 'rooftop', '1790,915,1908,966', 'kosong', 'rect'),
(383, 'LT39', 'rooftop', '1790,985,1908,1037', 'kosong', 'rect'),
(384, 'LT40', 'rooftop', '1790,1061,1908,1117', 'kosong', 'rect'),
(385, 'LT41', 'rooftop', '1790,1126,1908,1183', 'kosong', 'rect'),
(386, 'LT42', 'rooftop', '1598,238,1720,294', 'kosong', 'rect'),
(387, 'LT43', 'rooftop', '1598,308,1715,355', 'kosong', 'rect'),
(388, 'LT44', 'rooftop', '1603,407,1720,459', 'kosong', 'rect'),
(389, 'LT45', 'rooftop', '1598,473,1715,524', 'kosong', 'rect'),
(390, 'LT46', 'rooftop', '1598,557,1720,609', 'kosong', 'rect'),
(391, 'LT47', 'rooftop', '1598,642,1720,693', 'kosong', 'rect'),
(392, 'LT48', 'rooftop', '1598,707,1720,754', 'kosong', 'rect'),
(393, 'LT49', 'rooftop', '1593,773,1715,829', 'kosong', 'rect'),
(394, 'LT50', 'rooftop', '1603,840,1715,890', 'kosong', 'rect'),
(395, 'LT51', 'rooftop', '1593,918,1715,970', 'kosong', 'rect'),
(396, 'LT52', 'rooftop', '1598,984,1715,1040', 'kosong', 'rect'),
(397, 'LT53', 'rooftop', '1598,1063,1720,1124', 'kosong', 'rect'),
(398, 'LT54', 'rooftop', '1593,1133,1715,1190', 'kosong', 'rect'),
(399, 'LT55', 'rooftop', '1523,120,1574,238', 'kosong', 'rect'),
(400, 'LT56', 'rooftop', '1452,120,1509,238', 'kosong', 'rect'),
(401, 'LT57', 'rooftop', '1368,120,1424,233', 'kosong', 'rect'),
(402, 'LT58', 'rooftop', '1297,120,1358,233', 'kosong', 'rect'),
(403, 'LT59', 'rooftop', '1213,121,1269,234', 'kosong', 'rect'),
(404, 'LT60', 'rooftop', '1147,120,1199,238', 'kosong', 'rect'),
(405, 'LT61', 'rooftop', '1063,121,1119,234', 'kosong', 'rect'),
(406, 'LT62', 'rooftop', '988,121,1049,234', 'kosong', 'rect'),
(407, 'LT63', 'rooftop', '917,121,969,234', 'kosong', 'rect'),
(408, 'LT64', 'rooftop', '856,121,908,234', 'kosong', 'rect'),
(409, 'LT65', 'rooftop', '1368,398,1419,506', 'kosong', 'rect'),
(410, 'LT66', 'rooftop', '1297,397,1354,514', 'kosong', 'rect'),
(411, 'LT67', 'rooftop', '1218,398,1274,511', 'kosong', 'rect'),
(412, 'LT68', 'rooftop', '1142,398,1199,515', 'kosong', 'rect'),
(413, 'LT69', 'rooftop', '1063,398,1124,510', 'kosong', 'rect'),
(414, 'LT70', 'rooftop', '988,398,1049,510', 'kosong', 'rect'),
(415, 'LT71', 'rooftop', '1321,567,1438,618', 'kosong', 'rect'),
(416, 'LT72', 'rooftop', '1321,829,1438,885', 'kosong', 'rect'),
(417, 'LT73', 'rooftop', '1321,890,1434,923,1419,970,1302,942', 'kosong', 'poly'),
(418, 'LT74', 'rooftop', '1321,989,1438,1040', 'kosong', 'rect'),
(419, 'LT75', 'rooftop', '1326,1063,1438,1115', 'kosong', 'rect'),
(420, 'LT76', 'rooftop', '1326,1130,1443,1186', 'kosong', 'rect'),
(421, 'LT77', 'rooftop', '1321,1200,1448,1256', 'kosong', 'rect'),
(422, 'LT78', 'rooftop', '1255,613,1236,665,1335,698,1354,651', 'kosong', 'poly'),
(423, 'LT79', 'rooftop', '1222,689,1204,740,1316,769,1335,717', 'kosong', 'poly'),
(424, 'LT80', 'rooftop', '1194,773,1180,829,1293,857,1307,806', 'kosong', 'poly'),
(425, 'LT81', 'rooftop', '1175,853,1161,904,1274,937,1293,881', 'kosong', 'poly'),
(426, 'LT82', 'rooftop', '1152,932,1138,989,1246,1017,1269,965', 'kosong', 'poly'),
(427, 'LT83', 'rooftop', '1133,1008,1110,1059,1227,1092,1241,1036', 'kosong', 'poly'),
(428, 'LT84', 'rooftop', '1110,1083,1086,1139,1199,1172,1218,1120', 'kosong', 'poly'),
(429, 'LT85', 'rooftop', '1086,1163,1067,1214,1180,1252,1199,1195', 'kosong', 'poly'),
(430, 'LT86', 'rooftop', '992,547,978,594,1086,627,1110,580', 'kosong', 'poly'),
(431, 'LT87', 'rooftop', '969,618,955,670,1067,707,1081,651', 'kosong', 'poly'),
(432, 'LT88', 'rooftop', '945,702,936,754,1044,792,1058,735', 'kosong', 'poly'),
(433, 'LT89', 'rooftop', '922,777,908,829,1025,862,1039,806', 'kosong', 'poly'),
(434, 'LT90', 'rooftop', '903,857,889,914,997,947,1016,890', 'kosong', 'poly'),
(435, 'LT91', 'rooftop', '884,505,861,561,964,599,983,543', 'kosong', 'poly'),
(436, 'LT92', 'rooftop', '861,581,842,637,945,670,959,614', 'kosong', 'poly'),
(437, 'LT93', 'rooftop', '833,670,814,722,922,754,931,703', 'kosong', 'poly'),
(438, 'LT94', 'rooftop', '814,740,790,796,903,834,917,773', 'kosong', 'poly'),
(439, 'LT95', 'rooftop', '790,824,776,871,880,909,894,857', 'kosong', 'poly'),
(440, 'LT96', 'rooftop', '767,900,748,951,856,989,880,937', 'kosong', 'poly'),
(441, 'LT97', 'rooftop', '715,205,701,257,809,290,823,234', 'kosong', 'poly'),
(442, 'LT98', 'rooftop', '687,281,673,332,786,375,804,313', 'kosong', 'poly'),
(443, 'LT99', 'rooftop', '673,351,654,403,762,436,781,384', 'kosong', 'poly'),
(444, 'LT100', 'rooftop', '645,444,626,496,739,529,758,473', 'kosong', 'poly'),
(445, 'LT101', 'rooftop', '621,514,603,571,720,599,739,547', 'kosong', 'poly'),
(446, 'LT102', 'rooftop', '598,599,579,656,692,684,711,632', 'kosong', 'poly'),
(447, 'LT103', 'rooftop', '574,674,556,730,678,759,687,707', 'kosong', 'poly'),
(448, 'LT104', 'rooftop', '560,754,532,806,650,843,664,787', 'kosong', 'poly'),
(449, 'LT105', 'rooftop', '532,829,513,880,621,908,640,857', 'kosong', 'poly'),
(450, 'LT106', 'rooftop', '2058,1359,2067,1416,2180,1406,2175,1350', 'kosong', 'poly'),
(451, 'LT107', 'rooftop', '1912,1360,1790,1411', 'kosong', 'rect'),
(452, 'LT108', 'rooftop', '1593,1355,1711,1411', 'kosong', 'rect'),
(453, 'LT109', 'rooftop', '1302,1417,1419,1474', 'kosong', 'rect'),
(454, 'LT110', 'rooftop', '936,1394,903,1502,959,1521,988,1408', 'kosong', 'poly'),
(455, 'LT111', 'rooftop', '865,1375,833,1483,894,1507,922,1394', 'kosong', 'poly'),
(456, 'LT112', 'rooftop', '2429,155,2476,272', 'kosong', 'rect'),
(457, 'LT113', 'rooftop', '2297,155,2349,278', 'kosong', 'rect'),
(458, 'LT114', 'rooftop', '2236,160,2283,268', 'kosong', 'rect'),
(459, 'LT115', 'rooftop', '2152,155,2204,273', 'kosong', 'rect'),
(460, 'LT116', 'rooftop', '2081,155,2133,267', 'kosong', 'rect'),
(461, 'LT117', 'rooftop', '1997,155,2058,272', 'kosong', 'rect'),
(462, 'LT118', 'rooftop', '1927,155,1988,277', 'kosong', 'rect'),
(463, 'LT119', 'rooftop', '2532,177,2654,229', 'kosong', 'rect'),
(464, 'LT120', 'rooftop', '715,1059,696,1115,814,1143,833,1092', 'kosong', 'poly'),
(465, 'LT121', 'rooftop', '481,988,466,1035,579,1068,593,1016', 'kosong', 'poly'),
(466, 'LT122', 'rooftop', '504,909,490,956,593,993,607,942', 'kosong', 'poly');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `no_user` int(11) NOT NULL,
  `id_user` varchar(5) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_password` varchar(25) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`no_user`, `id_user`, `user_name`, `user_password`, `user_fullname`, `user_status`) VALUES
(1, 'pm', 'admin', 'admin', 'Aldion Amirrul Endryanto', 'petugas masuk'),
(2, 'pa', 'admin2', 'admin2', 'Aldion Amirrul Endryanto', 'petugas area'),
(3, 'pk', 'admin3', 'admin3', 'Aldion Amirrul Endryanto', 'petugas keluar'),
(4, 'mgr', 'manager', 'manager', 'Aldion Amirrul Endryanto', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`no_laporan`);

--
-- Indexes for table `tb_report`
--
ALTER TABLE `tb_report`
  ADD PRIMARY KEY (`no_report`);

--
-- Indexes for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`no_ruang`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`no_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `no_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_report`
--
ALTER TABLE `tb_report`
  MODIFY `no_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `no_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
