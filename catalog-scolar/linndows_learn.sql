-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 15 Mai 2018 la 11:03
-- Versiune server: 5.5.58-cll
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
-- Database: `linndows_learn`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `absente`
--

CREATE TABLE `absente` (
  `idn` int(11) NOT NULL,
  `disciplina` varchar(80) NOT NULL,
  `absenta` tinyint(1) DEFAULT NULL,
  `dataab` date DEFAULT NULL,
  `elev` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `absente`
--

INSERT INTO `absente` (`idn`, `disciplina`, `absenta`, `dataab`, `elev`) VALUES
(1, 'Fizica', 1, '2018-04-28', 9),
(2, 'Fizica', 0, '2018-04-28', 9),
(3, 'Matematica', 1, '2018-05-14', 19),
(4, 'Matematica', 0, '2018-05-15', 19),
(5, 'Matematica', 1, '2018-05-08', 19),
(6, 'Matematica', 1, '2018-05-16', 19),
(7, 'Geografie', 1, '2018-05-09', 19),
(8, 'Geografie', 1, '2018-05-08', 19),
(9, 'Geografie', 1, '2018-05-23', 19),
(10, 'Informatica', 1, '2018-05-09', 26),
(11, 'Matematica', 1, '2018-05-10', 1),
(12, 'Matematica', 1, '2018-05-10', 1),
(13, 'Matematica', 1, '2018-05-17', 1),
(14, 'Educatie Fizica', 1, '2018-05-03', 11),
(15, 'Psihologie', 1, '2018-05-16', 15),
(16, 'Chimie', 2, '2018-05-23', 9),
(17, 'Chimie', 1, '2018-05-08', 9),
(18, 'Chimie', 1, '2018-05-01', 9),
(19, 'Chimie', 1, '2018-05-22', 9),
(20, 'Chimie', 1, '2018-05-24', 9),
(21, 'Chimie', 2, '2018-05-23', 9),
(22, 'Chimie', 1, '2018-05-17', 9),
(23, 'Chimie', 1, '2018-05-09', 9),
(24, 'Istorie', 1, '2018-05-02', 9),
(25, 'Educatie Tehnologica', 1, '2018-05-17', 9),
(26, 'Educatie Fizica', 1, '2018-04-30', 9),
(27, 'Educatie Fizica', 1, '2018-05-26', 9),
(28, 'Logica', 1, '2018-05-09', 9),
(29, 'Educatie Fizica', 2, '2018-04-30', 9),
(30, 'Matematica', 1, '2018-05-16', 31),
(31, 'Matematica', 1, '2018-05-14', 31),
(32, 'Matematica', 1, '2018-05-14', 16),
(33, 'Desen', 1, '2018-05-07', 3),
(34, 'Matematica', 1, '2018-05-08', 21),
(35, 'Educatie Muzicala', 1, '2018-05-14', 21),
(36, 'Matematica', 1, '2018-05-22', 21),
(37, 'Informatica', 1, '2018-05-21', 35),
(38, 'Matematica', 1, '2018-05-15', 35),
(40, 'Matematica', 1, '2018-05-09', 44),
(42, 'Romana', 2, '2018-05-13', 11),
(43, 'Informatica', 2, '2018-06-02', 11),
(44, 'Matematica', 1, '2018-05-31', 11),
(45, 'Informatica', 1, '2018-05-16', 39),
(46, 'Logica', 1, '2018-04-19', 39),
(47, 'Engleza', 1, '2018-05-07', 39),
(48, 'Educatie Muzicala', 1, '2018-05-16', 21),
(49, 'Educatie Tehnologica', 1, '2018-05-06', 11),
(50, 'Matematica', 1, '2018-04-09', 11),
(58, 'Informatica', 2, '2018-05-24', 29),
(60, 'Biologie', 1, '2018-05-25', 29),
(61, 'Logica', 2, '2018-05-09', 29),
(62, 'Logica', 2, '2018-05-09', 29),
(63, 'Informatica', 1, '2018-05-15', 16),
(64, 'Informatica', 1, '2018-05-15', 16),
(65, 'Informatica', 1, '2018-04-29', 16),
(66, 'Logica', 1, '2018-04-29', 28),
(67, 'Franceza', 2, '2018-05-14', 29),
(68, 'Franceza', 2, '2018-05-08', 29),
(69, 'TIC', 2, '2018-05-15', 29),
(70, 'TIC', 2, '2018-05-15', 29),
(71, 'Psihologie', 1, '2018-05-22', 29),
(72, 'Informatica', 1, '2018-05-09', 45),
(73, 'Informatica', 1, '2018-04-19', 45),
(74, 'Informatica', 2, '2018-05-14', 23),
(75, 'Matematica', 1, '2018-04-19', 44),
(76, 'Biologie', 1, '2018-05-15', 45),
(77, 'Biologie', 1, '2018-04-29', 45),
(78, 'Matematica', 1, '2018-05-08', 48),
(79, 'Psihologie', 1, '2018-05-15', 45),
(80, 'Matematica', 1, '2018-05-25', 38);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `passcode` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `passcode`) VALUES
(1, 'user1', 'parola');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `clase`
--

CREATE TABLE `clase` (
  `idc` int(11) NOT NULL,
  `nume` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `elevi`
--

CREATE TABLE `elevi` (
  `id` int(11) NOT NULL,
  `prenume` varchar(80) NOT NULL,
  `nume` varchar(80) NOT NULL,
  `clasa` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `poza` varchar(200) DEFAULT NULL,
  `userelev` varchar(50) NOT NULL,
  `parolaelev` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `elevi`
--

INSERT INTO `elevi` (`id`, `prenume`, `nume`, `clasa`, `email`, `poza`, `userelev`, `parolaelev`) VALUES
(1, 'Eugen', 'Ciucean', '9D', 'cicieugen@ymail.ro', 'img/eugen.png', 'user4', 'parola4'),
(2, 'Vasilica', 'Onofrei', '10C', 'vasy_tdi_boss@yahoo.ro', 'img/vasilica.jpg', '', ''),
(3, 'Gheorghita', 'Gheorghe', '11A', 'ghdouble@rocketmail.ro', 'img/gheorghita.jpg', '', ''),
(4, 'Ionel', 'Teodorescu', '12D', 'teoendiuss@scavenger.us', 'img/ionel.jpg', '', ''),
(5, 'Floricica', 'Panait', '12B', 'floryxxx@hotmail.eu', 'img/floricica.jpg', '', ''),
(9, 'John', 'Doe', '9D', 'john@example.com', 'img/eugen.png', 'user1', 'parola'),
(10, 'Oana', 'Ghenosu', '11B', 'dan@yahoo.com', 'img/oana.png', 'dasdasdad', 'da'),
(11, 'Andrei', 'Gatej', '9B', 'andreigtj01@yahoo.com', 'img/gheorghita.jpg', 'andreiUSer21', 'andreiParola21'),
(12, 'Teofil', 'Vasilescu', '12D', 'alex@yahoo.com', 'img/teofil.png', 'alex2300', '20210120'),
(13, 'Ionel', 'Theo', '11b', 'ion@yahoo.com', 'img/gheorghita.jpg', 'theo2111', 'parolaLuiIonel'),
(15, 'andrei2', 'gtj', '9A', 'and@yahoo.gmail', 'img/gheorghita.jpg', 'andgtj11', 'parolagtj'),
(16, 'matei', 'andrei', '9C', 'mat@yahoo.com', 'img/gheorghita.jpg', 'mat211', 'parolaMat'),
(17, 'dan', 'and', '11C', 'and@yahoo.com', 'img/gheorghita.jpg', 'dan21', '21dan'),
(18, 'Elevul12C', 'doispeC', '12C', '12@yahoo.com', 'img/gheorghita.jpg', 'abcd', 'efgh'),
(19, 'Vasilie', 'Mihai', '12D', 'mihai@yahoo.com', 'img/gheorghita.jpg', 'mihai', 'vasy'),
(21, 'alex', 'vasile', '10D', 'alex@yahoo.com', 'img/gheorghita.jpg', 'alexVasy2001', 'alex2001'),
(22, 'dumitru', 'dan', '9C', 'dum@yahoo.com', 'img/gheorghita.jpg', 'dum211', 'paroladum'),
(23, 'proba', 'pbora2', '10B', 'pb@yahoo.com', 'img/gheorghita.jpg', 'da', 'da'),
(24, 'vlad', 'dan', '11B', 'vld@yahoo.com', 'img/gheorghita.jpg', 'vlad@yahoo.com', 'dada'),
(25, 'Dan', 'Alex', '12B', 'alex@yahoo.com', 'img/gheorghita.jpg', 'userdan', 'paroladan'),
(26, 'Liviu', 'Varciulescu', '12B', 'lv2302gya@gmx.com', 'img/gheorghita.jpg', 'liviu', 'liviu'),
(27, 'Matei', 'Vasile', '10A', 'andreigtj01@gmail.com', 'img/gheorghita.jpg', 'vasile23', 'parolaLuiVasile'),
(28, 'Test', 'Test', '9C', 'test.test.com', 'img/gheorghita.jpg', 'Test', 'Test'),
(29, 'Nume', 'Minune', '9C', 'minune@yahoo.com', 'img/gheorghita.jpg', 'minune', 'nume'),
(30, 'Ilie', 'Pintilie', '11C', 'pintilieilie@palarie.com', 'img/gheorghita.jpg', 'pintilie', 'ilie'),
(31, 'Valentin', 'Spinu', '9A', 'valivalentin738@gmail.com', 'img/gheorghita.jpg', 'valentin', 'valentin'),
(32, 'Andrei', 'Matei', '9A', 'matei@yahoo.com', 'img/gheorghita.jpg', 'matei2001', 'matei2'),
(33, 'andiae', 'adadj', '9A', 'and@yahoo.com', 'img/gheorghita.jpg', 'andgtj11', 'd'),
(34, 'andiae', 'Andrei', '9D', 'and@yahoo.com', 'images/react.png', 'eee', 'eee'),
(35, 'Spanu', 'Valentin', '12D', 'vali@yahoo.com', 'images/react.png', 'vali202', 'val'),
(36, 'Andrei', 'Vasile', '9D', 'andreigtj01@yahoo.com', 'images/app.png', 'andrei2322', '22222'),
(37, 'marius', 'popa', '9D', 'marius@yahoo.com', 'imgs/react.png', 'marius222', '222marius'),
(38, 'proba2', 'proba2', '9D', 'pb2@yahoo.com', 'imgs/react.png', 'pb222', '222pb'),
(39, 'andiae', 'Andrei', '9D', 'and@yahoo.com', 'imgs/react.png', 'andrei2322', 'a'),
(40, 'adn', 'Andrei', '11A', 'ada@dadan', 'imgs/verde.jpg', 'andgtj11', 'a'),
(41, 'and', 'and2', '11A', 'and@yahoo.com', 'imgs/react.png', 'abcd', 'abcde'),
(42, 'Alex', 'Popa', '12C', 'alexPopa@gmail.com', 'imgs/react.png', 'popa22', 'popa22'),
(43, 'Alexandra', 'Ion', '11B', 'alexandra22@yahoo.com', 'img/alexandra.jpg', 'alexa23', 'alexa23'),
(44, 'Alexandra', 'Popescu', '12C', 'popAlexandra@yahoo.com', 'img/alexandra.jpg', 'alexa24', 'alexa24'),
(45, 'Andrei', 'Gatej', '10B', 'andreigtj01@gmail.com', 'img/react.png', 'andrei007', 'andrei007'),
(46, 'elev1', 'elev2', '9B', 'elev@yahoo.com', 'img/react.png', 'andrei2322', 'a'),
(47, 'elevNou', 'Nouelev', '9B', 'elev@yahoo.com', 'img/react.png', 'elev1', 'elev1'),
(48, 'elev11', 'elev11', '9C', 'elev11@gmail.com', 'img/react.png', 'elev11', 'elev11'),
(49, 'elev12', 'elev12', '9C', 'elev12@gmail.com', 'img/react.png', 'elev12', 'elev12');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `myNews`
--

CREATE TABLE `myNews` (
  `id` int(6) UNSIGNED NOT NULL,
  `informatie` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `myNews`
--

INSERT INTO `myNews` (`id`, `informatie`) VALUES
(1, 'S-a adagat in clasa a 10 - B elevul pbora2 proba'),
(2, 'S-a adagat in clasa a 11 - B elevul dan vlad'),
(3, 'S-a adagat in clasa a 12 - B elevul Alex Dan'),
(4, 'S-a adagat in clasa a 12 - B elevul Varciulescu Liviu'),
(5, 'S-a inserat nota elevului Vasilescu Teofil, clasa a 1-2, la disciplina Logica'),
(6, 'S-a inserat nota elevului Vasilescu Teofil, clasa a 1-2, la disciplina Fizica'),
(7, 'S-a inserat nota elevului Vasilescu Teofil, clasa a 1-2, la disciplina Educatie Plastica'),
(8, 'S-a inserat nota elevului Onofrei Vasilica, clasa a 1-0, la disciplina Educatie Muzicala'),
(9, 'S-a inserat nota elevului Onofrei Vasilica, clasa a 1-0, la disciplina Matematica'),
(10, 'S-a inserat nota elevului Onofrei Vasilica, clasa a 1-0, la disciplina Educatie Fizica'),
(11, 'S-a inserat nota elevului Onofrei Vasilica, clasa a 1-0, la disciplina Matematica'),
(12, 'S-a inserat nota elevului Onofrei Vasilica, clasa a 10-C, la disciplina Franceza'),
(13, 'S-au inserat note elevului Alex Dan, clasa a 12-B, la disciplina Engleza'),
(14, 'S-au inserat note elevului and dan, clasa a 11-C, la disciplina Fizica'),
(15, 'S-a inserat nota 8 elevului Gatej Andrei, clasa a 9-B, la disciplina Romana'),
(16, 'S-a inserat nota 1 elevului Gatej Andrei, clasa a 9-B, la disciplina Romana'),
(17, 'S-a inserat nota 6 elevului and dan, clasa a 11-C, la disciplina Logica'),
(18, 'S-a inserat nota 2 elevului Vasilescu Teofil, clasa a 12-D, la disciplina Matematica'),
(19, 'S-a inserat nota 7 elevului Vasilescu Teofil, clasa a 12-a D, la disciplina Informatica'),
(20, 'S-au inserat notele 7 10 2  elevului  Teodorescu Ionel, clasa a 12-a D, la disciplina Informatica'),
(21, 'S-a inserat nota 3 elevului Gatej Andrei, clasa a 9-a B, la disciplina Matematica'),
(22, 'S-au inserat notele 10, 10,  elevului  Gatej Andrei, clasa a 9-a B, la disciplina Educatie Muzicala'),
(23, 'S-au inserat notele 8, 7, 1,  elevului  Gatej Andrei, clasa a 9-a B, la disciplina Educatie Fizica'),
(24, 'S-a adagat in clasa a 10 - A elevul Vasile Matei'),
(25, 'S-au inserat notele 6, 10 10,  elevului  Vasile Matei, clasa a 10-a A, la disciplina Romana'),
(26, 'S-au inserat notele 7, 8  elevului  Vasile Matei, clasa a 10-a A, la disciplina Matematica'),
(27, 'S-a adagat in clasa a 9 - C elevul Test Test'),
(28, 'S-a inserat nota 25 elevului Test Test, clasa a 9-a C, la disciplina Chimie'),
(29, 'S-a adagat in clasa a 9 - C elevul Minune Nume'),
(30, 'S-a inserat nota 7 elevului Minune Nume, clasa a 9-a C, la disciplina Educatie Fizica'),
(31, 'S-au inserat notele 5, 4, 10  elevului  Test Test, clasa a 9-a C, la disciplina Logica'),
(32, 'S-au inserat notele 10, 8  elevului  doispeC Elevul12C, clasa a 12-a C, la disciplina Matematica'),
(33, 'S-a inserat nota 9 elevului and dan, clasa a 11-a C, la disciplina Fizica'),
(34, 'S-au inserat notele 11,   elevului  doe jane, clasa a 9-a D, la disciplina Informatica'),
(35, 'S-au inserat notele 10, 9, 8  elevului  Doe John, clasa a 9-a D, la disciplina Educatie Fizica'),
(36, 'S-au inserat notele 2, 8  elevului  dan dumitru, clasa a 9-a C, la disciplina Matematica'),
(37, 'S-au inserat notele 10, 6  elevului  doe jane, clasa a 9-a D, la disciplina Educatie Muzicala'),
(38, 'S-au inserat notele 8,   elevului  Ciucean Eugen, clasa a 9-a D, la disciplina Informatica'),
(39, 'S-a inserat nota 7 elevului Doe John, clasa a 9-a D, la disciplina Istorie'),
(40, 'S-a inserat nota 2 elevului Mihai Vasilie, clasa a 12-a D, la disciplina Educatie Fizica'),
(41, 'S-a inserat nota 3 elevului doispeC Elevul12C, clasa a 12-a C, la disciplina Matematica'),
(42, 'S-a inserat nota 5 elevului Mihai Vasilie, clasa a 12-a D, la disciplina Romana'),
(43, 'S-a inserat nota 3 elevului Mihai Vasilie, clasa a 12-a D, la disciplina Informatica'),
(44, 'S-au inserat notele 3, 4  si teza 10 elevului  Mihai Vasilie, clasa a 12-a D, la disciplina Geografie'),
(45, 'S-a inserat nota 6 elevului Doe John, clasa a 9-a D, la disciplina Geografie'),
(46, 'S-au inserat notele 6, 9  si teza 10 elevului  Varciulescu Liviu, clasa a 12-a B, la disciplina Informatica'),
(47, 'S-au inserat notele 5, 7  elevului  Varciulescu Liviu, clasa a 12-a B, la disciplina Matematica'),
(48, 'S-a inserat nota 3 si teza 5 elevului Gheorghe Gheorghita, clasa a 11-a A, la disciplina Fizica'),
(49, 'S-a inserat nota 10 elevului Gheorghe Gheorghita, clasa a 11-a A, la disciplina Franceza'),
(50, 'S-au inserat notele 8, 10  si teza 8 elevului  Gheorghe Gheorghita, clasa a 11-a A, la disciplina Desen'),
(51, 'S-au inserat notele 7, 9  si teza 19 elevului  Gatej Andrei, clasa a 9-a B, la disciplina Desen'),
(52, 'S-a inserat nota 9 si teza 9 elevului Gatej Andrei, clasa a 9-a B, la disciplina Educatie Muzicala'),
(53, 'S-a inserat nota 5 si teza 9 elevului Vasile Matei, clasa a 10-a A, la disciplina Matematica'),
(54, 'S-au inserat 2 absente elevului Mihai Vasilie, clasa a 12-a D, la disciplina Matematica '),
(55, 'S-au inserat 3 absente elevului Mihai Vasilie, clasa a 12-a D, la disciplina Geografie '),
(56, 'S-a inserat o absenta elevului Varciulescu Liviu, clasa a 12-a B, la disciplina Informatica '),
(57, 'S-au inserat 3 absente elevului Ciucean Eugen, clasa a 9-a , la disciplina Matematica '),
(58, 'S-a inserat nota 7 si teza 6 elevului Ciucean Eugen, clasa a 9-a D, la disciplina Matematica'),
(59, 'S-a inserat nota 6 si teza 5 elevului Gatej Andrei, clasa a 9-a B, la disciplina Educatie Fizica'),
(60, 'S-a inserat o absenta elevului Gatej Andrei, clasa a 9-a , la disciplina Educatie Fizica '),
(61, 'S-a adagat in clasa a 11 - C elevul Pintilie Ilie'),
(62, 'S-au inserat notele 10, 10  si teza 10 elevului  Pintilie Ilie, clasa a 11-a C, la disciplina Educatie Antreprenoriala'),
(63, 'S-a inserat nota 6 si teza 10 elevului Gatej Andrei, clasa a 9-a B, la disciplina Educatie Muzicala'),
(64, 'S-a inserat o absenta elevului gtj andrei2, clasa a 9-a , la disciplina Psihologie '),
(65, 'S-a inserat nota 8 si teza 8 elevului gtj andrei2, clasa a 9-a A, la disciplina Psihologie'),
(66, 'S-au inserat notele re, ty5yh5y  si teza rhtrt elevului  doispeC Elevul12C, clasa a 12-a C, la disciplina Educatie Fizica'),
(67, 'S-a inserat nota 10 si teza  elevului Gatej Andrei, clasa a 9-a B, la disciplina Desen'),
(68, 'S-a inserat nota 4 elevului doispeC Elevul12C, clasa a 12-a C, la disciplina Romana'),
(69, 'S-a inserat nota 10 elevului Gatej Andrei, clasa a 9-a B, la disciplina Educatie Muzicala'),
(70, 'S-a inserat nota 10 elevului Doe John, clasa a 9-a D, la disciplina Franceza'),
(71, 'S-a inserat o absenta elevului Doe John, clasa a 9-a , la disciplina Chimie '),
(72, 'S-au inserat 3 absente elevului Doe John, clasa a 9-a , la disciplina Chimie '),
(73, 'S-au inserat 4 absente elevului Doe John, clasa a 9-a , la disciplina Chimie '),
(74, 'S-a inserat nota 7 elevului Doe John, clasa a 9-a D, la disciplina Educatie Tehnologica'),
(75, 'S-a inserat nota  si teza 9 elevului Doe John, clasa a 9-a D, la disciplina Educatie Tehnologica'),
(76, 'S-a inserat nota  si teza  elevului Doe John, clasa a 9-a D, la disciplina Economie'),
(77, 'S-au inserat notele 6, 5  elevului  Ciucean Eugen, clasa a 9-a D, la disciplina Cultura Civica'),
(78, 'S-au inserat notele 9, 9  si teza 2 elevului  Ciucean Eugen, clasa a 9-a D, la disciplina Educatie Antreprenoriala'),
(79, 'S-a inserat nota 3 elevului Ciucean Eugen, clasa a 9-a D, la disciplina Educatie Muzicala'),
(80, 'S-a inserat nota  si teza 6 elevului Ciucean Eugen, clasa a 9-a D, la disciplina Desen'),
(81, 'S-a inserat o absenta elevului Doe John, clasa a 9-a , la disciplina Istorie '),
(82, 'S-au inserat notele 7, 9  si teza 8 elevului  Doe John, clasa a 9-a D, la disciplina Educatie Muzicala'),
(83, 'S-au inserat notele 3, 6, 9  elevului  Doe John, clasa a 9-a D, la disciplina Fizica'),
(84, 'S-a inserat nota 7 elevului Doe John, clasa a 9-a D, la disciplina Educatie Tehnologica'),
(85, 'S-a inserat nota din teza , 9 , elevului Doe John, clasa a 9-a D, la disciplina Chimie'),
(86, 'S-au inserat notele 8, 9  si teza 10 elevului  Gatej Andrei, clasa a 9-a B, la disciplina Matematica'),
(87, 'S-a inserat nota  elevului Varciulescu Liviu, clasa a 12-a B, la disciplina Logica'),
(88, 'S-au inserat notele 4, 2, 1  si teza 5 elevului  Varciulescu Liviu, clasa a 12-a B, la disciplina Franceza'),
(89, 'S-a inserat nota 9 elevului Doe John, clasa a 9-a D, la disciplina Geografie'),
(90, 'S-a inserat nota 10 elevului Doe John, clasa a 9-a D, la disciplina Informatica'),
(91, 'S-a inserat nota 9 elevului Doe John, clasa a 9-a D, la disciplina Consiliere'),
(92, 'S-a inserat nota 7 elevului Doe John, clasa a 9-a D, la disciplina TIC'),
(93, 'S-a inserat nota 10 elevului Pintilie Ilie, clasa a 11-a C, la disciplina Consiliere'),
(94, 'S-a inserat nota 7 elevului Pintilie Ilie, clasa a 11-a C, la disciplina TIC'),
(95, 'S-a inserat nota 10 elevului doispeC Elevul12C, clasa a 12-a C, la disciplina TIC'),
(96, 'S-a inserat nota 10 elevului doispeC Elevul12C, clasa a 12-a C, la disciplina Educatie Antreprenoriala'),
(97, 'S-a inserat nota 4 elevului doispeC Elevul12C, clasa a 12-a C, la disciplina Educatie Fizica'),
(98, 'S-a inserat nota 7 elevului Doe John, clasa a 9-a D, la disciplina Franceza'),
(99, 'S-a inserat nota din teza , 9 , elevului Doe John, clasa a 9-a D, la disciplina Istorie'),
(100, 'S-a inserat nota 4 elevului Doe John, clasa a 9-a D, la disciplina Consiliere'),
(101, 'S-a inserat nota 20 elevului Doe John, clasa a 9-a D, la disciplina Istorie'),
(102, 'S-a adagat profesorul antonscu ionel, la disciplina Romana'),
(103, 'S-a adagat profesorul Vasile Andrei, la disciplina Fizica'),
(104, 'S-a inserat nota 8 elevului Doe John, clasa a 9-a D, la disciplina Cultura Civica'),
(105, 'S-au inserat notele 2, 3  elevului  Doe John, clasa a 9-a D, la disciplina Educatie Fizica'),
(106, 'S-a adagat profesorul Mhai Andrei, la disciplina matematica'),
(107, 'S-a sters profesorul Vasile Andrei, la disciplina Fizica'),
(108, 'S-a adagat profesorul Andrei Matei, la disciplina Fizica'),
(109, 'S-a sters profesorul Mhai Andrei, la disciplina matematica'),
(110, 'S-a inserat nota din teza , 2 , elevului Doe John, clasa a 9-a D, la disciplina Matematica'),
(111, 'S-a inserat nota din teza , 10 , elevului Doe John, clasa a 9-a D, la disciplina Engleza'),
(112, 'S-a inserat nota 9 elevului Doe John, clasa a 9-a D, la disciplina TIC'),
(113, 'S-a inserat nota 5 elevului Doe John, clasa a 9-a D, la disciplina TIC'),
(114, 'S-a inserat nota 6 elevului Doe John, clasa a 9-a D, la disciplina TIC'),
(115, 'S-a inserat nota din teza , 7 , elevului Minune Nume, clasa a 9-a C, la disciplina Matematica'),
(116, 'S-a adagat profesorul È˜oimarescu È˜tefan, la disciplina Matematica'),
(117, 'S-a inserat o absenta elevului Doe John,  la disciplina Educatie Tehnologica '),
(118, 'S-a inserat o absenta elevului Doe John, clasa a 9-a ,  la disciplina Educatie Fizica '),
(119, 'S-a inserat o absenta elevului Doe John, clasa a 9-a ,  la disciplina Educatie Fizica '),
(120, 'S-a inserat o absenta elevului Doe John, clasa a 9-a ,  la disciplina Logica '),
(121, 'S-a inserat o absenta elevului Doe John, clasa a 9-a D,  la disciplina Educatie Fizica '),
(122, 'S-a sters profesorul Andrei Matei, la disciplina Fizica'),
(123, 'S-a adagat in clasa a 9 - A elevul Spinu Valentin'),
(124, 'S-a inserat o absenta elevului Spinu Valentin, clasa a 9-a A,  la disciplina Matematica '),
(125, 'S-a inserat o absenta elevului Spinu Valentin, clasa a 9-a A,  la disciplina Matematica '),
(126, 'S-a inserat nota 10 elevului Spinu Valentin, clasa a 9-a A, la disciplina Matematica'),
(127, 'S-a inserat o absenta elevului andrei matei, clasa a 9-a C,  la disciplina Matematica '),
(128, 'S-a inserat o absenta elevului Gheorghe Gheorghita, clasa a 11-a A,  la disciplina Desen '),
(129, 'S-a adagat profesorul Andrei Gatej, la disciplina Matematica'),
(130, 'S-a sters profesorul Andrei Gatej, la disciplina Matematica'),
(131, 'S-a adagat in clasa a 9 - A elevul Matei Andrei'),
(132, 'S-a adagat in clasa a 9 - A elevul adadj andiae'),
(133, 'S-a inserat nota 3 elevului Pintilie Ilie, clasa a 11-a C, la disciplina Informatica'),
(134, 'S-a adagat profesorul Andrei Gatej, la disciplina Fizica'),
(135, 'S-a sters profesorul Andrei Gatej, la disciplina Fizica'),
(136, 'S-a adagat in clasa a 9 - D elevul Andrei andiae'),
(137, 'S-a adagat profesorul Andrei Gatej, la disciplina Mate'),
(138, 'S-a sters profesorul Andrei Gatej, la disciplina Mate'),
(139, 'S-a inserat o absenta elevului vasile alex, clasa a 10-a D,  la disciplina Matematica '),
(140, 'S-a inserat o absenta elevului vasile alex, clasa a 10-a D,  la disciplina Educatie Muzicala '),
(141, 'S-a inserat o absenta elevului vasile alex, clasa a 10-a D,  la disciplina Matematica '),
(142, 'S-a inserat nota din teza , 8 , elevului Minune Nume, clasa a 9-a C, la disciplina Romana'),
(143, 'S-a adagat profesorul Andrei Gatej, la disciplina Matematica'),
(144, 'S-a sters profesorul Andrei Gatej, la disciplina Matematica'),
(145, 'S-a adagat in clasa a 12 - D elevul Valentin Spanu'),
(146, 'S-a inserat nota 10 elevului Valentin Spanu, clasa a 12-a D, la disciplina Informatica'),
(147, 'S-a inserat nota din teza , 8 , elevului Valentin Spanu, clasa a 12-a D, la disciplina Informatica'),
(148, 'S-a inserat o absenta elevului Valentin Spanu, clasa a 12-a D,  la disciplina Informatica '),
(149, 'S-a inserat o absenta elevului Valentin Spanu, clasa a 12-a D,  la disciplina Matematica '),
(150, 'S-a inserat nota 7 elevului Valentin Spanu, clasa a 12-a D, la disciplina Matematica'),
(151, 'S-a adagat profesorul Pop Andrei, la disciplina Matematica '),
(152, 'S-a inserat o absenta elevului Minune Nume, clasa a 9-a C,  la disciplina Ma '),
(153, 'S-a adagat in clasa a 9 - D elevul Vasile Andrei'),
(154, 'S-a adagat in clasa a 9 - D elevul popa marius'),
(155, 'S-a adagat in clasa a 9 - D elevul proba2 proba2'),
(156, 'S-a adagat in clasa a 9 - D elevul Andrei andiae'),
(157, 'S-a adagat in clasa a 11 - A elevul Andrei adn'),
(158, 'S-a adagat in clasa a 11 - A elevul and2 and'),
(159, 'S-a adagat in clasa a 12 - C elevul Popa Alex'),
(160, 'S-a adagat in clasa a 11 - B elevul Ion Alexandra'),
(161, 'S-a adagat in clasa a 12 - C elevul Popescu Alexandra'),
(162, 'S-a inserat nota 10 elevului Popescu Alexandra, clasa a 12-a C, la disciplina Matematica'),
(163, 'S-a inserat o absenta elevului Popescu Alexandra, clasa a 12-a C,  la disciplina Matematica '),
(164, 'S-a inserat nota din teza , 3 , elevului Onofrei Vasilica, clasa a 10-a C, la disciplina Matematica'),
(165, 'S-a inserat nota 8 elevului Onofrei Vasilica, clasa a 10-a C, la disciplina Chimie'),
(166, 'S-a inserat nota 8 elevului Gatej Andrei, clasa a 9-a B, la disciplina Romana'),
(167, 'S-a inserat nota din teza , 9 , elevului Gatej Andrei, clasa a 9-a B, la disciplina Informatica'),
(168, 'S-a inserat nota 3 elevului Gatej Andrei, clasa a 9-a B, la disciplina Franceza'),
(169, 'S-a inserat nota 9 elevului Gatej Andrei, clasa a 9-a B, la disciplina Logica'),
(170, 'S-a inserat nota 3 elevului Minune Nume, clasa a 9-a C, la disciplina Fizica'),
(171, 'S-a inserat nota 6 elevului Gatej Andrei, clasa a 9-a B, la disciplina Matematica'),
(172, 'S-a inserat nota 3 elevului Gatej Andrei, clasa a 9-a B, la disciplina Informatica'),
(173, 'S-a inserat nota 5 elevului Gatej Andrei, clasa a 9-a B, la disciplina Educatie Muzicala'),
(174, 'S-a inserat nota 8 elevului Gatej Andrei, clasa a 9-a B, ela disciplina Educatie Fizica'),
(175, 'S-a inserat nota din teza , 9 , elevului Popescu Alexandra, clasa a 12-a C, la disciplina Engleza'),
(176, 'S-a inserat o absenta elevului Minune Nume, clasa a 9-a C,  la disciplina Educatie Fizica '),
(177, 'S-a inserat o absenta elevului Gatej Andrei, clasa a 9-a B,  la disciplina Romana '),
(178, 'S-a inserat o absenta elevului Gatej Andrei, clasa a 9-a B,  la disciplina Informatica '),
(179, 'S-a inserat o absenta elevului Gatej Andrei, clasa a 9-a B,  la disciplina Matematica '),
(180, 'S-a inserat o absenta elevului Andrei andiae, clasa a 9-a D,  la disciplina Informatica '),
(181, 'S-a inserat o absenta elevului Andrei andiae, clasa a 9-a D,  la disciplina Logica '),
(182, 'S-a inserat o absenta elevului Andrei andiae, clasa a 9-a D,  la disciplina Engleza '),
(183, 'S-a inserat o absenta elevului vasile alex, clasa a 10-a D,  la disciplina Educatie Muzicala , in data de May 16th, 2018.'),
(184, 'S-a inserat o absenta elevului Gatej Andrei, clasa a 9-a B,  la disciplina Educatie Tehnologica , in data de May 6th, 2018.'),
(185, 'S-a inserat nota 9 elevului Gatej Andrei, clasa a 9-a B, ela disciplina Cultura Civica'),
(186, 'S-a inserat nota din teza , 9 , elevului Gatej Andrei, clasa a 9-a B, la disciplina Logica, in data de January 1st, 1970'),
(187, 'S-a inserat nota 3 elevului Gatej Andrei, clasa a 9-a B, ela disciplina Informatica'),
(188, 'S-a inserat nota 8 elevului Gatej Andrei, clasa a 9-a B,  la disciplina Fizica, in data de May 16th, 2018.'),
(189, 'S-a inserat nota din teza , 9 , elevului Gatej Andrei, clasa a 9-a B, la disciplina Matematica, in data de April 19th, 2018.'),
(190, 'S-a inserat o absenta elevului Gatej Andrei, clasa a 9-a B,  la disciplina Matematica , in data de April 9th, 2018.'),
(191, 'S-a inserat nota din teza , 9 , elevului popa marius, clasa a 9-a D, la disciplina Geografie, in data de May 8th, 2018.'),
(192, 'S-a adagat profesorul NumeProfesor1 Profesor1, la disciplina Fizica'),
(193, 'S-a sters profesorul NumeProfesor1 Profesor1, la disciplina Fizica'),
(194, 'S-a adagat profesorul Profesor1 Profsoe1, la disciplina Fizica'),
(195, 'S-a inserat nota din teza , 7 , elevului Onofrei Vasilica, clasa a 10-a C, la disciplina Educatie Fizica, in data de May 16th, 2018.'),
(196, 'S-a sters profesorul Profesor1 Profsoe1, la disciplina Fizica'),
(197, 'S-a adagat profesorul Prof2 Profg2, la disciplina Matematica'),
(198, 'S-a sters profesorul Prof2 Profg2, la disciplina Matematica'),
(199, 'S-a sters profesorul Pop Andrei, la disciplina Matematica '),
(200, 'S-a adagat profesorul Prof Profesor, la disciplina Matematica'),
(201, 'S-a adagat profesorul Profesor2 Profesor2, la disciplina Romana'),
(202, 'S-a sters profesorul Prof Profesor, la disciplina Matematica'),
(203, 'S-a adagat profesorul Profesor22 Profso, la disciplina Fizica'),
(204, 'S-a sters profesorul Profesor2 Profesor2, la disciplina Romana'),
(205, 'S-a adagat profesorul Prof3 Prof3, la disciplina Franceza'),
(206, 'S-a sters profesorul Profesor22 Profso, la disciplina Fizica'),
(207, 'S-a inserat o absenta elevului Minune Nume, clasa a 9-a C,  la disciplina Informatica , in data de April 1st, 2018.'),
(208, 'S-a inserat nota 10 elevului Minune Nume, clasa a 9-a C,  la disciplina Informatica, in data de May 26th, 2018.'),
(209, 'S-a inserat nota 7 elevului Minune Nume, clasa a 9-a C,  la disciplina Educatie Antreprenoriala, in data de December 11th, 2017.'),
(210, 'S-a inserat nota 9 elevului Minune Nume, clasa a 9-a C,  la disciplina Educatie Antreprenoriala, in data de May 1st, 2018.'),
(211, 'S-a inserat o absenta elevului Minune Nume, clasa a 9-a C,  la disciplina Educatie Antreprenoriala , in data de May 8th, 2018.'),
(212, 'S-a inserat o absenta elevului Minune Nume, clasa a 9-a C,  la disciplina Educatie Antreprenoriala , in data de May 27th, 2018.'),
(213, 'S-a inserat nota 6 elevului Minune Nume, clasa a 9-a C,  la disciplina Biologie, in data de May 30th, 2018.'),
(214, 'S-a inserat o absenta elevului Minune Nume, clasa a 9-a C,  la disciplina Logica , in data de May 23rd, 2018.'),
(215, 'S-a inserat nota din teza , 9 , elevului Minune Nume, clasa a 9-a C, la disciplina Logica, in data de May 9th, 2018.'),
(216, 'S-a inserat o absenta elevului Minune Nume, clasa a 9-a C,  la disciplina Biologie , in data de February 5th, 2018.'),
(217, 'S-a inserat o absenta elevului Minune Nume, clasa a 9-a C,  la disciplina Biologie , in data de May 10th, 2018.'),
(218, 'S-a inserat o absenta elevului Minune Nume, clasa a 9-a C,  la disciplina Informatica , in data de May 24th, 2018.'),
(219, 'S-a inserat o absenta elevului Minune Nume, clasa a 9-a C,  la disciplina Biologie , in data de May 15th, 2018.'),
(220, 'S-a inserat o absenta elevului Minune Nume, clasa a 9-a C,  la disciplina Biologie , in data de May 25th, 2018.'),
(221, 'S-a motivat absenta din data May 25th, 2018 elevului Minune Nume, clasa a 9-a C, la disciplina Biologie'),
(222, 'S-a motivat absenta din data May 25th, 2018 elevului Minune Nume, clasa a 9-a C, la disciplina Biologie'),
(223, 'S-a motivat absenta din data January 1st, 1970 elevului Minune Nume, clasa a 9-a C, la disciplina Informatica.'),
(224, 'S-a inserat o absenta elevului Minune Nume, clasa a 9-a C,  la disciplina Logica , in data de May 9th, 2018.'),
(225, 'S-a inserat o absenta elevului Minune Nume, clasa a 9-a C,  la disciplina Logica , in data de May 9th, 2018.'),
(226, 'S-a motivat absenta din data May 25th, 2018 elevului Minune Nume, clasa a 9-a C, la disciplina Biologie.'),
(227, 'S-a inserat o absenta elevului Andrei Matei, clasa a 9-a C,  la disciplina Informatica , in data de May 15th, 2018.'),
(228, 'S-a inserat o absenta elevului Andrei Matei, clasa a 9-a C,  la disciplina Informatica , in data de May 15th, 2018.'),
(229, 'S-a inserat o absenta elevului Andrei Matei, clasa a 9-a C,  la disciplina Informatica , in data de April 29th, 2018.'),
(230, 'S-a inserat nota 7 elevului andrei matei, clasa a 9-a C,  la disciplina Logica, in data de May 24th, 2018.'),
(231, 'S-a inserat o absenta elevului Test Test, clasa a 9-a C,  la disciplina Logica , in data de April 29th, 2018.'),
(232, 'S-a adagat profesorul Prof NoulProf, la disciplina Fizica'),
(233, 'S-a sters profesorul Prof3 Prof3, la disciplina Franceza'),
(234, 'S-a motivat absenta din data de May 24th, 2018 elevului Minune Nume, clasa a 9-a C, la disciplina Informatica.'),
(235, 'S-a inserat nota 8 elevului Minune Nume, clasa a 9-a C,  la disciplina Desen, in data de May 23rd, 2018.'),
(236, 'S-a inserat o absenta elevului Minune Nume, clasa a 9-a C,  la disciplina Franceza , in data de May 14th, 2018.'),
(237, 'S-a inserat o absenta elevului Minune Nume, clasa a 9-a C,  la disciplina Franceza , in data de May 8th, 2018.'),
(238, 'S-a inserat o absenta elevului Minune Nume, clasa a 9-a C,  la disciplina TIC , in data de May 15th, 2018.'),
(239, 'S-a inserat o absenta elevului Minune Nume, clasa a 9-a C,  la disciplina TIC , in data de May 15th, 2018.'),
(240, 'S-a motivat absenta din data de May 14th, 2018 elevului Minune Nume, clasa a 9-a C, la disciplina Franceza.'),
(241, 'S-a motivat absenta din data de May 9th, 2018 elevului Minune Nume, clasa a 9-a C, la disciplina Logica.'),
(242, 'S-a inserat o absenta elevului Minune Nume, clasa a 9-a C,  la disciplina TIC , in data de May 8th, 2018.'),
(243, 'S-a inserat o absenta elevului Minune Nume, clasa a 9-a C,  la disciplina Psihologie , in data de May 22nd, 2018.'),
(244, 'S-a motivat absenta din data de May 3rd, 2018 elevului Gatej Andrei, clasa a 9-a B, la disciplina Educatie Fizica.'),
(245, 'S-a motivat absenta din data de May 31st, 2018 elevului Gatej Andrei, clasa a 9-a B, la disciplina Matematica.'),
(246, 'S-a motivat absenta din data de January 1st, 1970 elevului Gatej Andrei, clasa a 9-a B, la disciplina Logica.'),
(247, 'S-a motivat absenta din data de January 1st, 1970 elevului Gatej Andrei, clasa a 9-a B, la disciplina Logica.'),
(248, 'S-a motivat absenta din data de June 2nd, 2018 elevului Gatej Andrei, clasa a 9-a B, la disciplina Informatica.'),
(249, 'S-a motivat absenta din data de May 31st, 2018 elevului Gatej Andrei, clasa a 9-a B, la disciplina Matematica.'),
(250, 'S-a motivat absenta din data de May 31st, 2018 elevului Gatej Andrei, clasa a 9-a B, la disciplina Matematica.'),
(251, 'S-a adaugat in clasa a 10 - B elevul Gatej Andrei'),
(252, 'S-a inserat nota 8 elevului Gatej Andrei, clasa a 10-a B,  la disciplina Informatica, in data de May 17th, 2018.'),
(253, 'S-a inserat o absenta elevului Gatej Andrei, clasa a 10-a B,  la disciplina Informatica , in data de May 9th, 2018.'),
(254, 'S-a inserat o absenta elevului Gatej Andrei, clasa a 10-a B,  la disciplina Informatica , in data de April 19th, 2018.'),
(255, 'S-a inserat nota 10 elevului Gatej Andrei, clasa a 10-a B,  la disciplina Informatica, in data de May 25th, 2018.'),
(256, 'S-a inserat nota 5 elevului pbora2 proba, clasa a 10-a B,  la disciplina Informatica, in data de May 15th, 2018.'),
(257, 'S-a inserat nota 5 elevului pbora2 proba, clasa a 10-a B,  la disciplina Informatica, in data de May 15th, 2018.'),
(258, 'S-a inserat o absenta elevului Pbora2 Proba, clasa a 10-a B,  la disciplina Informatica , in data de May 14th, 2018.'),
(259, 'S-a motivat absenta din data de May 9th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Informatica.'),
(260, 'S-a inserat nota 8 elevului Gatej Andrei, clasa a 10-a B,  la disciplina Matematica, in data de May 2nd, 2018.'),
(261, 'S-a inserat nota 7 elevului Gatej Andrei, clasa a 10-a B,  la disciplina Romana, in data de May 23rd, 2018.'),
(262, 'S-a inserat nota din teza , 9 , elevului Popescu Alexandra, clasa a 12-a C, la disciplina Matematica'),
(263, 'S-a inserat o absenta elevului Popescu Alexandra, clasa a 12-a C,  la disciplina Matematica , in data de April 19th, 2018.'),
(264, 'S-a motivat absenta din data de April 19th, 2018 elevului Popescu Alexandra, clasa a 12-a C, la disciplina Matematica.'),
(265, 'S-a inserat nota din teza , 8 , elevului Popescu Alexandra, clasa a 12-a C, la disciplina Educatie Muzicala'),
(266, 'S-a inserat nota 9 elevului Gatej Andrei, clasa a 10-a B, ela disciplina Educatie Muzicala.'),
(267, 'S-a inserat nota din teza , 5 , elevului Gatej Andrei, clasa a 10-a B, la disciplina Franceza.'),
(268, 'S-a inserat nota din teza , 3 , elevului Gatej Andrei, clasa a 10-a B, la disciplina Fizica.'),
(269, 'S-a inserat nota 8 elevului Gatej Andrei, clasa a 10-a B, ela disciplina Chimie.'),
(270, 'S-a inserat nota din teza , 4 , elevului Gatej Andrei, clasa a 10-a B, la disciplina Matematica.'),
(271, 'S-a inserat nota din teza , 8 , elevului Gatej Andrei, clasa a 10-a B, la disciplina Logica.'),
(272, 'S-a inserat nota din teza , 8 , elevului Gatej Andrei, clasa a 10-a B, la disciplina Cultura Civica.'),
(273, 'S-a inserat nota din teza , 3 , elevului Gatej Andrei, clasa a 10-a B, la disciplina Engleza.'),
(274, 'S-a inserat nota 8 elevului Gatej Andrei, clasa a 10-a B, ela disciplina Engleza.'),
(275, 'S-a inserat nota 7 elevului Gatej Andrei, clasa a 10-a B, ela disciplina Fizica.'),
(276, 'S-a motivat absenta din data de April 19th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Informatica.'),
(277, 'S-a adaugat in clasa a 9 - B elevul elev2 elev1'),
(278, 'S-a adaugat in clasa a 9 - B elevul Nouelev elevNou'),
(279, 'S-a adaugat in clasa a 9 - C elevul elev11 elev11'),
(280, 'S-a adaugat in clasa a 9 - C elevul elev12 elev12'),
(281, 'S-a motivat absenta din data de May 24th, 2018 elevului Doe John, clasa a 9-a D, la disciplina Chimie.'),
(282, 'S-a motivat absenta din data de May 22nd, 2018 elevului Doe John, clasa a 9-a D, la disciplina Chimie.'),
(283, 'S-a motivat absenta din data de April 19th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Informatica.'),
(284, 'S-a motivat absenta din data de May 9th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Informatica.'),
(285, 'S-a motivat absenta din data de April 19th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Informatica.'),
(286, 'S-a motivat absenta din data de May 9th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Informatica.'),
(287, 'S-a motivat absenta din data de April 19th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Informatica.'),
(288, 'S-a motivat absenta din data de April 19th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Informatica.'),
(289, 'S-a motivat absenta din data de May 9th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Informatica.'),
(290, 'S-a motivat absenta din data de April 19th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Informatica.'),
(291, 'S-a motivat absenta din data de May 14th, 2018 elevului pbora2 proba, clasa a 10-a B, la disciplina Informatica.'),
(292, 'S-a motivat absenta din data de May 14th, 2018 elevului pbora2 proba, clasa a 10-a B, la disciplina Informatica.'),
(293, 'S-a motivat absenta din data de May 14th, 2018 elevului pbora2 proba, clasa a 10-a B, la disciplina Informatica.'),
(294, 'S-a motivat absenta din data de May 14th, 2018 elevului pbora2 proba, clasa a 10-a B, la disciplina Informatica.'),
(295, 'S-a motivat absenta din data de May 14th, 2018 elevului pbora2 proba, clasa a 10-a B, la disciplina Informatica.'),
(296, 'S-a motivat absenta din data de May 14th, 2018 elevului pbora2 proba, clasa a 10-a B, la disciplina Informatica.'),
(297, 'S-a motivat absenta din data de May 14th, 2018 elevului pbora2 proba, clasa a 10-a B, la disciplina Informatica.'),
(298, 'S-a motivat absenta din data de May 14th, 2018 elevului pbora2 proba, clasa a 10-a B, la disciplina Informatica.'),
(299, 'S-a motivat absenta din data de May 14th, 2018 elevului pbora2 proba, clasa a 10-a B, la disciplina Informatica.'),
(300, 'S-a motivat absenta din data de May 14th, 2018 elevului pbora2 proba, clasa a 10-a B, la disciplina Informatica.'),
(301, 'S-a motivat absenta din data de May 14th, 2018 elevului pbora2 proba, clasa a 10-a B, la disciplina Informatica.'),
(302, 'S-a motivat absenta din data de May 14th, 2018 elevului pbora2 proba, clasa a 10-a B, la disciplina Informatica.'),
(303, 'S-a motivat absenta din data de May 14th, 2018 elevului pbora2 proba, clasa a 10-a B, la disciplina Informatica.'),
(304, 'S-a motivat absenta din data de May 14th, 2018 elevului pbora2 proba, clasa a 10-a B, la disciplina Informatica.'),
(305, 'S-a motivat absenta din data de May 14th, 2018 elevului pbora2 proba, clasa a 10-a B, la disciplina Informatica.'),
(306, 'S-a motivat absenta din data de May 14th, 2018 elevului pbora2 proba, clasa a 10-a B, la disciplina Informatica.'),
(307, 'S-a inserat nota 8 elevului pbora2 proba, clasa a 10-a B, ela disciplina Matematica.'),
(308, 'S-a motivat absenta din data de May 14th, 2018 elevului pbora2 proba, clasa a 10-a B, la disciplina Informatica.'),
(309, 'S-a motivat absenta din data de May 14th, 2018 elevului pbora2 proba, clasa a 10-a B, la disciplina Informatica.'),
(310, 'S-a motivat absenta din data de May 9th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Informatica.'),
(311, 'S-a motivat absenta din data de May 9th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Informatica.'),
(312, 'S-a motivat absenta din data de May 9th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Informatica.'),
(313, 'S-a inserat o absenta elevului Gatej Andrei, clasa a 10-a B,  la disciplina Biologie , in data de May 15th, 2018.'),
(314, 'S-a inserat o absenta elevului Gatej Andrei, clasa a 10-a B,  la disciplina Biologie , in data de April 29th, 2018.'),
(315, 'S-a motivat absenta din data de May 15th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Biologie.'),
(316, 'S-a motivat absenta din data de May 15th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Biologie.'),
(317, 'S-a motivat absenta din data de May 15th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Biologie.'),
(318, 'S-a motivat absenta din data de May 15th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Biologie.'),
(319, 'S-a motivat absenta din data de May 15th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Biologie.'),
(320, 'S-a motivat absenta din data de May 15th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Biologie.'),
(321, 'S-a motivat absenta din data de May 15th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Biologie.'),
(322, 'S-a motivat absenta din data de April 29th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Biologie.'),
(323, 'S-a motivat absenta din data de May 15th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Biologie.'),
(324, 'S-a motivat absenta din data de April 19th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Informatica.'),
(325, 'S-a motivat absenta din data de May 9th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Informatica.'),
(326, 'S-a inserat o absenta elevului Elev11 Elev11, clasa a 9-a C,  la disciplina Matematica , in data de May 8th, 2018.'),
(327, 'S-a inserat nota 6 elevului elev11 elev11, clasa a 9-a C, ela disciplina Matematica.'),
(328, 'S-a motivat absenta din data de May 25th, 2018 elevului Minune Nume, clasa a 9-a C, la disciplina Biologie.'),
(329, 'S-a motivat absenta din data de May 9th, 2018 elevului Gatej Andrei, clasa a 10-a B, la disciplina Informatica.'),
(330, 'S-a inserat nota din teza , 10 , elevului Gatej Andrei, clasa a 10-a B, la disciplina Biologie.'),
(331, 'S-a inserat nota 8 elevului Gatej Andrei, clasa a 10-a B, ela disciplina Informatica.'),
(332, 'S-a inserat nota 7 elevului Nouelev elevNou, clasa a 9-a B, ela disciplina Educatie Muzicala.'),
(333, 'S-a motivat absenta din data de June 2nd, 2018 elevului Gatej Andrei, clasa a 9-a B, la disciplina Informatica.'),
(334, 'S-a inserat nota 8 elevului Andrei andiae, clasa a 9-a D, ela disciplina Matematica.'),
(335, 'S-a inserat nota din teza , 9 , elevului Andrei andiae, clasa a 9-a D, la disciplina Matematica.'),
(336, 'S-a inserat nota 9 elevului Doe John, clasa a 9-a D, ela disciplina Matematica.'),
(337, 'S-a inserat nota 7 elevului Doe John, clasa a 9-a D, ela disciplina Matematica.'),
(338, 'S-a inserat nota din teza , 8 , elevului Doe John, clasa a 9-a D, la disciplina Romana.'),
(339, 'S-a motivat absenta din data de May 23rd, 2018 elevului Doe John, clasa a 9-a D, la disciplina Chimie.'),
(340, 'S-a inserat o absenta elevului Gatej Andrei, clasa a 10-a B,  la disciplina Psihologie , in data de May 15th, 2018.'),
(341, 'S-a adagat profesorul Gagica Mea Marian, la disciplina Mate \''),
(342, 'S-a inserat nota din teza , 10 , elevului elev12 elev12, clasa a 9-a C, la disciplina Matematica.'),
(343, 'S-a inserat nota din teza , 11 , elevului elev12 elev12, clasa a 9-a C, la disciplina Matematica.'),
(344, 'S-a inserat nota 13 elevului elev12 elev12, clasa a 9-a C, ela disciplina Matematica.'),
(345, 'S-a inserat nota din teza , 10 , elevului elev12 elev12, clasa a 9-a C, la disciplina Matematica.'),
(346, 'S-a inserat o absenta elevului Proba2 Proba2, clasa a 9-a D,  la disciplina Matematica , in data de May 25th, 2018.'),
(347, 'S-a inserat nota 10 elevului proba2 proba2, clasa a 9-a D, ela disciplina Matematica.'),
(348, 'S-a inserat nota 10 elevului proba2 proba2, clasa a 9-a D, ela disciplina Matematica.'),
(349, 'S-a adagat profesorul Test Profesor Nou , la disciplina Matematica'),
(350, 'S-a inserat nota 12 elevului Pintilie Ilie, clasa a 11-a C, ela disciplina Matematica.'),
(351, 'S-a inserat nota din teza , 0 , elevului Pintilie Ilie, clasa a 11-a C, la disciplina Matematica.'),
(352, 'S-a adagat profesorul Stoenescu Catalin, la disciplina Sexologie'),
(353, 'S-a inserat nota din teza , 5 , elevului elev12 elev12, clasa a 9-a C, la disciplina Sexologie.'),
(354, 'S-a inserat nota din teza , 5 , elevului elev12 elev12, clasa a 9-a C, la disciplina Romana.');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `newsfeed`
--

CREATE TABLE `newsfeed` (
  `id` int(6) UNSIGNED NOT NULL,
  `informatie` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `newsFeed`
--

CREATE TABLE `newsFeed` (
  `id` int(11) NOT NULL,
  `informatie` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `note`
--

CREATE TABLE `note` (
  `idn` int(11) NOT NULL,
  `disciplina` varchar(80) NOT NULL,
  `nota` varchar(80) NOT NULL,
  `datant` date DEFAULT NULL,
  `elev` smallint(5) UNSIGNED NOT NULL,
  `teza` tinyint(1) DEFAULT NULL,
  `notateza` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `note`
--

INSERT INTO `note` (`idn`, `disciplina`, `nota`, `datant`, `elev`, `teza`, `notateza`) VALUES
(1, 'Matematica', '10', '2018-04-28', 9, NULL, NULL),
(2, 'Matematica', '10', '2018-04-28', 9, NULL, NULL),
(3, 'Matematica', '10', '2018-04-28', 9, NULL, NULL),
(8, 'Chimie', '5', '2018-04-29', 9, NULL, NULL),
(9, 'Informatica', '7', '2018-05-15', 19, NULL, NULL),
(10, 'Fizica', '8', '2018-05-13', 19, NULL, NULL),
(11, 'Fizica', '10', '2018-05-23', 19, NULL, NULL),
(12, 'Fizica', '10', '2018-05-01', 9, NULL, NULL),
(14, 'Romana', '10', '2018-05-22', 9, NULL, NULL),
(15, 'Romana', '8', '2018-04-17', 4, NULL, NULL),
(16, 'Romana', '9', '2018-05-23', 4, NULL, NULL),
(17, 'Logica', '7', '2018-05-23', 12, NULL, NULL),
(18, 'Fizica', '2', '2018-05-29', 12, NULL, NULL),
(19, 'Educatie Plastica', '7', '2018-05-20', 12, NULL, NULL),
(20, 'Educatie Muzicala', '2', '2018-05-15', 2, NULL, NULL),
(21, 'Matematica', '10', '2018-05-15', 2, NULL, NULL),
(22, 'Educatie Fizica', '7', '2018-05-07', 2, NULL, NULL),
(23, 'Matematica', '5', '2018-06-09', 2, NULL, NULL),
(24, 'Franceza', '10', '2018-06-02', 2, NULL, NULL),
(25, 'Engleza', '8', '2018-05-23', 25, NULL, NULL),
(26, 'Engleza', '10', '2018-05-06', 25, NULL, NULL),
(27, 'Fizica', '7', '2018-05-06', 17, NULL, NULL),
(28, 'Fizica', '9', '2018-05-19', 17, NULL, NULL),
(29, 'Romana', '8', '2018-05-22', 11, NULL, NULL),
(30, 'Romana', '1', '2018-05-23', 11, NULL, NULL),
(31, 'Logica', '6', '2018-05-08', 17, NULL, NULL),
(32, 'Educatie Muzicala', '9', '2018-05-15', 5, NULL, NULL),
(33, 'Educatie Muzicala', '10', '2018-05-15', 5, NULL, NULL),
(34, 'Educatie Muzicala', '4', '2018-05-15', 5, NULL, NULL),
(35, 'Fizica', '2', '2018-05-17', 12, NULL, NULL),
(36, 'Fizica', '4', '2018-05-07', 12, NULL, NULL),
(37, 'Matematica', '2', '2018-05-16', 12, NULL, NULL),
(38, 'Matematica', '1', '2018-05-22', 12, NULL, NULL),
(39, 'Matematica', '2', '2018-05-16', 12, NULL, NULL),
(40, 'Educatie Fizica', '1', '2018-05-08', 12, NULL, NULL),
(41, 'Educatie Fizica', '3', '2018-05-08', 12, NULL, NULL),
(42, 'Informatica', '7', '2018-05-07', 12, NULL, NULL),
(43, 'Informatica', '7', '2018-05-16', 4, NULL, NULL),
(44, 'Informatica', '10', '2018-05-08', 4, NULL, NULL),
(45, 'Informatica', '2', '2018-05-16', 4, NULL, NULL),
(46, 'Matematica', '3', '2018-05-24', 11, NULL, NULL),
(47, 'Educatie Muzicala', '10', '2018-05-08', 11, NULL, NULL),
(48, 'Educatie Muzicala', '10', '2018-05-06', 11, NULL, NULL),
(49, 'Educatie Fizica', '8', '2018-05-17', 11, NULL, NULL),
(50, 'Educatie Fizica', '7', '2018-08-07', 11, NULL, NULL),
(51, 'Educatie Fizica', '1', '2018-05-06', 11, NULL, NULL),
(52, 'Romana', '6', '2018-05-15', 27, NULL, NULL),
(53, 'Romana', '10', '2018-05-16', 27, NULL, NULL),
(54, 'Matematica', '7', '2018-05-09', 27, NULL, NULL),
(55, 'Matematica', '8', '2018-05-16', 27, NULL, NULL),
(57, 'Educatie Fizica', '7', '2018-04-27', 29, NULL, NULL),
(58, 'Logica', '5', '2018-05-10', 28, NULL, NULL),
(59, 'Logica', '4', '2018-05-06', 28, NULL, NULL),
(60, 'Logica', '10', '2018-05-17', 28, NULL, NULL),
(61, 'Matematica', '10', '2018-05-22', 18, NULL, NULL),
(62, 'Matematica', '8', '2018-05-29', 18, NULL, NULL),
(63, 'Fizica', '9', '2018-04-19', 17, NULL, NULL),
(66, 'Educatie Fizica', '10', '2018-05-02', 9, NULL, NULL),
(67, 'Educatie Fizica', '9', '2018-05-02', 9, NULL, NULL),
(68, 'Educatie Fizica', '8', '2018-05-02', 9, NULL, NULL),
(69, 'Matematica', '2', '2018-05-17', 22, NULL, NULL),
(70, 'Matematica', '8', '2018-05-03', 22, NULL, NULL),
(73, 'Romana', '8', '2018-05-01', 9, 1, NULL),
(75, 'Informatica', '8', '2018-05-01', 1, NULL, NULL),
(76, 'Informatica', '3', '2018-05-02', 1, NULL, NULL),
(77, 'Istorie', '7', '2018-05-01', 9, NULL, NULL),
(78, 'Istorie', '10', '2018-05-01', 9, 1, NULL),
(79, 'Educatie Fizica', '2', '2018-05-15', 19, NULL, NULL),
(80, 'Educatie Fizica', '3', '2018-05-08', 19, 1, NULL),
(81, 'Matematica', '3', '2018-05-09', 18, NULL, NULL),
(82, 'Matematica', '7', '2018-05-14', 18, 1, NULL),
(83, 'Romana', '5', '2018-05-08', 19, NULL, NULL),
(84, 'Informatica', '3', '2018-04-30', 19, NULL, NULL),
(85, 'Informatica', '1', '2018-05-08', 19, 1, NULL),
(86, 'Geografie', '3', '2018-05-02', 19, NULL, NULL),
(87, 'Geografie', '4', '2018-05-18', 19, NULL, NULL),
(88, 'Geografie', '10', '2018-05-22', 19, 1, NULL),
(89, 'Geografie', '6', '2018-05-30', 9, NULL, NULL),
(90, 'Informatica', '6', '2018-05-02', 26, NULL, NULL),
(91, 'Informatica', '9', '2018-06-01', 26, NULL, NULL),
(92, 'Informatica', '10', '2018-05-22', 26, 1, NULL),
(93, 'Matematica', '5', '2018-05-02', 26, NULL, NULL),
(94, 'Matematica', '7', '2018-05-24', 26, NULL, NULL),
(95, 'Fizica', '3', '2018-05-07', 3, NULL, NULL),
(96, 'Fizica', '5', '2018-05-16', 3, 1, NULL),
(97, 'Franceza', '10', '2018-05-22', 3, NULL, NULL),
(98, 'Desen', '8', '2018-05-17', 3, NULL, NULL),
(99, 'Desen', '10', '2018-05-07', 3, NULL, NULL),
(100, 'Desen', '8', '2018-05-29', 3, 1, NULL),
(101, 'Desen', '7', '2018-05-07', 11, NULL, NULL),
(102, 'Desen', '9', '2018-05-07', 11, NULL, NULL),
(104, 'Educatie Muzicala', '9', '2018-05-08', 11, NULL, NULL),
(106, 'Matematica', '5', '2018-05-23', 27, NULL, NULL),
(107, 'Matematica', '9', '2018-04-30', 27, 1, NULL),
(108, 'Matematica', '7', '2018-05-17', 1, NULL, NULL),
(109, 'Matematica', '6', '2018-05-03', 1, 1, NULL),
(110, 'Educatie Fizica', '6', '2018-05-10', 11, NULL, NULL),
(111, 'Educatie Fizica', '5', '2018-05-03', 11, 1, NULL),
(112, 'Educatie Antreprenoriala', '10', '2018-05-02', 30, NULL, NULL),
(113, 'Educatie Antreprenoriala', '10', '2018-05-16', 30, NULL, NULL),
(114, 'Educatie Antreprenoriala', '10', '2018-05-01', 30, 1, NULL),
(115, 'Educatie Muzicala', '6', '2018-05-09', 11, NULL, NULL),
(116, 'Educatie Muzicala', '10', '2018-05-12', 11, 1, NULL),
(117, 'Psihologie', '8', '2018-05-03', 15, NULL, NULL),
(118, 'Psihologie', '8', '2018-05-03', 15, 1, NULL),
(122, 'Desen', '10', '2018-05-10', 11, NULL, NULL),
(124, 'Romana', '4', '2018-05-03', 18, NULL, NULL),
(125, 'Educatie Muzicala', '10', '2018-05-11', 11, NULL, NULL),
(126, 'Franceza', '10', '2018-05-03', 9, NULL, NULL),
(127, 'Educatie Tehnologica', '7', '2018-05-22', 9, NULL, NULL),
(129, 'Educatie Tehnologica', '9', '2018-05-10', 9, 1, NULL),
(132, 'Cultura Civica', '6', '2018-05-10', 1, NULL, NULL),
(133, 'Cultura Civica', '5', '2018-05-02', 1, NULL, NULL),
(134, 'Educatie Antreprenoriala', '9', '2018-05-23', 1, NULL, NULL),
(135, 'Educatie Antreprenoriala', '9', '2018-05-01', 1, NULL, NULL),
(136, 'Educatie Antreprenoriala', '2', '2018-05-01', 1, 1, NULL),
(137, 'Educatie Muzicala', '3', '2018-05-11', 1, NULL, NULL),
(139, 'Desen', '6', '2018-05-24', 1, 1, NULL),
(142, 'Educatie Muzicala', '8', '2018-05-09', 9, 1, NULL),
(143, 'Educatie Muzicala', '7', '2018-05-16', 9, NULL, NULL),
(144, 'Educatie Muzicala', '9', '2018-05-01', 9, NULL, NULL),
(147, 'Fizica', '9', '2018-05-09', 9, NULL, NULL),
(148, 'Educatie Tehnologica', '7', '2018-05-24', 9, NULL, NULL),
(149, 'Chimie', '9', '2018-05-16', 9, 1, NULL),
(150, 'Matematica', '8', '2018-05-30', 11, NULL, NULL),
(151, 'Matematica', '10', '2018-05-16', 11, 1, NULL),
(152, 'Matematica', '9', '2018-05-02', 11, NULL, NULL),
(154, 'Franceza', '5', '2018-05-02', 26, 1, NULL),
(155, 'Franceza', '4', '2018-05-10', 26, NULL, NULL),
(156, 'Franceza', '2', '2018-05-08', 26, NULL, NULL),
(157, 'Franceza', '1', '2018-05-02', 26, NULL, NULL),
(158, 'Geografie', '9', '2018-05-04', 9, NULL, NULL),
(159, 'Informatica', '10', '2018-05-04', 9, NULL, NULL),
(160, 'Consiliere', '9', '2018-05-04', 9, NULL, NULL),
(161, 'TIC', '7', '2018-05-03', 9, NULL, NULL),
(162, 'Consiliere', '10', '2018-05-04', 30, NULL, NULL),
(163, 'TIC', '7', '2018-05-04', 30, NULL, NULL),
(164, 'TIC', '10', '2018-05-04', 18, NULL, NULL),
(165, 'Educatie Antreprenoriala', '10', '2018-05-04', 18, NULL, NULL),
(166, 'Educatie Fizica', '4', '2018-05-04', 18, NULL, NULL),
(167, 'Franceza', '7', '2018-05-04', 9, NULL, NULL),
(168, 'Istorie', '9', '2018-05-04', 9, 1, NULL),
(169, 'Consiliere', '4', '2018-05-04', 9, NULL, NULL),
(171, 'Cultura Civica', '8', '2018-05-04', 9, NULL, NULL),
(180, 'Educatie Fizica', '3', '2018-05-09', 9, NULL, NULL),
(186, 'Matematica', '7', '2018-05-03', 29, 1, NULL),
(187, 'Matematica', '10', '2018-05-08', 31, NULL, NULL),
(188, 'Informatica', '3', '2018-05-09', 30, NULL, NULL),
(189, 'Romana', '8', '2018-05-17', 29, 1, NULL),
(190, 'Informatica', '10', '2018-05-23', 35, NULL, NULL),
(191, 'Informatica', '8', '2018-04-29', 35, 1, NULL),
(192, 'Matematica', '7', '2018-05-07', 35, NULL, NULL),
(193, 'Matematica', '10', '2018-05-12', 44, NULL, NULL),
(194, 'Matematica', '3', '2018-05-07', 2, 1, NULL),
(195, 'Informatica', '7', '2018-05-16', 2, NULL, NULL),
(196, 'Chimie', '8', '2018-05-01', 2, NULL, NULL),
(197, 'Romana', '8', '2018-05-01', 11, NULL, NULL),
(198, 'Informatica', '9', '2018-05-08', 11, 1, NULL),
(199, 'Franceza', '3', '2018-05-29', 11, NULL, NULL),
(200, 'Logica', '9', '2018-05-16', 11, NULL, NULL),
(201, 'Fizica', '3', '2018-05-08', 29, NULL, NULL),
(202, 'Matematica', '6', '2018-05-20', 11, NULL, NULL),
(203, 'Informatica', '3', '2018-05-09', 11, NULL, NULL),
(204, 'Educatie Muzicala', '5', '2018-05-15', 11, NULL, NULL),
(205, 'Educatie Fizica', '8', '2018-05-17', 11, NULL, NULL),
(206, 'Franceza', '', '2018-05-08', 29, 0, NULL),
(207, 'Cultura Civica', '9', '2018-05-09', 11, NULL, NULL),
(208, 'Logica', '9', '2018-05-24', 11, 1, NULL),
(221, 'TIC', '', '2018-05-08', 29, NULL, NULL),
(222, 'Psihologie', '', '2018-05-22', 29, NULL, NULL),
(224, 'Informatica', '', '2018-05-09', 45, NULL, NULL),
(225, 'Informatica', '', '2018-04-19', 45, NULL, NULL),
(229, 'Informatica', '', '2018-05-14', 23, NULL, NULL),
(238, 'Informatica', '7', '2018-05-15', 44, NULL, NULL),
(239, 'Educatie Muzicala', '8', '2018-05-02', 44, 1, NULL),
(240, 'Educatie Muzicala', '9', '2018-05-16', 45, NULL, NULL),
(241, 'Franceza', '5', '2018-05-24', 45, 1, NULL),
(242, 'Fizica', '3', '2018-05-18', 45, 1, NULL),
(243, 'Chimie', '8', '2018-05-22', 45, NULL, NULL),
(244, 'Matematica', '4', '2018-05-23', 45, 1, NULL),
(245, 'Logica', '8', '2018-05-03', 45, 1, NULL),
(246, 'Cultura Civica', '8', '2018-05-08', 45, 1, NULL),
(247, 'Engleza', '3', '2018-05-01', 45, 1, NULL),
(248, 'Engleza', '8', '2018-05-01', 45, NULL, NULL),
(249, 'Fizica', '7', '2018-05-09', 45, NULL, NULL),
(250, 'Matematica', '8', '2018-05-01', 23, NULL, NULL),
(251, 'Matematica', '6', '2018-05-08', 48, NULL, NULL),
(252, 'Biologie', '10', '2018-05-01', 45, 1, NULL),
(253, 'Informatica', '8', '2018-05-09', 45, NULL, NULL),
(254, 'Educatie Muzicala', '7', '2018-05-10', 47, NULL, NULL),
(255, 'Matematica', '8', '2018-05-15', 39, NULL, NULL),
(256, 'Matematica', '9', '2018-05-15', 39, 1, NULL),
(257, 'Matematica', '9', '2018-05-13', 9, NULL, NULL),
(258, 'Matematica', '7', '2018-05-15', 9, NULL, NULL),
(259, 'Romana', '8', '2018-05-15', 9, 1, NULL),
(260, 'Matematica', '10', '2018-05-01', 49, 1, NULL),
(261, 'Matematica', '11', '2018-05-15', 49, 1, NULL),
(262, 'Matematica', '13', '2018-05-15', 49, NULL, NULL),
(263, 'Matematica', '10', '2018-05-15', 49, 1, NULL),
(264, 'Matematica', '10', '2018-05-31', 38, NULL, NULL),
(265, 'Matematica', '10', '2018-05-31', 38, NULL, NULL),
(266, 'Matematica', '12', '2021-02-09', 30, NULL, NULL),
(267, 'Matematica', '0', '2018-08-02', 30, 1, NULL),
(268, 'Sexologie', '5', '2018-05-24', 49, 1, NULL),
(269, 'Romana', '5', '2018-05-18', 49, 1, NULL);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `profesori`
--

CREATE TABLE `profesori` (
  `idp` int(11) NOT NULL,
  `prenume` varchar(80) NOT NULL,
  `nume` varchar(80) NOT NULL,
  `disciplina` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `profesori`
--

INSERT INTO `profesori` (`idp`, `prenume`, `nume`, `disciplina`, `email`) VALUES
(8, 'È˜tefan', 'È˜oimarescu', 'Matematica', 'stephan@hawking.co.uk'),
(17, 'NoulProf', 'Prof', 'Fizica', 'prof3@yahoo.com'),
(18, 'Marian', 'Gagica Mea', 'Mate \'', 'asd@yahoo.com'),
(19, 'Profesor Nou ', 'Test', 'Matematica', 'dsdada'),
(20, 'Catalin', 'Stoenescu', 'Sexologie', 'Stoenescu@boss.com');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `uploading`
--

CREATE TABLE `uploading` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `uploading`
--

INSERT INTO `uploading` (`id`, `name`, `email`, `file_name`) VALUES
(1, 'draci', 'mucu@jsjsdj.com', 'img/456424logo_casa_v2.png'),
(2, 'dss', 'bababa@gmail.eu', 'img/514805ccc.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absente`
--
ALTER TABLE `absente`
  ADD PRIMARY KEY (`idn`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`idc`);

--
-- Indexes for table `elevi`
--
ALTER TABLE `elevi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myNews`
--
ALTER TABLE `myNews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsfeed`
--
ALTER TABLE `newsfeed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsFeed`
--
ALTER TABLE `newsFeed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`idn`);

--
-- Indexes for table `profesori`
--
ALTER TABLE `profesori`
  ADD PRIMARY KEY (`idp`);

--
-- Indexes for table `uploading`
--
ALTER TABLE `uploading`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absente`
--
ALTER TABLE `absente`
  MODIFY `idn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `clase`
--
ALTER TABLE `clase`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elevi`
--
ALTER TABLE `elevi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `myNews`
--
ALTER TABLE `myNews`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=355;

--
-- AUTO_INCREMENT for table `newsfeed`
--
ALTER TABLE `newsfeed`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsFeed`
--
ALTER TABLE `newsFeed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `idn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `profesori`
--
ALTER TABLE `profesori`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `uploading`
--
ALTER TABLE `uploading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
