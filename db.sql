-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2023 at 01:26 PM
-- Server version: 10.6.12-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `legacydbz_vegita`
--

-- --------------------------------------------------------

--
-- Table structure for table `arena`
--

CREATE TABLE `arena` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `laikas` varchar(255) NOT NULL DEFAULT '',
  `vs` varchar(255) NOT NULL DEFAULT '',
  `idd` varchar(255) NOT NULL DEFAULT '',
  `ejimas` varchar(255) NOT NULL DEFAULT '',
  `test` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `arenos_log`
--

CREATE TABLE `arenos_log` (
  `id` int(11) NOT NULL,
  `msg` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ats_boss`
--

CREATE TABLE `ats_boss` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `hp` varchar(255) NOT NULL DEFAULT '',
  `max_hp` varchar(255) NOT NULL DEFAULT '',
  `pinigai` varchar(255) NOT NULL DEFAULT '',
  `kredai` varchar(255) NOT NULL DEFAULT '',
  `prisikels` varchar(255) NOT NULL DEFAULT '',
  `nick` varchar(255) NOT NULL DEFAULT '',
  `pinigai_max` varchar(255) NOT NULL DEFAULT '',
  `kredai_max` varchar(255) NOT NULL DEFAULT '',
  `exp` varchar(255) NOT NULL DEFAULT '',
  `exp_max` varchar(255) NOT NULL DEFAULT '',
  `prisikelia` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `atv`
--

CREATE TABLE `atv` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `atv` bigint(255) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `atv`
--

INSERT INTO `atv` (`id`, `nick`, `atv`) VALUES
(1, 'testas1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `atvedimas`
--

CREATE TABLE `atvedimas` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `snd` bigint(255) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `atvedimas`
--

INSERT INTO `atvedimas` (`id`, `nick`, `snd`) VALUES
(1, 'testas1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `aukcijonas`
--

CREATE TABLE `aukcijonas` (
  `id` int(11) NOT NULL,
  `kas` varchar(15) NOT NULL DEFAULT '',
  `preke` varchar(255) NOT NULL DEFAULT '',
  `kiek` int(11) NOT NULL DEFAULT 0,
  `kaina` bigint(20) NOT NULL DEFAULT 0,
  `valiuta` varchar(255) NOT NULL DEFAULT '',
  `laikas` int(11) NOT NULL DEFAULT 0,
  `zaidejui` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aukc_history`
--

CREATE TABLE `aukc_history` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `kieno` varchar(255) NOT NULL DEFAULT '',
  `preke` varchar(255) NOT NULL DEFAULT '',
  `kiekis` varchar(255) NOT NULL DEFAULT '',
  `kiekis2` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auros`
--

CREATE TABLE `auros` (
  `id` int(11) NOT NULL,
  `nick` varchar(20) NOT NULL DEFAULT '',
  `aura1` varchar(2) NOT NULL DEFAULT '',
  `aura2` varchar(2) NOT NULL DEFAULT '',
  `aura3` varchar(2) NOT NULL DEFAULT '',
  `aura4` varchar(2) NOT NULL DEFAULT '',
  `aura5` varchar(2) NOT NULL DEFAULT '',
  `aura6` varchar(2) NOT NULL DEFAULT '',
  `aura7` varchar(2) NOT NULL DEFAULT '',
  `aura8` varchar(2) NOT NULL DEFAULT '',
  `aura9` varchar(2) NOT NULL DEFAULT '',
  `aura10` varchar(2) NOT NULL DEFAULT '',
  `aura11` varchar(2) NOT NULL DEFAULT '',
  `aura12` varchar(2) NOT NULL DEFAULT '',
  `aura13` varchar(2) NOT NULL DEFAULT '',
  `aura14` varchar(2) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `auros`
--

INSERT INTO `auros` (`id`, `nick`, `aura1`, `aura2`, `aura3`, `aura4`, `aura5`, `aura6`, `aura7`, `aura8`, `aura9`, `aura10`, `aura11`, `aura12`, `aura13`, `aura14`) VALUES
(1, 'testas1', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `auru_inf`
--

CREATE TABLE `auru_inf` (
  `id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci DEFAULT '0',
  `img` varchar(100) DEFAULT '0',
  `lygis` int(11) DEFAULT 0,
  `jegos` int(11) DEFAULT 0,
  `gynybos` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auto`
--

CREATE TABLE `auto` (
  `id` int(11) NOT NULL,
  `skriptas` varchar(255) NOT NULL DEFAULT '',
  `kodas` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `autoboss`
--

CREATE TABLE `autoboss` (
  `id` int(255) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `auto` varchar(24) NOT NULL DEFAULT '',
  `autob` varchar(2) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `autoboss`
--

INSERT INTO `autoboss` (`id`, `nick`, `auto`, `autob`) VALUES
(1, 'testas1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `baby_misija`
--

CREATE TABLE `baby_misija` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `1` varchar(1) NOT NULL DEFAULT '',
  `2` varchar(1) NOT NULL DEFAULT '',
  `3` varchar(1) NOT NULL DEFAULT '',
  `4` varchar(1) NOT NULL DEFAULT '',
  `5` varchar(1) NOT NULL DEFAULT '',
  `6` varchar(1) NOT NULL DEFAULT '',
  `7` varchar(1) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bals`
--

CREATE TABLE `bals` (
  `id` int(11) NOT NULL,
  `klausimas` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `autorius` varchar(255) NOT NULL DEFAULT '',
  `kada` varchar(255) NOT NULL DEFAULT '',
  `ats` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `ats2` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `ats3` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bals`
--

INSERT INTO `bals` (`id`, `klausimas`, `autorius`, `kada`, `ats`, `ats2`, `ats3`) VALUES
(1, 'Ar dalyvausi legendinių misijų tope?', 'testas1', '1676630038', 'Taip', 'Ne', 'Nesvarbu');

-- --------------------------------------------------------

--
-- Table structure for table `balsavimas`
--

CREATE TABLE `balsavimas` (
  `id` int(11) NOT NULL,
  `klausimas` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `autorius` varchar(100) NOT NULL DEFAULT '',
  `ats` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `ats2` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `ats3` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `kada` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bals_rez`
--

CREATE TABLE `bals_rez` (
  `id` int(11) NOT NULL,
  `nick` varchar(25) NOT NULL DEFAULT '',
  `ats` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `bals_id` int(11) DEFAULT 0,
  `time` int(111) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ban_logai`
--

CREATE TABLE `ban_logai` (
  `id` int(11) NOT NULL,
  `nick` varchar(100) NOT NULL,
  `uz` text CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `time` int(255) DEFAULT 0,
  `kas_ban` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bbc`
--

CREATE TABLE `bbc` (
  `id` int(11) NOT NULL,
  `kodas` varchar(100) NOT NULL DEFAULT '',
  `img` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bendravimo_log`
--

CREATE TABLE `bendravimo_log` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `laimejo` varchar(255) NOT NULL,
  `laikas` varchar(255) NOT NULL,
  `laimejo2` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bendravimo_top`
--

CREATE TABLE `bendravimo_top` (
  `id` int(11) NOT NULL,
  `sms` bigint(255) NOT NULL DEFAULT 0,
  `nick` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bendravimo_top`
--

INSERT INTO `bendravimo_top` (`id`, `sms`, `nick`) VALUES
(1, 0, 'testas1');

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `id` int(255) NOT NULL,
  `nick` varchar(100) NOT NULL,
  `uz` text CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `time` int(255) NOT NULL,
  `kas_ban` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `block1`
--

CREATE TABLE `block1` (
  `id` int(11) NOT NULL,
  `nick` varchar(100) NOT NULL DEFAULT '',
  `uz` text CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `time` int(11) DEFAULT 0,
  `kas_ban` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `boss`
--

CREATE TABLE `boss` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `img` varchar(200) NOT NULL DEFAULT '',
  `max_hp` bigint(255) DEFAULT 0,
  `hp` bigint(255) DEFAULT 0,
  `exp` bigint(20) DEFAULT 0,
  `zen` bigint(20) DEFAULT 0,
  `krd` bigint(20) DEFAULT 0,
  `max_hit` int(11) DEFAULT 0,
  `laikas` int(11) DEFAULT 0,
  `prisikels` int(11) DEFAULT 0,
  `nukirto` varchar(20) NOT NULL DEFAULT '',
  `vipt` varchar(11) NOT NULL DEFAULT '',
  `min_hit` int(11) DEFAULT 0,
  `crit` int(11) DEFAULT 0,
  `kiekzalos` bigint(11) DEFAULT 0,
  `kieknukirsta` int(11) DEFAULT 0,
  `critp` int(117) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `boss`
--

INSERT INTO `boss` (`id`, `name`, `img`, `max_hp`, `hp`, `exp`, `zen`, `krd`, `max_hit`, `laikas`, `prisikels`, `nukirto`, `vipt`, `min_hit`, `crit`, `kiekzalos`, `kieknukirsta`, `critp`) VALUES
(1, 'Krilinas', 'Krilinas', 1000000, 1000000, 10, 50000000, 200, 50, 600, 1684663813, 'silveriso1', '300', 10, 10, 0, 3693, 39930),
(2, 'Bulma', 'Bulma', 2000000, 2000000, 20, 15000000, 500, 150, 1200, 1684604449, 'miegaukis', '700', 50, 25, 0, 2429, 65925),
(3, 'Gohanas', 'Gohanas', 4000000, 4000000, 30, 30000000, 1000, 300, 1800, 1684571925, 'miegaukis', '1000', 100, 40, 0, 1836, 79200),
(4, 'Android 18', 'Android 18', 7000000, 7000000, 40, 50000000, 1500, 500, 2700, 1684572689, 'miegaukis', '1300', 150, 60, 0, 1420, 91920),
(5, 'Dendis', 'Dendis', 10000000, 10000000, 50, 75000000, 2200, 700, 3600, 1684574328, 'miegaukis', '1600', 200, 80, 0, 1144, 98240),
(6, 'Vedzitas', 'Vedzitas', 20000000, 20000000, 60, 120000000, 3500, 1200, 7200, 1684575119, 'miegaukis', '2000', 300, 50, 0, 743, 39750),
(7, 'Gokas', 'Gokas', 40000000, 40000000, 100, 180000000, 5000, 1500, 10800, 1684579521, 'miegaukis', '3000', 450, 70, 0, 550, 41020),
(8, 'Android 17', 'Android 17', 80000000, 80000000, 200, 280000000, 7000, 2000, 14600, 1684583860, 'miegaukis', '4500', 600, 100, 0, 417, 44900),
(9, 'Pikolas', 'Pikolas', 130000000, 130000000, 1000, 380000000, 8500, 2700, 18000, 1683823662, 'miegaukis', '6000', 900, 120, 0, 350, 45840),
(10, 'Android 16', 'Android 16', 180000000, 39099794, 2000, 500000000, 10000, 3500, 21600, 1682994766, 'miegaukis', '7500', 1200, 150, 394108078, 297, 48750),
(11, 'Selas', 'Selas', 250000000, 250000000, 3000, 700000000, 12000, 4000, 25200, 1684680551, 'miegaukis', '9000', 1500, 200, 0, 257, 56200),
(12, 'Android 19', 'Android 19', 350000000, 350000000, 4000, 1000000000, 14000, 5000, 28800, 1684686045, 'miegaukis', '9000', 2000, 250, 0, 214, 58500),
(13, 'Android 20', 'Android 20', 500000000, 39337846, 5000, 1500000000, 17000, 7000, 32600, 1684463455, 'miegaukis', '9000', 2500, 350, 1288558655, 198, 76300),
(15, 'Tranksas', 'Tranksas', 2000000000, 2000000000, 6000, 15000000000, 30000, 15000, 42000, 1684639757, 'miegaukis', '10000', 7000, 1000, 0, 125, 137000),
(14, 'Raditas', 'Raditas', 1000000000, 1000000000, 7000, 5000000000, 25000, 10000, 42000, 1684635610, 'miegaukis', '15000', 4000, 500, 0, 127, 69500),
(16, 'Neilas', 'Neilas', 5000000000, 5000000000, 8000, 50000000000, 40000, 20000, 42000, 1684634189, 'miegaukis', '20000', 10000, 1250, 0, 84, 110000),
(17, 'Buu', 'Buu', 10000000000, 1718559822, 9000, 100000000000, 50000, 30000, 42000, 1684033725, 'miegaukis', '30000', 15000, 1500, 23067879104, 64, 102000),
(18, 'Celas', 'Selas', 20000000000, 11647339828, 100000000, 500000000000, 60000, 50000, 42000, 1683707819, 'miegaukis', '70000', 25000, 2500, 23256612078, 62, 175000);

-- --------------------------------------------------------

--
-- Table structure for table `b_komentarai`
--

CREATE TABLE `b_komentarai` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `komentaras` text CHARACTER SET utf32 COLLATE utf32_lithuanian_ci NOT NULL,
  `laikas` varchar(255) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `b_rez`
--

CREATE TABLE `b_rez` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `bals_id` varchar(255) NOT NULL,
  `ats` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daigtu_laikas`
--

CREATE TABLE `daigtu_laikas` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `taimas` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily`
--

CREATE TABLE `daily` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `snd` varchar(255) NOT NULL DEFAULT '',
  `snd2` varchar(255) NOT NULL DEFAULT '',
  `snd3` varchar(255) NOT NULL DEFAULT '',
  `snd4` varchar(255) NOT NULL DEFAULT '',
  `snd5` varchar(255) NOT NULL DEFAULT '',
  `2snd` varchar(255) NOT NULL DEFAULT '',
  `2snd2` varchar(255) NOT NULL DEFAULT '',
  `2snd3` varchar(255) NOT NULL DEFAULT '',
  `2snd4` varchar(255) NOT NULL DEFAULT '',
  `2snd5` varchar(255) NOT NULL DEFAULT '',
  `m` varchar(255) NOT NULL DEFAULT '',
  `m2` varchar(255) NOT NULL DEFAULT '',
  `m3` varchar(255) NOT NULL DEFAULT '',
  `m4` varchar(255) NOT NULL DEFAULT '',
  `m5` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `daily`
--

INSERT INTO `daily` (`id`, `nick`, `snd`, `snd2`, `snd3`, `snd4`, `snd5`, `2snd`, `2snd2`, `2snd3`, `2snd4`, `2snd5`, `m`, `m2`, `m3`, `m4`, `m5`) VALUES
(1, 'testas1', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `dalybos`
--

CREATE TABLE `dalybos` (
  `id` int(11) NOT NULL,
  `laikas` varchar(255) NOT NULL DEFAULT '',
  `online` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dienosmisijos`
--

CREATE TABLE `dienosmisijos` (
  `id` int(255) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `snd` varchar(2) NOT NULL DEFAULT '',
  `snd2` varchar(2) NOT NULL DEFAULT '',
  `snd3` varchar(2) NOT NULL DEFAULT '',
  `snd4` varchar(2) NOT NULL DEFAULT '',
  `snd5` varchar(2) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dievas`
--

CREATE TABLE `dievas` (
  `id` int(11) NOT NULL,
  `nick` varchar(100) NOT NULL DEFAULT '',
  `time` int(255) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `draugai`
--

CREATE TABLE `draugai` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `draugas` varchar(255) NOT NULL DEFAULT '',
  `statusas` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dtop`
--

CREATE TABLE `dtop` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `vksm` bigint(255) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dtopas`
--

CREATE TABLE `dtopas` (
  `id` int(11) NOT NULL,
  `vakar` varchar(255) NOT NULL DEFAULT '',
  `veiksmai` bigint(255) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dtop_log`
--

CREATE TABLE `dtop_log` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `laimejo` varchar(255) NOT NULL,
  `veiksmai` varchar(255) NOT NULL,
  `laikas` varchar(1255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `duk`
--

CREATE TABLE `duk` (
  `id` int(11) NOT NULL,
  `klausimas` varchar(255) NOT NULL DEFAULT '',
  `kas` varchar(255) NOT NULL DEFAULT '',
  `laikas` varchar(255) NOT NULL DEFAULT '',
  `busena` varchar(255) NOT NULL DEFAULT '',
  `komentaras` text CHARACTER SET utf8mb4 COLLATE utf8mb4_lithuanian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `duk_kom`
--

CREATE TABLE `duk_kom` (
  `id` int(11) NOT NULL,
  `kom` varchar(255) NOT NULL DEFAULT '',
  `kas` varchar(255) NOT NULL DEFAULT '',
  `laikas` varchar(255) NOT NULL DEFAULT '',
  `p_id` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventas`
--

CREATE TABLE `eventas` (
  `id` int(11) NOT NULL,
  `nick` varchar(50) NOT NULL DEFAULT '',
  `kiek` int(11) DEFAULT 0,
  `ko` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum_kat`
--

CREATE TABLE `forum_kat` (
  `id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum_tem`
--

CREATE TABLE `forum_tem` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `kat` int(11) DEFAULT 0,
  `kas` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum_zin`
--

CREATE TABLE `forum_zin` (
  `id` int(11) NOT NULL,
  `nick` varchar(100) NOT NULL DEFAULT '',
  `text` text CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `data` int(255) DEFAULT 0,
  `kat` int(10) DEFAULT 0,
  `tem` int(10) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `pavadinimas` varchar(255) NOT NULL DEFAULT '',
  `ar_patvirtinta` varchar(255) NOT NULL DEFAULT '',
  `laikas` varchar(255) NOT NULL DEFAULT '',
  `ivertinimas` bigint(255) DEFAULT 0,
  `komentaras` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_likes`
--

CREATE TABLE `foto_likes` (
  `id` int(11) NOT NULL,
  `kas` varchar(255) NOT NULL DEFAULT '',
  `kam` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galios_turnyras`
--

CREATE TABLE `galios_turnyras` (
  `id` int(11) NOT NULL,
  `kas` varchar(30) NOT NULL DEFAULT '',
  `kada` int(50) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goko_istorija`
--

CREATE TABLE `goko_istorija` (
  `id` int(11) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `aprasymas` text CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inv`
--

CREATE TABLE `inv` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `Microshem` varchar(255) DEFAULT '0',
  `Fusionfail` varchar(255) DEFAULT '0',
  `Sayiantail` varchar(255) DEFAULT '0',
  `Stone` varchar(255) DEFAULT '0',
  `Soul` varchar(255) DEFAULT '0',
  `Nball` varchar(255) DEFAULT '0',
  `Energystone` varchar(255) DEFAULT '0',
  `Pragarovaisius` varchar(255) DEFAULT '0',
  `Majinsroll` varchar(255) DEFAULT '0',
  `Goldstone` varchar(255) DEFAULT '0',
  `Magicball` varchar(255) DEFAULT '0',
  `Powerstone` varchar(255) DEFAULT '0',
  `Pupos` varchar(255) DEFAULT '0',
  `Supermicroshem` varchar(255) DEFAULT '0',
  `Superkiborg` varchar(255) DEFAULT '0',
  `Superstone` varchar(255) DEFAULT '0',
  `Z kardas` varchar(255) DEFAULT '0',
  `Malkos` varchar(255) DEFAULT '0',
  `Zuvis` varchar(255) DEFAULT '0',
  `Mazosmalkos` varchar(255) DEFAULT '0',
  `Mazazuvis` varchar(255) DEFAULT '0',
  `ki` bigint(255) DEFAULT 0,
  `radaras` bigint(255) DEFAULT 0,
  `zkardas` varchar(255) DEFAULT '0',
  `red_key` varchar(255) DEFAULT '0',
  `blue_key` varchar(255) DEFAULT '0',
  `green_key` varchar(255) DEFAULT '0',
  `yellow_key` varchar(255) DEFAULT '0',
  `black_key` varchar(255) DEFAULT '0',
  `Trankso_kardas` varchar(255) DEFAULT '0',
  `Vedzito_sarvai` varchar(255) DEFAULT '0',
  `Sball` varchar(255) DEFAULT '0',
  `zaislas1` bigint(255) DEFAULT 0,
  `zaislas2` bigint(255) DEFAULT 0,
  `zaislas3` bigint(255) DEFAULT 0,
  `zaislas4` bigint(255) DEFAULT 0,
  `angelwing` varchar(255) DEFAULT '0',
  `naikinti` varchar(255) DEFAULT '0',
  `tobulas` varchar(255) DEFAULT '0',
  `unikalus` int(11) DEFAULT 0,
  `laivas` varchar(11) DEFAULT '0',
  `Gold_sword` varchar(12) DEFAULT '0',
  `Time_sword` varchar(12) DEFAULT '0',
  `Gold_armor` varchar(255) DEFAULT '0',
  `Time_armor` varchar(11) DEFAULT '0',
  `Money_sword` varchar(11) DEFAULT '0',
  `Super_money_sword` varchar(11) DEFAULT '0',
  `One_tap_sword` varchar(11) DEFAULT '0',
  `kg_sword` varchar(11) DEFAULT '0',
  `Money_armor` varchar(11) DEFAULT '0',
  `Super_money_armor` varchar(11) DEFAULT '0',
  `kg_armor` varchar(11) DEFAULT '0',
  `One_tap_armor` varchar(11) DEFAULT '0',
  `Infinity_sword` varchar(11) DEFAULT '0',
  `Infinity_armor` varchar(11) DEFAULT '0',
  `Super_amulet` varchar(255) DEFAULT '0',
  `dball` varchar(255) DEFAULT '0',
  `Super_amulet_item` varchar(255) DEFAULT '0',
  `viplvl` varchar(11) DEFAULT '0',
  `naikinimo_amulet` varchar(11) DEFAULT '0',
  `naikinimo_amulet_item` varchar(11) DEFAULT '0',
  `critical` int(11) DEFAULT 0,
  `ad16` int(11) DEFAULT 0,
  `ad17` int(11) DEFAULT 0,
  `ad18` int(11) DEFAULT 0,
  `ad19` int(11) DEFAULT 0,
  `ad20` int(11) DEFAULT 0,
  `ad16kard` int(11) DEFAULT 0,
  `ad16sarv` int(11) DEFAULT 0,
  `ad16amulet` int(11) DEFAULT 0,
  `ad17kard` int(11) DEFAULT 0,
  `ad17sarv` int(11) DEFAULT 0,
  `ad17amulet` int(11) DEFAULT 0,
  `ad18kard` int(11) DEFAULT 0,
  `ad18sarv` int(11) DEFAULT 0,
  `ad18amulet` int(11) DEFAULT 0,
  `ad19kard` int(11) DEFAULT 0,
  `ad19sarv` int(11) DEFAULT 0,
  `ad19amulet` int(11) DEFAULT 0,
  `ad20kard` int(11) DEFAULT 0,
  `ad20sarv` int(11) DEFAULT 0,
  `ad20amulet` int(11) DEFAULT 0,
  `event1` int(11) DEFAULT 0,
  `event2` int(11) DEFAULT 0,
  `event3` int(11) DEFAULT 0,
  `event4` int(11) DEFAULT 0,
  `antipl` int(11) DEFAULT 0,
  `antipl2` int(11) DEFAULT 0,
  `antipl3` int(11) DEFAULT 0,
  `antipl4` int(11) DEFAULT 0,
  `antipotion` int(255) DEFAULT 0,
  `antipl5` int(11) DEFAULT 0,
  `antipl6` int(11) DEFAULT 0,
  `antipl7` int(11) DEFAULT 0,
  `alavas` int(255) DEFAULT 0,
  `varis` int(255) DEFAULT 0,
  `kadmis` int(255) DEFAULT 0,
  `cirkonis` int(255) DEFAULT 0,
  `gelezis` int(255) DEFAULT 0,
  `alavok` int(255) DEFAULT 0,
  `variok` int(255) DEFAULT 0,
  `kadmiok` int(255) DEFAULT 0,
  `cirkoniok` int(255) DEFAULT 0,
  `geleziesk` int(255) DEFAULT 0,
  `isbarstyti` int(11) DEFAULT 0,
  `sidabras` int(255) DEFAULT 0,
  `auksas` int(255) DEFAULT 0,
  `platina` int(255) DEFAULT 0,
  `titanas` int(255) DEFAULT 0,
  `osmis` int(255) DEFAULT 0,
  `manganas` int(255) DEFAULT 0,
  `sidabrok` int(255) DEFAULT 0,
  `auksok` int(255) DEFAULT 0,
  `platinosk` int(255) DEFAULT 0,
  `titanok` int(255) DEFAULT 0,
  `osmiok` int(255) DEFAULT 0,
  `manganok` int(255) DEFAULT 0,
  `anglis` int(245) DEFAULT 0,
  `mineralai` int(255) DEFAULT 0,
  `spatas` int(255) DEFAULT 0,
  `kvarcas` int(255) DEFAULT 0,
  `unikalusk` int(255) DEFAULT 0,
  `mirties_sword` int(255) DEFAULT 0,
  `mirties_armor` int(255) DEFAULT 0,
  `mirties_amulet` int(255) DEFAULT 0,
  `mirties_item` int(255) DEFAULT 0,
  `atgimimo_item` varchar(255) DEFAULT '0',
  `atgimimo_sword` varchar(255) DEFAULT '0',
  `atgimimo_armor` varchar(55) DEFAULT '0',
  `atgimimo_amulet` varchar(255) DEFAULT '0',
  `sdball` int(255) DEFAULT 0,
  `jdball` int(255) DEFAULT 0,
  `jball` int(25) DEFAULT 0,
  `unikalusk2` int(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inv`
--

INSERT INTO `inv` (`id`, `nick`, `Microshem`, `Fusionfail`, `Sayiantail`, `Stone`, `Soul`, `Nball`, `Energystone`, `Pragarovaisius`, `Majinsroll`, `Goldstone`, `Magicball`, `Powerstone`, `Pupos`, `Supermicroshem`, `Superkiborg`, `Superstone`, `Z kardas`, `Malkos`, `Zuvis`, `Mazosmalkos`, `Mazazuvis`, `ki`, `radaras`, `zkardas`, `red_key`, `blue_key`, `green_key`, `yellow_key`, `black_key`, `Trankso_kardas`, `Vedzito_sarvai`, `Sball`, `zaislas1`, `zaislas2`, `zaislas3`, `zaislas4`, `angelwing`, `naikinti`, `tobulas`, `unikalus`, `laivas`, `Gold_sword`, `Time_sword`, `Gold_armor`, `Time_armor`, `Money_sword`, `Super_money_sword`, `One_tap_sword`, `kg_sword`, `Money_armor`, `Super_money_armor`, `kg_armor`, `One_tap_armor`, `Infinity_sword`, `Infinity_armor`, `Super_amulet`, `dball`, `Super_amulet_item`, `viplvl`, `naikinimo_amulet`, `naikinimo_amulet_item`, `critical`, `ad16`, `ad17`, `ad18`, `ad19`, `ad20`, `ad16kard`, `ad16sarv`, `ad16amulet`, `ad17kard`, `ad17sarv`, `ad17amulet`, `ad18kard`, `ad18sarv`, `ad18amulet`, `ad19kard`, `ad19sarv`, `ad19amulet`, `ad20kard`, `ad20sarv`, `ad20amulet`, `event1`, `event2`, `event3`, `event4`, `antipl`, `antipl2`, `antipl3`, `antipl4`, `antipotion`, `antipl5`, `antipl6`, `antipl7`, `alavas`, `varis`, `kadmis`, `cirkonis`, `gelezis`, `alavok`, `variok`, `kadmiok`, `cirkoniok`, `geleziesk`, `isbarstyti`, `sidabras`, `auksas`, `platina`, `titanas`, `osmis`, `manganas`, `sidabrok`, `auksok`, `platinosk`, `titanok`, `osmiok`, `manganok`, `anglis`, `mineralai`, `spatas`, `kvarcas`, `unikalusk`, `mirties_sword`, `mirties_armor`, `mirties_amulet`, `mirties_item`, `atgimimo_item`, `atgimimo_sword`, `atgimimo_armor`, `atgimimo_amulet`, `sdball`, `jdball`, `jball`, `unikalusk2`) VALUES
(1, 'testas1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', '0', '0', '0', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventorius`
--

CREATE TABLE `inventorius` (
  `id` int(11) NOT NULL,
  `nick` varchar(15) NOT NULL DEFAULT '',
  `daiktas` int(11) DEFAULT 0,
  `tipas` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ip_ban`
--

CREATE TABLE `ip_ban` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ip_ban`
--

INSERT INTO `ip_ban` (`id`, `ip`) VALUES
(1, '90.134.9.45'),
(2, '62.197.150.19'),
(4, '91.238.82.34'),
(5, '149.34.246.34'),
(7, '80.246.31.216'),
(8, '80.246.31.214'),
(9, '31.171.155.100'),
(10, '31.171.155.36'),
(11, '31.171.153.118'),
(13, '31.171.153.118');

-- --------------------------------------------------------

--
-- Table structure for table `isbarstyta`
--

CREATE TABLE `isbarstyta` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `turima` bigint(255) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `isbarstyta`
--

INSERT INTO `isbarstyta` (`id`, `nick`, `turima`) VALUES
(1, 'testas1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `tipas` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `juodasis_sarasas`
--

CREATE TABLE `juodasis_sarasas` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `blokas` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kasimotop`
--

CREATE TABLE `kasimotop` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `surinkta` bigint(255) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kasimotop`
--

INSERT INTO `kasimotop` (`id`, `nick`, `surinkta`) VALUES
(1, 'testas1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kasimo_log`
--

CREATE TABLE `kasimo_log` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `laimejo` varchar(255) NOT NULL DEFAULT '',
  `veiksmai` varchar(255) NOT NULL DEFAULT '',
  `laikas` varchar(1255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kasykla`
--

CREATE TABLE `kasykla` (
  `id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci DEFAULT '0',
  `img` varchar(111) DEFAULT '0',
  `nuo` varchar(255) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kasykla`
--

INSERT INTO `kasykla` (`id`, `name`, `img`, `nuo`) VALUES
(2, 'Antroji kasykla', 'mineralu', ''),
(1, 'Kasykla', 'alavo', '');

-- --------------------------------------------------------

--
-- Table structure for table `kasykla2`
--

CREATE TABLE `kasykla2` (
  `id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci DEFAULT '0',
  `img` varchar(111) DEFAULT '0',
  `nuo` varchar(255) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kasykla2`
--

INSERT INTO `kasykla2` (`id`, `name`, `img`, `nuo`) VALUES
(1, 'Trečioji kasykla', 'sidabro', '');

-- --------------------------------------------------------

--
-- Table structure for table `kasykla3`
--

CREATE TABLE `kasykla3` (
  `id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci DEFAULT '0',
  `img` varchar(111) DEFAULT '0',
  `nuo` varchar(255) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kasykla3`
--

INSERT INTO `kasykla3` (`id`, `name`, `img`, `nuo`) VALUES
(1, 'Ketvirtoji kasykla', 'aukso', '');

-- --------------------------------------------------------

--
-- Table structure for table `kasyklav`
--

CREATE TABLE `kasyklav` (
  `id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci DEFAULT '0',
  `kasimolvl` bigint(20) DEFAULT 0,
  `minlvl` bigint(20) DEFAULT 0,
  `maxlvl` bigint(20) DEFAULT 0,
  `lokacija` int(11) DEFAULT 0,
  `img` varchar(111) DEFAULT '0',
  `ruda` varchar(255) DEFAULT '0',
  `kirtiklis` varchar(255) DEFAULT '0',
  `kokiar` varchar(255) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kasyklav`
--

INSERT INTO `kasyklav` (`id`, `name`, `kasimolvl`, `minlvl`, `maxlvl`, `lokacija`, `img`, `ruda`, `kirtiklis`, `kokiar`) VALUES
(1, 'Alavo rūda', 0, 1, 2, 1, 'alavo', 'alavas', 'alavok', 'ruda1'),
(2, 'Vario rūda', 200, 2, 3, 1, 'vario', 'varis', 'variok', ''),
(3, 'Kadmio rūda', 600, 3, 4, 1, 'kadmio', 'kadmis', 'kadmiok', 'ruda3'),
(4, 'Cirkonio rūda', 1300, 4, 6, 1, 'cirkonio', 'cirkonis', 'cirkoniok', ''),
(5, 'Geležies rūda', 2500, 5, 7, 1, 'gelezies', 'gelezis', 'geleziesk', ''),
(12, 'Anglis', 700000, 22, 28, 2, 'anglies', 'anglis', 'unikalusk', ''),
(6, 'Sidabro rūda', 7000, 6, 9, 1, 'sidabro', 'sidabras', 'sidabrok', ''),
(7, 'Aukso rūda', 18000, 8, 12, 1, 'aukso', 'auksas', 'auksok', ''),
(8, 'Platinos rūda', 52000, 10, 15, 1, 'platinos', 'platina', 'platinosk', ''),
(9, 'Titano rūda', 120000, 13, 18, 1, 'titano', 'titanas', 'titanok', ''),
(10, 'Osmio rūda', 250000, 15, 23, 1, 'osmio', 'osmis', 'osmiok', ''),
(11, 'Mangano rūda', 500000, 18, 26, 1, 'mangano', 'manganas', 'manganok', ''),
(13, 'Mineralai', 1000000, 25, 35, 2, 'mineralu', 'mineralai', 'unikalusk', ''),
(14, 'Špatas', 1300000, 30, 40, 2, 'spato', 'spatas', 'unikalusk', ''),
(15, 'Kvarcas', 1800000, 35, 45, 2, 'kvarco', 'kvarcas', 'unikalusk', '');

-- --------------------------------------------------------

--
-- Table structure for table `kasyklav2`
--

CREATE TABLE `kasyklav2` (
  `id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci DEFAULT '0',
  `kasimolvl` bigint(20) DEFAULT 0,
  `minlvl` bigint(20) DEFAULT 0,
  `maxlvl` bigint(20) DEFAULT 0,
  `lokacija` int(11) DEFAULT 0,
  `img` varchar(111) DEFAULT '0',
  `ruda` varchar(255) DEFAULT '0',
  `kirtiklis` varchar(255) DEFAULT '0',
  `kokiar` varchar(255) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kasyklav2`
--

INSERT INTO `kasyklav2` (`id`, `name`, `kasimolvl`, `minlvl`, `maxlvl`, `lokacija`, `img`, `ruda`, `kirtiklis`, `kokiar`) VALUES
(1, '2x Alavo rūda', 3000000, 40, 60, 1, 'alavo', 'alavas', 'unikalusk', 'ruda1'),
(2, '2x Vario rūda', 4000000, 50, 70, 1, 'vario', 'varis', 'unikalusk', ''),
(3, '2x Kadmio rūda', 5000000, 55, 75, 1, 'kadmio', 'kadmis', 'unikalusk', 'ruda3'),
(4, '2x Cirkonio rūda', 6000000, 60, 80, 1, 'cirkonio', 'cirkonis', 'unikalusk', ''),
(5, '2x Geležies rūda', 7000000, 65, 85, 1, 'gelezies', 'gelezis', 'unikalusk', ''),
(12, '2x Anglis', 30000000, 140, 160, 1, 'anglies', 'anglis', 'unikalusk', ''),
(6, '2x Sidabro rūda', 8500000, 70, 90, 1, 'sidabro', 'sidabras', 'unikalusk', ''),
(7, '2x Aukso rūda', 10000000, 80, 100, 1, 'aukso', 'auksas', 'unikalusk', ''),
(8, '2x Platinos rūda', 12500000, 90, 110, 1, 'platinos', 'platina', 'unikalusk', ''),
(9, '2x Titano rūda', 15000000, 110, 130, 1, 'titano', 'titanas', 'unikalusk', ''),
(10, '2x Osmio rūda', 20000000, 120, 140, 1, 'osmio', 'osmis', 'unikalusk', ''),
(11, '2x Mangano rūda', 25000000, 130, 150, 1, 'mangano', 'manganas', 'unikalusk', ''),
(16, '2x Anglis', 30000000, 140, 160, 1, 'anglies', 'anglis', 'unikalusk', ''),
(18, '2x Mineralai', 35000000, 150, 170, 1, 'mineralu', 'mineralai', 'unikalusk', ''),
(20, '2x Špatas', 40000000, 160, 180, 1, 'spato', 'spatas', 'unikalusk', ''),
(23, '2x Kvarcas', 50000000, 180, 200, 1, 'kvarco', 'kvarcas', 'unikalusk', '');

-- --------------------------------------------------------

--
-- Table structure for table `kasyklav3`
--

CREATE TABLE `kasyklav3` (
  `id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci DEFAULT '0',
  `kasimolvl` bigint(20) DEFAULT 0,
  `minlvl` bigint(20) DEFAULT 0,
  `maxlvl` bigint(20) DEFAULT 0,
  `lokacija` int(11) DEFAULT 0,
  `img` varchar(111) DEFAULT '0',
  `ruda` varchar(255) DEFAULT '0',
  `kirtiklis` varchar(255) DEFAULT '0',
  `kokiar` varchar(255) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kasyklav3`
--

INSERT INTO `kasyklav3` (`id`, `name`, `kasimolvl`, `minlvl`, `maxlvl`, `lokacija`, `img`, `ruda`, `kirtiklis`, `kokiar`) VALUES
(1, '5x Alavo rūda', 70000000, 200, 220, 1, 'alavo', 'alavas', 'unikalusk2', 'ruda1'),
(2, '5x Vario rūda', 100000000, 220, 240, 1, 'vario', 'varis', 'unikalusk2', ''),
(3, '5x Kadmio rūda', 120000000, 240, 260, 1, 'kadmio', 'kadmis', 'unikalusk2', 'ruda3'),
(4, '5x Cirkonio rūda', 150000000, 260, 280, 1, 'cirkonio', 'cirkonis', 'unikalusk2', ''),
(5, '5x Geležies rūda', 170000000, 280, 300, 1, 'gelezies', 'gelezis', 'unikalusk2', ''),
(6, '5x Sidabro rūda', 200000000, 300, 320, 1, 'sidabro', 'sidabras', 'unikalusk2', ''),
(7, '5x Aukso rūda', 250000000, 350, 400, 1, 'aukso', 'auksas', 'unikalusk2', ''),
(8, '5x Platinos rūda', 300000000, 400, 450, 1, 'platinos', 'platina', 'unikalusk2', ''),
(9, '5x Titano rūda', 350000000, 450, 500, 1, 'titano', 'titanas', 'unikalusk2', ''),
(10, '5x Osmio rūda', 400000000, 500, 550, 1, 'osmio', 'osmis', 'unikalusk2', ''),
(11, '5x Mangano rūda', 600000000, 600, 650, 1, 'mangano', 'manganas', 'unikalusk2', ''),
(16, '5x Anglis', 700000000, 700, 750, 1, 'anglies', 'anglis', 'unikalusk2', ''),
(18, '5x Mineralai', 800000000, 850, 1000, 1, 'mineralu', 'mineralai', 'unikalusk2', ''),
(20, '5x Špatas', 900000000, 1000, 1100, 1, 'spato', 'spatas', 'unikalusk2', ''),
(23, '5x Kvarcas', 1000000000, 1200, 1300, 1, 'kvarco', 'kvarcas', 'unikalusk2', '');

-- --------------------------------------------------------

--
-- Table structure for table `klaidos`
--

CREATE TABLE `klaidos` (
  `id` int(11) NOT NULL,
  `pasiulymas` varchar(225) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `kas` varchar(20) NOT NULL DEFAULT '',
  `laikas` int(11) DEFAULT 0,
  `busena` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `komentaras` varchar(225) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `unlike` bigint(255) DEFAULT 0,
  `likes` bigint(255) DEFAULT 0,
  `admin` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komandos_dtop_log`
--

CREATE TABLE `komandos_dtop_log` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) NOT NULL DEFAULT '',
  `laimejo` varchar(255) NOT NULL DEFAULT '',
  `veiksmai` varchar(255) NOT NULL DEFAULT '',
  `laikas` varchar(1255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komandos_sav_log`
--

CREATE TABLE `komandos_sav_log` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) NOT NULL DEFAULT '',
  `laimejo` varchar(255) NOT NULL DEFAULT '',
  `veiksmai` varchar(255) NOT NULL DEFAULT '',
  `laikas` varchar(1255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komandu_dtop`
--

CREATE TABLE `komandu_dtop` (
  `id` int(11) NOT NULL,
  `laimejo_kovu` bigint(255) NOT NULL DEFAULT 0,
  `team` varchar(255) NOT NULL DEFAULT '',
  `last` varchar(255) NOT NULL DEFAULT '',
  `laimejo` int(255) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komandu_sav_dtop`
--

CREATE TABLE `komandu_sav_dtop` (
  `id` int(11) NOT NULL,
  `laimejo_kovu` bigint(255) DEFAULT 0,
  `team` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentarai`
--

CREATE TABLE `komentarai` (
  `id` int(255) NOT NULL,
  `komentaras` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `kas` varchar(255) NOT NULL DEFAULT '',
  `kas2` varchar(255) NOT NULL DEFAULT '',
  `laikas` varchar(255) NOT NULL DEFAULT '',
  `time` int(255) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kovu_apsauga`
--

CREATE TABLE `kovu_apsauga` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `laikas` varchar(255) NOT NULL DEFAULT '',
  `count` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kvietimai_i_komanda`
--

CREATE TABLE `kvietimai_i_komanda` (
  `id` int(11) NOT NULL,
  `kas` varchar(255) NOT NULL DEFAULT '',
  `nick2` varchar(255) NOT NULL DEFAULT '',
  `team` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lankomumo_logas`
--

CREATE TABLE `lankomumo_logas` (
  `id` int(11) NOT NULL,
  `data` varchar(255) NOT NULL DEFAULT '',
  `uzsiregistravo` varchar(255) NOT NULL DEFAULT '',
  `prisijunge` varchar(255) NOT NULL DEFAULT '',
  `max_online` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `legendinis_sajanas`
--

CREATE TABLE `legendinis_sajanas` (
  `id` int(11) NOT NULL DEFAULT 0,
  `hp` varchar(255) DEFAULT '0',
  `hp_max` varchar(255) DEFAULT '0',
  `prisikels` varchar(255) DEFAULT '0',
  `nukirto` varchar(255) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `legendinis_sajanas`
--

INSERT INTO `legendinis_sajanas` (`id`, `hp`, `hp_max`, `prisikels`, `nukirto`) VALUES
(1, '639294', '1000000', '1680995172', 'miegaukis');

-- --------------------------------------------------------

--
-- Table structure for table `logas`
--

CREATE TABLE `logas` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `msg` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `laikas` varchar(255) NOT NULL DEFAULT '',
  `tipas` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lokacijos`
--

CREATE TABLE `lokacijos` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `img` varchar(111) NOT NULL,
  `nuo` varchar(255) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lokacijos`
--

INSERT INTO `lokacijos` (`id`, `name`, `img`, `nuo`) VALUES
(1, 'Žemė', 'planet', '1'),
(2, 'Namekai', 'planet2', '17000'),
(3, 'Androidai', 'planet1', '49000'),
(4, 'Žemės klonė', 'planet', '310000'),
(5, 'Naujoji planeta', 'planet3', '1199999'),
(6, 'Android planeta', 'planet4', '6999999'),
(7, 'Žemės atgimimas', 'planet1', '99999999'),
(8, 'Mirties planeta', 'planet5', '999999999'),
(9, 'Galaktikos planeta', 'planet6', '99999999999'),
(10, 'Sajanų planeta', 'planet7', '1199999999999'),
(11, 'Dievų planeta', 'planet9', '99999999999999'),
(12, 'Žemės Mirties Planeta', 'planet11', '500000000000000000'),
(13, 'Žemės Atgimimo planeta', 'planet10', '300000000000000000000'),
(14, 'Ateities žemė', 'planet', '149999999999999999999999'),
(15, 'Android sugryžimas', 'planet5', '6999999999999999999999999'),
(16, 'Sajanų sugryžimas', 'planet7', '1999999999999999999999999999'),
(17, 'Dievų sugryžimas', 'planet9', '199999999999999999999999999999'),
(18, 'Žemės dominavimas', 'planet1', '99999999999999999999999999999999'),
(19, 'Žemės apgultis', 'planet2', '99999999999999999999999999999999999'),
(20, 'Dievų atpildas', 'planet9', '9999999999999999999999999999999999999');

-- --------------------------------------------------------

--
-- Table structure for table `lokacijosv`
--

CREATE TABLE `lokacijosv` (
  `id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci DEFAULT '0',
  `img` varchar(111) DEFAULT '0',
  `nuo` varchar(255) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lokacijosv`
--

INSERT INTO `lokacijosv` (`id`, `name`, `img`, `nuo`) VALUES
(1, 'Žemė', 'planet2', '0');

-- --------------------------------------------------------

--
-- Table structure for table `loterija`
--

CREATE TABLE `loterija` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `kiek` varchar(255) NOT NULL DEFAULT '',
  `pryz` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m2_lokacijos`
--

CREATE TABLE `m2_lokacijos` (
  `id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m2_mobai`
--

CREATE TABLE `m2_mobai` (
  `id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) DEFAULT '0',
  `kg` varchar(9999) DEFAULT '0',
  `pin` bigint(20) DEFAULT 0,
  `exp` bigint(20) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

CREATE TABLE `machine` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `smugis` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `machine`
--

INSERT INTO `machine` (`id`, `nick`, `smugis`) VALUES
(1, 'qwerty', 5204);

-- --------------------------------------------------------

--
-- Table structure for table `medaliai`
--

CREATE TABLE `medaliai` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `uz` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `laikas` varchar(255) NOT NULL,
  `medalis` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `misijos`
--

CREATE TABLE `misijos` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `m1` varchar(1) NOT NULL DEFAULT '',
  `m2` varchar(1) NOT NULL DEFAULT '',
  `m3` varchar(1) NOT NULL DEFAULT '',
  `m4` varchar(1) NOT NULL DEFAULT '',
  `m5` varchar(1) NOT NULL DEFAULT '',
  `m6` varchar(1) NOT NULL DEFAULT '',
  `m7` varchar(1) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `misijos`
--

INSERT INTO `misijos` (`id`, `nick`, `m1`, `m2`, `m3`, `m4`, `m5`, `m6`, `m7`) VALUES
(1, 'testas1', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `misijos2`
--

CREATE TABLE `misijos2` (
  `id` int(11) NOT NULL,
  `nick` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `kario` bigint(20) NOT NULL,
  `galios` bigint(20) NOT NULL,
  `sparnu` bigint(20) NOT NULL,
  `lokacija` int(11) NOT NULL,
  `atlg` varchar(11) NOT NULL,
  `laikas` varchar(11) NOT NULL,
  `kas` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mobai`
--

CREATE TABLE `mobai` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `kg` varchar(255) DEFAULT '0',
  `pin` bigint(255) DEFAULT 0,
  `exp` decimal(60,2) UNSIGNED DEFAULT 0.00,
  `lokacija` int(11) DEFAULT 0,
  `img` varchar(111) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mobai`
--

INSERT INTO `mobai` (`id`, `name`, `kg`, `pin`, `exp`, `lokacija`, `img`) VALUES
(1, 'Krilinas', '50', 1, 0.01, 1, 'Krilinas'),
(2, 'Bulma', '200', 2, 0.02, 1, 'Bulma'),
(3, 'Bardokas', '500', 3, 0.03, 1, 'Bardokas'),
(4, 'Napas', '1100', 4, 0.04, 1, 'Nappas'),
(5, 'Tranksas', '1800', 5, 0.05, 1, 'Tranksas'),
(6, 'Gohanas', '3000', 6, 0.06, 1, 'Gohanas'),
(7, 'Vedzitas', '5000', 7, 0.07, 1, 'Vedzitas'),
(8, 'Gokas', '8000', 8, 0.08, 1, 'Gokas'),
(9, 'Fryzas', '13000', 9, 0.09, 1, 'Fryzas'),
(10, 'Dendis', '18000', 10, 0.10, 2, 'Dendis'),
(11, 'Pikolas', '26000', 11, 0.20, 2, 'Pikolas'),
(12, 'Neilas', '37000', 12, 0.30, 2, 'Neilas'),
(13, 'Android 19', '50000', 13, 0.40, 3, 'Android 19'),
(14, 'Android 20', '70000', 14, 0.50, 3, 'Daktaras gerro'),
(15, 'Android 18', '100000', 15, 0.60, 3, 'Android 18'),
(16, 'Android 17', '150000', 16, 1.00, 3, 'Android 17'),
(17, 'Android 16', '230000', 17, 2.00, 3, 'Android 16'),
(18, 'Raditas', '320000', 18, 3.00, 4, 'Raditas'),
(19, 'Brolis', '450000', 19, 4.00, 4, 'Brolis'),
(20, 'Buu', '620000', 20, 5.00, 4, 'Buu'),
(21, 'Kuleris', '800000', 21, 6.00, 4, 'Kuleris'),
(22, 'Pikonas', '1200000', 22, 7.00, 5, 'Pikonas'),
(23, 'Nappas', '1700000', 23, 8.00, 5, 'Nappas'),
(24, 'Selas', '2500000', 24, 9.00, 5, 'Selas'),
(25, 'Kapitonas ginis', '3500000', 25, 10.00, 5, 'Kapitonas ginis'),
(26, 'Android 20', '5000000', 26, 11.00, 5, 'Android 20'),
(27, 'Android 18', '7000000', 27, 12.00, 6, 'Android 18'),
(28, 'Android 16', '12000000', 28, 13.00, 6, 'Android 16'),
(29, 'Android 17', '19000000', 29, 14.00, 6, 'Android 17'),
(31, 'Android 20', '42000000', 30, 15.00, 6, 'Android 20'),
(32, 'Selas', '58000000', 31, 16.00, 6, 'Selas'),
(33, 'Kuleris', '75000000', 32, 17.00, 6, 'Kuleris'),
(36, 'Įniršęs Krilinas', '100000000', 33, 18.00, 7, 'Krilinas'),
(37, 'Įniršęs Gohanas', '150000000', 34, 19.00, 7, 'Gohanas'),
(38, 'Įniršęs Vedzitas', '220000000', 35, 20.00, 7, 'Vedzitas'),
(39, 'Įniršęs Gokas', '300000000', 36, 21.00, 7, 'Gokas'),
(40, 'Įniršęs Tranksas', '400000000', 37, 22.00, 7, 'Tranksas'),
(41, 'Įniršusi Bulma', '500000000', 38, 23.00, 7, 'Bulma'),
(42, 'Mobas', '1000000000', 39, 24.00, 8, 'Krilinas'),
(43, 'Mobas', '2000000000', 40, 25.00, 8, 'Vedzitas'),
(44, 'Mobas', '5000000000', 41, 26.00, 8, 'Gokas'),
(45, 'Mobas', '10000000000', 42, 27.00, 8, 'Kale'),
(46, 'Mobas', '20000000000', 50, 28.00, 8, 'Raditas'),
(47, 'Mobas', '40000000000', 60, 29.00, 8, 'Fryzas'),
(48, 'Mobas', '70000000000', 70, 30.00, 8, 'Jiren'),
(49, 'Mobas', '100000000000', 80, 31.00, 9, 'Kaba'),
(50, 'Mobas', '150000000000', 90, 32.00, 9, 'Android 17'),
(51, 'Mobas', '250000000000', 100, 33.00, 9, 'Buu'),
(52, 'Mobas', '500000000000', 110, 34.00, 9, 'Hitas'),
(53, 'Mobas', '800000000000', 120, 35.00, 9, 'Toppo'),
(54, 'Mobas', '1200000000000', 130, 36.00, 10, 'Vegito'),
(55, 'Μobas', '3000000000000', 140, 37.00, 10, 'Gokugodred'),
(56, 'Μobas', '8000000000000', 150, 38.00, 10, 'Gokublack'),
(57, 'Μobas', '15000000000000', 160, 39.00, 10, 'Gokugodblue'),
(58, 'Μobas', '30000000000000', 170, 40.00, 10, 'Kefla'),
(59, 'Μobas', '50000000000000', 180, 41.00, 10, 'Gokuultra'),
(60, 'Mobas', '100000000000000', 190, 42.00, 11, 'Sidra'),
(61, 'Mobas', '200000000000000', 200, 43.00, 11, 'Liquiir'),
(62, 'Mobas', '500000000000000', 210, 44.00, 11, 'Sour'),
(63, 'Mobas', '1000000000000000', 220, 45.00, 11, 'Gokugodred'),
(64, 'Mobas', '5000000000000000', 230, 46.00, 11, 'Gokugodblue'),
(65, 'Mobas', '15000000000000000', 240, 47.00, 11, 'Kefla'),
(66, 'Mobas', '50000000000000000', 250, 48.00, 11, 'Gokuultra'),
(67, 'Jiren', '150000000000000000', 260, 49.00, 11, 'Jiren'),
(68, 'Mobas', '500000000000000000', 270, 50.00, 12, 'Krilinas'),
(69, 'Mobas', '2000000000000000000', 280, 51.00, 12, 'Pikolas'),
(70, 'Mobas', '5000000000000000000', 290, 52.00, 12, 'Gohanas'),
(71, 'Mobas', '10000000000000000000', 300, 53.00, 12, 'Fryzas'),
(72, 'Mobas', '50000000000000000000', 310, 54.00, 12, 'Vedzitas'),
(73, 'Mobas', '100000000000000000000', 320, 55.00, 12, 'Gokas'),
(74, 'Μobas', '300000000000000000000', 330, 56.00, 13, 'Krilinas'),
(75, 'Mobas', '800000000000000000000', 340, 57.00, 13, 'Bulma'),
(76, 'Mobas', '1500000000000000000000', 350, 58.00, 13, 'Gohanas'),
(77, 'Mobas', '5000000000000000000000', 360, 59.00, 13, 'Pikolas'),
(78, 'Mobas', '15000000000000000000000', 370, 60.00, 13, 'Fryzas'),
(79, 'Mobas', '50000000000000000000000', 380, 2900.00, 13, 'Bardokas'),
(80, 'Mobas', '100000000000000000000000', 390, 3000.00, 13, 'Gokas'),
(81, 'Μobas', '149999999999999999999999', 400, 3100.00, 14, 'Bardokas'),
(82, 'Μobas', '249999999999999999999999', 410, 3200.00, 14, 'Bulma'),
(83, 'Μobas', '399999999999999999999999', 420, 3300.00, 14, 'Gohanas'),
(84, 'Μobas', '599999999999999999999999', 430, 3400.00, 14, 'Pikolas'),
(85, 'Μobas', '999999999999999999999999', 440, 3500.00, 14, 'Krilinas'),
(86, 'Μobas', '1999999999999999999999999', 450, 3600.00, 14, 'Vedzitas'),
(87, 'Μobas', '2999999999999999999999999', 460, 3700.00, 14, 'Gokas'),
(88, 'Μobas', '3999999999999999999999999', 470, 3800.00, 14, 'Tranksas'),
(89, 'Mobas', '6999999999999999999999999', 480, 3900.00, 15, 'Android 16'),
(90, 'Mobas', '14999999999999999999999999', 490, 4000.00, 15, 'Android 17'),
(91, 'Mobas', '49999999999999999999999999', 500, 4100.00, 15, 'Android 17'),
(92, 'Mobas', '99999999999999999999999999', 600, 4200.00, 15, 'Android 18'),
(93, 'Mobas', '299999999999999999999999999', 700, 4300.00, 15, 'Android 19'),
(94, 'Mobas', '499999999999999999999999999', 800, 4400.00, 15, 'Android 20'),
(95, 'Mobas', '999999999999999999999999999', 900, 4500.00, 15, 'Selas'),
(96, 'Mobas', '1999999999999999999999999999', 1000, 4600.00, 16, 'Vegito'),
(97, 'Mobas', '4999999999999999999999999999', 1100, 4700.00, 16, 'Gokugodred'),
(98, 'Mobas', '9999999999999999999999999999', 1200, 4800.00, 16, 'Gokublack'),
(99, 'Mobas', '19999999999999999999999999999', 1300, 4900.00, 16, 'Gokugodblue'),
(100, 'Mobas', '49999999999999999999999999999', 1400, 5000.00, 16, 'Kefla'),
(101, 'Mobas', '99999999999999999999999999999', 1500, 5100.00, 16, 'Gokuultra'),
(102, 'Mobas', '199999999999999999999999999999', 1600, 5200.00, 17, 'Sidra'),
(103, 'Mobas', '499999999999999999999999999999', 1700, 5300.00, 17, 'Liquiir'),
(104, 'Mobas', '999999999999999999999999999999', 1800, 5400.00, 17, 'Sour'),
(105, 'Mobas', '1999999999999999999999999999999', 1900, 5500.00, 17, 'Gokugodred'),
(106, 'Mobas', '4999999999999999999999999999999', 2000, 5600.00, 17, 'Gokugodblue'),
(107, 'Mobas', '9999999999999999999999999999999', 2100, 5700.00, 17, 'Kefla'),
(108, 'Mobas', '19999999999999999999999999999999', 2200, 5800.00, 17, 'Gokuultra'),
(109, 'Mobas', '49999999999999999999999999999999', 2300, 5900.00, 17, 'Jiren'),
(110, 'Mobas', '99999999999999999999999999999999', 2400, 6000.00, 18, 'Bulma'),
(111, 'Mobas', '199999999999999999999999999999999', 2500, 6100.00, 18, 'Krilinas'),
(112, 'Mobas', '499999999999999999999999999999999', 2600, 6200.00, 18, 'Krilinas'),
(113, 'Mobas', '999999999999999999999999999999999', 2700, 6300.00, 18, 'Gohanas'),
(114, 'Mobas', '1999999999999999999999999999999999', 2800, 6400.00, 18, 'Raditas'),
(115, 'Mobas', '4999999999999999999999999999999999', 2900, 6500.00, 18, 'Pikolas'),
(116, 'Mobas', '9999999999999999999999999999999999', 3000, 6600.00, 18, 'Vedzitas'),
(117, 'Mobas', '19999999999999999999999999999999999', 3100, 6700.00, 18, 'Buu'),
(118, 'Mobas', '49999999999999999999999999999999999', 3200, 6800.00, 18, 'Gokas'),
(119, 'Bulma', '99999999999999999999999999999999999', 3300, 6900.00, 19, 'Bulma'),
(120, 'Krilinaa', '199999999999999999999999999999999999', 3400, 7000.00, 19, 'Krilinas'),
(121, 'Mobas', '499999999999999999999999999999999999', 3500, 7100.00, 19, 'Vedzitas'),
(122, 'Mobas', '999999999999999999999999999999999999', 3600, 7200.00, 19, 'Gohanas'),
(123, 'Mobas', '1999999999999999999999999999999999999', 3700, 7300.00, 19, 'Pikolas'),
(124, 'Mobas', '3999999999999999999999999999999999999', 3800, 7400.00, 19, 'Raditas'),
(125, 'Mobas', '6999999999999999999999999999999999999', 3900, 7500.00, 19, 'Gokas'),
(126, 'Mobas', '9999999999999999999999999999999999999', 4000, 7600.00, 20, 'Sour'),
(127, 'Mobas', '19999999999999999999999999999999999999', 4100, 7800.00, 20, 'Gokublack'),
(128, 'Mobas', '39999999999999999999999999999999999999', 4200, 7900.00, 20, 'Gokugodred'),
(129, 'Mobas', '69999999999999999999999999999999999999', 4300, 8000.00, 20, 'Gokugodblue'),
(130, 'Mobas', '99999999999999999999999999999999999999', 4400, 8100.00, 20, 'Sidra'),
(131, 'Mobas', '199999999999999999999999999999999999999', 4500, 8200.00, 20, 'Kefla'),
(132, 'Mobas', '399999999999999999999999999999999999999', 4600, 8300.00, 20, 'Jiren'),
(133, 'Mobas', '699999999999999999999999999999999999999', 4700, 10000.00, 20, 'Gokuultra');

-- --------------------------------------------------------

--
-- Table structure for table `mobaiv`
--

CREATE TABLE `mobaiv` (
  `id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci DEFAULT '0',
  `kg` varchar(255) DEFAULT '0',
  `duoskg` bigint(255) DEFAULT 0,
  `exp` bigint(20) DEFAULT 0,
  `lokacija` int(11) DEFAULT 0,
  `img` varchar(111) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mobaiv`
--

INSERT INTO `mobaiv` (`id`, `name`, `kg`, `duoskg`, `exp`, `lokacija`, `img`) VALUES
(1, 'Mobas1', '0', 1, 51, 1, 'Bulma');

-- --------------------------------------------------------

--
-- Table structure for table `moddal`
--

CREATE TABLE `moddal` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `vksm` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mokykla`
--

CREATE TABLE `mokykla` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `pamoka` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `new` text CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `kas` varchar(100) NOT NULL DEFAULT '',
  `data` varchar(50) NOT NULL DEFAULT '',
  `likes` int(11) DEFAULT 0,
  `unlike` int(11) DEFAULT 0,
  `versija` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_rep`
--

CREATE TABLE `news_rep` (
  `id` int(11) NOT NULL,
  `kas` varchar(255) NOT NULL DEFAULT '',
  `kam` int(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nick_turgus`
--

CREATE TABLE `nick_turgus` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ns`
--

CREATE TABLE `ns` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `msg` text NOT NULL,
  `laikas` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ns`
--

INSERT INTO `ns` (`id`, `nick`, `msg`, `laikas`) VALUES
(1, 'marlboro', 'Sveiki', '1645356602'),
(2, 'marlboro', 'sveiki', '1645308903');

-- --------------------------------------------------------

--
-- Table structure for table `nustatymai`
--

CREATE TABLE `nustatymai` (
  `1` int(11) NOT NULL,
  `max_on` int(11) NOT NULL DEFAULT 0,
  `dtop_priz` bigint(255) DEFAULT 0,
  `dtop_rek` int(11) DEFAULT 0,
  `dtop_rek_n` varchar(100) NOT NULL DEFAULT '',
  `dtop_date` varchar(100) NOT NULL DEFAULT '',
  `event` varchar(2) NOT NULL DEFAULT '',
  `admin_topic` text CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `admin_kas` varchar(20) NOT NULL DEFAULT '',
  `admin_time` int(11) DEFAULT 0,
  `new_time` int(11) DEFAULT 0,
  `reg` varchar(2) NOT NULL DEFAULT '',
  `sms_date` varchar(100) NOT NULL DEFAULT '',
  `sms_priz` bigint(255) DEFAULT 0,
  `sav_dtop_priz` bigint(255) DEFAULT 0,
  `team_ismokejimas` varchar(255) NOT NULL DEFAULT '',
  `balls` bigint(255) DEFAULT 0,
  `balsavimas` varchar(2) NOT NULL DEFAULT '',
  `dtop_ltl` varchar(255) NOT NULL DEFAULT '',
  `lotery_priz` varchar(255) NOT NULL DEFAULT '',
  `lotery_date` varchar(255) NOT NULL DEFAULT '',
  `isbar_time` varchar(255) NOT NULL DEFAULT '',
  `atvedimu_time` varchar(255) NOT NULL DEFAULT '',
  `m_time` varchar(255) NOT NULL DEFAULT '',
  `snd_max` varchar(255) NOT NULL DEFAULT '',
  `new` varchar(255) NOT NULL DEFAULT '',
  `quest` varchar(255) NOT NULL DEFAULT '',
  `diena` varchar(255) NOT NULL DEFAULT '',
  `s_top` varchar(255) NOT NULL DEFAULT '',
  `kom_dtop` varchar(255) NOT NULL DEFAULT '',
  `last` varchar(255) NOT NULL DEFAULT '',
  `lotery_win` varchar(255) NOT NULL DEFAULT '',
  `savaites_topas_liko` int(225) DEFAULT 0,
  `max_online_date` varchar(255) NOT NULL DEFAULT '',
  `kovos` varchar(2) NOT NULL DEFAULT '',
  `pas` varchar(2) NOT NULL DEFAULT '',
  `topic` varchar(2) NOT NULL DEFAULT '',
  `pasiekimai` varchar(2) NOT NULL DEFAULT '',
  `misijos` varchar(2) NOT NULL DEFAULT '',
  `kom_sav_dtop` varchar(255) NOT NULL DEFAULT '',
  `kom_sav_liko` varchar(255) NOT NULL DEFAULT '',
  `kom_last` varchar(255) NOT NULL DEFAULT '',
  `last2` varchar(255) NOT NULL DEFAULT '',
  `last3` varchar(255) NOT NULL DEFAULT '',
  `laimejo_kovu` varchar(255) NOT NULL DEFAULT '',
  `laimejo_kovu2` varchar(255) NOT NULL DEFAULT '',
  `iki_algos` int(255) DEFAULT 0,
  `ip` varchar(255) NOT NULL DEFAULT '',
  `ip2` varchar(255) NOT NULL DEFAULT '',
  `ip3` varchar(255) NOT NULL DEFAULT '',
  `snekute` varchar(255) NOT NULL DEFAULT '',
  `bendravimo_priz` int(255) DEFAULT 0,
  `bendravimo_date` varchar(255) NOT NULL DEFAULT '',
  `bendravimo_priz2` int(255) DEFAULT 0,
  `sms_priz2` int(255) DEFAULT 0,
  `mod_topic` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `mod_kas` varchar(255) NOT NULL DEFAULT '',
  `mod_time` varchar(255) NOT NULL DEFAULT '',
  `savdtop_priz` int(255) DEFAULT 0,
  `savdtop_priz2` int(255) DEFAULT 0,
  `pin_time` varchar(255) NOT NULL DEFAULT '',
  `monakas` varchar(2) NOT NULL DEFAULT '',
  `kasimo_priz` int(11) DEFAULT 0,
  `kasimo_date` varchar(255) NOT NULL DEFAULT '',
  `sms_priz3` int(255) DEFAULT 0,
  `sndnew` int(111) DEFAULT 0,
  `kasimowin` varchar(111) NOT NULL DEFAULT '',
  `chatwin` varchar(111) NOT NULL DEFAULT '',
  `savaiteswin` varchar(111) NOT NULL DEFAULT '',
  `moddalybos` varchar(11) NOT NULL DEFAULT '',
  `nick` varchar(255) NOT NULL DEFAULT '',
  `daily_mission_date` date NOT NULL,
  `daily_mission_reward` int(11) NOT NULL,
  `daily_mission_win` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `nustatymai`
--

INSERT INTO `nustatymai` (`1`, `max_on`, `dtop_priz`, `dtop_rek`, `dtop_rek_n`, `dtop_date`, `event`, `admin_topic`, `admin_kas`, `admin_time`, `new_time`, `reg`, `sms_date`, `sms_priz`, `sav_dtop_priz`, `team_ismokejimas`, `balls`, `balsavimas`, `dtop_ltl`, `lotery_priz`, `lotery_date`, `isbar_time`, `atvedimu_time`, `m_time`, `snd_max`, `new`, `quest`, `diena`, `s_top`, `kom_dtop`, `last`, `lotery_win`, `savaites_topas_liko`, `max_online_date`, `kovos`, `pas`, `topic`, `pasiekimai`, `misijos`, `kom_sav_dtop`, `kom_sav_liko`, `kom_last`, `last2`, `last3`, `laimejo_kovu`, `laimejo_kovu2`, `iki_algos`, `ip`, `ip2`, `ip3`, `snekute`, `bendravimo_priz`, `bendravimo_date`, `bendravimo_priz2`, `sms_priz2`, `mod_topic`, `mod_kas`, `mod_time`, `savdtop_priz`, `savdtop_priz2`, `pin_time`, `monakas`, `kasimo_priz`, `kasimo_date`, `sms_priz3`, `sndnew`, `kasimowin`, `chatwin`, `savaiteswin`, `moddalybos`, `nick`, `daily_mission_date`, `daily_mission_reward`, `daily_mission_win`) VALUES
(1, 16, 103147, 1000, '', '2023-05-21', '', 'Sveiki. Atliktas restartas.', 'testas1', 1684664028, 1672502576, '+', '2023-05-21', 1412, 0, '1684676696', 376013, '', '', '2', '2023-02-16', '2023-05-21', '2023-05-21', '2023-05-21', '3', 'testas1', '2023-05-21', '6', '', '2023-05-21', '', '', 1685215960, '1678218720', '+', '+', '+', '+', '+', '', '1685215960', '', '', '', '', '', 0, '78.157.85.78', '78.157.85.78', '78.157.85.78', '', 204, '2023-05-21', 25623, 387, '...', 'testas1', '1675517289', 14289, 72174, '2023-05-21', '', 6716, '2023-05-21', 7, 0, '', '', '', '-', '', '2023-05-21', 34, '');

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE `online` (
  `id` int(11) NOT NULL,
  `nick` varchar(100) NOT NULL,
  `vieta` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `nrs` text NOT NULL,
  `ip` varchar(50) DEFAULT '0',
  `time` int(11) DEFAULT 0,
  `time_on` int(11) DEFAULT 0,
  `gausite` varchar(111) NOT NULL,
  `nuotaika` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pakvietimai`
--

CREATE TABLE `pakvietimai` (
  `id` int(11) NOT NULL,
  `kviecia` varchar(255) NOT NULL DEFAULT '',
  `nick` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pasiek`
--

CREATE TABLE `pasiek` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `img` varchar(111) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pasiek`
--

INSERT INTO `pasiek` (`id`, `name`, `img`) VALUES
(1, 'Lygio Pasiekimai', 'lvl'),
(6, 'Eurų Pasiekimai', 'euro'),
(5, 'Veiksmų Pasiekimai', 'attack1'),
(7, 'Kasimo Pasiekimai', 'kasimo'),
(8, 'Botas Cash Pasiekimai', 'cash'),
(9, 'Bosų Pasiekimai', 'boss'),
(10, 'Kreditų', 'kred');

-- --------------------------------------------------------

--
-- Table structure for table `pasiek2`
--

CREATE TABLE `pasiek2` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `kiek` bigint(20) NOT NULL,
  `pt` bigint(20) NOT NULL,
  `pasiek` bigint(20) NOT NULL,
  `kas` int(11) NOT NULL,
  `img` varchar(111) NOT NULL,
  `ko` varchar(11) NOT NULL,
  `ka` varchar(11) NOT NULL,
  `ko2` varchar(22) NOT NULL,
  `eur` bigint(20) NOT NULL,
  `done` varchar(255) NOT NULL,
  `euru` varchar(254) NOT NULL,
  `euru2` varchar(25) NOT NULL,
  `euru3` varchar(25) NOT NULL,
  `euru4` varchar(25) NOT NULL,
  `euru5` varchar(52) NOT NULL,
  `euru6` varchar(25) NOT NULL,
  `euru7` varchar(25) NOT NULL,
  `euru8` varchar(25) NOT NULL,
  `euru9` varchar(25) NOT NULL,
  `euru10` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pasiek2`
--

INSERT INTO `pasiek2` (`id`, `name`, `kiek`, `pt`, `pasiek`, `kas`, `img`, `ko`, `ka`, `ko2`, `eur`, `done`, `euru`, `euru2`, `euru3`, `euru4`, `euru5`, `euru6`, `euru7`, `euru8`, `euru9`, `euru10`) VALUES
(1, 'Pasiekti', 10, 50, 0, 1, 'lvl', 'LVL', 'lvl', 'lygis', 5, '', '', '', '', '', '', '', '', '', '', ''),
(2, 'Pasiekti', 20, 100, 0, 1, 'lvl', 'LVL', 'lvl2', 'lygis', 10, '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Pasiekti', 30, 150, 0, 1, 'lvl', 'LVL', 'lvl3', 'lygis', 15, '', '', '', '', '', '', '', '', '', '', ''),
(4, 'Pasiekti', 40, 200, 0, 1, 'lvl', 'LVL', 'lvl4', 'lygis', 20, '', '', '', '', '', '', '', '', '', '', ''),
(5, 'Pasiekti', 50, 250, 0, 1, 'lvl', 'LVL', 'lvl5', 'lygis', 25, '', '', '', '', '', '', '', '', '', '', ''),
(6, 'Pasiekti', 60, 300, 0, 1, 'lvl', 'LVL', 'lvl6', 'lygis', 30, '', '', '', '', '', '', '', '', '', '', ''),
(7, 'Pasiekti', 70, 350, 0, 1, 'lvl', 'LVL', 'lvl7', 'lygis', 35, '', '', '', '', '', '', '', '', '', '', ''),
(8, 'Pasiekti', 100, 400, 0, 1, 'lvl', 'LVL', 'lvl8', 'lygis', 40, '', '', '', '', '', '', '', '', '', '', ''),
(9, 'Pasiekti', 130, 450, 0, 1, 'lvl', 'LVL', 'lvl9', 'lygis', 45, '', '', '', '', '', '', '', '', '', '', ''),
(10, 'Pasiekti', 160, 500, 0, 1, 'lvl', 'LVL', 'lvl10', 'lygis', 50, '', '', '', '', '', '', '', '', '', '', ''),
(11, 'Padaryti', 5000, 50, 0, 5, 'attack1', 'Veiksmu', 'vksm', 'veiksmai', 5, '', '', '', '', '', '', '', '', '', '', ''),
(12, 'Padaryti', 10000, 100, 0, 5, 'attack1', 'Veiksmu', 'vksm2', 'veiksmai', 10, '', '', '', '', '', '', '', '', '', '', ''),
(13, 'Padaryti', 20000, 150, 0, 5, 'attack1', 'Veiksmu', 'vksm3', 'veiksmai', 15, '', '', '', '', '', '', '', '', '', '', ''),
(14, 'Padaryti', 50000, 200, 0, 5, 'attack1', 'Veiksmu', 'vksm4', 'veiksmai', 20, '', '', '', '', '', '', '', '', '', '', ''),
(15, 'Padaryti', 100000, 250, 0, 5, 'attack1', 'Veiksmu', 'vksm5', 'veiksmai', 25, '', '', '', '', '', '', '', '', '', '', ''),
(16, 'Padaryti', 200000, 300, 0, 5, 'attack1', 'Veiksmu', 'vksm6', 'veiksmai', 30, '', '', '', '', '', '', '', '', '', '', ''),
(17, 'Padaryti', 400000, 350, 0, 5, 'attack1', 'Veiksmu', 'vksm7', 'veiksmai', 35, '', '', '', '', '', '', '', '', '', '', ''),
(18, 'Padaryti', 700000, 400, 0, 5, 'attack1', 'Veiksmu', 'vksm8', 'veiksmai', 40, '', '', '', '', '', '', '', '', '', '', ''),
(19, 'Padaryti', 1000000, 450, 0, 5, 'attack1', 'Veiksmu', 'vksm9', 'veiksmai', 45, '', '', '', '', '', '', '', '', '', '', ''),
(20, 'Padaryti', 1500000, 500, 0, 5, 'attack1', 'Veiksmu', 'vksm10', 'veiksmai', 50, '', '', '', '', '', '', '', '', '', '', ''),
(21, 'Sutaupyti', 100, 50, 0, 6, 'euro', 'Euru', 'euru', 'sms_litai', 5, '', '', '', '', '', '', '', '', '', '', ''),
(22, 'Sutaupyti', 500, 100, 0, 6, 'euro', 'Euru', 'euru2', 'sms_litai', 10, '', '', '', '', '', '', '', '', '', '', ''),
(23, 'Sutaupyti', 1000, 150, 0, 6, 'euro', 'Euru', 'euru3', 'sms_litai', 15, '', '', '', '', '', '', '', '', '', '', ''),
(24, 'Sutaupyti', 2000, 200, 0, 6, 'euro', 'Euru', 'euru4', 'sms_litai', 20, '', '', '', '', '', '', '', '', '', '', ''),
(25, 'Sutaupyti', 4000, 250, 0, 6, 'euro', 'Euru', 'euru5', 'sms_litai', 25, '', '', '', '', '', '', '', '', '', '', ''),
(26, 'Sutaupyti', 7000, 300, 0, 6, 'euro', 'Euru', 'euru6', 'sms_litai', 30, '', '', '', '', '', '', '', '', '', '', ''),
(27, 'Sutaupyti', 10000, 350, 0, 6, 'euro', 'Euru', 'euru7', 'sms_litai', 35, '', '', '', '', '', '', '', '', '', '', ''),
(28, 'Sutaupyti', 20000, 350, 0, 6, 'euro', 'Euru', 'euru8', 'sms_litai', 40, '', '', '', '', '', '', '', '', '', '', ''),
(29, 'Sutaupyti', 30000, 400, 0, 6, 'euro', 'Euru', 'euru9', 'sms_litai', 45, '', '', '', '', '', '', '', '', '', '', ''),
(30, 'Sutaupyti', 50000, 500, 0, 6, 'euro', 'Euru', 'euru10', 'sms_litai', 50, '', '', '', '', '', '', '', '', '', '', ''),
(31, 'Pasikelti', 50000, 50, 0, 7, 'kasimo', 'LVL kasimo', 'kasu', 'kasimolvl', 5, '', '', '', '', '', '', '', '', '', '', ''),
(32, 'Pasikelti', 100000, 100, 0, 7, 'kasimo', 'LVL kasimo', 'kasu2', 'kasimolvl', 10, '', '', '', '', '', '', '', '', '', '', ''),
(33, 'Pasikelti', 250000, 150, 0, 7, 'kasimo', 'LVL kasimo', 'kasu3', 'kasimolvl', 15, '', '', '', '', '', '', '', '', '', '', ''),
(34, 'Pasikelti', 500000, 200, 0, 7, 'kasimo', 'LVL kasimo', 'kasu4', 'kasimolvl', 20, '', '', '', '', '', '', '', '', '', '', ''),
(35, 'Pasikelti', 1000000, 250, 0, 7, 'kasimo', 'LVL kasimo', 'kasu5', 'kasimolvl', 25, '', '', '', '', '', '', '', '', '', '', ''),
(36, 'Pasikelti', 2000000, 300, 0, 7, 'kasimo', 'LVL kasimo', 'kasu6', 'kasimolvl', 30, '', '', '', '', '', '', '', '', '', '', ''),
(37, 'Pasikelti', 5000000, 350, 0, 7, 'kasimo', 'LVL kasimo', 'kasu7', 'kasimolvl', 35, '', '', '', '', '', '', '', '', '', '', ''),
(38, 'Pasikelti', 10000000, 400, 0, 7, 'kasimo', 'LVL kasimo', 'kasu8', 'kasimolvl', 40, '', '', '', '', '', '', '', '', '', '', ''),
(39, 'Pasikelti', 20000000, 450, 0, 7, 'kasimo', 'LVL kasimo', 'kasu9', 'kasimolvl', 45, '', '', '', '', '', '', '', '', '', '', ''),
(40, 'Pasikelti', 50000000, 500, 0, 7, 'kasimo', 'LVL kasimo', 'kasu10', 'kasimolvl', 50, '', '', '', '', '', '', '', '', '', '', ''),
(41, 'Sutaupyti', 10, 50, 0, 8, 'cash', 'Botas Cash', 'cash', 'botas', 5, '', '', '', '', '', '', '', '', '', '', ''),
(42, 'Sutaupyti', 20, 100, 0, 8, 'cash', 'Botas Cash', 'cash2', 'botas', 10, '', '', '', '', '', '', '', '', '', '', ''),
(43, 'Sutaupyti', 50, 150, 0, 8, 'cash', 'Botas Cash', 'cash3', 'botas', 15, '', '', '', '', '', '', '', '', '', '', ''),
(44, 'Sutaupyti', 100, 200, 0, 8, 'cash', 'Botas Cash', 'cash4', 'botas', 20, '', '', '', '', '', '', '', '', '', '', ''),
(45, 'Sutaupyti', 150, 250, 0, 8, 'cash', 'Botas Cash', 'cash5', 'botas', 25, '', '', '', '', '', '', '', '', '', '', ''),
(46, 'Sutaupyti', 200, 300, 0, 8, 'cash', 'Botas Cash', 'cash6', 'botas', 30, '', '', '', '', '', '', '', '', '', '', ''),
(47, 'Sutaupyti', 300, 350, 0, 8, 'cash', 'Botas Cash', 'cash7', 'botas', 35, '', '', '', '', '', '', '', '', '', '', ''),
(48, 'Sutaupyti', 400, 400, 0, 8, 'cash', 'Botas Cash', 'cash8', 'botas', 40, '', '', '', '', '', '', '', '', '', '', ''),
(49, 'Sutaupyti', 500, 450, 0, 8, 'cash', 'Botas Cash', 'cash9', 'botas', 45, '', '', '', '', '', '', '', '', '', '', ''),
(50, 'Sutaupyti', 700, 500, 0, 8, 'cash', 'Botas Cash', 'cash10', 'botas', 50, '', '', '', '', '', '', '', '', '', '', ''),
(51, 'Užmušti', 50, 50, 0, 9, 'boss', 'Bosu', 'boss', 'nukirtobosu', 5, '', '', '', '', '', '', '', '', '', '', ''),
(52, 'Užmušti', 100, 100, 0, 9, 'boss', 'Bosu', 'boss2', 'nukirtobosu', 10, '', '', '', '', '', '', '', '', '', '', ''),
(53, 'Užmušti', 150, 150, 0, 9, 'boss', 'Bosu', 'boss3', 'nukirtobosu', 15, '', '', '', '', '', '', '', '', '', '', ''),
(54, 'Užmušti', 200, 200, 0, 9, 'boss', 'Bosu', 'boss4', 'nukirtobosu', 20, '', '', '', '', '', '', '', '', '', '', ''),
(55, 'Užmušti', 300, 250, 0, 9, 'boss', 'Bosu', 'boss5', 'nukirtobosu', 25, '', '', '', '', '', '', '', '', '', '', ''),
(56, 'Užmušti', 400, 300, 0, 9, 'boss', 'Bosu', 'boss6', 'nukirtobosu', 30, '', '', '', '', '', '', '', '', '', '', ''),
(57, 'Užmušti', 500, 350, 0, 9, 'boss', 'Bosu', 'boss7', 'nukirtobosu', 35, '', '', '', '', '', '', '', '', '', '', ''),
(58, 'Užmušti', 700, 400, 0, 9, 'boss', 'Bosu', 'boss8', 'nukirtobosu', 40, '', '', '', '', '', '', '', '', '', '', ''),
(59, 'Užmušti', 1000, 450, 0, 9, 'boss', 'Bosu', 'boss9', 'nukirtobosu', 45, '', '', '', '', '', '', '', '', '', '', ''),
(60, 'Užmušti', 1500, 500, 0, 9, 'boss', 'Bosu', 'boss10', 'nukirtobosu', 50, '', '', '', '', '', '', '', '', '', '', ''),
(61, 'Sutaupyti', 300, 50, 0, 0, 'kred', 'Kredit?', 'kred', 'Kredit?', 20, '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pasiekimai`
--

CREATE TABLE `pasiekimai` (
  `id` int(255) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `lvl` varchar(55) NOT NULL DEFAULT '',
  `lvl2` varchar(255) NOT NULL DEFAULT '',
  `lvl3` varchar(25) NOT NULL DEFAULT '',
  `lvl4` varchar(55) NOT NULL DEFAULT '',
  `lvl5` varchar(55) NOT NULL DEFAULT '',
  `lvl6` varchar(55) NOT NULL DEFAULT '',
  `lvl7` varchar(55) NOT NULL DEFAULT '',
  `lvl8` varchar(55) NOT NULL DEFAULT '',
  `lvl9` varchar(55) NOT NULL DEFAULT '',
  `lvl10` varchar(55) NOT NULL DEFAULT '',
  `vksm` varchar(255) NOT NULL DEFAULT '',
  `vksm2` varchar(255) NOT NULL DEFAULT '',
  `vksm3` varchar(255) NOT NULL DEFAULT '',
  `vksm4` varchar(255) NOT NULL DEFAULT '',
  `vksm5` varchar(255) NOT NULL DEFAULT '',
  `vksm6` varchar(255) NOT NULL DEFAULT '',
  `vksm7` varchar(255) NOT NULL DEFAULT '',
  `vksm8` varchar(255) NOT NULL DEFAULT '',
  `vksm9` varchar(255) NOT NULL DEFAULT '',
  `vksm10` varchar(254) NOT NULL DEFAULT '',
  `euru` varchar(111) NOT NULL DEFAULT '',
  `euru2` varchar(111) NOT NULL DEFAULT '',
  `euru3` varchar(111) NOT NULL DEFAULT '',
  `euru4` varchar(111) NOT NULL DEFAULT '',
  `euru5` varchar(111) NOT NULL DEFAULT '',
  `euru6` varchar(111) NOT NULL DEFAULT '',
  `euru7` varchar(111) NOT NULL DEFAULT '',
  `euru8` varchar(111) NOT NULL DEFAULT '',
  `euru9` varchar(111) NOT NULL DEFAULT '',
  `euru10` varchar(111) NOT NULL DEFAULT '',
  `kasu` varchar(99) NOT NULL DEFAULT '',
  `kasu2` varchar(99) NOT NULL DEFAULT '',
  `kasu3` varchar(99) NOT NULL DEFAULT '',
  `kasu4` varchar(99) NOT NULL DEFAULT '',
  `kasu5` varchar(99) NOT NULL DEFAULT '',
  `kasu6` varchar(99) NOT NULL DEFAULT '',
  `kasu7` varchar(99) NOT NULL DEFAULT '',
  `kasu8` varchar(99) NOT NULL DEFAULT '',
  `kasu9` varchar(99) NOT NULL DEFAULT '',
  `kasu10` varchar(99) NOT NULL DEFAULT '',
  `cash` varchar(255) NOT NULL DEFAULT '',
  `cash2` varchar(55) NOT NULL DEFAULT '',
  `cash3` varchar(55) NOT NULL DEFAULT '',
  `cash4` varchar(55) NOT NULL DEFAULT '',
  `cash5` varchar(55) NOT NULL DEFAULT '',
  `cash6` varchar(55) NOT NULL DEFAULT '',
  `cash7` varchar(55) NOT NULL DEFAULT '',
  `cash8` varchar(55) NOT NULL DEFAULT '',
  `cash9` varchar(55) NOT NULL DEFAULT '',
  `cash10` varchar(55) NOT NULL DEFAULT '',
  `boss` varchar(55) NOT NULL DEFAULT '',
  `boss2` varchar(55) NOT NULL DEFAULT '',
  `boss3` varchar(55) NOT NULL DEFAULT '',
  `boss4` varchar(55) NOT NULL DEFAULT '',
  `boss5` varchar(55) NOT NULL DEFAULT '',
  `boss6` varchar(55) NOT NULL DEFAULT '',
  `boss7` varchar(55) NOT NULL DEFAULT '',
  `boss8` varchar(55) NOT NULL DEFAULT '',
  `boss9` varchar(55) NOT NULL DEFAULT '',
  `boss10` varchar(55) NOT NULL DEFAULT '',
  `kred` varchar(111) NOT NULL DEFAULT '',
  `kred1` varchar(111) NOT NULL DEFAULT '',
  `kred2` varchar(111) NOT NULL DEFAULT '',
  `kred3` varchar(111) NOT NULL DEFAULT '',
  `kred4` varchar(111) NOT NULL DEFAULT '',
  `kred5` varchar(111) NOT NULL DEFAULT '',
  `kred6` varchar(111) NOT NULL DEFAULT '',
  `kred7` varchar(111) NOT NULL DEFAULT '',
  `kred8` varchar(111) NOT NULL DEFAULT '',
  `kred9` varchar(111) NOT NULL DEFAULT '',
  `kg` varchar(255) NOT NULL DEFAULT '',
  `kg1` varchar(255) NOT NULL DEFAULT '',
  `kg2` varchar(255) NOT NULL DEFAULT '',
  `kg3` varchar(255) NOT NULL DEFAULT '',
  `kg4` varchar(255) NOT NULL DEFAULT '',
  `kg5` varchar(255) NOT NULL DEFAULT '',
  `kg6` varchar(255) NOT NULL DEFAULT '',
  `kg7` varchar(255) NOT NULL DEFAULT '',
  `kg8` varchar(255) NOT NULL DEFAULT '',
  `kg9` varchar(255) NOT NULL DEFAULT '',
  `kg10` varchar(255) NOT NULL DEFAULT '',
  `kg11` varchar(255) NOT NULL DEFAULT '',
  `kg12` varchar(255) NOT NULL DEFAULT '',
  `kg13` varchar(255) NOT NULL DEFAULT '',
  `kg14` varchar(255) NOT NULL DEFAULT '',
  `kg15` varchar(255) NOT NULL DEFAULT '',
  `kg16` varchar(255) NOT NULL DEFAULT '',
  `kg17` varchar(255) NOT NULL DEFAULT '',
  `kg18` varchar(255) NOT NULL DEFAULT '',
  `kg19` varchar(255) NOT NULL DEFAULT '',
  `gn` varchar(255) NOT NULL DEFAULT '',
  `gn1` varchar(255) NOT NULL DEFAULT '',
  `gn2` varchar(255) NOT NULL DEFAULT '',
  `gn3` varchar(255) NOT NULL DEFAULT '',
  `gn4` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `gn5` varchar(255) NOT NULL DEFAULT '',
  `gn6` varchar(255) NOT NULL DEFAULT '',
  `gn7` varchar(255) NOT NULL DEFAULT '',
  `gn8` varchar(255) NOT NULL DEFAULT '',
  `gn9` varchar(255) NOT NULL DEFAULT '',
  `gn10` varchar(255) NOT NULL DEFAULT '',
  `gn11` varchar(255) NOT NULL DEFAULT '',
  `gn12` varchar(255) NOT NULL DEFAULT '',
  `gn13` varchar(255) NOT NULL DEFAULT '',
  `gn14` varchar(255) NOT NULL DEFAULT '',
  `gn15` varchar(255) NOT NULL DEFAULT '',
  `gn16` varchar(255) NOT NULL DEFAULT '',
  `gn17` varchar(255) NOT NULL DEFAULT '',
  `gn18` varchar(255) NOT NULL DEFAULT '',
  `gn19` varchar(255) NOT NULL DEFAULT '',
  `pn` varchar(255) NOT NULL DEFAULT '',
  `pn1` varchar(255) NOT NULL DEFAULT '',
  `pn2` varchar(255) NOT NULL DEFAULT '',
  `pn3` varchar(255) NOT NULL DEFAULT '',
  `pn4` varchar(255) NOT NULL DEFAULT '',
  `pn5` varchar(255) NOT NULL DEFAULT '',
  `pn6` varchar(255) NOT NULL DEFAULT '',
  `pn7` varchar(255) NOT NULL DEFAULT '',
  `pn8` varchar(255) NOT NULL DEFAULT '',
  `pn9` varchar(255) NOT NULL DEFAULT '',
  `pn10` varchar(255) NOT NULL DEFAULT '',
  `pn11` varchar(255) NOT NULL DEFAULT '',
  `pn12` varchar(255) NOT NULL DEFAULT '',
  `pn13` varchar(255) NOT NULL DEFAULT '',
  `pn14` varchar(255) NOT NULL DEFAULT '',
  `pn15` varchar(255) NOT NULL DEFAULT '',
  `pn16` varchar(255) NOT NULL DEFAULT '',
  `pn17` varchar(255) NOT NULL DEFAULT '',
  `pn18` varchar(255) NOT NULL DEFAULT '',
  `pn19` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pasiekimai`
--

INSERT INTO `pasiekimai` (`id`, `nick`, `lvl`, `lvl2`, `lvl3`, `lvl4`, `lvl5`, `lvl6`, `lvl7`, `lvl8`, `lvl9`, `lvl10`, `vksm`, `vksm2`, `vksm3`, `vksm4`, `vksm5`, `vksm6`, `vksm7`, `vksm8`, `vksm9`, `vksm10`, `euru`, `euru2`, `euru3`, `euru4`, `euru5`, `euru6`, `euru7`, `euru8`, `euru9`, `euru10`, `kasu`, `kasu2`, `kasu3`, `kasu4`, `kasu5`, `kasu6`, `kasu7`, `kasu8`, `kasu9`, `kasu10`, `cash`, `cash2`, `cash3`, `cash4`, `cash5`, `cash6`, `cash7`, `cash8`, `cash9`, `cash10`, `boss`, `boss2`, `boss3`, `boss4`, `boss5`, `boss6`, `boss7`, `boss8`, `boss9`, `boss10`, `kred`, `kred1`, `kred2`, `kred3`, `kred4`, `kred5`, `kred6`, `kred7`, `kred8`, `kred9`, `kg`, `kg1`, `kg2`, `kg3`, `kg4`, `kg5`, `kg6`, `kg7`, `kg8`, `kg9`, `kg10`, `kg11`, `kg12`, `kg13`, `kg14`, `kg15`, `kg16`, `kg17`, `kg18`, `kg19`, `gn`, `gn1`, `gn2`, `gn3`, `gn4`, `gn5`, `gn6`, `gn7`, `gn8`, `gn9`, `gn10`, `gn11`, `gn12`, `gn13`, `gn14`, `gn15`, `gn16`, `gn17`, `gn18`, `gn19`, `pn`, `pn1`, `pn2`, `pn3`, `pn4`, `pn5`, `pn6`, `pn7`, `pn8`, `pn9`, `pn10`, `pn11`, `pn12`, `pn13`, `pn14`, `pn15`, `pn16`, `pn17`, `pn18`, `pn19`) VALUES
(1, 'testas1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pasiekimu_kategorijos`
--

CREATE TABLE `pasiekimu_kategorijos` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `idd` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pasiulymai`
--

CREATE TABLE `pasiulymai` (
  `id` int(11) NOT NULL,
  `pasiulymas` text CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `kas` varchar(20) NOT NULL DEFAULT '',
  `laikas` int(11) DEFAULT 0,
  `busena` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `komentaras` varchar(225) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `unlike` bigint(255) DEFAULT 0,
  `likes` bigint(255) DEFAULT 0,
  `admin` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pas_kom`
--

CREATE TABLE `pas_kom` (
  `id` int(11) NOT NULL,
  `kom` varchar(225) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `kas` varchar(20) NOT NULL DEFAULT '',
  `laikas` int(11) DEFAULT 0,
  `p_id` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pas_rep`
--

CREATE TABLE `pas_rep` (
  `id` int(11) NOT NULL,
  `kas` varchar(255) NOT NULL DEFAULT '',
  `kam` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perved_log`
--

CREATE TABLE `perved_log` (
  `id` int(11) NOT NULL,
  `txt` text CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `time` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pinigai`
--

CREATE TABLE `pinigai` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `surinkta` bigint(255) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pinigai`
--

INSERT INTO `pinigai` (`id`, `nick`, `surinkta`) VALUES
(1, 'testas1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `player_daily_mission_top`
--

CREATE TABLE `player_daily_mission_top` (
  `id` int(10) UNSIGNED NOT NULL,
  `nick` varchar(255) NOT NULL,
  `completed_missions` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pm`
--

CREATE TABLE `pm` (
  `id` int(11) NOT NULL,
  `what` varchar(1500) NOT NULL DEFAULT '',
  `txt` text CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `time` int(11) DEFAULT 0,
  `gavejas` varchar(15) NOT NULL DEFAULT '',
  `nauj` varchar(10) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pm`
--

INSERT INTO `pm` (`id`, `what`, `txt`, `time`, `gavejas`, `nauj`) VALUES
(1, 'SISTEMA', 'Sveikas <b>testas1!</b>. Tu užsiregistravai į Dragon Ball Super žaidimą!.Kaip naujokas tu gavai 50000 Pinigų ,20 Kreditų ir 10 Eurų.Kodėl būtent verta žaisti šita žaidima? Atnaujinimai daromi dažnai .Puiki administracija .Išklausoma kiekviena žaidejo nuomonė. Tad prisijunkite ir tapkite šio žaidimo dalimi. Prisijungus prie žaidimo siūlome iškart pasiimti legendinę dienos misiją. (Misijos -> Legendinės dienos misijos)', 1684664652, 'testas1', 'OLD');

-- --------------------------------------------------------

--
-- Table structure for table `pms`
--

CREATE TABLE `pms` (
  `id` int(11) NOT NULL,
  `what` varchar(255) NOT NULL,
  `txt` text CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `time` varchar(255) DEFAULT '0',
  `gavejas` varchar(255) NOT NULL,
  `nauj` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pms2`
--

CREATE TABLE `pms2` (
  `id` int(11) NOT NULL,
  `what` varchar(255) NOT NULL,
  `txt` text CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `time` varchar(255) DEFAULT '0',
  `gavejas` varchar(255) NOT NULL,
  `nauj` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pm_ban`
--

CREATE TABLE `pm_ban` (
  `id` int(11) NOT NULL,
  `baned` varchar(255) NOT NULL,
  `kas` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pokalbiai`
--

CREATE TABLE `pokalbiai` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `sms` text CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `data` int(100) DEFAULT 0,
  `expired_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prasosi_i_komanda`
--

CREATE TABLE `prasosi_i_komanda` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `komanda` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quest`
--

CREATE TABLE `quest` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `valiuta` varchar(255) DEFAULT '0',
  `atlygis` varchar(255) DEFAULT '0',
  `reike` varchar(255) DEFAULT '0',
  `ko` varchar(255) DEFAULT '0',
  `snd` varchar(255) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `quest`
--

INSERT INTO `quest` (`id`, `nick`, `valiuta`, `atlygis`, `reike`, `ko`, `snd`) VALUES
(1, 'testas1', '1', '5', '20', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `referal`
--

CREATE TABLE `referal` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referalas`
--

CREATE TABLE `referalas` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reklama`
--

CREATE TABLE `reklama` (
  `id` int(11) NOT NULL,
  `adresas` varchar(255) NOT NULL DEFAULT '',
  `antraste` varchar(255) CHARACTER SET ucs2 COLLATE ucs2_lithuanian_ci NOT NULL DEFAULT '',
  `siuntejas` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rep`
--

CREATE TABLE `rep` (
  `id` int(11) NOT NULL,
  `kam` varchar(30) NOT NULL,
  `kas` varchar(30) NOT NULL,
  `ka` varchar(2) NOT NULL,
  `time` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rinkimas`
--

CREATE TABLE `rinkimas` (
  `id` int(11) NOT NULL,
  `reike1` varchar(255) NOT NULL DEFAULT '',
  `reike2` varchar(255) NOT NULL DEFAULT '',
  `daigto1` varchar(255) NOT NULL DEFAULT '',
  `daigto2` varchar(255) NOT NULL DEFAULT '',
  `atlygis` varchar(255) NOT NULL DEFAULT '',
  `atlygis_kiek` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saskpap`
--

CREATE TABLE `saskpap` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `kodas` varchar(255) NOT NULL DEFAULT '',
  `suma` varchar(255) NOT NULL DEFAULT '',
  `data` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sav_dtop`
--

CREATE TABLE `sav_dtop` (
  `id` int(11) NOT NULL,
  `nick` varchar(100) NOT NULL DEFAULT '',
  `sav_vksm` bigint(255) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `prekes_id` int(11) DEFAULT 0,
  `pardavimo_kaina` bigint(20) DEFAULT 0,
  `pirkimo_kaina` bigint(20) DEFAULT 0,
  `tipas` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siukslynas`
--

CREATE TABLE `siukslynas` (
  `id` int(11) NOT NULL,
  `nick` varchar(20) NOT NULL DEFAULT '',
  `daiktas` int(11) DEFAULT 0,
  `tipas` int(11) DEFAULT 0,
  `kiek` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smile`
--

CREATE TABLE `smile` (
  `id` int(11) NOT NULL,
  `kodas` varchar(100) NOT NULL DEFAULT '',
  `img` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `smile`
--

INSERT INTO `smile` (`id`, `kodas`, `img`) VALUES
(1, ':D', '<img src=\"img/smile/1.png\" height=\"19\" width=\"19\">'),
(2, '=D', '<img src=\"img/smile/2.png\" height=\"19\" width=\"19\">'),
(3, ':ha', '<img src=\"img/smile/3.png\" height=\"19\" width=\"19\">'),
(4, ':d', '<img src=\"img/smile/4.png\" height=\"19\" width=\"19\">'),
(5, 'XD', '<img src=\"img/smile/5.png\" height=\"19\" width=\"19\">'),
(6, ':h', '<img src=\"img/smile/6.png\" height=\"19\" width=\"19\">'),
(7, ':haha', '<img src=\"img/smile/7.png\" height=\"19\" width=\"19\">'),
(8, ':haha2', '<img src=\"img/smile/8.png\" height=\"19\" width=\"19\">'),
(9, '=))', '<img src=\"img/smile/9.png\" height=\"19\" width=\"19\">'),
(10, '=)', '<img src=\"img/smile/10.png\" height=\"19\" width=\"19\">'),
(11, 'O:)', '<img src=\"img/smile/11.png\" height=\"19\" width=\"19\">'),
(12, ':)', '<img src=\"img/smile/12.png\" height=\"19\" width=\"19\">'),
(13, '(:', '<img src=\"img/smile/13.png\" height=\"19\" width=\"19\">'),
(14, ';)', '<img src=\"img/smile/14.png\" height=\"19\" width=\"19\">'),
(15, ':c', '<img src=\"img/smile/15.png\" height=\"19\" width=\"19\">'),
(16, ':love', '<img src=\"img/smile/16.png\" height=\"19\" width=\"19\">'),
(17, ':sirdeles', '<img src=\"img/smile/17.png\" height=\"19\" width=\"19\">'),
(18, ':love', '<img src=\"img/smile/18.png\" height=\"19\" width=\"19\">'),
(19, ':gele', '<img src=\"img/smile/19.png\" height=\"19\" width=\"19\">'),
(20, ':facepalm', '<img src=\"img/smile/20.png\" height=\"19\" width=\"19\">');

-- --------------------------------------------------------

--
-- Table structure for table `smstop_log`
--

CREATE TABLE `smstop_log` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `laimejo` varchar(255) NOT NULL,
  `laikas` varchar(255) NOT NULL,
  `laimejo2` int(255) DEFAULT 0,
  `laimejo3` int(44) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_log`
--

CREATE TABLE `sms_log` (
  `id` int(11) NOT NULL,
  `zinute` varchar(255) NOT NULL DEFAULT '',
  `kaina` varchar(255) NOT NULL DEFAULT '',
  `laikas` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_reklama`
--

CREATE TABLE `sms_reklama` (
  `id` int(11) NOT NULL DEFAULT 0,
  `adresas` varchar(255) DEFAULT '0',
  `antraste` varchar(255) DEFAULT '0',
  `numeris` varchar(255) DEFAULT '0',
  `laikas` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_top`
--

CREATE TABLE `sms_top` (
  `id` int(11) NOT NULL,
  `sms` bigint(255) DEFAULT 0,
  `nick` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sms_top`
--

INSERT INTO `sms_top` (`id`, `sms`, `nick`) VALUES
(1, 0, 'testas1');

-- --------------------------------------------------------

--
-- Table structure for table `sms_topas`
--

CREATE TABLE `sms_topas` (
  `sms` varchar(22) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `snake_misijos`
--

CREATE TABLE `snake_misijos` (
  `id` int(11) NOT NULL,
  `kiek` int(11) DEFAULT 0,
  `name` varchar(100) NOT NULL DEFAULT '',
  `atlygis` int(11) DEFAULT 0,
  `atlygis_ko` varchar(100) NOT NULL DEFAULT '',
  `daikto_id` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statusai`
--

CREATE TABLE `statusai` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `kam` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `stats` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_lithuanian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stilius`
--

CREATE TABLE `stilius` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `font-size` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `susijungimas`
--

CREATE TABLE `susijungimas` (
  `id` int(11) NOT NULL,
  `nick` varchar(20) NOT NULL DEFAULT '',
  `kitas_zaidejas` varchar(20) NOT NULL DEFAULT '',
  `ar_susijungias` varchar(5) NOT NULL DEFAULT '',
  `kas_kviecia` varchar(20) NOT NULL DEFAULT '',
  `ar_kvieti` varchar(5) NOT NULL DEFAULT '',
  `ka_kvieti` varchar(20) NOT NULL DEFAULT '',
  `uzdirbo_exp` bigint(20) NOT NULL DEFAULT 0,
  `fusion_dance` varchar(5) NOT NULL DEFAULT '',
  `double_fussion_dance` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `susijungimas`
--

INSERT INTO `susijungimas` (`id`, `nick`, `kitas_zaidejas`, `ar_susijungias`, `kas_kviecia`, `ar_kvieti`, `ka_kvieti`, `uzdirbo_exp`, `fusion_dance`, `double_fussion_dance`) VALUES
(1, 'testas1', '', '', '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `s_top`
--

CREATE TABLE `s_top` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `vksm` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `vadas` varchar(255) NOT NULL DEFAULT '',
  `pavadotuojas` varchar(255) NOT NULL DEFAULT '',
  `pavadinimas` varchar(255) NOT NULL DEFAULT '',
  `uz_500_kovu` bigint(255) DEFAULT 0,
  `viso_laimejo_kovu` bigint(255) DEFAULT 0,
  `pinigai` varchar(255) NOT NULL DEFAULT '',
  `foto` varchar(255) NOT NULL DEFAULT '',
  `topic` text NOT NULL,
  `paaukojo_i_team` varchar(255) NOT NULL DEFAULT '',
  `max` varchar(255) NOT NULL DEFAULT '',
  `eurai` bigint(255) DEFAULT 0,
  `paaukojo_i_team2` varchar(255) NOT NULL DEFAULT '',
  `bonusas` varchar(255) NOT NULL DEFAULT '',
  `dienosmedaltime` varchar(255) NOT NULL DEFAULT '',
  `dienosmedal` int(255) DEFAULT 0,
  `savmedaltime` varchar(255) NOT NULL DEFAULT '',
  `savmedal` int(255) DEFAULT 0,
  `dienosmedal2` int(55) DEFAULT 0,
  `dienosmedal3` int(55) DEFAULT 0,
  `dienosmedaltime2` varchar(255) NOT NULL DEFAULT '',
  `dienosmedaltime3` varchar(255) NOT NULL DEFAULT '',
  `savmedal2` int(255) DEFAULT 0,
  `savmedal3` int(255) DEFAULT 0,
  `savmedaltime2` varchar(255) NOT NULL DEFAULT '',
  `savmedaltime3` varchar(255) NOT NULL DEFAULT '',
  `laimetu_dtop` varchar(255) NOT NULL DEFAULT '',
  `uz_500_kovu2` varchar(255) NOT NULL DEFAULT '',
  `dtopwin1` varchar(2) NOT NULL DEFAULT '',
  `iki_algos` varchar(255) NOT NULL DEFAULT '',
  `nukirtobosu` int(255) DEFAULT 0,
  `kovm1` varchar(255) NOT NULL DEFAULT '',
  `kovm2` varchar(255) NOT NULL DEFAULT '',
  `kovm3` varchar(255) NOT NULL DEFAULT '',
  `kovm4` varchar(255) NOT NULL DEFAULT '',
  `kovm5` varchar(255) NOT NULL DEFAULT '',
  `pinm1` varchar(255) NOT NULL DEFAULT '',
  `pinm2` varchar(255) NOT NULL DEFAULT '',
  `pinm3` varchar(255) NOT NULL DEFAULT '',
  `pinm4` varchar(255) NOT NULL DEFAULT '',
  `pinm5` varchar(255) NOT NULL DEFAULT '',
  `kritinislvl` varchar(255) NOT NULL DEFAULT '',
  `eurm1` varchar(255) NOT NULL DEFAULT '',
  `eurm2` varchar(255) NOT NULL DEFAULT '',
  `eurm3` varchar(255) NOT NULL DEFAULT '',
  `eurm4` varchar(255) NOT NULL DEFAULT '',
  `eurm5` varchar(255) NOT NULL DEFAULT '',
  `kovm6` varchar(255) NOT NULL DEFAULT '',
  `kovm7` varchar(255) NOT NULL DEFAULT '',
  `kovm8` varchar(255) NOT NULL DEFAULT '',
  `kovm9` varchar(255) NOT NULL DEFAULT '',
  `kovm10` varchar(255) NOT NULL DEFAULT '',
  `pinm6` varchar(255) NOT NULL DEFAULT '',
  `pinm7` varchar(255) NOT NULL DEFAULT '',
  `pinm8` varchar(255) NOT NULL DEFAULT '',
  `pinm9` varchar(255) NOT NULL DEFAULT '',
  `pinm10` varchar(255) NOT NULL DEFAULT '',
  `eurm6` varchar(255) NOT NULL DEFAULT '',
  `eurm7` varchar(255) NOT NULL DEFAULT '',
  `eurm8` varchar(255) NOT NULL DEFAULT '',
  `eurm9` varchar(255) NOT NULL DEFAULT '',
  `eurm10` varchar(255) NOT NULL DEFAULT '',
  `kritm1` varchar(255) NOT NULL DEFAULT '',
  `kritm2` varchar(255) NOT NULL DEFAULT '',
  `kritm3` varchar(255) NOT NULL DEFAULT '',
  `kritm4` varchar(255) NOT NULL DEFAULT '',
  `kritm5` varchar(255) NOT NULL DEFAULT '',
  `teamp` int(255) DEFAULT 0,
  `kritm6` varchar(255) NOT NULL DEFAULT '',
  `kritm7` varchar(255) NOT NULL DEFAULT '',
  `kritm8` varchar(255) NOT NULL DEFAULT '',
  `kritm9` varchar(255) NOT NULL DEFAULT '',
  `kritm10` varchar(255) NOT NULL DEFAULT '',
  `Dyspo` varchar(255) NOT NULL DEFAULT '',
  `Toppo` varchar(255) NOT NULL DEFAULT '',
  `ataka` int(255) DEFAULT 0,
  `gynyba` int(255) DEFAULT 0,
  `pllaikas` varchar(255) NOT NULL DEFAULT '',
  `win` int(255) DEFAULT 0,
  `lose` int(255) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teammedal`
--

CREATE TABLE `teammedal` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) NOT NULL DEFAULT '',
  `uz` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `laikas` varchar(255) NOT NULL DEFAULT '',
  `medalis` varchar(255) NOT NULL DEFAULT '',
  `bonusas` text NOT NULL,
  `dienosmedal` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teammedal2`
--

CREATE TABLE `teammedal2` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) NOT NULL DEFAULT '',
  `uz` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `laikas` varchar(255) NOT NULL DEFAULT '',
  `medalis` varchar(255) NOT NULL DEFAULT '',
  `bonusas` text NOT NULL,
  `dienosmedal` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teammedal3`
--

CREATE TABLE `teammedal3` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) NOT NULL DEFAULT '',
  `uz` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `laikas` varchar(255) NOT NULL DEFAULT '',
  `medalis` varchar(255) NOT NULL DEFAULT '',
  `bonusas` text NOT NULL,
  `dienosmedal` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teammedals`
--

CREATE TABLE `teammedals` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) NOT NULL DEFAULT '',
  `uz` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `laikas` varchar(255) NOT NULL DEFAULT '',
  `medalis` varchar(255) NOT NULL DEFAULT '',
  `bonusas` text NOT NULL,
  `savaitesmedal` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_boss`
--

CREATE TABLE `team_boss` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `img` varchar(200) NOT NULL DEFAULT '',
  `max_hp` bigint(255) DEFAULT 0,
  `hp` bigint(255) DEFAULT 0,
  `exp` bigint(20) DEFAULT 0,
  `zen` bigint(20) DEFAULT 0,
  `krd` bigint(20) DEFAULT 0,
  `max_hit` int(11) DEFAULT 0,
  `laikas` int(11) DEFAULT 0,
  `prisikels` int(11) DEFAULT 0,
  `nukirto` varchar(20) NOT NULL DEFAULT '',
  `vipt` varchar(11) NOT NULL DEFAULT '',
  `min_hit` int(11) DEFAULT 0,
  `crit` int(11) DEFAULT 0,
  `kiekzalos` bigint(11) DEFAULT 0,
  `kieknukirsta` int(11) DEFAULT 0,
  `critp` int(117) DEFAULT 0,
  `eur` int(255) DEFAULT 0,
  `nukirtobosu` varchar(255) NOT NULL DEFAULT '',
  `pavadinimas` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `team_boss`
--

INSERT INTO `team_boss` (`id`, `name`, `img`, `max_hp`, `hp`, `exp`, `zen`, `krd`, `max_hit`, `laikas`, `prisikels`, `nukirto`, `vipt`, `min_hit`, `crit`, `kiekzalos`, `kieknukirsta`, `critp`, `eur`, `nukirtobosu`, `pavadinimas`) VALUES
(1, 'Kaba', 'Kaba', 50000000, 18732245, 0, 100000000, 0, 500, 1800, 0, '', '', 100, 0, 31267755, 0, 0, 10, '', 'BcZalgiris'),
(2, 'Fryzas', 'Fryzas2', 100000000, 100000000, 0, 300000000, 0, 700, 1800, 0, '', '', 200, 0, 0, 0, 0, 20, '', 'BcZalgiris'),
(3, 'Buu', 'Buu2', 200000000, 200000000, 0, 500000000, 0, 1200, 3600, 0, '', '', 500, 0, 0, 0, 0, 30, '', 'BcZalgiris'),
(4, 'Hitas', 'Hitas', 400000000, 397737771, 0, 1000000000, 0, 2000, 7200, 0, '', '', 1000, 0, 2262229, 0, 0, 50, '', 'BcZalgiris'),
(5, 'Kaba', 'Kaba', 50000000, 49392910, 0, 100000000, 0, 500, 1800, 0, '', '', 100, 0, 607090, 0, 0, 10, '', 'dbzfanai'),
(6, 'Android 17', 'A17', 1000000000, 993775809, 0, 2000000000, 0, 3000, 10800, 0, '', '', 1500, 0, 6224191, 0, 0, 100, '', 'BcZalgiris'),
(7, 'Botamo', 'Botamo', 2000000000, 2000000000, 0, 4000000000, 0, 4000, 14400, 0, '', '', 2000, 0, 0, 0, 0, 150, '', 'BcZalgiris'),
(8, 'Fryzas', 'Fryzas2', 100000000, 100000000, 0, 300000000, 0, 700, 1800, 0, '', '', 200, 0, 0, 0, 0, 20, '', 'dbzfanai'),
(9, 'Basil', 'Basil', 4000000000, 3971557585, 0, 8000000000, 0, 6000, 18000, 0, '', '', 3000, 0, 28442415, 0, 0, 200, '', 'BcZalgiris'),
(10, 'Kaba', 'Kaba', 50000000, 49983032, 0, 100000000, 0, 500, 1800, 0, '', '', 100, 0, 16968, 0, 0, 10, '', 'Bitches'),
(11, 'Kaba', 'Kaba', 50000000, 43376434, 0, 100000000, 0, 500, 1800, 0, '', '', 100, 0, 6623566, 0, 0, 10, '', 'BaBushka'),
(12, 'Fryzas', 'Fryzas2', 100000000, 100000000, 0, 300000000, 0, 700, 1800, 0, '', '', 200, 0, 0, 0, 0, 20, '', 'BaBushka'),
(13, 'Kaba', 'Kaba', 50000000, 48128944, 0, 100000000, 0, 500, 1800, 1674864503, 'smedgas', '', 100, 0, 200330067, 0, 0, 10, '4', 'Apoloteam'),
(14, 'Buu', 'Buu2', 200000000, 200000000, 0, 500000000, 0, 1200, 3600, 0, '', '', 500, 0, 0, 0, 0, 30, '', 'BaBushka'),
(15, 'Kaba', 'Kaba', 50000000, 47108201, 0, 100000000, 0, 500, 1800, 1674101916, 'zxcvbnm', '', 100, 0, 52837778, 0, 0, 10, '1', 'Dewill'),
(16, 'Fryzas', 'Fryzas2', 100000000, 100000000, 0, 300000000, 0, 700, 1800, 0, '', '', 200, 0, 0, 0, 0, 20, '', 'Dewill'),
(17, 'Fryzas', 'Fryzas2', 100000000, 98526779, 0, 300000000, 0, 700, 1800, 1673290864, 'polo', '', 200, 0, 97540331, 0, 0, 20, '1', 'Apoloteam'),
(18, 'Buu', 'Buu2', 200000000, 200000000, 0, 500000000, 0, 1200, 3600, 1673292848, 'polo', '', 500, 0, 196277935, 0, 0, 30, '1', 'Apoloteam'),
(19, 'Buu', 'Buu2', 200000000, 200000000, 0, 500000000, 0, 1200, 3600, 0, '', '', 500, 0, 0, 0, 0, 30, '', 'dbzfanai'),
(20, 'Buu', 'Buu2', 200000000, 200000000, 0, 500000000, 0, 1200, 3600, 0, '', '', 500, 0, 0, 0, 0, 30, '', 'Dewill'),
(21, 'Hitas', 'Hitas', 400000000, 399033402, 0, 1000000000, 0, 2000, 7200, 0, '', '', 1000, 0, 966598, 0, 0, 50, '', 'Apoloteam'),
(22, 'Hitas', 'Hitas', 400000000, 400000000, 0, 1000000000, 0, 2000, 7200, 0, '', '', 1000, 0, 0, 0, 0, 50, '', 'dbzfanai'),
(23, 'Android 17', 'A17', 1000000000, 1000000000, 0, 2000000000, 0, 3000, 10800, 0, '', '', 1500, 0, 0, 0, 0, 100, '', 'Apoloteam'),
(24, 'Botamo', 'Botamo', 2000000000, 1997475363, 0, 4000000000, 0, 4000, 14400, 0, '', '', 2000, 0, 2524637, 0, 0, 150, '', 'Apoloteam'),
(25, 'Kaba', 'Kaba', 50000000, 48935002, 0, 100000000, 0, 500, 1800, 1676835449, 'barabanas', '', 100, 0, 100731025, 0, 0, 10, '2', 'Solo'),
(26, 'Fryzas', 'Fryzas2', 100000000, 100000000, 0, 300000000, 0, 700, 1800, 1675636128, 'barabanas', '', 200, 0, 99755117, 0, 0, 20, '1', 'Solo'),
(27, 'Buu', 'Buu2', 200000000, 200000000, 0, 500000000, 0, 1200, 3600, 0, '', '', 500, 0, 0, 0, 0, 30, '', 'Solo'),
(28, 'Kaba', 'Kaba', 50000000, 50000000, 0, 100000000, 0, 500, 1800, 1680366454, 'sajanas', '', 100, 0, 398781524, 0, 0, 10, '8', 'SAJANAI'),
(29, 'Kaba', 'Kaba', 50000000, 49204845, 0, 100000000, 0, 500, 1800, 1679322936, 'smedgas', '', 100, 0, 1480817148, 0, 0, 10, '31', 'KJP'),
(30, 'Fryzas', 'Fryzas2', 100000000, 100000000, 0, 300000000, 0, 700, 1800, 0, '', '', 200, 0, 0, 0, 0, 20, '', 'SAJANAI'),
(31, 'Hitas', 'Hitas', 400000000, 400000000, 0, 1000000000, 0, 2000, 7200, 0, '', '', 1000, 0, 0, 0, 0, 50, '', 'Solo'),
(32, 'Android 17', 'A17', 1000000000, 1000000000, 0, 2000000000, 0, 3000, 10800, 0, '', '', 1500, 0, 0, 0, 0, 100, '', 'Solo'),
(33, 'Kaba', 'Kaba', 50000000, 49173089, 0, 100000000, 0, 500, 1800, 0, '', '', 100, 0, 826911, 0, 0, 10, '', '7Visata'),
(34, 'Fryzas', 'Fryzas2', 100000000, 100000000, 0, 300000000, 0, 700, 1800, 1679161083, 'smedgas', '', 200, 0, 2221547985, 0, 0, 20, '23', 'KJP'),
(35, 'Buu', 'Buu2', 200000000, 194124604, 0, 500000000, 0, 1200, 3600, 0, '', '', 500, 0, 5875396, 0, 0, 30, '', 'SAJANAI'),
(36, 'Buu', 'Buu2', 200000000, 200000000, 0, 500000000, 0, 1200, 3600, 1679159471, 'smedgas', '', 500, 0, 3350255504, 0, 0, 30, '17', 'KJP'),
(37, 'Hitas', 'Hitas', 400000000, 400000000, 0, 1000000000, 0, 2000, 7200, 1679163219, 'smedgas', '', 1000, 0, 4371402056, 0, 0, 50, '11', 'KJP'),
(38, 'Hitas', 'Hitas', 400000000, 389734112, 0, 1000000000, 0, 2000, 7200, 0, '', '', 1000, 0, 10265888, 0, 0, 50, '', 'SAJANAI'),
(39, 'Android 17', 'A17', 1000000000, 1000000000, 0, 2000000000, 0, 3000, 10800, 1679167230, 'smedgas', '', 1500, 0, 6978058400, 0, 0, 100, '7', 'KJP'),
(40, 'Dyspo', 'Dyspo', 80000000000, 79983981112, 0, 100000000000, 0, 16000, 36000, 0, '', '', 10000, 0, 16018888, 0, 0, 800, '', 'SAJANAI'),
(41, 'Botamo', 'Botamo', 2000000000, 2000000000, 0, 4000000000, 0, 4000, 14400, 1679171737, 'smedgas', '', 2000, 0, 9990021799, 0, 0, 150, '5', 'KJP'),
(42, 'Kaba', 'Kaba', 50000000, 50000000, 0, 100000000, 0, 500, 1800, 1678812578, 'apple', '', 100, 0, 199736955, 0, 0, 10, '4', 'Obuolynas'),
(43, 'Basil', 'Basil', 4000000000, 4000000000, 0, 8000000000, 0, 6000, 18000, 1678919576, 'smedgas', '', 3000, 0, 7993677068, 0, 0, 200, '2', 'KJP'),
(44, 'Fryzas', 'Fryzas2', 100000000, 100000000, 0, 300000000, 0, 700, 1800, 1678818691, 'apple', '', 200, 0, 99776049, 0, 0, 20, '1', 'Obuolynas'),
(45, 'Buu', 'Buu2', 200000000, 200000000, 0, 500000000, 0, 1200, 3600, 0, '', '', 500, 0, 0, 0, 0, 30, '', 'Obuolynas'),
(46, 'Hitas', 'Hitas', 400000000, 400000000, 0, 1000000000, 0, 2000, 7200, 0, '', '', 1000, 0, 0, 0, 0, 50, '', 'Obuolynas'),
(47, 'Botamo', 'Botamo', 2000000000, 1961475821, 0, 4000000000, 0, 4000, 14400, 0, '', '', 2000, 0, 38524179, 0, 0, 150, '', 'Solo'),
(48, 'Kaba', 'Kaba', 50000000, 50000000, 0, 100000000, 0, 500, 1800, 0, '', '', 100, 0, 0, 0, 0, 10, '', 'Arraratou'),
(49, 'Dyspo', 'Dyspo', 80000000000, 80000000000, 0, 100000000000, 0, 16000, 36000, 0, '', '', 10000, 0, 0, 0, 0, 800, '', 'KJP'),
(50, 'Kaba', 'Kaba', 50000000, 45053125, 0, 100000000, 0, 500, 1800, 0, '', '', 100, 0, 4946875, 0, 0, 10, '', 'Zxcvbnm'),
(51, 'Fryzas', 'Fryzas2', 100000000, 100000000, 0, 300000000, 0, 700, 1800, 0, '', '', 200, 0, 0, 0, 0, 20, '', 'Zxcvbnm'),
(52, 'Buu', 'Buu2', 200000000, 200000000, 0, 500000000, 0, 1200, 3600, 0, '', '', 500, 0, 0, 0, 0, 30, '', 'Zxcvbnm'),
(53, 'Hitas', 'Hitas', 400000000, 400000000, 0, 1000000000, 0, 2000, 7200, 0, '', '', 1000, 0, 0, 0, 0, 50, '', 'Zxcvbnm');

-- --------------------------------------------------------

--
-- Table structure for table `team_logas`
--

CREATE TABLE `team_logas` (
  `team` varchar(255) NOT NULL DEFAULT '',
  `msg` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_nariai`
--

CREATE TABLE `team_nariai` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `team` varchar(255) NOT NULL DEFAULT '',
  `win` varchar(255) NOT NULL DEFAULT '',
  `vadas` varchar(255) NOT NULL DEFAULT '',
  `kaina` varchar(255) NOT NULL DEFAULT '',
  `prisijungus` varchar(255) NOT NULL DEFAULT '',
  `win_wiso` varchar(255) NOT NULL DEFAULT '',
  `alga` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technikos`
--

CREATE TABLE `technikos` (
  `id` int(11) NOT NULL,
  `nick` varchar(20) NOT NULL DEFAULT '',
  `t1` varchar(2) NOT NULL DEFAULT '',
  `t2` varchar(2) NOT NULL DEFAULT '',
  `t3` varchar(2) NOT NULL DEFAULT '',
  `t4` varchar(2) NOT NULL DEFAULT '',
  `t5` varchar(2) NOT NULL DEFAULT '',
  `t6` varchar(2) NOT NULL DEFAULT '',
  `t7` varchar(2) NOT NULL DEFAULT '',
  `t8` varchar(2) NOT NULL DEFAULT '',
  `t9` varchar(2) NOT NULL DEFAULT '',
  `t10` varchar(2) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `technikos`
--

INSERT INTO `technikos` (`id`, `nick`, `t1`, `t2`, `t3`, `t4`, `t5`, `t6`, `t7`, `t8`, `t9`, `t10`) VALUES
(1, 'testas1', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tikslas`
--

CREATE TABLE `tikslas` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `tikslas1` varchar(1) NOT NULL DEFAULT '',
  `tikslas2` varchar(1) NOT NULL DEFAULT '',
  `tikslas3` varchar(1) NOT NULL DEFAULT '',
  `tikslas4` varchar(1) NOT NULL DEFAULT '',
  `tikslas5` varchar(1) NOT NULL DEFAULT '',
  `tikslas6` varchar(1) NOT NULL DEFAULT '',
  `tikslas7` varchar(1) NOT NULL DEFAULT '',
  `tikslas8` varchar(255) NOT NULL DEFAULT '',
  `tikslas9` varchar(255) NOT NULL DEFAULT '',
  `tikslas10` varchar(11) NOT NULL DEFAULT '',
  `tikslas11` varchar(11) NOT NULL DEFAULT '',
  `tikslas12` varchar(11) NOT NULL DEFAULT '',
  `tikslas13` varchar(11) NOT NULL DEFAULT '',
  `tikslas14` varchar(2) NOT NULL DEFAULT '',
  `tikslas15` varchar(2) NOT NULL DEFAULT '',
  `tikslas16` varchar(2) NOT NULL DEFAULT '',
  `tikslas17` varchar(2) NOT NULL DEFAULT '',
  `tikslas18` varchar(2) NOT NULL DEFAULT '',
  `tikslas19` varchar(2) NOT NULL DEFAULT '',
  `tikslas20` varchar(2) NOT NULL DEFAULT '',
  `tikslas21` varchar(2) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tikslas`
--

INSERT INTO `tikslas` (`id`, `nick`, `tikslas1`, `tikslas2`, `tikslas3`, `tikslas4`, `tikslas5`, `tikslas6`, `tikslas7`, `tikslas8`, `tikslas9`, `tikslas10`, `tikslas11`, `tikslas12`, `tikslas13`, `tikslas14`, `tikslas15`, `tikslas16`, `tikslas17`, `tikslas18`, `tikslas19`, `tikslas20`, `tikslas21`) VALUES
(1, 'testas1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `message` text CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `kas` varchar(15) NOT NULL,
  `time` int(11) DEFAULT 0,
  `time2` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transformacijos`
--

CREATE TABLE `transformacijos` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `tr0` varchar(255) NOT NULL DEFAULT '',
  `tr1` varchar(255) NOT NULL DEFAULT '',
  `tr2` varchar(255) NOT NULL DEFAULT '',
  `tr3` varchar(255) NOT NULL DEFAULT '',
  `tr4` varchar(255) NOT NULL DEFAULT '',
  `tr5` varchar(255) NOT NULL DEFAULT '',
  `tr6` varchar(255) NOT NULL DEFAULT '',
  `tr7` varchar(255) NOT NULL DEFAULT '',
  `tr8` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transformacijos`
--

INSERT INTO `transformacijos` (`id`, `nick`, `tr0`, `tr1`, `tr2`, `tr3`, `tr4`, `tr5`, `tr6`, `tr7`, `tr8`) VALUES
(1, 'testas1', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tuffle_lokacijos`
--

CREATE TABLE `tuffle_lokacijos` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `foto` text CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tuffle_lokacijos`
--

INSERT INTO `tuffle_lokacijos` (`id`, `name`, `foto`) VALUES
(1, 'Bogiečiai', '498234-180462_son_goku_400.jpg'),
(2, 'Bulma Tower', '36-99.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tuffle_mobai`
--

CREATE TABLE `tuffle_mobai` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `kg` varchar(2555) NOT NULL DEFAULT '',
  `pin` bigint(20) NOT NULL DEFAULT 0,
  `exp` bigint(20) NOT NULL DEFAULT 0,
  `lokacija` int(11) NOT NULL DEFAULT 0,
  `foto` text CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tuffle_mobai`
--

INSERT INTO `tuffle_mobai` (`id`, `name`, `kg`, `pin`, `exp`, `lokacija`, `foto`) VALUES
(1, 'Dr. New', '5000000000000000', 2200000, 80000, 1, 'dr-myuu-4.jpg'),
(2, 'Dr. Giro', '10000000000000000', 4800000, 88000, 1, 'El_Dr._gero.png'),
(3, 'Corrupted Bulma', '20000000000000000', 5800000, 91000, 1, 'TGAL_-_Baby_Vegeta_Bulma.png'),
(4, 'Corrupted Bula', '25000000000000000', 6800000, 95000, 1, 'buraevil.jpg'),
(5, 'Corrupted Goten', '45000000000000000', 7800000, 1000000, 1, 'Gt_goten_block_gt_kid_goku_punch.png'),
(6, 'Corrupted Gohan', '80000000000000000', 8800000, 1100000, 1, 'BabyGohan34.png'),
(7, 'Corrupted Trunks', '120000000000000000', 9800000, 1200000, 1, 'Bulla_and_Trunks_under_Baby\'s_control.jpg'),
(8, 'Corupted Vegeta', '150000000000000000', 10000000, 1300000, 2, 'hqdefault.jpg'),
(9, 'Baby Vegeta first transform', '200000000000000000', 11000000, 1400000, 2, 'ggggggg.jpg'),
(10, 'Baby Vegeta 2nd transform', '250000000000000000', 12000000, 1500000, 2, 'BabyVegeta.jpg'),
(11, 'Gold oozaru baby Vegeta', '300000000000000000', 13000000, 1600000, 2, 'Baby_Vegeta.jpg'),
(12, 'Gold oozaru baby Vegeta Awake', '400000000000000000', 14000000, 1700000, 2, 'DragonballGT-Episode039_102.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `turgus`
--

CREATE TABLE `turgus` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `preke` varchar(255) NOT NULL DEFAULT '',
  `kaina` varchar(255) NOT NULL DEFAULT '',
  `kiek` varchar(255) NOT NULL DEFAULT '',
  `laikas` varchar(255) NOT NULL DEFAULT '',
  `kiekis` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `turn`
--

CREATE TABLE `turn` (
  `id` int(11) NOT NULL,
  `trn_time` varchar(255) NOT NULL DEFAULT '',
  `trn_last` varchar(255) NOT NULL DEFAULT '',
  `ar_prasidej` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `turnyras`
--

CREATE TABLE `turnyras` (
  `id` int(255) NOT NULL,
  `trn_time` int(50) DEFAULT 0,
  `ar_prasidejo` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci DEFAULT '0',
  `trn_kiek` int(50) DEFAULT 0,
  `trn_last` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci DEFAULT '0',
  `trn_busena` bigint(255) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `turnyras`
--

INSERT INTO `turnyras` (`id`, `trn_time`, `ar_prasidejo`, `trn_kiek`, `trn_last`, `trn_busena`) VALUES
(2, 1, '+', 100000, 'barabanas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `unikalai`
--

CREATE TABLE `unikalai` (
  `id` int(100) NOT NULL,
  `unikalas` text NOT NULL,
  `litai` int(100) NOT NULL,
  `exp` int(100) NOT NULL,
  `pin` int(100) NOT NULL,
  `kg` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_lithuanian_ci;

--
-- Dumping data for table `unikalai`
--

INSERT INTO `unikalai` (`id`, `unikalas`, `litai`, `exp`, `pin`, `kg`) VALUES
(1, 'Oolong', 30, 2, 2, 2),
(2, 'Puar', 60, 3, 3, 4),
(3, 'Marron', 85, 4, 4, 6),
(4, 'ManWolf', 100, 5, 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `stars` varchar(1) NOT NULL DEFAULT '',
  `tech` varchar(10) NOT NULL DEFAULT '',
  `kovu_trn` varchar(255) NOT NULL DEFAULT '',
  `kiek_trn` bigint(255) NOT NULL DEFAULT 0,
  `team` varchar(255) NOT NULL DEFAULT '',
  `team_ltl` varchar(255) NOT NULL DEFAULT '',
  `gavoban` varchar(255) NOT NULL DEFAULT '',
  `laivas` varchar(255) NOT NULL DEFAULT '',
  `future` varchar(255) NOT NULL DEFAULT '',
  `skrendu` varchar(255) NOT NULL DEFAULT '',
  `k17` bigint(255) NOT NULL DEFAULT 0,
  `k18` bigint(255) NOT NULL DEFAULT 0,
  `cell` bigint(255) NOT NULL DEFAULT 0,
  `kiek_paaukojo_i_team` bigint(255) NOT NULL DEFAULT 0,
  `win_in_team` bigint(255) NOT NULL DEFAULT 0,
  `iki_algos` varchar(255) NOT NULL DEFAULT '',
  `greitas` varchar(255) NOT NULL DEFAULT '',
  `bnr` varchar(255) NOT NULL DEFAULT '',
  `devine` varchar(255) NOT NULL DEFAULT '',
  `kid_goku` varchar(255) NOT NULL DEFAULT '',
  `sagu_time` varchar(255) NOT NULL DEFAULT '',
  `rodyti_turnyra` varchar(255) NOT NULL DEFAULT '',
  `secret` varchar(255) NOT NULL DEFAULT '',
  `snow` varchar(255) NOT NULL DEFAULT '',
  `sjn` varchar(255) NOT NULL DEFAULT '',
  `smoge_sjn` bigint(255) NOT NULL DEFAULT 0,
  `chat` varchar(255) NOT NULL DEFAULT '',
  `kiek_paaukojo_i_team2` varchar(255) NOT NULL DEFAULT '',
  `greitas2` varchar(255) NOT NULL DEFAULT '',
  `greitas3` varchar(255) NOT NULL DEFAULT '',
  `greitas4` varchar(255) NOT NULL DEFAULT '',
  `meniu1` varchar(255) NOT NULL DEFAULT '',
  `meniu2` varchar(225) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `meniu3` varchar(255) NOT NULL DEFAULT '',
  `iki_algos2` varchar(222) NOT NULL DEFAULT '',
  `gavomute` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(255) NOT NULL DEFAULT '',
  `ataka` int(255) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nick`, `stars`, `tech`, `kovu_trn`, `kiek_trn`, `team`, `team_ltl`, `gavoban`, `laivas`, `future`, `skrendu`, `k17`, `k18`, `cell`, `kiek_paaukojo_i_team`, `win_in_team`, `iki_algos`, `greitas`, `bnr`, `devine`, `kid_goku`, `sagu_time`, `rodyti_turnyra`, `secret`, `snow`, `sjn`, `smoge_sjn`, `chat`, `kiek_paaukojo_i_team2`, `greitas2`, `greitas3`, `greitas4`, `meniu1`, `meniu2`, `meniu3`, `iki_algos2`, `gavomute`, `ip`, `ataka`) VALUES
(1, 'testas1', '', '1', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, '', 'Pradžia', '+', '', '', '', '', '', '', '', 0, '', '', 'Miestas', 'Meniu', '+', '+', '+', '+', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_daily_mission`
--

CREATE TABLE `user_daily_mission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `mission_id` bigint(20) UNSIGNED NOT NULL,
  `token` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `euro` bigint(20) UNSIGNED NOT NULL,
  `exp` varchar(2550) DEFAULT NULL,
  `vipticket` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `power` decimal(65,0) UNSIGNED NOT NULL,
  `defence` decimal(65,0) UNSIGNED NOT NULL,
  `status` enum('new','done') NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uzsakymai`
--

CREATE TABLE `uzsakymai` (
  `id` int(11) NOT NULL,
  `atlygis` varchar(255) NOT NULL DEFAULT '',
  `norima` varchar(255) NOT NULL DEFAULT '',
  `kiek` varchar(255) NOT NULL DEFAULT '',
  `nick` varchar(255) NOT NULL DEFAULT '',
  `laikas` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaskinimas`
--

CREATE TABLE `vaskinimas` (
  `id` int(11) NOT NULL,
  `kas` varchar(15) NOT NULL DEFAULT '',
  `kiek` bigint(20) DEFAULT 0,
  `zenklas` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `veikejai`
--

CREATE TABLE `veikejai` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `trans` int(11) DEFAULT 0,
  `logo` varchar(255) DEFAULT '0',
  `jega` varchar(255) DEFAULT '0',
  `gynyba` varchar(255) DEFAULT '0',
  `gyvybes` varchar(255) DEFAULT '0',
  `rase` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `sugebejimas` varchar(255) NOT NULL,
  `rodyti` varchar(255) NOT NULL,
  `technika` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `veikejai`
--

INSERT INTO `veikejai` (`id`, `name`, `trans`, `logo`, `jega`, `gynyba`, `gyvybes`, `rase`, `sugebejimas`, `rodyti`, `technika`) VALUES
(1, 'Gokas', 8, '0', '+5', '+15', '+0', 'Sajanas', '', '', 'Kamehameha'),
(2, 'Vedzitas', 5, '0', '+15', '+5', '+0', 'Sajanas', '', '', 'Final flash'),
(3, 'Gohanas', 4, '0', '+0', '+0', '+0', 'Sajanas', '', '', 'Masenko'),
(5, 'Tranksas', 2, '0', '+0', '+0', '+0', 'Sajanas', '', '', 'Galick Gun'),
(6, 'Bulma', 0, '0', '+30', '+30', '+30', 'Žemietė', '', '', 'Angry Bulma'),
(9, 'Raditas', 4, '0', '+0', '+0', '+0', 'Sajanas', '', '', 'Begone'),
(10, 'Pikolas', 2, '0', '+0', '+0', '+0', 'Namekas', '', '', 'Makosen'),
(11, 'Buu', 6, '0', '+0', '+0', '+0', 'Siaubūnas', '', '', 'Gack'),
(12, 'Fryzas', 4, '0', '+0', '+0', '+0', 'Siaubūnas', '', '', 'Death Laser'),
(19, 'Selas', 3, '0', '+0', '+0', '+0', 'Kyborgas', '', '', 'Sayan Power'),
(21, 'Neilas', 0, '0', '+20', '+20', '+20', 'Namekas', '', '', 'Regeneration'),
(25, 'Nappas', 0, '0', '+15', '+15', '+15', 'Sajanas', '', '', 'ArmBreak'),
(31, 'Kapitonas ginis', 0, '30', '+10', '+10', '+10', 'Siaubūnas', '', '', 'Changed'),
(32, 'Pikonas', 0, '32', '+50', '+100', '+10', 'Neatpažinta', '', '', ''),
(33, 'Krilinas', 0, '25', '+10', '+10', '+10', 'Žemietis', '', '', 'Kamehameha'),
(34, 'Dendis', 0, '26', '+10', '+10', '+10', 'Namekas/Dievas', '', '', 'Healing'),
(36, 'Android 21', 0, '16', '+100', '+100', '+100', 'Kyborgė', '', '', ''),
(37, 'Jamcis', 0, '5', '+50', '+50', '+50', 'Žemietis', '', '', ''),
(38, 'Uub', 0, '37', '+50', '+70', '+100', 'Žemietis', '', '', ''),
(39, 'Lance', 0, '39', '+100', '+100', '+100', 'Žemietė', '', '', ''),
(40, 'Vegito', 4, '', '', '', '', '', '', 'ne', ''),
(41, 'Gold Oozuru', 2, '', '+100', '+100', '+100', '', '', 'ne', ''),
(42, 'Gotenks', 3, '', '', '', '', '', '', 'ne', ''),
(43, 'Krilinas', 0, '25', '+50', '+70', '+10', 'Žemietis', '', '', 'Kamehameha');

-- --------------------------------------------------------

--
-- Table structure for table `veikejas`
--

CREATE TABLE `veikejas` (
  `id` int(255) NOT NULL,
  `nick` text NOT NULL,
  `veikejas` varchar(255) NOT NULL,
  `kiek` int(255) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `veikejas`
--

INSERT INTO `veikejas` (`id`, `nick`, `veikejas`, `kiek`) VALUES
(1, 'testas1', 'Gokas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vertinimai`
--

CREATE TABLE `vertinimai` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL DEFAULT '',
  `balai` varchar(255) NOT NULL DEFAULT '',
  `komentaras` varchar(255) NOT NULL DEFAULT '',
  `foto` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vietam`
--

CREATE TABLE `vietam` (
  `id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci DEFAULT '0',
  `img` varchar(111) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vietam`
--

INSERT INTO `vietam` (`id`, `name`, `img`) VALUES
(1, 'Pirma Misija', ''),
(2, 'Antra Misija', ''),
(3, 'Trečia Misija', ''),
(4, 'Ketvirta Misija', ''),
(5, 'Penkta Misija', ''),
(6, 'Šešta Misija', ''),
(7, 'Septinta Misija', ''),
(8, 'Aštunta Misija', ''),
(9, 'Devinta Misija', ''),
(10, 'Dešimta Misija', ''),
(0, 'Miško misijos', '0');

-- --------------------------------------------------------

--
-- Table structure for table `vietap`
--

CREATE TABLE `vietap` (
  `id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci DEFAULT '0',
  `img` varchar(111) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vikte_cfg`
--

CREATE TABLE `vikte_cfg` (
  `id` int(11) NOT NULL DEFAULT 0,
  `kiek_iki` int(11) DEFAULT 0,
  `kls` int(11) DEFAULT 0,
  `iki_k` int(11) DEFAULT 0,
  `randas` varchar(255) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vikte_cfg`
--

INSERT INTO `vikte_cfg` (`id`, `kiek_iki`, `kls`, `iki_k`, `randas`) VALUES
(1, 1683565331, 7520, 20, '46');

-- --------------------------------------------------------

--
-- Table structure for table `vikte_chat`
--

CREATE TABLE `vikte_chat` (
  `id` int(11) NOT NULL,
  `nick` varchar(110) NOT NULL,
  `sms` text CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `time` int(100) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vikte_klsm`
--

CREATE TABLE `vikte_klsm` (
  `id` int(11) NOT NULL DEFAULT 0,
  `klsm` text CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL,
  `ats` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vikte_klsm`
--

INSERT INTO `vikte_klsm` (`id`, `klsm`, `ats`) VALUES
(104, 'Senoves lietuviu dievas, mirusiuju valdovas', 'Andajas'),
(103, 'Senoves egiptieciu saules, oru ir derlingumo dievas?', 'Amonas'),
(102, 'Musulmonu dievas?', 'Alachas'),
(101, 'Senoves graiku mirusiuju pasaulio dievas, kitaip Hadas', 'Aidas'),
(100, 'Senoves graiku meiles ir grozio deive', 'Afrodite'),
(99, 'Biblijos personazas, pirmasis zmogus', 'Adomas'),
(98, 'Asmuo, religiniais tikslais keliaujantis i sventas vietas', 'Piligrimas'),
(97, 'Pozemine baznycios patalpa', 'Kripta'),
(96, 'Kunigu seminarijos mokinys', 'Klierikas'),
(95, 'Dievybes isikunijimas zmoguje?', 'Inkarnacija'),
(94, 'Apeigos piktosioms dvasioms isbaidyti?', 'Egzorcizmas'),
(93, 'Krikscioniu vienuoliu drabuzis?', 'Abitas'),
(92, 'Protestantu sektos, skelbiancios greitaji kristaus atejima', 'Adventistai'),
(91, 'Asiru valdovas', 'Asurbanipalas'),
(90, 'Asiru miestas', 'Nineve'),
(88, 'Zymus Suneru valdovas?', 'Urukagina'),
(89, 'Senosios Babilono karalystes valdovas?', 'Hamurabis'),
(86, 'Akado imperijos rastas?', 'Dantirastis'),
(87, 'Akado imperijos valdovas?', 'Sargonas'),
(84, 'Musis ivykes 1410-uju vasara?', 'Zalgirio musis'),
(85, 'Sumeru monumentalioji architektura?', 'Zikuratai'),
(82, 'Lietuvos herbas', 'Vytis'),
(83, 'Didziausias muzikos instrumentas', 'Vargonai'),
(81, 'Kelintais metais ikurtas Zuvinto rezervatas', '1937'),
(80, 'Kelintais metais vainikuotas pirmas (ir paskutinis) Lietuvos karalius?', '1253'),
(79, 'Kokio aukscio Satrijos kalnas? (m)', '228'),
(78, 'Didziausias Dzukijos miestas', 'Alytus'),
(8941, 'Zmogus, sakantis viesas kalbas', 'oratorius'),
(77, 'Kelintais metais vyko Saules musis?', '1236'),
(74, 'Zemaitijos sostine', 'Telsiai'),
(73, 'Penktas pagal dydi Lietuvos miestas', 'Panevezys'),
(71, 'Kada lietuvoje pradeta kurti skautu organizacija?', '1917'),
(72, 'Mikalojaus Konstantino Ciurlionio teviske', 'Druskininkai'),
(105, 'Senoves graiku karo ir isminties deive', 'Atene'),
(106, 'Senoves lietuviu biciu deive', 'Austeja'),
(107, 'Didziausia Egipto piramide?', 'Cheopso'),
(108, 'Mesopotamijos gyventoju rastas.', 'Dantirastis'),
(109, 'Astuntoji saules sistemos planeta.', 'Neptunas'),
(110, 'Kokia firma yra reciause ', 'Diadora'),
(111, 'Samurajaus kardas skirtas kovai?', 'Katana'),
(112, 'Bokstas, kuri state zmones, isigeide pasiekti dangu', 'Babelio bokstas'),
(113, 'Senoves graiku vaisingumo, vynu ir linksmybiu dievas', 'Bakchas'),
(114, 'Trigalwis suo, pozemio karalystes Hado vartu sargas', 'Cerberis'),
(115, 'Musulmonu drabuzis', 'Cadra'),
(116, 'Senoves graiku zemdirbystes ir derlingumo deive', 'Demetra'),
(117, 'Musulmonu elgetaujantis vienuolis', 'Dervisas'),
(118, 'Senoves graiku vynuogiu, vyndarystes dievas', 'Dionisas'),
(119, 'Izraelio ir judejos karalius', 'Dovydas'),
(120, 'Graiku vyriausias dievas', 'Dzeusas'),
(121, 'Itin stiprus susijaudinimas, pakilumas, uzsimirsimas', 'Ekstaze'),
(122, 'Senoves graiku nesantaikos deive', 'Eride'),
(123, 'Kauno krepsinio komanda', 'Zalgiris'),
(124, 'Hitlerio partijos sutrumpintas pavadinimas', 'Nsdap'),
(125, 'Stalino tikroji pavarde', 'Dziugasvilis'),
(126, 'Kas sukure cheminiu elementu lentele?', 'Mendelejavas'),
(127, 'Didziausia saules sistemos planeta', 'Jupiteris'),
(128, 'Lietuvos kaimyne', 'Lenkija'),
(129, 'Kelintais metais kilo pirmasis pasaulinis karas?', '1914'),
(130, 'Kaip vadinamas samuraju salmas su ragu ketera', 'Kabuto'),
(131, 'Kaip wadinamas apskritas skydelis ant samurajaus kardo', 'Tsuba'),
(132, 'Samurajaus kardas kuriuo jie nusizudo', 'Seppuku'),
(133, 'Indu karo kirvis', 'Bhuj'),
(134, 'Knygos Da Vincio Kodas autorius (org)', 'Dan Brown'),
(135, 'Valstybes politinis ir kulturinis izoliavimasis nuo kitu saliu', 'Gelezine uzdanga'),
(136, 'Savarankiskumas, nepriklausomybe', 'Autonomija'),
(137, 'Auksciausias pasaulio kalnas?', 'Everestas'),
(138, 'Baldas,kuriame laikomi indai ir maistas?', 'Indauja'),
(139, 'Irako sostine?', 'Bagdadas'),
(140, 'Kokia pirma klonuota avis pasaulyje?', 'Doly'),
(141, 'Iswersti raides nba', 'National basketball asotiation'),
(142, 'Kataliku vienuolyno virsininkas', 'Abatas'),
(143, 'Atleidimas nuo bausm', 'Amnestija'),
(144, 'Karinis dalinys,susidedantis is keliu kuopu', 'Batalionas'),
(145, 'Laisvas zem', 'Homstedas'),
(146, 'Karinis isiverzimas i swetima sali', 'Invazija'),
(147, 'Prancuzijos sostine', 'Paryzius'),
(148, 'Kiek euru galima gauti uz 1kg aukso', '356000'),
(149, 'Zymiausia grigaliskojo choralo giesme', 'Dies irae'),
(150, 'Kaip vadinama geometrijos atsaka kur sprendziami brezimo uzdaviniai?', 'Konstruktyvioji geometrija'),
(151, 'Viesai,iskilmingai skelbti', 'Deklaruoti'),
(152, 'Dalies tautos gyvenimas svietur', 'Diaspora'),
(153, 'Kuno ar mirties bausmes vykdymas', 'Egzekucija'),
(154, 'Meno stilius,kuriam budingas laisvas praeities stilistiniu formu jungimas', 'Eklektika'),
(155, 'Valstybes viespatavimo sferu pletimas', 'Ekspansija'),
(156, 'Visuomenes virsune,kuriou nors atzvilgiu issiskirianti is aplinkos', 'Elitas'),
(157, 'Habsburgu dinastijos princu titulas', 'Erchercogas'),
(158, 'Didelis karo laivu,lektuvu junginys', 'Eskadra'),
(159, 'Apsauga,palyda', 'Eskortas'),
(160, 'Visuomen', 'Etiketas'),
(161, 'Mirties bausme:galvos nukirtimas', 'Giljotinavimas'),
(162, 'Raizinys', 'Graviura'),
(163, 'Zmoniu atsikelimas gyventi is kitu saliu', 'Imigrcija'),
(164, 'Koks baikalo ezero gylis?', '1631'),
(165, 'Turtingiausias pasaulyje futbolo klubas', 'Real madrid'),
(166, 'Online zaidimas?', 'Bloodmoon'),
(167, 'Kokio dydzio Afrika?', '44mln/km'),
(168, 'Reciause firma', 'Diadora'),
(169, 'Kokio ilgio buvo didziausia knyga?', '320cm'),
(170, 'Kieno baznycia stowi wilniuja?', 'Onos'),
(171, 'Koks kompozitorius sukure dabartini europos himna?', 'Bethovenas'),
(172, 'Europa nuo Azijos skiriantys kalnai', 'Uralo'),
(173, 'Kaip vadinami Estijoje esantys skardziai?', 'Glintas'),
(174, 'Ka seniau reiske php?', 'Personal zaideju_pagrindine_informacija_4hj7sd4v page'),
(175, 'Kas pirmieji pasieke amerikos krantus?', 'Vikingai'),
(176, 'Viduramziais klajojantys muzikantai buvo vadinami vagantais arba ...', 'Goljardais'),
(177, 'Neutrali atomo dalele', 'Neutronas'),
(178, 'Gereuses wap game?', 'BloodMoon'),
(179, 'Kiek klasikine gitara turi stygu?', 'Sesias'),
(180, 'Kas laimejo 2006 metu NBA dejimu konkursa?', 'Nate Robinson'),
(181, '52 x 13 = ?', '676'),
(182, '12 : 8 + 69 = ?', '70,5'),
(183, 'Dektine gaminama su vaisiais', 'Sobieski'),
(184, 'Koks akordas susidaro nuo pirmo gamos laipsnio?', 'Tonika'),
(185, 'Koks akordas susidaro nuo trecio gamos laipsnio?', 'Mediante'),
(186, 'Koks akordas susidaro nuo ketvirto gamos laipsnio?', 'Subdominante'),
(187, 'Koks akordas susidaro nuo penkto gamos laipsnio?', 'Dominante'),
(188, 'Rytu timoro sostine?', 'Dilis'),
(189, 'Koks akordas susidaro nuo sesto gamos laipsnio?', 'Submediante'),
(190, 'Kaip vadinasi vengru liaudies dainos?', 'Rapsodija'),
(191, 'Sunkiausias instrumentinis kurinys fortepijonui?', 'Islamejus'),
(192, 'Kaip vadinamas grigalisko choralo giedojimo budas, kai paeiliui gieda dvi choro grupes?', 'Antifona'),
(193, 'Kaip vadinamas grigalisko choralo giedojimo budas, kai paeiliui gieda solistas ir choras?', 'Responsorijus'),
(194, 'Kaip viduramziais buvo vadinamos natos?', 'Neumos'),
(195, 'Kur gime kompozitorius F. Liszt?', 'Vengrijoje'),
(196, 'Pirmoji salis pripazino Lietuvos nepriklausomybe?', 'Islandija'),
(197, 'Kaip kitaip vadinamas fortepijonas?', 'Rojalis'),
(198, 'Senoves egiptieciu rastas', 'Hieroglifai'),
(199, 'Koks ypa pats leciausias tempas?', 'Grave'),
(200, 'Koks ypa pats greiciausias tempas?', 'Prestissimo'),
(201, '1000000-mega, 1000000000-...', 'Giga'),
(202, 'Misko priziuretojas?', 'Uredas'),
(203, 'Pianino sinonimas', 'Kliapas'),
(204, 'Maziausias paukstis pasaulyje?', 'Kolibris'),
(205, 'Akordeono sinonimas', 'Zazas'),
(206, 'Klarneto sinonimas', 'Kliurke'),
(207, 'Citroen automobiliu gaminimo salis?', 'Prancuzija'),
(208, 'Baltaodzio(-es) ir juodaodzio(-es) palikuonis.', 'Mulatas'),
(209, 'Kokio linksnio nera rusu kalboje?', 'Sauksmininko'),
(210, 'Lietuvos kompozitorius,gyvenes klaipedoje ir ikures konservatorija?', 'Stasys simkus'),
(211, 'Daugiausiai pinigu per metus uzdirbantis sportininkas?', 'T.Woodsas'),
(212, 'Kiek metu truko karas tarp Anglijos ir Prancuzyjos?', '100'),
(213, 'Pawadinimas masinos volswagen kitas zodis?', 'Sharan'),
(214, 'Is ko pagamintas stiklas?', 'Smelio'),
(215, 'Kas buvo pirmasis astronautas apskrides aplink zeme?', 'Gagarinas'),
(216, 'Raitelis pabalnojes nosi?', 'Akiniai'),
(217, 'Kokia makedonijos sostine', 'Skopje'),
(218, 'Ilgiausia pasaulio upe', 'Nilas'),
(219, 'Kada ivyko durbes musis?', '1260'),
(220, 'Kas sukure magic:the gathering', 'Richard Garfield'),
(221, 'Ka daro kraujo lasteles patekusios i distiliuota vandeni', 'Plysta'),
(222, 'Vienalastis padaras', 'Ameba'),
(223, 'Kas kontroliuoja lasteles augima ir dalijymasi', 'Branduolys'),
(224, 'Kokia augalo dalis gamina gliukoze', 'Asimiliacinis audinys'),
(225, 'Paprasciausias padaras', 'Ameba'),
(226, 'Kas parase knyga drakula', 'Bram stoker'),
(227, 'Kas parase Lietuvos himna?', 'Vincas Kudirka'),
(228, 'Musio ir krepsinio komandos pavadinimas?', 'Zalgiris'),
(229, 'Kiek km tesiasi Lietuvos pajuris?', '99km'),
(230, 'Ilgiausia Lietuvos upe?', 'Nemunas'),
(231, 'Kokia upe teka per Vilniu?', 'Neris'),
(232, 'Legendinis laivas gulintis Atlanto vandenyno dugne?', 'Titanic'),
(233, 'Kaip dar kitaip vadinamas barsukas?', 'Opsrus'),
(234, 'Bendrija ir negyvoji aplinka kartu', 'Ekosistema'),
(235, 'Zemes dalis, kurioje egzistuoja gyvybe', 'Biosfera'),
(236, 'Individo gyvenamoji aplinka', 'Buveine'),
(237, 'Rusiu gyvenimas kartu', 'Simbioze'),
(238, 'Nitratu susidarymas', 'Nitrifikacija'),
(239, 'Didziausias biogeografinis biosferos vienetas', 'Biomas'),
(240, 'Virsutinis litosferos sluoksnis', 'Dirvozemis'),
(241, 'Virusai, parazituojantys bakterijose', 'Bakteriofagai'),
(242, 'Melsvai zalias lapu pigmentas', 'Fitochromas'),
(243, 'Isorinis odos sluoksnis', 'Epidermis'),
(244, 'Kraujo lasteles', 'Eritrocitai'),
(245, 'Kaip dar kitaip vadinama padidinta kvarta arba sumazinta kvinta?', 'Tritonis'),
(246, 'Kokia vandeningiausia pasaulio upe?', 'Amazone'),
(247, 'Geriausias pasaulio golfo zaidejas', 'Tiger Woods'),
(248, 'Akordai buna pagrindiniai ir... ?', 'Pagalbiniai'),
(249, 'Bloodmoon kurejas', 'Finx'),
(250, 'Koks lietuviu mitologijoje viriausias dievas', 'Perkunas'),
(251, 'Socialines grupes', 'Luomai'),
(252, 'Kada mire vienintelis Lietuvos karalius Mindaugas?', '1263'),
(253, 'Prasimanyta priezastis, dingtis', 'Pretekstas'),
(254, 'Senoves japonu religija', 'Sintoizmas'),
(255, 'Kryziuociu ordino sostine', 'Marienburgas'),
(256, 'Kada vyko didysis prusu sukilimas? ', '1260-1274'),
(257, 'Isimtine teise arba lengvata', 'Privilegija'),
(258, 'Rastine kitaip', 'Kanceliarija'),
(259, 'Kada Vilnius pirma karta buvo paminetas kaip Lietuvos sostine?', '1323'),
(260, 'Pakanta kitaip', 'Tolerancija'),
(261, 'Kada vyko strevos musis?', '1345'),
(262, 'Kada vyko rudavos musis?', '1370'),
(263, 'Rusijos valdzios organas', 'Duma'),
(264, 'Visuomeninio gyvenimo pertvarkymas', 'Reforma'),
(265, 'Judejimas, siekiantis panaikinti koki nors istatyma', 'Abolicionizmas'),
(266, 'Kolonistai naujakuriai', 'Skvoteriai'),
(267, 'Kada buvo pakrikstytas Lietuvos karalius Mindaugas?', '1251'),
(268, 'Staigus gyventoju skaiciaus pasikeitimas', 'Demografinis sprogimas'),
(269, 'Fabriko, gamyklos savininkas', 'Fabrikantas'),
(270, 'Kada buvo antra pakrikstyta Lietuva?', '1387'),
(271, 'Astronomas, isrades gyvsidabrio termometra', 'Andersas celsijus'),
(272, 'Zmogus, asmuo', 'Individas'),
(273, 'Kelintais metais Vytautas tapo Lietuvos valdovu?', '1392'),
(274, 'Naujas, siuolaikinis', 'Modernus'),
(275, 'Esminis ko nors pertvarkymas', 'Rekonstrukcija'),
(276, 'Jauniausias JAV prezidentas', 'Grantas'),
(277, 'Vietoj lazo imamas piniginis mokestis', 'Cinsas'),
(278, 'Kelintais metais isleistas Pirmasis Lietuvos Statutas?', '1529'),
(279, 'Kelintais metais isleistas Antrasis Lietuvos Statutas?', '1566'),
(280, 'Valstiecio duokle zemes ukio produktais', 'Dekla'),
(281, 'Valstybiu susivienijimas', 'Unija'),
(282, 'Bevaldyste, netvarka, suirute', 'Anarchija'),
(283, 'Kelintais metais isleistas Treciasis Lietuvos Statutas?', '1588'),
(284, 'Kada buvo pasirasyta Liublino unija?', '1569'),
(285, 'Liudnojo vaizdo riteris?', 'Don Kichotas'),
(286, 'Vilniaus futbolo komanda susijus su gyvunu?', 'Gelezinis vilkas'),
(287, 'Kaip latviskai skambetu be tabu?', 'Bez tabu'),
(288, 'Kaip isifruot FTP?', 'File Transfel Protocol'),
(289, 'Kas isrado alu?', 'Egiptieciai'),
(290, 'Liga kai nekresa kraujas?', 'Hemofilija'),
(291, 'Maziausia pasaulio valstibe', 'Vatikanas'),
(292, 'Kokia salis yra europos viduryja?', 'Lietuva'),
(293, 'Koks antro pasaulinio karo tankas buvo stipriauses', 'Vezlys'),
(294, 'Senoves graikijos muzikos globeja?', 'Polihimnija'),
(295, 'Kurie instrumentas atsirado anksciausiai? ', 'Musamieji'),
(296, 'Melodijos linija buna kylanti, krintanti ir... ?', 'Banguojanti'),
(297, 'Is ko sudaryta melodija?', 'Intonaciju'),
(298, 'Melodija turi ... ?', 'Derme'),
(299, 'Kaip kurinyje vadinama melodiju visuma?', 'Melodika'),
(300, 'Kas yra organizuota garsu seka?', 'Ritmas'),
(301, 'Taskuotas ritmas arba ... ?', 'Punktyrinis'),
(302, 'Kas yra periodiskas stipriuju ir silpnuju takto daliu pasikartojimas?', 'Metras'),
(303, 'Kas yra kurinio atlikimo greitis?', 'Tempas'),
(304, 'Vidutinis tempas', 'Moderato'),
(305, 'Greitas tempas', 'Allegro'),
(306, 'Labai greitas tempas', 'Presto'),
(307, 'Kas yra skambejimo stiprumas?', 'Dinamika'),
(308, 'Ka reiskia crescendo?', 'Garsejant'),
(309, 'Ka reiskia diminuendo?', 'Tylejant'),
(310, 'Kaip vadinamas muzikines medziagos isdestymo budas?', 'Faktura'),
(311, 'Faktura skirstoma i vokaline ir ... ?', 'Instrumentine'),
(312, 'Faktura skirstoma i vienbalse ir ... ?', 'Daugiabalse'),
(313, 'Daugiabalse faktura skirstoma i homofonine ir ... ?', 'Polifonine'),
(314, 'Kas yra skambejimo spalva?', 'Tembras'),
(315, 'Polifonijos rusys: imitacine ir ... ?', 'Kontrastine'),
(316, 'Kas yra muzikos kurinio rusis, tipas?', 'Zanras'),
(317, 'Kas yra daugiabalsio kurinio uzrasymas atskiromis partijomis tam tikra tvarka?', 'Partitura'),
(318, 'Kelintame amziuje atsirado orkestrai?', 'XVIa. pabaigoje'),
(319, 'Koks antikines kulturos laikotarpis buvo VIII-VIa. pr. Kr?', 'Archaikos'),
(320, 'Koks antikines kulturos laikotarpis buvo nuo Va. iki 330m. pr. Kr?', 'Klasikos'),
(321, 'Koks antikines kulturos laikotarpis buvo nuo 330m. Iki 146m. pr. Kr?', 'Helinistinis'),
(322, 'Koks antikines kulturos laikotarpis buvo nuo 146m. pr. Kr. - 395m. po Kr.?', 'Romos valdymo'),
(323, 'Muzika senoves graikijoje buvo glaudziai susijusi su poezija ir ... ?', 'Sokiu'),
(324, 'Kaip vadinamas vienbalsis, lotyniskas, liturginis, kataliku baznycios giedojimas?', 'Grigaliskasis choralas'),
(325, 'Kas ikure grigaliskaji giedojima?', 'Grigalius pirmasis'),
(326, 'Trubaduru zanras', 'Alba'),
(327, 'Trubaduru zanras?', 'Pasturele'),
(328, 'Trubaduru zanras ?', 'Sirventa'),
(329, 'Ka reiskia ars antiqua?', 'Senasis menas'),
(330, 'Ka reiskia perpetum?', 'Amzinas'),
(331, 'Kokia firma pagamino siuos telefonu modelius l6,c450,e398 ?', 'Motorola'),
(332, 'Kada buvo israsta pirma garo masina ?', '1769'),
(333, 'Kaip vadinasi zmones kurie kure zemelapius', 'Kartografai'),
(334, 'Sunkiausio fortepijoninio kurinio autorius?', 'Balakirevas'),
(335, 'Azuolo waisiai _____?', 'Giles'),
(336, 'Kas isrado elektros lempute?', 'Tomas Edisonas'),
(337, 'Kas atrado realityvumo teorija?', 'Einsteinas'),
(338, 'Kas parase literaturos kurini Skerdzius?', 'Vincas Kreve'),
(339, 'Kur buwo israstos pirmos audimo stakles?', 'Amerikoje'),
(340, 'Filmas, isgarsines kino zvaigzde Arnolda Svarcnegeri ?', 'Terminatorius'),
(341, 'Geriausias filmas, pripazintas 2003 metais ?', 'Ziedu valdovas'),
(342, 'Zodzio ostinatinis sinonimas', 'Izoritminis'),
(343, 'Morgas tai...', 'Lavonine'),
(344, 'Kokia masina gali vaziuoti ant kelio ir povandeniu?', 'Amfibija'),
(345, 'Pavarde moters parasiusos Hari Poteri', 'Rowling'),
(346, 'Kelintais metais pr.kr ywyko maratono musis?', '490'),
(347, 'Kada buwo ikurtas romos miestas pr.kr?', '753'),
(348, 'Auksciausioji walstybes waldzia romoje respublikos metais priklause...?', 'Senatui'),
(349, 'Koks yra zodzio  lopsys antonimas', 'Karstas'),
(350, 'Vaisius,kurio per metus yra suvalgoma daugiausia?', 'Pomidoras'),
(351, 'kada buvo pastatyta sv.Onos baznycia', '1500'),
(352, 'Labai kieta danti dengianti medziaga', 'Emalis'),
(353, 'Didziausia valstybe', 'Rusija'),
(354, 'Kada gime valdas adamkus?', '1926'),
(355, 'Didziausias pasaulio ezeras', 'Viktorijos'),
(356, 'Islandijos sostine', 'Reikjavas'),
(357, 'Albanijos sostine', 'Tirana'),
(358, 'koke zambijos sostine', 'lusaka'),
(359, 'Kuriam zemyne yra Panama', 'Pietu Amerikoje'),
(360, 'Nepalo sostine', 'KatmandU'),
(361, 'Upes pabaiga', 'ZiotyS'),
(362, 'Bizantijos imperijos sostine', 'KonstantinopoliS'),
(363, 'Ka reiskia zodis antika', 'Senove'),
(364, 'Laisves simbolis', 'Balandis'),
(365, 'Koks zmogus paskelbe 7amziaus pradzioje islamo tikejima?', 'Mazaideju_pagrindine_informacija_4hj7sd4vtas'),
(366, '1236-1263 kas siais metais valde Lietuva?', 'Mindaugas'),
(367, 'Kas yra zvairas?', 'Kiskis'),
(368, 'Grazus augalas su spygliais', 'Kaktusas'),
(369, 'Koks karalius valde Prancuzyja 17amziuje?', 'Liudvikas14'),
(370, 'Kada vyko durbes musis m.', '1260'),
(371, 'Kelintais metais suskilo Romos imperija i dvi dalis?', '395'),
(372, 'Koks didelis ir turtingas miestas klestejo bizantijos laike, dar vadinamas antraja Roma.', 'Konstantinopolis'),
(373, 'Kelintais metai arabai puole ir du metus apsiaute laike Konstantinopol', '717'),
(374, 'Is ko dazniausiai gaminamas trimitas?', 'Vario'),
(375, 'Kaip vadinami vabzdziai kurie gyvena seimomis ir turi geluoni? ', 'Bites'),
(376, 'Irankis kuruo atkabinamas korys nuo avilio sieneliu?', 'Kaltas'),
(377, 'norwegijos sostine?', 'oslas'),
(378, 'Koks miestas dar yra wadinamas Lietuvos laikinaja sostine?', 'Kaunas'),
(379, 'Kaip trumpiau vadinamas vanduo?', 'H2o'),
(380, 'Koks pirmasis Lietuvos karalius', 'Mindaugas'),
(381, 'Uz zemes plutos?', 'Mantija'),
(382, 'Rusiskas vardas?', 'Aleksandras'),
(383, 'Pilenu musio data', '1336'),
(384, 'Saules musio data', '1236'),
(385, 'Durbes musio data', '1230'),
(386, 'Prusu sukilimo data', '1260'),
(387, 'Liolikas ir ....', 'Bolikas'),
(388, 'Nba komanda', 'Lakers'),
(389, 'Antroji olandu sostine?', 'Haga'),
(390, 'Sala priklausanti Prancuzijai?', 'Korsika'),
(391, 'Teka per Berlyna?', 'Spre'),
(392, 'Maltos piniginis vienetas?', 'Lira'),
(393, 'Oderis arba ...?', 'Odra'),
(394, 'Teka Austrijoje?', 'Inas'),
(395, 'Uzliejama paupio pieva?', 'Lanka'),
(396, 'Gerai platina melyniu seklas?', 'Tetervinas'),
(397, 'Didziausias Lietuvos vabalas?', 'Elniaragis'),
(398, 'Isnykes zveris?', 'Tauras'),
(399, 'Laukine bite?', 'Kamane'),
(400, 'Paukstis?', 'Pievine Giege'),
(401, 'Misko zaliasis paklotas?', 'Samanos'),
(402, 'Moldovos sostine?', 'Kisiniova'),
(403, 'Rumunijos sostine?', 'Bukarestas'),
(404, 'Kada pirma karta paminetas Lietuvos vardas?', '1009'),
(405, 'Vienas is miestu, ant kurio per Antraji Pasaulini kara buvo numesta atomine bomba?', 'Hirosima'),
(406, 'Savotiska meno rusis, kur japonu piesiami ranka animaciniai filmukai', 'Anime'),
(407, 'Kas palaidota laimes zybury?', 'Jonas biliunas'),
(408, '2006 pasaulio futbolo cempione', 'Italija'),
(409, '2006 eurowizijos laimetoja ', 'Suomija'),
(410, 'Vandeningiausia pasaulio upe', 'Amazone'),
(411, 'Zvaigzde esanti arciausiai zemes?', 'SaulE'),
(412, 'Kiek zemiu galima isrikiuot aplink saule?', '109'),
(413, 'Vengrijos sostine', 'Budapestas'),
(414, 'Didziausias juru uostas?', 'Roterdamas'),
(415, 'Indijos simbolis', 'Tigras'),
(416, 'JAV simbolis', 'Baltagalvis erelis'),
(417, 'Auksciausias Zemeje augantis medis?', 'Karaliskasis eukaliptas'),
(418, 'Vienintelis zmogaus statinys, matomas is Menulio?', 'Didzioji kinu siena'),
(419, 'Kelintais metais Prancuzija padovanojo amerikieciams laisves statula?', '1884'),
(420, 'Ka japoniskai reiskia Samurai?', 'Tarnas'),
(421, 'Aborigenu medziokles irankis?', 'Bumerangas'),
(422, 'Medis,kurio skersmuo 10m?', 'Baobabas'),
(423, 'Auksciausiai virs juros lygio esantis ezeras pasaulyje?', 'Titikaka'),
(424, 'Auksciausia Azijos virsune?', 'Dzomolungma'),
(425, 'Eifelio boksto aukstis?', '320m'),
(426, 'Maltos sostine', 'Valeta'),
(427, 'Upes vingiai lygumoje?', 'Meandros'),
(428, 'Pailgas kalnuotas ruozas', 'Kalnagubris'),
(429, 'Kelintais metais susikure JAV?', '1776'),
(430, 'Estijos sostine?', 'Talinas'),
(431, 'Vandeningiausia pasaulio upe?', 'Amazone'),
(432, 'Kas laimejo kelias i zvaigzdes 2?', 'Merunas'),
(433, 'Kaip vadinamas priesiskumas zydams?', 'Antisemitizmas'),
(434, 'Kas veda lajda sesi nuliai milijonas?', 'Arunas valinskas'),
(435, 'Italijos sostine?', 'Roma'),
(436, 'Ka japoniskai reiskia bakano?', 'Kvailys'),
(437, 'Kaip vadinami Japonijos ninziu svaidomieji ginklai?', 'Surikenai'),
(438, 'Kieno rajone isikures drasuciu kaimas?', 'Siauliu'),
(439, 'Kuris Japonijos miestas yra 2 pagal dydi?', 'Kiotas'),
(440, 'Kada prasidejo antras pasaulinis karas?', '1939'),
(441, 'Judejimas kitaip', 'Motorika'),
(442, 'Kada ivyko kursko musis?', '1943'),
(443, 'Cheminis elementas K?', 'Kalis'),
(444, 'Brazilijos sostine?', 'Brazilija'),
(445, 'Kazachstano sostine?', 'Astana'),
(446, 'Madagaskaro sostine?', 'Antananaryvas'),
(447, 'Islandijos sostine?', 'Reikjavikas'),
(448, 'Honduro sostine?', 'Tegusigalpa'),
(449, 'Cheminis elementas Sr? ', 'Kriptonas'),
(450, 'Cheminis elementas Sr? ', 'Stroncis'),
(451, 'Cheminis elementas Ag? ', 'Sidabras'),
(452, 'Cheminis elementas No?', 'Nobelis'),
(453, 'Kada karunuotas Mindaugas?', '1253'),
(454, 'Kas yra hakis japoniskai', 'Sudas'),
(455, 'Bob Sinclair daina?', 'Rock this party'),
(456, 'Kada iviko saules musis', '1396'),
(457, 'Kokios energijos turi judantis kunai?', 'Kinetines'),
(458, 'Pirmasis ir vienintelis Lietuvos karalius', 'Mindaugas'),
(459, 'Afrikos valstybe kurios sostine Dakaras?', 'SENEGALAS'),
(460, 'Ziemos menesis', 'Sausis'),
(461, 'Klaipedos alaus gamykla', 'Svyturys'),
(462, 'Pirmas Lietuvos prezidentas', 'Antanas Smetona'),
(463, 'Wakuumas arba kvena skaidri medzega, kuria gali sklisti sviesa?', 'TERPE'),
(464, 'Koks gyvunas turi 8 ciuptuvus?', 'Astunkojis'),
(465, '11111111*11111111=...', '123456787654321'),
(466, 'Kokios energijos turi kunai pakile virs zemes?', 'Potencines'),
(467, 'Portugalijos sostine', 'Lisabona'),
(468, 'Pabaik patarle:dirba kaip ....', 'Bite'),
(469, 'Maziausias pasaulio zemynas?', 'Australija'),
(470, 'Bilo Geitso gimimo metai?', '1955'),
(471, 'Tos ziurkes is Ledynmecio vardas', 'Scrat'),
(472, 'Kaip prancuziskai pasakyti aciu?', 'Merci'),
(473, 'Kas laimejo futbolo 2006 metu pasaulio cempionata ?', 'Italija'),
(474, 'Siauliu dalis kur isikure nato', 'Zokniai'),
(475, 'Kaip vadinama vieta kurioje yra beveik zmogaus nepaliestas gamtovaizdis, gyvena labai nedaug zmoniu?', 'Kaimas'),
(476, 'Importo mokestis,arba rinkliava?', 'Muitas'),
(477, 'Dykumoje vieta kurioje yra gelo vandens ir net gyvena zmones, auga augalai.', 'Oaze'),
(478, 'Statinys, jungiantis kelia per upe, gelezinkeli.', 'Tiltas'),
(479, 'Zento ar marcios tevas.', 'Uosvis'),
(480, 'Tarkuotu bulviu plokstainis.', 'Kugelis'),
(481, 'Pramoginis sproginejantis uztaisas', 'Petarda'),
(482, 'Cheminis elementas Zn ?', 'Cinkas'),
(483, 'Auksciausi Europos kalnaj?', 'Alpes'),
(484, 'Kaimas 9km nuo panevezio', 'Upyte'),
(485, 'Lietuvos karalius', 'Mindaugas'),
(486, 'Kiek megabaitas turi kilobaitu?', '1024'),
(487, '2004-2005m lkl cempionai?', 'Zalgiris'),
(488, 'Giliausias pasaulio ezeras?', 'Baikalas'),
(489, 'Dzukijos sostine', 'Alytus'),
(490, 'Kaip wadinasi karate apranga?', 'Kimono'),
(491, 'Kas parase Kupreli?', 'Ignas seinius'),
(492, 'Pirmasis graiku istorikas', 'Herodotas'),
(493, 'Valstybes valdymo forma,kai ja igivendina patys pilieciai arba ju isrinkti atstovai', 'Demokratija'),
(494, 'Kokios yra rombo istrizaines?', 'Statmenos'),
(495, 'Kaip vadinamas keturkampis kurio visos krastines,kampai ir istrizaines lygios?', 'Kvadratas'),
(496, 'Visos rombo krastines yra ... .', 'Lygios'),
(497, 'Kokia spalva gausime sumaisius ruda ir geltona?', 'Raudona'),
(498, 'Kokia spalva gausime sumaisius ruda ir geltona spalvas?', 'Raudona'),
(499, 'Kokia spalva gausime sumaisius spektro spalvas?', 'Balta'),
(500, 'Svente per kuria vaiksciojama pas nepazystamus zmones prasyti saldumynu ir deginama More.', 'Uzgavenes'),
(501, 'Kur pagamintas gloria brandi?', 'Prancuzijoje'),
(502, 'Moteris+vyras=', 'Vaikas'),
(503, 'Kurios valstybes herbe yra trys liutai?', 'Indijos'),
(504, 'Kaip wadinamas moters islaikomas meiluzis?', 'Alfonsas'),
(505, 'kas yra h2o?', 'vanduo'),
(506, 'kada Minedas vaziuos y Eurovizija?', 'niekada'),
(507, 'Ma', 'Atomas'),
(508, 'Koki buvo stipriausia mekedonijos armijos vieta?', 'Falanga'),
(509, 'Kokia gele auga dykumoje', 'Dykumos roze'),
(510, 'Kur pagaminama daugiausiai kawos?', 'Kuboje'),
(511, 'Jav sostine?', 'Vasingtonas'),
(512, 'Meksikos sostine?', 'Meksikas'),
(513, 'Belizo sostine?', 'Belmopanas'),
(514, 'Gvatemalos sostine?', 'Gvatemala'),
(515, 'Salvadoro sostine?', 'San salvadoras'),
(516, 'Nikaragvos sostine?', 'Managva'),
(517, 'Kosta rikos sostine?', 'San chose'),
(518, 'Panamos sostine?', 'Panama'),
(519, 'Kubos sostine?', 'Havana'),
(520, 'Jamaikos sostine?', 'Kingstomas'),
(521, 'Haicio sostine?', 'Port o prensas'),
(522, 'Dominikos respublikos sostine?', 'Santo domingas'),
(523, 'Venesuelos sostine?', 'Karakasas'),
(524, 'Kolumbijos sostine?', 'Bogota'),
(525, 'Ekvadoro sostine?', 'Kitas'),
(526, 'Gajanos sostine?', 'Dziordztaunas'),
(527, 'Surinamo sostine?', 'Paramaribas'),
(528, 'Peru sostine?', 'Lima'),
(529, 'Bolivijos sostine?', 'Sukre'),
(530, 'Paragvajaus sostine?', 'Asunsjonas'),
(531, 'Ciles sostine?', 'Santjagas'),
(532, 'Urugvajaus sostine?', 'Montevidejas'),
(533, 'Argentinos sostine?', 'Buenos aires'),
(534, 'Daugiausiai automobiliu pagaminanti valstybe?', 'Japonija'),
(535, 'Pareigunas renkantis pinigus is banko?', 'Inkasatorius'),
(536, 'Didziausias eurazijos ezeras', 'Kaspijos jura'),
(537, 'Koks rasitojo biliuno vardas?', 'Jonas'),
(538, 'Naujosios Zelandijos sostine?', 'Velingtonas'),
(539, 'Kauline atauga', 'Ragas'),
(540, 'Bangladeso sostine', 'Daka'),
(541, 'Vietnamo sostine', 'Hanojus'),
(542, 'Kas matuojama geigerio skaitliuku?', 'Radioaktyvumas'),
(543, 'Ka reiskia FTP?', 'File transfer protocol'),
(544, 'Kurios planetos pavadinimas isvertus ir graiku kalbos reiskia \\dangus\\?', 'uranas'),
(545, 'Ryte ant keturiu koju, diena ant dvieju koju, vakare ant triju koju.', 'Zmogus'),
(546, 'Kokia beveik maziausia ir labai turtinga valstybe?', 'Liuksemburgas'),
(547, 'Papua naujosios gvinejos  sostine?', 'Port morsbis'),
(548, 'Maroko sostine?', 'Rabatas'),
(549, 'Libijos sostine?', 'Tripolis'),
(550, 'Tanzanijos sostine? ', 'Dodoma'),
(551, 'Angolos sostine? ', 'Luanda'),
(552, 'Metines pastiles?', 'Mynthon'),
(553, 'Melynos misko uogos?', 'Melynes'),
(554, 'Afrikoje gyvenanti nuodinga muse?', 'Cece'),
(555, 'Kokia salis didziausia pagal zmoniu skaiciu?', 'Kinija'),
(556, 'Wwe kowotojas , kuris gime KARIBUOSE ?', 'Carlito'),
(557, 'Kada saules musyje zemaiciu kunigaikscio Vykinto kariuomene sumuse kalavijuocius?', '1236'),
(558, 'Kada Mindaugas vainikuojamas Lietuvos karaliumi?', '1253-07-06'),
(559, 'Kada Gedimino laiskuose pirma karta paminetas Vilnius - Lietuvos sostine.', '1323'),
(560, 'Kada buvo pasirasyta kreves sutartis tarp Lietuvos ir Lenkijos valstybiu.', '1323'),
(561, 'Kada buvo Lietuvos kriksto pradzia?', '1387'),
(562, 'Kada vyko Zalgirio musis?', '1410-07-15'),
(563, 'Kada panaikinta baudziava', '1861'),
(564, 'Kada ivyko pirmasis Lietuvos ir Lenkijos valstybes padalijimas?', '1772'),
(565, 'Kada ivyko treciasis Lietuvos ir Lenkijos valstybes padalijimas?', '1795'),
(566, 'Kada ivyko sukilimas Lenkijoje ir Lietuvoje?', '1863-1864'),
(567, 'Kada buvo susauktas Didysis Vilniaus Seimas?', '1905'),
(568, 'Kada buvo isrinktas pirmasis Lietuvos prezidentas A. Smetona?', '1919'),
(569, 'Kada Lietuvos Respublika priimta i JTO (Jungtiniu Tautu Organizacija)?', '1991'),
(570, 'Kada buvo Antrasis pasaulinis karas?', '1939-1945'),
(571, 'Kada Klaipedos krastas  prijungtas prie Lietuvos?', '1923-01-15'),
(572, 'Rytu Timoro sostine.', 'Dilis'),
(573, 'Brunejaus sostine.', 'Bandar Seri Begavanas'),
(574, 'Koks cheminis elementas yra 4 periode ir VIIB grupeje?', 'Manganas'),
(575, 'Didelis pasaku herojus.', 'Milzinas'),
(576, 'Austrijos sostine', 'Viena'),
(577, 'Populiarus serialas - ........ begliai.', 'Kalejimo'),
(578, 'Kas tapo 2006 pasaulio futbolo cempionais', 'Italija'),
(579, 'Isdeliokit raides: a,d,t,a,a', 'Adata'),
(580, 'Populiariausias pasaulio multikas?', 'Simpsons'),
(581, 'Kada susidegino Romas Kalanta?', '1972'),
(582, 'Kada ikurtas vilnius?', '1323'),
(583, 'Kelintais metais Kolumbas atrado amerika?', '1492'),
(584, 'Kokios dujos neileidzia i zeme ultravioletiniu spinduliu?', 'Ozono'),
(585, 'Kada sugriuvo pasaulio dviniai dangoraziai?', '2001 10 11'),
(586, '2006 Eurovizijos laimetojas?', 'Lordi'),
(587, 'Automobilio porsche kurejo vardas?', 'Ferdinandas'),
(588, 'Antra planeta nuo saules', 'Venera'),
(589, 'Novergijos sostine', 'Oslas'),
(590, 'Svedijos sostine', 'Stokhomas'),
(591, 'Suomijos sostine', 'Helsinkis'),
(592, 'Gudijos sostine', 'Minskas'),
(593, 'Lenkijos sostine', 'Varsuva'),
(594, 'Olandijos sostine', 'Amsterdamas'),
(595, 'Belgijos sostine', 'Briuselis'),
(596, 'Ukrainos sostine', 'Kijevas'),
(597, 'Slovakijos sostine', 'Bratislava'),
(598, 'Ispanijos sostine', 'Madridas'),
(599, 'Maroko sostine', 'Rabatas'),
(600, 'Bosnijos ir Hercegovinos sostine', 'Sarejevas'),
(601, 'Serbijos ir Juodkalnijos sostine', 'Belgradas'),
(602, 'Makedonijos sostine', 'Skopje'),
(603, 'Bulgarijos sostine', 'Sofija'),
(604, 'Turkijos sostine', 'Ankara'),
(605, 'Sirijos sostine', 'Damaskas'),
(606, 'Armenijos sostine', 'Jerevanas'),
(607, 'Irano sostine', 'Teheranas'),
(608, 'Islandijos sostine', 'Reikjavikas'),
(609, 'Danijos sostine', 'Kopenhaga'),
(610, 'Airijos sostine', 'Dublinas'),
(611, 'Libano sostine', 'Beirutas'),
(612, 'Kipro sostine', 'Nikosija'),
(613, 'Kaip vadinasi ivairiu stiliu sumaisymas viename kurinyje?', 'Eklektika'),
(614, 'Kai galima uzrasyti du sweiki ir trisdesimt sesios simtosios', '2,36'),
(615, 'Kelintais metais mire stalinas?', '1953'),
(616, 'Dukterines Pioneer firmos gaminancios mp3 grotuvus pavadinimas', 'Mpio'),
(617, 'Kokia salis pirmoji europoje iteisino spaudos laisve', 'svedija'),
(618, 'Ankstyvojo paleolito urvai izraelyje', 'karmelis'),
(619, 'Ilgai neissisklaidantis tirstas dulkiantis rukas ramiojo vandenyno rytinese pakrantese (ekvadore, peru, cileje)', 'garua'),
(620, 'Krikscioniu baznycioje - sventa vieta su tam tikros formosstalu (lotmensa), prie kurio kunigas per pamaldas meldziasi ir aukoja misiuauka', 'altorius'),
(621, 'Zemes darbu masina su kauso pavidalo padargu, kuriuo ji grunto sluoksni nukasa, nuveza, iskrauna ir paskleidzia', 'skreperis'),
(622, 'Giliausia vieta zemeje', 'marianu iduba'),
(623, 'Latvijos piniginis vienetas', 'latas'),
(624, 'Iskalbingas zmogus', 'oratorius'),
(625, 'Sutepta drabuzio vieta', 'deme'),
(626, 'Indu dievai', 'devai'),
(627, 'Zmogaus sugebejimai ir igudziai naudojami gamyboje', 'darbas'),
(628, 'Senovinis istekejusiu rusiu galvos apdangalas, nesiotas sventadieniais', 'kokosnikas'),
(629, 'Garsa absorbuojanti medziaga - lengvos, dekoratyvios 30-45 mm ploksteles rievetu pavirsiumi is autoklavinio akytojo silikatbetonio', 'silakporas'),
(630, 'Ketvirtoji graiku abeceles raide', 'delta'),
(631, 'Vietove, esanti toli nuo sostines ar stambesniu centru', 'provincija'),
(632, 'Auksciausia karpatu virsukalne, esanti slovakijoje (2655 m)', 'gerlach'),
(633, 'Rankinis arba mechaninis suktuvas inkarams istraukti', 'braspilis'),
(634, 'Koks gyvunas krikscioniskajame mene simbolizuoja istverme ir paklusnuma', 'kupranugaris'),
(635, 'Kombinacinis loginis irenginys, konvertuojantis 2-aini koda i aktyvu signala isejime, kurio isejimo numeris yra 10-ainis kodas', 'dekoderis'),
(636, 'Baltarusijos sostine', 'minskas'),
(637, 'Valstybes ir pilieciu konfliktas, kurio padarinys yra senosios vyriausybes pasalinimas ir naujos sudarymas', 'revoliucija'),
(638, 'Sengraiku mitu heroje - spartos karaliaus tindarejo zmona, kuri buvo suviliota gulbinu pasivertusio dievo dzeuso', 'leda'),
(639, 'Kaip vadinosi pirmasis pasaulyje laivas lektuvnesis', 'hosio'),
(640, 'Apatine statinio dalis, paskirstanti statinio apkrova pagrindui', 'pamatas'),
(641, 'Kas parase veikala vytauto seimyna', 'jonynas'),
(642, 'Salis, kurios veliavoje yra daugiausia spalvu (sesiaspalve veliava)', 'par'),
(643, 'Zmogus, sergantis paralyziumi', 'paralitikas'),
(644, 'Didziosios britanijos politine veikeja, 1979-90 mministre pirmininke', 'tecer'),
(645, 'Lietuviu undines pavidalo juros deive', 'jurate'),
(646, 'Naturalaus kauciuko kaitinimas su siera', 'vulkanizavimas'),
(647, 'Kokios jungtinems tautoms priklausancios salies veliavos uzpakaline dalis skiriasi nuo priekines', 'paragvajaus'),
(648, 'Pozemine baznycios patalpa garbingiems asmenims laidoti', 'kripta'),
(649, 'Musulmonu dievas', 'alachas'),
(650, 'Atejau, pamaciau, nugalejau originalo kalba', 'veni vidi vici'),
(651, 'Mases ir pagreicio sandauga', 'jega'),
(652, 'Rusu kompozitorius, operu eugenijus onieginas, piku dama, jolanta ir kt., baletu gulbiu ezeras, miegancioji grazuole, spragtukas autorius', 'caikovskis'),
(653, 'Bendras igulos darbas laive', 'avralas'),
(654, 'Lietuviu dazu dievybe', 'meletele'),
(655, 'Valstybe (dabar neegzistuoja), kuriai klaipedos krastas priklause nuo xiii aiki 1919 metu', 'prusija'),
(656, 'Bulgarijos pinigas', 'levas'),
(657, 'Mandagus, derinantis savo veiksmus su nustatytomis mandagumo taisyklemis', 'korektiskas'),
(658, 'Liguistas tevynes ir praeities ilgesys', 'nostalgija'),
(659, 'Antigva ir barbuda pagrindinis pinigas', 'rytu karibu doleris'),
(660, 'Krikscioniu kulto aktas - misios drauge su komunijossakramentu', 'eucharistija'),
(661, 'Kokia kita placiai naudojama kalba [be arabu] eritrejoje', 'tigrinu'),
(662, 'Miestas, kuriame 1696mgime augustas iii - busimas lenkijos karalius ir lietuvos didis kunigaikstis', 'drezdenas'),
(663, 'Poeto ir publicisto jcerkaso slapyvardis', 'besparnis'),
(664, 'Rusu kompozitorius, opereciu laisvasis vejas, baltoji akacija, muzikos kinofilmams kurejas', 'dunajevskis'),
(665, 'Bemotore transporto priemone su dviem ratais', 'dviratis'),
(666, '28-a valstija, prijungta prie jav 29.12.1845 m., sostine austinas [liet.]', 'teksasas'),
(667, 'Vienetinis vektorius', 'ortas'),
(668, 'Pareigunas, tvarkantis apskaita', 'apskaitininkas'),
(669, 'Medis, is kurio virsunes senoves lietuviai darydavo akecias', 'egle'),
(670, 'Kataliku gedulo pamaldos', 'egzekvijos'),
(671, 'Sportine grupe pagal pajegumo klase', 'lyga'),
(672, 'Pescioji kariuomene, pestininkai', 'infanterija'),
(673, 'Medziaga dantims valyti', 'pasta'),
(674, 'Legendinis agentas 007: dzeimsas ...', 'bondas'),
(675, 'Upe, itekanti i rygos ilanka', 'dauguva'),
(676, 'Staciakampe skaiciu lentele', 'matrica'),
(677, 'Ilgiausias lietuvos miestas', 'neringa'),
(678, 'Zemynas, is kurio kilo bananas', 'azija'),
(679, 'Jupiterio palydovas, pavadintas ozkos, maitinusios dzeusa kretos urve, vardu', 'amalteja'),
(680, 'Zemiausia pasaulio valstybe, kurios 40% teritorijos yra zemiau juros lygio', 'olandija'),
(681, 'Gyvunas panasus i pele, bet su sparnais', 'siksnosparnis'),
(682, 'Prancuzu rasytojas naturalistas, sukures romanu serija rugonai-makarai', 'zola'),
(683, 'Zmogus, iprates vartoti opiju', 'opiofagas'),
(684, 'Artimiausias atstumas nuo sukimosi asies iki jegos veikimo linijos: jegos ...', 'petys'),
(685, 'Daugiausiai laikrasciu skaitanti ir daugiausiai portveino isgerianti tauta pasaulyje [europieciai]', 'belgai'),
(686, 'Labai sausas pietvakariu ir vakaru vejas', 'cinukas'),
(687, 'Suma, kuria nugaletoji valstybe pagal taikos sutarti priverciama sumoketi nugalejusiai valstybei', 'kontribucija'),
(688, 'Salis, kuriai 1780 mdidzioji britanija paskelbe kara, nes si tieke ginklus amerikos maistininkams', 'olandija'),
(689, 'Pasaulio, visuomenes kitimo procesas, raida', 'evoliucija'),
(690, 'Prietaisas vandens meginiams pasemti is reikiamo telkinio gylio', 'batometras'),
(691, 'Kas 1907 msukonstravo pirmaji dulkiu siurbli', 'spangeris'),
(692, 'Cheminiu reakciju, vykstanciu gyvame organizme, visuma', 'medziagu apykaita'),
(693, 'Vyriska minksta kepure su keturkampiu snapeliu', 'kepe'),
(694, 'Kaip vadinami senieji naujosios zelandijos gyventojai [dgs.]', 'maoriai'),
(695, 'Rimto, liudno turinio lyrikos zanras', 'elegija'),
(696, 'Koki zodi atitinka sulietuvinta lotyniska fraze maza mase', 'molekule'),
(697, 'Nuolat juokaujantis', 'juokdarys'),
(698, 'Vieta baznycioje prie kurios meldziamasi', 'altorius'),
(699, 'Varineja krauja', 'sirdis'),
(700, 'Kino filmo pastatymo ir realizavimo organizatorius', 'prodiuseris'),
(701, 'Kaip vadinamas naujametinis kaukiu balius', 'karnavalas'),
(702, 'Iskilmingas balius', 'puota'),
(703, 'Tikroves aiskinimas darant prielaida, kad egzistuoja du (idealus ir materialus) jos pradai', 'dualizmas'),
(704, 'Kompozicinis zeldynu elementas, kurio paskirtis - gelemispapildyti ir pagyvinti medziu bei krumu derinius, gazonus', 'gelynas'),
(705, 'Nervinio rezginio uzdegimas', 'pleksitas'),
(706, 'Pirmoji is sintetiniu dirbtiniu odu', 'korfamas'),
(707, 'Statinio metaliniai ar mediniai griauciai', 'karkasas'),
(708, 'Vienas taisyklinguju daugiasieniu, turinciu 4 trikampes sienas, 6 briaunas, 4 virsunes', 'tetraedras'),
(709, 'Kas krikscioniskoje daileje simbolizuoja nezinia, begalybe ir visa praryjancia praraja', 'jura'),
(710, 'Irenginys, salinantis is vandens dujas', 'deaeratorius'),
(711, 'Dailes ir architekturos elementas: rastas, sudarytas is vieno ar keliu ritmiskai pasikartojanciu geometriniu ar vaizdiniu figuru', 'ornamentas'),
(712, 'Managemen information systems', 'mis'),
(713, 'Seniausi ispanijos gyventojai', 'iberai'),
(714, 'Koks yra kedro vaisius', 'kankorezis'),
(715, 'Bevaliskumas, liguistas valios susilpnejimas ar jos netekimas', 'abulija'),
(716, 'Romenu mitologijoje - mirusiuju pasaulis, atitinkantis graiku hada', 'ditas'),
(717, 'Automobiliu gamintojas isleides siuos modelius: sonata, lantra', 'hyundai'),
(718, 'North atlantic treaty organization', 'nato'),
(719, 'Nuo iv avidkrikscioniskoje literaturoje pradetas vartoti terminas pirmyksciams tikejimams ir kultams apibudinti', 'pagonybe'),
(720, 'Daugiaase priekaba sunkiems, nedalomiems kroviniams vezti', 'treileris'),
(721, 'Tikroji lenino pavarde', 'uljanovas'),
(722, 'Nedidelis peilis su abipusiai astriais asmenimis kraujui leisti', 'lancetas'),
(723, 'Vokieciu kilmes amerikieciu raketu technikos inzinierius, vadovaves pirmuju skystu kuru varomu automatiskai valdomu raketu v-1 (fau-1) ir v-2 (fau-2) kurimui', 'braunas'),
(724, 'Evoliucine virusu forma-yra tik viruso genomas, bet nera virusiniu baltymu, pries kuriuos veikia organizmo antikunai', 'pseudovirusai'),
(725, 'Vandentiekio dalis, nutiesta ant atramu per kokia nors kliuti', 'akvedukas'),
(726, 'Kelintais metais ikurta lietuvos socialdemokratu partija', '1896'),
(727, 'Ka reiskia pc (lietuviskai)', 'asmeninis kompiuteris'),
(728, 'Senindu meiles meno pamokymu rinkinys, parasytas apie va.', 'kamasutra'),
(729, 'Xx apirmojo ketvircio rusu menininku judejimas, paskatintas staigios rusijos industrializacijos, stolypino reformos, 1905 mrevoliucijos ir vakaru europos meno naujoviu', 'konstruktyvizmas'),
(730, 'Mamontovo slapyvardis.', 'cloudmaker'),
(731, 'Kaip iki 1993 mbuvo vadinama europos sajunga', 'europos bendrija'),
(732, 'Neptuno palydovas, pavadintas vienos is nereidziu graiku juru dievo mylimosios, vardu', 'larisa'),
(733, 'Cheminis elementas, kurio simbolis ne [numeris 10]', 'neonas'),
(734, 'Liga, kuria sukelia eritrocituose parazituojantys plasmodium genties pirmuoniai', 'maliarija'),
(735, 'Dantenu uzdegimas', 'gingivitas'),
(736, 'Poetas, mitu ciklo metamorfozes, elegiju autorius', 'ovidijus'),
(737, 'Prietaisas masei nustatyti', 'svarstykles'),
(738, 'Musis tarp pretendentu i lietuvos dkunigaikscio sosta zygimanto kestutaicio ir svitrigailos kariuomeniu [1435 m.]', 'pabaisko'),
(739, 'Klavisai f1-f12', 'funkciniai'),
(740, 'Standi auksta silkine vyriska skrybele, ritinio pavidalo, su ploksciu virsumi ir neplaciais krastais', 'cilindras'),
(741, 'Istekejusi moteris senoves romoje', 'matrona'),
(742, 'Mokslas, tyrinejantis organizmu gemalu vystymasi', 'embriologija'),
(743, 'Kiek kiseniu yra biliardo stale', '6'),
(744, 'Bite gsm pokalbiu papildymo kortele', 'labas'),
(745, 'Karo prievolininkai, kurie gali buti pasaukti karinems pratyboms arba paskelbus kara', 'rezervas'),
(746, 'Islamo pranasas', 'mazaideju_pagrindine_informacija_4hj7sd4vtas'),
(747, 'Xx a5-ojo ir 6-ojo desimtmecio amerikieciu kino zvaigzdes hbogarto pravarde', 'baidykle'),
(748, 'Pramonine sunkioji pramone', 'industrija'),
(749, 'Priimamasis elektroninis vamzdelis, naudojamas televizoriuje vaizdui atgaminti', 'kineskopas'),
(750, 'Australijos aborigenu kulto reikmuo is plokscio ornamentuoto medzio gabalo arba akmens', 'curinga'),
(751, 'Senoves indu sventyklos didysis bokstas', 'sikara'),
(752, 'Kas pirmasis pavartojo termina abstrakcionizmas (dailes kryptis)', 'sikara'),
(753, 'Metamo arba i krepsi lekiancio kamuolio numusimas, leidziamas taisykliu', 'blokavimas'),
(754, 'Asmens ar daikto vardas, pagal kuri kas nors pavadinama', 'eponimas'),
(755, 'Vienintelis zemynas, kuris neturi nuolatiniu gyventoju', 'antarktida'),
(756, 'Senoves graiku puciamasis muzikos instrumentas, padarytas is ivairaus ilgio storakociu nendriu vamzdeliu', 'siringe'),
(757, 'Pirmoji lytines reakcijos faze [vnskilm.]', 'jaudinimo'),
(758, 'Neregima', 'nematoma'),
(759, 'Mokslas apie zvaigzdes ir kitusdangaus kunus', 'astronomija'),
(760, 'Afganistano administracinis teritorinis vienetas', 'provincija'),
(761, 'Grinvico laikas', 'gmt'),
(762, 'Grupe, sujungtu gyvenvieciu, turinciuglaudzius ukio, darbo, kulturos ir buities rysius', 'aglomeracija'),
(763, 'Trys romenu grozio ir grakstumo deives', 'gracijos'),
(764, 'Save apsirupinanti, uzdara ekonomika', 'autarkija'),
(765, 'Vaidmuo arba ...', 'role'),
(766, 'Kompleksine mokslo saka, tirianti rytusaliu gamta, ekonomika, istorija, rytu tautu buiti, kalbas, literatura, mena,religija, filosofija', 'orientalistika'),
(767, 'Krikscioniu liturginis indas', 'kielikas'),
(768, 'Lazdynu peledos slapyvardziupasirasinejo seserys sofija psibiliauskiene ir marija ...', 'lastauskiene'),
(769, 'Vienos valstybes pastangos isplestisavo ekonomine ir politine galia i kitas valstybes, nesiskaitant su juinteresais', 'imperializmas'),
(770, 'Neruges alus', 'misa'),
(771, 'Tam tikras objektu panasumas, kuriuoremiamasi pazintineje veikloje', 'analogija'),
(772, 'Susitarimas tuoktis', 'suzadetuves'),
(773, 'Kas parase veikala istorija', 'herodotas'),
(774, 'Indeniskas genties juodosios pedospavadinimas', 'siksikai'),
(775, 'Minksta dirbtine oda isnitroceliuliozine kompozicija padengto audeklo', 'dermatinas'),
(776, 'Kareivis, savavaliskai pasitraukes istarnybos', 'dezertyras'),
(777, 'Salis, siuolaikinio bokso tevyne', 'anglija'),
(778, 'Bolivijos sostine', 'la pasas'),
(779, 'Karinis dalinys transportui,belaisviams, suimtiesiems saugoti ir lydeti', 'konvojus'),
(780, 'Zemynas, is kurio kilo slyva', 'azija'),
(781, 'Sventoji, neturto seseru - klarisiuvienuoliu ordino ikureja', 'klara'),
(782, 'Biologiniai katalizatoriai', 'fermentai'),
(783, 'Guoliu tipas pagal apkrova [dgs.]', 'radialiniai'),
(784, 'Religine apeiga - tikras arbasimboliskas kuno, jo daliu, liturginiu reikmenu apiplovimas', 'abliucija'),
(785, 'Istorine sritis gango zemupio baseineir gango bei bramaputros deltoje', 'bengalija'),
(786, 'Salies vekselio kurso reguliavimas,kuri atlieka valstybe ar centrinis bankas, bei savo valiutos kuros reguliavimasperkant ar parduodant devizas', 'devizu politika'),
(787, 'Lygi arba profiliuota medine juostelepaveikslu remams, lubu ir sienu puosybai', 'bagetas'),
(788, 'Sibiro pusis', 'kedras'),
(789, 'Keliu aukstu namui prilygsta cheopsopiramide', '50'),
(790, 'Sumazejusi raumenu jega', 'hipodinamija'),
(791, 'Sudaiginti mieziu, rugiu ar kitu javugrudai', 'salyklas'),
(792, 'Laikinas cheminio elemento, kuriosimbolis uuq [numeris 114] pavadinimas', 'ununkvadis'),
(793, 'Daugiaserijinis tv filmas', 'serialas'),
(794, 'Dydis, apibudinantis orbitoselipsiskuma, lygus atstumo tarp elipses centro ir jos zidinio santykiui sudidziuoju elipses pusasiu', 'ekscentricitetas'),
(795, 'Anglu fizikas ir chemikas, pirma kartaisskyres vandenili ir irodes, kad jo degimo produktas yra vanduo', 'kavendisas'),
(796, 'Elektros sroves saltinio neigiamaspolius', 'anodas'),
(797, 'Automobiliu gamintojas isleides siuosmodelius: c3, c5, berlingo', 'citroen'),
(798, 'Charakterio tipas, kuriam budingapolinkis i emocinio ir intelektualinio gyvenimo atotruki, uzdarumas, nekalbumas,itarumas, nepasitikejimas', 'sizoidas'),
(799, 'Musulmonu tikybos ispazinimas,isreiskiamas formule: nera kito dievo, isskyrus alacha, ir jo pranasas yramazaideju_pagrindine_informacija_4hj7sd4vtas', 'sahada'),
(800, 'Sprogstamoji medziaga, susidedanti isamonio nitrato, dinitrobenzolo ir natrio chlorido', 'abelitas'),
(801, 'Pikta pasaipa, astri ironija', 'sarkazmas'),
(802, 'Nervo uzdegimas', 'neuritas'),
(803, 'Salis, kurioje surengtas pirmasispasaulio krepsinio veteranu vyru cempionatas', 'argentina'),
(804, 'Atsigaminantis lasteles branduoliostrukturinis elementas, turintis dnr, kuriuose yra genetine informacija', 'chromosoma'),
(805, 'Kiek kvadratiniu metru yra dvejuosehektaruose', '20000'),
(806, 'Zmogus, negeriantis svaigiuju gerimuir propaguojantis blaivybe', 'blaivininkas'),
(807, 'Ilgiausia storosios zarnos dalis', 'gabtine zarna'),
(808, 'Javu pjovimo metas', 'javapjute'),
(809, 'Klausimu ar reiskiniu sritis, su kuriakas nors gerai susipazines', 'kompetencija'),
(810, 'Isipareigojimas ispirkti ikeistavekseli', 'reversas'),
(811, 'Australijos aborigenu kulto reikmuo isplokscio ornamentuoto medzio gabalo arba akmens', 'curinga'),
(812, 'Oficiali kalba kabo verdesrespublikoje', 'portugalu'),
(813, 'Misle: mazas berniukas, astrus jokirvukas', 'bite'),
(814, 'Pagrindine augalu lasteliu sieneliuatramine medziaga, polisacharidas', 'celiulioze'),
(815, 'Branduolineje technikoje - itaisasradioaktyviosioms medziagoms laikyti ir transportuoti', 'konteineris'),
(816, 'Gerai zinomas kalnas prie nemuno, antkurio stovejo garsi pagoniu sventykla', 'rambynas'),
(817, 'Specialus architekturos ar daileskuriniu apdorojimas, stabdantis ardanciu veiksniu poveiki, fiksuojantis esamabukle', 'konservavimas'),
(818, 'Sirdies raumens uzdegimas', 'miokarditas'),
(819, 'Gyvo organizmo organu ir sistemupakeitimas nasesniais ir patvaresniais dirbtiniais itaisais', 'kiborgizacija'),
(820, 'Gambijos smulkus pinigas', 'bututas'),
(821, 'Vienas svarbiausiu induizmo, budizmoir dzainizmo doktrinu elementu', 'samsara'),
(822, 'Universaliausias ivairiu procesu irjudejimo rusiu matas', 'energija'),
(823, 'Brutualus holivudo filmu herojus, kurisuvaidino sstalone', 'rembo'),
(824, 'Ka reiskia irc angliskai', 'internet relay chat'),
(825, 'Viduramziu europos laisvuju miestuaristokratas', 'patricijus'),
(826, 'Garsi aktore, daininke, modelis isukrainos, vaidinusi filme penktas elementas', 'jovovich'),
(827, 'Sengraiku mitologijoje - paklydimo,proto uztemimo deive, dzeuso dukra, kuria sis supykes nusviede zemen', 'ata'),
(828, 'Is varles padeto vandenyje kiausinioissiritusi lerva', 'buozgalvis'),
(829, 'Asmenu arba organizacijususivienijimas, sajunga bendrai ukinei, politinei, kulturinei, sportinei arkitai veiklai', 'asociacija'),
(830, 'Kas buvo aleksandro didziojo mokytojas', 'aristotelis'),
(831, 'Motvardas, kiles is lotkalbos,reiskia palaiminga', 'beata'),
(832, 'Megejas pamokslauti, skelbti grieztadorovinguma', 'moralistas'),
(833, '14 eiluciu eilerastis, sudarytas is 2ketureiliu su 2 rimais ir 2 trieiliu (italu ir prancuzu sonetas) arba is 3ketureiliu ir 1 dvieilio (anglu sonetas)', 'sonetas'),
(834, 'Kojos dalis, esanti tarp kelio irciurnos', 'blauzda'),
(835, 'Arterijos issipletimas', 'aneurizma'),
(836, 'Laisva anglis, issiskirsciusi metalomaseje', 'grafitas'),
(837, 'Duju sluoksnis aplink planeta', 'atmosfera'),
(838, 'Skystis, liekantis is pieno gaminantvarske', 'isrugos'),
(839, 'Indu filosofijos sistema', 'joga'),
(840, 'Burlaivio laivavirviu ir lynubendrinis pavadinimas', 'takelazas'),
(841, 'Nedideles apimties prozos kurinys,kurio veiksmas glaustas, o pradzia ir pabaiga labai isryskinta', 'novele'),
(842, 'Centneris kitaip', 'kvintalas'),
(843, 'Dainininke patricia ..', 'kaas'),
(844, 'Psichikos ligos simptomas - ligonispriesinasi paliepimams arba ju nevykdo', 'negatyvizmas'),
(845, 'Nedideles spirokliuojancios znyples', 'pincetas'),
(846, 'Telekomunikaciju kompanija, pagaminusimobiliu telefonu modelius: v66, v50, a6188, t180', 'motorola'),
(847, 'Kamuolys adatoms subesti', 'adatine'),
(848, 'Sukastas zemes ruozas', 'sankasa'),
(849, 'Asmuo, esantis kelyje ne transportopriemoneje, taip pat vaziuojantis bemotoriu invalidu vezimeliu, vedantisdvirati, mopeda, motocikla, traukiantis (stumiantis) rogutes, vaikiska ar kitokivezimeli', 'pestysis'),
(850, 'Baranka lietuviskai', 'riestainis'),
(851, 'Cheminis elementas, kurio simbolisni [numeris 28]', 'nikelis'),
(852, 'Sunkus silkinis audinys su iaustaisaukso ir sidabro siulais', 'brokatas'),
(853, 'Namine dzuko degtine', 'samane'),
(854, 'Salis, kurios domeno vardas yra .mm', 'mianmaras'),
(855, 'Salis, kurioje 1720 mikurtasseniausias pasaulyje jachtu klubas royal cork yacht club', 'airija'),
(856, 'Tam tikro vandens baseino karo laivujunginys', 'flotile'),
(857, 'Cheminis elementas, kurio pavadinimaskilo is vokisko zodzio, reiskiancio piktaja dvasia, goblina (naminuka)', 'kobaltas'),
(858, 'Mokslas, tiriantis gyvunu rusiupaplitima zemeje', 'zoogeografija'),
(859, 'Menines raiskos priemone, zodispavartotas perkeltinie reiksme, remiantis daiktu, veiksmu isoriniu panasumu', 'metafora'),
(860, 'Lietuviu kompozitorius, pianistas,dirigentas, operos dalia, simfoniniu kuriniu, muzikos spektakliams irkinofilmams autorius', 'dvarionas'),
(861, 'Baigiamasis maldos zodis', 'amen'),
(862, 'Sirupas, liekantis iskristalinuscukriniu runkeliu cukru', 'melasa'),
(863, 'Pirmasis lietuvos padalijimas', '1772'),
(864, 'Stambi apgavyste, nesaziningas,apgavikiskas darbas', 'afera'),
(865, 'Vokieciu operos klasikas,skrajojancio olando autorius', 'vagneris'),
(866, 'Puosnus stogelis, per iskilmingaseisenas nesamas virs dvasininko, valdovo', 'baldakimas'),
(867, 'Telekomunikaciju kompanija, pagaminusimobiliu telefonu modelius: 3510i, 6610, 3610, 9210i communicator', 'nokia'),
(868, 'Apskritas dvipusis popieziausantspaudas, kurio averse - popieziaus vardas, o reverse - apastalu petro irpauliaus atvaizdai', 'bule'),
(869, 'Maziausias skaitmeninio vaizdoelementas', 'pikselis'),
(870, 'Pulinis uzdegimas, apimantis apie vokokrasto riebalu liauka bei aplinkinius audinius', 'miezis'),
(871, 'Duju skraiste, kuri gaubia prie saulesartejancios ar nuo saules tolstancios kometos branduoli', 'koma'),
(872, 'Prancuzu kompozitorius, operukarmen, perlu ieskotojai, ivanas rustusis, opereciu, 2 simfoniju autorius', 'bize'),
(873, 'Krikscionybes tradicijoje sujungimo,sasajos simbolis', 'mazgas'),
(874, 'Koki didziausia greiti yra pasiekesf-1 bolidas km/h', '367'),
(875, 'Kauline plokstele kelio sanariosrityje', 'girnele');
INSERT INTO `vikte_klsm` (`id`, `klsm`, `ats`) VALUES
(876, 'Nevalgomas grybas is isvaizdos labaiprimenantis baravyka-paazuoli, bet minkstimas perlauzus gryba is pradziuparausta, o paskui pamelynuoja', 'setonbaravykis'),
(877, 'Aktore atlikusi pagrindinius vaidmenisfilmuose esminis instinktas, specialistas, kazino ir kt.: sharon ...[orig.]', 'stone'),
(878, 'Didelis turkijos miestas, kuris yra ireuropoje, ir azijoje', 'stambulas'),
(879, 'Geografine zona, kurios teritorija yraislandijoje, skandinavijos siaureje, rusijos lygumu siaureje', 'tundra'),
(880, 'Periodine spauda, leidiniai, einantystam tikrais laiko tarpais, tauo paciu pavadinimu', 'periodika'),
(881, 'Sachmatuose kai karaliui nera sacho irneturi kur eiti', 'patas'),
(882, 'Kelintais metais iteikti pirmiejiemmy apdovanojimai', '1949'),
(883, 'Cheminis elementas, kurio simbolissc [numeris 21]', 'skandis'),
(884, 'Automobiliu gamintojas isleides siuosmodelius: xsara, xantia', 'citroen'),
(885, 'Mineralu ar organiniu medziagukaupimasis zemes pavirsiuje; formuoja vulkanines ir nuosedines uolienas, reljefa', 'akumuliacija'),
(886, 'Vilniaus generalgubernatorius1798-1799 metais', 'lasis'),
(887, 'Saskaitybos tvarka, kai apskaitosregistruose ukines operacijos irasomos padarymo diena arba apskaitos darbaiatliekami pagal grafika', 'azuras'),
(888, 'Medziaga, gauta dviem ar daugiauelementu susijungus chemines reakcijos metu', 'junginys'),
(889, 'Pirmasis garso irasymo ir atkurimoaparatas, kuri sukonstravo t.aedisonas 1878 m.', 'fonografas'),
(890, 'Kelintais metais anglijos parlamentepriimtas istatymas, draudziantis kolonistams keltis i vakarus', '1763'),
(891, 'Kaip vadinama ziedo piesteles dalis,ant kurios turi buti pernestos ziedadulkes', 'purka'),
(892, 'Estetiskai aktualizuotu eiliuotoskalbos garsu sistema', 'fonika'),
(893, 'Rasytojas, romanu vakaru fronte niekonaujo, juodasis obeliskas, trys draugai, mylek savo artima, triumfoarka, kelias atgal autorius (liet.)', 'remarkas'),
(894, 'Po zeme augantys grybai, kuriu ieskospecialiai dresuotos kiaules', 'trumai'),
(895, 'Legendinis iv akrikscioniuatsiskyrelis, 60 metu praleides vienas egipto dykumoje', 'anupras'),
(896, 'Platus griovys salia pylimo vandeniuinuleisti', 'rezervas'),
(897, 'Karo prietaisas, naudotas viduramziaisprieso pilies sienu, vartu griovimui', 'taranas'),
(898, 'Xvi - xviiiaindenu isnaudojimoforma, vadinama globa', 'enkomjenda'),
(899, 'Charakterio budas, kuriam budinganepagristai liudna nuotaika', 'melancholija'),
(900, 'Grozines literaturos elementupanaudojimas dokumentinio pobudzio kuriniuose', 'beletrizacija'),
(901, '1830-1831 metu sukilimo lietuvojevadas', 'gelgaudas'),
(902, 'Sala, prie kurios aptikta didziausiapasaulinio vandenyno gelme', 'mindanao'),
(903, 'Japonijos imperatorius po 700 metuizoliacijos atveres japonija vakarams', 'meidzi'),
(904, 'Keturi pagrindiniai arbatos gerimoceremonijos principai: harmonija, pagarba, svara ir ...', 'tyla'),
(905, 'Gero gyvenimo, geru laiku pavadinimas:aukso ...', 'amzius'),
(906, 'Oficialus ko nors apziurejimas arpatikrinimas', 'apziura'),
(907, 'Siuolaikine issivysciusiu pasauliosaliu kultura', 'civilizacija'),
(908, 'Sachmatu padetis, kai partija laikomapasibaigusia lygiosiomis', 'patas'),
(909, 'Senoves romoje - nubalinta medziolenta, kurioje buvo skelbiami zyniu, senato ir kitu valdzios institucijupranesimai bei ju nariu sarasai', 'albas'),
(910, 'Kalvagubris, sudarytas is ledynosanasu', 'ozas'),
(911, 'Zodis, pavartotas perkeltine prasmeremiantis daiktu rysiu', 'metonimija'),
(912, 'Prietaisas vidaus organu sukeliamiemsgarsams klausyti', 'stetoskopas'),
(913, 'Islame - karalius, bandes pakartotiroju', 'sadadas'),
(914, 'Aukstos kokybes dvisluoknis vilnonisaudinys', 'drapas'),
(915, 'Visu muzikinio kurinio partiturojenumatytu atlikeju grojimas ir dainavimas', 'tutti'),
(916, 'Kurinio ritmo nesutapimas su metrokirciu', 'sinkope'),
(917, 'Maza pusapvale kepuraite, kuria antvirsugalvio devi kataliku baznycios aukstieji dvasininkai', 'pijuse'),
(918, 'Nesarvuotas karo laivas zvalgybai,eskadros apsaugai', 'fregata'),
(919, 'Giliausia atlanto vandenyno vieta(~8,6km): ....duburys', 'puertoriko'),
(920, 'Svazilendo administracinis vienetas', 'rajonas'),
(921, 'Romenu rasytojas, istorikas, paraseskurinius istorija, germanija', 'tacitas'),
(922, 'Kas yra kubos atradejas [1492 m.]', 'kolumbas'),
(923, 'Miestas, kuri dievas jahve sunaikinougnimi', 'sodoma'),
(924, 'Garsus italijos dainininkas, aktorius', 'celentanas'),
(925, 'Liga - apetito nebuvimas', 'anoreksija'),
(926, 'Dovana, skirta kam nors suselpti', 'auka'),
(927, 'Dvikovos sporto saka - dviejusportininku kova, stengiantis sportiniu ginklu (rapyros, spagos, kardo) duriaisarba kirciais pasiekti vienas kita', 'fechtavimasis'),
(928, 'Sirdipleves uzdegimas', 'perikarditas'),
(929, 'Apatinis apsauginis drobes sluoksnis', 'gruntas'),
(930, 'Koks kinu filosofas buvo svarbiausiaskonfucijaus pasekejas', 'mencijus'),
(931, 'Kaip vadinamas periodas japonijojetrukes nuo 300 iki 710 metu', 'yamato'),
(932, 'Muitines duotas pazymejimas, kadmuitas grazintas', 'debentura'),
(933, 'Protestantu sektos, skelbianciosgreita antraji kristaus atejima [dgs.]', 'adventistai'),
(934, 'Neurozes forma, nuotaikos nepastovumas', 'isterija'),
(935, 'Dokumentas, suteikiantis teise verstiskokiu nors verslu', 'patentas'),
(936, 'Asmuo, uzgrobes valdzia arbapasisavines svetimas teises', 'uzurpatorius'),
(937, 'Stambiausias lietuvos ir europosvabalas: paprastasis ...', 'elniaragis'),
(938, 'Ar portugalijoje koridos metu buliusyra nuduriamas', 'ne'),
(939, '1900 mvasaros olimpiniu zaidyniusostine', 'paryzius'),
(940, 'Seniausias australijos miestas', 'sidnejus'),
(941, 'Surangytas itaisas vonioje,ranksluosciams dziovinti', 'gyvatukas'),
(942, 'Kauno sirdis', 'laisves aleja'),
(943, 'Trumpas popieziaus rastas antraeiliaisbaznycios administracijos ar religijos klausimais', 'breve'),
(944, 'Religine paziura, kad tikejimas yrapranasesnis, svarbesnis uz zinojima, moksla', 'fideizmas'),
(945, 'Ka reiskia cd angliskai', 'compactdisc'),
(946, 'Vitaminu trukumas', 'avitaminoze'),
(947, 'Pokosto, lako, sikatyvo, terpentino,pemzos ir pigmento misinys mediniams pasvirsiams glaistyti', 'mastika'),
(948, 'Literaturos kurinys, kuriame autoriuspasakoja praeities ivykius, kuriu dalyviu ar stebetoju yra buves', 'memuarai'),
(949, 'Netiketas ivykis, pranesimas,sukeliantis dideli susidomejima', 'sensacija'),
(950, 'Kas parase mazasias moteris', 'alkot'),
(951, 'Su kuria valstybe lietuva turiilgiausia siena', 'baltarusija'),
(952, 'Sultono, sacho isakas', 'firmanas'),
(953, 'Kalnas graikijoje, kur, pasak mito,buvusi graiku dievu buveine; cia gyveno 12 svarbiausiu dievu, valdomu dzeuso', 'olimpas'),
(954, 'Kas suformulavo lasteles teorija', 'svanas'),
(955, 'Saules laikrodzio strypas, kuriometamas ant ciferblato seselis rodo laika', 'gnomonas'),
(956, 'Renkamojo organo papildymas paciu jonariu nutarimu, be papildomu rinkimu', 'kooptacija'),
(957, 'Medzio pavirsiaus inkrustacijadramblio kaulu, perlamutru ir vezlio kiautu', 'marketerija'),
(958, 'Kokiame vandenyne yra viktorijos sala', 'arkties'),
(959, 'Koks miestelis isikures prie anciosezero', 'veisiejai'),
(960, 'Lytinis gyvenimas', 'seksas'),
(961, 'Zenklas, uzsifruojantis reiskinioprasme', 'simbolis'),
(962, 'Sprogstamosios medziagos pripildytastatine su laikrodiniu mechanizmu, kuri galima nustatyti taip, kad sukeltusprogima tam tikrame gylyje', 'gilumine bomba'),
(963, 'Dvi tieses, kurios yra vienojeplokstumoje ir nesusikerta, vadinamos', 'lygiagreciomis'),
(964, 'Senovinis moteriskas galvospapuosalas, dedamas ant plauku arba galvos apdangalo', 'apgalvis'),
(965, 'Artilerijos pabuklo taikymo optinisitaisas', 'panorama'),
(966, 'Teoremos drauge', 'lema'),
(967, 'Ilgiausia upe airijoje', 'sanonas'),
(968, 'Antrasis lietuvos ir lenkijospadalijimas', '1793'),
(969, 'Mazi periodiniai zemes sukimosi asiesvirpesiai, svyravimai', 'nutacija'),
(970, 'Ilgiausias lietuvos kaimo pavadinimas', 'virbalio miesto laukai'),
(971, 'Liudno pobudzio muzikos kurinys', 'elegija'),
(972, 'Tam tikras ribotas sausumos, vidausarba priekrantes vandens plotas kartu su oro erdve virs to ploto', 'teritorija'),
(973, 'Architekturos datale; profiliuotasakmens blokas ant sienos arba kolonos kapitelio arkai atremti', 'impostas'),
(974, 'Senoves egipto sostine valdant hiksams', 'avaris'),
(975, 'Pataisymas arba ...', 'pataisa'),
(976, 'I peledike panasus paukstis; nuopastarosios skiriasi tik tuo, kad jos kojos iki pirstu galu yra apaugusiosplunksnomis', 'lutute'),
(977, 'Suolas baznycioje atsiklaupti aratsisesti', 'klauptas'),
(978, 'Didziausias pietu amerikos miestas', 'san paulas'),
(979, 'Apvali anga technologiniam procesuiuzdaroje erdveje stebeti, taip pat kam nors ipilti, iberti, patraukti', 'akute'),
(980, 'Dratas lietuviskai', 'viela'),
(981, 'Kas pasake tebunie sviesa', 'dievas'),
(982, 'Romenu mitologijoje - karo dievas', 'marsas'),
(983, 'Deives atenes sventykla', 'partenonas'),
(984, 'Ginklu, saudmenu, strateginiu medziaguskolinimas ir nuomojimas antifasistines koalicijos salims pagal jav 1941 m.istatyma', 'lendlizas'),
(985, 'Sovietu sajungos emblema nuo 1923 iki1991 m., simbolizuojanti nasu darba pramoneje ir zemes ukyje: ..ir kujis', 'pjautuvas'),
(986, 'Temperamento tipas, kuriam budingosgreitai kintancios psichines busenos, energingumas, jautrumas', 'sangvinikas'),
(987, 'Kas nusako vandenilio jonukoncentracija tirpale', 'ph'),
(988, 'Sovietinis turtingesnio ukininkopavadinimas', 'buoze'),
(989, 'Kiek inkaru turi kreiseris aurora', '7'),
(990, 'Kokiai kompanijai priklauso zymiejimalaizijos bokstai dvyniai', 'petronas'),
(991, 'Lietuvos didysis kunigaikstis valdesnuo 1764miki 1795m.: stanislovas augustas ...', 'poniatovskis'),
(992, 'Didele lietuvos upe, tekanti perukmerge', 'sventoji'),
(993, 'Vienkartinis mokestis vyskupui, veliaupopieziui, kuri pirmaisiais darbo metais mokedavo dvasininkai', 'anatos'),
(994, 'Sakykla meceteje', 'minbaras'),
(995, 'Kokiais skaiciais prasidedasveicarijos bruksninis prekinis kodas', '76'),
(996, 'Gyvuliu ganymas nakti', 'naktigone'),
(997, 'Kas 1785 misrado audimo stakles', 'kartraitas'),
(998, 'Xvi apabaigos xvii apradziosolandu teisininkas, sociologas, diplomatas, vienas is prigimtines teisesteorijos ir tarptautines teises mokslo kureju', 'grocijus'),
(999, 'Kiek cilindru turi dyzelinislokomotyvo m62 variklis', '12'),
(1000, 'Asigalis', 'polius'),
(1001, 'Senoves graiku trys likimo deives', 'moiros'),
(1002, 'Lauziamoji geba tokio lesio, kuriopagrindinio zidinio nuotolis 1 m.', 'dioptrija'),
(1003, 'Negyvu augalu arba gyvunu liekana,suakmenejusi per milijonus metu', 'fosilija'),
(1004, 'Gimusiu 05.22 - 06.21dzodiakozenklas', 'dvyniai'),
(1005, 'Adaptacija arba......', 'prisitaikymas'),
(1006, 'Knygos mano kova autorius, parasesja sededamas kalejime', 'hitleris'),
(1007, 'Moteris, pirmoji gavusi dvi nobeliopremijas', 'kiuri'),
(1008, 'Salis, 1990 mpasaulio futbolocempionato nugaletoja', 'vokietija'),
(1009, 'Raudonai rudos spalvos piestukas beapdaro is kaolino ir gelezies oksidu', 'sangvinas'),
(1010, 'Didelio karo laivu junginio vadas', 'flagmanas'),
(1011, 'Individualus istaikingas vienabutisgyvenamasis namas su zemes sklypu', 'kotedzas'),
(1012, 'Saskaita su prekiu aprasymu', 'faktura'),
(1013, 'Automobiliu gamintojas isleides siuosmodelius:puma, probe, galaxy', 'ford'),
(1014, 'Lietuvos ir lenkijos paprotines teisesbausme smeizikams', 'atlojimas'),
(1015, 'Stambus, dazniausiai penkiabalsiskurinys chorui a cappella', 'madrigalas'),
(1016, 'Bokso aikstele, aptverta itemptomisvirvelemis', 'ringas'),
(1017, 'Skaniai kvepiantis kosmetinis skystis', 'kvepalai'),
(1018, 'Parengiamieji konturiniai studijiniopiesinio arba tapybos kompozicijos apmatai [vns.]', 'abrisas'),
(1019, 'Artificiozines literaturos rusis,eiliuotas kurinys su vidiniais rimais kiekvienoje arba kas antroje eiluteje', 'echo'),
(1020, '3-a labiausiai urbanizuota pasauliosalis (100% miesto gyv.)', 'vatikanas'),
(1021, 'Apdeges daiktas', 'degesis'),
(1022, 'Nuo iv avidkrikscioniskojeliteraturoje pradetas vartoti terminas pirmyksciams tikejimams ir kultamsapibudinti', 'pagonybe'),
(1023, 'Kokiu vardu geriau zinomas senovesromos imperatorius markas aurelijus antoninas', 'karakala'),
(1024, 'Klostytas dekoratyvinis audinys,vartojamas interjerui puosti', 'draperija'),
(1025, 'Pinta, austa ar megzta juostele,kaspinas ar raistis is medvilniniu, dirbtino arba naturalaus silko verpalu suipintais metaliniais siulais', 'galionas'),
(1026, 'Kaip vadinama auksciausia italijosfutbolo lyga', 'serie a'),
(1027, 'Matematikoje taip zymima riba', 'lim'),
(1028, 'Visuomeniniu rysiu susilpnejimas delmoraliniu vertybiu, elgesio normu suirimo, tradicines tautines kulturos formunykimo', 'anomija'),
(1029, 'Induizme - sugebejimas darytistebuklus, patys stebuklai, nesuvokiama jega', 'maja'),
(1030, 'Latvijos administracinis vienetas', 'rajonas'),
(1031, 'Zemes pavirsiaus nuotraukos darymo iratvaizdavimo planuose bei zemelapiuose metodu visuma', 'topografija'),
(1032, 'Bukietas lietuviskai', 'puokste'),
(1033, 'Cheminis elementas, kurio pavadinimaskilo is lotynisko zodzio, reiskiancio magnetas', 'manganas'),
(1034, 'Buves dbritanijos ministraspirmininkas, 1953 mnobelio literaturos premijos laureatas', 'cercilis'),
(1035, 'Kas 1893 matrado pirmaja anaerobinebakterija, laisvai dirvozemyje gyvenancia azoto fiksatoriu lazdeles pavidalu', 'vinogradskis'),
(1036, 'Svedijos karalius, iki savo mirties1632 msvedija pavertes galingiausia valstybe europoje', 'gustavas 2'),
(1037, 'Lietuviu skulptoriusjo statytipaminklai zuvusiems ties sirvintomis kariams, nepriklausomybes rokiskyje irzuvusiems uz nepriklausomybe birzuose, egle zalciu karaliene palangosbotanikos parke', 'antinis'),
(1038, 'Xix aeuropoje susiformavusinacionalistine doktrina, kurios tikslas buvo suvienyti visus musulmoniskuskrastus', 'panislamizmas'),
(1039, 'Kas parase lietuviu tautos istorija', 'narbutas'),
(1040, 'Krikscioniu baznycios dalis, kuriojeyra didysis altorius', 'presbiterija'),
(1041, 'Lietuviu lakunas, 1933 09 22 sekmingaiperskrides atlanto vandenyna', 'vaitkus'),
(1042, 'Taisyklingos strukturos muras isvienodu staciakampiu tasytu akmenu', 'izodomas'),
(1043, 'Infekcine liga, kuria kuria sergantapnuodijamas organizmas, pazeidziami plauciai ir nervu sistema', 'ornitoze'),
(1044, 'Zodziu, junginiu ar sakiniukartojimas, siekiant anodinio poveikio', 'refrenas'),
(1045, 'Xviiavidurio religinis socialinisjudejimas rusu valstybeje', 'atskala'),
(1046, 'Toliausiai nuo lietuvos nutolusisostine [vilniaus atzvilgiu]', 'velingtonas'),
(1047, 'Futbolo klubas is romos, 2000 mtapesitalijos cempionu', 'lazio'),
(1048, 'Architekturos arba skulpturos kurinys,kuriuo pagerbiamas svarbus asmuo, ivykis, ideja', 'paminklas'),
(1049, 'Mokslo saka nagrinejanti vidaus iruzsienio poltika', 'politologija'),
(1050, '1990-1991 mnba naujoku birzoje 1numeriu pasauktas zaidejas', 'coleman'),
(1051, 'Posakis: silpniausia, pazeidziamavieta', 'achilokulnas'),
(1052, 'Svedijos karalius, iki savo mirties 1632 msvedija pavertes galingiausia valstybe europoje', 'gustavas ii'),
(1053, 'Dailes kurinys vaizduojantis jura', 'marina'),
(1054, 'Prostitutes sefas', 'suteneris'),
(1055, 'Tam tikras valstybinio uz ypatingusnuopelnus zenklas', 'ordinas'),
(1056, 'Xix aanglu fizikas, siuolaikineselektrodinamikos bei kinetines duju teorijos pradininkas', 'maksvelis'),
(1057, 'Japoniska vysnia', 'sakura'),
(1058, 'Didziausias menulio judejimonukrypimas nuo trajektorijos, apskaiciuotos pagal keplerio desnius', 'evekcija'),
(1059, 'Antikineje eiledaroje dviskiemenepeda, kurios pirmas skiemuo ilgas, o antras trumpas', 'chorejas'),
(1060, 'Britams priklausancios salos, esancioskaribu juroje, sostine - dzordztaunas [georgetown]', 'kaimanu'),
(1061, 'Istatymu sisteminimas ir jungimas ivisuma', 'kodifikacija'),
(1062, 'Telekomunikaciju kompanija, pagaminusimobiliu telefonu modelius: 8110, 3110, 2110', 'nokia'),
(1063, 'Kas parase veikala taip kalbejozaratustra', 'nyce'),
(1064, 'Arkliu seimos zinduolis, gyvenantisafrikoje bandomis; kunas su skersiniais juodais arba rudais dryziais', 'zebras'),
(1065, 'Koks zymus zmogus pasake: laime -trumpa stotele tarp per mazai ir per daug', 'heidegeris'),
(1066, 'Sieros junginiu misinys, kuriskiedziant vandeniu gaunama ypac aukstos koncentracijos sieros rugstis', 'oleumas'),
(1067, 'Budos - budizmo pradininko, vardas:sidharta ...', 'gautama'),
(1068, 'Fausto gundytojas', 'mefistofelis'),
(1069, 'Jupiterio palydovas, pavadintas ozkos,maitinusios dzeusa kretos urve, vardu', 'amalteja'),
(1070, 'Romenu mitologijoje - medziokles irmisku deive', 'diana'),
(1071, 'Troliai mumiai arba kitaipmuminukai autorius', 'janson'),
(1072, 'Nedidelis vandens plotas pelkeje,uzauganciame ezere', 'akivaras'),
(1073, 'Mokslas, tiriantis prasmes sudarymo irsuvikimo salygas, reiksmes strukture sandara bei transformacijas', 'semiotika'),
(1074, 'Masyvios prozvaigzdes, dar esanciosjas sudariusio duju ir dulkiu gniuzulo gelmese', 'beklino objektai'),
(1075, 'Askorbinine rugstis kitaip', 'vitaminas c'),
(1076, 'Baltu mitologijoje - auksciausiasdievas', 'praamzius'),
(1077, 'Sumanymas ir pasiulymas pradeti kokianors veikla', 'iniciatyva'),
(1078, 'Italu kompozitorius, operu manonlesko, bohema, toska, madam baterflai ir ktautorius', 'pucinis'),
(1079, 'Senojo testamento, filosofiniuapmastymu, pamokymu knyga', 'ekleziastas'),
(1080, 'Paskutinis nba klubas, kuriame zaidesmarciulionis [angl.]', 'nuggets'),
(1081, 'Planetos regimasis kampinis nuotolisnuo saules, arba palydovo kampinis nuotolis nuo planetos', 'elongacija'),
(1082, 'Irenginys, puciantis ora i zaizdra, kad kaitriau degtu ugnis', 'dumples'),
(1083, 'Zmogus smerkiantis karus ir prievarta, pasyviomis priemonemis remiantis taika', 'pacifistas'),
(1084, 'Angolos smulkus pinigas', 'santimas'),
(1085, 'Prancuzu tapytojas (1869-1954m.) buduaras, raudonas kambarys, dirbtuve, sokis autorius', 'matisas'),
(1086, 'Rajus, nepasotinamas', 'edrus'),
(1087, 'Laikinas monarchines valstybes vadovas, dazniausiai esant nepilnameciui karaliui', 'regentas'),
(1088, 'Nedideles apimties prozos kurinys, kurio veiksmas glaustas, o pradzia ir pabaiga labai isryskinta', 'novele'),
(1089, 'Psichikos ligos simptomas - ligonis priesinasi paliepimams arba ju nevykdo', 'negatyvizmas'),
(1090, 'Telekomunikaciju kompanija, pagaminusi mobiliu telefonu modelius: v66, v50, a6188, t180', 'motorola'),
(1091, 'Asmuo, esantis kelyje ne transporto priemoneje, taip pat vaziuojantis bemotoriu invalidu vezimeliu, vedantis dvirati, mopeda, motocikla, traukiantis (stumiantis) rogutes, vaikiska ar kitoki vezimeli', 'pestysis'),
(1092, 'Cheminis elementas, kurio simbolis ni [numeris 28]', 'nikelis'),
(1093, 'Sunkus silkinis audinys su iaustais aukso ir sidabro siulais', 'brokatas'),
(1094, 'Salis, kurioje 1720 mikurtas seniausias pasaulyje jachtu klubas royal cork yacht club', 'airija'),
(1095, 'Tam tikro vandens baseino karo laivu junginys', 'flotile'),
(1096, 'Cheminis elementas, kurio pavadinimas kilo is vokisko zodzio, reiskiancio piktaja dvasia, goblina (naminuka)', 'kobaltas'),
(1097, 'Mokslas, tiriantis gyvunu rusiu paplitima zemeje', 'zoogeografija'),
(1098, 'Menines raiskos priemone, zodis pavartotas perkeltinie reiksme, remiantis daiktu, veiksmu isoriniu panasumu', 'metafora'),
(1099, 'Lietuviu kompozitorius, pianistas, dirigentas, operos dalia, simfoniniu kuriniu, muzikos spektakliams ir kinofilmams autorius', 'dvarionas'),
(1100, 'Sirupas, liekantis iskristalinus cukriniu runkeliu cukru', 'melasa'),
(1101, 'Stambi apgavyste, nesaziningas, apgavikiskas darbas', 'afera'),
(1102, 'Vokieciu operos klasikas, skrajojancio olando autorius', 'vagneris'),
(1103, 'Puosnus stogelis, per iskilmingas eisenas nesamas virs dvasininko, valdovo', 'baldakimas'),
(1104, 'Telekomunikaciju kompanija, pagaminusi mobiliu telefonu modelius: 3510i, 6610, 3610, 9210i communicator', 'nokia'),
(1105, 'Apskritas dvipusis popieziaus antspaudas, kurio averse - popieziaus vardas, o reverse - apastalu petro ir pauliaus atvaizdai', 'bule'),
(1106, 'Rumu tarnas; rubininkas', 'kamerdineris'),
(1107, 'Populiarus kailiu salonas lietuvoje', 'nijole'),
(1108, 'Maziausias skaitmeninio vaizdo elementas', 'pikselis'),
(1109, 'Pulinis uzdegimas, apimantis apie voko krasto riebalu liauka bei aplinkinius audinius', 'miezis'),
(1110, 'Duju skraiste, kuri gaubia prie saules artejancios ar nuo saules tolstancios kometos branduoli', 'koma'),
(1111, 'Prancuzu kompozitorius, operu karmen, perlu ieskotojai, ivanas rustusis, opereciu, 2 simfoniju autorius', 'bize'),
(1112, 'Krikscionybes tradicijoje sujungimo, sasajos simbolis', 'mazgas'),
(1113, 'Tapybos technika', 'alla prima'),
(1114, 'Koki didziausia greiti yra pasiekes f-1 bolidas km/h', '367'),
(1115, 'Kauline plokstele kelio sanario srityje', 'girnele'),
(1116, 'Nevalgomas grybas is isvaizdos labai primenantis baravyka-paazuoli, bet minkstimas perlauzus gryba is pradziu parausta, o paskui pamelynuoja', 'setonbaravykis'),
(1117, 'Aktore atlikusi pagrindinius vaidmenis filmuose esminis instinktas, specialistas, kazino ir kt.: sharon ..[orig.]', 'stone'),
(1118, 'Didelis turkijos miestas, kuris yra ir europoje, ir azijoje', 'stambulas'),
(1119, 'Geografine zona, kurios teritorija yra islandijoje, skandinavijos siaureje, rusijos lygumu siaureje', 'tundra'),
(1120, 'Periodine spauda, leidiniai, einantys tam tikrais laiko tarpais, tauo paciu pavadinimu', 'periodika'),
(1121, 'Sachmatuose kai karaliui nera sacho ir neturi kur eiti', 'patas'),
(1122, 'Kelintais metais iteikti pirmieji emmy apdovanojimai', '1949'),
(1123, 'Ypatingi protoplazmos kuneliai, apgaubti tvirtu apvalkaleliu [dgs.]', 'sporos'),
(1124, 'Cheminis elementas, kurio simbolis sc [numeris 21]', 'skandis'),
(1125, 'Automobiliu gamintojas isleides siuos modelius: xsara, xantia', 'citroen'),
(1126, 'Mineralu ar organiniu medziagu kaupimasis zemes pavirsiuje; formuoja vulkanines ir nuosedines uolienas, reljefa', 'akumuliacija'),
(1127, 'Atminties susilpnejimas', 'hipomnezija'),
(1128, 'Vilniaus generalgubernatorius 1798-1799 metais', 'lasis'),
(1129, 'Saskaitybos tvarka, kai apskaitos registruose ukines operacijos irasomos padarymo diena arba apskaitos darbai atliekami pagal grafika', 'azuras'),
(1130, 'Medziaga, gauta dviem ar daugiau elementu susijungus chemines reakcijos metu', 'junginys'),
(1131, 'Pirmasis garso irasymo ir atkurimo aparatas, kuri sukonstravo t.aedisonas 1878 m.', 'fonografas'),
(1132, 'Kelintais metais anglijos parlamente priimtas istatymas, draudziantis kolonistams keltis i vakarus', '1763'),
(1133, 'Kaip vadinama ziedo piesteles dalis, ant kurios turi buti pernestos ziedadulkes', 'purka'),
(1134, 'Nhl klubas is dalaso', 'stars'),
(1135, 'Kietosios medziagos virtimas skysciu', 'lydimasis'),
(1136, 'Besisukanti revolverio detuve', 'bugnas'),
(1137, 'Estetiskai aktualizuotu eiliuotos kalbos garsu sistema', 'fonika'),
(1138, 'Italijos administracinis vienetas', 'regionas'),
(1139, 'Rasytojas, romanu vakaru fronte nieko naujo, juodasis obeliskas, trys draugai, mylek savo artima, triumfo arka, kelias atgal autorius (liet.)', 'remarkas'),
(1140, 'Po zeme augantys grybai, kuriu iesko specialiai dresuotos kiaules', 'trumai'),
(1141, 'Legendinis iv akrikscioniu atsiskyrelis, 60 metu praleides vienas egipto dykumoje', 'anupras'),
(1142, 'Platus griovys salia pylimo vandeniui nuleisti', 'rezervas'),
(1143, 'Literaturoje - desimteilis', 'decima'),
(1144, 'Karo prietaisas, naudotas viduramziais prieso pilies sienu, vartu griovimui', 'taranas'),
(1145, 'Xvi - xviiiaindenu isnaudojimo forma, vadinama globa', 'enkomjenda'),
(1146, 'Turistu megstamos salos prie jav', 'bahamai'),
(1147, 'Charakterio budas, kuriam budinga nepagristai liudna nuotaika', 'melancholija'),
(1148, 'Grozines literaturos elementu panaudojimas dokumentinio pobudzio kuriniuose', 'beletrizacija'),
(1149, 'Mero bustine', 'merija'),
(1150, '1830-1831 metu sukilimo lietuvoje vadas', 'gelgaudas'),
(1151, 'Sala, prie kurios aptikta didziausia pasaulinio vandenyno gelme', 'mindanao'),
(1152, 'Delnas su pirstais, ranka nuo rieso', 'plastaka'),
(1153, 'Japonijos imperatorius po 700 metu izoliacijos atveres japonija vakarams', 'meidzi'),
(1154, 'Slapyvardis kitaip', 'pseudonimas'),
(1155, 'Lapiu patinas', 'lapinas'),
(1156, 'Keturi pagrindiniai arbatos gerimo ceremonijos principai: harmonija, pagarba, svara ir ...', 'tyla'),
(1157, 'Ezeras traku raj., 7 km i rytus nuoaukstadvario (pavadinimas - rubo, apredo sinonimas)', 'drabuzis'),
(1158, 'Gero gyvenimo, geru laiku pavadinimas: aukso ...', 'amzius'),
(1159, 'Latentinis zvairumas', 'heteroforija'),
(1160, 'Oficialus ko nors apziurejimas ar patikrinimas', 'apziura'),
(1161, 'Taure, is kurios gere jezus', 'gralis'),
(1162, 'Vyru gerklu kysulys', 'adomo obuolys'),
(1163, 'Siuolaikine issivysciusiu pasaulio saliu kultura', 'civilizacija'),
(1164, 'Sena zalcio oda', 'isnara'),
(1165, 'Sachmatu padetis, kai partija laikoma pasibaigusia lygiosiomis', 'patas'),
(1166, 'Senoves romoje - nubalinta medzio lenta, kurioje buvo skelbiami zyniu, senato ir kitu valdzios instituciju pranesimai bei ju nariu sarasai', 'albas'),
(1167, 'Kalvagubris, sudarytas is ledyno sanasu', 'ozas'),
(1168, 'Desimta pagal dydi pasaulio valstybe', 'sudanas'),
(1169, 'Salis, kurioje surengtas pirmasis pasaulio krepsinio veteranu vyru cempionatas', 'argentina'),
(1170, 'Panasus i gandra paukstis', 'garnys'),
(1171, 'Zodis, pavartotas perkeltine prasme remiantis daiktu rysiu', 'metonimija'),
(1172, 'Prietaisas vidaus organu sukeliamiems garsams klausyti', 'stetoskopas'),
(1173, 'Islame - karalius, bandes pakartoti roju', 'sadadas'),
(1174, 'Aukstos kokybes dvisluoknis vilnonis audinys', 'drapas'),
(1175, 'Visu muzikinio kurinio partituroje numatytu atlikeju grojimas ir dainavimas', 'tutti'),
(1176, 'Kurinio ritmo nesutapimas su metro kirciu', 'sinkope'),
(1177, 'Posakis:..pradzia - puse darbo', 'gera'),
(1178, 'Maza pusapvale kepuraite, kuria ant virsugalvio devi kataliku baznycios aukstieji dvasininkai', 'pijuse'),
(1179, 'Nesarvuotas karo laivas zvalgybai, eskadros apsaugai', 'fregata'),
(1180, 'Liudviko xiv zmona', 'marija terese'),
(1181, 'Kas parase veikala istorijos ideja', 'kolingvudas'),
(1182, 'Giliausia atlanto vandenyno vieta (~8,6km): ....duburys', 'puerto riko'),
(1183, 'Romenu rasytojas, istorikas, parases kurinius istorija, germanija', 'tacitas'),
(1184, 'Miestas, kuri dievas jahve sunaikino ugnimi', 'sodoma'),
(1185, 'Dvikovos sporto saka - dvieju sportininkukova, stengiantis sportiniu ginklu (rapyros, spagos, kardo) duriais arbakirciais pasiekti vienas kita', 'fechtavimasis'),
(1186, 'Koks kinu filosofas buvo svarbiausias konfucijaus pasekejas', 'mencijus'),
(1187, 'Kaip vadinamas periodas japonijoje trukes nuo 300 iki 710 metu', 'yamato'),
(1188, 'Muitines duotas pazymejimas, kad muitas grazintas', 'debentura'),
(1189, 'Protestantu sektos, skelbiancios greita antraji kristaus atejima [dgs.]', 'adventistai'),
(1190, 'Dokumentas, suteikiantis teise verstis kokiu nors verslu', 'patentas'),
(1191, 'Asmuo, uzgrobes valdzia arba pasisavines svetimas teises', 'uzurpatorius'),
(1192, 'Stambiausias lietuvos ir europos vabalas: paprastasis ...', 'elniaragis'),
(1193, 'Ar portugalijoje koridos metu bulius yra nuduriamas', 'ne'),
(1194, '1900 mvasaros olimpiniu zaidyniu sostine', 'paryzius'),
(1195, 'Surangytas itaisas vonioje, ranksluosciams dziovinti', 'gyvatukas'),
(1196, 'Trumpas popieziaus rastas antraeiliais baznycios administracijos ar religijos klausimais', 'breve'),
(1197, 'Religine paziura, kad tikejimas yra pranasesnis, svarbesnis uz zinojima, moksla', 'fideizmas'),
(1198, 'Pokosto, lako, sikatyvo, terpentino, pemzos ir pigmento misinys mediniams pasvirsiams glaistyti', 'mastika'),
(1199, 'Literaturos kurinys, kuriame autorius pasakoja praeities ivykius, kuriu dalyviu ar stebetoju yra buves', 'memuarai'),
(1200, 'Netiketas ivykis, pranesimas, sukeliantis dideli susidomejima', 'sensacija'),
(1201, 'Su kuria valstybe lietuva turi ilgiausia siena', 'baltarusija'),
(1202, 'Kalnas graikijoje, kur, pasak mito, buvusi graiku dievu buveine; cia gyveno 12 svarbiausiu dievu, valdomu dzeuso', 'olimpas'),
(1203, 'Saules laikrodzio strypas, kurio metamas ant ciferblato seselis rodo laika', 'gnomonas'),
(1204, 'Renkamojo organo papildymas paciu jo nariu nutarimu, be papildomu rinkimu', 'kooptacija'),
(1205, 'Medzio pavirsiaus inkrustacija dramblio kaulu, perlamutru ir vezlio kiautu', 'marketerija'),
(1206, 'Koks miestelis isikures prie ancios ezero', 'veisiejai'),
(1207, 'Zenklas, uzsifruojantis reiskinio prasme', 'simbolis'),
(1208, 'Sprogstamosios medziagos pripildyta statine su laikrodiniu mechanizmu, kuri galima nustatyti taip, kad sukeltu sprogima tam tikrame gylyje', 'gilumine bomba'),
(1209, 'Dvi tieses, kurios yra vienoje plokstumoje ir nesusikerta, vadinamos', 'lygiagreciomis'),
(1210, 'Senovinis moteriskas galvos papuosalas, dedamas ant plauku arba galvos apdangalo', 'apgalvis'),
(1211, 'Artilerijos pabuklo taikymo optinis itaisas', 'panorama'),
(1212, 'Antrasis lietuvos ir lenkijos padalijimas', '1793'),
(1213, 'Mazi periodiniai zemes sukimosi asies virpesiai, svyravimai', 'nutacija'),
(1214, 'Tam tikras ribotas sausumos, vidaus arba priekrantes vandens plotas kartu su oro erdve virs to ploto', 'teritorija'),
(1215, 'Architekturos datale; profiliuotas akmens blokas ant sienos arba kolonos kapitelio arkai atremti', 'impostas'),
(1216, 'I peledike panasus paukstis; nuo pastarosios skiriasi tik tuo, kad jos kojos iki pirstu galu yra apaugusios plunksnomis', 'lutute'),
(1217, 'Suolas baznycioje atsiklaupti ar atsisesti', 'klauptas'),
(1218, 'Apvali anga technologiniam procesui uzdaroje erdveje stebeti, taip pat kam nors ipilti, iberti, patraukti', 'akute'),
(1219, 'Ginklu, saudmenu, strateginiu medziagu skolinimas ir nuomojimas antifasistines koalicijos salims pagal jav 1941 mistatyma', 'lendlizas'),
(1220, 'Sovietu sajungos emblema nuo 1923 iki 1991 m., simbolizuojanti nasu darba pramoneje ir zemes ukyje: ..ir kujis', 'pjautuvas'),
(1221, 'Temperamento tipas, kuriam budingos greitai kintancios psichines busenos, energingumas, jautrumas', 'sangvinikas'),
(1222, 'Kas nusako vandenilio jonu koncentracija tirpale', 'ph'),
(1223, 'Sovietinis turtingesnio ukininko pavadinimas', 'buoze'),
(1224, 'Kokiai kompanijai priklauso zymieji malaizijos bokstai dvyniai', 'petronas'),
(1225, 'Lietuvos didysis kunigaikstis valdes nuo 1764miki 1795m.: stanislovas augustas ...', 'poniatovskis'),
(1226, 'Didele lietuvos upe, tekanti per ukmerge', 'sventoji'),
(1227, 'Vienkartinis mokestis vyskupui, veliau popieziui, kuri pirmaisiais darbo metais mokedavo dvasininkai', 'anatos'),
(1228, 'Kokiais skaiciais prasideda sveicarijos bruksninis prekinis kodas', '76'),
(1229, 'Xvi apabaigos xvii apradzios olandu teisininkas, sociologas, diplomatas, vienas is prigimtines teises teorijos ir tarptautines teises mokslo kureju', 'grocijus'),
(1230, 'Kiek cilindru turi dyzelinis lokomotyvo m62 variklis', '12'),
(1231, 'Lauziamoji geba tokio lesio, kurio pagrindinio zidinio nuotolis 1 m.', 'dioptrija'),
(1232, 'Negyvu augalu arba gyvunu liekana, suakmenejusi per milijonus metu', 'fosilija'),
(1233, 'Gimusiu 05.22 - 06.21dzodiako zenklas', 'dvyniai'),
(1234, 'Knygos mano kova autorius, parases ja sededamas kalejime', 'hitleris'),
(1235, 'Moteris, pirmoji gavusi dvi nobelio premijas', 'kiuri'),
(1236, 'Salis, 1990 mpasaulio futbolo cempionato nugaletoja', 'vokietija'),
(1237, 'Raudonai rudos spalvos piestukas be apdaro is kaolino ir gelezies oksidu', 'sangvinas'),
(1238, 'Individualus istaikingas vienabutis gyvenamasis namas su zemes sklypu', 'kotedzas'),
(1239, 'Automobiliu gamintojas isleides siuos modelius:puma, probe, galaxy', 'ford'),
(1240, 'Lietuvos ir lenkijos paprotines teises bausme smeizikams', 'atlojimas'),
(1241, 'Stambus, dazniausiai penkiabalsis kurinys chorui a cappella', 'madrigalas'),
(1242, 'Bokso aikstele, aptverta itemptomis virvelemis', 'ringas'),
(1243, 'Parengiamieji konturiniai studijinio piesinio arba tapybos kompozicijos apmatai [vns.]', 'abrisas'),
(1244, 'Artificiozines literaturos rusis, eiliuotas kurinys su vidiniais rimais kiekvienoje arba kas antroje eiluteje', 'echo'),
(1245, '3-a labiausiai urbanizuota pasaulio salis (100% miesto gyv.)', 'vatikanas'),
(1246, 'Kokiu vardu geriau zinomas senoves romos imperatorius markas aurelijus antoninas', 'karakala'),
(1247, 'Klostytas dekoratyvinis audinys, vartojamas interjerui puosti', 'draperija'),
(1248, 'Pinta, austa ar megzta juostele, kaspinas ar raistis is medvilniniu, dirbtino arba naturalaus silko verpalu su ipintais metaliniais siulais', 'galionas'),
(1249, 'Kaip vadinama auksciausia italijos futbolo lyga', 'serie a'),
(1250, 'Visuomeniniu rysiu susilpnejimas del moraliniu vertybiu, elgesio normu suirimo, tradicines tautines kulturos formu nykimo', 'anomija'),
(1251, 'Induizme - sugebejimas daryti stebuklus, patys stebuklai, nesuvokiama jega', 'maja'),
(1252, 'Zemes pavirsiaus nuotraukos darymo ir atvaizdavimo planuose bei zemelapiuose metodu visuma', 'topografija'),
(1253, 'Cheminis elementas, kurio pavadinimas kilo is lotynisko zodzio, reiskiancio magnetas', 'manganas'),
(1254, 'Buves dbritanijos ministras pirmininkas, 1953 mnobelio literaturos premijos laureatas', 'cercilis'),
(1255, 'Lietuviu skulptoriusjo statyti paminklai zuvusiems ties sirvintomis kariams, nepriklausomybes rokiskyje ir zuvusiems uz nepriklausomybe birzuose, egle zalciu karaliene palangos botanikos parke', 'antinis'),
(1256, 'Xix aeuropoje susiformavusi nacionalistine doktrina, kurios tikslas buvo suvienyti visus musulmoniskus krastus', 'panislamizmas'),
(1257, 'Gerai isidemek lotyniskai', 'nota bene'),
(1258, 'Rasytojas, romanu isos slenis, valdzios paemimas, poezijos rinkiniu poema apie sustingusi laika, trys ziemos, mano tevyneje autorius (liet.)', 'milosas'),
(1259, 'Senoves graikijos dainiai [dgs.]', 'aoidai'),
(1260, 'Mokslas tiriantis gyventoju sudeti, ju daugejima, pasiskirstyma', 'demografija'),
(1261, 'Sprogstamasis metamasis ginklas', 'granata'),
(1262, 'Narkotikas, 1897 mgimes vaistu kompanijos bayer laboratorijoje', 'heroinas'),
(1263, 'Pagarsejes ziaurumu xvii azemaitijos bajoras, lietuvos didziosios kunigaikstystes politinis veikejas', 'cicinskas'),
(1264, 'Lietuvos respublikos ministras pirmininkas1939.11.21-1940.06.15', 'merkys'),
(1265, 'Senoves egiptieciu mitologijoje oro dievas', 'su'),
(1266, 'Samprotavimas, paaiskinamoji pastaba del kokio nors ivykio, dokumento, spausdinama periodineje spaudoje, skaitoma per radija ar televizija', 'komentaras'),
(1267, 'Lietuvos respublikos ministras pirmininkas1929.09.23-1938.03.24', 'tubelis'),
(1268, 'Suvalkijos sostine', 'marijampole'),
(1269, 'Prietaisas zmogaus kvepavimo organams apsaugoti nuo dulkiu', 'respiratorius'),
(1270, 'Vienintelis vietines kilmes zeme vaiksciojantis zinduolis, sutinkamas bahamu salose', 'juru kiaulyte'),
(1271, 'Gimusiu 12.23 - 01.20dzodiako zenklas', 'oziaragis'),
(1272, 'Kas parase lietuva ir lenkija po 1569mliublino unijos, 1655mkedainiu sutartis, arba svedai lietuvoje 1655-1656 m.', 'sapoka'),
(1273, 'Nedidele instrumentine muzikine pjese', 'intrada'),
(1274, 'Mokslas apie zvaigzdes ir kitus dangaus kunus', 'astronomija'),
(1275, 'Grupe, sujungtu gyvenvieciu, turinciu glaudzius ukio, darbo, kulturos ir buities rysius', 'aglomeracija'),
(1276, 'Kompleksine mokslo saka, tirianti rytu saliu gamta, ekonomika, istorija, rytu tautu buiti, kalbas, literatura, mena, religija, filosofija', 'orientalistika'),
(1277, 'Lazdynu peledos slapyvardziu pasirasinejo seserys sofija psibiliauskiene ir marija ...', 'lastauskiene'),
(1278, 'Vienos valstybes pastangos isplesti savo ekonomine ir politine galia i kitas valstybes, nesiskaitant su ju interesais', 'imperializmas'),
(1279, 'Tam tikras objektu panasumas, kuriuo remiamasi pazintineje veikloje', 'analogija'),
(1280, 'Indeniskas genties juodosios pedos pavadinimas', 'siksikai'),
(1281, 'Kareivis, savavaliskai pasitraukes is tarnybos', 'dezertyras'),
(1282, 'Karinis dalinys transportui, belaisviams, suimtiesiems saugoti ir lydeti', 'konvojus'),
(1283, 'Sventoji, neturto seseru - klarisiu vienuoliu ordino ikureja', 'klara'),
(1284, 'Religine apeiga - tikras arba simboliskas kuno, jo daliu, liturginiu reikmenu apiplovimas', 'abliucija'),
(1285, 'Istorine sritis gango zemupio baseine ir gango bei bramaputros deltoje', 'bengalija'),
(1286, 'Salies vekselio kurso reguliavimas, kuri atlieka valstybe ar centrinis bankas, bei savo valiutos kuros reguliavimas perkant ar parduodant devizas', 'devizu politika'),
(1287, 'Lygi arba profiliuota medine juostele paveikslu remams, lubu ir sienu puosybai', 'bagetas'),
(1288, 'Keliu aukstu namui prilygsta cheopso piramide', '50'),
(1289, 'Sudaiginti mieziu, rugiu ar kitu javu grudai', 'salyklas'),
(1290, 'Laikinas cheminio elemento, kurio simbolis uuq [numeris 114] pavadinimas', 'ununkvadis'),
(1291, 'Dydis, apibudinantis orbitos elipsiskuma, lygus atstumo tarp elipses centro ir jos zidinio santykiui su didziuoju elipses pusasiu', 'ekscentricitetas'),
(1292, 'Anglu fizikas ir chemikas, pirma karta isskyres vandenili ir irodes, kad jo degimo produktas yra vanduo', 'kavendisas'),
(1293, 'Elektros sroves saltinio neigiamas polius', 'anodas'),
(1294, 'Automobiliu gamintojas isleides siuos modelius: c3, c5, berlingo', 'citroen'),
(1295, 'Charakterio tipas, kuriam budinga polinkis i emocinio ir intelektualinio gyvenimo atotruki, uzdarumas, nekalbumas, itarumas, nepasitikejimas', 'sizoidas'),
(1296, 'Musulmonu tikybos ispazinimas, isreiskiamas formule: nera kito dievo, isskyrus alacha, ir jo pranasas yra mazaideju_pagrindine_informacija_4hj7sd4vtas', 'sahada'),
(1297, 'Sprogstamoji medziaga, susidedanti is amonio nitrato, dinitrobenzolo ir natrio chlorido', 'abelitas'),
(1298, 'Atsigaminantis lasteles branduolio strukturinis elementas, turintis dnr, kuriuose yra genetine informacija', 'chromosoma'),
(1299, 'Kiek kvadratiniu metru yra dvejuose hektaruose', '20000'),
(1300, 'Zmogus, negeriantis svaigiuju gerimu ir propaguojantis blaivybe', 'blaivininkas'),
(1301, 'Klausimu ar reiskiniu sritis, su kuria kas nors gerai susipazines', 'kompetencija'),
(1302, 'Isipareigojimas ispirkti ikeista vekseli', 'reversas'),
(1303, 'Oficiali kalba kabo verdes respublikoje', 'portugalu'),
(1304, 'Misle: mazas berniukas, astrus jo kirvukas', 'bite'),
(1305, 'Pagrindine augalu lasteliu sieneliu atramine medziaga, polisacharidas', 'celiulioze'),
(1306, 'Branduolineje technikoje - itaisas radioaktyviosioms medziagoms laikyti ir transportuoti', 'konteineris'),
(1307, 'Gerai zinomas kalnas prie nemuno, ant kurio stovejo garsi pagoniu sventykla', 'rambynas'),
(1308, 'Specialus architekturos ar dailes kuriniu apdorojimas, stabdantis ardanciu veiksniu poveiki, fiksuojantis esama bukle', 'konservavimas'),
(1309, 'Gyvo organizmo organu ir sistemu pakeitimas nasesniais ir patvaresniais dirbtiniais itaisais', 'kiborgizacija'),
(1310, 'Vienas svarbiausiu induizmo, budizmo ir dzainizmo doktrinu elementu', 'samsara'),
(1311, 'Universaliausias ivairiu procesu ir judejimo rusiu matas', 'energija'),
(1312, 'Brutualus holivudo filmu herojus, kuri suvaidino sstalone', 'rembo'),
(1313, 'Viduramziu europos laisvuju miestu aristokratas', 'patricijus'),
(1314, 'Garsi aktore, daininke, modelis is ukrainos, vaidinusi filme penktas elementas', 'jovovich'),
(1315, 'Sengraiku mitologijoje - paklydimo, proto uztemimo deive, dzeuso dukra, kuria sis supykes nusviede zemen', 'ata'),
(1316, 'Is varles padeto vandenyje kiausinio issiritusi lerva', 'buozgalvis'),
(1317, 'Asmenu arba organizaciju susivienijimas, sajunga bendrai ukinei, politinei, kulturinei, sportinei ar kitai veiklai', 'asociacija'),
(1318, 'Motvardas, kiles is lotkalbos, reiskia palaiminga', 'beata'),
(1319, 'Megejas pamokslauti, skelbti griezta dorovinguma', 'moralistas'),
(1320, '14 eiluciu eilerastis, sudarytas is 2 ketureiliu su 2 rimais ir 2 trieiliu (italu ir prancuzu sonetas) arba is 3 ketureiliu ir 1 dvieilio (anglu sonetas)', 'sonetas'),
(1321, 'Kojos dalis, esanti tarp kelio ir ciurnos', 'blauzda'),
(1322, 'Spalva, simbolizuojanti subrendima, tikejima ir pergale', 'geltona'),
(1323, 'Skystis, liekantis is pieno gaminant varske', 'isrugos'),
(1324, 'Burlaivio laivavirviu ir lynu bendrinis pavadinimas', 'takelazas'),
(1325, 'Letas periodinis zemes (kartu ir dangaus) asies slinkimas kugio pavirsiumi aplink isivaizduojama asi, statmena ekliptikos plokstumai', 'lambdaizmas'),
(1326, 'Gramatiskai susijusiu zodziu grupe, tariama baigtine intonacija', 'sakinys'),
(1327, 'Abstrakciaja prasme valtybes kisimosi i individo pajamu naudojima politika', 'paternalizmas'),
(1328, 'Laikas nuo sestadienio iki pirmadienio; keliones, pramogos tuo laiku', 'savaitgalis'),
(1329, 'Apsisukimo periodo matavimo vienetas si sistemoje', 'sekunde'),
(1330, 'Gelezis po arklio kanopa', 'pasaga'),
(1331, 'Standi skaidulinio audinio pleve, gaubianti visa kaula,isskyrus sanarinius pavirsius', 'antkaulis'),
(1332, 'Itaisas, ultragarsu nustatantis povandeninio objekto vieta', 'hidrolokatorius'),
(1333, '7-as didziausias lietuvos ezeras [vard.]', 'luodis'),
(1334, 'Gamtos mokslas, kuriantis zmogaus elgesio prognozavimo ir valdymo procesus', 'biheviorizmas'),
(1335, 'Taurusis metalas, simbolizuojantis pastovuma, amzinuma ir tobuluma', 'auksas'),
(1336, 'Pirmasis vienos klasikas', 'haidnas'),
(1337, 'Smakro atsikisimas, kai apatinai priekiniai dantys dengia virsutinius', 'progenija'),
(1338, 'Rugstis, kurios yra kiekvieno musu skrandziuose, ir kuri padeda virskinti maista', 'druskos'),
(1339, 'Vidutinis zmogaus kuno tankis [kg/m3]', '1036'),
(1340, 'Derva, gaunama is spygliuocio medzio agacio', 'kauris'),
(1341, 'Sporto saka - kopimas i sunkiai prieinamas kalnu virsunes', 'alpinizmas'),
(1342, '2004 metu europos futbolo cempionato nugaletoja', 'graikija'),
(1343, 'Isvirsinis, dirbtinis iskilmingumas, prasmatnumas, puosnumas', 'pompastika'),
(1344, 'Garsus ispanu tapytojas, apie kuri sukurtas filmas', 'goja'),
(1345, 'Paskutine naujojo testamento knyga', 'apokalipse'),
(1346, 'Beprasmybe, priestaringas ar visai prasmes neturintis teiginys, reiskinys', 'absurdas'),
(1347, 'Liguista tamsos baime', 'niktofobija'),
(1348, 'Nepaveldimi pakitimai organizme, ivykstantys del jo paties veiklos ir aplinkos itakos', 'modifikacijos'),
(1349, 'Kokia yra vienintele skulptura, ant kurios mikelandzelas padejo savo parasa', 'pieta'),
(1350, 'Modernizmo dailes kryptis, kuriai budingas zaismingas dekoratyvumas, vaizduojamu daiktu spalvos menkai teatitinka naturalias', 'fovizmas'),
(1351, 'Knygu dzonatanas livingstonas zuvedra, iliuzijos, vienas autorius', 'ricardas bachas'),
(1352, 'Skolos dokumentas', 'vekselis'),
(1353, 'Kai kuriu tiurku ar mongolu tautu feodaliniu valdovu titulas', 'chanas'),
(1354, 'Meno kurinio autentiskumo, autorystes nustatymas', 'atribucija'),
(1355, 'Matgrandinines trupmenos dalis, isreiksta nesuprastinama trupmena', 'reduktas'),
(1356, 'Prancuzijos didziosios revolicijos veikeju pravardziuojamasis pavadinimas, is pradziu taip budavo vadinami paryziaus varguomenes vyrai, kurie skirtingai nuo aukstuomenes, devejo ne trumpas, o ilgas kelnes', 'sankiulotai'),
(1357, 'Kada buvo pasirasyta nistato taikos sutartis', '1721'),
(1358, 'Metalinis, grafitinis, keramikinis indas medziagoms lydyti, iskaitinti', 'tiglis'),
(1359, 'Ledu krituliai', 'krusa'),
(1360, 'Centrine nervu sistema', 'cns'),
(1361, 'Patarle: ..rankos ir bloga darba pataiso', 'geros'),
(1362, 'Kas parase veikala visuotine istorija', 'polibijas'),
(1363, 'Leistina nukrypimo nuo nustatyto matmens riba', 'paklaida'),
(1364, 'Tiurku klajokliu tauta gyvenusi vidurineje azijoje, kuri prieme judaizma, ir kuriu palikuonys siuo metu paplite po pasauli', 'chazarai'),
(1365, 'Archangelas, liepes mazaideju_pagrindine_informacija_4hj7sd4vtui skleisti islama', 'gabrielius'),
(1366, 'Teleskopas, kurio sviesa surenkantis elementas yra igaubtas veidrodis', 'reflektorius'),
(1367, 'Operacija, per kuria pasalinama organo dalis', 'rezekcija'),
(1368, 'Slapta jogailos sutartis su ordinu kurioje jis pasizadejo neginti kestucio zemiu', 'dovidiskiu'),
(1369, 'Salis, kurioje ivyko pirmosios futbolo pasaulio taures varzybos (1930 m., jose dalyvavo 13 valstybiu)', 'urugvajus'),
(1370, 'Dainos kur bega sesupe autorius', 'sasnauskas'),
(1371, 'Rinka, kurioje daugelis gamintoju siulo panasius, taciau ne identiskus, o kuo nors besiskiriancius tos pacios paskirties produktus', 'monopoline konkurencija'),
(1372, 'Sienu tapybos kurinys', 'freska'),
(1373, 'Daugiausiai palydovu turinti saules sistemos planeta', 'saturnas'),
(1374, 'Filmo sokeja tamsoje pagrindinio vaidmens atlikeja', 'bjork'),
(1375, 'Prancuzu kompozitorius, daugiau kaip 40 operu, romantiniu baletu zizel, korsaras autorius', 'adanas'),
(1376, 'Uzkratas, infekcines ligos sukelejas', 'kontagiumas'),
(1377, 'Kiek metu levas tolstojus rase romana karas ir taika', '6'),
(1378, 'Kokiai karalystei biologiskai priklauso liutas', 'gyvunu'),
(1379, 'Ratas aplink menuli matomas dregnoje atmosferoje', 'drigne'),
(1380, 'Koju nagu apdaila', 'pedikiuras'),
(1381, 'Zmogus, 1995 metas gaves nobelio premija uz ozono tyrinejimus', 'griutsenas'),
(1382, 'Pasaku ar padavimu butybe - vilkolakis, numirelis, nakti iseinantis is kapu ir geriantis mieganciu zmoniu krauja', 'vampyras'),
(1383, 'Kryptinga informacija apie prekiu vartojamasias savybes ir paslaugu rusis, norint padidinti ju paklausa ir realizacija', 'reklama'),
(1384, 'Vaistas, skirtas naikinti kaspinuocius', 'prazikvantelis'),
(1385, 'Muzikoje - kurinio tempa nusakantis zodis: ramiai, nuosaikiai, neskubant', 'andante'),
(1386, 'Gvatemalos nacionalinis paukstis', 'ketsalis'),
(1387, 'Pirmasis afrikos-amerikos aktorius, vaidines tv dramos serijose (as snipas) [orig.]', 'cosby'),
(1388, 'Rugstys, turincios anglies, deguonies ir vandenilio', 'karboksilines'),
(1389, 'Baldas su atrama, skirtas sedeti vienam zmogui', 'kede'),
(1390, 'Kai kuriu medziagu savybe sugerti nematoma elektromagnetine energija ir paskui skleisti ja kaip ryskia, regima sviesa', 'fluorescencija'),
(1391, 'Didziausias zinduolis', 'melynasis banginis'),
(1392, 'Erdvinis pavirsius, gautas statuji trikampi apsukus 360 laipsniu kampu apie viena is statiniu', 'kugis'),
(1393, 'Paskutine menesio diena, nustatoma kaip terminas sanderiui uzbaigti', 'ultimo'),
(1394, 'Sukes, daiktu dalys, plesenos likusios po bombos ar kito saltinio sprogimo', 'skeveldros'),
(1395, 'Lietuviu muzikos grupe, kuriai gerai', 'zas'),
(1396, 'Procesoriaus greicio charakteristika, rodanti, kiek kartu per sekunde procesorius gali nieko nedaryti', 'bogomips'),
(1397, 'Romano balta drobule autorius', 'skema'),
(1398, 'Mokslas, teorija apie itikinejimo budus, principus, taisykles, kaip kalba parengti ir ja pasakyti', 'retorika'),
(1399, 'Lamaistu baznycios, iki 1951 mir tibeto vyriausybes, vadovas', 'dalailama'),
(1400, 'Opijaus gele', 'aguona'),
(1401, 'Senlenkijos kariuomenes riteris veliavnesys', 'chorunzas'),
(1402, 'Indas gazuotam gerimui daryti ar laikyi', 'sifonas'),
(1403, 'Metalas kurio bijo vilkolakiai', 'sidabras'),
(1404, 'Taip angliskai', 'yes'),
(1405, 'Taip vadinamas studentu himnas', 'gaudeamus'),
(1406, 'Moldovos sostine', 'kisiniovas'),
(1407, 'Isankstinis kelio uzkirtimas, uzbegimas uz akiu', 'prevencija'),
(1408, 'Ssrs valstybes saugumo ministerija, isteigta 1946 mvietoj panaikintos nkvd (veliau is jos kadru buvo suformuotas kgb)', 'mgb'),
(1409, 'Kisenine servietele', 'nosine'),
(1410, 'Didziausias tarpeklis pasaulyje, esantis kolorado upeje, jav: ..kanjonas', 'didysis'),
(1411, 'Kaip vadinama santrumpa, sudaryta is sudetiniopavadinimo zodziu vienos ar keliu pirmuju raidziu (pvzltu - lietuvos teisesuniversitetas)', 'abreviatura'),
(1412, 'Rykles gleivines uzdegimas', 'faringitas'),
(1413, 'Ekonomikos teorijos klasikas', 'keinsas'),
(1414, 'Vienintele jav valstija, kurios veliavoje kartu su valstijos pavadinimu yra ir zodis respublika', 'kalifornija'),
(1415, 'Bokso aikstele', 'ringas'),
(1416, 'Britanijos miestas, per kuri eina nulinis dienovidinis', 'grinvicas'),
(1417, 'Aukstosios mokyklos destytojo pirmasis mokslinis vardas', 'asistentas'),
(1418, 'Kaip senoves graikai vadino dabartine ispanija', 'iberija'),
(1419, 'Negirdimas oro/zemes virpejimas', 'infragarsas'),
(1420, 'Posakio o tempora, o mores! autorius', 'ciceronas'),
(1421, 'Skridinelis, atstojantis piniga, moneta', 'zetonas'),
(1422, 'Jamaikos sokiu muzikos rusis; ankstyvoji regio forma, savotiskas kalipso, dziazo bibopo ir ritmenbliuzo junginys', 'ska'),
(1423, 'Kas dienos metu tuscias o nakti pilnas', 'lova'),
(1424, 'Zymiausias klasicizmo laikotarpio prancuzu tapytojas', 'davidas'),
(1425, 'Statybos menas', 'architektura'),
(1426, 'Organizmu prisitaikymas prie neiprastu jiems klimato ar aplinkos salygu', 'aklimatizacija'),
(1427, 'Kas parase samprotavimai apie romenu didybes ir zlugimo priezastis, istatymu dvasia', 'monteskje'),
(1428, 'Bedantyste, keliu arba visu dantu nebuvimas', 'adentija'),
(1429, 'Pavirsiaus dengimas dazais', 'dazymas'),
(1430, 'Garsus antikos filosofas, matematikas ir geografas, pirmasis irodes kad imanoma laivu apiplaukti zeme', 'eratostenas'),
(1431, 'Egiptieciu istorikas ir zynys (iv-iii aprkr.), aprases egipto istorija, nustates jos periodizacija', 'manetonas'),
(1432, 'Koks (apytiksliai) yra atstumas iki zemes centro [km]', '6370'),
(1433, 'Liga, mazas burnos plysys', 'mikrostomija'),
(1434, 'Moldovos administracinis vienetas', 'rajonas'),
(1435, 'Kuriais metais v.rentgenas atrado spindulius, kuriuos pavadino savo vardu', '1895'),
(1436, 'Moteru skrybelaite, prigludusi prie galvos, su veida apreminanciais krastais ir raisciais', 'kapote'),
(1437, 'Siaurine poliarine sritis', 'arktis'),
(1438, 'Prancuzu tapytojas, buduaras, raudonas kambarys, dirbtuve, sokis autorius', 'matisas'),
(1439, 'Seniausias budizmo kanonas, kadaise, pasak tradicijos, budos mokiniu surasytas ant palmiu lapu', 'tripitaka'),
(1440, 'Styginis muzikinis instrumentas, turintis pailginto pusrutulio pavidalo korpusa su kakleliu, 4 stygomis', 'mandolina'),
(1441, 'Nuosedines gelezies rudos mineralas, trivalentes gelezies hidroksidas', 'limonitas'),
(1442, 'Oro laivynas', 'aviacija'),
(1443, 'Figurinis rasto zenklas, zymintis kuria nors savoka arba atskirus kalbos skiemenis ir garsus', 'hieroglifas'),
(1444, 'Senoves romoje - vergu kalejimas, daznai pozeminis', 'ergastulas'),
(1445, 'Kataliku klebono padejejas', 'vikaras'),
(1446, 'Apvalioji kirmele, parazituojanti stuburiniu zarnyne', 'askaride'),
(1447, 'Lietuviu rasytojas, apsaku rinkiniu savaite prasideda gerai, baltieji dobiliukai, valiusei reikia alekso, romanu parduotos vasaros, sakme apie juza autorius', 'baltusis'),
(1448, 'Speciali stipri virve, kuria priristi automobiliu ir lektuvu modeliai leidziami suktis ratu', 'korda'),
(1449, 'Virusai, kurie dauginasi bakterijose', 'bakteriofagai'),
(1450, 'Stuburo smegenu nervu sakneliu uzdegimas', 'radikulitas'),
(1451, 'Futbolininko z.zidane pravarde [pranc.]', 'zizou'),
(1452, 'Pirmas mendelejevo lenteles cheminis elementas', 'vandenilis'),
(1453, 'Anglies molekules, sudarytos is taisyklingu, futbolo kamuoli primenanciu strukturu, turinciu 28, 32, 50, 60 ir daugiau atomu', 'fulerenai');
INSERT INTO `vikte_klsm` (`id`, `klsm`, `ats`) VALUES
(1454, 'Lietuvos ministras pirmininkas (1996 02 - 1996 11)', 'stankevicius'),
(1455, 'Baltymas katalizuojantis fibrinogeno virtima fibrinu ir taip stimuliuojantis kresulio formavimasi', 'trombinas'),
(1456, 'Kokia yra vandens virimo temperatura pagal farenheita', '212'),
(1457, 'Neoficialus jav veliavos pavadinimas', 'zvaigzdes ir dryziai'),
(1458, 'Koks zymus zmogus pasake: zmogus turi buti stipresnis negu jo jausmas', 'seinius'),
(1459, 'Kupranugariu seimos lamu genties naminis zinduolis', 'alpaka'),
(1460, 'Italijos miestas, kuriame yra 40 tukstvietu rdall?????ara futbolo stadionas', 'bolonija'),
(1461, 'Kokius raumenis zmones vidutiniskai naudoja daugiausiai', 'akiu'),
(1462, 'Tikejimas lemtimi', 'fatalizmas'),
(1463, 'Akrosticho rusis, kai pasleptaji zodi ar zodziu jungini sudaro pirmosios ir paskutiniosios teksto eiluciu raides', 'akroteleutas'),
(1464, 'Karo teismas', 'tribunolas'),
(1465, 'Kaip vadinamas bet koks kietas akmuo, kurio pagalba akmens amziuje buvo apdirbami titnago gabalai', 'mustukas'),
(1466, 'Kas isrado siuolaikine elektros lempute, pripildyta argono ir turincia volframo siuleli, susukta spirale', 'langmiuras'),
(1467, 'Lenkijos karaliene (nuo 1424m.)vytauto persama, 1422 mistekejo uz jogailos', 'sofija'),
(1468, 'Medziu isskiriamas skystis', 'sakai'),
(1469, 'Skydines liaukos padidejimas', 'struma'),
(1470, 'Mokslininkas, manes, kad mara, raupus sukelia nematomos gyvos daleles, nors ju per savo gamybos mikroskopa ir neiziurejes', 'kircheris'),
(1471, 'Puosmena is ivairiu medziagu gabaliuku, istatytu i israizyta pavirsiu', 'inkrustacija'),
(1472, 'Senoves graiku sunkieji pestininkai, ginkluoti skydais, ietimis, kalavijais [dgs.]', 'hoplitai'),
(1473, 'Daiktai ir medziagos, netinkami vartoti, bet tinkami perdirbti', 'antrines zaliavos'),
(1474, 'Rusu filmas maskva netiki ...', 'asaromis'),
(1475, 'Kuriniu zydroji paukste, nekviestoji viesnia autorius: morisas ...', 'meterlinkas'),
(1476, 'Telekomunikaciju kompanija, pagaminusi mobiliu telefonu modelius: q100, n105, n100, m100', 'samsung'),
(1477, 'Makedonijos pagrindinis pinigas', 'denaras'),
(1478, 'Religine srove, priestaraujanti oficialiai baznyciai, religines ideologijos viespatavimo metu pasireiskianti kaip savita socialinio proceso forma', 'erezija'),
(1479, 'Tarptautineje teiseje - numatytas kariaujanciu saliu susitarimas del laikino karo veiksmu sustabdymo', 'paliaubos'),
(1480, 'Efektoriaus atsakas i receptoriaus padirginima, perduota per cns su griztamaja informacija apie atsako rezultata', 'refleksas'),
(1481, 'Italu kompozitorius, operu toska, bohema, madam baterflai autorius', 'pucinis'),
(1482, 'Misle: kas musa be ranku', 'laikrodis'),
(1483, 'Lape snape kepe zuvi, ..varvino liezuvi, duok lapute paragaut, eik vilkeli pasigauk', 'vilkas'),
(1484, 'Organinis jodo junginys, dezinfekuojamoji priemone', 'jodoformas'),
(1485, 'Nasa pilotuojamu dvivieciu erdvelaiviu serija, skraidziusi i orbitas aplink zeme 1965-1966 m', 'gemini'),
(1486, 'Garsiausias graiku komediju autorius', 'aristofanas'),
(1487, 'Savaeigis keleivinis vagonas', 'automatrise'),
(1488, 'Honduro piniginis vienetas', 'lempyra'),
(1489, 'Lietliaudies posakis: juodos rankos pasauli ...', 'peni'),
(1490, 'Kaip pavadintas pats katastrofiskiausias per visa zmonijos istorija gripas, siautes 1918-1920mir nusineses per 20 mlngyvybiu', 'ispaniskasis'),
(1491, 'Xx apradzioje - bevielio telegrafo atmaina,daugelio saliu kariuomeneje ir prekybos laivyne atstojusi arba papildziusiiprastini telegrafa', 'radiofonija'),
(1492, 'Kada paskelbta didzioji laisviu chartija anglijoje', '1215'),
(1493, 'Vyskupo ar abato lazda, ilga ir puosni, virsuje uzsibaigianti spirale', 'pastoralas'),
(1494, 'Mases vienetas lygus 100 kg.', 'centneris'),
(1495, 'Sugebejimas tam tikromis salygomis islaikyti tam tikras savybes', 'zaideju_pagrindine_informacija_4hj7sd4vostaze'),
(1496, 'Mokslas apie hidrosfera, jos kilme, savybes, dinamika, saveika su kitais zemes geografiniais elementais', 'hidrologija'),
(1497, 'Seniausio germanu rasto zenklai [dgs.]', 'runos'),
(1498, 'Pilnutinis mechanines energijos palaipsnis mazejimas sistemoje, jai virstant kitu rusiu (nemechanine) energija', 'energijos disipacija'),
(1499, 'Kaip vadinamos mendelejavo elementu lenteles eilutes [dgsvard.]', 'periodai'),
(1500, 'Augalai arba gyvunai, paplite tam tikroje teritorijoje', 'endemikai'),
(1501, 'Zemaitiskai: sunki muzika [rokas, metalas] arba elektrinis pjuklas malkoms pjauti', 'zeimaris'),
(1502, 'Kazachstano piniginis vienetas', 'tenge'),
(1503, 'Laisvos formos fantazija liaudies dainu ir sokiu temomis', 'rapsodija'),
(1504, 'Sasiauris, jungiantis jonijos ir tirenu juras [kilm.]', 'mesinos'),
(1505, 'Ugandos sostine', 'kampala'),
(1506, 'Kai kuriu afrikos negru genciu avilio arba kupoloformos bustas - i zeme ikaltos kartys, dengtos zole, dembliais arba apipiltosmoliu', 'pontokas'),
(1507, 'Atenu politinis veikejas, karvedysperiklio aukletinis, sokrato mokinyspo nikijo taikos atnaujines kara su peloponeso sajunga', 'alkibiadas'),
(1508, 'Kuko salu sostine', 'avaruja'),
(1509, 'Kam priklauso daugiausia imustu ivarciu per reguliaruji sezona nhl rekordas (orig.)', 'gretzky'),
(1510, 'Menuo, per kuri musulmonai laikosi griezto pasninko', 'ramadanas'),
(1511, 'Auksciausia europos virsune', 'monblanas'),
(1512, 'Vyriausio tibeto valdovo ir lamaizmo tikejimo vadovo titulas', 'dalailama'),
(1513, 'Pikaso daina, 2001m radiocentro metu daina', 'asarele'),
(1514, 'Pagal kokia skale matuojami zemes drebejimai', 'richterio'),
(1515, 'Kaip vadinosi pirmasis pasaulyje bombonesis [orig.]', 'etrich'),
(1516, 'Dideles imones, istaigos ar organizacijos atskirai veikiantis skyrius', 'filialas'),
(1517, 'Centrines ir vidurines azijos, sibiro klajokliu palapine', 'jurta'),
(1518, 'Skaudus, jautrus', 'opus'),
(1519, 'Kas sukonstravo pirmaji garvezi [orig.]', 'stephenson'),
(1520, 'Is zuvu ir banginiu atlieku gaminamos trasos', 'guanas'),
(1521, 'Nedidelis lengvos konstrukcijos dekoratyvinis pastatas, daznai su azurinemis sienomis', 'altana'),
(1522, 'Nuodinga medziaga, naudota anksciau kaip saldymo agentas saldytuvuose', 'freonas'),
(1523, 'Sent lusijos sostine', 'kastris'),
(1524, 'Inkstu uzdegimas; pazeidziami daugiausia inkstu kamuoleliai', 'glomerulonefritas'),
(1525, 'Statyboje naudojamas irankis daiktu daiktu vertikalumui nustatyti', 'svambalas'),
(1526, 'Daugiausiai lkl cempionu ziedu iskovojes krepsininkas', 'sestokas'),
(1527, 'Lietuvos pajurio sostine', 'klaipeda'),
(1528, 'Prietaisas vandeniui pasemti is reikiamo gylio labaratoriniams tyrimams', 'batometras'),
(1529, 'Kosmodromas kazachstane, i srytus nuo aralo juros, is kurio buvusi sovietu sajunga leido dauguma savo zemes palydovu, tarp ju visus pilotuojamus erdvelaivius', 'baikonuras'),
(1530, 'Pazinimo teorijos kryptis, teigianti, jog protas esas tikro zinojimo saltinis', 'racionalizmas'),
(1531, 'Islandijos gyventojai', 'islandai'),
(1532, 'Chromosomos ar chromatides fragmento praradimas del chromosomos trukiu', 'delecija'),
(1533, 'Antras pagal dydi lietuvos miestas, isikures nemuno ir neries santakoje', 'kaunas'),
(1534, 'Sventuju gyvenimo aprasymai krikscioniskoje tradicijoje', 'hagiografija'),
(1535, 'Vienas is keliu skirtingu to paties dalyku aiskinimas', 'versija'),
(1536, 'Ivairiablakstieniu infuzoriju burio pirmuonis', 'balantidija'),
(1537, 'Lynas kroviniams kelti strele', 'gordenis'),
(1538, 'Kas isrado gyvsidabrio termometra', 'farenheitas'),
(1539, 'Senoves graikijoje nimfa visiskai sunykusi del meiles narcizui', 'echo'),
(1540, 'Vokieciai si augala vadina pagonisku javu', 'grikis'),
(1541, 'Nebaigtas fkafkos romanas apie individa, susidurusi su nesuvokiamais ir neapciuopiamais valdzios mechanizmais', 'pilis'),
(1542, 'Aktorius atlikes pagrindinius vaidmenis filmuose zalioji mylia, prarastasis, o uz vaidmenis filmuose filadelfija ir forrest gump pelnes geriausio metu aktoriaus oskarus: tom ..[orig.]', 'hanks'),
(1543, 'Automobiliu gamintojas isleides siuos modelius: getz, santa fe, matrix, trajet', 'hyundai'),
(1544, 'Politikos veikejas', 'politikas'),
(1545, 'Didziausia tautine mazuma lietuvoje', 'rusai'),
(1546, 'Prusu pozemio ir mirties dievas', 'patulas'),
(1547, 'Estetizmo salininkas', 'estetas'),
(1548, 'Zymusis sokoladinis kiausinis', 'kinder'),
(1549, 'Asmuo, turintis aukstaji medicinini ar veterinarini issilavinima, gydantis ligonius ir atliekantis profilaktini darba', 'gydytojas'),
(1550, 'Kokiu skaiciumi prasideda prancuzijos bruksninis prekinis', 'kodas'),
(1551, 'Graiku mitologijoje - misku dievas', 'manas'),
(1552, 'Istatymo nustatytas laiko tarpas kokiai nors valstybes valdzios institucijai veikti ar pareigunui eiti pareigas', 'kadencija'),
(1553, 'Miestas didziojoje britanijoje,  kurio kile atlikejai tricky, massive attack, portishead', 'bristolis'),
(1554, 'Senatenu prisiekusiuju teismas', 'helieja'),
(1555, 'Iskilmiu diena', 'svente'),
(1556, 'Valdzios ir teises sistema, grindziama vyro pranasumu pries seimos ar gimines moteris ir vaikus', 'patriarchatas'),
(1557, 'Kaip vadinamas savaiminis medziagu judanciu daleliu maisymasis', 'difuzija'),
(1558, 'Jav prezidentas, kuris buvo atsakingas uz nasa sukurima, antrojo pasaulinio karo metu vadovaves d-day operacijai normandijoje', 'eizenhaueris'),
(1559, 'Gyventoju atsikelimas gyventi kitos salies', 'imigracija'),
(1560, 'Valstybe, kurios futbolo nacionaline rinktine 1998mpusfinalyje po baudiniu serijos pralaimejo brazilams', 'olandija'),
(1561, 'Jupiterio palydovas, pavadintas nimfos, kuria pagrobe dzeusas, vardu', 'tebe'),
(1562, 'Oficiali kalba gvinejoje [ekvatorineje gvinejoje]', 'ispanu'),
(1563, 'Japonijos smulkus pinigas', 'senas'),
(1564, 'Pazinimo teorija', 'gnoseologija'),
(1565, 'Kaip turetume vadinti faila', 'byla'),
(1566, 'Degtas grynas molis', 'terakota'),
(1567, 'Fizikiniu, cheminiu ir biologiniu procesu produktai, iskrite nuosedu kaupimosi zonoje', 'nuosedos'),
(1568, 'Keli keliniai zaidziami per vienas amerikietiskojo futbolo rungtynes', '4'),
(1569, 'Vytauto diziojo gimimo metai', '1350'),
(1570, 'Didelis ezeras rusijoje netoli sankt peterburgo ir suomijos sienos', 'ladoga'),
(1571, 'Antrininkes sakinio dalys, kurios atsako i klausimus kur? kada? kaip? kiek? kodel? kuriuo tikslu?', 'aplinkybes'),
(1572, 'Statmenas kasinys, kurio gylis kelis kartus didesnis uz skerspjuvi, irengiamas vandeniui, naftai, surymui isgauti', 'sulinys'),
(1573, 'Aktas, kuris uzmezge rysius su svedija ir nutrauke unija su lenkija', 'kedainiu sutartis'),
(1574, 'Rasytojo sluckio vardas', 'mykolas'),
(1575, '13 apirmoje puseje egipto sultonu asmens gvardija, sudaryta is tiurku ir kaukazieciu belaisviu', 'mameliukai'),
(1576, 'Kiek valstybiu ribojasi su baltijos jura', '9'),
(1577, 'Kuriais metais buvo pradeti naudoti bankomatai', '1967'),
(1578, 'Naujosios zelandijos administracinis vienetas', 'regionas'),
(1579, 'Valstija indijos vakaruose, prie arabijos juros; ribojasi su pakistanu', 'gudzaratas'),
(1580, 'Kristaus prisikelimo svente', 'velykos'),
(1581, 'Anglijos auksciausioji futbolo lyga', 'premier'),
(1582, 'Kelintais metais buvo sukurta pirmoji roko opera', '1962'),
(1583, 'Spygliuociu miskas', 'taiga'),
(1584, 'Pasauline baltosios lazdeles (akluju) diena', 'spalio 15'),
(1585, 'Pirmoji kronikose (854 m., rimberto kronikoje) pamineta lietuvos gyvenviete', 'apuole'),
(1586, 'Profesorius, akademikas, dabartinis vilniaus universiteto rektorius benediktas...', 'juodka'),
(1587, 'Sistema tikejimosi, lukesciu, reikalavimu, kad individas atliks savo vaidmenis grupeje pagal atitinkamas normas', 'ekspektacija'),
(1588, 'Virsutine, placiausia rykles dalis', 'nosiarykle'),
(1589, 'Kiek mazdaug centimetru uzauga rankos nagas per metus', '2,5'),
(1590, 'Tevynes ilgesys', 'nostalgija'),
(1591, 'Ka lotyniskai reiskia ad libitum', 'pasirinktinai'),
(1592, 'Zaratustros palydovais buvo du gyvunai vienas is ju - erelis, kas gi kitas?', 'gyvate'),
(1593, 'Geguzes menesi gimusiuju akmuo', 'smaragdas'),
(1594, 'Zmogus arba gyvunas, turintis vyriskosios ir moteriskosios lyties pozymiu', 'hermafroditas'),
(1595, 'Saules sistemos planeta, kurios palydovai pavadinti sekspyro personazu vardais', 'uranas'),
(1596, 'Tvirtoves arba itvirtinto rajono kariuomenes virsininkas', 'komendantas'),
(1597, 'Daininga lyrine operos arija', 'kavatina'),
(1598, 'Viena triju pagrindiniu (dar yra katalikybe ir staciatikybe) krikscionybes krypciu', 'protestantizmas'),
(1599, 'Senlietuviu deive, skatinusi visokios augalijos augima ir klestejima, linu globeja', 'vaisgamta'),
(1600, 'Krikscioniu svente, svenciama septynios savaites pries velykas, antradieni', 'uzgavenes'),
(1601, 'Neleidzia kraujui teketi atgal', 'voztuvai'),
(1602, 'Vejas, kuris keicia krypti 2 kartus per para', 'brizas'),
(1603, 'Jura, esanti tarp apeninu pusiasalio ir sardinijos salos', 'tirenu'),
(1604, 'Cirko artistas, lyno akrobatas', 'ekvilibristas'),
(1605, 'Indijos nacionalinio issivadavimo judejimo veikejas, vadovaves bengalijos burzuazinem politinem organizacijom', 'benerdzis'),
(1606, 'Suapvalintas gotiskas sriftas', 'rotunda'),
(1607, 'Alkaloidas, tropino ir tropines rugsties esteris', 'atropinas'),
(1608, 'Xx aii pmodernistines dailes kryptisdailininkai tikrove parodo nepaprastai tiksliai ir siekia kuo didesnio naturalistinio ispudzio', 'hiperrealizmas'),
(1609, 'Ka, is arabu kalbos isvertus, reiskia maroko sostines pavadinimas', 'pergales stovykla'),
(1610, 'Savanoriskoji krasto apsaugos tarnyba', 'skat'),
(1611, 'Auksciausias normines galios aktas', 'konstitucija'),
(1612, 'Saunamasis ginklas be detuves', 'vienasuvis'),
(1613, 'Ne taikos metas', 'karas'),
(1614, 'Grybu sostine', 'varena'),
(1615, 'Zydu burzuazinio nacionalizmo pagrindine kryptis', 'sionizmas'),
(1616, 'Automobilio transmisijos dalis, leidzianti varantiesiems ratas suktis skirtingais greiciais (posukyje ir pan.)', 'diferencialas'),
(1617, 'Sviesiausia vezio zvaigzdyno zvaigzde', 'akubena'),
(1618, 'Nekaltybes atemimas', 'defloracija'),
(1619, 'Rusijos sostine', 'maskva'),
(1620, 'Sidabrine lenkijos ir lietuvos valstybes moneta, lygi 10 grasiu', 'ortas'),
(1621, 'Koks matavimo vienetas lygus 16kg', 'pudas'),
(1622, 'Dvieju reiskiniu santykis, kai vienas yra pagrindas atsirasti kitam', 'priezastingumas'),
(1623, 'Kelintais metais buvo pirma karta lektuvu sekmingai perskristas lamanso sasiauris', '1909'),
(1624, 'Zymiausias danu astronomas', 'brahe'),
(1625, 'Kietos, vandenyje ir organiniuose tirpikliuose netirpios gamtines ir sintetines medziagos, turincios judriu jonu, kuriuos gali pakeisti kiti jonai, is tirpalu isskirti anijonus ir katijonus', 'jonitai'),
(1626, 'Gydytoju pasitarimas ligai issiaiskinti ir jos gydyma nustatyti', 'konsiliumas'),
(1627, 'Kiek europos sajungos veliavoje yra zvaigzdziu', '12'),
(1628, 'Nemalonus kvapas, smarve, dvokas', 'tvaikas'),
(1629, 'Tarptautinis pasitarimas, kuriuo nors specialiu, dazniausiai moksliniu klausimu', 'simpoziumas'),
(1630, 'Titaniko zudikas', 'ledkalnis'),
(1631, 'Vyriskas moteru plaukuotumas', 'hirsutizmas'),
(1632, 'Krastine pietvakariu europos valstybe,kuri ribojasi tik su viena salimi siaureje bei rytuose, o likusia salies puse skalauja atlanto vandenynas', 'portugalija'),
(1633, 'Medis, is kurio syvu majai gamino kramtomaja guma', 'kauciukmedis'),
(1634, 'Prancuzijos architekturai budingi miesto rumai (statyti xvi - xviii a.)', 'otelis'),
(1635, 'Langas rodomiems daiktams isdelioti', 'vitrina'),
(1636, 'Prancuzu tapytojas, grafikas, gyvenes xix aluvre kopijavo italu renesanso ir xvii ameistru kurinius', 'mane'),
(1637, 'Laivas, varomas garo varikliu', 'garlaivis'),
(1638, 'Pirmoji moteris, gavusi nobelio premija', 'marija kiuri'),
(1639, 'Dziaugsmo sukis', 'valio'),
(1640, 'Tarptautiniu telekomunikaciju sajungos padalinys, nustatantis tarptautiniu telekomunikaciju standartus', 'ccitt'),
(1641, 'Ilgiausias dantis', 'iltis'),
(1642, 'Krikscionybes sventoje knygoje - apokalipseje (apreiskime jonui) - lemiamos kovos vieta', 'armagedonas'),
(1643, 'I zmogu panasus robotas', 'androidas'),
(1644, 'Graiku ir romenu sventove', 'orakulas'),
(1645, 'Laukines medziojamosios avys', 'muflonai'),
(1646, 'Nosies ertmes gleivines uzdegimas', 'rinitas'),
(1647, '6-a labiausiai urbanizuota pasaulio salis (93% miesto gyv.)', 'didzioji britanija'),
(1648, 'Keltu deive, globojusi vaisinguma', 'epona'),
(1649, 'Senoves graiku smulki varine moneta', 'lepta'),
(1650, 'M-1 laida po triju vede marazas ir ...', 'tomazas'),
(1651, 'Aliejus su sikatyvo priemaisa (gaunamas kaitinant semenu ar kita alieju su svino, kobalto, mangano linoleatu, rezinatu)', 'pokostas'),
(1652, 'Sis rasytojas bei publicistas laikomas vienas is sionizmo pradininku', 'herclis'),
(1653, 'Zaibas be griaustinio', 'amalas'),
(1654, 'Toksine medziaga kitaip', 'ksenobiotikas'),
(1655, 'Kikiliu seimos paukstelis', 'dagilis'),
(1656, 'Medziagos, kurios patekusios i organizma, sutrigdo gyvybinius procesus', 'nuodai'),
(1657, 'Galaktika, kuriai priklauso musu zeme', 'pauksciu takas'),
(1658, 'Nera antonimas', 'yra'),
(1659, 'Visiems zinoma, nuvalkiota tiesa', 'truizmas'),
(1660, 'Europoje vartojamas japonijos ir kinijos budistu vienuolyno pavadinimas', 'bonza'),
(1661, 'Zvaigzdynas, simbolizuojantis egipto valdovo evergeto zmonos auka dievams uz vyro sekme kare: berenikes ...', 'garbanos'),
(1662, 'Zaizdos zyme', 'randas'),
(1663, 'Kuriais metais atidarytas pirmasis ivaziuojamas (automobilinis) kino teatras', '1933'),
(1664, '14-a valstija, prijungta prie jav 04.03.1791 m., sostine montpeleris [liet.]', 'vermontas'),
(1665, 'Dekoratyvinis dailes ir architekturos elementas: puosniai ireminta plokstuma, skirta irasui, herbui, emblemai ir kt.', 'kartusas'),
(1666, 'Princa pamilusi juru butybe', 'undine'),
(1667, 'Sekli vieta', 'sekluma'),
(1668, 'Angliskai pergale', 'victory'),
(1669, 'Ketvirtasis jav prezidentas', 'medisonas'),
(1670, 'Egipte gimes ir slapciomis isaugintas, vaikyste faraonu rumuose praleides senoves hebraju genciu vadas, isvadaves jas is egipto nelaisves', 'moze'),
(1671, 'Keturi su puse', 'puspenkto'),
(1672, 'Didziausias greitis pasaulyje', 'sviesos'),
(1673, 'Feodaline teokratine musulmonu visuomenes organizacijos ir valdymo sistema', 'kalifatas'),
(1674, 'Estu pirmosios nacionalines operos autorius', 'avas'),
(1675, 'Uzuomina, nuoroda i kita literaturos kurini', 'aliuzija'),
(1676, 'Bavarijos (vokietijos zeme) sostine', 'miunchenas'),
(1677, 'Kunas, savo trauka uzlenkiantis pro ji pralekiancius elektromagnetinius spindulius', 'gravitacinis lesis'),
(1678, 'Klajojantis, elgetaujantis musulmonu vienuolis', 'fakyras'),
(1679, 'Persijos sidabrine, veliau auksine moneta buvusi apyvartoje iki 1932 metu', 'tumanas'),
(1680, 'Pilies kambarys, svetaine', 'mene'),
(1681, 'Viena is al gizos piramidziu', 'mikerino'),
(1682, 'Planeta, kurios vardu vadinami galingi kino prozektoriai', 'jupiteris'),
(1683, 'Elektronikos saka, tirianti elektriniu signalu vertimo optiniais ir atvirksciai metodus', 'optronika'),
(1684, 'Delnas ir pirstai sudeti taip, kad butu galima ka nors pasemti', 'sauja'),
(1685, 'Rastine; istaigos skyrius, kuriame atliekama rastvedyba', 'kanceliarija'),
(1686, 'Ar yra oro vakuume taip/ne', 'ne'),
(1687, 'Apgaulioji atmintis psichologijoje, dar zinoma kaip deja-vu', 'paramnezija'),
(1688, 'Senoves graikijoje - namo dalis, skirta moterims, namu ukiui', 'ginekeja'),
(1689, 'Pavadinimas, kuriuo buvo vadinama 1919-1933mvokietija: ..respublika', 'veimaro'),
(1690, 'Aplinkybe, irodanti, kad kaltinamasis negalejo padaryti nuskikaltimo, nes jo metu buvo kitur', 'alibi'),
(1691, 'Charakterio tipas, kuriam budinga egocentrizmas, poreikis dominuoti, noras bet kokia kaina atkreipti i save demesi, teatraliskas demesys', 'isteroidas'),
(1692, 'Karo belaisviu stovykla vokietijoje ii pasaulinio karo metais, skirta puskarininkiams ir eiliniams', 'stalagas'),
(1693, 'Senovine kursiu zeme', 'pilsotas'),
(1694, 'Kaimas vilkaviskio rajone, tautos patriarcho jbasanaviciaus gimtine', 'ozkabaliai'),
(1695, 'Maziausias ir seniausias muziejus, irengtas dionizo poskos sodyboje', 'baublys'),
(1696, 'Senoves graiku filosofijos mokykla, kuria ikure euklidas magarietis iv aprkr.', 'megarika'),
(1697, 'Misle: sepetys repetys, auksta pili pastatys', 'greblys'),
(1698, 'Augalai augantys ant kitu augalu', 'epifitai'),
(1699, 'Skerslysve kitaip', 'atara'),
(1700, 'Mastymo psichologijos dalis, nagrinejanti zmogaus kurybines veiklos desnius, ieskanti sudetingu uzdaviniu sprendimo geriausiu budu', 'euristika'),
(1701, 'Daugelio sporto saku sudetine dalis; lengvosios atletikos saka, apimanti 2/3 jos rungciu', 'begimas'),
(1702, 'Pauze eilerascio eilutes viduryje', 'cezura'),
(1703, 'Keturvietis lengvojo automobilio kebulas, kurio virsus ties antraja sedyniu eile atidengiamas (orig.)', 'landau'),
(1704, 'Atramu jungiamasis elementas', 'sija'),
(1705, 'Visiems musulmonams sventas miestas', 'meka'),
(1706, 'Nedidele zmoniu grupe, kurios rankose sukoncentruota valstybes valdzia', 'oligarchija'),
(1707, 'Daugybos rezultatas', 'sandauga'),
(1708, 'Daugiagalvis suo, saugantis pozemines hado karalystes vartus', 'cerberis'),
(1709, 'Didziojo prusu sukilimo vadovas', 'herkus mantas'),
(1710, 'Lavonine kitaip', 'morgas'),
(1711, 'Faraonas valdes egipta apie 2778 prkr.', 'dzoseris'),
(1712, 'Toks pat, identiskas', 'tapatus'),
(1713, 'Zeme gaubiantis vandens sluoksnis: vandenynu, juru, ezeru, upiu visuma', 'hidrosfera'),
(1714, 'Salis, kuriai iki 1999 mpriklause rytu timoro valstybe', 'portugalija'),
(1715, 'Kokia geometrine figura yra svenciausiosios trejybes simbolis', 'trikampis'),
(1716, 'Spindesys aplinkui dailes kurinyje vaizduojamo sventojo galva', 'aureole'),
(1717, 'Romos imperatoriaus paskirtas judejos prokuratorius (26-36 mpo kr.), patvirtines zydu tarybos priimta jezaus kristaus mirties nuosprendi: poncijus ...', 'pilotas'),
(1718, 'Labiausiai urbanizuota pasaulio salis pagal miesto gyventoju procenta (100%)', 'monakas'),
(1719, 'Kuriais metais danu mokslininkas erstedas pastebejo, kaip elektros sroves veikiama pasisuko kompaso rodykle', '1820'),
(1720, 'Mineralas, vario oksidas, raudonoji vario ruda', 'kupritas'),
(1721, 'Cheminis elementas, kurio sumbolis b', 'boras'),
(1722, 'Posakis: blogi darbai akis ...', 'bado'),
(1723, 'Salis, kurios domeno vardas yra .kw', 'kuveitas'),
(1724, 'Kada isteigtas zuvinto rezervatas', '1937'),
(1725, '3,8 litro jav = 1 ...', 'galonas'),
(1726, 'Zemes plutos uolienu cheminis ir mechaninis dulejimas', 'korozija'),
(1727, 'Atsiskaitymo tvarka, kai bankas, tiekejo pavestas, isipareigoja priimti is gavejo tiekejui priklausancius pinigus', 'inkaso'),
(1728, 'Svarbiausi babilonieciu kosmoso dievai buvo: enlilis, ea ir ...', 'anas'),
(1729, 'Vokietijos federacinis krastas, kurio sostine dresdenas', 'saksonija'),
(1730, 'Vezininku skyrius ligonineje', 'onkologinis'),
(1731, 'Deive, kuri pagal senlietuviu tikejima, valtele saule perkelianti pozeminemis mariomis (baltijos jura) i rytus', 'perkunele'),
(1732, 'Senovinis rasomasis stalas, primenantis dvieju aukstu spintele', 'sekreteras'),
(1733, 'Funkcine dvieju defektuotu virusu saveika, nulemianti ju galimybe replikuotis salygose, kuriose vieno atskiro viruso replikacija butu neimanoma', 'komplementacija'),
(1734, 'Kategorija, isreiskianti nesutapima (skyrimasi) tarp kainu, parduodamoms ir perkamoms prekems', 'kainu zirkles'),
(1735, 'Pagal biblija, treciasis adomo ir ievos sunus, gimes jau po to, kai kainas nuzude abeli', 'setas'),
(1736, 'Rusu rasytojas, pjesiu zuvedra, trys seserys, vysniu sodas autorius', 'cechovas'),
(1737, 'Daiktu ar pinigu losimas pagal bilietus', 'loterija'),
(1738, 'Vyrvardas, kiles is lotkalbos, reiskia gimes viespaties diena', 'dominykas'),
(1739, 'Populiariausia pavarde japonijoje', 'satou'),
(1740, 'Smelyno spygliuociu miskas', 'silas'),
(1741, 'Graiku kompozitorius ir muzikantas', 'vangelis'),
(1742, 'Indelis skysciams ar dujoms tirti', 'kiuvete'),
(1743, 'Nesisteminis ilgio vienetas, lygus 0,1 nm', 'angstremas'),
(1744, 'Lietuviu gedulo diena, kuomet rusai uzeme tv boksta', 'sausio 13'),
(1745, 'Kariuomenes isvedimas is jos uzimamos teritorijos', 'evakuacija'),
(1746, 'Sviesai nelaidi negatyvo dezute', 'kasete'),
(1747, 'Vitaminas reikalingas kraujui kreseti (jo turi spinatai, kopustai, dilgeles, morkos ir pomidorai)', 'k'),
(1748, 'Senai ekranizuotas, garsus tenesio viljamso kurinys', 'geismu tramvajus'),
(1749, 'Argentinos smulkus pinigas', 'sentavas'),
(1750, 'Kaledu senis arba santa ...', 'klausas'),
(1751, 'Arabu saliu religija', 'islamas'),
(1752, '..tyrimas (nuoseklus, tesingas, pilnas)', 'nuodugnus'),
(1753, 'Graiku mitologijoje - dangus, titanu tevas, gejos(zemes) vyras', 'uranas'),
(1754, 'Kurios nors zmoniu socialines bendrijos elgesio ypatybes, priklausancios nuo visuomenines psichologijos', 'iprociai'),
(1755, 'Vabzdziaedis augalas, kartais uzkandziaujantis varlemis', 'dioneja'),
(1756, 'Kokia baltosios meskos dalis, pasak kinu,turi gydomuju galiu', 'tulzis'),
(1757, 'Giliausia ramiojo vandenyno vieta (~11km): ..duburys', 'marijanu'),
(1758, 'Kokios veisles suo pirmasis pateko i kosmosa: sibirine ...', 'laika'),
(1759, 'Kokios nors gyvunu rusies elgesio nuoseklus aprasymas arba schema', 'etograma'),
(1760, 'Reljefas, kurio plastinis vaizdas is plokstumos iskiles daugiau kaip per puse vaizduojamojo objekto apimties', 'horeljefas'),
(1761, 'Kauno miesto dalis, turinti savo gelezinkelio stoti', 'palemonas'),
(1762, 'Medzio raizybos technika; siuo budu sukurtas kurinys', 'ksilografija'),
(1763, '1904-07 metais susidares d.britanijos, prancuzijos ir rusijos karinis politinis blokas', 'antante'),
(1764, 'Hedonistu pasekejai, kalbantys apie pasekmes, teikiantys pirmenybe saikingumui ir sveikuoliskai gyvensenai', 'nominalistai'),
(1765, 'Prekiu reikalingumas pirkejams', 'paklausa'),
(1766, 'Kokios salies (vnskilm.) domeno vardas yra .ml', 'malio'),
(1767, 'Akies uzdangalas', 'vokas'),
(1768, 'Iki 8 savaites busimasis kudikis vadinamas gemalu arba ...', 'embrionu'),
(1769, 'Kuno dalies gedimas del kraujotakos sutrikimo', 'gangrena'),
(1770, 'Gyvunu rusiu visuma', 'fauna'),
(1771, 'Tikroji boksininko muhamedo ali pavarde: cassius ..[orig.]', 'clay'),
(1772, 'Japonu mitologijos deive, tapatinama su saule; imperatoriu pramote', 'amaterasu'),
(1773, 'Juru burlaivis su istrizosiomis buremis ant laivagalio stiebo', 'barkas'),
(1774, 'Luomine grupe', 'kasta'),
(1775, 'Somalio sostine', 'mogadisas'),
(1776, 'Lietliaudies patarle: lengva patarti, sunku ...', 'padeti'),
(1777, 'Skaitmuo rodantis daikto vieta tokiu pat daiktu eileje', 'numeris'),
(1778, 'Saltas padazas is rafinuoto aliejaus, kiausinio tryniu, pieno milteliu ir prieskoniu', 'majonezas'),
(1779, 'Diplomatinis aktas, smulkiai isdestantis kurio nors klausimo esme, faktine ir teisine argumentacija', 'memorandumas'),
(1780, 'Gruzijos smulkus pinigas', 'tetris'),
(1781, 'Gipso, kalkiu, smelio, kliju ir dazu misinys, is kurio gaminami sienu, lubu puosybos elementai', 'stiukas'),
(1782, 'Netikra motina', 'pamote'),
(1783, 'Zymus lietuvos konstitucines teises mokslininkas, parases veikala valstybe', 'riomeris'),
(1784, 'Koki zodi, isvertus is japonu kalbos, atitinka fraze dieviskasis vejas', 'kamikadze'),
(1785, 'Cheminiu elementu junginiai su vandeniliu', 'hidridai'),
(1786, 'Karaliaus lyro autorius', 'sekspyras'),
(1787, 'Minkstuju kvieciu atmaina su rausva beakuote varpa ir rausvais grudais', 'milturumas'),
(1788, 'Lietuvos respublikos ministras pirmininkas1939.03.28-1939.11.21', 'cernius'),
(1789, 'Lasteles ertme, pilna skyscio', 'vakuole'),
(1790, 'Begaline pasaulio egzistavimo trukme, kuria salygoja materijos nesukuriamumas ir nesunaikinamumas', 'amzinybe'),
(1791, 'Medziaga, kurios agregatine busena yra tarpine tarp kietosios ir dujines busenu', 'skystis'),
(1792, 'Kada buvo israsta mechanine klaviatura (spausdinimo masinele), kuri pakeite iki tol esama svino raidziu deliojimo technologija', '1885'),
(1793, 'Tapyba vasko dazais', 'enkaustika'),
(1794, 'Miestas, is kurio pakilo lituanika, atlikdama legendini skrydi', 'niujorkas'),
(1795, 'Apdaro elementas - puosni sagtis, suseganti atskiras drabuzio dalis arba pritvirtinanti ka nors prie kepures', 'agrafa'),
(1796, 'Bambuko ugliais mintanti kinijos meska', 'panda'),
(1797, '5-a maziausia pasaulio valstybe', 'san marinas'),
(1798, 'Talentingas karvedys, pirmasis mongolu imperatorius indijoje [liet.]', 'baburas'),
(1799, 'Anglu chemikas, kuris tirdamas elektrolize atrado kali, natri ir kalci, isskyres siuos metalus gryna forma', 'deivis'),
(1800, 'Is brazilijos kiles sokis; sokama poromis, labai susiglaudus ir geidulingai kraipant klubus', 'lambada'),
(1801, 'Iskastinis roplys', 'dinozauras'),
(1802, 'Vandens paukstis, panasus i alka', 'narunelis'),
(1803, 'Europos sajungos programa, skirta muitines darbuotoju mokymui, ju kvalifikacijos kelimui, keitimusi patirtimi [orig.]', 'matthaeus'),
(1804, 'Didziosios britanijos herbo simboliai: liutas ir ...', 'vienaragis'),
(1805, 'Mokslas, tiriantis saudmenu judejimo desnius', 'balistika'),
(1806, 'Kuriais metais pastatytas pirmasis daugiaaukstis garazas', '1901'),
(1807, 'Saturno ir opes dukte', 'vesta'),
(1808, 'Kurio nors junginio ar misinio sudedamoji dalis', 'ingredientas'),
(1809, 'Kieno nors ukines ir gamybines apyvokos daiktu visuma', 'inventorius'),
(1810, 'Boulingo figura', 'keglis'),
(1811, 'Bokso taisykliu pazeidimas - priesininkai suima vienas kito rankas arba liemeni', 'klincas'),
(1812, 'Tanki antonimas', 'reta'),
(1813, 'Alegoriskas pamokomasis pasakojimas', 'pasakecia'),
(1814, 'Griztamojo proceso, vykstancio be silumos mainu su aplinka kreive', 'adiabate'),
(1815, 'Raugintas pasaras', 'silosas'),
(1816, 'Gyvunas, kurio pienas yra daugiau negu 54% riebumo', 'banginis'),
(1817, 'Teritorija, kur saugomas visas gamtos kompleksas', 'rezervatas'),
(1818, 'Uzpakaline zmogaus pedos dalis, tarp blauzdos ir kojos padikauliu', 'ciurna'),
(1819, 'Kuriais metais laosas tapo nepriklausomas nuo prancuzijos', '1953'),
(1820, 'Dramos kurinio autoriaus pastaba pjeses tekste', 'remarka'),
(1821, 'Artimu ar gretimu muzikos garsaeilio garsu saskambis', 'klasteris'),
(1822, 'Napoleono vardas', 'bonapartas'),
(1823, 'Mechanizmo, masinos dalis', 'detale'),
(1824, 'Literaturos kurinyje keliancios pasislykstejima scenos, samojis susijes su ismatomis', 'skatologija'),
(1825, 'Akiu pazeidimas del elektros sroves poveikio', 'elektroftalmija'),
(1826, 'Salis, kurioje kare pries iraka (2003m.) buvo sutelktos didziausios karines pajegos - amerikieciai ir ju sajungininkai [apie 150 tukstkariu]', 'kuveitas'),
(1827, 'Reljefas, kurio figuros daugiau kaip per puse savo turio iskilusios virs pavirsiaus', 'horeljefas'),
(1828, 'Zydu kalba', 'aidis'),
(1829, 'Nenormaliai padidejes kalbos tempas', 'greitakalbyste'),
(1830, 'Desimtkojis juru veziagyvis', 'omaras'),
(1831, 'Oficiali kalba ekvadore', 'ispanu'),
(1832, 'Dydis, apibudinantis lesio ar lesiu sistemos gebejima lauzti spindulius', 'lauziamoji geba'),
(1833, 'Sengraiku mitu herojes, dzeuso paverstos zvaigzdynu', 'plejades'),
(1834, 'Didziausia hitlerine moteru koncentracijos stovykla, buvusi 80 km i siaure nuo berlyno', 'ravensbriukas'),
(1835, 'Uolienu ir mineralu nepazulintu nuolauzu biri sankaupa', 'aglomeratas'),
(1836, 'Tegul kitaip', 'lai'),
(1837, 'Ekskavatoriaus dalis, ant kurios sumontuotas kausas, hidrocilindrai ir kita iranga', 'strele'),
(1838, 'Franku karalius, franku valstybes ikurejas', 'chlodvigas'),
(1839, 'Kuriais metais pradejo veikti pirmasis ignalinos atomines elektrines blokas', '1983'),
(1840, 'Oficialus suinteresuoto asmens priemimas pas auksta pareiguna', 'audiencija'),
(1841, 'Jto generalinis sekretorius 1971-1980 metais', 'valdhaimas'),
(1842, 'Mokestis, kuri reikia moketi uz teise pasinaudoti kieno nors pinigais', 'palukanos'),
(1843, 'Pozeminiai kapu tuneliai su labirintais, labiausiai paplite i-iii aromoje, neapolyje, aleksandrijoje ir kitur', 'katakombos'),
(1844, 'Zmogus, kuris vaikscioja miegodamas', 'lunatikas'),
(1845, 'Infekcine liga, kuria kuria sergant apnuodijamas organizmas, pazeidziami plauciai ir nervu sistema', 'ornitoze'),
(1846, 'Vieninteliai europoje laisveje gyvenantys primatai', 'magotai'),
(1847, 'Spalvotoji dekoracine ir siuzetine keramika', 'majolika'),
(1848, 'Sachmatu tevyne', 'indija'),
(1849, 'Rusu kompozitorius, dirigentas, 3 baletu (tarp ju -raimondos), 8 simfoniju, 7 styginiu kvartetu, 5 uvertiuru autorius', 'glazunovas'),
(1850, 'Kastruotas kuilys', 'meitelis'),
(1851, 'Sergantis epilepsija', 'epileptikas'),
(1852, 'Salies ar saliu grupes ukinio atsiskyrimo nuo kitu saliu ekonomikos politika, siekimas sukurti uzdara uki', 'autarkija'),
(1853, 'Zemaitiskai spuogas', 'pimpis'),
(1854, 'Telekomunikaciju kompanija, pagaminusi mobiliu telefonu modelius: one touch club db, one touch com, one touch pro, one touch easy hf', 'alcatel'),
(1855, 'Karpiniu seimos zuvis, tamsiai melsva arba zalsva nugara, gelsvais sonais', 'mekne'),
(1856, 'Pirmasis artilerijos teoretikas', 'tartalis'),
(1857, 'Priesdelis, naudojamas su kokio nors dydzio matavimo vienetu, reiskia 10^21', 'zeta'),
(1858, 'Zmoniskas, mylintis zmones', 'humaniskas'),
(1859, 'Sviesos atsvaitas; sviesos deme tamsiame fone', 'blikas'),
(1860, 'Nuolatiniai feodir kapitlaiku zemes ukio darbininkai, kuriu pagrindine darbo uzmokescio dali sudare ordinarija [dgs.]', 'ordinarininkai'),
(1861, 'Lengvojo automobilio kebulas su atidengiamu brezentiniu virsumi', 'kabrioletas'),
(1862, 'Liguista vandens gilumos baime', 'batofobija'),
(1863, 'Kalnai nusitiese per maroka alzyra ir tunisa', 'atlaso'),
(1864, 'Technika, kai ant drobes klijuojamos laikrasciu, medziagu, afisu skiautes, jungiant jas dazu dememis ir gaunant ivairias fakturas', 'koliazas'),
(1865, 'Rasytojas, romanu nykstukas, sibile, barabas, ahasfero mirtis, sventoji zeme autorius (liet.)', 'lagerkvistas'),
(1866, 'Smulkus prekiautojas, seniau lydedaves kariuomene ir prekiaudaves maistu bei kareiviu buities reikmenimis', 'markitantas'),
(1867, 'Medinis indas karvems melzti', 'laidytuve'),
(1868, 'Isispiriama kurpaite', 'sliperis'),
(1869, 'Dvimaciame kurinyje - aplinka, kurioje kas nors vaizduojama', 'fonas'),
(1870, 'Elektros nuolatines sroves generatorius', 'dinama'),
(1871, 'Senoves indu deive, ikunijusi visata; dievu motina', 'adite'),
(1872, 'Ruandos administracinis vienetas', 'prefektura'),
(1873, 'Lietuviu lakunas, 1933 09 22 sekmingai perskrides atlanto vandenyna', 'vaitkus'),
(1874, 'Jungo teorijoje - autonomiskas archetipas, gludintiskolektyvineje zmogaus pasamoneje ir simbolizuojantis moteriskaji jo prada', 'anima'),
(1875, 'Kokiu nors tikslu nustatytas laikas', 'terminas'),
(1876, 'Aukstesniuju gyvu butybiu (zmogaus ir gyvunu) sugebejimas numatyti veiksmu rezultata, problemos spredima, isivaizduoti atsirasiancius daiktus, reiskinius', 'anticipacija'),
(1877, 'Telekomunikaciju kompanija, pagaminusi mobiliu telefonu modelius: 7650, 8910, 6510, 6500', 'nokia'),
(1878, 'Virsutinio ir apatinio zandikauliu dantu eiliu santykis, sukandus visais dantimis', 'sakandis'),
(1879, 'Cheminis elementas, kurio simbolis ra [numeris 88]', 'radis'),
(1880, 'Apzeles zemes kauburelis', 'kupstas'),
(1881, 'Sarasas pagal katalogo numerius pasto zenklu, turimu arba trukstamu kolekcijoje', 'mankolapas'),
(1882, 'Arkine briauna, laikanti ir stiprinanti kryzmini skliauta', 'gurtas'),
(1883, 'To paties tipo bakteriju grupe', 'kolonija'),
(1884, 'Sistema, kurioje ir dispersine faze, ir dispersine terpe - skysciai', 'emulsija'),
(1885, 'Kuriais metais lietuvoje uzregistruotas pirmas automobilis', '1896'),
(1886, 'Asmuo, paimtas i rusijos kariuomene pagal rekrutu prievole', 'rekrutas'),
(1887, 'Rasytojas ..poska', 'dionizas'),
(1888, 'Mineralas, kurio kristalineje gardeleje vandens molekule egzistuoja kaip individuali dalele', 'hidratas'),
(1889, 'Kokios nors kuno dalies pasalinimo operacija', 'amputacija'),
(1890, 'Kaip vadinama kiaules nosis', 'knysle'),
(1891, 'Romos imperatorius, ivedes 7 dienu savaite ir reguliarias poilsio dienas', 'konstantinas'),
(1892, 'Togo sostine', 'lome'),
(1893, 'Metalas zymimas simboliu sn', 'alavas'),
(1894, 'Siaures amerikos oro erdves apsaugos sistema', 'dew linija'),
(1895, 'Mineralas, juros vandens spalvos ar tamsiai melyna berilo atmaina, pirmos klases brangakmenis', 'akvamarinas'),
(1896, 'Kaip vadinamas zemynas, buves pries 135 mlnmetu, susidedantis is dabartines afrikos ir pamerikos', 'gondvana'),
(1897, 'Italijos miestas, kuriame gime kkolumbas ir npaganinis', 'genuja'),
(1898, 'Amatininku korporacija, egzistavusi vidamziais turkijoje ir irane', 'esnafas'),
(1899, 'Oficiali religija islandijoje', 'liuteronybe'),
(1900, 'Fermentacijos tevas', 'pasteras'),
(1901, 'Gaiduko arba spynos dalis, kuri smogia i sovinio dugno pentele (centrinio iziebimo soviniuose) arba krasteli (ziedinio iziebimo soviniuose)', 'dauziklis'),
(1902, 'Vakaru europoje vartotas sulotynintas ibn sinos vardas', 'avicena'),
(1903, 'Antrasis jav prezidentas, pirmasis kuris gyveno baltuosiuose rumuose', 'adamsas'),
(1904, 'Kaip vadinosi vyriausiasis japonijos karo vadas, valdes sali uz imperatoriu, neturinti realios galios', 'siogunas'),
(1905, 'Vokietijos parlamento aukstieji rumai', 'bundesratas'),
(1906, 'Neauksta istisine apsaugine sienele is muro, betono, gelzbetonio, kuria aptveriama terasa, balkonas, langas, stogas, krantine', 'parapetas'),
(1907, 'Isdziuvancios arba laikinos australijos upes', 'krykai'),
(1908, 'Pirmoji automobilio auka pasaulyje - nekilnojamojo turto agentas, zuves autokatastrofoje niujorke 1899m.: herbertas ...', 'blisas'),
(1909, 'Juosva, zalsva, pilksva ar rausva plonais sluoksneliais skylanti uolienalengvai gludinama igauna blizganti pavirsiu', 'skalunas'),
(1910, 'Miestas kuriame gaminami tirpuko ledai', 'marijampole'),
(1911, '2-a maziausia pasaulio valstybe', 'monakas'),
(1912, 'Maklerio atlyginimas uz tarpininkavima sudarant birzos sanderi', 'kurtazas'),
(1913, 'Kastruotas gaidys, penimas mesai', 'koplunas'),
(1914, 'Jav prezidentas, padares sprendima numesti atomines bombas ant hirosimos ir nagasakio, prezidentaves korejos karo metu', 'trumenas'),
(1915, 'Monosacharidai, turintys aldehidine grupe', 'aldozes'),
(1916, 'Botanikos saka, tirianti samanas - ju forma, sandara, funkcijas, paplitima', 'briologija'),
(1917, 'Mokslininkas, sukures baltymu sandaros teorija [liet.]', 'albrechtas'),
(1918, 'Cirko juokdarys', 'klounas'),
(1919, 'Didziausia estijos sala', 'saarema'),
(1920, 'Latvijos nacionalinis paukstis', 'baltoji kiele'),
(1921, 'Bazes tirpalas chemijoje', 'sarmas'),
(1922, 'Romenu karo deive', 'belona'),
(1923, 'Prie telefono prijungtas automatas, kuris abonentui nesant uzraso trumpas zinutes is skambinusiu per ta laika zmoniu ir paskui jas pakartoja seiminkui', 'autoatsakiklis'),
(1924, 'Antikos mastytojas, teiges, kad viskas sudaryta is atomu', 'demokritas'),
(1925, 'Europos atomines energetikos bendrija, viena is triju europos bendriju, isteigta 1957 03 25d.', 'euratom'),
(1926, 'Bendroviu susivienijimas, turintis bendra vadovybe, bet islaikantis atskiru bendroviu teisini savarankiskuma', 'koncernas'),
(1927, 'Ikyri nepagristos baimes busena', 'fobija'),
(1928, 'Notariato darbuotojas', 'notaras'),
(1929, 'Per daug intensyvi audinio, organo arba jo dalies veikla', 'hiperfunkcija'),
(1930, 'Rankinio audimo stakliu medinis itaisas ataudu siului tarp metmenu pervesti', 'saudykle'),
(1931, 'Sviesos ratilas dailes kurinyje aplink dievo ar sventojo galva', 'aureole'),
(1932, 'Mokslas apie zemelapius, gaublius, ju sudaryma, spausdinima ir naudojima', 'kartografija'),
(1933, 'Karves ar jaucio mesa', 'jautiena'),
(1934, 'Cnn laidu vedejas ..kingas', 'laris'),
(1935, 'Kokia upe teka jav-meksikos siena', 'rio grande'),
(1936, 'Karunos pavidalo moteru galvos papuosalas is tauriuju metalu, dekoruotas brangakmeniais', 'diadema'),
(1937, 'Xx apradzios meno srove, kurios atstovai teige, kad menas, tai kurejo emociju israiska, kuri zadina ivairias pasamones busenas', 'ekspresionizmas'),
(1938, 'Skardis, susidarantis abraziniame krante nuo bangu musos', 'klifas'),
(1939, 'Kleopatros sunaus vardas', 'cezarionas'),
(1940, 'Vertikalus, ivairiai profiliuotas stulpelis, laikantis turekla', 'baliustra'),
(1941, 'Puolimas arba.....', 'ataka'),
(1942, 'Lokio ziemos guolis', 'irstva'),
(1943, 'Begine transporto priemone', 'lokomotyvas'),
(1944, 'Psichiniu poveikiu sukeliama panasi i miega busena', 'hipnoze'),
(1945, 'Jav miestas (be galunes sitis), kuriame yra pastatytas paminklas animaciniu filmu herojui jureiviui popajui; svarbus spinatu auginimo rajono centras', 'kristal'),
(1946, 'Organizmu prisitaikymas gyventi ir daugintis kitame klimate', 'aklimatizacija'),
(1947, 'Motvardas, kiles is lotkalbos, reiskia maitinanti, palaima teikianti', 'alma'),
(1948, 'Kenijos pagrindinis pinigas', 'silingas'),
(1949, 'Sukelias jausma, patraukias i save demesi', 'ekscitatyvus'),
(1950, 'Padangos arba jos kameros itaisas, leidziantis pripusti i ja oro ir neleidziantis jam iseiti', 'ventilis'),
(1951, 'Microsoft word naudojamas failu pletinys', 'doc'),
(1952, 'Turtingo musulmono namo dalis, kurioje gyvena seimininko zmonos ir suguloves', 'haremas'),
(1953, 'Prietaisas muzikos garsams isgauti', 'instrumentas'),
(1954, 'Kas 1958 metais tapo f-1 pasaulio cempionu [liet.]', 'havtornas'),
(1955, 'Skiepai kitaip', 'vakcina'),
(1956, 'Skulptorius (4 aprkr.) apoksiomenas autorius', 'lisipas'),
(1957, 'Gydomoji maloni priemone', 'masazas'),
(1958, 'Padidejes jautrumas dirginancioms medziagoms', 'alergija'),
(1959, 'Musulmonu svknyga', 'koranas'),
(1960, 'Rankinis irankis lapams, sienui grebti', 'greblys'),
(1961, 'Sveicarijos miestas ir grudine kultura', 'liucerna'),
(1962, 'Malio sostine', 'bamakas'),
(1963, 'Vietove rusijos permes srityje, didziausias kalio trasu zaliavu atsargu telkinys pasaulyje', 'solikamskas'),
(1964, 'Vienas is miegamuju vilniaus rajonu, esantis tarp fabijoniskiu ir justiniskiu', 'pasilaiciai'),
(1965, 'Sventoji, sodininku ir darzininku globeja', 'darata'),
(1966, 'Drabuziai arba..', 'apranga'),
(1967, 'Asmenvardzio (vardo, pavardes) pirmosios raides', 'inicialai'),
(1968, 'Is viskozes gaunama hidratines celiuliozes plevele', 'celofanas'),
(1969, 'Keliu aukstu lentyna bibliotekose, sandeliuose, parduotuvese', 'stelazas'),
(1970, 'Is populiacijos tyrimui atrinktu individu grupe', 'imtis'),
(1971, 'Kokio paukscio plunksna paprastai vaizduojama emblemoje, naudojamoje apipavidalinant istorijos knygu virselius, aplankus', 'zasies'),
(1972, 'Poezijos eiluciu pabaigos zodziu vienodas arba panasus skambesys', 'rimas'),
(1973, 'Receptoriai, reaguojantys i sviesos fotonus', 'fotoreceptoriai'),
(1974, 'Siaurine anglijos kaimyne', 'skotija'),
(1975, 'Daugiausiai gyventoju turintis zemynas', 'azija'),
(1976, 'Individo pasirengimas, polinkis vienaip ar kitaip elgtis, atlikti veiksmus tam tikra tvarka', 'dispozicija'),
(1977, 'Spekuliacine neoficialiu privaciu makleriu veikla birzoje', 'kulise'),
(1978, 'Iliuzinis regejimas - nejudanciu objektu suvokimas kaip judanciu', 'fi efektas'),
(1979, 'Nudilusi sluota', 'razas'),
(1980, 'Azijos tropiku palme', 'areka'),
(1981, 'Irenginys automatiskai palaikyti reikiamus oro parametrus patalpose', 'kondicionierius'),
(1982, 'Telekomunikaciju kompanija, pagaminusi mobiliu telefonu modelius: sl42, me45, s45, c45', 'siemens'),
(1983, 'Pirmasis jono maciulio - maironio slapyvardis', 'zvalionis'),
(1984, 'Prancuzijos sidabrine moneta, kaldinta nuo xivaiki 1720m.', 'livras'),
(1985, 'Aktore ..hunt', 'helen'),
(1986, 'Tarptautin&#1083; aviacijos ir kosmonautikos diena', 'balandzio 12'),
(1987, 'Lietuviskos spaudos pradininkas', 'pranciskus skoryna'),
(1988, 'Nedidelis prekybos pastatas', 'kioskas'),
(1989, 'Vestuvese - jaunuju palydovas, pajaunys', 'pabrolys'),
(1990, 'Lietuvos ryto priedas vilnieciams', 'sostine'),
(1991, 'I kelias laiko juostas suskirstyta zeme', '24'),
(1992, 'Miestas, kuriame stovejo apolono svetykla, svarbiausia senoves graikijos orakulo buveine', 'delfai'),
(1993, 'Vienintelis futbolininkas, imuses 3 ivarcius pasaulio futbolo cempionato finalinese rungtynese [liet.]', 'herstas'),
(1994, 'Parase doriano grejaus portretas', 'vaildas'),
(1995, 'Galia kitaip', 'galingumas'),
(1996, 'Cheminis elementas, kurio simbolis zr [numeris 40]', 'cirkonis'),
(1997, '2-a maziausiai urbanizuota pasaulio salis (7% miesto gyv.)', 'burundis'),
(1998, 'Del nukritusio meteorito susidares idubimas zemes, menulio arba kitu dangaus kunu pavirsiuje', 'krateris'),
(1999, 'Dvasios ramybe, kurios netrikdo isoriniai veiksniai, ypac likimo smugiai', 'ataraksija'),
(2000, 'Plati dauba vulkano virsuneje, susidariusi sprogus uzsikimsusiai vulkano stemplei arba yrant vulkana sudarancioms uolienoms', 'kaldera'),
(2001, 'Kas parase veikala apie istorijos studijas', 'burkhardtas'),
(2002, 'Biblinio judaizmo dvasininkai', 'levitai'),
(2003, 'Automoblis alfa ...', 'romeo'),
(2004, 'Iskilminga religinio pobudzio vakariene kaledu isvakarese', 'kucios'),
(2005, 'Lietuviskai ragatke', 'timpa'),
(2006, 'Kas parase aukso puodas ir kitos istorijos', 'hofmanas'),
(2007, 'Humoristine ar lyrine rusu liaudies dainele', 'ciastuska'),
(2008, 'Valstybe tarp nigerio ir mauritanijos', 'malis'),
(2009, 'Menotyros saka, tirianti daile', 'dailetyra'),
(2010, 'Zemesnysis diplomatinis rangas', 'atase'),
(2011, 'Zemes plutos sluoksniu islinkimas del tektoniniu judesiu', 'fleksura'),
(2012, 'Mokslas, tiriantis priimtinus samprotavimo budus', 'logika'),
(2013, 'Klavisiniu muzikos instrumetu, ivairiu aparatu ir mechanizmu klavisu arba mygtuku sistema', 'klaviatura'),
(2014, 'Zydu velyku valgis - paplotelis is neraugintos, nesudytos kvietiniu miltu teslos', 'macas'),
(2015, 'Mazaseriu zieduotuju kirmeliu klases bestuburis gyvunas', 'sliekas'),
(2016, 'Gamtiniai dazai', 'ochra'),
(2017, 'Federalinis tyrimu biuras', 'ftb'),
(2018, 'Seno gero multiko veikejai liolekas ir...', 'bolekas'),
(2019, 'Senovine pasto karieta', 'dilizanas'),
(2020, 'Taupus medziaginiu ar piniginiu istekliu naudojimas, taupymas', 'ekonomija'),
(2021, 'Greitasis fokstrotas [sokis]', 'kvikstepas'),
(2022, 'Krikscioniu sventoji, serganciuju maru globeja', 'rozalija'),
(2023, 'Netiesiogine, perkeltine prasme pavartotas vaizdingas zodis arba posakis', 'tropas'),
(2024, 'Zenklas senoves graikijos vergo arba nusikaltelio kune', 'stigma'),
(2025, 'Senoves graikijoje - uzkariautoju spartieciu pavergto krasto gyventojas, zemdirbys', 'helotas'),
(2026, 'Pristatytos prekes kiekio nukrypimo ribos lyginant su nurodytu sutartyje', 'fransiza'),
(2027, 'Kopijavimo aparato isradejas', 'dzefersonas'),
(2028, 'Kaip buvo vadinamas vienas didziausiu tremimu is lietuvos per kuri buvo isvezta apie 30 000 zmoniu', 'bangu musa'),
(2029, 'Produkcijos ir darbu kokybes rodikliu kiekybinio vertimo metodu visuma', 'kvalimetrija'),
(2030, 'Kdonelaicio poema', 'metai'),
(2031, 'As mazas ..., as ne lokys visai', 'debeselis'),
(2032, 'Prietaisas apsilieti vandens ciurkslemis', 'dusas'),
(2033, 'Virvele botagui priristi', 'panara'),
(2034, 'Organizuotos banditu gaujos dalyvis', 'gangsteris'),
(2035, 'Salis, kurioje gime prieskoninis augalas - vanile', 'meksika'),
(2036, 'F-1 trasa, esanti japonijoje', 'suzuka'),
(2037, 'Telefono isradejas', 'belas'),
(2038, 'Eriuko mesa', 'eriena'),
(2039, 'Lietuves tautinio kostiumo dalis - istekejusios moters galvos apdangalas', 'nuometas'),
(2040, 'Mokslas apie mokytoja', 'pedentologija'),
(2041, 'Kijevas - ..sostine', 'ukrainos'),
(2042, 'Sutartines priimtinos ir laukiamos elgesio taisykles', 'normos'),
(2043, 'Trobos patalpa', 'kamara'),
(2044, 'Hidrogeologijoje terminas siejamas su zymia hidrogeodinamine medziagos sklaida, susidarancia del didelio vandeningu uolienu, kuriomis teka vanduo, heterogeniskumo', 'makrodispersija'),
(2045, 'Pirmoji moteris, lektuvu iveikusi atlanto vandenyna', 'erhart'),
(2046, 'Danijos parlamentas', 'folketingas'),
(2047, 'Viena is dvieju nesusieinanciu sesuciu', 'akis'),
(2048, 'Ziaurus valdovas', 'tironas'),
(2049, 'Tapytojas, klasicistas, vilniaus universiteto piesimo ir tapybos katedros isteigejas', 'smuglevicius'),
(2050, 'Rutageramergaite priebalses', 'rtgrmrgt'),
(2051, 'Parodiju kurejas', 'parodistas'),
(2052, 'Randama sena gyvates oda', 'isnara'),
(2053, 'Karalisko futbolo klubo pavadinimas 2001 m sventes 100 metu jubilieju', 'real madrid'),
(2054, 'Svarbiausioji staciatikiu vyskupijos, vienuolyno ar kremliaus cerkve', 'soboras'),
(2055, 'Geomfigura, kurios plotas lygus jos istrizainiu sandaugos pusei', 'rombas'),
(2056, 'Prietaisas orientuotis pasaulio saliu atzvilgiu', 'kompasas'),
(2057, 'Senoves romoje - bet kuri renkamoji valstybinepareigybe ir ja uzimantis zmogus', 'magistratas'),
(2058, 'Valstybes atskirumas, atsiribojimas nuo bendravimo su kitomis valstybemis', 'izoliacija'),
(2059, 'Kraujo rysys tarp asmenu, kilusiu vienas is kito ar is bendro protevio', 'giminyste'),
(2060, 'Basku salies autonomines srities ispanijoje sostine', 'bilbao'),
(2061, 'Dantims reikalinga medziaga (dantu pastos sudetine dalis)', 'fluoridas'),
(2062, 'Koks paukstis simbolizuoja treciaji svenciausiostrejybes asmeni - sventaja dvasia', 'balandis'),
(2063, 'Doroviniu reikalavimu ir isipareigojimu suvokimas ir vykdymas', 'pareiga'),
(2064, 'Ledo zvake', 'varveklis'),
(2065, 'Tapetu ritinys', 'rulonas'),
(2066, 'Prancuzu dailininkas, nutapes kurinius ruano katedra, aguonu laukas, ziema bei ispudis, nuo kurio kilo impresionizmo pavadinimas', 'mone'),
(2067, 'Senoves egiptieciu deive, derlingumo ir motinystes globeja', 'izide'),
(2068, 'Norvegijos administracinis vienetas', 'apskritis'),
(2069, 'Silpnas demesio sutelkimas i objekta', 'issiblaskymas'),
(2070, 'Dievo motinos katedra paryziuje (orig.)', 'notre dame'),
(2071, 'Pagarba, pakanta priesingai nuomonei ar isitikinimui', 'tolerancija'),
(2072, 'Kalnai, einantys ispanijos-prancuzijos siena', 'pirenai'),
(2073, 'Geometrine figura, kuria sudaro taskas ir du is jos iseinantys spinduliai', 'kampas'),
(2074, 'Dailes kurinys, vaidzuojantis marija su ant jos keliu gulinciu nukankintu jezu kristumi', 'pieta'),
(2075, 'Asteroido ida palydovas', 'daktilis'),
(2076, 'Vandens, uolienos ar dirvozemio meginyje nustatomas cheminis komponentas ar fizine savybe', 'analite'),
(2077, 'Stiprus alkoholinis gerimas is spirito ir vandens', 'vodka'),
(2078, 'Klasikinis alkkokteilis, dazniausiai susidedantis is pomidoru sulciu, degtines bei prieskoniu', 'kruvinoji meri'),
(2079, 'Kokia vidurzemio juros sala antikos poetai vadino trinakrija (trikampe)', 'sicilija'),
(2080, 'Leidinio lapas, kuriame pateikiami jam atpazinti butini duomenys: antraste, autoriaus pavarde, leidimo metai, vieta, daznai ir leidyklos pavadinimas - ???????????? lapas', 'antrastinis'),
(2081, 'Istaiga kurioje perkami ir parduodami vertybiniai popieriai', 'birza'),
(2082, 'Patalpa skalbiniam dziovinti', 'dziovykla'),
(2083, 'Kariuomenes rusis, kurios pagrindinis ginklas yra saunamieji pabuklai(patrankos)', 'artilerija'),
(2084, 'Pirmasis musu laiku olimpiniu zaidyniu cempionas', 'konolis'),
(2085, 'Slapyvardis, sudarytas is kito autoriaus pavardes', 'homonimas'),
(2086, 'Zemiausias ir sausringiausias zemynas, kuriame tera viena valstybe', 'australija'),
(2087, 'Dviratininku arba motociklininku varzymasis atvirose ar uzdarose patalpose iveikiant sudetingas kliutis ivairaus ilgio nuotoliuose', 'trialas'),
(2088, 'Kompozitorius ..kalmanas', 'inre'),
(2089, 'Saudo arabijos piniginio vieneto rialo simtoji dalis', 'chalatas');
INSERT INTO `vikte_klsm` (`id`, `klsm`, `ats`) VALUES
(2090, 'Naftos frakcija, liekanti nudistiliavus dyzelinius degalus', 'mazutas'),
(2091, 'Tam tikra meslungio sutrauktu kuno daliu padetis', 'opisthotona'),
(2092, 'Kitas boeing 747 pavadinimas', 'jumbo jet'),
(2093, 'Nepriklausomo variklio varoma ratine, nebegine transporto priemone su kebulu', 'automobilis'),
(2094, 'Valstybes dalies arba jos gyventoju nacionalines, religines arba kitokios grupes, organizacijos ar institucijos, teise savarankiskai valdytis, tvarkyti savo vidaus reikalus', 'autonomija'),
(2095, 'Vegetaciniu funkciju reguliatorius', 'pagumburys'),
(2096, 'Futbolo komanda, daugiausia kartu laimejusi italijos cempionata', 'juventus'),
(2097, 'Londono futbolo komanda', 'arsenal'),
(2098, 'Ikyri baime numirti nuo sirdies ir kraujagysliu sistemos ligu, infarkto', 'kardiofobija'),
(2099, 'Lietviu poetas, eilerasciu rinkiniu amuletai, pergamento kriaukle, atleisk uz audra, duobes danguje,meiles ir vyno dainos, jazmino ziedas vakara prakalbina autorius', 'patackas'),
(2100, 'Kosminio telekskopo pavadinimas, kuris sukasi aplink zeme nuo 1990msio teleskopo deka mokslininkai gali stebeti tolimiausias galaktikas netrukdomi zemes atmosferos', 'hablis'),
(2101, 'Sunkvezimis miskui vezti', 'miskovezis'),
(2102, 'Bendras visu individu organines medziagos ir joje esancios energijos kiekis', 'biomase'),
(2103, 'Salis, kurioje gaminamas uzi', 'izraelis'),
(2104, 'Svaidomasis arba duriamasis ginklas, susidedantis is medinio koto ir kaulinio, zalvarinio arba gelezinio ietigalio', 'ietis'),
(2105, 'Daugelio medziagu maziausia dalele, turinti visas tos medziagos chemines savybes', 'molekule'),
(2106, 'Hamlete: ofelijos brolis', 'laertas'),
(2107, 'Busimu ivykiu prognozavimas teorijos pagalba', 'dedukcija'),
(2108, '19-a valstija, prijungta prie jav 11.12.1816 m., sostine indianapolis [liet.]', 'indiana'),
(2109, 'Tarptautine mokytoju diena', 'spalio 5'),
(2110, 'Kokiais skaiciais prasideda kinijos bruksninis prekinis kodas', '69'),
(2111, 'Operatyvioji atmintis kitaip', 'ram'),
(2112, 'Senoves persijos karaliaus priemimu sale', 'apadana'),
(2113, 'Vienuolis kitaip', 'brolis'),
(2114, 'Kauno dalis nemuno kairiajame krante, tarp fredos, julijanavos ir marveles', 'aleksotas'),
(2115, 'Laivo dugno isilgine sija nuo priekio iki galo', 'kilis'),
(2116, 'Puosni induistu sventykla', 'mandira'),
(2117, 'Kokios bakterijos dirvozemyje kaupia azoto junginius', 'nitrifikuojancios'),
(2118, 'Koks krioklys yra vadinamas medaus menesio sostine', 'niagara'),
(2119, 'Santuokinis paprotys, pagal kuri vyras galejo tuoktis su keliomis tarpusavyje giminingomis moterimis - seserimis ar pusseseremis', 'sororatas'),
(2120, 'Vyriskis, kuri savo kuryboje yra iamzine ir mocartas, ir puskinas', 'donzuanas'),
(2121, 'Sventoji, namu seimininkiu globeja', 'morta'),
(2122, 'Mokslas, kuris tyrineja iskastines liekanas ir nustato, kuo jos panasios ir kuo skiriasi nuo dabartiniu', 'paleontologija'),
(2123, 'Kelintais metais buvo isleistas pirmasis muzikos vadovelis', '1667'),
(2124, 'Posakis, reiskiantis pavoju, kuriam suklaidintieji patys atveria savo duris', 'trojos arklys'),
(2125, 'Senovinis skysciu ir biralu turio vienetas; senoves romoje prilygo ~ 9 l.', 'modijus'),
(2126, 'Gebejimas mintimis judinti daiktus', 'telekineze'),
(2127, 'Senoves egipte paplites (alkoholinis) gerimas', 'alus'),
(2128, 'Krikscionybeje septintasis dievo isakymas', 'nevok'),
(2129, 'Romenu kariuomenes kautyniu rikiuotes sparnas', 'ala'),
(2130, 'Daugelio religiju kulto apeigu atlikimo vieta, krikscioniu baznycioje - tam tikras stalas prie kurio dvasininkas laiko misias', 'altorius'),
(2131, 'Mokslas apie gyvos materijos jega ir energija', 'biodinamika'),
(2132, 'Senoves graiku mitu personazas - pabaisa, pusiaus moteris, pusiau gyvate', 'echidna'),
(2133, 'Auksciausias taskas astronomijoje', 'zenitas'),
(2134, 'Koks garsus madrido futbolo klubas rungtyniauja 74 tukstvietu santiago bernabeu stadione', 'real'),
(2135, 'Isankstinio apmokejimo tele 2 paslauga', 'pildyk'),
(2136, 'Treciasis jav prezidentas, pasirases nepriklausomybes deklaracija [liet.]', 'dzefersonas'),
(2137, 'Miestas, kuriame veikia seniausias pasaulyje (ikurtas 1843 m.) tivolio atrakcionu ir poilsio parkas', 'kopenhaga'),
(2138, 'Kaip vadinasi valiutu keitimo kursu indeksas', 'forex'),
(2139, 'Kuno dalis, naudojama nusikalteliu identifikacijai', 'pirstas'),
(2140, 'Tiltas su vandentakiu', 'akvedukas'),
(2141, 'Automobiliu gamintojas isleides siuos modelius: civic, accord', 'honda'),
(2142, 'Juros nimfa, ramios ir zerincios juros ivaizdis graiku mituose', 'galateja'),
(2143, 'Didziausias gelavandenis ezeras pasaulyje - vienas is didziuju ezeru jav ir kanados pasienyje [82409 km2]', 'aukstutinis'),
(2144, '1991 mvisegrade bendradarbiavimo sutarti pasirase: vengrija, cekija, slovakija ir ????', 'lenkija'),
(2145, 'Vietove islandijoje, nuo kurios kilo geizerio pavadinimas', 'geisyras'),
(2146, 'Liguistas potraukis padegineti', 'piromanija'),
(2147, 'Kuris is aksomo', 'aksominis'),
(2148, 'Atomai, turintys kruvi', 'jonai'),
(2149, 'Akmens amziuje - pagrindine zaliava, is kurios gaminti beveik visi darbo irankiai', 'titnagas'),
(2150, 'Upe, tekanti per dzukijos nacionalini parka', 'ula'),
(2151, 'Nba komanda is detroito', 'pistons'),
(2152, '2002mpasaulio futbolo cempionato italu rinktines vyr.treneris [orig.]', 'trapattoni'),
(2153, 'Dirbinys, vartojamas sluostyti ar kunui plautis', 'kempine'),
(2154, 'Politinio turinio agitacinis lapelis, atsisaukimas', 'proklamacija'),
(2155, 'Iskiluma pilvo apacioje ties gaktine savarza', 'gakta'),
(2156, 'Karaimu kulto pastatas', 'kinese'),
(2157, 'Vietos gyventoju savanorisku buriu, veikianciu prieso uznugaryje, dalyvis', 'partizanas'),
(2158, 'Kaip vadinosi 1363 mlietuviu musis su mongolais totoriais: melynieji ...', 'vandenys'),
(2159, 'Samerikos indenu gentys', 'dakotai'),
(2160, 'Prietaisas transporto priemones greiciui matuoti', 'spidometras'),
(2161, 'Misle pramusu leda - randu sidabra, pramusu sidabra - randu auksa', 'kiausinis'),
(2162, 'Lentele dazams', 'palete'),
(2163, 'Miestas, kuriame buvo ikurta pirmoji popieriaus dirbtuve lietuvoje (1524 m.)', 'vilnius'),
(2164, 'Nebl prezidentas', 'marciulionis'),
(2165, 'Gvatemalos pagrindinis pinigas', 'kecalis'),
(2166, 'Deives afrodites sunus', 'erotas'),
(2167, 'Svetimu prekybos laivu ir ju kroviniu sulaikymas uoste arba teritoriniuose vandenyse', 'embargas'),
(2168, 'Nuodingiausia afrikos gyvate (zmogui ikandus, jis gali mirti po 30 min): juodoji ...', 'mamba'),
(2169, 'Pasakojamasis grozines literaturos zanras, tarpinis tarp romano ir apsakymo', 'apysaka'),
(2170, 'Nacionaline ledo ritulio lyga siaures amerikoje', 'nhl'),
(2171, '(1759-1841m.) valstybes veikejas1787-1788m- ldkstovyklininkas ir vyriausiojo tribunolo pirmininkasvienas 1794msukilimolietuvoje ir voluineje organizatoriu', 'prozoras'),
(2172, 'Teka laidais', 'elektra'),
(2173, 'Baltarusis kitaip', 'gudas'),
(2174, 'Antkapinio paminklo irasas', 'epitafija'),
(2175, 'Kaip anksciau buvo vadinami likenai', 'smardone'),
(2176, 'Viena pirmuju rusijos revoliucionieriu moteru', 'bardina'),
(2177, 'Irenginiu kompleksas tarpmiestiniu ir priemiestiniu autobusu keleiviams aptarnauti: autobusu ...', 'stotis'),
(2178, 'Mokslas apimantis reiskiniu esanciu uz zemes ir jos atmosferos stebejima ir aiskinima', 'astronomija'),
(2179, 'Lietuvos country muzikos atlikejas', 'stakenas'),
(2180, 'Kas pirmas apkeliavo aplink pasauli', 'magelanas'),
(2181, 'Augalu sintetinamas angliavandenilis; balti milteliai; gaminamas is bulviu, kukuruzu, ryziu', 'krakmolas'),
(2182, 'Zvaigzde, penkta pagal nuotoli nuo zemes: ..359', 'volfo'),
(2183, 'Rusijos karinis laipsnis, ivestas 17apabaigoje artileristams, tarnavusiems prie mortyru ir haubicu', 'bombardyras'),
(2184, 'Laidotuves kitap', 'pakasynos'),
(2185, 'Populiarus stalo zaidimas, kuri didziosios depresijos metais ant virtuves stalo isrado bedarbis komersantas carlzas darou', 'monopolis'),
(2186, 'Danu astronomas, pirmasis nustates sviesos greiti', 'riomeris'),
(2187, 'Kokios genties zmones yra maziausi (vidutinis ugis - 1,4 m)', 'bambundu'),
(2188, 'Privilegijuotas zemvaldys ar tokios kilmes zmogus', 'bajoras'),
(2189, 'Xix alenku kompozitorius ir pianistas', 'sopenas'),
(2190, 'Valstybes vadovas, turintis absoliucia valdzia', 'diktatorius'),
(2191, 'Rasines diskriminacijos panaikinimas', 'desegregacija'),
(2192, 'Paskutiniojo babilonijos karaliaus nabonido sunus', 'baltazaras'),
(2193, 'Italu kino studiju kompleksas ir technine baze, nuomojanti kino paviljonus, aparatura, rekvizita', 'cinecita'),
(2194, 'Irankis spynai ar uzraktui atrakinti ar uzrakinti', 'raktas'),
(2195, 'Lengviausia radiostotis', 'pukas'),
(2196, '2004 metais apkaltos budu nuverstas lietuvos respublikos prezidentas (vardas, pavarde)', 'rolandas paksas'),
(2197, 'Spalva, kuria nudazyti vandenilio pripildyti balionai: tamsiai ...', 'zalia'),
(2198, 'Valstybe, kurios domeno vardas yra .ly', 'libija'),
(2199, 'Stambaus lietuvos pinigo sutrumpinimas', 'lt'),
(2200, 'Meistras gaminantis smulkius dirbinius is tauriuju metalu ir brangakmeniu', 'juvelyras'),
(2201, 'Vyrvardas, kiles is lotkalbos, reiskia gyvuojantis', 'valentas'),
(2202, 'Kas pirmas uzpatentavo vandens rato sukama verpimo masina', 'arkraitas'),
(2203, 'Koncentruotas druskos ir azoto rugsciu misinys, tirpina net auksa ir platina', 'karaliskas vanduo'),
(2204, 'Vardazenklis, patvirtinantis nuosavybes teise, nurodantis daikto savininka, uzsakova, gamintoja', 'monograma'),
(2205, 'Salis, kurioje buvo irengta pirmoji keturlapio dobilo pavidalo estakadine keliu sankryza', 'jav'),
(2206, 'Kartas arba ...', 'sykis'),
(2207, 'Kompozitorius parases simfonines poemas miske ir jura', 'ciurlionis'),
(2208, 'Kiek zygdarbiu turejo atlikti heraklis', '12'),
(2209, 'Studentu svente: teisininku dienos', 'tedi'),
(2210, 'Rusijos prezidento darbo vieta', 'kremlius'),
(2211, 'Vezio gydimas cheminiais preparatais', 'chemoterapija'),
(2212, 'Pintas krepsys', 'pintine'),
(2213, 'Baltymas kraujyje surisantis skydliaukes hormona tiroksina ir padedantis ji transportuoti i audinius', 'transtiretinas'),
(2214, 'Tautu grupe tailande bei kinijoje [dgs.]', 'tajai'),
(2215, 'Lietliaudies ismintis: kitiems ..- nepades niekas ir tau', 'nepadesi'),
(2216, 'Dienovidinis - linija, jungianti sferos ar kito sukimosi pavirsiaus asigalius', 'meridianas'),
(2217, 'Nurodymas kompiuteriui pradeti vykjdyti, testi arba nutraukti bet kuria funkcija', 'komanda'),
(2218, 'Hipotetinis judrus skystis, kuriuo iki xviii abuvo aiskinami silumos, magnetizmo, elektros reiskiniai', 'fluidas'),
(2219, 'Oficiali botsvanos (afrika) kalba', 'anglu'),
(2220, 'Kaip vadinosi pirmasis filmas (dokumentine apybraiza), kuri 1957m.04.30dparode pirmoji televizija lietuvoje', 'teviske'),
(2221, 'Kokiu bendru pavadinimu vadinami tokie produktai, kaip kava, miltai, cukrus ir pan.', 'bakaleja'),
(2222, 'Chemines medziagos kovai su kenkejais', 'pesticidai'),
(2223, 'Cheminis valgomosios druskos pavadinimas', 'natrio chloridas'),
(2224, 'Lokomotyvo ar vagono rato dalis salytyje su begiu', 'bandazas'),
(2225, 'Pakyla, ant kurios modeliai demonstruoja drabuzius', 'podiumas'),
(2226, 'Elektromagnetinis prietaisas, skirtas kintamajai srovei transformuoti', 'transformatorius'),
(2227, 'Paukstis, naminiu vistu protevis', 'bankiva'),
(2228, 'Kada vyko zalgirio musis?', '1410 05 05'),
(2229, 'Devinta pagal dydi pasaulio valstybe', 'kazachstanas'),
(2230, 'Isrado universalu garo varikli, galejusi sukti visu tipu darbo masinas', 'vatas'),
(2231, 'Mesos ir darzoviu valgis', 'ragu'),
(2232, 'Monoteistinese religijose - tobulas zmogaus uzbaigimas, galutinis apsivalymas nuo prigimtines nuodemes', 'isganymas'),
(2233, 'Kas parase visuotine istorija', 'polibijas'),
(2234, 'Pusiasalis, kuriame yra ispanija', 'pirenu'),
(2235, 'Siule, jungianti smilkinkauli su momenkauliu', 'zvynine'),
(2236, 'Pagrindine cilindro dalis, kurioje slankioja stumoklis', 'gilze'),
(2237, 'Treciuju teismas, kuriame ginca sprendzia teisejas tarpininkas', 'arbitrazas'),
(2238, 'Dazai, gaunami is kai kuriu kerpiu; naudojami kaip cheminis indikatorius', 'lakmusas'),
(2239, 'Pastaba arba antrastele knygos parastese', 'marginalija'),
(2240, 'Didziosios britanijos parlamento zemuju bendruomeniu rumu pirmininkas', 'spikeris'),
(2241, 'Ketvirtasis 2002 mzurnalo forbes paskelbtame turtingiausiu pasaulio zmoniu sarase', 'allen'),
(2242, 'Pirmasis japonijos ministras pirmininkas (1889-1891m.)', 'jamagata'),
(2243, 'Sistemos sandara ir vidine organizacijos forma', 'struktura'),
(2244, 'Po andrusavos taikos atsiradusi nauja bajorijos grupe', 'egzuliantai'),
(2245, 'Kelintadienis japonijoje vadinamas suiyobi - vandens diena', 'treciadienis'),
(2246, 'Juodkalnijos sostine', 'podgorica'),
(2247, 'Salis, kurioje 1658 mpasirode pirmoji vaikiska iliustruota knyga', 'vokietija'),
(2248, 'Gydymas adatomis', 'akupunktura'),
(2249, 'Durklas, tiesia dviasmene briaunota gelezte su maza rankena', 'kortikas'),
(2250, 'Lnk rodomo zaidimo sesi nuliai - milijonas vedejas', 'kernagis'),
(2251, 'Italu pamokslininkas, pranciskonu ordino ikurejas: pranciskus ...', 'asyzietis'),
(2252, 'Ivezamos i sali prekes', 'importas'),
(2253, 'Koloidiniu daleliu sulipimas ir iskritimas is tirpalo nuosedu pavidalu arba virtimas drebutiniu geliu', 'koaguliacija'),
(2254, 'Biciuliu draugijos (kvakeriu) steigejas', 'foksas'),
(2255, 'Moteriska lytine lastele', 'kiausinelis'),
(2256, 'Didziausias zmogaus kuno organas', 'oda'),
(2257, 'Pietu amerikos indenu kecuju dievybe, kukuruzu globeja', 'saramama'),
(2258, 'Mitinis svarbiausias kristaus priesininkas - jo netikras antrininkas, imituojantis ji apsisaukelis', 'antikristas'),
(2259, 'Baznycios bausme, kai zmogus yra atskiriamas nuo baznycios', 'ekskomunikacija'),
(2260, 'Astunta pagal auksti kalva lietuvoje', 'satrijos'),
(2261, 'Pirmasis krespininkas, patekes i nba iskart po vidurines mokyklos', 'kemp'),
(2262, 'Karaliaus dukters titulas', 'princese'),
(2263, 'Kada ivyko mindaugo krikstas', '1251'),
(2264, 'Monopolistinis kapitalizmas, auksciausia jo forma, remiasi ekonomikos monopolizavimu', 'imperializmas'),
(2265, 'Kokia salis 1998 mlaimejo eurovizijos dainu konkursa', 'izraelis'),
(2266, 'Darzoviu auginimo mokslas', 'darzininkyste'),
(2267, 'Laikinas drabuziu, paprociu ktpasireiskimas', 'mada'),
(2268, 'Pakartotines varzybos, per kurias siekiama laimeti pries pirmuju varzybu nugaletoja', 'revansas'),
(2269, 'Apysakos gyvuliu ukis autorius', 'orvelas'),
(2270, 'Si sistemoje medziagos kiekio vienetas', 'molis'),
(2271, 'Rusu generolas, vadovaves rusu pajegoms priesinantis napoleono antpuoliui 1812m.', 'kutuzovas'),
(2272, 'Priekinis kariuomenes dalinys, skiriamas pagrindiniu jegu apsauga', 'avangardas'),
(2273, 'Nuodingas antidetonaciniu savybiu turintis svino junginys, kurio dedama i benzina oktaninio skaiciaus pagerinimui', 'tetraetilsvinas'),
(2274, 'Krikscioniu teologas, rasytojas; sventasis; milano vyskupas', 'ambraziejus'),
(2275, 'Murbaicio baletas  ..city', 'acid'),
(2276, 'Dregniausia vieta pasaulyje', 'havaju salos'),
(2277, 'Asmuo, vairuojantis transporto priemone, varantis keliu gyvulius arba jojantis jais', 'vairuotojas'),
(2278, 'Skitu kalavijas', 'akinakas'),
(2279, 'Jamaikos sostine', 'kingstonas'),
(2280, 'Studentu svente: fiziku dienos', 'fidi'),
(2281, 'Kaip vadinamas baltos sviesos skaidymas i spektra', 'dispersija'),
(2282, 'Short message service', 'sms'),
(2283, 'Scenos irangos elementas: aplink asi sukamos tribriaunes prizmes, leidziancios greitai pakeisti spektaklio dekoracijas [dgs.]', 'telarai'),
(2284, 'Arabu sidabrine moneta', 'dirhemas'),
(2285, 'Tirstas rukas virs dideliu miestu ir pramones rajonu, susidarantis is dumu ir automobiliu deginiu bei dulkiu', 'smogas'),
(2286, 'Imones ar istaigos virsininkas', 'sefas'),
(2287, 'Pirmoji moteris kosmonaute, isejusi i atvira kosmosa', 'savickaja'),
(2288, 'Miestas prancuzijoje, kur kasmet nuo 1923 mvyksta garsios automobiliu 24 valandu lenktynes ziedine trasa', 'le manas'),
(2289, 'Optinis prietaisas', 'teleskopas'),
(2290, 'Lektuvo sparno griauciu skersine santvara, suteikianti sparnui profili ir standuma', 'nerviura'),
(2291, 'Viesoji istaiga', 'vi'),
(2292, 'Valstybe saloje atlanto vandenyno siaureje', 'islandija'),
(2293, 'Tarptautine teatro diena', 'kovo 27'),
(2294, 'Xiv-xviaitalijos samdytu kareiviu burio vadas', 'kondotjeras'),
(2295, 'Bakas vandeniui sildyti ir karstam vandeniui laikyti', 'boileris'),
(2296, 'Rasytojas, romano sentimentali kelione po prancuzija ir italija autorius (liet.)', 'sternas'),
(2297, 'Europos policijos biuras, europos sajungos valstybiu policiju bendradarbiavimo istaiga [liet.]', 'europolas'),
(2298, 'Ligos pozymis', 'simptomas'),
(2299, 'Takas gokartams vazineti, ju lenktyniu vieta', 'kartodromas'),
(2300, 'Akadu dievybe, pirmines stichijos iasmeninimas', 'tiamat'),
(2301, 'Seniausias, nusipelnes, visu gerbiamas kokios nors zmoniu grupes, bendruomenes narys', 'nestorius'),
(2302, 'Kada pirma karta oficialiai buvo persodinta zmogaus sirdis', '1967'),
(2303, 'Maisto produktai, termiskai, chemiskai ar kitaip apdoroti ir laikomi specialiame ipakavime, kad negestu [dgs.]', 'konservai'),
(2304, 'Lietuvos miestas, kuriame yra naftos perdirbimo imone', 'mazeikiai'),
(2305, 'Sudetingu pynimu austas audinys', 'dimas'),
(2306, 'Nuotykiu filmas, vaizduojantis xix ajav vakariniu valstiju gyvenima', 'vesternas'),
(2307, 'Zurnalas merginoms zymus, raudonaisiais puslapiais', 'panele'),
(2308, 'Nepadoraus turinio rasiniai, piesiniai, fotografijos, filmai, vaizduojantys erotines scenas ir zadinantys seksualini smalsuma', 'pornografija'),
(2309, 'Apatine ir didziausia grotstiebio bure, isskleista po gotreja', 'grotas'),
(2310, 'Kas rezisavo filma 2001 metu kosmine odiseja [orig.]', 'kubrick'),
(2311, 'Dekoratyvinis augalas, rozines spalvos epitetas', 'ciklamenas'),
(2312, 'Mezginio kilpa', 'akis'),
(2313, 'Paukstis, kuriam bostone pastatytas paminklas [isgelbejo miesta nuo bado]', 'zvirblis'),
(2314, 'Siuzetinis, paprastai liaudies kurybos eilerastis, poema', 'balade'),
(2315, 'Augalas, kurio seklos yra smulkiausios', 'orchideja'),
(2316, 'Valstybes, kuriose gaminami western digital kompanijos kietieji diskai (hdd): malaizija ir ...', 'tailandas'),
(2317, 'Spaustuves prietaisas, automatiskai kontroliuojantis sluoksnio stori spausdinimo metu', 'idotronas'),
(2318, 'Riebus, degus zemes gelmiu skystis', 'nafta'),
(2319, 'Pastatas arba pastatu ansamblis, skirtas religinems apeigoms', 'sventykla'),
(2320, 'Cheminis elementas, pavadintas prancuzijos garbei', 'francis'),
(2321, 'Spalva, kuria nudazyti anglies dioksido pripildyti balionai', 'juoda'),
(2322, 'Instrumentine pjese is ivairiu kuriniu istrauku - operu, liaudies dainu', 'popuri'),
(2323, 'Maza indijos ir gretimu saliu smukle', 'taverna'),
(2324, 'Lasteles sugebejimas veikimo potencialu reaguoti i ivairius dirgiklius', 'dirglumas'),
(2325, 'Sengraiku grozio ir linksmybes deives', 'charites'),
(2326, 'Palmyros ...', 'horoskopas'),
(2327, 'Zandenos - barzda, palikta tik ant skruostu', 'bakenbardai'),
(2328, 'Trumpas nuomones pareiskimas', 'pastaba'),
(2329, 'Mikrobu rusiu visuma, esanti kokioje nors terpeje ar organizme', 'mikroflora'),
(2330, 'Veidrodelis burnos ertmei paziureti', 'stomatoskopas'),
(2331, 'Faktiskas karo baigimas nugaletos valstybes ar jos dalies okupavimu', 'debeliacija'),
(2332, 'Molis su vasko, tauku ir vazelino priemaisomis, megstama vaiku minkykle', 'plastilinas'),
(2333, 'Valstybe, kurios sostine rabatas', 'marokas'),
(2334, 'Medziaga, suteikianti augalams zalia spalva', 'chlorofilas'),
(2335, 'Ar sutampa zemes poliai su magnetiniais poliais taip/ne', 'ne'),
(2336, 'Ilgas, platus susisegamas arba susijuosiamas kambarinis, ligoniu, darbo drabuzis', 'chalatas'),
(2337, '..kiaule gilia sakni knisa', 'tyli'),
(2338, 'Kvailas, kvaisas', 'paikas'),
(2339, 'Keturiu muzikos atlikeju ansamblis', 'kvartetas'),
(2340, 'Karsta vulkaniniu duju arba garu srove, trykstanti is vulkano plysiu arba is ka tik issiliejusios lavos srauto pavirsiaus', 'fumarole'),
(2341, 'Paskalos kitaip', 'gandai'),
(2342, 'Didziuju dievu devynetas senoves egipte', 'eneada'),
(2343, 'Kelintas aukstas prancuzijoje atstoja 5-aji auksta lietuvoje', 'ketvirtas'),
(2344, 'Kuriais metais buvo sukurtas pirmasis animacinis filmas', '1906'),
(2345, 'Apvaliuju kirmeliu tipo bestuburiai gyvunai', 'nematodai'),
(2346, 'Kada susikure ssrs', '1922'),
(2347, 'Europos sajungos paramos moksliniams tyrimams programa [orig.]', 'esprit'),
(2348, 'Acteku karo ir saules dievas, kitaip - huicilopoctlis', 'meksitlis'),
(2349, 'Poziuris, kad valstybe i ekonomine veikla turi visai nesikisti arba tas isikisimas turi buti minimalus', 'laissez faire'),
(2350, 'Austrijos kompozitorius virtuozas parases daugiau kaip 40 simfoniju', 'mocartas'),
(2351, 'Jupiterio palydovas, pavadintas senoves graiku upiu dievo inacho dukters, kuria dzeusas paverte balta telycaite, noredamas apsiginti nuo heros pykcio, vardu', 'ija'),
(2352, 'Baime buti nubaustam uz draudziamu dalyku geidima, siekima', 'akrofobija'),
(2353, 'Dantes gidas pragare ir skaistykloje', 'vergilijus'),
(2354, 'Prietaisas isgaravusio vandens kiekiui is ivairiu pavirsiu matuoti', 'garamatis'),
(2355, 'Didziausias lietuvoje gamtos rezervatas [kilm.]', 'cepkeliu'),
(2356, 'Kviestiniai pietus', 'banketas'),
(2357, 'Nhl klubas is fynikso', 'coyotes'),
(2358, 'Veidrodinis teleskopas', 'reflektorius'),
(2359, 'Skaiciai kuriuos pakelus kvadratu ar kitu laipsniu gaunamas skaicius kurio paskutiniai skaitmenys sutampa su pradiniu skaiciu', 'automorfiniai'),
(2360, 'Savojo as ribu isnykimas, susiliejimas su kitais, persikunijimas', 'egotranscendencija'),
(2361, 'Organizacija, pirmojo pasaulinio karo metais gavusi nobelio taikos peremija', 'raudonasis kryzius'),
(2362, 'Bato formos salis europoje', 'italija'),
(2363, 'Garso atspindys nuo kliuties', 'aidas'),
(2364, 'Automobiliu gamintojas isleides siuos modelius: rio, sephia, sorento', 'kia'),
(2365, 'Juros arba ezero bangu ardomoji veikla staciame krante, o vidiniu bangu - priekranteje', 'abrazija'),
(2366, 'Salis, kurioje yra iberijos kalnai', 'ispanija'),
(2367, 'Tikroves garsu pamegdziojimas kalbos garsais', 'onomatopeja'),
(2368, 'Pakopa, grandis vienas kitam pavaldziu organu sistemoje', 'instancija'),
(2369, 'Stebejimo aikstele laivo stiebe', 'marsas'),
(2370, 'Pantomimos aktorius', 'mimas'),
(2371, 'Tapytojas, kartu su broliu agostinu nutape farnezi rumu romoje galerijos freskas ovidijaus metamorfoziu siuzetais', 'karacis'),
(2372, 'Kedute su skyle kudikiui pratintis stoveti', 'stovyne'),
(2373, 'Kauno gyvenamasis rajonas neries kairiajame krante, miesto siauriniame pakrastyje', 'eiguliai'),
(2374, 'Misko verslo imone lietuvoje xiv-xviii a.', 'buda'),
(2375, 'Azijoje - maziausiai apmokamas darbininkas (daznesikas)', 'kulis'),
(2376, 'Ertme tarp lupu ir gerkles', 'burna'),
(2377, 'Lietuviu dailininkas-scenografas, zymiausi kuriniaioperu dzverdzio traviata, dzpucinio madam baterfly, dzverdzio aidascenovaizdziai', 'truikys'),
(2378, 'Balerinos suolis, pradedamas ir baigiamas abiem kojomis', 'asamble'),
(2379, 'Zmoniu, gyvenanciu zemeje arba kurioje nors teritorijoje visuma [dgs.]', 'gyventojai'),
(2380, 'Kurinio gotu istorija autorius', 'jordanas'),
(2381, 'Issiuntimo dokumentas, kuri isduoda transportuotojas tiesiogiai ekspedidoriui arba jo igaliotam prekiu pristatytojui, gabenant prekes juru transportu', 'konosamentas'),
(2382, 'Kalnai prancuzijos pietryciuose', 'alpes'),
(2383, 'Lietuviu skulptorius, sdaukanto papileje, drv.kudirkos knaumiestyje statulu autorius', 'grybas'),
(2384, 'Mazdaug tikras', 'apytikris'),
(2385, 'Kunigaikstis, suvienijes lietuva', 'mindaugas'),
(2386, 'Gelemis apsodintas sodybos sklypas', 'darzelis'),
(2387, 'Legendinis atenu herojus, uzmuses minotaura', 'tesejas'),
(2388, 'Labai jausmingas, itin svelnus, jautrus zmogus', 'sentimentalus'),
(2389, 'Kas parase romana tustybes muge', 'tekerejus'),
(2390, 'Kuriais metais ikurta bbc (britanijos transliuotoju korporacija)', '1922'),
(2391, 'Pirmasis lietuvos atstovas vokietijoje 1918 m.', 'saulys'),
(2392, 'Salis, kurioje 1950 mivyko pasaulio futbolo cempionatas', 'brazilija'),
(2393, 'Teleskopo pagrindinio veidrodzio ar objektyvo plotas, fokusuojantis sviesa', 'apertura'),
(2394, 'Mokamas pranesimas per masines informacijos kanala', 'reklama'),
(2395, 'Gyslele, jungianti kudiki su motina', 'virkstele'),
(2396, 'Kalnai lenkijos-cekijos pasienyje', 'sudetai'),
(2397, 'Jezaus gimimo svente', 'kaledos'),
(2398, 'Greiciausia pasaulio zuvis, pasiekianti iki 80 km/h greiti', 'marlina'),
(2399, 'Antras pagal dydi ispanijos miestas', 'barselona'),
(2400, 'Nelegalus komunistu laikrastis', 'iskra'),
(2401, 'Prancuzu rasytojas, romanu silvestro bonaro nusikaltimas ir dievai troksta autorius', 'fransas'),
(2402, 'Didziausias grauzikas pasaulyje [uzauga iki 1 m dydzio)', 'kapibara'),
(2403, 'Kuri jav valstija nusipelne pravardes prezidentu motina', 'virdzinija'),
(2404, 'Operos, operetes, miuziklo zodinis tekstas', 'libretas'),
(2405, 'Dantu danga', 'emalis'),
(2406, 'Naturalusis skaicius, turintis daugiau kaip du daliklius [14; 9..]', 'sudetinis'),
(2407, 'Didzioji prancuzijos revoliucija ivyko', '1789'),
(2408, 'Osmanu vyriausybes, kartais ir imperijos pavadinimas, vartotas europos valstybiu diplomatiniuose dokumentuose ir literaturoje', 'porta'),
(2409, 'Kokiame mieste organizuojami christie aukcionai', 'londone'),
(2410, 'Vanuatu sostine', 'port vila'),
(2411, 'Sventojo sosto diplomatine atstovybe', 'nunciatura'),
(2412, 'Ispanu tapytojas, kubizmo pradininkas', 'pikaso'),
(2413, 'Ezeras lazdiju raj., 6 km i rytus nuo seiriju, kartais dar vadinamas gudoniu ezeru (pavadinimas toks pats kaip dideles europos upes)', 'dunojus'),
(2414, 'Samdomas darbininkas', 'samdinys'),
(2415, 'Lietuviu rasytojas, eilerasciu rinkiniu eilerasciai, 100 pavasariu, dramu atzalynas, generaline repeticija autorius', 'binkis'),
(2416, 'Geometrine figura, neturinti matmenu', 'taskas'),
(2417, 'Pepsi gimimo metai, kai caleb bradham pervadino savo gaminama tuo metu populiaru gerima brads drink i pepsi-cola', '1898'),
(2418, 'Zuvies kaulas', 'asaka'),
(2419, 'Aukstaiciu ir dzuku gyvenamasis namas', 'pirkia'),
(2420, 'Nobelio fizikos premijos laureatas 1921m., apdovanotas uz teorines fizikos darbus ir fotoelektrinio efekto desnio nustatyma', 'einsteinas'),
(2421, 'Irenginys sinagogoje - keliu laipteliu pakyla, ant kurios atlikinejamos religines apeigos, skaitoma penkiaknyge', 'bima'),
(2422, 'Transporto laivu sargybinis garlaivis naudotas dbritanijos ir jav laivynuose per ii pasaulini kara', 'korvete'),
(2423, 'Didziausias pasaulio ezeras: ..jura', 'kaspijos'),
(2424, 'Rankinis streliu svaidomasis ginklas; kilpinis lankas', 'arbaletas'),
(2425, 'Dekoratyvine sienele, uzbaigianti pastato fasada ir uzstojanti stoga', 'atikas'),
(2426, 'Akies gebejimas taip kaitalioti savo lauziamaja geba, kad aiskiai matytusi ivairiai nutole daiktai', 'akomodacija'),
(2427, 'Svaidomoji, saunamoji ietis su uzkarpomis, juros zveriams medzioti', 'harpunas'),
(2428, 'Drumsciausia pasaulyje upe, itekanti i geltonaja jura', 'jangdze'),
(2429, 'Pasipriesinimo judejimas', 'rezistencija'),
(2430, 'Salis, kurioje atsirado sporto saka siuolaikine penkiakove', 'svedija'),
(2431, 'Ka reiskia hdd', 'hard disk drive'),
(2432, 'Eskimu valtis, daroma is banginiu kaulu ir ruoniu kailiu', 'kajakas'),
(2433, 'Trumpas gelezinkelis su lynine traukle, irengiamas staciuose slaituose keleiviams vezti', 'funikulierius'),
(2434, 'Pasto kortele laiskui', 'atvirukas'),
(2435, 'Plintusas lietuviskai', 'grindjuoste'),
(2436, 'Senoves graiku karo sokis', 'piricha'),
(2437, 'Knygos valentina autorius', 'vaiciulaitis'),
(2438, 'Italijos miestas, kuriame yra 80 tukstvietu olimpico stadionas', 'roma'),
(2439, 'Skirtumas tarp produkto kiekio, kuri pirkejai nori pirkti, o pardavejai gali parduoti uz tam tikra kaina', 'stygius'),
(2440, 'Statybine mineraline risamoji medziaga, kuri, sumaisyta su vandeniu, ilgainiui sukieteja', 'cementas'),
(2441, 'Vyriausiojo rabino galvos apdangalas', 'kidaras'),
(2442, 'Vokieciu fizikas, isrades prietaisa, matuojanti medziagos radioaktyvuma', 'geigeris'),
(2443, 'Zurnalistikos zanras; to zanro kurinys, operatyviai teikiantis ziniu apie ivykius, kuriu stebetojas arba dalyvis yra pats autorius', 'reportazas'),
(2444, 'Zmogus, kuriam perpilamas kraujas, transplantuojami organai ar audiniai', 'recipientas'),
(2445, 'Laivo kursas pavejui, kai laivo simetrijos asis ir vejo kryptis sudaro kampa tarp 90 ir 180 laipsniu', 'bakstagas'),
(2446, 'Menine priemone, zmogaus savybiu suteikimas negyviems daiktams, reiskiniams', 'personifikacija'),
(2447, 'Kokia sutarti 1922 mslapta pasirase vokietija ir tsrs, pagal kuria abi salys susitare ekonomiskai bendradarbiauti', 'rapalo'),
(2448, 'Vamzdines sandaros organu sistema', 'traktas'),
(2449, 'Kaip vadinami kunai, sudaryti is lygiu daliu', 'simetriskais'),
(2450, 'Jurta irengta vezime', 'kibitka'),
(2451, 'Barbadoso administracinis vienetas', 'parapija'),
(2452, 'Italu filosofas, poetaskritikavo religines dogmas, iskele ideja apie begaline pasauliu daugybe bei ivairove [liet.]', 'brunas'),
(2453, 'Albumo visi langai ziuri i dangu autorius', 'mamontovas'),
(2454, 'Skystos atliekos arba uzterstas vanduo, salinami is apgyvendintu vietoviu ir gamybos imoniu', 'nuotekos'),
(2455, 'Turkmenistano sostine', 'aschabadas'),
(2456, 'Pastato kolonos liemuo', 'fustas'),
(2457, 'Savaites diena, kai prasideda gavenia', 'treciadienis'),
(2458, 'Veiksmazodzio forma, zyminti antraeili veiksma, atliekama to paties veikejo', 'pusdalyvis'),
(2459, 'Ventiliacijos irenginys pozeminiuose kalnakasybos kasiniuose susikertamiems oro srautams atskirti, nekeiciant ju krypties', 'krosingas'),
(2460, 'Automatiskai issikraunantis krovininis vagonas su bunkeriniu kebulu', 'hoperis'),
(2461, 'Senjoro valdoma zemes valda', 'senjorija'),
(2462, 'Ligonines patalpa, kur laikomi ligoniai', 'palata'),
(2463, 'Prekes svoris be ipakavimo', 'neto'),
(2464, 'Namas ar namelis, skirtas maudytis', 'pirtis'),
(2465, 'Spalvotuju metalu lydiniai su legiruojanciais elementais, naudojami sudetingai legiruotiems lydiniams gauti', 'ligaturos'),
(2466, 'Papildomas atlyginimas, primokejimas uz gera darba', 'premija'),
(2467, 'Popieriaus lapo formatas, lygus 210x297 mm', 'a4'),
(2468, 'Skyscio ar duju kiekis, nutekantis ar gaunamas per kuri nors laiko vieneta', 'debitas'),
(2469, 'Garsu tarimas, nuleidus minkstaji gomuri ir dali oro praleidziant pro nosi', 'nazalizacija'),
(2470, 'Higienos priemones nuo prakaitavimo', 'antiperspirantai'),
(2471, 'Sportininkas (arba komanda), pirmenybese (cempionate) uzemes antraja vieta', 'vicecempionas'),
(2472, 'Kokia kalba sukure liudvikas zamenhofas', 'esperanto'),
(2473, '1998 metais isleistas grupes the offspring albumas', 'americana'),
(2474, 'Kada libija tapo arabu lygos nariu', '1953'),
(2475, 'Sudetingos simetrijos elementas', 'inversijos asis'),
(2476, 'Kalnai turkijos pietuose', 'tauro'),
(2477, 'Akies obuolio isorinio dangalo priekine skaidri dalis, sudaranti 1/6 sio dangalo ir pereinanti tiesiog i odena', 'ragena'),
(2478, 'Transporto priemones kebulas su vidaus ir isores irengimais', 'karoserija'),
(2479, 'Metu laikas gruodzio-vasario menesiais', 'ziema'),
(2480, 'Evoliuciniai pakitimai, del kuriu tobuleja visa organizmo sandara, suintensiveja gyvybine veikla; taciau tai nera siauri prisitaikymai prie grieztai ribotu gyvenimo salygu', 'aromorfoze'),
(2481, 'Didziausia pasaulyje telekomunikaciju ir informaciniu technologiju paroda', 'cebit'),
(2482, 'Per didele knygu kaupimo aistra', 'bibliomanija'),
(2483, 'Princeses rozes mylimasis pasakoje batuotas katinas', 'kalava'),
(2484, 'Kada ivyko pirmoji lietuvos dainu svente', '1924'),
(2485, '1924-48mvokietijos piniginis vienetas', 'reichsmarke'),
(2486, 'Graiku ginco deive, arejo sesuo', 'eride'),
(2487, 'Atminimui isigytas nedidelis dailus daiktas', 'suvenyras'),
(2488, 'Priebalsis, kurio tarimas yra sudetinis - prasideda sprogimu, o baigiasi putimu (c, dz)', 'afrikata'),
(2489, 'Elektrinio laidumo vienetas', 'simensas'),
(2490, 'Kopijavimo aparatas, kuris siuncia paveikslo arba teksto kopijas is vieno telefono i kita', 'faksas'),
(2491, 'Karstas gerimas gaminamas is konjako ir praskiestas verdanciu vandeniu ar arbata', 'grogas'),
(2492, 'Neisskirstyto kaimo valstiecio ilgas siauras zemes sklypas', 'rezis'),
(2493, 'Bukle, kuria lemia ivairios aplinkybes', 'padetis'),
(2494, 'Atgal lotyniskai', 'retro'),
(2495, 'Xvi - xvii aispanu teatro rusis; vaidinimas didelio namo kieme', 'koralis'),
(2496, 'Apsviestumo vienetas', 'liuksas'),
(2497, 'Kokia formule nusakoma vandenilio atomu spektro liniju bangu ilgiai [kilm.]', 'balmerio'),
(2498, 'Siuolaikiniai dailes kuriniai, sukurti remiantis naujomis sudetingomis technologijomis: kompiuteriais, lazeriais, kopijavimo, fakso aparatais ir kt.', 'haitekas'),
(2499, 'Lietuviu maro deive', 'didevaite'),
(2500, 'Savarankiska sporto mokslo sritis, anatominiu, biomechaniniu, fiziologiniu, psichologiniu, sociologiniu poziuriu nagrinejanti fizinius pratimus ir ju taikyma', 'gimnologija'),
(2501, 'Lietuviu karo dievas', 'kovas'),
(2502, 'Suoliu i auksti kliutis, persokama isibegejus - lygusapvalus strypas', 'kartele'),
(2503, 'Maldyvu pagrindinis pinigas', 'rupija'),
(2504, 'Jordanijos piniginis vienetas', 'dinaras'),
(2505, 'Ilgiausia upe estijoje', 'emajogis'),
(2506, 'Fizar juridasmuo, pavedantis kitam sudaryti sandori ar atlikti kitus pavedimus savo vardu ar interesais ir savo saskaita', 'komitentas'),
(2507, 'Pavojingiausia afrikos gyvate, pavadinima pelnius pagal juodos spalvos zabtus: juodoji ...', 'mamba'),
(2508, 'Prancuzijos himnas', 'marseliete'),
(2509, 'Mase antspaudams', 'lakas'),
(2510, 'Mokslo saka, nagrinejanti salies vidaus ir uzsienio politika bei jos kryptis', 'politologija'),
(2511, 'Tam tikro mikroorganizmo pajegumas sukelti liga tam tikram seimininkui', 'virulentiskumas'),
(2512, 'Lektuvo, automobilio apsivertimas per prieki avarijos metu', 'kapotazas'),
(2513, '2001 mradiocentro roko grupe', 'radioshow'),
(2514, 'Jav mikrobiologas 1953 msukures pirmaja vakcina nuo poliomielito [liet.]', 'solkas'),
(2515, 'Taisyklingasis daugiakampis sudarytas is taisyklingu penkiakampiu', 'dodekaedras'),
(2516, 'Salvadoro stambus piniginis vienetas', 'kolonas'),
(2517, 'Budas gauti atspauda, mechaniskai bruzuojant grafitiniu piestuku', 'frotazas'),
(2518, 'Geomorfologijos saka, tirianti zemes pavirsiaus reljefa kiekybiniu poziuriu, apibudinanti jo skaitines charakteristikas', 'mortometrija'),
(2519, 'Triju asiu atzvilgiu simetriskas pavirsius, kurio visi pjuviai yra apskritimai arba elipses', 'elipsoidas'),
(2520, 'Zambijos vakarine kaimyne', 'angola'),
(2521, 'Estetinis odos defektas - odos sutrukimai', 'strijos'),
(2522, 'Graiku poetas, atenu politinis veikejasjo siulymu primtas istatymas, draudziantis uz skolas pavergti bendrapiliecius', 'solonas'),
(2523, 'Nuodingiausia lietuvos uoga, 10-12 tokiu uogu - zmogui mirtina doze', 'zalcialunkis'),
(2524, 'Salis, kurios domeno vardas yra .bi', 'burundis'),
(2525, 'Pitagorizmo ir platonizmo terminas, zymintis neapibreztumo, beformiskumo, gausumo ir materialaus kintamumo principa', 'diada'),
(2526, 'Mazas ratas', 'ratukas'),
(2527, 'Xx aprprancuzu skulptorius, kurio vienas zymiausiu darbu yra heraklis', 'burdelis'),
(2528, 'Tapytojas, pokalbis parke, melynas berniukas autorius', 'geinsboras'),
(2529, 'Nobelio fizikos premijos laureatas 1923m., apdovanotas uz elementariojo elektros kruvio ir fotoelektrinio efekto srities darbus', 'milikenas'),
(2530, 'Seniausia gyvenviete, minima rasytiniuose saltiniuose', 'apuole'),
(2531, 'Lietuvos respublika 1920-1938mturejo bendras sienas su latvija, lenkija ir ...', 'vokietija'),
(2532, 'Paveldimas gimines turtas', 'patrimoniumas'),
(2533, 'Kokios kosmetikos kompanijos ikureja yra liliane bettencourt', 'loreal'),
(2534, 'Kokiu vardu mums geriau zinoma dainininke anna mae bullock [orig.]', 'tina turner'),
(2535, 'Viduramziu ispanijos riteriai', 'kabaljerai'),
(2536, 'Japonijos budistu sventykla, kuria sudaro astuoni sakraliniai pastatai, isdestyti placioje muru aptvertoje teritorijoje', 'tera'),
(2537, 'Spalvoti atsiuvai (juostos) isilgai uniforminiu kelniu sonu', 'lampasai'),
(2538, 'Seniausias slavu kalbos raidynas', 'kirilica'),
(2539, 'Italiskas zodis, rasomas pries vienuolio varda ir reiskiantis broli', 'fra'),
(2540, 'Teorija, teigianti, kad visuomeneje turi veikti gamtos desniai (naturalioji atranka ir kova uz buvi)', 'socialdarvinizmas'),
(2541, 'Kas laikomas lietuviu kinematografijos pionieriumi', 'starevicius'),
(2542, 'Filmas bukas ir ...', 'bukesnis'),
(2543, 'Vadovaujamieji nurodymai, pamokymas kaip atlikti uzduotis', 'instruktazas'),
(2544, 'Vienas zymiausiu renesanso kompozitorius, pramintas belgu orfejumi', 'lasas'),
(2545, 'Egiptieciu menulio dievas', 'chonsu'),
(2546, 'Kabelis is didelio skaiciaus plonu izoliuotu ir tam tikru budu suvytu saku - laidininku', 'licendratas'),
(2547, 'Basic input output system', 'bios'),
(2548, 'Vieno sumanymo jungiami du paveikslai, papildantys vienas kita', 'diptikas'),
(2549, 'Valstybe europos pietryciuose, uzimanti balkanu pusiasalio pietine dali ir turinti daugiau negu 100 salu', 'graikija'),
(2550, '5-oji graikiskos abeceles raide', 'epsilon'),
(2551, 'Indu kasta, kuriai priklauso paprasti darbininkai', 'sudrai'),
(2552, 'Dykumu ir pusdykumiu plokscia lyguma, kuriospavirsius nuklotas molingu nuogulu; sausuoju metu laiku buna suskeldejes, odregnuoju - apsemtas plono vandens sluoksnio', 'takyras'),
(2553, 'Didziausias plesrunas sausumoje, uzaugantis iki 1000 kg svorio', 'baltasis lokys'),
(2554, 'Koks yra didziausias europos sajungos ezeras [vard.]', 'venernas'),
(2555, 'Kuriais metais buvo surengtas pirmasis rusijos imperijos (taip pat ir lietuvos) visuotinis gyventoju surasymas', '1897'),
(2556, 'Viena zymiausiu europos burlenciu gamybos firma', 'mistral'),
(2557, 'Prancuzijos generalinio stabo karininkas, zydas, nekaltai nuteistas, neva uz snipinejima vokietijos naudai [liet.]', 'dreifusas'),
(2558, 'Garsus vandens atrakcionu parkas netoli helsinkio', 'serena'),
(2559, 'Salis, kuri kaip manoma yra jogurto tevyne', 'bulgarija'),
(2560, 'Moldavijos piniginis vienetas', 'leja'),
(2561, 'Tekstine informacija, trancliuojama per televizija', 'teletekstas'),
(2562, 'Kuri spektro spalva yra priesinga melynai', 'oranzine'),
(2563, 'Cheminis elementas, kurio pavadinimas kilo is lotynisko zodzio, kuriuo anksciau buvo vadinama skandinavija', 'tulis'),
(2564, 'Lankstusis zmogus [lot.]', 'homo habilis'),
(2565, 'Mokslo veikalo, straipsnio, prakalbos, grozines literaturos kurinio sandaros metmenys', 'planas'),
(2566, 'Pusiasalis europoje, kuriame isikurusios norvegijos ir svedijos valstybes', 'skandinavijos'),
(2567, 'Lietuviu rasytojas, romanu po vasaros dangum, nesetu rugiu zydejimas, pilnaties valanda, kvietimas, rudens ekvinokcija, piemeneliu misios, teatsiveria tavo akys, z', 'bubnys'),
(2568, 'Lietuviu misku ir piemenu dievas', 'ganiklis'),
(2569, 'Aukstuju valstybes pareigunu, kurie nusikalto istatymams, apkaltinimo ir bylu nagrinejimo budas', 'apkalta'),
(2570, 'Status ir aukstas juros kranto skardis, susidares pajuryje, kur vyko arba vyksta intensyvi kranto abrazija', 'klifas'),
(2571, 'Vieno leidinio egzemplioriu visuma', 'tirazas'),
(2572, 'Planetos, jos palydovo ar zvaigzdes isorinis dujinis apvalkalas', 'atmosfera'),
(2573, 'Kelintais metais ivyko pirmasis kryziaus zygis', '1095'),
(2574, 'Popiezius, isakes liuteriui atsisakyti savo ideju', 'leonas'),
(2575, 'Buksyro velkamas krovininis laivas', 'barza'),
(2576, '2001 mpirmas robinzonas iskrites is lietuviu komandos', 'ieva'),
(2577, 'Vieno ekonominio dydzio lygiavertiskumas kitam', 'paritetas'),
(2578, 'Sirdies raumens susitraukimas', 'sistole'),
(2579, 'Pagrindiniu valstybes istatymu rinkinys', 'konstitucija'),
(2580, 'Aparatas dujoms, garams gaudyti', 'absorberis'),
(2581, 'Juodu eriuku kailis, kuris vartojamas brangiems kailiniams gaminti', 'karakulis'),
(2582, 'Buves klaipedos miesto meras, veliau, atsistatydinus rpaksui, tapes ministru pirmininku', 'gentvilas'),
(2583, 'Kabantis sviestuvas', 'liustra'),
(2584, '49-a valstija, prijungta prie jav 01.03.1959 m., sostine juneau [liet.]', 'aliaska'),
(2585, 'Senoves pirato, kontrabandininko pavadinimas', 'flibustjeras'),
(2586, '..capone', 'al'),
(2587, 'Japonu poezijos rusis, pazodziui isvertus reiskianti suvertos eiles', 'renga'),
(2588, 'Siaurine etiopijos kaimyne', 'eritreja'),
(2589, 'Porinis sporto zaidimas: raketemis kamuoliukasmusamas per tinkla aiksteleje - korte', 'tenisas'),
(2590, 'Apvalus, idubus (gali buti ir isgaubtas) randas priekines pilvo sieneles viduryje', 'bamba'),
(2591, 'Stambiausias turkijos administracinis teritorinis vienetas', 'ilas'),
(2592, 'Misle vidur dvaro vyza kabo', 'menulis'),
(2593, 'Kalnai esantys p.amerikoje', 'andai'),
(2594, 'Kelintais metais danijoje buvo ivesta krikscionybe', '960'),
(2595, '2001 mgeriausias lietuvos futbolininkas', 'jankauskas'),
(2596, 'Kas parase rusijos istorijos kursas', 'kliucevskis'),
(2597, 'Vaskine labai kvapi medziaga, susidaranti kasaloto zarnyne, vartojama parfumerijoje', 'ambra'),
(2598, 'Tiriamuju objektu generaline aibe, is kurios sudaroma imtis', 'populiacija'),
(2599, 'Medziagos kiekis, turintis tam tikra molekuliu skaiciu', 'molis'),
(2600, 'Visas materialus pasaulis, beribis erdves atzvilgiu ir nuolat kintantis', 'visata'),
(2601, 'Laivas, kurio plokstumas (sparnus) veikianti hidrodinamine jega visai arba is dalies atsveria laivo svorio jega', 'akvaplanas'),
(2602, 'Zmonijos pastangomis sukurtu ar kuriamu dvasiniu vertybiu visuma', 'kultura'),
(2603, 'Brangakmeniu drozyba, gludinimas, slifavimas', 'litoglifika'),
(2604, 'Persejo alfa, arabu vadinta setono zvaigzde', 'algolis'),
(2605, 'Andaluzijos cigonu dainos ir sokiai, atliekami pritariant gitara', 'flamenko'),
(2606, 'Voro mezginys', 'tinklas'),
(2607, 'Zuvusi princese', 'diana'),
(2608, 'Kompleksinis fermentu preparatas', 'festalis'),
(2609, 'Polimerine rulonine grindu medziaga', 'linoleumas'),
(2610, 'Amerikieciu kino aktorius, vaidines filmuose geismu tramvajus, laukinis, krantine', 'brando'),
(2611, 'Kada buvo ikurtas europos angliu ir plieno susivienijimas (eeb)', '1952'),
(2612, 'Nugaros smegenyse slopinantis neurotransmiteris', 'glicinas'),
(2613, 'Kaina, kuria birzoje perkami ir parduodami vertybiniai popieriai', 'kursas'),
(2614, 'Kas pirmasis gavo auksine plokstele - apdovanojima uz tai, kad parduota milijonas ploksteliu su jo atliekamo kurinio irasu [orig.]', 'miller'),
(2615, 'Davinys, tam tikros sudeties maisto porcija', 'racionas'),
(2616, 'Cheminis elementas, kurio pavadinimas kilo is graiku kalbos zodzio, reiskiancio kvapas', 'osmis'),
(2617, 'Keli vaisiai ant vienos sakeles', 'keke'),
(2618, 'Augalu dauginimosi budas, kai gametofitas vystosi is vegetatyviniu sporofito lasteliu bei redukcinio dalijimosi ir sporu susidarymo', 'aposporija'),
(2619, 'Masina orui, dujoms, garams suspausti iki itin didelio slegio', 'kompresorius'),
(2620, 'Viena teniso partijos dalis (ribojama tasku skaiciaus)', 'geimas'),
(2621, 'Ezeras, i kuri iteka syrdarja ir amudarja: ..jura', 'aralo'),
(2622, 'Cheminis elementas, kurio simbolis f [numeris 9]', 'fluoras'),
(2623, 'Sv kazimiero diena', 'kovo 4'),
(2624, 'Kalnu vardai', 'oronimai'),
(2625, 'Sumeru vaisingumo, gyvybingumo deive', 'inana'),
(2626, 'Irankis vinims traukti', 'reples'),
(2627, 'Juosteles ar fotokameros matricos sviesos jautrumas', 'iso'),
(2628, 'Laivo savybe plaukti vandens pavirsiumi ir nenugimzti giliau krovinines markes', 'pludrumas'),
(2629, 'Petro i laiku diduomenes susirinkimai, per kuriuos budavo aptaraimi reikalai, linksminamasi', 'asambleja'),
(2630, 'Kokia garsi italijos futbolo komanda rungtyniauja 71 tukstvietu dele alpi stadione', 'juventus'),
(2631, 'Prietaisas atmosferos slegiui matuoti', 'barometras'),
(2632, 'Isorinis objektu tyrimas', 'makrotyrimas'),
(2633, 'Keliautojo-tyrinetojo dzeimso kuko tautybe', 'anglas'),
(2634, 'Didziausias prancuzijos pusiasalis', 'bretane'),
(2635, 'Isankstinis pasiulymas del prekes pirkimo ar pardavimo; jo tikslas - isaiskinti galimus pirkejus ar pardavejus, suinteresuotus sudaryti sutarti', 'trakacija'),
(2636, 'Zmogus, turintis visuotini pripazinima, ypac gerbiamas', 'autoritetas'),
(2637, 'Zmogus, kuris veikia vadovaudamasis praktiniais isskaiciavimais', 'pragmatikas'),
(2638, 'Prospektas kitaip', 'aveniu'),
(2639, 'Kuriame zemyne nera valstybines zemes nuosavybes', 'antarktidoje'),
(2640, 'Eina po antro', 'trecias'),
(2641, 'Didesne negu 1 mm skersmens tustuma uolienoje ar jos pavirsiuje, matoma paprasta akimi', 'makropora'),
(2642, 'Visumos ir jos daliu darna, tikroves vystymosi desningumas, vidaus ir isores, turinio ir formos atitikimas', 'harmonija'),
(2643, 'Vilniaus gubernatoriaus muravjovo pravarde', 'korikas'),
(2644, 'Ilgiausia upe tekanti tik lietuvos teritorijoje', 'sventoji'),
(2645, 'Jurine zuvis, gyvenanti tropinio ir subtropinio klimato juostu vandenyse; jai budingas istises ieties pavidalo virsutinis zandikaulis', 'marlina'),
(2646, 'Medinis indas grudams , miltams supilti, darzovems rauginti', 'kubilas'),
(2647, 'Koks bokstas, turejes siekti dangu, taip ir liko nepastatytas', 'babelio'),
(2648, '13-oji graikiskos abeceles raide', 'ni'),
(2649, 'Pilietinis, nekarinis, nebaznytinis', 'civilinis'),
(2650, 'Ten uz atlanto...', 'amerika'),
(2651, 'Prie aerostato arba dirizablio apvalkalo prikabintaskrepsys - patalpa zmonems, maistui, irangai', 'gondola'),
(2652, 'Segraiku ir romenu santuokos dievas', 'himenejas'),
(2653, 'Paolo coelho romanas veronika ryztasi ...', 'mirti'),
(2654, 'Parazitinis rugiu grybas', 'skalse'),
(2655, 'Parase poema metai', 'donelaitis'),
(2656, 'Kaip vadinosi pirmoji muzikine epocha', 'viduramziai'),
(2657, 'Kas jav prezidentui dz.fkenedziui sudainavo happy birthday per jo 45-ta gimtadieni', 'monro'),
(2658, 'Siaures amerikos spygliuotis', 'sekvoja'),
(2659, 'Diplomatinis zygis', 'demarsas'),
(2660, 'Klubas, laimejas nhl cempionata 2000 m.', 'devils'),
(2661, 'Teleloto pagrindinis prizas', 'aukso puodas'),
(2662, 'Babilino karalius, 587 m.prkrsugrioves jeruzale', 'nabuchodonosaras II'),
(2663, 'Kokioj saly gime pirmoji opera', 'italijoje'),
(2664, 'Vakaru krypties oro srautai aukstutineje troposferoje tropinese srityse', 'antipasatas'),
(2665, 'Salis, kurioje viduramziais vyravo drabuziu mada: dirbtiniai pilvai', 'ispanija'),
(2666, 'Anglu gydytojas, 1798 mpaskelbes skiepus profilaktine priemone nuo raupu', 'dzeneris'),
(2667, 'Pusiau dengtas vidinis kiemas - svarbiausioji senoves romenu gyvenamojo namo patalpa', 'atrijus'),
(2668, 'Cheminis elementas, kurio pavadinimas kilo is lotynisko zodzio, lietuviskai reiskiancio sharmas', 'kalis'),
(2669, 'Greitas leidimasis slidemis nuo kalno specialia vingiuota trasa', 'slalomas'),
(2670, 'Periferinis kompiuterio itaisas - rankena su 2 valdymo mygtukais', 'dzoistikas'),
(2671, 'Nuo keliu metu galima tapti lietuvos seimo nariu', '25'),
(2672, 'Irasas vekselyje, reiskiantis, kad jis turi buti apmokamas, kai tik bus pateiktas; pateiktinis vekselis', 'avista'),
(2673, 'Vieta kur mokosi vaikai, pradinukai, paaugliai', 'mokykla'),
(2674, 'Plieno lydinys, is kurio gaminami tikslieji prietaisai; isrado sveicaru fizikas segijomas', 'invaras'),
(2675, 'Linija isilgai laivo borto, rodanti didziausia pakrauto laivo grimzle', 'vaterlinija'),
(2676, 'Darbo kambarys', 'kabinetas'),
(2677, 'Salis, kurios valiutos sutrumpinimas nok', 'norvegija'),
(2678, 'Lengvas dviratis zmogaus traukiamas vezimas', 'riksa'),
(2679, 'Fiziskai nepaprastai stiprus zmogus', 'galiunas'),
(2680, 'Vokieciu fizikas, kurio garbei pavadintas tarptautines vienetu sistemos elektros varzos vienetas', 'omas'),
(2681, 'Ikikarineje lietuvoje- centrine pieno perdirbimobendroviu sajunga', 'pienocentras'),
(2682, 'Tapatus, tolygus, toks pat', 'identiskas'),
(2683, 'Prusu gydymo dievas', 'ausautas'),
(2684, 'Kataliku ir staciatikiu baznycios zemiausio laipsnio dvasininkas', 'diakonas'),
(2685, 'Koks naminis gyvulys yra svantano atributas', 'kiaule'),
(2686, 'Vandeni pertveriantis, uztvenkiantis irenginys', 'uztvanka'),
(2687, 'Ispanijos siaurine sritis ties biskajos ilanka ir prancuzija, kuri reikalauja nepriklausomybes', 'baskija'),
(2688, 'Futbolininkas, kuriam priklauso rezultatyvumo rekordas - 13 ivarciu pasaulio cempionato finaliniame etape', 'fontenas'),
(2689, 'Elektromagnetiniu spinduliu kvantas', 'fotonas'),
(2690, 'Kas renka jav prezidenta', 'rinkiku kolegija'),
(2691, 'Pirmasis bulgarijos chanas (681-702)', 'asparuchas'),
(2692, 'Apytiksliai kuriais metais vanile, kaip prieskonis ir parfumerinis augalas, buvo atgabentas i europa', '1500'),
(2693, 'Dabartinis kuibysevo pavadinimas', 'samara'),
(2694, 'Seniausias pasaulyje sventasis rastas, priklausantis zoroastristams', 'avesta'),
(2695, 'Cheminis elementas, kurio pavadinimas kilo is graiku kalbos zodzio nestabilus, nepastovus', 'astatas'),
(2696, 'Drozybos technika sukurti skulpturos, taikomosios dailes, liaudies mono dirbiniai', 'droziniai'),
(2697, 'Pati didziausia pamerikos valstybe', 'brazilija'),
(2698, 'Antras pagal dydi zemynas', 'afrika'),
(2699, 'Fizikinis dydis, parodantis, kokia yra medziagos vienetinio turio mase', 'tankis'),
(2700, 'Dievybes isikunijimas zmoguje', 'inkarnacija'),
(2701, 'Maza barzdele', 'bite'),
(2702, 'Butelyje uzdaryta dvasia', 'dzinas'),
(2703, 'Korano nustatytas mokestis neturtingiesiems', 'zekiatas'),
(2704, 'Antikos teatre - choro partija tarp dvieju epeisodiju', 'stasimas'),
(2705, 'Viena rakeciu sporto rusiu, zaidziama specialiame uzdarame kambaryje', 'skvosas'),
(2706, 'Pirstu atspaudas', 'daktilograma'),
(2707, 'Uzdaras karoliuku verinys, tikinciuju naudojamas meldziantis', 'rozancius'),
(2708, 'Koketavimas arba...', 'flirtas'),
(2709, 'Kulturos istaiga, renkanti, sauganti, tirianti ir eksponuojanti gamtos, istorijos, kulturos vertybes', 'muziejus'),
(2710, 'Visuomenes mokslu teorijoje ir metodologijoje paziura, atmetanti metodologini individualizma ir skelbianti, kad reiskiniai sudaro vientisas sistemas', 'holizmas'),
(2711, 'Vandens kanalais garsejantis italijos miestas', 'venecija'),
(2712, 'Klastingi veiksmai, pikti keslai, pinkles', 'intriga'),
(2713, 'Paskutinis pavasario menuo', 'geguze'),
(2714, 'Ivairiausiu priestaringu dalyku vienybe ir santarve', 'harmonija'),
(2715, 'Antrasis diatonines gamos laipsnis', 'sekunda'),
(2716, 'Romenu mitologijoje - medicinos dievas', 'eskulapas'),
(2717, 'Indijos valdovas', 'radza'),
(2718, 'Musulmonu religinis (sventasis) karas su kitatikiais', 'dzihadas'),
(2719, 'Giesme, slovinanti didvyri arba sportiniu varzybu nugaletoja', 'enkomionas'),
(2720, 'Senromenu daugiaaukstis gyvenamasis namas su nuomojamais kambariais arba butais, perkybos patalpomis (i aukste)', 'insule'),
(2721, 'Vyskupo kepure', 'tiara'),
(2722, 'Rigvedoje - pirmas mirusysis, tapes pomirtinio pasaulio valdovu', 'jamas'),
(2723, 'Dailes technika: vaizdo kurimas liepsna (aprukant popieriu, jo pavirsiuje susidaro saviti vaizdiniai efektai)', 'fumazas'),
(2724, 'Kada pirma karta buvo pavartotas baltu terminas', '1845'),
(2725, 'Kaip vadinama keleto garsiausiu danijos rezisieriu grupe', 'dogma'),
(2726, 'Istorijos tevas', 'herodotas'),
(2727, 'Didziausia japonijos sala', 'honsiu');
INSERT INTO `vikte_klsm` (`id`, `klsm`, `ats`) VALUES
(2728, 'Bejungtukis zodziu, fraziu siejimas', 'asindetonas'),
(2729, 'Dokumentas, smulkiai, argumentuotai isdestantis kurios nors problemos esme', 'memorandumas'),
(2730, 'Liturginis indas, taure, kuriame laikomi konsekruoti komunikantai', 'komunine'),
(2731, 'Auksciausia poliarinio uralo virsune', 'pajeris'),
(2732, 'Medziaga, biologine rusis (organizmai) arba fizikinis reiskinys, kurie del zmogaus veiklos patenka i aplinka ar vandens objekta ir pakeicia jo fizikines bei chemines savybes tokiu mastu, kad virsija gamtini fona ir labai blogina vandens kokybe', 'tersalas'),
(2733, 'Vienuolyno patalpa, skirta vienuoliu susitikimams su lankytojais, dazniausiai artimaisiais', 'parlatorijus'),
(2734, 'Zemynas - pingvinu buveine', 'antarktida'),
(2735, 'Princu titulas ispanijoje, brazilijoje ir portugalijoje', 'infantas'),
(2736, 'Kunigas, laikantis misias', 'celebrantas'),
(2737, 'Asmuo arba organizacija, prisiimanti isipareigojimus pagal kontrakta', 'kontraktantas'),
(2738, 'Asmuo, ieinantis i bendrija', 'narys'),
(2739, 'Kada buvo atrastos kraujo grupes', '1900'),
(2740, 'Cheminis elementas, isgaunamas is gelezies rudos ja lydant', 'gelezis'),
(2741, 'Popieziaus aplinkrastis religijos, morales ir socialiniais politiniais klausimais', 'enciklika'),
(2742, 'Asmens ar ivykio isaukstinimas', 'apoteoze'),
(2743, 'Kuriais metais lietuva tapo europos tarybos nare', '1993'),
(2744, 'Lasteles apvalkalas', 'membrana'),
(2745, 'Planas, gautas darant geodezine nuotrauka', 'plansete'),
(2746, 'Prancuzijos 5 santimu monetos neoficialus pavadinimas 1799-1947', 'su'),
(2747, 'Geluju vandenu ir pelkiu dumblas', 'sapropelis'),
(2748, 'Savo darbo klaidu iskelimas', 'savikritika'),
(2749, 'Cado sostine', 'ndzamena'),
(2750, 'Romenu ilgas drabuzis', 'toga'),
(2751, 'Pirmasis krikscioniu sventasis kankinys, graikiskai kalbantis zydas, gyvenes i apradzioje', 'steponas'),
(2752, 'Klajokliu gentys, viia.pr.kr - iiia.po krgyvenusios juodosios juros siaurineje pakranteje', 'skitai'),
(2753, 'Zemes pavirsiaus formu visuma, susidariusi del giluminio ir pavirsinio geologinio poveikio', 'reljefas'),
(2754, 'Kas parase veikala istoriografijos teorija ir istorija', 'kroce'),
(2755, 'Senoves graiku miesto itvirtintas centras', 'akropolis'),
(2756, 'Ryskus priverstiniu svyravimu amplitudes padidejimas, kai priverstinius kuno svyravimus sukeliancios jegos kitimo daznis sutampa su to kuno laisvuju svyravimu dazniu', 'rezonansas'),
(2757, 'Itaisas prasidedanciam gaisrui gesinti', 'gesintuvas'),
(2758, 'Automobilio peugeot modelis, kuriame pirmiausiai buvo itaisyti grudinti stiklai', 'bebe'),
(2759, 'Salis, kurioje 2001 metu duomenemis, didziausias procentas suaugusiuju gyventuju yra uzsikrete hiv(ziv)virusu', 'botsvana'),
(2760, 'Kelintais metais susirinkime konstantinopolyje patvirtinta dogma apie svenciausiaja trejybe', '381'),
(2761, 'Titulas ir pareigybe viduramziu skandinavijoje', 'jarlas'),
(2762, 'Nesiojama skara', 'skepeta'),
(2763, 'Senoves romenu viesoji pirtis', 'terma'),
(2764, 'Pirmasis jav prezidentas', 'vasingtonas'),
(2765, 'Lytinis santykiavimas arba kuno pasiula gaslumui patenkinti uz materialini atlyginima', 'prostitucija'),
(2766, 'Reiskinys, kuomet vos tik pasirode seklu daigai, esantys po zeme, verziasi i sviesa', 'fototropizmas'),
(2767, 'Mobilaus telefono salis gamintoja, jei du jo pirmieji imei kodo skaiciai, zymintys valstybe, kurioje jis pagamintas, yra 33', 'prancuzija'),
(2768, 'Austru mokslininkas, atrades, kad senoveje zemeje buvo tik vienas zemynas, kuri jis pavadino pangeja', 'vegeneris'),
(2769, 'Lasijos karalius, paverstas geniu', 'pikas'),
(2770, 'Laikymasis senu tradiciju, paprociu, tvarkos, siekis juos issaugoti, atkurti; priesiskumas naujovems', 'konservatizmas'),
(2771, 'Vyrvardas, kiles is lotkalbos, reiskia giria, miskas', 'silverijus'),
(2772, 'Rinka, kurioje yra tik vienas pirkejas', 'monopsonija'),
(2773, 'Tarpas tarp dvieju vertikaliu liniju lenteleje', 'skiltis'),
(2774, 'Senovinis rusu ilgio matas, lygus 1,067km', 'varstas'),
(2775, 'Paukstis, ryskiai raudonais antakiais', 'tetervinas'),
(2776, 'Zydu religines apeigos, kuriu metu auka yra sudeginama', 'holokaustas'),
(2777, 'Sengraiku stovincio nuogo jaunuolio statula; budinga archaikos laikotarpiui', 'kuras'),
(2778, 'Apavas isskobtas is medzio', 'klumpes'),
(2779, 'Automobilio itaisas, mazinantis ismetamuju duju kenksminguma', 'katalizatorius'),
(2780, 'Prancuzijos f-1 trasa', 'magny cours'),
(2781, 'Senoves graiku paprotys naslei susideginti lauze su vyro lavonu', 'suti'),
(2782, 'Tamsiai melynas akmuo', 'lazuritas'),
(2783, 'Storo milo apklotas arkliui, klojamas ant balno ar po juo', 'valtrapas'),
(2784, 'Coca-cola gerimo isradejas [lietuviskai]', 'pembertonas'),
(2785, 'Valstybe skandinavijoje,kuri ribojasi su suomija ir norvegija, krantus skalauja skagerako ir kategato sasiauriai ir baltijos jura, botnijos ilanka', 'svedija'),
(2786, 'Istaigu pavaldumo pakopa', 'instancija'),
(2787, 'Senoves graiku karo mokslo deive', 'atene'),
(2788, 'Kalnu masyvas ispanijoje, centriniuose pirenuose', 'maladeta'),
(2789, 'Dirzas ginklui nesioti, kardasaitis', 'portupeja'),
(2790, '2002 mpasaulio vyru krepsinio cempione', 'jugoslavija'),
(2791, 'Romenu mitologijoje - pavasario deive', 'prozerpina'),
(2792, 'Sventybes apsireiskimas daikte, augale, gyvune', 'hierofanija'),
(2793, 'Kurinio pradzioje irasomas tekstas, kur skelbiama, kam kurinys yra skiriamas', 'dedikacija'),
(2794, 'Salvadoro respublikos administracinis teritorinis vienetas', 'departamentas'),
(2795, 'Zydintis pasarinis augalas', 'lubinas'),
(2796, 'Konsistencinis tepalas, sudarytas is alyvos, sutirstintu riebiuju rugsciu natrio druskomis', 'konstalinas'),
(2797, 'Faraonas, kuriam valdant egipto galia buvo didziausia', 'amenchotepas III'),
(2798, 'Valstybes sutikimas priimti kitos valstybes siuloma kandidata i diplomatines atstovybes vadovus', 'agremanas'),
(2799, 'Senoves romoje, zmones, atsakingi uz viesaja tvarka', 'edilai'),
(2800, 'Krizes, degradavimo, issigimimo reiskiniai valdanciuju isnaudotuju klasiu dvasineje kulturoje', 'dekadansas'),
(2801, 'Arabu kulturos plitimas i kitas salis', 'arabizacija'),
(2802, 'Medzio vainikas', 'laja'),
(2803, 'Cheminis elementas, kurio simbolis bh [numeris 107]', 'boris'),
(2804, 'Acid house stiliu apibrezes ir jo klasika tapes 1985 mphuture kurinys', 'acid trax'),
(2805, 'Biblineje tradicijoje-seniausias is patriarchu', 'abraomas'),
(2806, 'Teologijos ir mitologijos dalis, aiskinanti dievu kilme ir genealogija', 'teogonija'),
(2807, 'Nesamoningai motyvuota individo parengtis rodyti palankuma patraukliam asmeniui', 'simpatija'),
(2808, 'Pirmasis lietuviu lyrinis poetas, isleides 11 eilerasciu knyga giesmes svietiskos ir sventos', 'strazdas'),
(2809, 'Laidininku sistema, kurioje indukuojama elektrovaros jega ir kuria tekanti srove sukuria magnetini lauka', 'apvija'),
(2810, 'Pagrindine lasteles branduolio medziaga', 'chromatinas'),
(2811, 'Azerbaidzano sostine', 'baku'),
(2812, 'Virsutine kapitelio dalis', 'abakas'),
(2813, 'Cheminis elementas, pavadintas lenkijos garbei', 'polonis'),
(2814, 'Trumpas ir tikslus taisykles uzrasymas skaiciais ir raidemis', 'formule'),
(2815, 'Xix adbritanijoje - airijos nepriklausomybespriesininkai', 'junionistai'),
(2816, 'Geodezinis prietaisas horizontaliems ir vertikaliems kampams matuoti', 'teodolitas'),
(2817, 'Kelintais metais imperatorius teodosijus i tikejimo ediktu uzdraude pagoniu susirinkimus', '380'),
(2818, 'Trecio kurso medicinos studentas, atrades kasos endokrinio audinio saleles, sintetinancias insulina', 'langerhansas'),
(2819, 'Austru kompozitorius, vienos klasikines mokyklos atstovas, daugiau kaip 100 simfoniju (tarp ju atsisveikinimo), 14 misiu, oratoriju, kitu kuriniu instrumentiniams ansambliams autorius', 'haidnas'),
(2820, 'Apsaugines suvirinimo dujos placiai naudojamos karineje pramoneje', 'helis'),
(2821, 'Sviesiai rausva spalva, panasi i zmogaus odos spalva', 'inkarnatas'),
(2822, '1000 kg', 'tona'),
(2823, 'Rusu senovinio gyvenamojo namo virsutinis aukstas', 'teremas'),
(2824, 'Atgaiva dykumoje', 'oaze'),
(2825, 'Koks nors materialus objektas', 'daiktas'),
(2826, 'Kardinolu susirinkimas, saukiamas popieziui rinkti', 'konklava'),
(2827, 'Virsutinio denio uzpakaline dalis, antstatas laivagalyje', 'jutas'),
(2828, 'Vilniaus katedros klebonas magistras, 1417 mtapes pirmuoju zemaiciu vyskupu', 'motiejus'),
(2829, 'Kataliku ar staciatikiu baznycios zemiausio laipsnio dvasininkas', 'diakonas'),
(2830, 'Nustatytas apeiginiu veiksmu tvarka tam tikram religiniam aktui atlikti', 'ritualas'),
(2831, 'Zmogaus polinkis savo gyvenimo ivykiu priezastimi laikyti isorinius veiksnius', 'eksternalumas'),
(2832, 'Zeme ziedo pavidalo koralu sala, kurios viduryje telkso laguna', 'atolas'),
(2833, 'Valgis is mesos, zuvu arba kitu produktu, sutrintu iki pastos pavidalo', 'pastetas'),
(2834, 'Vienas is prarastosios kartos rasytoju, romanu didvyrio mirtis, visi zmones priesai autorius', 'oldingtonas'),
(2835, 'Keleto sodybu junginys, valstieciu zemdirbiu gyvenviete', 'kaimas'),
(2836, 'Upe sakiu ir vilkaviskio rajonuose, sesupes desinysis intakas', 'nenupe'),
(2837, 'Kaip vadinasi pirmasis kosminis aparatas, sekmingai praskriejes pro menuli', 'luna 1'),
(2838, 'Salis, kurios domeno vardas yra .il', 'izraelis'),
(2839, 'Irengimas, kurio pagalba i orbita arba tarpplanetine trajektorija paleidziamas dirbtinis zemes palydovas arba tarpplanetine stotis', 'raketa'),
(2840, 'Seniau snieckus', 'visaginas'),
(2841, 'Karys, paskirtas vykdyti specialius stabo, dalinio vado ar garbes asmens pavedimus', 'ordonansas'),
(2842, 'Antzemine augalo dalis', 'stiebas'),
(2843, 'Kabaloje (judaizmo saka) - savitos tarpines bukles, dieviskosios galios, veikiancios tarp materijos ir dievo, sujungiancios zmogu ir pasauli su absoliutu', 'sefirotai'),
(2844, 'Senoves graiku mitologijoje - apolono ir kalipses sunus, nuejes i mirusiuju karalyste parsivesti zmonos euridikes', 'orfejas'),
(2845, 'Kaip vadinami dielektrikai kuriu molekuliu teigiamu ir neigiamu kruviu pasiskirstimo centrai nesutampa', 'poliniai'),
(2846, 'Valstybe, uzimanti apie penkis sestadalius airijos salos, esancios i vakarus nuo europos zemynines dalies', 'airija'),
(2847, 'Kentauras, persekiojes heraklio zmona dejanera; uz tai heraklis ji nuzude', 'nesas'),
(2848, 'Anuo metu', 'anuomet'),
(2849, 'Sviesos, garso ar kitoks zenklas kokiai nors ziniai perduoti', 'aliarmas'),
(2850, 'Zodis, kuriuo sovietiniais laikais vadinaome maisto prekiu parduotuve', 'gastronomas'),
(2851, 'Kalnas ant kurio susikures san marinas', 'titano'),
(2852, 'Vyriausia sachmatu figura', 'karalius'),
(2853, 'Koki dieva vaizdavo rodo kolosas', 'helija'),
(2854, 'Kalnas, ant kurio vykdavo pagoniskos apeigos', 'alkakalnis'),
(2855, 'Pagrobtoji nuotaka filme kaukazo belaisve', 'nina'),
(2856, 'Galine storosios zarnos dalis', 'tiesioji zarna'),
(2857, 'Rankrasciu puosimas inicialais, ornamentais ir figuriniais elementais ( kitaip miniatura )', 'iliuminacija'),
(2858, 'Auksciausias karinis laipsnis; kryziuociu ordino kariuomenes vadas', 'marsalas'),
(2859, 'Lietuviu rasytoja, romanu pavasariu audroj, aukstuju simoniu likimas, vilius karalius, apysakos paskutine kunelio kelione autore', 'simonaityte'),
(2860, 'Zuvies kvepavimo organai [dgs.]', 'ziaunos'),
(2861, 'Savaeigis vagonas', 'drezina'),
(2862, 'Kas parase romana drakula [liet.]', 'stoukeris'),
(2863, 'Greiciausias paukstis kai puola pasiekia 362 km/h greiti', 'sakalas keleivis'),
(2864, 'Moteru ir daugelio gyvunu pateliu vidinis lyties organas, kuriame vystosi vaisius', 'gimda'),
(2865, 'Mokslas, tiriantis slapimo sistemos ir vyru lyties organu ligas', 'urologija'),
(2866, 'Misle: vasara skardos smotas, ziema brolis sidabruotas', 'radiatorius'),
(2867, 'Zuvis - gyvate', 'ungurys'),
(2868, 'Mafijos tylos izadas', 'omerta'),
(2869, 'Knygu, iliustraciju spausdinamoji forma', 'klise'),
(2870, 'Nedidelis paukstelis ilga uodega', 'kiele'),
(2871, 'Literaturos kurinys, perdetai slovinantis asmens nuopelnus ar ivyki; liaupsinamoji kalba', 'panegirika'),
(2872, 'Tiesine erdve su fiksuota norma', 'normuotoji'),
(2873, 'Pagal biblija zmoniu gimines motina', 'ieva'),
(2874, 'Poliamidinis pluostas', 'nailonas'),
(2875, 'Viduramziais bizantijoje - garbes gvardijos kareivis', 'palatinas'),
(2876, 'Organizmai, gyvenantys dirvozemyje', 'geobiontai'),
(2877, 'Monarcho valdzios zenklas', 'regalija'),
(2878, 'Ka isvertus is kinu kalbos reiskia hieroglifo dze reiksme [vnsvard.]', 'vaikas'),
(2879, 'Gimines, seimos kilmes istorija', 'genealogija'),
(2880, 'Sukurimo data, uzrasyta ant dailes kurinio', 'chronograma'),
(2881, 'Tailando ankstesnis pavadinimas', 'siamas'),
(2882, 'Stiprus alkoholinis gerimas, gaminamas is distiliuoto vynuogiu vyno arba distiliuotu vynuogiu sulciu', 'brendis'),
(2883, 'Pasirinkimas kitaip', 'paranka'),
(2884, 'Kaip buvo pravardziuotas pirmasis istorijoje minimas garsus baltaodis dziazo muzikantas leonas bismarckas beiderbeckeas', 'bix'),
(2885, 'Pusapvale arba daugiakampe issikisusi kulto pastato dalis su puskupoliu arba pusskliauciu', 'apsida'),
(2886, 'Stacionari saudymo aisktele su irenginiais ir judanciais taikiniais', 'stendas'),
(2887, 'Alchemiku ieskotas stebuklingas jauninantis gerimas', 'eliksyras'),
(2888, 'Ivairiu rusiu ir zanro kuriniai, kuriuose menines raiskos priemonemis siekiama auklejamuju ir svieciamuju tikslu: ..literatura', 'didaktine'),
(2889, 'Aktore filme titanikas suvaidinusi rose: kate ..[orig.]', 'winslet'),
(2890, 'Plauciu liga, kuria sukelia ikveptos cukranendriu atlieku dulkes, nusedusios plauciuose', 'bagasoze'),
(2891, 'Biblijoje - karaliaus samsono mylimoji, jam mieganciam nukirpusi plauku sruoga ir taip atemusi jam nenugalimuma', 'dalile'),
(2892, 'Biologinio audinio plauseliai', 'skaidulos'),
(2893, 'Kas parase veikala reformacijos laiku vokietijos istorija', 'ranke'),
(2894, 'Kiek minuciu trunka vienas kelinys 3x3 krepsinyje', '8'),
(2895, 'Istatymu nustatyta tvarka iformintas savanoriskas vyro ir moters susitarimas sukurti seimos teisinius santykius', 'santuoka'),
(2896, 'Gyvenamojo meto ivairiu autoriu literaturos kuriniu rinkinys', 'almanachas'),
(2897, 'Valstybes pareigunas, dirbantis oficialiu santykiu su uzsienio valstybemis srityje', 'diplomatas'),
(2898, 'Igimtas jausmas, kuris skatina vyra su savo vaiku elgtis atsakingai ir jautriai', 'tevyste'),
(2899, 'Memorialinis paminklas - vertikali akmens plokste arba stulpas', 'stela'),
(2900, 'Koks krikscioniu sventasis laikomas medziotoju globeju', 'hubertas'),
(2901, 'Mitine vandens butybe', 'undine'),
(2902, 'Kuriais metais springfildo miesto koledze james naismith pirma kart imete kamuoli i krepsi, skirta rinkti persikus [veliau is to issivyste krepsinis]', '1891'),
(2903, 'Auksciausias antarktidos taskas', 'vilsono masyvas'),
(2904, 'Labai didele statula', 'kolosas'),
(2905, 'Gyvunai, parazituojantys ant zuvu', 'neges'),
(2906, 'Romenu ausros deive', 'aurora'),
(2907, 'Karinio ordino pilies ar jos srities valdytojas', 'komturas'),
(2908, 'Kokioje salyje buvo prijaukintos vistos', 'indijoje'),
(2909, 'Parku architekturos elementas: ilga, siaura geliu lysve, reminanti baseina, parteri arba parko taka', 'rabate'),
(2910, 'Suns veisle, kurios melynas liezuvis', 'ciauciau'),
(2911, 'Ilgiausias visu laiku animacinis filmukas (263 serijos) [liet.]', 'simpsonai'),
(2912, 'Vienas populiariausiu induizmo dievu', 'syva'),
(2913, 'Klaipedos siaurine dalis (nuo 1946 m.) baltijos pakranteje', 'melnrage'),
(2914, 'Ilgio vienetas, atitinkantis 3.26 sviesmecius', 'parsekas'),
(2915, 'Antikos skluptorius (4 aprkr.) hermio su sunumi dionizu statulos autorius (liet.)', 'praksitelis'),
(2916, 'Lietuviurasytojas, romano algimantas, apysaku keidosiu onute, keliones, dramo kova ties zalgiriais autorius', 'pietaris'),
(2917, 'Sutartis perduodant teise eksplotuoti gamtos isteklius ar valstybinius ukinius objektus, daznai lengvatinemis salygomis', 'koncesija'),
(2918, 'Cekijos smulkus pinigas', 'haleris'),
(2919, 'Puri, smulkiagrude uoliena, sudaryta is smulkiu kaip dulkes smelio, molio ar klinciu dalelyciu', 'liosas'),
(2920, 'Astuntas pagal dydi pasaulio miestas 2000 m.', 'kalkuta'),
(2921, 'Senoves miestas, kuriame mire aleksandras makedonietis', 'babilonas'),
(2922, 'Musulmonu namu dalis, kurioje gyvena vien moterys', 'harema'),
(2923, 'Grupes sh albumas (2003 m.) - supermeno ...', 'uzkandziai'),
(2924, 'Zmogus, sukures svyruoklini laikrodi', 'heigensas'),
(2925, 'Senovine prancuzijos moneta', 'ekiu'),
(2926, 'Lygybe, teisinga su bet kuriomis kintamuju reiksmemis', 'tapatybe'),
(2927, 'Prancuzu tapytojas (1834-1917m.) sokiu pamoka, sokejos repeticijoje, zydrosios sokejos autorius', 'dega'),
(2928, 'Is medzio isskabtuoti skambalai, padedave piemenims surasti gyvulius misko ganyklose', 'skrabalai'),
(2929, 'Pirmoji salis, pripazinusi lietuvos nepriklausomybe, paskelbta 1990 metais', 'islandija'),
(2930, 'Dezute tabakui laikyti', 'tabakine'),
(2931, 'Kokiomis kraujagyslemis kraujas teka i sirdi', 'venomis'),
(2932, 'Metamorfine uoliena, naudojama apdailai, skulpturoms', 'marmuras'),
(2933, 'Egiptieciu mitologijoje - memfio miesto globejas, amatu ir isminties dievas', 'ptachas'),
(2934, 'Lietuviu saules tekejimo deive - nuostabaus grozio mergele, kas ryta uzkuria ugni, nuprausia saule ir isleidzia ja spindincia i dangu', 'ausrine'),
(2935, 'Estetikos kategorija, kurioje atsispindi ir ivertinami tikroves reiskiniai bei meno kuriniai, keliantys zmogui estetinio pasitenkinimo jausma', 'grozis'),
(2936, 'Kelintais metais susikure lietuvos helsinkio grupe', '1976'),
(2937, 'Lietuvos upe, tekanti per ariogala', 'dubysa'),
(2938, 'Beveik apskrita zuvis su astriais nugaros peleko dygliais ir tamsia deme ant sono', 'saulene'),
(2939, 'Pagrindinis raumenu lasteliu baltymas prisijungiantis deguoni', 'mioglobinas'),
(2940, 'Judamasis 2 detaliu sujungimas, leidziantis vienai ju suktis arba svyruoti kitos atzvilgiu', 'sarnyras'),
(2941, 'Skaidymasis i dalis', 'irimas'),
(2942, 'Tauta, kalbanti viena kva kalbu; gyvena nigerijoje', 'jorubai'),
(2943, 'E.zola romanas', 'zerminalis'),
(2944, 'Jav parlamento aukstieji rumai', 'senatas'),
(2945, 'Dengtas balkonas', 'lodza'),
(2946, 'Jura skalaujanti graikijos krantus', 'jonijos'),
(2947, 'Prie kryziaus prikalto kristaus figura', 'krucifiksas'),
(2948, 'Programiniu ir techniniu priemoniu visuma informacijai persiusti dideliais atstumais', 'telekomunikacija'),
(2949, 'Kataliku sventove', 'baznycia'),
(2950, 'Ezeras, didziausias pasaulyje gelo vandens telkinys', 'baikalas'),
(2951, 'Puosni sege rubams susegti, galvos apdangalu plunksnoms pritvirtinti', 'agrafa'),
(2952, 'Vitamino b2 cheminis pavadinimas', 'riboflavinas'),
(2953, 'Cirko, kino menines israiskos priemone - vikrus, efektingas veiksmas', 'triukas'),
(2954, 'Spalva, kuria paprastai dazomos lektuvu juodosios dezes', 'oranzine'),
(2955, 'Jav meno kino prizas', 'oskaras'),
(2956, 'Kaliniu kambarys kalejime', 'kamera'),
(2957, 'Siauras kelelis eiti', 'takas'),
(2958, 'Tarptautine futbolo sajungu federacija', 'fifa'),
(2959, 'Kokioje grupeje grojo regio muzikantas bob marley', 'the wailers'),
(2960, 'Kiek procentu vandens yra duonoje bei pyraguose', '75'),
(2961, 'Vandens blusa, sakotausiu veziagyviu poburio genties atstovas', 'dafnija'),
(2962, 'Operetes pauksciu pardavejas autorius', 'celeris'),
(2963, 'Kokio zymaus didziosios britanijos dainininko vardas yra georgias kyriacas panayiotou', 'george michael'),
(2964, 'Pavieniai dideli akmenys ar akmenu grupes, kuriems lietuviu padavimuose suteikiama zmogaus savybiu', 'mokai'),
(2965, 'Ginklu amunicijos sandelis', 'arsenalas'),
(2966, 'To paties metalo egzistavimas keliose kristalinese formose', 'alotropija'),
(2967, 'Valstybe, kurios sudetyje lietuva buvo 1795-1915 mlaikotarpiu', 'rusija'),
(2968, 'Sporto saka - leidimasis nuo kalno su slidemis, atliekant ivairius triukus', 'fristailas'),
(2969, 'Pranesimas apie nuveikta darba', 'ataskaita'),
(2970, 'Kiek zmoniu pabuvojo menulyje [zodziais]', 'dvylika'),
(2971, 'Kariuomene, parengta islaipinti prieso teritorijoje', 'desantas'),
(2972, 'Gyvenamasis laivo kambarys', 'kajute'),
(2973, 'Mechanika skirstoma i dinamika, statika ir ...', 'kinematika'),
(2974, 'Dekoratyvine arba apsaugine azurine uztvara, dazniausiai gaminama is metalo [dgs.]', 'grotos'),
(2975, 'Labai maza pietvakariu europos salis, esanti rytineje pirenu kalnu puseje, tarp prancuzijos ir ispanijos', 'andora'),
(2976, 'Zmogus, be specialiojo issilavinimo dirbantis mokslini arba kurybini darba, tik pavirsutiniskai suprantantis dalyka', 'diletantas'),
(2977, 'Rajumas - liguitai gausus valgymas', 'adefagija'),
(2978, 'Vienas is 12 jezaus apastalu, kurio atributai yra x formos kryzius ir virve', 'andriejus'),
(2979, 'Rusu tapytojas, sviesa virs pilkumos, zeme ir zaluma autorius', 'rotko'),
(2980, 'Saudmuo, sudarytas is tutos, penteles, parako ir kulkos arba sratu', 'sovinys'),
(2981, 'Labiausiai dirvozemyje paplite aliumosilikatai', 'feldspatai'),
(2982, 'Valstybiu saveikos forma, kai atskiros nepriklausomos valstybes steigia bendras institucijas ir organizacijas', 'integracija'),
(2983, 'Sugebantis bendrauti su kitais zmonemis', 'komunikabilus'),
(2984, 'Tvirtas pluostas', 'abaka'),
(2985, 'Mesiniu plonavilniu aviu veisle, isvesta prancuzijoje', 'prekosai'),
(2986, 'Isdidumas, pasiputimas, kitu niekinimas', 'arogancija'),
(2987, 'Elektrines talpos matavimo vienetas si sistemoje', 'faradas'),
(2988, 'Reklaminio banerio efektyvumo rodiklis', 'ctr'),
(2989, 'Palaimos busena budizme', 'nirvana'),
(2990, 'Kompozitorius, pedagogas, operu grazina, radvila perkunas, 4 vienaveiksmiu baletu, 2 simfoniniu poemu, romansu, muzikos spektakliams autorius', 'karnavicius'),
(2991, 'Nekastruotas gyvuliu patinas', 'tekis'),
(2992, 'Kokios salies (vnskilm.) domeno vardas yra .am', 'armenijos'),
(2993, 'Paciento psichikos gydymas arba klaidingu psichologiniu nuostatu koregavimas', 'psichoterapija'),
(2994, 'Dvivaldyste', 'diarchija'),
(2995, 'Lietuviu dailininkas-skulptorius, laisves irknygnesio statulu kauno karo muziejaus sodelyje, reljefo uz tevynenezinomojo kareivio kapo paminkle autorius', 'zikaras'),
(2996, 'Rusu mokslininkas, pirmasis pasaulyje pagrindes reaktyvinio judesio teorija ir nurodes, kaip ja praktiskai panaudoti', 'ciolkovskis'),
(2997, 'Losimas is pinigu is anksto spejant sporto rungtyniu, kovos, lenktyniu baigti', 'totalizatorius'),
(2998, 'Didziausia vokietijos upe', 'reinas'),
(2999, 'Populiariausias kompiuterinis (programinis) mp3 grotuvas', 'winamp'),
(3000, 'Kietas, zerintis mineralas', 'zerutis'),
(3001, 'Kas otelui tapo prazutingu desdemonos neistikimybes irodymu', 'nosine'),
(3002, 'Viduramziu prietaruose: dvasia, gyvenanti ugnyje ir iasmeninanti ugnies stichija', 'salamandra'),
(3003, 'Melionmedzio vaisius', 'papaja'),
(3004, 'Slanga lietuviskai', 'zarna'),
(3005, 'Mokslinis darbas, pateikiamas moklso tarybai moksliniam laipsniui igyti ir viesai ginamas', 'disertacija'),
(3006, 'Vyriausiasis mula (musulmonu dvasininkas)', 'imamas'),
(3007, 'Dekoratyvinis tapybos ir skulpturos motyvas - nuogo berniuko vaizdas', 'putas'),
(3008, 'Cheminis elementas, kurio simbolis sb [numeris 51]', 'stibis'),
(3009, 'Europos sajungos veiksmu programa, skirta jaunimo profesiniam rengimui ir ruosimui savarankiskam gyvenimui bei veiklai [orig.]', 'petra'),
(3010, 'Sasiauris, skiriantis sicilija nuo italijos', 'mesina'),
(3011, 'Vyriskas vardas, moters pasirinktas slapyvardziu', 'pseudoandronimas'),
(3012, 'Idealistineje filosofijoje ir teologijoje - antgamtinis, dvasinis, savaiminis visatos pradmuo', 'absoliutas'),
(3013, 'Religijoje rubas trumpomis placiomis rankovemis', 'dalmatika'),
(3014, 'Isdidus jaunuolis, isimylejes savo atvaizda', 'narcizas'),
(3015, '27-a valstija, prijungta prie jav 03.03.1845 m., sostine talahasis [liet.]', 'florida'),
(3016, 'Nendrinis plaustas, kuriuo thejerdalas perplauke atlanta', 'ra-2'),
(3017, 'Rugsciu pagausejimas kraujyje ir organizmo audiniuose', 'acidoze'),
(3018, 'Eina po galininko', 'inagininkas'),
(3019, 'Kiek valstybiu sudare sovietu sajunga, jos egzistavimo pabaigoje', 'penkiolika'),
(3020, 'Bijantis skiepu druckis [animaciniu filmu motyvais]', 'begemotas'),
(3021, 'Gelio virtimas zoliu ir zolio - geliu', 'tiksotropija'),
(3022, 'Denio komandos virsininkas, atsakingas uz laivo takelazo, rangauto, inkaro, denio irenginiu ir valciu tvarkinguma, uz svara laive', 'bocmanas'),
(3023, 'Rinkos situacija, kai kurio nors gamintojo prekes ar paslaugos vyrauja atitinkamojo rinkoje', 'monopolija'),
(3024, 'Metai, menuo, diena', 'data'),
(3025, 'Prislegtos psichikos busena, kuriai budinga prasta nuotaika, mastymo ir judesiu slopinimas', 'depresija'),
(3026, 'Sesers vyras', 'svainis'),
(3027, 'Telekomunikaciju kompanija, pagaminusi mobiliu telefonu modelius: cmd z7, cmd j70, cmd j7, cmd mz5', 'sony'),
(3028, 'Moteriskos kelnaites su juostele tarp sedmenu', 'tanga'),
(3029, 'Kieta statybine medziaga, randama lietuvos siaures vakaruose', 'dolomitas'),
(3030, 'Keliu doleriu banknotas yra labai retas ir, sakoma, kad nesa laime', 'dvieju'),
(3031, 'Cemento, kalkiu ir vandens misinys tinkavimui', 'skiedinys'),
(3032, 'Rusijos sostine 1712-1918 m.', 'peterburgas'),
(3033, 'Didelis prabangus butas arba viesbucio numeris', 'apartamentas'),
(3034, 'Aruno valinsko zmonos vardas', 'inga'),
(3035, 'Rusijos auksciausiojo diviziono futbolo klubas is ramenskoje', 'saturn'),
(3036, 'Medziagos savybe priesintis elektros srovei', 'varza'),
(3037, 'Musulmonu salyse asmenys, is bokstu kvieciantys melstis', 'muedzinai'),
(3038, 'Kiek pieniniu dantu turi zmogus', '20'),
(3039, 'Zmogus, pasakes fraze tikslas pateisina priemones', 'makiavelis'),
(3040, '8-a pagal dydi lietuvos pelke [vnskilm.]', 'rekyvos'),
(3041, 'Universali gyvu lasteliu reakcija i dirginima', 'jaudinimas'),
(3042, 'Pirmoji heraklio zmona', 'megara'),
(3043, 'Salis, 1962 mpasaulio futbolo cempionato nugaletoja', 'brazilija'),
(3044, 'Kieno sostine yra barselona', 'katalonijos'),
(3045, 'Kaip vadinami grubiai nutasyti akmeniniai blokai', 'rustika'),
(3046, 'Valstybe siaures amerikoje, viena galingiausiu pasaulio valstybiu', 'jav'),
(3047, 'Senoves graikijoje - svetimsalis, neturintis politiniu teisiu', 'metekas'),
(3048, 'Viena is pagrindiniu senkinu filosofiju, visa apimantis gamtos desnis, isreiskiantis materialaus ir dvasinio pasaulio vienybe', 'dao'),
(3049, 'Stambi spora, susiformavusi bacilos gale, panasi i bugno lazdele', 'plektridija'),
(3050, 'Budas cinkui ir svinui is slako gauti', 'fiumingavimas'),
(3051, 'Terapija, kai zmogui duodami vaistai, naikinantys lasteles, tikslas-vezines lasteles', 'chemoterapija'),
(3052, 'Irenginys lietaus vandeniui nuo stogo pasalinti', 'lietvamzdis'),
(3053, 'Monetoje esancio gryno tauriojo metalo svoris', 'kornas'),
(3054, 'Sausumos viesulas, daznai pasitaikantis jav teksaso valstijoje', 'tornado'),
(3055, 'Vienintelis zemynas, susidares zemes pavirsiuje permo periode, mazdaug pries 270 mlnm., kurio didesne dalis buvo pietu pusrutulyje', 'pangeja'),
(3056, 'Xx aanglu rasytoja, viena zymiausiu egzistencializmo krypties atstovu, romanu tinkle, begimas nuo burtininko, nukirsta galva ir ktautore', 'merdok'),
(3057, 'Italu fizikas ir matematikas, atrades barometro veikimo principa', 'toricelis'),
(3058, 'Virsutinis kunigo drabuzis', 'arnatas'),
(3059, 'Pilnavidurio sferoido formos ukas, susidarantis sprogus ii tipo supernovai', 'plerionas'),
(3060, 'Anglu gydytojas, atrades ir ispopuliarines vakcina nuo raupu', 'dzeneris'),
(3061, 'Platus zemes pavirsiaus duburys, susidares del karstiniu procesu', 'polje'),
(3062, 'Geltonos spalvos silkinis audinys', 'cesucia'),
(3063, 'Klausos organo pazeidimas, kuri sukelia staigus atmosferos slegio padidejimas ar sumazejimas', 'barotrauma'),
(3064, 'Bandymas aprasyti praeiti', 'istorija'),
(3065, 'Auksciausias krioklys pasaulyje, esantis venesueloje [979 m aukstis]', 'anchelis'),
(3066, 'Virpejimas, svyravimas, drebejimas', 'vibracija'),
(3067, '10-a pagal dydi lietuvos pelke [vnskilm.]', 'aukstumalos'),
(3068, 'Lkl bloku karalius 2000/2001 msezone', 'chizniakas'),
(3069, 'Naujas zodis naujam gyvenimo reiskiniui arba savokai, paties autoriaus sukurtas zodis', 'neologizmas'),
(3070, 'Dengtos galerijos tipo praejimas (daznai su parduotuvemis, kioskais), jungiantis namus arba gatves', 'pasazas'),
(3071, 'Honduro administracinis vienetas', 'departamentas'),
(3072, 'Purvo vulkanas', 'salza'),
(3073, 'Medziagu pasigaminimo liaukose procesas', 'sekrecija'),
(3074, 'Jura, kurioje sutinkama daugiausia zuvu rusiu', 'japonijos'),
(3075, 'Egles dukra', 'drebule'),
(3076, 'Nedidelio storio biriu uolienu sluoksnis, imirkes gruntinio, lietaus ar sniego tirpsmo vandeniu ir slenkantis slaitu zemyn', 'sliuogas'),
(3077, 'Muzikos instrumentai, kuriu garsa sukelia korpuse vibruojantis oras', 'aerofonai'),
(3078, 'Karpatu maradona', 'hagi'),
(3079, 'Kalnai azijoje: tian ...', 'sanis'),
(3080, 'Zinduoliu pasitenkinimo ir bendravimo veiksmai, kurie reiskiasi vienas kito kailio prieziura', 'grumingas'),
(3081, 'Kuriai nors grupei priklausancio zmogaus veiksmu priderinimas prie tos grupes poziurio, poreikiu, kai jis pats turi kita nuomone', 'konformiskumas'),
(3082, 'Stulbinantis kurinys, priesingas paplitusiems isitikinimams, suplakantis i viena tai, kas akivaizdu su tuo, kas priestarauja sveikam protui', 'paradoksas'),
(3083, 'Botsvanos pagrindinis pinigas', 'pula'),
(3084, 'Tulzies pusles uzdegimas', 'cholecistitas'),
(3085, 'Dramos kuriniu atlikeja', 'artiste'),
(3086, 'Upes buvusios vagos arba jos atsakos ruozas, visiskai arba is dalies atskirtas nuo naujosios vagos', 'senvage'),
(3087, 'Lietuve shaule, 2000 msidnejaus olimpinese zaidynese tapusi olimpine cempione [pavarde]', 'gudzineviciute'),
(3088, 'Ekvadoro pagrindinis pinigas', 'sukre'),
(3089, 'Absoliutines dregmes ir sociuju garu tankio santykis', 'santykine dregme'),
(3090, 'Lankstus kovos budas, kuriame priesininkai ivertinami pagal metimo ir sulaikymo veiksmu atlikima', 'dziudo'),
(3091, 'Dantytas pjovimo irankis', 'pjuklas'),
(3092, 'Prekiu rysulys', 'pakas'),
(3093, 'Prietaisas, skysciu ir kietuju kunu tankiui matuoti', 'areometras'),
(3094, 'Didziausias europos ezeras, neskaitant kaspijos juros', 'ladoga'),
(3095, 'Erkiu sukeliama liga: erkinis ...', 'encefalitas'),
(3096, 'Xx aii puses modernistines dailes kryptismasines gamybos buitiniai daiktai traktuojami kaip menines kurybos objektai', 'popdaile'),
(3097, 'Tam tikras meninio vaizdavimo budas mene ir literaturoje, kai zmogus arba jo gyvenimas piesiamas, tycia perdedant arba sumenkinant, kai tikrove persipina su fantastika', 'groteskas'),
(3098, 'Kaip angliskai vadinasi latviu muzikos grupe prata vetra', 'brainstorm'),
(3099, 'Isskustas ar iskirptas skritulys dvasininku virsugalvyje', 'tonzura'),
(3100, 'Stambiamolekuliniai azoto turintys junginiai, sudaryti is aminorugsciu', 'baltymai'),
(3101, 'Svarbiausia musulmonu sventove, kasmetiniu piligrimu kelioniu tikslas', 'kaaba'),
(3102, 'Kuno padetis, laikysena', 'poza'),
(3103, 'Prekybos laivas', 'pinasa'),
(3104, 'Lietuvos valstieciu feodaline prievole dvarui, atliekama darbo dienomis per darbymeti', 'gvoltas'),
(3105, 'Viduramziu baznycia is septyniu mirtinuju nuodemiu didziausiomis laike goduma ir ..[vnsgal.]', 'gasluma'),
(3106, 'Didziausia skandinavijos kalnu virsukalne', 'galhopigenas'),
(3107, 'Ka lotyniskai reiskia ad notanda', 'reikia pazymeti'),
(3108, 'Kaip kitaip vadinama krikstykla', 'baptisterija'),
(3109, 'Pozeminis vanduo, slugsantis virs pirmo nuo zemes pavirsiaus vandensparinio sluoksnio', 'gruntinis'),
(3110, 'Didziausias pasaulio uostas', 'roterdamas'),
(3111, 'Teksto skyrius', 'grafa'),
(3112, '1998 mpasaulio futbolo cempionate argentinos rinktines puolejas, imuses 4 ivarcius', 'ortega'),
(3113, 'Purus jungiamasis audinys, uzpildantis danties ertme', 'pulpa'),
(3114, 'Skulpturinis plokscias reljefas, kurio plastinis vaizdas iskiles is sienos maziau kaip per puse vaizduojamojo objekto apimties', 'bareljefas'),
(3115, 'Dekoratyvi kabanti vartu, duru, baldu, metalo indu rankena', 'antaba'),
(3116, 'Tikrasis mokslu akademijos narys', 'akademikas'),
(3117, 'Kaip vadinami susivele plaukai, sudarantys sulipusia mase', 'kaltunas'),
(3118, 'Principinis sutikimas pasirasyti suderinta sutarties teksta ir iforminti ja pagal visus tarptautines teises reikalavimus', 'parafavimas'),
(3119, 'Window lietuviskai', 'langas'),
(3120, 'Prietaisas vejo krypciai nustatyti', 'anemoskopas'),
(3121, 'Karalienes bonos vyras', 'zygimantas'),
(3122, 'Miestas prie ignalinos ae', 'visaginas'),
(3123, 'Liga: skausmingos menesines', 'algomenoreja'),
(3124, 'Funkcinio pobudzio balso sutrikimas', 'fonastenija'),
(3125, 'Kiek procentu cukraus turi cukrinis runkelis [apyt.]', '27'),
(3126, 'Ispanu liaudies sokis', 'chota'),
(3127, 'Koks yra apskritimo spindulys, nureztas viduryje futbolo aikstes [', '.'),
(3128, 'Joint picture encoding group', 'jpeg'),
(3129, 'Priemone valgiams virti, valgyti (lekste, puodas ir t.t.)', 'indas'),
(3130, 'Ldk kunigaikstis, kurio valdymo metai yra 1440 - 1492 m.', 'kazimieras'),
(3131, 'Atkaklus stengimasis ka nors gauti', 'pretenzija'),
(3132, 'Kaip vadinamas sutartinis matavimo vienetas, prilygstantis, greiciui, kuriuo objektas juda greiciau uz garsa', 'machas'),
(3133, '2003/2004 metais vykusio europos futbolo cempionato portugalijoje nugaletoja?', 'graikija'),
(3134, 'Koks augalas krikscionybes tradicijoje simbolizuoja dievo ir zmogaus sandora', 'alyvmedis'),
(3135, 'Neringos miesto dalis kursiu mariu krante', 'pervalka'),
(3136, 'Vienos kulturos susiliejimas su kitos tautos kultura, atsirandantis del ilgo tautu bendravimo', 'akulturizacija'),
(3137, 'Jlozoraicio slapyvardis', 'muse'),
(3138, 'Dozuota kietoji vaistu forma', 'tablete'),
(3139, 'Kokia centrines amerikos salis anksciau buvo vadinama britu honduru', 'belizas'),
(3140, 'Senoveje do', 'ut'),
(3141, 'Kinijos stambus piniginis vienetas', 'juanis'),
(3142, 'Plesrus zvirbliniu burio paukstis, kuris turi iproti visu pirmiausia savo laimiki (vabzdi ar net smulku stuburini gyvuna) uzsmeigti ant spyglio, pvz., laukines kriauses, gudobeles ar net spygliuotos vielos', 'medsarke'),
(3143, 'Kokioje salyje gyveno zana dark', 'prancuzijoje'),
(3144, 'Berzo oda', 'tosis'),
(3145, 'Kelintais metais zlugo rytu roma', '476'),
(3146, 'Du sujungti rastai, indijos vandenyno, azijos pakrantes ir okeanijos tautu naudojami zvejybai ir artimam susisiekimui jura', 'katamaranas'),
(3147, 'Wnba komanda is detroito', 'shock'),
(3148, 'Jei meile - chemija, tuomet seksas - ...', 'fizika'),
(3149, 'Tos pacios arba giminingos specialybes laisvuju miesto amatininku susivienijimas viduramziais', 'cechas'),
(3150, 'Didelis (keliu simtu vietu) keleivinis lektuvas', 'aerobusas'),
(3151, 'Greiciausiai plaukiantis paukstis', 'pingvinas'),
(3152, 'Giedojimo budas, kai giedama pakaitomis, tarsi atsiliepiant vienas kitam', 'antifona'),
(3153, 'Britu mokslininkas, 1856misrades pigu plieno gamybos buda, kuris populiarus ir dabar', 'besemeris'),
(3154, 'Sparnuotis, is kurio lape isviliojo suri', 'varna'),
(3155, 'Kambodzos sostine', 'pnompenis'),
(3156, 'Slovenijos piniginis vienetas', 'tolaras'),
(3157, 'Chemine angliarugstes formule', 'co2'),
(3158, 'Prancuzu rasytojas, trys muskietininkai autorius', 'diuma'),
(3159, 'Kurybos (dazniausiai dailininko, kino aktoriaus) chronologine apzvalga', 'retrospektyva'),
(3160, 'Bankuchenas lietuviskai', 'sakotis'),
(3161, '43-a valstija, prijungta prie jav 03.07 1890 m., sostine boisas [liet.]', 'aidahas'),
(3162, 'Gentis, apiplesusi roma ir sunaikinusi daugybe jos istoriniu paminklu', 'vandalai'),
(3163, 'Kas parase veikala zemaiciu vyskupyste', 'valancius'),
(3164, 'Neorganinis pigmentas - dirbtine ochra', 'marsas'),
(3165, 'Zodzio, zodziu junginio ar sakinio vartosenos aplinka, is kurios galima nustatyti tikslia siu kalbu vienetu reiksme', 'kontekstas'),
(3166, 'Bejegyste - viso organizmo arba kurio nors organo nusilpimas', 'adinamija'),
(3167, 'Nedideles teritorijos pazemio klimatas', 'mikroklimatas'),
(3168, 'Bleka lietuviskai', 'skarda'),
(3169, 'Kelintais metais kaune isteigtas botanikos muziejus', '1923'),
(3170, 'Palaiku iskasimas pakartotinei ekspertizei', 'ekshumacija'),
(3171, 'Viduramziu komedijos tipas, satyrinio arba juokiamojo turinio nedideles apimties drama ar vaidinimas, pagristas anekdotiska situacija', 'farsas'),
(3172, 'Europos, azijos ir amerikos miskuose paplite mazi medzio zieves spalvos pauksciai, kurie visa diena lipineja medziais; is cia kiles ir ju pavadinimas', 'lipuciai'),
(3173, 'Ilgiausia pasaulyje dviveze elektrifikuota gelezinkelio linija: ..magistrale', 'transsibiro'),
(3174, 'Laivo, sunkvezimio, prekinio vagono sonas', 'bortas'),
(3175, 'Svarbus senoves spartos valstybes pareigunai [dgs.]', 'eforai'),
(3176, 'Surenkamosios medines lubos su kesonais', 'artesonadas'),
(3177, 'Kokioje salyje 2004 metais ivyks olimpines vasaros zaidynes', 'graikijoje'),
(3178, 'Laivo savybe islaikyti pusiausvyra vandenyje', 'stovumas'),
(3179, 'Reprezentacinis baltarusijos futbolo klubas', 'dinamo'),
(3180, 'Kokia artimuju rytu tauta isrado siuolaikinius pinigus', 'lydai'),
(3181, 'Si sitemos jegos vienetas', 'niutonas'),
(3182, 'Valstybe, kurios 3% yra europoje, o likusioji - azijoje', 'turkija'),
(3183, 'Futbolininkas, daugiausiai kartu atstovaves vokietijos rinktinei [origin.]', 'mattheus'),
(3184, 'Ploksciadugnis kinu burlaivis', 'dronkas'),
(3185, 'Tarptautine veziu serganciu vaiku diena', 'vasario 15'),
(3186, 'Aukstu senoves romos valdininku garbes sargybinis', 'liktorius'),
(3187, 'Igimtas galvos smegenu didziuju pusrutuliu zieves vingiu nebuvimas', 'agirija'),
(3188, 'Zaidimas, kurio tikslas yra pralisti po kuo zemiau nuleista kartele', 'limbo'),
(3189, 'Recepcijos rusis - elektros sroves ir elektrinio lauko pokyciu energijos priemimas, pavertimas nerviniu impulsu ir jutimas', 'elektrorecepcija'),
(3190, 'Senoves graiku vandens stichijos dievas', 'okeanas'),
(3191, 'Papildomas pranesimas prie kito asmens pranesimo tuo paciu klausimu', 'koreferatas [22:3'),
(3192, 'Zymi jav aktore, atlikusi vaidmenis istviko raganos, istekejusi uz mobo, batmanas sugrizta [orig.]', 'pfeiffer'),
(3193, 'Svetimos valstybes teritorijos prisijungimas prie savosios', 'aneksija'),
(3194, 'Kiek pagrindiniu instituciju yra es', '5'),
(3195, 'Salis, garsejanti fiordais, kalnais', 'norvegija'),
(3196, 'Patiekalas is mesos gabaliuku, troskintiu su riebalais, svogunais ir paprika', 'guliasas'),
(3197, 'Bahamu salu sostine', 'nasau'),
(3198, 'Dirvine garstycia, kryzmaziedziu seimos vienmete piktzole, placiai paplitusi lietuvoje', 'garstukas'),
(3199, 'Tarptautine teorines ir taikomosios chemijos sajunga', 'iupac'),
(3200, 'Berasciui ir ..nepades', 'akiniai'),
(3201, 'Trakijos dainius placiai garbinamas senoves graikijoje', 'orfejas'),
(3202, 'Mokslo ar jo srities teiginiu sistema', 'teorija'),
(3203, 'Liga kurios simptomai tokie: zaizdos burnos gleivineje, kliba dantys, trapus kaulai', 'skorbutas'),
(3204, 'Uolienu porose, plysiuose, ertmese gamtinemis salygomis esantis vandens kiekis', 'dregnis'),
(3205, 'Pirmas zmogus kures pasakecias kurias skaitome iki siol', 'ezopas'),
(3206, 'Kokios lasteles pavyzdys yra bakterija', 'prokariotines'),
(3207, 'Mokslo ziniu apie afrikos tautas, ju kalbas, literatura, mena visuma', 'afrikanistika'),
(3208, 'Izymiausias sporto istorijoje ilguju nuotoliu begikas, 9 kartus olimpinis cempionas, 3 kartus olimpinio sidabro laimetojas, 22 kartus pasaulio rekordininkas [liet.]', 'nurmis'),
(3209, 'Xx apirmos puses italu skulptorius, sukures duru reljefa mirties vartai svpetro katedrai romoje', 'mancu'),
(3210, 'Apgaulingas sportininko judesys', 'fintas'),
(3211, 'Kas atrado marso palydovus 1877 metais', 'holas'),
(3212, 'Lietuviu poete, eilerasciu rinkiniu anksti ryta, pedos smely, per luztanti leda, diemedziu zydesiu, prie didelio kelio, poemos egle zalciu karaliene, eiliuotos pasakos naslait', 'neris'),
(3213, 'Valstybe, kurioje gyveno storiausias vyras medicinos istorijoje (sveres  635 kg)', 'jav'),
(3214, 'Asmuo, istatymo numatyta tvarka sulaikytas, itarus, kad jis padare nusikaltima', 'itariamasis'),
(3215, 'Garso rasmuo', 'raide'),
(3216, 'Valymo imone', 'valykla'),
(3217, 'Zemes geolistorijos kainozojaus eros ii periodas, prasidejes po paleogeno, pasibaiges pries kvartera', 'neogenas'),
(3218, 'Portas, atas ir', 'aramis'),
(3219, '11-oji graikiskos abeceles raide', 'lambda'),
(3220, 'Labai judrus vaikas', 'nenuorama'),
(3221, 'Parase romana askanijas', 'diuma'),
(3222, 'Akvakultura, pletojama druskingame juros vandenyje', 'marikultura'),
(3223, 'Artimiausias saturno palydovas, pavadintas pagal senoves graiku piemenu dievo, kuris vaizduojamas pusiau zmogumi, pusiau oziu, varda', 'panas'),
(3224, 'Skraidanti transporto priemone', 'lektuvas'),
(3225, 'Kaip vadinosi pirmasis nematomas (radarams) bombonesis', 'lockheed'),
(3226, 'Sovietiniu skulpturu parkas', 'grutas'),
(3227, 'Muzikinis zanras; zaismingos, grakscios formos, dainingos melodikos kurinys', 'rondo'),
(3228, 'Senoves graiku rojus', 'eliziejus'),
(3229, 'Maziausia tanki turinti saules sistemos planeta', 'saturnas'),
(3230, 'Tarptautine studentu diena (data)', 'lapkricio 17'),
(3231, 'Pasaulin? maisto diena', 'kovo 16'),
(3232, 'Maisto doze dedama i burna', 'kasnis'),
(3233, 'Lietuviu dievas, siejamas su mirusiais (galbut net pats mirusysis)', 'eziagulis'),
(3234, 'Kuriais metais buvo uzpatentuotas beskeveldris stiklas', '1905'),
(3235, 'Cheminis elementas, kurio simbolis sm [numeris 62]', 'samaris'),
(3236, 'Kelintais metais pradejo veikti pirmasis ignalinos atomines elektrines blokas', '1983'),
(3237, 'Plastmase atspari aukstai temperaturai, naudojama keptuviu ir puodu gamyboje', 'teflonas'),
(3238, 'Tersimas kitaip', 'tarsa'),
(3239, 'Vienarusiu daiktu rinkinys', 'kolekcija'),
(3240, 'Xix apab- xx aprarcihtekturos ir dailes stilius, modernas', 'secesija'),
(3241, 'Prisingu interesu, paziuru susidurimas, gincas; ginkluotas susidurimas', 'konfliktas'),
(3242, 'Valstybe, kurioje vyksta paskutinis formules 1 grand prix etapas', 'japonija'),
(3243, 'G&amp;g sindikato 2002 malbumas - betono ...', 'sakmes'),
(3244, 'Ilgiausia latvijos upe', 'dauguva'),
(3245, 'Visuomenes atmatos', 'padugnes'),
(3246, 'Asmuo, pasiulantis sudaryti sandori', 'oferentas'),
(3247, 'Asmens dokumentas, nurodantis kam po mirties turi tekti jo turtas', 'testamentas'),
(3248, 'Kortu destymas', 'pasjansas'),
(3249, 'Nekaitoma kalbos dalis, kuri eina su linksniu ir parodo linksniuojamojo zodzio rysi su kitais zodziais', 'prielinksnis'),
(3250, 'Kariniu bandymu ir pratybu vietove', 'poligonas'),
(3251, 'Italijos miestas, kuriame buvo israstas pistoletas', 'pistola'),
(3252, 'Klasikinis sportines gimnastikos prietaisas - apvali plienine kartis, tvirtinama horizontaliai ant dvieju stovu', 'skersinis'),
(3253, 'Individo tapimas visuomeniniu zmogumi, asmenybe', 'socializacija'),
(3254, 'Anglijos revoliucijos veikejas, independentu idealogas, o.kromvelio bendrazygis [liet.]', 'henris'),
(3255, 'Judejimas, kurio metu kuno greitis nekinta', 'tolyginis'),
(3256, 'Mokslas, tiriantis nuosediniu uolienu sudeti, struktura, kilme ir pasiskirstyma zemes pavirsiuje', 'litologija'),
(3257, 'Korteles kurios buvo skirtos programuoti pirmosios elektroninems skaiciavimo masinoms', 'perfokortos'),
(3258, 'Trilype arka: triju arku, paremtu kolonomis ar stulpais, anga, langas arba nisa', 'trifora'),
(3259, 'Baltijos juros uostas, pagrindinis rusijos kaliningrado srities miestas bei srities sostine', 'kaliningradas'),
(3260, 'Prekiu eksportas kainomis, zemesnemis uz vidaus rinkos', 'dempingas'),
(3261, 'Lietuvos ministras pirmininkas (1996 11 - 1999 05)', 'vagnorius'),
(3262, 'Mokslas apie ligu pozymius, simptomatologija', 'semiotika'),
(3263, 'Septintasis jav prezidentas', 'dzeksonas'),
(3264, 'Tapytojas, nutapes zymiu xiv alietuvos kulturos ir visuomenes veikeju portretus', 'rustemas'),
(3265, 'Kurinys, kuriame autorius pasakoja praeities ivykius, kuriu dalyviu ar stebetoju yra buves; atsiminimai', 'memuarai'),
(3266, 'Daugelio saliu pagrindinis istatymas', 'konstitucija'),
(3267, 'Sujudimas del ivykio', 'bumas'),
(3268, 'Viena isorines planetos konfiguraciju, kai is zemes matomu planetos ir saules ekliptiniu ilgumu skirtumas lygus 90', 'kvadratura'),
(3269, 'Kelintais metais albertas einsteinas suformulavo specialiaja reliatyvumo teorija', '1905'),
(3270, 'Aukstas vaikiskas (seniau - tik berniuku) balsas', 'diskantas'),
(3271, 'Vienintele europos sostine, kuria dalija siena [kaip buvo su berlynu]', 'nikosija'),
(3272, 'Lytinio potraukio nebuvimas', 'alibidemija'),
(3273, 'Styginis instrumentas 6 stygomis', 'gitara'),
(3274, 'Gandras aukstaitiskai', 'busilas'),
(3275, 'Pradine ir placiausia storosios zarnos dalis', 'akloji zarna'),
(3276, 'Kiek zaideju zaidzia vienoje australiskojo futbolo komandoje', '18'),
(3277, 'Neispazistantis oficialios religijos', 'disidentas'),
(3278, 'Mokslas apie gyvu organizmu chemija', 'biochemija'),
(3279, 'Zodzio, pasakymo, teksto israiskingumas: emocingumas, vaizdingumas, intensyvumas', 'ekspresyvumas'),
(3280, 'Viena is vaizduojamojo meno rusiu', 'grafika'),
(3281, 'Cheminis elementas, pavadintas vokietijos garbei', 'germanis'),
(3282, 'Feodaliniu laiku dokumentas, saugantis jo turetoja nuo dokumenta davusios valstybes pareigunu persekiojimo', 'saugrastis'),
(3283, 'Kunigo drabuzis', 'sutana'),
(3284, 'Zodiako zenklas einantis po mergeles', 'svarstykles'),
(3285, 'Specialistas pranesimams siuntineti ir priimineti per radija', 'radistas'),
(3286, 'Siauras akmeninis arba betoninis kelkrastis, aveda', 'bordiuras'),
(3287, 'Medziagos turio arba mases didejimas jai sugeriant skyscius ar garus', 'brinkimas'),
(3288, 'Nba komanda is sietlo', 'supersonics'),
(3289, 'Grupe asmenu, kuriuos vienija bendri interesai', 'kompanija'),
(3290, 'Vidurinio medpersonalo darbuotoja, teikianti pagalba nescioms moterims ir gimdyvems', 'akusere'),
(3291, 'Organines putojancios glikozidines medziagos', 'saponinai'),
(3292, 'Populiariausia pavarde jav', 'smith'),
(3293, 'Laiko tarpas apimantis 20 penkmeciu', 'simtmetis'),
(3294, 'Sengraiku gandu deive', 'osa'),
(3295, 'Kaip xix abuvo pavadinta priemone glaustai isdestyti matematiniu sistemu informacija, lygiai taip pat xx abuvo pavadintas kultinis filmas', 'matrica'),
(3296, 'Architekturos arba taikomosios dailes ornamentas is susipynusiu stilizuotu augalu lapu, stiebeliu, ziedu, tolygiai dengiantis dekoruojama pavirsiu', 'maureska'),
(3297, 'Auksciausia rusijos virsukalne', 'elbrusas'),
(3298, 'Apatinis litosferos sluoksnis', 'bazaltas'),
(3299, 'Skaulptorius, dovydo su galijoto galva autorius', 'donatelas'),
(3300, 'Jugoslavijos valstybine kalba', 'serbu'),
(3301, 'Eina per vandeni arba ...', 'brenda'),
(3302, 'Saugus kelias laivams tarp seklumu ir kitokiu kliuciu, pazymetas pludurais, gairemis, bakenais', 'farvateris'),
(3303, 'Milziniskas liepsnojancio vandenilio kamuolys, kuris energijos gauna is jo gelmese vykstanciu branduoliniu reakciju', 'zvaigzde'),
(3304, 'Kelintais metais lietuvoje panaikinta baudziava', '1861'),
(3305, 'Sesiakampio kampu suma', '720'),
(3306, 'Vienas garsiausiu lietuviu kalbininku', 'jablonskis'),
(3307, 'Auksciausias zoledis gyvunas', 'zirafa'),
(3308, 'Komandyrius lietuviskai', 'vadas'),
(3309, 'Viriono apvalkalo subvienetas', 'kapsomeras'),
(3310, 'Kas yra italijos ekonomikos sirdis: siaure ar pietus', 'siaure'),
(3311, 'Buvusi bendra cekijos ir slovakijos valstybe', 'cekoslovakija'),
(3312, 'Medzio nuopjova malkoms kapoti', 'trinka'),
(3313, 'Dailetyros metodas, kuriuo remiantis tyrinejamos dailes kuriniu personazu bei siuzetu vaizdavimo taisykles', 'ikonografija'),
(3314, 'Kiek minuciu trunka vienas zoles riedulio kelinys', '35'),
(3315, 'Priedas ar padazas prie mesos ir zuvu patiekalu', 'garnyras'),
(3316, 'Svorio vienetas, lygus 365g.', 'svaras'),
(3317, 'Skandinavu mitine bjaurios isvaizdos butybe', 'trolis'),
(3318, 'Istatymu, vyriausybes arba jos igaliotos institucijos teises aktu nustatyta tvarka pripazinta ir tam tikra profesine veikla vykdyti igalinanti kompetenciju visuma', 'kvalifikacija'),
(3319, 'Kaip vadinama grupe, i kuria ieina cheminiai elementai - siera, selenas ir teluras', 'chalkogenai'),
(3320, 'Staciatikiu dievo paveikslas', 'ikona'),
(3321, 'Kas sukonstravo pirmaji keturrati automobili', 'daimleris'),
(3322, 'Maisto kosele, skrandzio virskinimo produktas', 'chimusas'),
(3323, 'Italu kompozitorius, 26 operu (tarp ju nabuko, rigoleto, otelo, don karlo) autorius', 'verdis'),
(3324, 'Moters krutine', 'biustas'),
(3325, 'Antikvarinis 2,70m ilgio motociklas, kuris buvo skirtas vaziuoti 3 zmonems (orig.)', 'bohmerland'),
(3326, 'Seiseliu sostine', 'viktorija'),
(3327, 'Mokslas, tiriantis dumblius', 'algologija'),
(3328, 'Valdovo sauklys skelbiantis karaliaus ar kunigaikscio istatymus', 'heroldas'),
(3329, 'Lietuviu poetas, eilerasciu rinkiniu intymios giesmes, imago mortis, uzgese chimeros akys, katarsis, publicistikos rinkinio milfordo gatves elegijos autorius', 'aistis'),
(3330, 'Irankis ir alkoholinis kokteilis tuo paciu pavadinimu', 'atsuktuvas'),
(3331, 'Viszalis augalas', 'egle'),
(3332, 'Pateike pirmuju svariu irodymu, kad visata pleciasi1924 atrado galaktikas uz pauksciu tako ribu', 'hablis'),
(3333, 'Didziausias lietuvos dienrastis', 'lietuvos rytas'),
(3334, 'Senoves lietuviu dievas; zveju garbintas sudvasintas juros vejas', 'bangputis'),
(3335, 'Dekoratyvinis angos, nisos, antkapio arba kitos plokstes krastu aptaisymas', 'apvadas'),
(3336, 'Seniausias pasaulio miestas', 'jerichonas'),
(3337, 'Stovas ant kurio tapytojas stato tapoma paveiksla', 'molbertas'),
(3338, 'Paukstis, kuriam gegutes dazniausiai primeta savo kiausinius', 'kiele'),
(3339, 'Meno taisykliu sistema, salygojanti kurinio kompozicija, kolorita, vaizduojamojo objekto proporcijos visuma', 'kanonas'),
(3340, 'Vaisiaus atejimas i si pasaul', 'gimimas'),
(3341, 'Karalyste, kurioje lankesi pasaku heroje alisa', 'veidrodziu'),
(3342, 'Kanalo irenginys su keiciamu vandens lygiu laivams plukdyti is vieno vandens telkinio i gretima', 'sliuzas'),
(3343, 'Legendinis karaliaus arturo kardas', 'ekskaliburas'),
(3344, 'Mitiniai dvyniai, dzeuso ir antiopes sunus: amfionas ir ...', 'zetas'),
(3345, 'Daiktavardziai turi linksniuotes, o veiksmazodziai - ...', 'asmenuotes'),
(3346, 'Ant keliu salu pastatytas venecijos miestas', '108'),
(3347, 'Kiek apytiksliai procentu deguonies yra ore, kuriame mes kvepuojam', '20'),
(3348, 'Salis, kurioje buvo pirmakart pradeti naudoti popieriniai pinigai', 'kinija'),
(3349, 'Hamleto motina', 'gertruda'),
(3350, 'Keturnytis, sesianytis, astuonnytis naminis pusvilnonis audinys, kurio metmenys medvilniniai arba lininiai, o ataudai - storesni vilnoniai siulai', 'cerkasas'),
(3351, 'Egzistavusi valstybe korejos pusiasalyje', 'sila'),
(3352, 'Mineralas, gelezies karbonatas, gelezies ruda', 'sideritas'),
(3353, 'Akiu uzdangalai', 'vokai'),
(3354, 'Lietuviu nakties dievas, gamtos vaisintojas ir laiko tvarkytojas, jaunikaitis sidabriniais rubais', 'menulis'),
(3355, 'Studentu svente: matematiku ir informatiku dienos', 'midi'),
(3356, 'Veikiantis ugnikalnis ekvadoro siaureje, anduose, i pietrycius nuo kito, kurio aukstis 5704 metrai', 'antisanos'),
(3357, '31-a valstija, prijungta prie jav 09.09.1830 m., sostine sakramentas [liet.]', 'kalifornija');
INSERT INTO `vikte_klsm` (`id`, `klsm`, `ats`) VALUES
(3358, 'Mokslas, tiriantis istorijos mokslo raida', 'istoriografija'),
(3359, 'Rusiskas dzipas', 'niva'),
(3360, 'Veneros pavirsiaus darinys su labai deformuotu pavirsiumi', 'tesera'),
(3361, 'Taikomosios dekoratyvines dailes dirbiniu puosybos technika - vienos medziagos iterpimas i kitos medziagos pavirsiu', 'inkrustacija'),
(3362, 'Veido apdangalas', 'kauke'),
(3363, 'Didelis fizinis ar psichinis issekimas', 'marazmas'),
(3364, 'Pradinis zodiako zenklas', 'avinas'),
(3365, 'Sauso oro metas', 'sausra'),
(3366, 'Jgaarder romanas apie filosofijos istorija - sofijos ...', 'pasaulis'),
(3367, 'Vejo arba vandens bangu ir sroviu sustatytos bangeles, kaubureliai smelio pavirsiuje', 'ruzgos'),
(3368, 'Patenkintas savimi, smulkmeniskas, be aukstesniu idealu zmogus', 'filisteris'),
(3369, 'Dvaro darbininkas', 'kumetis'),
(3370, 'Kada kuveitas tapo arabu lygos nariu', '1961'),
(3371, 'Zarna zemaitiskai', 'grobas'),
(3372, 'Kokia f-1 komanda naudoja bmw variklius', 'williams'),
(3373, 'Vieno tikejimo dievu visuma', 'panteonas'),
(3374, 'Senoves ar viduramziu rankrastis ar rankrastine knyga', 'manuskriptas'),
(3375, 'Lenta kam nors deti', 'lentyna'),
(3376, 'Su kaulu suauges plonas jungiamojo audinio sluoksnis', 'antkaulis'),
(3377, 'Civilizacijos zlugimo ir zmonijos pabaigos nuojautu israiska, subrandinta pasauliu karu ir masiniu zudyniu', 'katastrofizmas'),
(3378, 'Pavaros elementas, perduodantis sukamaji judesi tarp dvieju ar daugiau skriemuliu', 'dirzas'),
(3379, 'Lesos, privaloma tvarka sumokamos ar isskaitomos nedarbingiems seimos nariams islaikyti', 'alimentai'),
(3380, 'Triju matmenu dydis', 'turis'),
(3381, 'Rozines spalvos pigmentas, susidedantis is alavo ir chromo oksidu', 'pinkas'),
(3382, 'Lengviausias is visu termoplastiku', 'polistirolas'),
(3383, 'Namo akys', 'langai'),
(3384, 'Koks zmogus yra vaizduojamas ant 500 danijos kronu banknoto', 'boras'),
(3385, 'Integravimui atvirkscias veiksmas', 'diferenciavimas'),
(3386, 'Jei zvaigzde nutolusi nuo musu per sviesmeti, tai mes ja matome tokia kokia ji buvo pries ...', 'metus'),
(3387, 'Renkamas respublikines valdymo formos valstybes vadovas', 'prezidentas'),
(3388, 'Areaktyvumas arba nepakankamas sugebejimas adekvaciai atsakyti, reaguoti i aplinkos dirgiklius', 'stuporas'),
(3389, 'Afrikos lape', 'fenekas'),
(3390, 'Smulkus europos sajungos pinigas, simtoji euro dalis', 'centas'),
(3391, 'Cekijos disidentu grupe, pradejusi veikti 1977 m.; reikalavusi, kad valdzia laikytusi helsinkio susitarimu ir jto isipareigojimu', 'chartija 77'),
(3392, 'Garsiausias xx apradzios magas', 'hudinis'),
(3393, 'Birmieciu liaudies zaidimas: 5-6 zaidejai, sustoje ratu, stengiasi kuo ilgiau ore islaikyti nendrini kamuoli, nenumesdami jo ant zemes', 'cinlonas'),
(3394, 'Lietuviu dievas, teikiantis gerybes ir jas dalinantis, siejamas su prusu turto dievu pilnyciu dar kitaip vadinamas duotoju', 'davejas'),
(3395, 'Salis, kurios olimpine krepsinio rinktine yra iskovojusi daugiausia aukso medaliu', 'jav'),
(3396, 'Xix ajav rasytoja, romano mazosios moterys autore [orig.]', 'alcott'),
(3397, 'Tarptautines kompleksines sporto varzybos, vykstancios kas keturi metai', 'olimpiada'),
(3398, 'Senoves graiku mitologijoje - kretos valdovo minojo ir pasifajes dukra, padejusi tesejui iseiti is labirinto', 'ariadne'),
(3399, 'Zemes plutos ir mantijos masiu pusiausvyros busena', 'izostazija'),
(3400, 'Beteisis zmogus, esantis visiskoje savo seimininko nuosavybeje', 'vergas'),
(3401, 'Panasus i zioga vabzdys', 'skerys'),
(3402, 'Klaipedos universitetas', 'ku'),
(3403, 'Vieta karo vadu triumfinems eitynems, varzyboms, vaidinimams senoves romoje', 'cirkas'),
(3404, 'Nuolaida nuo prekiu kainos, jeigu uz jas mokama is karto, jeigu jos blogesnes kokybes arba jei ju maziau negu numatyta sutartyje', 'dekortas'),
(3405, 'Tukstantoji gramo dalis', 'miligramas'),
(3406, 'Kataliku kunigo liturginis drabuzis, perjuostas balta virvute (cinguliu)', 'alba'),
(3407, 'Ideologine-religine doktrina, kurios pagrindas - laukimas dievybes isikisimo i istorija per kokia nors tauta, asmeni arba stebejimas akivaizdziu tokio dievybes isiterpimo zenklu', 'mesianizmas'),
(3408, 'Imone, kurioje pienas apdorojamas ir perdirbamas', 'pienine'),
(3409, 'Pauksciai, kuriuos centrines afrikos gentys laiko svaros ir seimynines istikimybes simboliu [dgs.]', 'ragasnapiai'),
(3410, 'Kokia firma pirmoji pradejo pardavineti sausa sultini kubeliais', 'maggi'),
(3411, 'Pirmas lietuviu literaturos almanachas', 'gabija'),
(3412, 'Dezute pudrai', 'pudrine'),
(3413, 'Didziausia sala zemeje', 'grenlandija'),
(3414, 'Kanalizacijos itaisas vandeniui nuo grindu suteketi', 'trapas'),
(3415, 'Kiek isradimu taedisonas uzpatentavo jungtinese amerikos valstijose', '1098'),
(3416, 'Isorinis plauko sluoksnis', 'kutikula'),
(3417, 'Visuomenes ekonominiu santykiu atspindys, ju socialiniu principu pagrindimo t-ja, skleidziama ivairiomis visuomenes samones formomis', 'ideologija'),
(3418, 'Metaline, kauline arba medine plokstele buku galu', 'mentele'),
(3419, 'Religiniu apeigu vietos irenginys - pakyla aukojimui, aukuras', 'altorius'),
(3420, 'Ispanu dainininke (sopranas), viena zymiausiu italu belkanto primadonu: montserat ????.[liet.]', 'kabalje'),
(3421, 'Istorine prusu zeme priegliaus intako alnos desiniajame krante', 'barta'),
(3422, 'Smulkaus arba vidutinio zemes ukio savininkas', 'fermeris'),
(3423, 'Medine arba metaline svirtis sunkumams pakelti ir kilnoti i kitas vietas laive', 'handspugas'),
(3424, '7-as pagal dydi ezeras pasaulyje [vard.]', 'tanganjika'),
(3425, 'Kubos diktatorius', 'kastro'),
(3426, 'Saudymo anga senoviniu laivu bortuose', 'ambrazura'),
(3427, 'Baltarusijos administracinis vienetas', 'sritis'),
(3428, 'Laikotarpis, per kuri suyra puse radioaktyvios medziagos atomu, skylant ju branduoliams', 'pusamzis'),
(3429, 'Vyrvardas, kiles is lotkalbos, reiskia svelnus, malonus', 'klemensas'),
(3430, 'Uzdusimas, ivykstantis sutrikus isoriniam kvepavimui', 'asfiksija'),
(3431, 'Mokslas, tirantis kietojo zemes pavirsiaus formas, ju kilme ir raida', 'geomorfologija'),
(3432, 'Taisiklingos formos dirbtine atvira vaga vandeniui be slegio teketi', 'kanalas'),
(3433, 'Salis ar asmuo, pasirasantis tarptautine sutarti ar ypatingos svarbos akta', 'signataras'),
(3434, 'Nepaprasti, ypac kurybiniai sugebejimai', 'talentas'),
(3435, 'Viduramziu ispanijos aukstieji dvasininkai ir dvarininkai [dgs.]', 'grandai'),
(3436, 'Kokia valstybe turi seniausia parlamenta europoje', 'islandija'),
(3437, 'Bet koks nubreztas bruksnys', 'linija'),
(3438, 'Vienintele upe, 2 kartus kertanti pusiauja', 'kongas'),
(3439, 'Judamu objektu filmavimas ir rodymas', 'kinas'),
(3440, 'Kiek procentu zemes vandens istekliu sudaro gelas vanduo zodis', 'tris'),
(3441, 'Romaniniu ir gotikiniu pastatu vidaus erdves strukturine dalis, dengta vienu skliautu', 'traveja'),
(3442, 'Pati sviesiausia planeta matoma is zemes', 'venera'),
(3443, 'Metalu ir lydiniu savybe sudaryti stiprius neisardomus sujungimus', 'suvirinamumas'),
(3444, 'Singapuro piniginis vienetas', 'doleris'),
(3445, 'Apastalas, kurio atributai yra kriaukle ir kalavijas: ..vyresnysis', 'jokubas'),
(3446, 'Staciatikiu vienuolynas', 'naura'),
(3447, 'Cheminis elementas, kurio pavadinimas kilo is lotynisko zodzio, reiskiancio rusija', 'rutenis'),
(3448, 'Pirmasis zydu karalius', 'saulius'),
(3449, 'Tikslingas zmogaus ugdymas, jo rengimas visuomenes gyvenimui', 'auklejimas'),
(3450, 'Posakis: jei veja - bek, jei musa - ...', 'rek'),
(3451, 'Daugiausiai ziurovu talpinantis pasaulio stadionas', 'marakana'),
(3452, 'Keltu mitologijoje arkliu deive', 'epona'),
(3453, 'Gyvybes nutraukimas moters gimdoje', 'abortas'),
(3454, 'Dievu vaizdavimas gyvunu pavidalu', 'zoomorfizmas'),
(3455, 'Maziausias pasaulyje zinduolis (suncus etruscus), sveriantis maziau nei 3g.', 'kirstukas'),
(3456, 'Saturno palydovas, pavadintas vieno is senoves graiku titanu, gejos ir urano sunaus, dievu helijo, selenes ir ejos tevo, vardu', 'hiperionas'),
(3457, 'Salis, kurioje atsirado sporto saka ledo ritulys', 'kanada'),
(3458, 'Chemijos technologijos saka, tirianti drusku gavimo ir perdirbimo budus', 'halurgija'),
(3459, 'Koks gyvunas senoves graikijoje buvo aukojamas deivei hekatei', 'suo'),
(3460, 'Inzineriniu statiniu, itaisu, masinu ir irenginiu kompleksas keleiviams ir kroviniams vezti begiais', 'gelezinkelis'),
(3461, 'Lietuviu rasytoja, satyru ir humoresku rinkinio ne is pirmo zvilgsnio, apsakymu vaikams mike milzinas, gaidzio kalnas, pasaku robotas ir peteliske, kelione i tandadrika autore', 'zilinskaite'),
(3462, 'Netobulas, nesudetingas, grubiai padarytas, lekstas, negilus', 'primityvus'),
(3463, 'Kokiame mieste yra svpauliaus katedra', 'londone'),
(3464, 'Grieztu doroviniu normu salininkas', 'puritonas'),
(3465, 'Turintis isimtiniu teisiu, lengvatu bei privilegiju luomas viduramziu europoje', 'bajorija'),
(3466, 'Trumpiausias atstumas nuo tasko iki tieses', 'statmuo'),
(3467, 'Patalpa po namu', 'rusys'),
(3468, 'Ilgas sedimas baldas', 'suolas'),
(3469, 'Pirmoji moteris, 1867mapgynusi medicinos daktaro disertacija', 'suslova'),
(3470, 'Jav valstija, kurios veliavoje pavaizduota meska', 'kalifornija'),
(3471, 'Cigonu meiles sokis', 'gitana'),
(3472, 'Naturalus zemes palydovas', 'menulis'),
(3473, 'Vidaus erdve; jos vaizdavimas tapyboje', 'interjeras'),
(3474, 'Elektromagnetiniu spinduliu elektrinio ar magnetinio lauko svyravimu skaicius per sekunde', 'daznis'),
(3475, 'Zmogus, mokantis daug kalbu', 'poliglotas'),
(3476, 'Kas zodziais valstybe - tai as isreiske poziuri i valstybe', 'liudvikas xiv'),
(3477, 'Kaip vadinama gama, sudaryta is pustoniu', 'chromatine'),
(3478, 'Japonu imtynes', 'sumo'),
(3479, 'Kelintais metais zigmundas froidas isleido reiksmingiausia savo veikala sapnu aiskinimas', '1900'),
(3480, 'Vengru tapytojas, vega, zett-rg autorius', 'vazarelis'),
(3481, 'Sis fantastinis gyvunas krikscionybes ikonografijoje yra godumo ir gobsumo isikunijimas', 'harpija'),
(3482, 'Architekturos ar dailes kurinio puosybiniu elementu visuma', 'dekoras'),
(3483, 'Salis, kurios domeno vardas yra .kh', 'kambodza'),
(3484, '1970-80 dbritanijoje kilusios jaunimo subkulturos atstovai, keistuoliska, sokiruojancia apranga, sukuosenomis, agresyviu nuotaiku roko muzika', 'pankai'),
(3485, 'Kaip vadinasi klausimas, kuris nereikalauja atsakymo', 'retorinis'),
(3486, 'Didziausias dienrastis lietuvoje', 'lietuvos rytas'),
(3487, 'Rusiu tautiniu drabuziu dalis - berankovis drabuzis, vilkimas ant palaidines', 'sarafanas'),
(3488, 'Lygtis, pagal kuria ivertinamas gyvenamu planetu skaicius galaktikoje [apytiksliai nuo 25 mlniki 0.25 mlrdtokiu planetu]', 'dreiko'),
(3489, 'Kiek vidutiniskai procentu azoto yra sausoje augalineje medziagoje [x,x]', '1,5'),
(3490, 'Lietuviu poetas, eilerasciu rinkinio kukucio balades autorius', 'martinaitis'),
(3491, 'Sala kurioje kalejo grafas montekristas [vard.]', 'ifas'),
(3492, 'Vedizme ir brahmanizme - maldos magine formule', 'mantra'),
(3493, 'Laivo krovinys pusiausvyrai palaikyti', 'balastas'),
(3494, 'Kas yra laikomas archeologijos ir meno istorijos pradininku [liet.]', 'vinkelmanas'),
(3495, 'Dovanos, atveztos is kitos salies, sveciu ar pasilinksminimu', 'lauktuves'),
(3496, 'Stiprusis gerimas, gaminamas is rektifikuoto kvieciu, javu, bulviu, melasos ar runkeliu spirito ir vandens', 'degtine'),
(3497, 'Religineje mitologijoje - ypatingi angelai, gerosios dvasios', 'cherubinai'),
(3498, 'Puosnus kryzius is tauriojo metalo, kuri pakabinta ant krutines nesioja aukstieji kataliku dvasininkai - kardinolai, vyskupai, abatai', 'pektoralas'),
(3499, 'Graiku mitu herojes, pievu ir kalnu nimfos [dgs.]', 'oreades'),
(3500, 'Valstybinis dailes ir kulturos muziejus sankt peterburge', 'ermitazas'),
(3501, 'Telekomunikaciju kompanija, pagaminusi mobiliu telefonu modelius: q300, a800, a500, t100', 'samsung'),
(3502, 'Itaisas, reguliuojantis slegi', 'barostatas'),
(3503, 'Atsiskyrelis, religiniais motyvais marinantis savo kuna zmogus', 'asketas'),
(3504, 'Kokia sventykla aplanke napoleono bonaparto ekspedicija', 'karnako'),
(3505, 'Kokia komanda formuleje 1 remia shell degalai', 'ferrari'),
(3506, 'Paskutinysis civilizacijos raidos etapas, jos irimas', 'dezintegracija'),
(3507, 'Pasakojamosios tautosakos zanras, kuriam priklauso kuriniai, aiskinantys pasaulio ar atskiru jo objektu ir ypatybiu kilme, vaizduojantys zmogaus santykius su mitinio pasaulio butybemis', 'sakme'),
(3508, 'Irasas kino filmo kadre', 'titras'),
(3509, 'Laikotarpis, trukes nuo 10^-4 s iki 10 s po didziojo sprogimo', 'leptonu era'),
(3510, 'Pozemine galerija kabeliams, vamzdziams tiesti', 'kolektorius'),
(3511, 'Netobulos eksperimento metodikos sukeltas efektas', 'artefaktas'),
(3512, 'Amerikos lietuvis, pradejes filmuoti pirmasias kronikines juostas lietuvoje', 'raciunas'),
(3513, 'Irasas herbe', 'devizas'),
(3514, 'Miesto dalis, skirta tam tikrai rasinei, tautinei arba religinei grupei prievarta apgyvendinti', 'getas'),
(3515, 'Mongolijos didziausias administracinis teritorinis vienetas', 'aimakas'),
(3516, 'Didziausia saules sistemos planeta, penkta pagal nuotoli nuo saules', 'jupiteris'),
(3517, 'Salis, is kurios kilo sporto saka baidariu lenktynes', 'svedija'),
(3518, 'Irenginys, keiciantis kintamosios elektros sroves grandines itampa', 'transformatorius'),
(3519, 'Kestucio zmona, vytauto motina', 'birute'),
(3520, 'Apie 60 dienu mesinis visciukas', 'broileris'),
(3521, 'Skaicius, zymintis kiekio nebuvima', 'nulis'),
(3522, 'Mitines ogigijos salos nimfa, septynerius metus laikiusi pas save odiseja', 'kalipse'),
(3523, 'Kas laikomas antroposofijos pradininku', 'steineris'),
(3524, 'Metalas, is kurio liejamos kulkos', 'svinas'),
(3525, 'Sudetingos konstrukcijos paciuzos su keturiais plastikiniais arba guminiais ratukais (vietoje pavazu)', 'rieduciai'),
(3526, 'Tekstiles zaliava', 'pluostas'),
(3527, 'Telktinis darbas', 'talka'),
(3528, 'Lietuvos respublikos zemes ukio ministerijos leidziamas oficialus informacinis leidinys', 'agro rinka'),
(3529, 'Zveju diena', 'lapkricio 23'),
(3530, 'Antonimas zodziui universalizmas', 'partikuliarizmas'),
(3531, 'Australijos ir gretimu salu strutis, ant galvos turintis ragini salma', 'kazuaras'),
(3532, 'Kas atlieka kurini nothing else matters', 'metallica'),
(3533, 'Astronominis ilgio vienetas', 'sviesmetis'),
(3534, 'Kryptingas elektros kruviu judejimas', 'elektros srove'),
(3535, 'Mokslas apie sunis', 'kinologija'),
(3536, 'Krikscioniskajame mene teisingumo, tvarkos, kartu ir pusiausvyros bei paskutinio teismo simbolis, iasmeninto teisingumo atributas', 'svarstykles'),
(3537, 'Povandenine uola', 'rifas'),
(3538, 'Placiai paplitusi piktzole, is dirvos imanti ypac daug azoto', 'balanda'),
(3539, 'Apolono orakulo, buvusio delfuose, pranase', 'pitija'),
(3540, 'Kiek vidutiniskai dienu trunka kates nestumas', '61'),
(3541, 'Arkliui sienas, masinai - ...', 'benzinas'),
(3542, 'Geografine zona, kuri siekia svedija ir suomija mazdaug 60 laipsniu siaures platumos ir rusijos lygumoje mazdaug 56 - 57 siaures platumos', 'taiga'),
(3543, 'Kiek lietuviu kalboje yra kalbos daliu', '11'),
(3544, 'Maziausia nepriklausoma pasaulio valstybe', 'vatikanas'),
(3545, 'Medziaga erkems naikinti', 'akaricidas'),
(3546, 'Ilgio matavimo vienetas, lygus 183 metrams', 'kabeltovas'),
(3547, 'Antra pagal nuodinguma gyvate pasaulyje', 'kobra'),
(3548, 'Kokia sala okupavo kinu nacionalistai', 'taivanio'),
(3549, 'Supresuoti vaistu milteliai', 'tablete'),
(3550, 'Sinagogos irenginys, kuriame saugoma tora', 'aronkodesas'),
(3551, 'Xx a3 desimtmecio avangardistinio sajudzio lietuvos rasytoju grupuote', 'keturvejininkai'),
(3552, 'Trumpiausias garsines kalbos vienetas, susidedantis is vieno arba keliu garsu', 'skiemuo'),
(3553, 'Kietas, tamprus, stiprus ginklu plienas, pagamintas ypatingu budu', 'bulatas'),
(3554, 'Miestas, 1998 mziemos olimpiniu zaidyniu sostine', 'naganas'),
(3555, 'Fechtavime - pakartotinis kirtis', 'repriza'),
(3556, 'Senoves graiku keraminis, marmurinis arba metalinis indas', 'krateris'),
(3557, 'Ilga zarnyno parazitine kirmele', 'kaspinuotis'),
(3558, 'Tikroji rasytojo petro cvirkos pavarde', 'cvirka'),
(3559, 'Labai artimas, sutampantis savo dvasia artimas savo galvosena, talentu', 'kongenialus'),
(3560, 'Seniausias tvenkinys lietuvoje patvenktas 1580m[vardininkas]', 'sirvena'),
(3561, 'Fundamentaliosios medziagos daleles, neturincios elektros kruvio ir turincios sukini, lygu 1/2, priklausancios leptonu grupei', 'neutrinai'),
(3562, 'Kas parase vytauto seimyna', 'jonynas'),
(3563, 'Xx apradzios anglu rasytojas, romanu geltonasis kroumas, kontrapunktas, saunus naujas pasaulis autorius', 'hakslis'),
(3564, 'Cheminis elementas, kurio simbolis pa [numeris 91]', 'protaktinis'),
(3565, 'Garsus xvii aantros puses vokieciu filosofas, matematikas ir visuomenes veikejas; parase veikalus: monadologija, nauji zmogaus proto tyrimai, teodiceja ir kt.', 'leibnicas'),
(3566, 'Kataliku svente eucharistijos garbei, prasidedanti devintaja savaite po velyku ketvirtadieni ir svenciama astuonias dienas', 'devintines'),
(3567, 'Anglu istorikas, kuris civiliazaciju atsiradima aiskino issukio-atsako desniu [liet.]', 'toinbis'),
(3568, 'Slapyvardis, sudarytas ir kito vardo ir (ar) pavardes', 'alonimas'),
(3569, 'Sautuvo uokso dalis soviniams sudeti', 'detuve'),
(3570, 'Seklys, akristi romanu personazas', 'puaro'),
(3571, 'Objektu atvaizdu perdavimas per atstuma', 'televizija'),
(3572, 'Duriantis, astrus', 'dygus'),
(3573, 'Autoklavinis betonas, kurio pagrindine risamoji medziaga yra kalkes', 'silikatbetonis'),
(3574, 'Specialus skystis, pilamas i automobilio ausinimo sistema', 'antifrizas'),
(3575, 'Etiopijos sostine', 'adis abeba'),
(3576, 'Senovinis ispanu kilmes sokis', 'cakona'),
(3577, 'Gerumas kitaip', 'geris'),
(3578, 'Turtingo asmens meiluze', 'kurtizane'),
(3579, 'Mauglio drauges panteros vardas', 'bagira'),
(3580, 'Tekstiles dirbinio gamyba: ataudu siulu perverimas per statmena metmenu pluosta', 'audimas'),
(3581, 'Skliautine saramine konstrukcija', 'arka'),
(3582, 'Netiketas patikrinimas', 'reidas'),
(3583, 'Kurios planetos skersmuo yra artimiausias zemes skersmeniui', 'veneros'),
(3584, 'Virsutiniu kvepavimo taku apsauginis motorinis refleksas', 'ciaudulys'),
(3585, 'Asmuo, savo parasu patvirtines koki nors svarbu dokumenta, deklaracija (pvz., nepriklausomybes akta)', 'signataras'),
(3586, 'Vertybiniu popieriu leidejas', 'emitentas'),
(3587, 'Faraonas, apie 3200 mprkrsuvienijes aukstutini ir zemutini egipta', 'menas'),
(3588, 'Geologijoje - zemes plotas, kuriame yra kokios nors naudingos iskasenos telkiniu', 'baseinas'),
(3589, 'Spaudos, kino filmu, radijos ir televizijos laidu ir kitu viesu renginiu turinio kontrole, kad nebutu platinamos tam tikros zinios ir teorijos', 'cenzura'),
(3590, 'Didelis vokalinis-instrumentinis kurinys chorui, orkestrui, solistams, skaitovams, parasytas draminiu siuzetu ir skirtas koncertiniam atlikimui', 'oratorija'),
(3591, 'Turistu megstama sala neapolio ilankoje (italija), kurios pavadinimas, isvertus is lotynu kalbos, reiskia ozku sala', 'kapris'),
(3592, 'Operacija, per kuria priekineje trachejos sieneleje padaroma anga', 'tracheostomija'),
(3593, 'Kaip dar vadinami indoeuropieciai', 'arijai'),
(3594, 'Archaizmo vartojimas kalboje, siekiant sudaryti istorinio laikotarpio ispudi, kalbejimas pakiliu stiliumi', 'archaizacija'),
(3595, 'Europos saliu, daugiausia prancuzijos, olandijos, anglijos piratas ir kontrabandininkas', 'flibustjeras'),
(3596, 'Romenu ribu ir jas zyminciu zenklu dievas', 'terminas'),
(3597, 'Tas, kuris ka nors isteigia', 'steigejas'),
(3598, 'Labiausiai reklamuojama preke xxa.', 'coca-cola'),
(3599, 'Tarptautine raudonojo kryziaus diena', 'apicijus'),
(3600, 'Nekaitoma kalbos dalis, reiskianti ivairius garsus (gamtos, reiskiniu, gyvunu)', 'istiktukas'),
(3601, 'Neisigaliojusio teismo sprendimo apskundimas aukstesniajai instancijai', 'apeliacija'),
(3602, 'Vienas is zymiausiu knygnesiu', 'bielinis'),
(3603, 'Telekomunikaciju kompanija, pagaminusi mobiliu telefonu modelius: m50, s45i, sx45, sl45i', 'siemens'),
(3604, 'Rusijos standartu sitema', 'gost'),
(3605, 'Biblijos personazas, vienintelis doras sodomos miesto gyventojas', 'lotas'),
(3606, 'Sportinis sokis, kiles is kubieciu tautinio sokio; jav ir europoje paplito xx a6-ojo desimtmecio viduryje', 'mambo'),
(3607, 'Mediniu dirbiniu dekoratyvine inkrustacija kitos spalvos medzio ar kitos medziagos intarpais', 'intarsija'),
(3608, 'Kuriais metais japonijoje prasidejo naros era', '710'),
(3609, 'Ploksciojo kampo bematis vienetas, lygus kampui tarp dvieju apskritimo spinduliu, kai lanko tarp ju galu ilgis lygus apskritimo spinduliui', 'radianas'),
(3610, 'Valstybe tarp peru ir kolumbijos', 'ekvadoras'),
(3611, 'Vietnamo dalis, kuri buvo prancuzijos protektoratas', 'anamas'),
(3612, 'Prietaisas, kurio pagalba yra reguliuojamas (tikrinamas) keliu policijos naudojamas greicio matuoklis', 'kamertonas'),
(3613, 'Nuo 6x6 iki 10x10 m dydzio dziudo imtyniu kilimas', 'tatamis'),
(3614, 'Kuri planeta psichologineje astrologijoje simbolizuoja agresija', 'marsas'),
(3615, 'Pagrindinis kalbos vienetas', 'zodis'),
(3616, 'Linksma, zaisminga, lengva komedija', 'vodevilis'),
(3617, 'Degtine is ryziu', 'sake'),
(3618, 'Organizmo veiklos sutrikimas', 'liga'),
(3619, 'Zodis, kiles is senoves graiku kalbos zodzio, reiskiancio nedaloma medziagos dalele', 'atomas'),
(3620, 'Brutualus holivudo filmu herojus, kuri suvaidino sstalone', 'dailide'),
(3621, 'Daiktines aplinkos projektavimas', 'dizainas'),
(3622, 'Juodi kortu zenklai su ieties antgalio vaizdu', 'pikai'),
(3623, 'Senoves graiku mitu vaizdinys - bedugne', 'tartaras'),
(3624, 'Kokio rasytojo tikroji pavarde orginalo kalba kramer', 'remarko'),
(3625, 'Zymus rusu politikas su dideliu plemu ant plikes', 'gorbaciovas'),
(3626, 'Aktore pelniusi oskara kaip geriausia metu aktore uz vaidmeni filme \"avineliu tylejimas\": jodi ..[orig.]', 'foster'),
(3627, 'Jegos ar smurto vartojimas neteisetais ar grasinimo tikslais pries asmenis ar nuosavybe', 'terorizmas'),
(3628, 'Kaip vadinamas virsutinis zmogaus odos sluoksnis', 'epidermis'),
(3629, 'Kokiame mieste ivyko pirmosios vasaros olimpines zaidynes 1896 metais', 'atenuose'),
(3630, 'Giliausia arkties vandenyno vieta (~5.1km): ..baseinas', 'eurazijos'),
(3631, 'Kaip dar vadinamas 1919 mmaskvoje ikurtas komunistu internacionalas', 'kominternas'),
(3632, 'Laikotarpis, per kuri pjaunami rugiai', 'rugiapjute'),
(3633, 'Zemas moteru ar vaiku balsas', 'altas'),
(3634, 'Kas parase \"helenizmo istorija\"', 'droizenas'),
(3635, 'Strutis, gyvenantis australijos ir ngvinejos dykumose ir stepese', 'emu'),
(3636, 'Tam tikros teritorijos, rinkimines apygardos rinkeju igaliojimas asmeniui, laimejusiam rinkimus, atstovauti jiems kokiame nors vyriausybes organe', 'mandatas'),
(3637, 'Reljefo forma, paaukstejimas', 'plynaukste'),
(3638, 'Prancuzu tapytojas, \"buduaras\", \"raudonas kambarys\", \"dirbtuve\", \"sokis\" autorius', 'matisas'),
(3639, 'V asaunus riteris, istikimas karaliui arba damai', 'paladinas'),
(3640, 'Del pripratimo susilpnejusios arba isnykusios reakcijos atgaivinimas', 'dishabituacija'),
(3641, 'Negalintis nevogti zmogus, sergantis vagysciu manija', 'kleptomanas'),
(3642, 'Koki skaiciu atitinka romeniskasis \"c\"', '100'),
(3643, 'Porinis zmogaus salinimo organas', 'inkstas'),
(3644, 'Amerikieciu biologas, atrades oralines kontraceptines tabletes', 'pinkas'),
(3645, 'Lietuvos pievu ir pelkiu paukstis, kuris saukia \"gyvi gyvi\"', 'pempe'),
(3646, 'Kurioje lietuvos pajurio gyvenvieteje yra oro uostas', 'palangoje'),
(3647, 'Auksciausias krioklys', 'anchelis'),
(3648, 'Babilino karalius, 587 m.prkrsugrioves jeruzale', 'teroras'),
(3649, 'Nedidele sofa, skirta poilsiui pusiaugulomis dienos metu', 'kusete'),
(3650, 'Patalpos sienu apdailos elementas - medzio, akmens ar ktmedziagos plokste', 'panelis'),
(3651, 'Mokslas apie rinkos mechanizma ir konkurencines jegas', 'mikroekonomika'),
(3652, 'Tapytojas, \"goraciju priesaika\", \"marato mirtis\" autorius', 'davidas'),
(3653, 'Atsitiktiniai improvizaciniai piesiniai rankrasciu arba knygu parastese', 'grifonazas'),
(3654, 'Gydytojas, atrades nuskausminima chirurgijoje', 'mortonas'),
(3655, 'Bibline juru pabaisa, milziniskas juru zaltys, zuvis', 'leviatanas'),
(3656, 'Laikotarpis, kada pagal metereologines salygas galima laivyba', 'navigacija'),
(3657, 'Jav amerikietiskojo futbolo lygos (nfl) 2002 mcempionai', 'patriots'),
(3658, 'Vokietijos kariuomenes (nuo 1925 mreichsvero, nuo 1935 mvermachto) vadovybei pavaldi zvalgybos ir kontrazvalgybos institucija', 'abveras'),
(3659, 'Kiek zodziu galima parasyti vienu piestuku', '50000'),
(3660, 'Pries 65 mln metu ismire skraidantieji ropliai', 'pterozaurai'),
(3661, 'Kokiu vyrisku slapyvardziu pasirasinejo xix aanglu rasytoja merian evans (mary ann evans)', 'eliotas'),
(3662, 'Baltarusijos prezidentas', 'lukasenka'),
(3663, 'Parase \"nusikaltimas ir bausme\"', 'dostojevskis'),
(3664, 'Didziausia sala europoje', 'didzioji britanija'),
(3665, 'Anga, per kuria i aki patenka sviesa', 'vyzdys'),
(3666, 'Viduramziu komedijos tipas, satyrinio arba juokiamojo turinio nedideles apimties drama ar vaidinimas, pagristas anekdotiska situacija', 'sostas'),
(3667, 'Kelintais metais pirmasis lietuvos statutas paskelbtas galiojanciu kodeksu', '1529'),
(3668, 'Kokio tipo yra peties sanarys', 'rutulinis'),
(3669, 'Prancuzu kompozitorius, daugiau kaip 40 operu, romantiniu baletu \"zizel\", \"korsaras\" autorius', 'adanas'),
(3670, 'Pagal kataliku liturgini kalendoriu - keturios paskutines savaites pries kaledas', 'adventas'),
(3671, 'Dezute, deklas, makstis arba antvalktis kokiam nors daiktui laikyti arba pasaugoti', 'futliaras'),
(3672, 'Don kichoto ginklanesys', 'sancas pansa'),
(3673, 'Harema priziurintis kastratas', 'eunuchas'),
(3674, 'Gambijos pagrindinis pinigas', 'dalasis'),
(3675, 'Senoves graiku vandens nimfos', 'najades'),
(3676, 'Labai mazos apimties kurinys, kuriame svarbus ispudis, isgyvenimas', 'impresija'),
(3677, 'Kai mieste nemiega niekas atkeliauja dede ...', 'miegas'),
(3678, 'Spalvotosios litografijos technika', 'chromolitografija'),
(3679, 'Per jonines \"zydintis\" augalas', 'papartis'),
(3680, 'Nesmailus, atsipes', 'bukas'),
(3681, 'Buves ministras pirmininkas, veliau \"achemos\" vadovas', 'lubys'),
(3682, 'Azerbaidzano smulkus pinigas', 'gepikas'),
(3683, 'Kas parase romana \"tustybes muge\"', 'tekerejus'),
(3684, 'Lakunas, pirmasis pasaulyje atlikes aukstojo pilotazo figura \"mirties kilpa\"', 'nesterovas'),
(3685, 'Prancuzu kompozitorius, oratorijos \"zana dark ant lauzo \", operu ir simfoniju kurejas', 'honegeris'),
(3686, 'Kiek mlnlasteliu sudaro 1 kvadratini cmzmogaus odos', '10'),
(3687, 'Kokia saules sistemos planeta turi daugiausia palydovu (23)', 'saturnas'),
(3688, 'Indu stiliaus lietuviu daininke', 'sati'),
(3689, 'Tamsioji paros dalis', 'naktis'),
(3690, 'Europos kino meno premija - statulele, kasmet nuo 1988 miteikiama berlyne', 'feliksas'),
(3691, 'Norvegu degaliniu tinklas lietuvoje', 'statoil'),
(3692, 'Sventasis, gyvenes xvii a., krikscioniu filosofas, cholastas ir teologas', 'bonaventuras'),
(3693, 'Skausma slopinantis vaistas', 'analgetikas'),
(3694, 'Jezaus motinos marijos, dazniausiai su kudikiu, atvaizdas', 'madona'),
(3695, 'Vyras, lytiskai santykiaujantis su vaikais', 'pedofilas'),
(3696, 'Savo noru tarnaujantis karys', 'savanoris'),
(3697, 'Koks jav prezidentas 1932 mpaskelbe \"naujaji kursa\", kuris padejo jav iveikti didziaja ekonomine krize', 'ruzveltas'),
(3698, 'Portugalu jurininkas, keliautojas, juru kelio i indija atradejas', 'vasko da gama'),
(3699, 'Stiliaus figura; zodzio ar frazes kartojimas gretimu sakiniu, pastraipu, eiluciu ar posmu pradzioje', 'anafora'),
(3700, 'Puosnus liturginis kataliku diakono drabuzis', 'dalmatika'),
(3701, 'Svogunine kambarine gele', 'amarilis'),
(3702, 'Garsus rusu komikas', 'raikinas'),
(3703, 'Galvos ar nugaros smegenu dangalu uzdegimas', 'meningitas'),
(3704, 'Krikscionybeje pagrindines dorybes yra: tvirtumas, teisingumas, susivaldymas ir ...', 'ismintingumas'),
(3705, 'Kalno virsune', 'ketera'),
(3706, 'Pasauleziura kuri vertina zmogu ir jo darbus', 'humanizmas'),
(3707, 'Tukstantis milijardu', 'trilijonas'),
(3708, 'Suristas augalu glebelis', 'pedas'),
(3709, 'Su kokia rugstimi siejamas vitaminas b5', 'pantoteno'),
(3710, 'Organizmo tyrimas ultragarsu, echoskopija arba ...', 'sonoskopija'),
(3711, 'Cheminis elementas, itakojantis medziagu apykaita, virskinima, imunine sistema', 'deguonis'),
(3712, 'Dailes kurinys, vaizduojantis dievo motina marija (dazniausiai su kudikiu ant ranku)', 'madona'),
(3713, 'Italu kompozitorius, \"sevilijos kirpejo\" autorius', 'rosinis'),
(3714, 'Sventasis rastas, judeju ir krikscioniu religines dogmatikos ir pamaldu pagrindas', 'biblija'),
(3715, 'Tamsiai auksines spalvos likerinis vynuogiu vynas', 'malaga'),
(3716, 'Vidurine zemes rutulio sfera, supanti zemes branduoli', 'mantija'),
(3717, 'Miestas, 1984molimpiniu zaidyniu sostine', 'sarajevas'),
(3718, 'Krikscionybes tradicija sia spalva sieja su setonu, nuodeme, mirtimi ir netikejimu, bet kartu ji reiskia ir nuolankuma, nusizeminima ir saves issizadejima', 'juoda'),
(3719, 'Lietuviu rasytojas, istorinio romano \"algimantas\" autorius', 'pietaris'),
(3720, 'Viena, kuri nors zemes ukio kultura, skiriama daugiausia eksportui', 'monokultura'),
(3721, 'Senromoje - gladiatoriu mokyklos virsininkas ir mokytojas', 'lanista'),
(3722, 'Svininis aparatas sieros rugsciai gaminti', 'kamera'),
(3723, 'Tarptautine rastingumo diena', 'rugsejo 8'),
(3724, 'Kokiu skaitikliu yra matuojamas medziagos radioaktyvumas', 'geigerio'),
(3725, 'Kelintais metais buvo sugalvotas komiksu ir filmu personazas supermenas', '1937'),
(3726, 'Ar ispanijoje koridos metu bulius yra nuduriamas', 'taip'),
(3727, 'Perlojos ir aplinkiniu kaimu savivaldi bendruomene, gyvavusi 1918 - 1923 m(su pertraukomis)', 'perlojos respublika'),
(3728, 'Vienos kuno puses raumenu paralyzius', 'hemiplegija'),
(3729, 'Kas atrado babilona ir jo sienas', 'koldvejus'),
(3730, 'Mineralu klase, kurios kiekvienas mineralas susideda is vieno elemento arba jo izomorfinio misinio [dgs.]', 'grynuoliai'),
(3731, 'Auksta standi gofruota apykakle', 'freza'),
(3732, 'Lietuviu svente su kaukemis', 'uzgavenes'),
(3733, 'Upe, pagal kurios pavadinima pavadintas cheminis elementas renis', 'reinas'),
(3734, '6-as didziausias lietuvos ezeras [vard.]', 'sartai'),
(3735, 'Babilonieciu audros dievas', 'adadas'),
(3736, 'Kada padalinta karolio diziojo imperija', '843'),
(3737, 'Stacionariose laboratorijose naudojamu prietaisu ir irengimu suderinimas su etalonais ir standartais pries pradedant tyrimo darbus', 'kalibracija'),
(3738, 'Sunu patele', 'kale'),
(3739, 'Del saves', 'sau'),
(3740, 'Kas ii pasauliniame kare buvo vadinama u-laivais?', 'povandeniniai laivai'),
(3741, 'Europos bendrijos programa, skirta didinti augima ir uzimtuma bei stiprinti verslo konkurencinguma', 'adapt'),
(3742, 'Apeigos piktosioms dvasioms isvaryti', 'egzorcizmas'),
(3743, 'Pedagogu irasai, gadinantys estetini pazymiu knygeles vaizda', 'pastabos'),
(3744, 'Istriza laivo bure, isskleista virs gafelio', 'topselis'),
(3745, 'Garsusis radijo stoties m-1 automobilis - studija ant ratu [origin.]', 'skybox'),
(3746, 'Jutimo organas burnoje', 'liezuvis'),
(3747, 'Lietuviu meiles deive', 'milda'),
(3748, 'Kataliku ir staciatikiu vyskupu kepure, devima per liturgines apeigas', 'mitra'),
(3749, 'Sportinis zaidimas su rakete ir kamuoliuku su plunksnu ar plastiko vainiku', 'badmintonas'),
(3750, 'Didziosios britanijos sostine?', 'londonas'),
(3751, 'Kas isrado moteriskas pedkelnes', 'grantas'),
(3752, 'Spaudinio apipavidalinimas tipografinemis priemonemis - meniskai isdestant rinkta teksta, parenkant srifta, popieriu, spaudos technika, teksto tonini intensyvuma, jo daliu proporcijas ir pan.', 'tipografika'),
(3753, 'Cheminis elementas, kuris seniau buvo vadinamas pagal rusu fiziko gfliorovo pavarde', 'nobelis'),
(3754, 'Nuobauda uz nusizengima tiesioginiu dvikovu, sportiniu zaidimu taisyklems', 'bauda'),
(3755, 'Zvaigzde, ketvirta pagal nuotoli nuo zemes [kilm.]', 'barnardo'),
(3756, 'Stalo irankis, turintis kelis astrius dantis', 'sakute'),
(3757, 'Nobelio fizikos premijos laureatas 1907m., apdovanotas uz tiksliu optiniu prietaisu sukurima ir jais atliktus spektroskopinius bei metrologinius tyrimus', 'aviza'),
(3758, 'Turkmenu ristinis kilimas', 'afganas'),
(3759, 'Daugelio saliu ginkluotoju pajegu jaunesniuju karininku auksciausiasis karinis laipsnis', 'hipostomas'),
(3760, 'Prasymas pakartoti', 'bis'),
(3761, 'Mazi evoliuciniai pakitimai, kurie padeda prisitaikyti prie tam tikru gyvenamosios aplinkos salygu', 'balata'),
(3762, 'Elnias, paplites indijoje', 'aksis'),
(3763, 'Leidinys su dailes kuriniu reprodukcijomis ar architekturos paminklu fotonuotraukomis', 'albumas'),
(3764, 'Irano pranasas, zoroastrizmo ikurejas', 'zaratustra'),
(3765, 'Tradiciniame budizme (teravadoje, hinajanoje)- ismincius, pasiekes nusvitima ir priartejes prie nirvanos', 'arhatas'),
(3766, 'Rinkiniai, kuriuose buvo surinktos ir isspausdintos visos lietuvos konstitucijos', 'volumina legum'),
(3767, 'Rasysena', 'braizas'),
(3768, 'Kinder siurprizo isradejas [liet.]', 'rotas'),
(3769, 'Jav valstija, 7-a pagal uzimama teritorija [liet.]', 'nevada'),
(3770, 'Gvatemalos administracinis vienetas', 'departamentas'),
(3771, 'Ispanu ir kubieciu liaudies sokis, tango prototipas', 'habanera'),
(3772, 'Italu kompozitorius, smuikininkas, daugiau kaip 40 operu, oratoriju, 465 instrumentiniu koncertu (tarp ju ciklo \"metu laikai\") autorius', 'vivaldis'),
(3773, 'Lietliaudposakis: kaip ..., taip ir vaziuoja', 'tepa'),
(3774, 'Romos karvedziu ar valstybes veikeju titulas iki gajaus julijaus cezario laiku turejes tik simboline reiksme', 'imperatorius'),
(3775, 'Laivo, lektuvo, erdvelaivio sandarus langas', 'iliuminatorius'),
(3776, 'Salis, kurioje atsirado sporto saka laisvosios imtynes', 'anglija'),
(3777, 'Aparatas gyvunams dirbtinai pereti', 'inkubatorius'),
(3778, 'Zuvusios biomases ir jos irimo bei remineralizacijos produktu misinys dirvozemyje', 'humusas'),
(3779, 'Zmogus atsidaves savo tautai, tevynei', 'patriotas'),
(3780, 'Nebuvimas apribojimu', 'laisve'),
(3781, 'Laikinojo vilniaus lietuviu komiteto pirmininkas', 'birziska'),
(3782, 'Stemples uzdegimas', 'ezofagitas'),
(3783, 'Cheminis elementas, kurio simbolis \"y\" [numeris 39]', 'itris'),
(3784, 'Zvaigzdes arba kito sviesulio stebejimo vietoje, pvz., zemeje, sukeliamas apsviestumas spinduliams statmenoje plokstumoje', 'spindesys'),
(3785, 'Stiprus tamsus kartoko skonio alus', 'porteris'),
(3786, 'Saunamojo ginklo smogiamojo mechanizmo dalis, tiesiogiai arba per dauzikli iziebianti sovini', 'gaidukas'),
(3787, 'Mineralas, melyna arba zydra, skaidri korundo atmaina', 'safyras'),
(3788, 'Galimybe kitaip', 'sansas'),
(3789, 'Zuvu ir pauksciu spermos paprastasis baltymas', 'protaminas'),
(3790, 'Tam tikru budu isaugintas vazoninis nykstukinis medelis', 'bonsas'),
(3791, 'Populiariausi \"elizabeth arden\" kvepalai (orig.)', '5th avenue'),
(3792, 'Kokia aktore isgarsino msterelio filmas \"gesta berlingas\"', 'garbo'),
(3793, 'Nenormalus potraukis liesti priesingos lyties asmens kuno dalis ir asmenis simbolizuojancius daiktus', 'fetisizmas'),
(3794, 'Trikampio kampu suma', '180'),
(3795, '\"bajeris\" lietuviskai', 'pokstas'),
(3796, 'Nuo kliuties atsispindejes garsas', 'aidas'),
(3797, 'Skruzdes valgantis gyvunas', 'skruzdeda'),
(3798, 'Kaip vadinami islamo teologai', 'ulemai'),
(3799, 'Prietaisas, kuriuo galima matyti akies dugna; vaizdas matomas padidintas ir apverstas', 'oftalmoskopas'),
(3800, 'Mokslas, nagrinejantis vyro organizmo fiziologija ir patologija', 'andrologija'),
(3801, 'Lietuviu kalbininkas, \"dabartines lietuviu kalbos zodyno\" paskutiniu leidimu vyrredaktorius stasys ...', 'keinys'),
(3802, 'Suartas laukas', 'arimas'),
(3803, 'Lietuviu poetas, eilerasciu rinkiniu \"veja vetra debesi\", \"sauleti lietus\", \"auga medziai\", \"vandens zenklai\", \"pedsakai\", \"rytas vakaras\", \"artejimas\", \"baltasis skersgatvis\" autorius', 'maldonis'),
(3804, '\"saules\" vonia', 'soliariumas'),
(3805, 'Rugseji gimusiuju akmuo', 'safyras'),
(3806, 'Kas pirmasis isrado pneumatines padangas [liet.]', 'tompsonas'),
(3807, 'Sachmatu partijos vidurys', 'mitelspilis'),
(3808, 'Demele ant indes kaktos', 'tilaka'),
(3809, 'Kuriais metais lietuvoje buvo atidaryta pirmoji oro susisiekimo linija kaunas-palanga', '1938'),
(3810, 'Kokios salies aparatas pirmasis sekmingai nusileido menulyje', 'tsrs'),
(3811, '4-as didziausias lietuvos ezeras [vard.]', 'vistytis'),
(3812, 'Tamsiausia rase', 'negroidai'),
(3813, 'Apgaudinejimas melagingais pazadais, faktu iskraipymas siekiant asmenines naudos', 'demagogija'),
(3814, 'Vyrvardas, kiles is lotkalbos, reiskia \"svelnus, malonus\"', 'klemensas'),
(3815, 'Kiek procentu zemes pavirsiaus sudaro sausuma', '29'),
(3816, 'Gimnazijos, kurioje buvo priimta pirmoji lietuvos konstitucija, pavadinimas', 'maironio'),
(3817, 'Cukrinis (jame 70-80% cukraus) konditerijos gaminys', 'karamele'),
(3818, 'Filmas, uz kuri julia roberts gavo rekordini 20 mlndoleriu honorara: erin ..[orig.]', 'brockovich'),
(3819, 'Graiku mitologijoje - pozemio karalystes dievas', 'hadas'),
(3820, 'Periodinis leidinys, kuris reiskia vyriausybes poziuri, bet nera jos oficialus organas', 'oficiozas'),
(3821, 'Dekoratyvine tapyba vienos spalvos tonais, daznai imituojanti reljefa', 'grizaile'),
(3822, 'Reiskinys, apibudinantis masiska masinu dauzyma anglijoje pramones perversmo metu', 'ludizmas'),
(3823, 'Kokio nors isiminto reiskinio, isgyvenimo sukeltas pedsakas (pakitimas) smegenyse', 'engrama'),
(3824, 'Graiku mitologijoje - ugnies ir kalvystes dievas', 'hefaistas'),
(3825, 'Mediciniskai uosles nebuvimas', 'anosmija'),
(3826, 'Kas parase veikala \"naujausiu proistoriniu tyrynejimu duomenys\"', 'puzinas'),
(3827, 'Ldk ir lenkijos taikos sutartis su kryziuociu ordinu', 'melno taika'),
(3828, 'Misle: jei atsistotu - dangu paremtu, jei prakalbetu - daug pasakytu', 'kelias'),
(3829, 'Ka reiskia trumpinys \"es\"', 'europos sajunga'),
(3830, 'Kaip buvo vadinamas nenugalimasis ispanijos laivynas', 'nenugalimoji armada'),
(3831, 'Kas nudazo skruostus raudonai', 'geda'),
(3832, 'Kaip vadinama srove, kurios stiprumas ir kryptis periodiskai kinta', 'kintamaja'),
(3833, 'Vaiku pramogu centras akropolyje', 'euroopa'),
(3834, 'Cheminis elementas, kurio simbolis \"u\" [numeris 92]', 'uranas'),
(3835, 'Koks lietuvos sienos ilgis su lenkija [km]', '110'),
(3836, 'Tokia gamybos sistema, kai gaminys surenkamas, kilnojant ji nuo vieno darbininko ar irenginio prie kito: surinkimo ...', 'linija'),
(3837, 'Kunu padengimas kitomis medziagomis naudojant elektrolize', 'galvanostegija'),
(3838, 'Senoves graiku karys, pirmasis \"maratono begikas\", gyvenes v aprkr.', 'fidipidas'),
(3839, 'Rusisko motociklo marke', 'java'),
(3840, 'Alkoholinis gerimas, gaminamas is geriausiu ryziu ir tyriausio saltiniu vandens', 'sake'),
(3841, 'Indelis arbatzolems uzplikyti', 'arbatinukas'),
(3842, 'Veikimo pastangos pradzia, sumanymas', 'iniciatyva'),
(3843, 'Mokslas, tiriantis zemes forma, dydi ir gravitacijos lauka bei vietoves matavimus, susijusius su zemes pavirsiaus atvaizdavimu planuose ir zemelapiuose', 'geodezija'),
(3844, 'Zodzio \"mono\" antonimas', 'stereo'),
(3845, 'Vedybu apeigos ir pokylis', 'vestuves'),
(3846, 'Mineralas, pastoviausia zemes plutoje grynosios anglies atmaina', 'grafitas'),
(3847, 'Nacionaline butano gele: melynoji ...', 'aguona'),
(3848, 'Prancuzu poetas, simbolistu pirmtakas [liet.]', 'bodleras'),
(3849, 'Izanga i pagrindini kurinio isdestyma; ivairaus pobudzio ir sandaros nedideli kuriniai vargonams, fortepijonui', 'preliudas'),
(3850, 'Reiskinys, kai is ilgesni laika laikomu zoliu pradeda skirtis sugertas skystis', 'sinereze'),
(3851, 'Kaip senoves egiptieciai vadino siela, gyvybine energija', 'ka'),
(3852, 'Nedideles terotrijos arba inzinerinio irenginio sumazinta horizontalioji projekcija', 'planas'),
(3853, 'Plieno strukturos komponentas, kuri sudaro ferito ir cementito dispersinis misinys', 'trostitas'),
(3854, 'Klausykla kitaip', 'konfesionalas'),
(3855, 'Organizmas, neturintis tikro branduolio', 'prokariotas'),
(3856, 'Sektinas dalykas', 'pavyzdys'),
(3857, '2001 bravo geriausia vokaliste [orig.]', 'jennings'),
(3858, 'Popiezius, pirmasis pakvietes krikscionis dalyvauti kryziaus zygiuose ir atgauti is musulmonu jeruzale', 'urbonas ii'),
(3859, 'Mokslas, tiriantis mirti, tiesiogines mirties priezastis, mirimo dinamika ir mechanizma', 'tanatologija'),
(3860, 'Kuno greicio pokytis', 'pagreitis'),
(3861, 'Indijos sostine', 'delis'),
(3862, 'Kas 1951 metais tapo f-1 pasaulio cempionu [liet.]', 'fanchijas'),
(3863, 'Baltai juodas daugiapelekis delfinas, didziausias delfinu seimos atstovas', 'orka'),
(3864, 'Veiksmazodzio nuosaka, kuri parodo kas butu, jeigu butu', 'tariamoji'),
(3865, 'Rasytojas, poetas (1759-1796m.), eil.rink\"eiles\", poemu \"du sunes\", \"linksmieji valkatos\" autorius', 'bernsas'),
(3866, 'Nilo nendres, is kuriu senoves egiptieciai gamino valteles ir popieriu [dgs.]', 'papirusai'),
(3867, 'Xviii a.pr.krbabilono valdovas, ispletes valstybe nuo persijos ilankos iki zagro kalnu', 'hamurabis'),
(3868, 'Laivo kursas, sutampantis su vejo kryptimi', 'fordevindas'),
(3869, 'Nerangus, nevikrus zmogus ar gyvulys', 'netiksa'),
(3870, 'Tikriniai zodziai', 'onimai'),
(3871, 'Atitinkantis siu dienu reikalavimus', 'modernus'),
(3872, 'Kvadratine naturiniu skaiciu lentele, kurios visu eiluciu, visu stulpeliu ir abieju istrizainiu skaiciu sumos yra lygios', 'magiskasis kvadratas'),
(3873, 'Porines prie apavo tvirtinamos pavazeles ciuozti ledu', 'paciuzos'),
(3874, 'Pinigu ir vertybiniu popieriu leidejas', 'emitentas'),
(3875, 'Kai kuriu viduramziu valstybiu auksine moneta', 'dinaras'),
(3876, 'Uoliena arba jos dali sudaranciu ivairiu formu ir strukturos mineralu visuma', 'agregatas'),
(3877, 'Cheminis elementas, kurio simbolis \"n\" [numeris 7]', 'azotas'),
(3878, 'Devintas diatonines gamos laipsnis', 'nona'),
(3879, 'Zenklas, daznai rasomas ant kataliku baznycios ir ant kryziu virs nukryziuotojo, sudarytas is lotynu kalbos zodziu ???jesus nazarenus rex judeorum??? pirmuju raidziu', 'inri'),
(3880, 'Zodzio viktorina priebalsiu sumos kvadratas', '25'),
(3881, 'Bendratis, arba ....', 'infinityvas'),
(3882, 'Lietuvos premjeras 1992 metais, po gvagnoriaus atsistatydinimo', 'abisala'),
(3883, 'Lietuviu rasytojas, apysakos \"gyvenimas po klevu\" autorius', 'granauskas'),
(3884, 'Nedidele valstybe, isikurusi to paties pavadinimo saloje, esancioje atlanto vandenyno siaurin?je dalyje', 'islandija'),
(3885, 'Xx apirmos puses italu skulptorius, kurio kurybos objektas buvo be galo isilgu proporciju zmogus, darantis trapumo ir vienisumo ispudi', 'dzakometis'),
(3886, 'Kada irakas tapo arabu lygos nariu', '1945'),
(3887, 'Zenklai muzikos garsams uzrasyti, kad dainininkas ar muzikantas galetu juos atkurti taip, kaip numato kompozitorius', 'notacija'),
(3888, 'Piktybinio naviko isplitimas is pirminio zidinio i kitus audinius ar organus ir limfinius mazgus', 'metastazavimas'),
(3889, 'Zmogus, kuris verciasi daiktu pirkimu ir pardavimu', 'pirklys'),
(3890, 'Daugelio senoves religiju kulto apeigu vietos irenginys - pakyla aukoms aukoti', 'aukuras'),
(3891, 'Vieno is dvieju gretimu vienodu arba panasiu skiemenu iskritimas del patogesnio tarimo', 'haplologija'),
(3892, 'Nobelio fizikos premijos laureatas 1938m., apdovanotas uz dirbtinio radioaktyvumo, sukelto bomborduojant letaisiais neutronais, tyrimus', 'fermis'),
(3893, 'Mano buveine kiausinis, geltonas as lyg auksinis', 'trynys'),
(3894, 'Kaip vadinamas kanadietiskas viskis', 'burbonas'),
(3895, 'Automobiliu gamintojas isleides siuos modelius: 460, 760, 850, 940', 'volvo'),
(3896, 'Viduriniosios azijos tautu liaudies dainiai, muzikantai, epiniu kuriniu atlikejai', 'bachsiai'),
(3897, 'Abaranausko ir avienuolio memorialinio muziejaus leidinys, einantis kas pusmeti anyksciuose', 'anyksciai'),
(3898, 'Islikes saugojamas kulturos ar gamtos objektas', 'paminklas'),
(3899, 'Krikscioniu baznyciu administracinis vienetas, valdomas vyskupo ordinaro', 'diecezija'),
(3900, 'Saudykla', 'tiras'),
(3901, 'Vaizduojamosios dailes saka, kurioje meninis vaizdas kuriamas plokstumoje ivairiu spalvu dazais', 'tapyba'),
(3902, 'Baudziamoji priemone', 'represija'),
(3903, 'Visuomenes socialines padeties skirtumai, kuriuos daugiausia lemia pajamos ir issilavinimas', 'socialine nelygybe'),
(3904, 'Koks zymus zmogus pasake: \"vien tik per kova nuolatine zmogus atranda savo as\"', 'gete'),
(3905, 'Stiliaus figura; to paties jungtuko kartojimas', 'polisindetonas'),
(3906, 'Mazas zemes sklypas, atsirades, skirstant dideli zemes sklypa', 'parcele'),
(3907, 'Dykaragis zinduolis', 'jakas'),
(3908, 'Tauta isradusi sachmatus', 'indai'),
(3909, 'Vaskine, stipriai kvepianti medziaga, susidaranti kasaloto zarnyne', 'ambra'),
(3910, 'Auksciausias italijos taskas, aukstis 2914 m', 'kornas'),
(3911, 'Vidinis objekto tyrimas', 'mikrotyrimas'),
(3912, 'Vienbalse muzika', 'monodija'),
(3913, 'Xix avokieciu kompozitorius ir pianistas, sukures \"vasarvidzio nakties sapna\"', 'mendelsonas'),
(3914, 'Filmas su sharon stone: \"esminis ...\"', 'instinktas'),
(3915, 'Kas nugalejo gorgona meduza', 'persejas'),
(3916, 'Is kito galo ir be tarpo: \"o tarpus\"', 'suprato'),
(3917, 'Teisetas, atitinkantis istatyma, istatymo leidziamas', 'legalus'),
(3918, 'Angele, kuria odos pavirsiuje atsiveria prakaito ir riebalu liauka', 'pora'),
(3919, 'Xix avokieciu kompozitorius, sukures opera \"caras ir dailide\"', 'lortzing'),
(3920, 'Svarbiausia sintoizmo panteono dievybe, zemdirbystes globeja', 'amaterasu'),
(3921, 'Telktinis darbas, nemokama tarpusavio pagalba, telkiama skubiems ir sunkiems darbams atlikti', 'talka'),
(3922, 'Romeniskai 19', 'xix'),
(3923, 'Chtonine deive, padedanti zmonems medzioti, ganyti, auginti arklius ir t.t.', 'hekate'),
(3924, 'Pastato, masinos ar kita ko pamatas', 'fundamentas'),
(3925, 'Menininku, amatininku dirbtuve', 'atelje'),
(3926, 'Obuolio nugrauztas likutis', 'grauztas'),
(3927, 'Niutono gimimo metai', '1642'),
(3928, 'Bulviu kasimo masina', 'bulviakase'),
(3929, 'Nei pats valgo, nei ..duoda', 'kitam'),
(3930, 'Pailga, pylimo formos, istisusi kalva', 'ozas'),
(3931, 'Mokslo veikalas', 'traktatas'),
(3932, 'Pilieciu visuotinis balsavimas konstitucijos ar kito istatymo priemimo vidaus ir uzsienio politikos klausimais', 'referendumas'),
(3933, 'Povandeninio laivo sovinys', 'torpeda'),
(3934, 'Labai kieta, kaitrai atspari metalo keramika', 'kermetai'),
(3935, 'Populiarus tv serialas \"seksas ir ...\"', 'miestas'),
(3936, 'Visuomenes srove, neigianti bet kokia valstybine valdzia', 'anarchizmas'),
(3937, 'Kiek procentu prilygsta vienam penktadaliui', '20'),
(3938, 'Muzikinis zanras; nuotaikinga instrumentine miniatura', 'bagatele'),
(3939, 'Duomenu tipas, apibreztas tikrai operacijomis, kurios taikomos jo objektams, sio tipo reiksmiu vaizdavimo budas nenurodomas', 'abstraktusis'),
(3940, 'Apastalas isdaves jezu', 'judas'),
(3941, 'Viena karta zydinti tekilos zaliava', 'agava'),
(3942, 'Valstybe, kurioje yra miestas kasablanka', 'marokas'),
(3943, 'Jav kosminis laivas, 1986msproges keliolika sekundziu po pakilimo', 'challenger'),
(3944, '\"omnitel\" pramogu ir informacijos portalas internete', 'omni'),
(3945, 'Butinumas pasirinkti viena is dvieju galimybiu', 'alternatyva'),
(3946, 'Krioklys auksciausias pasaulyje, 20 kartu aukstesnis uz niagaros kriokli', 'anchelis'),
(3947, 'Mazeikiu firma, turinti 15 degaliniu', 'livena'),
(3948, 'Koks augalas yra visuotinai krikscioniu priimtas liudesio ir sielvarto simbolis', 'kiaulpiene'),
(3949, 'Tuscias krastas sasiuvinyje', 'paraste'),
(3950, 'Asmuo, padares isradima', 'isradejas'),
(3951, 'Stepiu antilope', 'saiga'),
(3952, 'Kelintais metais ivyko \"didzioji spalio\" revoliucija (perversmas)', '1917'),
(3953, 'Ivairios formos ir pavidalo moreniniai dariniai, susidare, kai tirpstancio ledyno vandenys prinese ledyno plysius moreniniu dariniu', 'keimas'),
(3954, 'Tapytojas, kartu su broliu agostinu nutape farnezi rumu romoje galerijos freskas ovidijaus \"metamorfoziu\" siuzetais', 'karacis'),
(3955, 'Vyno ir makaronu salis', 'italija'),
(3956, 'Didziausias miestas australijoje', 'brisbanas'),
(3957, 'Malaizijos smulkus pinigas', 'senas'),
(3958, 'Musulmonu velnias, piktoji dvasia', 'ibilis'),
(3959, 'Stiklinis laboratoriju indas', 'kolba'),
(3960, 'Lasteles branduolys', 'citoblastas'),
(3961, 'Pretenzijos, reikalavimai, skundai', 'kleimsai'),
(3962, 'Vekselio garantija', 'avalis'),
(3963, 'Krepsinio klubas is klaipedos', 'neptunas'),
(3964, 'Salis, kurioje yra daugiausia universitetu', 'indija'),
(3965, 'Kuriais metais ikurta izraelio valstybe', '1948'),
(3966, 'Itampos matavimo vienetas', 'voltas'),
(3967, 'Kumeles ir asilo hibridas', 'mulas'),
(3968, 'Vyrvardas, kiles is lotkalbos, reiskia \"didziai garbingas, didingas\"', 'augustas'),
(3969, 'Jav prezidentas 1981-1989 m.', 'reiganas'),
(3970, 'Uz zemes atmosferos esanti erdve bei joje esantys objektai', 'kosmosas'),
(3971, 'Florencijos valdovas (1385-1464)', 'kozimas medicis'),
(3972, 'Beveik grynos gelezies meteoritas', 'sideritas'),
(3973, 'Raiskus, meniskas teksto sakymas is atminties', 'deklamacija'),
(3974, 'Umine infekcine liga, kuria sukelia shigella genties bakterijos, ir kuriai budingas storosios zarnos uzdegimas', 'dizenterija'),
(3975, 'Mokslininkas, tyrinejantis augalus', 'botanikas'),
(3976, 'Bahamu administracinis vienetas', 'rajonas'),
(3977, 'Legendinis, visu laiku geriausias futbolininkas', 'pele'),
(3978, 'Cheminis elementas, kurio simbolis \"ac\" [numeris 89]', 'aktinis'),
(3979, 'Himalaju vietinis, alpinistu palydovas', 'serpas'),
(3980, 'Ganos sostine', 'akra'),
(3981, 'Seniausioji lietuvos sostine, svarbiausias pagoniskojo kulto centras, tituluojama ir baltu valstybingumo lopsiu', 'kernave'),
(3982, 'Prietaisas duoti garso signalui', 'sirena'),
(3983, 'Malajieciu ir indonezieciu dviasmenis plieninis durklas, banguotos formos gelezte ir meniskai inkrustuota arba ispjaustyta medzio, kaulo ir rago rankena', 'krisas'),
(3984, 'Paskersto gyvulio skerdena arba jos dalis; vienas svarbiausiu maisto produktu', 'mesa'),
(3985, 'Pirmosios spektro spalvu raides', 'rogzzmv'),
(3986, 'Europos bendrijos europos kulturinio paveldo populiarinimo ir apsaugos skatinimo programa [orig.]', 'raphael'),
(3987, 'Pastabumas arba ...', 'atidumas'),
(3988, 'Didziausia baltijos juros sala', 'zelandija'),
(3989, 'Lietuviu paprotys rengti apeigas ir vaises uzbaigus svarbu, dazniausiai talkomis atlikta darba', 'pabaigtuves'),
(3990, 'Upe, tekanti per plunge', 'babrungas'),
(3991, 'Tikroji klasikine japonu religija', 'sintoizmas'),
(3992, 'Moljero personazas, baisus sykstuolis', 'harpagonas'),
(3993, 'Mazaideju_pagrindine_informacija_4hj7sd4vto motinos vardas', 'amina'),
(3994, 'Lietuvos nepriklausomybes atkurimo diena', 'kovo 11'),
(3995, 'Dvasinis mokytojas, dievo atstovas', 'guru'),
(3996, 'Toks dvieju gyvu organizmu rysys, kai abu gauna is to naudos', 'simbioze'),
(3997, 'Kas parase knyga \"zmones, valstybes ir baime\"', 'buzan'),
(3998, 'Kas nutape pirma abstrakcionistine akvarele', 'kandinskis'),
(3999, 'Tekstiles dirbiniai, isausti is naturalaus, dirbtinio arba sintetinio pluosto [dgs.]', 'audiniai');
INSERT INTO `vikte_klsm` (`id`, `klsm`, `ats`) VALUES
(4000, '23-oji graikiskos abeceles raide', 'psi'),
(4001, 'Sachmatu karalius, valdove, bokstas, rikis, zirgas', 'figura'),
(4002, 'Smelio pusiasalis kursiu nerijoje, kaliningrado srityje, 4 kmi pietus nuo nidos: .ragas', 'grobsto'),
(4003, 'Kiek paru zmogus gali isgyventi nevartodamas skysciu', '7'),
(4004, 'Senoves egiptieciu dievas, kurio vardas, isvertus i lietuviu kalba, reiskia \"pasleptas\"', 'amonas'),
(4005, 'Plakta grietine', 'sviestas'),
(4006, 'Kaip buvo vadinama napoleono armija', 'grande armie'),
(4007, 'Zukles irankis su rite ir blizge plesrioms zuvims gaudyti', 'spiningas'),
(4008, 'Sengraiku poetas, iskilmingos choralines lyrikos kurejas', 'pindaras'),
(4009, 'Adolfo hitlerio tikroji profesija', 'dailininkas'),
(4010, 'Modemas lietuviskai', 'vartykle'),
(4011, 'Stumoklis, kurio ilgis didesnis uz skersmeni', 'plunzeris'),
(4012, 'Pavyzdys, pagal kuri masiskai gaminami vienodi daiktai', 'sablonas'),
(4013, 'Europos hercogyste', 'liuksemburgas'),
(4014, 'Organinis junginys, esantis karciuju migdolu, persiku, vysniu, slyvu kauliukuose', 'amigdalinas'),
(4015, 'Is kerpiu gaunama medziaga, vartojama kaip cheminis indikatorius', 'lakmusas'),
(4016, 'Sportinis zaidimas su rutuliais: zaidejo tikslas medinio plaktuko smugiais kuo greiciai ivaryti savo rutuli i visus 10 tam tikra tvarka isdestytu aiksteleje vieliniu varteliu ir grizti i pradine padeti', 'kroketas'),
(4017, 'Tikras daiktas, faktas', 'realija'),
(4018, 'Tapytojas, \"vezimas sienui\", \"sokinejantis arklys\" autorius', 'konsteblis'),
(4019, 'Cheminis elementas, kurio simbolis \"fr\" [numeris 87]', 'francis'),
(4020, 'Skulptorius, grafikas, medalistaszymiausi kuriniai: \"lietuvos mokykla\", \"artojas\", \"skausmas\"', 'rimsa'),
(4021, 'Kuriais metais susikure vokietijos imperija', '1871'),
(4022, 'Kumeliu pienas', 'kumysas'),
(4023, 'Teritorija rusijos rytuose', 'sibiras'),
(4024, 'Individo vystymasis nuo gimimo iki mirties', 'ontogeneze'),
(4025, 'Induizme - dievas saugotojas', 'visnus'),
(4026, 'Laikinas 2 mikroorganizmu kontaktas, kurio metu vyksta pasikeitimas genetine medziaga', 'konjugacija'),
(4027, 'Skraidymo arba sklaidymo menas', 'pilotazas'),
(4028, 'Kirvio kotas', 'kirvakotis'),
(4029, 'Bolivijos smulkus pinigas', 'sentavas'),
(4030, 'Sviesiausia zuvu zvaigzdyno zvaigzde', 'alrisa'),
(4031, 'Kas parase veikala \"zmogiskojo supratimo patirtis\"', 'lokas'),
(4032, 'Skulptorius; skulpturiniu kompoziciju \"trys milzinai\" karininku ramoves kaune, puntuko akmenyje iskaltu dariaus ir gireno bareljefu autorius', 'pundzius'),
(4033, 'Numidijos karalius (nuo 117m.)stengesi suvienyti sali, tuo metu susiskaldziusia i 3 valstybeles [liet.]', 'jugurta'),
(4034, 'Meslungis - nevalingas raumenu arba raumenu grupiu susitraukimas', 'spazmas'),
(4035, 'Isorine svartavimosi sija laivo bortui apsaugoti', 'fenderis'),
(4036, 'Stokholmo ikurimo data', '1250'),
(4037, 'Masina medienos masei gaminti', 'defibreris'),
(4038, 'Skaicius lygus 12 tuzinu, t.y144 vienetams', 'grosas'),
(4039, 'Kaip vadinasi kova del buvio, kuri vyksta tarp kiekvienos rusies vienos populiacijos individu', 'vidurusine'),
(4040, 'Kardo, kalavijo, peilio rankena, kotas', 'grifas'),
(4041, 'Ii apabaigos - i apries musu era romos komedija', 'togata'),
(4042, 'Valstybe, antroji (po nyderlandu) legalizavusi eutanazija [nuodu susvirkstimas serganciam nepagydoma liga]', 'belgija'),
(4043, 'Baltas vyzdys', 'leukokorija'),
(4044, 'Lietuvos didysis kunigaikstis, valdes xiii amziaus pabaigoje', 'butvydas'),
(4045, 'Mokslas, tiriantis zmogaus ir gyvunu kaukoliu forma, sandara, raida', 'kraniologija'),
(4046, 'Senoves graiku religijoje - dvylika dangaus (urano) ir zemes (ge) vaiku [dgs.]', 'titanai'),
(4047, 'Greitai saudantis pistoletas', 'parabelis'),
(4048, 'Giliaspaudes grafikos (oforto) technika, spausdinama nealiejiniais dazais', 'akvatina'),
(4049, 'Lektuvas, kurio darius ir girenas perskrido atlanta', 'lituanica'),
(4050, 'Koki sakramenta jezus kristus isteige paskutines vakarienes metu', 'komunija'),
(4051, 'Azurinio siuvinejimo budas: praretinus audini, t.yistraukus dali ataudu ir metmenu, likusieji laisvi siulai grupuojami pluosteliais ir apsiuvami daznkilpiniu arba lygiuoju dygsniu', 'peltakiavimas'),
(4052, 'Indijos kunigaikscio titulas', 'radza'),
(4053, 'Zirgo grizimas i ankstesniji alura', 'repriza'),
(4054, 'Dailiajame ciuozime - greitas ciuozejo sukimasis vietoje', 'piruetas'),
(4055, 'Gyventoju sugebejimas keisti savo gyvenimo salygas: profesija, gyvenamaja vieta, darboviete ir tt- socialinis ...', 'mobilumas'),
(4056, '\"coca-cola\" gerimo pavadinimo gimimo metai', '1889'),
(4057, 'Ziurovu sales dalis, skirta garbingiausiai publikai', 'loze'),
(4058, 'Valdzios organas rusijoje', 'duma'),
(4059, 'Sportinis zaidimas: pusiau padalytoje keturkampeje aiksteleje vienos komandos zaidejai stengiasi kamuoliu pataikyti i kitos komandos zaidejus', 'kvadratas'),
(4060, 'Pasaulio dalis tarp atlanto ir ramiojo vandenyno, sudaryta is dvieju zemynu', 'amerika'),
(4061, 'Diena, nuo kurios iki metu galo lieka 34 dienos (keliamaisiais metais)', 'lapkricio 27'),
(4062, 'Zemes pavirsiaus plotas, kurio gretimu tasku auksciai mazai tesiskiria', 'lyguma'),
(4063, 'Kokiame mieste nuo 1785 iki 1904mveike pirmoji lietuvoje muzikos mokykla', 'rokiskyje'),
(4064, 'Saldytuvu gamykla alytuje', 'snaige'),
(4065, 'Slogutis, slegiantis baisus sapnas, slegiantis regejimas', 'kosmaras'),
(4066, '21-a valstija, prijungta prie jav 03.12.1818 m., sostine springfildas [liet.]', 'ilinojus'),
(4067, 'Tinklas poilsiui tarp 2 medziu', 'hamakas'),
(4068, 'Skirtingu, nederanciu meno teoriju, mokslo, koncepciju, stiliu, teziu, savoku nekurybiskas jungimas ir vartojimas; nesavarankiska, neprincipinga mastysena, kuryba', 'eklektika'),
(4069, 'Romos politinis veikejas, romenu istorikas, pirmasis rases lotyniskai', 'katonas'),
(4070, 'Husitu karvedys, ceku nacionalinis didvyris, 1410 mvadovaves ceku daliniams zalgirio musyje', 'zizka'),
(4071, 'Dviracio stipino verzle', 'nipelis'),
(4072, 'Harvardo zvaigzdziu spektru klasifikacijos sistema sukure e.cpickering ir aj..(orig.)', 'cannon'),
(4073, 'Tusinukas kitaip, \"lietuviskiau\"', 'sratinukas'),
(4074, 'Atvoziamas metalinis dangtis, dengiantis varikli', 'kapotas'),
(4075, 'Varzybose kitus aplenkiantis, pirmaujantis sportininkas arba komanda', 'lyderis'),
(4076, 'Legendine akauspedo muzikos grupe', 'antis'),
(4077, 'Kuriais metais ikurta nasa - jav valstybine agentura, atsakinga uz visas nekarines kosmoso tyrimo programas', '1958'),
(4078, 'Auksciausias kalnas australijoje', 'kosciuskos'),
(4079, 'Atlikeja, 2001 misleidusi albuma \"mergaites nori mylet\"', 'atlanta'),
(4080, 'Zmogus, nustates, kaip maliarijos sukelejai patenka i organizma ir uz tai 1902 mgavo nobelio premija [orig.]', 'ross'),
(4081, 'Vieta palei kelia', 'salikele'),
(4082, 'Humoristinis arba satyrinis vaizduojamosios dailes kurinys, kuriame isjuokiami neigiami gyvenimo reiskiniai, zmogaus ydos ir komiski bruozai', 'karikatura'),
(4083, 'Lakstines grafikos kurinys, rankomis raizyto medzio, metalo, linoleumo, akmens atspaudas', 'estampas'),
(4084, 'Rusu dailininkas, kuriniu \"demonas\", \"sirenos\" autorius', 'vrubelis'),
(4085, 'Jav prezidentas, baiges antraji pasaulini kara', 'trumenas'),
(4086, 'Slovenijos farmacijos kompanijos, isikurusios novo mesto mieste, pavadinimas', 'krka'),
(4087, 'Maziausias pasaulio zemynas', 'australija'),
(4088, 'Arabu genties vadovas', 'seichas'),
(4089, 'Prielaidomis paremtas neislikusios ar neisskaitomos knygos, rankrascio teksto dalies atkurimas, perskaitymas', 'konjektura'),
(4090, 'Prancuzu kompozitorius, operu \"karmen\", \"perlu ieskotojai\", \"ivanas rustusis\", opereciu, 2 simfoniju autorius', 'bize'),
(4091, 'Sengraiku mitologijoje - juru dievas zmogaus kunu ir zuvies uodega', 'tritonas'),
(4092, 'Kelintais metais veikla pradejo \"volvo\" imone', '1927'),
(4093, 'Kaip vadinosi pervadinta egipto sostine memfis is sio zodzio kilo ir pacio egipto pavadinimas', 'chikupta'),
(4094, 'Ginkluotas uzpuolimas, prieso jegu isiverzimas be karo paskelbimo', 'invazija'),
(4095, 'Masine kulturos svente, teatro, kino ar kitu meno kuriniu perklausa, apziura', 'festivalis'),
(4096, 'Lietuviu sutemos deive', 'breksta'),
(4097, 'Mechanikoje - du krumpliuoti, sukibe ratai', 'krumpline pavara'),
(4098, 'Sensualizmo savoka, reiskianti kudikio prota, neturinti jokiu ziniu, ideju', 'tabula rasa'),
(4099, 'Bulgarijos monarcho titulas', 'caras'),
(4100, 'Cheminis elementas, kurio simbolis \"yb\" [numeris 70]', 'iterbis'),
(4101, 'Aukstu bortu, vieno denio, 3-4 stiebu 12-17aburlaivis', 'karavele'),
(4102, 'Seksualinis potraukis vaikams', 'pedofilija'),
(4103, 'Gryno tauriojo metalo svoris monetoje', 'kornas'),
(4104, 'Viena pagrindiniu kurybinio proceso prielaidu -psichine busena, kuriai budingas samones aktyvumas, emocinis pakilumas', 'ikvepimas'),
(4105, 'Gimtasis arnoldo svarcnegerio miestelis austrijoje', 'gracas'),
(4106, 'Si sistemos elektros laidumo vienetas, lygus 1 omo varzos laidininko laidumui', 'simensas'),
(4107, 'Standi kampuota kepure su 3 arba 4 rageliais ir spurgu ar be jo, devima kataliku dvasininku', 'biretas'),
(4108, 'Politika nagrinejantis mokslas', 'politologija'),
(4109, 'Italijos sostine', 'roma'),
(4110, 'Jega, tenkanti ploto vienetui', 'slegis'),
(4111, 'Mokslo ir ziniu diena', 'rugsejo 1'),
(4112, 'Australijos miestas, kuriame vyksta pirmasis formules-1 \"grand prix\" etapas', 'melburnas'),
(4113, 'Australijos f-1 trasa', 'albert park'),
(4114, 'Ezeras svencioniu rj(pavadinimas kaip vieno gyvuno)', 'ezys'),
(4115, 'Baznytines vokalines muzikos forma', 'choralas'),
(4116, 'Kaip dar vadinama akademinio irklavimo 8+ valciu klase', 'flagmanas'),
(4117, 'Gerklu uzdegimas', 'laringitas'),
(4118, 'Visuotine trauka', 'gravitacija'),
(4119, 'Pinigine pasalpa', 'subsidija'),
(4120, 'Netycine logine klaida, del kurios samprotavimas yra netaisiklingas, o jo isvada klaidinga', 'paralogizmas'),
(4121, 'Sasiauris skiriantis anglija nuo prancuzijos [vard.]', 'lamansas'),
(4122, 'Tikejimas nauda', 'viltis'),
(4123, 'Kietmedzio lenteliu grindys', 'parketas'),
(4124, 'Skandinavijos avialinjos', 'sas'),
(4125, 'Oficiali kalba etiopijoje', 'amharu'),
(4126, 'Rusijos piniginio vieneto rublio simtoji dalis', 'kapeika'),
(4127, 'Salis, 1966 mpasaulio futbolo cempionato nugaletoja', 'anglija'),
(4128, 'Kiek apytiksliai [kg] sveria suaugusio zmogaus oda kartu su poodziu', '18'),
(4129, 'Fizinis arba juridinis asmuo, norintis is kito asmens isigyti preke ir isipareigojantis uz ja moketi nustatyta pinigu suma', 'pirkejas'),
(4130, 'Skulptorius (5 aprkr.) \"ieties nesejas\" autorius', 'polikletas'),
(4131, 'Saltasis japonu patiekalas: ryziu rutulelis su zuvimi, kiausiniais ar darzovemis, apslakstytas actu, bei ivyniotas i juru zoles (dumblius, kopustus)', 'graikija'),
(4132, 'Cekijos sventasis kankinys ir globejas', 'vaclovas'),
(4133, 'Dzeimso bondo numeris', '007'),
(4134, 'Pagrindinis kanu kino festivaliu prizas: auksine ...', 'palmes sakele'),
(4135, 'Liga - visiskas aklumas', 'amauroze'),
(4136, 'Arkties giliausia iduba', 'moloi'),
(4137, 'Skelia ugni', 'titnagas'),
(4138, 'Apytiksliai 16??? plocio dangaus sferos juosta, kurios viduriu eina ekliptika', 'zodiakas'),
(4139, 'Pagalba kitaip', 'parama'),
(4140, 'Anksciausiai isdygstantys valgomieji grybai', 'briedziukai'),
(4141, 'Romenu filosofas, rasytojas', 'seneka'),
(4142, 'Trumpalaikis regejimo pojutis, atsirandantis nustojus veikti optiniam dirgikliui', 'povaizdis'),
(4143, 'Puses sferos pavidalo teleskopo boksto stogas, apsaugantis teleskopa ir jo aparatura nuo blogo oro ir ikaitimo nuo saules spinduliu', 'kupolas'),
(4144, 'Kabeliu perduodama telegrama', 'kablograma'),
(4145, 'Limfocitu sintezuojami citokinai', 'limfokinai'),
(4146, 'Miestas, kuriame pirma kart istorijoje buvo persodinta sirdis zmogui', 'keiptaunas'),
(4147, 'Vertybinis popierius', 'akcija'),
(4148, 'Kaip vadinamas bruksnelis - zodzio dalies kelimo is vienos eilutes i kita zenklas arba jungiamasis zenklas tarp dvieju zodziu', 'defisas'),
(4149, 'Iskiliojo briaunainio formos ir tvarkingos vidines sandaros kietasis kunas', 'kristalas'),
(4150, 'Mecetes terasa', 'aivanas'),
(4151, 'Santykis tarp sutuoktiniu giminaiciu', 'svainyste'),
(4152, 'Smulkiu vandens lasu arba ledo kristalu sankaupa ore, sumazinanti matomuma atmosferoje', 'rukana'),
(4153, 'Iii reicho vekejas, naciu valstybines propogandos vadas', 'gebelsas'),
(4154, 'Ka nors entuziastingai slovinanti daina, himnas, kartais - himno pobudzio instrumentinis kurinys', 'ditirambas'),
(4155, 'Virtinukai, idaryti mesa, varske arba spinatais', 'ravioliai'),
(4156, 'Dailes kryptis, kurios esme - absurdas absurdiskomis priemonemis', 'dadaizmas'),
(4157, 'Kartis ardams deti', 'ardakilas'),
(4158, 'Bendroviu, sajungu, korporaciju susiliejimas, susijungimas ir pan.', 'amalgamacija'),
(4159, 'Kasdienybe', 'rutina'),
(4160, 'Pirmasis lietuvis uzkopes i everesto kalna', 'vitkauskas'),
(4161, 'Augalo ziedo issigimimas', 'antolize'),
(4162, 'Kariuomenes zygiavimas paradine rikiuote vadui, valdzios atstovui pagerbti', 'defiliada'),
(4163, 'Graiku rasytojas (i-ii a.), sukures seniausia islikusi graiku romana  \"chairejas ir kaliroje\"', 'charitonas'),
(4164, 'Tonuso nebuvimas', 'atonija'),
(4165, 'Xvi-xviii alenkijos ir lietuvos valstybes seimo sutartis su kandidatu i valdovus', 'pacta conventa'),
(4166, 'Uzdaras skardos lakstu arba vielos tinklo apvalkalas, pro kuri is isores negali prasiskverbti joks elektros laukas', 'faradejaus narvas'),
(4167, 'Sauliu sajungos ikurejas', 'putvinskis'),
(4168, 'Lenkijos krepsinio klubas is voclaveko miesto', 'anwil'),
(4169, 'Penktasis jav prezidentas, kurio vardu buvo pavadinta doktrina ir kurio prezidentavimo metas buvo vadinamas \"geru jausmu era\"', 'monro'),
(4170, 'Vienu rankos judesiu nubreztas bruksnys', 'strichas'),
(4171, 'Dzeromo selindzerio romano \"rugiuose prie bedugnes\" pagrindinis herojus: holdenas ...', 'kolfildas'),
(4172, 'Graiku vandens dievas, nereidziu tevas', 'nerejas'),
(4173, 'Sartas arklys', 'sartis'),
(4174, 'Staigus vejo sustiprejimas', 'gusis'),
(4175, 'Aktore atlikusi pagrindinius vaidmenis filmuose \"esminis instinktas\", \"specialistas\", \"kazino\" ir kt.: sharon ..[orig.]', 'stone'),
(4176, 'Hermio ir afrodites sunus, kuri pamilo nimfa salmatideveliau jie abu buvo sujungti i viena zmogu', 'hermafroditas'),
(4177, 'Tautines giesmes autorius', 'kudirka'),
(4178, 'Vandens judejimas i lastele', 'osmosas'),
(4179, 'Loti is leto', 'amseti'),
(4180, 'Zemes plutos sluoksniu pirmykscio slugsojimo deformacija', 'diskokacija'),
(4181, 'Neatlygintinis naudojimasis daiktu', 'panauda'),
(4182, 'Zemesniuju augalu kunas, morfologiskai nesuskirstytas i audinius ir organus; budingas dumbliams, kerpems', 'gniuzulas'),
(4183, 'Issifruokite dvd', 'digital versatile disk'),
(4184, 'Tropas; raiskos budas, negyviems daiktams suteikiantis gyvos butybes ypatumu, gyvuliams, pauksciams - zmogaus savybiu', 'personifikacija'),
(4185, 'Tolimiems objektams stebeti naudojamas optinis prietaisas', 'teleskopas'),
(4186, 'Kuriais metais yra ikurta vilniaus duonos kepykla - viena seniausiuju lietuvoje veikianciu kepyklu', '1876'),
(4187, 'Skotu nacionalinis drabuzis', 'kiltas'),
(4188, 'Temperamento tipas, kuriam budingos staigios, stiprios ir ilgai trunkancios emocines reakcijos', 'cholerikas'),
(4189, 'Pozemines ar pavirsines tekmes vandens lygio pakilimas, hidrotechninemis priemonemis susiaurinus upes vaga, dirbtinai ar del ledu sangrudos ja uztvenkus bei kitu priezasciu', 'patvanka'),
(4190, 'Kada buvo ikurta japonu automobiliu firma nissan (datsun)', '1933'),
(4191, 'Panevezio miesto telefoninis kodas', '45'),
(4192, 'Vokieciu operos klasikas, \"skrajojancio olando\" autorius', 'vagneris'),
(4193, 'Kataliku vienuoliu ordinas, ikurtas 1215 mkovai su eretikais', 'dominikonai'),
(4194, '1 ml vandens mase', 'gramas'),
(4195, 'Ilgiausia siaures amerikos upe', 'misisipe'),
(4196, 'Paragvajaus administracinis vienetas', 'departamentas'),
(4197, 'Indu mirties deive', 'kali'),
(4198, 'Filmas su michelle pfeiffer: \"baltasis ...\"', 'oleandras'),
(4199, 'Anglijos futbolo rinktines namu aprangos spalva', 'balta'),
(4200, 'Nesamoningas psichinis procesas - is samones isstumtas turinys (impulsai, prisiminimai, svajones) virsta kokios nors kuno ligos simptomais', 'konversija'),
(4201, '..rugstis, vaistas salicilo rugsties darinys mazina karsciavima malsina skausma,aspirinas', 'acetilsalicilo'),
(4202, 'Auksciausia austrijos virsune 3797 m.', 'grosglokneris'),
(4203, 'Pastato isore, fasadas', 'eksterjeras'),
(4204, 'Indas, deze arba patalpa vabzdziams laikyti ir veisti', 'insektariumas'),
(4205, 'Parase romana \"askanijas\"', 'diuma'),
(4206, 'Zemes matas lenkijoje lygus mazdaug 0,56 ha', 'margas'),
(4207, 'Vinis pusapvale auksuota arba sidabruota, kartais ornamentuota galvute', 'bule'),
(4208, 'Augalu kenkejas', 'amaras'),
(4209, 'Hidrogeologinio zemelapio arba pjuvio linija, jungianti vandeninguju horizontu taskus su vienoda vandens temperatura', 'hidroizoterma'),
(4210, 'Panasus i fortepijona', 'rojalis'),
(4211, 'Istorine sritis graikijoje, pusiasalyje tarp egejo juros salono ir petaliono ilanku', 'atika'),
(4212, 'Lietuviu kompozitorius, dirigentas, simfonines poemos \"nemunas\", operos, kantatu, dainu kurejas', 'simkus'),
(4213, 'Senoves egiptieciu mitinis paukstis, turejas galia karta per 500 metu lizde sudegti ir vel is pelenu atgimti', 'feniksas'),
(4214, 'Senoves slavu vandens deive (undine)', 'beregine'),
(4215, 'Senas lietuviskas zodis, reiskiantis pirkli; kilo is  visbio miesto pavadinimo', 'vaizbunas'),
(4216, 'Svente, per kuria dazomi kiausiniai', 'velykos'),
(4217, 'Nobelio fizikos premijos laureatas 1901m., apdovanotas uz atradima spinduliu, veliau pavadintu jo vardu', 'rentgenas'),
(4218, 'Teksto skirstymo skirtukais taisykles', 'skyryba'),
(4219, 'Keraminis stiklas, turintis labai maza temperaturini pletimosi koeficienta, naudojamas teleskopu veidrodziu ir kitos optikos gamybai', 'cervitas'),
(4220, 'Naudingas daiktas ar paslauga, skirta mainams rinkoje', 'preke'),
(4221, 'Vieta prie lubu', 'palube'),
(4222, 'Kinematografijos kurinys', 'filmas'),
(4223, 'Bolivijos administracinis teritorinis vienetas', 'departamentas'),
(4224, 'Kas yra v.i.p (angl.)', 'very important person'),
(4225, 'Raidziu sukeitimas vietomis zodyje kitam zodziui sudaryti', 'anagrama'),
(4226, 'Zvaigzde, sesta pagal nuotoli nuo zemes: ..21185', 'lalando'),
(4227, 'Mauritanijos smulkus pinigas', 'humas'),
(4228, 'Romenu derlingumo dievas, veliau tapatintas su graiku dionisu', 'liberis'),
(4229, 'Turtingas mokslo ir meno globejas, dali savo turto skiriantis jiems remti', 'mecenatas'),
(4230, 'Miestu projektavimas', 'urbanistika'),
(4231, 'Garu, vaistu ikvepimas', 'inhaliacija'),
(4232, 'Ratas su grioveliu, per kuri permetama virve, tam, kad palengvinti daikto kelima ar leidimasi', 'skridinys'),
(4233, 'Koks yra angliskas zenklo \"&\" pavadinimas', 'ampersand'),
(4234, 'Sveiko augalo busena', 'turgoras'),
(4235, 'Pludri, aptaki lenta, kuria sportininkas slysta nuo statejancios bangos priekinio slaito pakranteje', 'banglente'),
(4236, 'Karo grobis', 'trofejus'),
(4237, 'Kokoso riesutu branduolys, is jo spaudziamas aliejus', 'kopra'),
(4238, 'Laisvos sandaros lyrinis instrumentinis kurinys, atsirades romantizmo laikotarpyje', 'legenda'),
(4239, 'Suprantantis, mokantis', 'nusimanantis'),
(4240, 'Sagos drauge', 'kilpa'),
(4241, 'Mes, ..., jie, jos', 'jus'),
(4242, 'Kaip velyku sala vadina vietos gyventojai', 'rapanuju'),
(4243, 'Taip vadinosi pirmoji telegrafu agentura', 'roiter'),
(4244, 'Masine rusijos kulturos ir svietimo darbuotoju organizacija, veikusi 1917-1932 mir propagavusi pramones proletariato kultura ir mena', 'proletkultas'),
(4245, 'Dvieju zmoniu grupe', 'diada'),
(4246, 'Organinis junginys c5h5n5, purino heterocikline baze, nukleino rugsciu komponentas, jo yra mesoje, piene, kiausiniuose, mielese', 'adeninas'),
(4247, 'Kelintais metais kompanija claas pagamino pirmaji javu nuemimo kombaina europoje', '1936'),
(4248, 'Prietaisai, skirti istaisyti regejimo ydoms', 'akiniai'),
(4249, 'Liguistas bjaurejimasis vedybomis', 'mizogamija'),
(4250, 'Jav lietuviu poetas ..niliunas', 'nyka'),
(4251, 'Fundamentaliuju daleliu grupe, sudaranti elementariasias daleles hadronus (nuklonus, hiperonus, pionus ir tauonus)', 'kvarkai'),
(4252, 'Ji matuojama omais', 'varza'),
(4253, 'Sportinis zaidimas - figuru ir pestininku kilnojimas i kvadratus padalintoje lentoje', 'sachmatai'),
(4254, 'Prancuzas, 1883 metais sukures generatoriu', 'piksi'),
(4255, 'Koks menuo japonu menulio kalendoriuje buvo vadinamas kaminadzuki - menesiu be dievu', 'spalis'),
(4256, 'Kiek danija turi jai priklausanciu salu', '406'),
(4257, 'Islame kelione i meka', 'chadzas'),
(4258, 'Atviras arba dengtas dirbtinis vandens telkinys, dekoratyviniams sporto, technikos arba kitoms reikmems', 'baseinas'),
(4259, 'Greicio matavimo vienetas juroje, lygus 1 jurmylei per valanda', 'mazgas'),
(4260, 'Pirmoji industrine valstybe, ikurusi aplinkosaugos ministerija', 'danija'),
(4261, 'Sporto zurnalistas, pateikiantis kompetentingus aiskinimus, samprotavimus, kritines pastabas apie sporto ivykius tiesiog is ju vietos', 'komentatorius'),
(4262, 'Pauksciu burys, kurio atstovai issiskiria is kitu pirstu \"sutvarkymu\" - du koju pirstai atsukti i prieki, du - atgal', 'geniniai'),
(4263, 'Senoves graiku mitologijoje - pradine beribe erdve ar praraja, is kurios atsiradusi zeme, meile, migla ir naktisperkeltine prasme - netvarka, painiava, suirute', 'chaosas'),
(4264, 'Meksikos indenu tauta, xv asukurusi valstybe, xvi auzkariauta ispanu', 'actekai'),
(4265, 'Kaip vadinama pagrindine vyskupijos baznycia', 'katedra'),
(4266, 'Gricio filmas \"lok, ..arba sauk\"', 'stauk'),
(4267, 'Jav prezidentas atsistatydines is savo posto', 'niksonas'),
(4268, 'Detalus vieno klausimo nagrinejimas', 'ekskursas'),
(4269, 'Armenijos smulkus pinigas', 'lumas'),
(4270, 'Filosofas, propogaves racionalizma, dialoga laike pagrindine mokymo forma', 'sokratas'),
(4271, 'Pailga juros ilanka neaukstais vingiuotais krantais', 'limanas'),
(4272, 'Trumpa kalba, pasakyta nepasirengus', 'ekspromtas'),
(4273, 'Kataliku baznycios bausme', 'suspensa'),
(4274, 'Gelezies lydinys su anglimi ir kitais elementais', 'plienas'),
(4275, 'Tautu grupe', 'ugrai'),
(4276, 'Isijautimas i kito asmens emocine busena', 'empatija'),
(4277, 'Jakobinu vadovas didziojoje prancuzu revoliucijoje', 'robespjeras'),
(4278, 'Viena pagrindiniu kurybinio proceso prielaidu - psichine busena, kuriai budingas samones aktyvumas, emocinis pakilumas', 'ikvepimas'),
(4279, 'Valstybe tarp nigerijos ir alzyro', 'nigeris'),
(4280, 'Barometra isrades galilejaus mokinys', 'toricelis'),
(4281, 'Trecia pagal dydi jura pasaulyje', 'vidurzemio'),
(4282, 'Kariaujancios salies praktika uzgrobti ir panaudoti neutralios salies nuosavybe veliau kompensuojant', 'angarija'),
(4283, 'Aplinka, kurioje drusku koncentracija lasteleje ir aplinkoje sutampa', 'izotonine'),
(4284, 'Sala zarasu miesto zaraso ezero saloje [vnsvard]', 'draugyste'),
(4285, 'Valstybe savo valdomu uzjurio koloniju avzvilgiu', 'metropolija'),
(4286, 'Liga, kai kraujyje vario norma padideja net 20 kartu, o apie akies rainele atsiranda varines spalvos ziedas', 'vilsono'),
(4287, 'Vertikaliu stulpeliu uztvara, apsauganti balkonu, laiptiniu, terasu, stogu, krantiniu, tiltu ir ktkrastus', 'baliustrada'),
(4288, 'Cheminis elementas, kurio simbolis \"er\" [numeris 68]', 'erbis'),
(4289, 'Radialiniu liniju ribojamas plotas', 'sektorius'),
(4290, 'Kranklys kitaip', 'varnas'),
(4291, 'Veiksmu, kuriais siekiama kokio nors tikslo, atlikimo eiles tvarka, paprastai is anksto nustatyta teises arba kitu normu', 'procedura'),
(4292, 'Musulmonu mesijas', 'mahdis'),
(4293, 'Gydytojas (o gal talentingas fokusininkas), sugebantis gydyti ir operuoti rankomis, be jokiu papildomu priemoniu', 'hileris'),
(4294, 'Metu laikas, kada svenciamos mykolines', 'ruduo'),
(4295, 'Priebalsiu (dazniausiai r) keitimas priebalsiu l, pvz.: kolidorius : koridorius', 'lambdaizmas'),
(4296, 'Gyvunu mokymas kokiu nors veiksmu karo, cirko, ivtarnybu reikalams', 'dresura'),
(4297, 'Dygliazuviu burio zuvys', 'adatzuves'),
(4298, 'Ruandos rytine kaimyne', 'tanzanija'),
(4299, 'Eskimu krovinine irkline burine atvira valtis, daugiausia naudojama grenlandijoje', 'umijakas'),
(4300, 'Romanu \"skerdykla nr.5\" ir \"cempionu pusryciai\" autorius', 'vonegutas'),
(4301, 'Gramatinis linksnis, neturintis klausimo', 'sauksmininkas'),
(4302, 'Lietuvi? rasytojas parases ???pirmosios vagos???, apysaka ???zmogus lieka zmogum???, romanus ???i stiklo kalna???, ???sodybu tust?jimo metas???, ???degimai ir kt[pavarde]', 'avyzius'),
(4303, 'Kartaginieciu vadas nukeliaves iki romos ir ja uzemes', 'hanibalas'),
(4304, 'Didysis londono laikrodis dar vadinamas .......(angliskai)', 'big ben'),
(4305, 'Spyruoklinis tiltelis arba spyruokliuojanti lenta atsispirti, atliekant gimnastikos, akrobatikos, vandens sporto suolius', 'tramplinas'),
(4306, 'Idziuves arba balzamuotas zmogaus ar gyvuno lavonas', 'mumija'),
(4307, 'Rumunu ir moldavu liaudies ratelis', 'hora'),
(4308, 'Priespaskutine varzybu dalis, kurios nugaletojai arba nuostatu nurodytas komandu ar sportininku skaicius patenka i baigiamaja varzybu dali - finala', 'pusfinalis'),
(4309, 'Zvejybos megejas', 'zvejys'),
(4310, 'Daugiau nei 25 kraujo baltymu sistema, aktyvuojanti imunines sistemos lasteles, butina normaliai jos veiklai', 'komplementas'),
(4311, 'Pozemine arba pusiau izeminta laidojimo sale', 'kripta'),
(4312, 'Melynas dazu pigmentas is vario rudos', 'azuritas'),
(4313, 'Automobilio gimimo metai [gimdytojai benzas ir daimleris]', '1886'),
(4314, 'Zemes plutos tektonine iduba, kurioje susikloste ar klostosi nuosedos', 'depresija'),
(4315, 'Baigiamoji varzybu dalis', 'finalas'),
(4316, 'Ieskojimas pasleptu daiktu', 'krata'),
(4317, 'Atograzu, tropiku jurine labai plesri zuvis, pavojinga kaip ryklys, savo isvaizda primenanti lydeka', 'barakuda'),
(4318, 'Rasytojas, noveliu rinkinio \"dekameronas\" autorius (liet.)', 'bokacas'),
(4319, 'Kuriais metais ikurtas jav elektrotechnikos pramones koncernas \"general electric\"', '1892'),
(4320, 'Didysis kombinatorius, rasytoju iilfos ir jpetrovo romano \"dvylika kedziu\" pagrindinis veikejas: ostapas ...', 'benderis'),
(4321, 'Sala, kurioje anksciausiai europoje buvo pradetos gristi gatves', 'kreta'),
(4322, 'Horizontali pagrindine sija, kuri remiasi i kolonas ir laiko virsutine statinio dali', 'architravas'),
(4323, 'Skaicius, rasomas 1 su 36 nuliais', 'sekstilijonas'),
(4324, 'Etnine grupe, kuri sudaro belgu dauguma', 'flamandai'),
(4325, 'Trajektorija, kuria erdveje skrieja gamtinis kosminis kunas arba dirbtinis kosminis aparatas aplink kita kosmini kuna, veikiamas gravitacijos jegos', 'orbita'),
(4326, 'Lietuviu dailininkas-scenografas, zymiausi kuriniai operu dzverdzio \"traviata\", dzpucinio \"madam baterfly\", dzverdzio \"aida\" scenovaizdziai', 'truikys'),
(4327, 'Kada \"gime\" termometras', '1592'),
(4328, 'Jaunas marinuotas agurkas', 'kornisonas'),
(4329, 'Kaip vadinamas zaidimas japonijoje vienodai skambanciais, bet skirtinga reiksme turinciais zodziais', 'kakekotoba'),
(4330, 'Danijos taikos palaikymo batalionas', 'zaideju_pagrindine_informacija_4hj7sd4vostaze'),
(4331, 'Vokieciu muzikos grupes atb lyderio pavarde [orig.]', 'tanneberger'),
(4332, 'Muzikos instrumentas, kurio pavadinimas isverstas is italu kalbos reiskia: tyliai-garsiai [liet]', 'fortepijonas'),
(4333, 'Romenu auksine moneta, gana nemazos vertes', 'solidas'),
(4334, 'Mazoji epine forma, glausto pasakojimo laiko ir nedideles erdves kurinys, telkiantis demesi i viena ivyki su nedaugeliu veikeju', 'apsakymas'),
(4335, 'Arkties tautu sunu kinkinio varovas', 'kajuras'),
(4336, 'Medziaga, kuria tirpiname', 'tirpinys'),
(4337, 'Zydu nacionaline idiologija, judejimas, politika', 'sionizmas'),
(4338, 'Eiliuoto teksto sesiu pedu eilute', 'hegzametras'),
(4339, 'Rigvedos epochos indijos ariju svarbiausias dievas, valdes audras ir atmosfera', 'indra'),
(4340, 'Komediografas, komediju \"plutas\", \"varles\" autorius', 'aristofanas'),
(4341, 'Ilgiausiai gyvenusio arklio vardas', 'marengas'),
(4342, 'Dramos veikalo pastatymas scenoje', 'rezisura'),
(4343, 'Vokieciu inzinierius, lektuvu konstruktorius, isrades turboreaktyvini varikli [orig.]', 'heinkel'),
(4344, 'Gydymas ir grudinimas oru', 'aeroterapija'),
(4345, 'Antras pagal dydi austrijos miestas', 'gracas'),
(4346, 'Stipresnis vieno skiemens tarimas zodyje', 'kirtis'),
(4347, 'Labai vertinga gyvates pavidalo zuvis', 'ungurys'),
(4348, 'Stuburiniu ir kai kuriu bestuburiu pagrindine arterija', 'aorta'),
(4349, 'Mokslas tiriantis erkes', 'akarologija'),
(4350, 'Notariskai patvirtinta dokumento kopija', 'nuorasas'),
(4351, 'Didelis peizazo ar batalinio zanro paveikslas ant apskritos sales sienu, keliantis gilios, perspektyvines erdves iliuzija', 'panorama'),
(4352, 'Kineskopu gamykla lietuvoje', 'ekranas'),
(4353, 'Vaiku liga, kuriai budinga kaulu deformacija del medziagu apykaitos sutrikimu', 'rachitas'),
(4354, 'Wnba komanda is jutos', 'starzz'),
(4355, 'Labiausiai i vakarus nutoles europos kysulys', 'dzeta'),
(4356, 'Danijos nacionalinis medis, minimas ir salies himne', 'bukas'),
(4357, 'Imoniu susivienijimas, vyraujant vienam kapitalistui arba nedidelei kapitalistu grupei', 'koncernas'),
(4358, 'Dviratininkas ..umaras', 'gintautas'),
(4359, 'Leidziama norma', 'riba'),
(4360, 'Lauzytai vingiuota linija', 'kripe'),
(4361, 'Sventas dievo poseidono gyvulys', 'arklys'),
(4362, 'Virpesiu kontura sudaro kondensatorius ir ...', 'rite'),
(4363, 'Chromosomu skaiciaus lytinese lastelese sumazejimas: is kiekvienos homologiniu chromosomu poros lieka tik po viena chromosoma', 'haploidija'),
(4364, 'Metas pavasari ir rudeni kai katinai keistai elgiasi', 'ruja'),
(4365, 'Zukles irankis su rite ir blizge plesriom zuvim gaudyti', 'spiningas'),
(4366, 'Kiek metu trunka meile (pagal fbeigbeder knygos pavadinima)', 'trejus'),
(4367, 'Vienas zymaiusiu visu laiku skulptoriu ?', 'rodenas'),
(4368, 'Turku sultonu rumai su haremu', 'seralis'),
(4369, 'Vienalyte sistemos dalis, apribota nuo kitu daliu skyrimo pavirsiumi, uz kurio lydinio savybes keiciasi suoliskai', 'faze'),
(4370, 'Zodis ar posakis, vartojamas pakaitalui siurksciam, vulgariam posakiui ar zodziui', 'eufemizmas'),
(4371, 'Istraukiamasis ventiliatorius', 'ekshausteris'),
(4372, 'Moteriskos lyties dievybe', 'deive'),
(4373, 'Skliauto briauna', 'nerviura'),
(4374, 'Dirbiniai is molio', 'keramika'),
(4375, 'Graiku tapytojasaleksandro makedoniecio rumu dailininkas', 'apelis'),
(4376, 'Sprogstamosios medziagos', 'eksplozyvai'),
(4377, 'Neturintis darbo', 'bedarbis'),
(4378, 'Apytiksliai kiek metu gali gyventi dramblinis vezlys', '150'),
(4379, '10-15 kg lotamerikoje', 'aroba'),
(4380, 'Kaip vadinami grigaliaus kalendoriaus metai, turintys 366 dienas', 'keliamieji metai'),
(4381, 'Kada bachreinas tapo arabu lygos nariu', '1971'),
(4382, 'Maziausias virsutinis aibes rezis', 'supremumas'),
(4383, 'Tulpiniu gaujos narys, itariamas mazeikiu naftos savininko pagrobimu', 'vertelka'),
(4384, 'Pabaiga arba ...', 'galas'),
(4385, 'Kas atnasaujama, aukojama dievui', 'auka'),
(4386, 'Dzeuso ir demetros dukte, zemes deive', 'persefone'),
(4387, 'Ivairiose religijose - dvasine butybe, uzimanti tarpine padeti tarp dievo ir zmogaus, paprastai veikianti zmogaus nenaudai', 'demonas'),
(4388, 'Persejo alfa, arabu vadinta \"setono zvaigzde\"', 'algolis'),
(4389, 'Sustojimo zenklas', 'stop'),
(4390, 'Valstybiu ar organizaciju atstovu susirinkimas, pasitarimas', 'konferencija'),
(4391, 'Biologinis procesas, kai islieka prie kintancios aplinkos geriau prisitaike organizmai', 'atranka'),
(4392, 'Irankis kam grusti', 'grustuve'),
(4393, 'Kaip kitaip vadinamas sportinis zaidimas akluju riedulys', 'golbolas'),
(4394, 'Igimtas organo buvimas neiprastoje vietoje', 'ektopija'),
(4395, 'Italijos piniginio vieneto simtoji dalis', 'centas'),
(4396, 'Lektuvo marsrutas i viena puse', 'reisas'),
(4397, 'Trojos karo graiku karzygis, zaideju_pagrindine_informacija_4hj7sd4vro \"iliados\" personazas, jo kune buvo tik viena suzeidziama vieta - kulnas', 'achilas'),
(4398, 'Prietaisas saules, zemes ir menulio judejimui demonstruoti', 'teluris'),
(4399, 'Reprezentacine vidurio rytu miestu aikste', 'registanas'),
(4400, 'Mokslas apie monetas', 'numizmatika'),
(4401, 'Estijos nepriklausomybes diena', 'vasario 24'),
(4402, 'Lakunas, kuris 1937mturejo priverstinai nutupti, o nutupimo vietoje surado auksciausia pasaulio kriokli, veliau pavadinta jo garbei', 'anchelis'),
(4403, 'Suruges pienas pagardintas kokiomis nors sultimis', 'jogurtas'),
(4404, 'Upes suskilimas i dvi nebesusijungiancias sakas', 'bifurkacija'),
(4405, 'Briliantas, brangakmenis, perlas be defektu', 'parangonas'),
(4406, 'Dinamito isradejas', 'nobelis'),
(4407, '1922m zemes reformos tevas', 'krupavicius'),
(4408, 'Zvaigzdynas, kuriame lapkricio 23 - gruodzio 22 dbuna saule (vardininkas)', 'saulys'),
(4409, 'Dzpucinio opera \"..baterflai\"', 'madam'),
(4410, 'Neivykdomas, neigyvendinamas', 'utopinis'),
(4411, 'Tapybos kurinio (detales, kompozicijos dalies) pataisa, padaryta tapymo metu ir isryskejusi laikui begant del dazu sluoksnio cheminiu pokyciu', 'pentimentas'),
(4412, 'Didelis pusiasalis azijoje, kuriame yra beveik puse indijos dalies', 'indostano'),
(4413, '9-a ilgiausia lietuvos upe', 'nemunelis'),
(4414, 'Anglu mokslininkas, atrades lasteles', 'hukas'),
(4415, 'Tam tikros formos uolienos pavyzdys (bandinys), paimtas nesuardant jo gamtines strukturos', 'monolitas'),
(4416, 'Grafiskas sirdies judesiu vaizdas', 'kardiograma'),
(4417, 'Masinos arba statinio itaisas smugio poveikiui susilpninti', 'amortizatorius'),
(4418, 'Koks paukstis japonijoje laikomas ilgaamzystes simboliu', 'gerve'),
(4419, 'Vestgotu karalius, kurio vadovaujami pulkai 410 mnusiaube roma', 'alarikas'),
(4420, 'Rukalai is smulkiai supjaustyto tabako, ivynioto i plona popieriu', 'cigarete'),
(4421, 'Lietuvos valstybes veikejas, 1940 06 15 - 1940 06 17 asmetonai isvykus is lietuvos, ejas prezidento pareigas', 'merkys'),
(4422, 'Psichologijoje berniuku noras nuzudyti teva ir miegoti su motina: ..kompleksas', 'edipo'),
(4423, 'Salis, kurios valiutos sutrumpinimas isk', 'islanija'),
(4424, 'Romanu \"paskutinis mauro atodusis\", \"vidurnakcio vaikai\", \"setoniskos eiles\" autorius [orig.]', 'rushdie'),
(4425, 'Darbu vykdytojas', 'rangovas'),
(4426, 'Atvirkscias veiksmas diferencialui', 'integralas'),
(4427, 'Atograzu ciklonas, sukeliantis labai smarkia audra', 'uraganas'),
(4428, 'Antikos laikais ir viduramziais uzrasas ant paminklo, sventyklos ar kito statinio sienos', 'epigrafas'),
(4429, 'Zmogus, is prigimties su ydomis', 'apsigimelis'),
(4430, 'Produkto surinkimas keliais etapais naudojant darbo jega', 'gamybos linija'),
(4431, 'Senskandinavu mitologijoje - ziojejusi praraja, is kurios atsirades pasaulis', 'ginungagapas'),
(4432, 'Antrasis pagal dydi neptuno palydovas, pavadintas senoves graiku juru dievo, okeano ir tetijos sunaus, vardu', 'protejas'),
(4433, 'Kardiochirurgas, vadovaves pirmajai sirdies persodinimo operacijai lietuvoje', 'marcinkevicius'),
(4434, 'Antrasis rusijos prezidentas', 'putinas'),
(4435, 'Blynas lietuviskiau', 'sklindis'),
(4436, 'Kas pasake: istorija yra gyvenimo mokytoja', 'ciceronas'),
(4437, 'Valstybes valdymo forma: visi auksciausieji vasltybes valdymo organai arba tiesiogiai renkami arba sudaromi is atsovaujanciu organu', 'respublika'),
(4438, 'Nepiktybinis raumeninio audinio navikas', 'mioma'),
(4439, 'Valstybines sienos pazenklinimas specialiais zenklais', 'demarkacija'),
(4440, 'Ant medines uolos juodi krumai zeliakas', 'sepetys'),
(4441, 'Dagtinis sautuvas, israstas xiv amziuje; vienas pirmuju rankiniu saunamuju ginklu', 'arkebuza'),
(4442, 'Labiausiai paplites, nesudetingas vokalinis zanras, kuriame jungiama poetinis ir muzikinis vaizdas', 'daina'),
(4443, 'Cukru molekules gali jungtis tarpusavyje ir sudaryti didesnes molekules ar ilgas polimeru grandines, vadinamas ..?', 'polisacharidais'),
(4444, 'Ekvadoro administracinis vienetas', 'provincija'),
(4445, 'Daikto verte pinigais', 'kaina'),
(4446, 'Visuomenine politine organizacija ar susivienijimas ispanijoje ir lotynu amerikos salyse, kur kalbama ispaniskai', 'chunta'),
(4447, 'Senoves romos kilmingas pilietis, globojes nuo jo priklausomus neturtingus laisvuosius piliecius', 'patronas'),
(4448, 'Posakis, reiskiantis dirbtini, bereikalinga bandyma isprausti ka i remus', 'prokrusto lova'),
(4449, 'Komedijos muza', 'talija'),
(4450, 'Vyriausybes ir pilieciu konflikto forma, kai pilieciai protestuoja pries visa vyriausybes politika', 'pilietinis karas'),
(4451, 'Tradicnis lietuviu gerimas', 'midus'),
(4452, 'Kelias sekundes jojikas turi issikaikyti ant buliaus ar nepabalnoto mustango per rodeo varzybas', '8'),
(4453, 'Konjako \"brolis\", kiles is \"armagnac\" regiono', 'armanjakas'),
(4454, 'Miestas jav, nevados valstijos vakaruose; xx apagarsejo kaip skyrybu rojus', 'reno'),
(4455, 'Kokia medziaga kraujyje reguliuoja insulino sekrecija kasos langerhanso salelese', 'gliukoze'),
(4456, 'Miestas prancuzijoje kur isikures peugeot muziejus [orig.]', 'sochaux'),
(4457, 'Apatine pastato, atramos, skulpturos dalis', 'cokolis'),
(4458, 'Franku karo ginklas: trumpas tiesus, vienasmenis kalavijas', 'skramasaksas'),
(4459, 'Lytinis isktrypimas - potraukis lavonams', 'nekrofilija'),
(4460, 'Lotyniskos kilmes vardas, reiskiantis \"viespaties\" (gimes viespaties diena)', 'domas'),
(4461, 'Didele juros dugno sekluma', 'banka'),
(4462, 'Kokios valstybes (vnskilm.) domeno vardas yra \".fi\"', 'suomijos'),
(4463, 'Romenu komediografas, parases \"dvyniai\", \"karys pagyrunas\" ir t.t.', 'plautas'),
(4464, 'Deze gyvuliams serti', 'lovys'),
(4465, 'Stiliaus figura, paremta iprastinemis zodziu tvarkos sakinyje keitimu', 'inversija'),
(4466, 'Motociklininko kepure', 'salmas'),
(4467, '\"slapia\" radiostotis', 'lietus'),
(4468, 'Istaiga, kurios pagrindine veikla - teikti formaliojo ugdymo, mokymo, studiju arba neformaliojo svietimo paslaugas', 'mokykla'),
(4469, 'Gele, dvasios jaunystes simbolis', 'tulpe'),
(4470, 'Virsutinis moteru ir vyru drabuzis, devimas indonezijos tautu', 'sarongas'),
(4471, 'Broliai prancuzai, kinematografijos isradejai, pirmuju filmu kurejai', 'liumjerai'),
(4472, 'Apytiksliai kiek procentu visu gyvunu yra bestuburiai', '90'),
(4473, 'Teritorija, kuria gavo rusija is svedijos po siaures karo', 'livonija'),
(4474, 'Lietuviu lauko dievas, kuriam meldziamasi einant arti bei seti', 'laukpatis'),
(4475, 'Tik ..zmogus gali pazinti save [j.v.gete]', 'zmonese'),
(4476, 'Stambus sprogstamosios medziagos uztaisas gyvajai jegai ir technikai naikinti', 'fugasas'),
(4477, 'Gramatikos dalis, nagrinejanti zodziu junginius sakinyje ir sakinius', 'sintakse'),
(4478, 'Maziausiai dienu turintis menuo', 'vasaris'),
(4479, 'Miestas, kuriame yra garsieji tivoli sodai', 'kopenhaga'),
(4480, 'Romenu dievai, namu ir seimos globejai', 'larai'),
(4481, 'Lengvosios atletikos rungtis - dirbtinis soksnio, suoliazingsnio ir suolio junginys, atliekamas isibegejus kaip vientisas veiksmas', 'trisuolis'),
(4482, 'Is kokio medzio pagal skandinavu mitologija dievai sukure pirmaji vyra aska', 'uosio'),
(4483, 'Seniai visiems zinomas dalykas, kieno nors dar laikomas paslaptimi', 'polisinelio paslaptis'),
(4484, 'Kiek vidutiniskai procentu anglies yra sausoje augalineje medziagoje', '45'),
(4485, 'Liaudies tikejimuose- moterys, turincios rysiu su antgamtinemis blogio jegomis, demonais', 'raganos'),
(4486, 'Chemijoje - kaitrai atspari medziaga', 'dinasas'),
(4487, 'Stiklinis indas alui gerti', 'bokalas'),
(4488, 'Kelio dalis, skirta vaziuoti transporto priemonemis', 'vaziuojamoji'),
(4489, 'Stiliaus figura; numanomu zodziu praleidimas', 'elipse'),
(4490, 'Zemes atmosferos sluoksnis, esantis tarp 50 ir 85 km aukscio, tarp stratosferos ir termosferos', 'mezosfera'),
(4491, 'Kalnas jav, pietu dakotos valstijoje, ant kurio iskaltas nacionalinis monumentas - jav prezidentu dvasingtono, tdzefersono, alinkolno ir truzvelto galvu atvaizdai', 'rasmoras'),
(4492, 'Narkotikas, 1897 mgimes vaistu kompanijos \"bayer\" laboratorijoje', 'heroinas'),
(4493, 'Vienos tieses ar plokstumos posvyrio dydis kitos tieses ar plokstumos atzvilgiu', 'nuolydis'),
(4494, 'Kokiam garsiam rasytojui parfumeris pjeras fransua paskalis gerlenas sukure tualetini vandeni', 'balzakui'),
(4495, 'Europos istorine sritis, kurioje dabar yra siaures italija, prancuzija, liuksemburgas, belgija, dalis olandijos ir sveicarijos', 'galija'),
(4496, '2 vedybinio gyvenimo metu sukaktis: ..vestuves', 'popierines'),
(4497, 'Kas pirmasis pasaulyje uzrase zmogaus elektrokardiograma', 'seferis'),
(4498, 'Jono pauliaus ii motinos tautybe', 'lietuve'),
(4499, 'Arkliu traukos transporto priemoniu grupe, naudota kariuomeneje atsargu ir ivairiu kroviniu gabenimui', 'gurguole'),
(4500, 'Kuriais metais kapitonas dzeimsas kukas atrado kaledu sala', '1777'),
(4501, 'Cheminis elementas, kurio simbolis \"ni\" [numeris 28]', 'nikelis'),
(4502, 'Feodalineje anglijoje - ginklanesys', 'eskvairas'),
(4503, 'Paveldima letine raumenu ir nervu sistemos liga', 'miopatija'),
(4504, 'Vandenynas, skalaujantis velyku salos krantus', 'ramusis'),
(4505, 'Senoves graikijoje ir romoje - zenklas, kuris buvo isbadomas arba isdeginamas belaisviu ir nusikalteliu kune', 'stigma'),
(4506, 'Sportiniu varzybu dalyviu grupe', 'ekipa'),
(4507, 'Kelintais metais buvo atrasta urano planeta', '1781'),
(4508, 'Automobiliu gamintojas isleides siuos modelius: ibiza, toledo, cordoba', 'seat'),
(4509, 'Didziausias pasaulyje primatas [sveria iki 275 kg]', 'gorila'),
(4510, 'Filmas su matt damon: \"talentingasis misteris ...\"', 'riplis'),
(4511, 'Teritoriju visuma zemeje, kur galioja vienodas laikas', 'laiko juosta'),
(4512, 'Zodis, kiles is anglu kalbos santrumpos - \"sviesos stiprinimas indukuotuoju spinduliavimu\"', 'lazeris'),
(4513, 'Kaip vadinama taikos sutartis su vokieciu ordinu, kai zemaitija iki nevezio atiduota kryziuociams', 'salyno'),
(4514, 'Kirgizu liaudies epas', 'manasas'),
(4515, 'Pasauline kompanija, teikianti siuntu gabenimo paslaugas', 'dhl'),
(4516, 'Mokslas, tiriantis organizmu santykius su gyvenamaja aplinka, gyvosios ir negyvosios gamtos saveika', 'ekologija'),
(4517, 'Populiari lietuvoje batu parduotuve ir salies pavadinimas', 'danija'),
(4518, 'Grubletas fakturinio pavirsiaus vilnonis, pusvilnonis arba cheminio pluosto audinys, kurio gerojoje puseje matosi mazguoti arba kilpuoti siulai', 'bukle'),
(4519, 'Tampraus kuno deformacija yra proporcinga ji veikianciai jegai, koks tai desnis', 'huko'),
(4520, 'Pasventinta teritorija aplink baznycia', 'sventorius'),
(4521, 'Koks naminis gyvunas yra svroko atributas', 'suo'),
(4522, 'Kiek tasku gaunama angliskajame biliarde, imusus rudos spalvos rutuli', '4'),
(4523, 'Automobiliu gamintojas isleides siuos modelius: orion, sierra, scorpio', 'ford'),
(4524, 'Popieziaus aplinkrastis doktrinos, kulto ir organizaciniais klausimaispaprastai rasoma lotynu kalba, vadinama pirmaisiais teksto zodziais', 'enciklika'),
(4525, 'Kuriais metais sukonstruotas apple ii - pirmasis personalinis kompiuteris, turintis plastmasini korpusa ir spalvota grafika', '1977'),
(4526, 'Cheminis preparatas skirtas lapu salinimui', 'defoliantas'),
(4527, 'Kuriais metais pradejo veikti pirmasis slidininku keltuvas', '1900'),
(4528, 'Antrasis zmogus, issilaipines menulyje', 'oldrinas'),
(4529, 'Nuo juros atskirta sekli ilanka', 'laguna'),
(4530, 'Helio atomo branduoliai, susidedantys is dvieju protonu ir dvieju neutronu', 'alfa daleles'),
(4531, 'Legendinis f-1 lenktynininkas, zinomas \"proffesor of the track\" pravarde [orig.]', 'prost'),
(4532, 'Firma, neseniai atsisakiusi mobiliu telefonu gamybos', 'ericsson'),
(4533, 'Judamas, judrus', 'mobilus'),
(4534, 'Objekto apibudinimas jo iprastinei sampratai priestaraujanciais zodziais', 'oksimoronas'),
(4535, 'Premija, kasmet nuo 1967 mskiriama jungtinese valstijose uz geriausia mokslines fantastikos romana', 'hugo'),
(4536, 'Kiekybinis turio analizes metodas rugstims tirpaluose nustatyti', 'acidimetrija'),
(4537, 'Kokiame aukstyje buvo pakiles oro balionas, is kurio 1797 mparyziuje andre zakas garnerinas pirma kart sekmingai issoko parasiutu', '680'),
(4538, 'Augalu vaisiu, seklu, sporu plitimas vandeniu', 'hidrochorija'),
(4539, 'Paskutinis nba klubas, kuriame zaide smarciulionis [angl.]', 'nuggets'),
(4540, 'Mokslas, tiriantis tikrinius vardus', 'onomastika'),
(4541, 'Kovotoja uz indenu teises, 1992mgavusi nobelio taikos premija', 'mensu'),
(4542, 'Dvigubos jungties atmintines modulis', 'dimm'),
(4543, 'Paprasciausias alkenas', 'etenas'),
(4544, 'Vegetarai nevalgo ...', 'mesos'),
(4545, 'Lietuviskas vakaru vejo pavadinimas, kitaip vakarinis, jurinis', 'marinis'),
(4546, 'Vienas svarbiausiu terminu i.kanto filosofijoje: kategorinis ...', 'imperatyvas'),
(4547, 'Fasizmo ikurejas', 'musolinis'),
(4548, 'Epiteliniu lasteliu specialus dariniai atliekantys tam tikras funkcijas', 'blakstieneles'),
(4549, 'Vokietijos generolas feldmarsalas (1940m.)1945mpasirase vokietijos besalygines kapituliacijos akta', 'keitelis'),
(4550, 'Moteris is smalsumo, nepaisydama draudimu, atvozusi inda, kuriame buvo zmoniu nelaimes ir jas isleidusi', 'pandora'),
(4551, 'Tropinis ciklonas, susidarantis ramiojo vandenyno siaures vakaruose', 'taifunas'),
(4552, 'Toronto ledo ritulio klubo \"maple leafs\" spalvos yra: ..ir balta', 'melyna'),
(4553, 'Filmas su julia roberts: \"pabegusi ...\"', 'nuotaka'),
(4554, 'Visybine asmenybes parengtis iprastai reaguoti i aplinkos poveikius', 'nuostata'),
(4555, 'Plikimas mediciniskai', 'alopecija'),
(4556, 'Kada susidegino rkalanta', '1972'),
(4557, 'Populiariausias alkoholinis gerimas lotynu amerikoje', 'romas'),
(4558, 'Savizudybe arba ...', 'suicidas'),
(4559, 'Nekaitoma kalbos dalis, kuri tiesiogiai reiskia ivairius jausmus', 'jaustukas'),
(4560, 'Moldavijos sostine', 'kisiniovas'),
(4561, 'Viesas veikalo klausymas', 'perklausa'),
(4562, 'Gruzinu kilmes rusijos generolas, mirtinai suzeistas borodino musyje', 'bagrationas'),
(4563, 'Vitamino b1 cheminis pavadinimas', 'tiaminas'),
(4564, '4-a ilgiausia lietuvos upe', 'sesupe'),
(4565, 'Anglu chemikas, irodes, kad kiekvieno cheminio elemento atomai yra vienodi taciau vieni nuo kitu skiriasi mase', 'daltonas'),
(4566, 'Kokia salis uzaugina daugiausia apelsinu pasaulyje', 'ispanija'),
(4567, '3 pagal dydi japonijos miestas, populiacija 2.5 mln(1998mduom.)', 'osaka'),
(4568, 'Raudonai geltoni dazai, gaunami is lavsonijos krumu', 'chna'),
(4569, 'Valstybe saloje, kurios auksciausia virsune yra viktorijos kalnas', 'fidzis'),
(4570, 'Lietuvos respublikos ministras pirmininkas 1924.06.18-1925.01.27', 'tumenas'),
(4571, 'Nedideli senoves graiku bendruomeniu padaliniai [dgs.]', 'files'),
(4572, 'Vyro apyvarpes atsismaukimas ir uzsiverzimas uz varpos galvos', 'parafimoze'),
(4573, 'Sengraiku ir veju dievas ir valdovas', 'eolas'),
(4574, 'Prie ladogos ezero esantis kitas ezeras', 'onega'),
(4575, 'Neoficialiu sandoriu makleris', 'kulisje'),
(4576, 'Kas parase \"idejos zmonijos istorijos filosofijai\"', 'herderis'),
(4577, 'Trumpa, berankove, ispanu tautinio kostiumo dalis', 'bolero'),
(4578, 'Sundaktaryste - primityvus gydymas, dazniausiai susijes su ivairiais ritualais', 'medikasterija'),
(4579, 'Biblinis zydu patriarchas', 'abraomas'),
(4580, 'Kalva, susidariusi is senoviniu statiniu liekanu', 'tele'),
(4581, 'Pergamo vergu ir varguomenes sukilimo (~133-129 mprkr.) pries romenus vergvaldzius vadas', 'aristonikas'),
(4582, 'Finikieciu augalijos ir derlingumo dievas veliau garbintas ir graiku, mirstancios ir atgyjancios gamtos simbolis', 'adonis'),
(4583, 'Kiskis bijo vilko, o zuikis ...', 'kontrolieriaus'),
(4584, 'Sengraiku amzinos jaunystes deive', 'hebe'),
(4585, 'Modernaus sokio pradininke lietuvoje', 'daujotaite'),
(4586, 'Rasytojas, romanu \"kaimieciai\", \"pazadetoji zeme\", \"komediante\", \"fermentai\", \"lili\", \"svajotojas\" autorius (liet.)', 'reimontas'),
(4587, 'Namu apyvokos darbai', 'ruosa'),
(4588, 'Lietuvos komunistu partijos vadovas iki 1974 m.', 'snieckus'),
(4589, 'Tam tikras galvosukis, kai grafiniais simboliais, sutartiniais zenklais ir piesiniais uzsifruojamas koks nos zodis, posakis', 'rebusas'),
(4590, 'Zolinis augalas, kurio lapas viduramziais daznai buvo vartojamas kaip svenciausios trejybes simbolis', 'dobilas'),
(4591, '\"atgal\" lotyniskai', 'retro'),
(4592, 'Istatymu leistas, teisetas', 'legalus'),
(4593, 'Kaip vadinamas neskoningas menkavertis meno kurinys', 'kicas'),
(4594, 'Hormonas, kuris reguliuoja kaulu augima', 'somatotropinas'),
(4595, 'Kuriais metais pradeti gaminti skaitmeniniai televizoriai', '1989'),
(4596, 'Pakistano valstybine kalba', 'urdu'),
(4597, 'Indvidualus higieninis dusas', 'bide'),
(4598, 'Dirigento lazdele', 'batuta'),
(4599, 'Atskira turima darbuotojo vieta (su pareigomis ir alga)', 'etatas'),
(4600, 'Kas beldzia, tam ...', 'atidaro'),
(4601, 'Salis, kurios domeno vardas yra \".lv\"', 'latvija'),
(4602, 'Lietuvos miestelis, kuriame yra kalejimas', 'pravieniskes'),
(4603, 'Salis, kurioje gime valgomieji ledai', 'italija'),
(4604, 'Nishos pavidalo kambarelis', 'alkova'),
(4605, 'Buves lietuvos vyriausiasis euroderybininkas', 'austrevicius'),
(4606, 'Lysergic acid diethylamide', 'lsd'),
(4607, 'Miestas plunges rajone, kuriame buvo pastatyta pirmoji lietuvoje elektrine', 'rietavas'),
(4608, 'Drausme - privalomas nustatytos tvarkos laikymasis', 'disciplina'),
(4609, 'Metaline, medine, linoleumo ar kitokios medziagos iskiliaspaudes forma iliustracijoms spausdinti', 'klise'),
(4610, 'Indonezijos pagrindinis pinigas', 'rupija'),
(4611, 'Kosta rikos pagrindinis pinigas', 'kolonas'),
(4612, 'Kmarkso moksline revoliucine proletariato pasauleziura; mokslinio komunizmo teorija ir praktika', 'marksizmas'),
(4613, 'Problemos pateikimo budas', 'formulavimas'),
(4614, 'Nyderlandu dailininkas, nutapes paveikslus \"tinginiu salis\", \"flamandu patarles\", \"ziemos peizazas su medziotojais\"', 'breigelis'),
(4615, 'Melioracijos rusis, kurios tikslas trukstant dregmes dirbtinemis priemonemis (laistymu) sukurti auginamai kulturai palankiausia dirvos dregmes rezima', 'irigacija'),
(4616, 'Vokieciu kompozitorius, pianistas, dirigentas, 10 operu (tarp ju \"laisvojo saulio\"), 2 simfoniju, 3 uvertiuru, kuriniu fortepijonui autorius', 'veberis'),
(4617, 'Medziaga, kuria chemiskai modifikuoja fermentas', 'substratas'),
(4618, 'Senegalo administracinis vienetas', 'regionas'),
(4619, 'Ilgalaikis refleksas', 'tonusinis'),
(4620, 'Sintetiniai stipraus kvapo cheminiai junginiai, naudojami gaminant kvepalus', 'aldehidai'),
(4621, 'Organo, organu sistemos arba viso organizmo veiklos nepakankamumas', 'dekompensacija'),
(4622, 'Kokioje saloje isikures pieciausias pasaulio miestas', 'ugnies zeme'),
(4623, 'Kokiame rajone istoriko tarasenkos nuomone buvo pirmoji lietuvos sostine voruta', 'anyksciu'),
(4624, 'Tapytojo, skulptoriaus, fotografo ar ktdirbtuve', 'atelje'),
(4625, 'Svelnesnis, neutralesnis zodis ar posakis, vartojamas vietoj siurksciu ar nemaloniu', 'eufemizmas'),
(4626, 'Ir suva kariamas ...', 'pripranta'),
(4627, 'Rytu salyse naudotas laivas', 'sebeka');
INSERT INTO `vikte_klsm` (`id`, `klsm`, `ats`) VALUES
(4628, 'Psichikos sutrikimas - isorinis pasaulis suvokiamas ir isgyvenamas kaip nerealus, tarsi svetimas, netikras, tolimas, sustinges ar bespalvis, tarsi sapnas ar filmas', 'derealizacija'),
(4629, 'Pasakojamasis fantastinis kurinys', 'pasaka'),
(4630, 'Nedegantis medis', 'bambukas'),
(4631, '..premija - kasmetinis apdovanojimas uz geriausia romana, parasyta dbritanijos, airijos ir tautu sandraugos saliu autoriu', 'bukerio'),
(4632, '\"oracle\" ikurejas', 'elisonas'),
(4633, 'Istorikas esantis ant 100 litu banknoto', 'daukantas'),
(4634, 'Pagrindinis t limfocitu citotoksinis baltymas', 'perforinas'),
(4635, 'Karshtas popieziaus, ypac jo politines veiklos salininkas', 'papistas'),
(4636, 'Skaitine sistema, nusakanti kosminio objekto padeti dangaus sferoje arba ant kosminio kuno pavirsiaus', 'koordinates'),
(4637, 'Didziausias ledynas europoje ir islandijoje', 'vatnajokiulis'),
(4638, 'Pusis, prie kurios tadui blindai prisiekdavo jo pasekejai', 'dervinu'),
(4639, 'Nuostata nevaizduoti dailes kurinyje gyvunu ir zmoniu', 'anikonizmas'),
(4640, 'Menine priemone, meninis padidinimas', 'hiperbole'),
(4641, 'Kas parase veikala \"vytauto laiku lietuva\"', 'krasevskis'),
(4642, 'Lesu idejimas i uki', 'investicija'),
(4643, 'Gelezinkelio begiu susikirtimas', 'kryzme'),
(4644, 'Nedidele arija (arijete)', 'ariozo'),
(4645, 'Kas parase veikala \"zemaiciu vyskupyste\"', 'valancius'),
(4646, 'Apgaule, pinkles', 'klasta'),
(4647, 'Daryti kieto buvio medziaga skysta [veiksm.]', 'lydyti'),
(4648, 'Bakterija, sukelianti demetaja siltine', 'riketsija'),
(4649, 'Koks buvo pagrindinis vokieciu pestininku ginklas antrojo pasaulinio karo metais', 'mauzeris'),
(4650, 'Kas vadovauja anglikonu baznyciai: jungtines karalystes ...', 'karalius'),
(4651, 'Gagarino vardas', 'jurijus'),
(4652, 'Auksavimo ir sidabravimo technika: tauriojo metalo sluoksnis dengiamas ant pigesnio metalo pagrindo', 'plakiravimas'),
(4653, 'Tapytojas, \"istvirkeles karjera\", \"madingos vedybos\" autorius', 'hogartas'),
(4654, 'Firma, pasiuvusi apranga 2004 metu lietuvos olimpieciams', 'audimas'),
(4655, 'Sklandus tieses perejimas i kreive arba vieno lanko perejimas i kita', 'sujungimas'),
(4656, 'Spygliuotas, zalios spalvos augalas', 'kaktusas'),
(4657, 'Suo, ugniagesiu talismanas', 'dalmatinas'),
(4658, 'Normaliu judesiu stoka, nepakankamumas; aktyviu judesiu nebuvimas', 'akinezija'),
(4659, 'Skulptorius, sukures skulptura \"vargo mokykla\"', 'rimsa'),
(4660, 'Beprasmis zodis kuriam viduramziais buvo priskirama magiska galia ir kuris buvo rasomas amuletuose', 'abrakadabra'),
(4661, 'Xv-xix avengru kareivis', 'haidukas'),
(4662, 'Pirmoji pasaulyje islamo moteris, tapusi ministre pirmininke', 'bhuto'),
(4663, 'Koks vokietijos imperijos kancleris buvo vadinamas \"geleziniu\"', 'bismarkas'),
(4664, 'Filtracinio srauto pernesamu medziagu sklaida, kuri susidaro del skirtingo filtracines terpes poru dydzio ir vandens judejimo jose greicio, neiskaitant molekulines difuzijos', 'hidrodispersija'),
(4665, 'Sasiauris skiriantis australija nuo tasmanijos', 'baso'),
(4666, 'Grieztas reiklus destytojas', 'kirvis'),
(4667, 'Laivyba tarp vienos salies uostu', 'kabotazas'),
(4668, 'Pirmoji moteris lakune, iveikusi garso greicio barjera', 'cochran'),
(4669, 'Kas pirmasis parenge dabartinio tipo enciklopedija', 'didro'),
(4670, 'Krikscioniu releigine sekta, turinti islamo, budizmo, judaizmo elementu', 'mormonai'),
(4671, 'Beliepsnio sprogdinimo budas, pagristas egzotermineje reakcijoje susidariusiu vandens garu, azoto ir anglies dioksido duju energijos naudojimu', 'hidroksas'),
(4672, 'Kokia yra wap (interneto ir mobtelefono sarysis) programavimo kalba', 'wml'),
(4673, 'Lietus su sniegu', 'slapdriba'),
(4674, 'Sirdies veiklos tyrimas uzrasant sirdies raumens biosroves', 'kardiografija'),
(4675, 'Xx apradzioje - bevielio telegrafo atmaina, daugelio saliu kariuomeneje ir prekybos laivyne atstojusi arba papildziusi iprastini telegrafa', 'radiofonija'),
(4676, 'Xix adbritanijoje - airijos nepriklausomybes priesininkai', 'junionistai'),
(4677, 'Pietu amerikos subtropiniu stepiu zona', 'pampa'),
(4678, 'Putojantis alkoholinis gerimas, daromas is salyklo, apyniu, vandens ir kt.', 'alus'),
(4679, 'Kokios salies himnas trumpiausias', 'japonijos'),
(4680, 'Tapytas, grafinis ar skulpturinis prie kryziaus prikalto kristaus atvaizdas', 'epinefrinas'),
(4681, 'Motvardas, kiles is lotkalbos, reiskia \"karaliene\"', 'regina'),
(4682, 'Zymiausias zemaites apsakymas', 'marti'),
(4683, 'Visuomenine santvarka, kurioje auksciausia valdzia turi dvasininkai', 'teokratija'),
(4684, 'Laivo paliekamas pedsakas vandenyje', 'kilvateris'),
(4685, 'Italu fiziologas, pirmasis aptikes elektros srove zuvyse 1791m[liet.]', 'galvanis'),
(4686, 'Nusizengimas taisyklems', 'prazanga'),
(4687, 'Miestas italijos pietuose arba chelementas', 'baris'),
(4688, 'Si sistemoje erdvinio kampo vienetas', 'steradianas'),
(4689, 'Kokia liga nesergama sausumoje', 'juros'),
(4690, 'Kokia maziausia jega reikia slegti siuolaikine priestankine mina, kad sukelti sprogima [kn]', '2'),
(4691, 'Priesingos reiksmes zodziu derinys', 'oksimoronas'),
(4692, 'Kas nuzude abeli', 'kainas'),
(4693, 'Tarptautine atomines energijos agentura', 'tatena'),
(4694, 'Dailes saka - vizualiniai spektaklio vaizdaisvarbiausi elementai: scenos erdve, dekoracijos', 'scenografija'),
(4695, 'Mokslo veikalas, kuriame isamiai nagrinejamas koks nors klausimas, problema', 'traktatas'),
(4696, 'Ebonito arba tankios gumos plokscias ritinys, musamas ritmusa i vartus ledo aiksteleje', 'ritulys'),
(4697, 'Skanestas, delikatesas', 'gardesis'),
(4698, 'Kuno vaizdavimas plokstumoje', 'projekcija'),
(4699, 'Ozku patinas', 'ozys'),
(4700, 'Kvadratine lenta, ant kurios tvirtinamas popierius nubrezti, darant menzuline nuotrauka', 'plansete'),
(4701, 'Terminas, kuriuo prancuzu tapytojas zdiubiufe pavadino atskirtu nuo visuomenes zmoniu (pvz., kaliniu, psichiatrijos ligonines pacientu) kuryba', 'art brut'),
(4702, 'Postimpresionizmo atstovas, nutapes darbus \"kortuotojai\", \"svviktorijos kalnas\", \"persikai\"', 'sezanas'),
(4703, 'Ciles piniginis vienetas', 'pesas'),
(4704, 'Ar yra banginiu baltijos juroje', 'ne'),
(4705, 'Mokslo, meno ir kitu sriciu zinovas, kvieciamas atsakyti i klausimus, reikalaujancius specialiu ziniu', 'ekspertas'),
(4706, 'Estijos sostine', 'talinas'),
(4707, '1590 mmikroskopa isrades olandas', 'jansenas'),
(4708, 'Formules-1 komanda, debiutuojanti 2002 mcemionate', 'toyota'),
(4709, 'Varzymasis, rungtyniavimas kuriuoje nors srityje norint pasiekti ta pati tiksla', 'konkurencija'),
(4710, 'Santuokos forma, kai vyras turi daug zmonu', 'poligamija'),
(4711, 'Romos imperatorius, 285mdiokletiano paskelbtas cezariu, 286m- augustu, bendravaldziu', 'maksimianas'),
(4712, 'Slavistikos specialistas', 'slavistas'),
(4713, 'Kas parase knyga \"demonu apsestas pasaulis\"', 'sagan'),
(4714, 'Nelaisvosios, t.ypastovioje temperaturoje naudingu darbu nepaverciamos, energijos matas', 'entropija'),
(4715, 'Saules nekepinama vieta', 'pavesis'),
(4716, 'Zmogus, xvii-xviiiasukaupes daugybe gyvunu, augalu, mineralu aprasymu ir susistemines ta medziaga', 'lejus'),
(4717, 'Surinamo sostine', 'paramaribas'),
(4718, 'Jura tarp europos ir afrikos', 'vidurzemio'),
(4719, 'Katalonijos sostine', 'barselona'),
(4720, 'Asiru ir babilonieciu menulio dievas', 'sinas'),
(4721, 'Isorinis, labai karstas (temperatura ~1.5', '10^6 k) ir retas saules atmosferos sluoksnis'),
(4722, 'Priemone, naudojama piestukams laikyti', 'piestukine'),
(4723, 'Greitas krovinis keleivinis laivas, plaukiojantis tam tikra juru linija', 'laineris'),
(4724, 'Isleido donelaicio \"metus\"', 'reza'),
(4725, 'Graiku ir romenu mitologijoje - kalnu nimfos', 'oreades'),
(4726, 'Kupinas liudesio, gedulingo skausmo kurinys', 'elegija'),
(4727, 'Vu', 'vilniaus universitetas'),
(4728, 'Smarkus viso kuno traukuliai', 'konvulsijos'),
(4729, 'Italu kompozitorius, 39 operu (tarp ju \"sevilijos kirpejo\", \"sarkos vagiles\", \"itales alzyre\", \"otelo\") autorius', 'rosinis'),
(4730, 'Pietryciu prancuzijos sritis, garsi savo augaline produkcija', 'provansas'),
(4731, 'Apatine tiesi prikinio stiebo bure, iskleista po fokreja', 'fokas'),
(4732, 'Islandijos smulkus pinigas', 'auraras'),
(4733, 'Laiko tarpas tarp dvieju saules skritulio centro perejimu per pavasario lygiadienio taska', 'atograziniai metai'),
(4734, 'Tarptautine paminklu apsaugos diena', 'balandzio 18'),
(4735, 'Trecias pagal dydi suomijos miestas', 'turku'),
(4736, 'Judeju ritualine astuoniasake zvakide arba zibintas', 'chanuka'),
(4737, 'Svvalentino dienos simbolis', 'sirdis'),
(4738, 'Sasiauris, kuris jungia marmuro ir juodaja juras', 'bosforo'),
(4739, 'Lenkai kalnieciai, kuriuos hitlerininkai generalineje gubernijoje norejo paversti atskira tauta, neva pasizymincia arijams budingais bruozais', 'guraliai'),
(4740, 'Romenu imperatoriaus konstantino didziojo veliava, po jo pergales prie mulvijaus tilto 312 mtapusi visos imperijos veliava', 'labaras'),
(4741, 'Skersmuo arba ...', 'diametras'),
(4742, 'Kaip vadinama plokstuma, kuri vairuoja jachta', 'plunksna'),
(4743, 'Graiku poetas, mokslininkas, aleksandrijos bibliotekos vedejas, sudares pirmaja graiku literaturos bibliografija', 'kalimachas'),
(4744, 'Italijos policininkas', 'sbiras'),
(4745, 'Pasikesinimas nuzudyti auksta valstybes pareiguna, zymu visuomenes veikeja arba jo nuzudymas politiniais tikslais', 'atentatas'),
(4746, 'Isorinio poveikio, del kurio kinta besisukancio kuno kampinis greitis, kiekybinis matas: sukimo ...', 'momentas'),
(4747, 'Aktorius suvaidines dzeka travena filme \"greitis\" ir neo filme \"matrica\": keanu ..[orig.]', 'reeves'),
(4748, 'Kuriais metais pirmakart automobilyje buvo itaisyta variklio uzvedimo spynele', '1947'),
(4749, 'Tobulai grojantis muzikantas', 'virtuozas'),
(4750, 'Kas sukonstravo pirmaji apple kompiuteri [orig.]', 'wozniak'),
(4751, 'Tamsios plauku spalvos, odos ir akies tinklaines pigmentas', 'melaninas'),
(4752, 'Tapytojas, \"sventos ursules isvykimas\" autorius', 'lorenas'),
(4753, 'Atenu politikas ir karvedyspasizymejo graiku-persu karuose (500-449m.)', 'aristidas'),
(4754, 'Dailes kurinio spalvu visuma', 'koloritas'),
(4755, 'Kaip vadinosi 1975 mpagamintas pirmasis asmeninis kompiuteris', 'altair 8800'),
(4756, 'Sajunga kuria sudare julijus cezaris, ginejus pompejus bei licinijus krasas', 'triumviratas'),
(4757, 'Muses lerva liaudiskai', 'dzikas'),
(4758, 'Vienintele upe, istekanti is baikalo ezero', 'angara'),
(4759, 'Keli blokai veikia ignalinos atomineje elektrineje', '2'),
(4760, 'Linija jungianti abu asigalius ir parodanti ilgumas (rytu ir vakaru)', 'dienovidinis'),
(4761, 'Kalva netoli jeruzales, kur budavo vykdomos mirties bausmes', 'golgota'),
(4762, 'Miestas, kuriame yra nato ir es bustines', 'briuselis'),
(4763, 'Tapytojas (1477-1510m.) \"veneros gimimas\", \"pavasaris\" autorius', 'boticelis'),
(4764, 'Graiku mitologijoje - jaunystes deive', 'hebe'),
(4765, 'Kaimas vilkaviskio rajone, vkudirkos gimtine', 'paezeriai'),
(4766, 'Pastato sienos karkasas, sudarytas is horizontaliu, vertikaliu ir istrizu strypu (dazniausiai mediniu) standumui padidinti', 'fachverkas'),
(4767, 'Tarybu lietuvos veikejas, 1940-67 mlietuvos ssr auksciausios tarybos prezidiumo pirmininkas', 'paleckis'),
(4768, 'Pusiau panirusiu, laisvai plaukiojanciu vandens pavirsiuje augalu ir gyvunu visuma', 'pleistonas'),
(4769, 'Mazas, ovalus, panasus i citrina tropiku vaisius', 'kinkanas'),
(4770, 'Mokejimas vienodai naturaliai kalbeti dviem kalbomis ir alternatyvinis tu kalbu vartojimas tose paciose bendravimo situacijose', 'bilingvizmas'),
(4771, 'Skaicius, isreikstas vienetu su 33 nuliais', 'decilijonas'),
(4772, 'Negalintis kalbeti', 'nebylys'),
(4773, '1360 msudaryta sutartis, pagal kuria anglija igavo teise valdyti kai kurias prancuzijos teritorijas', 'kale'),
(4774, 'Sporto saka - misrioji trikove, apimanti ivairiu nuotoliu vienas po kito plaukima atvirame vandens telkinyje, vaziavima plento dviraciu ir begima', 'triatlonas'),
(4775, 'Kokios zvaigzdes sukasi apie ta pati mases centra', 'dvinares'),
(4776, 'Sri lankos sostine', 'kolombas'),
(4777, 'Viduramziu pilenu pusiasalio valstybiu luomo susirinkimas, naujausiais laikais igijes daug burzuazijos parlamento bruozu', 'kortesas'),
(4778, 'Ne pats greiciausias moliuskas', 'sraige'),
(4779, 'Automobilio priekine arba galine asis kitaip', 'tiltas'),
(4780, 'Elektroninis elementas, reguliuojantis grandine tekancios sroves stipruma, kitaip varza', 'rezistorius'),
(4781, 'Atviras prieangis su kolonomis', 'portikas'),
(4782, 'Filosofinis terminas, reiskiantis anapusybe, perzengima', 'transcendencija'),
(4783, 'Tvirtoves patalpa, naudojama kaip kalejimas', 'kazematas'),
(4784, 'Eiliuoto kurinio ritmo pagrindas', 'metras'),
(4785, 'Zirneliu formos saldainiai', 'draze'),
(4786, 'Vyrvardas, kiles is lotkalbos, reiskia \"nugalintis\"', 'vincentas'),
(4787, 'Dvikovos sporto saka - dvieju sportininku kova, stengiantis sportiniu ginklu (rapyros, spagos, kardo) duriais arba kirciais pasiekti vienas kita', 'fechtavimasis'),
(4788, 'Maziausia anatomine plaucio struktura', 'skiltele'),
(4789, 'Norvegu dramaturgas, dramos \"peras giuntas\" autorius', 'ibsenas'),
(4790, 'Kaulu smegenys', 'ciulpai'),
(4791, 'Atmosferos slegis leidziantis zemyn - dideja/mazeja', 'dideja'),
(4792, 'Grybelinis ranku ir koju pirstu nagu pazeidimas', 'onichomikoze'),
(4793, 'Kada alzyras tapo arabu lygos nariu', '1962'),
(4794, 'Valgomieji ledai is grietinele, paprastai su vaisiais, vaisiu ir uogu sultimis', 'plombyras'),
(4795, 'Apecejo 1968 mikurta neformali organizacija globalinems problemoms spresti', 'romos klubas'),
(4796, 'Nepiktybinis liaukinio audinio navikas', 'adenoma'),
(4797, 'Nuomojimas is nuomininko, pernuomojimas', 'subnuoma'),
(4798, 'Tuvalu sostine', 'funafutis'),
(4799, 'Ka reiskia, isvertus is arabu kalbos, kuveito valstybes pavadinimas', 'maza tvirtove'),
(4800, 'Prekiu arba kito turto pardavimas, ju vertes pavertimas pinigais', 'realizacija'),
(4801, 'Spartinancioji atmintis (orig.)', 'cache'),
(4802, 'Formaliai apsikrikstije zydai [dgs.]', 'maranai'),
(4803, 'Fraze: rubiko ...', 'kubikas'),
(4804, 'Paradines kariskiu uniformos puosmena: perpetiniai raisciai, suvyti is ivairaus plocio pyneliu, daznai uzsibaigiantys metaliniais antgaliais [dgs.]', 'akselbantai'),
(4805, 'Labiausiai pasaulyje paplitusi kalba', 'anglu'),
(4806, 'Karsciausia vieta zemeje, libijoje: al ...', 'azizija'),
(4807, 'Darbo apmokejimo norma uz isdirbio vieneta', 'ikainis'),
(4808, 'Xx amodernistines dailes kryptis, kai abstrakciais geometriniais elementais sukuriama judejimo, pulsavimo optine iliuzija', 'opdaile'),
(4809, 'Didelis zemes plotas tam tikriems augalams auginti', 'plantacija'),
(4810, 'Rasytojas, romanu \"ugnimi ir kalaviju\", \"tvanas\", \"be dogmos\", \"quo vadis\", \"kryziuociai\" autorius (liet.)', 'senkevicius'),
(4811, 'Salis, kurioje surengtas pirmasis pasaulio bobslejaus cempionatas', 'austrija'),
(4812, 'Nhl klubas is bostono', 'bruins'),
(4813, 'Zydu liturginis reikmuo: lazdele, kuria rabinas skaitydamas tora vedzioja teksto eilutes (rankomis liesti tora draudziama)', 'jadas'),
(4814, 'Dantu anatominius plysius - vageles ir duobeles hermetizuojancios medziagos, skirtos siu sriciu karieso profilaktikai', 'silantai'),
(4815, 'Pranesimas apie zmogaus mirti, jo gyvenima ir veikla', 'nekrologas'),
(4816, 'Senlietuviu sventos ugnies kurstytoja, zyne', 'vaidilute'),
(4817, 'Mokslininkas 1747 msuformulaves elektros kruvio tvermes desni', 'franklinas'),
(4818, 'Prancuzu kompozitorius, operu (tarp ju \"don kichoto\"), opereciu, baletu, romansu kurejas', 'masne'),
(4819, 'Zmonos tevas', 'uosvis'),
(4820, 'Didelis savitas teritorinis vienetas (gamtinis, politinis, ekonominis)', 'regionas'),
(4821, 'Desimt dievo isakymu', 'dekalogas'),
(4822, 'Tikejimas i viena dieva', 'monoteizmas'),
(4823, 'Sauleti papludimiai ispanijos vidurzemio juros ir kadiso ilankos pakranteje, siltos juros skalaujami, su vaizdingais zveju kaimais', 'kosta'),
(4824, 'Jezaus kristaus prisikelimas', 'rezurekcija'),
(4825, 'Tuojau, netrukus, greitai', 'bemat'),
(4826, 'Vienos rankos ar kojos paralyzius', 'monoplegija'),
(4827, 'Herbo irasas', 'devizas'),
(4828, 'Iki 95kg uzaugintu puskiauliu mesa', 'bekoniena'),
(4829, 'Klausos organai', 'ausys'),
(4830, 'Specialus takas dviraciu lenktynems', 'trekas'),
(4831, 'Italu tapytojas (1871-1958m.) \"suo su pasaitu\" autorius', 'bala'),
(4832, 'Medziagos, kuriu daleles pasiskirste chaotiskai', 'amorfines'),
(4833, 'Caras, kuriam valdant, rusijoje buvo panaikinta baudziava', 'aleksandras ii'),
(4834, 'Laiko tarpas reikalingas kokiam nors nepertraukiamam veiksmui arba darbui', 'seansas'),
(4835, 'Cheminis elementas, kurio simbolis \"xe\" [numeris 54]', 'ksenonas'),
(4836, 'Temperamento tipas - nerupestingas, optimistas, nemegstantis monotonijos, megiamas kitu zmogus', 'sangvinikas'),
(4837, 'Sukabinti traukinio vagonai', 'sastatas'),
(4838, 'Lininis (ar medvilninis) baltas laisvas kataliku kunigo liturginis drabuzis, panasus i alba, tik trumpesnis (iki keliu), su placiomis ilgomis rankovemis', 'kamza'),
(4839, 'Minosvaidzio saudmuo', 'mina'),
(4840, 'Kristaus paaukojimo svente', 'vasario 2'),
(4841, 'Salis, kurios valiutos sutrumpinimas kzt', 'kazachija'),
(4842, 'Skrandzio uzdegimas', 'gastritas'),
(4843, 'Drebule kitaip', 'epuse'),
(4844, 'Lietuvos leidykla, leidzianti atlasus', 'briedis'),
(4845, 'Svedijos sostine', 'stokholmas'),
(4846, 'Sarlio pero pasakos heroje (mergaite)', 'raudonkepuraite'),
(4847, 'Budas, pastoviu asmenybes bruozu savitas derinys', 'charakteris'),
(4848, 'Kuno ramybes kitu materialiu kunu atzvilgiu buvis', 'pusiausvyra'),
(4849, 'Egiptieciu sventasis jautis', 'apis'),
(4850, 'Miestas, kuriame vadovaujant t.edisonui buvo pastatyta pirmoji elektrine', 'niujorkas'),
(4851, 'Girnu akmenys', 'girnapuses'),
(4852, 'Senromos aktorius profesionalas', 'histrionas'),
(4853, 'Zemynas, is kurio kilo persikas', 'azija'),
(4854, 'Prabangiu laikrodziu, kurie kainuoja apie 50000 doleriu, pavadinimas', 'rolex'),
(4855, 'Kiek cm(!) kasmet menulis nutolsta nuo zemes (zodziais)', 'keturis'),
(4856, 'Vandens chemine formule', 'h2o'),
(4857, 'Su kokia valstybe ribojasi san marinas', 'italija'),
(4858, 'Minksta, geltona arba rusva, stipriai kvepianti medziaga, kuria gamina civetu muskuso liaukos, naudojama parfumerijoje', 'cibetas'),
(4859, 'Perimas kiausinis', 'peras'),
(4860, 'Kompanija, pagaminusi mobiliu telefonu modelius: savvy vogue, genie 2000, genie db, genie sport', 'philips'),
(4861, 'Isorine daiktu apybraiza, matmenys', 'gabaritas'),
(4862, 'Asteroidas, kuri galima vadinti antruoju zemes palydovu, nes naudojasi zemes orbita (atrastas 1986 m.) [orig.]', 'cruithne'),
(4863, 'Kaip taisyklingai lietuviskai turetu buti vadinama sporto saka ringetas', 'ziedinis'),
(4864, 'Antikoje iskalbos ir meno globeja', 'kaliope'),
(4865, 'Skubus ir svarbus pranesimas rastu, telegrama', 'depesa'),
(4866, 'Jordanijos sostine', 'amanas'),
(4867, 'Zvimbiantys kraugeriai', 'uodai'),
(4868, 'Masazine vonia su daug burbuliuku [orgkalba]', 'jacuzzi'),
(4869, '\"prometejas\" autorius', 'baironas'),
(4870, 'Sausiausia vieta zemeje (0,8 mm krituliu per metus): ..dykuma', 'atakamos'),
(4871, 'Kas parase \"visuotine istorija\"', 'polibijas'),
(4872, 'Labai smulkios kietu medziagu daleles (10 mikronu dydzio)', 'dulkes'),
(4873, 'Vienintele pasaulio teritorija, turinti kolonijos statusa', 'gibraltaras'),
(4874, 'Matuokle juros, ezero arba upes vandens lygio auksciui matuoti', 'futstokas'),
(4875, 'Miestas, kuriame gime mhakkinenas [f-1]', 'helsinkis'),
(4876, '14-os eiliu eilerastis', 'sonetas'),
(4877, '\"omnitel\" pokalbiu papildymo kortele', 'extra'),
(4878, 'Takas per automobiliu kelia', 'pereja'),
(4879, 'Vokieciu fizikas, 1932 mgaves nobelio premija uz vaidmeni kvantines mechanikos kurime', 'heizenbergas'),
(4880, 'Itvirtinta sleptuve', 'bunkeris'),
(4881, 'Kokie idomus debesys yra mokslininku stebimi stratosferoje', 'perlamentiniai'),
(4882, 'Didelis pailgas indas maudytis, praustis', 'vonia'),
(4883, 'Atsargine deze su koriu remais avilyje', 'magazinas'),
(4884, 'Svarbiausias komunistu partijos vykdomasis organas', 'centro komitetas'),
(4885, 'Senoves romoje - mokesciai, nustatomi kas 5 metai', 'indikcija'),
(4886, 'Filmas su sharon stone: esminis ...', 'instinktas'),
(4887, 'Krosnis duonai kepti', 'duonkepe'),
(4888, 'Mokslas, tiriantis vaisiniu ir uoginiu augalu veisles', 'pomologija'),
(4889, 'Xixapabaigoje lietuviu poezijoje isigalejusi eiledara, kuri remiasi pakitusia antikines pedos samprata', 'silabotonine'),
(4890, 'Liguista busena, kuri reiskiasi greitu fiziniu ir psichiniu nuovargiu, padidejusiu jaudrumu, demesio nepastovumu', 'astenija'),
(4891, 'Telekomunikaciju kompanija, pagaminusi mobiliu telefonu modelius: r380, r320, r310s, a2618', 'ericsson'),
(4892, 'Australijos sostine', 'kanbera'),
(4893, 'Tolygus, tapatus, visiskai atitinkantis', 'adekvatus'),
(4894, 'Varpo formos (platejantis i apacia) kelniu kirpimas', 'kliosas'),
(4895, 'Prietaisas slapimo tankiui matuoti', 'urometras'),
(4896, 'Gema su igilintu reljefu arba antspaudas, paliekantis reljefini atspauda vaske, molyje', 'intalija'),
(4897, 'Po apvaisinimo indvidualaus augalo ar gyvuno vystymasis', 'ontogeneze'),
(4898, 'Religijose - dievo pasiuntinys, tarpininkas tarp dievo ir zmoniu', 'angelas'),
(4899, 'Sudziuves duonos kampas', 'ziaubere'),
(4900, 'Juoda deguto pavidalo mase, kuri lieka is naftos, nudistiliavus lengvasias frakcijas ir alyvas', 'gudronas'),
(4901, 'Apvalus, pailgas kiauru viduriu daiktas kam nors tiekti, gabenti', 'vamzdis'),
(4902, 'Vi aprkrgyvenes indu filosofas ir religinis vadovas, laikomas dzainizmo pradininku', 'mahavyra'),
(4903, 'Ilinojaus valstijos nacionaline gele', 'zibuokle'),
(4904, 'Viena populiariausiu ispanu dramaturgo pkalderono komediju: dama ...', 'vaiduokle'),
(4905, 'I virsu smailejantis memorialinis statinys', 'obeliskas'),
(4906, 'Butano karalystes administracinis vienetas', 'rajonas'),
(4907, 'Sraigtinis pavirsiusbreziamas tieses, kuri tolygiai sukasi apie nejudama asi ir kartu slenka isilgai tos asies', 'helikoidas'),
(4908, 'Lietuviu poete, eilerasciu rinkiniu \"ugnies lasai\", \"dienos - dovanos\", \"ant zemes delno\", \"pilnatis\", \"prieblandu sodai???, \"saule ir dainele\", \"rugelis dainuoja\" autore', 'degutyte'),
(4909, 'Milziniska bronzine senoves graiku dievo helijo skulptura, vienas is 7 pasaulio stebuklu: rodo ...', 'kolosas'),
(4910, 'Vieta transporto priemoneje, kur patalpinti jos kontroles ir signaliniai itaisai: prietaisu ...', 'skydas'),
(4911, 'Kai kuriuose losimuose statoma pinigu suma is kurios losiama', 'bankas'),
(4912, 'Vairavimo mechanizmo itaisas, vairalazde', 'sturvalas'),
(4913, 'Masines eitynes visuomenes nuotaikai, reikalavimams, solidarumui reiksti', 'demonstracija'),
(4914, 'Nedidelis krikscioniu sakralinis pastatas, priestatas ar patalpa su altorium', 'koplycia'),
(4915, 'Kas dengia 12% islandijos ploto', 'ledynai'),
(4916, 'Vienkartinis futbolo veiksmas - smugis i kamuoli koja', 'spyris'),
(4917, 'Kaimene kitaip', 'banda'),
(4918, 'Asmuo arba imone turinti teise kuo nors naudoti pvz telefonu kabeline', 'abonentas'),
(4919, 'Upe, tekanti per praha [sulietuvintai]', 'voltava'),
(4920, 'Pavienio sportininko arba komandos ataka atsakant i priesininko puolima', 'kontrataka'),
(4921, 'Lietuvis, iskovojes pirmaji olimpini medali', 'lubinas'),
(4922, 'Senoves romoje - dvaro valdytojas vergas', 'vilikas'),
(4923, '\"ziemos maudyniu megejas\"', 'ruonis'),
(4924, 'Objekto nesutapatinamumas su jo veidrodiniu atspindziu', 'chiraliskumas'),
(4925, 'Aukstu pareigu, visuomenines padeties, luomo zenklai', 'insignijos'),
(4926, 'Koks zymus zmogus pasake: \"meile parodo zmogui, koks jis turetu buti\"', 'cechovas'),
(4927, 'Tirsta uogiene', 'dzemas'),
(4928, 'Stogo dangos plytele', 'cerpe'),
(4929, 'Mokslas, tiriantis zemes pavirsiaus reljefo formu geometrini pavidala', 'morfografija'),
(4930, 'Gydytoju ir kitu medicinos personalo veiksmai, sukeliantys liguistus paciento pojucius, galincius virsti dar viena liga', 'jatrogenija'),
(4931, 'Isviete su nuplaunamuoju vandeniu', 'klozetas'),
(4932, 'Ant stacios asies besisukantis irenginys su sedynemis, panasiomis i arkliukus, valteles', 'karusele'),
(4933, 'Ilga fraze, didele replika, kalbos atkarpa, pasakyta pakeltu tonu', 'tirada'),
(4934, 'Ignalinos atomine ...', 'elektrine'),
(4935, 'Budizmo kryptis, kurios idealas - bodhisatva (arhato laipsni pasiekes nusvitusysis, kuris, priartejes prie nirvanos, grizta, kad padetu si kelia iveikti kitiems)', 'mahajana'),
(4936, 'Gamybos procesu atlikimo budu ir priemoniu visuma', 'technologija'),
(4937, 'Baslys ledui kirsti', 'peikena'),
(4938, 'Kuris jav prezidentas buvo jauniausias karinio juru laivyno pilotas antrojo pasaulinio karo metu', 'busas'),
(4939, 'Kalnas - armenu pasididziavimas', 'araratas'),
(4940, 'Jav valstija, 5-a pagal uzimama teritorija: naujoji ..[liet.]', 'meksika'),
(4941, 'Samysis kitaip', 'panika'),
(4942, 'Priverstinis atlygintinis asmens turto paemimas valstorgano nutarimu', 'rekvizicija'),
(4943, 'Telekomunikaciju kompanija, pagaminusi mobiliu telefonu modelius: 8850, 6250, 8810, 6210', 'nokia'),
(4944, 'Si sistemoje absorbuotosios dozes vienetas', 'grejus'),
(4945, 'Gyvasis rinkos elementas', 'subjektas'),
(4946, 'Popieziaus teise nusalinti nuo pareigu dvasininkus', 'ekskomunika'),
(4947, 'Status skardis, einantis suomijos ilankos pietiniu krantu iki ladogos ezero', 'glintas'),
(4948, 'Lietuviu liaudies sokis, kurio metu vyrai dainuoja ir sokineja per lauza', 'mikita'),
(4949, 'Kolonu sale; dailes parodu patalpa', 'galerija'),
(4950, 'Augaluose vykstantis procesas, kurio metu asparagino ir glutamino rugstys, veikiant fermentui aminotransferazei, netenka chnh2 grupes ir su pirovynuogiu rugstim sudaro alanina ir oksalilacto rugsti', 'peraminimas'),
(4951, 'Brazilijos sostine', 'brazilija'),
(4952, 'Klientas, pirkes prekiu skolon', 'debitorius'),
(4953, 'Salis, kurioje isikurusi kompanija \"nokia\"', 'suomija'),
(4954, 'I vaska panasi balta medziaga, gaunama is kasaloto kaukoles ertmiu, vartojamas medicinoje ir parfumerijoje', 'spermacetas'),
(4955, 'Rusijos karinio juru laivyno pirmasis karininko laipsnis', 'micmanas'),
(4956, 'Cheminis elementas, kurio pavadinimas kilo is graikisko zodzio, lietuviskai reiskiancio \"neaktyvus\"', 'argonas'),
(4957, 'Minkstoji nedozuota vaistu forma - minksta, klampi ir netanki mase', 'tepalas'),
(4958, 'Krikscioniu aukstuju dvasininku insignija - liturginis valdzios zenklas', 'pontifikalija'),
(4959, 'Gamtinis neorgpigmentas, kuriame vyrauja gelezies oksido hidratas (getitas) su molio priemaisa', 'ochra'),
(4960, 'Upes itekancios i nila ir sudarancios viena didele upe: baltasis ir ...nilas', 'melynasis'),
(4961, 'Protestantizmo kryptis, laikanti biblija krikscionybes pagrindu ir atmetanti bet kokia jos kritika', 'fundamentalizmas'),
(4962, 'Baznycios sventuju gyvenimo aprasymu rinkinys', 'paterikas'),
(4963, '\"anirotkiv\" atvirksciai', 'viktorina'),
(4964, 'Naujausia siuo metu dvd technologija', 'dvipuse'),
(4965, 'Matematikos uzdavinio dalis, kurioje teikiami duomenys', 'salyga'),
(4966, 'Laikinas kitos valstybes uzemimas ir faktiskas jos valdymas', 'okupacija'),
(4967, 'Didziausios tarptautines kompleksines sporto varzybos', 'olimpiada'),
(4968, 'Romenu mitologijoje - deives stumiancios i zmogzudyste', 'furijos'),
(4969, 'Ezeras varenos raj., 16 km i pietus nuo varenos (ezero pavadinimas kaip vienos gelavandenes zuvies)', 'lynas'),
(4970, 'Enekrosiaus rezisuoto \"hamleto\" pagrindinio vaidmens atlikejas', 'mamontovas'),
(4971, 'Aukso, sidarbo ir brangakmeniu svorio matas, lygus 1,555 gramo', 'peniveitas'),
(4972, 'Imones uzdarymas ir darbininku atleidimas is darbo kaip budas kovoti su ju reikalavimais', 'lokautas'),
(4973, 'Vienintele pasaulio salis uzimanti visa zemyna', 'australija'),
(4974, 'Teatro, koncerto sales dalis, kurioje vaidinama, koncertuojama', 'scena'),
(4975, 'Asmenys, pagal individualius uzsakymus arba rinkai gaminantys vartojimo reikmenis, teikiantys paslaugas', 'amatininkai'),
(4976, 'Lapo formatas kurio matmenys 420x297', 'a3'),
(4977, 'Pora neatskirtu vienodu zenklu, kurie atspausdintame lape vienas kito atzvilgiu apversti', 'tetbesas'),
(4978, 'Aviu ir ozku invazine liga', 'estroze'),
(4979, 'Jav astronautas, i kosmosa pakiles budamas 77 metu amziaus', 'glenas'),
(4980, 'Atlyginimas autoriui uz jo kuriniu paskelbima ar kitoki panaudojima', 'honoraras'),
(4981, 'Senoves romos pirties rubine', 'apoditerija'),
(4982, 'Senoves graiku styginis muzikos instrumentas', 'kitara'),
(4983, 'Stoka, trukumas', 'deficitas'),
(4984, 'Antinksciu zieves gaminamas steroidinis hormonas', 'aldosteronas'),
(4985, 'Audimo imone', 'audykla'),
(4986, 'Futbolo diena', 'gruodzio 10'),
(4987, 'Pirmosios elektronines skaiciavimo masinos pavadinimas', 'eniac'),
(4988, 'Belizo sostine', 'belmopanas'),
(4989, 'Debiutinis \"delfinu\" albumas', 'svajones'),
(4990, 'Cheminiai junginiai, susidarantys jungiant bet kuriu elementu atomus metaliskaisiais cheminiais rysiais', 'metalidai'),
(4991, 'Taika simbolizuojantis paukstis', 'balandis'),
(4992, 'Mokslinis veikalas, kuriame nagrinejamas kuris nors klausimas, problema', 'traktatas'),
(4993, 'Kas 1802missifravo sumeru dantirasti', 'grotehendas'),
(4994, 'Kas sugalvojo sita klausima', 'tony'),
(4995, 'Pokalbio objektas', 'tema'),
(4996, 'Vidaus esamasis vietininkas', 'inesyvas'),
(4997, 'Romenu mitologijoje - seimos ar valstybes dievai saugotojai, taip pat saugoje namus ir maisto atsargas', 'penatai'),
(4998, 'Frontalus zmogaus vaizdas portrete is priekio, veidu i ziurintiji', 'en face'),
(4999, 'Sudetingas stilizuotu augaliniu ir geometriniu motyvu ornamentas, budingas islamo menui', 'arabeska'),
(5000, 'Mazosios azijos dievas, deives kibeles mylimasis', 'atis'),
(5001, 'Neoficialus birzos tarpininkas, makleris, sudaras birzos sanderius oficialiems makleriams nedalyvaujant', 'kulisje'),
(5002, 'Barometras, kuriuo atmosferos slegis matuojamas pagal membranines dezutes deformacija', 'aneroidas'),
(5003, 'Baznycios reglamentuota religiniu apeigu visuma', 'liturgija'),
(5004, 'Vaises, isgertuves, atlikus koki reikala', 'magarycios'),
(5005, 'Kiek afrikieciu buvo popieziais', '2'),
(5006, 'Vienas is apastalu', 'morkus'),
(5007, 'Glaustas krikscioniu tikybos pagrindu isdestymas', 'katekizmas'),
(5008, 'Lietuvos futbolo a lygos komanda is marijampoles', 'suduva'),
(5009, 'Kokia raide zymima universalioji duju konstanta', 'r'),
(5010, 'Kataliku baznytine bausme, atimanti is dvasininko pareigybe, titulus ir teise atlikti baznytines funkcijas', 'depozicija'),
(5011, '\"fausto\" autorius', 'gete'),
(5012, 'Lietuviu vaivorykstes deive', 'vaiva'),
(5013, 'Kiek tonu oro vidutiniskai slegia 1 zmogu ?', '15'),
(5014, 'Produktas, gaunamas garams sutirstejus i skysti', 'kondensatas'),
(5015, 'Rusu filmas \"maskva netiki ...\"', 'asaromis'),
(5016, 'Didelis kosminis kunas, skriejantis orbita aplink zvaigzde', 'planeta'),
(5017, 'Vaistines medziagos, skatinancios baltymu sinteze organizme, sulaikancios jame kalci, fosfora, siera [dgs.]', 'anabolikai'),
(5018, 'Filosofine paziura, svarbiausia vertybe laikanti patyrima', 'empirizmas'),
(5019, 'Senegipto sventyklu sokeja', 'almeja'),
(5020, 'Senoves graiku kersto deives', 'erinijos'),
(5021, 'Filmo \"sindlerio sarasas\" rezisierius (orig.)', 'spielberg'),
(5022, 'Senoves graiku sventyklos arba kolonados laiptuoto cokolio virsutine pakopa arba jos pavirsius', 'stilobatas'),
(5023, 'Upe, neries intakas, tekanti per vilniu', 'vilnele'),
(5024, 'Lupinio garso virtimas nelupiniu', 'delabializacija'),
(5025, 'Italijos miestas, kuriame yra 80 tukstvietu \"olimpico\" stadionas', 'roma'),
(5026, 'Titulas, kuri pasiskyre adolfas hitleris, kai gavo valdyti vokietija', 'fiureris'),
(5027, '\"drauguose\" vaidinanti aktore, brad pitt zmona [orig.]', 'aniston'),
(5028, 'Cirko arena', 'maniezas'),
(5029, 'Teorija, teigianti, kad genetikos principais galima gerinti zmogaus paveldimasias savybes', 'eugenika'),
(5030, 'Zinduoliu tam tikru liauku sekretas, isskiriamas per laktacijos perioda', 'pienas'),
(5031, 'Termoso isradejas', 'diuaras'),
(5032, 'Balsavimu isreikstas spendimas', 'votumas'),
(5033, 'Koki kruvi turi protonas', 'teigiama'),
(5034, 'Nesubrendusi lytine lastele', 'gonocitas'),
(5035, 'Ezeras traku raj., 7 km i rytus nuo aukstadvario (pavadinimas - rubo, apredo sinonimas)', 'drabuzis'),
(5036, 'Kaip vadinosi paskutinis napoleono musis [1815m.]', 'vaterlo'),
(5037, 'Japonu tradicinis teatras, kuriame vaidina tik vyrai', 'kabukis'),
(5038, 'Sufizmo pakraipos musulmonas, kurio nors imano arba seicho mokinys, privalantis studijuoti sufizmo teorija', 'miuridas'),
(5039, 'Jav krepsinio rinktine [orig.]', 'dream team'),
(5040, 'Vandenilio oksidas', 'vanduo'),
(5041, 'Pasakiskai turtingas, legendinis frigijos karalius', 'midas'),
(5042, 'Mokslas, apie visame organizme vykstancius procesus ir ju reguliavima', 'fiziologija'),
(5043, 'Nemaloniu kvapu naikinimas cheminiais preparatais', 'dezodoracija'),
(5044, 'Pasidavimas isankstinei zmoniu bei zmoniu grupiu itakai', 'partiskumas'),
(5045, 'Filosofijos paziura, tvirtinanti, kad pasaulyje viskas turi buti desninga, atsitiktinumas objektyviai neegzistuoja', 'determinizmas'),
(5046, 'Kas parase \"viduramziu ruduo\"', 'heizinga'),
(5047, 'Koks bendras lietuvos sienu ilgis kilometrais', '1846'),
(5048, 'Tamsioji paros dalis nuo saules virsutinio krasto nusileidimo iki uztekejimo', 'naktis'),
(5049, 'Titanas, pavoges is olimpo ugini ir atidaves ja zmonems, uz tai dzeuso nubaustas : prikaltas prie olos', 'prometejas'),
(5050, 'Sengraiku pastatas su kolonomis', 'portikas'),
(5051, 'Mazasis lenino anukas', 'spaliukas'),
(5052, 'Anglu mokslininkas, gyvenes 1627-1691 metais [liet.]', 'boilis'),
(5053, 'Antra pagal dydi ir sesta pagal atstuma nuo saules planeta', 'saturnas'),
(5054, 'Kokios salies (vnskilm.) domeno vardas yra \".gm\"', 'gambijos'),
(5055, 'Minama dviracio dalis [vns.]', 'pedalas'),
(5056, 'Padidejes lytinis potraukis', 'afrodizija'),
(5057, 'Silkinis, medvilninis arba vilnonis audinys kiek gruobletu pavirsiumi, kurio faktura gaunama naudojant didelio sukrumo krepinius siulus arba audziant specialiais krepiniais pynimais', 'krepas'),
(5058, 'Telekomunikaciju kompanija, pagaminusi mobiliu telefonu modelius: a110, a100, sgh-2400, sgh-2200, sgh-250', 'samsung'),
(5059, 'Kiek minuciu trunka vienas mazojo futbolo kelinys', '20'),
(5060, 'Garsi karbiuratoriu gamintoja', 'weber'),
(5061, 'Turku saltonu rumai su haremu', 'seralis'),
(5062, 'Valstybe, kurioje 2002 mbalandzio menautokatastrofoje zuvo populiarios grupes tlc dainininke lopes', 'honduras'),
(5063, 'Plaukuota laukine bite', 'kamane'),
(5064, 'Mokinio gebejimas isisamoninti, ismokti mokytojo pateikiama medziaga', 'imlumas'),
(5065, 'Kiek pasaulyje yra vandenynu', 'keturi'),
(5066, 'Sevoves graiku vyru ir moteru drabuzis be rankoviu, ant peciu susegtas sagemis', 'chitonas'),
(5067, 'Arka arba arku eile, paremta kolonomis arba pilioriais', 'arkada'),
(5068, 'Zmogaus protevis gyvenes pries 30-40 tukstmetu', 'kromanjonietis'),
(5069, 'Tarptautin? miego diena', 'kovo 21'),
(5070, 'Greito tempo jureiviu sokis', 'matlotas'),
(5071, 'Elektros generatoriaus isradejas', 'faradejus'),
(5072, 'Zmogaus kova su buliumi', 'korida'),
(5073, 'Teiginio teisingumo nustatymas loginiais samprotavimais ar jutiminiu patyrimu', 'irodymas'),
(5074, 'Ventraline uzpakaliniu smegenu dalis', 'tiltas'),
(5075, 'Arvydo sabonio pravarde', 'sabas'),
(5076, 'Vyru homoseksualumas- potraukis suaugusiems vyrams', 'androfilija'),
(5077, 'Ferrari komandos vadovas jeanas ...', 'todtas'),
(5078, 'Miestas, is kurio yra nhl klubas islanders', 'niujorkas'),
(5079, 'Nekurybiskas, nekritiskas sekimas zymiu menininku, mokslininku veikalais, pasenusios meno, mokslo krypties ideju skelbejais', 'epigonas'),
(5080, 'Music instruction digital interface', 'midi'),
(5081, 'Graikijos sala, kur stovejo vienas is pasaulio stebuklu', 'rodo'),
(5082, 'Vokietijos buvusi sostine', 'bona'),
(5083, 'Kompanija, sukurusi pirma tranzistorini televizoriu, video magnetofona ir lakstuji diskeli', 'sony'),
(5084, 'Tokios jegos, kuriu atliekamas darbas priklauso nuo kuno judejimo trajektorijos', 'nekonservatyvios'),
(5085, 'Radioaktyvus cheminio elemento izotopas', 'radioizotopas'),
(5086, 'Vaizdo dydzio ir rezoliucijos lygis, kuri gali atkurti skaitmenine kamera', 'megapikselis'),
(5087, 'Mokslas apie zuvis', 'ichtiologija'),
(5088, 'Radiotechninis irenginys fiziniams objektams erdveje susekti, ju koordinatems stebeti ir judesio parametrams matuoti', 'radaras'),
(5089, 'Kompanija, pagaminusi mobiliu telefonu modelius: db4100, db4000, db2000, db500, g9d+', 'nec'),
(5090, 'Mazos vikingu valstybes kunigaikstis', 'konungas'),
(5091, 'Cheminis elementas, kurio simbolis \"te\" [numeris 52]', 'teluras'),
(5092, 'Lietuviskai \"puzzle\"', 'delione'),
(5093, 'Belgijos, olandijos ir liuksemburgo ekonomine ir muitu sajunga', 'beneliuksas'),
(5094, 'Geltonos spalvos, rugstus citrusinis vaisius', 'citrina'),
(5095, 'Cheminis elementas, kurio simbolis \"pt\" [numeris 78]', 'platina'),
(5096, 'Kaip vadinamas lietuviu kalbos rasymas kirilica', 'grazdanka'),
(5097, 'Sala ramiajame vandenyne, priklausanti cilei ir garsi savo akmens statulomis', 'velyku'),
(5098, 'Sultinys - mesos, kaulu, zuvu, grybu, darzoviu nuoviras', 'buljonas'),
(5099, 'Koks yra vandensvydzio vartu aukstis (cm)', '90'),
(5100, 'Prancuzijos miestas, kuriame yra 60 tukstvietu \"velodrome\" futbolo stadionas', 'marselis'),
(5101, 'Ilanka tarp prancuzijos ir ispanijos', 'biskajos'),
(5102, 'Atsakingumo uz savo poelgius jausmas', 'sazine'),
(5103, 'Dispersine sistema is duju (oro) burbuliuku, atskirtu plona skyscio plevele ?', 'putos'),
(5104, 'Kurinio pradzioje irasyti autoriaus zodziai apie tai, kam ar kieno atminimui autorius ta kurini skiria', 'dedikacija'),
(5105, 'Mokslas apie psichikos ir nervu ligas', 'psichoneuropatalogija'),
(5106, 'Itaisas, kaupiantis energija, kuria veliau galima panaudoti', 'akumuliatorius'),
(5107, 'Jemeno administracinis teritorinis vienetas', 'provincija'),
(5108, 'Distiliato dalis, grazinama rektifikacinei kolonai', 'flegma'),
(5109, 'Seniausias vakaru europos vienuoliu ordinas [dgskilm.]', 'benediktinu'),
(5110, 'Istorijos muza', 'kleja'),
(5111, 'Susmulkinta mesos mase su prieskoniais ir priedais kotletams, desroms ir ktgaminti', 'farsas'),
(5112, 'Vienas zymiausiu dziazo atlikeju - trimitininkas bei dainininkas [angliskai]', 'louis armstrong'),
(5113, 'Auksciausias lytinio pasitenkinimo per lytini akta laipsnis', 'orgazmas'),
(5114, 'Xiii avidutinio tempo tautinis ispanu sokis', 'bolero'),
(5115, 'Valdzios, pareigu arba laipsnio atsisakymas', 'abdikcija'),
(5116, 'Moteris, jaucianti lytini potrauki kitai moteriai (arba apskritai moterims)', 'lesbiete'),
(5117, 'Sokeja, atlieknati svarbiausius baleto vaidmenis', 'primabalerina'),
(5118, 'Mokslas apie skaicius', 'aritmetika'),
(5119, 'Kelimo masinos mechanizmas birioms medziagoms arba vienetiniams kroviniams suimti', 'greiferis'),
(5120, 'Giliausia, patvariausia, visa asmenybe apimanti emocija, kylanti is svelnumo, bendravimo poreikio ir patirties; auksciausias dorovinis jausmas', 'meile'),
(5121, 'Vabzdys kietais antsparniais', 'vabalas'),
(5122, 'Kaip vadinamas 1975 misteigtas ir 1976-1993 mvykes europos bendrijos valstybiu neoficialus bendradarbiavimas kovoje su tarptautiniu terorizmu ir organizuotu nusikalstamumu', 'trevi'),
(5123, 'Kulturos atgimimas', 'renesansas'),
(5124, 'Svromos imperijoje (962-1806) - valdovo titulas', 'kaizeris'),
(5125, 'Europos sajungos programa, skirta remti moksliniams tyrimams vaizdo ir duomenu perdavimo komunikaciju, mobiliu ir personaliniu telekomunikaciju irangos srityse [orig.]', 'race'),
(5126, 'Italu politinis filosofas, isgarsejes pasakymu, kad valdovas, kuris nori islaikyti valdzia, turi buti klastingas, gudrus ir ziaurus', 'makiavelis'),
(5127, 'Laiptine piramide chaldejoje', 'sikra'),
(5128, 'I vilka panasus afrikos plesrunas stambia galva, edantis dveseliena', 'hiena'),
(5129, 'Kada parengta \"venecijos chartija\"', '1964'),
(5130, 'Prietaisas aktyviajai elektros galiai matuoti', 'vatmetras'),
(5131, 'Kas atlieka kurini \"nothing else matters\"', 'metallica'),
(5132, 'Sekspyro drama \"antonijus ir ...\"', 'kleopatra'),
(5133, 'Nauju pazangiu mokslo, meno, technikos, gamybos ideju ar metodu autorius, diegejas', 'novatorius'),
(5134, 'Materialus nusikaltimo sudeties pozymis', 'pavojingumas'),
(5135, 'Raudonosios armijos treciojo ukrainos fronto gynybine operacija 1945mkovo 6 - 15 dienomis vengrijoje', 'balatono'),
(5136, 'Lytiniu lasteliu dalijimasis brendimo zonoje', 'mejoze'),
(5137, 'Senromenu pergales deive, atitinkanti graiku nike', 'viktorija'),
(5138, 'Priestaravimas tarp dvieju teiginiu, kuriu kiekvienas vienodai logiskai irodomas', 'antinomija'),
(5139, 'Teorija, neigianti gyvo ir negyvo priesingybe, remdamiesi tuo, kad biologiniai reiskiniai aiskinami fizikos ir chemijos desniais', 'mechanicizmas'),
(5140, 'Vidazijoje paplites puodukas', 'piala'),
(5141, 'Istorine baltu zeme', 'sela'),
(5142, 'Kurpaite atviru uzkulniu ir antpirsciais', 'klepe'),
(5143, 'Padirbtas dokumentas', 'klastote'),
(5144, 'Vokieciu spaustuvininkas, laikomas siuolaikines spaudos isradeju', 'gutenbergas'),
(5145, 'Cekijos administracinis vienetas', 'apskritis'),
(5146, 'Ore esanciu vandens garu mases ir turio santykis', 'absoliutine dregme'),
(5147, 'Sent vinsento ir grenadinu administracinis vienetas', 'parapija'),
(5148, 'Danties kaulo gedimas', 'eduonis'),
(5149, 'Pagrindinis simptomas esant umiam kairiosios sirdies puses nepakankamumui', 'dusulys'),
(5150, 'Teisinis terminas, laivo kapitono ar igulos padaryta zala kroviniui ar laivui', 'baratrija'),
(5151, 'Laoso smulkus pinigas', 'atas'),
(5152, 'Laikinas valstybes valdytojas vietoj nepilnamecio', 'regentas'),
(5153, 'Alumi garsi vokietijos zeme', 'bavarija'),
(5154, 'Lietuviu liaudies ratelis', 'serbenta'),
(5155, 'Oligarchijos salininkas', 'oligarchas'),
(5156, 'Medziagos,turincios ta pati protonu ,bet skirtinga neotronu skaiciu', 'izotopai'),
(5157, 'Gyvo orgaznimo lasteliu, audiniu organo arba jos dalies zuvimas', 'nekroze'),
(5158, 'Fiba \"bosas\"', 'stankovicius'),
(5159, 'Vienvietis velkamasis aparatas povandeniniam filmavimui ir stebejimui', 'batiplanas'),
(5160, 'Koks vidaus organas (ne liauka) svarbiausias kraujospudzio reguliacijai [dgs.]', 'inkstai'),
(5161, 'Kuriais metais kembridze (jav masacusetso valstija) ikurtas harvardo koledzas', '1636'),
(5162, 'Senoves skandinavu meiles, vaisingumo ir grozio deive', 'freja'),
(5163, 'Karolio didziojo sunus', 'liudvikas maldingasis'),
(5164, 'Viduramziu tiurku tautu feodalai ir kai kuriu kitu socialiniu grupiu zmones, atleisti nuo mokesciu [dgs.]', 'tarchanai'),
(5165, 'Zvaigzde, astunta pagal nuotoli nuo zemes', 'sirijus'),
(5166, 'Antra pagal dydi europos valstybe', 'ukraina'),
(5167, 'Aristokrato titulas, uzimantis vieta tarp grafo ir barono', 'piruetas'),
(5168, 'Vienodu arku, paremtu kolonomis arba stulpais, eile', 'arkada'),
(5169, 'Cheminis elementas, kurio simbolis hg [numeris 80]', 'gyvsidabris'),
(5170, 'Sengermanu butybes - pusiau zmones, pusiau dvasios, gyvenancios ore, zemeje, vandenyje', 'elfai'),
(5171, 'Graikijos pagrindinis pinigas', 'euras'),
(5172, 'Tradicinis ir dazniausias suvereniu valstybiu bendravimo budas, kuriuo siekiama isspresti tarpvalstybiniu santykiu problemas', 'derybos'),
(5173, 'Vokieciu dailininkas, graviuru, kuriomis puostos knygos autorius', 'diureris'),
(5174, 'Pasaulyje placiai paplites indiskas prieskonis', 'karis'),
(5175, 'Xviii avokieciu kompozitorius, oratoriju \"samsonas\", \"dzudas makabejus\", operu \"almira\", \"mesijas\" autorius', 'hendelis'),
(5176, 'Kiek voztuvu turi tradicinis 4 cilindru keturtaktis variklis', '8'),
(5177, 'Fluoro plastiku, gaminamu jav, prekinis pavadinimas', 'teflonas'),
(5178, 'Kur ivyks 2006 mziemos olimpines zaidynes', 'turine'),
(5179, 'Plaukiojimas juromis; juru laivyba', 'jureivyste'),
(5180, 'Sirdies dangalas, kitaip-sirdipleve', 'perikardas'),
(5181, 'Didelis plotas kur niekas neauga', 'dykuma'),
(5182, 'Prietaisas spalvotam fotografijos atvaizdui gauti is keliu nespalvotu diapozityvu ar negatyvu', 'chromoskopas'),
(5183, 'Tariamasis vaizdas', 'vizija'),
(5184, 'Kada gime grupes simply red ikurejas, vokalistas ir lyderis mickas hucknallas', '1960'),
(5185, 'I planetos pvz., zemes, atmosfera iskriejusio meteoroido ir jo irimo produktu svytejimas', 'meteoras'),
(5186, 'Problemine vyriska lytine liauka', 'prostata'),
(5187, 'Lietuviu rasytojas, eilerasciu rinkiniu \"verpetai\", \"aidu aiduziai\", \"suverstos vagos\", \"giesmes\", \"maldos ant akmens\", poemos \"pelenai\" autorius', 'kirsa'),
(5188, 'Yra keturios civilizacijos: vakaru krikscioniskoji, kinijos konfucine, arabu islamiskoji ir indijos ...', 'budistine'),
(5189, 'Arizonos sostine', 'fyniksas'),
(5190, 'Automobilines padangos posluoksnis is reto kordo, jungiantis karkasa ir protektoriu', 'brekeris'),
(5191, 'Alkoholinis gerimas - pelynu trauktine', 'absentas'),
(5192, 'Salis, kurioje buvo sukonstruotas muzikos instrumentas armonika', 'vokietija'),
(5193, 'Ar yra oro vakuume (taip/ne)', 'ne'),
(5194, 'Kraitis arba ...', 'pasoga'),
(5195, 'Pasaulinio skautu judejimo pradininkas', 'povelis'),
(5196, 'Arklio suoliavimas cirko manieze', 'galopada'),
(5197, 'Veido pertvarkymas filmavimui', 'grimas'),
(5198, 'Kokiomis raidemis iki sos iteisinimo buvo uzkoduotas tarptautinis pavojaus signalas', 'cqd'),
(5199, 'Mokslas apie nusikalstamuma', 'kriminologija'),
(5200, 'Zymusis prancuzas, siuolaikiniu olimpiniu zaidyniu, kaip pasaulines sporto sventes, organizatorius, 1894 misrinktas tok generaliniu sekretoriumi, ir kurio sirdis palaidota olimpijoje: pjeras de ...', 'kubertenas'),
(5201, 'Samdyti ziurovai', 'klaka'),
(5202, 'Kada sukonstruotas pirmasis traktorius', '1901'),
(5203, 'Kaip kitaip seniau dar buvo vadinamas menuo rugpjutis', 'degesis'),
(5204, 'Posakis ar citata, pateikta pries literaturos kurini ar jo dali kaip izanga', 'epigrafas'),
(5205, 'Saules sistemos planeta milzine, septinta planeta pagal nuotoli nuo saules', 'uranas'),
(5206, 'Tam tikras kiekis, dydis, dalis, norma', 'kvota'),
(5207, 'Graiku mitologijoje - menulio personifikacija', 'selene'),
(5208, 'Lygi vieta', 'lyguma'),
(5209, '1975-77 mf-1 cempionas', 'lauda'),
(5210, 'Lektuvo skrydziu duomenis fiksuojantis prietaisas', 'juodoji deze'),
(5211, 'Atminties praradimas', 'amnezija'),
(5212, 'Miestas, kuriame yra ilgiausias tiltas lietuvoje', 'jurbarkas'),
(5213, 'P.amerikos muzikinis instrumentas is dziovintos ropes', 'kavasa'),
(5214, 'Strukturinis ir funkcinis inksto vienetas', 'nefronas'),
(5215, 'Sventasis, gyvenes kristaus laikais, fariziejus, del savo issilavinimo vadintas izraelio mokytoju', 'nikodemas'),
(5216, '2001 m\"radiocentro\" metu atlikejas', 'deivis'),
(5217, 'Kas pirma karta lietuvoje atliko aukstojo pilotazo figura \"mirties kilpa\"', 'dobkevicius'),
(5218, 'Pirmojo automobilio su vidaus degimo varikliu autorius', 'bencas'),
(5219, 'Zymus rusu dalinininkas - marinistas', 'aivazovskis'),
(5220, 'Dvi raides, reiskiancios viena grasa, pvzlietuviska ch', 'digrafas'),
(5221, 'Religijoje vardas reiskiantis \"daugybes tautu tevas\"', 'abraomas'),
(5222, 'Nesavanaudiskas rupinimasis kitu gerove', 'altruizmas'),
(5223, 'Muzikinis dramos kurinys', 'opera'),
(5224, 'Visuomeninis judejimas, atvedes prie lietuvos nepriklausomybes atstatymo', 'sajudis'),
(5225, 'Wnba komanda is indianos', 'fever'),
(5226, 'Bloga ypatybe, trukumas', 'yda'),
(5227, 'Euroligoniu tv laida', 'euroliga'),
(5228, 'Garsus matematikas, dalyvaves olimpinese zaidynese', 'pitagoras'),
(5229, 'Cheminis ar farmacinis produktas, pagamintas laboratorijoje arba fabrike', 'preparatas'),
(5230, 'Mezozojaus eros pirmasis periodas', 'triasas'),
(5231, 'Vokietijos sostine', 'berlynas'),
(5232, 'Indenu kelnes', 'ledzingai'),
(5233, 'Zemynas, is kurio kilo obuolys', 'azija'),
(5234, 'Kaip vadinosi pirmasis pasaulyje radijo serialas: ..seima', 'smitsu'),
(5235, 'Uzeiga kavos megejams', 'kavine'),
(5236, 'Senoves liekana, nesiderinanti prie dabarties, vienos epochos ivykiu priskyrimas kitai, laiko susimaisymas', 'anachronizmas'),
(5237, 'Kanalu miestas italijoje', 'venecija'),
(5238, 'Epinio pasakojimo forma, susijusi su periodines spaudos atsiradimu ir plitimu', 'apybraiza'),
(5239, 'Galvosukis, sudarytas is piesineliu ir kitu zenklu', 'rebusas'),
(5240, 'Lietuviskas siaures vakaru vejo pavadinimas, kitaip vakarinis', 'suominis'),
(5241, 'Mokslas, tiriantis muzika', 'muzikologija'),
(5242, 'Traku kunigaikstis, gedimino sunus', 'kestutis'),
(5243, 'Vienairkle venecijos valtis', 'gondola'),
(5244, 'Zymiausia kavos rusis', 'arabika'),
(5245, 'Metalines kugines formos strypelis, turintis sriegius ne maziau, kaip iki puses savo ilgio', 'medsraigtis'),
(5246, 'Natu rikiuote', 'gama'),
(5247, 'Status ir aukstas juros kranto skardis, susidares del bangu musos', 'klifas'),
(5248, 'Lietuviu zemes drebejimu dievaitis', 'drebkulys'),
(5249, 'Koks gyvunas pavaizduotas gajanos herbe', 'jaguaras'),
(5250, 'Pirmasis grupes \"skamp\" albumas', 'angata'),
(5251, 'Empiriskai ir teoriskai patikrintu bei pagristu ziniu sistema apie kuria nors tikroves sriti ar visata', 'mokslas'),
(5252, 'Salis, kurioje vyko konkursas \"eurovizija 2001\"', 'danija'),
(5253, 'Kokia garsi moteris sakydavo: \"moteris, kuri nesikvepina, neturi ateities\" [liet.]', 'sanel'),
(5254, 'Valstybes pajamu ir islaidu samata nustatytam laikui', 'biudzetas'),
(5255, 'Mazasis arklio giminaitis', 'ponis'),
(5256, 'Pagrindinis visu organizmu sandaros ir vystymosi vienetas, maziausias gyvo organizmo vienetas', 'lastele'),
(5257, 'Liepos 23 - rugpj??io 22 dienos zodiako zenklas', 'liutas'),
(5258, 'Meteoru srautas, kurio radiantas yra liuto zvaigzdyne', 'leonidai'),
(5259, 'Raitoji kariuomene', 'kavalerija'),
(5260, 'Vienos medziagos sluoksnis', 'klodas'),
(5261, 'Dangaus sferos taskas, kurio link juda kosmkunas', 'apeksas'),
(5262, 'Aspirino isradejas', 'hofmanas'),
(5263, 'Literaturos ir tautosakos mokslu visuma', 'filologija'),
(5264, 'Karalius, kuris 1430 m., planuodamas kryziaus zygi i sirija, ikure aukso vilnos ordina: pilypas ...', 'gerasis'),
(5265, 'Visuotinai privaloma taisykle, uztikrinama valstybes prievarta', 'teises norma'),
(5266, 'Panasus daiktas, atitikmuo', 'analogas'),
(5267, 'Koks dabartinis miestas seniau buvo vadinamas snieckumi', 'visaginas'),
(5268, 'Automobiliu gamintojas isleides siuos modelius: vitara, alto, jimmy', 'suzuki'),
(5269, 'Salis, is kurios miestelio vichy yra kiles musuose geriamas to paties pavadinimo mineralinis vanduo', 'prancuzija'),
(5270, 'Rusijos krepsinio superlygos klubas is sankt peterburgo', 'spartak'),
(5271, 'Pirmasis svyturys pasaulyje, vienas is 7 pasaulio stebuklu, iskiles faro saloje, veliau sugriautas zemes drebejimo', 'aleksandrijos'),
(5272, 'Koks daiktas krikscioniskame mene laikomas proto ir tiesos simboliu', 'veidrodis'),
(5273, 'Trumpas grozines prozos kurinio zanras; noveles atmaina', 'apsakymas'),
(5274, 'Oficialus piniginio vieneto vertes sumazinimas', 'devalvacija'),
(5275, 'Jezaus motina', 'marija'),
(5276, 'Svetimsalis ir paleistas i laisve vergas senoves graikijoje', 'metekas');
INSERT INTO `vikte_klsm` (`id`, `klsm`, `ats`) VALUES
(5277, 'Mazas apskritas pastatas', 'rotonda'),
(5278, 'Senoves graiku gyvenamojo namo dalis, skirta vyru susiejimams', 'andronas'),
(5279, 'Nesisteminis biralu ir skyscio turio vienetas', 'buselis'),
(5280, 'Gaivinamasis gerimas, gaminamas is atsaldyto vaisiu ar uogu nuoviro su cukrumi', 'morsas'),
(5281, 'Sukneles ar palaidines iskirpte aplink kakla', 'dekolte'),
(5282, 'Priedas prie sutarties, pakeiciantis ar papildantis kai kurias jos salygas', 'adendas'),
(5283, 'Is keliu salu sudarytas galapagu salynas', '13'),
(5284, 'Dirvozemyje labiausiai paplites smektitu grupes molio mineralas', 'montmorilonitas'),
(5285, 'Koks olandijos futbolo klubas 1995 mzurnalo \"world soccer\" apklausos metu pripazintas geriausia pasaulio futbolo komanda', 'ajax'),
(5286, 'Bevaliskumas, liguistas valios netekimas', 'abulija'),
(5287, 'Hinduizmo doktrina, skelbianti, kad meile, atsidavimas dievui yra tiesus kelias i issivadavima', 'bhaktis'),
(5288, 'Kiek dienu gyveno zmogus, kuriam pirma kart istorijoje buvo persodinta sirdis', '18'),
(5289, 'Vienas daiktas, kaip pavyzdys, is daugelio tokiu pat daiktu', 'egzempliorius'),
(5290, 'Zemes pavirsiaus taskas, esantis tiesiai virs zemes drebejimo zidinio', 'epicentras'),
(5291, 'Turtingiausio pasaulio zmogaus vardas', 'bilas'),
(5292, 'Rankrastine ar spausdintine knyga, irista i viena toma su kitais leidiniais', 'aligatas'),
(5293, 'Is kito galo ir be tarpo: \"o zirgus\"', 'sugrizo'),
(5294, 'Teismines psichologijos saka, kurios objektas yra nukentejusiojo asmenybe', 'viktimologija'),
(5295, 'Kaip kitaip yra vadinamas anglies dioksidas [vnsvard.]', 'sausasis ledas'),
(5296, 'Zygimanto augusto zmona', 'barbora radvilaite'),
(5297, 'Konfilktu vengimas', 'egresija'),
(5298, 'Apsisaugojimas nuo raupu', 'varioliacija'),
(5299, 'Futbolo zaidejas, padedantis gynejams', 'saugas'),
(5300, 'Mediniai remai, aptempti paveikslo drobe', 'poremis'),
(5301, 'Vienintele salis, su kuria ribojasi danija', 'vokietija'),
(5302, 'Kaip vadinosi romenu kariuomenes dalis', 'legionas'),
(5303, 'Jos nepadaro tik tas, kuris nieko nedirba', 'klaida'),
(5304, 'Garsiausias graiku skulptorius sukures ir olimpiecio dzeuso statula', 'fidijas'),
(5305, 'Anglu chemikas, atrades elektromagnetines indukcijos desni', 'faradejus'),
(5306, 'Visiskas suzlugimas, bankrotas', 'krachas'),
(5307, 'Televizijos zaidimas: \"kas laimes ..\"', 'milijona'),
(5308, 'Lengva persalimo liga', 'sloga'),
(5309, 'Sagos kilpa vyrisko svarko atlape, i kuria segama gele, zenklelis ir kt.', 'butonjere'),
(5310, 'Atskyrimas nuo baznycios', 'ekskomunikacija'),
(5311, 'Sparnuotasis arklys', 'pegasas'),
(5312, 'Sutartis, itvirtinanti asmenine ir materialine priklausomybe nuo globejo - vasalo nuo senjoro ir valstiecio nuo feodalo', 'komendacija'),
(5313, 'Senoves lietuviu mitologijoje - mirusiuju buveine', 'dausos'),
(5314, 'Letas sirdies susitraukimu ritmas, maziau nei 60 kartu per minute', 'bradikardija'),
(5315, 'Lietuviu misko (giraites) dievas', 'girstis'),
(5316, 'Nyderlandu tapytojas (1872-1944m.) \"kompozicija a\", \"sidabrinis medis\", \"zydintis medis\" autorius', 'mondrialas'),
(5317, 'Monarcho rinkimai pasibaigus valdanciajai dinastijai', 'elekcija'),
(5318, 'Rasytojas, romanu \"vezio palata\", \"pirmajame rate\", \"gulago archipelagas\", apysakos \"viena ivano denisoviciaus diena\" autorius (liet.)', 'solzenicinas'),
(5319, 'Padidejes ir perdetas troskimas lytiskai santykiauti ir po santykiu isliekantis nepasitenkinimo jausmas', 'erotomanija'),
(5320, 'Kuriais metais detroite pagamintas pirmasis \"cadillac\" markes automobilis', '1902'),
(5321, 'Dvasininkas skleidziantis religija ivairiose pasaulio salyse', 'misionierius'),
(5322, 'Auksciausioji materijos egzistavimo forma', 'gyvybe'),
(5323, 'Juru plesikas', 'piratas'),
(5324, 'Mokslininkas 1678 msukures bangine sviesos teorija', 'heigensas'),
(5325, 'Fotografu zargonu - stovas', 'statyvas'),
(5326, 'Drasa kitaip', 'narsa'),
(5327, 'Kuriais metais buvo nusautas jav prezidentas j.fkenedis', '1963'),
(5328, 'Didziausias leistinas greitis automagistraleje vilnius - panevezys', '130'),
(5329, 'Populiari liaudies daina ir sokis, kile is trinidado', 'kalipsas'),
(5330, 'Rusijoje, petro i laikais, baznytinis susirinkimas, kuris priklause nuo caro', 'sinodas'),
(5331, 'Pasiulymas sudaryti sutarti', 'oferta'),
(5332, 'Kalva netoli jeruzales, kur buves nukryziuotas jezus kristus', 'golgota'),
(5333, 'Mokslas, tiriantis zemelapiu ir gaubliu savybes, ju sudaryma, spausdinima ir naudojima', 'kartografija'),
(5334, 'Didziausia pasaulio sala', 'grenlandija'),
(5335, 'Koks vandenynas yra silciausias', 'indijos'),
(5336, 'Savo isvaizda panasi i zmogu saknis, kuriai viduramziais buvo priskiriamos stebuklingos savybes', 'mandragora'),
(5337, 'Filosofas, rasytojas, oratorius, grozines lotynu kalbos kurejas', 'ciceronas'),
(5338, 'Kaip romenai vadindavo kartaginiecius', 'punais'),
(5339, 'Prekybos atstovu ir banku atliekamas moketinu sumu isieskojimas pagal vekselius, cekius, akredityvus arba saskaitas', 'inkaso'),
(5340, 'Viena virves saka', 'vija'),
(5341, 'Senoji indijos kalba, artima lietuviu kalbai', 'sanskritas'),
(5342, 'Skulptorius, dzeuso statulos olimpijoje, atenes partenes, atenes promaches atenu akropolyje autorius', 'feidijas'),
(5343, 'Italu kompozitorius, operu \"manon lesko\", \"bohema\", \"toska\", \"madam baterflai\" autorius', 'pucinis'),
(5344, 'Mitinio herojaus tantalo dukte, kuri neteko 12 savo vaiku ir veliau buvo paversta uola', 'niobe'),
(5345, 'Priesdelis, naudojamas su kokio nors dydzio matavimo vienetu, reiskia 10^-9', 'nano'),
(5346, 'Birzos sanderiu tarpininkas', 'makleris'),
(5347, 'Bangladeso pagrindinis pinigas', 'taka'),
(5348, 'Krikscioniu baznycioje - sventa vieta su tam tikros formos stalu (lotmensa), prie kurio kunigas per pamaldas meldziasi ir aukoja misiu auka', 'altorius'),
(5349, 'I kelias laiko juostas susikirstyta zeme', '24'),
(5350, 'Kinu religija, kuri remiasi lao dze  filosofijos traktuote', 'daosizmas'),
(5351, 'Dusiklis - itaisas muzikos instrumentu garsui slopinti', 'surdina'),
(5352, 'Vabzdys, kuris girdi kojomis', 'ziogas'),
(5353, 'Giliausias japonijos ezeras (yra honsiu saloje)', 'tadzava'),
(5354, 'Dazniausiai lyrinio monologo forma parasytas kurinys, tematiniu poziuriu susijes su piemenu, zemdirbiu, zveju, medziotoju buitimi', 'idile'),
(5355, 'Misle: maza maza karvele, gardus saldus pienelis', 'bite'),
(5356, 'Chromosomas sudaranti pagrindine lasteles branduolio medziaga', 'chromatinas'),
(5357, 'Nuogo kuno kultas', 'nudizmas'),
(5358, 'Spalva, kuria nudazyti propano ir butano pripildyti balionai', 'raudona'),
(5359, 'Asmenys arba ju grupes, kurie uzsienio valstybiu nurodymu vykdo divesrijas: sprogdina tiltus, gelezinkelius, gadina irengimus fabrikuose, naikina maisto atsargas ir kt[dgs.]', 'diversantai'),
(5360, 'Senoves graiku mitologijoje- saules dievo helijo dukte, kretos karaliaus mino zmona', 'pasifaje'),
(5361, 'Cirko aikstele, centas, kur vyksta veiksmas', 'arena'),
(5362, 'Kompiuteriniai virusai kuriu kiekviena kopija skiriasi nuo savo pirmtako', 'polimorfiniai'),
(5363, 'Kiauliu tvartas', 'kiaulide'),
(5364, 'Kas pirmasis lietuvoje pradejo kasineti piliakalnius', 'poska'),
(5365, 'Automobiliu kelio ir gelezinkelio sankirta viename lygyje', 'pervaza'),
(5366, 'Svajingo turinio kurinys', 'idile'),
(5367, 'Makedonijos administracinis vienetas', 'apygarda'),
(5368, 'Senoves graiku mitologijoje - ugnimi alsuojanti pabaisa liutes galva, angies uodega ir ozkos liemeniu', 'chimera'),
(5369, 'Anglu gitaristas ir dainininkas, vienas zymiausiu bliuzo virtuozu, isgarsejes balade \"layla\" [orig.]', 'clapton'),
(5370, 'Kokia kompanija gamina visureigius \"hummer\"', 'amg'),
(5371, 'Lenkijos piniginis vienetas', 'zlotas'),
(5372, '\"stepiu vilko\" autorius', 'hese'),
(5373, 'Miestas, kuriame 1863 metais pastatytas pirmasis metro', 'londonas'),
(5374, 'Kepinys is miltu, cukraus, kiausiniu ir kt., daznai naudojamas tortu ir pyragaiciu gamyboje', 'biskvitas'),
(5375, 'Ezeras alytuje; pavadinimas sutampa su profesijos pavadinimu', 'dailide'),
(5376, 'Vyriausias senoves egipto valstybes tarnautojas, atlikdaves visas administracines faraono funkcijas, isskyrus religines', 'viziris'),
(5377, 'Didziausias rubu dydis', 'xxxl'),
(5378, 'Zmoniu elgesi apsprendziancios istoriskai susiklosciusios pastovios socialines nuostatos, tautos kulturos dalis', 'paprociai'),
(5379, 'Labiausiai i siaure nutoles atarktidos taskas: ..kysulys', 'sifres'),
(5380, 'Vidutine (centrine) atsitiktinio dydzio reiksme', 'mediana'),
(5381, 'Antra pagal dydi britanijos archipelago sala', 'airija'),
(5382, 'Kas buvo pirmasis jav prezidentas, gimes ligonineje', 'karteris'),
(5383, 'Architektas, suprojektaves barselonos sventosios seimos katedra, pradeta statyti nuo 1883 m[orig.]', 'gaudi'),
(5384, 'Jav prezidentas, \"sudalyvaves\" watergate skandale', 'niksonas'),
(5385, 'Romanu tauta, gyvenanti pietineje karpatu dalyje ir prie juodosios juros', 'rumunai'),
(5386, 'Patalpa, kurioje skrodziami lavonai', 'prozektoriumas'),
(5387, 'Statulos papede, pagrindas, postamentas', 'pjedestalas'),
(5388, 'Didziausias saturno palydovas, kurio pavadinimas kilo nuo graiku zemes deives gajos ir dangaus dievo urano vaiku bendro vardo', 'titanas'),
(5389, 'Sent liusijos administracinis vienetas', 'parapija'),
(5390, 'Suvokimo budas', 'mentalitetas'),
(5391, 'Rusu snaiperio, vaizduojamo filme \"priesas uz vartu\", pavarde', 'zaicevas'),
(5392, 'Plokstele kumscio smugiui sutvirtinti', 'kastetas'),
(5393, 'Svarbaus ivykio sukaktis; iskilmingas sios sukakties minejimas', 'jubiliejus'),
(5394, 'Jav valstija, 10-a pagal uzimama teritorija [liet.]', 'oregonas'),
(5395, 'Kada buvo ivesta valaku reforma', '1557'),
(5396, 'Kaktusu degtine', 'tekila'),
(5397, 'Graiku mitlogijoje - pozemio pasaulio asaru upe', 'kocitas'),
(5398, 'Semitu tautu derlingumo, motinystes ir meiles deive', 'astarte'),
(5399, 'Upe, tekanti per kursenus', 'venta'),
(5400, 'Elektrines grandines itaisas, ijungiantis bei atjungiantis elektros srove', 'rele'),
(5401, 'Dokumentinis, arba fakto literaturos, zanras, zmogaus gyvenimo aprasymas nuo gimimo iki mirties', 'biografija'),
(5402, 'Mozambiko pagrindinis pinigas', 'metikalis'),
(5403, 'Seniausiu laiku graikijos karaliaus titulas [vns.]', 'anakas'),
(5404, 'Plona, minksta oda, isdirbama daugiausia is ozku, reciau aviu odos', 'tymas'),
(5405, 'Kaune dirbes japonu diplomatas, 1940 mnuo mirties isgelbejes kelis tukstancius zydu', 'sugihara'),
(5406, 'Kas 1959 ir 1960 metais tapo f-1 pasaulio cempionu [liet.]', 'brabhamas'),
(5407, 'Kada imperatorius konstantinas perkele imperijos sostine is romos i konstantinopoli', '330'),
(5408, 'Didelis sonatinio ciklo formos kurinys simfoniniam orkestrui', 'simfonija'),
(5409, 'Rusu fantastine butybe, labai maza, nematoma moterele, gyvenanti uz krosnies, verpianti ir audzianti', 'kikimora'),
(5410, 'Garso magnetinio irasymo ir atgaminimo prietaisas', 'magnetofonas'),
(5411, 'Simbolinis nepalo sostines katmandu pavadinimas, \"pravarde\"', 'varpu miestas'),
(5412, 'Graiku mitologijoje - menulio deive', 'selene'),
(5413, 'Zymiausia (pagal pavadinima) p.amerikos plesrioji zuvis', 'piranija'),
(5414, 'Silkverpio kiausiniai, is kuriu silkverpiu augintojai isaugina viksrus', 'grena'),
(5415, 'Eritrocituose deguoni prisijungianti medziaga', 'hemoglobinas'),
(5416, 'Sasiauris jungiantis azovo ir juodaja juras', 'kerces'),
(5417, 'Norvegijos parlemento storlingo aukstesnieji rumai', 'latingas session'),
(5418, '4-mete amazones zuvis', 'arapaima'),
(5419, 'Pirminis variklis su sukamuoju darbo organu - rotoriumi, verciantis kinetine darbo kuno (garo, duju, vandens) energija mechaniniu darbu', 'turbina'),
(5420, 'Saviskambiai muzikos instrumentai, kuriu garsas susidaro smugiu suvirpinus instrumenta arba jo dali', 'idiofonai'),
(5421, 'Keliaujantis prekybos firmos atstovas, siulantis prekes pagal turimu pavyzdziu katalogus', 'komivojazierius'),
(5422, 'Salis, kurios valiutos sutrumpinimas chf', 'sveicarija'),
(5423, 'Mokinys, pasilikes kartoti kurso antra karta', 'antrametis'),
(5424, 'Pirmosios spausdintos ldk istorijos autorius', 'strijkovskis'),
(5425, 'Asmuo, esantis ant 200 litu banknoto', 'vydunas'),
(5426, 'Kompanija, pagaminusi mobiliu telefonu modelius: wa 3050, mw 3040, mw 3020, mc 3000', 'sagem'),
(5427, 'Tarptautine kalnu diena', 'gruodzio 11'),
(5428, 'Sumanymas ir pasiulymas pradeti kokia nors veikla', 'iniciatyva'),
(5429, 'Su kokia rugstimi siejamas vitaminas b9', 'folio'),
(5430, 'Kraujagysle, kuria kraujas teka is audiniu ir organu i sirdi', 'vena'),
(5431, 'Apatine istrizoji bizanstiebio bure', 'bizanis'),
(5432, 'Senegalo siaurine kaimyne', 'mauritanija'),
(5433, 'Pats galantiskiausias arturo dvaro riteris, grieztas riterystes salininkas ir sero lanseloto priesas', 'gaveinas'),
(5434, 'Tas, kas is metalo', 'metalinis'),
(5435, 'Karinis traukinys', 'eselonas'),
(5436, 'Koki skaiciu atitinka romeniskasis \"m\"', '1000'),
(5437, 'Didziausi klavisai yra enter ir ...', 'space'),
(5438, 'Lietuvos valstybes atkurimo diena', 'vasario 16'),
(5439, 'Kroicfeldo-jakobo ligos sukelejai', 'prionai'),
(5440, 'Primityviausias vienalastis', 'pirmuonis'),
(5441, 'Organizmuose esantys dideles molekulines mases junginiai, pvz., baltymai, nukleorugstys', 'biopolimerai'),
(5442, 'Oranzerija kitaip: ziemos ...', 'sodas'),
(5443, 'Koks zymus zmogus pasake: \"nera prasmes prisiminti praeiti, jei ji neturi itakos dabarciai\"', 'dikensas'),
(5444, 'Senoves graiku mitologijoje - heraklio nukautas daugiagalvis milzinas, kuriam, nukirtus viena galva, isaugdavo dvi naujos', 'hidra'),
(5445, 'Asmens kreipimasis i teisma ar kita kompetetinga organa savo pazeistai ar gincijamai teisei arba istatymo saugomam interesui apginti', 'ieskinys'),
(5446, 'Uzdara plokscia kreive, kuria brezia apskritimo, riedancio be slydimo tokio pat apskritimo isorine puse, taskas', 'kardioide'),
(5447, 'Valstybiniu pareigu naudojimas asmeniniam pasipelnymui', 'korupcija'),
(5448, 'Stiprus ir ilgai trunkantis artilerijos saudymas', 'kanonada'),
(5449, 'Trys vieno zaidejo ivarciai per vienerias rugtynes', 'hat trick'),
(5450, 'Nedidelis motorlaivis', 'kateris'),
(5451, 'Salis, kurioje atidarytas pirmasis pasaulyje kaimo architekturos ir buities muziejus po atviru dangumi', 'svedija'),
(5452, 'Ilgiausia upe tekanti brazilijoje', 'amazone'),
(5453, 'Vasko tapyba', 'enkaustika'),
(5454, 'Kulturos vertybiu naikintojas', 'vandalas'),
(5455, 'Prietaisas jegai matuoti', 'dinamometras'),
(5456, 'Laikinas cheminio elemento, kurio simbolis \"uup\" [numeris 115] pavadinimas', 'ununpentis'),
(5457, 'Fasizmui priesingas judejimas, jo idejos', 'antifasizmas'),
(5458, 'Odos gumbas ties virsutiniu akiduobes krastu, apauges tankiais, trumpais, stangriais, palinkusiais plaukais', 'antakis'),
(5459, 'Mongolijos smulkus pinigas', 'mungus'),
(5460, 'Nepavykes biliardo smugis: lazda tik slysteli rutuliu', 'kiksas'),
(5461, 'Senoves romoje - bet kuri renkamoji valstybine pareigybe ir ja uzimantis zmogus', 'magistratas'),
(5462, 'Tamsiai rudi skaidrus akvareliniai dazai', 'bistras'),
(5463, 'Funkcija, kurios reiksme tam tikroje srityje ne didesne uz turimos funkcijos reiksmes', 'minorante'),
(5464, 'Proporcingai sumazintas automobilio pavyzdys', 'automodelis'),
(5465, 'Xx apradzios prancuzu skulptorius, kures savitas, nuo realaus vaizdo nutolusias kompozicijas; pasizymejes plastisku formu apibendrintu vaizdu', 'arpas'),
(5466, 'Smulkiausia arterija', 'arteriole'),
(5467, 'Trubaduru ryto daina, kurios pagrindinis motyvas - atsisveikinimas su mylimaja austant', 'alba'),
(5468, 'Fizikoje - garsintuvas', 'ruporas'),
(5469, 'Labai smulkios kvietines kruopos', 'manai'),
(5470, 'Amerikieciu kino aktorius, vaidines filmuose \"geismu tramvajus\", \"laukinis\", \"krantine\"', 'brando'),
(5471, 'Kiek kartu uz save sunkesni daikta gali pakelti skruzdele', '50'),
(5472, 'Ikonu arba paveikslu su jezaus kristaus, marijos ir sventuju atvaizdais priesininkas', 'ikonoklastas'),
(5473, 'Slapta patriotine antiispaniska filipinieciu organizacija, veikusi 1892-1897 m.', 'katipunanas'),
(5474, 'Egipto saules dievas', 'ra'),
(5475, 'Koks gyvunas krikscioniu literaturoje ir daileje yra pykcio, gaslumo, suktumo ir apskritai nuodemiu simbolis', 'bezdzione'),
(5476, 'Valstybes pilieciu balsavimas labai svarbiu valstybes politkos klausimu', 'plebiscitas'),
(5477, 'Ldk valstybe zemes valda, is kurios pajamos ejo lenkijos karaliui', 'ekonomija'),
(5478, 'Operos, baleto ar ciklinio kurinio izanga; vienos dalies kurinys orkestrui', 'uvertiura'),
(5479, 'Airiu dramaturgas, poetas ir rasytojas, 1900 mmires skurde ir visu pasmerktas uz savo homoseksualuma [liet.]', 'vaildas'),
(5480, 'Zurnalisto pokalbis su asmenimi, skirtas spaudai, radijui ar televizijai', 'interviu'),
(5481, 'Rimto turinio pjese', 'drama'),
(5482, 'Klasiniu ir politiniu priesininku slopinimo politika, palaikoma smurto, prievartos (iki fizinio sunaikinimo) priemonemis', 'teroras'),
(5483, 'Dejavimas arba ...', 'aimana'),
(5484, 'Nuo kalnu griuvanti sniego mase', 'lavina'),
(5485, 'Keliu prieziuros ir zemes kasimo masina, kurios darbo organas - paslankus verstuvas su peiliu', 'greideris'),
(5486, 'Prietaisas oro tankiui matuoti', 'manometras'),
(5487, 'Buvusi kedainiu chemijos gamykla', 'lifosa'),
(5488, 'Italu kompozitorius, 26 operu (tarp ju \"nabuko\", \"rigoleto\", \"otelo\", \"don karlo\") autorius', 'verdis'),
(5489, 'Baigiamoji operos arijos dalis', 'kabalete'),
(5490, 'Rasytojas, romanu \"broliai karamazovai\", \"nusikaltimas ir bausme\", \"baltosios naktys\", \"idiotas\", \"losejas\", \"pazemintieji ir nuskriaustieji\" autorius (liet.)', 'dostojevskis'),
(5491, 'Matematikoje - laipsnio rodiklis', 'eksponente'),
(5492, 'Pasizymintis santuriu elgesiu', 'rimtas'),
(5493, 'Viduramziais - visu pirenu pusiasalyje ir safrikos vdalyje gyvenusiu musulmonu, kalbanciu arabu ktarmemis, pavadinimas', 'maurai'),
(5494, 'Senoves graiku mitologijos personazas - trakijos dainius, muzos kaliopes sunus', 'orfejas'),
(5495, 'Bendras gyvenimas neiregistravus santuokos', 'partneryste'),
(5496, 'Kurios nors valstybes pilieciu apgyvendinta vieta svetimoje salyje', 'kolonija'),
(5497, 'Salman rushdie romanas \"paskutinis mauro ...\"', 'atodusis'),
(5498, 'Uzkerta kelia epidemijai', 'karantinas'),
(5499, 'Hinduizme - dievybes isikunijimas i fizini kuna (nebutinai zmogaus)', 'avatara'),
(5500, 'Kaip iki 1796mbuvo vadinama tenesio valstija', 'franklinas'),
(5501, 'Austru kompozitorius, vienos klasikines mokyklos atstovas, daugiau kaip 100 simfoniju (tarp ju \"atsisveikinimo\"), 14 misiu, oratoriju, kitu kuriniu instrumentiniams ansambliams autorius', 'haidnas'),
(5502, 'Birmos sostine', 'rangunas'),
(5503, 'Cheminis elementas, kurio simbolis \"al\" [numeris 13]', 'aliuminis'),
(5504, 'Senovinis primityvus dviracio plugo tipas su tiesiu, staciai pastatytu mediniu verstuvu', 'sabanas'),
(5505, 'Hipotetine elementarioji dalele, skriejanti didesniu uz sviesa greiciu', 'tachionas'),
(5506, 'Jugoslavijos administracinis vienetas iki 1946 metu', 'banovina'),
(5507, 'Metaline forma daugkartiniam metaliniu gaminiu liejimui', 'kokile'),
(5508, 'Kartus prieskonis', 'pipiras'),
(5509, 'Valstybe kuria is visu pusiu supa par', 'lesotas'),
(5510, 'Ceku rasytojas ir politinis veikejas, dramu \"svente sode\", \"pranesimas\" autorius', 'havelas'),
(5511, 'Romano \"prarasto laiko beieskant\" autorius: marselis ...', 'prustas'),
(5512, 'Malavio sostine', 'lilongve'),
(5513, '\"iskirpte\" kitaip', 'dekolte'),
(5514, 'Zigzag in-line packages', 'zip'),
(5515, 'Stambaus zemvaldzio sodyba su gyvenamaisiais, ukiniais ir gamybiniais pastatais', 'dvaras'),
(5516, 'Izulus viesosios tvarkos pazeidejas', 'chuliganas'),
(5517, 'Kaimo uzeigos namai, kuriuose prekiaujama svaigiaisiais gerimais', 'smukle'),
(5518, 'Valstybe, 2002 metais tapusi afrikos futbolo cempione', 'kamerunas'),
(5519, 'Zygimanto augusto dinastija', 'jogailaiciai'),
(5520, 'Ka atrado rusu mokslininkas (fizikas) b.jakobis', 'galvanoplastika'),
(5521, 'Rusijos revoliucionierius, anarchizmo ir narodnikystes teoretikas', 'bakuninas'),
(5522, 'Valstybes administracijos pareigunas, pasiustas i kita valstybe atstovauti pirmosios organizacijoms ir pilieciams', 'konsulas'),
(5523, 'Piesinys vienoje atlankoje su knygos tituliniu lapu', 'frontispisas'),
(5524, 'Filosofiniu, moksliniu, religiniu ir kitu teoriju, ideju skleidimas, siekiant jomis ugdyti, veikti zmoniu paziuras, nuotaikas, skatinti tam tikrus veiksmus', 'propaganda'),
(5525, 'Pirmasis fifa prezidentas', 'rime'),
(5526, 'Autorius, kurio 13 nuotykiniu romanu herojus buvo dzeimsas bondas', 'flemingas'),
(5527, 'Kinietiskas burlaivis', 'dzonka'),
(5528, 'Kaip judaistai vadina dievo apreiskima - mozes istatyma', 'tora'),
(5529, 'Didziausias italijos ezeras', 'garda'),
(5530, 'Laisvai plaukiojanti blakstienota lerva', 'aktilule'),
(5531, 'Koks gyvunas gali greitai pakeisti savo spalva', 'chameleonas'),
(5532, 'Svieciamojo pobudzio menininku klubas, 1919-20 mveikes kaune', 'vilkolakis'),
(5533, 'Septynioliktasis jav prezidentas', 'dzonsonas'),
(5534, 'Kenksmingu vabzdziu ir erkiu naikinimas', 'dezinsekcija'),
(5535, '15-a valstija, prijungta prie jav 01.06.1792 m., sostine frankfortas [liet.]', 'kentukis'),
(5536, 'Paausio seiliu liauku uzdegimas', 'parotitas'),
(5537, 'Idealios, praktiskai neigyvendinamos visuomenes santvarkos projektas', 'utopija'),
(5538, 'Didelis menulio krateris nematomoje is zemes puseje, netoli pasigalio', 'zemanas'),
(5539, 'Plukdomi rastai', 'sielis'),
(5540, 'Japonijos budistu sventykla', 'tera'),
(5541, 'Kas tapo 2002m\"robinzonu\"', 'rimas'),
(5542, 'Kuriais metais iteisinta pirmoji standartizuota kelio zenklu sistema', '1903'),
(5543, 'Savaites diena, kurios pavadinimas kilo nuo menulio pavadinimo', 'pirmadienis'),
(5544, 'Bendravimo rusis - bendravimas garsines kalbos priemonemis', 'kalbejimas'),
(5545, 'Koks zymus zmogus pasake: \"nuo meiles yra visokiu vaistu, bet nera ne vieno patikimo\"', 'larosfuko'),
(5546, 'Dezute muilui laikyti', 'muiline'),
(5547, 'Bibliotekininkystes mokslo disciplina, kurios tyrimo objektas yra skaitymas ir skaitytojai', 'lektologija'),
(5548, 'Kaip vadinama reforma, kuri grieztai atskyre dvasine ir pasaulietine valdzia', 'kliuni'),
(5549, 'Kolonos tipas, kai si turi savo sudedamaja dali - voliuta', 'joneninis'),
(5550, 'Keliu arba per', 'via'),
(5551, 'Juru zemelapiai, naudoti xiii - xvii a., daugiausia vidurzemio juros laivyboje [dgs.]', 'portulanai'),
(5552, 'Lietuviu rasytojas, pasakeciu \"lape ir juodvarnis\", \"lape ir zasys\", \"zmogus ir levas\", \"aitvarai\", \"arklys ir meska\", \"erelis, karalius pauksciu, ir gudrybe karaliuko\" autorius', 'stanevicius'),
(5553, 'Didziausia kanaru sala', 'tenerife'),
(5554, 'Dirbtinis apvaisinimas, patino seklos ileidimas i pateles lytinius takus', 'seklinimas'),
(5555, 'Siizmo ispazinejai', 'siitai'),
(5556, 'Styginis rusu liaudies instrumentas, turintis 3 stygas, trikampi korpusa, skambinamas pirstais', 'balalaika'),
(5557, 'Trintu darzoviu arba vaisiu tyre', 'piure'),
(5558, 'Menkiau issivysciusios salys, kuriose nera ispletota pramonine gamyba ir ekonomika', 'periferija'),
(5559, 'Daugiabalses imitacines muzikos forma, sios formos muzikinis kurinys', 'fuga'),
(5560, 'Didele menulio lyguma, kurioje buvo nusileidusios apollo-12 (1969 m.) ir apollo-14 (1971 m.) ekspedicijos', 'audru vandenynas'),
(5561, 'Firma, pagaminusi pirmaji spalvoto kopijavimo aparata', '3m'),
(5562, 'Rusu kompozitorius, baletu \"gulbiu ezeras\", \"spragtukas\", \"miegancioji grazuole\" autorius', 'caikovskis'),
(5563, 'Tasytas staciakampio gretasienio pavidalo akmuo', 'kvadras'),
(5564, 'Telekomunikaciju kompanija, pagaminusi mobiliu telefonu modelius: 9210 communicator, 3310, 8890, 8210', 'nokia'),
(5565, 'Masina galvoms kirsti', 'giljotina'),
(5566, 'Infekcines gyvuliu ir pauksciu ligos tam tikroje vietoveje isplitimas', 'epizootija'),
(5567, 'Formule, pagal kuria skaiciuojamas dvinaris pakeltas bet kuriuo laipsniu', 'niutono binomo'),
(5568, 'Architektas, ankstyvojo klasicizmo atstovas; kartu su lstuoka-guceviciumi projektavo imasalskio rumus verkiuose', 'knakfusas'),
(5569, 'Salis, kurioje atsirado sporto saka klasikines imtynes', 'prancuzija'),
(5570, 'Viduramziais zemes valda, teikiama uz karine tarnyba su paveldejimo teise', 'feodas'),
(5571, 'Lenku profsajungu bei politinis veikejas, lenkijos prezidentas 1990-1995 m.', 'valensa'),
(5572, 'Smailejancios briaunuotos kolonos pavidalo paminklas', 'obeliskas'),
(5573, '\"fara\" lietuviskai', 'zibintas'),
(5574, 'Humoristine rusu liadies dainele aktualia buities, darbo tema, daznai dialogo formos', 'ciastuska'),
(5575, 'Trinariskumas, trejybe', 'triada'),
(5576, 'Buves ciles diktatorius', 'pinocetas'),
(5577, 'Agurku kilmes salis', 'indija'),
(5578, 'Auksciausias sporto rodiklis, pasiektas oficialiose varzybose', 'rekordas'),
(5579, 'Tankiausiai apgyvendinta indonezijos sala', 'java'),
(5580, 'Pastovus dydis', 'konstanta'),
(5581, 'Kaip vadinami geros kokybes vynai, kurie yra realizuojami po dvieju metu nuo derliaus nuemimo', 'markiniai'),
(5582, 'Zinduolis, kurio piene yra maziausiai baltymu [1,1 g/dl]', 'zmogus'),
(5583, 'Iki 48 puslapiu spausdinta knygute minkstu virseliu', 'brosiura'),
(5584, 'Kokiam tipui biologiskai priklauso liutas', 'chordiniu'),
(5585, 'Perdetas praeities pamegimas, gerejimasis ja; paziuru atsilikimas', 'paseizmas'),
(5586, 'Moteru judejimas uz lygias teisias su vyrais', 'feminizmas'),
(5587, '\"zelionke\" taisyklingai', 'briliantine zaluma'),
(5588, 'Atlikeja, kurios 7 kuriniai is eiles 1985-1988 metais uzeme pirma vieta jav singlu tope: whitney ...', 'houston'),
(5589, 'Zvaigzdziu, galaktiku ir ktkosmobjektu sviesos susilpnejimas del jos absorbcijos, difrakcijos ir sklaidos tarpzvaigzdiniu dulkiu debesyse', 'sugertis'),
(5590, 'Pranciskonas, kurio vadovaujami ispanu misionieriai xvi aviduryje sudegino visas rastas maju rasytines knygas', 'diegas de landa'),
(5591, 'Iskilminga kalba prie stalo', 'tostas'),
(5592, 'Religiju mitologijose - auksciausio rango angelas', 'cherubinas'),
(5593, 'Vertikalusis oro masiu judejimas atmosferoje, atsirandantis del oro temperaturu bei tankio skirtumo', 'konvekcija'),
(5594, 'Rinkliava uz ivezamas ar isvezamas prekes', 'muitas'),
(5595, 'Zmogus, individas', 'asmenybe'),
(5596, '\"lobiu salos\" autoriaus roberto luis stivensono tautybe', 'skotas'),
(5597, 'Kertamasis ar duriamasis ginklas su vienasmene gelezte', 'kalavijas'),
(5598, 'Kosmkuno, veikiamo daugelio kunu traukos, orbitos nuokrypis nuo tos orbitos, kuria jis skrietu, saveikaudamas tik su centrkunu', 'perturbacija'),
(5599, '\"sausa\" antonimas', 'slapia'),
(5600, 'Kas parase \"dievu miskas\"', 'sruoga'),
(5601, 'Kraujo baltymas, profermentas', 'protrombinas'),
(5602, 'Politine grupe, motyvuotai priestaraujanti daugumos nuomonei ar vykdomai vidaus ir uzsienio politikai', 'opozicija'),
(5603, 'Ekvadoro sostine', 'kitas'),
(5604, 'Graikijos-turkijos siena tekanti  upe', 'marica'),
(5605, 'Ketvirtasis metu menuo', 'balandis'),
(5606, 'Knygu \"sinuhe egiptietis\", \"turmsas nemirtingasis\", \"mirties angelas\" autorius', 'waltari'),
(5607, 'Siuvejo irankis', 'adata'),
(5608, 'Daugiausiai gyventoju turinti afrikos valstybe', 'nigerija'),
(5609, 'Tarybu sajungos fizikas, vadovaves pirmosios ssrs atomines bombos (1946 m) sukurimui', 'kurciatovas'),
(5610, '2001 m\"radiocentro\" metu grupe', 'mango'),
(5611, 'Taip vadinamos neuronu jungtys', 'sinapse'),
(5612, 'Galios vienetas, nurodantis per tam tikra laika sunaudotos energijos kieki', 'vatas'),
(5613, 'Skandinavu mitologijoje - graziausias is dievu', 'baldras'),
(5614, 'Baltymas, kurio pagalba galima atkurti telomeras - dnr galus(ttaggg), trumpejancius po mitozes, ir taip pristabdyti senejima', 'telomeraze'),
(5615, 'Eina po a', 'b'),
(5616, 'Lietuviu rasytoja, apsakymu \"petras kurmelis\", \"topylis\", \"suciuptas velnias\", \"sutkai\", apysakos \"prie dvaro\", pjesiu \"trys mylimos\", \"pirslybos\" autore', 'zemaite'),
(5617, 'Tropas, tikrinio vardo pavartojimas bendrine reiksme', 'antonomazija'),
(5618, 'Miestas bavarijoje (vokietija) prie amperio upes, kuriame 1933 misteigta viena is pirmuju hitleriniu koncentracijos stovyklu', 'dachau'),
(5619, 'Menininku kurybine dirbtuve', 'studija'),
(5620, 'Xv-xviii alietuvos metalinis pinigas', 'grasis'),
(5621, 'Pirmasis rudens menuo', 'rugsejis'),
(5622, 'Vienas is vyriausiuju vedizmo dievu - ugnies dievas', 'agnis'),
(5623, 'Blogo nepatyres, gero ...', 'nepazinsi'),
(5624, 'Valstybes tarnautojas arba priklausantis valstybes administracijai', 'biurokratas'),
(5625, 'Kiek minuciu trunka vienas amerikietiskojo futbolo kelinys', '15'),
(5626, 'Bulviu derlius', 'pakasa'),
(5627, 'Kokia diena buvo uzvakar, jei nuo dienos, kuri bus uzporyt, lieka dvi dienos iki sestadienio', 'sestadienis'),
(5628, 'Budizmo pradininkas', 'buda'),
(5629, 'Sio muzikos virtuozo deka 19aantroje puseje suklestejo italu opera', 'verdis'),
(5630, 'Iskilimingas eilerastis, slovinantis reiksminga ivyki, asmeni', 'kantata'),
(5631, 'Staigus paveldimas organizmo genetines medziagos pakitimas, lemiantis naujo organizmo pozymiu atsiradima', 'mutacija'),
(5632, 'Estu nacionalinis paukstis', 'kregzde'),
(5633, 'Kokia rusijos upe anksciau buvo vadinama jajiku', 'uralas'),
(5634, 'Spakainas kitaip', 'ramus'),
(5635, 'Statulele, kasmet iteikiama jav kaip prizas uz geriausia radijo ir televizijos reklama', 'klijo'),
(5636, 'Senoves graiku pietvakariu vejo dievas, atnesantis audras ir lietu', 'afrikas'),
(5637, 'Organizmai, kuriu gyvybinei veiklai reikalingas laisvas deguonis', 'aerobai'),
(5638, 'Trecioji rijimo faze', 'rykline'),
(5639, 'Matavimo vienetas ir viesbucio kambarys', 'liuksas'),
(5640, 'Niujorko rajonas, kuriame gyvena daug negru ir lotynu amerikos gyventoju', 'harlemas'),
(5641, 'Liuksemburgo sostine', 'liuksemburgas'),
(5642, 'Zymiausia nba komanda is los andzelo (angl.)', 'lakers'),
(5643, '\"sprogstantis\" grybas, augantis lietuvoje', 'pumpotaukslis'),
(5644, 'Nekaitoma kalbos dalis, kuri jungia sakinio dalis arba sakinius', 'jungtukas'),
(5645, 'Rasytojas, romanu \"askanijas\", \"dvi karalienes\", \"juodoji tulpe\", \"karaliene margo\", \"po dvidesimties metu\" autorius (liet.)', 'diuma'),
(5646, 'Zmogaus jautrumas itaigai, jo nuostata buti veikiamam, pasiduoti itaigai', 'itaiglumas'),
(5647, 'Mokslininkas 1576-1596 mtiksliai ismataves daugelio zvaigzdziu ir planetu padetis', 'brahe'),
(5648, 'Viii ajaponu poetas rases ilgasias dainas ir tanka', 'akahito'),
(5649, 'Priesakine (viesoji) namo puse', 'fasadas'),
(5650, 'Kokios spalvos yra poliarines meskos oda', 'juodos'),
(5651, 'Draudlakstis, liudijimas, draudimo bendroves duotas ka nors joje apdraudusiam asmeniui ar istaigai', 'polisas'),
(5652, 'Tycia nepastebeti, nepaisyti, nekreipti demesio, neatsizvelgti', 'ignoruoti'),
(5653, 'Snekamoji graiku kalbos forma graikijoje', 'dimotika'),
(5654, 'Keliamoji jega skystyje lygi kuno isstumto skyscio svoriuikieno tai desnis', 'archimedo'),
(5655, 'Prienosiniu anciu uzdegimas', 'sinusitas'),
(5656, 'Sios salies krepsinio rinktine tapo olimpine cempione 2000 metais sidnejuje', 'jav'),
(5657, 'Kiek kartu baltosios nykstukes mase turi buti didesne uz saules mase, kad ivyktu gravitacinis kolapsas ir ji sprogtu kaip i tipo supernova [x,xx]', '1,44'),
(5658, 'Japonu lyrikos zanras - 5 eiluciu 31 skiemens eilerastis', 'tanka'),
(5659, 'Plokscias ketaus padeklas, ant kurio tvirtinama ploksciojo spausdinimo masinos spaudos forma', 'taleris'),
(5660, '12-a valstija, prijungta prie jav 21.11.1789 m., sostine raleigh: siaures ..[liet.]', 'karolina'),
(5661, 'Senojoje skandinavu mitologijoje - griaustinio ir zaibo dievas', 'toras'),
(5662, 'Karo terminas - nedidele teritorija, is kurios numatoma pradeti kitos salies puolima', 'placdarmas'),
(5663, 'Posakio \"o tempora, o mores!\" autorius', 'ciceronas'),
(5664, 'Zirgo greitas suoliavimas', 'galopas'),
(5665, 'Budingas oru rezimas pasikartojantis toje pacioje teritorijoje', 'klimatas'),
(5666, 'Neptuno palydovas, pavadintas senoves graiku juru deives vardu', 'talasa'),
(5667, 'Gamybinis bendroviu susivienijimas, nepanaikinantis ju teisinio savarankiskumo', 'koncernas'),
(5668, 'Dengta galerija', 'pasazas'),
(5669, 'Atstumas nuo siaures asigalio iki pusiaujo palei linija, einancia per paryziu, padalintas is 10 000 000 000', 'metras'),
(5670, 'Popiezius 1922 mpripazines lietuva \"de jure\"', 'pijus ix'),
(5671, 'Krikscionybes tradicijoje pirmosios naujojo testamento evangelijos autorius, vienas is dvylikos apastalu, pries tai buves muitininku kaparnaume', 'matas'),
(5672, 'Kuriais metais neoficialiai issiskyre grupe \"the beatles\"', '1970'),
(5673, 'Valstybe, kurios sostine taskentas', 'uzbekistanas'),
(5674, 'Materialus ziniu saltinis', 'dokumentas'),
(5675, 'Olandu jurininkas, keliautojas, atrades van dimeno zeme (dabar vadinama jo vardu), naujaja zelandija, fidzio salyna', 'tasmanas'),
(5676, 'Berniuku isventinimo i vyrus paprotys, budingas gimininei bendruomenei', 'iniciacija'),
(5677, 'Maldyvu sostine', 'male'),
(5678, 'Losimo namu tarnautojas, kuris seka losima, ismoka islostus ir paima pralostus pinigus', 'krupje'),
(5679, 'Apatinis pedos pavirsius', 'padas'),
(5680, 'Augalai klestintys itin aukstoje temperaturoje (aukstesneje kaip 45???c)', 'termofitai'),
(5681, 'Salis, kurioje atsirado sporto saka fechtavimasis', 'prancuzija'),
(5682, 'Elementarioji dalele, neturinti kruvio', 'neutronas'),
(5683, 'Automobilis su taksometru', 'taksi'),
(5684, 'Kokios kompanijos, gaminancios  misku, sodu ir parku prieziuros masinas, pavadinimas, isvertus i lietuviu kalba, reiskia ???namu malunas???', 'husqvarna'),
(5685, 'Monumentalus antkapinis statinys', 'mauzoliejus'),
(5686, 'Greitai pagyjanti', 'gaji'),
(5687, 'Metu laikas birzelio-rugpjucio menesiais', 'vasara'),
(5688, 'Xx a7-ojo desimtmecio vidurio amerikieciu hipiai, skelbiantys visuotine meile vietoj miescionisko materializmo ir visuotine taika vietoj karo', 'geliu vaikai'),
(5689, 'Pagal krikscionybes tradicija yra sios teologines dorybes: tikejimas, viltis ir ...', 'meile'),
(5690, 'Paveikslas, piesinys, brezinys, fotonuotrauka, isspausdinta leidinyje ir papildanti to leidinio teksta', 'iliustracija'),
(5691, 'Judejos karalius liepes nuzudyti visus kudikius, tikedamasis nuzudyti jezu', 'erodas'),
(5692, 'Gydymas sokio judesiais', 'choreoterapija'),
(5693, 'Futbolo klubas is rudiskiu', 'vetra'),
(5694, 'Muzikoje - prasant, maldaujant', 'pregando'),
(5695, 'Senoves graiku indas vandeniui', 'hidrija'),
(5696, 'Ikastas ar itvirtintas storas strypas', 'stulpas'),
(5697, 'Kosta rikos oficiali kalba', 'ispanu'),
(5698, 'Saunamojo ginklo vamzdzio skersmuo', 'kalibras'),
(5699, 'Ukrainos parlamentas', 'rada'),
(5700, 'Laikrascio numerio egzemplioriu skaicius', 'tirazas'),
(5701, 'Kaip seniau vadinosi legendine anglijos grupe blur [orig.]', 'seymour'),
(5702, 'Skystis, naudojamas po skutimosi', 'losjonas'),
(5703, 'Telekomunikaciju kompanija, pagaminusi mobiliu telefonu modelius: 8110, 3110, 2110', 'nokia'),
(5704, 'Mokslas, tiriantis skaicius, ju veiksmus ir veiksmu savybes', 'aritmetika'),
(5705, 'Garsus lietuvos \"pakeles maniakas\": kazys ...', 'jonaitis'),
(5706, 'Socialiniu sankciju atmaina - sistema tikejimosi, lukesciu, reikalavimu, kad individas atliks savo vaidmenis grupeje pagal atitinkamas normas', 'ekspektacija'),
(5707, 'Kada ivyko vorsklos musis', '1399'),
(5708, 'Amatu besiverciantis zmogus', 'amatininkas'),
(5709, 'Duonos diena', 'vasario 5'),
(5710, 'Senrytu sunkieji raiteliai, ginkluoti ilgomis ietimis', 'katafraktai'),
(5711, 'Cheminis elementas, kurio simbolis \"rh\" [numeris 45]', 'rodis'),
(5712, 'Auksciausia europos virsukalne', 'monblanas'),
(5713, 'Viduramziu ispanijos ir portugalijos zydai, formaliai prieme kriskcionybe', 'maranai'),
(5714, 'Senromos kariuomenes vienetas (100, veliau 60 kariu)', 'centurija'),
(5715, 'Koks lietuvos sienos ilgis su latvija [km]', '610'),
(5716, 'Urugvajaus administracinis vienetas', 'departamentas'),
(5717, 'Aktorius, vaidinantis filme \"prarastasis\" [angl.]', 'tom hanks'),
(5718, 'Kariska vasarine kepure', 'pilote'),
(5719, 'Vienintele europos valstybe kurios pagrindine religija yra islamas', 'albanija'),
(5720, 'Didelis miskas', 'giria'),
(5721, 'Lietuviu grupe, isleidusi albuma \"silko kelias\"', 'naktines personos'),
(5722, 'Karelu, estu ir suomiu epines liaudies dainos', 'runos'),
(5723, 'Giliausiai gyvenantis bestuburis veziagyvis, kuris buvo pastebetas marianu iduboje didesniame nei 10 km gylyje', 'amfipoda'),
(5724, 'Uzdaras karoliuku verinys kalbamoms maldoms skaiciuoti ir medituoti', 'rozancius'),
(5725, '3-as didziausias lietuvos miskas: ..giria', 'labanoro'),
(5726, 'Plieno ar ketaus pavirsiaus difuzinis isotinimas aliuminiu', 'alitavimas'),
(5727, 'Saloje prie san francisko esantis kalejimas', 'alkatrasas'),
(5728, 'Biblizraelitu isejimas is egipto', 'egzodas'),
(5729, 'Muzikos grupe arba tai kas atsiranda nuo ilgo begimo', 'pompa'),
(5730, 'Jureiviu pamainos budejimo laive laikas', 'vachta'),
(5731, 'Rusu rasytojas, romanu \"tykusis donas\", \"pakelta velena\" autorius', 'solochovas'),
(5732, 'Zymiausias lietuviu rezistencijos poetas', 'krivickas'),
(5733, 'Pagal senoves graiku horoskopa, asmuo, gimes 07.04 d- 08.10 d.', 'sirena'),
(5734, 'Labiausiai i rytus nutoles afrikos taskas: ..kysulys', 'hafuno'),
(5735, 'Gryno aukso kiekis salies pinigniame vienete, valstybes nustatytas ir uzfiksuotas istatymu', 'aukso paritetas'),
(5736, 'Konservatizmo pradininkas', 'berkas'),
(5737, 'Visu laiku zymiausia roko opera, sukurta endriu loido veberio [angliskai]', 'jesus christ superstar'),
(5738, 'I kelias dalis sudalintas kompaso ciferblatas', '16'),
(5739, 'Mokslas, tiriantis programu sistemu kurima pritaikant informatikos, projektu valdymo ir kitu mokslo sriciu zinias', 'programu inzinerija'),
(5740, 'Kiek procentu vandens yra suaugusio zmogaus kune', '65'),
(5741, 'Egiptieciu religijoje - zemes dievas, dangaus deives nut sutuoktinis', 'gebas'),
(5742, 'Kada ikurta tarptautine ciuozeju sajunga', '1892'),
(5743, 'Kirgizijos smulkus pinigas', 'tyna'),
(5744, 'Retai gyvenama arba visiskai negyvenama teritorija, besidriekianti tarp skirtingu gentiniu sriciu', 'dykra'),
(5745, 'Negyvu daiktu derinio - vazu, muzikos instrumentu, vaisiu, geliu ar kitu daiktu vaizdavimas', 'natiurmortas'),
(5746, 'Nenuotakus afrikos ezeras', 'cadas'),
(5747, 'Neistisinis zemes rutulio vandens apvalkalas, viena is jos geosferuja sudaro atmosferos vanduo zemes pavirsiuje ir jos plutos uolienose (vandenynai, juros, ezerai, upes, pelkes, pozeminis vanduo, taip pat sniego danga, ledynai)', 'hidrosfera'),
(5748, 'Krosnies kakta', 'gakta'),
(5749, 'Salis, kurioje 1893 mivyko pirmasis pasaulyje greitojo ciuozimo cempionatas', 'olandija'),
(5750, 'Ferrari komandai priklausanti trasa italijoje', 'mugello'),
(5751, 'Tikslo pasiekimo budas, tam tikru budu sutvarkyta veikla', 'metodas'),
(5752, 'Lietuvos nacionalinis radijas ir televizija', 'lrt'),
(5753, 'Kas parase pirmaja \"lietuvos istorija\" lotynu kalba', 'vijukas'),
(5754, 'Ivairiu mechanizmu pirstais spaudomas svirteles mygtukas', 'klavisas'),
(5755, 'Skotijos nacionaline gele', 'usnis'),
(5756, 'Dirbtinis pavirsinis kanalas ar pozeminis vandentakis (vamzdinis, urvinis) vandens pertekliui surinkti ir pasalinti (pvz., is dirvozemio)', 'drena'),
(5757, 'Arciausiai saules skriejanti planeta', 'merkurijus'),
(5758, 'Skaiciavimo lenta kitaip', 'abakas'),
(5759, 'Renesanso laiku, vienbalse daina', 'sansonas'),
(5760, 'Laikas nuo zmogaus apsikretimo iki pirmuju ligos pozymiu atsiradimo', 'inkubacija'),
(5761, 'Vienos kaukoles puses skausmas', 'migrena'),
(5762, 'Norvegu tapytojas, grafikas, ekspresionizmo atstovas, nutapes kurinius \"sauksmas\", \"merginos ant tiltelio\"', 'munkas'),
(5763, 'Protestantizmo kryptis; susiformavo xvi aanglijoje', 'anglikonybe'),
(5764, 'Vidazijoje, mongolijoje, afganistane - aviu bandos piemuo', 'cabanas'),
(5765, 'Karalystes valdovas', 'karalius'),
(5766, 'Laisvai besikryzminanciu vienos rusies individu grupuote, ilgai gyvenanti tam tikroje arealo dalyje ir daugiau ar maziau izoliuota nuo kitu tos pacios rusies grupuociu', 'populiacija'),
(5767, 'Veikalo \"faidonas\" autorius', 'platonas'),
(5768, 'Kiek procentu is viso zemeje esancio vandens sudaro gelas vanduo', '6'),
(5769, 'Vadinamasis klaipedos miesto simbolis', 'meridianas'),
(5770, 'Istorijos specialistas', 'istorikas'),
(5771, 'Aleksandrijos mokslininke, politike, 415 mnulinciuota krikscioniu fanatiku', 'hipatija'),
(5772, 'Geriausias zmogaus draugas', 'suo'),
(5773, 'Zymiausias prancuzu romantizmo literatas', 'hugo'),
(5774, 'Standartinis tinklo itampos daznis [hz] lietuvoje', '50'),
(5775, 'Paplitimo plotas', 'arealas'),
(5776, 'Vabzdziu galvos isauga', 'antena'),
(5777, 'Kandidatas i lietuvos prezidentus, antrame rinkimu ture pralaimejes abrazauskui', 'lozoraitis'),
(5778, 'Kieti, puskieciai arba minksti pieniski saldainiai is cukraus, krakmolo sirupo, pieno riebalu ir skoniniu priedu [dgs.]', 'irisai'),
(5779, 'Tai buvo teisininkas, ekonomistas, karaliaus henriko iv slaptasis patarejaskartu jis yra raidines simbolikos algebroje ivedimo pradininkas', 'vietas'),
(5780, 'Meile buna ir ...', 'akla'),
(5781, 'Vientisas uolienos gabalas', 'monolitas'),
(5782, 'Mokslininkas 1634 msukures kintamo judejimo kinematika', 'galilejus'),
(5783, 'Is trikotazo pasiutas arba istisai numegztas, glaudziai kuna aptempiantis drabuzis', 'triko'),
(5784, 'Tarptautinis kompiuterinis tinklas, veikiantis tcp/ip protokolo pagrindu', 'internetas'),
(5785, 'Literaturinis kino arba televizijos filmo tekstas', 'scenarijus'),
(5786, 'Lietuviais esame mes ____', 'gime'),
(5787, 'Savaime uzsidegantys metalu arba ju lydiniu milteliai', 'piroforai'),
(5788, 'Dvi materijos egzistavimo formos \"medziaga ir ...\"', 'laukas'),
(5789, 'Duomenu suglaudinimo programos', 'archyvatoriai'),
(5790, 'Taskai kuriu kurios nors projekcijos sutampa', 'konkuruojantys'),
(5791, 'Augalininkystes saka, apimanti graziaziedziu ir grazialapiu augalu auginima parkams, sodams, skverams ir kitiems zeldynams, bei patalpu vidui bei isorei puosti', 'gelininkyste'),
(5792, 'Pramones imones gaminiu ar prekybos imones turimu prekiu sudetis pagal pavadinimus, tipus, rusis', 'asortimentas'),
(5793, 'Aromatiniu junginiu susidarymo is kitu organiniu junginiu reakcija', 'aromatizacija'),
(5794, 'Graiku pergales deive', 'nike'),
(5795, 'Kaip kitaip vadinamos vientisos valstybes', 'unitarines'),
(5796, 'Kmarkso bendrazygis, kartu su kmarksu isleides \"komunistu partijos manifesta\"', 'engelsas'),
(5797, 'Kaip prancuziskai rasosi odekolonas', 'eau de cologne'),
(5798, 'Kaip sutrumpintai vadinama ekonominio bendradarbiavimo ir pletros organizacija arba g-26', 'oecd'),
(5799, 'Magmos isiterpimas i zemes pluta', 'intruzija'),
(5800, 'Kuriais metais isteigta zemaiciu vyskupija', '1417'),
(5801, 'Kas pradejo lydyti gelezi, isrado ratus su stipinais', 'hetitai'),
(5802, 'Idiliskas piemenu gyvenimo vaizdelis', 'pastorale'),
(5803, 'Kaip kitaip vadinamas ketureilis', 'katrenas'),
(5804, 'Daznai sutinkamas pievu ir misku augalas', 'rasakila'),
(5805, 'Kikiliu seimos lietuvos paukstis, lesantis prisirpusiu vysniu kauliuku branduolius ir taip sodams kasmet padarantis daug zalos', 'svilikas'),
(5806, 'Gele, japonijos simbolis', 'chrizantema'),
(5807, 'Cheminis elementas, kurio simbolis \"sn\" [numeris 50]', 'alavas'),
(5808, 'Ploto matas, lygus 4046,9 kvadratiniu metru', 'akras'),
(5809, '3-a pagal dydi sala pasaulyje', 'borneo'),
(5810, 'Panasus i varle sausumos gyvunas', 'rupuze'),
(5811, 'Architekturos statinys - ansamblis ar kompleksas reiksmingam ivykiui ar asmeniui atminti', 'memorialas'),
(5812, 'Populiariausias dienrastis kauno mieste', 'kauno diena'),
(5813, 'Zmogus, silko keliu pasiekes pekina', 'polas'),
(5814, 'Zmogus siksnosparnis (angl.)', 'batman'),
(5815, 'Tarptautine telekomunikaciju diena', 'geguzes 17'),
(5816, 'Planetos regimasis kampinis nuotolis nuo saules, arba palydovo kampinis nuotolis nuo planetos', 'elongacija'),
(5817, 'Aktore vaidinusi filmuose \"dingti per 60 sekundziu\", \"hakeriai\", \"pirmoji nuodeme\" ir kt.: angelina ..[orig.]', 'jolie'),
(5818, 'Humanitariniu mokslu saka, tyrinejanti visu rastijos rusiu ir zanru tekstu geneze, istorija, autoryste', 'tekstologija'),
(5819, 'Pirmoji egipto sostine', 'memfis'),
(5820, 'Sasiauris kalifornijoje (jav), jungiantis san francisko ilanka su ramiuoju vandenynu', 'aukso vartai'),
(5821, 'Metalinis strypas, itaisytas virs pastato auksciausio tasko', 'zaibolaidis'),
(5822, 'Gebejimas atlikti tam tikra veikla remiantis mokymosi rezultatu, igytu ziniu, igudziu, gebejimu, vertybiniu nuostatu visuma', 'kompetencija'),
(5823, 'Monarchine valstybe ar jos dalis, valdoma kunigaikscio', 'kunigaikstyste'),
(5824, 'Tapymas gamtoje', 'pleneras'),
(5825, 'Isskirtinis tiesioginis telefono rysys tarp dvieju svarbiu tasku, praverciantis krizei istikus', 'karstoji linija'),
(5826, 'Seniausieji hinduistu rastai, kuriuos sudaro per tukstantmeti kurti himnai, maldos, apeigu tekstai', 'vedos'),
(5827, '\"tomo sojerio nuotykiu\" autorius', 'tvenas'),
(5828, 'Kuriais metais ivyko bastilijos sturmas', '1789'),
(5829, 'Nacionalinis uzbeku valgis is ryziu ir avienos gabaliuku', 'plovas'),
(5830, 'Klasikiniu sokiu stilius indijoje', 'katakalis'),
(5831, 'Isipareigojimai, prisiimami stojant i vienuolyna', 'izadai'),
(5832, 'Irankis skylems kalti', 'kaltas'),
(5833, 'Kino filmu \"lolita\", \"prisukamas apelsinas\", \"svytejimas\", \"placiai uzmerktos akys\" ir ktrezisierius (orig.)', 'kubrick'),
(5834, 'Zuvis panasi i karsi', 'plakis'),
(5835, 'Mazai jautrus svitinimui (radioterapijai) piktybiniai navikai yra melanoma ir ...', 'sarkoma'),
(5836, 'Automobilis su dezes pavidalo kebulu is nepersaunamo stiklo, skirtas popieziui jonui pauliui ii vezioti miesto gatvemis, kai jis lankosi uzsienyje', 'papamobilis'),
(5837, 'Stambiosios masinines pramones kurimas', 'industrializacija'),
(5838, 'Senoves graiku mitu herojus, \"iliados\" personazas, trojos karaliaus priamo ir hekabes sunus', 'paris'),
(5839, 'Kokios kuno dalies truko tmain rido raiteliui', 'galvos'),
(5840, 'Skulpturos \"disko metikas\" autorius', 'mironas'),
(5841, 'Greiciausi lietuvos vabzdziai [isvysto 144 km/h greiti]', 'zirgeliai'),
(5842, 'Ant kokio akmens yra isgraviruoti 4 jav prezidentai: vasingtonas, dzefersonas, linkolnas ir ruzveltas (orig.)', 'rushmore'),
(5843, 'Tikrasis dantes vardas', 'durante'),
(5844, 'Patikimiausia priemone nuo galvos skausmo', 'giljotina'),
(5845, 'Chemine reakcija, kai vandenilio atomai prijungiami prie tam tikru organiniu junginiu molekuliu', 'hidrinimas'),
(5846, 'Pintine persikelti per upe [paplitusi prie nilo]', 'gufa'),
(5847, 'Nuolatinis pirkejas, lankytojas', 'klientas'),
(5848, 'Atomo centrine dalis, kurioje sutelkta didzioji dalis atomo mases', 'branduolys'),
(5849, 'Pastatas poilsiui uzmiestyje', 'vila'),
(5850, 'Vidutinio tempo senovinis vokieciu sokis', 'alemanda'),
(5851, 'Kas vairuoja laivus kanaluose ir uostuose', 'locmanas'),
(5852, 'Vektorinis dydis, kurio kryptis sutampa su kuno sukimosi kampinio greicio vektoriaus kryptimi: impulso ...', 'momentas'),
(5853, 'Kalva i vakarus nuo atenu akropolio; cia posedziaudavo seniausioji atenu taryba', 'areopagas'),
(5854, 'Iskasamos anglys, susidariusios is aukstesniuju augalu liekanu', 'humolitai'),
(5855, 'Kelias fasetes turi klasikinis briliantas', '56'),
(5856, 'Valstybe, kurioje 1881 mpradejo veikti pirmasis pasaulyje visuomeninis elektrinis tramvajus', 'vokietija'),
(5857, 'Srove, kurios stiprumas ir kryptis periodiskai kinta', 'kintamoji'),
(5858, 'Miestas, kuriame 1919-1938 mveike lietuviu gimnazija', 'svencionys'),
(5859, 'Zibalu kurenama virykle', 'primusas'),
(5860, 'Pirminis tardymas', 'kvota'),
(5861, 'Tas, kuris saugo miska nuo triuksmo ir netvarkos', 'girinis'),
(5862, 'Miesto, gyvenvietes, pastato ar jo daliu pertvarkymas, keiciant funkcija', 'rekonstrukcija'),
(5863, 'Kiek kilometru reikia iveikti didziosios keturkoves vaziavimo dviraciu rungtyje', '160'),
(5864, 'Uosles nebuvimas', 'anosmija'),
(5865, 'Senoves graikijos poliu susirinkimas ir vieta, kur jis vykdavo', 'agora'),
(5866, 'Kataliku ir anglikonu arkivyskupo garbes titulas', 'primas'),
(5867, 'Suakmeneje koralai', 'koralitai'),
(5868, 'Mokymasis miegant', 'hipnopedija'),
(5869, 'Kataliku ir staciatikiu sakramentas, teikiamas sunkiems ligoniams', 'patepimas'),
(5870, 'Obuoliu kose', 'obuoliene'),
(5871, 'Prancuzu isradejas, fizikas1680muzpatentavo garo katila su apsauginiu voztuvu, 1690msukonstravo stiklo lydymosi krosni [liet.]', 'papenas'),
(5872, 'Kuriais metais buvo pradetas pardavineti alus, supilstytas i skardines', '1935'),
(5873, 'Isauga kaktoje', 'ragas'),
(5874, 'Liguista uzdaros patalpos baime', 'klaustrofobija'),
(5875, 'Gyvunas, is kurio kilo kanaru salu pavadinimas', 'suo'),
(5876, 'Kuriais metais airija buvo paskelbta respublika', '1921'),
(5877, 'Prietaisas vietoves liniju polinkio i horizonta kampams matuoti', 'eklimetras'),
(5878, 'Dvieju zmoniu pokalbis', 'dialogas'),
(5879, 'Kedute be atloso', 'taburete'),
(5880, 'Airiu atlikeja, kuriniu \"only time\", \"may it be\" autore', 'enya'),
(5881, 'Irkluotojo jungtiniu judesiu ciklas valciai varyti vienu arba dviem irklais', 'grybsnis'),
(5882, 'Kada vilhelmas oranietis tapo anglijos karaliumi', '1689'),
(5883, 'Indenu karo pypke', 'kalumetas'),
(5884, 'Pamariu slavu auksciausiasis dievas, susijes su karais ir pergalemis', 'sventovitas'),
(5885, 'Olandu jurininkas, arkties tyrinetojas, matavo juros, kuri veliau pavadinta jo vardu, gyli', 'barencas'),
(5886, 'Karaliaus mindaugo ??ties diena', 'lapkricio 14'),
(5887, 'Labai jaunu zmoniu valdzia', 'pedokratija'),
(5888, 'Lietliaudies ismintis: geras suo ant vejo ...', 'neloja'),
(5889, 'Mankstos pratimu kompleksas, kurio paskirtis - patobulinti kuno sudejima, kad jis butu tvirtas ir harmoningas, padidinti raumenu mase, kad figura atrodytu kuo atletiskesne', 'kulturizmas'),
(5890, 'Pirma savaites diena', 'pirmadienis'),
(5891, 'Skystis, praleidziantis elektros srove', 'elektrolitas'),
(5892, 'Genetines medziagos pernesimas is vienos bakterijos i kita bakteriofago pagalba', 'transdukcija'),
(5893, 'Ciles prezidentas (1970-73), pirmasis marksistas laimejes laisvus rinkimus lotynu amerikoje', 'aljende'),
(5894, 'Vokisku sportiniu automobiliu gamintojas (orig.)', 'porsche'),
(5895, 'Baltu vienaakis labai stiprus nakties, mirties ir pozemio karalystes valdovas', 'velinas'),
(5896, 'Savotiska ldk vyriausybe (~15 a.)', 'ponu taryba'),
(5897, 'Nervu sistema, palaikanti gyvybines kuno funkcijas', 'vegetacine'),
(5898, 'Salis, kurios atstovai laimejo daugiau nei 40% visu kada nors vykusiu maratono varzybu', 'kenija'),
(5899, 'Ant peciu ir galvos gaubiamas drabuzis', 'skara'),
(5900, 'Garsiausi antrajame pasauliniame kare naudoti vokieciu naikintuvai (orig.)', 'messerschmitt'),
(5901, 'Kodinis pavadinimas, suteiktas 1942 mamerikieciu pradetai vykdyti programai, kurios tikslas buvo pagaminti atomine bomba ir panaudoti ja ii pasauliniame kare pries vokiecius', 'manheteno projektas'),
(5902, 'Styginiu instrumentu viduje esanti ertme', 'rezonatorius'),
(5903, 'Garso virpesiu daznis', 'tonas'),
(5904, 'Pazinimo teorijos dalis, teigianti, jog protas yra tikro zinojimo saltinis', 'racionalizmas');
INSERT INTO `vikte_klsm` (`id`, `klsm`, `ats`) VALUES
(5905, 'Valstybe, kurioje 2006mvyks pasaulio futbolo cempionatas', 'vokietija'),
(5906, 'Senasis akmens amzius; seniausias zmonijos istorijos laikotarpis', 'paleolitas'),
(5907, 'Tarpzvaigzdiniu duju ir dulkiu telkinys', 'ukas'),
(5908, 'Prisitaikantis, gebantis prisitaikyti', 'adaptyvus'),
(5909, 'Kada vyko kulikovo musis', '1380'),
(5910, 'Graiku filosofas, vienas dialektikos pradininkupagal ji, pasaulis visada buvo, yra ir bus amzina ugnispirmasis is graiku kalbejo apie pasaulio prota: heraklitas ...', 'efesietis'),
(5911, 'Organiniu junginiu sinteze, vykstanti del saules sviesos poveikio', 'fotosinteze'),
(5912, 'Transmisine alyva - naftos perdirbimo produktas', 'nigrolas'),
(5913, 'Figuru (sachmatu, saskiu) isdestymas lentoje', 'pozicija'),
(5914, 'Lietuvos karaliaus mindaugo zmonos vardas', 'morta'),
(5915, 'Busena, kai vienu virusu infekuotos lasteles neleidzia ivykti ju superinfekcijai kitu virusu', 'virusu interferencija'),
(5916, 'Prilygintas, prilyges, tolygus, tapatus, visiskai atitinkantis', 'adekvatus'),
(5917, 'Dokumentas, kuriame isdestytos draudimo sutarties salygos', 'sertifikatas'),
(5918, 'Natrio karbonatas', 'soda'),
(5919, 'Is silkaverpiu kokonu gaunami siulai', 'silkas'),
(5920, 'Specialus administracinis organas, skirtas viesajai tvarkai palaikyti', 'policija'),
(5921, 'Geriausias visu laiku futbolininkas, legenda', 'pele'),
(5922, 'Tos pacios arba panasios reiksmes zodis', 'sinonimas'),
(5923, 'Lyrinis, svajingas instrumentinis, kartais ir vokalinis, dainingos melodijos kurinys', 'noktiurnas'),
(5924, 'Kaip kitaip pasakyti vanduo is kelno', 'odekolonas'),
(5925, 'Italijos politinis veikejas, fasizmo pradininkas', 'musolinis'),
(5926, 'Kiek litru skysciu rekomenduojama per diena isgerti zmogui', 'du'),
(5927, 'Vienas didziuju pranasu, isvedes zydus is egipto nelaisves, ant sinajaus kalno gaves is jahves ir daves zydams desimt dievo isakymu', 'moze'),
(5928, 'Cheminis elementas, kurio simbolis \"os\" [numeris 76]', 'osmis'),
(5929, 'Automobilis ..astra', 'opel'),
(5930, 'Dideles imones ar organizacijos atskirai veikiantis skyrius', 'filialas'),
(5931, 'Prancuzijos dviraciu lenktynes', 'tour de france'),
(5932, 'Teisiskai, juridiskai iformintas', 'de jure'),
(5933, 'Sveicarijos sostine', 'bernas'),
(5934, 'Hitleriui istikima vaiku organizacija', 'hitlerjugendas'),
(5935, 'Lietuvos miestas, turejes net 5 lkl klubus', 'kaunas'),
(5936, 'Lanko saudmuo', 'strele'),
(5937, 'Organizmo gyvybinis aktyvumas', 'tonusas'),
(5938, 'Kada ikurtas kupiskio miestelis', '1465'),
(5939, 'Pastovios sudeties cheminiai junginiai [dgs.]', 'daltonidai'),
(5940, 'Sraigtasparniu oro uostas', 'heliportas'),
(5941, 'Sis zinduolis deda kiausinius', 'anciasnapis'),
(5942, 'Kas parase \"apmastymai apie nelygybes pradzia ir pagrindus\"', 'ruso'),
(5943, 'Svetur gyvenanti tautos grupe; tarp kitatikiu gyvenanti kurios nors religijos zmoniu grupe', 'diaspora'),
(5944, 'Gvinejos administracinis vienetas', 'regionas'),
(5945, 'Sala ir valstybe karibu juroje, i pietus nuo kubos ir i vakarus nuo haicio, sostine kingstonas', 'jamaika'),
(5946, 'Italu kompozitorius, pirmosios pasaulyje operos \"dafne\" autorius', 'peris'),
(5947, 'Visiska tobulybe', 'idealas'),
(5948, 'Vienintele jav valstija, kurios veliavoje yra pavaizduota data \"07.12.1787\" - jav kurimosi pradzia', 'delaveras'),
(5949, 'Istorikas, pirmasis parases lietuvos istorija lietuviu kalba', 'daukantas'),
(5950, 'Stambiausias karinis dalinys senromoje', 'legionas'),
(5951, '6-a maziausiai urbanizuota pasaulio salis (11% miesto gyv.)', 'omanas'),
(5952, 'Vietoveje pazymeta, kroso, slidinejimo varzybu, maratono vieta, kelias', 'trasa'),
(5953, 'Sirijos administracinis teritorinis vienetas', 'muhafaza'),
(5954, 'Vieta, kur skrandis pereina i dvylikapirste zarna', 'prievartis'),
(5955, 'Ka merginos uzsideda ant krutu', 'liemenele'),
(5956, 'Kokia komandai atstovauja r.shumacheris', 'bmw'),
(5957, 'Cheminis elementas, kurio simbolis \"ne\" [numeris 10]', 'neonas'),
(5958, 'Keltuvas keleiviams ir kroviniams kelti', 'liftas'),
(5959, 'Salis, kurioje atsirado vejo malunai', 'persija'),
(5960, 'Graikijos sostine', 'atenai'),
(5961, 'Kas yra pacifilis', 'gele'),
(5962, 'Samoningas zmogaus polinkis taip keisti savo elgesi, kad tas elgesys atitiktu aplinkiniu poziuri i ji', 'pigmalijono efektas'),
(5963, 'Didelis tikslumas', 'precizija'),
(5964, 'Horizontali aikstele karjero, kelio, pylimo arba iskasos, uztvankos slaitui sutvirtinti', 'berma'),
(5965, '1,25-2,3 metru ilgio medinis puciamasis lietuviu liaudies instrumentas', 'daudyte'),
(5966, 'Klausimu lapas informacijai rinkti', 'anketa'),
(5967, 'Puosnus monumentalus vartai, statyti pergalei musyje pagerbti: ..arka', 'triumfo'),
(5968, 'Rusu tapytojas, \"sviesa virs pilkumos\", \"zeme ir zaluma\" autorius', 'rotko'),
(5969, 'Asmenybes sugebejimas sugyventi su aplinkiniais, lengvai uzmegsti ir palaikyti santykius', 'sintonija'),
(5970, 'Valstybes nustatomas prievoliu vykdymo terminu atidejimas', 'moratoriumas'),
(5971, '3-a valstija, prijungta prie jav 18.12.1787 m., sostine trentonas [liet.]', 'niudzersis'),
(5972, '\"slanga\" lietuviskai', 'zarna'),
(5973, 'Kaip kitaip vadinama grozine proza', 'beletristika'),
(5974, 'Telekomunikaciju kompanija, pagaminusi mobiliu telefonu modelius: t39, a3618, t29s, r520m', 'ericsson'),
(5975, 'Artistu gastroliu kelione', 'turne'),
(5976, 'Knygos ar zurnalo temas aprasantis leidinio skyrius', 'turinys'),
(5977, 'Beprasmybe, priestaringas ar visai prasmes neturintis teiginys, reiskinys, nesamone', 'absurdas'),
(5978, 'Specialisto patarimas kuriuo nors klausimu', 'konsultacija'),
(5979, 'Kanados sostine', 'otava'),
(5980, 'Lapines darzoves', 'salotos'),
(5981, 'Pirmasis amerikieciu astronautas, pabuvojes kosmose', 'glenas'),
(5982, 'Kompanija, pagaminusi mobiliu telefonu modelius: fisio 610, xenium 9@9, xenium, azalis 268', 'philips'),
(5983, 'Sunkiai ginkluotas senoves graiku kariuomenes narys', 'hoplitas'),
(5984, '4-a labiausiai urbanizuota pasaulio salis (97% miesto gyv.)', 'belgija'),
(5985, 'Zvaigzdziu, galaktiku ir kitu kosminiu objektu spindesio matavimo vienetas', 'ryskis'),
(5986, 'Vokietijos ginkluotosios pajegos 1935-45 metais', 'vermachtas'),
(5987, 'Boro junginiai su metalais [dgs.]', 'boridai'),
(5988, 'Graiku deive, isgydanti visas ligas', 'panaceja'),
(5989, 'Kaip vadinasi kova del buvio, kuri vyksta tarp atskiru rusiu populiaciju', 'tarprusine'),
(5990, 'Limfmazgiu uzdegimas', 'limfadenitas'),
(5991, 'Pernelyg didelis isitraukimas i ka nors, inykis', 'azartas'),
(5992, 'Permatomas aukstos kokybes popierius, naudojams breziniu kopijoms daryti', 'kalke'),
(5993, 'Pirmas lietuvos miestas, kuriame buvo nutiestas dviraciu takelis', 'siauliai'),
(5994, 'Bizantieciu greitas karinis irklinis laivas', 'dromonas'),
(5995, 'Zaibo sukeliamas garsas', 'griaustinis'),
(5996, 'Gyvuliu skerdimo imone', 'skerdykla'),
(5997, 'Nepalo administracinis teritorinis vienetas', 'zona'),
(5998, 'Garsi milziniska bezdzione pabaisa, vaidinanti to paties pavadinimo amerikieciu fantastiniame filme', 'king kongas'),
(5999, 'D.britanija, prancuzija, rusija 1-ojo pasaulinio karo metu', 'antante'),
(6000, 'Salis, 1982 mpasaulio futbolo cempionato nugaletoja', 'italija'),
(6001, 'Sporto teisejas', 'arbitras'),
(6002, 'Sala atlante, vest indijoje, pavejiniu salu grupeje', 'antigva'),
(6003, 'Lichtensteino administracinis vienetas', 'valscius'),
(6004, 'Nacionalinis armeniu moteru drabuzis [dgs.]', 'salvarai'),
(6005, 'Surenkamos medines lubos su kesonais', 'artesonadas'),
(6006, 'Sindromas, kuri sukelia neprotinga, pavojinga vidutinio amziaus vyriskio aistra paauglei: ..sindromas', 'lolitos'),
(6007, 'Taisykle, kuria vienos aibes elementui priskiriamas vienas kitos (arba tos pacios) aibes elementas', 'funkcija'),
(6008, 'Naturaliu ar dirbtiniu lapu ir geliu pyne', 'girlianda'),
(6009, 'Smailioji arka', 'ogiva'),
(6010, 'Mazi, 3-5 cm ilgio agurkiukai, nuskinti iskart po zydejimo', 'karnisonai'),
(6011, 'Ministras pirmininkas, kuriam valdant zlugo tuo metu didziausias lietuvoje lietuvos akcinis inovacinis bankas', 'slezevicius'),
(6012, 'Romenu liaudies vaidinimas', 'atelana'),
(6013, 'Lietuvos didysis kunigaikstis, valdes 1492-1506 metais', 'aleksandras'),
(6014, 'Biliardo kamuolio smugis i kelis priesininko kamuolius', 'karambolis'),
(6015, 'Lengvasis automobilis, kurio kebulas uzpakalyje tarsi istrizai nukirstas, o pro pakelta uzpakaline sienele galima patekti i masinos vidu ir sukrauti tenai daugiau bagazo, negu telpa paprastoje bagazineje', 'hecbekas'),
(6016, 'Prancuzu partizanai', 'maki'),
(6017, 'Hugo \"paryziaus katedros\" veikejas kuprius', 'kvazimodas'),
(6018, 'Architekturos ir dizaino mokykla, kuria 1919 mveimare ikure valteris gropijus', 'bauhauzas'),
(6019, 'Alink zeme skriejancio palydovo orbitos taskas, labiausiai nutoles nuo zemes mases centro', 'apogejus'),
(6020, 'Koks zymus zmogus pasake: \"kas nepazino meiles, tas tarsi negyveno\"', 'balzakas'),
(6021, 'Uolienu ir mineralu irimas zemes pavirsiuje ar zemiau jo, kuri skatina temperaturos svyravimai, atmosferos krituliu, vandens ir gyvu organizmu chemine veikla', 'dulejimas'),
(6022, '\"karunos\" sokoladinis batonelis su zemes riesutais', 'dar 2'),
(6023, 'Lietuviu dievaitis, linu ir kanapiu globejas', 'vaizgantas'),
(6024, 'Zemes plutos judesiu teorija', 'geotektonika'),
(6025, 'Seniausias rasytinio pasakojimo zanras, atsirado antikoje, paplito vidurmaziais', 'biografija'),
(6026, 'Prancuzu dramaturgas, parases \"sykstuoli\"', 'moljeras'),
(6027, 'Didziausia sala pasaulyje', 'grenlandija'),
(6028, 'Tautos-liaudies valdzia', 'demokratija'),
(6029, 'Stilizuotas arba naturalistinis veduoklines palmes pavidalo dekoro motyvas', 'palmete'),
(6030, 'Salis garsejanti sekso industrija', 'tailandas'),
(6031, 'Didziausio perlo, kuris rastas filipinuose 1934 metais, pavadinimass', 'laodzi'),
(6032, 'Tarptautine civilines aviacijos diena', 'gruodzio 7'),
(6033, 'Greiciausia zuvis pasaulyje, pasiekia 109 km/h greiti', 'buriazuve'),
(6034, 'Karo laivu veliava', 'giuisas'),
(6035, 'Rykles tonziles, esancios nosiarykleje, isvasos', 'adenoidai'),
(6036, 'Salis, is kurios kilo apelsinai ir mandarinai', 'kinija'),
(6037, '\"kaldra\" lietuviskai', 'antklode'),
(6038, 'Armenu liaudies puciamasis muzikos instrumentas', 'zurna'),
(6039, 'Kiek maziausiai fluoro ppm vienetu turi buti dantu pastoje, kad ji turetu antikariozini poveiki', '500'),
(6040, 'Virsutine pridedama spintos dalis', 'antresole'),
(6041, 'Cheminis elementas, kurio pavadinimas kilo is graikisko zodzio, lietuviskai reiskiancio \"akmuo\"', 'litis'),
(6042, 'Rasytojos julijos beniseviciutes-zymantienes slapyvardis', 'zemaite'),
(6043, 'Ankstesnis pkorejos kompanijos \"lg\" pavadinimas', 'gold star'),
(6044, 'Dailes kuriniu rinkinio aprasas', 'katalogas'),
(6045, 'Virsutinis kataliku dvasininku liturginis drabuzis - po kaklu metaline sege susegamas puosnus apsiaustas be rankoviu ir dekoratyviniu gobtuvu ant nugaros', 'kapa'),
(6046, 'Dazniausias antinksciu serdines dalies navikas', 'feochromocitoma'),
(6047, 'Kiek dienu truko leningrado blokada antrojo pasaulinio karo metais', '900'),
(6048, 'Parase poema \"metai\"', 'donelaitis'),
(6049, 'Europos xii-xvi aarchitekturos ir dailes stilius, plastinei israiskai budinga istesta vertikali konstrukcija (smailios arkos), gausus skulpturinis dekoras', 'gotika'),
(6050, 'Albanijos diktatorius (1945-1985 m.)', 'hodza'),
(6051, 'Tiese lygiagreti horizontaliajai projekciju plokstumai', 'horizontale'),
(6052, 'Krovinys, nasta', 'nesulys'),
(6053, 'Kokia knyga yra sudaryta is 114 suru', 'koranas'),
(6054, 'Mineralo, metalo, lydinio ar kito kietojo kuno sandara, matoma plika akimi', 'makrostruktura'),
(6055, 'Broko nustatymas, kai prekes tikrina oficialus asmenys', 'brakerazas'),
(6056, 'Kaip vadinamas saves sudievinimas', 'egoteizmas'),
(6057, 'Naktimis svirpiantis vabzdys', 'svirplys'),
(6058, 'Kataliku sventoji vieta - kryziaus kelio stotis su koplycia, irengiama paprastai kalvotoje vietoje', 'kalvarija'),
(6059, 'Tam tikru budu apdorota zalia oda; iki popieriaus paplitimo ant jos buvo rasoma', 'pergamentas'),
(6060, 'Bendra visu organizmu savybe issaugoti ir perduoti proteviu sandaros bei funkciju pozymius palikuonims', 'paveldimumas'),
(6061, 'Rusu rasytojas (1814-1841m.), romano \"musu laiku didvyris\", poemu \"demonas\", \"mcyris\" autorius', 'lermontovas'),
(6062, 'Kataliku vyskupo isventinimas', 'konsekracija'),
(6063, 'Pirmosios okeanografines ekspedicijos (1872m.) fregatos pavadinimas [liet.]', 'celendzeris'),
(6064, 'Kepenu uzdegimas', 'hepatitas'),
(6065, 'Rasytojas, apysaku \"kaimas\", \"suchodolas\", \"mitios meile\", apsakymu \"jerichono roze\", \"saules smugis\", \"antaniniai obuoliai\", \"ponas is san francisko\", romano \"arsenjevo gyvenimas\" autorius (liet.)', 'buninas'),
(6066, 'Kas sukonstravo pirmaji volkswagen automobili [orig.]', 'porsche'),
(6067, 'Rinkimu lapelis, kuriame isspausdinta kurioje nors rinkimu apygardoje iskelto kandidato pavarde, vardas ir tevo vardas', 'biuletenis'),
(6068, 'Spaudos atgavimo, kalbos ir knygos diena', 'geguzes 7'),
(6069, 'Posakis: \"sunki, neiveikiama uzduotis\": gordijaus ...', 'mazgas'),
(6070, 'Kaip vadinamas didziasias nacionalis parkas svedijoje ir europos sajungoje', 'sareka'),
(6071, 'Negilus linijinis itrukimas lupu kampuose', 'ragada'),
(6072, 'Du kampai, kuriu vieno krastines - kito krastiniu tesiniai', 'kryzminiai'),
(6073, 'Susidegino sparnus', 'ikaras'),
(6074, 'Salis, neoficialiai laikoma 51-aja jav valstija, nuo 1952.07.25 paskelbta laisvai prisijungusia prie jav valstybes', 'puerto rikas'),
(6075, 'Napoleono i valdymo laikotarpiu paplitusi velyvojo klasicizmo apraiska', 'ampyras'),
(6076, 'Mokslas apie valstybes politikos ir jos teritorijos, geografines padeties, klimato ir kitokiu geografiniu veiksniu rysius', 'geopolitika'),
(6077, 'Pirmasis budapesto muzikos akademijos steigejas bei pirmasis jos prezidentas', 'listas'),
(6078, 'Anglu keleivinis laivas, 1915 mgeguzes 7 dpaskandintas vokieciu povandeninio laivo', 'lusitania'),
(6079, 'Butina salyga (tam tikras turtas, amzius, mokslas, seslumas) naudotis teisemis (ypac rinkti ar buti renkamam)', 'cenzas'),
(6080, 'Koks medis auksciausias pasaulyje', 'sekvoja'),
(6081, 'Senoves romenu gyvenamojo namo terasa pietu puseje', 'soliariumas'),
(6082, 'Darytis aklam', 'akti'),
(6083, 'Ragu neturejimas, igimta galviju, aviu, ozku ir ktraguociu savybe', 'bauzumas'),
(6084, 'Nepiktybinis riebalinio audinio navikas', 'lipoma'),
(6085, 'Slaples uzdegimas', 'uretritas'),
(6086, 'Faktiskas karo pabaigimas nugaletos valstybes ar jos dalies okupavimu', 'debeliacija'),
(6087, 'Astronomijos saka, tirianti visata kaip visuma, visatos geometrine struktura, evoliucija ir tyrimu aprepiamos visatos dalies objektu kilme', 'kosmologija'),
(6088, 'Oro eismo valdybos ir oro erdves kontroles sistema', 'atmas'),
(6089, 'Lyginamoji kalbotyra', 'komparatyvistika'),
(6090, 'Zinduoliu ilgalaikio poilsio, imygio arba vaiku atsivedimo vieta', 'guolis'),
(6091, 'Kas isrado ant ratlankio dedamas pripuciamas padangas automobiliams', 'dunlopas'),
(6092, 'Kinu dinastija kuriai valdant kinu kultura suklestejo', 'dzou'),
(6093, 'Yra keturios civilizacijos: vakaru krikscioniskoji, indijos budistine, arabu islamiskoji ir kinijos ...', 'konfucine'),
(6094, 'Priesdelis, reiskiantis krypti i vidu', 'in'),
(6095, 'Meile ir istikimybe tevynei, didziavimasis jos praeitimi ir dabartimi, pasiryzimas ginti tevynes interesus', 'patriotizmas'),
(6096, 'Kuriais metais israstas elektroninis laikrodis', '1957'),
(6097, 'Is siksnosparniu-vampyru seiliu gaminami vaistai (sirdies ligoms gydyti)', 'drakulinas'),
(6098, 'Sprendimu priemimo principas, teigiantis, kad sprendimai turi buti priimami tuo lygmeniu, kuriame jie yra efektyviausi', 'subsidiarumas'),
(6099, 'Pranasumas, virsus', 'persvara'),
(6100, 'Burimas vasku', 'keromantija'),
(6101, 'Lietuvos ministras pirmininkas, trumpiausiai isbuves siame poste', 'simenas'),
(6102, 'Aliejaus ir balzamo misinys, kuri naudoja dvasininkas, suteikiantis kriksto, sutvirtinimo ir patepimo sakramentus', 'krizma'),
(6103, 'Architekturos detale; profiliuotas akmens blokas ant sienos arba kolonos kapitelio arkai atremti', 'impostas'),
(6104, 'Kiek celsijaus laipsniu atitinka 0 farenheito laipsniu? (-xx,x)', '-17,8'),
(6105, 'Personazas, kuris voge kaledas', 'grincas'),
(6106, 'Vyriausia romenu dievybe', 'jupiteris'),
(6107, 'Senoves egipto faraonas, kuriam valdant pastatyta abu simbelio sventykla', 'ramzis ii'),
(6108, 'Sluoksniuotas konditerijos gaminys papuostu pavirsiumi', 'tortas'),
(6109, 'Ezeras, rusu vadinamas melynaja sibiro akimi', 'baikalas'),
(6110, 'Amerikos atograzu grauzikas', 'agutis'),
(6111, 'Cheminis elementas, kurio pavadinimas kilo is graikisku zodziu, reiskianciu \"naujasis dvynys\"', 'neodimis'),
(6112, 'Keli keliniai zaidziami per beisbolo rungtynes', '9'),
(6113, 'Istorine sritis europos pietryciuose, tarp dunojaus, mureso ir transilvalnijos alpiu', 'banatas'),
(6114, 'P.pikaso 1907mnutapytas sedevras, kubizmo pradzios ir kartu viso moderniojo meno simbolis, dar vadintas \"filosofiniu viesnamiu\"', 'avinjono merginos'),
(6115, 'Ersketiniu seimos puskrumis', 'acena'),
(6116, 'Liga, kuri reiskiasi fizinio, psichinio vystymosi ir skydliaukes funkcijos sutrikimais', 'kretinizmas'),
(6117, 'Kaip vadinami mendelejavo elementu lenteles stulpeliai [dgsvard.]', 'grupes'),
(6118, 'Dailininkas, kolekcionierius, visuomenes veikejas, vienas is pirmosios lietuviu dailes parodos organizatoriu', 'zmuidzinavicius'),
(6119, 'Akies tinklaines periferijoje esancios juntamosios lasteles', 'lazdeles'),
(6120, 'Kokia senoves egipto sostine buvo dievo kurejo ir amatininku globejo ptacho (pta) kulto centras', 'memfis'),
(6121, 'Salis, kuriai priklauso daugiausia salu pasaulyje', 'indonezija'),
(6122, 'Tarptautine neigaliuju zmoniu diena', 'gruodzio 3'),
(6123, 'Cekijos sostine', 'praha'),
(6124, 'Nuosavas ar skolintas kapitalas [dgs.]', 'aktyvai'),
(6125, 'Indu filosofijoje - dvasinis aktyvusis pradas', 'purusa'),
(6126, '\"svogungalvis berniukas\"', 'cipolinas'),
(6127, 'Karaliaus sunus, princas', 'karalaitis'),
(6128, 'Lietuviu rasytoja, romanu \"menulio vaikai\", \"pragaro sodai\", \"ragana ir lietus\", \"agnijos magija\", publicistine knygos \"istremtas tibetas\" autore', 'ivanauskaite'),
(6129, 'Astuoniu muzikos atlikeju ansamblis', 'oktetas'),
(6130, 'Mirtiniu seimos visazalis krumas', 'aka'),
(6131, 'Miestas, kuriame yra uzfiksuotas lietuvos karscio rekordas', 'zarasai'),
(6132, 'Ansktyvuju vynuogiu veisle, isvesta 1904 mvengrijoje', 'sabo perlas'),
(6133, 'Paveikslas cerkveje', 'ikona'),
(6134, 'Xviii amziuje sokoladas buvo vartojamas kaip vaistasliga, nuo kurios jis gyde', 'pilvo skausmas'),
(6135, 'Padrikas tekstas', 'draikalas'),
(6136, 'Pasaulin? vandens diena', 'kovo 22'),
(6137, 'Lietuviu rasytojas, noveliu rinkiniu \"zydi biciu duona\", \"rugsejo pauksciai\", \"horizonte bega sernai\", \"sugrizimas vakarejanciais laukais\", \"keleivio noveles\", \"geguze ant nuluzusio berzo\" autorius', 'aputis'),
(6138, 'Viena zymiausiu senoves egipto sventyklu', 'luksoras'),
(6139, '\"papke\" lietuviskai', 'segtuvas'),
(6140, 'Maltos administracinis vienetas', 'rajonas'),
(6141, 'Zmogaus protevis gyvenes pries 1,5 mlnmetu', 'pitekantropas'),
(6142, 'Prancuzijos feodalines visuomenes 1440 - 1441 mmaistas pries karaliaus valdzios centralizatorine politika', 'pragerija'),
(6143, 'Vilniaus dailes akademija', 'vda'),
(6144, 'Organizmo strukturos desniu pritaikymas dirbtinai sukurtame gyvenime', 'bionika'),
(6145, 'Gydimas mineraliniu vandeniu', 'balneoterapija'),
(6146, 'Feodalines prancuzijos bajoro titulas', 'sevalje'),
(6147, 'Valingu judesiu kooordinacijos sutrikimas', 'ataksija'),
(6148, 'Virsutine virskinamojo trakto dalis, jungiantis rykle su skrandziu', 'stemple'),
(6149, 'Siuolaikines psichologijos kryptis, kuri remiasi zfroido idejomis', 'froidizmas'),
(6150, 'Pagrindine zodzio dalis, pasikartojanti to paties zodzio formose ir giminiskuose zodziuose', 'saknis'),
(6151, 'Neblankantis piesinys arba irasas zmogaus odoje', 'tatuiruote'),
(6152, 'Islandijos piniginio vieneto kronos simtoji dalis', 'eire'),
(6153, 'Poziciniame kare - ruozas tarp priesisku armiju apkasu, kurio nekontroliuoja nei vieni, nei kiti', 'niekieno zeme'),
(6154, 'Lietuviu poetas, eilerasciu rinkinio \"pavasario balsai\", poemu \"jaunoji lietuva\", \"raseiniu magde\", \"musu vargai\", dramu \"kestucio mirtis\", \"vytautas pas kryziuocius\", \"didysis vytautas - karalius\" autorius', 'maironis'),
(6155, 'Minksta apsaugine apmaute, uztempiama ant alkunes, kad ja saugotu nuo sumusimu, suzeidimu', 'antalkunis'),
(6156, 'Vienas is triju svarbiausiu lietuviu dievu, valdantis audras, zemes vaisintojas ir gynejas nuo piktu dvasiu', 'perkunas'),
(6157, '2001 m\"radiocentro\" roko grupe', 'radioshow'),
(6158, 'Musulmonu pasninkas, kuris trunka visa ramadano menesi; draudziama valgyti ir gerti nuo sauletekio iki saulelydzio', 'uraza'),
(6159, 'Toliausiai pasaulyje (pagal kuno ilgi) nusokantis vabzdys', 'blusa'),
(6160, 'Balsi zyminti raide', 'balse'),
(6161, 'Zemes dirbimas plugu; viena pagrindiniu agrotechnikos priemoniu', 'arimas'),
(6162, 'Nacionalinis butano gyvunas, gyvenantis tik himalajuose, ir tik daugiausia butano teritorijoje', 'takin'),
(6163, 'Kelintais metais ivyko pirmoji oskaru iteikimo ceremonija', '1929'),
(6164, 'Argentinos valstybes prezidentas, pavaizduotas filme \"evita\"', 'peronas'),
(6165, 'Dovanos laukiantiems', 'lauktuves'),
(6166, 'Konservavimas organinemis rugstimis', 'marinavimas'),
(6167, 'Nuteisto asmens naujas nusikaltimas po nuteisimo', 'recidyvas'),
(6168, 'Muzikiniame kurinyje ritmo kircio nesutapimas su metro kirciu', 'sinkope'),
(6169, 'Trys vieno futbolisto ivarciai per rungtynes', 'hat trick'),
(6170, 'Asmeninis kitaip', 'personalinis'),
(6171, 'Kontinentinis atabradas', 'selfas'),
(6172, 'Bulviu traskuciai', 'cipsai'),
(6173, 'Minkstas vagonas', 'kupe'),
(6174, 'Centrine londono dalis, istorinis centras', 'sitis'),
(6175, 'Iseiginis vienkinkis arba porinis lietuvos valstieciu vezimas, fajetono atmaina', 'bricka'),
(6176, 'Senegiptieciu gyvybes, sveikatos, vandens ir jureivystes deive, derlingumo ir motinystes globeja', 'izide'),
(6177, 'Ypatingas degimo pradas, pagal alchemiku teorija, esantis degiosiose medziagose', 'flogistonas'),
(6178, 'Esantis anapus pasaulio, neprieinamas patyrimui, esantis uz samones ir pazinimo ribu', 'transcendentinis'),
(6179, 'Prancuzu dailininkas, plakato, afisos pradininkas', 'lotrekas'),
(6180, 'Zinomiausias vynas is italijos pjemonto srities', 'barolo'),
(6181, 'Skaulptorius, \"dovydo su galijoto galva\" autorius', 'donatelas'),
(6182, 'Grazus vezimas', 'karieta'),
(6183, 'Religija, kurios simbolis yra ratas, padalintas i astuonias lygias dalis', 'budizmas'),
(6184, 'Gyvunas, turintis didziausias akis pasaulyje: didysis ...', 'kalmaras'),
(6185, 'Baltijos kranto skardis - klifas ties karkle', 'olando kepure'),
(6186, 'Salis, kurioje buvo israstas popierius', 'kinija'),
(6187, 'Etilo alkoholis, kuriame yra acetono', 'denaturatas'),
(6188, 'Mokslas, tiriantis ezerus, tvenkinius ir jose vykstancius ivairius procesus', 'ezerotyra'),
(6189, 'Istiktukas ozkai saukti', 'ciba'),
(6190, 'Vakarines kataliku pamaldos', 'misparai'),
(6191, 'Kuveito smulkus pinigas', 'filis'),
(6192, 'Naturalios baltymo strukturos pazeidimas', 'denaturacija'),
(6193, 'Kariuomenes zmones', 'kariai'),
(6194, 'Dvejinimasis akyse', 'diplopija'),
(6195, 'Medziagos ikaitinimas iki tam tikros temperaturos, laikymas joje ir greitas atausinimas', 'grudinimas'),
(6196, 'Nuspaudziamas sautuvo itaiselis', 'gaidukas'),
(6197, 'Botsvanos sostine', 'gaboronas'),
(6198, 'Senoves graiku irklinis laivas', 'birema'),
(6199, 'Tapytas staciatikiu dievo paveikslas', 'ikona'),
(6200, 'Nevalgantis mesos patiekalu', 'vegetaras'),
(6201, 'Nedidelis juru motorlaivis zvejoti gaubiamaisias tinklais ar tralu', 'seineris'),
(6202, 'Dygi graizaziedziu seimos piktzole', 'usnis'),
(6203, 'Paskola uz ikeiciama laiva', 'bodmereja'),
(6204, 'Rasytojas (1871-1922m.), romanu \"prarasto laiko beieskant\", \"jaunu zydinciu merginu seselyje\", \"germantu puse\" autorius', 'prustas'),
(6205, 'Vandenynas skalaujantis gvadelupes salas', 'atlanto'),
(6206, 'Mokslas, tiriantis uolienu fizikines savybes', 'petrofizika'),
(6207, 'Zemiausias diplomatinis rangas', 'atase'),
(6208, 'Taisyklingos formos kietasis kunas, turintis tiesias briaunas ir glotnias sieneles', 'kristalas'),
(6209, 'Vaiksciojimo itaisai is medzio ar kitos medziagos: ivairaus ilgio strypai su tam tikrame aukstyje itvirtintais skersiniais pedai', 'kojukai'),
(6210, 'Prancuzijos didziosios revoliucijos veikejaskartu su dantonu vadovavo politiniam kordeljeru klubui [liet.]', 'maratas'),
(6211, 'Linksmo siuzeto draminis veikalas', 'komedija'),
(6212, 'Vyriausiasis 1926 mgruodzio 17-osios perversmo vadas', 'plechavicius'),
(6213, 'Triju sporto saku, rungciu kompleksines varzybos', 'trikove'),
(6214, 'Griezimas dantimis arba ...', 'bruksizmas'),
(6215, 'Kiokio tipo zvaigzde yra musu saule', 'vidutinio'),
(6216, 'Koks dievas, pasak graiku mitu, pralaimejo atenei ginca del atenu globos', 'poseidonas'),
(6217, 'Baltarusijos sostine?', 'minskas'),
(6218, '26-a valstija, prijungta prie jav 26.01.1837 m., sostine lansingas [liet.]', 'miciganas'),
(6219, 'Bisau gvinejos sostine', 'bisau'),
(6220, 'Pagrindinis graikijos administracinis vienetas', 'provincija'),
(6221, 'Gaminys is kakavos, cukraus', 'sokoladas'),
(6222, 'Sviesos pluosto isskaidymas bangu ilgiais spektriniame prietaise', 'dispersija'),
(6223, 'Elektromagnetines bangos bangos, naudojamos rysiams', 'radijo'),
(6224, 'Nesutaikomas priesininkas, varzovas', 'antagonistas'),
(6225, 'Vienos arba keliu transporto priemoniu pralenkimas, susijes su ivaziavimu i priespriesinio eismo juosta', 'lenkimas'),
(6226, 'Legendinis xix apabaigos amerikieciu pramonininkas, vienas is kompanijos \"standard oil\" steigeju ir ilgametis jos vadovas (iki suskaidymo 1906 m.)', 'rokfeleris'),
(6227, 'Keli keliniai zaidziami per ledo ritulio varzybas', '3'),
(6228, 'Optinis prietaisas mazu daiktu padidintam atvaizdui gauti', 'mikroskopas'),
(6229, 'Seklos issiverzimas is varpos', 'ejakuliacija'),
(6230, 'Nedidelis lyrinio pobudzio muzikinis kurinys', 'romansas'),
(6231, 'Virtuv?s irankis', 'peilis'),
(6232, 'Kino ar televizijos filmas, literaturos kurinys apie seklius, painiu nusiklatimu aiskinima', 'detektyvas'),
(6233, 'Ilgiausia lengvosios atletikos begimo rungtis', 'maratonas'),
(6234, 'Kaspinuocio galvute', 'skoleksas'),
(6235, 'Salis, is kurios kilo sportinis zaidimas badmintonas', 'indija'),
(6236, 'Uzuomina i kita literaturos ar meno kurini, asmeni arba ivyki', 'aliuzija'),
(6237, 'Muzikine komedija; sceninis vaidinimas, panasus i operete', 'miuziklas'),
(6238, 'Rastas, kuri naudoja neregiai, apciuopdami kauburelius popieriuje ar plastike', 'brailio'),
(6239, 'Penktas pagal dydi pasaulio miestas 2000 m.', 'niujorkas'),
(6240, 'Ka, isvertus is ispanu kalbos, reiskia alkatrazo salos (kur yra garsusis kalejimas) pavadinimas', 'pelikanas'),
(6241, 'Sterilizavimo aparatas', 'autoklavas'),
(6242, 'Kedes, suolo atrama', 'atlosas'),
(6243, 'Sasiauris tarp mozambiko ir madagaskaro', 'mozambiko'),
(6244, 'Eina pries \"sol\"', 'fa'),
(6245, 'Senoves atenuose - demokratu partijos vadovas', 'demagogas'),
(6246, 'Italu politinis veikejas, dominikonasuz scholastikos kritika inkvizicijos persekiotas ir kalintas kaip eretikas', 'kampanela'),
(6247, 'Mikroskopas akiu dugno tyrimui', 'oftalmoskopas'),
(6248, 'Atviras tarpas', 'anga'),
(6249, 'Cheminis elementas, kurio simbolis \"ti\" [numeris 22]', 'titanas'),
(6250, 'Akvariume laikoma zuvis, panasi i pusmenuli ar lapa', 'skaliaras'),
(6251, 'Salis, kurioje atsirado beisbolas', 'jav'),
(6252, 'Iranga, kurios pagalba kuriami garsu pavyzdziu komplektai', 'sampleris'),
(6253, 'Melo detektorius arba ...', 'poligrafas'),
(6254, 'Virtuoziskas,  sokiams  nepritaikytas  moderniojo dziazo stilius', 'bebop'),
(6255, 'Kaip vadinosi 1898 mpietu afrikoje isteigtas pirmasis pasaulyje laukines gamtos rezervatas', 'sabi'),
(6256, 'Ligos paplitimas tam tikroje vietoveje', 'endemija'),
(6257, 'Mazumos antonimas', 'dauguma'),
(6258, 'Emremarko romanas \"naktis ...\"', 'lisabonoje'),
(6259, 'Kokiais skaiciais prasideda lenkijos bruksninis prekinis kodas', '590'),
(6260, 'Kiek cilindru turi audi-90 2.3', '5'),
(6261, 'Aukstos kilmes asmuo', 'didikas'),
(6262, 'Kas parase pirmaji lietuviu kalbos zodyna', 'sirvydas'),
(6263, 'Greiti medziokliniai sunys', 'skalikai'),
(6264, 'Musulmonu antkapinis statinys, mauzoliejus', 'mazaras'),
(6265, 'Kuriais metais aensteinas paskelbe reliatyvumo teorija', '1905'),
(6266, 'Pirmasis tsrs automatinis zondas, praskriejes pro menuli 1959m.', 'luna 1'),
(6267, 'Argentinos sostine', 'buenos aires'),
(6268, 'Buves geriausiai apmokamas argentinos futbolininkas 2001-2002 msezona', 'batistuta'),
(6269, 'Zmogus vadinamas krepsinio tevu [liet.]', 'naismitas'),
(6270, 'Vikruolis, kurio negaudyk uz uodegos', 'driezas'),
(6271, 'Turto nusavinimas arba perleidimas', 'abalienacija'),
(6272, 'Nuo 1921 mvlenino iniciatyva sovietu rusijoje vykdyta ukio politika, norint greiciau atkurti sugriauta salies uki', 'nepas'),
(6273, 'Cheminis elementas, kurio simbolis \"sg\" [numeris 106]', 'siborgis'),
(6274, 'Slaptas, neskelbtinas', 'konfidencialus'),
(6275, 'Automobiliu gamintojas isleides siuos modelius: corolla, yaris', 'toyota'),
(6276, 'Terminas, vartojamas apibudinti faktinei arba teisinei buklei, kuria norima issaugoti arba atkurti', 'status quo'),
(6277, 'Kokio tipo yra klubo sanarys', 'riesutinis'),
(6278, 'Gamtinis, prigimtinis, nedirbtinis', 'naturalus'),
(6279, 'Digital video device', 'dvd'),
(6280, 'Pinigu skolinimas uz labai dideles palukanas', 'lupikavimas'),
(6281, 'Lietuvos valstybes tarptautinis (telefoninis) kodas (be +)', '370'),
(6282, '\"viktorina\" balses', 'ioia'),
(6283, 'Kaip vadinami 1825 metu gruodzio sukilimo pries caro vienvaldyste dalyviai', 'dekabristai'),
(6284, 'Kaledu isvakariu diena', 'kucios'),
(6285, 'Organo ar ju dalies neissivystymas', 'ageneze'),
(6286, 'Ciapajevo vardas', 'vasilijus'),
(6287, 'Vienuoles viduramziais [dgs.]', 'begines'),
(6288, 'Elektrinio irenginio daliu arba laidu atskyrimas', 'izoliacija'),
(6289, 'Vienas is dvylikos jezaus apastalu, petro brolis, buves betsaidos zvejys', 'andriejus'),
(6290, 'Organizmu paveldimumo vienetas, kuriame yra uzkoduota genetine informacija', 'genas'),
(6291, 'Vaisine muse placiai naudojama tyrimuose', 'drozofila'),
(6292, 'Spastai pelems', 'pelekautai'),
(6293, 'Garsi lietuvos muzikos grupe, grojusi 14 metu', 'foje'),
(6294, 'Likimas, dievu lemtis, dievu valia, kuriai neimanoma pasipriesinti', 'fatumas'),
(6295, 'Zemes plotas, kuriame auga zole', 'pieva'),
(6296, 'Akies voko uzdegimas', 'blefaritas'),
(6297, 'Ketvirtasis vietinio uzdegimo pozymis', 'skausmas'),
(6298, 'Storzieviski juokai', 'farsas'),
(6299, 'Brangus metalas', 'platina'),
(6300, 'Poemu \"eneida\", \"bukolikos\", \"georgikos\" autorius', 'vergilijus'),
(6301, 'Augalu ziedu ir vaisiu susidarymas tiesiai ant kamieno ir senesniuju saku', 'kauliflorija'),
(6302, 'Betonas su gelezine armatura', 'gelzbetonis'),
(6303, 'Sasiauris skiriantis madagaskara nuo afrikos', 'mozambiko'),
(6304, 'Paprasciausias alkanas', 'metanas'),
(6305, 'Japonijos feodalinis karininku luomas [dgs.]', 'samurajai'),
(6306, 'Auksciausias apeninu kalnas', 'kornas'),
(6307, '1/86400 vidutines saules paros dalis', 'sekunde'),
(6308, 'Zmogus, kuris persove popieziu jona pauliu ii', 'ardza'),
(6309, 'Sala, didziausias atolas (koraliniu rifu sala su laguna) pasaulyje [kilm.]', 'kaledu'),
(6310, 'Oficialiai priimta iskilmingu priemimu, eityniu ir pantvarka', 'ceremonialas'),
(6311, '\"geroms mergaitems dangus, blogoms - ...', 'viskas'),
(6312, 'Islamo ispazintojas', 'musulmonas'),
(6313, 'Kiek zmogaus stubure yra slanksteliu', '33'),
(6314, 'Baigiamoji kurinio dalis, kurioje pasakojama apie veikeju likima, praejus tam tikram laiko tarpui', 'epilogas'),
(6315, 'Jausmu ir dvasiniu busenu raiska dailes kurinyje', 'ekspresija'),
(6316, 'Rusu kompozitorius, opereciu \"laisvasis vejas\", \"baltoji akacija\", muzikos kinofilmams kurejas', 'dunajevskis'),
(6317, '17-oji graikiskos abeceles raide', 'ro'),
(6318, 'Antra savaites diena', 'antradienis'),
(6319, 'Toksinas, prarades savo kenksminga poveiki, bet islaikes antigenines savybes', 'anatoksinas'),
(6320, 'Kiek zaideju zaidzia vienoje beisbolo komandoje', '9'),
(6321, 'Buitinis stalo apdangalas', 'staltiese'),
(6322, 'Jura tarp airijos ir anglijos', 'airiu'),
(6323, 'Labai lengvi smulkiadispersiniai silicio dioksido milteliai', 'aerosilas'),
(6324, 'Didysis anglu dramaturgas ir poetas, 17 oksfordo grafas, pasirasinejes viljamo sekspyro slapyvardziu', 'edvardas de vere'),
(6325, 'Xx apirmos puses anglu skulptorius, kurio pagrindine kurybos tema buvo zmogaus formu variaciojos', 'muras'),
(6326, 'Pravaziavimas po zeme', 'tunelis'),
(6327, 'Kas parase veikala \"pazinimo objektas\"', 'rikertas'),
(6328, 'Cheminis elementas, kurio pavadinimas kilo is lotynisko zodzio, kuris lietuviskai reiskia - \"is kipro salos\"', 'varis'),
(6329, '\"kudas\" lietuviskai', 'liesas'),
(6330, 'Tekstas, patikrinantis zinias', 'testas'),
(6331, 'Chemikalai, kuriais sukeliamas kraujo kresejimas', 'koaguliantai'),
(6332, 'Kolekcionierius, renkantis ir kolekcionuojantis monetas - pinigus', 'numizmatas'),
(6333, 'Muzika, kai vienu metu skamba daug balsu', 'polifonija'),
(6334, 'Itaisas durims uzrakinti', 'spyna'),
(6335, 'Dvieju ar daugiau asmenu susitarimas sukurti, pakeisti ar nutraukti civilinius teisinius santykius', 'sutartis'),
(6336, 'Dulkiu telkinys visatoje', 'ukas'),
(6337, 'Kiekybiniai ir kokybiniai nervu strukturos kitimai, jos santykines mases didejimas ir atliekamu funkciju tobulejimas', 'cefalizacija'),
(6338, 'Ispanu piemenu daina tekanciai saulei', 'alborada'),
(6339, 'Grindys valtims laive', 'rostrai'),
(6340, 'Neviltis, didelis nusiminimas', 'desperacija'),
(6341, 'Valstybes administravimo sistema, kuriai yra budinga griezta hierarchine organizacija, zemesniuju organu paklusnumas aukstesniesiems', 'biurokratija'),
(6342, 'Gydytojo recepto nuorasas, vaistines pridedamas prie vaistu', 'signatura'),
(6343, 'Tauta, isradusi drabuziu balinima ir dazyma', 'sumerai'),
(6344, 'Vatikano administraciniu istaigu visuma', 'kurija'),
(6345, 'Pirmasis vokietijos federacines respublikos kancleris', 'adenaueris'),
(6346, 'Pagal tam tikras taisykles sudaryta bibliotekoje esanciu leidiniu ir dokumentu rodykle', 'katalogas'),
(6347, 'Paziuru sistema, neigianti dievo buvima', 'ateizmas'),
(6348, 'Jav karo ministerijos pastatas', 'pentagonas'),
(6349, 'Kataro administracinis vienetas', 'savivaldybe'),
(6350, 'Sala ir australijos valstija, 240 km i pietrycius nuo australijos zemyno', 'tasmanija'),
(6351, 'Riebalai, vaskai, steroidai', 'lipidai'),
(6352, 'Rugstus duonos gerimas', 'gira'),
(6353, 'Retu ir vertingu leidiniu kolekcionavimas', 'bibliofilija'),
(6354, 'Uztvara kelyje', 'barikada'),
(6355, 'Siekimas sustiprinti baznycios itaka valstybeje, jos politiniame gyvenime', 'klerikalizmas'),
(6356, 'Viena svarbiausiu indu religines filosofijos savoku, reiskianti zmogaus veiksmu per jo eiline egzistencija visuma, nulemiancia jo artimiausia persikunijima', 'karma'),
(6357, 'Bulves duobute, is kurios isauga daigas', 'akis'),
(6358, 'Viesas pardavimas, kai daikta igyja asmuo, mokantis uz ji didziausia kaina', 'aukcionas'),
(6359, 'Vokietis poliglotas, mokejes apie penkiasdesimt kalbu, mazosios lietuvos himno \"lietuvninkai mes esam gime\" autorius', 'zauerveinas'),
(6360, 'Sio naciu vado 6 vaikai buvo nuzudyti dar pries jo paties mirti', 'gebelsas'),
(6361, 'Jungiamoji detale', 'jungtis'),
(6362, 'Tukstantoji kokio nors dydzio dalis', 'promile'),
(6363, 'Penkta pagal dydi sala pasaulyje [kilm.]', 'bafino'),
(6364, 'Skotu nacionalinis patiekalas is avies sirdies, kepenu ir plauciu', 'hagis'),
(6365, 'Preparatas parazitiniu ligu sukelejams augalu seklose naikinti', 'beicas'),
(6366, 'Didziojo prusu sukilimo pries kryziuocius (1260-1274 m.) vadas', 'herkus mantas'),
(6367, 'Puliu telkinys', 'pulinys'),
(6368, 'Antras pagal dydi londono aerouostas (orig.)', 'gatwick'),
(6369, 'Liga - nesugebejimas skaiciuoti', 'akalkulija'),
(6370, 'Velenas ant kurio sukasi ratas', 'asis'),
(6371, 'Nba klubas, kuriame visa savo karjera zaide karl malone: utah ...', 'jazz'),
(6372, 'Didziosios britanijos politikas, nuo 1832mparlamento naryskovojo uz laisva prekyba ir airijos savivaldajo nuopelnas - rinkimu reforma [liet.]', 'gladstonas'),
(6373, 'Ikyri ugnies baime', 'pirofobija'),
(6374, 'Neuzstatyta erdve tarp tvirtoves ar miesto sienu ir artimiausiu pastatu', 'esplanada'),
(6375, 'Japonijos \"smegenu sostine\"', 'cukuba'),
(6376, 'Priesdelis, naudojamas su kokio nors dydzio matavimo vienetu, reiskia 10^-21', 'zepto'),
(6377, 'Tenise - kamuoliuko paleidimas zaisti raketes smugiu', 'servas'),
(6378, 'Indu rasytojas, filosofas ir muzikas, nobelio premijos laureatas, indijos ir bangladeso himnu autorius', 'tagore'),
(6379, 'Karaliaus isakas', 'ediktas'),
(6380, 'Pastatas naminiu pauksciu kiausiniu inkubacijai', 'inkubatorijus'),
(6381, 'Ka reiskia zodis \"musulmonas\"', 'paklusnus dievui'),
(6382, 'Kokios salies (vnskilm.) domeno vardas yra \".iq\"', 'irako'),
(6383, 'Graikijos civilizacijos kariu rubai', 'chlamides'),
(6384, 'Ivairiu kalbines israiskos priemoniu visuma', 'stilius'),
(6385, 'Kunu daliu saveikos energija, kurios didumas priklauso nuo to kuno ar ju daliu tarpusavio padeties', 'potencine energija'),
(6386, 'Jauniausias atlikejas, pasiekes jav albumu topo pirmaja vieta, kai jam buvo 13 metu: ..stevie [orig.]', 'wonder'),
(6387, 'Idealios moters apimtys cm/cm/cm', '90/60/90'),
(6388, 'Ritmiskas vieno raumens ar raumenu grupes trukciojimas', 'klonas'),
(6389, 'Prancuzu vienuolis isrades sampana', 'perignonas'),
(6390, 'Savaites diena, kurios pavadinimas kilo nuo saules pavadinimo', 'sekmadienis'),
(6391, 'Lasisiniu seimos zuvis, panasi i silke', 'seliava'),
(6392, 'Dzeuso ir antiopes sunus, savo lyros garsais privertes akmenis judeti', 'amfionas'),
(6393, 'Feodalas, gaves zemiu is senjoro uz atliekamas jam ivairias prievoles', 'vasalas'),
(6394, 'Dirbtinis vandens telkinys, atsirades iskasus grunta ar uztvenkus upe bei kita vandentaki, kad butu galima sukaupti ir reguliuoti vandens nuoteki', 'tvenkinys'),
(6395, 'Kiek yra nutole taikiniai (metrais), i kuriuos reikia saudyti per biatlono varzybas', '50'),
(6396, 'Dirgikliu energijos priemimas ir pavertimas nerviniu impulsu', 'recepcija'),
(6397, 'Tarptautine raudonojo kryziaus diena', 'geguzes 8'),
(6398, 'Atsiskyrelis, marinantis savo kuna', 'asketas'),
(6399, 'Plokscia keturkampe akmens plyta', 'plintas'),
(6400, 'Jav prezidentas pirmojo pasaulinio karo metu', 'vilsonas'),
(6401, 'Banku ir laikrodziu salis', 'sveicarija'),
(6402, 'J.alesi (f1) tautybe', 'prancuzas'),
(6403, 'Kokios spalvos aristokratu kraujas', 'melynas'),
(6404, 'Valstybinis dvaras, kurio pajamos eina karaliui kaip alga', 'ekonomija'),
(6405, 'Kas yra vadinamas elktrolitines disociacijos toerijos autoriumi', 'arenijus'),
(6406, 'Siuvinejimo siules elementas; nuo ju sudarymo ir isdestymo priklauso siules rusis', 'dygsnis'),
(6407, 'Didele spiraline galaktika grizulo ratu zvaigzdyne nuo saules nutolusi 10 mlnsviesmeciu', 'm81'),
(6408, 'Musis, kuriame 732 mfrankai sustabde arabu verzimasi i europa', 'puatje'),
(6409, 'Lietuvos kinologu draugija', 'lkd'),
(6410, 'Jupiterio palydovas, pavadintas vienos is dzeuso meiluziu, milzino titijaus motinos vardu', 'elara'),
(6411, 'Kosmetikos mokslas', 'kosmetologija'),
(6412, 'Neapykanta, priesiskumas zydams', 'antisemitizmas'),
(6413, 'Siaures airijos sostine', 'belfastas'),
(6414, 'Daiktas kalveje, ant kurio kalama gelezis', 'priekalas'),
(6415, 'Senegipto dievas, mirusiuju, nekropoliu ir balzamuotoju globejas; vaizduojamas sakalu arba zmogumi su sakalo galva', 'anubis'),
(6416, 'Ausu ligu gydytojas', 'otiatras'),
(6417, 'Pasunkejes kvepavimas del kvepavimo taku susiaurejimo', 'stridoras'),
(6418, 'Plaukiojancio burlaivio padetis vejo atzvilgiu', 'halsas'),
(6419, 'Ferrari bolido spalva', 'raudona'),
(6420, 'Laivo sandelys', 'triumas'),
(6421, 'Pagrindine valstybes finansine institucija, surenkanti butinas veiklai iplaukas ir uztikrinanti per vykdoma biudzeta privalomu valstybes reikmiu tenkinima', 'izdas'),
(6422, 'Virsutine moterisko kostiumo dalis, svarkelis.daznai iimtas per liemeni', 'zaketas'),
(6423, 'Salis, kurioje pagal musulmonu tikejima apsigyveno isvaryti is rojaus adomas ir ieva', 'sri lanka'),
(6424, 'Tarptautinis susitarimas arba tarptautine sutartis', 'konvencija'),
(6425, 'Meno kurinio arba pastato formu sandara, desningas ivairiu elementu derinys', 'kompozicija'),
(6426, 'Akies raineles uzdegimas', 'iritas'),
(6427, 'Vyrvardas, kiles is lotkalbos, reiskia \"lauro medis, lauro sakele, lauru vainikas\"', 'laurynas'),
(6428, 'Rusijos monarcho titulas', 'caras'),
(6429, 'Maskuojamuju daiktu nudazymas stambiais dryziais, dememis', 'kamufliazas'),
(6430, 'Pianino mygtukas', 'klavisas'),
(6431, 'Rytu tautu devima apskrita arba kampuota rastuota kepuraite', 'tiubeteika'),
(6432, 'Koks zinduolis 1981m rugsejo 21dpaskelbtas belizo nacionaliniu gyvunu', 'tapyras'),
(6433, 'Uosles sutrikimas', 'parosmija'),
(6434, 'Vaizduojamojo meno saka', 'daile'),
(6435, 'Mokslinis ar techninis tyrinejimas', 'bandymas'),
(6436, 'Mokslas apie varliagyvius ir roplius', 'herpetologija'),
(6437, 'Wnba komanda is orlando', 'miracle'),
(6438, 'Sportininkas, kultivuojantis gimnastika', 'gimnastas'),
(6439, 'Indas gelems pamerkti', 'vaza'),
(6440, 'Atmosferos slegis kylant aukstyn - dideja/mazeja', 'mazeja'),
(6441, 'Nuo gaisro nukentejes zmogus', 'padegelis'),
(6442, 'Neauksta apskrita, staciakampe arba daugiakampe pakyla sinagogoje, ant kurios atliekamos apeigos, skaitoma tora, sakomi pamokslai', 'bima'),
(6443, 'Imperatorius, kuriam valdant romoje krikscionybe tapo valstybine religija', 'teodosijus'),
(6444, 'Jezuitu ordino ikurejas, 1622 mpaskelbtas sventuoju', 'lojola'),
(6445, 'Sventyklos ar rumu sale su daugybe taisyklingai isdestytu lubas remianciu kolonu', 'hipostilis'),
(6446, 'Kaip vadinami dielektrikai kuriu molekuliu arba atomu teigiamu ir neigiamu kruviu centrai sutampa', 'nepoliniai'),
(6447, 'Liejinio defektas - plona briauna ant liejinio ties formu daliu sujungimu', 'islaja'),
(6448, 'Jav sostine', 'vasingtonas'),
(6449, 'Milziniskos bezdziones, gyvenusios indijoje pries 2 milijonus metu', 'gigantopitekai'),
(6450, 'Buves uzsienio reikalu ministras konservatoriu valdomuose kabinetuose, deleguotas lkdp', 'saudargas'),
(6451, 'Automobiliu gamintojas isleides siuos modelius: boxer, partner, expert', 'peugeot'),
(6452, 'Musu kaimyne, nato nare', 'lenkija'),
(6453, 'Vamzdiniu organu (stemples, slapimtakiu) isorinis dangalas', 'adventicija'),
(6454, 'Negrazus, nemandagus poelgis', 'kiaulyste'),
(6455, 'Ypatinga nuostata tarptautineje sutartyje ar susitarime', 'klauzule'),
(6456, '\"minesota timberwolves\" komandos sudetyje buves lietuvis', 'praskevicius'),
(6457, 'Anglies rugsties druska', 'karbonatas'),
(6458, 'Mokslas, tiriantis uolienu mineraline ir chemine sudeti, struktura ir tekstura, susidaryma, kitima ir paplitima', 'petrografija'),
(6459, 'Pagrindiniu valstybes priemoniu pardavimas privatiem asmenim', 'privatizacija'),
(6460, 'Rengimosi varzyboms fiziniai pratimai, kuriu tikslas harmoningai lavinti kuna, jo dalis', 'agonistika'),
(6461, 'Viename popieriaus lape isspausdintas ir sulankstytas, bet nesusegtas leidinys', 'bukletas'),
(6462, 'Zmogaus gyvenimo trukmei ar apibreztam terminui nustatyta teise naudoti svetima daikta ir gauti is jo vaisius', 'uzufruktas'),
(6463, 'Auksciausias ugnikalnis europoje', 'etna'),
(6464, 'Kas parase \"lietuviu senobes bruozai\"', 'klimas'),
(6465, 'Krastas, valstybe', 'salis'),
(6466, 'Senoves graiku dievaitis, pandoros vyras, charakterizuojamas kaip \"pirma darantis, o po to galvojantis\"', 'epimetejas'),
(6467, 'Populiarus sportinis 4/4 metro greito tempo sokis', 'samba'),
(6468, 'Trumpakojis medzioklinis suo', 'taksas'),
(6469, 'Organizmu svytejimas, budingas daugeliui mikroorganizmu, bestuburiams gyvunams, zuvims', 'bioliuminescencija'),
(6470, 'Sporto sakos specialistas, rengiantis sportininkus', 'treneris'),
(6471, 'Svedijos automobiliu gamintojas, sukures modelius \"9000\", \"93\", \"95\" ir kt.', 'saab'),
(6472, 'Birzoje - privilegija, igyjama sumokant tam tikra mokesti', 'opcionas'),
(6473, 'Geniniu burio pauksciai, kuriuos brazilai vadina \"joao bobo\" (\"jonelis kvailutis\") [dgs.]', 'tingiapauksciai'),
(6474, 'Gerimas, kildinamas is kinijos', 'arbata'),
(6475, 'Vienas zymiausiu visu laiku piratu (1680-1718 m.), pavadintas pagal jo barzdos spalva', 'juodabarzdis'),
(6476, 'Taisiklinga sesiasone geometrine figura', 'kubas'),
(6477, 'Buvusi britanijos premjere', 'tecer'),
(6478, 'Sunbezdzione, gyvenanti afrikos tropiniuose miskuose', 'gvereca'),
(6479, 'Sventasis, gyvenes 1080-1134, vokieciu didikas is prusijos, patyres netiketa atsivertima, po to tapes klajojanciu pamokslininku', 'norbertas'),
(6480, '25-a valstija, prijungta prie jav 15.06.1836 m., sostine litl rokas [liet.]', 'arkanzasas'),
(6481, 'Xii-xvi aeuropos dailes ir architekturos stilius', 'gotika'),
(6482, 'Popierinis pinigas', 'banknotas'),
(6483, 'Miestas kalifornijoje [jav], kuriame isikurusi kietuosius diskus (hdd) gaminanti \"western digital\" kompanijos vadovybe: lake ..[angl.]', 'forest'),
(6484, 'Senoveje pozeminis kanalas nesvarumams nuteketi', 'kloaka'),
(6485, 'Itaisas kambariams sildyti, padarytas is vamzdziu, kuriais teka karstas vanduo', 'radiatorius'),
(6486, 'Organizmai prisitaike gyventi tekanciame vandenyje', 'reofilai'),
(6487, 'Trikampe bure, iskleista po stagu tarp stiebu', 'stakselis'),
(6488, 'Naciu partijos krasto, zemes valdovas', 'gauleiteris'),
(6489, 'Isiteikimas, pagyrimas, maloni pastaba', 'komplimentas'),
(6490, 'Viena skiemeninio japonu rasto formu', 'hiragana'),
(6491, 'Graiku ir egiptieciu styginis muzikos instrumentas', 'lyra'),
(6492, 'Dievo vardas ir automobiliu gamintojas', 'mazda'),
(6493, 'Sunaus zmona', 'marti'),
(6494, 'Nhl klubas, kuriame diubiutavo zubrus [angliskai]', 'flyers'),
(6495, 'Kuriame nors moksle naudojamu tyrimo budu visuma', 'metodologija'),
(6496, 'Salos del kuriu nesutaria rusija su japonija', 'kurilu'),
(6497, 'Pilieciu taryba senoves atenuose', 'bule'),
(6498, 'Nedidelis kelioniu, pramogu ir sporto laivas', 'jachta'),
(6499, 'Tapybos technika, kuomet tapoma greitai, dazniausiai net be piesinio', 'alla prima'),
(6500, 'Daugiagalvis pasaku herojus', 'slibinas'),
(6501, 'Nuskendes rusijos karinis povandeninis laivas', 'kurskas'),
(6502, 'Oficialaus diplomatinio bendravimo ir paprociu visuma', 'protokolas'),
(6503, 'Graiku kilmes romos gydytojas, nustates, kad arterijomis teka kraujas, o ne oras', 'galenas'),
(6504, 'Italijos sritis, kurioje yra roma', 'lacijus'),
(6505, 'Brukstelejimas pasirasant', 'parafas'),
(6506, 'Daryti ka nors baltesniu', 'balinti'),
(6507, 'Lytiskai subrendes vabzdys', 'imagas'),
(6508, 'Kepta kruopu ar bulviu tesla', 'vedarai'),
(6509, 'Romenu laidotuviu rauda, atliekama, pritariant fleitai', 'nenija'),
(6510, 'Kopecios aukstaitiskai', 'liesvos'),
(6511, 'Specialiai paruostas titnago gabalas, nuo kurio nuskeltas skeltes zmones senoveje naudojo irankiu gamybai', 'skaldytinis'),
(6512, 'Prakeikimas ir atskyrimas nuo religines zydu bendruomenes', 'cheremas'),
(6513, 'Koloidinis tirpalas', 'zolis'),
(6514, 'Garu virtimas skysciu', 'kondensacija'),
(6515, 'Gelezinkelio sviesoforas', 'semaforas'),
(6516, 'Iskastinis dramblys, gyvenes sibire, europoje ir samerikoje', 'mamutas'),
(6517, 'Supersunkusis vandenilio izotopas, kurio branduolys susideda is vieno protono ir dvieju neutronu', 'tritis'),
(6518, 'Kaip vadinamas didelis susikaupimas, susitelkimas, susimastymas', 'kontempliacija'),
(6519, 'Egipto religijoje - pirmasis is dievu, pasaulio kurejas; tapatintas su besileidziancia saule', 'atumas'),
(6520, 'Meteoritinis krateris', 'astroblema'),
(6521, 'Skirtingu oro masiu pereinamoji zona, ju salyginis skiriamasis pavirsius: atmosferos ...', 'frontas'),
(6522, 'Zymi dainininke is islandijos', 'bjork'),
(6523, 'Antras miestas ant kurio jav numete atomine bomba', 'nagasakis'),
(6524, 'Norvegu keliautojas, okeanografas, izymus arkties tyrinetojas, 1922 metais pelnes nobelio taikos premija', 'nansenas'),
(6525, 'Kur 2004 metais vyko olimpines zaidynes', 'atenuose'),
(6526, 'Teiginys, kuris turi buti irodytas', 'teze'),
(6527, 'Graiku mitologijoje - vaivorykstes deive', 'iride'),
(6528, 'Kaip vadinami vynai, kurie yra realizuojami praejus 3 menesiams po vynuogiu apdorojimo', 'ordinariniai'),
(6529, 'Juostele, uzklijuota ant prekes, rodanti, kad sumoketas akcizas arba muitas', 'banderole'),
(6530, 'Popgrupes \"depeche mode\" vokalisto pavarde (angl.)', 'gahan'),
(6531, 'Skundas aukstesnei instancijai, kuri turi teise is esmes persvarstyti dalyka (byla)', 'apeliacija'),
(6532, 'Vaikoma antilope', 'gnu'),
(6533, 'Koks naminis gyvunas viduramziu daileje simbolizuoja kvailuma ir tinguma', 'asilas'),
(6534, 'Brangiakailis zverelis su plaukiojamosiomis uzpakaliniu koju plevelemis', 'audine'),
(6535, 'Netiketas siuzeto pasikeitimas', 'peripetija'),
(6536, 'Kompanija, pagaminusi mobiliu telefonu modelius: s200, d800', 'sendo'),
(6537, 'Dailininkas, lietuvos meno mokyklos kaune steigimo iniciatorius', 'vienozinskis'),
(6538, 'Radioakyvus elementas, vartojamas kaip branduolinis kuras', 'uranas'),
(6539, 'Jungtiniu tautu svietimo, mokslo ir kulturos organizacija', 'unesco'),
(6540, 'Knygos apie maugli autorius', 'kiplingas'),
(6541, 'Kaip vadinami labiausiai velyku sala isgarsine monumentai', 'moai'),
(6542, 'Universal serial bus', 'usb'),
(6543, 'Nepaprastai smarkus vejas', 'uraganas'),
(6544, 'Ideja, teigianti, kad zmogu, gyvunus sukure dievas', 'kreacionizmas'),
(6545, 'Budizmo saka, siulanti asmeninio issigelbejimo kelia, jos idealas - arhatas (asmuo, pasiekes nirvana savo pastangomis ir nesirupinantis del kitu likimo)', 'hinajana'),
(6546, 'Epidemine gyvuliu liga', 'juodlige'),
(6547, 'Foto aparato, kino kameros optinis itaisas kadro riboms nustatyti', 'vizyras'),
(6548, 'Skliauto ispjova, statmena paciam skliautui', 'liunete'),
(6549, 'Seksualinius santykius globojantis lietuviu dievas; jam aukoja jaunuoliai, ruosdami nuotaka lydeti pas jaunaji', 'pizius'),
(6550, '3-as pagal dydi ezeras pasaulyje [vard.]', 'viktorija'),
(6551, 'Protestantizmo kryptis, dbritanijos valstybine religija', 'anglikonybe'),
(6552, 'Dabartines lietuvos regionas, kuriame buvo istorine baltu zeme - keklys', 'zemaitija'),
(6553, 'Puolantis is pasalu', 'pasalunas'),
(6554, 'Kraujo vezys', 'leukemija'),
(6555, 'Miestelis, kuriame vasara vyksta bliuzo vakarai', 'varniai'),
(6556, 'Knyga skirta zodzio reiksmei surasti', 'zodynas'),
(6557, 'Buves ssrs rinktines ir kijevo \"dinamo\" puolejas, geriausias 1986meuropos futbolininkas', 'belanovas'),
(6558, 'Pastabos knygu ar rankrasciu parastese', 'marginalijos'),
(6559, 'Fermentas, katalizuojantis makromolekuliu susidaryma is monomeru', 'polimeraze'),
(6560, 'Valstybe, finansavusi pirma kelione aplink pasauli', 'ispanija');
INSERT INTO `vikte_klsm` (`id`, `klsm`, `ats`) VALUES
(6561, 'Musamasis muzikos instrumentas, sudarytas is tam tikra derme parinktu metaliniu ploksteliu, musamu mediniais plaktukais', 'metalofonas'),
(6562, 'Dorovinis pamokymas', 'moralas'),
(6563, 'Kas parase knyga \"varpu metas\" [orig.]', 'gripe'),
(6564, 'Arabu valstybes pavadinimas', 'kalifatas'),
(6565, 'Kaulu junginys, saugantis galvos smegenis', 'kaukole'),
(6566, 'Zodziai, ateje i kuria nors kalba is kitos kalbos', 'skoliniai'),
(6567, 'Staigus sirdies pulso padidejimas', 'tachikardija'),
(6568, 'Popieziaus aplikrastis religijos, morales ar socialiniais politiniais klausimais', 'enciklika'),
(6569, 'Australijos rupuzes', 'agos'),
(6570, 'Blizzard kompiuterinis zaidimas \"starcraft ......\"', 'broodwar'),
(6571, 'Laikinas cheminio elemento, kurio simbolis \"uut\" [numeris 112] pavadinimas', 'ununtris'),
(6572, 'Tapytojas, \"losejai kortomis\", \"rukorius\" autorius', 'sezanas'),
(6573, 'Kroatijos piniginis vienetas', 'kuna'),
(6574, 'Primelziamas pieno kiekis', 'primilzis'),
(6575, 'Senoves graiku mitine butybe - moteris su liutes liemeniu', 'sfinksas'),
(6576, 'Vlado garasto gimtine', 'birzai'),
(6577, 'Pokstai, juokeliai', 'isdaigos'),
(6578, 'Kiokioje dabartines valstybes teritorijoje buvo isukurusi babilono civilizacija', 'irake'),
(6579, 'Psichomotorinis sutrikimas - susilpneja elementarios psichines funkcijos', 'katatonija'),
(6580, 'Gana savarankiskos istoriskai arba geografiskai nutolusios nuo metropolijos arba retai gyvenamos teritorijos', 'dependencija'),
(6581, 'Kokios grupes nare yra erica jennings', 'skamp'),
(6582, 'Ekranuotas suktos poros kabelis', 'ftp'),
(6583, 'Pozeminis vanduo, tekantis is mitybos srities i drenazo (istakos) sriti hidraulinio nuolydzio kryptimi', 'tekme'),
(6584, 'Lietuviu bandos ar/ir piemenu dievas', 'jaucbaubis'),
(6585, 'Salis, kurioje atsirado sporto saka bobslejus', 'sveicarija'),
(6586, 'Lietuvos respublikos ministras pirmininkas 1918.12.16-1919.03.05, 1919.04.14-1919.10.02 ir 1926.06.15-1926.12.17', 'slezevicius'),
(6587, 'Samurajus, nesugebejes apsaugoti savo seimininko nuo nuzudymo', 'roninas'),
(6588, 'Lyrine, graudi amerikieciu negru liaudies daina', 'bliuzas'),
(6589, '6-a pagal dydi jura pasaulyje', 'ochotsko'),
(6590, 'Vertikali issikisusi atrama sienai sutvirtinti arba skliautinems perdangoms atremti', 'kontraforsas'),
(6591, 'Xix arusu kompozitorius, operu \"borisas godunovas\", \"chrovanscina\" autorius', 'musorgskis'),
(6592, 'Pavirsiaus palinkimas kuria nors kryptimi, nuolaidumas', 'nuolydis'),
(6593, 'Lietuvos zydu savivaldybinis organas [xva.]', 'kahalas'),
(6594, 'Kurortine gyvenviete latvijoje, 20 km i vakarus nuo rygos, prie rygos ilankos ir lielupes kilpos', 'majuoriai'),
(6595, 'Virs litosferos ir hidrosferos iki 100 km esantis sluoksnis', 'atmosfera'),
(6596, 'Kelintais metais gime dainininke kylie minogue', '1968'),
(6597, 'Naftos distiliacijos frakcija, issiskirianti 200 - 400 laipsniu temperaturoje', 'gazolis'),
(6598, 'Poetines kalbos garsyno darnumas, raiskumas, itaigumas', 'eufonija'),
(6599, 'Procesas, kai aplinkos temperatura krenta zemiau 0 ir vandens skystoji faze virsta kietaja faze - ledu', 'ledodara'),
(6600, 'Ilgiausias klavisas klaviaturoje', 'space bar'),
(6601, 'Zmogus, parenges pirma lietuviska knyga', 'mazvydas'),
(6602, 'Kambarinis apavas', 'slepetes'),
(6603, 'Graviruotas arba raizytas akmuo, dazniausiai brangakmenis', 'gema'),
(6604, 'Pirmykstis urvinis zmogus', 'trogloditas'),
(6605, 'Garsus asmuo ar daiktas, izymybe', 'garsenybe'),
(6606, 'Rpolanskio filmas, 2002 mkanu kino festivalyje apdovanotas \"auksine palmes sakele\"', 'pianistas'),
(6607, 'Bangiofitiniu klases raudondumbliu eile', 'bangeciai'),
(6608, 'Vaisius su seklomis ar kauliuku minkstime', 'uoga'),
(6609, 'Automobiliu gamintojas isleides siuos modelius: a6, a8, tt', 'audi'),
(6610, 'Legendinis senosios irano religijos (zoroastrizmo) steigejas', 'zaratustra'),
(6611, 'Dekoruotas tarpas tarp langu', 'triumo'),
(6612, 'Civiliniame juru laivyne - laivo vadas', 'kapitonas'),
(6613, 'Pleviniai smegenu kapsules ploteliai tarp kaukoles skliauto kaulu', 'momeneliai'),
(6614, 'Raumenu susitraukimo rusis, kai nekinta raumenu tonusas, bet kinta ilgis', 'izotoninis'),
(6615, '\"nirvanos\" lyderis, nusizudes 1994 m.: kurt ..[orig.]', 'cobain'),
(6616, 'Planetos ar gamtinio palydovo zona, esanti po pluta', 'mantija'),
(6617, 'Italijos miestas, ligurijos srities centras', 'genuja'),
(6618, 'Koks gyvunas kdonelaicio poemoje \"metai\" vadinamas \"sturluku\"', 'kiskis'),
(6619, 'Auksciausias medis pasaulyje: didysis ...', 'mamutmedis'),
(6620, 'Senoves salis, tarp dunojaus zemupio ir balkanu', 'mezija'),
(6621, 'Poetas, mitu ciklo \"metamorfozes\", elegiju autorius', 'ovidijus'),
(6622, 'Agentas deilas ..(\"tvin pyksas\")', 'kuperis'),
(6623, 'Politine judejimo, partijos ar vyriausybes linija, reiskianti siekima atsiskirti nuo ko nors, egzistuoti ir veikti savarankiskai ir nepriklausomai', 'separatizmas'),
(6624, 'Hitlerineje koncentracijos stovykloje is kaliniu tarpo paskirtas priziuretojas', 'kapas'),
(6625, 'Mokslas, tiriantis vulkanus ir vulkanizma', 'vulkanologija'),
(6626, 'Uztvara gatviu kautynese', 'barikada'),
(6627, 'Kiek laipsniu turejo pasukti ikiislamines arabu visuomenes zmonos seimos palapine, kad vyrui jau butu aisq, kad jis isvaromas', '180'),
(6628, 'Kaip senoves lietuvoje buvo vadinami vikingai', 'zuvedai'),
(6629, 'Pirmos klonuotos avies vardas', 'doli'),
(6630, 'Kokia yra prancuzijos nacionaline gele', 'irisas'),
(6631, 'Lietuviu rasytoja, romano \"sermenys\" autore', 'juknaite'),
(6632, 'Rasytojas, romanu \"nykstukas\", \"sibile\", \"barabas\", \"ahasfero mirtis\", \"sventoji zeme\" autorius (liet.)', 'lagerkvistas'),
(6633, 'Akytas sausainis, vartojamas vietoj duonos', 'galeta'),
(6634, 'Kaip iki 1946 mvadinosi kaliningrado srities miestas gusevas', 'gumbine'),
(6635, 'Senoves graikijos kariu devetas trumpas virsutinis drabuzis, susegamas per pecius arba po smakru', 'chlamide'),
(6636, 'Pagrindinis austrijos administracinis vienetas', 'provincija'),
(6637, 'Koks yra rankinio vartu aukstis (cm)', '200'),
(6638, 'Spiritizme - psichine srove, spinduliuojanti is zmogaus kuno', 'fluidas'),
(6639, 'Saldus spirituotas desertinis vynas', 'muskatas'),
(6640, 'Kaip vadinamas silumos perdavimas skysciu arba duju srovemis', 'konvekcija'),
(6641, 'Kada prasidejo mongolu uzkariavimai europoje', '1206'),
(6642, 'Teiginys, fiksuojantis nezinomus ir aiskintinus kurios nors situacijos, uzdavinio elementus', 'klausimas'),
(6643, 'Auksciausias pasaulyje kalnas', 'everestas'),
(6644, 'Atkandamas gabalas', 'kasnis'),
(6645, 'Fizikinio dydzio atsitiktinis santykinis nuokrypis nuo vidutines vertes', 'fliuktuacija'),
(6646, 'Mases vienetas lygus 31.1 gramo', 'uncija'),
(6647, 'Gvinejos sostine', 'malabis'),
(6648, 'Bambukine meska', 'panda'),
(6649, 'Romenu kalendorines sventes [dgs.]', 'ferijos'),
(6650, 'Miestas, kuriame yra pastatas, turintis sunkiausia pasaulyje stoga', 'sidnejus'),
(6651, 'Chorinis dainavimas be pritarimo', 'a cappella'),
(6652, 'Pasakojimas, kuri seka senele', 'pasaka'),
(6653, 'Ledyno pakrascio arba prieledyninio vandens telkinio abrazines bangu veiklos darinys', 'kalvagubris'),
(6654, 'Asmuo pabeges is kariuomenes', 'dezertyras'),
(6655, 'Bendrove, lietuvoje turinti daugiausia mobiliojo rysio vartotoju', 'geotermine'),
(6656, '\"viesnia is siaures\", \"kryzkele\" autorius', 'vienuolis'),
(6657, 'Kroatijos sostine', 'zagrebas'),
(6658, 'Vidurzemio, juodosios, siaures ir baltijos juru pakrantese augantis sketiniu seimos augalas', 'pajurine zunda'),
(6659, 'Daugelio saliu ginkluotoju pajegu jaunesniuju karininku auksciausiasis karinis laipsnis', 'kapitonas'),
(6660, 'Hinduizmo religine srove, tvirtinanti, jog kiekvienas daiktas, psichinis ar fizinis reiskinys yra dieviskosios tikroves atspindys, todel per daiktus, potyrius ir pojucius galima priarteti prie jos', 'tantrizmas'),
(6661, 'Veido raumenu judesiai, isreiskiantys jausmus, nuotaikas', 'mimika'),
(6662, 'Sirdies vidaus ertmiu dangalas', 'endokardas'),
(6663, 'Kaulo uzdegimas', 'ostitas'),
(6664, 'Variagu kunigaikscio riuriko karvedys, pirmasis kijevo rusios valdovas', 'olegas'),
(6665, 'Kompiuteriu pramoneje - terminas, kuriuo yra apibudinama detale be ipakavimo, tam, kad vartotojui butu palankesne kaina ja isigyti', 'bulk'),
(6666, 'Noveles \"ercia, kur gaivus vanduo\" autorius', 'aputis'),
(6667, 'Dainuoja vienas', 'solistas'),
(6668, 'Vienintele is 10 pakviestu nauju valstybiu i es (2003m.) nerengusi referendumo del stojimo i europos sajunga', 'kipras'),
(6669, 'Diplomatinis vatikano atstovas', 'nuncijus'),
(6670, 'Ka reiskia lan (orig.)', 'local area network'),
(6671, 'Kuriais metais franku valdovas karolis didysis vainikuojamas sventosios romos imperijos imperatoriumi', '800'),
(6672, 'Normanu valstybeles karalius', 'konungas'),
(6673, 'Prietaisas atmosferos krituliu kiekiui matuoti', 'pliuviometras'),
(6674, 'Po magelano antras pasauli apiplauke', 'frensis dreikas'),
(6675, 'Naminiu gyvuliu skirtingu veisliu misrunas', 'metisas'),
(6676, 'Valstybe, kurios domeno vardas yr \".sy\"', 'sirija'),
(6677, 'Zmogaus jutimo organas, svliucijos atributas [dgs.]', 'akys'),
(6678, 'Medicinos saka, tirianti senatves ligas, ju gydyma ir profilaktika', 'geriatrija'),
(6679, 'Miestas vokietijoje, kuriame 1923mpradejo veikti pirmasis pasaulyje planetariumas [liet.]', 'miunchenas'),
(6680, 'Bendra vienuoliu miegamoji patalpa kai kuriu vienuolynu miegamuosiuose bei konventinese pilyse', 'dormitorijus'),
(6681, 'Lotyniskai \"amzinasis variklis\": perpetuum ...', 'mobile'),
(6682, 'Atomu branduoliai [dgs.]', 'nuklidai'),
(6683, 'Kuriame nors leidinyje paskelbtas darbas, kurinys', 'publikacija'),
(6684, 'Kokiu slapyvardziu pasirasinejo prancuzu dramaturgas zanas batistas poklenas', 'moljeras'),
(6685, 'Loginis elementas, duodantis signala tada, jei yra signalas prie abieju ivesties tasku', 'ir'),
(6686, 'Specialios formos, palyginti didelio pavirsiaus dirbtinis pelekas, tvirtinamas prie kojos', 'plaukmuo'),
(6687, 'Tekstiles, popieriaus ir odos gaminiai sienoms ir baldams dekoruoti', 'apmusalai'),
(6688, 'Salis, kurioje 1910 mgime motina terese', 'albanija'),
(6689, 'Zoolduobagyviu tipo klase, koraliniai polipai, kurie nejudedami gyvena juros dugne; kai kurie sudaro vadkoralinius rifus ir salas', 'antozojai'),
(6690, 'Kietas , trapus metalas', 'osmis'),
(6691, 'Operete : \" ..vedybos\"', 'figaro'),
(6692, 'Katinas, gyvenantis draugiskai', 'leopoldas'),
(6693, 'Australijos pavadinimas kilo is zodzio \"australis\", reiskiancio ...', 'pietinis'),
(6694, 'Sutrikimas, kurio metu negalima ivertinti pagrindo, ant kurio stovima', 'abazija'),
(6695, 'National basketball association', 'nba'),
(6696, 'Kitos kalbos zodziu tarimo uzrasymas savo kalbos rasyba', 'transkripcija'),
(6697, 'Zmogaus amzius, ilgesnis uz vidutini', 'ilgametyste'),
(6698, 'Kaip dar vadinamas kaspijos ezeras', 'kaspijos jura'),
(6699, 'Serialas: beverly hills ...', '90210'),
(6700, 'Plienine sija traukinio ratams riedeti', 'begis'),
(6701, '\"ziedu valdovo\" autorius', 'tolkienas'),
(6702, 'Bendroves leidinys, kuriame ji teikia finansine informacija apie pasirengima platinti naujus vertybinius popierius', 'emisijos prospektas'),
(6703, 'Be plauku', 'plikas'),
(6704, 'Hyper text transfer protocol', 'http'),
(6705, 'Suolininko i auksti irankis - stiklo pluosto arba kitokiu medziagu ivairaus ilgio strypas, suolio metu naudojamas kaip atrama kunui per kartele perkelti', 'kartis'),
(6706, 'Ka lietuviskai reiskia \"bergschlosschen\" pavadinimas, kuriuo iki 1918mvadinosi \"kalnapilio\" alaus darykla', 'pilaite ant kalvos'),
(6707, 'Pozeminio vandens geochemija, tymokslas, tiriantis pozeminio vandens kilme, chemine sudeti ir jos kaita del gamtinio ir antropogeninio poveikio', 'hidrogeochemija'),
(6708, 'Vyrvardas, kiles is lotkalbos, reiskia \"lemtis, likimas\"', 'bonifacas'),
(6709, 'Pirmasis lietuviskas zurnalas', 'ausra'),
(6710, 'Poligrafine dailes kurinio kopija', 'reprodukcija'),
(6711, 'Prancuzu tapytojas, \"moteris su gitara\", \"portugalas\" autorius', 'brakas'),
(6712, 'Siaures amerikos pietvakariu indenu gyvenviete', 'pueblas'),
(6713, 'Dekoratyviniu sunu  veisliu grupe, garbanotu ar banguotu kailiu', 'pudeliai'),
(6714, 'Japonijos elektronikos gigantas zymus televizoriais, nesiojamais grotuvais, zaidimu kompiuteriais', 'sony'),
(6715, 'Europoje vartojamas japonijos ir kinijos budistu vienuolio pavadinimas', 'bonza'),
(6716, 'Hidrologijos saka, tirianti vandens objektu rezima specialiais irengimais, prietaisais ir metodais, kaupianti ir sisteminanti stebejimu rezultatus', 'hidrometrija'),
(6717, 'Tikrinimas, prieziura', 'kontrole'),
(6718, 'Satyrinis arba humoristinis zmogaus portretas', 'sarzas'),
(6719, 'Gautas duomuo ar rezultatas', 'gavinys'),
(6720, 'Kiausides uzdegimas', 'ooforitas'),
(6721, 'Vyresniojo puskarininkio laipsnis ir pareigybe pestininku, artilerijos ir inzinerijos kuopose rusijoje ir kai kuriu kitu saliu kariuomeneje', 'feldfebelis'),
(6722, 'Pastovus dydis, kuris yra kito (kintamojo) dydzio skaitinis arba raidinis daugiklis', 'koeficientas'),
(6723, 'Sausumos prekybinis kelias, kuriuo sengelezies amziuje romos imperija jungesi su baltais', 'gintaro'),
(6724, 'Koks yra molekuliu emisijos ir absorbcijos spektras', 'juostinis'),
(6725, 'Kiek coliu atitinka 1 peda (30,48 cm)', '12'),
(6726, 'Lietliaudies posakis: sunkus darbas ..duona kepa', 'gardzia'),
(6727, 'Eilerasciu rinkinio \"manyoshu\" sudarytojas, alegorines poezijos pradininkas japonijoje', 'yakamochi'),
(6728, 'Senoves graikijos kiniku ir stoiku paziura, pagal kuria, norint buti patenkintam ir laimingam, reikia atsiriboti nuo aplinkos', 'autarkija'),
(6729, 'Sudano sostine', 'chartumas'),
(6730, 'Didelis amerikiniu grifu seimos paukstis, mintantis dvesena', 'kondoras'),
(6731, 'Vaisius, kuri simbolizuoja vienas is valdovo simboliu - rutulys su kryziumi', 'obuolys'),
(6732, '35-a valstija, prijungta prie jav 20.06.1863 m., sostine carlstonas: vakaru ..[liet.]', 'virdzinija'),
(6733, 'Negrazinamos materialines pagalbos teikimas', 'labdara'),
(6734, 'Rubenso barrichello tautybe', 'brazilas'),
(6735, 'Odinis maiselis tabakui', 'makas'),
(6736, 'Sarvuota patalpa laive patrankai, sviediniams laikyti, zmonems apsaugoti', 'kazematas'),
(6737, 'Menininku gatve paryziuje [liet.]', 'monmartras'),
(6738, 'Pabuklo pastovas', 'lafetas'),
(6739, 'Kietu atmosferiniu krituliu (snaigiu) dribsneliai ar ju sluoksnis zemeje', 'sniegas'),
(6740, 'Riesuto lukstas', 'kevalas'),
(6741, 'Mazesnis lito \"brolis\"', 'centas'),
(6742, 'Oficiali graikijos religija', 'staciatikybe'),
(6743, 'Valstybe, kurios sostine pchenjanas', 'siaures koreja'),
(6744, 'Torpeda vairuojantis prietaisas', 'giroskopas'),
(6745, 'Zmogus, duodantis savo kraujo', 'donoras'),
(6746, 'Vezys delikatesas', 'krabas'),
(6747, 'Sengraiku mituose - motina zeme, vaisingumo ir motinystes isikunijimas', 'geja'),
(6748, 'Kalendorinis laikas', 'data'),
(6749, 'Ldk misku ukio pareigunas', 'sakas'),
(6750, 'Pabaigos tapybos kryptis, velyvojo impresionizmo tasa', 'neoimpresionizmas'),
(6751, 'Du kartus distiliuotas vanduo', 'bidistiliatas'),
(6752, 'Vokalinis, operos, oratorijos ar kantatos dainingas numeris, atliekamas solo, instrumentams ar chorui pritariant', 'arija'),
(6753, 'Miestas, kurio pavadinimas oficialiai laikomas ilgiausiu pasaulyje (itrauktas i gineso rekordu knyga)', 'bankokas'),
(6754, 'Kartotinis to paties epizodo filmavimas', 'dublis'),
(6755, 'Plaukimas krutine darant grybsni rankomis is priekio atgal iki slaunu ir greita smugi kojomis zemyn', 'delfinas'),
(6756, 'Ukio saku ur veiklu, aptarnaujanciu gamybos procesa, visuma', 'infrastruktura'),
(6757, 'Metaline matrica, spaudas medaliui, monetai atspausti', 'stampas'),
(6758, 'Nerimta veido israiska', 'grimasa'),
(6759, 'Regejimo lauko dalies iskritimas, tamsi deme', 'skotoma'),
(6760, 'Pamela anderson ...', 'lee'),
(6761, 'Lietuviu rasytoja, satyru ir humoresku rinkinio \"ne is pirmo zvilgsnio\", apsakymu vaikams \"mike milzinas\", \"gaidzio kalnas\", pasaku \"robotas ir peteliske\", \"kelione i tandadrika\" autore', 'zilinskaite'),
(6762, 'Zema vieta, kuri atsiranda nukritus meteoritui arba upes vagai isgrauziant zeme', 'dauba'),
(6763, 'Paties dailininko israizyta akmens forma arba jo paties darytas raizinio atspaudas', 'autolitografija'),
(6764, 'Lietuviu poetas, eilerasciu rinkiniu \"fontanas\", \"strele danguje\", \"ziemos daina\", \"lyrika\", \"pasauliu netikiu, o pasaka tikiu\" autorius', 'radauskas'),
(6765, 'Piniginis banko pavedimo dokumentas, nurodantis jo pateikejui ar kitam asmeniui ismoketi jame nurodyta suma ar jos dali kliento saskaita', 'akredityvas'),
(6766, 'Senoves graiku mitologijoje - olimpo dievu maistas ir kvapnus skystis kunui itrinti, darantis juos nemirtingus ir amzinai jaunus', 'ambrozija'),
(6767, 'Irklinis karo laivas', 'unirema'),
(6768, 'Kraujo kresulys', 'trombas'),
(6769, 'Palydovo orbitos taskas, toliausiai nutoles nuo centrkuno, aplink kuri skriejama', 'apoapsis'),
(6770, 'Veiksmo megdziojimas, paskatintas stebint panasu veiksma kito zmogaus elgsenoje', 'imitavimas'),
(6771, 'Metalinio kampo nuemimas pries suvirinima', 'nusklembimas'),
(6772, 'Viduramziu prancuzijos karaliaus veliava', 'oriflama'),
(6773, 'Senoves baltu likimo deive', 'dekla'),
(6774, 'Kosta rikos administracinis vienetas', 'provincija'),
(6775, 'Galvos gela - pasikartojantys galvos (dazniausiai 1 puses) skausmo priepuoliai', 'migrena'),
(6776, 'Visuomeninio pastato laukiamasis, vestibiulis', 'foje'),
(6777, 'Populiariausia operacine sistema', 'windows'),
(6778, 'Patalpa laivo priekyje, atskirta nuo triumu vandens nepraleidziancia pertvara', 'forpikas'),
(6779, 'Benzininiam variklyje uzdega misini', 'zvake'),
(6780, 'Kredito istaiga, teikianti paskolas uz uzstatomus daiktus', 'lombardas'),
(6781, 'Anglu bakteriologas, 1929 mis pelesinio grybelio penicillium notatum isskyres pirmaji antibiotika - penicilina ir 1940 muz tai apdovanotas nobelio premija', 'flemingas'),
(6782, 'Automobiliu gamintojas isleides siuos modelius: mondeo, focus', 'ford'),
(6783, 'Impregnuotas lininis audinys', 'brezentas'),
(6784, 'Tarptautine jaunimo solidarumo diena', 'balandzio 24'),
(6785, 'Kurio nors zemes pavirsiaus tasko ilguma ir platuma', 'koordinates'),
(6786, 'Negalejimas rasyti', 'agrafija'),
(6787, 'Spyruokliniu gnybtuku pritvirtinamas auskaras', 'klipsas'),
(6788, 'Irankis, su kuriuo siuvama', 'adata'),
(6789, 'Slapyvardis sudarytas is vietovardzio, pvz., satrijos ragana', 'geonimas'),
(6790, 'Senoves graiku mitologijos heroje - burtininke, ziauriai atkersijusi savo vyrui argonautui jasonui uz neistikimybe', 'medeja'),
(6791, 'Imperatoriaus rumai', 'palatinas'),
(6792, 'Garso irasu archyvas', 'fonoteka'),
(6793, 'Koks yra trecias \"pi\" reiksmes (3.14) skaicius einantis po kablelio', '1'),
(6794, 'Alpiu roze, viszalis dekoratyvinis krumoksnis', 'azalija'),
(6795, 'Paprasciausias monopolistinis susivienijimas, kurio tikslas - isigaleti kuriu nors prekiu rinkoje', 'korneris'),
(6796, 'Santuokos, kuria sudaro tik vienas vyras ir viena moteris, forma', 'monogamija'),
(6797, 'Pasaulin? baltosios lazdel?s (akl?j?) diena', 'kovo 15'),
(6798, 'Atminties spragu uzpildymas isgalvotais ivykiais, fantazijomis', 'konfabuliacija'),
(6799, 'Zmogus, 1522 misteiges pirmaja spaustuve lietuvoje', 'skorina'),
(6800, 'Kiek koloneliu sudaro garso sistema 5.1', '5'),
(6801, 'Antikos rasytojas, kuriniu \"debesys\", \"varles\", \"pauksciai\", \"vapsvos\" autorius (liet.)', 'aristofanas'),
(6802, 'Kada pagamintas mikroprocesorius \"intel 4004\"', '1971'),
(6803, 'Vyriausybes arba jos igaliotos institucijos teises aktu nustatyta tvarka pripazinta, tam tikro lygio asmens branda liudijanti kompetenciju visuma', 'issilavinimas'),
(6804, 'Muzikos kurinio baigiamoji dalis', 'finalas'),
(6805, 'Garsus lauko teniso turnyras, rengiamas anglijoje nuo 1877m.', 'vimbldono'),
(6806, 'Automobiliu gamintojas isleides siuos modelius: micra, sunny, bluebird', 'nissan'),
(6807, 'Senosios epines poezijos izangine dalis, kurioje kreipiamasi i dievus, prasant suteikti ikvepimo ir vadovauti kuriniui', 'invokacija'),
(6808, 'Legendinis keltu dainius (iiia)', 'osianas'),
(6809, 'Graiku kompozitorius, olimpinio himno autorius', 'samara'),
(6810, 'Dainuojamosios tautosakos zanras', 'balade'),
(6811, 'Susaldytu maisto produktu atsildymo kamera', 'defrosteris'),
(6812, 'Zmoniu gyvenima aprasanti literatura', 'biografika'),
(6813, 'Pinigu leidimas', 'emisija'),
(6814, 'Ledo mase, sudaryta is susisluoksniavusio stambiagrudzio sniego ir grudeto ledo', 'firnas'),
(6815, 'Organai, kuriuos pilvapleve dengia is visu pusiu', 'intraperitoniniai'),
(6816, 'Ilgiausiai (iki 150 m.) gyvenantis roplys: dramblinis ...', 'vezlys'),
(6817, 'Anglijos laisvuju valstieciu, dirbusiu paveldima zeme, pavadinimas', 'jomenai'),
(6818, 'Saules sistemos planeta, skriejanti toliausiai nuo saules', 'plutonas'),
(6819, 'Kiek reikia suderinti derybiniu sriciu (pagrindiniu) stojant i europos sajunga', '29'),
(6820, 'Saunamasis ginklas, kuris nesiliauja saudyti tol, kol buna nuspaustas nuleistukas arba baigiasi soviniai apkaboje (detuveje)', 'automatas'),
(6821, 'Valstybe, isgaunanti daugiausia rusvuju angliu pasaulyje', 'vokietija'),
(6822, 'Garsi beisbolo komanda is niujorko', 'yankees'),
(6823, 'Pagrindinio vaidmens atlikejas filme \"briliantine ranka\"', 'nikulinas'),
(6824, 'Statine tvora, pinuciai', 'ziogris'),
(6825, 'Kokio nors reiskinio ateities arba proceso raidos mokslinis numatymas', 'prognoze'),
(6826, 'Vokietijos piniginis vienetas', 'euras'),
(6827, 'Lasteles, is aplinkos paimancios informacija', 'receptoriai'),
(6828, 'Kongo sostine', 'brazavilis'),
(6829, 'Grieztas nustatytu principu ir teiginiu laikymasis, paklusimas doktrinai', 'ortodoksija'),
(6830, 'Gimusiu 01.21 - 02.19dzodiako zenklas', 'vandenis'),
(6831, 'Dengta prekyviete', 'hale'),
(6832, 'Tautotyra', 'etnografija'),
(6833, 'Nekaitoma kalbos dalis, kuri teikia sakiniui arba jo dalims papildomu prasminiu atspalviu', 'dalelyte'),
(6834, 'Poete ramute ...', 'skucaite'),
(6835, 'Lietuviu rasytojas, romanu \"nasles vaikas\", \"pirmieji metai\", \"kaimynai\", \"jaunyste\", \"netekek, saulele\", \"cia musu namai\" autorius', 'paukstelis'),
(6836, 'Prisotintas vandeniu smulkus smelis, kuris del hidrodinaminiu salygu, hidrofiliniu koloidu kiekio ir mechaninio poveikio tampa slankus', 'slanksmelis'),
(6837, 'Menines raiskos priemone, sklandus, darnus eilerascio skambejimas', 'eufonija'),
(6838, 'Vienos ar abieju akiu nukrypimas nuo iprastines padeties', 'zvairumas'),
(6839, 'Didziausias viesbuciu kompleksas, esantis palangoje', 'baltija'),
(6840, 'Realistinei dailei budingas tikroves vaizdavimo konkretumas, islaikomas panasumas i realu vaizda, daiktu proporcijos', 'realizmas'),
(6841, 'Skydo formos plokstele, pritaisoma prie sportiniu prizu, automobiliu ir kt.', 'sildas'),
(6842, 'Pusapvale arba daugiakampe nisa meceteje', 'mihrabas'),
(6843, 'Lengvosios kavalerijos karys, ginkluotas ietimi', 'ulonas'),
(6844, 'Keltu dvasininkai, teisejai bei mokytojai', 'druidai'),
(6845, '1805 mmusis kai anglu laivynas sutriuskino prancuzu juru pajegas', 'trafalgaro'),
(6846, 'Nusikalteliu gauju daromas santazas, turto prievartavimas', 'reketas'),
(6847, 'Tenisininke ..graf [liet.]', 'stefi'),
(6848, 'Vienuolyno vienute', 'cele'),
(6849, 'Koks asmuo \"gelezimi ir krauju\" sieke suvienyti vokietija', 'bismarkas'),
(6850, 'Kompanija, pagaminusi mobiliu telefonu modelius: trium fx, trium cosmo, trium aria, trium geo', 'mitsubishi'),
(6851, 'Pramoginis parko irenginys', 'atrakcionas'),
(6852, 'Sintaksinio posakio dviprasmiskumas', 'amfibologija'),
(6853, 'Motvardas, kiles is lotkalbos, reiskia \"sviesi, garsi\"', 'klara'),
(6854, 'Medziaga vabzdziams naikinti', 'insekticidas'),
(6855, 'Koloniju tautu issivadavimas nuo metropoliju valdzios ir nepriklausomu valstyviu steigimo procesas', 'dekolonizacija'),
(6856, 'Oro temperaturos kritimas iki neigiamos pazemyje vegetacijos metu', 'salna'),
(6857, 'Pasisaipymas, luriame ijungiami fasntastiniai, nerealus elementai', 'groteskas'),
(6858, 'Elektros sroves atsiradimas uzdarame laidininke, kintant ji verianciam magniatiniam srautui: elektromagnetine ...', 'indukcija'),
(6859, 'Seniausia fotografijos technika', 'heliografija'),
(6860, 'Pridetines vertes mokestis', 'pvm'),
(6861, 'Paraukta sijono juosta', 'volanas'),
(6862, 'Kelio elementas, skiriantis gretimas vaziuojamasias dalis ir nenumatytas transporto priemonems vaziuoti arba stoveti', 'skiriamoji juosta'),
(6863, 'Apgauli atmintis, atminties apgaule', 'paramnezija'),
(6864, 'Spalva, kuria paprastai dazomos lektuvu \"juodosios dezes\"', 'oranzine'),
(6865, '\"kurtke\" lietuviskai', 'striuke'),
(6866, 'Trumpiausia upe pasaulyje?', 'okinava'),
(6867, 'Prietaisas vertikaliai krypciai nustatyti', 'svambalas'),
(6868, 'Kuris jav prezidentas taip pat buvo ir filipinu gubernatorius', 'taftas'),
(6869, 'Drabuzio atlenkimas ant krutines', 'atlapas'),
(6870, 'Upe pietu afrikos respublikoje, prasidedanti drakono kalnuose', 'tugela'),
(6871, 'Kas be ugnies uzverda', 'kraujas'),
(6872, 'Prietaisas natu popieriui liniuoti', 'rastra'),
(6873, 'Karsciausias zemynas', 'afrika'),
(6874, 'Europos sajungos institucija, turinti teises aktu leidybos iniciatyvos teise, priziurinti es sutarciu vykdyma bei igyvendinanti es politika: europos ...', 'komisija'),
(6875, 'Amerikietis, 1954 metais gaves nobelio literaturos premija', 'hemingvejus'),
(6876, 'Ketvirtoji rijimo faze', 'stempline'),
(6877, 'Kada martynas liuteris prikale prie duru savo garsiasias tezes', '1517'),
(6878, 'Du diktaturu tipai: autoritarizmas ir ...', 'totalitarizmas'),
(6879, 'Sengraiku deive - zmogaus sielos isikunijimas', 'psiche'),
(6880, 'Dailes saka - vizualiniai spektaklio vaizdai; svarbiausi elementai: scenos erdve, dekoracijos, kulisai, kostiumai, grimas, apsvietimas, butaforija', 'scenografija'),
(6881, 'Salis, kuriai priklauso velyku sala', 'cile'),
(6882, 'Aids sukeliantis virusas', 'ziv'),
(6883, 'Ilguju kaulu viduje esantis organas (daugiskaita)', 'kaulu ciulpai'),
(6884, 'Mormonu judejimo ikurejas', 'smitas'),
(6885, 'Naktibalda', 'nakvisa'),
(6886, 'Kodinis 1939 mvokieciu suplanuoto lenkijos puolimo pavadinimas', 'baltasis variantas'),
(6887, 'Misionieriu organizacija', 'misija'),
(6888, 'Jaunuoliu bei vyru vaidmenis atliekanti aktore', 'travesti'),
(6889, 'Danu rasytojas, pasakos \"bjaurusis anciukas\" autorius', 'andersenas'),
(6890, 'Dominikos respublikos sostine', 'santo domingas'),
(6891, 'Islamo religijos simboliai', 'menulis ir zvaigzde'),
(6892, 'Neptuno palydovas, pavadintas vienos is nereidziu, graiku juru dievo poseidono palydoviu, vardu', 'galateja'),
(6893, 'Automobiliu gamintojas isleides siuos modelius: ax, zx, xm', 'citroen'),
(6894, 'Kai kuriu gyvunu istisusi judri nosis su jos gale atsiverianciomis snervemis', 'straublys'),
(6895, 'Dievas, kuri romenai laike romos ikureju romulo ir remo tevu', 'marsas'),
(6896, 'Stambus senkinijos valdininkas', 'mandarinas'),
(6897, 'Batams susiristi [dgs.]', 'raisteliai'),
(6898, 'Triatlono rusis, susidedanti is dvieju rungciu - begimo ir plaukimo (1.begimas 2.plaukimas 3.begimas)', 'akvatlonas'),
(6899, 'Vandens baseino(juros, ilankos ir pan.) plotas', 'akvatorija'),
(6900, 'Kataliku baznycioje - malda, kuri kalbama ar girdima iskilmingu religiniu apeigu metu', 'litanija'),
(6901, '\"cainikas\" lietuviskai', 'arbatinukas'),
(6902, 'Telekomunikaciju kompanija, pagaminusi mobiliu telefonu modelius: 8855, 5210, 5510, 8310', 'nokia'),
(6903, 'Kokia didziausia salis europoje', 'rusija'),
(6904, 'Elektros kiekis, pratekantis laidininko skerspjuviu per 1 sek., esant srovei 1 a', 'kulonas'),
(6905, 'Neptuno palydovas, pavadintas senoves graiku nimfu, globojusiu upes, ezerus ir saltinius, vardu', 'najada'),
(6906, 'Miestelis lietuvos siaureje', 'pasvalys'),
(6907, 'Zmogus, kuriam budinga lengviausia protinio atsilikimo forma', 'debilas'),
(6908, 'Lietuvos dziazo dainininke', 'arina'),
(6909, 'Patologine baime', 'fobija'),
(6910, 'Lietuvos ministras pirmininkas daugiausiai kartu (4) paskirtas i si posta', 'galvanauskas'),
(6911, 'Metai, kada buvo atrasta amerika', '1492'),
(6912, 'Mezgimo irankis', 'virbalas'),
(6913, 'Romano \"nematomas zmogus\" autorius', 'velsas'),
(6914, 'Nepaprastas, labai retas reiskinys', 'fenomenas'),
(6915, 'Lietuviu poetas, eileraciu rinkiniu \"zygio draugai\", \"osia gimtines berzai\", \"berzu lopsine\", \"ir nusinese saule miskai\", \"ilgesys - ta giesme\" autorius', 'sirvys'),
(6916, 'Vaisiu, uogu ar darzoviu skystis', 'sultys'),
(6917, 'Amerikos prezidentas, turejes marichuanos lysve savo namo darzelyje', 'vasingtonas'),
(6918, 'Opel modelis, gaminamas nuo 1988m., pakeites ascona (orig.)', 'vectra'),
(6919, 'Vora nesuliniu gyvuliu, kuriais per stepes ir dykumas keliaujama arba gabenami kroviniai', 'karavanas'),
(6920, 'Sent vinsento ir grenadinu sostine', 'kingstaunas'),
(6921, '3-a maziausiai urbanizuota pasaulio salis (8% miesto gyv.)', 'ruanda'),
(6922, 'Airijos sostines dublino pavadinimas kiles is zodziu junginio dubh linn, kuris lietuviskai reikstu: ..bala', 'juoda'),
(6923, 'Anglu chemikas ir fizikas, pirma karta chemineje analizeje panaudojes indikatorius', 'boilis'),
(6924, 'Turtingas mokslo ir meno globejas', 'mecenatas'),
(6925, 'Svarbiausias angelas islame', 'dzibrailas'),
(6926, 'Kas pirmas lietuvoje (knygoje \"logika\" 1769 m.) glaustai ir detaliai isdeste svietimo idejas', 'narbutas'),
(6927, 'Doktrina arba zmogaus egzistencine nuostata nepripazystanti dievo', 'ateizmas'),
(6928, 'Proteviu pozymiu, isnykusiu per rusies evoliucija, atsiradimas organizme', 'atavizmas'),
(6929, 'Senoves romenu vyru ir moteru kelionins berankovis apsiaustas su gobtuvu', 'penula'),
(6930, 'Kataliku baznycios liturginis stiklinis indas, su kuriuo per misias paduodamas kunigui vynas ir vanduo', 'ampule'),
(6931, 'Veikliausi organizacijos (partijos, sajungos, draugijos) nariai [vns.]', 'aktyvas'),
(6932, 'Senovinis siaures vakaru arabijos ir sinajaus pusiasalio arabu pavadinimas [dgs.]', 'saracenai'),
(6933, 'Jeruzales vyriausiasis kunigas, pripazines kristu kalta piktzodziavimu pries dieva ir nusiuntes pas ponciju pilota', 'kajafas'),
(6934, 'Vokietis, daves morfijui pavadinima (orig.)', 'saturner'),
(6935, 'Senovine prancuzijos auksine, veliau ir sidabrine moneta', 'ekiu'),
(6936, 'Dominikos respublikos diktatorius 1930 - 1961 metais', 'molina'),
(6937, 'Kokios rusies musu galaktika', 'spiraline'),
(6938, 'Megstamiausia sporto saka butane [kaip lietuvoje krepsinis]: saudymas is ...', 'lanko'),
(6939, 'Auksciausia p.amerikos virsukalne', 'akonkagva'),
(6940, 'Lede prakirsta skyle', 'ekete'),
(6941, 'Gvinejos piniginis vienetas', 'silis'),
(6942, 'Kuriais metais buvo sugalvotas komiksu ir filmu personazas betmenas', '1939'),
(6943, 'Kitas kelio dievo vardas', 'kelukis'),
(6944, 'Abrikosu likeris', 'abrikotinas'),
(6945, 'Jis lygus 1650763,73 bangos ilgio, kuria tustumoje skleidzia kriptono izotopo 86 atomas, pereidamas is energetinio lygmens 5d5 i lygmeni 2p10', 'metras'),
(6946, 'Sportinio parengtumo dalyvauti kuriose nors auksto rango varzybose (pvz., olimpinese zaidynese) rodiklis; tam tikro sportinio zenklo, vardo orientyras', 'normatyvas'),
(6947, 'Patologinis arba dirbtinis kanalas, jungiantis organo ertme su kuno pavirsiumi', 'fistule'),
(6948, 'Rasytojas, romanu \"paryziaus katedra\", \"vargdieniai\", \"devyniasdesimt tretieji metai\", \"zmogus, kuris juokiasi\" autorius (liet.)', 'hugo'),
(6949, 'Svaros palaikymas', 'higiena'),
(6950, 'Vidurio rytuose fraze \"zeme tarp dvieju upiu\" mums yra labiau zinoma kaip ...', 'mesopotamija'),
(6951, 'Eile isvertu pro bure raisciu, kuriais sutraukiama ir surisama apatine bures dalis - sumazinamas bures plotas', 'rifas'),
(6952, 'Viduramziu ispanijos teismo ir kitu pareigu vykdytojas, teisejas', 'alkaldas'),
(6953, 'Is amerikos kiles judrus akrobatiskas sokis, kuris buvo populiarus xx a4-aji ir 5-aji desimtmeti', 'dziterbagas'),
(6954, 'Sistema ir metodai, kuriuos taiko pogrindine organizacija savo paslapties islaikymui', 'konspiracija'),
(6955, 'Didziausia etnine grupe austrijoje, apie 98%', 'vokieciai'),
(6956, 'San tomes ir prinsipes sostine', 'san tome'),
(6957, 'Kiek metru pakiltu vandenynu lygis, jei istirptu antarktidos bei grenlandijos ledynai', '60'),
(6958, 'Itaisas elektros itampai, srovei, elektriniu ar elektromagnetiniu virpesiu galiai mazinti', 'ateniuatorius'),
(6959, 'Tarp sio miesto esancio jav ir paryziaus 1915 mivyko pirmas pasaulyje tiesioginis pokalbis telefonukoks tai miestas? [liet.]', 'arlingtonas'),
(6960, 'Didziausia upe europoje, kertanti net septyniu valstybiu siena', 'dunojus'),
(6961, '\"adijalas\" lietuviskai', 'antklode'),
(6962, 'Viena is prestiziniu jav gaminamu masinu (lietuviskai)', 'kadilakas'),
(6963, 'Veikiamu elektros sroves disperguotosios fazes daleliu judejimas elektrodu link ir issikrovimas', 'elektroforeze'),
(6964, 'Prietaisas, itampos virpesiams stebeti', 'oscilografas'),
(6965, 'Kaip vadinama funkcija atvirkstine rodyklinei', 'logaritmine'),
(6966, 'Latvijos dainininke, 2002 meurovizijos dainu konkurso laureate', 'marie n'),
(6967, 'Menine priemone, priebalsiu saskambis', 'aliteracija'),
(6968, 'Kvantinis generatorius, zadinantis superaukstojo daznio radijo bangas', 'mazeris'),
(6969, 'Sunki zmoniu liga, karstinesia liga platina maleriniu uodu pateles', 'drugys'),
(6970, 'Vieno feodalo priklausomybe nuo kito', 'vasalitetas'),
(6971, 'Tonu eile', 'gama'),
(6972, 'Graiku mitlogijoje trojo, frigijaus karaliaus, sunus ilo brolis', 'ganimedas'),
(6973, 'Kaip vadinam placiuju raumenu sausgysle', 'aponeuroze'),
(6974, 'Istatymo, akto, deklaracijos arba tarptautines sutarties ivadine dalis', 'preambule'),
(6975, 'Zmogaus ir gyvuliu helmintoze, kuria sukelia askaridziu parazitavimas organizme', 'askaridoze'),
(6976, 'Jura i kuria iteka dunojus', 'juodoji'),
(6977, 'Uolienu dulejimo plutos pavirsinis sluoksnis, apimantis ir dirvozemi', 'gruntas'),
(6978, 'Kuriais metais pradeti gaminti buitiniai oro kondicionieriai', '1932'),
(6979, 'Viena naujausiu mobiliu telefonu paslaugu - general packet radio service', 'gprs'),
(6980, 'Europos valstybe, turinti 2 nacionalinius himnus', 'danija'),
(6981, 'Krikscioniskuose mituose - piktoji dvasia, velnias', 'demonas'),
(6982, 'Europos \" ilga \" valstybe', 'italija'),
(6983, 'Maziausias zemynas', 'australija'),
(6984, 'Riterio krutines sarvas arba sukabintas nugaros ir krutines sarvas', 'kirasa'),
(6985, '\"viliaus karaliaus\" autore', 'simonaityte'),
(6986, 'Urano palydovas, pavadintas vsekspyro tragedijos \"karalius lyras\" lyro dukters vardu', 'kordelija'),
(6987, 'Rugstus, i kefyra panasus pieno produktas; vartojams vidurineje azijoje, kaukaze, sibire', 'airanas'),
(6988, 'Tarp kanados ir meksikos', 'jav'),
(6989, 'Dainininko, muzikanto ar ju kolektyvo atliekamu kuriniu visuma', 'repertuaras'),
(6990, 'Vyrvardas, kiles is lotkalbos, reiskia \"auksinis\"', 'aurelijus'),
(6991, 'Senoves graiku statula', 'kora'),
(6992, 'Salis, 2002 meurovizijos dainu konkurso nugaletoja', 'latvija'),
(6993, 'Koks mokslininkas apskaiciavo sviesos greiti', 'riomeris'),
(6994, 'Oficiali danijos religija', 'liuteronybe'),
(6995, 'Miestas kuriame mire mazaideju_pagrindine_informacija_4hj7sd4vtas', 'medina'),
(6996, 'Tarptautine prekybos ir pramones ministerija esanti japonijoje', 'miti'),
(6997, 'Issigande astuonkojai tampa balti, o kokia spalva jie virsta kuomet supyksta', 'melyna'),
(6998, 'Filosofine doktrina, menkinanti proto svarba zmogaus veiklai', 'antiintelektualizmas'),
(6999, 'Zoologas, irodes kad visi gyvi organizmai sudaryti is lasteliu', 'svanas'),
(7000, 'Valstybe, kurios karininku titulas aga', 'turkija'),
(7001, 'Antrasis merkurijaus planetos vardas lietuviu mitologijoje, greta vaivoros', 'pazarinis'),
(7002, '1953-62 p.korejos piniginis vienetas', 'hvanas'),
(7003, 'Bezdzione, kuria gali aptikti tik magadaskare', 'lemuras'),
(7004, 'Didelis, savitas teritorinis krasto vienetas', 'regionas'),
(7005, 'Aparatas, irasantis kieno nors kalba, pranesima, pokalbi; veliau irasa galima isklausyti', 'diktofonas'),
(7006, 'Dvieju anksciau apklaustu liudytoju, nukentejusiuju, itariamuju bendra apklausa', 'akistata'),
(7007, 'Kas 1901 muzpatentavo plona, su asmenimis is abieju pusiu plienini skutimosi peiliuka, idedama i \"t\" raides pavidalo laikikli [orig.]', 'gillette'),
(7008, 'Eifelio boksto aukstis (metrais', '320'),
(7009, 'Hoo sateow, gineso knygos rekordininko, plauku ilgis metrais [x,xx]', '5,15'),
(7010, 'Kaip vadinamas didziausias pasaulio deimantas', 'afrikos zvaigzde'),
(7011, 'Budistu kalba', 'pali'),
(7012, 'Pirmas zmogus lietuvoje, gaves lietuvos respublikos pasa: gediminas vincas ...', 'adomaitis'),
(7013, 'Gyvunas arba augalas, gyvenantis kitame organizme ir mintantis jo medziagomis', 'parazitas'),
(7014, 'Zemes geologijos istorijos kainozojaus eros paleogeno periodo vidurinioji epocha', 'eocenas'),
(7015, 'Uolienu nuolauzu telkinys ledyne', 'morena'),
(7016, '6-as pagal dydi ezeras pasaulyje: ..jura', 'aralo'),
(7017, 'Miestas jordanijoje, 8 km i pietus nuo jeruzales, pasak naujojo testamento - jezaus kristaus gimtine', 'betliejus'),
(7018, 'Tikslus teksto nuorasas', 'kopija'),
(7019, 'Interjeras ir ...', 'eksterjeras'),
(7020, 'Senoves graikijoje - dvi lenteles, kuriu viena puse iki pat siek tiek iskilaus pakrastelio padengta vasku, ant kurio buvo rasoma', 'diptichas'),
(7021, 'Kokioje salyje atsirado rankinis', 'airijoje'),
(7022, 'Uma ..- \"mylimiausia\" rezisieriaus qtarantino aktore (angl.)', 'thurman'),
(7023, 'Stipri, gili, ilgalaike emocine busena, stimuliuojanti zmogaus elgesi, lemianti jo gyvenimo ir veiklos krypti', 'aistra'),
(7024, 'Arklio nagos', 'kanopos'),
(7025, 'Sventieji, svcmergeles marijos tevai: joakimas ir ...', 'ona'),
(7026, 'Netikras brolis', 'ibrolis'),
(7027, 'Rasytojas, romanu ulisas, menininko jaunu dienu portretas, apsakimu rinkinio dublinieciai autorius (liet.)', 'dzoisas'),
(7028, 'Kada jungtiniai arabu emiratai tapo arabu lygos nariu', '1971'),
(7029, 'Turtas, paliekamas kam nors po mirties', 'palikimas'),
(7030, 'Statinio sudetine dalis, turinti apibrezta paskirti', 'konstrukcija'),
(7031, 'Olandija arba ...', 'nyderlandai'),
(7032, 'Lietuviu rasytojas, satyrinio romano \"kelione aplink stala\", poemu \"artojelis\", \"dicius\", \"usnyne\" autorius', 'tilvytis'),
(7033, 'Knygos \"maras\" autorius', 'kamiu'),
(7034, 'Lygtys, turincios tuos pacius sprendinius', 'ekvivalencios'),
(7035, 'Lietuvos kunigaikscio bei lenkijos karaliaus jogailos pirmoji zmona', 'jadvyga'),
(7036, 'Kas suorganizavo didziausia istorijoje vergu sukilima', 'spartakas'),
(7037, 'Viena labiausiai paplitusiu indu filosofijos ir religijos savoku', 'darma'),
(7038, 'Nei pirmas, nei trecias', 'antras'),
(7039, 'Vytauto didziojo universitetas', 'vdu'),
(7040, 'Paukstis, butinas amerikieciams padekos diena', 'kalakutas'),
(7041, 'Zemynas, is kurio kilo arbuzas', 'afrika'),
(7042, 'Astrofizikos saka, tirianti saules sistemos planetu ir ju palydovu sandara, plutos chemine, mineraline sudeti, fizikines, chemines savybes, atmosfera, jos chemine sudeti', 'planetologija'),
(7043, 'Butano smulkus pinigas', 'cetrumas'),
(7044, 'Ribotas, staiga atsirades tikrosios odos spenelinio sluoksnio pabrinkimas', 'puksle'),
(7045, 'Sausas, karstas pietu ir rytu vejas, puciantis vasara kopetdago ir tian sanio kalnuose', 'gamsilis'),
(7046, 'Kas pirmasis panaudojo zodi \"sentimentalus\"', 'ricardsonas'),
(7047, 'Saliamono salu sostine', 'honiara'),
(7048, 'Romanu \"odine kojine\", \"pedsekys\", \"prerijos\", \"paskutinis mohikanas\" autorius', 'kuperis'),
(7049, 'Lietuviu liaudies smulkiosios architekturos statinys: medinis, reciau murinis memorialinis paminklas, kuri sudaro 3 - 8 maukscio stiebas ir 1 arba 2 - 3 vienas virs kito kylantys stogeliai', 'stogastulpis'),
(7050, 'Panasus i tango argentinieciu sokis', 'milonga'),
(7051, 'Sventasis skiemuo budizme', 'om'),
(7052, 'Mikroorganizmu sukeltas anaerobinis angliavandeniu skilimas', 'rugimas'),
(7053, 'Romenu derlingumo ir zemdirbystes deive', 'cerera'),
(7054, 'Paramines nervinio audinio lasteles, supancios ilgasias neuronu ataugas [dgs.]', 'lemocitai'),
(7055, 'Pasiuntinys skubiems reikalams', 'kurjeris'),
(7056, 'Zemes geologijos istorijos paleozojaus eros i periodas', 'kambras'),
(7057, 'Laivo, lektuvo, tanko igula', 'ekipazas'),
(7058, 'Kokiais skaiciais prasideda turkijos bruksninis prekinis kodas', '869'),
(7059, 'Cheminis elementas, kurio simbolis \"s\" [numeris 16]', 'siera'),
(7060, 'Jeigu p ir q teiginiai, tai teiginys p ir q vadinamas teiginiu p ir q ...', 'konjunkcija'),
(7061, 'Medziaga is zieves plausu', 'tapa'),
(7062, 'Vidaus sekrecijos liauka, kuri reguliuoja augima, medziagu apykaita', 'skydliauke'),
(7063, 'Anatomijos specialistas', 'anatomas'),
(7064, 'Dispersine sistema is duju (oro) burbuliuku, atskirtu plona skyscio plevele', 'putos'),
(7065, 'Sandari kamera, kurioje oro slegis sumazinamas arba padidinamas', 'barokamera'),
(7066, 'Upe, tekanti per pakistana', 'indas'),
(7067, 'Ligoniu lankymo apribojimas del infekcijos', 'karantinas'),
(7068, 'Piesinio isesdinimas metalo pavirsiuje elektrocheminiu budu', 'galvanokaustika'),
(7069, 'Menines raiskos priemone, vieno reiskinio ar daikto savybiu sumazinimas', 'litote'),
(7070, 'Arkliai - neporakanopiu zinduoliu seima', 'ekvidai'),
(7071, 'Sventasis, laikomas universitetu ir mokyklu globeju: ..akvinietis', 'tomas'),
(7072, 'Upe europoje, einanti keturiu valstybiu siena', 'tisa'),
(7073, 'Garsusis tenoras', 'domingas'),
(7074, 'Kaip vadinasi paskutinis grupes foje albumas', 'paveikslas'),
(7075, 'Zymiausia informaciniu technologiju ir telekomunikaciju paroda pabaltyje', 'infobalt'),
(7076, 'Valiuta, kurios sutrumpinimas chf', 'sveicarijos frankas'),
(7077, 'Rusiskas \"aro\" atitikmuo', 'omon'),
(7078, 'Stambaus kalibro patranka', 'haubica'),
(7079, 'Kaip vadinama socialine ismoka, kuria valstybe moka savo pagyvenusiems pilieciams', 'pensija'),
(7080, 'Medzio, kaulo, rago, gintaro ir kitu nelabai kietu medziagu apdorojimo technika: astriais irankiais pjaunant, skutant modeliuojamos ivairios trimates formos', 'drozyba'),
(7081, 'Kelintais metais imperatorius decijus paskelbe sisteminga krikscioniu persekiojima', '250'),
(7082, 'Negimtaja kalba ar tarmiskai kalbancio zmogaus tarties savotiskumas, atsirades del gimtosios kalbos ar tarties itakos', 'akcentas'),
(7083, 'Efektingai, greitai atliekama pagrazinto dainavimo garsu grupe', 'ruliada'),
(7084, 'Filosofijos koncepcija, pripazistanti dieva tik kaip beasmeni pasaulio pradininka, neturinti itakos jo tolesnei raidai', 'deizmas'),
(7085, 'Naturalusis skaicius, turintis tik du daliklius: vieneta ir save pati [31; 7; 17..]', 'pirminis'),
(7086, 'Parengiamasis knygos, laikrascio, zurnalo pavyzdys', 'maketas'),
(7087, 'Senu daiktu parduotuve', 'antikvariatas'),
(7088, 'Svarbiausias odos pigmentas', 'melaninas'),
(7089, 'Kongo demokratines respublikos smulkus pinigas', 'makutas'),
(7090, '7-a valstija, prijungta prie jav 28.04.1788 m., sostine anapolis [liet.]', 'merilendas'),
(7091, 'Kaip vadinama zemes gelmiu silumos energija', 'geotermine'),
(7092, 'Tapytojas, m.pocobuto, l.sapiegos, m.radvilos, a.mickeviciaus ir kitu portretu autorius', 'oleskevicius'),
(7093, 'Sautuvo medine dalis', 'buoze'),
(7094, 'Mazi, rutulio arba elipsoido formos geolkunai, susidare is kalcio ir magnio karbonatu, gelezies ir mangano oksidu ir hidroksidu', 'oolitai'),
(7095, 'Auksciausias panamos kalnas', 'ciriki'),
(7096, 'Musulmonu teises mokslas, pagristas korano ir sunos normu praktinio taikymo principais', 'fikchas'),
(7097, 'Rasytojos kristi vardas', 'agata'),
(7098, 'Viduramziu anglijos stambus feodalas', 'lordas'),
(7099, 'Vokietijos nacionalsocialistu darbininku partijos ikurejas', 'hitleris'),
(7100, 'Vaistai, kurie sudaryti tiktai is naturaliu medziagu', 'homeopatiniai'),
(7101, 'Delfinu seimos zinduoliai', 'inijos'),
(7102, 'Liguista zmoniu baime', 'antropofobija'),
(7103, 'Dviratis su kebulu', 'velomobilis'),
(7104, 'Maldyvu smulkus pinigas', 'laris'),
(7105, 'Meistras, spalvinantis, dazantis zemelapius, piesinius', 'iliuminatorius'),
(7106, 'Stambus plaukas', 'gauras'),
(7107, 'Zmogaus dantu skaicius', '32'),
(7108, 'Rusu kompozitorius, dirigentas, 3 baletu (tarp ju - \"raimondos\"), 8 simfoniju, 7 styginiu kvartetu, 5 uvertiuru autorius', 'glazunovas'),
(7109, 'Galinis inkaro grandines gabalas, kuriuo grandine pritvirtinama prie laivo korpuso', 'zvakahalsas'),
(7110, 'Seniau si jav valstija buvo vadinama kanawha, o dabar: vakaru ...', 'virdzinija'),
(7111, 'Kas vaidina \"bratkas\" laidoje \"dviracio zynios\"', 'serenas'),
(7112, 'Kaip senoves rusijoje buvo vadinami vikingai', 'variagai'),
(7113, 'Islamo saliu pasaulietiskojo valdovo, genciu vadu titulas', 'sultonas'),
(7114, 'Zemes matavimo mokslas', 'geodezija'),
(7115, '16 askotijos karaliene, kuriai buvo nukirsta galva', 'marija stiuart'),
(7116, 'Salis, kurioje buvo pirma karta iteisinta standartizuota kelio zenklu sistema', 'prancuzija'),
(7117, 'Dailiosios tekstiles gaminys patalpoms puosti, silumai ir garsui sulaikyti', 'kilimas'),
(7118, 'Tradicinis lenku patiekalas is svieziu ir raugintu kopustu, troskintu su mesa ir prieskoniais', 'bigosas'),
(7119, 'Kas jav prezidentui dz.fkenedziui sudainavo \"happy birthday\" per jo 45-ta gimtadieni', 'monro'),
(7120, 'Salies pakrastys', 'pasienis'),
(7121, 'Auksciausias kanados kalnas (orig.)', 'logan'),
(7122, 'Kuriais metais savo veikla pradejo palangos gintaro muziejus', '1963'),
(7123, 'Drauge jojanciu raiteliu burys', 'kavalkada'),
(7124, 'Kuriais metais ivesti pasto indeksai, palengvinantys pasto rusiavima ir skirstyma', '1963'),
(7125, 'Kaip snekamojoje kalboje vadinamas \"ilgas nuobodus vardijimas\"', 'litanija'),
(7126, 'Paaukstinta vieta lektoriui, destytojui', 'katedra'),
(7127, 'Mikroelementas, butinas skydliaukes hormonu gamybai', 'jodas'),
(7128, 'Fiziologiniu organizmo funkciju, ypac centrines nervu sistemos sutrikimas nuo alkoholio', 'girtumas'),
(7129, 'Liuminescencija, suzadinta rentgeno spinduliu', 'rentgenoliuminescencija'),
(7130, 'Viesbutis salia kelio', 'motelis'),
(7131, 'Kai kuriu sportiniu zaidimu komandos zaidejas, kurio pareiga saugoti vartus, tyneleisti i juos iskrieti ar iriedeti kamuoliui, rituliui, rieduliui', 'vartininkas'),
(7132, 'Salis, kurios domeno vardas yra \".gd\"', 'grenada'),
(7133, 'Antras pagal sviesuma dangaus kunas', 'menulis'),
(7134, 'Meninis vaizdavimo budas, pagristas siurpiu, alogisku realybes ir fantastikos deriniu', 'groteskas'),
(7135, 'Procentai, gaunami nuo indelio', 'palukanos'),
(7136, 'Teksto saltinio nurodymas', 'nuoroda'),
(7137, 'Kam nors skirtas, reikalingas daiktas', 'reikmuo'),
(7138, 'Vokieciu kompozitorius, dirigentas, dramaturgas, operu \"skrajojantis olandas\", \"tanhoizeris\", \"lohengrinas\", simfoniju, uvertiuru, fortepijoniniu kuriniu autorius', 'vagneris'),
(7139, 'Jachtos manevras kai laivo nosis kerta vejo krypti', 'vendas'),
(7140, 'Ekonomikoje - vartojamu prekiu pakeiciamumas', 'substitucija'),
(7141, 'Lietuviu deives, i kurias kreipiasi moterys, prasydamos, kad joms atnestu visokiu seklu giles kiaute', 'laibegelda'),
(7142, 'Kaip vadinamas reiskinys, kuomet medziagos, is kietos kuno busenos tiesiai, nevirtusios skysciu, pereina i duju busena', 'sublimacija'),
(7143, 'Koks zinduolis pavaizduotas australijos herbe', 'kengura'),
(7144, 'Priezastis, del kurios kas nors yra daroma', 'paskata'),
(7145, 'Xx apradzios airiu rasytojas, romanu \"jaunojo menininko portretas\", \"ulisas\" autorius', 'dzoisas'),
(7146, 'Tautos susirinkimas spartoje', 'apela'),
(7147, 'Prabangiausias bahamu salu viesbutis', 'atlantis'),
(7148, 'Amerikieciu radijo inzinierius, pirma karta priemes ir atpazines kosmines kilmes radijo bangas', 'janskis'),
(7149, 'Graiku mitine heroje, persejo motina', 'danaja'),
(7150, 'Zemes pavirsiuje tekancio vandens atliekamas geologinis darbas, pasireiskiantis uolienu mechaniniu ir cheminiu ardymu, taip pat suardytosios medziagos pernesimu ir suklostymu', 'erozija'),
(7151, 'Teksto paaiskinimas, pastaba, nuoroda, kita papildoma medziaga, pateikiama puslapio arba skilties apacioje', 'isnasa'),
(7152, 'Begine transporto priemone su kebulu', 'vagonas'),
(7153, 'Dziovintas kokoso riesutu minkstimas', 'kopra'),
(7154, 'Zmogus, kuris sergi, saugo', 'sargas'),
(7155, 'Zvaigzdes, kuriu sviesumas ir ryskis kinta is tikruju', 'kintamosios'),
(7156, 'Paukscio \"apreda\" primenantys debesys', 'plunksniniai'),
(7157, 'Baltas su maisytais tamsiais plaukais', 'sirmas'),
(7158, 'Koks seniausio pasaulyje medzio (akuotuotoji pusis) augancio jav amzius apytiksliai', '4300'),
(7159, 'Gamtinis kosminis kunas, skriejantis aplink saules sistemos planeta ir atspindintis saules sviesa', 'palydovas'),
(7160, 'Mokslas apie organizmu vystymosi desningumus', 'embriologija'),
(7161, 'Eismo ivykis, kurio metu, dalyvaujant vaziuojanciai motorinei transporto priemonei ar mopedui, zuvo ar buvo suzeisti zmones arba buvo sugadintos transporto priemones, krovinys, kelias, kelio statiniai, koks nors kitoks turtas', 'autoavarija'),
(7162, 'Zodis, sudarytas tik tam kartui (kalb.)', 'okazionalizmas'),
(7163, 'Kiek metu zydai, vedami mozes, vaiksciojo po dykuma', '40'),
(7164, 'Pirmojo europos poeto vardas', 'zaideju_pagrindine_informacija_4hj7sd4vras'),
(7165, 'Kas parase \"zemaiciu vyskupyste\"', 'valancius'),
(7166, 'Kada buvo israstas dulkiu siurblys sutraukiantis dulkes i medziagini maiseli', '1907'),
(7167, 'Didziausia kenijos upe', 'tana'),
(7168, 'Vaizdas kylantis miegant', 'sapnas'),
(7169, 'Chemine reakcija, kuriai vykstant daug to paties cheminio junginio daleliu (monomeru) jungiasi i stambesnes daleles - polimerus', 'polimerizacija'),
(7170, 'Ka reiskia sviesoforu signalu sistemoje geltona spalva', 'pasiruost'),
(7171, 'Trumpasis pranesimas i mobiluji telefona', 'sms'),
(7172, 'Lietuviu namu dievas, kartais tapatinamas su nunadieviu', 'numejas'),
(7173, 'Cheminis elementas, kurio simbolis \"cd\" [numeris 48]', 'kadmis'),
(7174, 'Ka lotyniskai reiskia \"ad patres\"', 'pas protevius'),
(7175, 'I kur yra nukrepta didesne dalis lietuvos palydoviniu tv antenu', 'pietus'),
(7176, 'Vandenynu didziausiu gyliu zona', 'abisale'),
(7177, 'Dazniausiai vartojamas zodis, atsiliepiant telefonu', 'alio'),
(7178, 'Salis, 2001 meurovizijos dainu konkurso nugaletoja', 'estija'),
(7179, 'Piktybinis navikas', 'vezys'),
(7180, 'Prancuzu tapytojas (1882-1963m.) \"moteris su gitara\", \"portugalas\" autorius', 'brakas'),
(7181, 'Cheminis elementas, kurio simbolis \"db\" [numeris 105]', 'dubnis'),
(7182, 'Plaukimo budas primenantis varles plaukima', 'brasas'),
(7183, 'Tauta, kalbanti viena finougru kalbu; gyvenanti vengrijoje, rumunijoje', 'vengrai'),
(7184, 'Visu laiku geriausiai parduodamas automobilis: toyota ...', 'corolla'),
(7185, 'Zmogus visiskai negeriantis alkoholiniu gerimu, blaivininkas', 'abstinentas'),
(7186, 'Tarptautine afrikos diena', 'geguzes 25'),
(7187, 'Po kokio musio (makedonijoje) nusizude julijaus cezario zudikas - brutas', 'filipu'),
(7188, '12-oji graikiskos abeceles raide', 'mi'),
(7189, 'Vokieciu romantikas, dramu \"plesikai\", \"vilius telis\"autorius', 'sileris'),
(7190, 'Mirusio zmogaus persikunijimas', 'reinkarnacija');
INSERT INTO `vikte_klsm` (`id`, `klsm`, `ats`) VALUES
(7191, 'Tradiciniais pripazinti socialiniai paprociai, kuriais vadovaujasi visi socialines grupes nariai', 'nuostatos'),
(7192, 'Zmogus, pirmasis atrades bakterijas', 'levenhukas'),
(7193, 'Kokios salies (vnskilm.) domeno vardas yra \".ml\"', 'malio'),
(7194, 'Gedimino dukte, nuo 1325 mlenkijos karaliene', 'aldona'),
(7195, 'Norvegu tapytojas, \"sauksmas\", \"paauglyste\" autorius', 'munkas'),
(7196, 'Valstybes teritorija arba jos dalis is visu pusiu apsupta ktvalstybes ir neturinti juros kranto', 'anklavas'),
(7197, 'Rimas, apimantis istisas poezijos eilutes [ne vien eiluciu pabaigas]', 'pantorimas'),
(7198, 'Tyrimas ultragarsu, pagristas ultragarso bangu atspindejimu nuo vidaus organu', 'echoskopija'),
(7199, 'Deives artemides mylimasis, jos is pavydo nuzudytas ir dievu paverstas zvaigzdynu', 'orionas'),
(7200, 'Iskilioji spauda', 'cinkografija'),
(7201, 'Antikos rasytojas (496-406 m.pr.kr.), \"edipas karalius\", \"edipas kolone\", \"antigone\", \"elektra\", \"filoktetas\" autorius', 'sofoklis'),
(7202, 'Sviesiai pilkas, zilas arklys', 'syvis'),
(7203, 'Kataliku ir staciatikiu liturginiu metu laikotarpis, skirtas priesvelykiniam pasninkui ir atgailavimui', 'gavenia'),
(7204, 'Pietu servizo dalis - sriubos lekste', 'terina'),
(7205, 'Aerozoliu pavidalo vaistu ikvepimas', 'inhaliacija'),
(7206, 'Iskirpta istrauka is laikrascio', 'iskarpa'),
(7207, 'Xi amziuje baltijos jura vadinta ..jura (kilm.)', 'varanku'),
(7208, 'Kvailas kaip bato ....', 'aulas'),
(7209, 'Uztvara gatviu musiams', 'barikada'),
(7210, 'Zalias arba rukytas gaminys is rupiai kapotos mesos', 'skilandis'),
(7211, 'Procentas, kuriuo verybiniu popieriu, pinigu, vekseliu kursas virsija ju nominaline verte ar pariteta', 'azio'),
(7212, 'Is kokio metalo gaminamas lemputes \"siulelis\"', 'volframo'),
(7213, 'A tarp b', 'bab'),
(7214, 'Senoves egiptieciu garbintas vabalas', 'skarabejas'),
(7215, 'Mokinio ziniu ir gebejimu patikrinimas baigus svietimo programa ar siekiant pradeti nauja', 'egzaminas'),
(7216, 'Vienas zymiausiu postimpresionizmo atstovu', 'gogenas'),
(7217, 'Priekinis daugiastiebio burlaivio stiebas', 'fokstiebis'),
(7218, 'Nesuvokiamas protu, mastymu, neisreiskiamas logikos savokomis', 'iracionalus'),
(7219, 'Dvi siuolaikines valstybes, kurios dalyvavo visose olimpinese zaidynese: graikija ir ...', 'australija'),
(7220, 'Pedagogikos specialistas', 'pedagogas'),
(7221, 'Prancuziskas zodis, is kurio kilo rokoko stiliaus pavadinimas', 'rocaille'),
(7222, 'Pirmakursis', 'fuksas'),
(7223, 'Karininkas, priskirtas prie vado tarnybiniams pavedimas atlikti; stabo karininkas, tvarkantis rastvedyba ir atliekantis kitus tarnybinius pavedimus', 'adjutantas'),
(7224, 'Viesoji nuomone apie kieno nors ypatybes', 'reputacija'),
(7225, 'Elektromagnetiniu bangu ilgis zymimas raide (uzrasyti raide zodziu)', 'lambda'),
(7226, 'Didziausias ezeras estijoje', 'peipsis'),
(7227, 'Optiniai izomerai', 'enantiomerai'),
(7228, 'Pasauline pauksciu diena', 'balandzio 1'),
(7229, 'Gamybiniais ar kitokiais santykiais susietas gyvenimas, kolektyvas', 'bendruomene'),
(7230, 'Vienalastis organizmas su lasteles branduoliu, pvzameba ir titnagdumblis', 'protistas'),
(7231, 'Skystoji kraujo dalis, kurioje pluduriuoja kraujo kuneliai', 'plazma'),
(7232, 'Java kalbos pagrindu sukurta skripto kalba, naudojama puslapiu kurimui', 'javascript'),
(7233, 'Salcio sukeltas letinis odos uzdegimas', 'nuozvarba'),
(7234, 'Senovines apsaugines ginkluotes dalis, dengianti karo arba jo zirgo kuno dalis', 'sarvai'),
(7235, 'Vilniaus saldainiu kombinatas', 'pergale'),
(7236, 'Graiku mitu herojus - spartos karalius, graziosios elenos vyras', 'menelajas'),
(7237, 'Sklindanti zinia, kurios tikslumas neneustatytas; gandas', 'paskala'),
(7238, 'Viduramziais, vaidinimai religine tema', 'misterija'),
(7239, 'Kairinis kircio zenklas', 'gravis'),
(7240, 'Lietuvos muzikos akademija', 'lma'),
(7241, 'Istaiga, kur uz mokesti gyvena vienisi seni zmones', 'pensionas'),
(7242, 'Mokslo saka, nagrinejanti mikrodaleliu judejima', 'kvantine teorija'),
(7243, 'Rasytojas, romanu \"baltoji iltis\", \"juru vilkas\", \"martinas idenas\", \"menulio slenis\", \"rytas austa\", \"smokas belju\", \"trys sirdys\" autorius (liet.)', 'londonas'),
(7244, '\"respublikos\" leidinio priedas skirtas moterims ir vaikams', 'brigita'),
(7245, 'Pranasas, islamo religijos ikurejas', 'mazaideju_pagrindine_informacija_4hj7sd4vtas'),
(7246, 'Apdaras kitaip', 'drabuzis'),
(7247, 'Nuotakos galvos skraiste - vienas vestuviniu drabuziu atributu', 'nuometas'),
(7248, 'Reaktyvinis priesraketinis granatsvaidis', 'bazuka'),
(7249, '9-as didziausias lietuvos ezeras [vard.]', 'plateliai'),
(7250, 'Poringa zemos degimo temperaturos molio spalvos keramika', 'terakota'),
(7251, 'Freskines tapybos rusis', 'sgrafitas'),
(7252, 'Salis kurioje yra auksciausias pastatas pasaulyje', 'malaizija'),
(7253, 'Miestas alma ...', 'ata'),
(7254, 'Japonijoje - perluociu zvejyba, auginimu uzsiimanti moteris, juros moteris', 'ama'),
(7255, 'Turintis didziausiu gabumu, labai talentingas', 'genialus'),
(7256, 'Nusigyvenes ispanijos bajoras', 'hidalgas'),
(7257, 'Suomiu firma, gaminanti mobilius telefonus bei kitus telekomunikacinius reikmenis', 'nokia'),
(7258, 'Japonu kovos menas', 'karate'),
(7259, 'Skaidrios medziagos kunas, paprastai trisienis, naudojamas spinduliams skaidyti i spektra', 'prizme'),
(7260, 'Buriatijos respublikos sostine', 'ulan ude'),
(7261, 'Gramatinis linksnis atsakantis i klausimas \"kas?\"', 'vardininkas'),
(7262, 'Raumenu dalis, kuri tvirtina ji prie kaulu', 'sausgysle'),
(7263, 'Orgazmo sukelimas paciam dirginant savo erogenines zonas', 'masturbacija'),
(7264, 'Jamaikos administracinis vienetas', 'apygarda'),
(7265, 'Socialistiniu, socialdemokratiniu paziuru politikai ir politines partijos', 'kairieji'),
(7266, 'Dirbtinis anglies dioksido prileidimas i skyscius', 'saturavimas'),
(7267, '\"spaklius\" lietuviskai', 'glaistas'),
(7268, 'Vietine per simtmecius susiformavusi ir prisitaikiusi prie lietuvos salygu kinkomuju arkliu veisle', 'zemaitukai'),
(7269, 'Kiek yra paprastu raidziu klaviaturoje', '26'),
(7270, 'Vienuoliu namai', 'vienuolynas'),
(7271, 'Jav gynybos departamento tyrimu projektu agentura, finansavusi kompiuteriniu tinklu pirminius tyrimus, kuriu pasekoje atsirado arpanet', 'arpa'),
(7272, 'Tirpalu koncentravimas, virinimo budu isgarinant tirpikli', 'garinimas'),
(7273, 'Kas sugalvojo zodzi \"utopija\" (grou topos - ne vieta, nesama vieta)', 'moras'),
(7274, 'Gynybiniai itvirtinimai ( pilys, tvirtoves, fortai )', 'fortifikacija'),
(7275, 'Lietuviu dailininkas, visuomenes veikejas, surinkes vertinga tautodailes ir ypac mediniu puostuju kryziu fotografiju kolekcija (2300 nuotrauku)', 'varnas'),
(7276, 'Antra pagal gyventoju skaiciu pasaulio valstybe', 'indija'),
(7277, 'Stomatologijos saka, tirianti dantis ir zandikauliu anomaliju priezastis, kitima, diagnostika, profilaktika ir gydyma', 'ortodontija'),
(7278, '\"bleka\" lietuviskai', 'skarda'),
(7279, 'Indenu gentis, kuriai priklause oceola', 'seminolai'),
(7280, 'Raiteliu botagas', 'stekas'),
(7281, 'Nobelio fizikos premijos laureatas 1918m., apdovanotas uz energijos kvanto atradima', 'plankas'),
(7282, 'Namu mokytojas, padedantis ismokti pamokas arba pasirengti egzaminams', 'repetitorius'),
(7283, 'Daiktu savybe sukelti regos pojuti, atitinkanti tu daiktu skleidziamos, atspindimos arba praleidziamos sviesos spektrine sudeti ir intensyvuma', 'spalva'),
(7284, 'Siaures korejos smulkus pinigas', 'conas'),
(7285, 'Vaidmenu rusis, labiausiai atitinkanti aktoriaus sceninius duomenis', 'amplua'),
(7286, 'Baigiamoji tragedijos dalis', 'eksodas'),
(7287, 'Fristailo atmaina - slidininku leidimasis nuo kalno, kuriame yra daugybe kauburiu, ant didziausiu is ju atliekant suolius', 'mogulas'),
(7288, 'Romenu likimo deives', 'parkos'),
(7289, 'Rasytojas, parases knyga \"paskutinis donas\"', 'puzo'),
(7290, 'Poleminis ir daznai autobiografinis literaturos kurinys, kuriuo jo autorius gina kokias nors paziuras, tikejima', 'apologija'),
(7291, 'Architekturoje - ilga vertikali istesto kugio arba piramides pavidalo virsune ant pastato arba jo boksto', 'spilis'),
(7292, 'Didziausias pasaulyje roplys, uzaugantis iki 8 m ilgio: juros ...', 'krokodilas'),
(7293, 'Londono parlamento rumu laikrodis [liet.]', 'bigbenas'),
(7294, 'Oficiali kalba gabone [afrika]', 'prancuzu'),
(7295, 'Spaustuvinio srifto matmuo (dydis) - atstumas tarp literos virsutines ir apatines briaunos', 'kegelis'),
(7296, 'Krikscionybes tradicijoje skaistumo, tyrumo ir sviesos simbolis, kuri iprasmina balta sio augalo ziedu spalva', 'lelija'),
(7297, 'Grynas arba su berzu priemaisa ketvirtosios botinetines klases pusynas', 'kerpsilis'),
(7298, 'Linksma, lengvo pramoginio turinio komedija su zaisminga, paradoksaliai netiketos atomazgos fabula, kurioje dialogai paprastai kaitaliojami su muzika, sokiu, kupletais', 'vodevilis'),
(7299, 'Chininmedzio zieves alkaloidas', 'chininas'),
(7300, 'Indijoje paplitusi gazeliu poseimio antilope', 'garna'),
(7301, 'Genetines informacijos visuma', 'genomas'),
(7302, 'Stambi laukine bite', 'kamane'),
(7303, 'Istaiga pagarsejes traukinys, 1883-1977 mkursaves tarp paryziaus ir stambulo: rytu ...', 'ekspresas'),
(7304, 'Kokiais skaiciais prasideda danijos bruksninis prekinis kodas', '57'),
(7305, 'Danu teisininkas, xviiaparuoses pirmaji juru teises dokumenta \"mare liberum\" [liet.]', 'grocijus'),
(7306, 'Medicinos saka, tirianti venu sandara, ju vaidmeni kraujo apytakoje, venu ligas ir ju gydyma', 'flebologija'),
(7307, 'Veikiantis ugnikalnis karibu juros salos martinikos siaureje', 'mon pele'),
(7308, 'Kampas tarp siaures krypties ir pasirinkto tasko', 'azimutas'),
(7309, 'Vengrijos kariuomene 1848-1945 metais', 'honvedas'),
(7310, 'Valstybes ir popieziaus sutartis', 'konkordatas'),
(7311, 'Komunijos paplotelis', 'ostija'),
(7312, 'Greitis tam tikru vaziavimo momentu', 'momentinis'),
(7313, 'Nedidele fortepijonine pjese', 'bagatele'),
(7314, 'Kardinolu kolegijos vadovas', 'dekanas'),
(7315, 'Senoves egipto blogio dievas', 'setas'),
(7316, 'Lkl komanda is klaipedos miesto', 'neptunas'),
(7317, 'Ezeras, prie kurio yra cikagos miestas [vard.]', 'miciganas'),
(7318, 'Lyrinis vokalinis arba instrumentinis kurinys; venecijos valtininku daina', 'barkarole'),
(7319, 'Kelintais metais tomas edisonas isrado gramofona', '1877'),
(7320, 'Prietaisas gimdai apziureti', 'metroskopas'),
(7321, 'Stipri virve', 'lynas'),
(7322, 'Plesrus demetas kaciu seimos zinduolis, gyvenantis centrines azijos kalnuose', 'irbis'),
(7323, 'Gele, krikscionybes tradicijoje skaistumo, tyrumo ir sviesos simbolis, kuri iprasmina balta ziedu spalva', 'lelija'),
(7324, 'Gelezinkelio stoties aikstele', 'peronas'),
(7325, 'Saldus, miltingas, egzotinis vaisius', 'bananas'),
(7326, 'Kokia jura yra tarp korejos ir kinijos', 'geltonoji'),
(7327, 'Zemiausias afrikos taskas (-156m): ..ezeras', 'asalo'),
(7328, 'Sviesos srauto vienetas', 'liumenas'),
(7329, 'Kaip  xix  abuvo  pavadinta priemone glaustai isdestyti matematiniu  sistemu informacija, lygiai taip pat xx abuvo pavadintas kultinis filmas', 'matrica'),
(7330, 'Lnk laida bei kompiuterijos zurnalas', 'naujoji komunikacija'),
(7331, 'Skirtumas tarp  firmos pagamintos produkcijos rinkos kainos ir jos gamybai pirktu prekiu ir paslaugu kainu: pridetine ...', 'verte'),
(7332, 'Religine srove olandijoje ir religinis visuomeninis judejimas prancuzijoje xvii-xviiia.', 'jansenizmas'),
(7333, 'Filmas, isgarsines amerikieciu aktoriu sstalone', 'rokis'),
(7334, 'Lietuviu gyvybes siulo deive', 'verpeja'),
(7335, 'Kirgizijos sostine', 'biskekas'),
(7336, 'Kokiu skaiciumi prasideda pietu afrikos respublikos bruksninis prekinis kodas', '6'),
(7337, 'Garsus danu rasytojas parases 156 pasakas is kuriu 56 baigiasi herojaus mirtimi', 'andersenas'),
(7338, 'Vokieciu tapytojas (1867-1956m.) \"kristaus gyvenimas\", \"paskutine vakariene\" autorius', 'nolde'),
(7339, 'Pavazomis sliauzianti ziemos kelio vaziuokle', 'roges'),
(7340, 'Dovydo nugaletas milzinas', 'galijotas'),
(7341, 'Antroji rijimo faze', 'oraline'),
(7342, 'Raugintas pienas', 'kefyras'),
(7343, 'Kas pirmas pavartojo geografijos savoka', 'totenas'),
(7344, 'Is atmosferos vandens garu susikondensavusi dregme ant zemes, augalu, pastatu ar kitu objektu', 'rasa'),
(7345, 'Diplomatine atstovybe', 'ambasada'),
(7346, 'Septinta pagal dydi pasaulio valstybe', 'indija'),
(7347, 'Kaip vadinamas taskas, kuriame sviesos spinduliai konverguoja', 'zidinys'),
(7348, '\"skamp\" albumas, 2001 m\"radiocentro\" metu albumas', 'skempinlige'),
(7349, 'Seksualiai patrauklios, per anksti subrendusios mergaites pavadinimas', 'lolita'),
(7350, 'Sinagogose per pamaldas skaitomu tekstu rinkiniai', 'midrasai'),
(7351, 'Dvieju kalbos elementu junginys, kurio vienas yra pazymimasis, o kitas - pazimintysis', 'sintagma'),
(7352, 'Prancuzu kompozitorius, suformaves modernu orkestra', 'berliozas'),
(7353, 'Erelis poezijoje', 'aras'),
(7354, 'Kuriais metais pradeti gaminti begiku bateliai su oro pagalve', '1979'),
(7355, 'Xiv-xvialdk valstieciu duokle didziajam kunigaiksciui rugiais, avizomis, sienu', 'dekla'),
(7356, 'Turbo pascalyje sveikuju skaiciu tipas, kurio reiksmes 0..65535', 'word'),
(7357, 'Isoriniai lytiniai organai', 'genitalijos'),
(7358, 'Asmens ar institucijos tam tikros srities sugebejimai ir igaliojimai ta sriti tvarkyti', 'kompetencija'),
(7359, 'Kolonu liemens arba piliastru plokstumu isilgine vagute', 'kaneliura'),
(7360, 'Estrados dainininko ir kino aktoriaus rojaus rodzerso pravarde', 'dainuojantis kaubojus'),
(7361, 'Ritmine gimnastika', 'aerobika'),
(7362, 'Persijos imperijos ikurejas', 'kiras didysis'),
(7363, 'Lietuvos didysis kunigaikstis 1267-1269 metais', 'svarnas'),
(7364, 'Tam tikros formos, ryskiu spalvu puosni veliavele su komandos, sporto klubo, kolektyvo, draugijos, miesto, salies skiriamaisiais zenklais, simboliais', 'gairele'),
(7365, 'Ji lygi spinduliavimo, atitinkancio kvantini suoli tarp cezio cs133 atomo pagrindines busenos hipersmulkiosios strukturos lygmenu, 9 192 631 770 periodu trukmei', 'atomine sekunde'),
(7366, 'Pusiausvirosios koloidines sistemos pasidalijimas i dvi skystasias fazes', 'koacervacija'),
(7367, 'Varomoji ziuzelio dalis', 'aksonema'),
(7368, 'Senoveje - laivu irenginys, skirtas kariams perbegti i prieso laiva: ..tiltelis', 'abordazinis'),
(7369, 'Sirupas, runkeliu cukraus gamybos atlieka, vartojama spiritui varyti, tekstiles pramoneje', 'melasa'),
(7370, 'Architektas, ermita?o komplekso su 535 kambariu ziemos rumais sankt peterburge, autorius', 'rastrelis'),
(7371, 'Vertinimo komisija', 'ziuri'),
(7372, 'Zemes geologines istorijos salto klimato laikotarpis', 'ledynmetis'),
(7373, 'Lasteles elementai, kuriuos galima rasti augalu bespalviu daliu, pavyzdziui, stiebu, saknu, stiebagumbiu, citoplazmoje [dgs.]', 'leukoplastai'),
(7374, 'Koki ezera pirmieji is europieciu pasieke ricardas bartonas ir dzonas spikas 1855 m.', 'tanganikos'),
(7375, 'Kaip po nacionalizavimo 1940mbuvo pavadinta \"ragucio\" gamykla', 'raudonoji pasvaiste'),
(7376, 'Cheminis elementas, kurio simbolis \"li\" [numeris 3]', 'litis'),
(7377, 'Australijos administracinis teritorinis vienetas: federacine ...', 'valstija'),
(7378, 'Virsutinis kataliku kunigo drabuzis, devimas per misias', 'arnotas'),
(7379, 'Anglijos futbolo klubo ???leeds united\" spalva', 'balta'),
(7380, 'Misiu knyga, svarbiausioji kataliku liturgijos knyga', 'misiolas'),
(7381, 'Filosofine disciplina, tirianti buti', 'ontologija'),
(7382, 'Nuolatinis veikejas platono dialoguose', 'sokratas'),
(7383, 'Gimusiu 11.23 - 12.22dzodiako zenklas', 'saulys'),
(7384, 'Prekiu mainu sfera', 'rinka'),
(7385, 'Ploto matavimo vienetas, lygus 0,405 hektaro', 'akras'),
(7386, 'Iskiliosios spaudos formu gamybos budas', 'cinkografija'),
(7387, 'Specialiai irengta patalpa gryniesiems pinigams ir ktvertybems priimti, isduoti ir saugoti', 'kasa'),
(7388, 'Gelezinkelio transporto avarija del darbuotoju kaltes', 'rikta'),
(7389, 'Liga - negalejimas atpazinti', 'agnozija'),
(7390, '20 romenu zyniu kolegija, kuri priziurejo, kad butu laikomasi tarptautines teises, ir pranesdavo priesininkui apie karo paskelbima [dgs.]', 'fecialai'),
(7391, 'Visuomenine samones forma, siekianti rasti bendruosius buties ir pazinimo principus', 'filosofija'),
(7392, 'Pagal senoves graiku horoskopa, asmuo, gimes 10.23 d- 11.30 d.', 'sfinksas'),
(7393, 'Ugandos siaurine kaimyne', 'sudanas'),
(7394, 'Kunigas, xix alietuvoje, kures meiles dainas', 'vienazindys'),
(7395, 'Baldas, ant kurio gulima', 'lova'),
(7396, 'Bet kurio augalo paselis vietoj zuvusio ar labai menko paselio', 'atselis'),
(7397, 'Pokylis, kurio dalyviai su kaukemis devi charakteringus kostiumus', 'maskaradas'),
(7398, 'Tanki vieno ar keliu eiliu medziu, krumu juosta, sodinama alejoms, skverams, bulvarams ireminti, sodams ir sodyboms saugoti nuo vejo, dulkiu, vietoje tvoru', 'gyvatvore'),
(7399, '\"plafkes\" lietuviskai', 'glaudes'),
(7400, 'Prietaisas zveju naudojamas zuvims aptikti', 'echolotas'),
(7401, 'Liguista baime mirti', 'tanatofobija'),
(7402, 'Apsviestumo matavimo vienetas si sistemoje', 'liuksas'),
(7403, 'Gyvenamuju laiveliu flotile, prisisvartavusi marinoje', 'akvatelis'),
(7404, 'Paziuru visuma, dieva sutapatinanti su visa gamta', 'panteizmas'),
(7405, 'Salis, kuriai priklauso kaledu sala', 'kiribatis'),
(7406, 'Kai kuriu bakteriju, turinciu fagus, gebejimas lizuoti kitu bakteriju stamus, pacioms joms nesuyrant', 'lizogenija'),
(7407, 'Asmenybes vystymosi, saviraiskos istorija, apimanti visa zmogaus gyvenima - nuo gimimo iki mirties', 'gyvenimo kelias'),
(7408, '25 vedybinio gyvenimo metu sukaktis: ..vestuves', 'sidabrines'),
(7409, 'Pietu vejas prie vidurzemio juros', 'sirokas'),
(7410, 'Atstumas nuo vandens pavirsiaus iki laivo kilio apacios', 'grimzle'),
(7411, 'Eriuko tevas', 'avinas'),
(7412, 'Korta, losime vyresne uz bet kuria kitos rusies korta', 'koziris'),
(7413, 'Didziausias afrikos pusiasalis', 'somalis'),
(7414, 'Bendravimas tarp zmoniu kuno judesiais - kuno ..', 'kalba'),
(7415, 'Epocha nuo va.-xva.', 'viduramziai'),
(7416, 'Mitu, ju motyvu grozineje literaturoje aprasymas, isskyrimas', 'mitografija'),
(7417, 'Xi amziuje turku gentys', 'seldziukai'),
(7418, 'Dailes kryptis,susiformavusi xv-xix apagrista antikos ir renesanso meno isoriniu formu kanonais', 'akademizmas'),
(7419, 'Didelis gerbejas', 'fanas'),
(7420, 'Baigiamoji ligos istorijos dalis', 'epikrize'),
(7421, 'Lemiamas puolimo etapas', 'sturmas'),
(7422, 'Italu tapytojas, \"anarchisto galio laidotuves\" autorius', 'cara'),
(7423, 'Pluduriuojanti konstrukcija ivairiems irenginiams ant vandens laikyti arba atlikti kokiems nors darbams', 'pontonas'),
(7424, 'Lektuvo korpusas', 'fiuzeliazas'),
(7425, 'Sumeru dievas, valdes pasaulio pagrindus, zeme; taip pat globojes isminti ir pranasystes', 'enkis'),
(7426, 'Geriausia akies matymo vieta', 'centrine duobute'),
(7427, 'Apdailos sluoksnis, kurio islyginamas ir dekoruojamas isorines arba vidines sienos pavirsius', 'tinkas'),
(7428, 'Indu epine poema', 'ramajana'),
(7429, 'Cheminis elementas, kurio simbolis \"np\" [numeris 93]', 'neptunis'),
(7430, 'Arkties tauta, gyvenanti rytu azijoje ir samerikoje', 'eskimai'),
(7431, 'Sardinijos ir korsikos gyventoju kraujo kersto uz nuzudyta giminaiti paprotys, islikes iki 20a.', 'vendeta'),
(7432, 'Seniausia religija', 'budizmas'),
(7433, 'Savaeige masina ivairioms birioms medziagoms kasti ir krauti i transporto priemones ar kruva', 'ekskavatorius'),
(7434, 'Kapsuko tikroji pavarde', 'mickevicius'),
(7435, 'Koks lietuvos miestas anksciau buvo vadintas \"silo karcema\"', 'silute'),
(7436, 'Lietuviu arkliu ir karo dievas', 'karorius'),
(7437, '1923 mpaskelbta neutrali zona prie gibraltaro', 'tanzeras'),
(7438, 'Partiju susivienijimas arba susitarimas del bendru veiksmu', 'kartelis'),
(7439, 'Kam priklauso velyku sala', 'cilei'),
(7440, 'Kiek buvo mliuterio teziu', '95'),
(7441, 'Salis, kurioje surengtos pirmosios badmintono varzybos', 'anglija'),
(7442, 'Neivykdoma, nereali svajone, fantazija', 'utopija'),
(7443, 'Perejimas is zemesnes kybojimo padeties i aukstesne lenkiant rankas', 'prisitraukimas'),
(7444, 'Kiek apsukukimu padaro 8 cilindru keturtakcio variklio alkuninis velenas, kol visuose cilindruose po viena karta ivyksta uzdegimas', '2'),
(7445, 'Kokios nors veiklos pradininkas', 'pionierius'),
(7446, 'Parase \"idiotas\"', 'dostojevskis'),
(7447, 'Slenis prie reino, vokietijoje, kur 1856 mbuvo iskastos senovinio zmogaus liekanos', 'neandartalis'),
(7448, 'Paskutine graiku abeceles raide', 'omega'),
(7449, 'Kylanciu suolu eiles stadione, saleje, cirke', 'tribuna'),
(7450, 'Antikines eiledaros triskiemene keturiu moru peda, kurios du pirmi skiemenys trumpi, o trecias ilgas', 'anapestas'),
(7451, 'Labai mazi zmones', 'liliputai'),
(7452, 'Kaip 1840-1842 mvadinosi karas tarp anglijos ir kinijos', 'opiumo'),
(7453, 'Jav kosmonautas, pirmasis zmogus izenges i menuli', 'armstrongas'),
(7454, 'Telekomunikaciju kompanija, pagaminusi mobiliu telefonu modelius: c10, c11', 'siemens'),
(7455, '2000/2001meurolygos nugaletojai', 'kinder'),
(7456, 'Veidrodis is 3 suviaremu daliu', 'treliazas'),
(7457, 'Anglu keliautojas, 1592 matrades folklendo salas: dzonas ..[liet.]', 'deivis'),
(7458, 'Grazus rastas', 'dailyrastis'),
(7459, 'Balantidiozes invazijos saltinis zmogui [gyvulys]', 'kiaule'),
(7460, 'Kuris (be bush) jav prezidentas buvo kito jav prezidento sunus', 'adamsas'),
(7461, 'Sistema priemoniu, kuriu imtasi po ii pasaulinio karo, hitlerinei ideologijai, istatymams ir organizacijoms pasalinti is vokietijos politinio ir visuomeninio gyvenimo', 'denacifikacija'),
(7462, 'Pretendentas i pareigas', 'kandidatas'),
(7463, 'Vyrai turi seklides, moterys - ...', 'kiausides'),
(7464, 'Islamo sekejas paklustas alachui', 'musulmonas'),
(7465, 'Tirstos mases gaminys', 'pasta'),
(7466, 'Viena romanu tautu, gyvenanti pirenu pusiasalyje', 'ispanai'),
(7467, 'Lichtensteino sostine', 'vaducas'),
(7468, 'Irzlus, suirzes, erzinantis', 'nervingas'),
(7469, '9-oji graikiskos abeceles raide', 'jota'),
(7470, 'Pasaku personazas, pametes kurpaite', 'pelene'),
(7471, 'Elementas, kurio branduolyje nera neutronu', 'vandenilis'),
(7472, 'Karaliaus samsono mylimoji', 'dalile'),
(7473, 'Ilga daiktu eile, virtine', 'linija'),
(7474, 'Koks gyvunas krikscioniskame mene yra bedugnes ir tamsos simbolis', 'banginis'),
(7475, 'Pasvaiste , zara', 'geisas'),
(7476, 'Banginiu medziotoju ginklas, plieninis zeberklas su uzbarzdomis ir sprogstamosios medziagos uztaisu smaigalyje', 'harpunas'),
(7477, 'Lietuviu dienos sviesos deive, kiekviena ryta pakylanti i dangu auksine karieta, traukiama poros baltu zirgu', 'saule'),
(7478, 'Kas ikure seniausia atenu filosofijos mokykla', 'platonas'),
(7479, 'Rusu estrados zvaigzdes pugaciovos vardas', 'ala'),
(7480, 'Gydytojo gydomas ligonis', 'pacientas'),
(7481, 'Kokiame zemyne yra alzyras', 'afrikoje'),
(7482, 'Jav prezidentas, jauniausias pasaulyje, kada nors isrinktas tokiame poste, kadencijos metu nuzudytas', 'kenedis'),
(7483, 'Veiksmai, kuriais atliekama kokia nors uzduotis', 'operacija'),
(7484, 'Mokinys, besimokantis pagal priesmokyklinio, pradinio, pagrindinio, vidurinio ar atitinkamas specialiojo ugdymo ir pirminio profesinio mokymo programas', 'moksleivis'),
(7485, 'Vienintelis naturalus saldiklis', 'fruktoze'),
(7486, 'Ploksciadugnis medinis laivas, naudojamas daugiausia rytu ir pietryciu azijos upese ir juru pakrantese keleiviams bei kroviniams vesti', 'sampanas'),
(7487, 'Finansavimo forma, kai bankas isigyja teise i debitoriu isipareigojimus, susijusius su prekiu eksportu ir importu, be teises tam tikrais atvejais pateikti pretenzijas klientui', 'forfeitingas'),
(7488, 'Slaptos berlyno sienos statymo operacijos pavadinimas', 'roze'),
(7489, 'Kataliku vienuoliu ordinas, ispano ilojolo isteigtas 1534 mparyziuje kovai su reformacija', 'jezuitai'),
(7490, 'Dailes kurinio arba projekto metmenys', 'eskizas'),
(7491, 'Kokiu skaiciumi prasideda austrijos bruksninis prekinis kodas', '9'),
(7492, 'Kaip buvo pravardziuojamas astuonioliktasis jav prezidentas grantas', 'dede semas'),
(7493, 'Galilejaus atrastas padrikasis zvaigzdziu spiecius vezio zvaigzdyne', 'prakartas'),
(7494, 'Darysis rudas', 'rus'),
(7495, 'Cheminis elementas, kuriam duotas skandinavu karo dievo vardas', 'toris'),
(7496, 'Stiprus alkoholinis gerimas is aukstos kokybes rektifikuoto spirito ir aromatiniu medziagu', 'dzinas'),
(7497, 'Zaidimas, viesas atsakinejimas i klausimus', 'viktorina'),
(7498, 'Regejimo sutrikimas - matomu daiktu dvejinimasis', 'diplopija'),
(7499, 'Liturgine knyga, kurioje aprasyta kristaus kancia', 'pasionalas'),
(7500, 'Akronimas - \"read the fucking manual\"', 'rtfm'),
(7501, 'Kauno dalis i pietrycius nuo gelezinkelio stoties, nemuno desiniajame krante', 'sanciai'),
(7502, 'Transporto priemone, dazniausiai skirta vaikams, panasi i batus ant ratu', 'rieduciai'),
(7503, 'Senoves indijos deive ikunijusi visata, dievu motina', 'adite'),
(7504, 'Rusu poezijos kryptis, gyvavusi 1911-1921 m.', 'akmeizmas'),
(7505, 'Carines rusijos slaptoji politine policija', 'ochranka'),
(7506, 'Cheminis elementas, kurio pavadinimas kilo is graiku kalbos zodzio, reiskiancio \"kvapas\"', 'osmis'),
(7507, 'Transporto statinys automobiliu keliui, gelezinkeliui, gatvei, pesciuju takui arba inzinerinems komunikacijoms nutiesti per sleni, tarpekli, gatve, kelia', 'viadukas'),
(7508, 'Didziausias vengrijos ezeras', 'balatonas'),
(7509, 'Liga - nesugebejimas rasyti', 'agrafija'),
(7510, 'Politine doktrina, kuri siulo panaikinti valstybe, o turta padalinti visiems lygiom dalim', 'anarchizmas'),
(7511, 'Prieso nugalejimas', 'pergale'),
(7512, 'Dovana laimetojui', 'prizas'),
(7513, 'Didelis zemes plutos blokas, atskirtas giliu tektonininu luziu', 'litosferos plokste'),
(7514, 'Senoves graikijoje - karo vadas, archontas, tvarkantis karo ir laivyno reikalus', 'polemarchas'),
(7515, 'Devyni amatai - desimtas ...', 'badas'),
(7516, 'Eritrejos pagrindinis pinigas', 'nakfa'),
(7517, 'Ziemos sporto saka rogutemis, kai sportininkas ant rogiu guli galva i prieki', 'skeletonas'),
(7518, 'Zemynas, is kurio kilo juodieji ir raudonieji serbentai', 'europa'),
(7519, 'Siulu pakuote', 'rite'),
(7520, 'Debesu deive, frikso ir heles motina', 'nefele'),
(7521, 'Alijosius (augalas) kitaip', 'alavijas'),
(7522, 'Japonu drabuzis', 'kimono'),
(7523, 'Mikrobu ir kitu pasaliniu daleliu paglemzimas ir suvirskinimas', 'fagocitoze'),
(7524, 'Maziausias pasaulyje paukstis', 'kolibris'),
(7525, 'Letas teritorijos grimzdimas', 'plyta'),
(7526, 'Jav ir kai kuriu kitu lotamerikos saliu parlamentas', 'kongresas'),
(7527, 'Kokis yra zymiojo postimpresionizmo atstovo sezano vardas', 'polis'),
(7528, 'Vengrijos f-1 trasa', 'hungaroring'),
(7529, '(2+2/2)^3=', '27'),
(7530, 'Senmiestas palestinoje, daves pradzia samarieciams', 'samarija'),
(7531, 'Pyragelis is plonai iskociotos preskos teslos su avienos idaru; paplites kryme, kaukaze', 'ceburekas'),
(7532, '\"karunos\" sokoladinis batonelis su lazdyno riesutais', 'manija'),
(7533, 'Dailininko raiziklis', 'matuaras'),
(7534, 'Japonijos piniginis vienetas', 'jena'),
(7535, 'Kitatauciu iskeldinimas ar isvijimas', 'etninis valymas'),
(7536, 'Koks lietuviskas zodis kilo is slavisko zodzio, reiskiancio \"vieta\"', 'miestas'),
(7537, 'Santuokos nutraukimas', 'istuoka'),
(7538, 'Burkina faso administracinis vienetas', 'provincija'),
(7539, 'Graiku grozio ir meiles deive', 'afrodite'),
(7540, 'Kas rezisavo legendini apple reklamini klipa 1984', 'scott'),
(7541, 'Hegelio filosofijos triada: teze, antiteze, ...', 'sinteze'),
(7542, 'Konkreti morfemos israiska zodyje', 'morfas'),
(7543, 'Italu tapytojas, \"atsisveikinimo nuotaika\" autorius', 'boconi'),
(7544, 'Kulturos svietimo istaiga, renkanti, sauganti, tirianti ir eksponuojanti gamtos, istorijos, materialines ir dvasines kulturos vertybes', 'muziejus'),
(7545, 'Dainininko george michael kilmes salis', 'graikija'),
(7546, 'Sakoma pats geriausias obuoli? brendis pasaulyje', 'kalvadosas'),
(7547, 'Koks valdovas milano ediktu 313 mlegalizavo krikscionybe', 'konstantinas'),
(7548, 'Meno ir literaturos kryptis, iskilusi xvi-xvii asanduroje ir gyvavusi iki xviii avidurio', 'barokas'),
(7549, '\"the beatles\" atlikejo dzlenono zmona', 'ono'),
(7550, 'Pagrindas, ant kurio statomas laivas, arba irenginys, kuriuo surinktas laivas nuleidziamas i vandeni', 'stapelis'),
(7551, 'Kelis kampus turi kelio zenklas \"vaziuoti nesustojus draudziama\"', '8'),
(7552, 'Senoves graiku vazele aliejui', 'lekitas'),
(7553, 'Alkaloidas, esantis kokamedzio lapuose; vartojamas vietinei anestezijai; stiprus narkotikas', 'kokainas'),
(7554, 'Xvi apab- xviii aprrusu reprezentacinis portretas, pasizymintis ryskia socialine modelio charakteristika, perteikta valdzios ir luomo atributais', 'parsuna'),
(7555, 'Eiliuotos kalbos kurimo taisykles', 'eiledara'),
(7556, 'Mokomasis mokyklos kambarys', 'klase'),
(7557, 'Ipakavimo medziaga; ipakavimo islaidos', 'ambalazas'),
(7558, 'Visu laiku didziausias bestseleris', 'biblija'),
(7559, 'Zymiausias lietuviu estrados dainu kurejas [vardas, pavarde]', 'mikas vaitkevicius'),
(7560, 'Salis, is kurios kilo ananasas', 'brazilija'),
(7561, 'Holivudo aktore ..stone [orig.]', 'sharon'),
(7562, 'Dabartinis stalingrado pavadinimas', 'volgogradas'),
(7563, 'Vanagu seimos labai retas, nykstantis paukstis, gyvenantis dregnuose miskuose, kur yra zalciu ir gyvaciu', 'gyvatedis'),
(7564, 'Viesai kalbantis zmogus', 'oratorius'),
(7565, 'Liguistas kuno mases padidejimas del per gausaus riebalu susikaupimo jo audiniuose', 'nutukimas'),
(7566, 'Kas sugalvojo issireiskima \"politika\"', 'aristotelis'),
(7567, 'Ruosinio aukscio sumazinimo operacija, padidinant jo skerspjuvio plota', 'susodinimas'),
(7568, 'Fotografijos, fiksuojancios judesio fazes per tam tikra laikotarpi, pavadinimas', 'chronograma'),
(7569, 'Sventa diena', 'sventadienis'),
(7570, 'Maziausias nedalyjamas energijos kiekis', 'kvantas'),
(7571, 'Kas susidaro ant alaus pavirsiaus ji suplakus', 'puta'),
(7572, 'Smulkus blizgantys siuvinejimo karoliukai', 'biseris'),
(7573, 'Smulkus plyselis, kanalelis ar vamzdelio pavidalo ertme uolienoje', 'kapiliaras'),
(7574, 'Literaturine konvensija, grindziama biologine zmogaus traktuote ir fotografisku tikroves imitavimu', 'naturalizmas'),
(7575, 'Krikscioniu sventasis, seniausio vakaru vienuoliu ordino, pavadinto jo vardu, steigejas: ..nursietis', 'benediktas'),
(7576, 'Letine liga, kurios klinikinius reiskinius sukelia uratu mikrokristalu kaupimasis sanariuose, apie juos esanciuose audiniuose ir vidaus organuose', 'podagra'),
(7577, 'Koks garsus madu kurejas yra pasakes daznai cituojama fraze \"netikiu geru skoniu\"', 'versace'),
(7578, 'Rasytojas, romanu \"vakaru fronte nieko naujo\", \"juodasis obeliskas\", \"trys draugai\", \"mylek savo artima\", \"triumfo arka\", \"kelias atgal\" autorius (liet.)', 'remarkas'),
(7579, 'Indukuotos sroves atsiradimas uzdarame konture, kai ji kerta magnetinio lauko linijos', 'elektromagnetine i'),
(7580, 'Temperaturos matavimo vienetas siaures amerikoje', 'farenheitas'),
(7581, 'Tikejimas, kad egzistuoja antgamtines jegos', 'religija'),
(7582, 'Virvele botagui prie koto priristi', 'panara'),
(7583, 'Rasytojas, pjesiu \"zydroji paukste\", \"nekviestoji viesnia\", \"aklieji\", \"septynios princeses\" autorius (liet.)', 'meterlinkas'),
(7584, 'Kas vadovavo karaliskojo kalejimo - tauerio - statymui', 'vilhelmas uzkariautojas'),
(7585, 'Vesumas kitaip', 'vesa'),
(7586, 'Kas parase \"the origins of war\"', 'ferilis'),
(7587, 'Senovinis kertamasis-duriamasis ginklas su asmenimis ir ietgaliu ant ilgo medinio koto', 'alebarda'),
(7588, 'Mazas darzas', 'darzelis'),
(7589, 'Issifruokite ftp (angliskai)', 'file transfer protocol'),
(7590, 'Isakytinis vekselis', 'trata'),
(7591, 'Drabuzis is kailio', 'kailiniai'),
(7592, 'Fermentas kurio padidejimas kraujo serume rodo kasos arba seiliu liauku pazeidima', 'amilaze'),
(7593, '\"pelene\" ir kitu pasaku autorius', 'pero'),
(7594, 'Lietuviu rasytojas, romanu \"laiptai i dangu\", \"adomo obuolys\", \"uostas mano - neramus\", \"kelione i kalnus ir atgal\", \"saule vakarop\", \"medzliepis??? autorius', 'sluckis'),
(7595, 'Sengraiku ir romenu patalpa dailes kuriniams saugoti', 'pinakoteka'),
(7596, 'Gyvunu kelimasis is vienos vietos i kita', 'migracija'),
(7597, 'Seniausio pasaulyje liaudies epo herojus; sumeru tautos didvyris', 'gilgamesas'),
(7598, 'Fizinio ar protinio lavinimo veiksmas', 'pratimas'),
(7599, 'Sistema, kurioje valdzia priklauso talentingiausiems, intelektu pranokstantiems visus kitus', 'meritokratija'),
(7600, 'Pinigai, kuriuos pagal istatyma tevai moka vaikams islaikyti (ar atvirksciai)', 'alimentai'),
(7601, 'Auksciausia antarktidos virsune: ..masyvas', 'vinsono'),
(7602, 'Bevejis oras arba silpnas vejas, kurio greitis  0.3 m/s', 'tyka'),
(7603, 'Jis ir ji', 'jie'),
(7604, 'Kada buvo atidarytas sueco kanalas', '1869'),
(7605, 'Moters islaikomas meiluzis', 'alfonsas'),
(7606, 'Platus urvas skliautiskomis lubomis', 'grota'),
(7607, 'Sengraiku mitologijoje - butybe su liuto galva, ozkos liemeniu', 'chimera'),
(7608, 'Priemoniu visuma dirbtinai pakelti bet kurios prekes kaina', 'valorizacija'),
(7609, 'Karinis junginys, kuri sudaro kelios es valstybes [liet.]', 'eurokorpusas'),
(7610, 'International business machines sutrumpintai', 'ibm'),
(7611, 'Sengraikijoje - auka dievams is 100 jauciu', 'hekatomba'),
(7612, 'Oficiali kalba kambodzoje, kitaip khmeru kalba', 'kambodzu'),
(7613, 'Laiko tarpas tarp dvieju menulio jaunaciu', 'lunacija'),
(7614, 'Saturno palydovas, pavadintas moters vardu, kuria is molio nulipde hefaistas, ir kuri atidare jai dievu dovanota inda, is kurio po pasauli pasklido nelaimes ir nedorybes', 'pandora'),
(7615, 'Prietaisas juru, ezeru, upiu vandens lygio svyravimams registruoti', 'limnigrafas'),
(7616, 'Isorinis kietas zemes rutulio apvalkalas', 'litosfera'),
(7617, 'Palyginti nestabili rauksleta zemes plutos sritis, iskilusi per kalnodara', 'orogenas'),
(7618, 'Kenksminga medziaga, randama zaliose pupeliu ankstyse', 'fazinas'),
(7619, 'Uzmaskuotas minciu reiskimo budas, alegorinis pasakymas: ezopo ...', 'kalba'),
(7620, 'Miestelis kauno rajone arba zodzio \"ezeras\" mazybine forma', 'ezerelis'),
(7621, 'Lietuvos ?stojimo ? nato diena', 'kovo 29'),
(7622, 'Visuomenes grietinele', 'elitas'),
(7623, 'Slovenijos sostine', 'liublijana'),
(7624, 'Prancuzu tapytojas, \"voras\" autorius', 'redonas'),
(7625, 'Saldus patiekalai, vaisiai, uogos arba saldumynai, kuriais baigiami pietus', 'desertas'),
(7626, 'Europos salis, kurioje zmones pirmiausiai valgant eme naudoti sakutes', 'italija'),
(7627, 'Koks paukstis yra svpovilo atsiskyrelio atributas', 'varnas'),
(7628, 'Amuletas, nesiojamas ant kaklo, japonijoje reiskia nemirtinguma', 'magatama'),
(7629, 'Bibliniai pranasai, krikscioniu apastalai', 'charizmatikai'),
(7630, '\"robinhudo\" autorius', 'paulas'),
(7631, 'Treciojo brolio vardas', 'jonas'),
(7632, 'Ola kitaip', 'urvas'),
(7633, 'Lietuviu deive, pazadinanti mieganti zmogu', 'budintoja'),
(7634, 'Muzikinio kurinio transkripcija fortepijonui', 'klavyras'),
(7635, 'Zaidejas, kuriam priklauso rezultatyvumo rekordas per vienas lkl varzybas', 'einikis'),
(7636, 'Zurnalas panelems', 'panele'),
(7637, 'Sutrikimas, kai nematant daikto negalima nustatyti, kas ten yra', 'astereognoze'),
(7638, 'Amerikos strutis', 'nandu'),
(7639, 'Kaip vadinasi branduolio dalele, kuri turi tokia pat mase kaip protonas, bet yra neutrali', 'neutronas'),
(7640, 'Optinis prietaisas, leidziantis stebeti saules vainika ne visiskuju uztemimu metu', 'koronografas'),
(7641, 'Produktas, gaunamas is organiniu atlieku, paveiktu fizikines -chemines, biochemines ir mikrobiologines transformacijos lietaus slieku virskinamajame trakte', 'vermikompostas'),
(7642, 'Terminiai vandenys - siltos arba karstos versmes ir karsti pozeminiai vandenys [dgs.]', 'termos'),
(7643, 'Labiausiai paplitusi protestantizmo atmaina', 'baptizmas'),
(7644, 'Kada ivyko termidoro 9-osios perversmas, kuris laikomas didziosios prancuzijos revoliucijos pabaiga', '1794'),
(7645, 'Irankis lentoms lyginti, ju siauriesiems krastams ilaiduoti', 'oblius'),
(7646, 'Atsiskaitymo uz prekes ar paslaugas priemone', 'pinigai'),
(7647, 'Baltijos karine juru eskadra', 'baltron'),
(7648, 'Kiek kartu svedijos baltijos juros pakrante ilgesne uz lietuvos', '70'),
(7649, 'Graiku mitologijoje - veju karalius', 'eolas'),
(7650, 'Izymybe, kurios plauku sruoga parduota brangiausiai pasaulyje (>115000 usd) - elvis ...', 'preslis'),
(7651, 'Lengvai, greitai lekianti', 'laki'),
(7652, 'Renault ir volvo atstovas lietuvoje [imone]', 'sostena'),
(7653, 'Daina, paprastai dainuojama vaikams pries miega', 'lopsine'),
(7654, 'Lietuviu vaiku rasytojas, knygos \"mano vaikystes ledai\" autorius', 'racickas'),
(7655, 'Lengvas permatomas audinys', 'tiulis'),
(7656, 'Zmogaus arba gyvuliu lytiniu liauku pasalinimas arba ju hormonines veiklos nuslopinimas', 'kastracija'),
(7657, 'Ka lietuviskai reiskia su matavimo vienetais naudojama \"si\" santrumpa', 'tarptautine sistema'),
(7658, 'Rinka, kurioje veikia keli stambus gamintojai', 'oligopolija'),
(7659, 'Kaip lietuviskai turetu skambeti kompiuteriu kalboje paplites zodis \"portas\"', 'prievadas'),
(7660, 'Motvardas, kiles is lotkalbos, reiskia \"istverme, tvirtybe\"', 'konstancija'),
(7661, 'Pirmasis elekcinis (bajoru isrinktas) zecpospolitos valdovas: henrikas ...', 'valua'),
(7662, 'Dramblio kaulo kranto sostine', 'jamusukras'),
(7663, 'Jav karo aviacijos baze naujosios meksikos valstijoje; ten pirma karta 1945 06 16 buvo susprogdinta atomine bomba', 'alamogordas'),
(7664, 'Laivo patalpos zemiau zemiausio denio', 'triumas'),
(7665, 'Ivairiu formu isdziovintas maisto pusgaminis is kvietiniu miltu teslos [dgs.]', 'makaronai'),
(7666, 'Prieso laivas arba koks kitas turtas uzgrobtas juru kare; juros trofejas', 'prizas'),
(7667, 'Itaisas durims uzsklesti', 'sklastis'),
(7668, 'Vandens turbina', 'hidroturbina'),
(7669, 'Dangaus sferos taskas, priesingas zenitui', 'nadyras'),
(7670, 'Danijos sostine?', 'kopenhaga'),
(7671, 'Dydzio vienetais reiskiamas matmuo', 'dimensija'),
(7672, 'Infekcine liga, kuria sukelia bakterijos, vadinamos brucelemis', 'brucelioze'),
(7673, 'Uosles susilpnejimas', 'hiposimija'),
(7674, 'Italijos futbolo klubas, kurio visa komanda 1949 m zuvo aviakatastrofoje: ac ...', 'torino'),
(7675, 'Tarybu sajungos vadovas, komunistu partijos lyderis (1964-1982)', 'breznevas'),
(7676, 'Procesas, kai neuronas priima signala is kitu neuronu ir iseina vienas signalas', 'konvergencija'),
(7677, 'I abi puses isversta vaga', 'isara'),
(7678, 'Lietuva angliskai', 'lithuania'),
(7679, 'Siekis tureti gerybe dabar, o ne ateityje', 'laiko preferencija'),
(7680, 'Gyvenantis kaimynysteje', 'kaimynas'),
(7681, 'Karaliene, isteigusi ispanu inkvizicija', 'izabele i'),
(7682, 'Spaustuves raidziu rinkimo masina, liejanti kiekviena raide atskirai', 'monotipas'),
(7683, 'Kongo politinis veikejas, pirmasis kongo respublikos premjeras ir gynybos ministras1966mpaskelbtas nacionaliniu didvyriu', 'lumumba'),
(7684, 'Kvadratine plokste po kolonos baze', 'plintas'),
(7685, 'Kariuomenes pergrupavimas ar perkelimas i naujas kovos veiksmu vietas', 'manevras'),
(7686, 'Vklovos opera', 'pilenai'),
(7687, 'Ka lotyniskai reiskia \"ad libitum\"', 'pasirinktinai'),
(7688, 'Vanuatu respublikos administracinis vienetas', 'provincija'),
(7689, 'Salis, kurios domeno vardas yra \".bt\"', 'butanas'),
(7690, 'Kiek minuciu kosmonautas a.leonovas pirmasis isbuvo atvirame kosmose salia skriejancio laivo \"voschod 2\"', '12'),
(7691, 'Priemone regejimui gerinti', 'akiniai'),
(7692, 'Lietuviu keliautoju dievas ar deive', 'guze'),
(7693, 'Pats garsiausias laivas kino istorijoje', 'titanikas'),
(7694, 'Kometu branduoliu telkinys, nutoles nuo saules mazdaug 100000 av', 'orto debesis'),
(7695, 'Iskiles zemes plutos luistas, ribojamas sprudziu', 'horstas'),
(7696, 'Stebejimo ar saudymo anga gynybinio pastato sienoje, karo laivo ar tanko sarve', 'ambrazura'),
(7697, 'Skaiciaus treciasis laipsnis', 'kubas'),
(7698, 'Sutartis, kurioje salys susitaria tam tikromis salygomis ateityje sudaryti kita sutarti', 'preliminarioji'),
(7699, 'Knygos ar filmo veikejas', 'personazas'),
(7700, 'Aukstai temperaturai atspari, labai kieta sintetine abrazyvine medziaga', 'elboras'),
(7701, 'Rasytojas, romanu \"raudona ir juoda\", \"parmos vienuolynas\", \"armansa\", \"liusjenas levenas\" autorius (liet.)', 'stendalis'),
(7702, 'Aktyviai plaukiojanciu ir sroves jega iveikianciu vandens gyvunu visuma', 'nektonas'),
(7703, 'Mokslas, susijes su kariniu pajegu judejimo ir islaikymo planavimu ir jo igyvendinimu', 'logistika'),
(7704, 'Jeigu p ir q teiginiai, tai teiginys p arba q vadinamas teiginiu p ir q ...', 'disjunkcija'),
(7705, 'Aparatas tam tikro ilgio elektromagnetiniams spinduliams gauti ir persviesti tais spinduliais', 'rentgenas'),
(7706, 'Didziausias pietu amerikos ezeras', 'titikaka'),
(7707, 'Jto vaiku gynimo fondas', 'unicef'),
(7708, 'Uzakusiu ezeru vietos, paezeriuose plytincios pelkes, tyrumai, liunai [dgs.]', 'palios'),
(7709, 'Kas yra lygus elektronu poru, jungianciu ta atoma su kitu elementu atomais, skaiciui', 'valentingumas'),
(7710, 'Keliu tiesimo masina skystoms saltoms ar karstoms bituminems ir degutinems risamosioms medziagoms gabenti ir paskleisti lygiu sluoksniu', 'gudronizatorius'),
(7711, 'Kaip anksciau buvo vadinamas ketvirtadalis penso', 'fartingas'),
(7712, 'Astriabriaune akmenu atplaisa', 'eolitas'),
(7713, '\"leista\" lotyniskai', 'licet'),
(7714, 'Religinio asketizmo forma - ilgesnis ar trumpesnis susilaikymas nuo valgymo ar tam tikro maisto, pramogu, lytiniu santykiu ir pan', 'pasninkas'),
(7715, 'Kenijos sostine', 'nairobis'),
(7716, 'Metaliniu zenkleliu, ordinu, medaliu ir ktkolekcionavimas', 'faleristika'),
(7717, 'Neturintis mikrobu', 'sterilus'),
(7718, 'Barbadoso sostine', 'bridztaunas'),
(7719, 'Isverskite i lietuviu kalba prancuziska zodi \"eau de cologne\"', 'odekolonas'),
(7720, 'Kukuruzu miltu kose', 'polenta'),
(7721, 'Gomurio tonziliu pasalinimas', 'tonzilektomija'),
(7722, 'Diena, nuo kurios iki metu galo lieka 364 dienos (keliamaisiais metais)', 'sausio 1'),
(7723, 'Senoves graiku mitologijoje pragaras', 'erebas'),
(7724, 'Lietuviu kompozitorius, pianistas, dirigentas, operos \"dalia\", simfoniniu kuriniu, muzikos spektakliams ir kinofilmams autorius', 'dvarionas'),
(7725, '16-oji graikiskos abeceles raide', 'pi'),
(7726, 'Mschumacher gimimo data', '1969'),
(7727, 'Neirodyta teorija, aiskinanti, kodel vyksta koks nors reiskinys', 'hipoteze'),
(7728, 'Pomidoru padazo tevyne', 'kinija'),
(7729, 'Zydu kalba, izraelio valstybine kalba', 'ivritas'),
(7730, 'Salis, kurios valiutos sutrumpinimas mdl', 'moldavija'),
(7731, 'Penkiakampio kampu suma', '540'),
(7732, 'Filmas su mel gibson: \"mes buvome ...\"', 'kariai'),
(7733, 'Didziausia zuvis', 'milzinryklys'),
(7734, 'Ipareigojimas itariamajam nustatytu metu buti savo gyvenamojoje vietoje, nesilankyti viesose vietose ir nebendrauti su tam tikrais asmenimis', 'namu arestas'),
(7735, 'Sokis pagal rokenrolo muzika, sokamas beveik nekilnojant pedu, tik ritmiskai judinant klubus, pecius rankas ir galva', 'frugas'),
(7736, 'Upiu sleniuose nusedusios vandens tekmiu sanasos', 'aliuvis'),
(7737, 'Virvute sujungtos dvi sventosios medziagos skiauteles su issiuvinetais paveiksliukais, kataliku nesiojamos ant kaklo', 'skaplierius'),
(7738, 'Stangri spirales, sraigto ar kitokio pavidalo detale', 'spyruokle'),
(7739, 'Pirmasis fiba prezidentas (liet.)', 'baufardas'),
(7740, 'Smegenu sritis, kuri atsakinga uz koordinacija', 'smegeneles'),
(7741, 'Tinklinio kelinys', 'setas'),
(7742, 'Jbbazedovo sukurta svietimo teorija', 'filantropizmas'),
(7743, 'Lietuvos alaus darykla, kurios emblemoje pavaizduoti du oziai', 'gubernija'),
(7744, 'Krikscioniu sventasis, laikomas diakonu ir kencianciu galvos skausma globeju', 'steponas'),
(7745, 'Kokie laikrodziai yra patys tiksliausi', 'atominiai'),
(7746, 'Vienas is cukraus pakaitalu', 'fruktoze'),
(7747, 'Bizantijos valstybes pareigunas', 'logotetas'),
(7748, 'Xv - xvi aitalu daugiabalse pasaulietinio turinio posmine daina', 'frotola'),
(7749, 'Ginkluotas samdinys, lydintis savo seimininka', 'satelitas'),
(7750, 'Xvii alietuvos mokestis, kai paimama 1/4 pelno dalis', 'kvarta'),
(7751, 'Procesas, kai vienas neuronas siuncia daug impulsu i daugeli neuronu', 'divergencija'),
(7752, '\"baranka\" lietuviskai', 'riestainis'),
(7753, 'Tropas; zodzio ar zodziu junginio vartojimas perkeltine reiksme remiantis tikru ar tariamu daikto panasumu', 'metafora'),
(7754, 'Berzo sultys', 'sula'),
(7755, 'Erelis [poetiskai]', 'aras'),
(7756, 'Germanizmas arba....', 'vokietybe'),
(7757, 'Dvieju daliu paveikslas', 'diptikas'),
(7758, 'Noras valgyti', 'apetitas'),
(7759, 'Ginkline, vienas ar keli pastatai, kuriuose gaminti, taisyti ir saugoti ginklai', 'arsenalas'),
(7760, 'Lietuviu rasytojas, romanu \"po vasaros dangum\", \"nesetu rugiu zydejimas\", \"pilnaties valanda\", \"kvietimas\", \"rudens ekvinokcija\", \"piemeneliu misios\", \"teatsiveria tavo akys\", \"zalios supynes\", \"zmogus is tenai??? autorius', 'bubnys'),
(7761, 'Kraujo ar limfos issiliejimas i audinius', 'ekstravazacija'),
(7762, 'Kuriais metais buvo israstas radaras', '1935'),
(7763, 'Hidromechanikos saka, tirianti isoriniu jegu poveiki standaus skyscio tekejimui ir jo mechanine saveika su kietaisiais kunais', 'hidrodinamika'),
(7764, 'Cheminis elementas, kurio simbolis \"dy\" [numeris 66]', 'disprozis'),
(7765, 'Zemas barjeras apsvietimo irangai sienos priekyje', 'trapattoni'),
(7766, 'Gyvsidabrio, kalio drusku ir stiklo milteliu misinys, naudojamas pagrindiniam uztaisui iziebti pentinio iziebimo ginkluose', 'perkuno sidabras'),
(7767, 'Polifoninio stiliaus, religinio turinio giesme', 'motetas'),
(7768, 'Universali programavimo kalba lygiagretiems ir realaus laiko mastelio procesams aprasyti (pagal kurejo dukters varda)', 'ada'),
(7769, 'Nekonkretus tolimos praeities pavadinimas', 'senove'),
(7770, 'Skystas valgis', 'sriuba'),
(7771, 'Gyvenimo nutrukimas', 'mirtis'),
(7772, 'Eleginiu distichu parasytas eilerastis mirusiojo garbei', 'epitafija'),
(7773, 'Troskimas, norejimas', 'noras'),
(7774, 'Koks paukstis yra svapastalo petro bei sv.otilijos atributas', 'gaidys'),
(7775, 'Plokscia kreive, kuria brezia taskas, nejudamai susietas su apskritimu, be slydimo riedanciu pastovia tiese', 'cikloide'),
(7776, 'I daugiausia pasaulio kalbu (321) isverstas dokumentas - 1948 mvisuotine zmogaus teisiu ...', 'deklaracija'),
(7777, 'Koks buvo budos karaliskasis titulas', 'princas'),
(7778, 'Stipruolis, isugdytu raumenu, dideles fizines jegos, tvirtas zmogus', 'atletas'),
(7779, 'Vokietijos miestas, kuriame yra 60 tukstvietu \"muengelsdorf\" futbolo stadionas', 'kelnas'),
(7780, 'Musiu as ta maza ..., o kai ja pagausiu - niekad nedraugausiu', 'muse'),
(7781, 'Tarptautine kriminalines policijos organizacija arba ...', 'interpolas'),
(7782, 'Kaip amerikoje buvo vadinami pirmieji komerciniai kino teatrai, kurie demonstravo dar tik nebyliuosius filmus ir kuriu jau 1907 mbuvo apie 5000', 'nikelodeonai'),
(7783, 'Vaizduojamojo meno ir dizaino kryptis, klestejusi xx a3-iajame ir 4-ajame desimtmetyje; svarbiausia jos paskirtis buvo pritaikyti dizaina prie masines gamybos salygu', 'art deco'),
(7784, 'Kieciausias mineralas', 'deimantas'),
(7785, 'Senoves graikijoje - politine veikejo, lyderio veikla', 'demagogija'),
(7786, 'Trikampe ar pusapvale virsutine pastato fasada (priekio) dalis', 'frontonas'),
(7787, 'Kalbos dalis, kuri reiskia daikto veiksma ar busena ir atsako i klausimus \"ka veikia?\" arba \"kas vyksta, darosi, atsitinka?\"', 'veiksmazodis'),
(7788, 'Skaiciu seka, neturinti baigtines ribos - ...seka', 'diverguojanti'),
(7789, 'Medziaga klijuoti, glaistyti', 'mastika'),
(7790, 'Transporto, pesciuju judejimas', 'eismas'),
(7791, 'Koks jav prezidentas pirmasis apsigyveno baltuosiuose rumuose', 'adamsas'),
(7792, 'Koks zymus baltarusijos ledo ritulio klubas 1947-1948 mturejo \"torpedo\", 1948-1964 vimpel\", 1964-1975 \"spartak\" varda', 'dinamo'),
(7793, 'Organo ar audinio apimties sumazejimas, sunykimas', 'atrofija'),
(7794, 'Izraelio parlamentas', 'knesetas'),
(7795, 'Atstovas, gynejas teisme', 'advokatas'),
(7796, 'Kiek litru sudaro kvorta (x.x)', '0.7'),
(7797, 'Skolos dokumentu pirkimas pries skolos mokejimo termina, atskaitant palukanas uz laika nuo dokumentu pirkimo dienos iki skolos grazinimo', 'diskontas'),
(7798, 'Kaip vadinasi taika, kada valstybes sudaro sutarti su priesinga valstybe be sajungininku zinios arba sutikimo', 'separatine'),
(7799, 'Carineje rusijoje - aristokratines kilmes merginu - rumu damu titulas', 'freilina'),
(7800, 'Romano \"juodasis obeliskas\" autorius', 'remarkas'),
(7801, 'Xviiavidurio religinis socialinis judejimas rusu valstybeje', 'atskala'),
(7802, 'Roko muzikos kryptis, kurioje pasireiskia ankstyvojo roko, jamaikos, disko muzikos elementai', 'new wave'),
(7803, 'Valstybe kurioje susikure firma \"sony\"', 'japonija'),
(7804, 'Zydu tautos proteviu laikomas', 'abraomas'),
(7805, 'Kokiam banke buvo itaisytas pirmasis pasaulyje bankomatas', 'barclays'),
(7806, 'Savojo \"as\" ribu isnykimas, susiliejimas su kitais, persikunijimas', 'egotranscendencija'),
(7807, 'Ilgas plaukas - trumpas ...', 'protas'),
(7808, 'Karas, per kuri krikscioniu kariuomene atkariavo mauru uzimta pirenu pusiasali', 'rekonkista'),
(7809, 'Sventas musulmonu menuo', 'ramadanas'),
(7810, 'Krikscioniu ir musulmonu arkangelas, tramdantis piktasias dvasias, globojantis piligrimus ir kitus keliautojus', 'rapolas'),
(7811, 'Bikinio isradejas [orig.]', 'reard'),
(7812, 'Prekybos tinklas lietuvoje, kurio prekybinis zenklas zaliai geltonas', 'iki'),
(7813, 'Didziosios britanijos sosto ipedinio titulas', 'velso princas'),
(7814, 'Xix aceku kompozitorius', 'dvorzakas'),
(7815, 'Kuri salis pirmoji isvyste reaktyvini naikintuva', 'vokietija'),
(7816, 'Asmenys, naujai prieme kuria nors religija', 'neofitai'),
(7817, 'Skrodimu atlikimo patalpos', 'morgas'),
(7818, 'Es nebranduolines energijos ir racionalaus energijos naudojimo tyrimu bei pletros programa [orig.]', 'joule'),
(7819, 'Visas materialus pasaulis', 'visata'),
(7820, 'Veikimas siekiant kokio nors tikslo', 'akcija'),
(7821, 'Malavio pagrindinis pinigas', 'kvaca'),
(7822, 'Didele, daznai absurdiska klaida', 'liapsusas'),
(7823, 'Daznai nuo netinkamos mitybos ar gyvenimo budo skrandyje atsiveria ...', 'opos'),
(7824, 'Kurio nors reiskinio pasikartojimas po to, kai jis atrode jau pranykes', 'recidyvas'),
(7825, 'Kas buvo jav prezidentas tuo metu, kai buvo prijungtos 49-oji ir 50-oji valstijos (aliaska ir havajai)', 'eizenhaueris'),
(7826, 'Senoves lietuviu dievas, globojes alu ir midu', 'ragutis'),
(7827, 'Dainininke, atliekanti svarbiausius vaidmenis operoje arba opereteje', 'primadona'),
(7828, 'Koki greiti km/h pasiekia strutis', '72'),
(7829, 'Panasi i aviete misko uoga', 'gervuoge'),
(7830, 'Protobulgarijos chanas, pirmasis bulgarijos chanas [liet.]', 'asparuchas'),
(7831, 'Ombudsmenas lietuvoje', 'seimo kontrolierius'),
(7832, 'Metalu gavyba is rudos', 'metalurgija'),
(7833, 'Sutarties (carterio) papildymas, keiciantis ar papildantis sutarties salygas', 'adendumas'),
(7834, 'Siltuju krastu gyvate su tam tikru barskalu uodegos gale', 'barskuole');
INSERT INTO `vikte_klsm` (`id`, `klsm`, `ats`) VALUES
(7835, '1992 mikurta europos bendrijos tarnyba, teikianti pagalba ir parama nukentejusiems nuo stichiniu nelaimiu arba karu [orig.]', 'echo'),
(7836, 'Ministro parasas valstybes vadovo akte, reiskiantis, kad ministras, o ne valstybes galva yra politiskai ir teisiskai atsakingas uz akto turini', 'kontrasignacija'),
(7837, 'Stambiu zmoniu nemegstamas prietaisas', 'svarstykles'),
(7838, 'Audiniu spalvinimas atspaudziant ornamenta, istapant (batika) ar nudazant', 'marginimas'),
(7839, 'Judesiu ar veiksmu darymas nusiziurejus i ka kita', 'megdziojimas'),
(7840, 'Zemes pavirsiuje iskastas atviras, trapecines formos vandentakis, kurio dugnas ir krastai daznai padengiami vandeniui nelaidzia medziaga (gelzbetoniu, betonu, akmenimis ir pan.)', 'kanalas'),
(7841, 'Gydymo ir sveikatos saugojimo mokslas', 'medicina'),
(7842, 'Skraidantis itaisas, kuris ore laikosi veikiamas vejo ar oro sroviu, susidaranciu traukiant ji uz virvutes', 'aitvaras'),
(7843, 'Akiu liga, prastas matymas arba aklumas prieblandoje', 'vistakumas'),
(7844, 'Iskilmingas pareiskimas svarbiais klausimais', 'deklaracija'),
(7845, 'Kada priimtas jav sekretoriaus d.marsalo pasiulytas ekonomines pagalbos planas europai atkurti', '1947'),
(7846, 'Dvielektrodis elektroninis prietaisas, praleidziantis srove tik viena kryptimi', 'diodas'),
(7847, 'Bulimija, rajumas, labai didelis alkio jausmas', 'polifagija'),
(7848, 'Pirmasis nepriklausomos lenkijos prezidentas (1918m.) [liet.]', 'pilsudskis'),
(7849, 'Seniausias islikes pasaulio miestas', 'damaskas'),
(7850, '1453mturku uzgrobtas didelis miestas', 'konstantinopolis'),
(7851, 'Priemimo i krikscioniu religija sakramentas, jo apeigos (apslakstymas svestu vandeniu, vardo suteikimas)', 'krikstas'),
(7852, 'Pirmasis 1722 msamoa salose pabuvojes europietis tyrinetojas olandas jakobas ...', 'rogevenas'),
(7853, 'Specialiai irengta skyle sienoje', 'anga'),
(7854, 'Internet information server', 'iis'),
(7855, 'Rusu dailininkas - ikonistas, kurinio \"trejybe\" autorius', 'rubliovas'),
(7856, 'Kaip vadinamas pirmasis bandymas 1960 maptikti nezemisku civilizaciju siunciamus radijo signalus is dvieju artimu i saule panasiu zvaigzdziu - \"banginio tau\" ir \"eridano epsilon\": ..projektas', 'ozmos'),
(7857, 'Garbinama dievybes statula', 'stabas'),
(7858, 'Kokia yra portland \"trail blazers\" namu arena (angliskai)', 'rose garden'),
(7859, 'Sanitarijos priemones, neleidziancios plisti epidemijai', 'karantinas'),
(7860, 'Toks pats uzsispyres kaip asilas', 'ozys'),
(7861, 'Kokia jura senoves graiku buvo vadinama svetingaja jura', 'juodoji'),
(7862, 'Juokingas pasakojimas', 'anekdotas'),
(7863, 'Kokia yra virsutine cholesterolio kiekio kraujyje riba, kuria rekomenduojama islaikyti', '200'),
(7864, 'Vargonu registras, skleidziantis labai stipru garsa', 'bombarda'),
(7865, 'Priestaraujantis logikai, nelogiskas', 'ilogiskas'),
(7866, 'Trumpas, itaigus posakis, kuriuo vienu ar keliais zodziais netiketai ir taikliai isreiskiama mintis', 'aforizmas'),
(7867, 'Bendrosios laivo avarijos nuostoliu, padarytu kroviniui, laivui ar frachtui, apskaiciavimas, atsizvelgiant i ju verte, ir paskirstymas tarp krovinio ir laivo savininku', 'dispasa'),
(7868, 'Seniausias iki siol islikes pasaulio miestas', 'damaskas'),
(7869, 'Prietaisas juros gyliui matuoti ultragarso bangomis', 'echolotas'),
(7870, 'Asmuo, sunciamas i kita sali su slapta misija', 'emisaras'),
(7871, 'Trasa kurioje zuvo artonas sena', 'imola'),
(7872, 'Kiek truko trumpiausias istorijoje karas, 1896m tarp zinzibaro ir anglijos [min]', '38'),
(7873, 'Europos salis, kurioje legalizuoti narkotikai', 'olandija'),
(7874, 'Chloro junginys su metalais, metaloidais ir organiniais radikalais', 'chloridas'),
(7875, 'Liguistas polinkis issigalvoti, kurti ir pasakoti fantastiskas istorijas, kuriu pagrindinis veikejas buna autorius', 'pseudologija'),
(7876, 'Autonominis regionas kinijos pietvakariuose, kurio administracinis centras yra lasa', 'tibetas'),
(7877, 'Kokia eli makbyl profesija', 'advokate'),
(7878, 'Ldk valdovas, itvirtines didziojo kunigaikscio valdzia, jo vardu pavadinta gediminaiciu dinastija', 'gediminas'),
(7879, 'Sprindzio dydzio ilgio naktinis uodeguotasvarliagyvis, odoje turintis nuodu liauku', 'salamandra'),
(7880, 'Baznycios suolas', 'klauptas'),
(7881, 'Lauztine (z raides pavidalo) linija', 'zigzagas'),
(7882, 'Nerviniu lasteliu presinapsines membranos baltymas, atsakingas uz sinapsiniu pusleliu komplekso formavimasi', 'sintaksinas'),
(7883, 'Kuno judesiu, kuriuos sukelia sirdies veikla, grafinis registravimas', 'balistokardiografija'),
(7884, 'Skirtumas tarp produkto kiekio, kuri pardavejai nori parduoti, o pirkejai gali pirkti uz tam tikra kaina', 'perteklius'),
(7885, 'Bibliografijoje naudojamas terminas literaturai apie latvija, latviu tauta, latviu literatura apibudinti', 'lettica'),
(7886, 'Jav informacijos kodavimo standartassimboliu vaizdavimo kompiuteryje standartas', 'ascii'),
(7887, 'Odos maiselis, pilnas puliu', 'pustule'),
(7888, 'Hidrologines apytakos procesas - pavirsinio arba pozeminio vandens tekejimas drenazo srities link', 'nuotekis'),
(7889, 'Menulio sviesa nakti', 'menesiena'),
(7890, 'Valdzios zenklas', 'insignija'),
(7891, 'Kokie yra patys maziausi augalai zemeje (vienalasciai)', 'zaliadumbliai'),
(7892, 'Keliaujanti cigonu bendruomene', 'taboras'),
(7893, 'Daugelio komandu bei sporto saku varzybos', 'zaidynes'),
(7894, 'Planetos isorines dalies duju apvalkalas', 'atmosfera'),
(7895, 'Pagrindine kardiovaskulines sistemos liga, viena svarbiausiu mirties priezasciu pasaulyje, ypac gerai issivysciusiose salyse', 'ateroskleroze'),
(7896, 'Speciali dvisluoksne juosta, kurios vienas sluoksnis yra is juodo popieriaus, o kitas is permatomos juosteles', 'klemtasas'),
(7897, 'Septintasis metu menuo', 'liepa'),
(7898, 'Koki didziausia greiti yra isvystes zmogus su dviraciu sausumoje savo jegomis (km/h)', '265'),
(7899, 'Religinio etinio judejimo, prasidejusio 18ad.britanijoje, nariai', 'masonai'),
(7900, 'Vandens blusa', 'dafnija'),
(7901, 'Grupe salu, esanciu netoli viena kitos ir sudaranciu tarsi salu jungti', 'archipelagas'),
(7902, 'Prietaisas skyscio garu ellaidziui matuoti', 'konduktometras'),
(7903, 'Graiku miestas - valstybe', 'polis'),
(7904, 'Muzikos instrumentas naudojamas baznycioje', 'vargonai'),
(7905, 'Sniego vengiantys augalai [dgs.]', 'chionofobai'),
(7906, 'Formalus, mechaniskas ivairiu stiliu junginys', 'eklektika'),
(7907, 'Transporto ar kovos masina, galinti plaukti vandeniu air vaziuoti sausuma', 'amfibija'),
(7908, 'Nacionalinis senegalo medis, pavaizduotas ir sios salies herbe', 'baobabas'),
(7909, 'Mokslas apie medziagas, ju savybes, sandara, kitimus, vienu medziagu pavertimo kitomis medziagomis budus.', 'chemija'),
(7910, 'Parase \"kapitono blado odiseja\"', 'sabatinis'),
(7911, 'Kaip dar vadinamas ankstyvasis gelezies amzius', 'halstatas'),
(7912, 'Visu metu dienu sisteminis sarasas, kur suzymeti sekmadieniai, sventes ir svarbus ivykiai', 'kalendorius'),
(7913, 'Auksto rango kataliku dvasininkas', 'pralotas'),
(7914, 'Tekilos grupe, baltos spalvos standartine tekila, autentisko ir stipraus skonio [orig.]', 'silver'),
(7915, 'Koks vabzdys yra sventuju ambraziejaus ir bernardo klerviecio atributas', 'bite'),
(7916, 'Laiko nustatymas', 'datavimas'),
(7917, 'Fiziniu proceduru sistema, didinanti organizmo atsparuma nepalankiu aplinkos veiksniu (dazniausiai salcio) poveikiui', 'grudinimas'),
(7918, 'Senromenu juru ir vandens dievas, atitinkantis graiku poseidona, baltu bangputi', 'neptunas'),
(7919, 'Mechanizmas, kuri varo suslegtas oras', 'pneumatinis'),
(7920, 'Vienas jupiterio palydovu, kurio orbitos spindulys 11.48 mlnkm, orbitinis periodas 250.57 d., skersmuo 186 kmir kuri 1904 atrado cperainas', 'himalija'),
(7921, 'Vario ir nikelio rinkinys', 'kopelis'),
(7922, 'Kokiais skaiciais prasideda latvijos bruksninis prekinis kodas', '475'),
(7923, 'Saldainiu rinkinys', 'asorti'),
(7924, 'Skandiviskas kreipimasis i mergina', 'freken'),
(7925, 'Sasiauris, skiriantis europa nuo afirkos', 'gibraltaro'),
(7926, 'Dydis, nusakantis, kaip greitai juda koks nors kunas', 'greitis'),
(7927, 'Kokia firma pirmoji visuose savo automobiliuose pradejo irengineti saugos dirzus', 'volvo'),
(7928, 'Kooperatines bendrijos nario mokestis', 'pajus'),
(7929, 'Keleivio daiktai, krovinys', 'bagazas'),
(7930, 'Giria, kurioje buvo apsistojes ir tos girios karaliumi tituluojamas tadas blinda', 'byvaine'),
(7931, 'Zynys, kurio susapnuotas gelezinis vilkas leme vilniaus atsiradima', 'lizdeika'),
(7932, 'Penkta savaites diena', 'penktadienis'),
(7933, 'Wnba komanda is vasingtono', 'mystics'),
(7934, 'Menine agitacine brigada', 'agitbrigada'),
(7935, 'Judejimas, kai kuno greitis per vienodus laiko tarpus pakinta nevienodai', 'netolyginis'),
(7936, 'Koridos dalyvis, ierzinantis buliu raudonu audeklu', 'kapeadoras'),
(7937, 'Tapytojas, kurioje freskoje \"sventoji trejybe\" aptinkama pirmoji geometrine perspektyva', 'mazacas'),
(7938, 'Graiku mitologijoje - dzeuso tevas', 'kronas'),
(7939, 'Pats sviesiausias dangaus kunas', 'saule'),
(7940, 'Marcios dovanos', 'dosai'),
(7941, 'Kalbos atsaka', 'tarme'),
(7942, 'Teiginys, sudarytas is keleto teiginiu, sujungtu logine jungtimi \"jei...,tai\"', 'implikacija'),
(7943, 'Vyrvardas, kiles is lotkalbos, reiskia \"nugaletojas\"', 'viktoras'),
(7944, 'Etiopijos maratonininkas, 1960 mafrikai iskovojes pirmaji olimpini aukso medali', 'bikila'),
(7945, 'Istanglijos zemes ploto vienetas, dazniausiai lygus 120 akru', 'haidas'),
(7946, 'Virsutinis drabuzis, paprastai siltas ziemis apsiaustas', 'paltas'),
(7947, 'Viena is sudetiniu koaksialinio kabelio daliu', 'sarvas'),
(7948, 'Uzpakaline kaklo dalis', 'sprandas'),
(7949, 'Pirmoji juodaode aktore laimejusi oskara uz vaidmeni filme \"vejo nubloksti\", 1940 m(orig.)', 'mcdaniel'),
(7950, 'Iskrypes girdejimas', 'parakuzija'),
(7951, 'Artimos arba tos pacios reiksmes kalbos vienetas', 'sinonimas'),
(7952, 'Kai kuriu grybu spora, turinti labai stora apvalkala, isliekanti gyva ir nepalankiu augimo laikotarpiu', 'chlamidospora'),
(7953, 'Stiprus alkoholinis gerimas, sutaisytas su ekstraktais arba aliejais, vartojamas kaip gydomoji priemone', 'balzamas'),
(7954, 'Mokslas, siekiantis nustatyti, aprasyti ir paaiskinti zmonijos manifestacijas', 'antropologija'),
(7955, 'Cheminis elementas, kurio simbolis \"be\" [numeris 4]', 'berilis'),
(7956, 'Vaisiaus odele', 'zieve'),
(7957, '\"ziguliai\" eksportui', 'lada'),
(7958, 'Medziagu apykaita', 'metabolizmas'),
(7959, 'Rezisierius ir aktorius, rezisaves filmus \"bulvarinis skaitalas\", \"dzeke braun\", \"nuo sutemu iki ausros\" [orig.]', 'tarantino'),
(7960, '[lot.] kiek atsimena zmones (ciceronas), t.ynuo neatmenamu laiku', 'post hominum memoriam'),
(7961, 'Zirgo eisenos ar begsenos budas', 'aliuras'),
(7962, 'Istorikas parases pirmaja lietuvos istorija lietuviu kalba', 'daukantas'),
(7963, 'Dekoratyvinis rastas, isryskintas persvieciamomis kiaurymemis', 'azuras'),
(7964, 'Suvokimas, priklausomas nuo ankstesnes zmogaus patirties, bendrojo psichines veiklos turinio ir individualiu savybiu', 'apercepcija'),
(7965, 'Infekciniu ligoniu atskyrimas nuo sveikuju', 'izoliacija'),
(7966, 'Gandriniai pauksciai', 'iniai'),
(7967, 'Pareigybiniu teisiu panaudojimas pasipelnymo tikslais', 'korupcija'),
(7968, '15 vedybinio gyvenimo metu sukaktis: ..vestuves', 'kristolines'),
(7969, 'Mokslinis mitu nagrinejimas, tyrimas ir aiskinimas', 'mitologija'),
(7970, 'Vienas is triju vyriausiuju lietuviu ir prusu dievu, globojes upes, saltinius ir augmenija', 'patrimpas'),
(7971, 'Zemes geologijos istorijos kainozojaus eros ii periodas', 'neogenas'),
(7972, 'Salis, kurioje gaminamas lietuvos kariuomenes sauliu naudojamas automatinis ginklas ak-4', 'svedija'),
(7973, 'Graiku mitologijoje jis olimpo dievams pilste nektara, o dabar tapo jupiterio palydovu', 'ganimedas'),
(7974, 'Kiek versiju turi graikijos nacionalinis himnas', '158'),
(7975, 'Xix ajav rasytoja, romano \"mazosios moterys\" autore [orig.]', 'alcott'),
(7976, 'Miestas kuriame buvo isteigta fiba', 'zeneva'),
(7977, 'Kaip vadinamas popieziaus muvimas ziedas, kuriame isgraviruotas apastalas petras, is valties uzmetantis tinkla', 'zvejo'),
(7978, 'Knygu \"tureti ir netureti\", \"atsisveikinimas su ginklais\" autorius', 'hemingvejus'),
(7979, 'Po upes kairysis intakas', 'ama'),
(7980, 'Geras antonimas', 'blogas'),
(7981, 'Xv-xvi aolandu mokslininkas ir rasytojas, knygos \"pagiriamasis zodis kvailybei\" autorius: ..roterdamietis', 'erazmas'),
(7982, 'Musulmonu dvasininkas', 'mula'),
(7983, 'Karas, kuriame dalyvauja visos svarbiausios didziosios pasaulio valstybes', 'pasaulinis'),
(7984, 'Gyvunas ar augalas, gautas sukryzminus nevienodo paveldimumo organizmus, misrunas', 'hibridas'),
(7985, 'Kataliku religines pratybos, kuriomis siekiama sustiprinti ju dalyviu religinguma', 'rekolekcijos'),
(7986, 'Musulmonu tikybos ispazinimas', 'sahada'),
(7987, 'Lietuvos didysis kunigaikstis, kuriam valdant buvo pradeta valaku reforma', 'zygimantas augustas'),
(7988, 'Gyvulio peciu issikisimas tarp menciu', 'gogas'),
(7989, 'Vietove, rajonas, miesto dalis, pritaikyta tik automobiliams ir ju vairuotojams, neatsizvelgiant i visu kitu transporto priemoniu poreikius ir visiskai nepaisant pesciuju interesu ir saugumo', 'autopija'),
(7990, 'Metai, kada prasideda protestantizmas', '1517'),
(7991, 'Automobiliu gamintojas isleides siuos modelius: tigra, frontera, calibra', 'opel'),
(7992, 'Pirmasis jurininkas europietis, kuris isvydo autralijos krantus [liet.]', 'jansonas'),
(7993, 'Lyrine daina, viduramziais buvo dainuojama po mylimosios langais', 'serenada'),
(7994, 'Koks zveris yra svjeronimo atributas', 'liutas'),
(7995, 'Mokslas, tiriantis isalusias uolienas ir dirvozemi', 'isalotyra'),
(7996, 'Greiti akiu judesiai, budingi vienai is miego faziu', 'rem'),
(7997, 'Daininkas, sudainaves \"3000000\"', 'mikutavicius'),
(7998, 'Italu kompozitorius, operu \"liucija di lamermur\", \"meiles gerimas\", 16 simfoniju, kantatu autorius', 'donicetis'),
(7999, 'Portugalijai priklausancios salos, esancios atlanto vandenyne, 1287 km i vakarus nuo pacios salies', 'azoru'),
(8000, 'Valstybe tarp egipto ir alzyro', 'libija'),
(8001, 'Gimusiu 02.20 - 03.20dzodiako zenklas', 'zuvys'),
(8002, 'Kokiame mieste ivyko pirmosios ziemos olimpines zaidynes', 'samoni'),
(8003, 'Vokieciu kreipimasis i istekejusia moteri', 'frau'),
(8004, 'Vietoves planu sudarymas, remiantis is skraidymo aparato padarytomis nuotraukomis', 'aerofotogrametrija'),
(8005, 'Senoves indu religiniai filosofiniai vedu himnu komentarai [dgs.]', 'upanisados'),
(8006, 'Puosni knygos, albumo, pinigines, rankinuko, verinio sasaga', 'fermuaras'),
(8007, 'Automobiliu gamintojas isleides siuos modelius: magentis, juice, carens, shuma', 'kia'),
(8008, 'Graiku mitologijoje - siaures vejo personifikacija', 'borejas'),
(8009, 'Kas parase veikala \"istorijos studijos\"', 'toinbis'),
(8010, 'Jura skirianti naujaja zelandija nuo australijos', 'tasmano'),
(8011, 'Kuriais metais pries kristu ikurtas romos miestas', '753'),
(8012, 'Veimaro vokietijos prezidentas, valdes sali 1925-1934m.', 'hindenburgas'),
(8013, 'Vieta, kurioje yra gamtiniu gydomuju veiksniu, specistaigu bei irenginiu ligoniams gydyti', 'kurortas'),
(8014, 'Vengru kompozitorius, opereciu \"silva\", \"cardaso karaliene\", \"grafaite marica\" ir ktautorius', 'kalmanas'),
(8015, 'Sestas pagal gyventoju skaiciu lietuvos miestas', 'alytus'),
(8016, 'Koks lietuvos miestas iki 1923 mbuvo vienintelis uostas', 'sventoji'),
(8017, 'Zmogus, negalintis gyventi be muzikos', 'melomanas'),
(8018, 'Biologiniu reiskiniu ir ju intensyvumo ritmiska kaita, svyravimai gyvuose organizmuose', 'bioritmai'),
(8019, 'Plesrus kailinis vandens zverelis', 'udra'),
(8020, 'Xx amodernistines dailes kryptis - nedaiktiskoji daile', 'abstrakcionizmas'),
(8021, 'Kauno miesto telefoninis kodas', '37'),
(8022, 'Niekada nesakyk ...', 'niekada'),
(8023, 'Koks imperatorius 380 mkrikscionybe paskelbe oficialia religija', 'teodosijus i'),
(8024, 'Jav prezidentas isrinktas keturis kartus', 'ruzveltas'),
(8025, 'Ezeruose pluduriuojanti sala, sudaryta is atitrukusiu pakrantes durpiu, arba ezero pakrastyje pluduriuojanti durpynu ir kitu augalu danga', 'plova'),
(8026, 'Apsinuodijimas grybais', 'micetizmas'),
(8027, 'Diplomatinis rangas', 'atase'),
(8028, 'Kaip vadinama peles rodyklyte', 'kursorius'),
(8029, 'Kiek chromosomu ir kiek chromatidziu turi zmogaus subrendusi kiausialaste', '23'),
(8030, 'Microsoft excel naudojamas failu pletinys', 'xls'),
(8031, 'Vienas figuros perstumimas zaidziant sachmatais', 'ejimas'),
(8032, 'Romeo mylimoji', 'dziuljeta'),
(8033, 'Krikscioniu sventoji, i kuria kreipiamasi pagalbos sergant akiu ligomis', 'liucija'),
(8034, 'Progresyviosios mokslines, technines, komercines ar kitos zinios, visiskai ar is dalies neskelbtinos, nes ju turejimas laiduoja tam tikra pranasuma', 'know-how'),
(8035, 'Sibirine pusis, kurios aukstis siekia iki 45mjos seklos - skanus ir maistingi riesuteliai', 'kedras'),
(8036, 'Druska kraujavimui sustabdyti', 'alunas'),
(8037, 'Istiklintas balkonas', 'erkeris'),
(8038, 'Koks yra oficialiai uzfiksuotas vistos skridimo rekordas (sec.)', '13'),
(8039, 'Menine priemone, mazybiniai daiktavardziai', 'deminutyvai'),
(8040, 'Kalnu nimfa, dievo hermio motina', 'maja'),
(8041, 'Zemes geologijos istorijos mezozojaus eros ii periodas', 'jura'),
(8042, 'Abipuse vidaus rysio sistema su mikrofonais ir garsiakalbiais (pvz., lektuve, tarp radijo ir televizijos studiju, biuru ir aptarnaujancio personalo)', 'interkomas'),
(8043, 'Stebuklingas kinu augalas', 'zensenis'),
(8044, 'Poeto zigmo gaidamaviciaus slapyvardis', 'gele'),
(8045, 'Kaip dar vadinamas misko zveris barsukas', 'opsrus'),
(8046, 'Jav bendrove, viena didziausiu magistraliniu tinklu irangos gamintoju pasaulyje', 'cisco'),
(8047, 'Kiek vidutiniskai litru alaus per metus tenka vienam zmogui cekijoje', '160'),
(8048, 'Laoso sostine', 'vientianas'),
(8049, 'Didelis karo laivu, lektuvu junginys', 'eskadra'),
(8050, 'Istempta musamuju muzikos instrumentu oda', 'membrana'),
(8051, 'Reciausia pasaulyje liga', 'raupai'),
(8052, 'Vienasmenis japonu kardas lenkta puosnia rankena, samuraju nesiotas medinese lakuotose makstyse', 'katana'),
(8053, 'Irankis litavimui', 'lituoklis'),
(8054, 'Medziagos forma, susidedanti is jonu ir laisvu elektronu', 'plazma'),
(8055, 'Budas, kuriuo stambios organiniu medziagu [pvzbaltimu ir polisacharidu] molekules, maisto daleles, bakterijos patenka i lastele', 'fagocitoze'),
(8056, 'Smarkiai istinusi odos vieta su puliais', 'votis'),
(8057, 'Jemeno sostine', 'sana'),
(8058, 'Simbolinis apskritimo ar daugiakampio formos piesinys, ivairiose religijose reprezentuojantis visata, dievo pasauli', 'mandala'),
(8059, 'Kokiai nhl komandai atstovauja d.zubrus', 'capitals'),
(8060, 'Reljefas, kurio plastinis vaizdas is plokstumos iskiles daugiau kaip per puse savo apimties', 'horeljefas'),
(8061, 'Pirmoji salis, pripazinusi lietuvos nepriklausomybe, paskelbta 1918 metais', 'vokietija'),
(8062, 'Kada ivyko lietuvos krikstas', '1387'),
(8063, 'Dalinis arba visiskas vyriausybes atsistatydinimas, zlugus jos politikai arba iskilus nesutarimams tarp valdanciuju partiju arba tarp ministru', 'krize'),
(8064, 'Kiek virsuniu turi ikosaedras', '12'),
(8065, 'Polifonines muzikos forma, kai imitaciniu kontrapunktiniu budu pletojama viena ar kelios temos vienais balsais', 'fuga'),
(8066, 'Mongolu tautu klajojanciu seimu grupe', 'ailas'),
(8067, 'Valstybes taise savarankiskai tvarkyti savo vidaus ir uzsienio reikalus, nepriklausomybe', 'suverenitetas'),
(8068, 'Tam tikro elgesio, veiksmu, tikslingos veiklos skatinimas, kuri sukelia ivairus motyvai', 'motyvacija'),
(8069, 'Koks lietuvos gyvunas seriasi daugiausia kartu per metus?(3 kartus)', 'kurmis'),
(8070, 'Vengrijos piniginis vienetas 1925 - 1946 m.', 'penge'),
(8071, 'Cheminis elementas, kurio pavadinimas kilo is ispanu kalbos zodzio \"sidabras\"', 'platina'),
(8072, 'Pirmyksteje bendruomeneje gyvaves principas: kaltininkui turi buti padaryta tokia pat zala, kokia jis padare nukentejusiam', 'talionas'),
(8073, 'Emocinis palenvinimas, emocine iskrova', 'katarsis'),
(8074, 'Sunu akiu liga, paplitusi tarp amerikieciu kokerspanieliu ir bigiu', 'glaukoma'),
(8075, 'Klampi ugnikalnio mase', 'lava'),
(8076, 'Vienintele siu dienu neapibrezto statuso teritorija: vakaru ...', 'sahara'),
(8077, 'Kaukoles arba kaulo ertmes atverimo operacija', 'trepanacija'),
(8078, 'Ka reiskia sos (angliskai)', 'save our souls'),
(8079, '\"jura\" sukure ne tik ciurlionis\"jura\", svarbiausia ir didziausia savo orkestrini kurini 1905 mparase ir ..[orig.]', 'debussy'),
(8080, 'Itaisas vagonams sukabinti', 'autosankaba'),
(8081, 'Korespondentine saskaita, banko atidaroma korespondento pavedimu ismokamoms arba gaunamoms sumoms irasyti', 'loro konto'),
(8082, 'Nuotrauka, kurioje uzfiksuotas tiriamojo paciento kuno dalies, apsviestos rentgeno spinduliais vaizdas', 'rentgenograma'),
(8083, 'Biblinis personazas, nojaus sunus, pasisaipes is savo tevo nuogumo ir todel dievo prakeiktas', 'chamas'),
(8084, 'Didziausias apatinis aibes rezis', 'infimumas'),
(8085, 'Aviu vilnu riebalai', 'lanolinas'),
(8086, 'Vienos rusies muzikos atlikeju grupe', 'banda'),
(8087, 'Arkine nisa mecetes maldu sienoje, nukreiptoje i mekos puse', 'mihrabas'),
(8088, 'Akcentas kitaip', 'kirtis'),
(8089, 'Visatos pirmine stadija, prasidejusi singuliarumo taske pries 13-15 mlrdm.', 'didysis sprogimas'),
(8090, 'Naujosios zelandijos keliautojas ir alpinistas1953mdrauge su n.tensingu pirmieji uzkope i dzomalungos virsune [liet.]', 'hilaris'),
(8091, 'Baigiamosios nuotolio dalies iveikimas, dazniausiai isigreitejus; finiso pasiekimas', 'finisavimas'),
(8092, 'Kalamas smaigas su galvute', 'vinis'),
(8093, 'Senoves graiku mitu daugiaakis milzinas', 'argas'),
(8094, 'Italu kunigaikstis, 1907mautomobiliu itala laimejes pirmaji automobiliu maratona pekinas - paryzius (orig.)', 'borghese'),
(8095, 'Musulmonu maldos namai', 'mecete'),
(8096, 'Samoningas tam tikru pareigu neatlikimas arba tycinis blogas ju atlikimas', 'sabotazas'),
(8097, 'Istorine baltu zeme apemusi nemuno vidurupio baseina', 'dainava'),
(8098, 'Kokie pauksciai toliausiai mato', 'grifai'),
(8099, 'Kas atrado amerika', 'kolumbas'),
(8100, 'Jav naudojamas turiu vienetas, atitinkantis 0.4732 litro', 'pinta'),
(8101, 'Tam tikro pobudzio sportine veikla, labiausiai atitinkanti sportininko fizinius duomenis ir gebejimus', 'amplua'),
(8102, 'Populiariausia indiska pavarde', 'kumar'),
(8103, 'Sergantis dauno liga', 'daunas'),
(8104, 'Rusu filmas \"tarnybinis ...\"', 'romanas'),
(8105, 'Stambiausia motociklus gaminanti kompanija', 'honda'),
(8106, 'Kompanija, pagaminusi mobiliu telefonu modelius: mx-6899, mx-6877, mx-6879, mx-6869', 'maxon'),
(8107, 'Sakinio gramatini centra sudaro veiksnys ir ...', 'tarinys'),
(8108, 'Vysniu ar slyvu sakai', 'lipai'),
(8109, 'Zemes pakrastys prie upes, juros, ezero', 'krantas'),
(8110, 'Ketvirtoji materijos busena', 'plazma'),
(8111, 'Judaizmo srove, atsiradusi xviii arytu europoje; akcentuoja laisva, nesukaustyta zmogaus rysi su dievu', 'chasidizmas'),
(8112, 'Populiariausio lietuvos dienrascio internetinis adresas (be http://)', 'www.lrytas.lt'),
(8113, 'Nauja zinia', 'naujiena'),
(8114, 'Kurios nors srities visiskas neismanelis, nemoksa', 'profanas'),
(8115, 'Sukilimo, maisto numalsinimas baudziamosiomis priemonemis', 'pasifikacija'),
(8116, 'Greiciausiai saudantis kulkosvaidis.', 'vulcan'),
(8117, 'Periodinio leidinio vieta, kurioje nuolatos, pastoviai spausdinama tos pacios rusies informacija', 'rubrika'),
(8118, 'Albanijos smulkus pinigas', 'kintaras'),
(8119, 'Andaluzijos autonomines srities ispanijoje sostine', 'sevilija'),
(8120, 'Judancio svytincio tasko fotografine nuotrauka', 'ciklograma'),
(8121, 'Kaip japoniskai \"2\"', 'nikio'),
(8122, 'Pneumatinis itaisas, birioms smulkioms medziagoms horizontaliai gabenti', 'aerolatakas'),
(8123, 'Tropas: visumos reiskimas dalimi arba dalies visuma', 'sinekdocha'),
(8124, 'Liga: sutrikes, sustiprejes kvepavimas', 'dispneja'),
(8125, 'Valstybe, kurios domeno vardas yra \".ly\"', 'libija'),
(8126, 'Astronominis reiskinys - vieno kosminio kuno, pvz., zvaigzdes, pasislepimas uz saules sistemos kuno (menulio, planetos, palydovo)', 'okultacija'),
(8127, 'Lietuvos 0.5 litro alaus bokalo isgerimo rekordas (sek: x.x)', '1.8'),
(8128, 'Periodinis galvos skaudejimas', 'migrena'),
(8129, 'Valdzios toleruojami arba ir organizuojami smurto ispuoliai pries zydus, kartu ir ju turto grobimas', 'pogromas'),
(8130, 'Trilype sajunga pries pirmaji pasaulini kara sudare vokietija, austrija-vengrija ir ...', 'italija'),
(8131, 'Xvii-xviii ajezuitu ataskaitose minimi lietuviu \"namu dievai\"', 'pagirniai'),
(8132, 'Pirmasis lietuvos prezidentas', 'smetona'),
(8133, 'Susivienijimas, sajunga', 'unija'),
(8134, 'Isilgine kulto pastato vidaus erdves dalis, dazniausiai tarp presbiterijos ir priebaznycio (bobinciaus)', 'nava'),
(8135, 'Troleibusas lietuviskiau', 'laidabraukis'),
(8136, 'Tarptautine ozono sluoksnio apsaugos diena', 'rugsejo 16'),
(8137, 'Lietuvos upe, tekanti i abu galus', 'katra'),
(8138, 'Izymus amerrasytojas, kuris turejo 5 zmonas ir labai mego korida', 'hemingvejus'),
(8139, 'Burines ledroges, platforma su 3 pavazomis ir bure ant judamo stiebo', 'bujeris'),
(8140, 'Tankiausia gyvenama pasaulio valstybe', 'monakas'),
(8141, 'Gambijos sostine', 'bandzulis'),
(8142, 'Kriterijus, pagal kuri apsprendziamas kiekvienai rusiai budingas chromosomu rinkinys, tikslus ju skaicius, matmenys ir forma', 'genetinis'),
(8143, 'Juvelyrinio dirbinio itvaras, laikantis ir saugantis trapiasias dirbinio dalis', 'apsodas'),
(8144, 'Kokia salis 1999 mlaimejo eurovizijos dainu konkursa', 'svedija'),
(8145, 'Rasytojas, romano \"daktaras zivaga\", poemu \"devyni simtai penktieji metai\", \"leitenantas smidtas\", poezijos rinkiniu \"virsum barjeru\", \"antrasis gimimas\", \"zemes erdve\" autorius (liet.)', 'pasternakas'),
(8146, 'Partizanu karo veiksmai ispanijoje ir lotynu amerikoje', 'gerilja'),
(8147, 'Didelis ekranas, sudarytas is daugybes mazu ekranu, kuriu kiekvienas rodo padidinto televizijos vaizdo gabaliuka', 'telebimas'),
(8148, 'I voleli susukta marinuota silkes file su prieskoniais', 'rolmopsas'),
(8149, 'Mobilaus telefono salis gamintoja, jei du jo pirmieji imei kodo skaiciai, zymintys valstybe, kurioje jis pagamintas, yra 44', 'vokietija'),
(8150, 'Musamasis muzikos instrumenatas, gongo atmaina', 'tamtamas'),
(8151, 'Regos sutrikimas, kai vienas daiktas tinklaineje duoda kelis vaizdus', 'poliopija'),
(8152, 'Medicinoje - audiniu suardymas elektros kibirkstimis', 'fulguracija'),
(8153, 'Monetos puse su skaiciumi', 'aversas'),
(8154, 'Vyrvardas, kiles is lotkalbos, reiskia \"ilgi plaukai\"', 'cezaris'),
(8155, 'Modernizmo atstovas, romanu \"prarasto laiko beieskant\", \"jaunu zydinciu merginu seselyje\" autorius', 'prustas'),
(8156, 'Kuriais metais atidarytas pirmasis pasaulyje kino teatras', '1896'),
(8157, 'Male and ____', 'female'),
(8158, 'Adrenalinas kitaip', 'epinefrinas'),
(8159, 'Prancuzu fizikas, atrades urano radioaktyviaja spinduliuote', 'bekerelis'),
(8160, 'Prancuzijos karalius, kurio didziausias pomegis buvo spynos', 'liudvikas xvi'),
(8161, 'Herbu mokslas; herbu menas', 'heraldika'),
(8162, 'Taisykles, kurios nustato akcines bendroves veikla ir kuriomis vadovaujasi bendroves vadovai', 'istatai'),
(8163, 'Anglies ir vandenilio junginys, tarp kurio atomu yra viengubos kovalentines jungtys', 'alkanas'),
(8164, 'Pasirinktas gerai matomas vietoves daiktas, pagal kuri galima orientuotis, nurodyti ko nors buvimo vieta, krypti ir padeti', 'orientyras'),
(8165, 'Kas parase \"romos istorija\"', 'niburas'),
(8166, 'Valstybe, atsiradusi 1971 mrytinei pakistano daliai politiskai atsiskyrus nuo vakarines', 'bangladesas'),
(8167, 'Ragenos lauziamoji geba (dpt)', '43'),
(8168, 'Metalinis apsauginis galvos apdangalas, zinomas nuos zalvario amziaus', 'salmas'),
(8169, 'Dvieju korpusu laivas', 'katamaranas'),
(8170, 'Zymaus lietuvos vienuolio tevo stanislovo tikroji pavarde', 'dobrovolskis'),
(8171, 'Zemaiciu linu apdirbimo dievas', 'alabatis'),
(8172, 'Tibetiskasis budaizmas, susiformaves tibete', 'lamaizmas'),
(8173, 'Mokslas apie ausis, nosi, gerklas ir ju ligas', 'otorinolaringologija'),
(8174, 'Kuriais metais japonijos sostine tapo kijotas', '794'),
(8175, 'Teritorija su reikiamais sporto irenginiais, iranga kurios nors vienos ar keliu sporto saku pratyboms ir varzyboms, sportininku poilsiui ir atgaivai', 'baze'),
(8176, 'Malaizijos pagrindinis pinigas', 'ringitas'),
(8177, 'Vasaros lietingas sezonas indijoje', 'harifas'),
(8178, 'Raudonos spalvos neskyrimas', 'protanopija'),
(8179, 'Lotyniskas posakis isreiksdaves romos zmoniu pasididziavima kad jiems priklauso visa vidurzemio jura', 'mare nostrum'),
(8180, 'Taikiklis su ispjova (plysiu)', 'vizyras'),
(8181, 'Juru laivo, burlaivio igulos narys', 'jureivis'),
(8182, 'Zmogus, gimes is baltojo zmogaus ir negro sajungos', 'mulatas'),
(8183, 'Medi kalantis margas paukstis', 'genys'),
(8184, 'Didziausias kanados miestas', 'monrealis'),
(8185, 'Azijos pieciausias taskas', 'piai'),
(8186, 'Salis, didziausias pasaulio gelynas', 'olandija'),
(8187, 'Kada egiptas tapo arabu lygos nariu', '1945'),
(8188, 'Tusciaviduris statines pavidalo irenginys nuskendusiems laivams ir kitiems daiktams iskelti', 'pontonas'),
(8189, 'Kas parase veikala \"liuteris\"', 'fevras'),
(8190, 'Alkoholinis gerimas, gaminamas is cukranendriu, turintis priemaisu ir brandinamas azuolinese statinese', 'romas'),
(8191, 'Sportininko, trenerio, komandos pasalinimas is rungtyniu arba varzybu uz taisykliu pazeidima', 'diskvalifikacija'),
(8192, 'Solidaus vyriskio rukymo itaisas', 'pypke'),
(8193, 'Garu, duju, purskiamu skysciu ikvepimas gydymo tikslams', 'inhaliacija'),
(8194, 'Grenados sostine', 'sent dzordzas'),
(8195, 'Kietojo kuno sukimasis aplink asi arba taska', 'ciastuska'),
(8196, 'Kenksmingiausias saldiklis, kurio saldumas 30 kartu didesnis uz cukraus salduma', 'ciklamatas'),
(8197, 'Ypatingai isskirtine asmens savybe, kuria grindziama jo teise valdyti kitus zmones, valstybe', 'charizma'),
(8198, 'Issifruokite os (lietuviskai)', 'operacine sistema'),
(8199, 'Musulmonu mokslininkai, teologai ir teisininkai', 'ulemai'),
(8200, 'Revoliucioniere ..cetkin', 'klara'),
(8201, 'Lietuviu mitdeive - pavasario gamtos gaivintoja, augalijos zadintoja, santuoku, gimimo globeja, lelos motina', 'lada'),
(8202, 'Uolienoje esancios apskritos akutes arba netaisyklingu formu didesnes negu 1 mm ertmes, susidarancios istirpus kai kuriems mineralams ar kitoms medziagoms, issiskyrus dujoms (pvz., stingstant lavai)', 'kaverna'),
(8203, 'Upe tekanti per paryziu', 'sena'),
(8204, 'Apskrita sieno kruva', 'kupeta'),
(8205, 'Kompozitorius, kurio 9-osios simfonijos adaptuota istrauka tapo europos sajungos himnu', 'bethovenas'),
(8206, 'Keliu eismo taisykles sutrumpintai', 'ket'),
(8207, 'Italu fasistine slaptoji policija, kuria 1927 misteige abocinis', 'ovra'),
(8208, 'Plauciu uzdegimas', 'pneumonija'),
(8209, 'Graiku dievo dzeuso mylimoji, kuria jo zmona hera is pykcio paverte telycia', 'ijo'),
(8210, 'Vieta, kur senoves graikijoje vykdavo olimpiados', 'stadionas'),
(8211, 'Islandijos piniginis vienetas', 'krona'),
(8212, 'Kada ikurta nobelio apdovanojimu organizacija', '1900'),
(8213, 'Tapybos, grafikos, skulpturos, literaturos ar kito meno priemonemis sukurtas meninis vaizdas', 'paveikslas'),
(8214, 'Lietuviu dailininkas, placiai zinomos figurines kompozicijos lietuvos banko rumu kaune fasadui papuosti autorius', 'sklerius'),
(8215, 'Daugiausia abonentu turintis lietuvos mobiliojo rysio operatorius', 'omnitel'),
(8216, 'Hinduizmo religijoje - kelias, kuriuo eina paprasti mirusieji i pomirtini pasauli', 'pitrajana'),
(8217, 'Apibudinimas, glaustai nusakantis savoku turini', 'apibrezimas'),
(8218, 'Kompozitorius, visuomenes veikejas, pirmosios lietuviskos operos \"birute\", 20 opereciu, instrumentiniu pjesiu, dainu autorius', 'petrauskas'),
(8219, 'Variaciju formos instrumentine pjese su tolydziai pasikartojancia boso melodija', 'pasakalija'),
(8220, 'Kokiuose analuose [kronikiniai kuriniai] pirma karta (1009 m.) paminetas lietuvos vardas', 'kvedlinburgo'),
(8221, 'Lietuviu rasytojas, \"dainavos salies senu zmoniu padavimai\", apysaku \"raganius\", \"miglose\", \"dangaus ir zemes sunus\", dramu \"sarunas\", \"skirgaila\", \"mindaugo mirtis\" autorius', 'kreve'),
(8222, 'Proceso salis, pareiskianti atsakovui ieskinini reikalavima teisme ar kitame kompetetingame organe savo pazeistai ar gincijamai teisei arba istatymo saugomam interesui apginti', 'ieskovas'),
(8223, 'Kokia grupe su daina \"waterloo\" 1974 muzeme pirmaja vieta eurovizijos dainu konkurse', 'abba'),
(8224, 'Diabetas, kai ligoniams budinga labai didele, simta kartu didesne uz norma gelezies koncentracija kraujyje', 'bronzinis'),
(8225, 'Koks yra koraliniu rifu dauginimosi budas', 'pumpuravimosi'),
(8226, 'Nobelio fizikos premijos laureatas 1903m., apdovanotas uz spontaninio radioaktyvumo atradima', 'bekerelis'),
(8227, 'Auksciausia lietuvoje esanti kopa', 'senoji smukle'),
(8228, 'Subjektas, prekes atiduodantis uz pinigus', 'pardavejas'),
(8229, 'Pastate eifelio boksta', 'eifelis'),
(8230, 'Prancuzas, isteiges pirmaji anglijos parlamenta 1195 m(orig.)', 'montfort'),
(8231, 'Darbuotojo siuntimas atlikti tarnybiniu pareigu ne darbo vietoje', 'komandiruote'),
(8232, 'Ledynas indijoje, himalaju vakaruose, zaskaro kalnagubrio slaite', 'gangotris'),
(8233, 'Kolektyvinis prasymas', 'peticija'),
(8234, 'Zmoniu patyrimas, isorinio pasaulio suvokimo jutimo organais', 'empirija'),
(8235, 'Antras pagal dydi anglijos miestas', 'birmingemas'),
(8236, 'Sengraiku pilnametystes (18m.) sulaukes jaunuolis', 'efebas'),
(8237, 'Jauna mergina, dirbanti paryziaus madu salone arba siuvykloje', 'midinete'),
(8238, 'Specialus valstybinio valdymo organas, vykdantis nustatytu taisykliu ir normu tam tikroje visuomeniniu santykiu sferoje kontrole ir prieziura', 'inspekcija'),
(8239, 'Receptoriai, reaguojantys i jegos pokycius', 'goldzio'),
(8240, '5-as didziausias lietuvos ezeras [vard.]', 'aviliai'),
(8241, 'Koks menuo japonu menulio kalendoriuje buvo vadinamas simotsuki - baltojo serksno menesiu', 'lapkritis'),
(8242, 'Eurazijos tiurku ir mongolu tautose - ispirka uz nuotaka', 'kalymas'),
(8243, 'Medziaga, praleidzianti elektros srove', 'laidininkas'),
(8244, 'Vandeniu prisotintos uolienos savybe leisti laisvai isteketi gravitaciniam vandeniui is jos poru ir plysiu, kurios dydi isreiskia vandengrazos koeficientas', 'talpumas'),
(8245, 'Kokiu skaiciumi prasideda prancuzijos bruksninis prekinis kodas', '5'),
(8246, 'Dzibucio sostine', 'dzibutis'),
(8247, 'Saunamojo lanko virvele', 'temple'),
(8248, 'Tiurku etnine grupe lietuvoje', 'karaimai'),
(8249, 'Didelis (daznai perdetas) mandagumas, pagarbumas, galantiskumas', 'kurtuazija'),
(8250, 'Miestas, kuriame gime krepsininkas michael jordan [liet.]', 'niujorkas'),
(8251, 'Didziausias studentiskas festivalis kaune', 'rafes'),
(8252, 'Lietuvos rasytojas, kuriam vilniuje pastatytas paminklas, \"cukriniu avineliu\" autorius', 'cvirka'),
(8253, 'Vieno laidininko kruvio ir to laidininko bei gretimojo potencialu skirtumo santykis', 'elektrine talpa'),
(8254, 'Judejimo pradzia varzybose', 'startas'),
(8255, 'Deives atenes krutinsarvis su gyvaciu juosiama gorgones meduzos galva', 'aigida'),
(8256, 'Salis, 2004meuropos futbolo cempionato rengeja', 'portugalija'),
(8257, 'Prancuzu mergaite, kuriai lurde apsireiske mergele marija', 'bernadeta'),
(8258, 'Keliavimas pramogos ar pazinimo tikslu', 'turizmas'),
(8259, 'Skandinavu mitologijoje - vaisingumo, vejo ir juros dievas, priklauses dievu vanu grupei', 'njordas'),
(8260, '5 pagal plota pasaulio valstybe', 'brazilija'),
(8261, 'Zemes dirbejas', 'artojas'),
(8262, 'Lietuviskai klaviatura', 'maigykle'),
(8263, 'Treciasis metu menuo', 'kovas'),
(8264, 'Kiek coliu sudaro peda', '12'),
(8265, 'Auksciausias, iskiliausias pilies bokstas', 'donzonas'),
(8266, 'Mokslo, literaturos, meno kurinio, atradimo, isradimo autorystes pasisavinimas', 'plagiatas'),
(8267, 'Priverstinis asmens turto paemimas valstybinio organo nutarimu', 'rekvizicija'),
(8268, 'Politinis sastingis', 'stagnacija'),
(8269, 'Lietuvis futbolininkas pasizymejes (imuses po ivarti) isimintinose rungtynese 2003 msu vokieciais ir skotais', 'razanauskas'),
(8270, 'Vyriskasis lytinis hormonas, kuris gaminasi seklidese', 'androsteronas'),
(8271, 'Salis, kurios valiutos sutrumpinimas usd', 'jav'),
(8272, 'Plauciu terminaliniu bronchioliu issipletimas ir alveoliu pertvaru destrukcija', 'emfizema'),
(8273, 'Motvardas, kiles is lotkalbos, reiskia \"kilmingoji\"', 'patricija'),
(8274, 'Dazniausiai randama vulkanine uoliena, smulkiagrude, juodos arba tamsiai pilkos spalvos', 'bazaltas'),
(8275, 'Uzlieta ledu vieta ciuozti', 'ciuozykla'),
(8276, 'Kaip vadinamas didziausias gintaro gabalas [3698 g.]', 'saules akmuo'),
(8277, 'Pilvapleves uzdegimas', 'peritonitas'),
(8278, 'Auka sudeginant, visiskas sunaikinimas', 'holokaustas'),
(8279, 'Vandens izgrauztas reljefo pazemejimas, turintis vagos forma, stacius slaitus', 'griova'),
(8280, 'Dievo vardas judaizme', 'jahve'),
(8281, 'Australijos, dbritanijos, nzelandijos darbininku partijos nariai', 'leiboristai'),
(8282, 'Kuriais metais kaune pirklys i.bvolfas pastate garini alaus bei salyklo fabrika, siuo metu zinoma \"ragucio\" vardu', '1853'),
(8283, 'Daiktu meninis konstravimas, ju estetines isvaizdos kurimas', 'dizainas'),
(8284, 'Vandens augalas, vartojamas kepant namine duona', 'ajeras'),
(8285, 'Centrines amerikos valstybe, kurios sostine managva', 'nikaragva'),
(8286, 'Siaures korejos pagrindinis pinigas', 'vonas'),
(8287, 'Pabuklas, saudantis isgaubta trajektorija', 'haubica'),
(8288, 'Rasto zenklas', 'raide'),
(8289, 'Ketvirtasis asmuo tapes lietuvos prezidentu', 'brazauskas'),
(8290, 'Auksine moneta, pradeta kalti 1489 manglijoje', 'soverenas'),
(8291, 'Reziamasis irankis', 'reztukas'),
(8292, 'Nalsios kunigaikstis, 1263 metais nuzudes lietuvos karaliu mindauga bei jo sunus rukli ir rupeiki', 'daumantas'),
(8293, 'Chemoterapijos pradininkas', 'erlichas'),
(8294, 'Istorine disciplina, tirianti giminiu ir ju kilmes istorija', 'genealogija'),
(8295, 'Dailes saka; degti dirbiniai is molio arba kitu mineraliniu medziagu', 'keramika'),
(8296, 'Didziausias sveicarijos miestas', 'ciurichas'),
(8297, 'Pagamintas namuose', 'naminis'),
(8298, 'Istrizai apatiniu galu prie laivo stiebo pritvirtintas skersinis signaliniam zibintui, veliavai laikyti', 'gafelis'),
(8299, 'Salis, kurioje isikurusi imone \"philips\" [pagrindine bustine]', 'olandija'),
(8300, 'Taskas kuriame viena linija pereina i kita', 'jungimosi taskas'),
(8301, 'Sportiniu zaidimu technikos veiksmas - pasisukimas apie vertikaliaja asi 180??? kampu stovint ant atramines kojos', 'varpste'),
(8302, 'Lietuviu rasytojas, romanu \"uzuoveja\", \"miskais ateina ruduo\" autorius', 'katiliskis'),
(8303, 'Fermentu sudedamoji dalis, lemianti ju aktyvuma', 'kofermentai'),
(8304, 'Lengvas musulmonu veido (arba viso kuno) apdangalas, su plysiu akims; devimas viesose vietose', 'cadra'),
(8305, 'Gamtine tekme', 'upe'),
(8306, '3 rubliu auksine moneta rusijoje', 'cervonsas'),
(8307, 'Desnis, pagal kuri sukimba vienoje chromosomoje esantys genai', 'morgano'),
(8308, 'Teiginys, pagal kuri upes, tekancios dienovidziu kryptimi, turi vagos tendencija pasistumeti siaures pusrutulyje i desine, o pietu pusrutulyje - i kaire', 'bero desnis'),
(8309, 'Operacines sistemos linux simbolis', 'pingvinas'),
(8310, 'Vokieciu tapytojas, \"zidinio angelas\", \"nuotakos redymas\", \"imperatorius ubas\" autorius', 'ernstas'),
(8311, 'Ilgiausia upe esanti rusijoje?', 'volga'),
(8312, 'Senoves romos uzkariauta ir paskirto vietininko valdoma teritorija', 'provincija'),
(8313, 'Istorine sritis ukrainoje, zemiau dnepro slenksciu', 'zaporoze'),
(8314, 'Kaip vadinami labai vertingi leidiniai ar kiti daiktai, laikomi bibliotekose atskirais rinkiniais, ypac saugomi, kartais eksponuojami kaip muziejines vertybes [vns.]', 'cimelija'),
(8315, 'Indu religine dogma', 'karma'),
(8316, 'Priverstinis ir nemokamas valstiecio baudziaunininko darbas savo inventoriumi dvare', 'lazas'),
(8317, 'Kokia zemiausia temperatura, uzfiksuota zemes pavirsiuje (antarktidoje) (xx.x)', '89.2'),
(8318, 'Gitaros korpuso dalis', 'deka'),
(8319, 'Argentinietis, vienintelis formules-1 pilotas, 5 kartus pasaulio cempionas (org.)', 'fangio'),
(8320, 'Senoves graiku mitologijoje - tirinto karaliaus amfitriono zmona, heraklio motina', 'alkmene'),
(8321, 'Dvidesimt septintasis jav prezidentas', 'taftas'),
(8322, 'Spaudoje kiles gincas kokiais nors klausimais', 'polemika'),
(8323, 'Skatinamoji priezastis, akstinas', 'stimulas'),
(8324, 'Gaidziu \"karuna\"', 'skiautere'),
(8325, 'Is leto teka', 'srovena'),
(8326, 'Radiologines diagnostikos metodas, uz kurio isradima gnhaunsfildas ir amkormakas 1979 m\r\n', ''),
(8327, 'Isimtine salyga', 'islyga'),
(8328, 'Koki didziausia greiti, begdamas trumpus atstumus gali pasiekti gepardas', '105'),
(8329, 'Epigrama, sudaryta is kuo ilgesniu daugiaskiemeniu zodziu', 'makrologas'),
(8330, 'Karinis vermachto junginys, veikes siaures afrikoje per ii pasaulini kara, nuo 1941 iki 1943 mgeguzes', 'afrikos korpusas'),
(8331, 'Kaip sovietiniais laikais buvo vadinama kirgizijos sostine biskekas', 'frunze'),
(8332, 'Vienintelis atbulai galintis skristi paukstis', 'kolibris'),
(8333, 'Institucija, kurioje koncentruojamas ir saugomas akciniu bendroviu kapitalas', 'depozitoriumas'),
(8334, 'Zmogaus ar organizmo prisitaikymas prie kintanciu gyvenimo salygu, aplinkos', 'adaptacija'),
(8335, 'Lietuvos didysis kunigaikstis, jauniausias gedimino sunus', 'jaunutis'),
(8336, 'Miestas, kuriame 1717 mvyko \"nebylusis\" seimas', 'gardinas'),
(8337, 'Isdirbtas kailis', 'oda'),
(8338, 'Popieziaus leono xiii-ojo pavarde', 'pecis'),
(8339, 'Nevalingas raumenu trukciojimas', 'tikas'),
(8340, 'Jojimas per kliutis', 'konkuras'),
(8341, 'I kilpute ar skylute neriamas skrituliukas drabuziams susegti', 'saga'),
(8342, 'Vyro ar moters lyties organu chirurgines operacijos, atliekamos ritualiniais ar medicininiais tikslais', 'apipjaustymas'),
(8343, 'Zmogus, isrades pirma praktiska fotografavimo buda [liet.]', 'dageras'),
(8344, 'Populiariausias ir didziausias turkijos kurortas salies pietuose', 'antalija'),
(8345, 'Azijos, afrikos ir lotynu amerikos pagrindiniu naftos gavybos saliu susivienijimas', 'opec'),
(8346, 'Ketverios vestuves ir vienerios ...', 'laidotuves'),
(8347, 'Kokia imperija xix amziuje buvo vadinama europos ligoniu', 'osmanu'),
(8348, 'Jav valstija, 1-a pagal uzimama teritorija [liet.]', 'aliaska'),
(8349, 'Kada ikurta tarptautine roguciu sporto federacija', '1957'),
(8350, 'Turistu megstama sala neapolio ilankoje (italija), kurios pavadinimas, isvertus is lotynu kalbos, reiskia \"ozku sala\"', 'kapris'),
(8351, 'Samdoma pokyliu linksmintoja japonijoje', 'geisa'),
(8352, 'Mitkaralius, anot legendu ka jis paliesdaves, viskas virsdavo auksu', 'midas'),
(8353, 'Kiek metu buvo jauniausiam siu laiku olimpiniu zaidyniu cempionui, laimejusiam aukso medali komandinese varzybose', '7'),
(8354, 'Kokia firma pirmoji i savo automobilius pradejo montuoti automatines pavaru dezes', 'oldsmobile'),
(8355, 'Cheminis elementas, kurio simbolis \"ta\" [numeris 73]', 'tantalas'),
(8356, 'Bjaurus, lietingas oras', 'dargana'),
(8357, 'Jordanijos administracinis vienetas', 'apygarda'),
(8358, 'Valstybes, miesto, gimines simbolinis skiriamasis zenklas', 'herbas'),
(8359, 'Savarankisku banku ar bendroviu susiliejimas, siekiant padidinti galimybes kontroliuoti rinkas', 'amalgamacija'),
(8360, 'Jav prezidentas, valdes po dzbuso, ypatingai isgarsejes istorija su monika', 'klintonas'),
(8361, 'Televizijos kompanijos ntv ikurejas', 'gusinskis'),
(8362, 'Irenginiu kompleksas nutekamiesiems vandenims surinkti, nuplukdyti i valymo irenginius ir isvalytus isleisti i pavirsinius vandenis', 'kanalizacija'),
(8363, 'Antikos skluptorius (5 aprkr.) \"ieties nesejas\" (doriforas) autorius (liet.)', 'polikletas'),
(8364, 'Organizmu lytinio dauginimosi budas - gemalo vystymasis is neapvaisintos moteriskosios lytines lasteles', 'partenogeneze'),
(8365, 'Zvejybos laivas, zuklaujantis tam tikru tinklu-tralu', 'traleris'),
(8366, 'Beisbole - kamuoliuko gaudytojas', 'keceris'),
(8367, 'Japonisko penkiaeilio pavadinimas', 'tanku'),
(8368, '10cm = ...', 'decimetras'),
(8369, 'Accelerated graphics port', 'agp'),
(8370, 'Reprezentaciniai italijos didiku rumai', 'palakas'),
(8371, 'Specialiu budu isdirbta, atspari lankstymui ir dregmei, galviju ar kiauliu oda; is jos siuvama karine bei darbine avalyne, pakinktai', 'juchtas'),
(8372, 'Namu santarves, taikos ir laimes deive', 'hestija'),
(8373, 'Mokslas susijes su datomis', 'istorija'),
(8374, 'Prancuzu kompozitorius, baleto \"dafnis ir chloje\", \"ispanu rapsodijos\", \"bolero\", kuriniu fortepijonui ir simfoniniam orkestrui autorius', 'ravelis'),
(8375, 'Kaip vadinama vieta atome, kur sutinkamas elektronas', 'orbitale'),
(8376, 'Dailes kurinio plastinis raiskumas, kurio deka kurinys dominuoja ir lengvai pritampa prie plastines aplinkos', 'dekoratyvumas'),
(8377, 'Pirmasis tapybos katedros vedejas ir profesorius, zymiausias klasicistines tapybos atstovas lietuvoje', 'smuglevicius'),
(8378, 'Kiek kartu galima keisti zaidejus per futbolo rungtynes', '4'),
(8379, 'Skulptorius (5 aprkr.) \"disko metikas\" autorius', 'mironas'),
(8380, 'Kas padege sventykla efese, noredamas pakliuti i laikrascius ir mokyklos chrestomatijas', 'herostratas'),
(8381, 'Pardavimo imone', 'parduotuve'),
(8382, 'Sviesulio, pvz., zvaigzdes, aukstis virs horizonto', 'bazalioma'),
(8383, 'Laikrastis, leidziamas jonavoje', 'naujienos'),
(8384, 'Smulkesniu dirvozemio daleliu arba dykumu dulkiu ir smelio nupustymas', 'defliacija'),
(8385, 'Didelis keturasis keleivinis arba krovininis vagonas', 'pulmanas'),
(8386, 'Susiuti ar kitaip sujungti popieriaus (ar ktmedziagos) lapai su rasytu arba spausdintu tekstu', 'knyga'),
(8387, 'Babilonieciu saules dievas', 'samasas'),
(8388, 'Trecia nuo galo lotynu abeceles raide', 'iksas'),
(8389, 'Kaip iki 1989 mvadinosi kijevo krepsinio klubas \"budivelnik\"', 'stroitel'),
(8390, 'Zymus lenku kilmes astronomas', 'kopernikas'),
(8391, 'Laukinis ir darzeliu augalas sviesiai geltonais ziedynais', 'razeta'),
(8392, 'Kaimas silutes raj., kuriame yra bene vienintele trikampe baznycia lietuvoje', 'deguciai'),
(8393, 'Mokslas, tiriantis lietuviu kalba, literatura ir tautosaka', 'lituanistika'),
(8394, 'Atskiras statinys, pastato priestatas arba anstatas varpams pakabinti', 'varpine'),
(8395, 'Kosovo srities sostine', 'pristina'),
(8396, 'Aukstas ldk valdzios pareigunas', 'vaivada'),
(8397, 'Franku valstybeje nusigyvenusiuju prasymas turtingesniuju pagalbos', 'prekariumas'),
(8398, 'Kas parase \"muzikas zemaiciu ir lietuvos\"', 'poska'),
(8399, 'Didziausias svedijos administracinis teritorinis vienetas', 'lenas'),
(8400, 'Tomo sojerio mylimiausios paneles tikrasis vardas', 'rebeka'),
(8401, 'Kokiu vardu geriau zinomas amerikieciu folkloro bei roko dainininkas robert allen zimmerman [orig.]', 'bob dylan'),
(8402, 'Antikos rasytojas (254-184 m.pr.kr.), \"pseudolas\", \"karys pagyrunas\", \"puodas\" autorius', 'plautas'),
(8403, 'Svirtinis irenginys laukams drekinti', 'sadufas'),
(8404, 'Kongo demokratines respublikos (afrika) sostine', 'kinsasa'),
(8405, 'Geometrijos dalis, kurioje nagrinejamos erdviniu kunu ir figuru geometrines savybes', 'stereometrija'),
(8406, 'Ispanijos politinis veikejas, vienas pirmuju marksizmo skleideju ispanijoje', 'iglesijas'),
(8407, 'Valdymo forma - valstybine valdzia priklauso nedidelei zmoniu grupei, dazniausiai ekonomiskai galingiausiu', 'oligarchija'),
(8408, 'Zemes juosta isilgai upes vagos', 'salivage'),
(8409, 'Pasaulin? meteorologijos diena', 'kovo 23'),
(8410, 'Puota, kur nieko nesivarzoma, girtaujama, istvirkaujama', 'orgija'),
(8411, 'Spinta pinigams laikyti', 'seifas'),
(8412, 'Tikroji rasytojo vkreves pavarde', 'mickevicius'),
(8413, 'Jav valstija, kurios veliavoje pavaizduota dbritanijos veliava', 'havajai'),
(8414, 'Romenu karvedys ir politikas, imperatoriaus oktaviano augusto bendrazygis', 'agripa'),
(8415, 'Kiek vaivorykste turi spalvu [skaicius]', '7'),
(8416, '10-a labiausiai urbanizuota pasaulio salis (90% miesto gyv.)', 'nyderlandai'),
(8417, 'Pabege is vest indijos ir gvianos negrai, kovoje su baltaisiais kolonizatoriais', 'maronai'),
(8418, 'Indelis rasalui', 'rasaline'),
(8419, 'Vyrvardas, kiles is lotkalbos, reiskia \"liutas\"', 'leonas'),
(8420, 'Teiginys nereikalaujantis irodymo', 'aksioma'),
(8421, 'Tarptautines vienetu sistemos radioaktyviosios medziagos aktyvumo vienetas', '60'),
(8422, 'Savaites diena, kurios pavadinimas kilo nuo marso pavadinimo', 'antradienis'),
(8423, 'Kokie pauksciai po ziemos i lietuva grizta pirmiausiai', 'kovai'),
(8424, 'Senosios tvarkos bei tradiciju salininkai, kartu - naujoviu priesininkai', 'konservatoriai'),
(8425, 'Kataliku liturginiu drabuziu dalis - balta vilnone juota su sesiais juodais kryziais, permetama per kakla; popieziaus valdzios simbolis', 'palijus'),
(8426, 'Vokieciu kompozitorius parases opera \"tristanas ir izolda\"', 'vagneris'),
(8427, 'Visuomeninio transporto priemone su \"ragais\"', 'troleibusas'),
(8428, 'Kuriais metais ivyko pirmieji tiesioginiai rinkimai i europos parlamenta', '1979'),
(8429, 'Aukstas moteru balsas', 'sopranas'),
(8430, 'Kelnes, aptempiancios blauzdas, nuo keliu i virsu platejancios, suklostytos ties juosmeniu', 'galife'),
(8431, 'Kino rezisierius, 2002 mapdovanotas lietuvos nacionaline kulturos ir meno premija', 'stonys'),
(8432, 'Vaistas maniakinei depresijai gydyti', 'prozakas'),
(8433, 'Antimikrobiniu katijoniniu baltymu su mazu molekuliniu svoriu grupe', 'defenzimai'),
(8434, 'Lekstas zemiu pylimas', 'glasis'),
(8435, 'Vakarines vyriskos juodos gelumbes svarkas silku apsiutais atlapais', 'smokingas'),
(8436, 'Valstybe europos siaurineje dalyje, kuri rytuose ribojasi su rusija, siaureje su norvegija, vakaruose - su svedija, baltijos, botnijos jura', 'suomija'),
(8437, 'Astronominis prietaisas, naudotas senais laikais matuoti sviesuliu aukscius ir zvaigzdziu kampinius atstumus', 'kvadrantas'),
(8438, 'Sunu nervu sistemos liga, sukeliama centrines nervu sistemos degeneracijos', 'ataksija'),
(8439, 'Rusijos karvedys, privertes napoleono kariuomene palikti maskva ir trauktis', 'kutuzovas'),
(8440, 'Zemiausias karinis laipsnis', 'eilinis'),
(8441, 'Zmogaus sugebejimas salia savo gimtosios kalbos panasiu kompetencijos lygiu valdyti ir antra kalba', 'dvikalbyste'),
(8442, 'Skyles ispjovimas, nuimant drozle sukamu ir asies kryptimi stumiamu graztu', 'grezimas'),
(8443, 'Rusu kompozitorius ir pianistas, 1922 mparases opera \"meile trims apelsinams\"', 'prokofjevas'),
(8444, 'Kokios markes automobilis buvo 1896 mpavogtas is barono ziuljeno (pirmoji pasaulyje automobilio vagyste)', 'peugeot'),
(8445, 'Atskira sodyba su zemes sklypu', 'vienkiemis'),
(8446, 'Mokslas, tiriantis gyvunus', 'zoologija'),
(8447, 'Igimta spalvu regejimo yda', 'daltonizmas'),
(8448, 'Kas parase veikala \"lenkijos, lietuvos, zemaiciu, ir visos rusios kronika\"', 'strijkovskis');
INSERT INTO `vikte_klsm` (`id`, `klsm`, `ats`) VALUES
(8449, 'Kilmingas senoves makedonijos kariuomenes raitelis', 'hetairas'),
(8450, 'Skala arba....', 'balana'),
(8451, 'Gydymas siluma', 'termoterapija'),
(8452, 'Rytu dvikova - japonu samuraju kovos be ginklo menas; savigynos sistema, kuria sudaro metimai, smaugimai ir smugiai', 'dziudzitsu'),
(8453, 'Taip matematikoje zymimas arkkotangentas', 'arcctg'),
(8454, 'Psichiskai sveikas', 'normalus'),
(8455, 'Kaip taisyklingai lietuviskai turetu buti vadinamas sporto prietaisas espanderis', 'tampykle'),
(8456, 'Sis statinys buvo auksciausias beveik 5000 metu iki eifelio boksto pastatymo', 'cheopso piramide'),
(8457, 'Savaites diena, kurios pavadinimas kilo nuo merkurijaus pavadinimo', 'treciadienis'),
(8458, 'Kelintais metais lektuvu buvo virsytas garso greitis', '1947'),
(8459, 'Cheminis elementas, kurio simbolis \"fm\" [numeris 100]', 'fermis'),
(8460, 'Per maskva tekanti upe', 'maskva'),
(8461, 'Zvaigzdynas, kuri graikai vadino kentauru, egiptieciai - issisiepusiu liutu, o indai - arkliu', 'saulys'),
(8462, 'Antarkties banginis', 'finvalas'),
(8463, 'Kokios valstybes veliava yra labai panasi i ligonines zenkla', 'sveicarijos'),
(8464, 'Gentis kuri beveik uzeme romos miesta, nesugebejo paimti tik kapitolijaus', 'galai'),
(8465, 'Cheminis elementas, kurio simbolis \"cm\" [numeris 96]', 'kiuris'),
(8466, 'Cheminis elementas, pavadintas amerikos garbei', 'americis'),
(8467, 'Metu dalis, kuriai budinga kokie nors darbai, renginiai, gamtos reiskiniai', 'sezonas'),
(8468, 'Elektronu islaisvinimas is kieto kuno ji apsvietus elektromagnetiniais spinduliais [pvz.: sviesa]', 'fotoefektas'),
(8469, 'Motvardas, kiles is lotkalbos, reiskia \"lokute, meskute\"', 'ursule'),
(8470, 'Geltonas cukrus, cukraus rafinado gamybos salutinis produktas', 'bastras'),
(8471, 'Konservuojantis tirpalas su acto rugstimi, prieskoniais ir ktpriedais', 'marinatas'),
(8472, 'Kada ikurta tarptautine kanoju irklavimo federacija', '1946'),
(8473, 'Sampinjonas arba ...', 'pievagrybis'),
(8474, 'Soniniai plysiai, esantys ugnikalnio slaituose, pro kuriuos verziasi dujos', 'furmaroles'),
(8475, 'Koks anksciau buvo nba klubo washington \"wizards\" pavadinimas', 'bullets'),
(8476, 'Mokslas, tiriantis veziagyvius', 'karcinologija'),
(8477, 'Sparnu keliamas, savo svorio varomas sunkesnis uz ora skraidymo aparatas', 'sklandytuvas'),
(8478, 'Pakabinamas keliu saku sviestuvas', 'sietynas'),
(8479, '\"signalizacija\" atvirksciai', 'ajicazilangis'),
(8480, 'Eksportuojamos produkcijos netiesioginio mokescio sumazinimas arba visiskas jo panaikinimas', 'eksporto detaksacija'),
(8481, 'Vokieciu kompozitorius, pianistas, vargonininkas, dirigentas, 3 operu, 5 simfoniju, uvertiuros \"vasaros nakties sapnas\" autorius', 'mendelsonas'),
(8482, 'Spuogu rusis', 'inkstirai'),
(8483, 'Losimo namai', 'kazino'),
(8484, 'Dezute piestukams laikyti', 'piestukine'),
(8485, 'Meskeres virvute', 'valas'),
(8486, 'Dideles mases plazmos rutulys, spinduliuojantis elektromagnetinius spindulius, elektringasias daleles (zvaigzdini veja) ir neutrinus', 'zvaigzde'),
(8487, 'Kasmetinis europos dainu konkursas, rengiamas nuo 1956 m.', 'eurovizija'),
(8488, 'Vyrauti, buti auksciau ko nors', 'dominuoti'),
(8489, 'Kuriais metais fidzis tapo nepriklausoma valstybe', '1987'),
(8490, 'Adamsu tarnas', 'svirdulys'),
(8491, 'Daiktas, dedamas po kompiuterine pele', 'kilimelis'),
(8492, 'Miestas, kuriame senoveje stovejo garsi artemides sventykla', 'efesas'),
(8493, 'Prancuzu chemikas ir mikrobiologas, atrades skiepus', 'pasteras'),
(8494, 'Isimtine valstybinio organo ar pareiguno teise spresti kuri nors klausima', 'prerogatyva'),
(8495, 'Kryptingos sviesos sviestuvas', 'prozektorius'),
(8496, 'V.martinkaus noveliu romanas', 'lasai'),
(8497, 'Baltieji kraujo kuneliai, kurie kovoja su infekcijomis', 'leukocitai'),
(8498, 'Valstybe tarp venesuelos ir ekvadoro', 'kolumbija'),
(8499, 'Kas suvaidino dana scully vaidmeni seriale x-files', 'anderson'),
(8500, 'Pagal senoves graiku horoskopa, asmuo, gimes 12.01 d- 01.07 d.', 'minotauras'),
(8501, 'Labai pavojinga infekcine liga, kuria sergant organizmas netenka vandens, sukelia mikrobas - vibrionas', 'cholera'),
(8502, 'Urano ir gajos dukte, teisingumo, tvarkos ir valstybingumo deive', 'temide'),
(8503, 'Valstybes ginkluotosios pajegos', 'kariuomene'),
(8504, 'Bakterijos, kurios naudoja cheminiu junginiu energija', 'chemosintetinancios'),
(8505, 'Lietuviu poete, prozininke, pasirasinejusi tyru dukters slapyvardziu', 'buivydaite'),
(8506, 'Rasytojas, romanu \"maras\", \"svetimas\", \"krytis\", dramos \"kaligula\", eses \"sizifo mitas\" autorius (liet.)', 'kamiu'),
(8507, 'Amerikos valiutos sutrumpinimas', 'usd'),
(8508, 'Visuomenes sluoksnis, is profesijos dirbantis protini, daugiausiai sudetinga, kurybini darba', 'inteligentija'),
(8509, 'Stulpeline diagrama, vaizduojanti statistini pasiskirstyma', 'histograma'),
(8510, 'Artisto ar ktasmens isvaizdos, veido israiskos keitimo priemones; siomis priemonemis pakeista isvaizda', 'grimas'),
(8511, 'Chemine arba branduoline reakcija, kuria sudaro keli nuoseklus virsmai: pirmesnio virsmo produktas yra paskesnio virsmo (arba keliu virsmu) pradine medziaga', 'grandinine'),
(8512, 'Pavirsinio ir pozeminio vandens tirpiose ir supleisejusiose uolienose (druskoje, klintyje, kreidoje, dolomite, gipse, anhidrite) chemine ir mechanine veikla, del kurios susidaro pozemines ertmes, o pavirsiuje - smegduobes bei idubales', 'karstas'),
(8513, 'Sis daiktas krikscionybes tradicijoje simbolizuoja issigelbejima ir vilti', 'inkaras'),
(8514, 'Koks gyvunas minta tik tam tikru rusiu eukaliptu lapais', 'koala'),
(8515, 'Senoves graiku mitinis trakijos dainininkas, muzikantas ir poetas', 'orfejas'),
(8516, 'Krikscioniu svente, kuria minimas kristaus zengimas i dangusvenciamas 40-aja diena po velyku', 'sestines'),
(8517, 'Skersaruoziu raumenu paralyzius', 'mioplegija'),
(8518, 'Labiausiai turistu lankoma pasaulio valstybe', 'prancuzija'),
(8519, 'Olimpo dievo arejo lotyniskas vardas', 'marsas'),
(8520, 'Igimtas sirdies nebuvimas', 'akardija'),
(8521, 'Kaip romenai vadino dabartine prancuzija ir siaures italija', 'galija'),
(8522, 'Lokio \"ranka\"', 'letena'),
(8523, 'Ka reiskia lrs', 'lietuvos respublika'),
(8524, 'Virpesiai, sklindantys aplinkoje [dgs.]', 'bangos'),
(8525, 'Rusu kosmine stotis, jau nukritusi i zeme', 'mir'),
(8526, 'Kaip vadinami akiniai su rankena', 'lornetas'),
(8527, 'Kas tai yra: elektronu skaicius, kuri atomui reikia pasiskolinti arba atiduoti, kad jo isorinis sluoksnis taptu stabilus', 'valentingumas'),
(8528, 'Zmoniu baudimas lazdu smugiais per nugara ir kulni', 'bastonada'),
(8529, 'Sveicaru kalbininkas, vienas stilistikos mokslo kureju', 'bali'),
(8530, 'Filosofas, daugybes neislikusiu gamtamoksliniu traktatu autorius', 'demokritas'),
(8531, 'Salis, kurios domeno vardas yra \".cg\"', 'kongas'),
(8532, 'Tarptautine kovos pries moteru prievarta diena', 'lapkricio 25'),
(8533, 'Kas parase \"troskimai\"', 'maironis'),
(8534, 'Aklas prisirisimas prie tam tikro tikejimo, ziaurumas kitatikiu atzvilgiu', 'fanatizmas'),
(8535, 'Hormonas, nuo kurio stokos sergama diabetu', 'insulinas'),
(8536, 'Lietuviu rasytojas, romanu \"parduotos vasaros\", \"sakme apie juza\" autorius', 'baltusis'),
(8537, 'Paskutinis ii pasauliname kare netiketas vokieciu kariuomenes puolimas [uzpuole sajungininku pozicijas belgijoje ir liuksemburge]', 'ardenu operacija'),
(8538, 'Senbaltu ugnies deive, namu zidinio globeja', 'gabija'),
(8539, 'Labos nakties palinkejimas', 'labanakt'),
(8540, 'Istorinio reiskinio, proceso laikotarpis', 'faze'),
(8541, 'Organizmo issekimas', 'kacheksija'),
(8542, 'Operos \"kelione i tilze\", baleto \"egle - zalciu karaliene\", oratorijos \"nelieskite melyno gaublio\", kuriniu smuikui su orkestru autorius', 'balsys'),
(8543, 'Lietuviu skulptorius, grafikas, medalistas, zymiausi kuriniai: lietuvos mokykla, artojas, skausmas', 'rimsa'),
(8544, 'Dbritanijos mases vienetas, lygus 6.35 kg', 'stonas'),
(8545, 'Plienas, turintis 36 % nikelio', 'invaras'),
(8546, 'Vieta, kur palaidotas numirelis', 'kapas'),
(8547, 'Sveicarijos upe', 'inas'),
(8548, 'Vilkimo lynas, vamzdis, strypas', 'buksyras'),
(8549, 'Zalingas iprotis traukti i plaucius tabako dumus', 'rukymas'),
(8550, 'Senojo testamento personazas, vienas is triju nojaus sunu, uz pasisaipyma is girto tevo buves prakeiktas', 'chamas'),
(8551, 'Slaptrastis, rasymo budas, kuriuo islaptinamas teksto turinys', 'kriptografija'),
(8552, 'Sis biciu produktas krikscionybes tradicijoje yra dievo darbu ir nuosirdzios tarnystes jezui kristui simbolis', 'medus'),
(8553, 'Baltu mitologijoje - auksciausias dievas', 'praamzius'),
(8554, 'Autoziras su pludemis, pritaikytas pakilti nuo vandens ir nutupti ant vandens', 'hidroziras'),
(8555, 'Valtis, irkluojama kastuvo pavidalo irklu, klupant ant vieno kelio', 'kanoja'),
(8556, 'Saldzios ziedu sultys', 'nektaras'),
(8557, 'Automobiliu gamintojas isleides siuos modelius: 323, 626, 929', 'mazda'),
(8558, 'Sunkus, nepabaigiamas ir beprasmis darbas', 'sizifo darbas'),
(8559, 'Didziausias pasaulyje upiu uostas', 'diuisburgas'),
(8560, 'Kada pastatyta berlyno siena', '1961'),
(8561, 'Pagrindine kauno gatve, pastatyta 19a., dabartine pesciuju vaiksciojimo vieta', 'laisves aleja'),
(8562, 'Xx aii pmodernistines dailes kryptis, dailininkai tikrove parodo nepaprastai tiksliai ir siekia kuo didesnio naturalistinio ispudzio, kuriniu vaizdai tiesiog fotografiski', 'hiperrealizmas'),
(8563, 'Maziausi pasaulyje sunys (veisle)', 'cihuahua'),
(8564, 'Romantizmo atstovas parases \"valentina\"', 'vaiciulaitis'),
(8565, 'Ilgiausia japonijos upe; teka honsiu saloje', 'sinanas'),
(8566, 'Aktorius atlikes pagrindinius vaidmenis filmuose \"hanibalas\", \"raudonasis drakonas\" ir kt., o uz vaidmeni filme \"avineliu tylejimas\" pelnes geriausio metu aktoriaus oskara: anthony ..[orig.]', 'hopkins'),
(8567, 'Ka simbolizuoja balta spalva olimpineje veliavoje', 'taika'),
(8568, 'Prie aerostato arba dirizablio apvalkalo prikabintas krepsys - patalpa zmonems, maistui, irangai', 'gondola'),
(8569, 'Kinu filosofijoje - vyriskasis pradas', 'jong'),
(8570, 'Padegamasis misinys is sutirstintu degalu ir ivairiu priedu', 'napalmas'),
(8571, 'Juros diena (data)', 'liepos 30'),
(8572, 'Pirmasis lietuvos atlikejas, dalyvaves eurovizijoje', 'vysniauskas'),
(8573, 'Kada ikurta vilniaus filharmonija', '1940'),
(8574, 'Karpiniu seimos zuvis, dar vadinama salviu', 'salatis'),
(8575, 'Sestas dievo isakymas?', 'nepaleistuvauk'),
(8576, 'Kuno dalies zuvimas del kraujotakos sutrikimo', 'gangrena'),
(8577, 'Slaptos airijos vailstieciu organizacijos, nuo xviiia7 desimtmecio iki xixapabaigos kovojusios pries nacionaline ir socialine lendlordu priespauda, nariai: baltieji ...', 'vaikinai'),
(8578, 'Austrijos sostine?', 'viena'),
(8579, '8-as didziausias lietuvos ezeras [vard.]', 'metelys'),
(8580, 'Sportininkas, uzemes varzybose viena paskutiniu vietu', 'autsaideris'),
(8581, 'Senovinis karo prietaisas akmenims metyti', 'balista'),
(8582, 'Kurti muzikini veikala', 'komponuoti'),
(8583, 'Kietasis apskrudes duonos kepalo pavirsius:', 'pluta'),
(8584, 'Metalo sluoksnio nusodinimas ant kitos medziagos elektrolizes budu', 'galvanostegija'),
(8585, 'Estetinio vertinimo jausmas', 'skonis'),
(8586, 'Nesekme, visiskas zlugimas', 'fiasko'),
(8587, 'Plynraistine aukstapelke kupiskio rajone', 'sakoniu bala'),
(8588, 'Zemiausias europos taskas (-28m): ..jura', 'kaspijos'),
(8589, 'Ziaurus susidorojimas be teismo', 'lincas'),
(8590, '75% kalio nitrato, 15% anglies, 10% sieros', 'parakas'),
(8591, 'Kalboje arba kodavimo sistemoje vartojamu simboliu visuma', 'alfabetas'),
(8592, 'Disciplina, nagrinejanti archyvu darbo teorija, metodika r organizacija, archyvu istorija', 'archyvistika'),
(8593, 'Garsi futbolo komanda is turino', 'juventus'),
(8594, 'Detale, per kelikli judinanti voztuva', 'kumstelis'),
(8595, 'Kietos medziagos ir skyscio, kuriame ji istirpusi, misinys', 'tirpalas'),
(8596, 'Renkamas atstovaujamojo valstybinio valdzios organo narys', 'deputatas'),
(8597, 'Pagal paprocius, jaunavedzius reikia pasitikti su', 'duona ir druska'),
(8598, 'Moteris, kuri pernelyg stengiasi patikti vyrams', 'kokete'),
(8599, 'Birmos stambus piniginis vienetas', 'kijatas'),
(8600, 'Pasakojimo forma - asmens, daikto, gamtos arba aplinkos vaizdavimas', 'aprasymas'),
(8601, 'Pragyvenimo priemoniu stoka, neturtas', 'skurdas'),
(8602, 'Andu kupranugaris', 'lama'),
(8603, 'Italu kompozitorius, operu \"manon lesko\", \"bohema\", \"toska\", \"madam baterflai\" ir ktautorius', 'pucinis'),
(8604, 'Vyrvardas, kiles is lotkalbos, reiskia \"jura\"', 'marius'),
(8605, 'Visi valstybeje gyvenantys ir dirbantys kitu valstybiu ir tarptautiniu organizaciju diplomatai: diplomatinis ...', 'korpusas'),
(8606, 'Vyriskosios ir moteriskosios lyties pozymiu buvimas tame paciame organizme, kitaip - hermafroditizmas', 'androginija'),
(8607, '\"biciuliu draugijos\" (kvakeriu) steigejas', 'foksas'),
(8608, 'Kaip japonijoje vadinamas sesiaeilis', 'sedoka'),
(8609, 'Nuolatine naujausiu savo salies ir uzsienio ivykiu apzvalga, pateikiama periodineje spaudoje, radijo, televizijos laidose', 'kronika'),
(8610, 'Izymus senoves graiku poetas, kures eiles olimpiniu zaidyniu nugaletoju garbei', 'pindaras'),
(8611, 'Apipilti verdanciu vandeniu ir nusausinti darzoves ar kitus maisto produktus [pvzriesutus]', 'blansiruoti'),
(8612, 'Taisyklingos strukturos muras is vienodu staciakampiu tasytu akmenu', 'izodomas'),
(8613, 'Kiek zingsniu nuo meiles iki neapykantos', 'vienas'),
(8614, 'Ka isvertus is kinu kalbos reiskia hieroglifo \"ju\" reiksme [vnsvard.]', 'lietus'),
(8615, 'Asmuo, valstybe, klusniai vykdantys kitu valia', 'marionete'),
(8616, 'Paveikslas sienoje', 'pano'),
(8617, 'Vienisas kalnas ar vienisa kalva, izoliuota abrazijos, erozijos, defliacijos, denudacijos procesu', 'atlikuonis'),
(8618, 'Avienuolio apsakymas', 'pati'),
(8619, 'Auksciausias kariniu juru pajegu valdymo organas, atitinkantis juru ministerija', 'admiralitetas'),
(8620, 'Skarletes autore', 'riplej'),
(8621, 'Mokslas, tiriantis pauksciu kiausinius', 'oologija'),
(8622, 'Laisvas laikas', 'laisvalaikis'),
(8623, 'Modeliu \"atgaivinimas\" naudojant specialia robotu technika', 'animatronika'),
(8624, 'Miestas, kuriame yra seniausias europos universitetas', 'bolonija'),
(8625, 'Didysis zemes apskritimas, kurio plokstuma eina per zemes ar elipsoido sukimosi asi bei duotaji taska', 'meridianas'),
(8626, 'Kuriais metais rinkoje pirma karta pasirode kava be kofeino', '1903'),
(8627, 'Miestas, kuriame vyko 2004m vasaros olimpiada', 'atenai'),
(8628, 'Romano \"meile, dziazas ir velnias\" autorius', 'grusas'),
(8629, 'Kiek procentu visos automobilio volkswagen golf iii mases sudaro plastmase', '9'),
(8630, 'Artimiausia diena', 'rytojus'),
(8631, 'Plytu gamykla', 'plytine'),
(8632, 'Cheminis elementas, kurio pavadinimas, atitinka lotyniska svedijos sostines pavadinima', 'holmis'),
(8633, 'Turto ar turtines teises dovanojimas tam tikram naudingam tikslui', 'auka'),
(8634, 'Prancuzijos valstybes veikejas1666misteige paryziaus mokslu akademija, 1669mkaraliskaja muzikos akademija [liet.]', 'kolberas'),
(8635, 'Kiek simfoniju parase francas jozefas haidnas', '107'),
(8636, 'Pastato sienos anga, uzdengta stiklu ar kita persvieciama medziaga', 'langas'),
(8637, 'Fizikos saka, tirianti tampriuosius svyravimus ir bangas bei ju praktini panaudojima', 'akustika'),
(8638, 'Meno paroda, rengiama kas treji metai', 'trienale'),
(8639, 'Cheminis elementas, kurio simbolis \"bi\" [numeris 83]', 'bismutas'),
(8640, 'Kelintais metais ivyko austerlico musis, kuriame napoleono armija nugalejo austru ir rusu kariuomene', '1805'),
(8641, 'Metalu lydinys arba amzius', 'zalvaris'),
(8642, 'Gemalo pazeidimas', 'embriopatija'),
(8643, 'Buhalterines knygos kairioji saskaitos puse, kurioje irasomos visos iplaukos grynais pinigais i sia saskaita, taip pat visos sioje saskaitoje esancios skolos ir islaidos', 'debetas'),
(8644, 'Daugiaspalviskumas', 'polichromija'),
(8645, 'Seka, vadinama nykstancia, jei jos riba lygi ..[zodziais]', 'nuliui'),
(8646, 'Autokoncepcijos dalis, kuri, individo nuomone, geriausiai ji reprezentuoja ir todel ji yra rodoma, demonstruojama kitiems', 'parodomasis as'),
(8647, 'Garso irasymas ir atgaminimas naudojant du nepriklausomus informacijos kanalus', 'stereofonija'),
(8648, 'Inksto kunelis (ju yra ~1 mln.)', 'nefronas'),
(8649, 'Lietuvos telekomo informacijos telefono numeris', '118'),
(8650, 'Kalva netoli jeruzales, ant kurios budavo vykdomos mirties bausmes ir kur, pasak naujojo testamento, buvo nukryziuotas jezus kristus', 'golgota'),
(8651, 'Valstybe kurios veliava yra penkiakampe', 'nepalas'),
(8652, 'Geriausia aviu vilnu rusis', 'zefyras'),
(8653, 'Vertikalus zemes pavirsiaus pjuvis, pavaizduotas popieriaus lape atitinkamais auksciu ir ilgiu masteliais', 'profilis'),
(8654, 'Induizmo kanoniniai tekstai', 'puranai'),
(8655, 'Kuriais metais ivykdyta pirmoji pasaulyje automobilio vagyste', '1896'),
(8656, 'Nustatyta sportiniu ryngtyniu laiko dalis', 'kelinys'),
(8657, 'Vamzdelio pavidalo prietaisas su optine sistema ir sviesos saltiniu zmogaus arba gyvulio kuno ir organu ertmems tirti', 'endoskopas'),
(8658, 'Jauni zmones', 'jaunimas'),
(8659, 'Zvaigzdes ar zvaigzdziu spieciaus orbitos taskas, labiausiai nutoles nuo galaktikos centro', 'apogalaktis'),
(8660, 'Turinio organizavimo budas, isryskejantis siuzeto neturinciame lyriniame pasakojime', 'izotopija'),
(8661, 'Vyriausioji stovyklu valdyba (glavnoje upravlenije lagerej)', 'gulag'),
(8662, 'Renesanso laikotarpio vyru kelnes su trumpomis, iki puses slaunu, rutulio arba kriauses pavidalo klesnemis', 'kalces'),
(8663, 'Paukscio \"ranka\"', 'sparnas'),
(8664, 'Ekonomikos mokslo dalis, kuri tiria ekonomika kaip visuma salies arba saliu grupes mastu', 'makroekonomika'),
(8665, 'Augalo saknies sluoksnis, kitaip rizodermis', 'epiblema'),
(8666, 'Apsinuodijimas, sukeltas netinkamai paruosto maisto', 'botulizmas'),
(8667, 'Kokioje salyje buvo priimta fizikiniu dydziu sistema', 'prancuzijoje'),
(8668, 'Aktyvus judejimas su slidemis tikru arba dirbtiniu sniegu dengtoje vietoveje', 'slidinejimas'),
(8669, 'Supamosios kedes isradejas', 'dzefersonas'),
(8670, 'Iranenu dievybes, kovojusios uz kosmoso tvarka ir stiprinima su jaunesnes kartos dievais, pasirinkusiais blogi ir tamsa [dgs.]', 'ahurai'),
(8671, 'Ginkluoti daliniai, kovoje prieso okupuotoje teritorijoje, bet nesudare organizuotos kariuomenes', 'partizanai'),
(8672, 'Xiii aestijos teritorinis administracinis vienetas', 'kihelkondas'),
(8673, 'Poligrafiniu budu nuo spaudos formos gauta kopija', 'atspaudas'),
(8674, 'Graiku mitu personazas, vienaakis milzinas kiklopas, kuri apakino odisejas', 'polifemas'),
(8675, 'Lietuviu poetas, poezijos rinkiniu \"vizijos\", \"poezija\", \"zmogaus apnuoginta sirdis\", \"po ukanotu nezinios dangum\" autorius', 'macernis'),
(8676, 'Pasto zenklu rinkimas ir tyrimas', 'filatelija'),
(8677, 'Zmoniu fantazijos kuriami vaizdiniai, aplenkiantys laiko tikroves ir realybes galimybes [dgs.]', 'svajones'),
(8678, 'Anglu fizikas pirmasis irodes, kad akys fokusuoja daiktus ivairiuose atstumuose, keisdamos lesiu forma', 'jungas'),
(8679, 'Is kito galo \"manekenam\"', 'manekenam'),
(8680, 'Kada prasidejo gediminaiciu dinastija', '1316'),
(8681, 'Biblijos personazas, senajame testamente - filistieciu miesto ekrono globejas', 'belzebubas'),
(8682, 'Suakmeneje iskastiniai gyvunai ara augalai', 'fosilija'),
(8683, 'Keramikos danga', 'emalis'),
(8684, 'Lenku kilmes anglu rasytojas, knygu \"lordas dzimas\", \"seselio bruksnys\", \"tamsos sirdis\" autorius', 'konradas'),
(8685, 'Kelintais metais surengtas pirmasis formules 1 cempionatas', '1950'),
(8686, 'Teismo draudimas iki bylos issprendimo disponuoti turtu', 'arestas'),
(8687, 'Mechaninio darbo matavimo vienetas si sistemoje', 'dzaulis'),
(8688, 'Kompanija, pagaminusi mobiliu telefonu modelius: genie, savvy, diga, spark, fizz', 'philips'),
(8689, 'Ka veikia zmones diskotekoje', 'soka'),
(8690, 'Prancuzijos prezidentas pries zaka siraka', 'miteranas'),
(8691, 'Judamojo takelazo laivavirve, kuria pakeliamos ir nuleidziamos bures, rejos, veliavos signalai', 'falas'),
(8692, 'Kuriais metais buvo pirma karta sekmingai ismegintas parasiutas', '1797'),
(8693, 'Dainavimas arba giedojimas be muzikiniu instrumentu pritarimo', 'a cappella'),
(8694, 'Psichoseksualinis sutrikimas, kai individas patiria malonuma, klausydamasis ji zeminanciu ir izeidzianciu zodziu', 'verbalinis mazochizmas'),
(8695, 'Sukasta ar suarta ezia darzovems sodinti', 'lysve'),
(8696, 'Kas 1797 matliko pirmaji suoli parasiutu virs monko parku paryziuje (pranc.)', 'garnerin'),
(8697, 'Kuo chameleonas ciumpa grobi', 'liezuviu'),
(8698, 'Mokslininkas 1543mpaskelbes heliocentrine pasaulio teorija', 'kopernikas'),
(8699, 'Garsu darna - grozines kalbos ypatybe, kuria sudaro jos skambejimo grozis ir naturalumas', 'eufonija'),
(8700, 'Popieziaus galvos apdangalas', 'tiara'),
(8701, 'Didziausias uzfiksuotas traukinio greitis km/h [xxx,x]', '515,3'),
(8702, '32-a valstija, prijungta prie jav 11.05.1858 m., sostine stpaul [liet.]', 'minesota'),
(8703, 'Kas 1893 matrado pirmaja anaerobine bakterija, laisvai dirvozemyje gyvenancia azoto fiksatoriu lazdeles pavidalu', 'vinogradskis'),
(8704, 'Stepiu ir dykumu antilope', 'kana'),
(8705, 'Suomiu kompozitorius, pedagogas, 7 simfoniju (tarp ju suomijos, siaures dukters), koncertu smuikui ir fortepijonui su orkestru autorius', 'sibelijus'),
(8706, 'Azurinis nerinys su iskilais storesniu siulu rastais', 'gipiuras'),
(8707, 'Sintetinio kauciuko rusis', 'buna'),
(8708, 'Ispanu konkistadoras, 1521 muzemes acteku valstybes sostine tenoctilana', 'kortesas'),
(8709, 'Kiek apytiksliai cm yra didziausio pasaulyje [rafflesia arnoldii augalas] ziedo skersmuo', '100'),
(8710, 'Iskalbos teorija, menas itikinti diskursu', 'retorika'),
(8711, 'Visuma principu, paziuru ir isitikinimu, apsprendzianciu atskiro zmogaus, socialines grupes arba visos visuomenes veiklos krypti ir santyki su tikrove', 'pasauleziura'),
(8712, 'Gaisrinio dumu detektoriaus tipas, fiksuojantis nematomas dispersines dumu daleles', 'jonizacinis'),
(8713, 'Didelis zemdirbystes ukis ar zemes plotas tam tikriems augalams auginti', 'plantacija'),
(8714, 'Salis, pirmoji pasaulio futbolo cempione', 'urugvajus'),
(8715, 'Baltas sausas vynas', 'rislingas'),
(8716, 'Autorystes nustatymas, kai kurinys anonimiskas ar parasytas pseudonimu, taip pat literaturiniu mistifikaciju atvejis', 'atribucija'),
(8717, 'Pagrindine smulkiaburzuazine rusijos socialdemokratijos srove, tarptautinio oportunizmo atmaina', 'mensevizmas'),
(8718, '\"kavotis\" lietuviskai', 'sleptis'),
(8719, '10 dienu laikotarpis', 'dekada'),
(8720, 'Gyvunas, augalas arba jo dalis, parengta anatominiam, histologiniam arba kitokiam tyrimui', 'preparatas'),
(8721, 'Siaures amerikos indenu auksciausias dievas', 'manitu'),
(8722, 'Isrinktas arba paskirtas valstybes, partijos, kolektyvo atstovas, igaliotas atstovauti ju interesams konferencijoje, posedyje, derybose', 'delegatas'),
(8723, 'Austru kompozitorius, kuri antrojo pasaulinio karo pabaigoje 1945 matsitiktinai nusove jav kareivis [liet.]', 'vebernas'),
(8724, 'Tebu karaliaus lajo sunus, likimo lemimu nuzudes savo teva ir vedes motina', 'edipas'),
(8725, 'Kiek dienu gyvena namine muse', '14'),
(8726, 'Amoniako oksidavimas iki nitratu', 'nitrifikacija'),
(8727, 'Linu grudai', 'semenys'),
(8728, 'Siaurine poliarine zemes rutulio dalis', 'arktis'),
(8729, 'Marskiniai kitaip', 'baltiniai'),
(8730, 'Legendinis kareivis, aprasytas ceku rasytojo haseko', 'sveikas'),
(8731, 'Nosies landa', 'snerve'),
(8732, 'Diena ir naktis', 'para'),
(8733, 'Turincios ypatinga komercini pasisekima knygos apibudinimas', 'bestseleris'),
(8734, 'Kuriais metais zlugo vakaru romos imperija', '476'),
(8735, 'Jav gyventojas, multimilijonierius, pirmasis kosmoso turistas [orig.]', 'tito'),
(8736, 'Liettelegramu agentura', 'elta'),
(8737, 'Japonu puoksciu darymo menas', 'ikebana'),
(8738, 'Panevezio alaus darykla', 'kalnapilis'),
(8739, 'Tragikas, tragediju \"persai\", \"prikaltasis prometejas\", trilogijos \"oresteja\" autorius', 'aischilas'),
(8740, '46-a valstija, prijungta prie jav 16.11.1907 m., sostine oklahoma sitis [liet.]', 'oklahoma'),
(8741, 'Griezta kaltinamoji kalba', 'filipika'),
(8742, 'Arciausiai vilniaus esanti kitos valstybes sostine', 'minskas'),
(8743, 'Saturno palydovas, pavadintas graiku titanides, gajos ir urano dukters, okeano sesers ir zmonos, vardu', 'tetija'),
(8744, 'Kiek kilogramu sveria diskas, kuri meta moterys per lengvosios atletikos varzybas', '1'),
(8745, 'Australijai priklausanti sala, kurios pavadinimas yra toks kaip ir zymiausios ziemos sventes', 'kaledu'),
(8746, 'Tarptautine vaiku gynimo diena', 'birzelio 1'),
(8747, 'Issifruokite vgtu', 'vilniaus gedimino'),
(8748, 'Preriju vilkas', 'kojotas'),
(8749, 'Nobelio fizikos premijos laureatas 1962m., apdovanotas uz medziagu, ypac skysto helio kondensacijos teorija', 'landau'),
(8750, 'Zoro deveta kauke', 'domino'),
(8751, 'Atskirai stovinti italu baznycios varpine', 'kampanile'),
(8752, 'Svmergeles marijos, laikancios ant keliu mirusio kristaus kuna, ivaizdis susiformaves daileje', 'pieta'),
(8753, 'Desnis, teigiantis, kad pasiula sukuria paklausa', 'sejaus'),
(8754, 'Telekomunikaciju kompanija, pagaminusi mobiliu telefonu modelius: one touch easy, one touch club, one touch club +, one touch max', 'alcatel'),
(8755, 'Italu jurininkas, keliautojastarnavo anglijojeieskodamas vakaru juru kelio i kinija ir indija, 1497matrado keip bretono sala, niufaundlenda ir labradora [liet.]', 'kabotas'),
(8756, 'Kedainiu trasu gamykla', 'lifosa'),
(8757, 'Valdymo forma san marine', 'parlamentine respublika'),
(8758, 'Salis, kurioje pagaminama daugiausia branduolinio kuro vienam asmeniui', 'lietuva'),
(8759, 'Jojamuju arkliu veisle, kurios pavadinimas susijes su trakais', 'trakenai'),
(8760, 'Filologijos saka, tirianti kalbos priemoniu vartojimo tikslinguma', 'stilistika'),
(8761, 'Zemynine valstybe rytu europoje, tarp lenkijos, ukrainos, rusijos, latvijos ir lietuvos, kartais dar vadinama gudija', 'baltarusija'),
(8762, 'Letas, siek tiek greitesnis uz largo muzikinis tempas', 'lento'),
(8763, 'Islamo teologijos terminas, kuriuo vadinamos penkios svarbiausios kiekvieno musulmono pareigos: sahada, salatas, saumas, zakiatas ir chadzas', 'arkanas'),
(8764, 'Izraelio kolektyvinio zemes ukio imone ir jos gyvenviete', 'kibucas'),
(8765, 'Ezeras i kuri iteka volgos upe', 'kaspijos'),
(8766, 'Bolivijos pagrindinis pinigas', 'bolivianas'),
(8767, 'Ploni spalvoti vilnoniai siuvinejimo ir audimo siulai', 'krevele'),
(8768, 'Sviesos kvantas', 'fotonas'),
(8769, 'Geometrijos \"tevas\"', 'euklidas'),
(8770, 'Lietuvos valdovas, valdes pries gedimina', 'vytenis'),
(8771, 'Indostano ir ceilono elnias', 'aksis'),
(8772, 'Lazda arba lenta uzuolaidoms pakabinti', 'karnizas'),
(8773, 'Dauba tarp lukjanovkos ir syreco gyvenvieciu (dabar kijevo miesto teritorijoje, ukrainoje), kur 1941 mrudeni vokieciai susaude apie 70 tukstzmoniu, o paskui irenge mirties stovykla', 'babij jaras'),
(8774, 'Kanados eskimu trobele', 'iglas'),
(8775, 'Nepiktybinis ploksciojo arba pereinamojo epitelio navikas', 'papiloma'),
(8776, 'Koordinates antroji isvestine laiko atzvilgiu', 'pagreitis'),
(8777, 'Muzikinio kurinio fraziu zymejimas, daromas autoriaus ar redaktoriaus', 'frazuote'),
(8778, 'Balneologinis, purvo terapijos ir kalnu klimato kurortas rumunijos siaures rytuose', 'borsekas'),
(8779, 'Kaip vadinama operacija, kurios metu yra uzblokuojami latakai, kuriais sperma is seklidziu patenka i slaple', 'vazektomija'),
(8780, 'Kas parase romanu serija \"forsaitu saga\"', 'golsvortis'),
(8781, 'Vilku vadas, globojes maugli', 'akela'),
(8782, 'Nuolat baramas', 'ujamas'),
(8783, 'Stiebas be lapu', 'stabaras'),
(8784, 'Kas parase romana \"bajoru gusta\"', 'turgenevas'),
(8785, 'Virvine pyne drabuziams, uzuolaidoms, minkstiems baldams apdailinti', 'agramantas'),
(8786, 'Lietuviu poete ir dramaturge, isleidusi eilerasciu rinkinius \"zydintis speigas\", \"pusiausvyra\" ir kt., keleta knygu vaikams, pjesiu', 'skucaite'),
(8787, 'Kas sukure zodi \"krastotyra\"', 'vireliunas'),
(8788, 'Cepelinai kitaip', 'didzkukuliai'),
(8789, 'Meteoroido liekana, nukritusi ant zemes, kitos planetos ar jos palydovo', 'meteoritas'),
(8790, 'Rusas, 1970 mnobelio literaturos premijos laureatas', 'solzenicynas'),
(8791, 'Lietuviu vakaro sutemu (prieblandos) deive', 'zleja'),
(8792, 'Nedidelis motorlaivis zuklauti juroje gaubiamaisiais tinklais arba tralu', 'seineris'),
(8793, 'Organizmu strukturos bei gyvybines veiklos principu panaudojimo technikoje tyrimas', 'bionika'),
(8794, 'Rusu kompozitorius, operu, kuriniu simfoniniam orkestrui, fortepijonui (tarp ju \"parodos paveiksleliai\") autorius', 'musorgskis'),
(8795, 'Aukstas, tarp langu ar duru pastatomas veidrodis', 'triumo'),
(8796, 'Cheminis elementas, kurio simbolis \"i\" [numeris 53]', 'jodas'),
(8797, 'Reiskinys, kada matome daiktus esancius akyje', 'entoptinis'),
(8798, 'Islamo \" sostine \"', 'meka'),
(8799, 'Mitu rinkimas, tvarkymas ir viso mitinio palikimo apibendrinimas', 'mitografija'),
(8800, 'Vyskupo, abato paskyrimas eiti baznytines pareigas, kartu duodant valdyti pasaulietini turta (lena)', 'investitura'),
(8801, 'Spalvos sudariusios mazosios lietuvos veliava: zalia raudona ir ...', 'balta'),
(8802, 'Lygintuvas kitaip', 'laidyne'),
(8803, 'Gaivinantis alkoholinis gerimas is baltojo vyno, cukraus ir svieziu vaisiu', 'krusonas'),
(8804, 'Metrinio eiliavimo forma, kai eilute susideda is sesiu pedu - daktiliu ir spondeju', 'hegzametras'),
(8805, 'Dideles mases ir dideliu matmenu saltas kosminis kunas, skriejantis aplink zvaigzde', 'planeta'),
(8806, 'Kristu isdaves mokinys', 'judas'),
(8807, 'Didysis dangaus sferos apskritimas, kuri per metus nubrezia saules skritulio centras', 'ekliptika'),
(8808, 'Mediniu dirbiniu inkrustacija is kitos spalvos medzio gabalu', 'intarsija'),
(8809, 'F-1 trasa belgijoje', 'spa'),
(8810, 'Kelintais metais ikurta lietuvos demokratu partija', '1902'),
(8811, 'Darzove, turinti daug karotino', 'morka'),
(8812, '1 - oji graiku abeceles raide', 'alfa'),
(8813, 'Paprasciausias telegrafo aparatas, kuriuo morzes kodo zenklai priimami is klausos', 'klopferis'),
(8814, 'Tam tikras istatymo aptartas igaliojimas atstovauti imonei, sudarineti jos vardu sandorius', 'prokura'),
(8815, 'Automobiliu gamintojas isleides siuos modelius: carisma, galant', 'mitsubishi'),
(8816, 'Apatinis saules ir zvaigzdziu atmosferos sluoksnis, is kurio isspinduliuojama daugiausia sviesos', 'fotosfera'),
(8817, 'Zymiausias ispanijos muziejus', 'prado'),
(8818, 'Skystis, esantis burnoje', 'seiles'),
(8819, 'Xix arusu rasytojas, romanu \"tevai ir vaikai\", \"dumai\", \"rudinas\" ir ktautorius', 'turgenevas'),
(8820, 'Kelintais metais buvo israstos mechanines audimo stakles', '1875'),
(8821, 'Penkta pagal auksti kalva lietuvoje', 'pavistycio'),
(8822, 'Rusu dailininkas - peizazistas, kuriniu \"auksinis ruduo\", \"kovas\" autorius', 'levitanas'),
(8823, 'Latvijos nepriklausomybes diena', 'lapkricio 18'),
(8824, 'Tropiku pauksciai, atvedantys bitedi opsru arba zmogu prie medzio, kuriame yra biciu (kad siems paemus bites ar medu ramiai galetu sulesti biciu perus) [dgs.]', 'medrodziai'),
(8825, 'Pilietybes igijimas pagal nacionalini principa - vaikai igyja tevu pilietybe', 'filiacija'),
(8826, 'Marcios turtas', 'pasoga'),
(8827, 'Kokia grupe atstovavo lietuvai eurovizijoje 2001m', 'skamp'),
(8828, 'Graiku karvedys didvyriskai kovesis su turkais termopilu tarpeklyje', 'leonidas'),
(8829, 'Baskirijos sostine', 'ufa'),
(8830, 'Iskedentas pluostas', 'vata'),
(8831, 'Ispanijoje ar lotynu amerikoje partizanu karo veiksmai', 'gerilja'),
(8832, 'Kuno geba atlikti darba, t.ypakeisti kito kuno busena', 'energija'),
(8833, 'Kaip vadinosi kompanijos \"western electric\" sukurta pirmoji pasaulyje garso sinchronizavimo su kino juosta sistema', 'vitaphone'),
(8834, 'Architekturos arba dailes kurinio, rankrascio, senienos atnaujinimas, pirmykstes bukles atkurimas', 'restauracija'),
(8835, 'Patiekalas, kurio pagrindinis komponentas ryziai, taip pat ieina mesa, morkos, pomidoru padazas', 'plovas'),
(8836, 'Arklio aprangos dalis, raitelio pasedas', 'balnas'),
(8837, 'Korano papildymas', 'suna'),
(8838, 'Desimtoji belo dalis', 'decibelas'),
(8839, 'Singapuro sostine', 'singapuras'),
(8840, 'Romenu kariuomenes legionu vadai, pasiuntiniai [dgs.]', 'legatai'),
(8841, 'Lietuviu kilmes 1794 msukilimo pries rusija vadovas, veliau kovojes jav nepriklausomybes kare', 'kosciuska'),
(8842, 'Vienas is bakteriju patogeniskumo faktoriu, apsprendziantis ju lengva patekima i makrofagus ir endoteliocitus', 'internalinas'),
(8843, 'Socialistinese valstybese pareigu, i kurias skirdavo komunistu partiju vadovybe, sarasas', 'nomenklatura'),
(8844, 'Pridetine bure, isskleidziama salia rejines bures, kai pucia nestiprus palankus vejas', 'lizelis'),
(8845, 'Kelintais metais panaikinta baudziava rusijos imperijoje', '1861'),
(8846, 'Brangakmeniu raizymas', 'gliptika'),
(8847, 'Netiketas ivykis, reiskinys, is pirmo zvilgsnio priestaraujantis sveikai logikai', 'paradoksas'),
(8848, 'Tituluociausias ukrainos futbolo klubas', 'dinamo'),
(8849, 'Tam tikros ligu grupes profilaktikos, gydymo ir ligoniu prieziuros istaiga', 'dispanseris'),
(8850, 'Simpsonu sunus', 'bartas'),
(8851, 'Turto kaupimas vertinguju metalu forma', 'tezauravimas'),
(8852, 'Mokslas apie augalu ziedadulkes ir sporas', 'palinologija'),
(8853, 'Danu mokslininkas atrades elektromagnetizma', 'erstedas'),
(8854, 'Pastovus, didelio masto sezoninis vejas, kurio kryptis 2 kartus per metus pasidaro priesinga', 'musonas'),
(8855, 'Nedidele puosni uzrakinama spintele svcsakramentui laikyti, kataliku baznyciose statoma didziojo altoriaus viduryje', 'tabernakulis'),
(8856, 'Kokia firma pagamino pirmaja garsajuoste', 'philips'),
(8857, 'Erotines lyrikos globeja', 'erata'),
(8858, 'Turistu palydovas, supazindinantis juos su miesto ar vietoves izymybemis', 'gidas'),
(8859, 'Samerikos indenu apavas', 'mokasinai'),
(8860, 'Citokinai, produkuojami makrofagu ir kitu mononukleariniu leukocitu', 'monokinai'),
(8861, 'Daugiausia fizine veikla, skirta varzymuisi, laisvalaikio praleidimui', 'sportas'),
(8862, 'Filosofijos kryptis, kuri dvasia, samone, ideja laiko pirminiu dalyku, o materija, gamta - antriniu', 'idealistine'),
(8863, 'Gyventoju nykimas', 'depopuliacija'),
(8864, 'Lietuviu rasytojas, romanu \"miskais ateina ruduo\", \"isejusiems negrizti\" autorius', 'katiliskis'),
(8865, 'Bokstas prie mecetes', 'minaretas'),
(8866, 'Nuosali vietove apalacu kalnuose (jav merilendo valstijoje), netoli vasingtono; nuo 1942 mjav prezidento rezidencija', 'kemp deividas'),
(8867, 'Vienintele pasaulio valstybe pavaizduota savo salies veliavoje', 'kipras'),
(8868, 'Arciausiai musu galaktikos esanti galaktika', 'didysis magelano'),
(8869, 'Kur buvo israsta pirmoji kosmetika', 'egipte'),
(8870, 'Artilerijos sviedinio arba minos sprogimas po zeme, neisrausiant zemiu', 'kamufletas'),
(8871, 'Virsutinis drabuzis, saugantis nuo lietaus ir vejo', 'apsiaustas'),
(8872, 'Veikalas, kuriame tacitas 98 mpirma karta pamini aiscius', 'germanija'),
(8873, 'Korsikos ir sardinijos salu kai kuriu gyventoju paprotys - kraujo kerstas uz nuzudyta giminaiti', 'vendeta'),
(8874, 'Vingiuoti, medziais apsodinti parko takai, vedantys i aikste su fontanu', 'labirintas'),
(8875, 'Ldk, lietuvos dvaru ir kleboniju vyriausioji namu ukio priziuretoja ir darbu tvarkytoja', 'akmistrine'),
(8876, 'Apvalkalelis, i kuri idaromi nemalonaus kvapo ar skonio vaistai', 'kapsule'),
(8877, 'Prabangus, gausiai dekoruotas karstas', 'sarkofagas'),
(8878, 'Laikini popieriniai pinigai, kuriuos leidzia vietine valdzia ar istaigos', 'bonai'),
(8879, 'Salis, kurioje pradejo veikti pirmasis slidininku keltuvas', 'vokietija'),
(8880, 'Visuomenes dvasinio gyvenimo, zmoniu veiklos, kurybos, galvosenos supasaulietejimas', 'sekuliarizacija'),
(8881, 'Senoves romos pareigunas, kriminaliniu bylu tyrejas', 'kvestorius'),
(8882, 'Kuriais metais pasirode dvd formatas', '1995'),
(8883, 'Seniausias biblinis zydu patriarchas, laikomas ju proteviu, gerbiamas judeju, krikscioniu ir musulmonu, besalygisko paklusnumo ir dievobaimingumo simbolis', 'abraomas'),
(8884, 'Elektrinio motoro isradejas', 'faradejus'),
(8885, 'Kaip vadinamas zmogaus odos sluoksnis, jungiantis oda su po ja esanciais audiniais', 'poodis'),
(8886, 'Kada svenciama 3 karaliu svente', 'sausio 6'),
(8887, 'Senu zmoniu valdzia pirmyksteje bendruomeneje', 'gerontokratija'),
(8888, 'Kanados simbolis', 'klevas'),
(8889, 'Lietuviu rasytojas, apsaku rinkiniu \"neprasidejusi svente\", \"isibroveliai\", \"nubaustieji\", romanu \"vilniaus pokeris\", \"vilniaus dziazas\", \"paskutinioji zmoniu karta\", \"jauno zmogaus memuarai\", \"paskutinioji zemes zmoniu karta\" autorius', 'gavelis'),
(8890, 'Vienintele valstybe, kurios veliavos forma yra du trikampiai', 'nepalas'),
(8891, 'Sviesos stiprumo vienetas', 'kandela'),
(8892, 'Koks jav miestas yra vadinamas mazaja havana', 'majamis'),
(8893, 'Kietas suris', 'cederis'),
(8894, 'Skobtine valtis', 'luotas'),
(8895, 'Ruosinio arba jo dalies ilginimo operacija, mazinant skerspjuvio plota', 'istesimas'),
(8896, 'Muskietomis ginkluoti kariai', 'muskietininkai'),
(8897, 'Cekisko alaus sostine', 'pilzenas'),
(8898, 'Gruzinu daina', 'suliko'),
(8899, 'Mineralogijos saka, mokslas, tiriantis brangakmenius', 'gemologija'),
(8900, 'Vaisine musele', 'drozofila'),
(8901, 'Romenu mitologijoje - medziokles ir misku deive', 'diana'),
(8902, 'Nyderlandu (olandijos) oro linijos', 'klm'),
(8903, 'Pietryciu azijos valstybiu ekonominis ir kulturinis susivienijimas', 'asean'),
(8904, 'Japoniskas automobilis, kurio pavadinimas kaip ir dievo', 'mazda'),
(8905, 'Penktas pagal dydi zemynas, issidestes aplink pietu asigali', 'antarktida'),
(8906, 'Esantis anapus pasaulio, neprieinamas patyrimui, esanstis uz samones ir pazinimo ribu', 'transcendentiskas'),
(8907, 'Administracinis teritorinis vienetas - grafo valda', 'grafyste'),
(8908, 'Skersvejis barbariskai', 'ciongas'),
(8909, 'Baltijos taikos palaikymo batalionas', 'baltbat'),
(8910, 'Pedagoginio poveikio, auklejimo priemone sazines isgyvenimams sukelti asmeniui, pazeidusiam bendro gyvenimo arba sportinio rezimo norma', 'bausme'),
(8911, 'Kompiuterio perkrovimo mygtukas', 'reset'),
(8912, 'Zynys, skelbiantis pranasyste', 'orakulas'),
(8913, 'Literaturos zanras, kuriam priskiriami trumpi komiski kuriniai, paprastai parasyti proza', 'humoreska'),
(8914, 'Laplandijos tauta', 'lapiai'),
(8915, 'Vezuvijaus uzlietas miestas', 'pompeja'),
(8916, 'Olandu fizikas, svytuoklinio laikrodzio isradejas [17a.]', 'heigensas'),
(8917, 'E.barouzo sukurtas personazas', 'tarzanas'),
(8918, 'Graiku mitologijoje - medziokles deive', 'artemide'),
(8919, 'Kiek kalbu indijos konstitucija pripazista oficialiosiomis', '15'),
(8920, 'Vaikas turintis kokiu nors neeiliniu gabumu', 'vunderkindas'),
(8921, '8-a valstija, prijungta prie jav 23.05.1788 m., sostine kolambija: pietu ..[liet.]', 'karolina'),
(8922, 'Apvali, veliau pusapvale sokiu aikstele chorui graiku teatre', 'orchestra'),
(8923, 'Potvynio uzliejama juros pakrantes zona', 'litorale'),
(8924, 'Ketinti padaryti ka nors pikta', 'kesintis'),
(8925, 'Atminties apgaule, klaidinantis suvokimas - zmogus, budamas naujoje, nezinomoje vietoje, tariasi cia jau buves, niekada nematyta objekta laiko matytu, negirdetus zodzius - girdetais', 'deja vu'),
(8926, 'Masina medui is koriu sukti', 'medsukis'),
(8927, 'Pozicinis, nejudrus kariavimo budas, kai puolimo ir gynybos isgales apylyges', 'apkasu karas'),
(8928, 'Kaikuriu burzuaziniu valstybiu, pvzjav parlamento aukstieji rumai', 'senatas'),
(8929, 'Karaliaus kede', 'sostas'),
(8930, 'Sovinio tuta', 'gilze'),
(8931, 'Atminimui isigyjami arba gaunami dovanu nedideli dailus daiktai', 'suvenyrai'),
(8932, 'Sausa zole', 'sienas'),
(8933, 'Senoves graiku mitines pabaisos; gresmes ir baisumo simbolis', 'gorgonos'),
(8934, 'Rajonas i pietus nuo san francisko kalifornijoje, jungtinese valstijose, kur isikure daugybe bendroviu, susijusiu su elektronika ir kompiuteriais', 'silicio slenis'),
(8935, 'Televizijos laida (lnk), ieskanti pasimetusiu zmoniu', 'atleisk'),
(8936, 'Grybas, dar vadinamas nemune', 'kelmutis'),
(8937, 'Jura, kurioje yra jamaikos sala', 'karibu'),
(8938, 'Senoves graiku teatro choro vadovas', 'korifejus'),
(8939, 'Gimusiu 10.24d- 11.22dzodiako zenklas', 'skorpionas'),
(8940, 'Noras valgyti ir malonumo jausmas valgant', 'apetitas'),
(8942, 'Triju daliu tapybos, grafikos dailes kurinysdalys tarpusavyje susijusios bendra tematika', 'triptikas'),
(8943, 'Senoves lietuviu mirusiuju pagerbimo svente, kurias isigalejus krikscionybei pakeite velines', 'ilges'),
(8944, 'Populiariausia arabu pavarde', 'ali'),
(8945, 'Xx apradzios prancuzu kompozitorius, \"bolero\" autorius', 'ravelis'),
(8946, 'Susiklosciusios aplinkybes, salygos, padetis, galincios daryti itaka kuriam nors dalykui ar procesui', 'konjunktura'),
(8947, '\"amzinasis miestas\"', 'roma'),
(8948, 'Vestgotu baznytinis veikejas', 'unfilas'),
(8949, 'Is kito galo \"avansas\"', 'sasnava'),
(8950, 'Daugiausiai gyventoju turinti jav valstija', 'kalifornija'),
(8951, 'Tirpstancio ledyno vandens srautu isplauti latakai sausumos pavirsiuje', 'dubaklonis'),
(8952, 'Plesri karpine zuvis', 'salatis'),
(8953, 'Andoros kunigaikstystes administracinis vienetas', 'parapija'),
(8954, 'Dezute ar lagaminelis smulkiems tualeto, siuvimo ir kt, reikmenims', 'neseseras'),
(8955, 'Tikroji stalino pavarde', 'dziugasvilis'),
(8956, 'Burimui naudojamos kavos liekanos', 'tirsciai'),
(8957, 'Statybine plokste', 'blokas'),
(8958, 'Kraujo kresulys, susidares kraujagysleje', 'trombas'),
(8959, 'Eiluciu pabaigu, kartais puseiliu saskambis', 'rimas'),
(8960, 'Anglu kompozitorius, nacionalines operos pradininkas, vargonininkas, klavesinistas', 'perselas'),
(8961, 'Auksciausia reitinga turintis lietuvos sachmatininkas', 'rozentalis'),
(8962, 'Lazdeliu pavidalo bakterijos', 'bacilos'),
(8963, 'Kiek valanda turi sekundziu', '3600'),
(8964, 'Mokslininkas, susitemines augalu ir gyvunu pasauli ir pirmasis pavartojes binarine nomenklatura', 'linejus'),
(8965, 'Graiku mitologijoje - pergales deive', 'nike'),
(8966, 'Paaukstina aisktele (platforma) gelezinkelio, autobusu stotyje, uoste keleiviams ilipti arba islipti, kroviniams krauti', 'peronas'),
(8967, 'Automobiliu gamintojas isleides siuos modelius: omega, zafira, agila', 'opel'),
(8968, 'Tarptautine automobiliu federacija', 'fia'),
(8969, 'Sunki ligonio bukle', 'koma'),
(8970, 'Liejinio turio ir matmenu mazejimas kietejant ir austant jo metalui', 'subegimas'),
(8971, 'Slove, geras vardas', 'garbe'),
(8972, 'Lietmitologine dievybe, susijusi su kiaulemis', 'priparsis'),
(8973, 'Tinkline struktura, sudaryta is lasteliu, kontaktuojanciu tarpusavyje citoplazmos ataugelem', 'sincitijus'),
(8974, 'Istaiga, aprupinanti kariuomene', 'intendantura'),
(8975, 'Sodzius kitaip', 'kaimas'),
(8976, 'Slapiu dirvu nusausinimas', 'melioracija'),
(8977, 'Romos gyventojai, broliai, kurie norejo gelbeti zlungancia romos imperija ivesdami naujas reformas taciau jie buvo nuzudyti', 'grakhai'),
(8978, 'Pirmoji juodaode teiseja prisaikdinta jav cikagos municipalinio teismo [orig.]', 'sampson'),
(8979, 'Zynys, isaiskines gedimino sapna apie gelezini vilka', 'lizdeika'),
(8980, 'Sarvuotas laivas ar automobilis', 'sarvuotis'),
(8981, 'Prancuzas, 1797 mpirma karta sekmingai ismegines parasiuta: andre zakas ..[liet.]', 'garnerinas'),
(8982, 'Kaip liliputu salies gyventojai pramine guliveri', 'kvinbas flestrinas'),
(8983, 'Visi kilmingieji romos miesto gyventojai, turintys ivairiu privilegiju', 'patricijai'),
(8984, 'Akies obuolio dalis, kuriame yra sviesai jautrios lasteles', 'tinklaine'),
(8985, 'Medziokles isvyka afrikoje', 'safaris'),
(8986, 'Zemes ukio saka; zemes ukio gyvuliu, pauksciu, biciu, zuvu laikymas ir auginimas', 'gyvulininkyste'),
(8987, 'Akmuo, kuriam anot graiku mito, dievas dionisas suteike galia tramdyti zemas aistras ir apsaugoti nuo girtuoklystes', 'ametistas'),
(8988, 'Menine tematika, zanru, kompozicija, technika susijusiu to paties autoriaus dailes kuriniu grupe, turinti bendra pavadinima', 'ciklas'),
(8989, 'Zvaigzdes sprogimas', 'supernova'),
(8990, 'Viduramziu riteriu varzybos', 'turnyras'),
(8991, 'Marksizmo pradininkas', 'marksas'),
(8992, 'Sudedamoji dalis, demuo', 'sandas'),
(8993, 'Kuriais metais pagamintas pirmasis automobilis su garo varikliu', '1769'),
(8994, 'Planeta, kuri turi didziaja raudonaja deme', 'jupiteris'),
(8995, 'Latvijos kurortas prie baltijos juros', 'jurmala'),
(8996, 'Vokiecio isradejo fon zeppelin standzios konstrukcijos dirizablis', 'cepelinas'),
(8997, 'Neturintis savarankiskos reiksmes', 'asemantinis'),
(8998, 'Zemiausias balsas (parastai tenoras) aukstuju balsu chore xvii a.', 'basetas'),
(8999, 'Kaip vadinama jav prezidento zmona', 'pirmoji ledi'),
(9000, 'Elektros sroves galingumo vienetas', 'vatas'),
(9001, 'Senoves graikijos moneta', 'stateras'),
(9002, 'Egiptieciu mitologijoje - sventas deives hatoros akmuo', 'malachitas'),
(9003, 'Butano sostine', 'timpu'),
(9004, 'Aklosios zarnos ataugos uzdegimas', 'apendicitas'),
(9005, 'Ssrs saugumo organu (vck, ogpu, nkvd, mgb, kgb) centrinio aparato pavadinimas snekamojoje kalboje', 'lubianka'),
(9006, 'Dabartine latvijos ir estijos teritorija, kurioje xii apabaigoje ir xiii abuvo isikures kalavijuociu ordinas', 'livonija'),
(9007, '7-a labiausiai urbanizuota pasaulio salis (92% miesto gyv.)', 'izraelis'),
(9008, 'Veikla, siekianti suteikti asmeniui brandaus savarankisko gyvenimo pagrindus ir padeti jam tobulinti savo gebejimus visa gyvenima', 'svietimas'),
(9009, 'Marska, pala lovai uztiesti', 'lovatiese'),
(9010, 'Miestas, laikomas italijos renesanso centru', 'florencija'),
(9011, 'Seniausias rezervatas ikurtas tado ivanausko 1937m.', 'zuvintas'),
(9012, 'Kalvio reikmuo, ant kurio dedamas ikaitintas metalas', 'priekalas'),
(9013, 'Koks vardas pagal 2001 mstatistika buvo dazniausiai duodamas jav gimusiems berniukams [liet.]', 'jokubas'),
(9014, 'Lietuviu javu dievas, minimas jezuitu pranesimuose 1605 m.', 'nosolus'),
(9015, 'Senegalo sostines dakaro simbolis', 'baobabas'),
(9016, 'Desimta pagal dydi lietuvos giria', 'birzu'),
(9017, 'Saugiausias pasaulyje kalejimas, isikures kolorado valstijoje, jav', 'supermax'),
(9018, 'Mokslas, tiriantis metalu gavybos is rudos ir ktmedziagu budus, metalu ir lydiniu chemine sudeti ir struktura', 'metalurgija'),
(9019, 'Salis, kurioje surengtos pirmosios akademinio irklavimo varzybos', 'anglija'),
(9020, 'Prietaisas temperaturai matuoti', 'termometras'),
(9021, 'Lotynu kalbos zodis, is kurio kilo karietos pavadinimas (orig.)', 'carruca'),
(9022, 'I stala istumiama deze', 'stalcius'),
(9023, 'Iteikiamas baigus mokykla', 'atestatas'),
(9024, 'Kokiais skaiciais prasideda nyderlandu (olandijos) bruksninis prekinis kodas', '87'),
(9025, 'Siaurine namibijos kaimyne', 'angola'),
(9026, 'Prancuzu komedijos personazas - tarnaite', 'subrete'),
(9027, 'Mokslas apie vidaus ligas ir ju gydyma', 'terapija'),
(9028, 'Gudri kaip ...', 'lape'),
(9029, 'Vidutinis trachejos ilgis [cm]', '12'),
(9030, 'Ginkluotoju pajegu rengimo karui teorija ir praktika, karo planavimas ir kariavimas', 'strategija'),
(9031, 'Dariniai, kuriuos atnese ir sukloste tirpstantis senovinis zemyninis ledynas', 'morena'),
(9032, 'Ka tyrineja petrologai', 'uolienas'),
(9033, 'Kriminalistinis delno odos pavirsiaus tyrimas, padedantis identifikuoti asmeni', 'palmoskopija'),
(9034, 'Prancuzijoje - feodaliniais laikais - paveldima valstieciu zeme', 'cenzyva'),
(9035, 'Religine knyga, kurioje aprasoma kristaus kancia, sventuju, baznycios kankiniu gyvenimas ir mirtis', 'pasionalas'),
(9036, 'Dvasininku, daugiausia vienuoliu, privaloma viengungyste', 'celibatas'),
(9037, 'Astuoniu eiluciu, dvieju rimu kanonisko rimavimo eilerastis, kurio pirmoji eilute sutampa su septintaja, antroji su astuntaja', 'trioletas'),
(9038, 'Baro patarnautojas', 'barmenas'),
(9039, 'Duobagyviu kuno sieneles isorinis lasteliu sluoksnis', 'ektoderma'),
(9040, 'Vyru normalios lytines funkcijos sutrikimas', 'impotencija'),
(9041, 'Netikes, issiblaskes zmogus', 'neveksla'),
(9042, 'Maziausia medziagos dalele, galinti egzistuoti savarankiskai', 'molekule'),
(9043, 'Xvii a18-metis jaunuolis sukonstraves mechanine skaiciavimo masina ir pagamines 50 vis tobulesniu jos modeliu', 'paskalis'),
(9044, 'Teologija, apibudinanti dieva neigiamaisiais apibrezimais', 'apofatine'),
(9045, 'Specialus gimnastikos pratimai, atliekami ant ratu begancio zirgo', 'voltiziravimas'),
(9046, 'Kvapu jusle', 'uosle'),
(9047, 'Gyvu mikroorganizmu ileidimas i augalo ar gyvuno organizma, mitybine terpe, dirvozemi', 'inokuliacija'),
(9048, 'Gydymas radioaktyviaisiais spinduliais, naikinant kenksmingas lasteles, pvz vezio', 'radioterapija'),
(9049, 'Centrines afrikos respublika', 'car'),
(9050, 'Operacijos vykdymo suskaidymas i atskirus etapus procesoriuje', 'konvejerizavimas'),
(9051, 'Socialine aplinka', 'sociumas'),
(9052, 'Nesciuju ir gimdyviu slauge', 'akusere'),
(9053, 'Zymiausias lietuvos akrobatinio skraidymo meistras', 'kairys'),
(9054, 'Uolienu formos ir turio arba tik vieno kurio ju kitimas, veikiant isorinems jegoms', 'deformacija'),
(9055, 'Cheminis elementas, kurio simbolis \"no\" [numeris 102]', 'nobelis'),
(9056, 'Ant sportiniu zaidimu aikstes abieju galiniu liniju statomas atviras i aikste staciakampis taikinys, i kuri reikia pataikyti zaidimo iranki (kamuoli, rituli, rieduli) per pratybas ar rungtynes', 'vartai'),
(9057, 'Parase vejo nunesti', 'mitchel'),
(9058, 'Lele teatre', 'marionete'),
(9059, 'Pareigunas, konsultuojantis tam tikrais klausimais', 'referentas'),
(9060, 'Kiek minuciu trunka vienas kumstinio (faustbolo) kelinys', '15'),
(9061, 'Matmuo, dydis, turis erdveje', 'dimensija'),
(9062, 'Poetas, eilerasciu rinkinio \"eiles\", poemu \"du sunes\", \"linksmieji valkatos\" autorius (liet.)', 'bernsas'),
(9063, 'Kraujo issiliejimas i perikardo ertme, paprastai mirtina miokardo infarkto komplikacija: sirdies ...', 'tamponada'),
(9064, 'Kinijos politine partija, valdziusi sia sali 1928 -1949 m.', 'gomindanas'),
(9065, 'Kuriais metais pagaminta pirmoji juodaode lele barbe', '1967'),
(9066, 'Tikrojo pavadinimo pakeitimas aprasomuoju nusakymu', 'perifraze'),
(9067, 'Filosofas, sokrato mokinys, filosofijos mokyklos akedemijos ikurejas, ideju teorijos, veikalo \"valstybe\" autorius', 'platonas'),
(9068, 'Lamaizme - lamos pavaduotojas', 'pancelama'),
(9069, 'Pradine musulmonu parapine mokykla', 'mektebe'),
(9070, 'Zvaigzdynas, kuriame plika akimi is lietuvos yra matoma galaktika [vard.]', 'andromeda'),
(9071, 'Pirmasis lietuvos karalius', 'mindaugas'),
(9072, 'Pabaiges kadencija senoves romos konsulas', 'konsularas'),
(9073, 'Vienas is dvylikos jezaus apastalu, kurio atributai yra du raktai, gaidys ir knyga', 'petras'),
(9074, 'Nupirktas daiktas', 'pirkinys'),
(9075, 'Didziuliai tankus kserofitiniu, paprastai viszaliu krumu bruzgynai sausringuose australijos rajonuose', 'skrebas'),
(9076, 'Uzbaikite a.stivenso minti mergaites moterimis pavercia gamta, o berniukus vyrais turi paversti ...', 'visuomene');
INSERT INTO `vikte_klsm` (`id`, `klsm`, `ats`) VALUES
(9077, 'Laisvas dideles amplitudes judesys pirmyn arba atgal ranka, koja', 'mostas'),
(9078, 'Dailylente, dengianti plysi tarp sienos ir duru arba lango staktos', 'lamperija'),
(9079, 'Kelintais metais isleistas lietuvos statutas, itvirtines baudziava', '1566'),
(9080, 'Kaip chemiskai vadinamas rugimas', 'fermentacija'),
(9081, 'Jauniausia siu laiku olimpiniu zaidyniu individualiuju rungciu cempione (1936 mberlyno olimpiadoje suoliu nuo tramplino varzybose iskovojo aukso medali budama 13 metu ir 268 dienu amziaus) [orig.]', 'gestring'),
(9082, 'Daugumoje pasaulio saliu - vietos savivaldos organas', 'municipalitetas'),
(9083, 'Saturno palydovas, pavadintas senoves romenu dievo, kuris turejo du veidus, ziurincius i priesingas puses ir buvo atsakingas uz visu veiksmu pradzia ir pabaiga, vardu', 'janas'),
(9084, 'Kuria vieta lietuvos krepsinio rinktine uzeme 2004 matenu olimpinese zaidynes?', '4'),
(9085, 'Sengraikijos gimnastikos mokykla 12-13 mberniukams', 'palestra'),
(9086, 'Toks eiliavimas, kai kirtis neturi pastovios, apibreztos vietos eiluteje, eiluciu ilgumas nedesningas, laisvai kinta, svyruoja', 'sinkopis'),
(9087, 'Estu keltas, nuskendes baltijos juroje', 'estonia'),
(9088, 'Kuriais metais pradetas leisti \"varpo\" laikrastis', '1889'),
(9089, 'Stiliaus figura; neiprasta zodziu tvarka sakinyje', 'inversija'),
(9090, 'Povandeninis sklandytuvas: vienvietis velkamas aparatas filmuoti ir stebeti po vandeniu; i vandeni nuleidziamas is laivo ir traukiamas lynu', 'batiplanas'),
(9091, 'Miestas kuriame stovi didziausi bokstai dvyniai', 'kvala lampuras'),
(9092, 'Kokiais skaiciais prasideda suomijos bruksninis prekinis kodas', '64'),
(9093, 'Senoves egiptieciu garbintas paukstis pagal kurio atvaizda buvo sukurti net keli dievai', 'ibis'),
(9094, 'Tebu pranasas, apdovanotas galia keisti savo lyti', 'teiresijas'),
(9095, 'Augalai, gyvenantys ant kitu augalu, bet neparazituojantys juose [dgs.]', 'epifitai'),
(9096, 'Ilgas, neapeiginis dvasininko virsutinis drabuzis', 'sutana'),
(9097, 'Senjoro pavaldinys', 'vasalas'),
(9098, 'Aukstosios mokyklos skyrius, apimantis kuria nors mokslo saka', 'fakultetas'),
(9099, 'Vienos salies piniginio vieneto kaina, isreiksta kitos salies piniginiais vienetais', 'kursas'),
(9100, 'Mikelandzela isgarsinusi statula', 'dovydo'),
(9101, 'Akmeninis ar rastais gristas slaptas kelias per pelke ar ezera', 'kulgrinda'),
(9102, 'Medines, plastikines ar kitokios islenktos pavazos slysti sniegu, pasispiriant lazdomis', 'slides'),
(9103, 'Kuriais metais buvo israsta pirmoji dantu grezimo masina', '1871'),
(9104, 'Cheminis elementas, kurio simbolis \"he\" [numeris 2]', 'helis'),
(9105, 'Skautu saskrydis', 'dzembori'),
(9106, 'Pirmasis lietuviu kalba rases lietuviu istorikas, svietejas', 'daukantas'),
(9107, 'Kokia  lietuvos   popmuzikos  grupe  radijo stoties \"radiocentras\" muzikiniuose apdovanojimuose 2003mbuvo ivertina kaip \"geriausias praejusiuju metu debiutas\"', 'geltona'),
(9108, 'Sventas dievo asklepijaus gyvunas', 'zaltys'),
(9109, 'Musis, kuriame 1805 mzuvo didziosios britanijos laivyno admirolas horeisijus nelsonas', 'trafalgaro'),
(9110, 'Ekonomistas1908-11 mdirbo \"lietuvos ukininko\" redakcijoje, o 1911 memigravo i jav, ten redagavo \"jaunaja lietuva\", \"ateiti\"', 'rimka'),
(9111, 'Lieutovos istojimo i europos sajunga diena', 'geguzes 1'),
(9112, 'Baltijos saliu studentu dainu ir sokiu svente, rengiama estijoje, latvijoje ir lietuvoje paeiliui nuo 1956 m.', 'gaudeamus'),
(9113, 'Lieka suvalgius obuoli', 'grauztukas'),
(9114, 'Ldk didziojo kunigaikscio algirdo ir jo ii zmonos julijonos sunus', 'skirgaila'),
(9115, 'Situacija, kai kokia nors liga staiga suserga daug zmoniu', 'epidemija'),
(9116, 'Piktybiniu naviku atsiradimas', 'kancerogeneze'),
(9117, 'Kas parase pirmaja moksline lietuviu kalbos gramatika', 'sleicheris'),
(9118, 'Katekizmo autorius', 'mazvydas'),
(9119, 'Modernistines dailes kurinys, sukurtas is atskiru daiktu', 'asambliazas'),
(9120, 'Medinis siaudelis su galvute is degamojo misinio', 'degtukas'),
(9121, 'Spektaklis vieno is jo dalyviu garbei', 'benefisas'),
(9122, 'Bosnijos ir hercegovinos sostine', 'sarajevas'),
(9123, 'Is obuoliu gaminamas panasus i brendi gerimas', 'kalvadosas'),
(9124, 'Lietuviu poetas, eilerasciu rinkiniu ilgosios varsnos, atodangos, poringes, bename meile autorius', 'zukauskas'),
(9125, 'Sprogstamoji medziaga, kurios pagrindinis komponentas yra nitroglicerinas', 'dinamitas'),
(9126, 'Komunistu partijos narys', 'komunistas'),
(9127, 'Fdurrenmatt komedija, kurioje jis kritikuoja atomini ginklavimasi', 'fizikai'),
(9128, 'Mokslo reikmenu priemone, kurios viduje yra smaili peiliukai', 'droztukas'),
(9129, 'I navika panasi puslele, pripildyta koses is riebalu ir epitelio lasteliu', 'ateroma'),
(9130, 'Lektuvo, laivo, automobilio marsrutas i viena puse', 'reisas'),
(9131, 'Smulkus, dazniausiai kvapnus, kosmetikos ir higienos milteliai', 'pudra'),
(9132, 'Virusas pavojingesnis uz ziv, aptinkamas afrikoje', 'ebola'),
(9133, 'Norvegu tapytojas (1863-1944m.) sauksmas, paauglyste autorius', 'munkas'),
(9134, 'Kubistines poezijos pradininkas ir zymiausias jos kurejas, rinkiniu alkoholis, kaligramos autorius', 'apolineras'),
(9135, 'Dvi suristos vaskuotos sengraiku ir romenu rasymo lenteles', 'diptikas'),
(9136, 'Sporto saka, kopimas i sunkiai prieinamas kalnu virsunes, kalnu zygiai', 'alpinizmas'),
(9137, 'Programavime rinkinys sunumeruotu to paties tipo reiksmiu', 'masyvas'),
(9138, 'Dovana varzybu, konkurso, parodos laimetojams (dazniausiai 3 pirmiesiems)', 'prizas'),
(9139, 'Prusu bendruomenes susirinkimas, kuriame buvo aptariami viesieji reikalai', 'vaida'),
(9140, 'Vidutiniu amziu ispanijos smulkusis bajoras, riteris', 'hidalgas'),
(9141, 'Mokslas apie cheminiu elementu ir ju izotopu sudeti, pasklidima ir pasiskirstyma mineraluose, rudose, uolienose, dirvozemiuose, vandenyje ir atmosferoje bei ju migracija zemes rutulio geosferose', 'geochemija'),
(9142, 'Liaudyje tikima, kad sis sventasis apsaugo nuo ugnies, maro, naminiu gyvuliu ligu, globoja kiauliaganius ir mesininkus', 'antanas'),
(9143, '2-a pagal dydi sala pasaulyje [vard.]', 'naujoji gvineja'),
(9144, 'Dabartinio ekonomikos mokslo metodas, nustatantis optimalia elgsenos strategija, kai susiduriama su konfliktinemis situacijomis', 'losimu teorija'),
(9145, 'Didziausias miestas prie baltijos juros', 'sankt peterburgas'),
(9146, 'Egipto, irako, libano, libijos, sirijos administracinis teritorinis vienetas', 'muchafaza'),
(9147, 'Tinklinis audinys', 'kanva'),
(9148, 'Is kito galo ir be tarpo: o tarpus', 'suprato'),
(9149, 'Mokslas, tiriantis realaus pasaulio kiekybinius santykius ir erdvines formas', 'matematika'),
(9150, 'Dvesena arba ...', 'dvasna'),
(9151, 'Metinis saules kelias dangumi', 'ekliptika'),
(9152, 'Kas 1847 msukure dvejetaines matematikos pagrindus (orig.)', 'boole'),
(9153, 'Kinijoje vartojamas mases vienetas, lygus 1000 li', 'liangas'),
(9154, 'Prekiu perpardavimas trecioms valstybems', 'reeksportas'),
(9155, 'Baltarusijos interneto kodas', 'by'),
(9156, 'Ko nors nezinomo radimas', 'atradimas'),
(9157, 'Sakoma, kad del jo paprastai nesigincijama', 'skonis'),
(9158, 'Pavadinimas, kuriuo anksciau buvo vadinami zarasai', 'ezerenai'),
(9159, 'Laikinas cheminio elemento, kurio simbolis uus [numeris 117] pavadinimas', 'ununseptis'),
(9160, 'Tusinukas kitaip, lietuviskiau', 'sratinukas'),
(9161, 'E.mremarko romanas juodasis ...', 'obeliskas'),
(9162, 'Gyvunai, mintantys kitu gyvunu lavonais', 'saprofagai'),
(9163, 'Ssrs politikas, valstybes vadovas (1953-1964)', 'chrusciovas'),
(9164, 'Fermentas, atskeliantis vandenili', 'dehidrogenaze'),
(9165, 'Zymus sicilijos miestas, mafijos sostine', 'palermas'),
(9166, 'Liguistas zemes valgymas', 'geofagija'),
(9167, 'Lnk rodomo zaidimo sesi nuliai ????? milijonas vedejas', 'valinskas'),
(9168, 'Glazunovo baletas arba motvardas', 'raimonda'),
(9169, 'Vaistas, lengvinantis ligos reiskinius, bet neveikiantis jos priezasties', 'paliatyvas'),
(9170, 'Sportiniu reikmenu firma su lanko ar kometos uodegos formos zenklu', 'nike'),
(9171, 'Egipto smulkus pinigas', 'piastras'),
(9172, 'Kosmose - ivykiu horizonto gaubiama erdves sritis, is kurios negali istrukti jokios elektromagnetines bangos ir daleles', 'juodoji bedugne'),
(9173, 'Tolimiausias neptuno palydovas, kuri 1949 matrado g.pkoiperis', 'nereide'),
(9174, 'Sritis, uz kurios pasiekimus dar nei viena moteris negavo nobelio premijos', 'ekonomika'),
(9175, 'Puosni apeigine kataliku vyskupo kepure', 'infula'),
(9176, '1938mlakricio 1-10dvokietijoje vyko masiniai zydu pogromai, kaip vadinamas sis laikotarpis: ..naktis', 'kristoline'),
(9177, 'Vidinis planetos (veneros arba merkurijaus) praejimas per saules diska', 'tranzitas'),
(9178, 'Platus apvalus arba keturkampis keraminis indas, i kuri statomas vazonas su gelemis', 'kaspo'),
(9179, 'Mohando gandi nesmurtinio pasipriesinimo strategija', 'satjagraha'),
(9180, 'Didziausia afrikos valstybe', 'sudanas'),
(9181, 'Senoves graikijoje - laisvas amatininkas, meistras, menininkas', 'demiurgas'),
(9182, 'Ketvirta savaites diena', 'ketvirtadienis'),
(9183, 'Kertamasis ir duriamasis ginklas su tiesia vienasmene ar dviasmene gelezte', 'kalavijas'),
(9184, 'F1 trasa austrijoje', 'a1'),
(9185, 'Liauka gaminanti insulina', 'kasa'),
(9186, 'Senromos zemes ploto matas (apie 50 ha)', 'centurija'),
(9187, 'Trecia pagal dydi pasaulio valstybe', 'kinija'),
(9188, 'Is kokio medzio lietuvoje paprastai gaminami degtukai', 'drebules'),
(9189, 'Fasistines vokietijos uzsienio reikalu ministras, 1939 mpasirases sutartis su vmolotovu', 'ribentropas'),
(9190, 'Tikroji jono pauliaus i-ojo pavarde (buvo isrinktas 1978.08.26d.) [liet.]', 'lucianis'),
(9191, 'Zaratustros palydovai buvo du gyvunai, vienas is ju gyvate, koks gi kitas?', 'erelis'),
(9192, 'Kuno judesiu, pozu grakstumas, dailumas', 'gracija'),
(9193, 'Nepiktybinis liaukinio epitelio navikas', 'adenoma'),
(9194, 'Maza, monolitine, uoloje iskalta indijos sventykla', 'rahta'),
(9195, 'Rusu tapytojas, aviatorius, juodas kvadratas autorius', 'malevicius'),
(9196, 'Senoves romoje pranasavimai is pauksciu skrydziu ir dangaus zenklu', 'auspicijos'),
(9197, 'Istatymu nustatyta ikiteisminio tyrimo istaigu, prokuroro ir teismo veikla, tiriant ir nagrinejant baudziamasias bylas ir vykdant nuosprendzius: baudziamasis ...', 'procesas'),
(9198, 'Zema ziedo pavidalo koraline sala, kurios viduryje telkso laguna', 'atolas'),
(9199, 'Is anksto (ne pries mirti) parengtas testamentas', 'prelegatas'),
(9200, 'Kas pirmasis pavartojo termina abstrakcionizmas (dailes kryptis)', 'voringeris'),
(9201, 'Kriaukles pavadinimas, kurios vaizdas yra shell kompanijos logotipe', 'pektenas'),
(9202, 'Auksciausias rodiklis', 'rekordas'),
(9203, 'Ilgiausia ganos upe', 'volta'),
(9204, 'Didziausia pasaulyje valstybe, besidriekianti nuo baltijos juros iki ramiojo vandenyno', 'rusija'),
(9205, 'Uzdaroji akcine bendrove', 'uab'),
(9206, 'Irankis ledo rituliui arba ritiniui zaisti - lenkta lazda su islenkta mentele gale', 'ritmusa'),
(9207, 'Menkas kysis', 'pakisis'),
(9208, 'Pirmojo lietuviu istorinio romano algimantas autorius', 'pietaris'),
(9209, 'Kelintais metais uzpatentuotas konverterinis plieno gamybos budas', '1855'),
(9210, 'Kada pasirasyta krevos sutartis', '1385'),
(9211, 'Prusijos stambus zemvaldys', 'junkeris'),
(9212, 'Vienas geriausiu visu laiku krepsininku: michael ..[orig.]', 'jordan'),
(9213, 'Daugiavietis keleivinis automobilis', 'autobusas'),
(9214, 'Puikus ir drasus rytu tautu jojikas', 'dzigitas'),
(9215, 'Vienas didziausiu orgtechnikos gamintoju', 'hewlet packard'),
(9216, 'Pirmyksciu tikejimu (daugiausiai mitologijos), tautosakos, apeigu, paprociu vaizdinys, susidares tautos kolektyvineje pasamoneje ir konkretizuojamas meno kuriniuose, religijoje', 'archetipas'),
(9217, 'Graiku nacionalinis valgis [liet.]', 'musaka'),
(9218, 'Muzikinis kurinys kuriame instrumentine muzika sujungta su vokaline', 'opera'),
(9219, 'Mikroorganizmai, geriau augantys terpese, kuriose yra didele druskos koncentracija', 'halofilai'),
(9220, 'Automobiliu gamintojas isleides siuos modelius: laguna, megane, scenic', 'renault'),
(9221, 'Valstybe, kurios sostine kigalis', 'ruanda'),
(9222, 'Xix avokieciu kompozitorius ir pianistas, sukures vasarvidzio nakties sapna', 'mendelsonas'),
(9223, 'Skyluciu tarp zenklu ismusimas pasto zenklu lapuose, kas padeda lengviau atplesti viena zenkla nuo kito', 'perforacija'),
(9224, 'Zemelapio arba plano linija, jungianti vienodo spudinio pozeminio vandens slegio aukscio taskus (sutartines nulines plokstumos atzvilgiu)', 'izopjeza'),
(9225, 'Metalo arba medzio plokste, pritvirtinta prie laivo dugno, kad laivas neapvirstu', 'kylis'),
(9226, 'Daugiausia gyventoju turinti vakaru europos valstybe', 'vokietija'),
(9227, 'Paprasti darbo zmones', 'liaudis'),
(9228, 'Tarptautine agresijos pries vaikus diena', 'birzelio 4'),
(9229, 'Kaip vadinamas vidurinis zmogaus odos sluoksnis', 'derma'),
(9230, 'Pirmyksteje bendruomeneje gyvaves principas: kaltininkui turi buti padaryta tokia pat zala, kokia jis padares nukentejusiam', 'talijonas'),
(9231, 'Viena pagrindiniu mastymo operaciju, kuria subjektas isskiria tiriamu objektu tam tikrus pozymius ir atsieja juos nuo kitu', 'abstrahavimas'),
(9232, 'Brazilu rasytojas, knygu alchemikas, veronika ryztasi mirti autorius: paulo ...', 'coelho'),
(9233, 'Valstybe, kurioje prasideda neris', 'baltarusija'),
(9234, 'Kiek valstybiu yra es', '15'),
(9235, 'Beprotybes deive, kuria sukure nikte is urano kraujo', 'lisa'),
(9236, 'Konstitucijoje nustatyta oficiali valstybes ar jos dalies kalba', 'valstybine kalba'),
(9237, 'Standartine windows programele, skirta aritmetiniams skaiciavimams atlikti', 'calculator'),
(9238, 'Iskreipta lytinio pasitenkimo forma, kai orgazmas pasiekiamas ciulpiant savo paties varpa', 'autofelacija'),
(9239, 'Didzbritanijos miestas, kuriame yra 60 tukstvietu ninian park futbolo stadionas', 'kardifas'),
(9240, 'Lietuvos miestas, kurio herbe yra pavaizduota bite ir 6 ziedai melyname fone', 'varena'),
(9241, 'Balneologinis ir kalnu klimato kurortas gruzijoje', 'borzomis'),
(9242, 'Lietuviu kalbininkas, dabartines lietuviu kalbos zodyno paskutiniu leidimu vyrredaktorius stasys ...', 'keinys'),
(9243, 'Tiesiogine kreiptis i atminti', 'dma'),
(9244, 'Principas, pagal kuri asmuo laikomas nekaltu, kol neirodoma priesingai', 'nekaltumo prezumpcija'),
(9245, 'Lietuvos sostine didziojo kunigaikscio traidenio valdymo metu', 'kernave'),
(9246, 'Saltis be sniego', 'pliksala'),
(9247, 'Feodalo teise priversti valstiecius uz tam tikra mokesti naudotis feodalo irengimais', 'banalitetas'),
(9248, 'Abiakis ziuronas', 'binoklis'),
(9249, 'Elementas, kurio zemes plutoje yra daugiausia', 'deguonis'),
(9250, 'Gincu sprendimo metodas, pasitelkiant treciaja sali, siulancia galimus sprendimus', 'tarpininkavimas'),
(9251, 'Aptarnaujamas asmuo', 'klientas'),
(9252, 'Chemine reakcija, kuriai vykstant daug to paties cheminio junginio daleliu (monomeru) jungiasi i stambesnes daleles ????? polimerus', 'polimerizacija'),
(9253, 'Tikrasis indijos pavadinimas sanskrito kalba', 'bharat'),
(9254, 'Penicilino atradejas', 'flemingas'),
(9255, 'Elektrines skutimosi masinos isradejas [origin.]', 'shick'),
(9256, 'Didziausias pasaulyje automobiliu pramones koncernas', 'general motors'),
(9257, 'Antikos laikais - choro vedejas', 'korifejas'),
(9258, 'Grupes skilimas i dvi viena kitai priesingas grupuotes tuo atveju, kai grupes nariu pradines skirtingos nuomones diskusijos pabaigoje ne supanaseja, o dar labiau issiskiria', 'grupes poliarizacija'),
(9259, 'Tai, kuo tresiama', 'trasa'),
(9260, 'Nieko, niekada nezinantis', 'neziniukas'),
(9261, 'Kiek buvo kristaus mokiniu', '12'),
(9262, 'Kelintais metais nba priimtas atakai skirto laiko apribojimas', '1954'),
(9263, 'Prietaisas dangaus koordinatems nustatyti', 'armila'),
(9264, 'Sventoji, svbenedikto sesuo dvyne, tradiciskai laikoma pirmaja benediktinu vienuole', 'skolastika'),
(9265, 'Pasauline zemes diena', 'kovo 20'),
(9266, 'Kelintais metais buvo atrasta neptuno planeta', '1846'),
(9267, 'Kiek kartu the beatles pasieke jav albumu topo pirmaja vieta', '19'),
(9268, 'Prie kokios upes yra lisabona ir madridas', 'tacho'),
(9269, 'Vyriausybes ir pilieciu konflikto forma, kai pilieciai protestuoja pries pacia vyriausybe', 'revoliucija'),
(9270, 'Europos sajungos remiama tarptautine ilgalaike sociologiniu tyrimu programa, kurios paskirtis - valstybese narese ivertinti viesaja nuomone apie es institucijas [liet.]', 'eurobarometras'),
(9271, 'Istorijos laikotarpis', 'era'),
(9272, 'Kolonos liemens isilginis griovelis', 'kaneliura'),
(9273, 'Sprogstamasis ginklas', 'sprogmuo'),
(9274, 'Asilo pati', 'asile'),
(9275, 'Placiausiai visatoje paplite elementai yra vandenilis ir ...', 'helis'),
(9276, 'Sugebejimo rasyti dalinis sutrikimas - zmogus zodziuose sukeicia ir praleidzia raides, leciau negu iprasta sudaro zodzius', 'disgrafija'),
(9277, 'Zodine liaudies kuryba', 'tautosaka'),
(9278, 'Paziuru i kuriuos nors reiskinius sistema', 'koncepcija'),
(9279, 'Erdve, kuria sklinda radio bangos', 'eteris'),
(9280, 'Aktorius vaidines filmuose meksikietis, interviu su vampyru, 7 metai tibeteir kt.: brad ..[orig.]', 'pitt'),
(9281, 'Tukstantoji metro dalis', 'milimetras'),
(9282, 'Geologijoje - vieno raidos ciklo zemes plutos sluoksniu visuma', 'serija'),
(9283, 'Lietuviu vaiku poetas, poemos girios televizorius, eilerasciu rinkinio margaspalve genio kalve autorius', 'matutis'),
(9284, 'Senoves inku sventykla-tvirtove ant kalvos, iskilusios salia buvusios inku sostines kusko pietiniuose peru anduose', 'saksavamanas'),
(9285, 'Zmogaus jutimas, supratimas, kad yra pajegus atlikti tuos uzdavinius, kuriuos jam kelia gyvenimas ir kuriuos jis kelia pats sau', 'pasitikejimas savimi'),
(9286, 'Sukarinimas, kariniu organizacijos formu ir metodu pritaikymas ivariems visuomeninio gyvenimo ir ukio sritims', 'militarizacija'),
(9287, 'Xviii-xixalietuviu paprotys padeti nelaimeje, dazniausiai gaisro istiktam kaimynui', 'bandziuliulyste'),
(9288, 'Verslo veiklos sritis, apimanti planavima, kainodara, remima ir paskirstyma', 'marketingas'),
(9289, 'Gleivines ar akies obuolio hiperemija del kapiliarines stazes', 'injekcija'),
(9290, 'Laisva anglis, issiskirsciusi metalo maseje', 'grafitas'),
(9291, 'Kompanija, pagaminusi mobiliu telefonu modelius: trium mars, trium geo, trium mondo, trium xs', 'mitsubishi'),
(9292, 'Japonu puoksciu sudarymo menas', 'ikebana'),
(9293, 'Kaip buvo vadinama smiltyne nuo 16aiki 1945 metu', 'smelio karcema'),
(9294, 'Norvegijos parlamento zemieji rumai', 'odelstingas'),
(9295, 'Maziausias paukstis pasaulyje (kolibriu rusis): karibu ...', 'kamankolibris'),
(9296, 'Filipinu sostine', 'manila'),
(9297, 'Lietuvos respublikos ministras pirmininkas 1919.10.07?????1920.0615 ir 1922.02.02?????1924.06.17', 'galvanauskas'),
(9298, 'Kurinio ivykiu raida', 'fabula'),
(9299, 'Sarmata arba ...', 'geda'),
(9300, 'Svytincio pavirsiaus skaiscio vienetas', 'glinda'),
(9301, 'Sunkiausias bakterines kilmes apsinuodijimas maistu', 'botulizmas'),
(9302, 'Kiek zmoniu pasaulyje per minute uzsikrecia ziv', '11'),
(9303, 'Autoriaus parasas, monograma arba kitoks autoryste nurodantis zenklas dailes kurinyje', 'signatura'),
(9304, 'Dvigubas vulkanas', 'soma'),
(9305, 'Visame pasaulyje ivairiu specialiuju buriu, tarp ju ir aras, placiai naudojami automatai', 'mp5sd'),
(9306, 'Septinta pagal auksti kalva lietuvoje', 'medvegalio'),
(9307, 'Prancuzijos, prancuzu ir visko kas prancuziska, gerbejas', 'frankofilas'),
(9308, 'Pastovus zodziu junginiai, savo reiksme artimi vienam zodziui', 'frazeologizmai'),
(9309, 'Kuriais metais priimta visuotine zmogaus teisiu deklaracija', '1948'),
(9310, 'Grieztai nustatytos tam tikros siuzeto arba asmens vaizdavimo taisykles', 'ikonografija'),
(9311, 'Sieninis vienos ar keliu saku sviestuvas', 'bra'),
(9312, 'Lietuvis biatloninikas, 1984 mtapes olimpiniu cempionu', 'salna'),
(9313, 'Senoves graiku mitologijoje: pozemiu karalystes upe', 'acherontas'),
(9314, 'Metaline svirtele, sulaikanti revolverio bugna tam tikroje padetyje, kad sovinys tiksliai sutaptu su vamzdzio anga', 'delinge'),
(9315, 'Mente irtis', 'irklas'),
(9316, 'Vienalygis plento susikirtimas su gelezinkeliu', 'pervaza'),
(9317, '37-a valstija, prijungta prie jav 01.03.1867 m., sostine linkolnas [liet.]', 'nebraska'),
(9318, 'Grupe panasios sandaros organu, atliekanciu bendra funkcija?', 'organu sistema'),
(9319, 'Ferrari automobiliu tevyne', 'italija'),
(9320, 'Retas vaiku psichogenetines kilmes sutrikimas pasireiskiantis nesugebejimu kalbeti tam tikrose, ypac stresinese ar itemptose situacijose', 'mutizmas'),
(9321, 'Objektu tapatybes nustatymas remiantis tam tikrais pozymiais', 'identifikavimas'),
(9322, 'Milziniskas zvaigzdziu telkinys, kurias sieja traukos jega', 'galaktika'),
(9323, 'Zambijos sostine', 'lusaka'),
(9324, 'Gamybos, realizavimo ar eksporto ribojimas, norint pakelt kainas', 'restrikcija'),
(9325, 'Slapyvardziu pasirasinejancio autoriaus tikrasis vardas', 'autonimas'),
(9326, 'Didelis peilis cukranendrems kirsti arba prasikirsti keliui tankiuose bruzgynuose', 'macete'),
(9327, 'Kokia islandijos sostine?', 'reikjavikas'),
(9328, 'Sluoksniuotas plastikas', 'getinaksas'),
(9329, 'Senoves graikijoje ir egipte ????? molines sukes, ant kuriu buvo rasoma [dgs.]', 'ostrakai'),
(9330, 'Netekejusi mergina', 'pana'),
(9331, 'Viena is pagrindiniu psichologijos mokyklu', 'kognityvine'),
(9332, 'Kopeciu skersinis', 'pakopa'),
(9333, 'Gyvunas, statantis uztvaras', 'bebras'),
(9334, 'Kelintais metais baltijos krastuose kilo tautinio issivadavimo sajudziai?', '1988'),
(9335, 'Senromoje - istatymo reguliuojamas faktinis vyro ir moters sugyvenimas', 'konkubinatas'),
(9336, 'Mokslas, tiriantis romanu kalbas, literatura, tautosaka', 'romanistika'),
(9337, 'Jav miestas, kuriame rungtyniauja nba komanda, anksciau turejusi rochester royals (1948-1957 m.), cincinati royals (1957-1972 m.), kansas city kings (1972-1985 m.) pavadinimus', 'sakramentas'),
(9338, 'Juodosios rases zmogus', 'negroidas'),
(9339, 'Vakaru germanu kalba, vartojama pietu afrikoje', 'afrikansas'),
(9340, 'Senoves graiku filosofijos savoka, reiskianti subtiliausia ir lengviausia medziaga, kuri yra tam tikra pereinamoji pakopa tarp materialaus ir dvasinio pasaulio', 'pneuma'),
(9341, 'Irankis kam nors kapoti', 'kirvis'),
(9342, 'Slapta ginkluota zydu organizacija, ikurta palestinoje 1920 mzydu naujakuriams nuo arabu ginti', 'hagana'),
(9343, 'Populiariausia apskaitos programa', 'pragma'),
(9344, 'Fizinis ir psichinis asmenybes sutrikimas', 'marazmas'),
(9345, 'Kiek tasku gaunama angliskajame biliarde, imusus melynos spalvos rutuli', '5'),
(9346, 'Kaklo papuosalas is brangiu arba dirbtiniu akmenu', 'kolje'),
(9347, 'Senoves egiptieciu balzamuotoju dievas', 'anubis'),
(9348, 'Pasauline kurciuju diena', 'rugsejo 30'),
(9349, 'Metaline vinis su sriegiu verzlei', 'varztas'),
(9350, 'Virsutinis vyru ir moteru drabuzis, devimas darbe, namie; artimuosiuose rytuose ir vidurineje azijoje devimas kaip iseiginis drabuzis', 'chalatas'),
(9351, 'Galvos apsauga', 'salmas'),
(9352, 'Kataliku baznbausme, kuria is dvasininko atimama teise atlikineti sventimais suteiktas funkcijas ir eiti turimas baznytines pareigas', 'suspensa'),
(9353, 'Siltu dregnu krastu tankus pelketi miskai ir krumu sazalynai, israizgyti sumedejusiu lianu', 'dziungles'),
(9354, 'Senoves statinys is dideliu akmeniniu bloku', 'megalitas'),
(9355, 'Eina po sol', 'la'),
(9356, 'Knygos savininko zenklas', 'ekslibris'),
(9357, 'Paranki padetis varzovu ginamoje aikstes puseje, i kuria draudziama pakliuti zaidejui', 'nuosale'),
(9358, 'Zemes atmosferos isorinis sluoksnis, esantis virs 1000 km aukscio', 'egzosfera'),
(9359, 'Kariuomenes dalinys ar daliniai, saugantys zygiojancios kariuomenes uznugari', 'ariergardas'),
(9360, 'Virves galvijams tvarte priristi', 'saitai'),
(9361, 'Toyota atstovas lietuvoje (vilniuje)', 'tokvila'),
(9362, 'Melynos spalvos misko uoga', 'melyne'),
(9363, 'Kompleksinis sporto irenginys saudymo sporto pratyboms ir varzyboms', 'saudykla'),
(9364, 'Kokiu augalu rusys yra ledkalnis, bostonas ir kamstis', 'salotu'),
(9365, 'Poreikis burtis i grupe, tureti emociniu kontaktu', 'afiliacija'),
(9366, 'Septynios pedos = 1 ...', 'sieksnis'),
(9367, 'Tai, kas seka po fizikos; idealistines filosofijos dalis, tirianti protu nesuvokiamus, antijutiminius buties ir pazinimo pradus', 'metafizika'),
(9368, 'Mazo nasumo prekyboje ir pramoneje laikotarpis', 'stagnacija'),
(9369, 'Kuriais metais sukurtas animaciniu filmu ir komiksu herojus anciukas donaldas', '1934'),
(9370, 'Ilgiausiai gyvenantis paukstis', 'albatrosas'),
(9371, 'Posakis, kuris reiksme ironija pavercia priesinga', 'antifraze'),
(9372, 'Krepsinio klubas is pirejo miesto (graikija)', 'olympiakos'),
(9373, 'Pirmasis jav prezidentas, kalbejes per tv', 'ruzveltas'),
(9374, 'Visu variklio cilindru darbo turiu visuma', 'litrazas'),
(9375, 'Kokiais skaiciais prasideda vengrijos bruksninis prekinis kodas', '599'),
(9376, 'Prancuzu kompozitorius, operos faustas autorius', 'guno'),
(9377, 'Regejimo pojutis', 'rega'),
(9378, 'Kas kiek metu, pasak herodoto, atgyja feniksas', '500'),
(9379, 'Seklus nenutekamas ezeras australijos pietuose', 'gardneris'),
(9380, 'Konvencija del tarptautinio prekiu transportavimo keliais sutarties', 'cmr'),
(9381, 'Sunkiosios atletikos irankis - plieninis virbalas su movomis galuose ir su uzmaunamais ivairios mases ir dydzio metaliniais ar guminiais skridiniais', 'stanga'),
(9382, 'Plauciu audinio supliuskimas, kai alveolese nebuna arba truksta oro', 'atelektaze'),
(9383, 'Kas parase kurini balta drobule [vardas, pavarde]', 'antanas skema'),
(9384, 'Legendinis lietuvos kunigaikstis pirmtakas, kildintas is senoves romos didiku', 'palemonas'),
(9385, 'Priesiskumas karams , taikos remimas', 'pacifizmas'),
(9386, 'Zodis ar zodziu junginys, vartojamas leidinio teksto prasminiam turiniui aprasyti ir jam surasti informacineje paieskos sistemoje', 'deskriptorius'),
(9387, 'Lietuvos laikinoji sostine', 'kaunas'),
(9388, 'Liga: kraujavimas is gimdos ne menstruaciju metu', 'metroragija'),
(9389, 'Jav gyvenimo budo garbinimas ir megdziojimas', 'amerikanizmas'),
(9390, '19 aamerrasytojas, niuraus vienisumo ir simbolizmo ideologas', 'po'),
(9391, 'Kunigaiksciai, kuriems ldk laikais priklause kruonio miestelis, esantis kaisiadoriu rajone [pavarde dgsvard.]', 'oginskiai'),
(9392, 'Lietuviskas siaures vejo pavadinimas, kitaip ziemys, ziemelis', 'siaurys'),
(9393, 'Laiko tarpas, kuriam pasibaigus panaikinama arba suteikiama tam tikra teise', 'senatis'),
(9394, 'Pagrindine sakinio dalis, kuri atsako i klausima kas?', 'veiksnys'),
(9395, 'Induizme ????? dievas griovejas', 'syva'),
(9396, 'Sudetine valstybe, susidedanti is federacijos nariu ir centrines vyriausybes', 'federacija'),
(9397, 'Asmuo, pretenduojantis i ka nors, reiskiantis pretenzijas i ka nors ir siekiantis ko nors', 'pretendentas'),
(9398, 'Cheminis elementas, kurio simbolis mn [numeris 25]', 'manganas'),
(9399, 'Isdegusi misko vieta', 'isdagas'),
(9400, 'Senoves graiku kariuomenes vadas, vadovaves kuopai', 'lochagas'),
(9401, 'Veiksmazodzio forma, paryskinanti veiksmazodzio reiksme ir atsakanti i klausima kaip? [pvzbegte]', 'budinys'),
(9402, 'Arabu bajoras', 'seichas'),
(9403, 'Biblijos pranasas, uolus jahves kulto gynejas, stebukladarys, kuri jahve gyva pasiemes i dangu', 'elijas'),
(9404, 'Labiausiausiai perkama knyga, leidziama didziausiais tirazais', 'bestseleris'),
(9405, 'Zaibolaidzio isradejo pavarde', 'franklinas'),
(9406, 'Per jonines zydintis augalas', 'papartis'),
(9407, 'Iskarpyti is popieriaus meniniai dirbiniai: serveteles, eglutes zaislai, ivairus paveiksleliai ir kt[dgs.]', 'karpiniai'),
(9408, 'Ypatinga dievo malone', 'charizma'),
(9409, 'Tarpas, atstumas tarp dvieju gretimu objektu, pertrauka', 'intervalas'),
(9410, 'Kuno savybe priesintis staigiam ju greicio pakitimui', 'inertiskumas'),
(9411, 'Laivas - klaipedos simbolis', 'meridianas'),
(9412, 'Juostinis ornamentas: taisyklinga, staciu kampu luzinejanti linija; labai paplites senoves graikijos architekturoje, vazu tapyboje ir kt.', 'meandras'),
(9413, 'Kas yra pasakes: as privalau papasakoti tai, kas yra pasakojama, bet tiketi tuo, kas pasakojama, nebutinai privalau', 'herodotas'),
(9414, 'Architekturoje - ziedas kolonos virsuje', 'astragalas'),
(9415, 'Parase apsakyma kliudziau', 'biliunas'),
(9416, 'Zemes geologijos istorijos kainozojaus eros paleogeno periodo i epocha', 'paleocenas'),
(9417, 'Akmens skulpturinis apdovanojimas; antspaudai su israizytais dievu, zmoniu ir mitiniu gyvunu, zveriu atvaizdais', 'gliptika'),
(9418, 'Samojingas, pridengtos formos pasisiepimas', 'ironija'),
(9419, 'Kiek sveria [gr] lengvaatleciu moteru metimo i toli irankis ietis', '600'),
(9420, 'Programavimo kalbose atsitiktini skaiciu generuojanti funkcija', 'random'),
(9421, 'Kokia aktore apsilanke lnk bare 2 [vardas, pavarde]', 'gabriela spanic'),
(9422, 'Burnoje issitenkantis maisto gabalelis', 'kasnis'),
(9423, 'Vienas is kritiko pvisinskio slapyvardziu [taip pat senlietuviu irankis]', 'spragilas'),
(9424, 'Suvartotu daiktu, atlieku perdirbimas, pakartotinis panaudojimas', 'utilizacija'),
(9425, 'Vedryniniu seimos daugiameciu zoliniu augalu gentis', 'bijunas'),
(9426, 'Sumeru saules dievas', 'utu'),
(9427, 'Telekomunikaciju kompanija, pagaminusi mobiliu telefonu modelius: startac rainbow, startac 75+, startac 75, slimlite', 'motorola'),
(9428, 'Biologine zmoniu grupe', 'rase'),
(9429, 'Miestas, kuriame yra dailes muziejus borgezes galerija', 'roma'),
(9430, 'Garsumo vienetas', 'tonas'),
(9431, 'Saturno palydovas, pavadintas vieno is senoves graiku titanu, gejos ir urano sunaus, prometejo, epetimejo ir atlanto tevo, vardu', 'japetas'),
(9432, 'Kokios spalvos yra veliava formuleje 1, kuri reiskia ,jog lenktynes sustabdytos', 'raudona'),
(9433, 'Mokslininkas, atrades deguoni', 'pristlis'),
(9434, 'Monako princese', 'stefani'),
(9435, 'Kuno (arba medziagos) svytejimas, kuri sukelia energijos saltinis - isorinis spinduliavimas, veikiantis kuna', 'liuminescencija'),
(9436, 'Virskinimo fermentas skrandyje', 'pepsinas'),
(9437, 'Politinis dokumentas, skelbiantis pagrindinius kurios nors politines grupuotes reikalavimus', 'chartija'),
(9438, 'Nedaiktiskoji daile', 'abstrakcionizmas'),
(9439, 'Dailininkas, kuris nusipjove ausi', 'van gogas'),
(9440, 'Garsus kroatijos krepsinio klubas is zagrebo', 'cibona'),
(9441, 'Monetos briauna', 'gurtas'),
(9442, 'Urano palydovas, pavadintas vsekspyro komedijos vasarvidzio nakties sapnas piktos dvasios vardu', 'pukas'),
(9443, 'Daugiausiai (70 mln ) 2000 muzdirbes aktorius: bruce ..[orig.]', 'willis'),
(9444, 'Lietuviu liaudies vestuvinis sokis', 'sadute'),
(9445, 'Norvegijos sostine', 'oslas'),
(9446, 'Salis, kuriai budingas sukis wir welle bleiwen, wat mir sin! (mes norime likti kuo esame)', 'liuksemburgas'),
(9447, 'Tevo ar motinos sesuo', 'teta'),
(9448, 'Karinis arba civilinis uniforminis svarkas', 'munduras'),
(9449, 'Uoleta kalnu virsune, iskilusi virs kontinentinio ledyno pavirsiaus', 'nunatakas'),
(9450, 'Filmavimo kameros isradejas', 'edisonas'),
(9451, 'Koks simbolis yra ant vietnamo veliavos', 'zvaigzde'),
(9452, 'Kokios darzoves dar vadinamos saldziosiomis bulvemis [dgs.]', 'batatai'),
(9453, 'Mokslas, tiriantis lasteles branduoli', 'kariologija'),
(9454, 'Kas parase lenkijos, lietuvos, zemaiciu ir visos rusijos kronika', 'strijkovskis'),
(9455, 'Koks yra angliskas zenklo &amp; pavadinimas', 'ampersand'),
(9456, 'Pagamintas is metalo', 'metalinis'),
(9457, 'Irenginys begiu transporto riedmenims nukreipti is vieno kelio i kita', 'iesmas'),
(9458, 'Auksciausias mokslinis laipsnis', 'daktaras'),
(9459, 'Stomatologijoje naudojama plombine medziaga, turinti kompozitu ir stiklo jonomeru savybiu (siu medziagu hibridas)', 'kompomeras'),
(9460, 'Trumpas prozos kurinys', 'apsakymas'),
(9461, 'Sakotas kepinys', 'sakotis'),
(9462, 'Gyvulio peciu isikisimas tarp menciu', 'kupra'),
(9463, 'Skaiciavimo lenta skaitytuvu prototipas vartotas senoves egipte, graikijoje, romoje', 'abakas'),
(9464, 'Meiles nuotykis', 'romanas'),
(9465, 'Smukimas nuo aukstesnio lygio i zemesni', 'regresas'),
(9466, 'Kuriais metais pradejo veikti kruonio hae', '1992'),
(9467, 'Formules 1 lenktynine masina', 'bolidas'),
(9468, 'Kurioje dzverdzio operoje skamba garsusis vergu choras', 'nabukas'),
(9469, 'Indas ar irenginys (dazniausiai stiklinis) vandens gyvunams ir augalams laikyti, veisti, tirti, demonstruoti', 'akvariumas'),
(9470, 'Trumpas skitu kalavijas', 'akinakas'),
(9471, 'Jungtiniu tautu organizacija', 'jto'),
(9472, 'Moldavijos pagrindinis pinigas', 'leja'),
(9473, 'Garsiausias rusu rasytoju iilfos ir jpetrovo romanas', 'dvylika kedziu'),
(9474, 'Rusiskas granatsvaidis', 'mucha'),
(9475, 'Vyresnysis vyskupas, vadovaujantis kelioms vyskupijoms', 'arkivyskupas'),
(9476, 'Feodalinis dvaras viduriniuju amziu anglijoje', 'manoras'),
(9477, 'Psichikos liga ????? patologinis potraukis losti azartinius losimus', 'ludomanija'),
(9478, 'Kaip vadinasi sis zenklas ~', 'tilde'),
(9479, 'Pirmoji rijimo faze', 'formavimas'),
(9480, 'Pastatu, gatviu, daiktu puosnus apsvietimas', 'iliuminacija'),
(9481, 'Valstybiu susitarimas del pasikeitimo kaliniais arba karo belaisviais', 'kartelis'),
(9482, 'Svino lydinys su kitais metalais', 'babitas'),
(9483, 'Xix aeuropoje susiformavusi nacionalistine doktrina, kuri megino apjungti viso pasaulio zydus i viena valstybe', 'sionizmas'),
(9484, 'Prietaisas matuoti kampus braizant, naudojamas paprastai mokymo istaigose', 'matlankis'),
(9485, 'Karuna batonelis su lazdyno riesutais', 'manija'),
(9486, 'Salis, kurioje buvo pastatytas pirmasis astrodomas (stadionas su uzdaru skaidriu kupolu)', 'jav'),
(9487, 'Mokslas, nagrinejantis ukio sistema valstybeje ar ju grupese', 'makroekonomika'),
(9488, '2000 meuropos futbolo cempionatas vyko belgijoje ir ...', 'olandijoje'),
(9489, 'Islamo atsiradimo metai', '622'),
(9490, 'Julijus cezaris uzrasuose apie galu kara mini tris keltu zyniu sluoksnius: vatus, bardus ir ..[dgsgal.]', 'druidus'),
(9491, 'Botsvanos pavadinimas iki 1966m.', 'becuanalendas'),
(9492, 'Koks futbolo varzybose yra leidziamas maksimalus kamuolio svoris (gramais)', '450'),
(9493, 'Liturginis kreipimasis i tikinciuosius, raginantis slovinti dieva; dziaugsmo ir triumfo suksnis', 'aleliuja'),
(9494, 'Lietuvos miestas, garsus savo turgumi', 'rietavas'),
(9495, '\r\n', ''),
(9496, 'Didziausias budistu vienuolynas pietu azijoje', 'mahavihara'),
(9497, 'Is kokiu javu grudu gaminamos perlines kruopos [dgskilm.]', 'mieziu'),
(9498, 'Svetimos kalbos zodis ar posakis, nepakeistu pavidalu mechaniskai iterptas i kalba', 'makaronizmas'),
(9499, 'Sviesulio pasirodymas virs horizonto del zemes sukimosi apie asi', 'teka'),
(9500, 'Radioaktyvusis atomas', 'radionuklidas'),
(9501, 'Kaip vadinamas kompaktu irasymo (istrinimo) irenginys', 'cd-rw'),
(9502, 'Rasytojas, romanu prarasto laiko beieskant, jaunu zydinciu merginu seselyje, germantu puse autorius (liet.)', 'prustas'),
(9503, 'Grandis prie balno kojai istatyti, pasistoti', 'kilpa'),
(9504, 'Vaidino velnio nesta ir pamesta ursule velnio nuotakoje', 'varnaite'),
(9505, 'Zvaigzde, kuri palaiko gyvybe zemeje, teikia siluma ir sviesa', 'saule'),
(9506, 'Kokia yra amazones upes didziausia zuvis', 'arapaima'),
(9507, 'Amerikieciu kino rezisierius, sukures filmus nasrai, juros periodo parkas, sindlerio sarasas', 'spilbergas'),
(9508, 'Principas, kuriuo nustatoma, kad pilietybe zmogus paveldi is tevu', 'jus sangvinis'),
(9509, 'Rugstiniams oksidams reaguojant su bazemis bei baziniais oksidais, susidare junginiai', 'druskos'),
(9510, 'Mokyklos vadovas', 'direktorius'),
(9511, 'Ganos vakarine kaimyne', 'kot divuaras'),
(9512, 'Daugialasciu gyvunu (isskyrus pintis ir duobagyvius) vidurinis gemalinis lapelis', 'mezoderma'),
(9513, 'Styginiu muzikos instrumentu korpuso dalis', 'deka'),
(9514, 'Lietuviu kompozitorius, dirigentas, simfonines poemos nemunas, operos, kantatu, dainu kurejas', 'simkus'),
(9515, 'Veiksnys, kuris skatina organizma arba organizmo dali kaip nors reaguoti', 'dirgiklis'),
(9516, 'Irenginys, kurio pagalba vienas ar daugiau gaunamu signalu sujungiami i viena bendra', 'multipleksorius'),
(9517, 'Labiausiai paplitusi kinu tarme, o kartu ir kalba pasaulyje', 'mandarinu'),
(9518, 'Eiliuotas lotyniskas kurinys, kurio visi zodziai isbarstyti po teksta, o skaitytojas turi pats atsekti jo pradine tvarka', 'koreliatyvas'),
(9519, 'Apsauginis galvos apdangalas', 'salmas'),
(9520, 'Irano parlamento zemieji rumai', 'medzlisas'),
(9521, 'Kinijos politine partija, valdziusi sia sali 1928 ????? 1949 m.', 'gomindanas'),
(9522, 'Kada lietuva tapo unesco nare', '1992'),
(9523, 'Afrikos valstybe, kurios pavadinimas, isvertus is tenyksciu gyventoju sonu kalbos, reiskia akmenu krastas', 'zimbabve'),
(9524, 'Kas isrado stiklo gamybos technologija (tauta)', 'egiptieciai'),
(9525, 'Socialinis-ekonominis principas, pagal kuri visi visuomeniniai santykiai nagrinejami ju naudingumo poziuriu, norint siuos santykius panaudoti priemone kokiems nors tikslams pasiekti', 'utilitarizmas'),
(9526, 'Sveicarijos miestas, kuriame yra 60 tukstvietu stjakob futbolo stadionas', 'bazelis'),
(9527, 'Klasika laikoma marihuanos (kanapes) rusis', 'white widow'),
(9528, 'Lektuvo keleiviu ir igulos aprupinimas maistu ir gerimais', 'keitringas'),
(9529, 'Irenginys laivu statykloje, ant kurio surenkamas ir nuo kurio nuleidziamas i vandeni laivas', 'stapelis'),
(9530, 'Motvardas, kiles is lotkalbos, reiskia pergale', 'viktorija'),
(9531, 'Pirmykstis tikejimas zmoniu, gyvunu, augalu ir negyvu daiktu sielomis ir antgamtinemis dvasiomis', 'animizmas'),
(9532, 'Italijos miestas, kuriame yra 71 tukstvietu dele alpi futbolo stadionas', 'turinas'),
(9533, 'Organizmo chromosomu visuma, apibudinama chromosomu dydziu, isvaizda ir skaiciumi; paveldima kiekvienai organizmo rusiai budinga savybe', 'kariotipas'),
(9534, 'Naujojoje zelandijoje auginamu ir eksportuojamu kivi vaisiu prekinis pavadinimas', 'zespri'),
(9535, 'Didziausia ramiojo vandenyno lasisa; zvejojama palei kamciatkos krantus bei japonijos juros pakrantese', 'cavica'),
(9536, 'Kai kuriu xvii-xixaeuropos kariuomeniu lengvuju pestininku kareivis', 'jegeris'),
(9537, 'Rusu rasytojas, romano okurovo miestelis autorius', 'gorkis'),
(9538, 'Knygos eugenija grande autorius', 'balzakas'),
(9539, 'Bet kuri svarbiausia komunikacijos linija kitu antraeiliu liniju atzvilgiu', 'magistrale'),
(9540, 'Naujosios zelandijos nacionalinis paukstis', 'kivis'),
(9541, 'Patenkinimas uz garbes izeidima, teikiamas dazniausiai dvikovos forma', 'satisfakcija'),
(9542, 'Kuriais metais pradetas leisti tevynes sargo laikrastis', '1896'),
(9543, 'Senovinis ukinis pastatas sienui, siaudams ir ukiniams padargams laikyti', 'darzine'),
(9544, 'Keli raudonos spalvos rutuliai buna ant angliskojo biliardo stalo', '15'),
(9545, '34-a valstija, prijungta prie jav 29.01.1861 m., sostine topeka [liet.]', 'kanzasas'),
(9546, 'Vietoves planas, padarytas toje vietoje pagal horizontaliu geodeziniu matavimu duomenis', 'abrisas'),
(9547, 'Salis, pirmoji suteikusi moterims rinkimu teise', 'naujoji zelandija'),
(9548, 'Siaurejancio maiso formos zvejybos tinklas', 'tralas'),
(9549, 'Mokslas apie zemes pavirsiu geometriniame santykyje arba budas visa tai pavaizduoti popieriaus lape', 'topografija'),
(9550, 'Vietomis, ruozais', 'tarpais'),
(9551, 'Umus, greitas, netiketas', 'staigus'),
(9552, 'Albanijos pagrindinis pinigas', 'lekas'),
(9553, 'Religines apeigos arba garbinimas', 'kultas'),
(9554, 'Pjese kitaip', 'drama'),
(9555, 'Apie ka nors susidariusi nuomone, reputacija', 'renome'),
(9556, 'Atvira grezinio ertme, apribota sienelemis ir dugnu', 'grezskyle'),
(9557, 'Akmeningoji dykuma', 'hamada'),
(9558, 'Nesisteminis skaiscio vienetas', 'stilbas'),
(9559, 'Kaip vadinamas informacijos perdavimas per atstuma kitam zmogui, nenaudojant iprastiniu jo perdavimo budu', 'telepatija'),
(9560, 'Kasdiene judaizmo ispazineju malda', 'amida'),
(9561, 'Sportininkas arba komanda pirmenybiu nugaletoja', 'cempionas'),
(9562, 'Valstybines valdzios draudimas ivezti (isvezti) ivairprekes, auksa, vertybinius popierius', 'embargas'),
(9563, 'Ispanijos klierikai monarchistai [dgs.]', 'karlistai'),
(9564, 'Marinuota silkes file, susukta i ritineli', 'rolmopsas'),
(9565, 'Jav prezidentas, pries kuri buvo pirma karta pradetas apkaltos procesas (impeachment)', 'dzonsonas'),
(9566, 'Koks yra pizos boksto aukstis [m]', '55'),
(9567, 'Vergas musulmonu salyse vidurmaziais', 'guliamas'),
(9568, 'Izraelio piniginis vienetas 1948-1980 metais', 'svaras'),
(9569, 'Mikrolitraziu lenktyniniu automobiliu ????? gokartu lenktynes', 'kartingas'),
(9570, 'Bet koks objektu rinkinys', 'aibe'),
(9571, 'Kasmetine palaipsniui padengiamos valstybines paskolos ir paskaiciuotu palukanu ismoka', 'anuitetas'),
(9572, 'Knygos aptaisymas virseliu', 'irisimas'),
(9573, 'Romos kataliku misiu dalis, per kuria daugiausiai skaitomi laiskai', 'epistola'),
(9574, 'Ruandos siaurine kaimyne', 'burundis'),
(9575, 'Eritrejos sostine', 'asmara'),
(9576, '(655-731) japonu poetas didikas rases tik penkiaeiliussatyrines poezijos pradininkas', 'torbito'),
(9577, 'Zmogus, tarpininkaujantis tarp gyvuju ir mirusiuju pasauliu, t.ytas, kuris, pasineres i transa, kalbasi su dvasiomis, mirusiuju velemis', 'mediumas'),
(9578, 'Koks tikrasis karaliauciaus srities baltijsko miesto vardas', 'piliava'),
(9579, 'Kas kukuoja: geguciu patinai ar pateles', 'patinai'),
(9580, 'Kataliku vienuoliu ordinas, ikurtas 1215 mtuluzoje ispanu pamokslininko domininko gusmano', 'domininkonai'),
(9581, 'Kataliku baznycios aktas - mirusiojo asmens paskelbimas palaimintuoju', 'beatifikacija'),
(9582, 'Geniniu burio geniu seimos paukstis', 'meleta'),
(9583, 'Salinti nepageidaujamus plaukelius', 'depiliuoti'),
(9584, 'Lochneso ezero pabaisa', 'nese'),
(9585, 'Upe, itekanti i azovo jura', 'donas'),
(9586, 'Wnba komanda is portlendo', 'fire'),
(9587, 'Cheminis elementas, kurio simbolis h [numeris 1]', 'vandenilis'),
(9588, 'Vokietijos kanclerio srioderio vardas', 'gerhardas'),
(9589, 'Koki pakta 1925 mpasirase vokietija, kuriuo ji pripazino savo vakarines sienas su belgija ir prancuzija', 'lokarno'),
(9590, 'Zmogaus pavidalo ir psichiniu savybiu suteikimas gamtos reiskiniams', 'antropomorfizmas'),
(9591, 'Stiprus uzpilas su spiritu, vartojamas medicinoje', 'eliksyras'),
(9592, 'Stipri puga per didelius salcius rusijos azijineje dalyje', 'buranas'),
(9593, 'Laivo patalpa vadovybes pasitarimams, poilsiui', 'kajutkompanija'),
(9594, 'Kelintais metais ivyko zalgirio musis', '1410'),
(9595, 'Kiek koju turi voras (zodziu)', 'astuonias'),
(9596, 'Pietvakariu azijos ir siaures afrikos arabai klajokliai', 'beduinai'),
(9597, 'Pergamo vergu ir varguomenes sukilimo pries romenus vergvaldzius vadas [liet.]', 'aristonikas'),
(9598, 'Isorine atramine arka (dazniausiai gotikos architekturoje), perduodanti skliauto sketima i apatinius ramscius, kontrforsu sistema', 'arkbutanas'),
(9599, 'Juoda korta', 'pikas'),
(9600, 'Laukiniu gyvuliu ir pauksciu prijaukinimas', 'domestikacija'),
(9601, 'Is keliu raidziu sudarytas ilgiausias pasaulyje miesto pavadinimas', '167'),
(9602, 'Daugiareiksmis terminas, bendriausia prasme reiskiantis gyva butybe', 'organizmas'),
(9603, 'Romeniskas skotijos pavadinimas', 'kaledonija'),
(9604, 'Staigesnis lygumos pavirsiaus zemejimas - slaitas', 'panuovolis'),
(9605, 'Renkamas germanu karo vadas, veliau - dideles teritorijos valdytojas', 'hercogas'),
(9606, 'Eritrocitu irimas ir hemoglobino issiliejimas', 'hemolize'),
(9607, 'Lietuviu aktorius, vaidines giminese, algirdo brazausko zentas', 'mertinas'),
(9608, 'Smaragdo miesto ...', 'burtininkas'),
(9609, 'Kiek dainininku dainuoja sekstete', '6'),
(9610, 'Kalbos sutrikimas, kai garsai tariami netaisyklingai', 'sveplavimas'),
(9611, 'Rusu dailininkas, kuriniu naktis virs dnepro, berzu giraite autorius', 'kuindzi'),
(9612, 'Koks stambus zoledis miega tik viena valanda per nakti', 'antilope'),
(9613, 'Lietuviu skulptorius, skulpturiniu kompoziciju trys milzinai karininku ramoves kaune, puntuko akmenyje iskaltu dariaus ir gireno bareljefu autorius', 'pundzius'),
(9614, 'Faraonas, nesekmingai bandes ivesti egipte monoteizma, nefertites brolis ir vyras', 'echnatonas'),
(9615, 'Zymiausia xx adanijos rasytoja [orig.]', 'blixen'),
(9616, 'Kiek akiu yra voro kryziuocio galvakrutines nugarineje dalyje', '8'),
(9617, 'Vienuoliktasis jav prezidentas', 'polkas'),
(9618, 'Daugiausia kompiuteriniu architekturu palaikaiti operacine sistema', 'netbsd'),
(9619, '8-as pagal dydi lietuvos miskas [vnskilm.]', 'pagramancio'),
(9620, 'Plaukimo stilius', 'kraulis'),
(9621, 'Reljefas su labai aukstu iskilusiu vaizdu', 'horeljefas'),
(9622, 'Lietuviu rasytojas, apysaku kuprelis, vasaros vaises, bangos siaucia ir ktautorius', 'seinius'),
(9623, 'Saturno palydovas, pavadintas vienos is senoves graiku okeanidziu, titanu okeano ir tetijos dukters, vardu', 'telesta'),
(9624, 'Vengrijos stepes ir miskastepes', 'pusta'),
(9625, 'Rusu rasytojas, romano meistras ir margarita autorius', 'bulgakovas'),
(9626, 'Tautosakos rusis, grupiniu isminties is samojo vertybiu bei pramogavimo forma', 'misle'),
(9627, 'Karo scenu vaizdavimas daileje', 'batalistika'),
(9628, 'Miniatiurinis pauksciukas', 'kolibris'),
(9629, 'Marsalo salu respublikos administracinis teritorinis vienetas', 'sala'),
(9630, 'Vieta, is kurios spermatozoidas gauna energijos judejimui', 'mitochondriju ziedas'),
(9631, 'Kada buvi pirmoji dbz serija?', '1996');

-- --------------------------------------------------------

--
-- Table structure for table `zaidejai`
--

CREATE TABLE `zaidejai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nick` varchar(50) DEFAULT NULL,
  `ip` varchar(255) NOT NULL DEFAULT '',
  `lygis` bigint(255) DEFAULT 0,
  `exp` varchar(2550) NOT NULL DEFAULT '',
  `expl` varchar(2550) NOT NULL DEFAULT '',
  `pass` varchar(20) NOT NULL DEFAULT '',
  `litai` varchar(255) NOT NULL DEFAULT '',
  `kred` bigint(255) DEFAULT 0,
  `topic` varchar(225) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `k_dovana` varchar(1) NOT NULL DEFAULT '',
  `color` varchar(7) NOT NULL DEFAULT '',
  `veikejas` varchar(100) NOT NULL DEFAULT '',
  `online_time` int(255) DEFAULT 0,
  `css` varchar(100) NOT NULL DEFAULT '',
  `statusas` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_lithuanian_ci NOT NULL DEFAULT '',
  `mini_chat` int(1) DEFAULT 0,
  `jega` varchar(2550) NOT NULL DEFAULT '',
  `gynyba` varchar(2550) NOT NULL DEFAULT '',
  `gyvybes` bigint(20) DEFAULT 0,
  `max_gyvybes` bigint(20) DEFAULT 0,
  `veiksmai` bigint(255) DEFAULT 0,
  `dovana` varchar(2) NOT NULL DEFAULT '',
  `chate` int(11) DEFAULT 0,
  `vikte` int(11) DEFAULT 0,
  `forums` int(11) DEFAULT 0,
  `attime` int(11) DEFAULT 0,
  `taskai` int(11) DEFAULT 0,
  `b_zenu` varchar(255) NOT NULL DEFAULT '',
  `b_kreditu` bigint(20) DEFAULT 0,
  `bok_km` int(11) DEFAULT 0,
  `pveiksmai` bigint(20) DEFAULT 0,
  `vveiksmai` bigint(20) DEFAULT 0,
  `pask_veiksmas` int(11) DEFAULT 0,
  `uzsiregistravo` int(11) DEFAULT 0,
  `kmis` int(11) DEFAULT 0,
  `kambarys` int(11) DEFAULT 0,
  `trans` int(11) DEFAULT 0,
  `rep_teig` int(11) DEFAULT 0,
  `rep_neig` int(11) DEFAULT 0,
  `majin` int(11) DEFAULT 0,
  `snake` int(11) DEFAULT 0,
  `auto` varchar(3) NOT NULL DEFAULT '',
  `auto_time` int(11) DEFAULT 0,
  `pad_time` int(11) DEFAULT 0,
  `sagos` int(11) DEFAULT 0,
  `vegito` varchar(2) NOT NULL DEFAULT '',
  `minichatas` int(255) DEFAULT 0,
  `atved` varchar(255) NOT NULL,
  `dtopwin` varchar(255) NOT NULL DEFAULT '',
  `vardas` varchar(255) NOT NULL DEFAULT '',
  `dbal` int(11) DEFAULT 0,
  `balsavimas` varchar(2) NOT NULL DEFAULT '',
  `kai` varchar(2) NOT NULL DEFAULT '',
  `nbal` int(11) DEFAULT 0,
  `daily` varchar(255) NOT NULL DEFAULT '',
  `paskola` int(11) DEFAULT 0,
  `amzius` varchar(255) NOT NULL DEFAULT '',
  `miestas` varchar(255) NOT NULL DEFAULT '',
  `aprasymas` varchar(255) NOT NULL DEFAULT '',
  `guru` varchar(2) NOT NULL DEFAULT '',
  `vipas` int(11) DEFAULT 0,
  `meniu` varchar(2) NOT NULL DEFAULT '',
  `kate` varchar(1) NOT NULL DEFAULT '',
  `lazdele` varchar(1) NOT NULL DEFAULT '',
  `giras` varchar(1) NOT NULL DEFAULT '',
  `potara` varchar(1) NOT NULL DEFAULT '',
  `kmisijos` int(11) DEFAULT 0,
  `gravitacija` int(11) DEFAULT 0,
  `perejo` varchar(111) NOT NULL DEFAULT '',
  `drakonai` int(11) DEFAULT 0,
  `5x` int(11) DEFAULT 0,
  `10x` int(11) DEFAULT 0,
  `team` varchar(255) NOT NULL DEFAULT '',
  `kyborg` varchar(255) NOT NULL DEFAULT '',
  `atvede` bigint(255) DEFAULT 0,
  `sms_litai` varchar(255) NOT NULL DEFAULT '',
  `laimejo` varchar(255) NOT NULL DEFAULT '',
  `pralaimejo` varchar(255) NOT NULL DEFAULT '',
  `laimeta` varchar(255) NOT NULL DEFAULT '',
  `pralaimeta` varchar(255) NOT NULL DEFAULT '',
  `auksiniai` bigint(202) DEFAULT 0,
  `dzinas` varchar(255) NOT NULL DEFAULT '',
  `vezlys` varchar(255) NOT NULL DEFAULT '',
  `litis` varchar(255) NOT NULL DEFAULT '',
  `rodymas` int(1) DEFAULT 0,
  `last` varchar(255) NOT NULL DEFAULT '',
  `bu_kreditu` varchar(255) NOT NULL DEFAULT '',
  `bu_zenu` varchar(255) NOT NULL DEFAULT '',
  `pal` varchar(255) NOT NULL DEFAULT '',
  `nuotaika` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `cocon` varchar(255) NOT NULL DEFAULT '',
  `vip` varchar(255) NOT NULL DEFAULT '',
  `forc` varchar(255) NOT NULL DEFAULT '',
  `pajegos` varchar(255) NOT NULL DEFAULT '',
  `rase` varchar(255) NOT NULL DEFAULT '',
  `inv_rodymas` varchar(255) NOT NULL DEFAULT '',
  `gods_misija` varchar(255) NOT NULL DEFAULT '',
  `godss` bigint(255) DEFAULT 0,
  `kovos` varchar(255) NOT NULL DEFAULT '',
  `kovu_tm` varchar(255) NOT NULL DEFAULT '',
  `armor` varchar(255) NOT NULL DEFAULT '',
  `sword` varchar(255) NOT NULL DEFAULT '',
  `duxpx` int(11) DEFAULT 0,
  `lab` varchar(255) NOT NULL DEFAULT '',
  `lab_time` varchar(255) NOT NULL DEFAULT '',
  `kyborgas` varchar(255) NOT NULL DEFAULT '',
  `rinkimas` bigint(255) DEFAULT 0,
  `keite_veikejai` bigint(255) DEFAULT 0,
  `persikelimas` varchar(255) NOT NULL DEFAULT '',
  `duxaux` int(11) DEFAULT 0,
  `duxkrd` int(11) DEFAULT 0,
  `duxdaig` int(11) DEFAULT 0,
  `shadow` varchar(255) NOT NULL DEFAULT '',
  `pts` varchar(255) NOT NULL DEFAULT '',
  `k_laivas` varchar(255) NOT NULL DEFAULT '',
  `transformacija` varchar(255) NOT NULL DEFAULT '',
  `b_ltl` bigint(255) DEFAULT 0,
  `sbal` varchar(255) NOT NULL DEFAULT '',
  `delete` varchar(255) NOT NULL DEFAULT '',
  `mobai` int(11) DEFAULT 0,
  `dgax` int(11) DEFAULT 0,
  `persikelimo_manevras` varchar(1) NOT NULL DEFAULT '',
  `dgkrd` int(11) DEFAULT 0,
  `dgeur` int(11) DEFAULT 0,
  `dglg` int(11) DEFAULT 0,
  `bil` int(11) DEFAULT 0,
  `moscob` int(11) DEFAULT 0,
  `quitelab` int(11) DEFAULT 0,
  `jirenb` int(11) DEFAULT 0,
  `vadoseb` int(11) DEFAULT 0,
  `visasb` int(11) DEFAULT 0,
  `champab` int(11) DEFAULT 0,
  `billsb` int(11) DEFAULT 0,
  `maxfryzasb` int(11) DEFAULT 0,
  `hitasb` int(11) DEFAULT 0,
  `gokasb` int(11) DEFAULT 0,
  `vegetab` int(11) DEFAULT 0,
  `kabab` int(11) DEFAULT 0,
  `magetab` int(11) DEFAULT 0,
  `buub` int(11) DEFAULT 0,
  `babyb` int(11) DEFAULT 0,
  `goldozarub` int(11) DEFAULT 0,
  `fryzasb` int(11) DEFAULT 0,
  `s17b` int(11) DEFAULT 0,
  `gokas20xb` int(11) DEFAULT 0,
  `arackb` int(11) DEFAULT 0,
  `neptunom` int(11) DEFAULT 0,
  `vakarum` int(11) DEFAULT 0,
  `pietum` int(11) DEFAULT 0,
  `senasism` int(11) DEFAULT 0,
  `didysism` int(11) DEFAULT 0,
  `ozarum` int(11) DEFAULT 0,
  `kaleb` int(11) DEFAULT 0,
  `omegab` int(11) DEFAULT 0,
  `finalgokub` int(11) DEFAULT 0,
  `sidrab` int(11) DEFAULT 0,
  `blackb` int(11) DEFAULT 0,
  `senolisa` int(11) DEFAULT 0,
  `cusb` int(11) DEFAULT 0,
  `bitcoin` int(11) DEFAULT 0,
  `bt` int(11) DEFAULT 0,
  `bts` int(11) DEFAULT 0,
  `kabav` int(11) DEFAULT 0,
  `kalev` int(11) DEFAULT 0,
  `s17v` int(11) DEFAULT 0,
  `fryzasv` int(11) DEFAULT 0,
  `omegav` int(11) DEFAULT 0,
  `finalgokas` int(11) DEFAULT 0,
  `vegetav` int(11) DEFAULT 0,
  `botamov` int(11) DEFAULT 0,
  `babyv` int(11) DEFAULT 0,
  `buuv` int(11) DEFAULT 0,
  `hitasv` int(11) DEFAULT 0,
  `maxfryzasv` int(11) DEFAULT 0,
  `gokasv` int(11) DEFAULT 0,
  `sidrav` int(11) DEFAULT 0,
  `champav` int(11) DEFAULT 0,
  `wissv` int(11) DEFAULT 0,
  `vadosev` int(11) DEFAULT 0,
  `jirenv` int(11) DEFAULT 0,
  `quitelav` int(11) DEFAULT 0,
  `moscov` int(11) DEFAULT 0,
  `gokas20xv` int(11) DEFAULT 0,
  `arackv` int(11) DEFAULT 0,
  `cusv` int(11) DEFAULT 0,
  `pliusai` int(255) DEFAULT 0,
  `kovutaskai` int(11) DEFAULT 0,
  `pliusaib` int(11) DEFAULT 0,
  `ktb` int(11) DEFAULT 0,
  `prizas1` int(11) DEFAULT 0,
  `kd` int(11) DEFAULT 0,
  `m1` varchar(255) NOT NULL DEFAULT '',
  `m2` varchar(255) NOT NULL DEFAULT '',
  `m3` varchar(255) NOT NULL DEFAULT '',
  `m4` varchar(255) NOT NULL DEFAULT '',
  `m5` varchar(255) NOT NULL DEFAULT '',
  `m6` varchar(255) NOT NULL DEFAULT '',
  `Kurejas` int(11) DEFAULT 0,
  `dalybuap` int(11) DEFAULT 0,
  `dalybuap2` int(11) DEFAULT 0,
  `plvl1` int(11) DEFAULT 0,
  `plvl2` int(11) DEFAULT 0,
  `plvl3` int(11) DEFAULT 0,
  `plvl4` int(11) DEFAULT 0,
  `plvl5` int(11) DEFAULT 0,
  `pv1` int(11) DEFAULT 0,
  `pv2` int(11) DEFAULT 0,
  `pv3` int(11) DEFAULT 0,
  `pv4` int(11) DEFAULT 0,
  `pv5` int(11) DEFAULT 0,
  `pe1` int(11) DEFAULT 0,
  `pe2` int(11) DEFAULT 0,
  `pe3` int(11) DEFAULT 0,
  `pe4` int(11) DEFAULT 0,
  `pe5` int(11) DEFAULT 0,
  `plvl6` int(11) DEFAULT 0,
  `plvl7` int(11) DEFAULT 0,
  `plvl8` int(11) DEFAULT 0,
  `plvl9` int(11) DEFAULT 0,
  `plvl10` int(11) DEFAULT 0,
  `pv6` int(11) DEFAULT 0,
  `pv7` int(11) DEFAULT 0,
  `pv8` int(11) DEFAULT 0,
  `pv9` int(11) DEFAULT 0,
  `pv10` int(11) DEFAULT 0,
  `pm2` int(11) DEFAULT 0,
  `pm3` int(11) DEFAULT 0,
  `pm4` int(11) DEFAULT 0,
  `pm5` int(11) DEFAULT 0,
  `pm6` int(11) DEFAULT 0,
  `pm7` int(11) DEFAULT 0,
  `pm8` int(11) DEFAULT 0,
  `pm9` int(11) DEFAULT 0,
  `pm10` int(11) DEFAULT 0,
  `ps1` int(11) DEFAULT 0,
  `ps2` int(11) DEFAULT 0,
  `ps3` int(11) DEFAULT 0,
  `ps4` int(11) DEFAULT 0,
  `ps5` int(11) DEFAULT 0,
  `ps6` int(11) DEFAULT 0,
  `ps7` int(11) DEFAULT 0,
  `ps8` int(11) DEFAULT 0,
  `ps9` int(11) DEFAULT 0,
  `ps10` int(11) DEFAULT 0,
  `pz1` int(11) DEFAULT 0,
  `pz2` int(11) DEFAULT 0,
  `pz3` int(11) DEFAULT 0,
  `pz4` int(11) DEFAULT 0,
  `pz5` int(11) DEFAULT 0,
  `pz6` int(11) DEFAULT 0,
  `pz7` int(11) DEFAULT 0,
  `pz8` int(11) DEFAULT 0,
  `pz9` int(11) DEFAULT 0,
  `pz10` int(11) DEFAULT 0,
  `pm1` int(11) DEFAULT 0,
  `mojitob` int(11) DEFAULT 0,
  `geeneb` int(11) DEFAULT 0,
  `iwanb` int(11) DEFAULT 0,
  `prestb` int(11) DEFAULT 0,
  `zenob` int(11) DEFAULT 0,
  `kda` varchar(250) NOT NULL DEFAULT '',
  `nm1` int(11) DEFAULT 0,
  `nm2` int(11) DEFAULT 0,
  `nm3` int(11) DEFAULT 0,
  `nm4` int(11) DEFAULT 0,
  `nm5` int(11) DEFAULT 0,
  `m7` int(11) DEFAULT 0,
  `m8` int(11) DEFAULT 0,
  `m9` int(11) DEFAULT 0,
  `m10` int(11) DEFAULT 0,
  `gravitacija2` varchar(11) NOT NULL DEFAULT '',
  `gravitacija3` varchar(11) NOT NULL DEFAULT '',
  `gravitacija4` varchar(11) NOT NULL DEFAULT '',
  `gravitacija5` varchar(11) NOT NULL DEFAULT '',
  `Super_amulet` varchar(255) NOT NULL DEFAULT '',
  `amuletas` varchar(255) NOT NULL DEFAULT '',
  `swordu` varchar(255) NOT NULL DEFAULT '',
  `armoru` varchar(255) NOT NULL DEFAULT '',
  `amuletasu` varchar(255) NOT NULL DEFAULT '',
  `Gold_sword2` varchar(2) NOT NULL DEFAULT '',
  `Trankso_kardas2` varchar(2) NOT NULL DEFAULT '',
  `vipas1` varchar(2) NOT NULL DEFAULT '',
  `vipas2` varchar(2) NOT NULL DEFAULT '',
  `vipas3` varchar(2) NOT NULL DEFAULT '',
  `vipas4` varchar(2) NOT NULL DEFAULT '',
  `vipas5` varchar(2) NOT NULL DEFAULT '',
  `vipas6` varchar(2) NOT NULL DEFAULT '',
  `vipas7` varchar(2) NOT NULL DEFAULT '',
  `vipas8` varchar(2) NOT NULL DEFAULT '',
  `vipas9` varchar(2) NOT NULL DEFAULT '',
  `vipas10` varchar(2) NOT NULL DEFAULT '',
  `vipticket` varchar(255) NOT NULL DEFAULT '',
  `ad16` varchar(11) NOT NULL DEFAULT '',
  `ad17` varchar(11) NOT NULL DEFAULT '',
  `ad18` varchar(11) NOT NULL DEFAULT '',
  `ad19` varchar(11) NOT NULL DEFAULT '',
  `ad20` varchar(11) NOT NULL DEFAULT '',
  `nukirtobosu` int(11) DEFAULT 0,
  `critical` int(11) DEFAULT 0,
  `kiekzalos` bigint(11) DEFAULT 0,
  `vandensh` varchar(11) NOT NULL DEFAULT '',
  `gyvateskm` int(11) DEFAULT 0,
  `karinokm` int(11) DEFAULT 0,
  `gyvates` varchar(255) NOT NULL DEFAULT '',
  `pv11` int(11) DEFAULT 0,
  `pv12` int(11) DEFAULT 0,
  `pv13` int(11) DEFAULT 0,
  `pv14` int(11) DEFAULT 0,
  `pv15` int(11) DEFAULT 0,
  `kiek_unikaliu` int(11) DEFAULT 0,
  `pltaskai` varchar(255) NOT NULL DEFAULT '',
  `pllaikas` varchar(255) NOT NULL DEFAULT '',
  `antipl` varchar(255) NOT NULL DEFAULT '',
  `laimetapl` varchar(255) NOT NULL DEFAULT '',
  `pralaimetapl` varchar(255) NOT NULL DEFAULT '',
  `kenergija` varchar(11) NOT NULL DEFAULT '',
  `kenergija2` varchar(11) NOT NULL DEFAULT '',
  `Kamehameha` varchar(11) NOT NULL DEFAULT '',
  `Finalflash` varchar(2) NOT NULL DEFAULT '',
  `Masenko` varchar(2) NOT NULL DEFAULT '',
  `kenergija3` varchar(255) NOT NULL DEFAULT '',
  `kenergija4` varchar(255) NOT NULL DEFAULT '',
  `Galickgun` varchar(2) NOT NULL DEFAULT '',
  `kenergija5` varchar(255) NOT NULL DEFAULT '',
  `Deathlaser` varchar(2) NOT NULL DEFAULT '',
  `Gack` varchar(2) NOT NULL DEFAULT '',
  `kenergija6` varchar(11) NOT NULL DEFAULT '',
  `kenergija7` varchar(11) NOT NULL DEFAULT '',
  `kenergija8` varchar(11) NOT NULL DEFAULT '',
  `kenergija9` varchar(11) NOT NULL DEFAULT '',
  `kenergija10` varchar(11) NOT NULL DEFAULT '',
  `Sayanpower` varchar(2) NOT NULL DEFAULT '',
  `Makosen` varchar(2) NOT NULL DEFAULT '',
  `Kamehameha2` varchar(2) NOT NULL DEFAULT '',
  `Telekinesis` varchar(2) NOT NULL DEFAULT '',
  `Changed` varchar(2) NOT NULL DEFAULT '',
  `Begone` varchar(2) NOT NULL DEFAULT '',
  `Regeneration` varchar(2) NOT NULL DEFAULT '',
  `kenergija11` varchar(11) NOT NULL DEFAULT '',
  `kenergija12` varchar(11) NOT NULL DEFAULT '',
  `kenergija13` varchar(11) NOT NULL DEFAULT '',
  `kenergija14` varchar(11) NOT NULL DEFAULT '',
  `kenergija15` varchar(11) NOT NULL DEFAULT '',
  `ArmBreak` varchar(2) NOT NULL DEFAULT '',
  `Healing` varchar(2) NOT NULL DEFAULT '',
  `AngryBulma` varchar(2) NOT NULL DEFAULT '',
  `dienosmedal` int(111) DEFAULT 0,
  `dienosmedaltime` varchar(255) NOT NULL DEFAULT '',
  `vipas11` varchar(255) NOT NULL DEFAULT '',
  `vipas12` varchar(255) NOT NULL DEFAULT '',
  `vipas13` varchar(255) NOT NULL DEFAULT '',
  `vipas14` varchar(255) NOT NULL DEFAULT '',
  `vipas15` varchar(255) NOT NULL DEFAULT '',
  `billsv` varchar(255) NOT NULL DEFAULT '',
  `prizas2` varchar(255) NOT NULL DEFAULT '',
  `dailyp` int(255) DEFAULT 0,
  `malkur` int(255) DEFAULT 0,
  `zvejybosr` int(255) DEFAULT 0,
  `kasimor` int(255) DEFAULT 0,
  `kasimolvl` int(255) DEFAULT 0,
  `expl2` varchar(255) NOT NULL DEFAULT '',
  `vip1m` varchar(255) NOT NULL DEFAULT '',
  `vip2m` varchar(255) NOT NULL DEFAULT '',
  `vip3m` varchar(255) NOT NULL DEFAULT '',
  `veikejas2` varchar(255) NOT NULL DEFAULT '',
  `kda2` int(255) DEFAULT 0,
  `ruda1` int(255) DEFAULT 0,
  `ruda2` int(255) DEFAULT 0,
  `ruda3` int(55) DEFAULT 0,
  `ruda4` int(255) DEFAULT 0,
  `ruda5` int(245) DEFAULT 0,
  `autok` varchar(2) NOT NULL DEFAULT '',
  `kasimasa` varchar(255) NOT NULL DEFAULT '',
  `vip7m` varchar(255) NOT NULL DEFAULT '',
  `vip10m` varchar(255) NOT NULL DEFAULT '',
  `vip12m` varchar(255) NOT NULL DEFAULT '',
  `vip15m` varchar(255) NOT NULL DEFAULT '',
  `sms` int(255) DEFAULT 0,
  `vip5m` varchar(2) NOT NULL DEFAULT '',
  `hoppb` varchar(255) NOT NULL DEFAULT '',
  `kasimpad1` int(255) DEFAULT 0,
  `kasimpad2` int(255) DEFAULT 0,
  `kasimas2x` varchar(255) NOT NULL DEFAULT '',
  `kasimolvl2x` varchar(255) NOT NULL DEFAULT '',
  `kasimoreward` varchar(2) NOT NULL DEFAULT '',
  `sms2` varchar(255) NOT NULL DEFAULT '',
  `kovureward` varchar(2) NOT NULL DEFAULT '',
  `surinktapin` varchar(255) NOT NULL DEFAULT '',
  `dyspob` varchar(255) NOT NULL DEFAULT '',
  `monak` varchar(255) NOT NULL DEFAULT '',
  `istorija` int(255) DEFAULT 0,
  `rato_time` varchar(255) NOT NULL DEFAULT '',
  `kovu_misijos` int(255) DEFAULT 0,
  `vipas16` varchar(255) NOT NULL DEFAULT '',
  `vipas17` varchar(255) NOT NULL DEFAULT '',
  `vipas18` varchar(255) NOT NULL DEFAULT '',
  `vipas19` varchar(255) NOT NULL DEFAULT '',
  `vipas20` varchar(255) NOT NULL DEFAULT '',
  `cognacb` varchar(255) NOT NULL DEFAULT '',
  `cukatailb` varchar(255) NOT NULL DEFAULT '',
  `gokasultrab` varchar(255) NOT NULL DEFAULT '',
  `vipas21` varchar(255) NOT NULL DEFAULT '',
  `vipas22` varchar(255) NOT NULL DEFAULT '',
  `vipas23` varchar(255) NOT NULL DEFAULT '',
  `vipas24` varchar(255) NOT NULL DEFAULT '',
  `vipas25` varchar(255) NOT NULL DEFAULT '',
  `vipas26` char(1) DEFAULT NULL,
  `gokasultramb` varchar(255) NOT NULL DEFAULT '',
  `omnikingb` varchar(255) NOT NULL DEFAULT '',
  `futomnikingb` varchar(255) NOT NULL DEFAULT '',
  `grandpriestb` varchar(255) NOT NULL DEFAULT '',
  `jbal` varchar(255) NOT NULL DEFAULT '',
  `jirenmb` varchar(255) NOT NULL DEFAULT '',
  `toppomb` varchar(255) NOT NULL DEFAULT '',
  `kiek_trn` int(254) DEFAULT 0,
  `namekm` int(32) DEFAULT 0,
  `kajum` int(22) DEFAULT 0,
  `juodam` int(222) DEFAULT 0,
  `botas` int(255) DEFAULT 0,
  `botas5x` varchar(255) NOT NULL DEFAULT '',
  `botas2xkg` varchar(245) NOT NULL DEFAULT '',
  `keflab` varchar(255) NOT NULL DEFAULT '',
  `pvisi` int(255) DEFAULT 0,
  `zamasub` varchar(99) NOT NULL DEFAULT '',
  `gohanultrab` varchar(99) NOT NULL DEFAULT '',
  `vegetaultrab` varchar(99) NOT NULL DEFAULT '',
  `20xpin` varchar(99) NOT NULL DEFAULT '',
  `vipm` varchar(222) NOT NULL DEFAULT '',
  `vipm2` varchar(222) NOT NULL DEFAULT '',
  `vipm3` varchar(222) NOT NULL DEFAULT '',
  `vipm4` varchar(222) NOT NULL DEFAULT '',
  `vipm5` varchar(222) NOT NULL DEFAULT '',
  `kg2` varchar(222) NOT NULL DEFAULT '',
  `vegitoultrab` varchar(222) NOT NULL DEFAULT '',
  `kovuimg` varchar(2) NOT NULL DEFAULT '',
  `kasimom` int(111) DEFAULT 0,
  `megavip` varchar(111) NOT NULL DEFAULT '',
  `supervip` varchar(111) NOT NULL DEFAULT '',
  `ultravip` varchar(111) NOT NULL DEFAULT '',
  `deletelock` int(1) DEFAULT 0,
  `baby` varchar(255) NOT NULL DEFAULT '',
  `broly` varchar(225) NOT NULL DEFAULT '',
  `daily_mission_token` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `komanda_time` bigint(20) UNSIGNED DEFAULT NULL,
  `last_fight_time` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `zaidejai`
--

INSERT INTO `zaidejai` (`id`, `nick`, `ip`, `lygis`, `exp`, `expl`, `pass`, `litai`, `kred`, `topic`, `k_dovana`, `color`, `veikejas`, `online_time`, `css`, `statusas`, `mini_chat`, `jega`, `gynyba`, `gyvybes`, `max_gyvybes`, `veiksmai`, `dovana`, `chate`, `vikte`, `forums`, `attime`, `taskai`, `b_zenu`, `b_kreditu`, `bok_km`, `pveiksmai`, `vveiksmai`, `pask_veiksmas`, `uzsiregistravo`, `kmis`, `kambarys`, `trans`, `rep_teig`, `rep_neig`, `majin`, `snake`, `auto`, `auto_time`, `pad_time`, `sagos`, `vegito`, `minichatas`, `atved`, `dtopwin`, `vardas`, `dbal`, `balsavimas`, `kai`, `nbal`, `daily`, `paskola`, `amzius`, `miestas`, `aprasymas`, `guru`, `vipas`, `meniu`, `kate`, `lazdele`, `giras`, `potara`, `kmisijos`, `gravitacija`, `perejo`, `drakonai`, `5x`, `10x`, `team`, `kyborg`, `atvede`, `sms_litai`, `laimejo`, `pralaimejo`, `laimeta`, `pralaimeta`, `auksiniai`, `dzinas`, `vezlys`, `litis`, `rodymas`, `last`, `bu_kreditu`, `bu_zenu`, `pal`, `nuotaika`, `email`, `cocon`, `vip`, `forc`, `pajegos`, `rase`, `inv_rodymas`, `gods_misija`, `godss`, `kovos`, `kovu_tm`, `armor`, `sword`, `duxpx`, `lab`, `lab_time`, `kyborgas`, `rinkimas`, `keite_veikejai`, `persikelimas`, `duxaux`, `duxkrd`, `duxdaig`, `shadow`, `pts`, `k_laivas`, `transformacija`, `b_ltl`, `sbal`, `delete`, `mobai`, `dgax`, `persikelimo_manevras`, `dgkrd`, `dgeur`, `dglg`, `bil`, `moscob`, `quitelab`, `jirenb`, `vadoseb`, `visasb`, `champab`, `billsb`, `maxfryzasb`, `hitasb`, `gokasb`, `vegetab`, `kabab`, `magetab`, `buub`, `babyb`, `goldozarub`, `fryzasb`, `s17b`, `gokas20xb`, `arackb`, `neptunom`, `vakarum`, `pietum`, `senasism`, `didysism`, `ozarum`, `kaleb`, `omegab`, `finalgokub`, `sidrab`, `blackb`, `senolisa`, `cusb`, `bitcoin`, `bt`, `bts`, `kabav`, `kalev`, `s17v`, `fryzasv`, `omegav`, `finalgokas`, `vegetav`, `botamov`, `babyv`, `buuv`, `hitasv`, `maxfryzasv`, `gokasv`, `sidrav`, `champav`, `wissv`, `vadosev`, `jirenv`, `quitelav`, `moscov`, `gokas20xv`, `arackv`, `cusv`, `pliusai`, `kovutaskai`, `pliusaib`, `ktb`, `prizas1`, `kd`, `m1`, `m2`, `m3`, `m4`, `m5`, `m6`, `Kurejas`, `dalybuap`, `dalybuap2`, `plvl1`, `plvl2`, `plvl3`, `plvl4`, `plvl5`, `pv1`, `pv2`, `pv3`, `pv4`, `pv5`, `pe1`, `pe2`, `pe3`, `pe4`, `pe5`, `plvl6`, `plvl7`, `plvl8`, `plvl9`, `plvl10`, `pv6`, `pv7`, `pv8`, `pv9`, `pv10`, `pm2`, `pm3`, `pm4`, `pm5`, `pm6`, `pm7`, `pm8`, `pm9`, `pm10`, `ps1`, `ps2`, `ps3`, `ps4`, `ps5`, `ps6`, `ps7`, `ps8`, `ps9`, `ps10`, `pz1`, `pz2`, `pz3`, `pz4`, `pz5`, `pz6`, `pz7`, `pz8`, `pz9`, `pz10`, `pm1`, `mojitob`, `geeneb`, `iwanb`, `prestb`, `zenob`, `kda`, `nm1`, `nm2`, `nm3`, `nm4`, `nm5`, `m7`, `m8`, `m9`, `m10`, `gravitacija2`, `gravitacija3`, `gravitacija4`, `gravitacija5`, `Super_amulet`, `amuletas`, `swordu`, `armoru`, `amuletasu`, `Gold_sword2`, `Trankso_kardas2`, `vipas1`, `vipas2`, `vipas3`, `vipas4`, `vipas5`, `vipas6`, `vipas7`, `vipas8`, `vipas9`, `vipas10`, `vipticket`, `ad16`, `ad17`, `ad18`, `ad19`, `ad20`, `nukirtobosu`, `critical`, `kiekzalos`, `vandensh`, `gyvateskm`, `karinokm`, `gyvates`, `pv11`, `pv12`, `pv13`, `pv14`, `pv15`, `kiek_unikaliu`, `pltaskai`, `pllaikas`, `antipl`, `laimetapl`, `pralaimetapl`, `kenergija`, `kenergija2`, `Kamehameha`, `Finalflash`, `Masenko`, `kenergija3`, `kenergija4`, `Galickgun`, `kenergija5`, `Deathlaser`, `Gack`, `kenergija6`, `kenergija7`, `kenergija8`, `kenergija9`, `kenergija10`, `Sayanpower`, `Makosen`, `Kamehameha2`, `Telekinesis`, `Changed`, `Begone`, `Regeneration`, `kenergija11`, `kenergija12`, `kenergija13`, `kenergija14`, `kenergija15`, `ArmBreak`, `Healing`, `AngryBulma`, `dienosmedal`, `dienosmedaltime`, `vipas11`, `vipas12`, `vipas13`, `vipas14`, `vipas15`, `billsv`, `prizas2`, `dailyp`, `malkur`, `zvejybosr`, `kasimor`, `kasimolvl`, `expl2`, `vip1m`, `vip2m`, `vip3m`, `veikejas2`, `kda2`, `ruda1`, `ruda2`, `ruda3`, `ruda4`, `ruda5`, `autok`, `kasimasa`, `vip7m`, `vip10m`, `vip12m`, `vip15m`, `sms`, `vip5m`, `hoppb`, `kasimpad1`, `kasimpad2`, `kasimas2x`, `kasimolvl2x`, `kasimoreward`, `sms2`, `kovureward`, `surinktapin`, `dyspob`, `monak`, `istorija`, `rato_time`, `kovu_misijos`, `vipas16`, `vipas17`, `vipas18`, `vipas19`, `vipas20`, `cognacb`, `cukatailb`, `gokasultrab`, `vipas21`, `vipas22`, `vipas23`, `vipas24`, `vipas25`, `vipas26`, `gokasultramb`, `omnikingb`, `futomnikingb`, `grandpriestb`, `jbal`, `jirenmb`, `toppomb`, `kiek_trn`, `namekm`, `kajum`, `juodam`, `botas`, `botas5x`, `botas2xkg`, `keflab`, `pvisi`, `zamasub`, `gohanultrab`, `vegetaultrab`, `20xpin`, `vipm`, `vipm2`, `vipm3`, `vipm4`, `vipm5`, `kg2`, `vegitoultrab`, `kovuimg`, `kasimom`, `megavip`, `supervip`, `ultravip`, `deletelock`, `baby`, `broly`, `daily_mission_token`, `komanda_time`, `last_fight_time`) VALUES
(1, 'testas1', 'Paslaptis', 1, '0', '50', 'testas1', '50000', 20, '', '', 'white', 'Gokas', 86, '2', 'Žaidėjas', 1, '60', '180', 100, 100, 0, '', 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 1684664652, 1, 0, 0, 0, 0, 0, 1, '', 0, 0, 1, '', 1, '', '', '', 0, '', '-', 0, '', 0, '', '', '', '', 0, '', '', '', '', '', 1, 0, '', 0, 0, 0, '', '', 0, '10', '', '', '0', '0', 0, '', '', '', 10, '1684664744', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', 'Neuzdetas', 'Neuzdetas', 0, '', '', '', 1, 0, '', 0, 0, 0, '', '0', '', '', 0, '', '', 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', 'Neuzdetas', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0, '', '', '1684751052', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', 0, '', '', 0, 0, '', '', '', '', '', '', '', '', 1, '', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', 0, 1, 0, 0, 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '1', '', '', 1, '', '', '', 0, '', '', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arena`
--
ALTER TABLE `arena`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arenos_log`
--
ALTER TABLE `arenos_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ats_boss`
--
ALTER TABLE `ats_boss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atv`
--
ALTER TABLE `atv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atvedimas`
--
ALTER TABLE `atvedimas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aukcijonas`
--
ALTER TABLE `aukcijonas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aukc_history`
--
ALTER TABLE `aukc_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auros`
--
ALTER TABLE `auros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auru_inf`
--
ALTER TABLE `auru_inf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autoboss`
--
ALTER TABLE `autoboss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baby_misija`
--
ALTER TABLE `baby_misija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bals`
--
ALTER TABLE `bals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balsavimas`
--
ALTER TABLE `balsavimas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bals_rez`
--
ALTER TABLE `bals_rez`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ban_logai`
--
ALTER TABLE `ban_logai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bbc`
--
ALTER TABLE `bbc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bendravimo_log`
--
ALTER TABLE `bendravimo_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bendravimo_top`
--
ALTER TABLE `bendravimo_top`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `block1`
--
ALTER TABLE `block1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boss`
--
ALTER TABLE `boss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `b_komentarai`
--
ALTER TABLE `b_komentarai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `b_rez`
--
ALTER TABLE `b_rez`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daigtu_laikas`
--
ALTER TABLE `daigtu_laikas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily`
--
ALTER TABLE `daily`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dalybos`
--
ALTER TABLE `dalybos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dienosmisijos`
--
ALTER TABLE `dienosmisijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dievas`
--
ALTER TABLE `dievas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `draugai`
--
ALTER TABLE `draugai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtop`
--
ALTER TABLE `dtop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtopas`
--
ALTER TABLE `dtopas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtop_log`
--
ALTER TABLE `dtop_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duk`
--
ALTER TABLE `duk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duk_kom`
--
ALTER TABLE `duk_kom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventas`
--
ALTER TABLE `eventas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_kat`
--
ALTER TABLE `forum_kat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_tem`
--
ALTER TABLE `forum_tem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_zin`
--
ALTER TABLE `forum_zin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_likes`
--
ALTER TABLE `foto_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galios_turnyras`
--
ALTER TABLE `galios_turnyras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goko_istorija`
--
ALTER TABLE `goko_istorija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv`
--
ALTER TABLE `inv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nick` (`nick`);

--
-- Indexes for table `inventorius`
--
ALTER TABLE `inventorius`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ip_ban`
--
ALTER TABLE `ip_ban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isbarstyta`
--
ALTER TABLE `isbarstyta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `juodasis_sarasas`
--
ALTER TABLE `juodasis_sarasas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kasimotop`
--
ALTER TABLE `kasimotop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kasimo_log`
--
ALTER TABLE `kasimo_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kasykla`
--
ALTER TABLE `kasykla`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kasykla2`
--
ALTER TABLE `kasykla2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kasykla3`
--
ALTER TABLE `kasykla3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kasyklav`
--
ALTER TABLE `kasyklav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kasyklav2`
--
ALTER TABLE `kasyklav2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kasyklav3`
--
ALTER TABLE `kasyklav3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klaidos`
--
ALTER TABLE `klaidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komandos_dtop_log`
--
ALTER TABLE `komandos_dtop_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komandos_sav_log`
--
ALTER TABLE `komandos_sav_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komandu_dtop`
--
ALTER TABLE `komandu_dtop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komandu_sav_dtop`
--
ALTER TABLE `komandu_sav_dtop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentarai`
--
ALTER TABLE `komentarai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kovu_apsauga`
--
ALTER TABLE `kovu_apsauga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kvietimai_i_komanda`
--
ALTER TABLE `kvietimai_i_komanda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lankomumo_logas`
--
ALTER TABLE `lankomumo_logas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `legendinis_sajanas`
--
ALTER TABLE `legendinis_sajanas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logas`
--
ALTER TABLE `logas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `message` (`message`);

--
-- Indexes for table `lokacijos`
--
ALTER TABLE `lokacijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokacijosv`
--
ALTER TABLE `lokacijosv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loterija`
--
ALTER TABLE `loterija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m2_lokacijos`
--
ALTER TABLE `m2_lokacijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m2_mobai`
--
ALTER TABLE `m2_mobai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medaliai`
--
ALTER TABLE `medaliai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misijos`
--
ALTER TABLE `misijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misijos2`
--
ALTER TABLE `misijos2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobai`
--
ALTER TABLE `mobai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobaiv`
--
ALTER TABLE `mobaiv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moddal`
--
ALTER TABLE `moddal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mokykla`
--
ALTER TABLE `mokykla`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_rep`
--
ALTER TABLE `news_rep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nick_turgus`
--
ALTER TABLE `nick_turgus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ns`
--
ALTER TABLE `ns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nustatymai`
--
ALTER TABLE `nustatymai`
  ADD PRIMARY KEY (`1`);

--
-- Indexes for table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakvietimai`
--
ALTER TABLE `pakvietimai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasiek`
--
ALTER TABLE `pasiek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasiek2`
--
ALTER TABLE `pasiek2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasiekimai`
--
ALTER TABLE `pasiekimai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasiekimu_kategorijos`
--
ALTER TABLE `pasiekimu_kategorijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasiulymai`
--
ALTER TABLE `pasiulymai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pas_kom`
--
ALTER TABLE `pas_kom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pas_rep`
--
ALTER TABLE `pas_rep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perved_log`
--
ALTER TABLE `perved_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinigai`
--
ALTER TABLE `pinigai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_daily_mission_top`
--
ALTER TABLE `player_daily_mission_top`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pm`
--
ALTER TABLE `pm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pms`
--
ALTER TABLE `pms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pms2`
--
ALTER TABLE `pms2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pm_ban`
--
ALTER TABLE `pm_ban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pokalbiai`
--
ALTER TABLE `pokalbiai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prasosi_i_komanda`
--
ALTER TABLE `prasosi_i_komanda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quest`
--
ALTER TABLE `quest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referal`
--
ALTER TABLE `referal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referalas`
--
ALTER TABLE `referalas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reklama`
--
ALTER TABLE `reklama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rep`
--
ALTER TABLE `rep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rinkimas`
--
ALTER TABLE `rinkimas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saskpap`
--
ALTER TABLE `saskpap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sav_dtop`
--
ALTER TABLE `sav_dtop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siukslynas`
--
ALTER TABLE `siukslynas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smile`
--
ALTER TABLE `smile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smstop_log`
--
ALTER TABLE `smstop_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_log`
--
ALTER TABLE `sms_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_reklama`
--
ALTER TABLE `sms_reklama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_top`
--
ALTER TABLE `sms_top`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `snake_misijos`
--
ALTER TABLE `snake_misijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statusai`
--
ALTER TABLE `statusai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stilius`
--
ALTER TABLE `stilius`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `susijungimas`
--
ALTER TABLE `susijungimas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_top`
--
ALTER TABLE `s_top`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teammedal`
--
ALTER TABLE `teammedal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teammedal2`
--
ALTER TABLE `teammedal2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teammedal3`
--
ALTER TABLE `teammedal3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teammedals`
--
ALTER TABLE `teammedals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_boss`
--
ALTER TABLE `team_boss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_logas`
--
ALTER TABLE `team_logas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_nariai`
--
ALTER TABLE `team_nariai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technikos`
--
ALTER TABLE `technikos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tikslas`
--
ALTER TABLE `tikslas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transformacijos`
--
ALTER TABLE `transformacijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuffle_lokacijos`
--
ALTER TABLE `tuffle_lokacijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuffle_mobai`
--
ALTER TABLE `tuffle_mobai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turgus`
--
ALTER TABLE `turgus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turn`
--
ALTER TABLE `turn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turnyras`
--
ALTER TABLE `turnyras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unikalai`
--
ALTER TABLE `unikalai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_daily_mission`
--
ALTER TABLE `user_daily_mission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_status_created_at` (`user_id`,`status`,`created_at`) USING BTREE;

--
-- Indexes for table `uzsakymai`
--
ALTER TABLE `uzsakymai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaskinimas`
--
ALTER TABLE `vaskinimas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `veikejai`
--
ALTER TABLE `veikejai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `veikejas`
--
ALTER TABLE `veikejas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vertinimai`
--
ALTER TABLE `vertinimai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vietam`
--
ALTER TABLE `vietam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vietap`
--
ALTER TABLE `vietap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vikte_cfg`
--
ALTER TABLE `vikte_cfg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vikte_chat`
--
ALTER TABLE `vikte_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vikte_klsm`
--
ALTER TABLE `vikte_klsm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zaidejai`
--
ALTER TABLE `zaidejai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nick` (`nick`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arena`
--
ALTER TABLE `arena`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `arenos_log`
--
ALTER TABLE `arenos_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ats_boss`
--
ALTER TABLE `ats_boss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `atv`
--
ALTER TABLE `atv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `atvedimas`
--
ALTER TABLE `atvedimas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aukcijonas`
--
ALTER TABLE `aukcijonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=448;

--
-- AUTO_INCREMENT for table `aukc_history`
--
ALTER TABLE `aukc_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auros`
--
ALTER TABLE `auros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auto`
--
ALTER TABLE `auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `autoboss`
--
ALTER TABLE `autoboss`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `baby_misija`
--
ALTER TABLE `baby_misija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bals`
--
ALTER TABLE `bals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `balsavimas`
--
ALTER TABLE `balsavimas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bals_rez`
--
ALTER TABLE `bals_rez`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ban_logai`
--
ALTER TABLE `ban_logai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bbc`
--
ALTER TABLE `bbc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bendravimo_log`
--
ALTER TABLE `bendravimo_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bendravimo_top`
--
ALTER TABLE `bendravimo_top`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `block1`
--
ALTER TABLE `block1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `boss`
--
ALTER TABLE `boss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `b_komentarai`
--
ALTER TABLE `b_komentarai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `b_rez`
--
ALTER TABLE `b_rez`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daigtu_laikas`
--
ALTER TABLE `daigtu_laikas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily`
--
ALTER TABLE `daily`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dalybos`
--
ALTER TABLE `dalybos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dienosmisijos`
--
ALTER TABLE `dienosmisijos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dievas`
--
ALTER TABLE `dievas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `draugai`
--
ALTER TABLE `draugai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dtop`
--
ALTER TABLE `dtop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dtopas`
--
ALTER TABLE `dtopas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dtop_log`
--
ALTER TABLE `dtop_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `duk`
--
ALTER TABLE `duk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `duk_kom`
--
ALTER TABLE `duk_kom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventas`
--
ALTER TABLE `eventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_tem`
--
ALTER TABLE `forum_tem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_zin`
--
ALTER TABLE `forum_zin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_likes`
--
ALTER TABLE `foto_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galios_turnyras`
--
ALTER TABLE `galios_turnyras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goko_istorija`
--
ALTER TABLE `goko_istorija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inv`
--
ALTER TABLE `inv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventorius`
--
ALTER TABLE `inventorius`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ip_ban`
--
ALTER TABLE `ip_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `isbarstyta`
--
ALTER TABLE `isbarstyta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `juodasis_sarasas`
--
ALTER TABLE `juodasis_sarasas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kasimotop`
--
ALTER TABLE `kasimotop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kasimo_log`
--
ALTER TABLE `kasimo_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klaidos`
--
ALTER TABLE `klaidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `komandos_dtop_log`
--
ALTER TABLE `komandos_dtop_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komandos_sav_log`
--
ALTER TABLE `komandos_sav_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komandu_dtop`
--
ALTER TABLE `komandu_dtop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komandu_sav_dtop`
--
ALTER TABLE `komandu_sav_dtop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentarai`
--
ALTER TABLE `komentarai`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kovu_apsauga`
--
ALTER TABLE `kovu_apsauga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kvietimai_i_komanda`
--
ALTER TABLE `kvietimai_i_komanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lankomumo_logas`
--
ALTER TABLE `lankomumo_logas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logas`
--
ALTER TABLE `logas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loterija`
--
ALTER TABLE `loterija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `machine`
--
ALTER TABLE `machine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medaliai`
--
ALTER TABLE `medaliai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `misijos`
--
ALTER TABLE `misijos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `misijos2`
--
ALTER TABLE `misijos2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `moddal`
--
ALTER TABLE `moddal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mokykla`
--
ALTER TABLE `mokykla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_rep`
--
ALTER TABLE `news_rep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nick_turgus`
--
ALTER TABLE `nick_turgus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ns`
--
ALTER TABLE `ns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nustatymai`
--
ALTER TABLE `nustatymai`
  MODIFY `1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `online`
--
ALTER TABLE `online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pakvietimai`
--
ALTER TABLE `pakvietimai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pasiek`
--
ALTER TABLE `pasiek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pasiek2`
--
ALTER TABLE `pasiek2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `pasiekimai`
--
ALTER TABLE `pasiekimai`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pasiekimu_kategorijos`
--
ALTER TABLE `pasiekimu_kategorijos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pasiulymai`
--
ALTER TABLE `pasiulymai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pas_kom`
--
ALTER TABLE `pas_kom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pas_rep`
--
ALTER TABLE `pas_rep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perved_log`
--
ALTER TABLE `perved_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pinigai`
--
ALTER TABLE `pinigai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `player_daily_mission_top`
--
ALTER TABLE `player_daily_mission_top`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pm`
--
ALTER TABLE `pm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pms`
--
ALTER TABLE `pms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pms2`
--
ALTER TABLE `pms2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pm_ban`
--
ALTER TABLE `pm_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pokalbiai`
--
ALTER TABLE `pokalbiai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prasosi_i_komanda`
--
ALTER TABLE `prasosi_i_komanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quest`
--
ALTER TABLE `quest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `referal`
--
ALTER TABLE `referal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referalas`
--
ALTER TABLE `referalas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reklama`
--
ALTER TABLE `reklama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rep`
--
ALTER TABLE `rep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rinkimas`
--
ALTER TABLE `rinkimas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saskpap`
--
ALTER TABLE `saskpap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sav_dtop`
--
ALTER TABLE `sav_dtop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siukslynas`
--
ALTER TABLE `siukslynas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smile`
--
ALTER TABLE `smile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `smstop_log`
--
ALTER TABLE `smstop_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_log`
--
ALTER TABLE `sms_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_top`
--
ALTER TABLE `sms_top`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `snake_misijos`
--
ALTER TABLE `snake_misijos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statusai`
--
ALTER TABLE `statusai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stilius`
--
ALTER TABLE `stilius`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `susijungimas`
--
ALTER TABLE `susijungimas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `s_top`
--
ALTER TABLE `s_top`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teammedal`
--
ALTER TABLE `teammedal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teammedal2`
--
ALTER TABLE `teammedal2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teammedal3`
--
ALTER TABLE `teammedal3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teammedals`
--
ALTER TABLE `teammedals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_boss`
--
ALTER TABLE `team_boss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `team_logas`
--
ALTER TABLE `team_logas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_nariai`
--
ALTER TABLE `team_nariai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `technikos`
--
ALTER TABLE `technikos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tikslas`
--
ALTER TABLE `tikslas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transformacijos`
--
ALTER TABLE `transformacijos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tuffle_lokacijos`
--
ALTER TABLE `tuffle_lokacijos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tuffle_mobai`
--
ALTER TABLE `tuffle_mobai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `turgus`
--
ALTER TABLE `turgus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `turn`
--
ALTER TABLE `turn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `turnyras`
--
ALTER TABLE `turnyras`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unikalai`
--
ALTER TABLE `unikalai`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_daily_mission`
--
ALTER TABLE `user_daily_mission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uzsakymai`
--
ALTER TABLE `uzsakymai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `vaskinimas`
--
ALTER TABLE `vaskinimas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `veikejai`
--
ALTER TABLE `veikejai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `veikejas`
--
ALTER TABLE `veikejas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vertinimai`
--
ALTER TABLE `vertinimai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vikte_chat`
--
ALTER TABLE `vikte_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zaidejai`
--
ALTER TABLE `zaidejai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
