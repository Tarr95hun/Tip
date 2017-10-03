-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2017 at 12:06 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `nation`
--

CREATE TABLE `nation` (
  `ID` int(11) UNSIGNED NOT NULL,
  `nation` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `img` varchar(7) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `nation`
--

INSERT INTO `nation` (`ID`, `nation`, `img`) VALUES
(1, 'Afghanistan', 'AFG.png'),
(2, 'Albania', 'ALB.png'),
(3, 'Algeria', 'ALG.png'),
(4, 'American Samoa', 'ASA.png'),
(5, 'Andorra', 'AND.png'),
(6, 'Angola', 'ANG.png'),
(7, 'Anguilla', 'AIA.png'),
(8, 'Antigua and Barbuda', 'ATG.png'),
(9, 'Argentina', 'ARG.png'),
(10, 'Armenia', 'ARM.png'),
(11, 'Aruba', 'ARU.png'),
(12, 'Australia', 'AUS.png'),
(13, 'Austria', 'AUT.png'),
(14, 'Azerbaijan', 'AZE.png'),
(15, 'Bahamas', 'BAH.png'),
(16, 'Bahrain', 'BHR.png'),
(17, 'Bangladesh', 'BAN.png'),
(18, 'Barbados', 'BRB.png'),
(19, 'Belarus', 'BLR.png'),
(20, 'Belgium', 'BEL.png'),
(21, 'Belize', 'BLZ.png'),
(22, 'Benin', 'BEN.png'),
(23, 'Bermuda', 'BER.png'),
(24, 'Bhutan', 'BHU.png'),
(25, 'Bolivia', 'BOL.png'),
(26, 'Bosnia and Herzegovina', 'BIH.png'),
(27, 'Botswana', 'BOT.png'),
(28, 'Brazil', 'BRA.png'),
(29, 'British Virgin Islands', 'VGB.png'),
(30, 'Brunei', 'BRU.png'),
(31, 'Bulgaria', 'BUL.png'),
(32, 'Burkina Faso', 'BFA.png'),
(33, 'Burundi', 'BDI.png'),
(34, 'Cambodia', 'CAM.png'),
(35, 'Cameroon', 'CMR.png'),
(36, 'Canada', 'CAN.png'),
(37, 'Cape Verde', 'CPV.png'),
(38, 'Cayman Islands', 'CAY.png'),
(39, 'Central African Republic', 'CTA.png'),
(40, 'Chad', 'CHA.png'),
(41, 'Chile', 'CHI.png'),
(42, 'China PR', 'CHN.png'),
(43, 'Chinese Taipei', 'TPE.png'),
(44, 'Colombia', 'COL.png'),
(45, 'Comoros', 'COM.png'),
(46, 'Congo', 'CGO.png'),
(47, 'DR Congo', 'COD.png'),
(48, 'Cook Islands', 'COK.png'),
(49, 'Costa Rica', 'CRC.png'),
(50, 'Croatia', 'CRO.png'),
(51, 'Cuba', 'CUB.png'),
(52, 'Curaçao', 'CUW.png'),
(53, 'Cyprus', 'CYP.png'),
(54, 'Czech Republic', 'CZE.png'),
(55, 'Denmark', 'DEN.png'),
(56, 'Djibouti', 'DJI.png'),
(57, 'Dominica', 'DMA.png'),
(58, 'Dominican Republic', 'DOM.png'),
(59, 'Ecuador', 'ECU.png'),
(60, 'Egypt', 'EGY.png'),
(61, 'El Salvador', 'SLV.png'),
(62, 'England', 'ENG.png'),
(63, 'Equatorial Guinea', 'EQG.png'),
(64, 'Eritrea', 'ERI.png'),
(65, 'Estonia', 'EST.png'),
(66, 'Ethiopia', 'ETH.png'),
(67, 'Faroe Islands', 'FRO.png'),
(68, 'Fiji', 'FIJ.png'),
(69, 'Finland', 'FIN.png'),
(70, 'France', 'FRA.png'),
(71, 'Gabon', 'GAB.png'),
(72, 'Gambia', 'GAM.png'),
(73, 'Georgia', 'GEO.png'),
(74, 'Germany', 'GER.png'),
(75, 'Ghana', 'GHA.png'),
(76, 'Gibraltar', 'GIB.png'),
(77, 'Greece', 'GRE.png'),
(78, 'Grenada', 'GRN.png'),
(79, 'Guam', 'GUM.png'),
(80, 'Guatemala', 'GUA.png'),
(81, 'Guinea', 'GUI.png'),
(82, 'Guinea-Bissau', 'GNB.png'),
(83, 'Guyana', 'GUY.png'),
(84, 'Haiti', 'HAI.png'),
(85, 'Honduras', 'HON.png'),
(86, 'Hong Kong', 'HKG.png'),
(87, 'Hungary', 'HUN.png'),
(88, 'Iceland', 'ISL.png'),
(89, 'India', 'IND.png'),
(90, 'Indonesia', 'IDN.png'),
(91, 'Iran', 'IRN.png'),
(92, 'Iraq', 'IRQ.png'),
(93, 'Israel', 'ISR.png'),
(94, 'Italy', 'ITA.png'),
(95, 'Ivory Coast', 'CIV.png'),
(96, 'Jamaica', 'JAM.png'),
(97, 'Japan', 'JPN.png'),
(98, 'Jordan', 'JOR.png'),
(99, 'Kazakhstan', 'KAZ.png'),
(100, 'Kenya', 'KEN.png'),
(101, 'Kosovo', 'KVX.png'),
(102, 'Kuwait', 'KUW.png'),
(103, 'Kyrgyzstan', 'KGZ.png'),
(104, 'Laos', 'LAO.png'),
(105, 'Latvia', 'LVA.png'),
(106, 'Lebanon', 'LIB.png'),
(107, 'Lesotho', 'LES.png'),
(108, 'Liberia', 'LBR.png'),
(109, 'Libya', 'LBY.png'),
(110, 'Liechtenstein', 'LIE.png'),
(111, 'Lithuania', 'LTU.png'),
(112, 'Luxembourg', 'LUX.png'),
(113, 'Macau', 'MAC.png'),
(114, 'Macedonia', 'MKD.png'),
(115, 'Madagascar', 'MAD.png'),
(116, 'Malawi', 'MWI.png'),
(117, 'Malaysia', 'MAS.png'),
(118, 'Maldives', 'MDV.png'),
(119, ' Mali', 'MLI.png'),
(120, ' Malta', 'MLT.png'),
(121, ' Mexico', 'MEX.png'),
(122, ' Mauritania', 'MTN.png'),
(123, ' Moldova', 'MDA.png'),
(124, ' Mongolia', 'MNG.png'),
(125, ' Montenegro', 'MNE.png'),
(126, ' Montserrat', 'MSR.png'),
(127, ' Morocco', 'MAR.png'),
(128, ' Mozambique', 'MOZ.png'),
(129, ' Myanmar', 'MYA.png'),
(130, ' Namibia', 'NAM.png'),
(131, ' Nepal', 'NEP.png'),
(132, ' Netherlands', 'NED.png'),
(133, ' New Caledonia', 'NCL.png'),
(134, 'New Zealand', 'NZL.png'),
(135, 'Nicaragua', 'NCA.png'),
(136, 'Niger', 'NIG.png'),
(137, 'Nigeria', 'NGA.png'),
(138, 'North Korea', 'PRK.png'),
(139, 'Northern Ireland', 'NIR.png'),
(140, 'Norway', 'NOR.png'),
(141, 'Oman', 'OMA.png'),
(142, 'Pakistan', 'PAK.png'),
(143, 'Palestine', 'PLE.png'),
(144, 'Panama', 'PAN.png'),
(145, 'Papua New Guinea', 'PNG.png'),
(146, 'Paraguay', 'PAR.png'),
(147, 'Peru', 'PER.png'),
(148, 'Philippines', 'PHI.png'),
(149, 'Poland', 'POL.png'),
(150, 'Portugal', 'POR.png'),
(151, 'Puerto Rico', 'PUR.png'),
(152, 'Qatar', 'QAT.png'),
(153, 'Republic of Ireland', 'IRL.png'),
(154, 'Romania', 'ROU.png'),
(155, 'Russia', 'RUS.png'),
(156, 'Rwanda', 'RWA.png'),
(157, 'Saint Kitts and Nevis', 'SKN.png'),
(158, 'Saint Lucia', 'LCA.png'),
(159, 'Saint Vincent and the Grenadines', 'VIN.png'),
(160, 'Samoa', 'SAM.png'),
(161, 'San Marino', 'SMR.png'),
(162, 'São Tomé and Príncipe', 'STP.png'),
(163, 'Saudi Arabia', 'KSA.png'),
(164, 'Scotland', 'SCO.png'),
(165, 'Senegal', 'SEN.png'),
(166, 'Serbia', 'SRB.png'),
(167, 'Seychelles', 'SEY.png'),
(168, 'Sierra Leone', 'SLE.png'),
(169, 'Singapore', 'SIN.png'),
(170, 'Slovakia', 'SVK.png'),
(171, 'Slovenia', 'SVN.png'),
(172, 'Solomon Islands', 'SOL.png'),
(173, 'Somalia', 'SOM.png'),
(174, 'South Africa', 'RSA.png'),
(175, 'South Korea', 'KOR.png'),
(176, 'South Sudan', 'SSD.png'),
(177, 'Spain', 'ESP.png'),
(178, 'Sri Lanka', 'SRI.png'),
(179, 'Sudan', 'SDN.png'),
(180, 'Suriname', 'SUR.png'),
(181, 'Swaziland', 'SWZ.png'),
(182, 'Sweden', 'SWE.png'),
(183, 'Switzerland', 'SUI.png'),
(184, 'Syria', 'SYR.png'),
(185, 'Tahiti', 'TAH.png'),
(186, 'Tajikistan', 'TJK.png'),
(187, 'Tanzania', 'TAN.png'),
(188, 'Thailand', 'THA.png'),
(189, 'Timor-Leste', 'TLS.png'),
(190, 'Togo', 'TOG.png'),
(191, 'Tonga', 'TGA.png'),
(192, 'Trinidad and Tobago', 'TRI.png'),
(193, 'Tunisia', 'TUN.png'),
(194, 'Turkey', 'TUR.png'),
(195, 'Turkmenistan', 'TKM.png'),
(196, 'Turks and Caicos Islands', 'TCA.png'),
(197, 'Uganda', 'UGA.png'),
(198, 'Ukraine', 'UKR.png'),
(199, 'United Arab Emirates', 'UAE.png'),
(200, 'United States', 'USA.png'),
(201, 'Uruguay', 'URU.png'),
(202, 'U.S. Virgin Islands', 'VIR.png'),
(203, 'Uzbekistan', 'UZB.png'),
(204, 'Vanuatu', 'VAN.png'),
(205, 'Venezuela', 'VEN.png'),
(206, 'Vietnam', 'VIE.png'),
(207, 'Wales', 'WAL.png'),
(208, 'Yemen', 'YEM.png'),
(209, 'Zambia', 'ZAM.png'),
(210, 'Zimbabwe', 'ZIM.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nation`
--
ALTER TABLE `nation`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nation`
--
ALTER TABLE `nation`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
