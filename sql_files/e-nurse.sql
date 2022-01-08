-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Sty 2022, 02:02
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
-- Baza danych: `e-nurse`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `choroby`
--

CREATE TABLE `choroby` (
  `id_choroby` int(11) NOT NULL,
  `choroba` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `choroby`
--

INSERT INTO `choroby` (`id_choroby`, `choroba`) VALUES
(1, 'Anemia'),
(2, 'Cukrzyca typu I'),
(3, 'Cukrzyca typu II'),
(4, 'Zaburzenia lękowe'),
(5, 'Astma'),
(6, 'Depresja'),
(7, 'Otyłość'),
(8, 'Alergia'),
(9, 'Częste bóle głowy'),
(10, 'Nowotwór złośliwy'),
(11, 'Reumatoidalne zapalenie stawów'),
(12, 'Zapalenie stawów i/lub kości'),
(13, 'Choroba wrzodowa żołądka lub d'),
(14, 'Wysokie ciśnienie krwi'),
(15, 'Przewlekłe choroby nerek'),
(16, 'Bóle szyi'),
(17, 'Choroby tarczycy'),
(18, 'Przewlekłe zapalenie oskrzeli');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dziennik`
--

CREATE TABLE `dziennik` (
  `Id_Wpisu` int(11) NOT NULL,
  `Data` datetime DEFAULT NULL,
  `Id_Ucznia` int(11) DEFAULT NULL,
  `Id_Klasy` int(11) DEFAULT NULL,
  `Id_Szkoly` int(11) DEFAULT NULL,
  `Opis_Zdarzenia` varchar(1000) COLLATE utf8_polish_ci DEFAULT NULL,
  `Co_Podano` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `Nurse_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `dziennik`
--

INSERT INTO `dziennik` (`Id_Wpisu`, `Data`, `Id_Ucznia`, `Id_Klasy`, `Id_Szkoly`, `Opis_Zdarzenia`, `Co_Podano`, `Nurse_Id`) VALUES
(1, '2021-11-16 13:17:31', 28, 4, 4, 'Uczeń skarżył się na ból brzucha. Zadzwoniono do opiekuna prawnego, który odebrał ucznia ze szkoły.', 'Paracetamolum, Herbata miętowa', 1),
(2, '2021-11-02 09:18:18', 62, 9, 4, 'Według uczennicy otarła kolano na zajęciach z wychowania fizycznego. Skarżyła się na pieczenie. Ranę opatrzono.', 'Paracetamolum, Opatrunek', 4),
(3, '2021-11-14 13:25:49', 78, 12, 5, 'Uczeń skarżył się na silną biegunkę. Uczeń został odebrany przez opiekuna prawnego. Zalecono obserwację stanu ucznia i w razie pogorszenia - kontakt z lekarzem rodzinnym lub szpital.', 'Carbo medicinalis', 3),
(4, '2021-11-23 08:31:45', NULL, 1, 4, 'Fluoryzacja. Każdy z uczniów w klasie był obecny.', 'ELMEX JUNIOR', 1),
(5, '2021-12-19 12:34:33', 68, 11, 5, 'Uczeń na przerwie upadł i uderzył się w łokieć. Skarżył się na bardzo mocny ból. Nie można było ucznia uspokoić. Była widoczna opuchlizna. Uczeń nie mógł normalnie ruszać ręką. Została wezwana karetka na miejsce. Podejrzenie zwichnięcia łokcia.', 'Paracetamolum, Opatrunek, Neospasmina', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kzu`
--

CREATE TABLE `kzu` (
  `Id_Karty` int(11) NOT NULL,
  `Id_Ucznia` int(11) DEFAULT NULL,
  `Niepelnosprawnosc` tinyint(1) DEFAULT NULL,
  `Nurse_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kzu`
--

INSERT INTO `kzu` (`Id_Karty`, `Id_Ucznia`, `Niepelnosprawnosc`, `Nurse_Id`) VALUES
(1, 2, 0, 1),
(2, 3, 0, 1),
(3, 4, 0, 4),
(4, 5, 0, 4),
(5, 6, 0, 1),
(6, 7, 0, 4),
(7, 8, 0, 4),
(8, 9, 0, 1),
(9, 10, 0, 1),
(10, 11, 0, 1),
(11, 12, 0, 4),
(12, 13, 0, 1),
(13, 14, 0, 4),
(14, 15, 0, 1),
(15, 16, 0, 4),
(16, 18, 0, 4),
(17, 19, 0, 4),
(18, 20, 0, 4),
(19, 21, 0, 1),
(20, 22, 0, 1),
(21, 23, 0, 1),
(22, 24, 0, 1),
(23, 25, 0, 4),
(24, 26, 0, 4),
(25, 27, 0, 4),
(26, 28, 0, 1),
(27, 29, 0, 4),
(28, 30, 0, 1),
(29, 31, 0, 4),
(30, 32, 0, 1),
(31, 33, 0, 4),
(32, 34, 0, 1),
(33, 35, 0, 1),
(34, 36, 0, 1),
(35, 37, 0, 4),
(36, 38, 0, 4),
(37, 39, 0, 1),
(38, 40, 0, 4),
(39, 41, 0, 1),
(40, 42, 0, 1),
(41, 43, 0, 4),
(42, 44, 0, 1),
(43, 45, 0, 1),
(44, 46, 0, 4),
(45, 47, 0, 1),
(46, 48, 0, 4),
(47, 49, 0, 1),
(48, 50, 0, 4),
(49, 51, 0, 1),
(50, 52, 0, 1),
(51, 53, 0, 4),
(52, 54, 0, 4),
(53, 55, 0, 4),
(54, 56, 0, 4),
(55, 57, 0, 1),
(56, 58, 0, 1),
(57, 59, 0, 1),
(58, 60, 0, 1),
(59, 61, 0, 4),
(60, 62, 0, 1),
(61, 63, 0, 4),
(62, 64, 0, 2),
(63, 65, 0, 2),
(64, 66, 0, 2),
(65, 67, 0, 2),
(66, 68, 0, 3),
(67, 69, 0, 2),
(68, 70, 0, 2),
(69, 71, 0, 3),
(70, 72, 0, 3),
(71, 73, 0, 3),
(72, 74, 0, 3),
(73, 75, 0, 2),
(74, 76, 0, 3),
(75, 77, 0, 3),
(76, 78, 0, 3),
(77, 79, 0, 3),
(78, 80, 0, 3),
(79, 81, 0, 3),
(80, 82, 0, 2),
(81, 83, 0, 3),
(82, 84, 0, 2),
(83, 85, 0, 2),
(84, 86, 0, 2),
(85, 87, 0, 2),
(86, 88, 0, 2),
(87, 89, 0, 3),
(88, 90, 0, 2),
(89, 91, 0, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kzu_choroby`
--

CREATE TABLE `kzu_choroby` (
  `Id_Karty` int(11) NOT NULL,
  `Id_Choroby` int(11) NOT NULL,
  `Rok_Zycia` int(11) DEFAULT NULL,
  `Rodzaj_Choroby` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kzu_choroby`
--

INSERT INTO `kzu_choroby` (`Id_Karty`, `Id_Choroby`, `Rok_Zycia`, `Rodzaj_Choroby`) VALUES
(7, 18, 5, NULL),
(9, 14, 6, NULL),
(14, 2, 4, NULL),
(15, 17, 5, NULL),
(21, 8, 7, 'Orzechy, Soja'),
(61, 8, 11, 'Pyłki kurzu, Pyłki leszczyny'),
(64, 8, 10, 'Sierść kota, Pyłki leszczyny');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kzu_cisnienie_tetnicze_krwi`
--

CREATE TABLE `kzu_cisnienie_tetnicze_krwi` (
  `Id_Karty` int(11) DEFAULT NULL,
  `Id_Badania` int(11) NOT NULL,
  `Data_Badania` datetime DEFAULT NULL,
  `Wynik` varchar(7) COLLATE utf8_polish_ci DEFAULT NULL,
  `Centyl` varchar(10) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kzu_cisnienie_tetnicze_krwi`
--

INSERT INTO `kzu_cisnienie_tetnicze_krwi` (`Id_Karty`, `Id_Badania`, `Data_Badania`, `Wynik`, `Centyl`) VALUES
(1, 1, '2022-01-10 10:12:04', '115/51', '95/72'),
(2, 2, '2022-01-10 10:12:04', '102/45', '67/1'),
(3, 3, '2022-01-10 10:12:04', '89/43', '10/3'),
(4, 4, '2022-01-10 10:12:04', '94/70', '14/99'),
(5, 5, '2022-01-10 10:12:04', '124/65', '95/95'),
(6, 6, '2022-01-10 10:12:04', '85/48', '5/43'),
(20, 7, '2022-01-10 10:12:04', '92/77', '5/95'),
(21, 8, '2022-01-10 10:12:04', '92/54', '5/67'),
(22, 9, '2022-01-10 10:12:04', '93/70', '10/97'),
(23, 10, '2022-01-10 10:12:04', '102/59', '26/87'),
(24, 11, '2022-01-10 10:12:04', '116/53', '86/54'),
(25, 12, '2022-01-10 10:12:04', '85/72', '5/98'),
(26, 13, '2022-01-10 10:12:04', '93/72', '10/99'),
(34, 14, '2022-01-10 10:12:04', '93/62', '8/92'),
(35, 15, '2022-01-10 10:12:04', '122/76', '92/98'),
(36, 16, '2022-01-10 10:12:04', '109/49', '73/1'),
(37, 17, '2022-01-10 10:12:04', '99/78', '18/99'),
(38, 18, '2022-01-10 10:12:04', '108/57', '62/86'),
(39, 19, '2022-01-10 10:12:04', '126/68', '96/96'),
(40, 20, '2022-01-10 10:12:04', '111/56', '55/55'),
(48, 21, '2022-01-10 10:12:04', '94/67', '1/93'),
(49, 22, '2022-01-10 10:12:04', '119/59', '80/89'),
(50, 23, '2022-01-10 10:12:04', '97/52', '5/32'),
(51, 24, '2022-01-10 10:12:04', '118/62', '81/88'),
(52, 25, '2022-01-10 10:12:04', '119/54', '80/59'),
(53, 26, '2022-01-10 10:12:04', '101/55', '24/57'),
(54, 27, '2022-01-10 10:12:04', '124/49', '95/3'),
(62, 28, '2022-01-10 10:12:04', '127/73', '83/98'),
(63, 29, '2022-01-10 10:12:04', '103/58', '10/63'),
(64, 30, '2022-01-10 10:12:04', '102/64', '10/86'),
(65, 31, '2022-01-10 10:12:04', '102/60', '8/79'),
(66, 32, '2022-01-10 10:12:04', '143/49', '95/3'),
(67, 33, '2022-01-10 10:12:04', '123/61', '59/82'),
(68, 34, '2022-01-10 10:12:04', '117/63', '30/84'),
(83, 35, '2022-01-10 10:12:04', '129/75', '89/95'),
(84, 36, '2022-01-10 10:12:04', '139/75', '92/98'),
(85, 37, '2022-01-10 10:12:04', '122/64', '53/83'),
(86, 38, '2022-01-10 10:12:04', '124/83', '69/98'),
(87, 39, '2022-01-10 10:12:04', '108/69', '14/90'),
(88, 40, '2022-01-10 10:12:04', '140/84', '94/98'),
(89, 41, '2022-01-10 10:12:04', '122/81', '58/98');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kzu_inne`
--

CREATE TABLE `kzu_inne` (
  `Id_Karty` int(11) DEFAULT NULL,
  `Id_Badania` int(11) NOT NULL,
  `Data` datetime DEFAULT NULL,
  `Typ_Badania` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `Opis` varchar(400) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kzu_kwalifikacja_wf`
--

CREATE TABLE `kzu_kwalifikacja_wf` (
  `Id_Karty` int(11) DEFAULT NULL,
  `Id_Kwalifikacji` int(11) NOT NULL,
  `Data` datetime DEFAULT NULL,
  `Grupa` varchar(2) COLLATE utf8_polish_ci DEFAULT NULL,
  `Zalecenia` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kzu_problemy`
--

CREATE TABLE `kzu_problemy` (
  `Id_Karty` int(11) DEFAULT NULL,
  `Id_Problemu` int(11) NOT NULL,
  `Data` datetime DEFAULT NULL,
  `Rodzaj_Problemu` varchar(1000) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kzu_skierowania`
--

CREATE TABLE `kzu_skierowania` (
  `Id_Karty` int(11) DEFAULT NULL,
  `Id_Skierowania` int(11) NOT NULL,
  `Data` datetime DEFAULT NULL,
  `Id_Lekarz` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kzu_sluch`
--

CREATE TABLE `kzu_sluch` (
  `Id_Karty` int(11) DEFAULT NULL,
  `Id_Badania` int(11) NOT NULL,
  `Data_Badania` datetime DEFAULT NULL,
  `Ucho_Prawe` float DEFAULT NULL,
  `Ucho_Lewe` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kzu_testy_do_wykrycia`
--

CREATE TABLE `kzu_testy_do_wykrycia` (
  `Id_Karty` int(11) DEFAULT NULL,
  `Id_Badania` int(11) NOT NULL,
  `Skolioza` tinyint(1) DEFAULT NULL,
  `Klifoza_Piersiowa` tinyint(1) DEFAULT NULL,
  `Koslawosc_Kolan` tinyint(1) DEFAULT NULL,
  `Stopy_Plaskokoslawe` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kzu_testy_przesiewowe`
--

CREATE TABLE `kzu_testy_przesiewowe` (
  `Id_Karty` int(11) DEFAULT NULL,
  `Id_Badania` int(11) NOT NULL,
  `Data` datetime DEFAULT NULL,
  `Wiek` int(11) DEFAULT NULL,
  `Wysokosc_Ciala_Cm` float DEFAULT NULL,
  `Wysokosc_Ciala_Centyl` varchar(10) COLLATE utf8_polish_ci DEFAULT NULL,
  `Masa_Ciala_Kg` float DEFAULT NULL,
  `Masa_Ciala_Centyl` varchar(10) COLLATE utf8_polish_ci DEFAULT NULL,
  `Masa_Ciala_Bmi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kzu_wywiady_srodowiskowe`
--

CREATE TABLE `kzu_wywiady_srodowiskowe` (
  `Id_Karty` int(11) DEFAULT NULL,
  `Id_Wywiadu` int(11) NOT NULL,
  `Data` datetime DEFAULT NULL,
  `Wnioski` varchar(1000) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kzu_wzrok`
--

CREATE TABLE `kzu_wzrok` (
  `Id_Karty` int(11) DEFAULT NULL,
  `Id_Badania` int(11) NOT NULL,
  `Data` datetime DEFAULT NULL,
  `Zez_Widoczny` tinyint(1) DEFAULT NULL,
  `Zez_Cover_Test` varchar(1) COLLATE utf8_polish_ci DEFAULT NULL,
  `Zez_Odbicie_Swiatla_Na_Rogowkach` varchar(1) COLLATE utf8_polish_ci DEFAULT NULL,
  `Widzenie_Barw` varchar(1) COLLATE utf8_polish_ci DEFAULT NULL,
  `Oko_Prawe` varchar(10) COLLATE utf8_polish_ci DEFAULT NULL,
  `Oko_Lewe` varchar(10) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lekarz`
--

CREATE TABLE `lekarz` (
  `Id_Lekarz` int(11) NOT NULL,
  `Profesja` varchar(200) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `lekarz`
--

INSERT INTO `lekarz` (`Id_Lekarz`, `Profesja`) VALUES
(1, 'pediatra'),
(2, 'kardiolog'),
(3, 'chirurg dziecięcy'),
(4, 'laryngolog'),
(5, 'neurolog'),
(6, 'anestezjolog');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nurse`
--

CREATE TABLE `nurse` (
  `Id` int(11) NOT NULL,
  `Imie` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `Login` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `Haslo` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `Numer_telefonu` varchar(9) COLLATE utf8_polish_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Licencja` varchar(10) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `nurse`
--

INSERT INTO `nurse` (`Id`, `Imie`, `Nazwisko`, `Login`, `Haslo`, `Numer_telefonu`, `Email`, `Licencja`) VALUES
(1, 'Adam', 'Wołoszek', 'awoloszek', '$2y$10$pKGyVI8che/JdXx32Rit6OJBvvvtmjWXOqvdYjxm3sOo9qi39RivK', '653582373', 'awoloszek@enurse.pl', '2398840P'),
(2, 'Katarzyna', 'Mazur', 'kmazur', '$2y$10$3cfTK8eAPJ/0X4/Achh.zeg4cC8EirObO3uRsGRMo0tEfeFoQjZ6G', '536950803', 'kmazur@enurse.pl', '7489671P'),
(3, 'Gustaw', 'Towarek', 'gtowarek', '$2y$10$82L1Jqwejx31dB3j9znP7ebbcVHLiQ3tSgjXwMh05goZuj55IoeKa', '229664314', 'gtowarek@enurse.pl', '6396456P'),
(4, 'Lena', 'Dąbrowska', 'ldabrowska', '$2y$10$xQRYxpMSYbJYCw7yJCrbqulg1qzFZBrbawkPVxsM/uuuKW6NvziCi', '120251702', 'ldabrowska@enurse.pl', '7914340P');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nurse_school`
--

CREATE TABLE `nurse_school` (
  `School_Id` int(11) NOT NULL,
  `Nurse_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `nurse_school`
--

INSERT INTO `nurse_school` (`School_Id`, `Nurse_Id`) VALUES
(4, 1),
(4, 4),
(5, 2),
(5, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `testy_przesiewowe`
--

CREATE TABLE `testy_przesiewowe` (
  `Id_Przesiewu` int(11) NOT NULL,
  `Klasa_Przesiewowa` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `Rodzaj_Przesiewu` varchar(400) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `testy_przesiewowe`
--

INSERT INTO `testy_przesiewowe` (`Id_Przesiewu`, `Klasa_Przesiewowa`, `Rodzaj_Przesiewu`) VALUES
(1, 'Szkoła podstawowa, Kl. 0', 'Pomiar wysokości'),
(2, 'Szkoła podstawowa, Kl. 0', 'Pomiar masy ciała'),
(3, 'Szkoła podstawowa, Kl. 0', 'Cover test'),
(4, 'Szkoła podstawowa, Kl. 0', 'Test Hirschberga(w kierunku zeza)'),
(5, 'Szkoła podstawowa, Kl. 0', 'Badanie ostrości wzroku'),
(6, 'Szkoła podstawowa, Kl. 0', 'Badanie słuchu'),
(7, 'Szkoła podstawowa, Kl. 0', 'Wykrywanie bocznego skrzywienia kręgosłupa'),
(8, 'Szkoła podstawowa, Kl. 0', 'Wykrywanie płasko-koślawych stóp'),
(9, 'Szkoła podstawowa, Kl. 0', 'Wykrywanie koślawości kolan'),
(10, 'Szkoła podstawowa, Kl. 0', 'Orientacyjne wykrywanie wady wymowy'),
(11, 'Szkoła podstawowa, Kl. 0', 'Orientacyjne wykrywanie zaburzeń statyki ciała'),
(12, 'Szkoła podstawowa, Kl. 0', 'Pomiar RR'),
(13, 'Szkoła podstawowa, Kl. 3', 'Pomiar wysokości'),
(14, 'Szkoła podstawowa, Kl. 3', 'Pomiar masy ciała'),
(15, 'Szkoła podstawowa, Kl. 3', 'Badanie ostrości wzroku'),
(16, 'Szkoła podstawowa, Kl. 3', 'Wykrywanie zaburzeń widzenia barwnego'),
(17, 'Szkoła podstawowa, Kl. 3', 'Wykrywanie bocznego skrzywienia kręgosłupa'),
(18, 'Szkoła podstawowa, Kl. 5', 'Pomiar wysokości'),
(19, 'Szkoła podstawowa, Kl. 5', 'Pomiar masy ciała'),
(20, 'Szkoła podstawowa, Kl. 5', 'Badanie ostrości wzroku'),
(21, 'Szkoła podstawowa, Kl. 5', 'Wykrywanie zaburzeń widzenia barwnego'),
(22, 'Szkoła podstawowa, Kl. 5', 'Wykrywanie bocznego skrzywienia kręgosłupa'),
(23, 'Szkoła podstawowa, Kl. 7', 'Pomiar wysokości'),
(24, 'Szkoła podstawowa, Kl. 7', 'Pomiar masy ciała'),
(25, 'Szkoła podstawowa, Kl. 7', 'Badanie ostrości wzroku'),
(26, 'Szkoła podstawowa, Kl. 7', 'Badanie słuchu'),
(27, 'Szkoła podstawowa, Kl. 7', 'Wykrywanie bocznego skrzywienia kręgosłupa'),
(28, 'Szkoła podstawowa, Kl. 7', 'Wykrywanie nadmiernej kifozy'),
(29, 'Szkoła podstawowa, Kl. 7', 'Pomiar RR'),
(30, 'Szkoła Ponadpodstawowa, Kl. 1', 'Pomiar wysokości'),
(31, 'Szkoła Ponadpodstawowa, Kl. 1', 'Pomiar masy ciała'),
(32, 'Szkoła Ponadpodstawowa, Kl. 1', 'Badanie ostrości wzroku'),
(33, 'Szkoła Ponadpodstawowa, Kl. 1', 'Wykrywanie bocznego skrzywienia kręgosłupa'),
(34, 'Szkoła Ponadpodstawowa, Kl. 1', 'Wykrywanie nadmiernej kifozy'),
(35, 'Szkoła Ponadpodstawowa, Kl. 1', 'Pomiar RR'),
(36, 'Szkoła Ponadpodstawowa, Kl. ostatnia', 'Pomiar wysokości'),
(37, 'Szkoła Ponadpodstawowa, Kl. ostatnia', 'Pomiar masy ciała'),
(38, 'Szkoła Ponadpodstawowa, Kl. ostatnia', 'Badanie ostrości wzroku'),
(39, 'Szkoła Ponadpodstawowa, Kl. ostatnia', 'Pomiar RR');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczen_help`
--

CREATE TABLE `uczen_help` (
  `Id_Ucznia` int(11) NOT NULL,
  `Data` datetime NOT NULL,
  `Zgoda_Na_Swiadczenia_Pielegniarki` tinyint(1) NOT NULL,
  `Zgoda_Na_Info_Kadry_O_Zdrowiu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uczen_help`
--

INSERT INTO `uczen_help` (`Id_Ucznia`, `Data`, `Zgoda_Na_Swiadczenia_Pielegniarki`, `Zgoda_Na_Info_Kadry_O_Zdrowiu`) VALUES
(1, '2021-09-07 10:17:18', 0, 0),
(2, '2021-09-07 10:17:18', 1, 1),
(3, '2021-09-07 10:17:18', 1, 1),
(4, '2021-09-07 10:17:18', 1, 1),
(5, '2021-09-07 10:17:18', 1, 1),
(6, '2021-09-07 10:17:18', 1, 1),
(7, '2021-09-07 10:17:18', 1, 1),
(8, '2021-09-07 10:17:18', 1, 1),
(9, '2021-09-07 10:17:18', 1, 1),
(10, '2021-09-07 10:17:18', 1, 1),
(11, '2021-09-07 10:17:18', 1, 1),
(12, '2021-09-07 10:17:18', 1, 1),
(13, '2021-09-07 10:17:18', 1, 1),
(14, '2021-09-07 10:17:18', 1, 1),
(15, '2021-09-07 10:17:18', 1, 1),
(16, '2021-09-07 10:17:18', 1, 1),
(17, '2021-09-07 10:17:18', 0, 1),
(18, '2021-09-07 10:17:18', 1, 1),
(19, '2021-09-07 10:17:18', 1, 1),
(20, '2021-09-07 10:17:18', 1, 1),
(21, '2021-09-07 10:17:18', 1, 1),
(22, '2021-09-07 10:17:18', 1, 1),
(23, '2021-09-07 10:17:18', 1, 1),
(24, '2021-09-07 10:17:18', 1, 1),
(25, '2021-09-07 10:17:18', 1, 1),
(26, '2021-09-07 10:17:18', 1, 1),
(27, '2021-09-07 10:17:18', 1, 1),
(28, '2021-09-07 10:17:18', 1, 1),
(29, '2021-09-07 10:17:18', 1, 1),
(30, '2021-09-07 10:17:18', 1, 1),
(31, '2021-09-07 10:17:18', 1, 1),
(32, '2021-09-07 10:17:18', 1, 1),
(33, '2021-09-07 10:17:18', 1, 1),
(34, '2021-09-07 10:17:18', 1, 1),
(35, '2021-09-07 10:17:18', 1, 1),
(36, '2021-09-07 10:17:18', 1, 1),
(37, '2021-09-07 10:17:18', 1, 1),
(38, '2021-09-07 10:17:18', 1, 1),
(39, '2021-09-07 10:17:18', 1, 1),
(40, '2021-09-07 10:17:18', 1, 1),
(41, '2021-09-07 10:17:18', 1, 1),
(42, '2021-09-07 10:17:18', 1, 1),
(43, '2021-09-07 10:17:18', 1, 1),
(44, '2021-09-07 10:17:18', 1, 1),
(45, '2021-09-07 10:17:18', 1, 1),
(46, '2021-09-07 10:17:18', 1, 1),
(47, '2021-09-07 10:17:18', 1, 1),
(48, '2021-09-07 10:17:18', 1, 1),
(49, '2021-09-07 10:17:18', 1, 1),
(50, '2021-09-07 10:17:18', 1, 1),
(51, '2021-09-07 10:17:18', 1, 1),
(52, '2021-09-07 10:17:18', 1, 1),
(53, '2021-09-07 10:17:18', 1, 1),
(54, '2021-09-07 10:17:18', 1, 1),
(55, '2021-09-07 10:17:18', 1, 1),
(56, '2021-09-07 10:17:18', 1, 1),
(57, '2021-09-07 10:17:18', 1, 1),
(58, '2021-09-07 10:17:18', 1, 1),
(59, '2021-09-07 10:17:18', 1, 1),
(60, '2021-09-07 10:17:18', 1, 1),
(61, '2021-09-07 10:17:18', 1, 1),
(62, '2021-09-07 10:17:18', 1, 1),
(63, '2021-09-07 10:17:18', 1, 1),
(64, '2021-09-08 11:18:34', 1, 1),
(65, '2021-09-08 11:18:34', 1, 1),
(66, '2021-09-08 11:18:34', 1, 1),
(67, '2021-09-08 11:18:34', 1, 1),
(68, '2021-09-08 11:18:34', 1, 1),
(69, '2021-09-08 11:18:34', 1, 1),
(70, '2021-09-08 11:18:34', 1, 1),
(71, '2021-09-08 11:18:34', 1, 1),
(72, '2021-09-08 11:18:34', 1, 1),
(73, '2021-09-08 11:18:34', 1, 1),
(74, '2021-09-08 11:18:34', 1, 1),
(75, '2021-09-08 11:18:34', 1, 1),
(76, '2021-09-08 11:18:34', 1, 1),
(77, '2021-09-08 11:18:34', 1, 1),
(78, '2021-09-08 11:18:34', 1, 1),
(79, '2021-09-08 11:18:34', 1, 1),
(80, '2021-09-08 11:18:34', 1, 1),
(81, '2021-09-08 11:18:34', 1, 1),
(82, '2021-09-08 11:18:34', 1, 1),
(83, '2021-09-08 11:18:34', 1, 1),
(84, '2021-09-08 11:18:34', 1, 1),
(85, '2021-09-08 11:18:34', 1, 1),
(86, '2021-09-08 11:18:34', 1, 1),
(87, '2021-09-08 11:18:34', 1, 1),
(88, '2021-09-08 11:18:34', 1, 1),
(89, '2021-09-08 11:18:34', 1, 1),
(90, '2021-09-08 11:18:34', 1, 1),
(91, '2021-09-08 11:18:34', 1, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `choroby`
--
ALTER TABLE `choroby`
  ADD PRIMARY KEY (`id_choroby`);

--
-- Indeksy dla tabeli `dziennik`
--
ALTER TABLE `dziennik`
  ADD PRIMARY KEY (`Id_Wpisu`),
  ADD KEY `nurse_index` (`Nurse_Id`),
  ADD KEY `Id_Ucznia` (`Id_Ucznia`),
  ADD KEY `Id_Klasy` (`Id_Klasy`),
  ADD KEY `Id_Szkoly` (`Id_Szkoly`);

--
-- Indeksy dla tabeli `kzu`
--
ALTER TABLE `kzu`
  ADD PRIMARY KEY (`Id_Karty`),
  ADD KEY `ind_kzunurse` (`Nurse_Id`),
  ADD KEY `Id_Ucznia` (`Id_Ucznia`);

--
-- Indeksy dla tabeli `kzu_choroby`
--
ALTER TABLE `kzu_choroby`
  ADD PRIMARY KEY (`Id_Karty`,`Id_Choroby`) USING BTREE,
  ADD KEY `kzu_choroby_ibfk_2` (`Id_Choroby`);

--
-- Indeksy dla tabeli `kzu_cisnienie_tetnicze_krwi`
--
ALTER TABLE `kzu_cisnienie_tetnicze_krwi`
  ADD PRIMARY KEY (`Id_Badania`),
  ADD KEY `Id_Karty` (`Id_Karty`);

--
-- Indeksy dla tabeli `kzu_inne`
--
ALTER TABLE `kzu_inne`
  ADD PRIMARY KEY (`Id_Badania`),
  ADD KEY `Id_Karty` (`Id_Karty`);

--
-- Indeksy dla tabeli `kzu_kwalifikacja_wf`
--
ALTER TABLE `kzu_kwalifikacja_wf`
  ADD PRIMARY KEY (`Id_Kwalifikacji`),
  ADD KEY `Id_Karty` (`Id_Karty`);

--
-- Indeksy dla tabeli `kzu_problemy`
--
ALTER TABLE `kzu_problemy`
  ADD PRIMARY KEY (`Id_Problemu`),
  ADD KEY `Id_Karty` (`Id_Karty`);

--
-- Indeksy dla tabeli `kzu_skierowania`
--
ALTER TABLE `kzu_skierowania`
  ADD PRIMARY KEY (`Id_Skierowania`),
  ADD KEY `Id_Karty` (`Id_Karty`),
  ADD KEY `Id_Lekarz` (`Id_Lekarz`);

--
-- Indeksy dla tabeli `kzu_sluch`
--
ALTER TABLE `kzu_sluch`
  ADD PRIMARY KEY (`Id_Badania`),
  ADD KEY `Id_Karty` (`Id_Karty`);

--
-- Indeksy dla tabeli `kzu_testy_do_wykrycia`
--
ALTER TABLE `kzu_testy_do_wykrycia`
  ADD PRIMARY KEY (`Id_Badania`),
  ADD KEY `Id_Karty` (`Id_Karty`);

--
-- Indeksy dla tabeli `kzu_testy_przesiewowe`
--
ALTER TABLE `kzu_testy_przesiewowe`
  ADD PRIMARY KEY (`Id_Badania`),
  ADD KEY `Id_Karty` (`Id_Karty`);

--
-- Indeksy dla tabeli `kzu_wywiady_srodowiskowe`
--
ALTER TABLE `kzu_wywiady_srodowiskowe`
  ADD PRIMARY KEY (`Id_Wywiadu`),
  ADD KEY `Id_Karty` (`Id_Karty`);

--
-- Indeksy dla tabeli `kzu_wzrok`
--
ALTER TABLE `kzu_wzrok`
  ADD PRIMARY KEY (`Id_Badania`),
  ADD KEY `Id_Karty` (`Id_Karty`);

--
-- Indeksy dla tabeli `lekarz`
--
ALTER TABLE `lekarz`
  ADD PRIMARY KEY (`Id_Lekarz`);

--
-- Indeksy dla tabeli `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `nurse_school`
--
ALTER TABLE `nurse_school`
  ADD PRIMARY KEY (`School_Id`,`Nurse_Id`),
  ADD KEY `Nurse_Id` (`Nurse_Id`);

--
-- Indeksy dla tabeli `testy_przesiewowe`
--
ALTER TABLE `testy_przesiewowe`
  ADD PRIMARY KEY (`Id_Przesiewu`);

--
-- Indeksy dla tabeli `uczen_help`
--
ALTER TABLE `uczen_help`
  ADD PRIMARY KEY (`Id_Ucznia`,`Data`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `choroby`
--
ALTER TABLE `choroby`
  MODIFY `id_choroby` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT dla tabeli `dziennik`
--
ALTER TABLE `dziennik`
  MODIFY `Id_Wpisu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `kzu`
--
ALTER TABLE `kzu`
  MODIFY `Id_Karty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT dla tabeli `kzu_cisnienie_tetnicze_krwi`
--
ALTER TABLE `kzu_cisnienie_tetnicze_krwi`
  MODIFY `Id_Badania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT dla tabeli `kzu_inne`
--
ALTER TABLE `kzu_inne`
  MODIFY `Id_Badania` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `kzu_kwalifikacja_wf`
--
ALTER TABLE `kzu_kwalifikacja_wf`
  MODIFY `Id_Kwalifikacji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `kzu_problemy`
--
ALTER TABLE `kzu_problemy`
  MODIFY `Id_Problemu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `kzu_skierowania`
--
ALTER TABLE `kzu_skierowania`
  MODIFY `Id_Skierowania` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `kzu_sluch`
--
ALTER TABLE `kzu_sluch`
  MODIFY `Id_Badania` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `kzu_testy_do_wykrycia`
--
ALTER TABLE `kzu_testy_do_wykrycia`
  MODIFY `Id_Badania` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `kzu_testy_przesiewowe`
--
ALTER TABLE `kzu_testy_przesiewowe`
  MODIFY `Id_Badania` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `kzu_wywiady_srodowiskowe`
--
ALTER TABLE `kzu_wywiady_srodowiskowe`
  MODIFY `Id_Wywiadu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `kzu_wzrok`
--
ALTER TABLE `kzu_wzrok`
  MODIFY `Id_Badania` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `lekarz`
--
ALTER TABLE `lekarz`
  MODIFY `Id_Lekarz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `nurse`
--
ALTER TABLE `nurse`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `testy_przesiewowe`
--
ALTER TABLE `testy_przesiewowe`
  MODIFY `Id_Przesiewu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `dziennik`
--
ALTER TABLE `dziennik`
  ADD CONSTRAINT `dziennik_ibfk_1` FOREIGN KEY (`Nurse_Id`) REFERENCES `nurse` (`Id`),
  ADD CONSTRAINT `dziennik_ibfk_2` FOREIGN KEY (`Id_Klasy`) REFERENCES `e-dziennik`.`class` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `dziennik_ibfk_3` FOREIGN KEY (`Id_Ucznia`) REFERENCES `e-dziennik`.`student` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `dziennik_ibfk_4` FOREIGN KEY (`Id_Szkoly`) REFERENCES `e-dziennik`.`school` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `kzu`
--
ALTER TABLE `kzu`
  ADD CONSTRAINT `kzu_ibfk_1` FOREIGN KEY (`Nurse_Id`) REFERENCES `nurse` (`Id`),
  ADD CONSTRAINT `kzu_ibfk_2` FOREIGN KEY (`Id_Ucznia`) REFERENCES `e-dziennik`.`student` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `kzu_choroby`
--
ALTER TABLE `kzu_choroby`
  ADD CONSTRAINT `kzu_choroby_ibfk_1` FOREIGN KEY (`Id_Karty`) REFERENCES `kzu` (`Id_Karty`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kzu_choroby_ibfk_2` FOREIGN KEY (`Id_Choroby`) REFERENCES `choroby` (`id_choroby`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `kzu_cisnienie_tetnicze_krwi`
--
ALTER TABLE `kzu_cisnienie_tetnicze_krwi`
  ADD CONSTRAINT `kzu_cisnienie_tetnicze_krwi_ibfk_1` FOREIGN KEY (`Id_Karty`) REFERENCES `kzu` (`Id_Karty`);

--
-- Ograniczenia dla tabeli `kzu_inne`
--
ALTER TABLE `kzu_inne`
  ADD CONSTRAINT `kzu_inne_ibfk_1` FOREIGN KEY (`Id_Karty`) REFERENCES `kzu` (`Id_Karty`);

--
-- Ograniczenia dla tabeli `kzu_kwalifikacja_wf`
--
ALTER TABLE `kzu_kwalifikacja_wf`
  ADD CONSTRAINT `kzu_kwalifikacja_wf_ibfk_1` FOREIGN KEY (`Id_Karty`) REFERENCES `kzu` (`Id_Karty`);

--
-- Ograniczenia dla tabeli `kzu_problemy`
--
ALTER TABLE `kzu_problemy`
  ADD CONSTRAINT `kzu_problemy_ibfk_1` FOREIGN KEY (`Id_Karty`) REFERENCES `kzu` (`Id_Karty`);

--
-- Ograniczenia dla tabeli `kzu_skierowania`
--
ALTER TABLE `kzu_skierowania`
  ADD CONSTRAINT `kzu_skierowania_ibfk_1` FOREIGN KEY (`Id_Karty`) REFERENCES `kzu` (`Id_Karty`),
  ADD CONSTRAINT `kzu_skierowania_ibfk_2` FOREIGN KEY (`Id_Lekarz`) REFERENCES `lekarz` (`Id_Lekarz`);

--
-- Ograniczenia dla tabeli `kzu_sluch`
--
ALTER TABLE `kzu_sluch`
  ADD CONSTRAINT `kzu_sluch_ibfk_1` FOREIGN KEY (`Id_Karty`) REFERENCES `kzu` (`Id_Karty`);

--
-- Ograniczenia dla tabeli `kzu_testy_do_wykrycia`
--
ALTER TABLE `kzu_testy_do_wykrycia`
  ADD CONSTRAINT `kzu_testy_do_wykrycia_ibfk_1` FOREIGN KEY (`Id_Karty`) REFERENCES `kzu` (`Id_Karty`);

--
-- Ograniczenia dla tabeli `kzu_testy_przesiewowe`
--
ALTER TABLE `kzu_testy_przesiewowe`
  ADD CONSTRAINT `kzu_testy_przesiewowe_ibfk_1` FOREIGN KEY (`Id_Karty`) REFERENCES `kzu` (`Id_Karty`);

--
-- Ograniczenia dla tabeli `kzu_wywiady_srodowiskowe`
--
ALTER TABLE `kzu_wywiady_srodowiskowe`
  ADD CONSTRAINT `kzu_wywiady_srodowiskowe_ibfk_1` FOREIGN KEY (`Id_Karty`) REFERENCES `kzu` (`Id_Karty`);

--
-- Ograniczenia dla tabeli `kzu_wzrok`
--
ALTER TABLE `kzu_wzrok`
  ADD CONSTRAINT `kzu_wzrok_ibfk_1` FOREIGN KEY (`Id_Karty`) REFERENCES `kzu` (`Id_Karty`);

--
-- Ograniczenia dla tabeli `nurse_school`
--
ALTER TABLE `nurse_school`
  ADD CONSTRAINT `nurse_school_ibfk_1` FOREIGN KEY (`Nurse_Id`) REFERENCES `nurse` (`Id`),
  ADD CONSTRAINT `nurse_school_ibfk_2` FOREIGN KEY (`School_Id`) REFERENCES `e-dziennik`.`school` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `uczen_help`
--
ALTER TABLE `uczen_help`
  ADD CONSTRAINT `uczen_help_ibfk_1` FOREIGN KEY (`Id_Ucznia`) REFERENCES `e-dziennik`.`student` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
