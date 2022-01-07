-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Sty 2022, 19:26
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `e-dziennik`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `address_school`
--

CREATE TABLE `address_school` (
  `Address_Id` int(11) NOT NULL,
  `School_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `address_school`
--

INSERT INTO `address_school` (`Address_Id`, `School_Id`) VALUES
(5, 5),
(6, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adress`
--

CREATE TABLE `adress` (
  `Id` int(11) NOT NULL,
  `Bulding_Number` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `Flat_Number` varchar(5) COLLATE utf8_polish_ci DEFAULT NULL,
  `Street` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `City` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `Zip` varchar(6) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `adress`
--

INSERT INTO `adress` (`Id`, `Bulding_Number`, `Flat_Number`, `Street`, `City`, `Zip`) VALUES
(5, '18', '', 'Niemierzyńska', 'Police', '71-873'),
(6, '18', '', '3 maja', 'Stargard', '73-110'),
(7, '46', '8', 'Leśna', 'Police', '71-873'),
(8, '28', '5', 'Szkolna', 'Mierzyn', '72-553'),
(9, '41', '4', 'Niemierzyńska', 'Reptowo', '73-108'),
(10, '5', '14', 'Leśna', 'Stargard', '73-110'),
(11, '31', '14', 'Niemierzyńska', 'Police', '71-873'),
(12, '25', '10', 'Mickiewicza', 'Police', '71-873'),
(13, '40', '4', 'Słoneczna', 'Reptowo', '73-108'),
(14, '53', '8', 'Brzozowa', 'Mierzyn', '72-553'),
(15, '60', '7', 'Żołnierska', 'Szczecin', '70-001'),
(16, '22', '6', 'Kolejowa', 'Mierzyn', '72-553'),
(17, '56', '4', 'Słoneczna', 'Stargard', '73-110'),
(18, '29', '1', 'Lipowa', 'Szczecin', '70-001'),
(19, '40', '4', 'Brzozowa', 'Stargard', '73-110'),
(20, '10', '7', 'Struga', 'Mierzyn', '72-553'),
(21, '35', '5', 'Bohaterów Warszawy', 'Szczecin', '70-001'),
(22, '26', '3', 'Brzozowa', 'Szczecin', '70-001'),
(23, '7', '4', 'Żołnierska', 'Szczecin', '70-001'),
(24, '11', '4', '3 maja', 'Police', '71-873'),
(25, '13', '5', 'Leśna', 'Police', '71-873'),
(26, '25', '6', 'Niemierzyńska', 'Mierzyn', '72-553'),
(27, '41', '6', 'Bohaterów Warszawy', 'Mierzyn', '72-553'),
(28, '2', '13', 'Bohaterów Warszawy', 'Szczecin', '70-001'),
(29, '48', '9', 'Polna', 'Stargard', '73-110'),
(30, '4', '2', '3 maja', 'Szczecin', '70-001'),
(31, '18', '11', 'Ogrodowa', 'Mierzyn', '72-553'),
(32, '27', '12', 'Mickiewicza', 'Szczecin', '70-001'),
(33, '53', '9', 'Polna', 'Reptowo', '73-108'),
(34, '9', '6', 'Mickiewicza', 'Police', '71-873'),
(35, '5', '13', 'Szkolna', 'Reptowo', '73-108'),
(36, '16', '9', 'Krótka', 'Reptowo', '73-108'),
(37, '2', '14', 'Lipowa', 'Mierzyn', '72-553'),
(38, '10', '14', 'Mickiewicza', 'Szczecin', '70-001'),
(39, '18', '12', 'Bohaterów Warszawy', 'Stargard', '73-110'),
(40, '44', '1', 'Kolejowa', 'Stargard', '73-110'),
(41, '46', '14', 'Lipowa', 'Stargard', '73-110'),
(42, '56', '10', 'Kubusia Puchatka', 'Mierzyn', '72-553'),
(43, '48', '1', '3 maja', 'Szczecin', '70-001'),
(44, '43', '11', 'Kolejowa', 'Mierzyn', '72-553'),
(45, '54', '9', 'Leśna', 'Stargard', '73-110'),
(46, '31', '7', 'Polna', 'Mierzyn', '72-553'),
(47, '8', '2', 'Szkolna', 'Mierzyn', '72-553'),
(48, '50', '13', 'Brzozowa', 'Police', '71-873'),
(49, '39', '14', 'Szkolna', 'Szczecin', '70-001'),
(50, '6', '6', 'Krótka', 'Reptowo', '73-108'),
(51, '30', '13', 'Szkolna', 'Police', '71-873'),
(52, '40', '2', 'Brzozowa', 'Police', '71-873'),
(53, '51', '11', 'Kubusia Puchatka', 'Reptowo', '73-108'),
(54, '18', '9', 'Kolejowa', 'Mierzyn', '72-553'),
(55, '24', '5', 'Polna', 'Mierzyn', '72-553'),
(56, '58', '3', 'Lipowa', 'Stargard', '73-110'),
(57, '2', '8', '1 maja', 'Reptowo', '73-108'),
(58, '9', '11', 'Żołnierska', 'Stargard', '73-110'),
(59, '21', '12', 'Kubusia Puchatka', 'Reptowo', '73-108'),
(60, '33', '2', 'Słoneczna', 'Szczecin', '70-001'),
(61, '51', '14', 'Lipowa', 'Police', '71-873'),
(62, '54', '8', 'Żołnierska', 'Szczecin', '70-001'),
(63, '10', '11', 'Niemierzyńska', 'Mierzyn', '72-553'),
(64, '32', '14', 'Brzozowa', 'Reptowo', '73-108'),
(65, '58', '7', 'Bohaterów Warszawy', 'Reptowo', '73-108'),
(66, '50', '13', 'Ogrodowa', 'Police', '71-873'),
(67, '23', '11', 'Niemierzyńska', 'Mierzyn', '72-553'),
(68, '54', '2', 'Słoneczna', 'Reptowo', '73-108'),
(69, '4', '4', '1 maja', 'Stargard', '73-110'),
(70, '7', '4', 'Bohaterów Warszawy', 'Szczecin', '70-001'),
(71, '50', '7', 'Struga', 'Reptowo', '73-108'),
(72, '50', '11', '1 maja', 'Stargard', '73-110'),
(73, '48', '8', 'Żołnierska', 'Stargard', '73-110'),
(74, '5', '5', 'Szkolna', 'Police', '71-873'),
(75, '44', '13', 'Lipowa', 'Stargard', '73-110'),
(76, '33', '9', 'Lipowa', 'Szczecin', '70-001'),
(77, '46', '7', 'Słoneczna', 'Stargard', '73-110'),
(78, '3', '10', 'Bohaterów Warszawy', 'Stargard', '73-110'),
(79, '1', '8', 'Niemierzyńska', 'Stargard', '73-110'),
(80, '57', '5', 'Żołnierska', 'Szczecin', '70-001'),
(81, '2', '12', 'Kolejowa', 'Szczecin', '70-001'),
(82, '4', '2', 'Słoneczna', 'Reptowo', '73-108'),
(83, '10', '7', 'Kolejowa', 'Szczecin', '70-001'),
(84, '34', '3', 'Krótka', 'Police', '71-873'),
(85, '7', '5', '3 maja', 'Reptowo', '73-108'),
(86, '44', '8', 'Lipowa', 'Stargard', '73-110'),
(87, '25', '12', 'Żołnierska', 'Police', '71-873'),
(88, '24', '5', '1 maja', 'Mierzyn', '72-553'),
(89, '54', '3', 'Słoneczna', 'Stargard', '73-110'),
(90, '39', '8', 'Krótka', 'Mierzyn', '72-553'),
(91, '46', '12', 'Ogrodowa', 'Police', '71-873'),
(92, '49', '11', 'Lipowa', 'Police', '71-873'),
(93, '34', '10', 'Bohaterów Warszawy', 'Stargard', '73-110'),
(94, '57', '14', 'Słoneczna', 'Mierzyn', '72-553'),
(95, '15', '9', 'Leśna', 'Mierzyn', '72-553'),
(96, '53', '3', 'Szkolna', 'Reptowo', '73-108'),
(97, '34', '10', 'Żołnierska', 'Stargard', '73-110');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `class`
--

CREATE TABLE `class` (
  `Id` int(11) NOT NULL,
  `Class` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `Profile` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `Id_School` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `class`
--

INSERT INTO `class` (`Id`, `Class`, `Profile`, `Id_School`) VALUES
(1, 'Klasa 0', NULL, 4),
(2, 'Klasa 1', NULL, 4),
(3, 'Klasa 2', NULL, 4),
(4, 'Klasa 3', NULL, 4),
(5, 'Klasa 4', NULL, 4),
(6, 'Klasa 5', NULL, 4),
(7, 'Klasa 6', NULL, 4),
(8, 'Klasa 7', NULL, 4),
(9, 'Klasa 8', NULL, 4),
(10, 'Klasa 1', 'humanistyczna', 5),
(11, 'Klasa 2', 'humanistyczna', 5),
(12, 'Klasa 3', 'humanistyczna', 5),
(13, 'Klasa 4', 'humanistyczna', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nopesel`
--

CREATE TABLE `nopesel` (
  `Student_Id` int(11) NOT NULL,
  `Document_Name` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Document_Number` varchar(25) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `nopesel`
--

INSERT INTO `nopesel` (`Student_Id`, `Document_Name`, `Document_Number`) VALUES
(81, 'Paszport', '435230729');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `parent`
--

CREATE TABLE `parent` (
  `Id` int(11) NOT NULL,
  `Id_User` int(11) NOT NULL,
  `Phone_Number` varchar(9) COLLATE utf8_polish_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `parent`
--

INSERT INTO `parent` (`Id`, `Id_User`, `Phone_Number`, `Email`) VALUES
(1, 93, '567254229', 'par62171@edziennik.pl'),
(2, 94, '287784671', 'par17878@edziennik.pl'),
(3, 95, '157975884', 'par31109@edziennik.pl'),
(4, 96, '509995514', 'par75933@edziennik.pl'),
(5, 97, '570305627', 'par71979@edziennik.pl'),
(6, 98, '749846063', 'par87067@edziennik.pl'),
(7, 99, '640831271', 'par17997@edziennik.pl'),
(8, 100, '127614117', 'par74912@edziennik.pl'),
(9, 101, '231568449', 'par94735@edziennik.pl'),
(10, 102, '197167683', 'par79760@edziennik.pl'),
(11, 103, '284361746', 'par79073@edziennik.pl'),
(12, 104, '673241016', 'par62878@edziennik.pl'),
(13, 105, '585285938', 'par64862@edziennik.pl'),
(14, 106, '919573072', 'par63202@edziennik.pl'),
(15, 107, '843897761', 'par51828@edziennik.pl'),
(16, 108, '871507733', 'par26386@edziennik.pl'),
(17, 109, '678004539', 'par84079@edziennik.pl'),
(18, 110, '571212541', 'par17760@edziennik.pl'),
(19, 111, '221171980', 'par34338@edziennik.pl'),
(20, 112, '626323255', 'par92848@edziennik.pl'),
(21, 113, '201626276', 'par92659@edziennik.pl'),
(22, 114, '864868127', 'par52129@edziennik.pl'),
(23, 115, '972872363', 'par36699@edziennik.pl'),
(24, 116, '542342565', 'par76404@edziennik.pl'),
(25, 117, '394205496', 'par13027@edziennik.pl'),
(26, 118, '816065933', 'par77781@edziennik.pl'),
(27, 119, '426883093', 'par23897@edziennik.pl'),
(28, 120, '166860028', 'par21690@edziennik.pl'),
(29, 121, '548332260', 'par19974@edziennik.pl'),
(30, 122, '749217050', 'par86882@edziennik.pl'),
(31, 123, '801675107', 'par73178@edziennik.pl'),
(32, 124, '302951496', 'par27737@edziennik.pl'),
(33, 125, '940163545', 'par23550@edziennik.pl'),
(34, 126, '383943594', 'par43561@edziennik.pl'),
(35, 127, '433741023', 'par35319@edziennik.pl'),
(36, 128, '425866477', 'par35863@edziennik.pl'),
(37, 129, '741266177', 'par22303@edziennik.pl'),
(38, 130, '507775376', 'par80148@edziennik.pl'),
(39, 131, '719340517', 'par89485@edziennik.pl'),
(40, 132, '766103991', 'par71500@edziennik.pl'),
(41, 133, '873830317', 'par86170@edziennik.pl'),
(42, 134, '762358703', 'par42945@edziennik.pl'),
(43, 135, '717233917', 'par44198@edziennik.pl'),
(44, 136, '194505168', 'par22646@edziennik.pl'),
(45, 137, '346343618', 'par46682@edziennik.pl'),
(46, 138, '660317275', 'par89139@edziennik.pl'),
(47, 139, '545505703', 'par28860@edziennik.pl'),
(48, 140, '293052376', 'par29796@edziennik.pl'),
(49, 141, '378687584', 'par38560@edziennik.pl'),
(50, 142, '847172834', 'par47100@edziennik.pl'),
(51, 143, '288084981', 'par44509@edziennik.pl'),
(52, 144, '289849529', 'par84644@edziennik.pl'),
(53, 145, '141193614', 'par54722@edziennik.pl'),
(54, 146, '577581724', 'par19998@edziennik.pl'),
(55, 147, '734396778', 'par16982@edziennik.pl'),
(56, 148, '394684293', 'par89337@edziennik.pl'),
(57, 149, '179536864', 'par22786@edziennik.pl'),
(58, 150, '803999968', 'par91168@edziennik.pl'),
(59, 151, '913000802', 'par10320@edziennik.pl'),
(60, 152, '401065558', 'par67795@edziennik.pl'),
(61, 153, '410130976', 'par70945@edziennik.pl'),
(62, 154, '519322546', 'par27685@edziennik.pl'),
(63, 155, '192856323', 'par84728@edziennik.pl'),
(64, 156, '598650886', 'par58434@edziennik.pl'),
(65, 157, '886627485', 'par16995@edziennik.pl'),
(66, 158, '540453519', 'par83989@edziennik.pl'),
(67, 159, '979812424', 'par44051@edziennik.pl'),
(68, 160, '246098985', 'par90400@edziennik.pl'),
(69, 161, '503708427', 'par88907@edziennik.pl'),
(70, 162, '956052849', 'par93069@edziennik.pl'),
(71, 163, '695627248', 'par57651@edziennik.pl'),
(72, 164, '491124452', 'par83433@edziennik.pl'),
(73, 165, '163786250', 'par52161@edziennik.pl'),
(74, 166, '160418548', 'par33309@edziennik.pl'),
(75, 167, '403659712', 'par95704@edziennik.pl'),
(76, 168, '377212756', 'par96986@edziennik.pl'),
(77, 169, '257612253', 'par32834@edziennik.pl'),
(78, 170, '184774632', 'par60743@edziennik.pl'),
(79, 171, '633730872', 'par30930@edziennik.pl'),
(80, 172, '131030648', 'par22598@edziennik.pl'),
(81, 173, '756999860', 'par28119@edziennik.pl'),
(82, 174, '631401845', 'par55742@edziennik.pl'),
(83, 175, '359587131', 'par88204@edziennik.pl'),
(84, 176, '273470858', 'par30763@edziennik.pl'),
(85, 177, '455351006', 'par55362@edziennik.pl'),
(86, 178, '658778300', 'par68167@edziennik.pl'),
(87, 179, '571036439', 'par26516@edziennik.pl'),
(88, 180, '914796966', 'par27394@edziennik.pl'),
(89, 181, '587714031', 'par62632@edziennik.pl'),
(90, 182, '591167532', 'par89226@edziennik.pl'),
(91, 183, '119453726', 'par42283@edziennik.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `parent_student`
--

CREATE TABLE `parent_student` (
  `Student_Id` int(11) NOT NULL,
  `Parent_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `parent_student`
--

INSERT INTO `parent_student` (`Student_Id`, `Parent_Id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31),
(32, 32),
(33, 33),
(34, 34),
(35, 35),
(36, 36),
(37, 37),
(38, 38),
(39, 39),
(40, 40),
(41, 41),
(42, 42),
(43, 43),
(44, 44),
(45, 45),
(46, 46),
(47, 47),
(48, 48),
(49, 49),
(50, 50),
(51, 51),
(52, 52),
(53, 53),
(54, 54),
(55, 55),
(56, 56),
(57, 57),
(58, 58),
(59, 59),
(60, 60),
(61, 61),
(62, 62),
(63, 63),
(64, 64),
(65, 65),
(66, 66),
(67, 67),
(68, 68),
(69, 69),
(70, 70),
(71, 71),
(72, 72),
(73, 73),
(74, 74),
(75, 75),
(76, 76),
(77, 77),
(78, 78),
(79, 79),
(80, 80),
(81, 81),
(82, 82),
(83, 83),
(84, 84),
(85, 85),
(86, 86),
(87, 87),
(88, 88),
(89, 89),
(90, 90),
(91, 91);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `school`
--

CREATE TABLE `school` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `school`
--

INSERT INTO `school` (`Id`, `Name`) VALUES
(4, 'Szkoła Podstawowa im. Fryderyka Chopina'),
(5, 'Liceum Ogólnokształcące im. Władysława Jagiełły');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `student`
--

CREATE TABLE `student` (
  `Id` int(11) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Adress_Id` int(11) NOT NULL,
  `Class_Id` int(11) NOT NULL,
  `Id_User` int(11) NOT NULL,
  `Pesel` int(11) DEFAULT NULL,
  `First_Name` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `Second_Name` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `Last_Name` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `Nationality` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `Birth_Date` datetime NOT NULL,
  `Sex` varchar(1) COLLATE utf8_polish_ci NOT NULL,
  `Phone_Number` varchar(9) COLLATE utf8_polish_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `student`
--

INSERT INTO `student` (`Id`, `School_Id`, `Adress_Id`, `Class_Id`, `Id_User`, `Pesel`, `First_Name`, `Second_Name`, `Last_Name`, `Nationality`, `Birth_Date`, `Sex`, `Phone_Number`, `Email`) VALUES
(1, 4, 7, 1, 1, 2147483647, 'Bogdan', 'Mateusz', 'Dąbrowski', 'polskie', '2016-03-13 00:00:00', 'M', '209873909', 'bdabrowski@edziennik.pl'),
(2, 4, 8, 1, 2, 2147483647, 'Karolina', 'Krystyna', 'Lewandowska', 'polskie', '2016-10-19 00:00:00', 'K', '343483987', 'klewandowska@edziennik.pl'),
(3, 4, 9, 1, 3, 2147483647, 'Bogdan', 'Alan', 'Wysocki', 'polskie', '2016-02-21 00:00:00', 'M', '295886669', 'bwysocki@edziennik.pl'),
(4, 4, 10, 1, 4, 2147483647, 'Katarzyna', 'Maja', 'Góral', 'polskie', '2016-06-05 00:00:00', 'K', '282114883', 'kgoral@edziennik.pl'),
(5, 4, 11, 1, 5, 2147483647, 'Bożydar', 'Aleks', 'Norwecki', 'polskie', '2016-05-16 00:00:00', 'M', '357797596', 'bnorwecki@edziennik.pl'),
(6, 4, 12, 1, 6, 2147483647, 'Karolina', 'Maja', 'Ziemba', 'polskie', '2016-10-16 00:00:00', 'K', '506066105', 'kziemba@edziennik.pl'),
(7, 4, 13, 1, 7, 2147483647, 'Cezary', 'Alan', 'Norwecki', 'polskie', '2016-11-14 00:00:00', 'M', '619455056', 'cnorwecki@edziennik.pl'),
(8, 4, 14, 2, 8, 2147483647, 'Cezary', 'Jan', 'Wołyniak', 'polskie', '2015-08-01 00:00:00', 'M', '809278601', 'cwolyniak@edziennik.pl'),
(9, 4, 15, 2, 9, 2147483647, 'Magdalena', 'Katarzyna', 'Szkot', 'polskie', '2015-01-24 00:00:00', 'K', '515166184', 'mszkot@edziennik.pl'),
(10, 4, 16, 2, 10, 2147483647, 'Bogdan', 'Alfred', 'Woźniak', 'polskie', '2015-09-05 00:00:00', 'M', '348678742', 'bwozniak@edziennik.pl'),
(11, 4, 17, 2, 11, 2147483647, 'Maja', 'Krystyna', 'Góral', 'polskie', '2015-12-24 00:00:00', 'K', '597175631', 'mgoral@edziennik.pl'),
(12, 4, 18, 2, 12, 2147483647, 'Jan', 'Kacper', 'Kowalski', 'polskie', '2015-11-15 00:00:00', 'M', '214126878', 'jkowalski@edziennik.pl'),
(13, 4, 19, 2, 13, 2147483647, 'Bronisława', 'Maja', 'Żmijewska', 'polskie', '2015-04-04 00:00:00', 'K', '777366154', 'bzmijewska@edziennik.pl'),
(14, 4, 20, 2, 14, 2147483647, 'Alan', 'Paweł', 'Biejat', 'polskie', '2015-02-06 00:00:00', 'M', '123202163', 'abiejat@edziennik.pl'),
(15, 4, 21, 3, 15, 2147483647, 'Daniel', 'Bogdan', 'Dudek', 'polskie', '2014-08-26 00:00:00', 'M', '887414166', 'ddudek@edziennik.pl'),
(16, 4, 22, 3, 16, 2147483647, 'Dorota', 'Jaśmina', 'Szymańska', 'polskie', '2014-12-16 00:00:00', 'K', '757622556', 'dszymanska@edziennik.pl'),
(17, 4, 23, 3, 17, 2147483647, 'Alfred', 'Cezary', 'Duda', 'polskie', '2014-04-10 00:00:00', 'M', '285124106', 'aduda@edziennik.pl'),
(18, 4, 24, 3, 18, 2147483647, 'Lena', 'Krystyna', 'Biejat', 'polskie', '2014-07-04 00:00:00', 'K', '407426719', 'lbiejat@edziennik.pl'),
(19, 4, 25, 3, 19, 2147483647, 'Alfred', 'Adam', 'Ziemba', 'polskie', '2014-07-17 00:00:00', 'M', '169442120', 'aziemba@edziennik.pl'),
(20, 4, 26, 3, 20, 2147483647, 'Bronisława', 'Krystyna', 'Wołyniak', 'polskie', '2014-01-25 00:00:00', 'K', '285287608', 'bwolyniak@edziennik.pl'),
(21, 4, 27, 3, 21, 2147483647, 'Paweł', 'Kevin', 'Duda', 'polskie', '2014-07-07 00:00:00', 'M', '272964795', 'pduda@edziennik.pl'),
(22, 4, 28, 4, 22, 2147483647, 'Daniel', 'Kacper', 'Kalinowski', 'polskie', '2013-02-10 00:00:00', 'M', '172315128', 'dkalinowski@edziennik.pl'),
(23, 4, 29, 4, 23, 2147483647, 'Katarzyna', 'Nikola', 'Kowalska', 'polskie', '2013-09-22 00:00:00', 'K', '342429047', 'kkowalska@edziennik.pl'),
(24, 4, 30, 4, 24, 2147483647, 'Sebastian', 'Alan', 'Lewandowski', 'polskie', '2013-05-04 00:00:00', 'M', '115327616', 'slewandowski@edziennik.pl'),
(25, 4, 31, 4, 25, 2147483647, 'Bronisława', 'Maja', 'Kowalska', 'polskie', '2013-06-18 00:00:00', 'K', '346137485', 'bkowalska@edziennik.pl'),
(26, 4, 32, 4, 26, 2147483647, 'Alan', 'Bogdan', 'Prus', 'polskie', '2013-03-27 00:00:00', 'M', '951549918', 'aprus@edziennik.pl'),
(27, 4, 33, 4, 27, 2147483647, 'Maja', 'Józefa', 'Wiśniewska', 'polskie', '2013-09-06 00:00:00', 'K', '791466007', 'mwisniewska@edziennik.pl'),
(28, 4, 34, 4, 28, 2147483647, 'Alan', 'Adam', 'Zieliński', 'polskie', '2013-01-04 00:00:00', 'M', '333373991', 'azielinski@edziennik.pl'),
(29, 4, 35, 5, 29, 2147483647, 'Gustaw', 'Daniel', 'Szkot', 'polskie', '2012-02-09 00:00:00', 'M', '584325947', 'gszkot@edziennik.pl'),
(30, 4, 36, 5, 30, 2147483647, 'Maja', 'Karolina', 'Wysocka', 'polskie', '2012-12-24 00:00:00', 'K', '220741631', 'mwysocka@edziennik.pl'),
(31, 4, 37, 5, 31, 2147483647, 'Cezary', 'Paweł', 'Polak', 'polskie', '2012-09-27 00:00:00', 'M', '849175281', 'cpolak@edziennik.pl'),
(32, 4, 38, 5, 32, 2147483647, 'Maja', 'Katarzyna', 'Szemis', 'polskie', '2012-08-18 00:00:00', 'K', '225258596', 'mszemis@edziennik.pl'),
(33, 4, 39, 5, 33, 2147483647, 'Alan', 'Kacper', 'Kowalski', 'polskie', '2012-07-25 00:00:00', 'M', '959970672', 'akowalski@edziennik.pl'),
(34, 4, 40, 5, 34, 2147483647, 'Maja', 'Bronisława', 'Biejat', 'polskie', '2012-02-02 00:00:00', 'K', '719755350', 'mbiejat@edziennik.pl'),
(35, 4, 41, 5, 35, 2147483647, 'Kevin', 'Aleks', 'Wróbel', 'polskie', '2012-04-23 00:00:00', 'M', '930813573', 'kwrobel@edziennik.pl'),
(36, 4, 42, 6, 36, 2147483647, 'Daniel', 'Kacper', 'Kowalski', 'polskie', '2011-07-16 00:00:00', 'M', '679926168', 'dkowalski@edziennik.pl'),
(37, 4, 43, 6, 37, 2147483647, 'Karolina', 'Bronisława', 'Mazur', 'polskie', '2011-03-07 00:00:00', 'K', '729775735', 'kmazur@edziennik.pl'),
(38, 4, 44, 6, 38, 2147483647, 'Jan', 'Daniel', 'Ziemba', 'polskie', '2011-10-13 00:00:00', 'M', '209229904', 'jziemba@edziennik.pl'),
(39, 4, 45, 6, 39, 2147483647, 'Maja', 'Magdalena', 'Gal', 'polskie', '2011-01-12 00:00:00', 'K', '380556902', 'mgal@edziennik.pl'),
(40, 4, 46, 6, 40, 2147483647, 'Kacper', 'Kevin', 'Sala', 'polskie', '2011-05-29 00:00:00', 'M', '544341235', 'ksala@edziennik.pl'),
(41, 4, 47, 6, 41, 2147483647, 'Józefa', 'Julia', 'Biejat', 'polskie', '2011-07-21 00:00:00', 'K', '702426959', 'jbiejat@edziennik.pl'),
(42, 4, 48, 6, 42, 2147483647, 'Adam', 'Mateusz', 'Szkot', 'polskie', '2011-09-19 00:00:00', 'M', '774200748', 'aszkot@edziennik.pl'),
(43, 4, 49, 7, 43, 2147483647, 'Jan', 'Paweł', 'Góral', 'polskie', '2010-02-10 00:00:00', 'M', '454061136', 'jgoral@edziennik.pl'),
(44, 4, 50, 7, 44, 2147483647, 'Jaśmina', 'Lena', 'Wołoszek', 'polskie', '2010-08-26 00:00:00', 'K', '377411099', 'jwoloszek@edziennik.pl'),
(45, 4, 51, 7, 45, 2147483647, 'Jan', 'Adam', 'Szkot', 'polskie', '2010-08-29 00:00:00', 'M', '947785020', 'jszkot@edziennik.pl'),
(46, 4, 52, 7, 46, 2147483647, 'Bronisława', 'Nikola', 'Wołyniak', 'polskie', '0000-00-00 00:00:00', 'K', '840444094', 'bwolyniak@edziennik.pl'),
(47, 4, 53, 7, 47, 2147483647, 'Alfred', 'Alan', 'Kaszub', 'polskie', '2010-09-01 00:00:00', 'M', '494135261', 'akaszub@edziennik.pl'),
(48, 4, 54, 7, 48, 2147483647, 'Katarzyna', 'Maria', 'Szkot', 'polskie', '2010-05-11 00:00:00', 'K', '470208721', 'kszkot@edziennik.pl'),
(49, 4, 55, 7, 49, 2147483647, 'Alan', 'Cezary', 'Ziemba', 'polskie', '0000-00-00 00:00:00', 'M', '471422389', 'aziemba@edziennik.pl'),
(50, 4, 56, 8, 50, 2147483647, 'Jan', 'Alfred', 'Wołyniak', 'polskie', '2009-07-05 00:00:00', 'M', '503904480', 'jwolyniak@edziennik.pl'),
(51, 4, 57, 8, 51, 2147483647, 'Jaśmina', 'Dorota', 'Woźniak', 'polskie', '2009-10-05 00:00:00', 'K', '763602315', 'jwozniak@edziennik.pl'),
(52, 4, 58, 8, 52, 2147483647, 'Cezary', 'Michał', 'Pawłowski', 'polskie', '2009-03-01 00:00:00', 'M', '398461825', 'cpawlowski@edziennik.pl'),
(53, 4, 59, 8, 53, 2147483647, 'Jaśmina', 'Katarzyna', 'Żmijewska', 'polskie', '2009-07-21 00:00:00', 'K', '984177842', 'jzmijewska@edziennik.pl'),
(54, 4, 60, 8, 54, 2147483647, 'Sebastian', 'Kacper', 'Góral', 'polskie', '2009-06-18 00:00:00', 'M', '744062825', 'sgoral@edziennik.pl'),
(55, 4, 61, 8, 55, 2147483647, 'Maja', 'Maria', 'Wiśniewska', 'polskie', '2009-10-07 00:00:00', 'K', '544786479', 'mwisniewska@edziennik.pl'),
(56, 4, 62, 8, 56, 2147483647, 'Jan', 'Daniel', 'Kowalski', 'polskie', '2009-05-17 00:00:00', 'M', '808621378', 'jkowalski@edziennik.pl'),
(57, 4, 63, 9, 58, 2147483647, 'Aleks', 'Adam', 'Duda', 'polskie', '2008-08-26 00:00:00', 'M', '810830566', 'aduda@edziennik.pl'),
(58, 4, 64, 9, 59, 2147483647, 'Jaśmina', 'Karolina', 'Żmijewska', 'polskie', '2008-11-28 00:00:00', 'K', '792895823', 'jzmijewska@edziennik.pl'),
(59, 4, 65, 9, 60, 2147483647, 'Jan', 'Kevin', 'Pomorski', 'polskie', '2008-02-23 00:00:00', 'M', '819519778', 'jpomorski@edziennik.pl'),
(60, 4, 66, 9, 61, 2147483647, 'Krystyna', 'Karolina', 'Kowalska', 'polskie', '2008-07-10 00:00:00', 'K', '749854421', 'kkowalska@edziennik.pl'),
(61, 4, 67, 9, 62, 2147483647, 'Alfred', 'Alan', 'Szkot', 'polskie', '2008-01-06 00:00:00', 'M', '577211713', 'aszkot@edziennik.pl'),
(62, 4, 68, 9, 63, 2147483647, 'Jaśmina', 'Maria', 'Duda', 'polskie', '2008-09-09 00:00:00', 'K', '894183924', 'jduda@edziennik.pl'),
(63, 4, 69, 9, 64, 2147483647, 'Gustaw', 'Daniel', 'Mazur', 'polskie', '2008-06-04 00:00:00', 'M', '921121417', 'gmazur@edziennik.pl'),
(64, 5, 70, 10, 65, 2147483647, 'Gustaw', 'Aleks', 'Helma', 'polskie', '2007-05-26 00:00:00', 'M', '820259987', 'ghelma@edziennik.pl'),
(65, 5, 71, 10, 66, 2147483647, 'Maria', 'Józefa', 'Czarnota', 'polskie', '2007-05-26 00:00:00', 'K', '331083717', 'mczarnota@edziennik.pl'),
(66, 5, 72, 10, 67, 2147483647, 'Adam', 'Paweł', 'Góral', 'polskie', '2007-06-03 00:00:00', 'M', '508339253', 'agoral@edziennik.pl'),
(67, 5, 73, 10, 68, 2147483647, 'Katarzyna', 'Dorota', 'Wysocka', 'polskie', '2007-05-08 00:00:00', 'K', '862294529', 'kwysocka@edziennik.pl'),
(68, 5, 74, 10, 69, 2147483647, 'Bożydar', 'Daniel', 'Gal', 'polskie', '2007-07-20 00:00:00', 'M', '977963443', 'bgal@edziennik.pl'),
(69, 5, 75, 10, 70, 2147483647, 'Bronisława', 'Józefa', 'Wiśniewska', 'polskie', '2007-04-11 00:00:00', 'K', '633012463', 'bwisniewska@edziennik.pl'),
(70, 5, 76, 10, 71, 2147483647, 'Gustaw', 'Paweł', 'Dudek', 'polskie', '2007-12-03 00:00:00', 'M', '498869093', 'gdudek@edziennik.pl'),
(71, 5, 77, 11, 72, 2147483647, 'Bożydar', 'Mateusz', 'Szemis', 'polskie', '2006-04-11 00:00:00', 'M', '763378863', 'bszemis@edziennik.pl'),
(72, 5, 78, 11, 73, 2147483647, 'Dorota', 'Bronisława', 'Żmijewska', 'polskie', '2006-10-10 00:00:00', 'K', '464463004', 'dzmijewska@edziennik.pl'),
(73, 5, 79, 11, 74, 2147483647, 'Sebastian', 'Aleks', 'Wołoszek', 'polskie', '2006-08-20 00:00:00', 'M', '882219304', 'swoloszek@edziennik.pl'),
(74, 5, 80, 11, 75, 2147483647, 'Krystyna', 'Zofia', 'Szkot', 'polskie', '0000-00-00 00:00:00', 'K', '152844528', 'kszkot@edziennik.pl'),
(75, 5, 81, 11, 76, 2147483647, 'Gustaw', 'Adam', 'Żmijewski', 'polskie', '2006-10-14 00:00:00', 'M', '952103021', 'gzmijewski@edziennik.pl'),
(76, 5, 82, 11, 77, 2147483647, 'Nikola', 'Julia', 'Wołoszek', 'polskie', '2006-03-09 00:00:00', 'K', '986645384', 'nwoloszek@edziennik.pl'),
(77, 5, 83, 11, 78, 2147483647, 'Alan', 'Bogdan', 'Szkot', 'polskie', '2006-12-16 00:00:00', 'M', '532963552', 'aszkot@edziennik.pl'),
(78, 5, 84, 12, 79, 2147483647, 'Kevin', 'Gustaw', 'Kalinowski', 'polskie', '2005-05-23 00:00:00', 'M', '816244431', 'kkalinowski@edziennik.pl'),
(79, 5, 85, 12, 80, 2147483647, 'Krystyna', 'Karolina', 'Żmuda', 'polskie', '2005-04-19 00:00:00', 'K', '454684623', 'kzmuda@edziennik.pl'),
(80, 5, 86, 12, 81, 2147483647, 'Bożydar', 'Paweł', 'Wołyniak', 'polskie', '2005-06-01 00:00:00', 'M', '696670201', 'bwolyniak@edziennik.pl'),
(81, 5, 87, 12, 82, NULL, 'Karolina', 'Maja', 'Sala', 'polskie', '2005-01-09 00:00:00', 'K', '680291191', 'ksala@edziennik.pl'),
(82, 5, 88, 12, 83, 2147483647, 'Alan', 'Jan', 'Norwecki', 'polskie', '2005-04-14 00:00:00', 'M', '244317384', 'anorwecki@edziennik.pl'),
(83, 5, 89, 12, 84, 2147483647, 'Zofia', 'Józefa', 'Lewandowska', 'polskie', '2005-10-17 00:00:00', 'K', '648569124', 'zlewandowska@edziennik.pl'),
(84, 5, 90, 12, 85, 2147483647, 'Michał', 'Bożydar', 'Wróbel', 'polskie', '2005-11-22 00:00:00', 'M', '508205103', 'mwrobel@edziennik.pl'),
(85, 5, 91, 13, 86, 2147483647, 'Gustaw', 'Michał', 'Dudek', 'polskie', '2004-08-22 00:00:00', 'M', '931207046', 'gdudek@edziennik.pl'),
(86, 5, 92, 13, 87, 2147483647, 'Krystyna', 'Bronisława', 'Norwecka', 'polskie', '2004-08-21 00:00:00', 'K', '340659502', 'knorwecka@edziennik.pl'),
(87, 5, 93, 13, 88, 2147483647, 'Bogdan', 'Daniel', 'Ziemba', 'polskie', '2004-10-19 00:00:00', 'M', '113198786', 'bziemba@edziennik.pl'),
(88, 5, 94, 13, 89, 2147483647, 'Zofia', 'Dorota', 'Mazur', 'polskie', '2004-05-25 00:00:00', 'K', '173132398', 'zmazur@edziennik.pl'),
(89, 5, 95, 13, 90, 2147483647, 'Bożydar', 'Mateusz', 'Żmuda', 'polskie', '2004-01-13 00:00:00', 'M', '221070621', 'bzmuda@edziennik.pl'),
(90, 5, 96, 13, 91, 2147483647, 'Nikola', 'Maria', 'Towarek', 'polskie', '2004-10-12 00:00:00', 'K', '816724831', 'ntowarek@edziennik.pl'),
(91, 5, 97, 13, 92, 2147483647, 'Jan', 'Bogdan', 'Prus', 'polskie', '2004-10-31 00:00:00', 'M', '392367696', 'jprus@edziennik.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `Id_User` int(11) NOT NULL,
  `Login` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `Password` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `UserType` varchar(1) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`Id_User`, `Login`, `Password`, `UserType`) VALUES
(1, 'bdabrowski', '$2y$10$afgfy9Pbqky8R50LIFBCFeLWhDZvvJ4uq1FVbPYTkqkULPfaZ1Sd.', 'U'),
(2, 'klewandowska', '$2y$10$ENHuDUMXSwMXM/Zk1mat2O1dTpdOPZzbeFZfPZ6tD/tXPPicX0n0.', 'U'),
(3, 'bwysocki', '$2y$10$ugaBvVNhD3RfRkORFJa0D.FDgo4g6QOWORKEIIPUXT7OTboBB5lDS', 'U'),
(4, 'kgoral', '$2y$10$7oo4AN.SxA9cLhsUy1LcMOCbLMwB9m7itTn5SrYWa3JuFd1BlziXq', 'U'),
(5, 'bnorwecki', '$2y$10$7dnT1nYvDJufXHVqQOOOCO7H5kNOS9fAyryFwE4s5jAwb97qHvpUi', 'U'),
(6, 'kziemba', '$2y$10$8XYI1f5LONG1L.JigCKRO.oEvamcXqbPLyqNlgLwrr8AwBUGLK.6q', 'U'),
(7, 'cnorwecki', '$2y$10$UMCk1Jj7Lg7oU78OY.Yh8./t8kk3yrlqgXpn5a/oEoqn9tLMxXnB.', 'U'),
(8, 'cwolyniak', '$2y$10$p.YbY3qUdiR8Syz7Ng1PkuwrW2vWubVRSyM99rlVam/UAnj9IxBcC', 'U'),
(9, 'mszkot', '$2y$10$y1/ujq252SBA69/JHhAjSumNXv.0CxljrEA5iEf7UyCWYpb3V7p5G', 'U'),
(10, 'bwozniak', '$2y$10$ZIN6igcLaR4jQn5HkOi8I.TwVe2qiIKcqkhulA11GrOq1o8QyDt2W', 'U'),
(11, 'mgoral', '$2y$10$rzyJ2VXQEAqEwMU5WD.tR.2HrCse/eS6KczCHUdHkjO4O4fdU/HHK', 'U'),
(12, 'jkowalski', '$2y$10$pDf2CBm.ZaG/OPlJLFNwVuV9I5VpgYgSemi9f3DmH/bc9at1SSRBW', 'U'),
(13, 'bzmijewska', '$2y$10$VBf2ihZokj7pz68lkl89v..88w0/qpBT6Jdlz5KVdKhuzfqJpaT4O', 'U'),
(14, 'abiejat', '$2y$10$1wh1KH1nSWctnw3Ty691r.POE7SrAt9oNvLGfvSwURbEP5/oGNOAe', 'U'),
(15, 'ddudek', '$2y$10$T09dTATye5aLTmCBLA4lVOxnKsTJaq.cpFGs8UG1VSTZpzkt4HZ0K', 'U'),
(16, 'dszymanska', '$2y$10$fy9fdL8wrZnSK7QLOLB9WuXPsnKSuzU6M3wn1diRMzwJMvTloAPmG', 'U'),
(17, 'aduda', '$2y$10$T5ShvJR9Coksf0l9q0FTq.wshZvjUrb1x4ZbnuQ2AzaZWms6wBl1.', 'U'),
(18, 'lbiejat', '$2y$10$bx6tB6579qpHhaaTnj3FIu0Mu2q94ix3VEgb56Ynu4Jk9MVPh34Xq', 'U'),
(19, 'aziemba', '$2y$10$MSemyHCnCi0wCcQG8r8XlOkkCaVARDdfqT3Pvgj4Ew5d7H9zlgppy', 'U'),
(20, 'bwolyniak', '$2y$10$.ViAGDXywmy20rMr80JQ0egNiL6/oInjyeuLzIICzugwI2lVhRwii', 'U'),
(21, 'pduda', '$2y$10$GtnJ195KXp2nlecLHHfPUeQyyCyde3/joihWoOpyg/wbDuO7FffkS', 'U'),
(22, 'dkalinowski', '$2y$10$Ug2LAdhhk31J/WT9SqAVF.tzuWpMkjbdygM2IecPWoLMs.YHtGdXq', 'U'),
(23, 'kkowalska', '$2y$10$8vjWZs00q7H2xHiO/B5g.uHyrxnYq3u3xIJzLF3VWgM9sFL74e.2u', 'U'),
(24, 'slewandowski', '$2y$10$9Cc9lNH01XBZTQwDxsPWj.QEtMzs6oiW9jPDFpi5jD8UEUGqR0WKe', 'U'),
(25, 'bkowalska', '$2y$10$iFkIKUnPJO423qU3oAj/ju/mkCtD7hoQe/A9v0/vWNNFCOCZOyY9C', 'U'),
(26, 'aprus', '$2y$10$a1LiQash7JMT7cEMX32QqOM/cQjHiehTGuKwnHBqvnN/9ncXMR1IO', 'U'),
(27, 'mwisniewska', '$2y$10$IcyvlFY3UiEStgRJ9FPobOb2ekIhRgBUJiYWAcSXyoX/NZjzFmUda', 'U'),
(28, 'azielinski', '$2y$10$hxo7KhaWV39p88ooF9jgHOThIF5xK3YQ0ETh3bZsGKd6KAP70ewRW', 'U'),
(29, 'gszkot', '$2y$10$iVTKDrZaJipEqDXb8h9uCOoHrLbmK5a7CuMKjmqemFyDA8M2onMxq', 'U'),
(30, 'mwysocka', '$2y$10$6IJCh/H4hIKh0Svt0TlS.up11527gCvQ.iFclNJK4gLSZfOIBcH.m', 'U'),
(31, 'cpolak', '$2y$10$3B/.R1XkH8guX4ssmlN.VejNadZ8FkZWb9QPI48f6Nk32ghULyTUa', 'U'),
(32, 'mszemis', '$2y$10$3EwHRKn32zspjFS5ptUDnuukHsQhn12x8A.uUawyjiHcePPeqWNvq', 'U'),
(33, 'akowalski', '$2y$10$iuMkxpD9YHEOkwlC3wLojuM3hyJD6q/H8OCksCwEaWROAxOw7P5.W', 'U'),
(34, 'mbiejat', '$2y$10$yorZAMUdnqqJcr1klNsSJOUlv.1DZjdw/5y1rI9UrwNRG0MPGkKaq', 'U'),
(35, 'kwrobel', '$2y$10$RmfL/Dygv3GD.dEASurFSOBZZtHe81euo0RniHh7nfdNvW9W.MyB6', 'U'),
(36, 'dkowalski', '$2y$10$evRud.LmNSGzsTf3pgPAFuNNkbWVkDUKKZnyrWcZZjHHbp0idRjfG', 'U'),
(37, 'kmazur', '$2y$10$3eXMQR.X3qnNjkfYsm3Nm..9vHZCbFsqeFmyCpL60cld/xywRAZwK', 'U'),
(38, 'jziemba', '$2y$10$4pMIe6u5245sNh243bAy3O2uOe6jnB5oFmUSOtQT1uBQ/6Wi8MTd6', 'U'),
(39, 'mgal', '$2y$10$KE0DEAYW03s4jOjKmdQBduhEVRg09/ZJGDAci8pLHl.hA.Yh2qEFm', 'U'),
(40, 'ksala', '$2y$10$KXD8q.u0jYDgBJ.zVvv9cuBquLLpTZUGLOXJXiyIOMJDHA7KD51GS', 'U'),
(41, 'jbiejat', '$2y$10$Wm7mVnBxJAEsRItOq5Jtvua9nfKCyz7eLV2jQNDOk.QZZeMsi01mi', 'U'),
(42, 'aszkot', '$2y$10$8UHoxpMkZAYLmAZuzaRLSeDFr1/GUAt2liCoJ90k.ZQGBz5sGk.Mm', 'U'),
(43, 'jgoral', '$2y$10$vWK0PcK2.wMTHzbWHatIs.br5Spw.NmGL..xonsjjCtbTbOjoMWfq', 'U'),
(44, 'jwoloszek', '$2y$10$kW6ACglya4aGzSordBApW.oPtkVj2XSPOW9amJ36rQiTfOWCs8UXG', 'U'),
(45, 'jszkot', '$2y$10$qmx8vsV4cSm6iyiqpP2fMu8kIRTykcoB6BMmlDi0TBV5o2GZ2FCau', 'U'),
(46, 'bwolyniak', '$2y$10$ww3mo8VHCyhfd9qEAxzHwez2pcIrZ9FKYDG8Po2LPUAd.RanvqxiG', 'U'),
(47, 'akaszub', '$2y$10$0eslaoDFL6GwzmxHAuiKQOu6.TPJg3yagWRVDBY43kJ8rJccEl1yq', 'U'),
(48, 'kszkot', '$2y$10$gMKSKR04h300zkXgQ2WXLeNgsPwEDSz8C7rQRpByGbOSRI6avJJJ6', 'U'),
(49, 'aziemba', '$2y$10$q5a/MSCOS888Ym.3mrYG8OTY.r6W6Xg6I08e4kGVavo7lQAfJ52He', 'U'),
(50, 'jwolyniak', '$2y$10$v3MceoL1ZELz0uFhqY2wSu749oNb2SEq9DmL/8Jzq35qsqfHkOLbO', 'U'),
(51, 'jwozniak', '$2y$10$j5tjjAfb0MRiqOyXmlvcUudI6W8FoarTppMkKfHbOYHaZZZiPFBAu', 'U'),
(52, 'cpawlowski', '$2y$10$oduk7ExE6Y4U27haZBfHI.wqxp9i84mQ4JKitFYaH8KJ4HsxA0cJW', 'U'),
(53, 'jzmijewska', '$2y$10$ri5ZeggN2puHZV75K110HOln.CJ4jcujDtLtiAPpNKcKLZZWnGHL.', 'U'),
(54, 'sgoral', '$2y$10$INaqzgISBw8fI9LUUiU4AOmVzGnKEUty18eekV/5z2jRu/AzauQIC', 'U'),
(55, 'mwisniewska', '$2y$10$U2vp/cBLXZDzVwPEe8.ixOgz7QEC3eveo7/CrGXVlSVB4gt4z3iMO', 'U'),
(56, 'jkowalski', '$2y$10$AoUVFsnMUywT0XAF06hVK.lQtYGQZGVG1KE36CxdC4C7DU/SMx4Vu', 'U'),
(57, 'admin123', '$2y$10$bvWCp07YJlfA/MsTV7dwrOcPul14M7taflZv8Yg0Ecw66hP4.DJEa', 'A'),
(58, 'aduda', '$2y$10$tL84xLmMZQLFGrPBFCZnv.IQvR4UjrcYjWdJc/53fTsGggs6skRPG', 'U'),
(59, 'jzmijewska', '$2y$10$qlgAwziuOFe2EBLAKbBDpOMkf74jzko09yNoUHDBKLvWH.MRUBjsW', 'U'),
(60, 'jpomorski', '$2y$10$H7kP02ZQ7yqm4ZFa85cNcek3uARRxBIXsfZ5Dxyi4tOAths3dqM22', 'U'),
(61, 'kkowalska', '$2y$10$HAou5Kz8gv/9MzNaGAN..uehMdkmhg48XeQJjOZbdsYuIEFhUwROS', 'U'),
(62, 'aszkot', '$2y$10$LONROREAd7XOrc/0PS/Bjew8VPb4Dhae.oxxDV.brHncUlB/0U0Na', 'U'),
(63, 'jduda', '$2y$10$BwbbdmpIHE0scqSvu/zMr.pkMjzlZCX359loQO0UdaWg2MNO1WDlG', 'U'),
(64, 'gmazur', '$2y$10$e2/IXqdglo7vEH1HVlOz6ecVI6DN6wIGvTLvkOvEJglfB6JyUYn.G', 'U'),
(65, 'ghelma', '$2y$10$SGG/G63AxcBqLN4Ibl/GYO5.efDdqeROAEYxlLbA3c8H5aOktL/8m', 'U'),
(66, 'mczarnota', '$2y$10$/khlgoGVVs6P1ZOwsIqrTuUJui5.l0QnvVR2y4LAsoMnSKP3JjUZS', 'U'),
(67, 'agoral', '$2y$10$wANqU0BENBrcbVnuoqTxVuDLxjBirlXD5WCb6v6sZSVSWRM8hUrX.', 'U'),
(68, 'kwysocka', '$2y$10$A1pCcgMSiLQHXSWRvUjmR.j../7Q3PIv3zd1tlsNyQvc96W.hv3kC', 'U'),
(69, 'bgal', '$2y$10$j4UqNnP9E6kkyOXYoO8t0eLuh2upOtl1DyNE1y0FoxQh0mqJE4L9u', 'U'),
(70, 'bwisniewska', '$2y$10$A50Fb.uiXvGHSj2XFZct7e4ZkWCnKm9AkecC4HyRKxFSKWasLkgWe', 'U'),
(71, 'gdudek', '$2y$10$utmyzpJc0wQUpzEI6PZkNuDZwigyvRUabU/CENyrVah2pWlBfSk7W', 'U'),
(72, 'bszemis', '$2y$10$L6i944Sk3/GLPOWnGhHGqOH3pyr.zgF4mWgHWy8w1e/i6OEDQexC.', 'U'),
(73, 'dzmijewska', '$2y$10$sgDInODoX4r81wHURKC2kOjnQQfP086IEWUMnpxa.yNCavj94kM56', 'U'),
(74, 'swoloszek', '$2y$10$wZhP9oBoRhF8/ruobOSWjuJu9oUcLFUOboXFx695RQIAECp.kLOdK', 'U'),
(75, 'kszkot', '$2y$10$FBOZX8kKhJXvPsmllZMs3e.jDBTBnJubNd6/zEjCHCjJxja0IXGS.', 'U'),
(76, 'gzmijewski', '$2y$10$t70i/84DQpIGlCOnrG4CPOb6XkbWuVvSCNZ1dzMo8DNpbGTAz0INe', 'U'),
(77, 'nwoloszek', '$2y$10$sxDdCg3hWi08ZnSbNqE0YuTlSOXWw3mWyT07QyhaN4QW3ogiJLjju', 'U'),
(78, 'aszkot', '$2y$10$3PMXeQb/eA/0bLt8k1JPwOwQmhuFOD2BcI72DjIJhyj6ze8mdD9km', 'U'),
(79, 'kkalinowski', '$2y$10$hLrIL36tXsX2FyDKCiT75uI7NFCSJSRa/5sZbRkBVB5RrjgTuHLz6', 'U'),
(80, 'kzmuda', '$2y$10$5oU7a17jOwJZpePCeH/AWeh8M1Qfi215g3nLhFYnjQnod2kFGgwWS', 'U'),
(81, 'bwolyniak', '$2y$10$837CXp6Ett.gPMan6c3yJemktV9Z5bgL9IDK0FZQ/Wk60TWGr9xuG', 'U'),
(82, 'ksala', '$2y$10$.7hosx1rM47rXr5ZQHE2E.X4uVdwDvij7dmE.llhB2R2v1ld/AOvC', 'U'),
(83, 'anorwecki', '$2y$10$bM7KmOLGvFe/0uE3Gkr2rebZIbtNm3.02vZFz/8z7N92jJUKiUMzK', 'U'),
(84, 'zlewandowska', '$2y$10$b9drFqAk3.9IJ/K.sT/hfuRdUZe1OLg6pwdmxkETW95eoAkbQN78G', 'U'),
(85, 'mwrobel', '$2y$10$.Cq9WB79t4E/Stc44HVM/.4kwVlJsRKfMiP77kDGszwDpVoAm5gRC', 'U'),
(86, 'gdudek', '$2y$10$Sqo/RjLt29wuSuD/V6LmzuZcMWPimla/Z44w6lVxKdDmR7NNXYDhK', 'U'),
(87, 'knorwecka', '$2y$10$E7ubwKGC5Wut1qN0MXtD1OXpGLlnC4azFwDXHy0aCxmotzH4HgYN.', 'U'),
(88, 'bziemba', '$2y$10$Z.SHgc/ckOA3q37IADQcNuLHTnFKAFR4O82VM5JBiliMVn4IJudi6', 'U'),
(89, 'zmazur', '$2y$10$fYowz2BQjqYdClhgIOxKR.gPcLMymtGHkgI4J8Yy8/SrIWiuLAU2e', 'U'),
(90, 'bzmuda', '$2y$10$Fy6LPJLK36ary34d6.6m4OWF89gvFZYyu3g.9A6lnjaRnCuKW.ISi', 'U'),
(91, 'ntowarek', '$2y$10$O6q/IGiMJO0fO1cfEd5sWOYitHTbusp2XrtjCxXQ.bg1dpQmpPG.S', 'U'),
(92, 'jprus', '$2y$10$OGkXkueC0vgrXLgU6PmGluTmOr39keiDG6s52agR5Y7gwbhMImy/G', 'U'),
(93, 'par62171', '$2y$10$ZqZY3lT5bCFuRd20y0ggfOGZ6CQn2SrlgRxJTlX7zeKWeY8NtO8jC', 'P'),
(94, 'par17878', '$2y$10$yCfCdd3EgGe0tidRC9/mB.7vSIQe66K7rsXQLVl9lp3FCu1CXAmQW', 'P'),
(95, 'par31109', '$2y$10$iblyTQww608FnuPKjYx7AeTbE4Ywt99Lm6VTQLOxJKPMdp841gJ1O', 'P'),
(96, 'par75933', '$2y$10$5QZsM0eSo9tc75C8bbOolOy5uFB6e35dypZscqcOiuxAl8wzLktNa', 'P'),
(97, 'par71979', '$2y$10$2SosyodE0R0iVLxb2lwsBeqtP0JO0GtYtS/lH1dlZL2qCwMd4V8Mi', 'P'),
(98, 'par87067', '$2y$10$dcsG9jhgmWzv/qskGkOBV.vAHDX4s7OT2nW8qZ88O/PTBNstKsiXW', 'P'),
(99, 'par17997', '$2y$10$llIfJdW49vFGC5uROL1n1eqahwSkho0iiq2O7x1vWhkHEKs/SCtIS', 'P'),
(100, 'par74912', '$2y$10$tpMgynf41Dd1IyEMhZMzE.nVvSu0KVY0Wor/RJF8tkinuylTfOXzG', 'P'),
(101, 'par94735', '$2y$10$f1ce5rNdHdZVu4/9n5m1NebVRN0zYBcZnF0wHCzV/QbXCu43WUHDW', 'P'),
(102, 'par79760', '$2y$10$32X1ATD7psJVNbDM.ufRX.SMwIt.Fsl52bn735YKQEr2Jo1NZHFLO', 'P'),
(103, 'par79073', '$2y$10$auODelT/ovdPvGN9/4nxKe9xDrdv7u72/nRTeKTQLM/4OpYTZeM3K', 'P'),
(104, 'par62878', '$2y$10$EEqt.8gt04IX02g.6JF8X.GHoENeZXICggFRqorzOMl/Wctyfa.72', 'P'),
(105, 'par64862', '$2y$10$NvEzCTUGjHsv.oXy4m8IMOKpolb0ZFEv.LRLlMEM9kl.BN6cSs7.S', 'P'),
(106, 'par63202', '$2y$10$gWYlQSIoRurJAcc8bXmT1.1V9al5W0IzhPYj5v7.95w8aFcnW.IBm', 'P'),
(107, 'par51828', '$2y$10$S6XkNPcnQcrxVzrJ2WXVC.pJL2lPxC/W.wuaK/dFxg0KY4pi7wJa6', 'P'),
(108, 'par26386', '$2y$10$QsPESzO9W6y3noP9p.RVKeDNorAZ6QZn9XHZHIXdVp1S/eOhAxpl2', 'P'),
(109, 'par84079', '$2y$10$20ouDIy/9Atp/50oIG5n4e1UAo8evdYYrSmJ27oz0.cVeLIDa.ITW', 'P'),
(110, 'par17760', '$2y$10$eomKxSc0sknuF/qMycDvW.xFexs/dXUIMDVoEgo6x6AYWnNnhgzLu', 'P'),
(111, 'par34338', '$2y$10$FAK0DU7pcPxss/y1w5hxkew6lPahBn9oNJN35qiFbrcz59vpwCMWe', 'P'),
(112, 'par92848', '$2y$10$bZOhswdyiNQAoOoC/ZL1CezO0JBvq6X6tDuE5koaYf0xyeTthUHRy', 'P'),
(113, 'par92659', '$2y$10$eRsw9ZXlUOoHHFlTftyU.uy9AZPs.TP1AK7Ru/Pp5JlHiokxxYDQO', 'P'),
(114, 'par52129', '$2y$10$nHdsqD7lsm6A7LQve2ypMuB7ODbmrQMAWHZWXRRDghlNsO.IdmRV2', 'P'),
(115, 'par36699', '$2y$10$wlDzw1MXjL6s1zDBlqk0f.4YDW4EZUh43Q0m5fmxDdLmJZ4jGmjU2', 'P'),
(116, 'par76404', '$2y$10$2lWeDpXKK9dlDrcLO1mAgeGMsVdsdrqQGOq4s6842cV6l3R2VNK.C', 'P'),
(117, 'par13027', '$2y$10$YwrJH5f/4LMVdiurDDkoC.JwKbUUsie2PIq4q2S0dNqUMJ5rkTyDe', 'P'),
(118, 'par77781', '$2y$10$OZb1D0lUxmb15I2uYTqRn.jcYkES5fYYdrVcFSMbqDX0p45JV5xY2', 'P'),
(119, 'par23897', '$2y$10$bt2N8KOOlKhsYD/W0Hi2KutNMgl7apkioOu9ZMky7vzd0A/zhdqhu', 'P'),
(120, 'par21690', '$2y$10$v0kWunalnZ/sY7KHDdOuCO6eL/BJB0pG4hjqVrzbyXu5DaLVAJZFm', 'P'),
(121, 'par19974', '$2y$10$Sk1ER/RwH6KQFU.YwQQuEeR8odTVBhWKLTfFCt8hTYvLXV7g8ZDwW', 'P'),
(122, 'par86882', '$2y$10$09m6WbkrMtIzmVTXwctw5eh3QI0Gk1RaHbSSYZS0Wag15xYAG7Lr6', 'P'),
(123, 'par73178', '$2y$10$Y7J8Lougjw53ay.P9sU2XOv4xMSvzT2TQZQEGVPuMpaWiOxSgr0Ym', 'P'),
(124, 'par27737', '$2y$10$Rm5WFhQiZeK/.dURp3Wh5OEH/iG1D3dYwbKq0B7y5K4./Lc.MSNBK', 'P'),
(125, 'par23550', '$2y$10$YRlqLostZhM0SWS6ittzg./cFYAgzePTjYvE/IbdG5WBYG/01HwSK', 'P'),
(126, 'par43561', '$2y$10$Nv9f05wG25rup/trEHQNNeqgS2WWtoYoWtYUjTEPeN.Ye8MPBkEGu', 'P'),
(127, 'par35319', '$2y$10$DE7lP/QZkuMLLSgfZkwFb.VwUvZFVLgWhN.lfV6aVXNneTz3rp8zy', 'P'),
(128, 'par35863', '$2y$10$.3so1RzaEXDUXiOjGa6Dke5wAXXd/odaFqsIepWbwmHxBzfzeXeOC', 'P'),
(129, 'par22303', '$2y$10$l87kIpEvnrHv6ob7tChuQu3CqB/wyPB/Y/yMvkeE198NM83csn/3q', 'P'),
(130, 'par80148', '$2y$10$7oFRZQUUA4RXrdfkwqdbS.XvIWiJixvI4p3Mm1eBHrOLRJQzatAhC', 'P'),
(131, 'par89485', '$2y$10$TxBO/bNi1qgt4Egbfo9Esu/8xqwmEY/pcOEbrEPrKls0wBR/IMAeu', 'P'),
(132, 'par71500', '$2y$10$eOfGAleamlTLCcrDXT78uexsPfI71iDVKlRy3LCEolMBPRQmoWBVK', 'P'),
(133, 'par86170', '$2y$10$/MnfarP4iMNprdQxZGCsROtK1WCUSn2PGcnE8BV/sLUsn9dpGEoDG', 'P'),
(134, 'par42945', '$2y$10$bakqaPWHchzq4mOfQQSvA.8jOwwYhCuxAmBXuRZN8AoytShQgEYk6', 'P'),
(135, 'par44198', '$2y$10$1upqH3Mxn4MCymzVLHpOvedmTGn0sYFHjxTBlcAHERFTw09.fm40O', 'P'),
(136, 'par22646', '$2y$10$Km9wXAkTP7lp0NAe6koYj.DMzGY8n695sfQNE3rDsRjoeCPvqlyEy', 'P'),
(137, 'par46682', '$2y$10$WuQMGrGJSfv.cKeMWt2VeeGZI9eUwpO4UuEbLrjOdnFVnlDhe0mE.', 'P'),
(138, 'par89139', '$2y$10$uPY9FWxQsYqkAsQecZZcheG2mzvEScaeqDOk5ulEvLbLfD7DyLYR.', 'P'),
(139, 'par28860', '$2y$10$CkQSynhiZE6.fDcQ2QWBAebjjP/TU2ChNSF7wAzBiHqXPx1Up2ATS', 'P'),
(140, 'par29796', '$2y$10$S6MhxEa0BqI.89oIFI8rDeue/ZEHvcX2qxT8IaVdOWG0dUsgDwoES', 'P'),
(141, 'par38560', '$2y$10$vRxB7T1MMoxRj7GTBvYVR.Y2pVB0CZ3cIdIjZDcBi.qyAEBKL/Qyu', 'P'),
(142, 'par47100', '$2y$10$lKFeOTtppgcgntd.IMkK0edonllSoUs0P370hBuNDCBLmz.L6Kmxi', 'P'),
(143, 'par44509', '$2y$10$BLLnhlf1S2/TL7In4TuFweckVceQKZ8Xpq1ce0zp.VFh5gaGbMkKG', 'P'),
(144, 'par84644', '$2y$10$GrkB.A1n4PkcFvuXrw3gLub.UnG3TY31QGGMHYaj6SzUDVu3AQElu', 'P'),
(145, 'par54722', '$2y$10$BbH9NATW5unY/UlCnzR.fOhxC9C/JzDV88kJ0Gj.Gl4BOzPDlduq2', 'P'),
(146, 'par19998', '$2y$10$df.z9IsYTbYOoZbD4mCfkOh2zarsCWgmPWlCuJGo/hNEzqX3q/01m', 'P'),
(147, 'par16982', '$2y$10$R7HaWlELT6Q3pm5XEGK65.AfZZ8LmagdcreCC41okLXPTO4MZrRvC', 'P'),
(148, 'par89337', '$2y$10$VW3yMZ34ThlxjLXrkCiAku0oi4rM4lhIrV0PVnmDiG/hvAwSuZzrG', 'P'),
(149, 'par22786', '$2y$10$1yWNtCy4KywTht9Ozw/xweurC3r4sEsuaY8z6qZVVCT77YQ/JoIVC', 'P'),
(150, 'par91168', '$2y$10$orPxz/unUdLolPkP2BFuReYfa4FBgunVkzshUNqkXbm462hfiaXjC', 'P'),
(151, 'par10320', '$2y$10$JvfALsIJAci1igpXJ3hmL.r3zLFvygOviqTyBAEXtm4EP5P14.UI6', 'P'),
(152, 'par67795', '$2y$10$KCb855SlU.jzj4Fh9dy6..Ro07K.iLyzpEbPN3Vrb5LC.8teDrgCa', 'P'),
(153, 'par70945', '$2y$10$deuZqdp93WqzHYui5mmUTuKq5zgMNVFWpqdcSbuPvw11X/nrTCQd2', 'P'),
(154, 'par27685', '$2y$10$Nkg/LPAJV3mIGkpgVjiuiepMXt2qRF8MLpTQKocl3Arw09Xo6VJZa', 'P'),
(155, 'par84728', '$2y$10$pcIDa3FHrXgs2JDby1U7zuU/ljoiJZHfmats66ZvAtC1WSauHC7la', 'P'),
(156, 'par58434', '$2y$10$gT4A1IA9nuw4TwDLNXDeF.XaRKeryC4.QzD.rAta/0Q3ESJu87UUe', 'P'),
(157, 'par16995', '$2y$10$TNoarUuOsFf.PbwYY2Ig5e9mBvdKigMs/L/X1Oln8HdVo/8Ktpq8W', 'P'),
(158, 'par83989', '$2y$10$6mCdHfhAwhyZGEl/sjrheu9c05c0Yhd6YKOZBRZB94KY2ino1Cogq', 'P'),
(159, 'par44051', '$2y$10$QEsu/lsQonqVA6F20UYZNuXYpz/cwZ6aSw1ZUYdUv0dLux9xJ.yDi', 'P'),
(160, 'par90400', '$2y$10$5LDqk6/XCCzFlgUCFjWwVe..6c.AMOGF.8S01FRIzYijVdXbJsF2u', 'P'),
(161, 'par88907', '$2y$10$VPt5YbX5sBsGhi6OiK.3GebfWzdSaLnp/GC7mU2PeshfjG52s0tJy', 'P'),
(162, 'par93069', '$2y$10$YIpJtH2rsvZu1y5yvf3pU.wOjOt0cdH3xAG8zcYY6d3SeWbre.g26', 'P'),
(163, 'par57651', '$2y$10$bFVAiYtnKvN1P.hOOGspmeEaKOqC5cy32AQa4A2XNB3AhzyJ64gG6', 'P'),
(164, 'par83433', '$2y$10$8/kD.V38W/sTecOGFwwFgeZpi5XsuDT72KkoBx4Z1.mkJDcxgbbnq', 'P'),
(165, 'par52161', '$2y$10$ODQ.DChpNIXOlfRB0EfrruVABtwfpUydKxTPI4DnFaIGrOq1I6qsK', 'P'),
(166, 'par33309', '$2y$10$SYTxPUNo1Fqr.pl3yiBJfOxoHpjN9N2eWenzN0l6RAWJ6vzIGrigu', 'P'),
(167, 'par95704', '$2y$10$UGBpPcQGErNP9tq14p3sxe.e.jFv9TM1Rt4lnStlzynlxu2R15XAe', 'P'),
(168, 'par96986', '$2y$10$NPvE2kCzaLyy/.bda0ryWe2IceYH4yRMFsDX.ppxSFCQSXCl.x1J.', 'P'),
(169, 'par32834', '$2y$10$y6Sdg/QXBTPKODRvInAd5eop63jnfEcSzY8B.AII6ULnTvhA0zr/u', 'P'),
(170, 'par60743', '$2y$10$5/7DcR1BWgrPu1T/699O4ehxlH3L3hmLzKtxCXGatr2GdDVi4CnFS', 'P'),
(171, 'par30930', '$2y$10$zk1Kl/8kZN0urRG1njudjeMkHfzkFE.W7I14zymmCaFDvnwouiP4i', 'P'),
(172, 'par22598', '$2y$10$Pv2APEp8HJ8QvX7RqmKOfeqrvX17YonVt3SGgeSyCt9z7nIyvrB/y', 'P'),
(173, 'par28119', '$2y$10$teSLQPmZyOD3L0S4UJ28OuQIX9y68bBX59kWnaFH8S8f5myNCu7Ly', 'P'),
(174, 'par55742', '$2y$10$rCQEAc9IV8GfoIxCxGbqQesMVudKxS/riYbdQAkrkwvXUiWQI.e.S', 'P'),
(175, 'par88204', '$2y$10$VDKbJrUjHKEDDMPmnMLYhuokULKIwbwiOXfdj1mVfleQptrYasaV6', 'P'),
(176, 'par30763', '$2y$10$.0JEBBmm6/mSz1JTm544d.7JUEH3Pcpu5ttTj0jXhwAm3Q35bnvhG', 'P'),
(177, 'par55362', '$2y$10$RvNndYFpmsd3M9oDiI.TiefgdJlIOY3ERTVJ6j6S8wTMWEwL7Glui', 'P'),
(178, 'par68167', '$2y$10$RYMkT4TnRyjIxNeuNmDRRuw57w7cOWJpTAWxyj5J7mGCXNTGMzVD6', 'P'),
(179, 'par26516', '$2y$10$HjANShnoaCc.G81FT97mGuaVtYVkaYNdYmuUBOB3bDCEugE.Y.S8K', 'P'),
(180, 'par27394', '$2y$10$jKr4DXaefrf49vQ5NHpi7udHmHFoU2R7XLmrd1iuEwxkApdVGXEUq', 'P'),
(181, 'par62632', '$2y$10$cHlvjSy73QfxOnxeh7Jsou8dn9DBrRtv.FELoAX2hfd/qqygi8Kh.', 'P'),
(182, 'par89226', '$2y$10$F.E74KWc4w.v3Hv7go..TOedjbWVwZm0dzqWAjLraxO/5H1OnynKO', 'P'),
(183, 'par42283', '$2y$10$JeTGkhuLKFwfKspK2RbMFOlcrE93wGabIncTu5vrY0r7nxvMh1Eou', 'P');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `address_school`
--
ALTER TABLE `address_school`
  ADD PRIMARY KEY (`Address_Id`,`School_Id`),
  ADD KEY `School_Id` (`School_Id`);

--
-- Indeksy dla tabeli `adress`
--
ALTER TABLE `adress`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ind_school` (`Id_School`);

--
-- Indeksy dla tabeli `nopesel`
--
ALTER TABLE `nopesel`
  ADD PRIMARY KEY (`Student_Id`);

--
-- Indeksy dla tabeli `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_User` (`Id_User`);

--
-- Indeksy dla tabeli `parent_student`
--
ALTER TABLE `parent_student`
  ADD PRIMARY KEY (`Student_Id`,`Parent_Id`),
  ADD KEY `parent_student_ibfk_2` (`Parent_Id`);

--
-- Indeksy dla tabeli `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Adress_Id` (`Adress_Id`),
  ADD KEY `Class_Id` (`Class_Id`),
  ADD KEY `School_Id` (`School_Id`),
  ADD KEY `Id_User` (`Id_User`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_User`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `adress`
--
ALTER TABLE `adress`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT dla tabeli `class`
--
ALTER TABLE `class`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `nopesel`
--
ALTER TABLE `nopesel`
  MODIFY `Student_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT dla tabeli `parent`
--
ALTER TABLE `parent`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT dla tabeli `school`
--
ALTER TABLE `school`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `student`
--
ALTER TABLE `student`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `address_school`
--
ALTER TABLE `address_school`
  ADD CONSTRAINT `address_school_ibfk_1` FOREIGN KEY (`Address_Id`) REFERENCES `adress` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `address_school_ibfk_2` FOREIGN KEY (`School_Id`) REFERENCES `school` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`Id_School`) REFERENCES `school` (`Id`);

--
-- Ograniczenia dla tabeli `nopesel`
--
ALTER TABLE `nopesel`
  ADD CONSTRAINT `school_ibfk_1` FOREIGN KEY (`Student_Id`) REFERENCES `student` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id_User`);

--
-- Ograniczenia dla tabeli `parent_student`
--
ALTER TABLE `parent_student`
  ADD CONSTRAINT `parent_student_ibfk_1` FOREIGN KEY (`Student_Id`) REFERENCES `student` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_student_ibfk_2` FOREIGN KEY (`Parent_Id`) REFERENCES `parent` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Adress_Id`) REFERENCES `adress` (`Id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`Class_Id`) REFERENCES `class` (`Id`),
  ADD CONSTRAINT `student_ibfk_4` FOREIGN KEY (`School_Id`) REFERENCES `school` (`Id`),
  ADD CONSTRAINT `student_ibfk_5` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id_User`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
