-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Sty 2021, 20:15
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `dbwypozyczalnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochody`
--

CREATE TABLE `samochody` (
  `id_samochodu` int(11) NOT NULL,
  `marka` text COLLATE utf8_polish_ci NOT NULL,
  `model` text COLLATE utf8_polish_ci NOT NULL,
  `rocznik` year(4) NOT NULL,
  `kolor` text COLLATE utf8_polish_ci NOT NULL,
  `pojemnosc` text COLLATE utf8_polish_ci NOT NULL,
  `moc` int(11) NOT NULL,
  `cena_doba` double NOT NULL,
  `spalanie` double NOT NULL,
  `typ_nadwozia` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `samochody`
--

INSERT INTO `samochody` (`id_samochodu`, `marka`, `model`, `rocznik`, `kolor`, `pojemnosc`, `moc`, `cena_doba`, `spalanie`, `typ_nadwozia`) VALUES
(1, 'Toyota', 'Yaris', 2010, 'Szary', '1.4', 100, 59, 4.4, 'Kompakt'),
(2, 'Opel', 'Astra', 2013, 'Czarny', '1.7', 110, 72, 5.4, 'Hatchback'),
(3, 'Renault', 'Captur', 2019, 'Biały', '1.0', 100, 75, 5.1, 'SUV'),
(4, 'Opel', 'Astra', 2015, 'Czarny', '1.6', 115, 89, 5.5, 'Kombi'),
(5, 'KIA', 'Sportage', 2020, 'Czarny', '1.6', 132, 99, 8.1, 'SUV');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'aerkqpwo@gmail.com', '$2y$10$5wPIX2yQZUJ7/T.AAjWUAuVtZ.iaAGY2E6/NfyS8NBB4wqeS0ITsS'),
(2, 'jdpfjs@gmasil.com', '$2y$10$dUesDlgRWQYfUH/sVO3/UeGzKqYSR8vXfWI0h7P3k17i5/Z.r5OXS'),
(3, 'ochman.wiktoria@wp.pl', '$2y$10$A7sYfObJY38598ZN.hJtE..vOTEWuZVPW87IYTkWYeS//jr.BZRpW'),
(4, 'elomelo@loloo.pl', '$2y$10$GmjtyeoDeYLeRDgip0jdOebOQ6OSObvNDYf0/AlMzL4lhHGAQxGFa'),
(5, 'sadfasdfa@sav.com', '$2y$10$OVMXleTEwWI1sS2D7wdSg.CVvbdEqAuqgSsXHm0xgWTDry6.aL.1K'),
(6, 'sdfg@asg.com', '$2y$10$O6dCJ5M9yCyP8ToxSozn0.336eIU1eoinHGm28ao.sa5PrN729Fnq'),
(7, 'sfg@asg.com', '$2y$10$SZwsQqpjIoJqpfv09LrkHO8sge1odpD32GstgpXV8G9KS4vqBIY7u'),
(8, 'kamilaochman206@gmail.com', '$2y$10$at1OQyGAHj9JhgowujhPNOQrCql7Yli1GbD45fnip9CweXRaMJKU2'),
(9, 'dfggh@dhgfg.com', '$2y$10$EBNRdvXNI2eqQ9izYMkii.jbB6PCNL2j.zH1ZvzcbcQNSp6r9K7ty'),
(10, 'qwer@qwer.com', '$2y$10$eT9oVTQnpT.Ufji7okW8lOJgMujAbhkpRtJT3B1kS7OLDk0JNjCXi');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wypozyczenia`
--

CREATE TABLE `wypozyczenia` (
  `id_wypozyczenia` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `id_samochodu` int(11) NOT NULL,
  `ilosc_dni` int(11) NOT NULL,
  `wartosc_zamowienia` double NOT NULL,
  `data_zamowienia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wypozyczenia`
--

INSERT INTO `wypozyczenia` (`id_wypozyczenia`, `id_uzytkownika`, `id_samochodu`, `ilosc_dni`, `wartosc_zamowienia`, `data_zamowienia`) VALUES
(1, 1, 5, 2, 198, '2020-11-25'),
(2, 1, 5, 3, 297, '2020-11-25'),
(7, 3, 1, 6, 354, '2020-11-25'),
(10, 3, 3, 10, 750, '2020-11-25'),
(11, 1, 5, 123, 12177, '2020-11-27'),
(15, 1, 1, 156516, 9234444, '2021-01-04');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `samochody`
--
ALTER TABLE `samochody`
  ADD PRIMARY KEY (`id_samochodu`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD PRIMARY KEY (`id_wypozyczenia`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `samochody`
--
ALTER TABLE `samochody`
  MODIFY `id_samochodu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  MODIFY `id_wypozyczenia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
