-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Sty 2022, 19:55
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
-- Struktura tabeli dla tabeli `dziennik`
--

CREATE TABLE `dziennik` (
  `Id_Wpisu` int(11) NOT NULL,
  `Data` datetime DEFAULT NULL,
  `Id_Ucznia` int(11) DEFAULT NULL,
  `Id_Klasy` int(11) DEFAULT NULL,
  `Imie_U` varchar(25) COLLATE utf8_polish_ci DEFAULT NULL,
  `Nazwisko_U` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
  `Opis_Zdarzenia` varchar(1000) COLLATE utf8_polish_ci DEFAULT NULL,
  `Co_Podano` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `Nurse_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kzu_choroby`
--

CREATE TABLE `kzu_choroby` (
  `Id_Karty` int(11) DEFAULT NULL,
  `Id_Choroby` int(11) NOT NULL,
  `Rok_Zycia` datetime DEFAULT NULL,
  `Rodzaj_Choroby` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

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
(1, 1),
(1, 4),
(2, 2),
(2, 3);

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
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dziennik`
--
ALTER TABLE `dziennik`
  ADD PRIMARY KEY (`Id_Wpisu`),
  ADD KEY `nurse_index` (`Nurse_Id`);

--
-- Indeksy dla tabeli `kzu`
--
ALTER TABLE `kzu`
  ADD PRIMARY KEY (`Id_Karty`),
  ADD KEY `ind_kzunurse` (`Nurse_Id`);

--
-- Indeksy dla tabeli `kzu_choroby`
--
ALTER TABLE `kzu_choroby`
  ADD PRIMARY KEY (`Id_Choroby`),
  ADD KEY `Id_Karty` (`Id_Karty`);

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
-- AUTO_INCREMENT dla tabeli `dziennik`
--
ALTER TABLE `dziennik`
  MODIFY `Id_Wpisu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `kzu`
--
ALTER TABLE `kzu`
  MODIFY `Id_Karty` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `kzu_choroby`
--
ALTER TABLE `kzu_choroby`
  MODIFY `Id_Choroby` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `kzu_cisnienie_tetnicze_krwi`
--
ALTER TABLE `kzu_cisnienie_tetnicze_krwi`
  MODIFY `Id_Badania` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `dziennik_ibfk_1` FOREIGN KEY (`Nurse_Id`) REFERENCES `nurse` (`Id`);

--
-- Ograniczenia dla tabeli `kzu`
--
ALTER TABLE `kzu`
  ADD CONSTRAINT `kzu_ibfk_1` FOREIGN KEY (`Nurse_Id`) REFERENCES `nurse` (`Id`);

--
-- Ograniczenia dla tabeli `kzu_choroby`
--
ALTER TABLE `kzu_choroby`
  ADD CONSTRAINT `kzu_choroby_ibfk_1` FOREIGN KEY (`Id_Karty`) REFERENCES `kzu` (`Id_Karty`);

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
  ADD CONSTRAINT `nurse_school_ibfk_1` FOREIGN KEY (`Nurse_Id`) REFERENCES `nurse` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
