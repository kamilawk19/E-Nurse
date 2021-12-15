-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Gru 2021, 16:32
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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `class`
--

CREATE TABLE `class` (
  `Id` int(11) NOT NULL,
  `Class` varchar(60) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nopesel`
--

CREATE TABLE `nopesel` (
  `Student_Id` int(11) NOT NULL,
  `Document_Name` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Document_Number` varchar(25) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `parent`
--

CREATE TABLE `parent` (
  `Id` int(11) NOT NULL,
  `Id_User` int(11) NOT NULL,
  `Adress_Id` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `parent_student`
--

CREATE TABLE `parent_student` (
  `Student_Id` int(11) NOT NULL,
  `Parent_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `school`
--

CREATE TABLE `school` (
  `Id` int(11) NOT NULL,
  `Adress_Id` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `Id_User` int(11) NOT NULL,
  `Login` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `Password` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `UserType` varchar(1) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `adress`
--
ALTER TABLE `adress`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`Id`);

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
  ADD KEY `Parent_Id` (`Parent_Id`);

--
-- Indeksy dla tabeli `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Adress_Id` (`Adress_Id`);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `class`
--
ALTER TABLE `class`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `nopesel`
--
ALTER TABLE `nopesel`
  MODIFY `Student_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `parent`
--
ALTER TABLE `parent`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `school`
--
ALTER TABLE `school`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `student`
--
ALTER TABLE `student`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `adress`
--
ALTER TABLE `adress`
  ADD CONSTRAINT `adress_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `school` (`Adress_Id`);

--
-- Ograniczenia dla tabeli `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id_User`);

--
-- Ograniczenia dla tabeli `parent_student`
--
ALTER TABLE `parent_student`
  ADD CONSTRAINT `parent_student_ibfk_1` FOREIGN KEY (`Student_Id`) REFERENCES `student` (`Id`),
  ADD CONSTRAINT `parent_student_ibfk_2` FOREIGN KEY (`Parent_Id`) REFERENCES `parent` (`Id`);

--
-- Ograniczenia dla tabeli `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Adress_Id`) REFERENCES `adress` (`Id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`Class_Id`) REFERENCES `class` (`Id`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`Id`) REFERENCES `nopesel` (`Student_Id`),
  ADD CONSTRAINT `student_ibfk_4` FOREIGN KEY (`School_Id`) REFERENCES `school` (`Id`),
  ADD CONSTRAINT `student_ibfk_5` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id_User`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
