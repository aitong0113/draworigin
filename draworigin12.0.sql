-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3307
-- 產生時間： 2025-09-18 08:37:55
-- 伺服器版本： 11.5.2-MariaDB
-- PHP 版本： 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `draworigin`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id` varchar(11) NOT NULL COMMENT '訂單編號',
  `payType` int(11) DEFAULT NULL COMMENT '付款方式',
  `memberId` int(11) DEFAULT NULL COMMENT '會員編號',
  `amount` int(11) DEFAULT NULL COMMENT '應付金額',
  `payAmount` int(11) DEFAULT NULL COMMENT '付款金額',
  `pay` char(1) DEFAULT NULL COMMENT 'Y:已付款',
  `payTime` datetime DEFAULT NULL COMMENT '付款時間',
  `flowNo` varchar(20) DEFAULT NULL COMMENT '金流公司編號',
  `authBank` varchar(10) DEFAULT NULL COMMENT '信用卡授權碼',
  `auth` char(6) DEFAULT NULL COMMENT '信用卡授權碼',
  `payBank` char(3) DEFAULT NULL COMMENT 'ATM付款銀行',
  `accountCode` varchar(5) DEFAULT NULL COMMENT '轉帳後五碼',
  `payAccount` varchar(20) DEFAULT NULL COMMENT 'ATM繳費帳號',
  `codeNo` varchar(30) DEFAULT NULL COMMENT '超商繳費代碼',
  `storeId` varchar(10) DEFAULT NULL COMMENT '繳款超商',
  `barcode1` varchar(20) DEFAULT NULL COMMENT '超商第一段條碼',
  `barcode2` varchar(20) DEFAULT NULL COMMENT '超商第二段條碼',
  `barcode3` varchar(20) DEFAULT NULL COMMENT '超商第三段條碼',
  `message` varchar(50) DEFAULT NULL COMMENT '金流公司回傳訊息',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` tinyint(4) NOT NULL,
  `city` varchar(10) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 傾印資料表的資料 `cities`
--

INSERT INTO `cities` (`id`, `city`) VALUES
(1, '臺北市'),
(2, '基隆市'),
(3, '新北市'),
(4, '宜蘭縣'),
(6, '新竹市'),
(7, '新竹縣'),
(5, '桃園市'),
(8, '苗栗縣'),
(9, '臺中市'),
(10, '彰化縣'),
(11, '南投縣'),
(12, '雲林縣'),
(13, '嘉義市'),
(14, '嘉義縣'),
(15, '臺南市'),
(16, '高雄市'),
(20, '澎湖縣'),
(17, '屏東縣'),
(18, '臺東縣'),
(19, '花蓮縣'),
(21, '金門縣'),
(22, '連江縣');

-- --------------------------------------------------------

--
-- 資料表結構 `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(10) DEFAULT NULL,
  `colorName` varchar(10) DEFAULT NULL,
  `active` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `color`
--

INSERT INTO `color` (`id`, `color`, `colorName`, `active`) VALUES
(5, '#C4F0FF', '藍色', 'Y'),
(3, '#E7CCFF', '紫色', 'Y'),
(4, '#FFC1C1', '紅色', 'Y');

-- --------------------------------------------------------

--
-- 資料表結構 `dist`
--

DROP TABLE IF EXISTS `dist`;
CREATE TABLE IF NOT EXISTS `dist` (
  `id` int(11) NOT NULL,
  `city` varchar(10) DEFAULT '',
  `dist` varchar(10) NOT NULL DEFAULT '',
  `zip` varchar(3) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 傾印資料表的資料 `dist`
--

INSERT INTO `dist` (`id`, `city`, `dist`, `zip`) VALUES
(1, '臺北市', '中正區', '100'),
(2, '臺北市', '大同區', '103'),
(3, '臺北市', '中山區', '104'),
(4, '臺北市', '松山區', '105'),
(5, '臺北市', '大安區', '106'),
(6, '臺北市', '萬華區', '108'),
(7, '臺北市', '信義區', '110'),
(8, '臺北市', '士林區', '111'),
(9, '臺北市', '北投區', '112'),
(10, '臺北市', '內湖區', '114'),
(11, '臺北市', '南港區', '115'),
(12, '臺北市', '文山區', '116'),
(13, '基隆市', '仁愛區', '200'),
(14, '基隆市', '信義區', '201'),
(15, '基隆市', '中正區', '202'),
(16, '基隆市', '中山區', '203'),
(17, '基隆市', '安樂區', '204'),
(18, '基隆市', '暖暖區', '205'),
(19, '基隆市', '七堵區', '206'),
(20, '新北市', '萬里區', '207'),
(21, '新北市', '金山區', '208'),
(22, '新北市', '板橋區', '220'),
(23, '新北市', '汐止區', '221'),
(24, '新北市', '深坑區', '222'),
(25, '新北市', '石碇區', '223'),
(26, '新北市', '瑞芳區', '224'),
(27, '新北市', '平溪區', '226'),
(28, '新北市', '雙溪區', '227'),
(29, '新北市', '貢寮區', '228'),
(30, '新北市', '新店區', '231'),
(31, '新北市', '坪林區', '232'),
(32, '新北市', '烏來區', '233'),
(33, '新北市', '永和區', '234'),
(34, '新北市', '中和區', '235'),
(35, '新北市', '土城區', '236'),
(36, '新北市', '三峽區', '237'),
(37, '新北市', '樹林區', '238'),
(38, '新北市', '鶯歌區', '239'),
(39, '新北市', '三重區', '241'),
(40, '新北市', '新莊區', '242'),
(41, '新北市', '泰山區', '243'),
(42, '新北市', '林口區', '244'),
(43, '新北市', '蘆洲區', '247'),
(44, '新北市', '五股區', '248'),
(45, '新北市', '八里區', '249'),
(46, '新北市', '淡水區', '251'),
(47, '新北市', '三芝區', '252'),
(48, '新北市', '石門區', '253'),
(49, '宜蘭縣', '宜蘭市', '260'),
(50, '宜蘭縣', '頭城鎮', '261'),
(51, '宜蘭縣', '礁溪鄉', '262'),
(52, '宜蘭縣', '壯圍鄉', '263'),
(53, '宜蘭縣', '員山鄉', '264'),
(54, '宜蘭縣', '羅東鎮', '265'),
(55, '宜蘭縣', '三星鄉', '266'),
(56, '宜蘭縣', '大同鄉', '267'),
(57, '宜蘭縣', '五結鄉', '268'),
(58, '宜蘭縣', '冬山鄉', '269'),
(59, '宜蘭縣', '蘇澳鎮', '270'),
(60, '宜蘭縣', '南澳鄉', '272'),
(61, '宜蘭縣', '釣魚台列嶼', '290'),
(62, '新竹市', '東區', '300'),
(63, '新竹縣', '竹北市', '302'),
(64, '新竹縣', '湖口鄉', '303'),
(65, '新竹縣', '新豐鄉', '304'),
(66, '新竹縣', '新埔鎮', '305'),
(67, '新竹縣', '關西鎮', '306'),
(68, '新竹縣', '芎林鄉', '307'),
(69, '新竹縣', '寶山鄉', '308'),
(70, '新竹縣', '竹東鎮', '310'),
(71, '新竹縣', '五峰鄉', '311'),
(72, '新竹縣', '橫山鄉', '312'),
(73, '新竹縣', '尖石鄉', '313'),
(74, '新竹縣', '北埔鄉', '314'),
(75, '新竹縣', '峨眉鄉', '315'),
(76, '桃園市', '中壢區', '320'),
(77, '桃園市', '平鎮區', '324'),
(78, '桃園市', '龍潭區', '325'),
(79, '桃園市', '楊梅區', '326'),
(80, '桃園市', '新屋區', '327'),
(81, '桃園市', '觀音區', '328'),
(82, '桃園市', '桃園區', '330'),
(83, '桃園市', '龜山區', '333'),
(84, '桃園市', '八德區', '334'),
(85, '桃園市', '大溪區', '335'),
(86, '桃園市', '復興區', '336'),
(87, '桃園市', '大園區', '337'),
(88, '桃園市', '蘆竹區', '338'),
(89, '苗栗縣', '竹南鎮', '350'),
(90, '苗栗縣', '頭份鎮', '351'),
(91, '苗栗縣', '三灣鄉', '352'),
(92, '苗栗縣', '南庄鄉', '353'),
(93, '苗栗縣', '獅潭鄉', '354'),
(94, '苗栗縣', '後龍鎮', '356'),
(95, '苗栗縣', '通霄鎮', '357'),
(96, '苗栗縣', '苑裡鎮', '358'),
(97, '苗栗縣', '苗栗市', '360'),
(98, '苗栗縣', '造橋鄉', '361'),
(99, '苗栗縣', '頭屋鄉', '362'),
(100, '苗栗縣', '公館鄉', '363'),
(101, '苗栗縣', '大湖鄉', '364'),
(102, '苗栗縣', '泰安鄉', '365'),
(103, '苗栗縣', '銅鑼鄉', '366'),
(104, '苗栗縣', '三義鄉', '367'),
(105, '苗栗縣', '西湖鄉', '368'),
(106, '苗栗縣', '卓蘭鎮', '369'),
(107, '臺中市', '中區', '400'),
(108, '臺中市', '東區', '401'),
(109, '臺中市', '南區', '402'),
(110, '臺中市', '西區', '403'),
(111, '臺中市', '北區', '404'),
(112, '臺中市', '北屯區', '406'),
(113, '臺中市', '西屯區', '407'),
(114, '臺中市', '南屯區', '408'),
(115, '臺中市', '太平區', '411'),
(116, '臺中市', '大里區', '412'),
(117, '臺中市', '霧峰區', '413'),
(118, '臺中市', '烏日區', '414'),
(119, '臺中市', '豐原區', '420'),
(120, '臺中市', '后里區', '421'),
(121, '臺中市', '石岡區', '422'),
(122, '臺中市', '東勢區', '423'),
(123, '臺中市', '和平區', '424'),
(124, '臺中市', '新社區', '426'),
(125, '臺中市', '潭子區', '427'),
(126, '臺中市', '大雅區', '428'),
(127, '臺中市', '神岡區', '429'),
(128, '臺中市', '大肚區', '432'),
(129, '臺中市', '沙鹿區', '433'),
(130, '臺中市', '龍井區', '434'),
(131, '臺中市', '梧棲區', '435'),
(132, '臺中市', '清水區', '436'),
(133, '臺中市', '大甲區', '437'),
(134, '臺中市', '外埔區', '438'),
(135, '臺中市', '大安區', '439'),
(136, '彰化縣', '彰化市', '500'),
(137, '彰化縣', '芬園鄉', '502'),
(138, '彰化縣', '花壇鄉', '503'),
(139, '彰化縣', '秀水鄉', '504'),
(140, '彰化縣', '鹿港鎮', '505'),
(141, '彰化縣', '福興鄉', '506'),
(142, '彰化縣', '線西鄉', '507'),
(143, '彰化縣', '和美鎮', '508'),
(144, '彰化縣', '伸港鄉', '509'),
(145, '彰化縣', '員林鎮', '510'),
(146, '彰化縣', '社頭鄉', '511'),
(147, '彰化縣', '永靖鄉', '512'),
(148, '彰化縣', '埔心鄉', '513'),
(149, '彰化縣', '溪湖鎮', '514'),
(150, '彰化縣', '大村鄉', '515'),
(151, '彰化縣', '埔鹽鄉', '516'),
(152, '彰化縣', '田中鎮', '520'),
(153, '彰化縣', '北斗鎮', '521'),
(154, '彰化縣', '田尾鄉', '522'),
(155, '彰化縣', '埤頭鄉', '523'),
(156, '彰化縣', '溪州鄉', '524'),
(157, '彰化縣', '竹塘鄉', '525'),
(158, '彰化縣', '二林鎮', '526'),
(159, '彰化縣', '大城鄉', '527'),
(160, '彰化縣', '芳苑鄉', '528'),
(161, '彰化縣', '二水鄉', '530'),
(162, '南投縣', '南投市', '540'),
(163, '南投縣', '中寮鄉', '541'),
(164, '南投縣', '草屯鎮', '542'),
(165, '南投縣', '國姓鄉', '544'),
(166, '南投縣', '埔里鎮', '545'),
(167, '南投縣', '仁愛鄉', '546'),
(168, '南投縣', '名間鄉', '551'),
(169, '南投縣', '集集鎮', '552'),
(170, '南投縣', '水里鄉', '553'),
(171, '南投縣', '魚池鄉', '555'),
(172, '南投縣', '信義鄉', '556'),
(173, '南投縣', '竹山鎮', '557'),
(174, '南投縣', '鹿谷鄉', '558'),
(175, '雲林縣', '斗南鎮', '630'),
(176, '雲林縣', '大埤鄉', '631'),
(177, '雲林縣', '虎尾鎮', '632'),
(178, '雲林縣', '土庫鎮', '633'),
(179, '雲林縣', '褒忠鄉', '634'),
(180, '雲林縣', '東勢鄉', '635'),
(181, '雲林縣', '臺西鄉', '636'),
(182, '雲林縣', '崙背鄉', '637'),
(183, '雲林縣', '麥寮鄉', '638'),
(184, '雲林縣', '斗六市', '640'),
(185, '雲林縣', '林內鄉', '643'),
(186, '雲林縣', '古坑鄉', '646'),
(187, '雲林縣', '莿桐鄉', '647'),
(188, '雲林縣', '西螺鎮', '648'),
(189, '雲林縣', '二崙鄉', '649'),
(190, '雲林縣', '北港鎮', '651'),
(191, '雲林縣', '水林鄉', '652'),
(192, '雲林縣', '口湖鄉', '653'),
(193, '雲林縣', '四湖鄉', '654'),
(194, '雲林縣', '元長鄉', '655'),
(195, '嘉義市', '東區', '600'),
(196, '嘉義縣', '番路鄉', '602'),
(197, '嘉義縣', '梅山鄉', '603'),
(198, '嘉義縣', '竹崎鄉', '604'),
(199, '嘉義縣', '阿里山鄉', '605'),
(200, '嘉義縣', '中埔鄉', '606'),
(201, '嘉義縣', '大埔鄉', '607'),
(202, '嘉義縣', '水上鄉', '608'),
(203, '嘉義縣', '鹿草鄉', '611'),
(204, '嘉義縣', '太保市', '612'),
(205, '嘉義縣', '朴子市', '613'),
(206, '嘉義縣', '東石鄉', '614'),
(207, '嘉義縣', '六腳鄉', '615'),
(208, '嘉義縣', '新港鄉', '616'),
(209, '嘉義縣', '民雄鄉', '621'),
(210, '嘉義縣', '大林鎮', '622'),
(211, '嘉義縣', '溪口鄉', '623'),
(212, '嘉義縣', '義竹鄉', '624'),
(213, '嘉義縣', '布袋鎮', '625'),
(214, '臺南市', '中西區', '700'),
(215, '臺南市', '東區', '701'),
(216, '臺南市', '南區', '702'),
(217, '臺南市', '北區', '704'),
(218, '臺南市', '安平區', '708'),
(219, '臺南市', '安南區', '709'),
(220, '臺南市', '永康區', '710'),
(221, '臺南市', '歸仁區', '711'),
(222, '臺南市', '新化區', '712'),
(223, '臺南市', '左鎮區', '713'),
(224, '臺南市', '玉井區', '714'),
(225, '臺南市', '楠西區', '715'),
(226, '臺南市', '南化區', '716'),
(227, '臺南市', '仁德區', '717'),
(228, '臺南市', '關廟區', '718'),
(229, '臺南市', '龍崎區', '719'),
(230, '臺南市', '官田區', '720'),
(231, '臺南市', '麻豆區', '721'),
(232, '臺南市', '佳里區', '722'),
(233, '臺南市', '西港區', '723'),
(234, '臺南市', '七股區', '724'),
(235, '臺南市', '將軍區', '725'),
(236, '臺南市', '學甲區', '726'),
(237, '臺南市', '北門區', '727'),
(238, '臺南市', '新營區', '730'),
(239, '臺南市', '後壁區', '731'),
(240, '臺南市', '白河區', '732'),
(241, '臺南市', '東山區', '733'),
(242, '臺南市', '六甲區', '734'),
(243, '臺南市', '下營區', '735'),
(244, '臺南市', '柳營區', '736'),
(245, '臺南市', '鹽水區', '737'),
(246, '臺南市', '善化區', '741'),
(247, '臺南市', '大內區', '742'),
(248, '臺南市', '山上區', '743'),
(249, '臺南市', '新市區', '744'),
(250, '臺南市', '安定區', '745'),
(251, '高雄市', '新興區', '800'),
(252, '高雄市', '前金區', '801'),
(253, '高雄市', '苓雅區', '802'),
(254, '高雄市', '鹽埕區', '803'),
(255, '高雄市', '鼓山區', '804'),
(256, '高雄市', '旗津區', '805'),
(257, '高雄市', '前鎮區', '806'),
(258, '高雄市', '三民區', '807'),
(259, '高雄市', '楠梓區', '811'),
(260, '高雄市', '小港區', '812'),
(261, '高雄市', '左營區', '813'),
(262, '高雄市', '仁武區', '814'),
(263, '高雄市', '大社區', '815'),
(264, '高雄市', '岡山區', '820'),
(265, '高雄市', '路竹區', '821'),
(266, '高雄市', '阿蓮區', '822'),
(267, '高雄市', '田寮區', '823'),
(268, '高雄市', '燕巢區', '824'),
(269, '高雄市', '橋頭區', '825'),
(270, '高雄市', '梓官區', '826'),
(271, '高雄市', '彌陀區', '827'),
(272, '高雄市', '永安區', '828'),
(273, '高雄市', '湖內區', '829'),
(274, '高雄市', '鳳山區', '830'),
(275, '高雄市', '大寮區', '831'),
(276, '高雄市', '林園區', '832'),
(277, '高雄市', '鳥松區', '833'),
(278, '高雄市', '大樹區', '840'),
(279, '高雄市', '旗山區', '842'),
(280, '高雄市', '美濃區', '843'),
(281, '高雄市', '六龜區', '844'),
(282, '高雄市', '內門區', '845'),
(283, '高雄市', '杉林區', '846'),
(284, '高雄市', '甲仙區', '847'),
(285, '高雄市', '桃源區', '848'),
(286, '高雄市', '那瑪夏區', '849'),
(287, '高雄市', '茂林區', '851'),
(288, '高雄市', '茄萣區', '852'),
(389, '23', '東沙', '817'),
(390, '23', '南沙', '819'),
(291, '澎湖縣', '馬公市', '880'),
(292, '澎湖縣', '西嶼鄉', '881'),
(293, '澎湖縣', '望安鄉', '882'),
(294, '澎湖縣', '七美鄉', '883'),
(295, '澎湖縣', '白沙鄉', '884'),
(296, '澎湖縣', '湖西鄉', '885'),
(297, '屏東縣', '屏東市', '900'),
(298, '屏東縣', '三地門鄉', '901'),
(299, '屏東縣', '霧臺鄉', '902'),
(300, '屏東縣', '瑪家鄉', '903'),
(301, '屏東縣', '九如鄉', '904'),
(302, '屏東縣', '里港鄉', '905'),
(303, '屏東縣', '高樹鄉', '906'),
(304, '屏東縣', '鹽埔鄉', '907'),
(305, '屏東縣', '長治鄉', '908'),
(306, '屏東縣', '麟洛鄉', '909'),
(307, '屏東縣', '竹田鄉', '911'),
(308, '屏東縣', '內埔鄉', '912'),
(309, '屏東縣', '萬丹鄉', '913'),
(310, '屏東縣', '潮州鎮', '920'),
(311, '屏東縣', '泰武鄉', '921'),
(312, '屏東縣', '來義鄉', '922'),
(313, '屏東縣', '萬巒鄉', '923'),
(314, '屏東縣', '崁頂鄉', '924'),
(315, '屏東縣', '新埤鄉', '925'),
(316, '屏東縣', '南州鄉', '926'),
(317, '屏東縣', '林邊鄉', '927'),
(318, '屏東縣', '東港鄉', '928'),
(319, '屏東縣', '琉球鄉', '929'),
(320, '屏東縣', '佳冬鄉', '931'),
(321, '屏東縣', '新園鄉', '932'),
(322, '屏東縣', '枋寮鄉', '940'),
(323, '屏東縣', '枋山鄉', '941'),
(324, '屏東縣', '春日鄉', '942'),
(325, '屏東縣', '獅子鄉', '943'),
(326, '屏東縣', '車城鄉', '944'),
(327, '屏東縣', '牡丹鄉', '945'),
(328, '屏東縣', '恆春鄉', '946'),
(329, '屏東縣', '滿州鄉', '947'),
(330, '臺東縣', '臺東市', '950'),
(331, '臺東縣', '綠島鄉', '951'),
(332, '臺東縣', '蘭嶼鄉', '952'),
(333, '臺東縣', '延平鄉', '953'),
(334, '臺東縣', '卑南鄉', '954'),
(335, '臺東縣', '鹿野鄉', '955'),
(336, '臺東縣', '關山鎮', '956'),
(337, '臺東縣', '海端鄉', '957'),
(338, '臺東縣', '池上鄉', '958'),
(339, '臺東縣', '東河鄉', '959'),
(340, '臺東縣', '成功鎮', '961'),
(341, '臺東縣', '長濱鄉', '962'),
(342, '臺東縣', '太麻里鄉', '963'),
(343, '臺東縣', '金峰鄉', '964'),
(344, '臺東縣', '大武鄉', '965'),
(345, '臺東縣', '達仁鄉', '966'),
(346, '花蓮縣', '花蓮市', '970'),
(347, '花蓮縣', '新城鄉', '971'),
(348, '花蓮縣', '秀林鄉', '972'),
(349, '花蓮縣', '吉安鄉', '973'),
(350, '花蓮縣', '壽豐鄉', '974'),
(351, '花蓮縣', '鳳林鎮', '975'),
(352, '花蓮縣', '光復鄉', '976'),
(353, '花蓮縣', '豐濱鄉', '977'),
(354, '花蓮縣', '瑞穗鄉', '978'),
(355, '花蓮縣', '萬榮鄉', '979'),
(356, '花蓮縣', '玉里鎮', '981'),
(357, '花蓮縣', '卓溪鄉', '982'),
(358, '花蓮縣', '富里鄉', '983'),
(359, '金門縣', '金沙鎮', '890'),
(360, '金門縣', '金湖鎮', '891'),
(361, '金門縣', '金寧鄉', '892'),
(362, '金門縣', '金城鎮', '893'),
(363, '金門縣', '烈嶼鄉', '894'),
(364, '金門縣', '烏坵鄉', '896'),
(365, '連江縣', '南竿鄉', '209'),
(366, '連江縣', '北竿鄉', '210'),
(367, '連江縣', '莒光鄉', '211'),
(368, '連江縣', '東引鄉', '212'),
(369, '新竹市', '北區', '300'),
(370, '新竹市', '香山區', '300'),
(371, '嘉義市', '西區', '600');

-- --------------------------------------------------------

--
-- 資料表結構 `label`
--

DROP TABLE IF EXISTS `label`;
CREATE TABLE IF NOT EXISTS `label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(30) DEFAULT NULL,
  `active` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `label`
--

INSERT INTO `label` (`id`, `label`, `active`) VALUES
(3, '2025_09_02_14_30_01_473.png', 'Y'),
(5, '2025_09_02_14_30_07_497.png', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `manager`
--

DROP TABLE IF EXISTS `manager`;
CREATE TABLE IF NOT EXISTS `manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(10) DEFAULT NULL,
  `pwd` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `manager`
--

INSERT INTO `manager` (`id`, `userId`, `pwd`) VALUES
(1, '123', '123');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(191) NOT NULL,
  `userName` varchar(30) DEFAULT NULL,
  `pwd` varchar(255) NOT NULL,
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `member_email_unique` (`email`),
  KEY `id` (`email`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`id`, `email`, `userName`, `pwd`, `createTime`) VALUES
(1, '111', '111', '123', '2025-08-11 06:58:38'),
(4, '333@gmail.com', '123', '123', '2025-08-11 08:12:19'),
(15, '8888@gmail.com', '8888', '777777', '2025-09-02 05:21:04');

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_09_15_112420_create_ships_table', 1),
(2, '2025_09_15_113341_create_order_table', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `photo` varchar(30) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `photo`, `dates`, `createTime`) VALUES
(37, '蛇年小小插畫師-陳同學', '學員心得：\r<br/>三天各3小時的 Procreate 蛇年插畫課超好玩！第一天像開新遊戲，學兩指復原、圖層跟對稱，把彎彎小金蛇畫出來。第二天上色加陰影、高光，做了三張小小新年圖：抱紅包、探出春聯、掛燈籠，畫面留空白更好看。第三天把尺寸調成明信片，邊邊留白、加祝福字，輸出印出來，熱熱的紙超香，剪好送爸媽和阿公阿嬤。我覺得自己不是只會畫，而是能把年味變成禮物，超有成就感！', '2025_09_11_10_04_58_560.jpg', '2025-09-08', '2025-09-08 06:04:54');

-- --------------------------------------------------------

--
-- 資料表結構 `news_detail`
--

DROP TABLE IF EXISTS `news_detail`;
CREATE TABLE IF NOT EXISTS `news_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `newsId` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `photo` varchar(30) DEFAULT NULL,
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `newsld` (`newsId`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `news_detail`
--

INSERT INTO `news_detail` (`id`, `newsId`, `content`, `photo`, `createTime`) VALUES
(32, 37, '《小蛇送福氣》\r<br/>今年是蛇年，所以我想畫一條可愛的小蛇來祝大家新年快樂！\r<br/>我讓小蛇戴著金元寶、拿著紅色果子，還掛著「福」字的裝飾，這樣看起來就很喜氣、很熱鬧。\r<br/>我特地把小蛇畫得圓滾滾的、笑咪咪的，想讓大家覺得蛇也可以很可愛，不會可怕。\r<br/>我用綠色表示春天和新年的新氣象，紅色和金色代表好運和幸福。希望大家看到我的畫，都能覺得心裡暖暖的、開開心心！', '2025_09_11_10_09_24_325.jpg', '2025-09-11 02:09:16'),
(33, 37, '《年年有魚》\r<br/>我畫了一隻藍藍的大魚，牠的表情有點調皮，牙齒尖尖的好像在偷笑。我特別在旁邊寫了「年年有魚」，因為我想讓這幅畫看起來很有新年的感覺，也祝大家每一年都很豐收、很幸福！', '2025_09_11_10_10_37_573.jpg', '2025-09-11 02:10:37');

-- --------------------------------------------------------

--
-- 資料表結構 `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `ordertemp`
--

DROP TABLE IF EXISTS `ordertemp`;
CREATE TABLE IF NOT EXISTS `ordertemp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sessionId` varchar(100) DEFAULT NULL,
  `memberId` int(11) DEFAULT NULL COMMENT '會員編號',
  `productId` int(11) DEFAULT NULL COMMENT '產品代碼',
  `sizeId` int(11) DEFAULT NULL COMMENT '尺寸',
  `colorId` int(11) DEFAULT NULL COMMENT '顏色',
  `qty` int(11) DEFAULT NULL COMMENT '數量',
  `price` int(11) DEFAULT NULL COMMENT '售價',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `ordertemp`
--

INSERT INTO `ordertemp` (`id`, `sessionId`, `memberId`, `productId`, `sizeId`, `colorId`, `qty`, `price`, `createTime`) VALUES
(1, 'M9pEUSMuKQei8mqRybkqXOLpeD4hiwaZxOL61B8T', 1, 11, NULL, NULL, 5, 77867, '2025-09-09 01:29:14'),
(2, 'M9pEUSMuKQei8mqRybkqXOLpeD4hiwaZxOL61B8T', 1, 21, 3, 3, 8, 3213, '2025-09-09 01:29:23'),
(3, 'M9pEUSMuKQei8mqRybkqXOLpeD4hiwaZxOL61B8T', 1, 7, 1, 3, 5, 666, '2025-09-09 02:07:06'),
(4, 'M9pEUSMuKQei8mqRybkqXOLpeD4hiwaZxOL61B8T', 1, 23, 1, 5, 1, 9999, '2025-09-09 03:23:16'),
(5, 'M9pEUSMuKQei8mqRybkqXOLpeD4hiwaZxOL61B8T', 1, 22, 2, 5, NULL, 46456, '2025-09-09 03:31:01'),
(6, 'M9pEUSMuKQei8mqRybkqXOLpeD4hiwaZxOL61B8T', 1, 24, 2, 5, 21, 1, '2025-09-09 03:46:15'),
(7, 'M9pEUSMuKQei8mqRybkqXOLpeD4hiwaZxOL61B8T', 1, 25, 1, 3, 30, 2, '2025-09-09 03:50:52'),
(8, '5Bm5lLD4TyP3WVgZ84rjXNcqOQ9GIO6czgT19B5W', NULL, 29, 2, 4, 5, 299, '2025-09-10 05:15:26'),
(9, '5Bm5lLD4TyP3WVgZ84rjXNcqOQ9GIO6czgT19B5W', NULL, 26, 2, 4, 3, 299, '2025-09-10 05:15:41'),
(31, 'uUU46YTGVWsw4FBZJ1Yj0nmSLwkMW9O3STUEMGz6', 1, 29, 2, 4, 2, 299, '2025-09-18 08:06:50'),
(25, 'FcfcwF8IIHXvAIAnH82mmyBc4mnIn414BtrIrTyX', 1, 26, 2, 4, 6, 299, '2025-09-16 02:48:11'),
(26, 'mDAwreKheqyLczH2FB2DIum41y5ZongokIxm8FgR', 1, 26, 2, 4, 1, 299, '2025-09-17 00:31:39'),
(30, 'uUU46YTGVWsw4FBZJ1Yj0nmSLwkMW9O3STUEMGz6', 1, 29, NULL, NULL, 2, 299, '2025-09-18 08:06:08'),
(21, 'eEu3SraTM4PIivCZgqS9YgOGa4FlyPkrKl9X0icz', 1, 26, 14, 4, 3, 299, '2025-09-15 03:34:50'),
(27, 'uUU46YTGVWsw4FBZJ1Yj0nmSLwkMW9O3STUEMGz6', 1, 26, 2, 4, 2, 299, '2025-09-18 03:21:25'),
(28, 'uUU46YTGVWsw4FBZJ1Yj0nmSLwkMW9O3STUEMGz6', 1, 30, 3, 3, 1, 9999, '2025-09-18 07:46:07');

-- --------------------------------------------------------

--
-- 資料表結構 `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` char(11) DEFAULT NULL COMMENT '訂單編號',
  `productId` int(11) DEFAULT NULL COMMENT '產品編號',
  `colorId` int(11) DEFAULT NULL COMMENT '顏色代碼',
  `sizeId` int(11) DEFAULT NULL COMMENT '尺寸代碼',
  `qty` int(11) DEFAULT NULL COMMENT '數量',
  `amount` int(11) DEFAULT NULL COMMENT '金額',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `order_master`
--

DROP TABLE IF EXISTS `order_master`;
CREATE TABLE IF NOT EXISTS `order_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` char(11) DEFAULT NULL COMMENT '訂單編號',
  `memblerId` int(11) DEFAULT NULL COMMENT '會員編號',
  `amount` int(11) DEFAULT NULL COMMENT '金額',
  `fee` int(11) DEFAULT NULL COMMENT '運費',
  `totalAmount` int(11) DEFAULT NULL COMMENT '總金額',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `order_ship`
--

DROP TABLE IF EXISTS `order_ship`;
CREATE TABLE IF NOT EXISTS `order_ship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` char(11) DEFAULT NULL COMMENT '訂單編號',
  `memberId` int(11) DEFAULT NULL COMMENT '會員編號',
  `shipType` int(11) DEFAULT NULL COMMENT '配送方式',
  `storeId` varchar(10) DEFAULT NULL COMMENT '超商',
  `city` varchar(10) DEFAULT NULL COMMENT '縣市',
  `dist` varchar(10) DEFAULT NULL COMMENT '鄉鎮市區',
  `tel` varchar(20) DEFAULT NULL COMMENT '收件人電話',
  `address` varchar(100) DEFAULT NULL COMMENT '收件人地址',
  `times` varchar(10) DEFAULT NULL COMMENT '收件時間',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  `userId` char(10) DEFAULT NULL COMMENT '取貨人身分證',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payName` varchar(10) DEFAULT NULL,
  `actvie` char(1) DEFAULT NULL COMMENT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `payment`
--

INSERT INTO `payment` (`id`, `payName`, `actvie`) VALUES
(1, '超商條碼繳費', NULL),
(2, '信用卡', NULL),
(4, 'ATM', NULL),
(3, 'WebATM', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `layer` int(11) DEFAULT NULL,
  `itemNo` int(11) NOT NULL COMMENT '商品編號',
  `itemName` varchar(50) DEFAULT NULL COMMENT '品名',
  `title` varchar(100) DEFAULT NULL COMMENT '標題',
  `content` varchar(200) DEFAULT NULL COMMENT '產品描述',
  `qty` int(11) DEFAULT NULL COMMENT '數量,空值時為不限量',
  `price` int(11) DEFAULT NULL COMMENT '定價',
  `salePrice` int(11) DEFAULT NULL COMMENT '售價',
  `isNew` char(1) DEFAULT NULL COMMENT 'Y:最新產品',
  `active` char(1) DEFAULT NULL COMMENT 'Y:使用中',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`id`, `layer`, `itemNo`, `itemName`, `title`, `content`, `qty`, `price`, `salePrice`, `isNew`, `active`, `createTime`) VALUES
(9, 6, 575875, '785785', '785757', '578575', 775, 577575, 75575, NULL, 'Y', '2025-09-04 01:13:58'),
(26, 1, 1, '筆刷組-01', '水彩效果', '我是描述', 10, 299, 299, NULL, 'Y', '2025-09-10 05:05:21'),
(29, 1, 2, '筆刷組-02', '金屬效果', '我是描述', 10, 299, 299, NULL, 'Y', '2025-09-10 05:13:50'),
(30, 2, 3, '小小插畫師', '長期班', '我是描述', 10, 9999, 9999, NULL, 'Y', '2025-09-10 08:16:58'),
(31, 2, 4, '個人風格插畫', '成人班', '我是描述', 10, 9999, 9999, NULL, 'Y', '2025-09-10 08:18:16');

-- --------------------------------------------------------

--
-- 資料表結構 `product_color`
--

DROP TABLE IF EXISTS `product_color`;
CREATE TABLE IF NOT EXISTS `product_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) DEFAULT NULL COMMENT '產品代碼',
  `colorId` int(11) DEFAULT NULL COMMENT '顏色代碼',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product_color`
--

INSERT INTO `product_color` (`id`, `productId`, `colorId`, `createTime`) VALUES
(11, 7, 3, '2025-09-04 01:00:13'),
(12, 7, 4, '2025-09-04 01:00:13'),
(14, 9, 5, '2025-09-04 01:13:58'),
(15, 21, 3, '2025-09-04 07:49:37'),
(16, 22, 5, '2025-09-04 07:50:19'),
(17, 22, 4, '2025-09-04 07:50:19'),
(18, 23, 5, '2025-09-04 08:30:24'),
(19, 23, 3, '2025-09-04 08:30:24'),
(20, 23, 4, '2025-09-04 08:30:24'),
(21, 24, 5, '2025-09-09 03:46:07'),
(22, 24, 4, '2025-09-09 03:46:07'),
(23, 25, 3, '2025-09-09 03:49:28'),
(24, 25, 4, '2025-09-09 03:49:28'),
(25, 26, 4, '2025-09-10 05:05:21'),
(26, 27, 4, '2025-09-10 05:06:53'),
(27, 28, 4, '2025-09-10 05:08:14'),
(28, 29, 4, '2025-09-10 05:13:50'),
(29, 30, 3, '2025-09-10 08:16:58'),
(30, 31, 3, '2025-09-10 08:18:16');

-- --------------------------------------------------------

--
-- 資料表結構 `product_label`
--

DROP TABLE IF EXISTS `product_label`;
CREATE TABLE IF NOT EXISTS `product_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) DEFAULT NULL COMMENT '產品代碼',
  `labelId` int(11) DEFAULT NULL COMMENT '標籤代碼',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product_label`
--

INSERT INTO `product_label` (`id`, `productId`, `labelId`, `createTime`) VALUES
(11, 7, 3, '2025-09-04 01:00:13'),
(12, 7, 5, '2025-09-04 01:00:13'),
(14, 9, 5, '2025-09-04 01:13:58'),
(15, 21, 3, '2025-09-04 07:49:37'),
(16, 22, 3, '2025-09-04 07:50:19'),
(17, 22, 5, '2025-09-04 07:50:19'),
(18, 23, 3, '2025-09-04 08:30:24'),
(19, 23, 5, '2025-09-04 08:30:24'),
(20, 24, 3, '2025-09-09 03:46:07'),
(21, 25, 5, '2025-09-09 03:49:28'),
(22, 26, 5, '2025-09-10 05:05:21'),
(23, 27, 5, '2025-09-10 05:06:53'),
(24, 28, 5, '2025-09-10 05:08:14'),
(25, 29, 5, '2025-09-10 05:13:50'),
(26, 31, 5, '2025-09-10 08:18:16');

-- --------------------------------------------------------

--
-- 資料表結構 `product_layer`
--

DROP TABLE IF EXISTS `product_layer`;
CREATE TABLE IF NOT EXISTS `product_layer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `layer_name` varchar(30) DEFAULT NULL,
  `active` char(1) DEFAULT NULL COMMENT 'Y:使用中',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product_layer`
--

INSERT INTO `product_layer` (`id`, `layer_name`, `active`) VALUES
(1, 'Procreate 筆刷組', 'Y'),
(2, 'Procreate 台中實體課', 'Y');

-- --------------------------------------------------------

--
-- 資料表結構 `product_photo`
--

DROP TABLE IF EXISTS `product_photo`;
CREATE TABLE IF NOT EXISTS `product_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `productId` (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product_photo`
--

INSERT INTO `product_photo` (`id`, `productId`, `photo`, `createTime`) VALUES
(1, 7, '2025_09_04_09_00_13_718.jpg', '2025-09-04 01:00:13'),
(2, 9, '2025_09_04_09_13_58_479.jpg', '2025-09-04 01:13:58'),
(3, 11, '2025_09_04_14_20_02_529.jpg', '2025-09-04 06:20:02'),
(4, 21, '2025_09_04_15_49_37_546.jpg', '2025-09-04 07:49:37'),
(5, 22, '2025_09_04_15_50_19_868.jpg', '2025-09-04 07:50:19'),
(6, 23, '2025_09_04_16_30_24_096.jpg', '2025-09-04 08:30:24'),
(7, 24, '2025_09_09_11_46_07_321.jpg', '2025-09-09 03:46:07'),
(8, 25, '2025_09_09_11_49_28_486.jpg', '2025-09-09 03:49:28'),
(9, 26, '2025_09_10_13_05_21_752.jpg', '2025-09-10 05:05:22'),
(10, 28, '2025_09_10_13_08_14_661.jpg', '2025-09-10 05:08:14'),
(11, 29, '2025_09_10_13_13_50_251.jpg', '2025-09-10 05:13:50'),
(12, 30, '2025_09_10_16_16_58_844.jpg', '2025-09-10 08:16:58'),
(13, 31, '2025_09_10_16_18_16_067.jpg', '2025-09-10 08:18:16');

-- --------------------------------------------------------

--
-- 資料表結構 `product_size`
--

DROP TABLE IF EXISTS `product_size`;
CREATE TABLE IF NOT EXISTS `product_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) DEFAULT NULL,
  `sizeId` int(11) DEFAULT NULL,
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product_size`
--

INSERT INTO `product_size` (`id`, `productId`, `sizeId`, `createTime`) VALUES
(2, 7, 1, '2025-09-04 01:00:13'),
(4, 9, 2, '2025-09-04 01:13:58'),
(5, 21, 3, '2025-09-04 07:49:37'),
(6, 22, 2, '2025-09-04 07:50:19'),
(7, 22, 3, '2025-09-04 07:50:19'),
(8, 23, 1, '2025-09-04 08:30:24'),
(9, 23, 2, '2025-09-04 08:30:24'),
(10, 23, 3, '2025-09-04 08:30:24'),
(11, 24, 2, '2025-09-09 03:46:07'),
(12, 24, 3, '2025-09-09 03:46:07'),
(13, 25, 1, '2025-09-09 03:49:28'),
(14, 26, 2, '2025-09-10 05:05:21'),
(15, 27, 2, '2025-09-10 05:06:53'),
(16, 28, 2, '2025-09-10 05:08:14'),
(17, 29, 2, '2025-09-10 05:13:50'),
(18, 30, 3, '2025-09-10 08:16:58'),
(19, 31, 3, '2025-09-10 08:18:16');

-- --------------------------------------------------------

--
-- 資料表結構 `product_spec`
--

DROP TABLE IF EXISTS `product_spec`;
CREATE TABLE IF NOT EXISTS `product_spec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) DEFAULT NULL COMMENT '產品代碼(流水號)',
  `title` varchar(30) DEFAULT NULL COMMENT '產品規格標題',
  `content` varchar(100) DEFAULT NULL COMMENT '規格內容',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product_spec`
--

INSERT INTO `product_spec` (`id`, `productId`, `title`, `content`, `createTime`) VALUES
(3, 7, '規格1', '內容1', '2025-09-04 01:00:13'),
(4, 7, '規格2', '內容2', '2025-09-04 01:00:13'),
(8, 9, '75757', '5757', '2025-09-04 01:13:58'),
(9, 9, '57575', '75757', '2025-09-04 01:13:58'),
(10, 9, '575757', '57575', '2025-09-04 01:13:58'),
(11, 21, '213131', '3213213123', '2025-09-04 07:49:37'),
(12, 22, '45646', '46456', '2025-09-04 07:50:19'),
(13, 22, '45646', '45646', '2025-09-04 07:50:19'),
(14, 22, '54646', '456546', '2025-09-04 07:50:19'),
(15, 23, '規格1', '內容1', '2025-09-04 08:30:24'),
(16, 24, '1', '1', '2025-09-09 03:46:07'),
(17, 25, '2', '2', '2025-09-09 03:49:28'),
(18, 26, '規格1', '規格內容1', '2025-09-10 05:05:21'),
(19, 27, '規格2', '規格內容2', '2025-09-10 05:06:53'),
(20, 28, '規格1', '規格內容1', '2025-09-10 05:08:14'),
(21, 29, '規格1', '規格內容1', '2025-09-10 05:13:50'),
(22, 31, '規格1', '規格內容1', '2025-09-10 08:18:16');

-- --------------------------------------------------------

--
-- 資料表結構 `qa`
--

DROP TABLE IF EXISTS `qa`;
CREATE TABLE IF NOT EXISTS `qa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL COMMENT '問題',
  `content` varchar(250) DEFAULT NULL COMMENT '解答',
  `dates` date DEFAULT NULL,
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `qa`
--

INSERT INTO `qa` (`id`, `title`, `content`, `dates`, `createTime`) VALUES
(2, '我需要準備什麼設備？', '建議準備一台可以使用畫圖 App（例如 Procreate、Clip Studio Paint）的平板電腦，例如 iPad + Apple Pencil。若使用 Android 平板，也可以使用支援筆壓的畫圖 App。', '2025-09-01', '2025-09-08 02:53:13'),
(3, '課程使用哪一款繪圖軟體？', '本課程主要使用 Procreate（iOS），也會說明基本的數位繪圖共通技巧，方便你日後轉換軟體（如 Clip Studio、Sketchbook 等）。', '2025-09-03', '2025-09-08 02:59:09'),
(4, '課程會教到上色和完稿嗎？', '會的！課程會完整教學從草圖、線稿、上色到完成一幅作品的流程，還會教你搭配筆刷、色彩原則、風格化等進階技巧。', '2025-09-04', '2025-09-08 07:00:21'),
(5, '有分期付款或其他付款方式嗎？', '視平台而定，目前支援信用卡／LINE Pay／街口／超商付款等方式，部分平台提供分期付款服務，請參考購課頁面說明。', '2025-09-08', '2025-09-08 07:12:05'),
(11, '課程適合零基礎嗎？', '當然可以！課程從介面認識、畫筆設定、基本線條與造型開始，一步步到配色、構圖與完稿。每單元都有練習檔與示範，零基礎也能跟上。', '2025-09-11', '2025-09-12 06:01:05'),
(12, '退款、轉班與發票如何處理？', '依平台規範辦理： 退款/轉班：於規定期限內提出申請並符合條件即可（逾期或已大量觀看課程者，通常不受理）。 發票：將以電子發票寄送至你留存的信箱或載具。 詳細以購課頁面與平台公告為準。', '2025-09-11', '2025-09-12 06:01:24'),
(13, '課後會提供哪些素材？可以商用嗎？', '課後會提供老師示範檔／練習圖檔／筆刷包或上課簡報（依課程內容而定），僅供個人學習使用。若需將素材或成品作為商業用途，請先來信洽詢授權或依平台規範購買相應授權。', '2025-09-11', '2025-09-12 06:10:50');

-- --------------------------------------------------------

--
-- 資料表結構 `ship`
--

DROP TABLE IF EXISTS `ship`;
CREATE TABLE IF NOT EXISTS `ship` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shipName` varchar(10) NOT NULL,
  `active` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `size`
--

DROP TABLE IF EXISTS `size`;
CREATE TABLE IF NOT EXISTS `size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size` varchar(10) DEFAULT NULL,
  `actvie` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `size`
--

INSERT INTO `size` (`id`, `size`, `actvie`) VALUES
(1, 'S', ''),
(2, 'M', ''),
(3, 'L', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
