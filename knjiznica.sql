-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2022 at 03:13 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knjiznica`
--

-- --------------------------------------------------------

--
-- Table structure for table `autori`
--

CREATE TABLE `autori` (
  `ID_autor` int(11) NOT NULL,
  `ime` varchar(55) NOT NULL,
  `prezime` varchar(55) NOT NULL,
  `ostali_autori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `autori`
--

INSERT INTO `autori` (`ID_autor`, `ime`, `prezime`, `ostali_autori`) VALUES
(1, 'Miroslav', 'Krleza', NULL),
(3, 'Ivana', 'Brlic Mažuranic', NULL),
(4, 'Dobrisa', 'Cesaric', ''),
(5, 'August', 'Senoa', ''),
(13, 'Antoine', 'de Saint-Exupéry', NULL),
(14, 'Hans', 'Rosling', 'Ola Rosling, Anna Rosling'),
(15, 'Julie', 'Caplin', NULL),
(16, 'Nemanja', 'Bojanic', NULL),
(17, 'Jesica Joelle ', 'Alexander', ''),
(22, 'Jerome David', 'Salinger', '');

-- --------------------------------------------------------

--
-- Table structure for table `clanovi`
--

CREATE TABLE `clanovi` (
  `ID_clan` int(11) NOT NULL,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `adresa` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `broj_telefona` varchar(20) NOT NULL,
  `datum_uclanjenja` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clanovi`
--

INSERT INTO `clanovi` (`ID_clan`, `ime`, `prezime`, `adresa`, `email`, `broj_telefona`, `datum_uclanjenja`) VALUES
(1, 'Marko', 'Markic', 'Vukovarska 58, Rijeka', 'marko.markic@gmail.com', '097563245', '2021-12-30'),
(2, 'Ana ', 'Anic', 'Vukovarska 58, Rijeka', 'ana.anic@gmail.com', '099658475', '2022-01-12'),
(4, 'Iva', 'Ivic', 'Vukovarska 58, Rijeka', 'iva.ivic@gmail.com', '098456758', '2022-01-13'),
(24, 'Natasa', 'Batinic', 'Ulica 123, Hreljin', 'nata@gmail.com', '123456789', '2022-01-31'),
(25, 'Jelena', 'Pecikozic', 'IV Maksimirsko naselje 21, Zagreb', 'jelena@gmail.hr', '0989034759', '2022-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `izdavaci`
--

CREATE TABLE `izdavaci` (
  `ID_izdavac` int(11) NOT NULL,
  `naziv_izdavac` varchar(55) NOT NULL,
  `grad_izdavac` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `izdavaci`
--

INSERT INTO `izdavaci` (`ID_izdavac`, `naziv_izdavac`, `grad_izdavac`) VALUES
(1, 'Skolska knjiga', 'Zagreb'),
(3, 'VBZ', 'Zagreb'),
(6, 'Profil', 'Zagreb'),
(7, 'Znanje', 'Zagreb'),
(8, 'Harfa', 'Split'),
(9, 'Egmont', 'Zagreb'),
(11, 'Sareni ducan ', 'Zagreb');

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `ID_kategorija` int(11) NOT NULL,
  `naziv_kategorija` varchar(80) NOT NULL,
  `opis_kategorija` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`ID_kategorija`, `naziv_kategorija`, `opis_kategorija`) VALUES
(7, 'Znanost i Tehnologija', 'Publicistika znanstvene i tehnološke tematike'),
(8, 'Knjige za djecu', 'Knjige namjenjene za djecu, lektira, djecji klasici'),
(9, 'Enciklopedije', 'Djela u kojima se abecednim  slijedom sustavno obraduju cinjenice i spoznaje o sveukupnom ljudskom znanju'),
(10, 'Ljubavni romani', 'Ljubavni romani'),
(11, 'Savjetnik za roditelje', 'Nacela odgoja, obiteljske navike, pristup odgoju'),
(12, 'Lektira', 'Lektira za osnovnu i srednju školu');

-- --------------------------------------------------------

--
-- Table structure for table `knjige`
--

CREATE TABLE `knjige` (
  `ID_knjige` int(11) NOT NULL,
  `naslov` varchar(150) NOT NULL,
  `isbn` varchar(23) NOT NULL,
  `godina_izdanja` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL,
  `ID_autor` int(11) NOT NULL,
  `ID_kategorija` int(11) NOT NULL,
  `ID_izdavac` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `knjige`
--

INSERT INTO `knjige` (`ID_knjige`, `naslov`, `isbn`, `godina_izdanja`, `kolicina`, `ID_autor`, `ID_kategorija`, `ID_izdavac`) VALUES
(1, 'Zlatarevo zlato', 'ISBN 978-953-500-105-8', 1871, 4, 5, 8, 1),
(6, 'Faktologija', 'ISBN 978-953-52-0151-9', 2020, 0, 14, 7, 3),
(7, 'Mali princ', 'ISBN 978-953-141-078-6', 2021, 1, 13, 8, 7),
(8, 'Mali kafic u Kopenhagenu', 'ISBN 978-953-485-528-7', 2019, 3, 15, 10, 7),
(9, 'Mali hotel na Islandu', 'ISBN 978-953-832-610-3', 2020, 4, 15, 10, 7),
(10, 'Branko i Stanko u svijetu atoma', 'ISBN 978-953-735-164-9', 2018, 5, 16, 8, 8),
(11, 'Danski odgoj djece', 'ISBN 978-953-131-612-5', 2017, 1, 17, 11, 9),
(12, 'Lovac u zitu', 'ISBN 978-953-668-367-3', 2007, 3, 22, 12, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autori`
--
ALTER TABLE `autori`
  ADD PRIMARY KEY (`ID_autor`);

--
-- Indexes for table `clanovi`
--
ALTER TABLE `clanovi`
  ADD PRIMARY KEY (`ID_clan`);

--
-- Indexes for table `izdavaci`
--
ALTER TABLE `izdavaci`
  ADD PRIMARY KEY (`ID_izdavac`);

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`ID_kategorija`);

--
-- Indexes for table `knjige`
--
ALTER TABLE `knjige`
  ADD PRIMARY KEY (`ID_knjige`),
  ADD KEY `ID_autor` (`ID_autor`),
  ADD KEY `ID_kategorija` (`ID_kategorija`),
  ADD KEY `ID_izdavac` (`ID_izdavac`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autori`
--
ALTER TABLE `autori`
  MODIFY `ID_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `clanovi`
--
ALTER TABLE `clanovi`
  MODIFY `ID_clan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `izdavaci`
--
ALTER TABLE `izdavaci`
  MODIFY `ID_izdavac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `ID_kategorija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `knjige`
--
ALTER TABLE `knjige`
  MODIFY `ID_knjige` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `knjige`
--
ALTER TABLE `knjige`
  ADD CONSTRAINT `knjige_ibfk_1` FOREIGN KEY (`ID_autor`) REFERENCES `autori` (`ID_autor`),
  ADD CONSTRAINT `knjige_ibfk_2` FOREIGN KEY (`ID_kategorija`) REFERENCES `kategorije` (`ID_kategorija`),
  ADD CONSTRAINT `knjige_ibfk_3` FOREIGN KEY (`ID_izdavac`) REFERENCES `izdavaci` (`ID_izdavac`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
