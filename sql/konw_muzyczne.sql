-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Lip 2020, 22:47
-- Wersja serwera: 10.1.13-MariaDB
-- Wersja PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `konw_muzyczne`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `common_desc_id` int(10) UNSIGNED DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`id`, `common_desc_id`, `img`) VALUES
(1, 2, '/images/oferta-ikony/dzieci.jpg'),
(2, 2, '/images/oferta-ikony/dorosli.jpg'),
(3, 2, '/images/oferta-ikony/senior.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category_translation`
--

CREATE TABLE `category_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL DEFAULT '2',
  `category_id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `long_desc` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `category_translation`
--

INSERT INTO `category_translation` (`id`, `languages_id`, `category_id`, `category`, `long_desc`) VALUES
(1, 1, 1, 'dla dzieci', '<p>Wierzymy, że aby edukacja była skuteczna, potrzebny jest dobry kontakt z nauczycielem. Bez ocen i egzaminów. Pakiet startowy to 4 lekcje, aby spróbować pracy z wybranym nauczycielem. Poznać jego metody pracy, dynamikę zajęć oraz zobaczyć czy to jest najlepszy nauczyciel dla dziecka. Potem jest możliwość spróbować pracy z drugim nauczycielem. Uważnie słuchamy dziecka, a dla rodziców jest to sprawdzenie czy dziecko chętnie uczestniczy w zajęciach, czy cieszy się na myśl o lekcjach, czy wolałoby mieć dłuższe lekcje.</p>\r\n<p>Koszt pakietu 4 lekcje to 300zł</p>\r\n<p>W naszej szkole rozpoznając naukę stacjonarnie na początku nie trzeba mieć własnego instrumentu. Podczas pierwszego spotkania doradzamy wybór instrumentu. Dzieci wędrują po szkole i próbują grać na różnych, sprawdzamy co je zachwyci i zainteresuje.</p>\r\n<p>Zajęcia online są dostępne z uwzględnieniem występujących różnic czasu. Zajęcia przeznaczone są zarówno dla dzieci początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>'),
(2, 1, 2, 'dla dorosłych', '<p>Wierzymy, że aby edukacja była skuteczna, potrzebny jest dobry kontakt z nauczycielem. Bez ocen i egzaminów. Pakiet startowy to 4 lekcje, aby spróbować pracy z wybranym nauczycielem. Poznać jego metody pracy, dynamikę zajęć oraz zobaczyć czy to jest najlepszy nauczyciel dla Państwa. Potem jest możliwość spróbować pracy z drugim nauczycielem.</p>\r\n<p>Koszt pakietu 4 lekcje to 300zł</p>\r\n<p>Wiele osób marzyło o tym, aby grać, ale nie miało takiej możliwości. W dzisiejszym świecie cały czas się spieszymy. Gonią nas terminy, projekty i zadania do zrealizowania, kolejne sprawdziany, ważne egzaminy i cały czas nowe rzeczy do nauczenia się, zapamiętania. Stałe podnoszenie kwalifikacji to zadania i cele do osiągnięcia w wyznaczonym terminie. Powszechny jest brak czasu dla rodziny, przyjaciół i samego siebie.</p>\r\n<p>W pogoni za sukcesem, zapominamy o najważniejszym – o Sobie. Dzięki muzyce można oderwać się od codzienności i przenieść się w inny świat.</p>\r\n<p>W Konwersatorium mamy specjalne programy dla dorosłych, którzy chcą nauczyć się grać i śpiewać od podstaw, albo wrócić do instrumentu, na którym grali w dzieciństwie i mieli przerwę. Zajęcia prowadzone są w komfortowych warunkach. Nauczyciele z pasją i radością przekazują wiedze. Mamy dużo utworów do grania w duecie z nauczycielem, wiec nie są to żmudne ćwiczenia techniczne, lecz wspólne tworzenie muzyki. Bez ocen i egzaminów.</p>\r\n<p>Zajęcia online są dostępne z uwzględnieniem występujących różnic czasu. Zajęcia przeznaczone są zarówno dla osób dorosłych początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>'),
(3, 1, 3, 'dla seniorów', '<p>Spełnij marzenie! Zawsze chciałeś grać? Nie było czasu? Zabrakło możliwości? Zapraszamy na nowy program nauki gry dedykowany dla osób 50+. Nasi słuchacze mają 60+, 70+ i nawet 80+ bo nigdy nie jest za późno aby rozpocząć przygodę z muzyką.</p>\r\n<p>Wierzymy, że aby edukacja była skuteczna, potrzebny jest dobry kontakt z nauczycielem. Bez ocen i egzaminów. Pakiet startowy to 4 lekcje, aby spróbować pracy z wybranym nauczycielem. Poznać jego metody pracy, dynamikę zajęć oraz zobaczyć czy to jest najlepszy nauczyciel dla Państwa. Potem jest możliwość spróbować pracy z drugim nauczycielem.</p>\r\n<p>Koszt pakietu 4 lekcje to 300zł</p>\r\n<p>Jak dowodzą najnowsze badania naukowe, granie na instrumencie rozwija mózg, zapobiega chorobie Alzhaimera i poprawia zdolność manualne.</p>\r\n<p>Lekcje prowadzone są w przyjaznej, rodzinnej atmosferze. Nauczyciele z pasją i radością przekazują wiedze. Bez ocen i egzaminów. Na zajęciach mamy dużo utworów do grania w duecie z nauczycielem, wiec nie są to żmudne ćwiczenia techniczne, lecz wspólne tworzenie muzyki. Lekcje są pełne radości i satysfakcji z rozwoju własnych umiejętności.</p>\r\n<p>Zajęcia online są dostępne z uwzględnieniem występujących różnic czasu. Zajęcia przeznaczone są zarówno dla osób dorosłych 50+ początkującyc,h jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>'),
(4, 2, 1, 'classes for children', '<p>We believe that an effective education is based on a good relationship with a teacher, without grades or exams. A starter package consists of 4 lessons as a trial to establish a working relationship with a selected teacher, to learn his teaching methods and class dynamics, and to see if it really is the best teacher for your child. Later, if it doesn’t work, you can check another teacher. We listen to children’s feedback carefully. It is also a chance for you to see if your child willingly attend classes, is happy about learning process or would prefer to have longer lessons.</p>\r\n<p>Afraid of commitments? Try a starter package - 4 lessons to check what''s best for your child!</p>\r\n<p>Now special price - 99€ for 4 lessons</p>\r\n<p>In our school, while commencing a full-time education, you don’t need to have your own instrument. During the first meeting, we will advise you an appropriate instrument. In the meantime your children can wander around the school, try playing different instrument. This way we can check what delights and interests them.</p>\r\n<p>Online lessons are available in accordance with time zone differences. Lessons are intended for first-timers, beginners, and advanced players. Learning materials – everything you need you will receive by email. Online lessons are adjusted to individual needs of every student – live in an agreed time. Lessons are available in English.</p>'),
(5, 2, 2, 'classes for adults', '<p>Many people dreamed about playing an instrument, but it was never possible. In today’s world we are always in a hurry. We are chased by deadlines, projects, tasks to be carried out, important exams and new things to learn and remember all the time. A constant improvement of qualifications requires achieving tasks and goals in a certain time. A lack of time for family, friends and yourself is very common.</p>\r\n<p>In a pursuit of success, we forget about the most important - ourselves. Thanks to music, you can break away from everyday life and move to another world.</p>\r\n<p>At the Music Conversatory, we have special programs designed for adults who want to learn to play or sing from scratch, or to return and relearn hot to play an instrument after a long break. Classes are conducted in comfortable conditions. Teachers share their knowledge with joy and passion. We have a lot of songs to play in a duet with a teacher, so these are not tedious technical exercises, but a pleasure of creating music together. Without grades or exams.</p>\r\n<p>Online lessons are available in accordance with time zone differences. Lessons are intended for adult first-timers, beginners, and advanced players. Learning materials – everything you need you will receive by email. Online lessons are adjusted to individual needs of every student – live in an agreed time. Lessons are available in Polish or English.</p>'),
(6, 2, 3, 'classes for seniors', '<p>Make your dream come true! Have you always wanted to play? There was no time? No opportunities? We invite you to enroll to our new music program designed for adults 50+. Our students are 60+, 70+ and even 80+ because it is never too late to start an adventure with music.</p>\r\n<p>According to the latest scientific research, playing an instrument develops brain, prevents Alzheimer''s disease and improves manual ability.</p> \r\n<p>The lessons are conducted in a friendly, family atmosphere. Teachers share their knowledge with joy andd passion. Without grades and exams. We have a lot of songs to play in a duet with a teacher, so these are not tedious technical exercises, but a pleasure of creating music together. Lessons are full of joy and satisfaction of developing own skills.</p>\r\n<p>Online lessons are available in accordance with time zone differences. Lessons are intended for adult first-timers, beginners, and advanced players over 50 years old. Learning materials – everything you need you will receive by email. Online lessons are adjusted to individual needs of every student – live in an agreed time. Lessons are available in Polish or English.</p>'),
(7, 3, 1, 'cho trẻ em', ''),
(8, 3, 2, 'dành cho người lớn', ''),
(9, 3, 3, 'cho người cao niên', ''),
(10, 4, 1, '为了孩子', ''),
(11, 4, 2, '成人', ''),
(12, 4, 3, '資深的', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `common_desc`
--

CREATE TABLE `common_desc` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `common_desc`
--

INSERT INTO `common_desc` (`id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `common_desc_translation`
--

CREATE TABLE `common_desc_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `common_desc_id` int(10) UNSIGNED NOT NULL,
  `common_desc` varchar(1500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `common_desc_translation`
--

INSERT INTO `common_desc_translation` (`id`, `languages_id`, `common_desc_id`, `common_desc`) VALUES
(1, 1, 1, '<p>Zapisy i informacje 883 489 184</p>'),
(2, 1, 2, '<p><b>ZAPISZ SIĘ JUŻ TERAZ!</p><p>Liczba miejsc ograniczona. Zacznij grać i spełnij marzenia. Zapisy i informacje 883 489 184</b></p><p><b>Chcesz mieć pewność? Wypróbuj pakiet startowy – 4 lekcje, aby przekonać się czy to jest najlepszy nauczyciel dla Ciebie!</b></p><p>Koszt pakietu 4 lekcje to 300zł.</p><p>Lekcje prowadzimy w secesyjnej kamienicy w centrum Warszawy, a teraz także online – zajęcia dostępne w całej Polsce oraz na świecie. Zajęcia online są dostępne z uwzględnieniem występujących różnic czasu.</p>'),
(3, 1, 3, '<p><b>ZAPISZ SWOJE DZIECKO JUŻ TERAZ!<br>Liczba miejsc ograniczona. Niech Twoje dziecko zacznie grać i spełni marzenia. Zapisy i informacje 883 489 184</b></p><p><b>Chcesz mieć gwarancje? Wypróbuj pakiet startowy – 4 lekcje, aby przekonać się czy to jest najlepszy nauczyciel dla Twojego dziecka!</b></p><p>Koszt pakietu 4 lekcje to 300zł</p>'),
(4, 2, 1, ''),
(5, 2, 2, '<p><b>Sing up now! The number of slots is limited.</b></p>\r\n<p>Afraid of commitments? Try a starter package - 4 lessons to check what''s best for you!</p>\r\n<p>Now special price - 99€ for 4 lessons</p>\r\n<p>We offer lessons in an Art Nouveau building in the center of Warsaw, and also online - available across the world.</p>\r\n<p>Online lessons are available in accordance with time zone differences. Lessons are intended for adult first-timers, beginners, and advanced players. Learning materials – everything you need you will receive by email. Online lessons are adjusted to individual needs of every student – live in an agreed time. Lessons are available in English.</p>'),
(6, 2, 3, '<p><b>Sing up now! The number of slots is limited.</b></p>\r\n<p>Afraid of commitments? Try a starter package - 4 lessons to check what''s best for your child!</p>\r\n<p>Now special price - 99€ for 4 lessons</p>\r\n<p>We offer lessons in an Art Nouveau building in the center of Warsaw, and also online - available across the world.</p>\r\n<p>Online lessons are available in accordance with time zone differences. Lessons are intended for adult first-timers, beginners, and advanced players. Learning materials – everything you need you will receive by email. Online lessons are adjusted to individual needs of every student – live in an agreed time. Lessons are available in English.</p>'),
(7, 3, 1, ''),
(8, 3, 2, ''),
(9, 3, 3, ''),
(10, 4, 1, ''),
(11, 4, 2, ''),
(12, 4, 3, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_name_id` int(10) UNSIGNED NOT NULL,
  `common_desc_id` int(10) UNSIGNED DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `course_type_id` int(10) UNSIGNED DEFAULT NULL,
  `img_thumbnail` varchar(255) NOT NULL,
  `movie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `courses`
--

INSERT INTO `courses` (`id`, `course_name_id`, `common_desc_id`, `img`, `course_type_id`, `img_thumbnail`, `movie`) VALUES
(1, 1, 3, '/images/oferta/logorytmika.jpg', 1, '/images/oferta-ikony/logorytmika.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(2, 2, 2, '/images/oferta/kolysanki.jpg', 2, '/images/oferta-ikony/kolysanki.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(3, 3, 3, '/images/oferta/logopedia.jpg', 3, '/images/oferta-ikony/logopedia.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(4, 4, 3, '/images/oferta/fortepian-dzieci.jpg', 4, '/images/oferta-ikony/fortepian-dzieci.jpg', 'https://www.youtube.com/embed/b4h8Ot88kcA?&rel=0'),
(5, 5, 3, '/images/oferta/spiew-dla-dzieci.jpg', 5, '/images/oferta-ikony/spiew-dzieci.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(6, 6, 2, '/images/oferta/gitara-dla-dzieci.jpg', 6, '/images/oferta-ikony/gitara-dzieci.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(7, 7, 2, '/images/oferta/wiolonczela-dzieci.jpg', 7, '/images/oferta-ikony/wiola-dzieci.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(8, 8, 2, '/images/oferta/saksofon-dla-dzieci.jpg', 8, '/images/oferta-ikony/saksofon-dzieci.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(9, 9, 2, '/images/oferta/umuzykalnienie.jpg', 9, '/images/oferta-ikony/umuzykalnienie.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(10, 4, 2, '/images/oferta/fortepian-dorosli.jpg', 4, '/images/oferta-ikony/fortepian-dorosli.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(11, 5, 2, '/images/oferta/spiew-dla-doroslych.jpg', 5, '/images/oferta-ikony/spiew-dorosli.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(12, 6, 2, '/images/oferta/gitara-dla-doroslych.jpg', 6, '/images/oferta-ikony/gitara-dorosli.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(13, 7, 2, '/images/oferta/wiolonczela-dorosli.jpg', 7, '/images/oferta-ikony/wiola-dorosli.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(14, 8, 2, '/images/oferta/saksofon-dla-doroslych.jpg', 8, '/images/oferta-ikony/saksofon-dorosli.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(15, 10, 1, '/images/oferta/zespol.jpg', 5, '/images/oferta-ikony/zespol.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(16, 11, 2, '/images/oferta/retoryka.jpg', 10, '/images/oferta-ikony/retoryka.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(17, 12, 2, '/images/oferta/musicfulness.jpg', 11, '/images/oferta-ikony/musicfulness.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(18, 13, 2, '/images/oferta/meloman.jpg', 12, '/images/oferta-ikony/meloman.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(20, 15, 3, '/images/oferta/kompozycja.jpg', 13, '/images/oferta-ikony/kompozycja.jpg', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `courses_heading_translation`
--

CREATE TABLE `courses_heading_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) NOT NULL,
  `heading_2` varchar(255) NOT NULL,
  `button` varchar(255) NOT NULL,
  `paragraph` varchar(255) NOT NULL,
  `heading_3_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `courses_heading_translation`
--

INSERT INTO `courses_heading_translation` (`id`, `languages_id`, `heading_3`, `heading_2`, `button`, `paragraph`, `heading_3_category`) VALUES
(1, 1, 'Twój wybór', 'Nasza oferta', 'Sprawdź', 'indywidualne', 'ZAPRASZAMY'),
(2, 2, 'Your choice', 'Our programmes', 'Check', 'individual', 'Welcome'),
(3, 3, 'Sự lựa chọn của bạn', 'Gói hàng của chúng tôi', 'Hãy kiểm tra', 'individual', 'Welcome'),
(4, 4, '你的选择：', '我们的课程', '其他', 'individual', 'Welcome');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `courses_translation`
--

CREATE TABLE `courses_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `courses_id` int(10) UNSIGNED NOT NULL DEFAULT '4',
  `long_desc` varchar(5000) DEFAULT NULL,
  `short_desc` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `courses_translation`
--

INSERT INTO `courses_translation` (`id`, `languages_id`, `courses_id`, `long_desc`, `short_desc`) VALUES
(1, 1, 1, '<p>Zajęcia przeznaczone są zarówno dla dzieci początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Logorytmika to innowacyjne zajęcia łączące zajęcia logopedyczne z rytmiką. Wpływają one  na narząd artykulacyjny, sferę słuchową i słuchowo-ruchową. Celem zajęć jest harmonijne stymulowanie mowy oraz uwrażliwienie dziecka na rytm, melodię, tempo, dynamikę, barwę dźwięku. Są to cechy wspólne dla mowy i muzyki.</p>\r\n<p>Zajęcia z logorytmiki prowadzone są poprzez zabawę wykorzystują:</p>\r\n<ul>\r\n<li>ćwiczenia oddechowe</li>\r\n<li>ćwiczenia słowne</li>\r\n<li>ćwiczenia słuchowe</li>\r\n<li>ćwiczenia rytmiczne</li>\r\n<li>ćwiczenia ruchowe</li>\r\n<li>ćwiczenia rozwijające słownik dziecka</li>\r\n</ul>\r\n<p>Zajęcia są skierowane przede wszystkim do najmłodszych.</p>', ''),
(2, 1, 2, '<p>Zajęcia przeznaczone są zarówno dla osób dorosłych początkujących, jak też dla już śpeiwających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Kołysanki – śpiewanki to autorski program Bogny Kołodziej skierowany do mam i kobiet w ciąży, dbających o wszechstronny rozwój i bliski kontakt z dzieckiem od samego początku. W programie indywidualnych zajęć muzycznych znajduje się praca nad głosem poprzez naukę śpiewania i nucenia kołysanek oraz słuchania śpiewanek dla dzieci z różnych obszarów etnicznych świata:</p>\r\n<ul>\r\n<li>Kołysanki polskie</li>\r\n<li>Kołysanki irlandzkie</li>\r\n<li>Kołysanki włoskie</li>\r\n<li>Kołysanki afrykańskie</li>\r\n<li>Kołysanki japońskie</li>\r\n</ul>\r\n<p>Dodatkowo elementy muzykoterapii pomagają w radzeniu sobie z napięciami i stresami dnia codziennego. Ćwiczenia z instrumentami podczas słuchania wybranych fragmentów muzyki (nie tylko klasycznej) maja działanie relaksujące, wzmacniające poczucie radości oraz satysfakcji z życia, zarówno u matki jak i jej dziecka.</p>', '<p>Indywidualne lekcje śpiewu dla dorosłych</p>'),
(3, 1, 3, '<p>Zajęcia przeznaczone są zarówno dla dzieci początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Logopedia muzyczna to innowacyjne zajęcia łączące zajęcia logopedyczne z rytmiką. Wpływają one na narząd artykulacyjny, sferę słuchową i słuchowo-ruchową. Celem zajęć jest harmonijne stymulowanie mowy oraz uwrażliwienie dziecka na rytm, melodię, tempo, dynamikę, barwę dźwięku. Są to cechy wspólne dla mowy i muzyki.</p>\r\n<p>Zajęcia z logopedii prowadzone są poprzez zabawę i wykorzystują:</p>\r\n<ul>\r\n<li>ćwiczenia logopedyczne</li>\r\n<li>ćwiczenia oddechowe</li>\r\n<li>ćwiczenia słowne</li>\r\n<li>ćwiczenia słuchowe</li>\r\n<li>ćwiczenia rytmiczne</li>\r\n<li>ćwiczenia dużej i małej motoryki</li>\r\n<li>ćwiczenia rozwijające słownik dziecka</li>\r\n</ul>\r\n<p>Zajęcia ukierunkowane są na korygowanie wad wymowy wykorzystując w tym celu m.in. piosenki oraz specjalne ćwiczenia logopedyczne. U dziecka usprawnia się aparat mowy oraz poprawia komunikacja językowa. Dodatkową korzyścią jest rozwój małej motoryki i terapia ręki. Program jest układany indywidualnie według potrzeb dziecka. Oferujemy diagnozę oraz terapię logopedyczną, z wykorzystaniem muzyki.</p>\r\n<p>Oferujemy specjalny program poprawiający wymowę dla dzieci mieszkających poza granicami Polski. Nasi nauczyciele prowadzą zajęcia także w jezyku angielskim.</p>', '<p>Zajęcia są indywidualne i przeznaczone dla dzieci przedszkolnych i wczesnoszkolnych w wieku od 3 do 6 lat.</p>'),
(4, 1, 4, '<p>Zajęcia przeznaczone są zarówno dla dzieci początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Lekcje gry na fortepianie przeznaczone są dla dzieci od lat 5-ciu i mają na celu wychowanie melomanów, którym sztuka będzie towarzyszyła przez całe życie.</p>\r\n<p>Po stresach i trudach szkolnej codzienności granie daje ukojenie oraz niezbędny relaks. Podczas lekcji uczniowie mogą się odprężyć i zanurzyć w świecie dźwięków. Tutaj są najważniejsi, otoczeni bezcennym zaufaniem wzmacniającym poczucie bezpieczeństwa. Tutaj mogą być autentyczni - muzyka pomaga im wyrazić emocje, rozładować napięcie i stresy.</p>\r\n<p>Nowy, lepszy sposób traktowania uczniów jako ważnych osób, których słowa, myśli i emocje mają znaczenie. Podczas zajęć dzieci uczą się nie tylko grać na instrumencie, ale również rozmawiają z nauczycielem o różnych nurtujących ich problemach.</p>\r\n<p>Program dostosowywany do wieku oraz umiejętności każdego ucznia obejmuje:</p>\r\n<ul>\r\n<li>czytanie nut wg autorskiej metody Grażyny Kołodziej</li>\r\n<li>utwory solo i w duetach na 4 ręce</li>\r\n<li>muzyczne filmy</li>\r\n<li>kształcenie słuchu</li>\r\n<li>solfeż</li>\r\n<li>historia i teoria muzyki</li>\r\n<li>gry i zabawy muzyczne</li>\r\n</ul>\r\n<p>Program zawiera obszerną literaturę muzyczną, w skład której wchodzą m.in. utwory klasyczne, jazzowe, muzyką filmowa np. z bajek Disneya), etniczną, a także kolędy i pastorałki.</p>\r\n<p>Nauka obejmuje 3 etapy:</p>\r\n<ol>\r\n<li>podstawowy</li>\r\n<li>średni</li>\r\n<li>zaawansowany, z możliwością przygotowania na Uniwersytet Muzyczny lub na konkursy pianistyczne.</li>\r\n</ol>\r\n<p>Dodatkową korzyścią są organizowane cykliczne warsztaty i lekcje mistrzowskie, dzięki prężnie działającej współpracy międzynarodowej Konwersatorium Muzycznego z nauczycielami fortepianu z różnych krajów - m.in. z Niemiec, Wielkiej Brytanii, Finlandii i USA.</p>', '<p>Indywidualne lekcje fortepianu w systemie mistrz-uczeń dla dzieci 5+</p>'),
(5, 1, 5, '<p>Zajęcia przeznaczone są zarówno dla dzieci początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Kontakt z muzyka jest ekscytująca przygodą. Nauka gry, prowadzona w naszej szkole, ma cechy innowacyjnej edukacyjnej. Nie ma ocen, egzaminów. Dzieci są najważniejsze, ich wypowiedzi, ich myśli i odczucia. Podczas zajęć panuje serdeczna, przyjacielska atmosfera życzliwości, która zapewnia poczucie bezpieczeństwa i komfortu. Dzięki temu zwiększa się samoocena i poczucie własnej skuteczności.</p>\r\n<p>Podczas zajęć uczniowie nabywają umiejętności muzycznych, a także uczą się jak najlepiej można zarządzać własnym czasem. Jak organizować obowiązki, znajdować czas na naukę, odrobienie pracy domowej, granie na instrumencie, a także czas dla siebie, na relaks.</p>\r\n<p>W programie:</p>\r\n<ul>\r\n<li>Piosenki znane i lubiane</li>\r\n<li>Muzyczne gry i zabawy z głosem</li>\r\n<li>Nauka improwizacji</li>\r\n<li>Projekcje wokalnych dzieł muzycznych (oper, oratoriów i musicali)</li>\r\n<li>Muzyczne bajki grajki</li>\r\n</ul>\r\n<p>Zajęcia rozwijają muzykalność, a także aparat i płynność mowy. Zajęcia uczą relaksacji i rozładowywania napięć z ciała. Celem lekcji śpiewu jest rozbudzenie miłość do muzyki i zwiększenie pewność siebie.</p>\r\n<p><b>NOWOŚĆ Czasami łatwiej jest zacząć śpiewać z koleżanką, szczególnie dzieciom nieśmiałym - dlatego zapraszamy na nasze najnowsze zajęcia Zespół wokalny. W kameralnych 3-4 osobowych grupach dzieci mogą spróbować swoich sił w bezpiecznej, przyjaznej atmosferze.</b></p>', '<p>Indywidualne lekcje śpiewu w systemie mistrz-uczeń dla dzieci 5+.</p>'),
(6, 1, 6, '<p>Zajęcia przeznaczone są zarówno dla dzieci początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p><p>Zajęcia muzyczne rozwijają kreatywność uczniów w sprzyjającej atmosferze. Właściwymi metodami, dobieranymi przez nauczyciela do indywidualnych potrzeb ucznia, można poprawić pamięć i znacznie rozwinąć koncentrację. Cechy te są bardzo przydatne w szkole, a ponadto niezwykle istotne w dorosłym życiu – tym prywatnym i zawodowym.</p><p>Podczas lekcji uczniowie zapoznają sie z nowymi utworami, co wspiera rozwój umiejętności analitycznych, czytania ze zrozumieniem, interpretacji nut oraz szybszej oceny materiału. Jak pokonać napotkane trudności? Jak dostrzegać podobieństwa w utworze muzycznym? Jak interpretować nieznane elementy muzyczne? Lekcje muzyki pomagają uczniom doskonalić umiejętność logicznego myślenia.</p>\r\n<ul>\r\n  <li>czytanie nut</li>\r\n  <li>muzyczne filmy</li>\r\n  <li>kształcenie słuchu</li>\r\n  <li>solfeż</li>\r\n  <li>historia i teoria muzyki</li>\r\n  <li>gry i zabawy muzyczne</li>\r\n</ul>               \r\n<p>Program zawiera obszerną literaturę muzyczną, w skład której wchodzą m.in. utwory klasyczne, jazzowe, muzyką filmowa np. z bajek Disneya), etniczną, a także kolędy i pastorałki.</p><p>W programie zajęć utwory solowe, a także duety - utwory z towarzyszeniem drugiej gitary</p><p>W szkole posiadamy gitarę, więc na lekcje nie trzeba przynosić własnej – jest to komfortowe rozwiązanie. Przez pierwszy miesiąc próbny nie trzeba posiadać w domu instrumentu.</p>', '<p>Indywidualne lekcje gry na gitarze klasycznej w systemie mistrz-uczeń dla dzieci 5+.</p>'),
(7, 1, 7, '<p>Zajęcia przeznaczone są zarówno dla dzieci początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Zajęcia wzmacniają poczucie własnej wartości. Dzieci w bezpieczniej i sprzyjającej nauce atmosferze czerpią radość i przyjemność z muzyki. Wspólne muzykowanie buduje bliską relację z nauczycielem, bo muzyka może łączy ludzi i tworzy relację partnerską.</p>\r\n<p>Granie na instrumentach w duetach (początkowo a nauczycielem, a później razem z innymi uczniami) uczy współpracy, która jest niezbędna w dorosłym życiu. Uczy również zadaniowości, pracy w grupie, wspólnego poszukiwania najlepszych rozwiązań, słuchania i rozumienia innych.</p>\r\n<p>Poznając nowe utwory, uczniowie uczą się, jak poszerzać umiejętności i pokonywać przeszkody. Jak szukać odpowiednich i skutecznych metod rozwiązywania trudnych zadań. Nabywają determinację i wytrwałość, nie poddają się w sytuacjach kryzysowych, mają odwagę, by zmierzać się z problemami i poszukiwać rozwiązać. Uczą się wytrwałości w dążeniu do doskonałości.</p>\r\n<p>Program dostosowywany do wieku oraz umiejętności każdego ucznia obejmuje:</p>\r\n<ul>\r\n<li>czytanie nut</li>\r\n<li>muzyczne filmy</li>\r\n<li>kształcenie słuchu</li>\r\n<li>solfeż</li>\r\n<li>historia i teoria muzyki</li>\r\n<li>gry i zabawy muzyczne</li>\r\n</ul>\r\n<p>Program zawiera obszerną literaturę muzyczną, w skład której wchodzą m.in. utwory klasyczne, jazzowe, muzyką filmowa np. z bajek Disneya), etniczną, a także kolędy i pastorałki.</p>\r\n<p>W programie zajęć utwory solowe, a także duety - utwory z towarzyszeniem drugiej wiolonczeli lub fortepianu</p>\r\n<p>W szkole posiadamy specjalną dla dzieci małą wiolonczelę, więc na lekcje nie trzeba przynosić własnego – jest to komfortowe rozwiązanie. Przez pierwszy miesiąc próbny nie trzeba posiadać w domu instrumentu.</p>', '<p>Indywidualne lekcje gry na wiolonczeli w systemie mistrz-uczeń dla dzieci 5+.</p>'),
(8, 1, 8, '<p>Zajęcia przeznaczone są zarówno dla dzieci początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>W ekscytującej atmosferze dzieci zapoznają się z nowymi dźwiękami i utworami muzycznymi, co wspiera rozwijaniu się wyobraźni. Nauczyciele pilnują, aby wzmacniać poczucie wartości uczniów, poprzez okazywanie im szacunku.</p>\r\n<p>Gra na instrumencie to międzynarodowy język wyrażania emocji i myśli, czasem niemożliwych do opowiedzenia słowami. Przy okazji jest to świetna zabawa. Poprzez muzykę uczniowie uczą się lepiej wyrażać siebie, mówić o swoich przeżyciach wewnętrznych i poznawać samych siebie.</p>\r\n<p>Program dostosowywany do wieku oraz umiejętności każdego ucznia obejmuje:</p>\r\n<ul>\r\n<li>czytanie nut</li>\r\n<li>muzyczne filmy</li>\r\n<li>kształcenie słuchu</li>\r\n<li>solfeż</li>\r\n<li>historia i teoria muzyki</li>\r\n<li>gry i zabawy muzyczne</li>\r\n</ul>\r\n<p>Program zawiera obszerną literaturę muzyczną, w skład której wchodzą m.in. utwory klasyczne, jazzowe, muzyka filmowa np. z bajek Disneya, etniczna, a także kolędy i pastorałki. W skład literatury muzycznej wchodzą także utwory oryginalnie napisane na saksofon jak i transkrypcje utworów z innych instrumentów.</p>\r\n<p>W programie zajęć utwory solowe, a także duety - utwory z towarzyszeniem drugiego saksofonu lub fortepianu, a także nauka improwizacji.</p>\r\n<p>W szkole posiadamy saksofon, więc na lekcje nie trzeba przynosić własnego – jest to komfortowe rozwiązanie. Przez pierwszy miesiąc próbny nie trzeba posiadać w domu instrumentu.</p>', '<p>Indywidualne lekcje gry na saksofonie w systemie mistrz-uczeń dla dzieci 8+.</p>'),
(9, 1, 9, '<p>Zajęcia przeznaczone są zarówno dla dzieci początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Indywidualne zajęcia umuzykalniające to specjalny program wprowadzając w świat dźwięków i muzyki. Zajęcia rozbudzające miłość do muzyki na całe życie, skierowane do dzieci w wieku 3-6 lat, gdy są szczególnie otwarte i chłonne na nową wiedzę. Plan zajęć dostosowywany jest do możliwości i potrzeb każdego dziecka.</p>\r\n<p>Ten autorski program Bogny Kołodziej zapewnia potężną dawkę muzyki, ruchu i zabawy, które pobudzają do rozwoju i dostarczają dużo radości. Dodatkowym zyskiem jest jednoczesne przygotowanie do rozpoczęcia w przyszłości nauki gry na wybranym instrumencie.</p><p>Program nauki muzyki i kształcenia słuchu zawiera m.in:</p>\r\n<ul>\r\n<li>Muzyczne gry i zabawy</li>\r\n<li>Śpiewanie znanych i lubianych piosenek</li>\r\n<li>Muzyczne projekcje filmowe</li>\r\n<li>Samodzielną improwizację muzyczną dzieci na pianinie i innych instrumentach</li>\r\n<li>Muzyczne bajki grajki</li>\r\n<li>Prezentację fragmentów wielkich dzieł orkiestrowych</li>\r\n<li>Mini koncerty – muzyka na żywo</li>\r\n</ul>', '<p>Indywidualne zajęcia umuzykalniające dla dzieci 3+</p>'),
(10, 1, 10, 'Zajęcia przeznaczone są zarówno dla osób dorosłych początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Wiele osób od dziecka marzyło o nauce gry na fortepianie, niestety nie miało takiej możliwości. Niespełnione marzenia z dzieciństwa często powracają po latach, a ich realizacja zapewnia wiele radości, satysfakcji i relaksu. Autorski sposób nauki czytania nut gwarantuje łatwości i szybkość nauki czytania nut.</p>\r\n<p>Program przygotowywany jest według Państwa zainteresowań, składa się m.in. z:</p>\r\n<ul>\r\n<li>utworów klasycznych</li>\r\n<li>jazz, blues, rock’n’roll</li>\r\n<li>przebojów zespołów takich jak The Beatles i Abba</li>\r\n<li>tematów z oper i baletów</li>\r\n<li>muzyki filmowej</li>\r\n<li>musicalów</li>\r\n<li>pop</li>\r\n<li>muzyki etnicznej</li>\r\n</ul>\r\n<p>Program dla dorosłych pozwala nie tylko zrealizować marzenia, ale również zarazić nimi własne dzieci. Często naukę rozpoczynają równolegle rodzice i dzieci, którzy podczas ćwiczeń przy instrumencie w domu nawzajem sobie pomagają. Taka muzyczna współpraca pozwala lepiej rozumieć własne dziecko i nawiązać z nim jeszcze bliższy kontakt, także poprzez granie z nim na 4 ręce.</p>', '<p>Indywidualne lekcje gry na fortepianie w systemie mistrz-uczeń. Posiadamy specjalny autorski program nauczania dla osób dorosłych pod podstaw.</p>'),
(11, 1, 11, '<p>Zajęcia przeznaczone są zarówno dla osób dorosłych początkujących, jak też dla już śpiewających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>W dzieciństwie każdy z nas śpiewał piosenki na wyjazdach, przy ognisku, podczas uroczystości szkolnych czy w chórze. Sprawiało to zawsze wiele radości i satysfakcji, z czasem jednak o tym zapomnieliśmy. Co więcej osoby dorosłe żyjące w ciągłym pośpiechu często zapominają o podstawowej czynności, jaką jest prawidłowe oddychanie. Zajęcia w klasie śpiewu pozwalają uwolnić głos, by znów poczuć się wolnym i radosnym. I na nowo odkryć swój muzyczny potencjał.</p>\r\n<p>Program przygotowywany jest według Państwa zainteresowań, składa się m.in. z:</p>\r\n<ul>\r\n<li>pieśni klasyczne</li>\r\n<li>standardy musicalowe i jazzowe</li>\r\n<li>arie i utwory klasyczne</li>\r\n<li>piosenki popularne i etniczne</li>\r\n</ul>\r\n<p>Podczas zajęć poznają Państwo technik naturalnego rezonowania i wzmacniania głosu, prawidłowego korzystania z mechanizmów oddychania oraz właściwiej emisji głosu. Zajęcia są dla osób, które pragną rozwijać się wokalnie i poprawić swoje samopoczucie poprzez pracę z głosem.</p>', '<p>Indywidualne lekcje śpiewu w systemie mistrz-uczeń. Posiadamy specjalny autorski program nauczania dla osób dorosłych pod podstaw.</p>'),
(12, 1, 12, '<p>Zajęcia przeznaczone są zarówno dla osób dorosłych początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Gitara kojarzy się z płonącym kominkiem i ciepłą rodzinna atmosferą. Jej dźwięki przyjemnie budują nastrój. Jest to instrument, który łatwo ze sobą zabrać i grać w dowolnym miejscu na całym świecie. Szczególnie że wspólne śpiewanie wzmacnia przyjacielskie więzi i tworzy niezapomniane wspomnienia.</p>\r\n<p>Program przygotowywany jest według Państwa zainteresowań, składa się m.in. z:</p>\r\n<ul>\r\n<li>utworów klasycznych</li>\r\n<li>jazzu, blues, rock’n’roll</li>\r\n<li>przebojów zespołów takich jak The Beatles i Abba</li>\r\n<li>tematów z oper i baletów</li>\r\n<li>muzyki filmowej</li>\r\n<li>musicalów</li>\r\n<li>pop</li>\r\n<li>muzyki etnicznej</li>\r\n</ul>\r\n<p>Autorski sposób nauki czytania nut gwarantuje łatwości i szybkość nauki czytania nut. W programie są utwory solowe, a także w duecie – na dwie gitary. Dodatkowo lekcje są wzbogacone o ciekawostki z historii muzyki.</p>\r\n<p>Dla zaawansowanych nauka gry na gitarze elektrycznej.</p>\r\n<p>W szkole posiadamy gitarę, więc na lekcje nie trzeba przynosić własnej – jest to komfortowe rozwiązanie. Przez pierwszy miesiąc nie trzeba posiadać w domu instrumentu.</p>', '<p>Indywidualne lekcje gry na gitarze klasycznej w systemie mistrz-uczeń. Posiadamy specjalny autorski program nauczania dla osób dorosłych pod podstaw.</p>'),
(13, 1, 13, '<p>Zajęcia przeznaczone są zarówno dla osób dorosłych początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Ciepłe i śpiewne brzmienie instrumentu zapewnia wyjątkową, komfortową atmosferę. Jest to wyjątkowy instrument, do którego można się przytulić. W tym zabieganym świecie daje poczucie bezpieczeństwa i uspokaja. Można przy nim znaleźć chwile dla siebie, tylko dla siebie.</p>\r\n<p>Program przygotowywany jest według Państwa zainteresowań, składa się m.in. z:</p>\r\n<ul>\r\n<li>utworów klasycznych</li>\r\n<li>jazzu, blues, rock’n’roll</li>\r\n<li>przebojów zespołów takich jak The Beatles i Abba</li>\r\n<li>tematów z oper i baletów</li>\r\n<li>muzyki filmowej</li>\r\n<li>musicalów</li>\r\n<li>pop</li>\r\n<li>muzyki etnicznej</li>\r\n</ul>\r\n<p>Autorski sposób nauki czytania nut gwarantuje łatwości i szybkość nauki czytania nut. W programie zajęć utwory solowe, a także duety - utwory z towarzyszeniem drugiej wiolonczeli lub fortepianu</p>\r\n<p>W szkole posiadamy wiolonczelę, więc na lekcje nie trzeba przynosić własnej – jest to komfortowe rozwiązanie. Przez pierwszy miesiąc próbny nie trzeba posiadać w domu instrumentu.</p>', '<p>Indywidualne lekcje gry na wiolonczeli w systemie mistrz-uczeń. Posiadamy specjalny autorski program nauczania dla osób dorosłych pod podstaw.</p>'),
(14, 1, 14, '<p>Zajęcia przeznaczone są zarówno dla osób dorosłych początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Magiczny, błyszczący, pełen siły - saksofon uwodzi i oczarowuje. Jego dźwięki wyrażają uczucia, których nie sposób ubrać w słowa. Posiada potężne możliwości brzmienia i wprowadza wyjątkowy nastrój podczas spotkań w gronie najbliższych.</p>\r\n<p>Program przygotowywany jest według Państwa zainteresowań, składa się m.in. z:</p>\r\n<ul>\r\n<li>utworów klasycznych</li>\r\n<li>jazzu, blues, rock’n’roll</li>\r\n<li>przebojów zespołów takich jak The Beatles i Abba</li>\r\n<li>tematów z oper i baletów</li>\r\n<li>muzyki filmowej</li>\r\n<li>musicalów</li>\r\n<li>pop</li>\r\n<li>muzyki etnicznej</li>\r\n</ul>\r\n<p>Autorski sposób nauki czytania nut gwarantuje łatwości i szybkość nauki czytania nut. W programie zajęć utwory solowe, a także duety - utwory z towarzyszeniem drugiego saksofonu lub fortepianu, a także nauka improwizacji. Dodatkowo lekcje są wzbogacone o ciekawostki z historii muzyki.</p>\r\n<p>W szkole posiadamy saksofon, więc na lekcje nie trzeba przynosić własnego – jest to komfortowe rozwiązanie. Przez pierwszy miesiąc próbny nie trzeba posiadać w domu instrumentu.</p>', '<p>Indywidualne lekcje gry na saksofonie w systemie mistrz-uczeń. Posiadamy specjalny autorski program nauczania dla osób dorosłych pod podstaw.</p>'),
(15, 1, 15, '<p>Lekcje śpiewu w kameralnych grupach. Posiadamy specjalny autorski program nauczania dla osób dorosłych pod podstaw.</p>\r\n<p>W dzieciństwie każdy z nas śpiewał piosenki na wyjazdach, przy ognisku, podczas uroczystości szkolnych czy w chórze. Sprawiało to zawsze wiele radości i satysfakcji, z czasem jednak o tym zapomnieliśmy. Co więcej osoby dorosłe żyjące w ciągłym pośpiechu często zapominają o podstawowej czynności, jaką jest prawidłowe oddychanie. Zajęcia w klasie śpiewu pozwalają uwolnić głos, by znów poczuć się wolnym i radosnym. I na nowo odkryć swój muzyczny potencjał.</p>\r\n<p>Prowadzimy zajęcia w następujących grupach tematycznych:</p>\r\n<ul>\r\n<li>Chór klasyczny</li>\r\n<li>Zespół jazzowy - z utworami musicalowymi</li>\r\n<li>Chór gospel</li>\r\n<li>Music band – piosenki ogniskowe, szanty, szlagiery przy akompaniamencie gitary</li>\r\n</ul>\r\n<p>Podczas zajęć poznają Państwo technik naturalnego rezonowania i wzmacniania głosu, prawidłowego korzystania z mechanizmów oddychania oraz właściwiej emisji głosu. Zajęcia są dla osób, które pragną rozwijać się wokalnie i poprawić swoje samopoczucie poprzez pracę z głosem.Wspólne śpiewanie rozwija poczucie więzi i wzmacnia kontakty międzyludzkie.</p>\r\n<p>Zajęcia są prowadzone w grupach dla dzieci i w oddzielnych grupach dla dorosłych</p>', '<p>NOWOŚĆ! ZAPISZ SIĘ JUŻ TERAZ NA PAŹDZIERNIK 2019</p><p>Liczba miejsc ograniczona. Zacznij śpiewać i spełnij marzenia.</p>'),
(16, 1, 16, '<p>Zajęcia przeznaczone są zarówno dla osób dorosłych początkujących, jak też dla zaawansowanych. Materiały do nauki – przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Od czasów starożytnego Rzymu sztuka oratorska była wysoko ceniona. Mówca musiał wykazać się nie tylko znakomitą dykcją, ale również wiedzą jak skutecznie przekazać swoje przesłanie, aby być zrozumianym i zapamiętanym. W dzisiejszych czasach mówcy, którzy porywają swoją charyzmą opanowali do perfekcji pracę nad oddechem i prawidłową emisją głosu w mowie.</p>\r\n<p>Program przygotowywany jest według Państwa zainteresowań i przeznaczony jest dla:</p>\r\n<ul>\r\n<li>aktorów</li>\r\n<li>dziennikarzy telewizyjnych</li>\r\n<li>polityków</li>\r\n<li>biznesmenów</li>\r\n<li>obcokrajowców</li>\r\n</ul>\r\n<p>Poprzez zajęcia logopedyczno-muzyczne można poprawić wymowę i odkryć naturalny potencjał drzemiącego w każdym mówcy. Dodatkowo zajęcia uczą prawidłowych technik relaksacyjnych, które usprawniają i ułatwiają codzienną prace głosem w świetle kamer i mikrofonów, a także drodze własnego samodoskonalenia.</p>', '<p>Indywidualne lekcje retoryki w systemie mistrz-uczeń. Program jest przeznaczony jest dla osób dorosłych.</p>'),
(17, 1, 17, '<p>Zajęcia przeznaczone są zarówno dla osób dorosłych początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>W dzisiejszym świecie cały czas się spieszymy. Gonią nas terminy, projekty i zadania do zrealizowania. Uczniowie mają kolejne sprawdziany, ważne egzaminy i cały czas nowe rzeczy do nauczenia się i zapamiętania. Dorośli mają pracę, a w niej zadania i cele do osiągnięcia w wyznaczonym terminie. Powszechny jest brak czasu dla rodziny, przyjaciół i samego siebie.</p>\r\n<p>W pogoni za sukcesem, zapominamy o najważniejszym – o Sobie. Czasami trzeba się zatrzymać. Musicfulness to program, który pomaga odzyskać równowagę i poczucie harmonii.</p>\r\n<p>Program obejmuje:</p>\r\n<ul>\r\n<li>techniki relaksacyjne</li>\r\n<li>ćwiczenia oddechowe</li>\r\n<li>elementy muzykoterapii</li>\r\n<li>naukę słuchania i koncentracji</li>\r\n<li>naukę skupienia się na tu i teraz</li>\r\n</ul>\r\n<p>To wyjątkowy program pozwalający zwolnić, zatrzymać się i odpocząć. To czas, w którym można bezpiecznie wyciszyć się i zregenerować. Muzyka pozwala zredukować stres i poprawić jakość swojego życia.</p>\r\n<p>Program Musicfulness nawiązuje do Mindfulness, wykorzystując muzykę i jej dobroczynne oddziaływanie na ciało i umysł człowieka.</p>', '<p>Zajęcia są indywidualne i przeznaczone dla młodzieży oraz dorosłych.</p>'),
(18, 1, 18, '<p>Materiały do nauki – przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Meloman to znawca muzyki. Potrafi rozpoznać dobre wykonanie, zwrócić uwagę na istotne elementy dzieła muzycznego, a także zaskoczyć ciekawą anegdotą o kompozytorze. Sala koncertowa nie ma przed nim tajemnic. Wie, kiedy należy klaskać i na jakie koncerty warto się wybrać. Jest osobą, która zna się na sztuce.</p>\r\n<p>Program przygotowywany jest według Państwa zainteresowań, składa się m.in. z:</p>\r\n<ul>\r\n<li>historia muzyki</li>\r\n<li>literatura muzyczna</li>\r\n<li>życie i twórczość wielkich kompozytorów</li>\r\n<li>światowy kanon arcydzieł muzycznych</li>\r\n<li>oglądanie i analizowanie wybranych fragmentów z oper i baletów</li>\r\n<li>zasady muzyki</li>\r\n</ul>', '<p>Indywidualne zajęcia dla osób dorosłych, chcących rozwijać swoją wiedzę muzyczna bez konieczności nauki gry na instrumencie.</p><p>Chcesz mieć pewność? Wypróbuj pakiet startowy – 4 lekcje, aby przekonać się czy to jest najlepszy nauczyciel dla Ciebie!</p>'),
(19, 1, 20, '<p>Lekcje prowadzimy w secesyjnej kamienicy w centrum Warszawy, a teraz także online – zajęcia dostępne w całej Polsce oraz na świecie.</p>\r\n<p>Zajęcia online są dostępne z uwzględnieniem występujących różnic czasu. Materiały do nauki – przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Tworzenie muzyki to kreatywna sztuka wyobraźni. Daje niepowtarzalną możliwość aby poprzez sztukę, jaką jest muzyka wyrazić bogactwo własnego wewnętrznego świata, pełnego różnych emocji i poszukiwań. Podczas zajęć jest okazja do wykształcenia własnego punktu widzenia na temat dzieł wybitnych kompozytorów, stosowanych przez nich środków technicznych oraz materiału dźwiękowego.</p>\r\n<p>Żeby odnaleźć swój styl kompozycji trzeba znać cały wachlarz możliwości i móc odkryć swoją indywidualność w twórczości. W programie zajęć nauka komponowania w różnych stylach:</p>\r\n<ul>\r\n<li>barok</li>\r\n<li>klasycyzm</li>\r\n<li>romantyzm</li>\r\n<li>techniki dodekafoniczne</li>\r\n<li>aleatoryzm</li>\r\n<li>muzyka elektroakustyczna</li>\r\n<li>muzyka filmowa</li>\r\n<li>nurt minimal music</li>\r\n</ul>\r\n<p>W trakcje zajęć wykorzystywane są nowoczesne techniki komputerowe - programy do edycji nut oraz tworzenia muzyki. Praca nad własnymi kompozycjami odbywa się tradycyjnie na papierze nutowym, a także na laptopie lub tablecie.</p>\r\n', '<p>Indywidualne lekcje w klasie kompozycji w systemie mistrz-uczeń. Program jest przeznaczony dla osób dorosłych posiadających podstawową wiedzę na temat muzyki oraz znających główne zasady notacji muzycznej.</p>\r\n'),
(32, 2, 1, '', ''),
(33, 2, 2, '', ''),
(34, 2, 3, '', ''),
(35, 2, 4, '<p>Facing the stress and challenges every-day of school reality, children benefit from playing, as it gives relief and necessary relax. During the classes pupils may unwind and dive into the world of sounds. Here, they are the most important, surrounded by priceless trust, which strengthens their sense of security. Here, they can be authentic - music helps them express their emotions, unload their tension and stress.</p>\r\n<p>A new, improved method of treating pupils as important individuals whose words, thoughts, and emotions are significant. During the classes, children learn not only how to play an instrument, but also discuss with the teacher many vital problems.</p>\r\n<p>The programme is selected according to your interests and, among others, includes:</p>\r\n<ul>\r\n<li>reading music sheets according to Grazyna Kolodziej’s special method</li>\r\n<li>solo pieces, and 4-hand duets</li>\r\n<li>movies about music</li>\r\n<li>refinement of hearing</li>\r\n<li>solfege</li>\r\n<li>history and theory of music</li>\r\n<li>music games</li>\r\n</ul>\r\n<p>The program provides learners with an extensive range of music literature, including, among others, classical and jazz pieces, soundtracks from Disney movies, ethnic music, as well as Christmas carols.</p>\r\n<p>Learning consists of 3 stages:</p>\r\n<ol>\r\n<li>basic</li>\r\n<li>intermediate</li>\r\n<li>advance with the possibility of preparing for music universities or piano competitions</li>\r\n</ol>\r\n<p>An additional benefit offered by our school is a chance to participate in workshops and master classes organized periodically by the Music Conversatory, thanks to an international cooperation with piano teachers from different countries – for example, Germany, the UK, Finland, and the USA.</p>\r\n<p>During the first month you are not required to have your own instrument at home.</p>', '<p>Individual classes based on a master-pupil system, addressed at children from the age of 5, aiming at bring up music lovers, who will cherish art for the rest of their lives.</p>'),
(36, 2, 5, '<p>Contact with music is an exciting adventure. Lessons at our school have elements of innovative education. There are no grades or exams. Children are most important, as well as their opinions, thoughts, and feelings. During lessons, there is a warm friendly atmosphere, which gives a sense of security and comfort. It improves self-esteem and sense of own effectiveness.</p>\r\n<p>Through the learning process, pupils quire music skills, but also master time-management: how to schedule responsibilities, find time to study, do homework, play an instrument, and have time for oneself to relax.</p>\r\n<p>The programme includes:</p>\r\n<ul>\r\n<li>popular songs</li>\r\n<li>musical games with voice</li>\r\n<li>improvisations</li>\r\n<li>screenings of vocal masterpieces (operas, oratorios, and musicals)</li>\r\n<li>musical fairytales</li>\r\n</ul>\r\n<p>The aim is to awaken a love for music and to improve self-confidence.</p>\r\n<p>Lessons develop musicality, as well as vocal organs and speech smoothness. They also equip pupils with relaxation techniques, how to relieve body tensions. Singing lessons aim at awakening a love for music and improving self-confidence.</p>', '<p>Individual singing classes based on a master-pupil system for children 5+.</p>'),
(37, 2, 6, '<p>Music lessons develop pupils’ creativity in a favourable atmosphere. Appropriate methods, selected by the teacher to suit individual needs of every pupil, can improve memory and significantly amplify concentration. These abilities are useful at school, and very helpful in adult life - both private and professional.</p>\r\n<p>During a lesson, pupils learn new music sheets, what supports development of their analytical skills, notes interpretations, and faster tablature evaluation. How to overcome challenges? How to see similarities in a music piece? How to interpret unknown musical elements? Music lessons help pupils master skills of logical thinking.</p>\r\n<p>The programme is selected according to your interests and, among others, includes:</p>\r\n<ul>\r\n<li> reading music sheets </li>\r\n<li>cartoons about music</li>\r\n<li>refinement of hearing</li>\r\n<li>solfege</li>\r\n<li>history and theory of music</li>\r\n<li>music games</li>\r\n</ul>\r\n<p>The program provides learners with an extensive range of music literature, including, among others, classical and jazz pieces, soundtracks from Disney movies, ethnic music, as well as Christmas carols.</p>\r\n<p>The programme includes solo pieces, as well as duets - performed with another guitar.</p>\r\n<p>There is an instrument at the school, so you don’t have to bring your own-a comfortable solution. During the first month you are not required to have your own instrument at home.</p>', '<p>Individual singing classes based on a master-pupil system for children 5+.</p>'),
(38, 2, 7, '<p>Lessons develop the sense of self-esteem. Children enjoy music in a safe atmosphere that improves their learning process. Playing together builds a strong relationship with the teacher, as for music connects people and creates partnership.</p>\r\n<p>Performing in duets (initially with a teacher, later with other pupils) teaches cooperation, which is indispensable in adult life. It teaches also task-focus, team work, searching together for best solutions, and understanding of others.</p>\r\n<p>While learning new pieces, pupils train how to widen their abilities, and how to overcome obstacles - how to find correct and effective methods of solving difficult tasks. They acquire determination and perseverance, they do not give up in crisis situations; they have courage to face problems and look for solutions. They learn persistence in pursuing one’s dream.</p>\r\n<p>The programme is selected according to your interests and, among others, includes:</p>\r\n<ul>\r\n<li> reading music sheets </li>\r\n<li>cartoons about music</li>\r\n<li>refinement of hearing</li>\r\n<li>solfege</li>\r\n<li>history and theory of music</li>\r\n<li>music games</li>\r\n</ul>\r\n<p>The program provides learners with an extensive range of music literature, including, among others, classical and jazz pieces, soundtracks from Disney movies, ethnic music, as well as Christmas carols.</p>\r\n<p>The programme includes solo pieces and duets-performed with another cello or a piano.</p>\r\n<p>There is an instrument at the school, so you don’t have to bring your own-a comfortable solution. During the first month you are not required to have your own instrument at home.</p>', '<p>Individual singing classes based on a master-pupil system for children 5+.</p>'),
(39, 2, 8, '<p>In an exciting atmosphere, children learn new sounds and music pieces, which stimulates their creativity. Teachers take care to develop self-esteem of their pupils by respecting them.</p>\r\n<p>Playing an instrument is an international language of expressing emotions and thoughts, sometimes impossible to be captured in words. It is also a great fun. Through music, pupils learn how to express themselves better, how to talk about their inner experiences, and also they get to know themselves better.</p>\r\n<p>The programme is selected according to your interests and, among others, includes:</p>\r\n<ul>\r\n<li> reading music sheets </li>\r\n<li>cartoons about music</li>\r\n<li>refinement of hearing</li>\r\n<li>solfege</li>\r\n<li>history and theory of music</li>\r\n<li>music games</li>\r\n</ul>\r\n<p>The program provides learners with an extensive range of music literature, including, among others, classical and jazz pieces, soundtracks from Disney movies, ethnic music, as well as Christmas carols.</p>\r\n<p>The programme includes solo pieces and duets-performed with another saxophone or a piano, as well as lessons of improvisation.</p>\r\n<p>There is an instrument at the school, so you don’t have to bring your own-a comfortable solution. During the first month you are not required to have your own instrument at home.</p>', '<p>Individual saxophone classes based on a master-pupils system for childrren 8+.</p>'),
(40, 2, 9, '<p>Lessons which bring out a love of music that lasts for an entire lifetime, are designed for 3 to 6-years-olds, the age when children are particularly open and responsive to new knowledge. Lessons are individual, and the programme is adapted to fit age and skills of every pupil, introducing them to the world of sounds and music.</p>\r\n<p>This original programme designed by Bogna Kolodziej provides a vast amount of music, activity, and fun, which stimulates development and bring a lot of pleasure. There is an additional value, which is a simultaneous preparation to begin playing an instrument. </p>\r\n<p>The programme of learning music and refining hearing includes:</p>\r\n<ul>\r\n<li>music games</li>\r\n<li>singing popular songs</li>\r\n<li>screenings of music movies</li>\r\n<li>independent music improvisations on a piano and other instruments</li>\r\n<li>musical fairytales</li>\r\n<li>introduction to classical music masterpieces</li>\r\n<li>Mini concerts – live music</li>\r\n</ul>', '<p>Individual music classes based on a master-pupil system for children 4+.</p>'),
(41, 2, 10, '<p>Many people have been dreaming of learning to play the piano since early childhood, unfortunately they haven''t had such an opportunity. Unfulfilled dreams of the past often come back years later, and making them come true gives a lot joy, satisfaction and relaxation.</p>\r\n<p>The programme is selected according to your interests and, among others, includes:</p>\r\n<ul>\r\n<li>Classical masterpieces</li>\r\n<li>Jazz, Blues, Rock’n’roll</li>\r\n<li>Hits songs of The Beatles, Abba, etc.</li>\r\n<li>Themes from operas and ballets</li>\r\n<li>Movie soundtracks</li>\r\n<li>Musicals</li>\r\n<li>Pop</li>\r\n<li>Ethnic music</li>\r\n</ul>\r\n<p>The programme specially designed for adults not only allows to make dreams come true, but also enables passing them on to children. Parents and children often begin their music education parallelly, and while practicing at home, they can help each other. This kind of music cooperation helps better understand one''s own children, and build a deeper connection, particularly through playing together in duets.</p>\r\n<p>During the first month you are not required to have your own instrument at home.</p>', '<p>Individual classes based on a master-pupil system . A specially designed programme for teaching adults from scratch.</p>'),
(42, 2, 11, '<p>In childhood we all used to sing songs during trips, when sitting around a campfire, attending school celebrations, or even in choir. It always gave us a lot of pleasure and satisfaction, however with time we forgot all about it. Moreover, adults, who live in constant rush, often forget about the basic activity-proper breathing. Singing lessons allows to free one’s voice, to feel unrestricted and happy again. And to once more discover one’s musical potential.</p>\r\n<p>The programme is selected according to your interests and, among others, includes:</p>\r\n<ul>\r\n<li>Classical songs</li>\r\n<li>Jazz and musical standards</li>\r\n<li>Arias and classical masterpieces</li>\r\n<li>Popular and ethnic songs</li>\r\n</ul>', '<p>Individual classes based on a master-pupil system . A specially designed programme for teaching adults from scratch.</p>'),
(43, 2, 12, '<p>The guitar is a reminiscent of a fireplace and a warm family atmosphere. Its sounds create a delightful mood. This instrument can be easily packed and played all around the world. Singing together strengthens the bonds between people and sparks unforgettable memories.</p>\r\n<p>The programme is selected according to your interests and, among others, includes:</p>\r\n<ul>\r\n<li>Classical masterpieces</li>\r\n<li>Jazz, Blues, Rock’n’roll</li>\r\n<li>Hits songs of The Beatles, Abba, etc.</li>\r\n<li>Themes from operas and ballets</li>\r\n<li>Movie soundtracks</li>\r\n<li>Musicals</li>\r\n<li>Pop</li>\r\n<li>Ethnic music</li>\r\n</ul>\r\n<p>The carefully designed method of reading music sheets guarantees easiness and fast pace of learning. The programme includes solo pieces and duets-two guitars. In addition, lessons are enriched with interesting facts from the history of music.</p>\r\n<p>For advanced learners, there are electric guitar lessons.</p>\r\n<p>There is an instrument at the school, so you don’t have to bring your own-a comfortable solution. During the first month you are not required to have your own instrument at home.</p>', '<p>Individual classes based on a master-pupil system . A specially designed programme for teaching adults from scratch.</p>'),
(44, 2, 13, '<p>The soft and tender sound of the instrument creates a warm, comfortable atmosphere. It is a unique instrument that you can actually hug. In this rushed world, it gives a sense of security and calmness. In its presence, you may find a moment for yourself, only for yourself.</p>\r\n<p>The programme is selected according to your interests and, among others, includes:</p>\r\n<ul>\r\n<li>Classical masterpieces</li>\r\n<li>Jazz, Blues, Rock’n’roll</li>\r\n<li>Hits songs of The Beatles, Abba, etc.</li>\r\n<li>Themes from operas and ballets</li>\r\n<li>Movie soundtracks</li>\r\n<li>Musicals</li>\r\n<li>Pop</li>\r\n<li>Ethnic music</li>\r\n</ul>\r\n<p>The carefully designed method of reading music sheets guarantees easiness and fast pace of learning. The programme includes solo pieces and duets-performed with another cello or a piano. In addition, lessons are enriched with interesting facts from the history of music.</p>\r\n<p>There is an instrument at the school, so you don’t have to bring your own-a comfortable solution. During the first month you are not required to have your own instrument at home.</p>', '<p>Individual classes based on a master-pupil system . A specially designed programme for teaching adults from scratch.</p>'),
(45, 2, 14, '<p>Magical, shining, strong – the saxophone seduces and charms. Its sounds express emotions that cannot be verbalized otherwise. It has a wide sound spectrum and creates a unique atmosphere during meetings with loved ones.</p>\r\n<p>The programme is selected according to your interests and, among others, includes:</p>\r\n<ul>\r\n<li>Classical masterpieces</li>\r\n<li>Jazz, Blues, Rock’n’roll</li>\r\n<li>Hits songs of The Beatles, Abba, etc.</li>\r\n<li>Themes from operas and ballets</li>\r\n<li>Movie soundtracks</li>\r\n<li>Musicals</li>\r\n<li>Pop</li>\r\n<li>Ethnic music</li>\r\n</ul>\r\n<p>The carefully designed method of reading music sheets guarantees easiness and fast pace of learning. The programme includes solo pieces and duets-performed with another saxophone or a piano, as well as lessons of improvisation. In addition, lessons are enriched with interesting facts from the history of music.</p>\r\n<p>There is an instrument at the school, so you don’t have to bring your own-a comfortable solution. During the first month you are not required to have your own instrument at home.</p>', '<p>Individual classes based on a master-pupil system . A specially designed programme for teaching adults from scratch.</p>'),
(46, 2, 15, '', '<p>Individual classes based on a master-pupil system . A specially designed programme for teaching adults from scratch.</p>'),
(47, 2, 16, '', '<p>Individual classes based on a master-pupil system . A specially designed programme for teaching adults from scratch.</p>'),
(48, 2, 17, '', '<p>Individual classes based on a master-pupil system . A specially designed programme for teaching adults from scratch.</p>'),
(49, 2, 18, '<p>A music lover is an expert in music. Such a person can recognize a good performance, notice its important elements, and surprise others with an interesting anecdote about the composer. Concert hall has no secrets. A music lover knows when to clap, and which concerts to attend. It is a person who have knowledge about art.</p>\r\n<p>The programme is selected in accordance with your interests, and it includes among others:</p>\r\n<ul>\r\n<li>history of music</li>\r\n<li>musical literature</li>\r\n<li>lives and works of great composers</li>\r\n<li>world canon of musical masterpieces</li>\r\n<li>watching and analyzing selected fragments of operas and ballets</li>\r\n<li>rules of music</li>\r\n</ul>\r\n<p>Lessons are available in English</p>', '<p>Individual classes based on a master-pupil system . A specially designed programme for teaching adults from scratch.</p>'),
(50, 2, 20, NULL, '<p>Individual classes based on a master-pupil system . A specially designed programme for teaching adults from scratch.</p>'),
(51, 3, 1, NULL, NULL),
(52, 3, 2, '<p>Ca hát ru – chương trình chính chủ của cô Bogna Kołodziej, dành cho những người mẹ và những bạn đang có thai, quan tâm đến sự phát triển toàn diện và mối quan hệ gần gũi với đứa trẻ ngay từ sự khởi đầu.</p>\r\n<p> Trong chương trình dạy âm nhạc riêng lẻ còn có luyện tập giọng, bằng cách học ngâm những vần điệu hát ru và nghe những bài hát thiếu nhi của mọi miền dân tộc trên thế giới:</p>\r\n<ul>\r\n<li>hát ru Ai-len</li>\r\n<li>hát ru Italia</li>\r\n<li>hát ru Cu-ba</li>\r\n<li>hát ru Châu Phi</li>\r\n<li>hát ru Nhật Bản</li>\r\n</ul>\r\n<p>Những thành phần điều trị âm nhạc thêm sẽ giúp cho học sinh tự giải quyết được những vấn đề và stress trong cuộc sống hàng ngày. Bài tập hít thở và bài tập với nhạc cụ khi nghe một vài đoạn âm nhạc chọn lọc (không chỉ nhạc cổ điển) có tác dụng thư giãn, làm tăng cảm giác vui mừng và hài lòng với cuộc sống, cho cả người mẹ và cho cả em bé.</p>\r\n<p>Có thể học bằng tiếng Ba Lan hoặc tiếng Anh.</p>', ''),
(53, 3, 3, NULL, NULL),
(54, 3, 4, '<p>Những bài dạy chơi đàn piano cho từng cá nhân, hệ thống thầy-trò, dành cho trẻ em từ 5 tuổi trở lên, với mục đích nuôi dạy các cháu trở thành những người hâm mộ âm nhạc, như vậy cả đời sẽ gắn bó với nghệ thuật.</p>\r\n<p>Sau những giờ học vất vả và đầy lo lắng trong trường, âm nhạc luôn mang lại sự trấn an và thư giãn cần thiết. Khi học nhạc, học sinh có thể thư giãn và thả mình vào thế giới âm thanh. Tại đây, các cháu là những người quan trọng nhất, xung quang có sự tin tưởng tuyệt đối, tăng thêm cảm giác an toàn. Tại đây, các cháu có thể hiện mình, thực sự - âm nhạc giúp các cháu bày tỏ tình cảm, xả bớt stress và những lo âu.</p>\r\n<p>Cách đối xử với học sinh mới, tốt hơn, coi các cháu như những người quan trọng, mà những lời nói, những tư duy hay cảm xúc của các cháu đều có ý nghĩa. Khi học, các cháu không chỉ học chơi đàn, mà có thể nói chuyện với giáo viên về những vấn đề mà các cháu đang vướng mắc.</p>\r\n<p>Chương trình áp dụng cho từng lứa tuổi và khả năng của từng cháu, bao gồm:</p>\r\n<ul>\r\n<li>đọc nốt nhạc theo phương pháp chính chủ của bà Grazyna Kołodziej</li>\r\n<li>các tác phẩm đơn và kép chơi 4 tay</li>\r\n<li>phim âm nhạc</li>\r\n<li>luyện tai nghe</li>\r\n<li>solfeggio</li>\r\n<li>lịch sử và lý thuyết âm nhạc</li>\r\n<li>trò chơi và các trò vui âm nhạc</li>\r\n</ul>\r\n<p>Chương trình có nhiều văn học âm nhạc, bao gồm những tác phẩm cổ điển, jazz, nhạc phim, thí dụ như phim hoạt họa Disney, nhạc dân tộc, kể cả những bài thánh ca.</p>\r\n<p>Chương trình học bao gồm:</p>\r\n<ol>\r\n<li>Cơ bản</li>\r\n<li>Trung cấp</li>\r\n<li>Cao cấp, với khả năng chuẩn bị nhập trường Đại học Âm nhạc hoặc đi tham gia thi piano</li>\r\n</ol>\r\n<p>Lợi ích thêm là có thể tham gia những buổi học tổ chức thường kỳ và những tiết học nghệ nhân, nhờ có sự hợp tác quốc tế giữa Trường Nhạc và các giáo viên piano đến từ nhiều quốc gia khác như là Đức, Liên hiệp Anh, Phần Lan và Mỹ.</p>\r\n<p>Trong tháng học thử đầu tiên, chưa cần phải có nhạc cụ ở nhà mình.</p>\r\n<p>Có thể học bằng tiếng Ba Lan hoặc tiếng Anh.</p>', '');
INSERT INTO `courses_translation` (`id`, `languages_id`, `courses_id`, `long_desc`, `short_desc`) VALUES
(55, 3, 5, '<p>Những bài dạy chơi đàn piano cho từng cá nhân, hệ thống thầy-trò.</p>\r\n<p>Sự tiếp xúc với âm nhạc là một cuộc phiêu lưu thú vị. Công việc học đàn trong trường của chúng tôi có tính chất giáo dục sáng chế. Không có điểm, không có kỳ thi. Trẻ em là quan trọng nhất, những câu nói của các cháu, những suy nghĩ và cảm xúc của các cháu cũng quan trọng. Khi học luôn có bầu không khí thân thiện, tình bạn ấm cúng, gây ra cảm giác an toàn và dễ chịu. Nhờ vậy mà làm tăng tính tự đánh giá được bản thân và biết được giá trị của chính mình.</p>\r\n<p>Khi học, các cháu có thêm được những kỹ năng âm nhạc, mà cũng có thể học cách quản lý sử dụng thời gian của mình một cách tốt nhất. Biết tổ chức hoàn thành trách nhiệm, biết chia thời gian học và chơi, biết ôn bài và làm bài tập về nhà, biết chơi nhạc cụ và biết kiếm được thời gian cho bản thân, nghỉ ngơi thư giãn.</p>\r\n<p>Chương trình áp dụng cho từng lứa tuổi và khả năng của từng cháu, bao gồm:</p>\r\n<ul>\r\n<li>những bài hát phổ biến và yêu thích</li>\r\n<li>trò chơi và vui chơi âm nhạc, có âm thanh</li>\r\n<li>học các tự biên tự diễn luôn</li>\r\n<li>biểu diễn những sáng tác thanh ca của bản thân (opera, musical)</li>\r\n<li>chuyện cổ tích âm nhạc</li>\r\n</ul>\r\n<p>Các bài học làm tăng tính âm nhạc, cũng tăng bộ máy và thông thạo phát âm. Các bài học dạy xả stress cơ thể. Mục đích tiết học thanh nhạc là làm tăng tình yêu âm nhạc và tăng cảm giác tự tin bản thân.</p>\r\n<p>Có thể học bằng tiếng Ba Lan hoặc tiếng Anh.</p>', ''),
(56, 3, 6, '<p>Những bài dạy chơi đàn ghi-ta cho từng cá nhân, hệ thống thầy-trò.</p>\r\n<p>Các tiết học phát triển tính sáng tạo của học sinh, trong bầu không khí thân thiện. Với những phương pháp của bản thân, do giáo viên chọn lựa cho nhu cầu cá nhân của từng học sinh, có thể chấn chỉnh trí nhớ và phát triển tốt tính tập trung. Những tính chất này rất có ích trong trường học, ngoài ra cũng có tính chất chủ chốt trong đời khi lớn khôn – trong cuộc đời riêng tư và trên bước đường nghề nghiệp.</p>\r\n<p>Khi học, học sinh làm quen với những tác phẩm mới, do vậy có thể phát triển kỹ năng biết phân tích, đọc hiểu, cảm nhận các nốt nhạc và đánh giá tài liệu nhanh hơn. Chinh phục những khó khăn như thế nào nếu gặp phải? Nhìn nhận thấy những điểm tương đồng như thế nào trong tác phẩm âm nhạc? Cảm nhận những thành phần âm nhạc lạ như thế nào? Các tiết học âm nhạc giúp cho học sinh hoàn hảo thêm những kỹ năng tư duy có lô-gic.</p>\r\n<p> Chương trình áp dụng cho từng lứa tuổi và khả năng của từng cháu, bao gồm:</p>\r\n<ul>\r\n<li>đọc nốt nhạc theo</li>\r\n<li>phim âm nhạc</li>\r\n<li>luyện tai nghe</li>\r\n<li>solfeggio</li>\r\n<li>lịch sử và lý thuyết âm nhạc</li>\r\n<li>trò chơi và các trò vui âm nhạc</li>\r\n</ul>\r\n<p>Chương trình có nhiều văn học âm nhạc, bao gồm những tác phẩm cổ điển, jazz, nhạc phim, thí dụ như phim hoạt họa Disney, nhạc dân tộc, kể cả những bài thánh ca.</p>\r\n<p>Trong chương trình học, có những tác phẩm đơn (solo), có cả những tác phẩm kép (duet) – những tác phẩm có đàn ghi ta thứ hai cùng đệm.</p>\r\n<p>Những người đã biết chơi đàn, có thể học đàn ghi-ta điện.</p>\r\n<p>Ở trong trường chúng tôi có nhạc cụ, vậy khi đến học thì không cần mang theo nhạc cụ của mình – đó là giải pháp rất tiện lợi. Trong tháng học thử đầu tiên, chưa cần phải có nhạc cụ ở nhà mình.</p>\r\n<p>Có thể học bằng tiếng Ba Lan hoặc tiếng Anh.</p>', ''),
(57, 3, 7, '<p>Những bài dạy chơi đàn cello cho từng cá nhân, hệ thống thầy-trò.</p>\r\n<p>Học nhạc sẽ tăng cường được cảm giác giá trị bản thân. Trẻ em học trong bầu không khí thân thiện và an toàn, luôn có niềm vui và sự thích thú khi học nhạc. Cùng chơi đàn xây dựng mối quan hệ gần gũi với thầy cô, bởi vì âm nhạc có thể gắn kết mọi người với nhau và tạo ra mối quan hệ bạn bè.</p>\r\n<p>Chơi nhạc cụ đôi (duo), ban đầu với giáo viên, sau đó cùng với những học sinh khác, học được cách hợp tác, mà rất cần thiết trong cuộc đời trưởng thành sau này. Học được cách làm nhiệm vụ, làm việc trong nhóm, cùng nhau tìm ra giải pháp tốt nhất, biết nghe và biết hiểu người khác.</p>\r\n<p>Khi làm quen với những tác phẩm mới, học sinh có thể mở mang kỹ năng và khắc phục được những khó khăn. Làm thế nào để tìm được những phương pháp thích hợp và có hiệu quả để giải được những nhiệm vụ khó khăn. Có thêm được tính kiên trì, không sớm đầu hàng trong những tình huống nguy cấn, có can đảm để đối mặt với mọi vấn đề và tìm ra được giải pháp. Học được tính bền bỉ trên con đường tiến tới sự hoàn hảo.</p>\r\n<p> Chương trình áp dụng cho từng lứa tuổi và khả năng của từng cháu, bao gồm:</p>\r\n<ul>\r\n<li>đọc nốt nhạc theo</li>\r\n<li>phim âm nhạc</li>\r\n<li>luyện tai nghe</li>\r\n<li>solfeggio</li >\r\n<li>lịch sử và lý thuyết âm nhạc</li>\r\n<li>trò chơi và các trò vui âm nhạc</li>\r\n</ul>\r\n<p>Chương trình có nhiều văn học âm nhạc, bao gồm những tác phẩm cổ điển, jazz, nhạc phim, thí dụ như phim hoạt họa Disney, nhạc dân tộc, kể cả những bài thánh ca.</p>\r\n<p>Trong chương trình học sẽ có những bài solo (đơn) hoặc những bài kép (song ca) – những bản nhạc đệm cùng violon thứ hai hoặc là piano.</p>\r\n<p>Ở trong trường chúng tôi có nhạc cụ, vậy khi đến học thì không cần mang theo nhạc cụ của mình – đó là giải pháp rất tiện lợi. Trong tháng học thử đầu tiên, chưa cần phải có nhạc cụ ở nhà mình.</p>\r\n<p>Có thể học bằng tiếng Ba Lan hoặc tiếng Anh.</p>', ''),
(58, 3, 8, '<p>Những bài dạy chơi đàn xasophone cho từng cá nhân, hệ thống thầy-trò.</p>\r\n<p>Trong bầu không khí tuyệt vời, trẻ em làm quen được với những thanh điệu và những tác phẩm âm nhạc mới, mà điều này tạo ra sự phát triển trí tưởng tượng. Giáo viên quan tâm làm tăng cường cảm giác có giá trị của học sinh, bằng cách là rất tôn trọng học sinh.</p>\r\n<p>Chơi nhạc cụ là một ngôn ngữ quốc tế, biểu lộ cảm xúc và ý nghĩ, mà đôi khi không thể truyền đạt bằng lời nói. Đồng thời, đó cũng là trò vui chơi tuyệt vời. Qua âm nhạc, học sinh có thể giới thiệu về bản thân tốt hơn, nói ra những trải nghiệm nội tâm và làm quen với chính bản thân.</p>\r\n<p> Chương trình áp dụng cho từng lứa tuổi và khả năng của từng cháu, bao gồm:</p>\r\n<ul>\r\n<li>đọc nốt nhạc theo</li>\r\n<li>phim âm nhạc</li>\r\n<li>luyện tai nghe</li>\r\n<li>solfeggio</li >\r\n<li>lịch sử và lý thuyết âm nhạc</li>\r\n<li>trò chơi và các trò vui âm nhạc</li>\r\n</ul>\r\n<p>Chương trình có nhiều văn học âm nhạc, bao gồm những tác phẩm cổ điển, jazz, nhạc phim, thí dụ như phim hoạt họa Disney, nhạc dân tộc, kể cả những bài thánh ca.</p>\r\n<p>Trong chương trình học, có những tác phẩm đơn (solo), có cả những tác phẩm kép (duet) – những tác phẩm có đàn xasophone thứ hai hoặc là piano cùng đệm, ngoài ra còn học tự biên tự diễn luôn.</p>\r\n<p>Ở trong trường chúng tôi có nhạc cụ, vậy khi đến học thì không cần mang theo nhạc cụ của mình – đó là giải pháp rất tiện lợi. Trong tháng học thử đầu tiên, chưa cần phải có nhạc cụ ở nhà mình.</p>\r\n<p>Có thể học bằng tiếng Ba Lan hoặc tiếng Anh.</p>', ''),
(59, 3, 9, '<p>Các bài giảng mang lại tình yêu âm nhạc theo suốt cuộc đời, được thiết kế cho các em từ 3 đến 6 tuổi, lứa tuổi với trí óc đặc biệt cởi mở và mong đợi được đón nhận kiến thức mới. Chương trình giảng dạy một thày – một trò luôn được điều chỉnh để phù hợp với từng lứa tuổi và khả năng của từng học sinh sẽ dẫn dắt các em đến với thế giới âm thanh và âm nhạc.</p>\r\n<p>Chương trình đầu tiên do cô Bogna Kołodziej soạn cung cấp một khối lượng lớn âm nhạc cùng các hoạt động sôi nổi, điều đó vừa kích thích sự phát triển của trẻ, vừa làm trẻ rất vui vẻ và hứng thú. Đồng thời, chương trình này cũng chính là sự chuẩn bị để các em bắt đầu chơi một loại nhạc cụ mà các em yêu thích.</p>\r\n<p>Chương trình học nhạc và luyện tai nghe bao gồm:</p>\r\n<ul>\r\n<li>Các trò chơi âm nhạc</li>\r\n<li>Học hát các bài hát phổ biến</li>\r\n<li>Xem phim nhạc</li>\r\n<li>Độc lập chơi nhạc ngẫu hứng trên piano và các nhạc cụ khác</li>\r\n<li>Kể chuyện cổ tích âm nhạc</li>\r\n<li>Giới thiệu các kiệt tác âm nhạc cổ điển</li>\r\n<li>Tham gia các buổi hoà nhạc nhỏ - nhạc sống</li>\r\n</ul>\r\n<p>Có thể học bằng tiếng Ba Lan hoặc tiếng Anh.</p>', ''),
(60, 3, 10, '<p>Những giờ học cá nhân theo hệ thống thầy-trò. Chương trình đặc biệt dạy người lớn bắt đầu từ cơ bản.</p>\r\n<p>Nhiều người đã mơ ước chơi piano từ khi còn nhỏ, nhưng hoàn cảnh khi đó không cho phép. Những giấc mơ thời thơ ấu đó thường trở lại sau nhiều năm, và khi thực hiện được, nó mang lại cho ta thật nhiều niềm vui, thư giãn và sự hài lòng mãn nguyện. Phương pháp dạy đọc nốt nhạc của chính chủ (của thầy/cô sáng tác) bảo đảm học rất dễ và rất nhanh.</p>\r\n<p>Chương trình được chuẩn bị tùy theo những quan tâm của Quý vị, bao gồm:</p>\r\n<ul>\r\n<li>các tác phẩm cổ điển </li>\r\n<li>jazz, blues, rock’n’roll </li>\r\n<li>các bài hát hay của những băng nhạc như là The Beatles hay là Abba </li>\r\n<li>chủ đề opera hoặc ba-lê</li>\r\n<li>nhạc phim </li>\r\n<li>phim ca nhạc </li>\r\n<li>pop </li>\r\n<li>nhạc dân tộc </li>\r\n</ul>\r\n<p>Chương trình dành cho người lớn không chỉ biến giấc mơ thời thơ ấu của bạn thành sự thật, mà còn truyền được cả sự say mê cho các con bạn. Thường khi cha mẹ và con cái cùng học đàn, thì lúc tập ở nhà có thể giúp đỡ lẫn nhau. Việc cùng học nhạc như vậy cũng chính là cơ hội để bạn tiếp xúc gần gũi hơn với con mình, hiểu con mình hơn, và thậm chí cùng chơi piano bốn tay với con mình luôn.</p> <p>Trong tháng học thử đầu tiên, chưa cần phải có nhạc cụ ở nhà mình.</p>\r\n<p>Có thể học bằng tiếng Ba Lan hoặc tiếng Anh.</p>', ''),
(61, 3, 11, '<p>Những giờ học cá nhân theo hệ thống thầy-trò. Chương trình đặc biệt dạy người lớn bắt đầu từ cơ bản</p>\r\n<p>Thời thơ ấu ai trong chúng ta cũng đã từng hát khi đi dã ngoại, những buổi đốt lửa trại, ở những ngày kỷ niệm trong trường học hay là trong đội văn nghệ.\r\nNhững lần như vậy luôn làm cho chúng ta vui mừng và hài lòng, thời gian trôi làm cho chúng ta quên dần.Hơn nữa, trong cuộc sống tất bật hiện nay, rất hay quên những hoạt động cơ bản, như là phải hít thở thật chuẩn. Khi học hát, cho phép chúng ta thoát mở giọng mình, để lại có thể cảm thấy tự do và vui sướng. Và có thể lại phát hiện ra được tài năng âm nhạc của mình.</p>\r\n<p>Chương trình được chuẩn bị tùy theo những quan tâm của Quý vị, bao gồm:</p>\r\n<ul>\r\n<li>Các bài ca cổ điển</li>\r\n<li>Các bài chuẩn phim nhạc và jazz</li>\r\n<li>Arie và các tác phẩm cổ điển</li>\r\n<li>Các bài hát yêu thích và các bài hát dân tộc</li>\r\n</ul>\r\n<p>Trong khóa học, bạn sẽ được học các kỹ thuật cộng hưởng tự nhiên và khuếch đại giọng nói, học sử dụng hợp lý các cơ chế thở và cách phát giọng ra thích hợp hơn. Các lớp học dành cho những người muốn phát triển giọng và muốn có niềm vui thông qua làm việc với giọng nói.</p>\r\n<p>Có thể học bằng tiếng Ba Lan hoặc tiếng Anh.</p>', ''),
(62, 3, 12, '<p>Những giờ học cá nhân theo hệ thống thầy-trò. Chương trình đặc biệt dạy người lớn bắt đầu từ cơ bản.</p>\r\n<p>Đàn ghi-ta được liên tưởng đến chiếc lò đốt củi sưởi ấm trong nhà và với một bầu không khí thân mật. Tiếng đàn tạo ra không gian dễ chịu. Đây là nhạc cụ mà rất dễ mang theo ở mọi nơi để chơi, trên khắp thế giới. Đặc biệt khi hát cùng nhau có thể làm tăng tình bạn thân thiện và mở ra những kỷ niệm không bao giờ quên.</p>\r\n<p>Chương trình được chuẩn bị tùy theo những quan tâm của Quý vị, bao gồm:</p>\r\n<ul>\r\n<li>các tác phẩm cổ điển</li>\r\n<li>jazz, blues, rock’n’roll</li>\r\n<li>các bài hát hay của những băng nhạc như là The Beatles hay là Abba</li>\r\n<li>chủ đề opera hoặc ba-lê</li>\r\n<li>nhạc phim</li>\r\n<li>phim ca nhạc</li>\r\n<li>pop</li>\r\n<li>nhạc dân tộc</li>\r\n</ul>\r\n<p>Phương pháp dạy đọc nốt nhạc của chính chủ (của thầy/cô sáng tác) bảo đảm học rất dễ và rất nhanh. Trong chương trình học sẽ có những bài solo (đơn) hoặc những bài kép (song ca) – hai cây đàn ghi-ta. Các bài học phong phú thêm về những câu chuyện kể về lịch sử âm nhạc.</p>\r\n<p>Những người đã biết chơi đàn, có thể học đàn ghi-ta điện.</p>\r\n<p>Ở trong trường chúng tôi có nhạc cụ, vậy khi đến học thì không cần mang theo nhạc cụ của mình – đó là giải pháp rất tiện lợi. Trong tháng học thử đầu tiên, chưa cần phải có nhạc cụ ở nhà mình.</p>\r\n<p>Có thể học bằng tiếng Ba Lan hoặc tiếng Anh.</p>', ''),
(63, 3, 13, '<p>Những giờ học cá nhân theo hệ thống thầy-trò. Chương trình đặc biệt dạy người lớn bắt đầu từ cơ bản</p>\r\n<p>Tiếng nhạc ấm cúng và thi ca tạo ra bầu không khí đặc biệt và rất thoải mái, dễ chịu. Đây là loại nhạc cụ đặc biệt, có thể ôm ấp và âu yếm. Trên thế giới nhộn nhịp này, nó tạo ra cảm giác an toàn và yên tĩnh. Cùng nhạc cụ này, có thể tìm cho mình những giây phút riêng tư, chỉ dành cho chính mình.</p>\r\n<p>Chương trình được chuẩn bị tùy theo những quan tâm của Quý vị, bao gồm:</p>\r\n<ul>\r\n<li>các tác phẩm cổ điển</li>\r\n<li>jazz, blues, rock’n’roll</li>\r\n<li>các bài hát hay của những băng nhạc như là The Beatles hay là Abba</li>\r\n<li>chủ đề opera hoặc ba-lê</li>\r\n<li>nhạc phim</li>\r\n<li>phim ca nhạc</li>\r\n<li>pop</li>\r\n<li>nhạc dân tộc</li>\r\n</ul>\r\n<p>Phương pháp dạy đọc nốt nhạc của chính chủ (của thầy/cô sáng tác) bảo đảm học rất dễ và rất nhanh. Trong chương trình học sẽ có những bài solo (đơn) hoặc những bài kép (song ca) – những bản nhạc đệm cùng violon thứ hai hoặc là piano.Các bài học phong phú thêm về những câu chuyện kể về lịch sử âm nhạc.</p>\r\n<p>Ở trong trường chúng tôi có nhạc cụ, vậy khi đến học thì không cần mang theo nhạc cụ của mình – đó là giải pháp rất tiện lợi. Trong tháng học thử đầu tiên, chưa cần phải có nhạc cụ ở nhà mình.</p>\r\n<p>Có thể học bằng tiếng Ba Lan hoặc tiếng Anh.</p>', ''),
(64, 3, 14, '<p>Những giờ học cá nhân theo hệ thống thầy-trò. Chương trình đặc biệt dạy người lớn bắt đầu từ cơ bản</p>\r\n<p>Huyền bí, lóng lánh, đầy nghị lực – tiếng đàn saxophon quyết rũ và làm mê hoặc. Âm thanh của nó toát ra được những tình cảm, mà không thể miêu tả bằng lời.\r\nNó có những khả năng âm thanh dữ dội và tạo ra được bầu không khí phi thường, khi những người thân ngồi bên nhau.</p>\r\n<p>Chương trình được chuẩn bị tùy theo những quan tâm của Quý vị, bao gồm:</p>\r\n<ul>\r\n<li>các tác phẩm cổ điển</li>\r\n<li>jazz, blues, rock’n’roll</li>\r\n<li>các bài hát hay của những băng nhạc như là The Beatles hay là Abba</li>\r\n<li>chủ đề opera hoặc ba-lê</li>\r\n<li>nhạc phim</li>\r\n<li>phim ca nhạc</li>\r\n<li>pop</li>\r\n<li>nhạc dân tộc</li>\r\n</ul>\r\n<p>Phương pháp dạy đọc nốt nhạc của chính chủ (của thầy/cô sáng tác) bảo đảm học rất dễ và rất nhanh. Trong chương trình học sẽ có những tác phẩm đơn (solo) hoặc những bài kép (song ca) – những bản nhạc đệm cùng saxophon thứ hai hoặc piano, còn học cả cách tự biên tự diễn luôn. Các bài học phong phú thêm về những câu chuyện kể về lịch sử âm nhạc.</p>\r\n<p>Ở trong trường chúng tôi có nhạc cụ, vậy khi đến học thì không cần mang theo nhạc cụ của mình – đó là giải pháp rất tiện lợi. Trong tháng học thử đầu tiên, chưa cần phải có nhạc cụ ở nhà mình.</p>\r\n<p>Có thể học bằng tiếng Ba Lan hoặc tiếng Anh.</p>', ''),
(65, 3, 15, NULL, NULL),
(66, 3, 16, NULL, NULL),
(67, 3, 17, NULL, NULL),
(68, 3, 18, '<p>Program skierowany jest do osób dorosłych chcących rozwijać swoją wiedzę muzyczna bez konieczności nauki gry na instrumencie.</p>\r\n<p>Meloman to znawca muzyki.  Potrafi zaskoczyć ciekawą anegdotą o kompozytorze, zwrócić uwagę na istotne elementy dzieła muzycznego, a także rozpoznać dobre wykonanie. Sala koncertowa nie ma przed nim tajemnic. Wie kiedy należy klaskać i na jakie koncerty warto się wybrać. Jest osobą, która zna się na sztuce.</p>\r\n<p>Program przygotowywany jest według Państwa zainteresowań, składa się m.in. z:</p>\r\n<ul>\r\n<li>historia muzyki</li>\r\n<li>literatura muzyczna</li>\r\n<li>życie i twórczość wielkich kompozytorów</li>\r\n<li>światowy kanon arcydzieł muzycznych</li>\r\n<li>oglądanie i analizowanie wybranych fragmentów z oper i baletów</li>\r\n<li>zasady muzyki</li>\r\n</ul>', ''),
(69, 3, 20, NULL, NULL),
(71, 4, 1, '', ''),
(72, 4, 2, '', ''),
(73, 4, 3, '', ''),
(74, 4, 4, '<p>Facing the stress and challenges every-day of school reality, children benefit from playing, as it gives relief and necessary relax. During the classes pupils may unwind and dive into the world of sounds. Here, they are the most important, surrounded by priceless trust, which strengthens their sense of security. Here, they can be authentic - music helps them express their emotions, unload their tension and stress.</p>\r\n<p>A new, improved method of treating pupils as important individuals whose words, thoughts, and emotions are significant. During the classes, children learn not only how to play an instrument, but also discuss with the teacher many vital problems.</p>\r\n<p>The programme is selected according to your interests and, among others, includes:</p>\r\n<ul>\r\n<li>reading music sheets according to Grazyna Kolodziej’s special method</li>\r\n<li>solo pieces, and 4-hand duets</li>\r\n<li>movies about music</li>\r\n<li>refinement of hearing</li>\r\n<li>solfege</li>\r\n<li>history and theory of music</li>\r\n<li>music games</li>\r\n</ul>\r\n<p>The program provides learners with an extensive range of music literature, including, among others, classical and jazz pieces, soundtracks from Disney movies, ethnic music, as well as Christmas carols.</p>\r\n<p>Learning consists of 3 stages:</p>\r\n<ol>\r\n<li>basic</li>\r\n<li>intermediate</li>\r\n<li>advance with the possibility of preparing for music universities or piano competitions</li>\r\n</ol>\r\n<p>An additional benefit offered by our school is a chance to participate in workshops and master classes organized periodically by the Music Conversatory, thanks to an international cooperation with piano teachers from different countries – for example, Germany, the UK, Finland, and the USA.</p>\r\n<p>During the first month you are not required to have your own instrument at home.</p>', ''),
(75, 4, 5, '<p>Contact with music is an exciting adventure. Lessons at our school have elements of innovative education. There are no grades or exams. Children are most important, as well as their opinions, thoughts, and feelings. During lessons, there is a warm friendly atmosphere, which gives a sense of security and comfort. It improves self-esteem and sense of own effectiveness.</p>\r\n<p>Through the learning process, pupils quire music skills, but also master time-management: how to schedule responsibilities, find time to study, do homework, play an instrument, and have time for oneself to relax.</p>\r\n<p>The programme includes:</p>\r\n<ul>\r\n<li>popular songs</li>\r\n<li>musical games with voice</li>\r\n<li>improvisations</li>\r\n<li>screenings of vocal masterpieces (operas, oratorios, and musicals)</li>\r\n<li>musical fairytales</li>\r\n</ul>\r\n<p>The aim is to awaken a love for music and to improve self-confidence.</p>\r\n<p>Lessons develop musicality, as well as vocal organs and speech smoothness. They also equip pupils with relaxation techniques, how to relieve body tensions. Singing lessons aim at awakening a love for music and improving self-confidence.</p>', ''),
(76, 4, 6, '<p>Music lessons develop pupils’ creativity in a favourable atmosphere. Appropriate methods, selected by the teacher to suit individual needs of every pupil, can improve memory and significantly amplify concentration. These abilities are useful at school, and very helpful in adult life - both private and professional.</p>\r\n<p>During a lesson, pupils learn new music sheets, what supports development of their analytical skills, notes interpretations, and faster tablature evaluation. How to overcome challenges? How to see similarities in a music piece? How to interpret unknown musical elements? Music lessons help pupils master skills of logical thinking.</p>\r\n<p>The programme is selected according to your interests and, among others, includes:</p>\r\n<ul>\r\n<li> reading music sheets </li>\r\n<li>cartoons about music</li>\r\n<li>refinement of hearing</li>\r\n<li>solfege</li>\r\n<li>history and theory of music</li>\r\n<li>music games</li>\r\n</ul>\r\n<p>The program provides learners with an extensive range of music literature, including, among others, classical and jazz pieces, soundtracks from Disney movies, ethnic music, as well as Christmas carols.</p>\r\n<p>The programme includes solo pieces, as well as duets - performed with another guitar.</p>\r\n<p>There is an instrument at the school, so you don’t have to bring your own-a comfortable solution. During the first month you are not required to have your own instrument at home.</p>', ''),
(77, 4, 7, '<p>Lessons develop the sense of self-esteem. Children enjoy music in a safe atmosphere that improves their learning process. Playing together builds a strong relationship with the teacher, as for music connects people and creates partnership.</p>\r\n<p>Performing in duets (initially with a teacher, later with other pupils) teaches cooperation, which is indispensable in adult life. It teaches also task-focus, team work, searching together for best solutions, and understanding of others.</p>\r\n<p>While learning new pieces, pupils train how to widen their abilities, and how to overcome obstacles - how to find correct and effective methods of solving difficult tasks. They acquire determination and perseverance, they do not give up in crisis situations; they have courage to face problems and look for solutions. They learn persistence in pursuing one’s dream.</p>\r\n<p>The programme is selected according to your interests and, among others, includes:</p>\r\n<ul>\r\n<li> reading music sheets </li>\r\n<li>cartoons about music</li>\r\n<li>refinement of hearing</li>\r\n<li>solfege</li>\r\n<li>history and theory of music</li>\r\n<li>music games</li>\r\n</ul>\r\n<p>The program provides learners with an extensive range of music literature, including, among others, classical and jazz pieces, soundtracks from Disney movies, ethnic music, as well as Christmas carols.</p>\r\n<p>The programme includes solo pieces and duets-performed with another cello or a piano.</p>\r\n<p>There is an instrument at the school, so you don’t have to bring your own-a comfortable solution. During the first month you are not required to have your own instrument at home.</p>', ''),
(78, 4, 8, '<p>In an exciting atmosphere, children learn new sounds and music pieces, which stimulates their creativity. Teachers take care to develop self-esteem of their pupils by respecting them.</p>\r\n<p>Playing an instrument is an international language of expressing emotions and thoughts, sometimes impossible to be captured in words. It is also a great fun. Through music, pupils learn how to express themselves better, how to talk about their inner experiences, and also they get to know themselves better.</p>\r\n<p>The programme is selected according to your interests and, among others, includes:</p>\r\n<ul>\r\n<li> reading music sheets </li>\r\n<li>cartoons about music</li>\r\n<li>refinement of hearing</li>\r\n<li>solfege</li>\r\n<li>history and theory of music</li>\r\n<li>music games</li>\r\n</ul>\r\n<p>The program provides learners with an extensive range of music literature, including, among others, classical and jazz pieces, soundtracks from Disney movies, ethnic music, as well as Christmas carols.</p>\r\n<p>The programme includes solo pieces and duets-performed with another saxophone or a piano, as well as lessons of improvisation.</p>\r\n<p>There is an instrument at the school, so you don’t have to bring your own-a comfortable solution. During the first month you are not required to have your own instrument at home.</p>', ''),
(79, 4, 9, '<p>Lessons which bring out a love of music that lasts for an entire lifetime, are designed for 3 to 6-years-olds, the age when children are particularly open and responsive to new knowledge. Lessons are individual, and the programme is adapted to fit age and skills of every pupil, introducing them to the world of sounds and music.</p>\r\n<p>This original programme designed by Bogna Kolodziej provides a vast amount of music, activity, and fun, which stimulates development and bring a lot of pleasure. There is an additional value, which is a simultaneous preparation to begin playing an instrument. </p>\r\n<p>The programme of learning music and refining hearing includes:</p>\r\n<ul>\r\n<li>music games</li>\r\n<li>singing popular songs</li>\r\n<li>screenings of music movies</li>\r\n<li>independent music improvisations on a piano and other instruments</li>\r\n<li>musical fairytales</li>\r\n<li>introduction to classical music masterpieces</li>\r\n<li>Mini concerts – live music</li>\r\n</ul>', ''),
(80, 4, 10, '<p>Many people have been dreaming of learning to play the piano since early childhood, unfortunately they haven''t had such an opportunity. Unfulfilled dreams of the past often come back years later, and making them come true gives a lot joy, satisfaction and relaxation.</p>\r\n<p>The programme is selected according to your interests and, among others, includes:</p>\r\n<ul>\r\n<li>Classical masterpieces</li>\r\n<li>Jazz, Blues, Rock’n’roll</li>\r\n<li>Hits songs of The Beatles, Abba, etc.</li>\r\n<li>Themes from operas and ballets</li>\r\n<li>Movie soundtracks</li>\r\n<li>Musicals</li>\r\n<li>Pop</li>\r\n<li>Ethnic music</li>\r\n</ul>\r\n<p>The programme specially designed for adults not only allows to make dreams come true, but also enables passing them on to children. Parents and children often begin their music education parallelly, and while practicing at home, they can help each other. This kind of music cooperation helps better understand one''s own children, and build a deeper connection, particularly through playing together in duets.</p>\r\n<p>During the first month you are not required to have your own instrument at home.</p>', '<p>Individual classes based on a master-pupil system . A specially designed programme for teaching adults from scratch.</p>'),
(81, 4, 11, '<p>In childhood we all used to sing songs during trips, when sitting around a campfire, attending school celebrations, or even in choir. It always gave us a lot of pleasure and satisfaction, however with time we forgot all about it. Moreover, adults, who live in constant rush, often forget about the basic activity-proper breathing. Singing lessons allows to free one’s voice, to feel unrestricted and happy again. And to once more discover one’s musical potential.</p>\r\n<p>The programme is selected according to your interests and, among others, includes:</p>\r\n<ul>\r\n<li>Classical songs</li>\r\n<li>Jazz and musical standards</li>\r\n<li>Arias and classical masterpieces</li>\r\n<li>Popular and ethnic songs</li>\r\n</ul>', '<p>Individual classes based on a master-pupil system . A specially designed programme for teaching adults from scratch.</p>'),
(82, 4, 12, '<p>The guitar is a reminiscent of a fireplace and a warm family atmosphere. Its sounds create a delightful mood. This instrument can be easily packed and played all around the world. Singing together strengthens the bonds between people and sparks unforgettable memories.</p>\r\n<p>The programme is selected according to your interests and, among others, includes:</p>\r\n<ul>\r\n<li>Classical masterpieces</li>\r\n<li>Jazz, Blues, Rock’n’roll</li>\r\n<li>Hits songs of The Beatles, Abba, etc.</li>\r\n<li>Themes from operas and ballets</li>\r\n<li>Movie soundtracks</li>\r\n<li>Musicals</li>\r\n<li>Pop</li>\r\n<li>Ethnic music</li>\r\n</ul>\r\n<p>The carefully designed method of reading music sheets guarantees easiness and fast pace of learning. The programme includes solo pieces and duets-two guitars. In addition, lessons are enriched with interesting facts from the history of music.</p>\r\n<p>For advanced learners, there are electric guitar lessons.</p>\r\n<p>There is an instrument at the school, so you don’t have to bring your own-a comfortable solution. During the first month you are not required to have your own instrument at home.</p>', '<p>Individual classes based on a master-pupil system . A specially designed programme for teaching adults from scratch.</p>'),
(83, 4, 13, '<p>The soft and tender sound of the instrument creates a warm, comfortable atmosphere. It is a unique instrument that you can actually hug. In this rushed world, it gives a sense of security and calmness. In its presence, you may find a moment for yourself, only for yourself.</p>\r\n<p>The programme is selected according to your interests and, among others, includes:</p>\r\n<ul>\r\n<li>Classical masterpieces</li>\r\n<li>Jazz, Blues, Rock’n’roll</li>\r\n<li>Hits songs of The Beatles, Abba, etc.</li>\r\n<li>Themes from operas and ballets</li>\r\n<li>Movie soundtracks</li>\r\n<li>Musicals</li>\r\n<li>Pop</li>\r\n<li>Ethnic music</li>\r\n</ul>\r\n<p>The carefully designed method of reading music sheets guarantees easiness and fast pace of learning. The programme includes solo pieces and duets-performed with another cello or a piano. In addition, lessons are enriched with interesting facts from the history of music.</p>\r\n<p>There is an instrument at the school, so you don’t have to bring your own-a comfortable solution. During the first month you are not required to have your own instrument at home.</p>', '<p>Individual classes based on a master-pupil system . A specially designed programme for teaching adults from scratch.</p>'),
(84, 4, 14, '<p>Magical, shining, strong – the saxophone seduces and charms. Its sounds express emotions that cannot be verbalized otherwise. It has a wide sound spectrum and creates a unique atmosphere during meetings with loved ones.</p>\r\n<p>The programme is selected according to your interests and, among others, includes:</p>\r\n<ul>\r\n<li>Classical masterpieces</li>\r\n<li>Jazz, Blues, Rock’n’roll</li>\r\n<li>Hits songs of The Beatles, Abba, etc.</li>\r\n<li>Themes from operas and ballets</li>\r\n<li>Movie soundtracks</li>\r\n<li>Musicals</li>\r\n<li>Pop</li>\r\n<li>Ethnic music</li>\r\n</ul>\r\n<p>The carefully designed method of reading music sheets guarantees easiness and fast pace of learning. The programme includes solo pieces and duets-performed with another saxophone or a piano, as well as lessons of improvisation. In addition, lessons are enriched with interesting facts from the history of music.</p>\r\n<p>There is an instrument at the school, so you don’t have to bring your own-a comfortable solution. During the first month you are not required to have your own instrument at home.</p>', '<p>Individual classes based on a master-pupil system . A specially designed programme for teaching adults from scratch.</p>'),
(85, 4, 15, '', '<p>Individual classes based on a master-pupil system . A specially designed programme for teaching adults from scratch.</p>'),
(86, 4, 16, '', '<p>Individual classes based on a master-pupil system . A specially designed programme for teaching adults from scratch.</p>'),
(87, 4, 17, '', '<p>Individual classes based on a master-pupil system . A specially designed programme for teaching adults from scratch.</p>'),
(88, 4, 18, '<p>A music lover is an expert in music. Such a person can recognize a good performance, notice its important elements, and surprise others with an interesting anecdote about the composer. Concert hall has no secrets. A music lover knows when to clap, and which concerts to attend. It is a person who have knowledge about art.</p>\r\n<p>The programme is selected in accordance with your interests, and it includes among others:</p>\r\n<ul>\r\n<li>history of music</li>\r\n<li>musical literature</li>\r\n<li>lives and works of great composers</li>\r\n<li>world canon of musical masterpieces</li>\r\n<li>watching and analyzing selected fragments of operas and ballets</li>\r\n<li>rules of music</li>\r\n</ul>\r\n<p>Lessons are available in English</p>', '<p>Individual classes based on a master-pupil system . A specially designed programme for teaching adults from scratch.</p>'),
(89, 4, 20, NULL, '<p>Individual classes based on a master-pupil system . A specially designed programme for teaching adults from scratch.</p>');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `course_name`
--

CREATE TABLE `course_name` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `course_name`
--

INSERT INTO `course_name` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `course_name_translation`
--

CREATE TABLE `course_name_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED DEFAULT '4',
  `course_name_id` int(10) UNSIGNED DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `course_name_translation`
--

INSERT INTO `course_name_translation` (`id`, `languages_id`, `course_name_id`, `course_name`) VALUES
(1, 1, 1, 'Logorytmika'),
(2, 1, 2, 'Kołysanki-śpiewanki'),
(3, 1, 3, 'Logopedia muzyczna'),
(4, 1, 4, 'Klasa fortepianu'),
(5, 1, 5, 'Klasa śpiewu'),
(6, 1, 6, 'Klasa gitary'),
(7, 1, 7, 'Klasa wiolonczeli'),
(8, 1, 8, 'Klasa saksofonu'),
(9, 1, 9, 'Pierwsze kroki'),
(10, 1, 10, 'Chór i Zespół wokalny'),
(11, 1, 11, 'Wystąpienia publiczne'),
(12, 1, 12, 'Program Musicfulness'),
(13, 1, 13, 'Program Meloman'),
(14, 1, 14, 'Dyrektor kreatywny'),
(15, 1, 15, 'Klasa kompozycji'),
(16, 2, 1, ''),
(17, 2, 2, ''),
(18, 2, 3, ''),
(19, 2, 4, 'Piano Class'),
(20, 2, 5, 'Singing Class'),
(21, 2, 6, 'Guitar Class'),
(22, 2, 7, 'Cello Class'),
(23, 2, 8, 'Saxophone Class'),
(24, 2, 9, 'First steps'),
(25, 2, 10, ''),
(26, 2, 11, ''),
(27, 2, 12, ''),
(28, 2, 13, 'Music Lover Programme'),
(29, 2, 14, 'Creative Director'),
(30, 2, 15, ''),
(31, 3, 1, ''),
(32, 3, 2, ''),
(33, 3, 3, ''),
(34, 3, 4, 'Lớp piano'),
(35, 3, 5, 'Lớp hát'),
(36, 3, 6, 'Lớp đàn ghita'),
(37, 3, 7, 'Lớp violonsen'),
(38, 3, 8, 'Lớp saxofon'),
(39, 3, 9, 'Những bước đầu tiên'),
(40, 3, 10, ''),
(41, 3, 11, 'Âm điệu tiếng Ba Lan'),
(42, 3, 12, ''),
(43, 3, 13, 'Chương trình Người mê âm nhạc'),
(44, 3, 14, 'Creative Director'),
(45, 3, 15, 'Sáng tác'),
(46, 4, 1, ''),
(47, 4, 2, ''),
(48, 4, 3, ''),
(49, 4, 4, 'Piano Class'),
(50, 4, 5, 'Singing Class'),
(51, 4, 6, 'Guitar Class'),
(52, 4, 7, 'Cello Class'),
(53, 4, 8, 'Saxophone Class'),
(54, 4, 9, 'First steps'),
(55, 4, 10, ''),
(56, 4, 11, ''),
(57, 4, 12, ''),
(58, 4, 13, 'Music Lover Programme'),
(59, 4, 14, 'Creative Director'),
(60, 4, 15, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `course_type`
--

CREATE TABLE `course_type` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `course_type`
--

INSERT INTO `course_type` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `course_type_translation`
--

CREATE TABLE `course_type_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `course_type_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `course_type_translation`
--

INSERT INTO `course_type_translation` (`id`, `languages_id`, `course_type_id`, `type`) VALUES
(1, 1, 1, 'Logorytmika'),
(2, 1, 2, 'Kołysanki'),
(3, 1, 3, 'Logopedia'),
(4, 1, 4, 'Fortepian'),
(5, 1, 5, 'Śpiew'),
(6, 1, 6, 'Gitara'),
(7, 1, 7, 'Wiolonczela'),
(8, 1, 8, 'Saksofon'),
(9, 1, 9, 'Pierwsze kroki'),
(10, 1, 10, 'Wystąpienia publiczne'),
(11, 1, 11, 'Musicfulness'),
(12, 1, 12, 'Meloman'),
(13, 1, 13, 'kompozycja'),
(16, 2, 1, ''),
(17, 2, 2, ''),
(18, 2, 3, ''),
(19, 2, 4, 'PIANO'),
(20, 2, 5, 'SINGING'),
(21, 2, 6, 'GUITAR'),
(22, 2, 7, 'CELLO'),
(23, 2, 8, 'SAXOPHONE'),
(24, 2, 9, 'FIRST STEPS'),
(25, 3, 1, ''),
(26, 3, 2, 'HÁT RU'),
(27, 3, 3, ''),
(28, 3, 4, 'PIANO'),
(29, 3, 5, 'HÁT'),
(30, 3, 6, 'ĐÀN GHITA'),
(31, 3, 7, 'VIOLONSEN'),
(32, 3, 8, 'SAXOFON'),
(33, 3, 9, 'NHỮNG BƯỚC ĐẦU TIÊN'),
(34, 4, 1, 'LOGO-EURYTHMICS'),
(35, 4, 2, '摇篮曲'),
(36, 4, 3, ''),
(37, 4, 4, '钢琴课'),
(38, 4, 5, '声乐'),
(39, 4, 6, '吉他'),
(40, 4, 7, '大提琴'),
(41, 4, 8, '萨克斯'),
(42, 4, 9, '入门级'),
(43, 4, 10, ''),
(44, 4, 11, ''),
(45, 4, 12, '爱好者课程'),
(46, 4, 13, ''),
(47, 3, 10, 'ÂM ĐIỆU TIẾNG BA LAN'),
(48, 3, 11, ''),
(49, 3, 12, 'CHƯƠNG TRÌNH NGƯỜI MÊ ÂM NHẠC'),
(50, 3, 13, 'SÁNG TÁC'),
(51, 2, 10, ''),
(52, 2, 11, ''),
(53, 2, 12, 'MUSIC LOVER PROGRAMME'),
(54, 2, 13, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employee`
--

CREATE TABLE `employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `course_name_id` int(10) UNSIGNED DEFAULT NULL,
  `img_thumbnail` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `employee`
--

INSERT INTO `employee` (`id`, `name`, `course_name_id`, `img_thumbnail`, `img`) VALUES
(1, 'prof. Grażyna Kołodziej', 4, '/images/user-images/grazyna-square.jpg', '/images/user-images/grazyna.jpg'),
(2, 'Dr Julian Kołodziej', 14, '/images/user-images/julian-square.jpg', '/images/user-images/julian.jpg'),
(3, 'Bogna Kołodziej', 4, '/images/user-images/bogna-square.jpg', '/images/user-images/bogna.jpg'),
(4, 'Joanna Banaszczyk', 7, '/images/user-images/joanna-square.jpg', '/images/user-images/joanna.jpg'),
(5, 'Filip Zaborowski', 4, '/images/user-images/filip-square.jpg', '/images/user-images/filip.jpg'),
(6, 'Jakub Muras', 8, '/images/user-images/jakub-square.jpg', '/images/user-images/jakub.jpg'),
(7, 'Kamila Piątkowska', 7, '/images/user-images/kamilaw-square.jpg', '/images/user-images/kamilaw.jpg'),
(8, 'Karolina Nawrocka', 5, '/images/user-images/karolina-square.jpg', '/images/user-images/karolina.jpg'),
(9, 'Anita Szwacińska', 5, '/images/user-images/anita-square.jpg', '/images/user-images/anita.jpg'),
(10, 'Alicja Niździńska', 5, '/images/user-images/ala-square.jpg', '/images/user-images/ala.jpg'),
(11, 'Maciej Włodowski', 5, '/images/user-images/maciej-square.jpg', '/images/user-images/maciej.jpg'),
(12, 'Katarzyna Stasiewicz', 7, '/images/user-images/kasia-square.jpg', '/images/user-images/kasia.jpg'),
(13, 'Daniel Peszko', 6, '/images/user-images/daniel-square.jpg', '/images/user-images/daniel.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employee_translation`
--

CREATE TABLE `employee_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `long_desc` varchar(1500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `employee_translation`
--

INSERT INTO `employee_translation` (`id`, `languages_id`, `employee_id`, `long_desc`) VALUES
(2, 1, 1, '<p>Absolwentka Akademii Muzycznej w Łodzi w klasie fortepianu prof. Marii Wiłkomirskiej. Doświadczenia z pracy w kilku państwowych szkołach muzycznych zaowocowało założeniem w 1996 roku Konwersatorium Muzycznego w Warszawie. Specjalizuje się w nauczaniu młodzieży i dorosłych własną autorską metodą i programem. Przykłada dużą uwagę do szczegółów zarówno muzycznych jak i technicznych, aby osiągnąć swobodę i satysfakcję. Uznaje pasję za drogocenną wartość, której należy pozwolić zakwitnąć we własnym tempie.</p>'),
(3, 1, 2, '<p>Specjalista w zakresie planowania strategicznego, zarządzania projektami oraz zintegrowanych inwestycji terytorialnych. W wiodącej firmie konsultingowej prowadził projekty doradcze z zakresu rozwoju społeczno-gospodarczego i rewitalizacji dla podmiotów administracji samorządowej, instytucji publicznych oraz sektora biznesu. Kierował projektem badawczo-wdrożeniowym dot. rewitalizacji w Instytucie Historii Nauki PAN.</p>'),
(4, 1, 3, '<p>Specjalizuje się w edukacji najmłodszych, uczy gry na fortepianie dzieci i młodzież w wieku od 3 do 15 lat. Ukończyła Uniwersytet Warszawskie i odbyła praktyki na Akademii Muzycznej w Warszawie. W ciągu 10 lat pracy w Konwersatorium Muzycznym wykształciła ponad 100 dzieci. Zapewnia atmosferę zabawy na lekcji i zamienia żmudną edukację w ekscytującą przygodę z nauką. Jest kreatywnym nauczycielem, który konstruuje własne pomoce dydaktyczne. Istotny jest dla niej kontakt z dzieckiem oparty na szacunku i zaufaniu.</p>'),
(5, 1, 4, '<p>Absolwentka Akademii Muzycznej im. I.J. Paderewskiego w Poznaniu. Brała udział w międzynarodowych kursach solistycznych i akademiach orkiestrowych. Jako członkini I, CULTURE Orchestra wystąpiła w takich salach koncertowych jak Concertgebouw w Amsterdamie, BOZAR w Brukseli, Elbphilharmonie w Hamburgu czy Opera Berlioz w Montpellier. Największą satysfakcję czerpie ze wspólnego grania z innymi muzykami. Zapewnia przyjazną atmosferę podczas zajęć. Zależy jej na pogłębieniu u ucznia miłości do muzyki i rozbudzeniu jego zainteresowania wiolonczelą. Prowadzi klasę wiolonczeli dla dzieci i dla dorosłych.</p>'),
(6, 1, 5, '<p>Absolwent Uniwersytetu Muzycznego Fryderyka Chopina w Warszawie. Swoje umiejętności pianistyczne doskonalił także na Uniwersytecie Muzycznym w Barcelonie, Hiszpanii. Solista, kameralista oraz reżyser dźwięku. Laureat konkursów pianistycznych, m.in. w Paryżu i Berlinie. Stale się doskonali i bierze udział w międzynarodowych kursach mistrzowskich. W nauczaniu jest cierpliwy i opanowany, przekazuje istotę muzykowania w miłej, pozytywnej atmosferze oraz przykłada wagę do kreatywnego urozmaicania lekcji. Prowadzi klasę fortepianu dla dzieci i dorosłych.</p>'),
(7, 1, 6, '<p>Absolwent Uniwersytetu Muzycznego MUK w Wiedniu. Związany z Uniwersytetem Muzycznym&nbsp;im. F. Chopina w Warszawie. Regularnie bierze udział w licznych koncertach, festiwalach, konkursach oraz seminariach o zasięgu krajowym jak i międzynarodowym w charakterze solisty, a także z orkiestrami symfonicznymi jak o kameralisty. Ceni wszechstronny rozwój podczas kursów mistrzowskich. Założyciel kwartetu saksofonowego The Whoop Group oraz wielokrotny stypendysta Ministra Kultury i Edukacji Artystycznej. Niezwykle energiczny i pozytywnie nastawiony do świata. Potrafi rozbudzić miłość do muzyki i chęć do pracy.</p>'),
(8, 1, 7, '<p>Absolwentka Uniwersytetu Muzycznego w Warszawie oraz  Royal Irish Academy of Music w Dublinie. Grała z orkiestrą pod batutą  m.in. Krzysztofa Pendereckiego, Jerzego Maksymiuka. Solistka podczas trasy koncertowej Rock meets classic 2019 z udziałem legend światowego rocka - Deep Purple, Thin Lizzy, Sweet, Kevin Cronin, Mike Reno, Anna Maria Kaufmann, a także na Open’er Festival. Koncertuje w Polsce, Europie i Azji. Jest pełna pasji i z radością przekazuje wiedzę muzyczną. Wspiera w postępach i pomaga pokonać trudności techniczne. Zajęcia prowadzi ciekawie i skutecznie.</p>'),
(9, 1, 8, '<p>Absolwentka Akademii Muzycznej Łodzi. Bierze udział w wielu wydarzeniach artystycznych, koncertuje w Polsce na scenach teatralnych, a także w Filharmonii. Podczas zajęć szczególną uwagę zwraca na pozbywanie się napięć z organizmu, naturalną technikę wokalną, dykcję i interpretację. W połączeniu z pozytywnym myśleniem, wiarą we własne możliwości i przyjacielską atmosferą na zajęciach zachęca do rozwijania swoich umiejętności wokalnych. Cechuje ją cierpliwość i profesjonalne, indywidualne podejście do każdego ucznia.</p>'),
(10, 1, 9, '<p>Absolwentka Uniwersytetu Muzycznego w Warszawie. Fascynuje ją kultura śródziemnomorska, w szczególności obszar Italii i włoskie pieśni. Jest kreatywna i pełna pasji. Podczas zajęć pomaga uwolnić głos, nawet nieśmiałym osobom. Pracy nauczyciela poświęca się z oddaniem i zachęca swoich uczniów do ciągłego rozwoju. Jest życzliwa i wspierająca w podróży po muzycznym świecie.</p>'),
(11, 1, 10, '<p>Absolwentka Logopedii ogólnej i klinicznej na wydziale Lekarskim Warszawskiego Uniwersytetu Medycznego. Absolwentka wydziału wokalno - estradowego w Warszawie. Zdobywczyni nagród w konkursach wokalnych. Wielokrotnie współpracowała i występowała z różnymi zespołami muzycznymi, w których śpiewała, grała na pianinie lub dyrygowała. Autorka projektu społecznego "Heart Melodies - Muzyką do serc". Od dziecka muzyka jest jej pasją i sprawia jej radość, którą pragnie dzielić się z innymi i czynić z niej pomocną wartość. W praktyce zawodowej wykorzystuje swoje muzyczne oraz logopedyczne umiejętności. Pracuje z najmłodszymi dziećmi, mającymi 1,5 roku oraz z dorosłymi. Prowadzi zajęcia logopedyczne, logorytmiczne oraz klasę śpiewu.</p>'),
(12, 1, 11, '<p>Absolwent Akademii Muzycznej w Łodzi. Obecnie związany z Uniwersytetem Muzycznym Fryderyka Chopina w Warszawie. Uczestniczy w kursach wokalnych w Polsce oraz na świecie. Podczas zajęć szczególną uwagę zwraca na pozbywanie się napięć z organizmu, naturalną technikę wokalną, dykcję i interpretację. Jest kreatywny i z pasją pokazuje świat muzyki. Sympatyczną atmosferą na zajęciach zachęca do rozwijania swoich umiejętności wokalnych. Cechuje go cierpliwość i profesjonalne, indywidualne podejście do każdego ucznia.</p>'),
(13, 1, 12, '<p>Absolwentka Uniwersytetu Muzycznego Fryderyka Chopina w Warszawie. Laureatka wielu konkursów ogólnopolskich i międzynarodowych w zakresie gry solowej i kameralnej. Odbyła liczne kursy solowe u wielu wybitnych artystów. Prowadzi aktywną działalność koncertową, a jej grę cechuje duża muzykalność i wrażliwość – poza dojrzałymi interpretacjami poszukuje możliwie najciekawszego brzmienia instrumentu. Występowała w Polsce, a także m.in. w Szwajcarii, Włoszech, Austrii, Danii, Kanadzie, Korei Południowej oraz na Węgrzech. Podczas swoich zajęć kreatynie wprowadza w świat muzyki dzieci oraz osoby dorosłe i pokazuje im fascynujący świat wiolonczeli.</p>'),
(14, 1, 13, '<p>Związany z Uniwersytetem Muzycznym im. F. Chopina w Warszawie. Brał udział w ogólnopolskich kursach mistrzowskich oraz w warsztatach muzycznych. Koncertuje w Polsce jako solista, a także gra w zespołach kameralnych – duet, trio, kwartet oraz orkiestra gitarowa. Nagrywa płyty CD, na swym koncie ma m.in. płytę z kwartetem. Jest odważny, lubi podejmować nowe wyzwania. Cechuje go innowacyjność i pomysłowość podczas prowadzonych lekcji.</p>'),
(17, 2, 1, '<p>She mastered piano under supervision of prof Maria Wilkomirska the Academy of Music in Łodz. Her experience of working in a few public music schools resulted in founding the Music Conversatory in Warsaw in 1996. She specializes in teaching youth and adults, using her own method and programme. She pays a lot of attention to details, both musical and technical, in order to achieve ease and satisfaction. She considers passion a valuable quality that should be allowed to blossom in its own pace.</p>'),
(18, 2, 2, '<p>A specialist in strategic planning, project management, and integrated territorial investments. In a leading consulting company, he led consulting projects in the field of socio-economic development and revitalization for local government administration entities, public institutions and the business sector. He managed a research and implementation project regarding revitalization at the Institute of History of Science of the Polish Academy of Sciences.</p>'),
(19, 2, 3, '<p>An expert in piano education of children. She teaches children and teenagers from 3 to 15 years old. She graduated from the University of Warsaw, and completed internship at the Music Academy in Warsaw. Within 10 years at the Music Conversatory, she educated over 100 children. She creates an atmosphere of fun and pleasure during lessons, and changes boring learning into an exciting adventure with knowledge. She is a creative teacher who makes her own teaching aids. In her opinion, relationship with children based on respect and trust is crucial.</p>'),
(20, 2, 4, '<p>A graduate of the I.J. Paderewski’s Academy of Music in Poznan. She participated in international solo courses and orchestra academies. As a member of the I, CULTURE Orchestra, she performed in concert halls such as Concertgebouw in Amsterdam, BOZAR in app, Elbphilharmonie in Hamburg and Opera Berlioz in Montpellier. Playing with other musicians gives her the greatest satisfaction. She creates a friendly atmosphere during lessons, and wants her students to deepen their love for music, and to arouse their interest in cello. She gives cello lessons to children and adults.</p>'),
(21, 2, 5, '<p>A graduate of the Fryderyk Chopin University of Music in Warsaw. He also perfected his piano skills at the University of Music in Barcelona, Spain. A soloist, a chamber musician and a sound director. A winner of piano competitions, among others in Paris and Berlin. He constantly improves his skills, and participates in international master classes. As a teacher, he is patient and calm, while conveying the essence of music in a pleasant, positive atmosphere. For him, it is important to diversify lessons in a creative way. He gives piano lessons to children and adults.</p>'),
(22, 2, 6, '<p>An alumnus of the Music and Arts University of the City of Vienna. Associated with the Fryderyk Chopin University of Music in Warsaw. On a regular basis he participated in many concerts, festivals, competitions, and seminars, both nationally and internationally, as a soloist and a chamber musician with symphonic orchestras. He values comprehensive development during master courses. Founder of a saxophone quartet The Whoop Group, and a multiple-times winner of the Minister of Culture and Artistic Education’s scholarship. He is very energetic and positive about the world, he can awaken a love of music and a willingness to learn.</p>'),
(23, 2, 7, '<p>A graduate of the Fryderyk Chopin University of Music in Warsaw, and the Royal Irish Academy of Music in Dublin. She played with an orchestra under the baton of, among others, Krzysztof Penderecki and Jerzy Maksymiuk. A soloist during the Rock meets classic 2019 concert tour, in which participated such world rock legends as Deep Purple, Thin Lizzy, Sweet, Kevin Cronin, Mike Reno, Anna Maria Kaufmann, as well as at the Open’er Festival. She performs in Poland, Europe and in Asia. She is full of passion and happily shares her musical knowledge. She supports pupils’ progress and helps them overcome technical difficulties. Her lessons are interesting and effective. She gives cello lessons to children and adults.</p>'),
(24, 2, 8, '<p>A graduate of the Academy of Music in Łódź. She participates in many artistic events, performs on theater stages in Poland, as well as in the Philharmonic. During lessons, she pays special attention to remove tensions from the body, and to develop natural vocal technique, diction and interpretation. Combined with positive thinking, a faith in one''s own abilities and a friendly atmosphere during lessons, she encourages pupils to develop their vocal skills. She is characterized by patience and a professional, individual approach to each student. She gives singing lessons to children and adults.</p>'),
(25, 2, 9, '<p>A graduate of the Fryderyk Chopin University of Music in Warsaw. She is fascinated by the Mediterranean culture, in particular by Italy and Italian songs. She is creative and full of passion. During lessons, she helps students release their voice, even the shy ones. She devotes herself to teaching with dedication, and encourages her students to continuous development. She is kind and supportive in a travel around the world of music. She gives singing lessons to children and adults.</p>'),
(26, 2, 10, '<p>A graduate of general and clinical speech therapy at the Medical Faculty of the Medical University of Warsaw. A graduate of the vocal and stage department in Warsaw. A winner of vocal competitions. She has collaborated and performed many times with various music bands in which she sang, played the piano or conducted. An author of the social project "Heart Melodies - Music to hearts". Since childhood, music has been her passion and has given her joy, which she wants to share with others. In her professional practice, she uses her musical and speech therapy skills. She works with the babies as young as 1.5 years old, and with adults. She gives speech therapeutic, logorhythmic, and singing lessons for children and adults.</p>'),
(27, 2, 11, '<p>A graduate of the Music Academy in Łódź, currently working with Frederic Chopin University of Music in Warsaw. He participates in vocal courses in Poland and around the world. During lessons, he pay a special attention to remove tension, to develop natural vocal technique, diction and interpretation. He is creative and passionate about introducing the world of music. He encourages students to develop their vocal abilities in a friendly atmosphere. He is known for his patience and professional, individual approach to every student. He gives singing lessons to children and adults </p>'),
(28, 2, 12, '<p>A graduate of the Fryderyk Chopin University of Music in Warsaw. A winner of many national and international competitions in solo and chamber performances. She took numerous solo courses taught by many outstanding artists. She performs frequently, and her performances are characterized by high musicality and sensitivity - apart from mature interpretations, she seeks for the most interesting sound in the instrument. She performed in Poland, as well as in Switzerland, Italy, Austria, Denmark, Canada, South Korea, and Hungary. During her lessons, she introduces the world of music to children and adults in a creative way, and shows them the fascinating world of cellos. She gives cello lessons to children and adults.</p>'),
(29, 2, 13, '<p>Associated with the Fryderyk Chopin University of Music in Warsaw. He participated in master courses and music workshops. He performs on concerts as a soloists, but also plays in instrumental ensembles – duets, trios, quartets, and guitar orchestras. He records CDs, and his discography includes, among others, a CV recorded with a quartet. He is brave, and likes to take up new challenges. He is known of his innovative character and ingenuity, which surface during his extraordinary lessons.</p>'),
(30, 3, 1, '<p>Tốt nghiệp Học viện Âm nhạc Tp Lodz, lớp piano của GS Maria Wilkomirska. Kinh nghiệm nhiều năm khi làm việc trong vài trường âm nhạc quốc gia, thành quả là sáng lập ra Trường Nhạc vào năm 1996 ở Vác-sa-va. Chuyên đào tạo thanh thiếu niên và người lớn bằng những phương pháp và chương trình do chính bản thân soạn thảo. Rất để tâm tới các chi tiết cụ thể cả trong âm nhạc cũng như khía cạnh kỹ thuật, để có được tính tự do và sự hài lòng. Bà công nhận niềm say mê là một giá trị rất quý giá, mà cần phải phát triển để có thể nở tung ra trong thời điểm thuận lợi.</p>'),
(31, 3, 2, '<p>A specialist in strategic planning, project management, and integrated territorial investments. In a leading consulting company, he led consulting projects in the field of socio-economic development and revitalization for local government administration entities, public institutions and the business sector. He managed a research and implementation project regarding revitalization at the Institute of History of Science of the Polish Academy of Sciences.</p>'),
(32, 3, 3, '<p>Chuyên đào tạo giáo dục trẻ em nhỏ tuổi, dạy thanh thiếu nhi học đàn piano ở lứa tuổi từ 3 đến 15. Cô tốt nghiệp trường ĐHTH Vác-sa-va và có thực tập ở Học viện Âm nhạc Vác-sa-va. Trong vòng 10 năm làm việc ở Trường Nhạc, cô đã đào tạo được trên 100 học sinh. Cô mang tới bầu không khí vui chơi trong học tập và biến những giờ học vất vả sang thành cuộc phiêu lưu đầy thú vị với công việc học hành. Cô là một giáo viên đầy sáng tạo, tự làm những phụ trợ sư phạm. Đối với cô, mối liên kết với học sinh dựa trên sự tôn trọng và sự tin tưởng là mang tính chất chủ chốt.</p>\r\n<p><a href="https://www.facebook.com/PaniBogna/" target="_blank">Facebook</a></p>'),
(33, 3, 4, '<p>A graduate of the I.J. Paderewski’s Academy of Music in Poznan. She participated in international solo courses and orchestra academies. As a member of the I, CULTURE Orchestra, she performed in concert halls such as Concertgebouw in Amsterdam, BOZAR in app, Elbphilharmonie in Hamburg and Opera Berlioz in Montpellier. Playing with other musicians gives her the greatest satisfaction. She creates a friendly atmosphere during lessons, and wants her students to deepen their love for music, and to arouse their interest in cello. She gives cello lessons to children and adults.</p>'),
(34, 3, 5, '<p>A graduate of the Fryderyk Chopin University of Music in Warsaw. He also perfected his piano skills at the University of Music in Barcelona, Spain. A soloist, a chamber musician and a sound director. A winner of piano competitions, among others in Paris and Berlin. He constantly improves his skills, and participates in international master classes. As a teacher, he is patient and calm, while conveying the essence of music in a pleasant, positive atmosphere. For him, it is important to diversify lessons in a creative way. He gives piano lessons to children and adults.</p>'),
(35, 3, 6, '<p>Tốt nghiệp Học viện Âm nhạc MUK Vienna. Có hợp tác với Học viện Âm nhạc Sô-panh Vác-sa-va. Anh thường xuyên tham gia rất nhiều các buổi biểu diễn, các liên hoan âm nhạc, các cuộc thi và các hội thảo với quy mô toàn quốc và quốc tế, với cương vị là đơn ca, ngoài ra anh còn tham gia các đoàn ca nhạc hợp xướng. Anh tôn trọng sự phát triển đa năng trong các cuộc thi vô địch. Anh sáng lập ra nhóm 4 saxofon The Whoop Group và nhiều năm đạt học bổng của Bộ văn hóa và Giáo dục Nghệ thuật. Anh rất cương quyết, đầy năng lượng và có cách nhìn nhận tích cực về thế giới. Anh có khả năng khêu gợi tình yêu đối với âm nhạc và niềm ham mê công việc.</p>'),
(36, 3, 7, '<p>A graduate of the Fryderyk Chopin University of Music in Warsaw, and the Royal Irish Academy of Music in Dublin. She played with an orchestra under the baton of, among others, Krzysztof Penderecki and Jerzy Maksymiuk. A soloist during the Rock meets classic 2019 concert tour, in which participated such world rock legends as Deep Purple, Thin Lizzy, Sweet, Kevin Cronin, Mike Reno, Anna Maria Kaufmann, as well as at the Open’er Festival. She performs in Poland, Europe and in Asia. She is full of passion and happily shares her musical knowledge. She supports pupils’ progress and helps them overcome technical difficulties. Her lessons are interesting and effective. She gives cello lessons to children and adults.</p>'),
(37, 3, 8, '<p>A graduate of the Academy of Music in Łódź. She participates in many artistic events, performs on theater stages in Poland, as well as in the Philharmonic. During lessons, she pays special attention to remove tensions from the body, and to develop natural vocal technique, diction and interpretation. Combined with positive thinking, a faith in one''s own abilities and a friendly atmosphere during lessons, she encourages pupils to develop their vocal skills. She is characterized by patience and a professional, individual approach to each student. She gives singing lessons to children and adults.</p>'),
(38, 3, 9, '<p>A graduate of the Fryderyk Chopin University of Music in Warsaw. She is fascinated by the Mediterranean culture, in particular by Italy and Italian songs. She is creative and full of passion. During lessons, she helps students release their voice, even the shy ones. She devotes herself to teaching with dedication, and encourages her students to continuous development. She is kind and supportive in a travel around the world of music. She gives singing lessons to children and adults.</p>'),
(39, 3, 10, '<p>A graduate of general and clinical speech therapy at the Medical Faculty of the Medical University of Warsaw. A graduate of the vocal and stage department in Warsaw. A winner of vocal competitions. She has collaborated and performed many times with various music bands in which she sang, played the piano or conducted. An author of the social project "Heart Melodies - Music to hearts". Since childhood, music has been her passion and has given her joy, which she wants to share with others. In her professional practice, she uses her musical and speech therapy skills. She works with the babies as young as 1.5 years old, and with adults. She gives speech therapeutic, logorhythmic, and singing lessons for children and adults.</p>'),
(40, 3, 11, '<p>A graduate of the Music Academy in Łódź, currently working with Frederic Chopin University of Music in Warsaw. He participates in vocal courses in Poland and around the world. During lessons, he pay a special attention to remove tension, to develop natural vocal technique, diction and interpretation. He is creative and passionate about introducing the world of music. He encourages students to develop their vocal abilities in a friendly atmosphere. He is known for his patience and professional, individual approach to every student. He gives singing lessons to children and adults </p>'),
(41, 3, 12, '<p>A graduate of the Fryderyk Chopin University of Music in Warsaw. A winner of many national and international competitions in solo and chamber performances. She took numerous solo courses taught by many outstanding artists. She performs frequently, and her performances are characterized by high musicality and sensitivity - apart from mature interpretations, she seeks for the most interesting sound in the instrument. She performed in Poland, as well as in Switzerland, Italy, Austria, Denmark, Canada, South Korea, and Hungary. During her lessons, she introduces the world of music to children and adults in a creative way, and shows them the fascinating world of cellos. She gives cello lessons to children and adults.</p>'),
(42, 3, 13, '<p>Dạy ở Học viện Âm nhạc Sô-panh Vác-sa-va. Tham gia các cuộc thi vô địch toàn quốc và các khóa học âm nhạc. Biểu diễn khắp Ba Lan, với tư cách là đơn ca, tham gia các nhóm nhạc – duet, trio, kwartet và dàn nhạc ghi-ta. Anh ghi  các đĩa CD, đã xuất bản đĩa của mình với nhóm nhạc kwartet. Anh rất dũng cảm, thích thực hiện những thách thức mới. Anh có tính cách sáng tạo và nhiều sáng kiến khi dạy học.</p>'),
(43, 4, 1, '<p>She mastered piano under supervision of prof Maria Wilkomirska the Academy of Music in Łodz. Her experience of working in a few public music schools resulted in founding the Music Conversatory in Warsaw in 1996. She specializes in teaching youth and adults, using her own method and programme. She pays a lot of attention to details, both musical and technical, in order to achieve ease and satisfaction. She considers passion a valuable quality that should be allowed to blossom in its own pace.</p>'),
(44, 4, 2, '<p>A specialist in strategic planning, project management, and integrated territorial investments. In a leading consulting company, he led consulting projects in the field of socio-economic development and revitalization for local government administration entities, public institutions and the business sector. He managed a research and implementation project regarding revitalization at the Institute of History of Science of the Polish Academy of Sciences.</p>'),
(45, 4, 3, '<p>An expert in piano education of children. She teaches children and teenagers from 3 to 15 years old. She graduated from the University of Warsaw, and completed internship at the Music Academy in Warsaw. Within 10 years at the Music Conversatory, she educated over 100 children. She creates an atmosphere of fun and pleasure during lessons, and changes boring learning into an exciting adventure with knowledge. She is a creative teacher who makes her own teaching aids. In her opinion, relationship with children based on respect and trust is crucial.</p>\r\n<p><a href="https://www.facebook.com/PaniBogna/" target="_blank">Facebook</a></p>'),
(46, 4, 4, '<p>A graduate of the I.J. Paderewski’s Academy of Music in Poznan. She participated in international solo courses and orchestra academies. As a member of the I, CULTURE Orchestra, she performed in concert halls such as Concertgebouw in Amsterdam, BOZAR in app, Elbphilharmonie in Hamburg and Opera Berlioz in Montpellier. Playing with other musicians gives her the greatest satisfaction. She creates a friendly atmosphere during lessons, and wants her students to deepen their love for music, and to arouse their interest in cello. She gives cello lessons to children and adults.</p>'),
(47, 4, 5, '<p>A graduate of the Fryderyk Chopin University of Music in Warsaw. He also perfected his piano skills at the University of Music in Barcelona, Spain. A soloist, a chamber musician and a sound director. A winner of piano competitions, among others in Paris and Berlin. He constantly improves his skills, and participates in international master classes. As a teacher, he is patient and calm, while conveying the essence of music in a pleasant, positive atmosphere. For him, it is important to diversify lessons in a creative way. He gives piano lessons to children and adults.</p>'),
(48, 4, 6, '<p>An alumnus of the Music and Arts University of the City of Vienna. Associated with the Fryderyk Chopin University of Music in Warsaw. On a regular basis he participated in many concerts, festivals, competitions, and seminars, both nationally and internationally, as a soloist and a chamber musician with symphonic orchestras. He values comprehensive development during master courses. Founder of a saxophone quartet The Whoop Group, and a multiple-times winner of the Minister of Culture and Artistic Education’s scholarship. He is very energetic and positive about the world, he can awaken a love of music and a willingness to learn.</p>'),
(49, 4, 7, '<p>A graduate of the Fryderyk Chopin University of Music in Warsaw, and the Royal Irish Academy of Music in Dublin. She played with an orchestra under the baton of, among others, Krzysztof Penderecki and Jerzy Maksymiuk. A soloist during the Rock meets classic 2019 concert tour, in which participated such world rock legends as Deep Purple, Thin Lizzy, Sweet, Kevin Cronin, Mike Reno, Anna Maria Kaufmann, as well as at the Open’er Festival. She performs in Poland, Europe and in Asia. She is full of passion and happily shares her musical knowledge. She supports pupils’ progress and helps them overcome technical difficulties. Her lessons are interesting and effective. She gives cello lessons to children and adults.</p>'),
(50, 4, 8, '<p>A graduate of the Academy of Music in Łódź. She participates in many artistic events, performs on theater stages in Poland, as well as in the Philharmonic. During lessons, she pays special attention to remove tensions from the body, and to develop natural vocal technique, diction and interpretation. Combined with positive thinking, a faith in one''s own abilities and a friendly atmosphere during lessons, she encourages pupils to develop their vocal skills. She is characterized by patience and a professional, individual approach to each student. She gives singing lessons to children and adults.</p>'),
(51, 4, 9, '<p>A graduate of the Fryderyk Chopin University of Music in Warsaw. She is fascinated by the Mediterranean culture, in particular by Italy and Italian songs. She is creative and full of passion. During lessons, she helps students release their voice, even the shy ones. She devotes herself to teaching with dedication, and encourages her students to continuous development. She is kind and supportive in a travel around the world of music. She gives singing lessons to children and adults.</p>'),
(52, 4, 10, '<p>A graduate of general and clinical speech therapy at the Medical Faculty of the Medical University of Warsaw. A graduate of the vocal and stage department in Warsaw. A winner of vocal competitions. She has collaborated and performed many times with various music bands in which she sang, played the piano or conducted. An author of the social project "Heart Melodies - Music to hearts". Since childhood, music has been her passion and has given her joy, which she wants to share with others. In her professional practice, she uses her musical and speech therapy skills. She works with the babies as young as 1.5 years old, and with adults. She gives speech therapeutic, logorhythmic, and singing lessons for children and adults.</p>'),
(53, 4, 11, '<p>A graduate of the Music Academy in Łódź, currently working with Frederic Chopin University of Music in Warsaw. He participates in vocal courses in Poland and around the world. During lessons, he pay a special attention to remove tension, to develop natural vocal technique, diction and interpretation. He is creative and passionate about introducing the world of music. He encourages students to develop their vocal abilities in a friendly atmosphere. He is known for his patience and professional, individual approach to every student. He gives singing lessons to children and adults </p>'),
(54, 4, 12, '<p>A graduate of the Fryderyk Chopin University of Music in Warsaw. A winner of many national and international competitions in solo and chamber performances. She took numerous solo courses taught by many outstanding artists. She performs frequently, and her performances are characterized by high musicality and sensitivity - apart from mature interpretations, she seeks for the most interesting sound in the instrument. She performed in Poland, as well as in Switzerland, Italy, Austria, Denmark, Canada, South Korea, and Hungary. During her lessons, she introduces the world of music to children and adults in a creative way, and shows them the fascinating world of cellos. She gives cello lessons to children and adults.</p>'),
(55, 4, 13, '<p>Associated with the Fryderyk Chopin University of Music in Warsaw. He participated in master courses and music workshops. He performs on concerts as a soloists, but also plays in instrumental ensembles – duets, trios, quartets, and guitar orchestras. He records CDs, and his discography includes, among others, a CV recorded with a quartet. He is brave, and likes to take up new challenges. He is known of his innovative character and ingenuity, which surface during his extraordinary lessons.</p>');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `emp_heading_translation`
--

CREATE TABLE `emp_heading_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) NOT NULL,
  `heading_2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `emp_heading_translation`
--

INSERT INTO `emp_heading_translation` (`id`, `languages_id`, `heading_3`, `heading_2`) VALUES
(1, 1, 'NAUCZYCIELE', 'Kim jesteśmy?'),
(2, 2, 'TEACHERS', 'Who are we?'),
(3, 3, 'GIÁO VIÊN', 'Chúng tôi là ai?'),
(4, 4, '教师', '关于我们');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `emp_positions`
--

CREATE TABLE `emp_positions` (
  `employee_id` int(10) UNSIGNED NOT NULL,
  `positions_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `emp_positions`
--

INSERT INTO `emp_positions` (`employee_id`, `positions_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(9, 4),
(10, 4),
(11, 4),
(12, 4),
(13, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `emp_specialization`
--

CREATE TABLE `emp_specialization` (
  `employee_id` int(10) UNSIGNED NOT NULL,
  `specialization_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `emp_specialization`
--

INSERT INTO `emp_specialization` (`employee_id`, `specialization_id`) VALUES
(4, 1),
(5, 2),
(6, 3),
(7, 1),
(8, 4),
(9, 4),
(10, 4),
(10, 5),
(11, 6),
(12, 1),
(13, 7);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `languages`
--

INSERT INTO `languages` (`id`, `code`, `name`) VALUES
(1, 'pl', 'Polish'),
(2, 'en', 'English'),
(3, 'vi', 'Vietnamese'),
(4, 'zh', 'Chinese');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_about_info_translation`
--

CREATE TABLE `main_about_info_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) DEFAULT NULL,
  `heading_2` varchar(255) DEFAULT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `long_desc` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `main_about_info_translation`
--

INSERT INTO `main_about_info_translation` (`id`, `languages_id`, `heading_3`, `heading_2`, `short_desc`, `long_desc`) VALUES
(1, 1, 'O SZKOLE', 'Konwersatorium Muzyczne', 'Zostało założone w 1996 roku w secesyjnej kamienicy w centrum Warszawy przez profesor Grażynę Kołodziej.', '<p>Zaufało nam już wielu uczniów w wieku od 1 do 94 lat nie tylko z Polski, ale również z krajów Europy i Azji. W gronie absolwentów Konwersatorium Muzycznego są prawnicy, lekarze, managerowie, ekonomiści, architekci, naukowcy i oczywiście muzycy.</p>\r\n<p>Naszym celem jest wychowanie melomanów, którzy czerpią przyjemność z grania i pragną, aby muzyka towarzyszyła im przez całe życie.</p>\r\n<p>Gwarantujemy indywidualne podejście do każdego ucznia nastawione na rozwój osobisty przez kontakt z muzyką, na który każdy zasługuje. Znajdujemy ukryty talent.</p>\r\n<p>Jest to najlepsza inwestycja w przyszłość własną lub swojego dziecka.</p>'),
(2, 2, 'ABOUT THE SCHOOL', 'The Music Conversatory', 'Professor Grażyna Kołodziej established the school in 1996 in an Art Nouveau building in the heart of Warsaw, Poland, Europe', '<p> We have been entrusted by over 200 students from 2 to 94 years old, not only from Poland but also from other countries of Europe and Asia. Among alumni of the Music Conversatory, there are lawyers, doctors, managers, economists, architects, scientists, and of course musicians.</p>\r\n<p>Our goal is to bring up music lovers who enjoy playing instruments, and wish to spend their whole life surrounded by music.</p>\r\n<p>We guarantee an individual approach to each and every student, focusing on personal development through music, that everyone deserves. We discover hidden talents.</p>\r\n<p>It is the best investment in your own or your child’s future.</p>'),
(3, 3, 'VỀ TRƯỜNG HỌC', 'Konwersatorium Muzyczne', 'Trường Nhạc được thành lập bởi GS Grazyna Kołodziej vào năm 1996 trong một tòa nhà cổ ở trung tâm Vác-sa-va.', '<p>Trên 200 học viên ở lứa tuổi từ 2 đến 65 tuổi đã tin tưởng chúng tôi, hô không chỉ là những người Ba Lan, mà còn là những người dân từ khắp các quốc gia khác từ Châu Âu và Châu Á. Trong số những học viên đã tốt nghiệp trường nhạc có cả các nhà luật gia, bác sỹ, manager, các nhà kinh tế học, kiến trúc sư, các nhà khoa học và tất nhiên nhiều người trở thành nhạc sỹ.</p>\r\n<p>Mục đích của chúng tôi là đào tạo những người yêu chuộng âm nhạc, mà luôn cảm thấy thú vị khi tiếp xúc với âm nhạc và mong ước để âm nhạc là bạn đồng hành của mình trong suốt cả cuộc đời.</p>\r\n<p>Chúng tôi bảo đảm có cách tiếp cận với từng cá nhân, để từng người có thể phát triển với âm nhạc, mà hợp với mình nhất.</p>\r\n<p>Chúng tôi tìm những nhân tài đang ẩn náu. Đó là sự đầu tư tốt nhất vào tương lai của bản thân hoặc của con cái mình.</p>'),
(4, 4, '关于学校', '音乐学校', '本学校由Grazyna Kolodziej老师在1996建立，学校位于华沙市中心的新艺术大楼.', '<p>学校现有200名学生，年龄从2岁到64岁不等，其中不仅有波兰人，还有来自于欧洲其他地方和亚洲的学生。 我们的校友从事各种各样的职业，包括律师、医生、经理、经济学者、建筑师、科学家等，当然也包括音乐家。</p>\r\n<p>我们的目标是培养学生热爱音乐，享受演奏乐器的乐趣，同时希望学生能够在一生中都有音乐相伴左右。</p>\r\n<p>我们承诺与每个学生进行一对一的沟通，专注于每个学生在音乐中的的个人成长，并发掘潜在的音乐天分。</p>\r\n<p>这会是您或者您的孩子未来的音乐生涯中的最重要的一次投资。</p>');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_banner`
--

CREATE TABLE `main_banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `main_banner`
--

INSERT INTO `main_banner` (`id`, `img`) VALUES
(1, 'banner/image/test');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_banner_translation`
--

CREATE TABLE `main_banner_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_banner_id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `long_desc` varchar(255) DEFAULT NULL,
  `button` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `main_banner_translation`
--

INSERT INTO `main_banner_translation` (`id`, `main_banner_id`, `languages_id`, `name`, `long_desc`, `button`) VALUES
(1, 1, 1, 'konwersatorium muzyczne', 'Kreatywna szkoła rozbudzająca miłość do muzyki dla dzieci, dorosłych i seniorów.<br><b>Zajęcia w Warszawie<br>i online</b>', 'Spróbuj i umów się<br>na pierwszą lekcję!'),
(2, 1, 2, 'The Music Conversatory', 'International school for children and adults\r\n<br>that brings out love of music', 'Try and schedule<br>a first lesson!'),
(3, 1, 3, 'Konwersatorium Muzyczne', 'Trường Nhạc. Trường cao cấp – khích lệ tình yêu âm nhạc -dành cho thiếu nhi và người lớn.', 'Bạn hãy thử ngay <br> và hẹn buổi học thử đầu tiên'),
(4, 1, 4, '音乐学校', '针对儿童和成人的精品音乐学校，让你发现你对音乐的爱', '免费试听!');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_contact_details_translation`
--

CREATE TABLE `main_contact_details_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `detail` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `main_contact_details_translation`
--

INSERT INTO `main_contact_details_translation` (`id`, `languages_id`, `detail`) VALUES
(1, 1, '<p><strong>Adres korespondencyjny:</strong></p>\r\n<p>Aleje Jerozolimskie 47/20\r\n<br/>00-697, Warszawa\r\n<br />Polska</p>'),
(2, 1, '<p><strong>Główna siedziba:</strong></p>\r\n<p>wejście ul. Poznańska 39 domofon 20\r\n<p>poniedziałek-sobota 12:00 – 21:00</p>\r\n<p><strong>I Filia:</strong></p>\r\n<p>Aleje Jerozolimskie 53\r\n<p>poniedziałek-sobota 10:00-21:00</p>\r\n<p><strong>II Filia:</strong></p>\r\n<p>Prywatne Szkoły im. Cecylii Plater-Zyberkówny\r\n<br/>ulica Piękna 24/26</p>\r\n<p>poniedziałek-piątek 15:00-19:00</p>'),
(3, 1, '<p><strong>Informacje i zapisy:</strong></p>\r\n<p>+48 22 628 01 13\r\n<br />+48 883 489 184</p>\r\n<p><strong>Przed przybyciem<br />prosimy umówić się na wizytę telefonicznie</strong></p>'),
(4, 2, '<p><strong>Postal address:</strong></p>\r\n<p>Aleje Jerozolimskie 47\r\n<br/>00-697, Warszawa\r\n<br />Polska</p>'),
(5, 2, '<p><strong>Entrance:</strong></p>\r\n<p>Aleje Jerozolimskie 53\r\n<br />near the Palace of Culture and Science and the station Metro Centrum</p>\r\n<p>The Music Conversatory is open from Monday to Saturday between 12.00 and 9.00 pm </p>'),
(6, 2, '<p><strong>Please give us a call before your visit:</strong></p>\r\n<p>Polish +48 22 628 01 13\r\n<br />English +48 883 489 184</p>'),
(7, 3, '<p><strong>Địa chỉ liên lạc:</strong></p>\r\n<p>Aleje Jerozolimskie 53<br/>00-697, Warszawa<br />Polska</p>'),
(8, 3, '<p><strong>Lối vào:</strong></p><p>Aleje Jerozolimskie 53<br>cạnh Cung Văn hóa và Khoa học, cạnh bến tàu điện ngầm Centrum</p>\r\n<p>Konwersatorium Muzyczne mở cửa hàng tuần trong các ngày từ thứ 2 đến thứ 7, vào tầm 12.00-21.00</p>'),
(9, 3, '<p><strong>Hãy liên lạc điện thoại trước:</strong></p><p>Polish +48 22 628 01 13<br />English +48 883 489 184</p>'),
(10, 4, '<p><strong>Postal address:</strong></p>\r\n<p>Aleje Jerozolimskie 53\r\n<br/>00-697, Warszawa\r\n<br />Polska</p>'),
(11, 4, '<p><strong>学校入口:</strong></p>\r\n<p>Aleje Jerozolimskie 53\r\n<br /> 学校靠近文化与科学宫（Palace of Culture and Science）和中央地铁站（station Metro Centrum）</p>\r\n<p>上课时间为每周一至周六，中午12点到晚上9点 </p>'),
(12, 4, '<p><strong>来访前敬请电话告知我们:</strong></p>\r\n<p>Polish +48 22 628 01 13\r\n<br /> English +48 883 489 184</p>');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_contact_translation`
--

CREATE TABLE `main_contact_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) DEFAULT NULL,
  `heading_2` varchar(255) DEFAULT NULL,
  `email_name` varchar(255) DEFAULT NULL,
  `email_email` varchar(255) DEFAULT NULL,
  `email_message` varchar(255) DEFAULT NULL,
  `button` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `main_contact_translation`
--

INSERT INTO `main_contact_translation` (`id`, `languages_id`, `heading_3`, `heading_2`, `email_name`, `email_email`, `email_message`, `button`) VALUES
(1, 1, 'KONTAKT', 'Jak nas znaleźć?', 'Imię\r\n', 'Adres email', 'Wiadomość...', 'Wyślij'),
(2, 2, 'CONTACT', 'How to find us?', 'Your name', 'Your email', 'Message...', 'Send'),
(3, 3, 'LIÊN LẠC', 'Tìm/đến với chúng tôi như thế nào?', 'Twoje imię', 'Adres email', 'Twoja wiadomość...', 'Hãy gửi'),
(4, 4, '联系我们', '如何找到我们？', '你的姓名', '你的地址', '你的留言...', '发送');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_counter`
--

CREATE TABLE `main_counter` (
  `id` int(10) UNSIGNED NOT NULL,
  `counter` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `main_counter`
--

INSERT INTO `main_counter` (`id`, `counter`) VALUES
(1, 20),
(2, 16),
(3, 50);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_counter_translation`
--

CREATE TABLE `main_counter_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) DEFAULT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `main_counter_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `main_counter_translation`
--

INSERT INTO `main_counter_translation` (`id`, `languages_id`, `heading_3`, `short_desc`, `main_counter_id`) VALUES
(1, 1, 'Działamy od ponad...', 'lat', 1),
(2, 1, 'Mamy nuty z ponad...', 'krajów', 2),
(3, 1, 'Przygotowaliśmy już ponad...', 'koncertów', 3),
(4, 2, 'Established over...', 'years ago', 1),
(5, 2, 'We have music scores over...', 'countries', 2),
(6, 2, 'We have organised over...', 'concerts', 3),
(9, 3, 'Chúng tôi hoạt động đã trên...', 'năm', 1),
(10, 3, 'Chúng tôi đã đào tạo được trên...', 'học viên', 2),
(11, 3, 'Chúng tôi đã tổ chức được trên...', 'buổi hòa nhạc', 3),
(12, 4, '我们的学校有...', '年的历史', 1),
(13, 4, '我们教出了...', '余名学生', 2),
(14, 4, '我们组织过...', '余场音乐会', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_facts`
--

CREATE TABLE `main_facts` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `main_facts`
--

INSERT INTO `main_facts` (`id`, `icon`) VALUES
(1, 'fa-music'),
(2, 'fa-diamond'),
(3, 'fa-institution'),
(4, 'fa-trophy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_facts_translation`
--

CREATE TABLE `main_facts_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_facts_id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `fact` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `main_facts_translation`
--

INSERT INTO `main_facts_translation` (`id`, `main_facts_id`, `languages_id`, `fact`) VALUES
(1, 1, 1, '<ul>\r\n<li>Łatwy początek - naukę można rozpocząć w każdym miesiącu</li>\r\n<li>Nie ma ocen ani egzaminów</li>\r\n<li>Zajęcia są indywidualne w formule mistrz-uczeń</li>\r\n<li>Darmowe nuty i pomoce naukowe</li>\r\n</ul>'),
(2, 2, 1, '<ul>\r\n<li>Komfort indywidualnego ustalania terminów lekcji</li>\r\n<li>Doświadczeni nauczyciele z pasją</li>\r\n<li>Właściwe techniki nauczania osób w każdym wieku</li>\r\n<li>Zajęcia są dostępne w języku polskim i angielskimi</li>\r\n</ul>'),
(3, 3, 1, '<ul>\r\n<li>Konwersatorium Muzyczne istnieje od 1996 roku</li>\r\n<li>Mieści się w sercu Warszawy przy stacji Metro Centrum</li>\r\n<li>Wykształciło już ponad 200 uczniów</li>\r\n<li>Naukę można rozpocząć w każdym wieku, już od 1,5 roku życia</li>\r\n<li>Zajęcia odbywają się od poniedziałku do soboty w godzinach 9:00-22:00</li>\r\n</ul>'),
(4, 4, 1, '<ul>\r\n<li>Udowodniono pozytywny wpływ muzyki na samopoczucie</li>\r\n<li>Konwersatorium Muzyczne to bezpieczne środowisko i sprawdzeni nauczyciele</li>\r\n<li>Nauka gry na fortepianie to dobrze zainwestowane pieniądze</li>\r\n<li>Co roku nasi uczniowie prezentują swoje osiągnięcia na koncertach</li>\r\n<li>Z dumą będziecie Państwo słuchać rezultatów pracy swoich dzieci lub własnej</li>\r\n</ul>'),
(5, 1, 2, '<ul>\r\n<li>Easy beginning – you can start lessons anytime during the year</li>\r\n<li>No grades, no exams</li>\r\n<li>Individual lessons based on master-student relationship</li>\r\n<li>Music sheets and teaching aids are provided with no extra charge</li>\r\n</ul>'),
(6, 2, 2, '<ul>\r\n<li>Comfort of scheduling lessons individually</li>\r\n<li>Experienced passionate teachers</li>\r\n<li>Appropriate techniques of teaching people across generations</li>\r\n<li>Lessons are available in English</li>\r\n</ul>'),
(7, 3, 2, '<ul>\r\n<li>The Music Conversatory was established in 1996</li>\r\n<li>It is located in the heart of Warsaw, near the Metro Centrum station</li>\r\n<li>We offer lessons in Warsaw, and also online</li>\r\n<li>Lessons are available to people across generations, starting from 2-year-olds</li>\r\n<li>Lessons take place from Monday to Saturday from 8pm to 10pm</li>\r\n</ul>'),
(8, 4, 2, '<ul>\r\n<li>A positive impact of music on mood has been scientifically proven</li>\r\n<li>Safe environment and experienced teachers</li>\r\n<li>Learning to play is a good investment</li>\r\n<li>Every year our students perform in concerts</li>\r\n<li>You will be proudly listening to results of your own work or your children''s</li>\r\n</ul>'),
(9, 1, 3, '<ul>\r\n<li>Sự khởi đầu rất dễ - có thể bắt đầu học vào bất kỳ thời điểm nào trong mỗi tháng</li>\r\n<li>Không chấm điểm và không phải thi cử</li>\r\n<li>Học riêng, theo kiểu trực tiếp thầy với trò</li>\r\n<li>Sách nhạc và những phụ kiện khoa học khác được cấp miễn phí</li>\r\n</ul>'),
(10, 2, 3, '<ul>\r\n<li>Có cảm giác dễ chịu khi có thể tự hẹn giờ học riêng lẻ</li>\r\n<li>Giáo viên nhiều kinh nghiệm và say mê nghề nghiệp</li>\r\n<li>Mọi kỹ thuật giảng dạy đúng đắn để dạy phù hợp cho từng lứa tuổi</li>\r\n<li>Có thể học bằng tiếng Ba Lan hoặc tiếng Anh</li>\r\n</ul>'),
(11, 3, 3, '<ul>\r\n<li>Trường Nhạc có từ năm 1996</li>\r\n<li>Nằm ở trung tâm Vác-sa-va, gần bến tàu điện ngầm Centrum</li>\r\n<li>Đã đào tạo được trên 200 học viên</li>\r\n<li>Có thể bắt đầu học từ mọi lứa tuổi, từ 3 tuổi</li>\r\n<li>Học hàng tuần trong các ngày từ thứ 2 đến thứ 7, vào tầm 12.00-21.00</li>\r\n</ul>'),
(12, 4, 3, '<ul>\r\n<li>Người ta đã chứng minh được là âm nhạc có ảnh hưởng tốt đến tâm lý cá nhân</li>\r\n<li>Trường Nhạc là một môi trường an toàn, với đội ngũ giáo viên giàu kinh nghiệm</li>\r\n<li>Học chơi là sự đầu tư tiền rất tốt</li>\r\n<li>Hàng năm các học viên đạt nhiều thành tích trong các buổi hòa nhạc</li>\r\n<li>Quý vị có thể tự hào nghe thành quả của con cái mình hoặc của chính bản thân</li>\r\n</ul>'),
(13, 1, 4, '<ul>\r\n<li>入门很容易——您随时可以开始学习</li>\r\n<li>不评级，不考试</li>\r\n<li>根据师生关系调整上课模式</li>\r\n<li>免费提供乐谱和其他教学资料</li>\r\n</ul>'),
(14, 2, 4, '<ul>\r\n<li>课程根据不同学生灵活调整</li>\r\n<li>教师热爱音乐，经验丰富</li>\r\n<li>Appropriate techniques of teaching people across generations</li>\r\n<li>根据学生年龄段提供不同的技巧教学</li>\r\n</ul>'),
(15, 3, 4, '<ul>\r\n<li>音乐学校始建于1996年</li>\r\n<li>学校位于华沙市中心的新艺术大楼</li>\r\n<li>已有200余位学生参加过我们的培训</li>\r\n<li>从2岁到成人，任何年龄段的学生都能在我们这里找到合适的课程</li>\r\n<li>课程从周一到周六均有开设，时间为中午12点到晚上9点</li>\r\n</ul>'),
(16, 4, 4, '<ul>\r\n<li>科学研究已经证明，音乐能给人的情绪带来积极影响</li>\r\n<li>我们的音乐学校提供安全的环境和经验丰富的老师</li>\r\n<li>学习钢琴是有益的人生投资</li>\r\n<li>每年我们的学生都有机会在音乐会上表演</li>\r\n<li>You will be proudly listening to results of your own work or your children''s</li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_progress_heading_translation`
--

CREATE TABLE `main_progress_heading_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) NOT NULL,
  `heading_2` varchar(255) NOT NULL,
  `button` varchar(255) NOT NULL,
  `short_desc` varchar(2000) DEFAULT NULL,
  `long_desc` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `main_progress_heading_translation`
--

INSERT INTO `main_progress_heading_translation` (`id`, `languages_id`, `heading_3`, `heading_2`, `button`, `short_desc`, `long_desc`) VALUES
(1, 1, 'Efekty', 'Jakie korzyści daje muzyka?', 'Więcej', '<h3>A czego dowodzą badania naukowe?</h3>\r\n<ul>\r\n<li>Rozwój kreatywności, pamięci i koncentracji</li>\r\n<li>Rozwój logiki, myślenia, analizy i oceny</li>\r\n<li>Nauka muzyki zwiększa wydajności mózgu</li>\r\n<li>Poprawia koordynację rąk, oczu i ciała</li>\r\n<li>Zwiększa się samoocena i poczucie własnej skuteczności</li>\r\n<li>Muzyka pomaga wyrazić emocje i rozładować napięcie</li>\r\n<li>Granie zespołowe uczy współpracy, harmonii społecznej, dyscypliny oraz osiągania wspólnego celu</li>\r\n</ul>', '<p>Professional Research Center 2000: z badań wynika, że uczniowie, którzy uczyli się grać na instrumencie lepiej planowali zadania, koordynowali projekty w życiu codziennym. Uczniowie, którzy grają chętniej podejmują sie nowych wyzwań, lepiej potrafią wyrażać swoje niezależne idee przyjaciołom, nauczycielom i rodzicom. Nie obawiają się własnych przekonań The president’s council on the arts 1999</p>\r\n<p>Muzyk podejmując ciągłe decyzje odnośnie tempa, tonu, stylu, rytmu, frazowania, i emocji utworu staje się bardzo dobry w organizowaniu i prowadzeniu wielu działań jednocześnie Ratey John J., MD. Instrukcja użytkownika do mózgu. New York: Pantheon Books, 2001. Nauka muzyki zachęca do samodyscypliny i staranności, to cechy, które przenoszą się potem na efektywną pracy i dobre nawyki w innych dyscyplinach. Michael E. DeBakey, MD, Baylor College of Music.</p>\r\n<p>Podczas konferencji poświęconej muzyce w Ameryce w 2000r badania pokazały ze 73% uczniów uczących się grać na instrumencie nie sprawiało kłopotów wychowawczych i nie miało problemu z dyscypliną</p>\r\n<p>Podczas egzaminu SAT (odpowiednik naszej matury) uczniowie, którzy uczęszczali na naukę gry na instrumencie otrzymali średnio 61 punktów więcej podczas egzaminów ustnych oraz 42 punkty więcej z matematyki niż rówieśnicy którzy nie grali. Music educators journal, Wrzesień 2000</p>\r\n<p>Badania na University of California wykazały, że po ośmiu miesiącach lekcji gry na fortepianie, przedszkolaki wykazały 46% wzrost IQ rozumowania przestrzennego Rauscher, Shaw, Levine, Ky i Wright, Muzyka i Wydajność: związek przyczynowy University of California, Irvine, 1994</p>\r\n<p>Najlepsi biznesmeni zgadzają się, że programy edukacji artystycznej mogą pomóc naprawić system amerykańskiej edukacji i lepiej przygotować pracowników do 21 wieku. Zmiana miejsca pracy zmienia się nasz pogląd Edukacji. Business Week, październik 1996.</p>\r\n<p>Muzyka to komunikacja, kreatywność i współpraca, przez naukę gry, uczniowie mają okazję do rozwinięcia tych umiejętności, mogą wzbogacić swoje życie i doświadczać świat z nowej perspektywy. Bill Clinton, były prezydent Stanów Zjednoczonych Ameryki</p>'),
(2, 2, 'Effects', 'What benefits can music give you?', 'More', '<h3>What is proved by research?</h3>\r\n<ul>\r\n<li>growth in creativity, memory and concentration</li>\r\n<li>growth in logics, thinking, analysis and assessment</li>\r\n<li>music education increases  brain efficiency</li>\r\n<li>improvent in coordination of  hands, eyes and body</li>\r\n<li>increase in self-esteem and sense of self effectiveness</li>\r\n<li>music helps express emotions and unload tension</li>\r\n<li>group playing teach cooperation, social harmony, discipline and achieving a common goal</li>\r\n</ul>', '<p>Professional Research Center 2000: research shows that pupils, who learn to play an instrument, improved their task planning and project coordination in everyday life. Students, who play, more willingly try new challenges, can express their independent ideas better to their friends, teachers and parents. They aren’t afraid of their own convictions. The president’s council on the arts 1999</p>\r\n<p>The musican, who constantly makes decisions about the tempo, tone, style, rhythm, phrasing, and piece’s emotions, becomes very good organizating and making many things at the same time. Spark-The Revolutionary New Science of Exercise and the Brain New York: Pantheon Books, 2001. Music lessons encourage self-discipline and care fulnes. These features  are later transferred to effective work and good habits in others disciplines. Michael E. DeBakey, MD, Baylor College of Music.</p>\r\n<p>The research taken the US in 2000, during a conference about music, showed that 73%  of children who learn playing an instrument don’t cause trouble during their upbringing and they don’t have problems with discipline.</p>\r\n<p>During the SAT exam, students who had learnt playing an instrument, received in average 61 points more during oral exams, and 42 points more in math than their peers who hadn’t played at all. Music educators journal, September 2000</p>\r\n<p>Research taken at the California’s University showed that after 8 months of piano lessons, preschoolers had a 46% growth of IQ spatial reasoning. Rauscher, Shaw, Levine, Ky i Wright, Music and efficiency: causal relationship University of California, Irvine, 1994</p>\r\n<p>The best businessmen agree that programmes of artistic education can help fix the system of American education and better prepare employees to the 21th century. Educating for the Workplace through the Arts. Business Week, November 1996.</p>\r\n<p>Music is communication, creativity and cooperation. Through learning music, pupils can develop those abilities, they can enrich their life and see the world from a new perspective. Bill Clinton, President of the US</p>'),
(3, 3, 'Hiệu quả', 'Âm nhạc mang lại những lợi ích gì?', 'Hơn nữa', '<h3>Các nghiên cứu khoa học chứng minh được điều gì?</h3>\r\n<ul>\r\n<li>Sự phát triển tính sáng tạo, trí nhớ và sự tập trung</li>\r\n<li>Sự phát triển lôgic học, cách tư duy, phân tích và đánh giá</li>\r\n<li>Học nhạc làm tăng công suất của não</li>\r\n<li>Làm tăng khả năng phối hợp nhịp nhàng giữa tay, chân và mắt</li>\r\n<li>Tính tự phê và cảm giác hiệu quả bản thân được tăng thêm</li>\r\n<li>Âm nhạc giúp biểu đạt cảm xúc và làm giảm tính nóng nảy</li>\r\n<li>Khi chơi nhạc cùng nhóm, học được cách hợp tác, phối hợp hài hòa xã hội, có tính kỷ luật và cùng đạt được mục đích chung</li>\r\n</ul>', '<p>Professional Research Center 2000: theo như các nghiên cứu cho thấy là những học sinh mà đã từng học nhạc cụ luôn có kế hoạch làm bài tập tốt hơn, cùng hợp tác làm dự án trong cuộc sống hàng ngày tốt hơn. Những học sinh mà có chơi nhạc cụ sẵn sàng thi hành những thử thách mới, có thể biểu hiện những ý tưởng độc lập của mình với bè bạn, thầy cô giáo và phụ huynh tốt hơn. Họ không lo ngại những quan điểm của riêng bản thân. The president’s council on the arts 1999</p>\r\n<p>Nhạc sỹ luôn phải cho ra quyết định về nhịp, giọng, thể loại, giai điệu, lời lẽ và sự nhạy cảm của tác phẩm, sẽ trở thành tốt hơn trong công việc cho ra quyết định tổ chức hay thi hành nhiều công việc đồng thời. Ratey John J., MD. Instrukcja użytkownika do mózgu. New York: Pantheon Books, 2001.</p>\r\n<p> Học nhạc khuyến khích bản thân tự kỷ luật và cố gắng, đó là những tính chất mà sau này chuyển sang được cho công việc có hiệu quả và có được những thói quen tốt trong các lĩnh vực khác. Michael E. DeBakey, MD, Baylor College of Music.</p>\r\n<p>Trong hội thảo khoa học về âm nhạc ở Mỹ năm 2000 thì các nghiên cứu cho thấy là 73% học sinh mà có chơi nhạc cụ không gây ra nhiều điều khó khăn sư phạm và cũng ít vi phạm kỷ luật</p>\r\n<p>Khi thi SAT (tốt nghiệp PTTH) thì những học sinh mà có chơi nhạc cụ trung bình đạt được 61 điểm cao hơn trong bài thi vấn đáp và đạt 42 điểm cao hơn trong môn toán, so với những đứa bạn cùng tuổi mà không chơi nhạc cụ. Music educators journal, Wrzesień 2000</p>\r\n<p>Các nghiên cứu của University of California cho thấy là sau 8 tháng học nhạc trên cây đàn piano, các trẻ mẫu giáo có sự tăng trưởng 46% chỉ số IQ, khi tìm hiểu về không gian Rauscher, Shaw, Lewin, Ky và Wright. Âm nhạc: Công suất: quan hệ nguyên nhân kết quả University of California, Irwin 1994 Rauscher, Shaw, Levine, Ky i Wright.</p>\r\n<p>Các doanh nghiệp giỏi nhất đồng ý là các chương trình giáo dục nghệ thuật có thể sửa chữa hệ thống giáo dục của Mỹ và chuẩn bị nhân viên tốt hơn cho thế kỷ 21. Thay đổi việc làm làm thay đổi quan điểm của chúng ta về giáo dục. Business Week, październik 1996.</p>\r\n<p>Âm nhạc là sự giao tiếp, tính sáng tạo và sự kết hợp, qua công việc học hành, các học sinh có cơ hội phát triển những kỹ năng đó, có thể làm giàu cuộc sống của mình và nhìn nhận thế giới từ viễn cảnh mới – Bill Clinton, cựu TT Mỹ.</p>'),
(4, 4, '学习的效果', '音乐能带给你什么？', '其他', '<h3>What is proved by research?</h3>\r\n<ul>\r\n<li>growth in creativity, memory and concentration</li>\r\n<li>growth in logics, thinking, analysis and assessment</li>\r\n<li>music education increases  brain efficiency</li>\r\n<li>improvent in coordination of  hands, eyes and body</li>\r\n<li>increase in self-esteem and sense of self effectiveness</li>\r\n<li>music helps express emotions and unload tension</li>\r\n<li>group playing teach cooperation, social harmony, discipline and achieving a common goal</li>\r\n</ul>', '<p>Professional Research Center 2000: research shows that pupils, who learn to play an instrument, improved their task planning and project coordination in everyday life. Students, who play, more willingly try new challenges, can express their independent ideas better to their friends, teachers and parents. They aren’t afraid of their own convictions. The president’s council on the arts 1999</p>\r\n<p>The musican, who constantly makes decisions about the tempo, tone, style, rhythm, phrasing, and piece’s emotions, becomes very good organizating and making many things at the same time. Spark-The Revolutionary New Science of Exercise and the Brain New York: Pantheon Books, 2001. Music lessons encourage self-discipline and care fulnes. These features  are later transferred to effective work and good habits in others disciplines. Michael E. DeBakey, MD, Baylor College of Music.</p>\r\n<p>The research taken the US in 2000, during a conference about music, showed that 73%  of children who learn playing an instrument don’t cause trouble during their upbringing and they don’t have problems with discipline.</p>\r\n<p>During the SAT exam, students who had learnt playing an instrument, received in average 61 points more during oral exams, and 42 points more in math than their peers who hadn’t played at all. Music educators journal, September 2000</p>\r\n<p>Research taken at the California’s University showed that after 8 months of piano lessons, preschoolers had a 46% growth of IQ spatial reasoning. Rauscher, Shaw, Levine, Ky i Wright, Music and efficiency: causal relationship University of California, Irvine, 1994</p>\r\n<p>The best businessmen agree that programmes of artistic education can help fix the system of American education and better prepare employees to the 21th century. Educating for the Workplace through the Arts. Business Week, November 1996.</p>\r\n<p>Music is communication, creativity and cooperation. Through learning music, pupils can develop those abilities, they can enrich their life and see the world from a new perspective. Bill Clinton, President of the US</p>');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_progress_translation`
--

CREATE TABLE `main_progress_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `percent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `main_progress_translation`
--

INSERT INTO `main_progress_translation` (`id`, `languages_id`, `short_desc`, `percent`) VALUES
(1, 1, 'Kreatywność', '76%'),
(2, 1, 'Wytrwałość', '81%'),
(3, 1, 'Wzmacnianie poczucia wartości', '79%'),
(4, 2, 'Creativity', '76%'),
(5, 2, 'Perseverance', '81%'),
(6, 2, 'Improvement of self esteem', '79%'),
(7, 3, '', ''),
(8, 3, 'Tính kiên trì', '81%'),
(9, 3, 'Tăng cảm giác có giá trị', '79%'),
(10, 4, '创造力', '76%'),
(11, 4, '坚韧性', '81%'),
(12, 4, '自尊感', '79%'),
(13, 1, 'Pracowitość', '72%'),
(14, 1, 'Systematyczność', '66%'),
(15, 1, 'Pamięć', '59%'),
(16, 1, 'Efektywność gospodarowania czasem', '84%'),
(17, 2, 'Diligence', '72%'),
(18, 2, 'Regularity', '66%'),
(19, 2, 'Memory', '59%'),
(20, 2, 'Effective time management', '84%'),
(21, 3, 'Tính cần cù', '72%'),
(22, 3, 'Tính có hệ thống', '66%'),
(23, 3, 'Trí nhớ', '59%'),
(24, 3, 'Hiệu quả quản lý thời gian', '84%'),
(25, 4, 'Diligence', '72%'),
(26, 4, 'Regularity', '66%'),
(27, 4, 'Memory', '59%'),
(28, 4, 'Effective time management', '84%');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_references_translation`
--

CREATE TABLE `main_references_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) NOT NULL,
  `heading_2` varchar(255) NOT NULL,
  `button_1` varchar(255) DEFAULT NULL,
  `button_2` varchar(255) DEFAULT NULL,
  `button_3` varchar(255) DEFAULT NULL,
  `partners` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `main_references_translation`
--

INSERT INTO `main_references_translation` (`id`, `languages_id`, `heading_3`, `heading_2`, `button_1`, `button_2`, `button_3`, `partners`) VALUES
(1, 1, 'REFERENCJE', 'Polecają nas', 'Rodzice...', 'Uczniowie...', 'Filmy-referencje', 'Nasi partnerzy'),
(2, 2, 'REFERENCES', 'We are recommended by', 'Parents...', 'Students...', 'Watch the references – clips!', 'Our partners'),
(3, 3, 'QUẢNG BÁ', 'Phụ huynh và học viên giới thiệu chúng tôi', 'Phụ huynh...', 'Học viên...', 'Hãy xem các phim!', 'Những đối tác của chúng tôi'),
(4, 4, 'REFERENCES', '他人荐语', '家长说...', '学生说...', '点击观看', '合作伙伴');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_special_offer_details`
--

CREATE TABLE `main_special_offer_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `img_1` varchar(255) NOT NULL,
  `img_2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `main_special_offer_details`
--

INSERT INTO `main_special_offer_details` (`id`, `code`, `img_1`, `img_2`) VALUES
(1, 'online', '/images/oferta/lato_1.jpg', '/images/oferta/lato_2.jpg'),
(2, 'stacjonarny', '/images/oferta/lato_3.jpg', '/images/oferta/lato_4.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_special_offer_details_translation`
--

CREATE TABLE `main_special_offer_details_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `main_special_offer_details_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) DEFAULT NULL,
  `heading_2` varchar(255) DEFAULT NULL,
  `heading_details` varchar(255) DEFAULT NULL,
  `long_desc_1` varchar(5000) DEFAULT NULL,
  `long_desc_2` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `main_special_offer_details_translation`
--

INSERT INTO `main_special_offer_details_translation` (`id`, `languages_id`, `main_special_offer_details_id`, `heading_3`, `heading_2`, `heading_details`, `long_desc_1`, `long_desc_2`) VALUES
(1, 1, 1, 'Międzynarodowe<br>Warsztaty Muzyczne', 'zajęcia dla dzieci i dorosłych', 'ZAPRASZAMY', '<p>Lato 2020 - zapraszamy na Międzynarodowe Warsztaty Muzyczne, które odbędą się w tym roku stacjonarnie, w naszej siedzibie w centrum Warszawy oraz online, przez co będą dostępne dla znacznie szerszego grona odbiorców.</p>\n<p>Kurs jest przeznaczony dla osób które chciałyby rozpocząć przygodę z muzyką lub pogłębić i rozwinąć swoje umiejętności.</p>\n<p>Warsztaty składają się z pakietów 4 lekcji. Koszt pakietu 4 lekcje to 300zł. Jeśli spodobają się zajęcia istnieje możliwość kontynuacji.</p>\n<p><b>Zapraszamy na zajęcia:</b>\n<ul>\n<li>Klasa gitary</li>\n<li>Klasa fortepianu</li>\n<li>Klasa wiolonczeli</li>\n<li>Klasa saksofonu</li>\n<li>Klasa śpiewu – klasycznego oraz rozrywkowego</li>\n</ul>\n<p>A także nowość:</p>\n<p><b>Indywidualny kurs historii muzyki</b>, w którym poznaje się najsłynniejsze dzieła oraz życie wielkich kompozytorów. Kurs składa sie z 8 części.</p>\n<p>Dla dzieci w wieku 4-6 lat mamy specjalny program: <b>Muzyka klasyczna dla dzieci</b> – wprowadzający w świat wielkich kompozytorów.</p>		\n<p>Wszystkie lekcje są indywidualne, program przygotowywany jest specjalnie dla poszczególnych uczestników zajęć.</p>', '<p>Nasi nauczyciele są absolwentami europejskich Akademii Muzycznych oraz Uniwersytetów, a także są czynnymi artystami, występującymi w najbardziej prestiżowych salach koncertowych m.in. w Carnegie Hall. Łącząc bycie muzyka z pasją nauczania mogą skuteczniej wspierać w rozwoju muzycznym swoich podopiecznych.</p>\n<p>Wszyscy są nauczycielami w Konwersatorium Muzycznym. Każdy słuchacz - dorosły i dziecko może wziąć udział w wybranym kursie, niezależnie od swoich umiejętności.</p>\n<p>Po zakończeniu kursu, każdy uczestnik otrzymuje certyfikat Konwersatorium Muzycznego.</p>\n<p>Zajęcia odbywają się w lipcu 2020, od poniedziałku do soboty w godzinach 9:00-22:00. Lekcje online są dostępne z uwzględnieniem występujących różnic czasu. Zajęcia przeznaczone są zarówno dla dzieci początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\n<p><b>Już trwają zapisy. Liczba miejsc ograniczona. Zapisy i informacje 883 489 184</b></p>'),
(2, 1, 2, 'Wakacyjne<br>Warsztaty Muzyczne', 'zajęcia dla dzieci w Warszawie', 'ZAPRASZAMY', '<p>W tym roku zapraszamy na program Lato z muzyką. Warsztaty są przeznaczone dla dzieci, które chciałyby rozpocząć przygodę z muzyką lub pogłębić i rozwinąć swoje umiejętności.</p>\n<p><b>Organizujemy dwie grupy wiekowe, po 6 osób każda:</b>\n<ul>\n<li>dzieci 5-9 lat</li>\n<li> młodzież 10-18 lat</li>\n</ul>\n<p>co pozwoli na równoległy udział w zajęciach rodzeństwom w różnym wieku</p>\n<p><b>Dla dzieci:</b></p>\n<ul>\n<li>Tydzień z gitarą</li>\n<li>Tydzień ze śpiewem</li>\n<li>Tydzień z wiolonczelą</li>\n</ul>\n<p><b>Dla młodzieży:</b></p>\n<ul>\n<li>Tydzień z saksofonem</li>\n<li>Tydzień ze śpiewem</li>\n<li>Tydzień z wiolonczelą</li>\n<li>Tydzień z gitarą</li>\n<li>Tydzień z emisją głosu</li>\n</ul>		\n<p><b>Gwarantujemy codzienne indywidualne lekcje na wybranym instrumencie</b> z naszym nauczycielem. Nie trzeba mieć swojego instrumentu, gdyż zapewniamy potrzebny sprzęt- instrumenty, pulpity, mikrofony i lustra. Będą też kameralne koncerty, w wykonaniu naszej kadry.</p>\n<p>Nasi nauczyciele są absolwentami europejskich Akademii Muzycznych oraz Uniwersytetów, a także są czynnymi artystami, występującymi w najbardziej prestiżowych salach koncertowych m.in. w Carnegie Hall. Łącząc bycie muzyka z pasją nauczania mogą skuteczniej wspierać w rozwoju muzycznym swoich podopiecznych.</p>\n<p>Wszyscy są nauczycielami w Konwersatorium Muzycznym. Każdy uczeń może wziąć udział w wybranym kursie, niezależnie od swoich umiejętności.</p>\n<p><b>PROGRAM WARSZTATÓW:</b></p>\n<ul>\n<li>codzienna indywidualna lekcja gry/śpiewu dla każdego uczestnika</li>\n<li>historia muzyki – umożliwiające poznanie najsłynniejszych dzieł oraz życie wielkich kompozytorów</li>\n<li>teoria muzyki z wykorzystanie klocków lego</li>\n<li>muzyczne gry i zabawy</li>\n<li>koncerty - muzyka na żywo</li>\n</ul>		\n<p>Warsztaty zapewniają potężną dawkę muzyki, ruchu i zabawy, które pobudzają dzieci do rozwoju i dostarczają dużo radości. Wprowadzając w świat dźwięków i muzyki rozbudzamy kreatywność i miłość do muzyki na całe życie.</p>		\n<p>Zajęcia będą odbywać się w blokach po 5h i będą trwać 5 dni – od poniedziałku do piątku. Łącznie będzie to 25 godzin edukacyjnych w tydzień.</p>\n<p>Kosz pakietu to 550zł</p>', '<p>Zajęcia poranne 8:00-13:00 oraz zajęcia popołudniowe 13:00-18:00, a dla chętnych możliwość udziału w całodziennym 10 godzinnym cyklu. Wówczas zapewniamy aż 2 indywidualne lekcje dziennie. Należy wtedy do ceny doliczyć obiad w cateringu.</p>\n<p>Zajęcia odbywają się w naszym Konwersatorium Muzycznym w centrum Warszawy Aleje Jerozolimskie 53, a ze względu na sytuację epidemiologiczną zdecydowaliśmy się na mikro grupy – 6 osobowe. Nasze klasy są bardzo przestronne mają 30-40m2 co zapewnia bezpieczną odległość dzieci.</p>\n<p>Szkoła jest codziennie dezynfekowana, przy wejściu dzieciom będzie mierzona temperatura i dezynfekowane ręce. Prosimy przynieść własne obuwie na zmianę</p>\n<p><b>TERMINY:</b></p>\n<p><b>Turnus I 29.06 - 3.07</b></p>\n<ul>\n<li>dzieci - Tydzień z gitarą</li>\n<li>dzieci - Tydzień z wiolonczelą</li>\n<li>młodzież - Tydzień ze śpiewem</li>\n</ul>\n<p><b>Turnus II 6-10.07</b></p>\n<ul>\n<li>dzieci - Tydzień z śpiewem</li>\n<li>dzieci - Tydzień z wiolonczelą</li>\n<li>młodzież - Tydzień ze gitarą</li>\n</ul>\n<p><b>Już trwają zapisy. Liczba miejsc ograniczona. Zapisy i informacje 883 489 184</b></p>'),
(3, 2, 1, 'International <br> Music Workshops', 'courses for children and adults', 'WELCOME', '<p> Summer 2020 - we invite you to the International Music Workshops, which will take place this year stationary, at our headquarters in the center of Warsaw and online, which will make them available to a much wider audience. </p>\n<p> The course is designed for people who would like to start the adventure with music or deepen and develop their skills. </p>\n<p> Workshops consist of 4 lessons packages. The cost of the 4 lessons package is PLN 300. If you like the classes, you can continue. </p>\n<p> <b> We invite you to classes: </b>\n<ul>\n<li> Guitar class </li>\n<li> Piano class </li>\n<li> Cello class </li>\n<li> Saxophone class </li>\n<li> Singing class - classical and entertainment </li>\n</ul>\n<p> And also new: </p>\n<p> <b> Individual course of music history </b>, where you get to know the most famous works and the lives of great composers. The course consists of 8 parts. </p>\n<p> For children aged 4-6 we have a special program: <b> Classical music for children </b> - introducing the world of great composers. </p>\n<p> All lessons are individual, the program is prepared especially for individual participants. </p>', '<p> Our teachers are graduates of European Music Academies and Universities, and are also active artists performing in the most prestigious concert halls, including at Carnegie Hall. Combining being a musician with a passion for teaching, they can more effectively support the musical development of their pupils. </p>\n<p> Everyone is a teacher at the Music Conversatorium. All students - adults and children - can take part in the chosen course, regardless of their skills. </p>\n<p> After completing the course, each participant receives a Music Conversatory certificate. </p>\n<p> Classes take place in July 2020, from Monday to Saturday from 9:00 to 22:00. Online lessons are available taking into account existing time differences. Classes are intended for beginners as well as for those playing and advanced. Learning materials - we send notes by email. Classes are held online individually - live on the agreed date. Lessons are available in Polish and English. </p>\n<p> <b> Registrations are already in progress. The number of places is limited. Records and information 883 489 184 </b> </p>'),
(4, 2, 2, 'Summer <br> Music Workshops', 'classes for children in Warsaw', 'WELCOME', '<p> This year we invite you to the Summer with music program. The workshop is intended for children who would like to start the adventure with music or deepen and develop their skills. </p>\r\n<p> <b> We organize two age groups, 6 people each: </b>\r\n<ul>\r\n<li> children 5-9 years old </li>\r\n<li> youth 10-18 years old </li>\r\n</ Ul>\r\n<p> which will allow siblings of all ages to participate in parallel classes </p>\r\n<p> <b> For children: </b> </p>\r\n<ul>\r\n<li> Guitar week </li>\r\n<li> Week with singing </li>\r\n<li> Week with cello </li>\r\n</ul>\r\n<p> <b> For young people: </b> </p>\r\n<ul>\r\n<li> Week with saxophone </li>\r\n<li> Week with singing </li>\r\n<li> Week with cello </li>\r\n<li> Guitar week </li>\r\n<li> Week with voice emission </li>\r\n</ul>\r\n<p> <b> We guarantee daily individual lessons on the selected instrument </b> with our teacher. You do not need to have your instrument, because we provide the necessary equipment - instruments, desktops, microphones and mirrors. There will also be intimate concerts performed by our staff. </p>\r\n<p> Our teachers are graduates of European Music Academies and Universities, and are also active artists performing in the most prestigious concert halls, including at Carnegie Hall. Combining being a musician with a passion for teaching, they can more effectively support the musical development of their pupils. </p>\r\n<p> Everyone is a teacher at the Music Conversatorium. Each student can take part in the chosen course, regardless of their skills. </p>\r\n<p> <b> WORKSHOP PROGRAM: </b> </p>\r\n<ul>\r\n<li> daily individual play / singing lesson for each participant </li>\r\n<li> music history - enabling you to get to know the most famous works and the lives of great composers </li>\r\n<li> music theory with the use of lego blocks </li>\r\n<li> musical games and plays </li>\r\n<li> concerts - live music </li>\r\n</ul>\r\n<p> Workshops provide a powerful dose of music, movement and play that stimulate children to grow and provide a lot of fun. Introducing the world of sounds and music, we awaken creativity and love of music for life. </p>\r\n<p> Classes will be held in blocks of 5 hours and will last 5 days - from Monday to Friday. In total, it will be 25 educational hours per week. </p>\r\n<p> The package costs PLN 550 </p>', '<p> Morning classes 8: 00-13: 00 and afternoon classes 13: 00-18: 00, and for those willing to participate in the all-day 10-hour cycle. Then we provide up to 2 individual lessons a day. Then you have to add a lunch in a catering to the price. </p>\r\n<p> Classes take place in our Music Seminar in the center of Warsaw Aleje Jerozolimskie 53, and due to the epidemiological situation we decided on micro groups - 6 people. Our classes are very spacious, 30-40m2, which ensures a safe distance for children. </p>\r\n<p> The school is disinfected every day, children will be measured at the entrance and hands disinfected. Please bring your own footwear for a change </p>\r\n<p> <b> LIMITS </ b> </ p>\r\n<p> <b> Turnus I 29.06 - 3.07 </b> </p>\r\n<ul>\r\n<li> children - Guitar week </li>\r\n<li> children - Cello week </li>\r\n<li> young people - Week with singing </li>\r\n</ul>\r\n<p> <b> Turnus II 6-10.07 </b> </p>\r\n<Ul>\r\n<li> children - Singing week </li>\r\n<li> children - Cello week </li>\r\n<li> young people - Week with a guitar </li>\r\n</ul>\r\n<p> <b> Registrations are already in progress. The number of places is limited. Records and information 883 489 184 </b> </p>'),
(5, 3, 1, 'Hội thảo <br> âm nhạc quốc tế', 'các khóa học cho trẻ em và người lớn', 'chào mừng', '<p> Mùa hè 2020 - chúng tôi mời bạn đến Hội thảo âm nhạc quốc tế, sẽ diễn ra trong năm nay, tại trụ sở của chúng tôi ở trung tâm Warsaw và trực tuyến, sẽ cung cấp cho nhiều đối tượng hơn. </p>\r\n<p> Khóa học được thiết kế cho những người muốn bắt đầu cuộc phiêu lưu với âm nhạc hoặc đào sâu và phát triển các kỹ năng của họ. </p>\r\n<p> Hội thảo bao gồm 4 gói bài học. Chi phí của gói 4 bài học là PLN 300. Nếu bạn thích các lớp học, bạn có thể tiếp tục. </p>\r\n<p> <b> Chúng tôi mời bạn đến các lớp học: </b>\r\n<ul>\r\n<li> Lớp guitar </li>\r\n<li> Lớp đàn piano </li>\r\n<li> Lớp Cello </li>\r\n<li> Lớp Saxophone </li>\r\n<li> Lớp hát - cổ điển và giải trí </li>\r\n</ul>\r\n<p> Và cũng mới: </p>\r\n<p> <b> Khóa học cá nhân về lịch sử âm nhạc </b>, nơi bạn có thể biết các tác phẩm nổi tiếng nhất và cuộc đời của các nhà soạn nhạc vĩ đại. Khóa học bao gồm 8 phần. </p>\r\n<p> Dành cho trẻ em từ 4 đến 6 tuổi, chúng tôi có một chương trình đặc biệt: <b> Âm nhạc cổ điển dành cho trẻ em </b> - giới thiệu thế giới của các nhà soạn nhạc vĩ đại. </p>\r\n<p> Tất cả các bài học là cá nhân, chương trình được chuẩn bị đặc biệt cho từng người tham gia. </p>', '<p> Our teachers are graduates of European Music Academies and Universities, and are also active artists performing in the most prestigious concert halls, including at Carnegie Hall. Combining being a musician with a passion for teaching, they can more effectively support the musical development of their pupils. </p>\r\n<p> Everyone is a teacher at the Music Conversatorium. All students - adults and children - can take part in the chosen course, regardless of their skills. </p>\r\n<p> After completing the course, each participant receives a Music Conversatory certificate. </p>\r\n<p> Classes take place in July 2020, from Monday to Saturday from 9:00 to 22:00. Online lessons are available taking into account existing time differences. Classes are intended for beginners as well as for those playing and advanced. Learning materials - we send notes by email. Classes are held online individually - live on the agreed date. Lessons are available in Polish and English. </p>\r\n<p> <b> Registrations are already in progress. The number of places is limited. Records and information 883 489 184 </b> </p>'),
(6, 3, 2, 'Mùa hè <br> Hội thảo âm nhạc', 'lớp học cho trẻ em ở Warsaw', 'chào mừng', '<p> Năm nay chúng tôi mời bạn đến với chương trình âm nhạc Mùa hè. Hội thảo dành cho trẻ em muốn bắt đầu cuộc phiêu lưu với âm nhạc hoặc đào sâu và phát triển các kỹ năng của mình. </p>\r\n<p> <b> Chúng tôi tổ chức hai nhóm tuổi, mỗi nhóm 6 người: </b>\r\n<ul>\r\n<li> trẻ em 5-9 tuổi </li>\r\n<li> thanh niên 10-18 tuổi </li>\r\n</ul>\r\n<p> sẽ cho phép anh chị em ở mọi lứa tuổi tham gia các lớp học song song </p>\r\n<p> <b> Dành cho trẻ em: </b> </p>\r\n<ul>\r\n<li> Tuần guitar </li>\r\n<li> Tuần có ca hát </li>\r\n<li> Tuần với cello </li>\r\n</ul>\r\n<p> <b> Dành cho giới trẻ: </b> </p>\r\n<ul>\r\n<li> Tuần với saxophone </li>\r\n<li> Tuần có ca hát </li>\r\n<li> Tuần với cello </li>\r\n<li> Tuần guitar </li>\r\n<li> Tuần có phát ra giọng nói </li>\r\n</ul>\r\n<p> <b> Chúng tôi đảm bảo các bài học cá nhân hàng ngày trên nhạc cụ đã chọn </b> với giáo viên của chúng tôi. Bạn không cần phải có nhạc cụ của mình, vì chúng tôi cung cấp các thiết bị cần thiết - nhạc cụ, máy tính để bàn, micrô và gương. Cũng sẽ có những buổi hòa nhạc thân mật được thực hiện bởi nhân viên của chúng tôi. </p>\r\n<p> Giáo viên của chúng tôi là những sinh viên tốt nghiệp Học viện Âm nhạc và Đại học Châu Âu, và cũng là những nghệ sĩ tích cực biểu diễn trong các phòng hòa nhạc uy tín nhất, bao gồm cả tại Carnegie Hall. Kết hợp trở thành một nhạc sĩ với niềm đam mê giảng dạy, họ có thể hỗ trợ hiệu quả hơn cho sự phát triển âm nhạc của học sinh. </p>\r\n<p> Mọi người đều là giáo viên tại Hội thoại âm nhạc. Mỗi sinh viên có thể tham gia khóa học đã chọn, bất kể kỹ năng của họ. </p>\r\n<p> <b> CHƯƠNG TRÌNH LÀM VIỆC: </b> </p>\r\n<ul>\r\n<li> Bài học chơi / hát cá nhân hàng ngày cho mỗi người tham gia </li>\r\n<li> lịch sử âm nhạc - cho phép bạn tìm hiểu các tác phẩm nổi tiếng nhất và cuộc sống của các nhà soạn nhạc vĩ đại </li>\r\n<li> lý thuyết âm nhạc với việc sử dụng các khối lego </li>\r\n<li> trò chơi và chơi nhạc </li>\r\n<li> buổi hòa nhạc - nhạc sống </li>\r\n</ul>\r\n<p> Hội thảo cung cấp một liều lượng mạnh mẽ của âm nhạc, chuyển động và chơi mà kích thích trẻ em phát triển và cung cấp rất nhiều niềm vui. Giới thiệu thế giới âm thanh và âm nhạc, chúng tôi đánh thức sự sáng tạo và tình yêu âm nhạc cho cuộc sống. </p>\r\n<p> Các lớp học sẽ được tổ chức theo khối 5 giờ và sẽ kéo dài 5 ngày - từ thứ Hai đến thứ Sáu. Tổng cộng, nó sẽ là 25 giờ giáo dục mỗi tuần. </p>\r\n<p> Gói có giá PLN 550 </p>', '<p> Các lớp buổi sáng 8: 00-13: 00 và các lớp buổi chiều 13: 00-18: 00 và dành cho những người sẵn sàng tham gia vào chu kỳ 10 giờ cả ngày. Sau đó, chúng tôi cung cấp tối đa 2 bài học cá nhân mỗi ngày. Sau đó, bạn phải thêm một bữa ăn trưa để phục vụ cho giá cả. </p>\r\n<p> Các lớp học diễn ra trong Hội thảo âm nhạc của chúng tôi ở trung tâm Warsaw Aleje Jerozolimskie 53, và do tình hình dịch tễ học, chúng tôi đã quyết định về các nhóm vi mô - 6 người. Các lớp học của chúng tôi rất rộng rãi, 30 - 40m2, đảm bảo khoảng cách an toàn cho trẻ em. </p>\r\n<p> Trường học được khử trùng mỗi ngày, trẻ em sẽ được đo tại lối vào và tay được khử trùng. Vui lòng mang giày dép của riêng bạn để thay đổi </p>\r\n<p> <b> GIỚI HẠN </b> </p>\r\n<p> <b> Turnus I 29,06 - 3,07 </b> </p>\r\n<ul>\r\n<li> trẻ em - Tuần guitar </li>\r\n<li> trẻ em - Tuần lễ Cello </li>\r\n<li> Giới trẻ - Tuần lễ ca hát </li>\r\n</ul>\r\n<p> <b> Turnus II 6-10,07 </b> </p>\r\n<ul>\r\n<li> trẻ em - Tuần hát </li>\r\n<li> trẻ em - Tuần lễ Cello </li>\r\n<li> những người trẻ tuổi - Tuần với cây đàn guitar </li>\r\n</ul>\r\n<p> <b> Việc đăng ký đã được tiến hành. Số lượng địa điểm có hạn. Hồ sơ và thông tin 883 489 184 </b> </p>'),
(7, 4, 1, '國際<br>音樂研討會', '兒童和成人課程', '歡迎', '<p> 2020年夏季-我們邀請您參加今年不動聲色的國際音樂研討會，該研討會在華沙市中心的總部舉行，並在線進行，這將使更多的聽眾能夠使用它們。 </p>\r\n<p>該課程是為那些想通過音樂開始冒險或加深和發展技能的人們而設計的。 </p>\r\n<p>講習班包括4個課程包。 4節課的費用為300波蘭茲羅提。如果您喜歡這些課程，則可以繼續。 </p>\r\n<p> <b>我們邀請您參加課程：</b>\r\n<ul>\r\n<li>吉他課</li>\r\n<li>鋼琴課</li>\r\n<li>大提琴班</li>\r\n<li>薩克斯風類</li>\r\n<li>唱歌課-古典與娛樂</li>\r\n</ul>\r\n<p>也是新的：</p>\r\n<p> <b>個人音樂史課程</b>，在這裡您可以了解最著名的作品和偉大作曲家的生活。該課程包括8個部分。 </p>\r\n<p>對於4-6歲的兒童，我們有一個特別計劃：<b>兒童古典音樂</b>-介紹偉大的作曲家的世界。 </p>\r\n<p>所有課程均為個人課程，該課程是專門為個人參與者準備的。 </p>', '<p>我們的老師是歐洲音樂學院和大學的畢業生，也是在包括卡內基音樂廳在內的最負盛名的音樂廳表演的活躍藝術家。作為音樂家和對教學的熱情相結合，他們可以更有效地支持學生的音樂發展。 </p>\r\n<p>每個人都是音樂學院的老師。所有學生-成人和兒童-不論其技能如何，都可以參加所選課程。 </p>\r\n<p>完成課程後，每個參與者都會收到音樂對話證書。 </p>\r\n<p>上課時間為2020年7月，星期一至星期六9:00至22:00。考慮到現有時差，可以提供在線課程。這些課程適用於初學者以及演奏和進階的人。學習資料-我們通過電子郵件發送筆記。課堂單獨在線舉行-在約定的日期上課。提供波蘭語和英語課程。 </p>\r\n<p> <b>註冊已經在進行中。名額有限。記錄和信息883489184 </b> </p>'),
(8, 4, 2, '夏季<br>音樂工作坊', '華沙兒童班', '歡迎', '<p>今年，我們邀請您參加音樂暑期節目。該研討會的對像是希望通過音樂開始冒險或加深和發展技能的孩子。 </p>\r\n<p> <b>我們組織兩個年齡段，每個年齡段6人：</b>\r\n<ul>\r\n<li> 5-9歲的兒童</li>\r\n<li> 10-18歲的年輕人</li>\r\n</ul>\r\n<p>允許所有年齡段的兄弟姐妹參加平行課程</p>\r\n<p> <b>兒童：</b> </p>\r\n<ul>\r\n<li>吉他週</li>\r\n<li>唱歌週</li>\r\n<li>大提琴一周</li>\r\n</ul>\r\n<p> <b>對於年輕人：</b> </p>\r\n<ul>\r\n<li>薩克斯管一周</li>\r\n<li>唱歌週</li>\r\n<li>大提琴一周</li>\r\n<li>吉他週</li>\r\n<li>發出聲音的一周</li>\r\n</ul>\r\n<p> <b>我們保證每天都會與老師一起在所選樂器上提供單獨的課程</b>。您不需要樂器，因為我們提供了必要的設備-樂器，台式電腦，麥克風和鏡子。我們的員工還將舉辦私人音樂會。 </p>\r\n<p>我們的老師是歐洲音樂學院和大學的畢業生，也是在包括卡內基音樂廳在內的最負盛名的音樂廳表演的活躍藝術家。作為音樂家和對教學的熱情相結合，他們可以更有效地支持學生的音樂發展。 </p>\r\n<p>每個人都是音樂學院的老師。每個學生都可以參加所選課程，無論他們的技能如何。 </p>\r\n<p> <b>研討會計劃：</b> </p>\r\n<ul>\r\n<li>每個參與者的日常個人演奏/唱歌課</li>\r\n<li>音樂史-使您了解最著名的作品和偉大的作曲家的生活</li>\r\n<li>使用樂高積木的音樂理論</li>\r\n<li>音樂遊戲和戲劇</li>\r\n<li>音樂會-現場音樂</li>\r\n</ul>\r\n<p>講習班提供了大量的音樂，動作和遊戲，激發孩子的成長並帶來很多樂趣。在聲音和音樂的世界中，我們喚醒了生命的創造力和對音樂的熱愛。 </p>\r\n<p>授課時間為5小時，為期5天-從星期一到星期五。總共將是每週25個教育小時。 </p>\r\n<p>包裝費用為550茲羅提</p>', '<p>上午8：00-13：00和下午13：00-18：00，以及願意參加全天10小時課程的學員。然後，我們每天最多提供2個單獨的課程。然後，您必鬚根據價格添加午餐。 </p>\r\n<p>在我們位於華沙Aleje Jerozolimskie 53中心的音樂研討會上上課，由於流行病學的原因，我們決定對6人進行分組。我們的教室非常寬敞，面積為30-40平方米，可確保兒童安全距離。 </p>\r\n<p>學校每天都在消毒，入口處將對兒童進行測量並對其雙手進行消毒。請帶上自己的鞋子進行更改</p>\r\n<p> <b>限制</ b> </p>\r\n<p> <b> Turnus I 29.06-3.07 </b> </p>\r\n<ul>\r\n<li>兒童-吉他週</li>\r\n<li>兒童-大提琴週</li>\r\n<li>年輕人-唱歌週</li>\r\n</ul>\r\n<p> <b> Turnus II 6-10.07 </b> </p>\r\n<ul>\r\n<li>兒童-唱歌週</li>\r\n<li>兒童-大提琴週</li>\r\n<li>年輕人-吉他週</li>\r\n</ul>\r\n<p> <b>註冊已經在進行中。名額有限。記錄和信息883489184 </b> </p>');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main_special_offer_translation`
--

CREATE TABLE `main_special_offer_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) DEFAULT NULL,
  `heading_2` varchar(255) DEFAULT NULL,
  `long_desc` varchar(5000) DEFAULT NULL,
  `button` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `main_special_offer_translation`
--

INSERT INTO `main_special_offer_translation` (`id`, `languages_id`, `heading_3`, `heading_2`, `long_desc`, `button`, `img`) VALUES
(1, 1, 'KURSY WAKACYJNE', 'Międzynarodowe Warsztaty Muzyczne 2020', '<p>Lato 2020 - zapraszamy na Międzynarodowe Warsztaty Muzyczne, które odbędą się w tym roku online i będą dostępne dla znacznie szerszego grona odbiorców.</p>\r\n<p>Kurs jest przeznaczony dla osób które chciałyby rozpocząć przygodę z muzyką lub pogłębić i rozwinąć swoje umiejętności.</p>\r\n<p>Nasi nauczyciele są absolwentami europejskich Akademii Muzycznych oraz Uniwersytetów, a także są czynnymi artystami, występującymi w najbardziej prestiżowych salach koncertowych m.in. w Carnegie Hall. Łącząc bycie muzyka z pasją nauczania mogą skuteczniej wspierać w rozwoju muzycznym swoich podopiecznych.</p>\r\n<p>Wszystkie lekcje są indywidualne, program przygotowywany jest specjalnie dla poszczególnych uczestników zajęć.</p>', 'Więcej', '/images/oferta/lato.jpg'),
(2, 2, 'SUMMER COURSES', 'International Music Workshops 2020', '<p>\r\nSummer 2020 - we invite you to the International Music Workshops, which will be held this year online and will be available to a much wider audience.</p>\r\n<p>\r\nThe course is designed for people who would like to start the adventure with music or deepen and develop their skills.</p>\r\n<p>Our teachers are graduates of European Music Academies and Universities, and are also active artists appearing in the most prestigious concert halls, including at Carnegie Hall. Combining being a musician with a passion for teaching, they can more effectively support the musical development of their pupils.</p>\r\n<p>All lessons are individual, the program is prepared especially for individual participants.</p>', 'More', '/images/oferta/lato.jpg'),
(3, 3, 'Khóa học hè', 'Hội thảo âm nhạc quốc tế 2020', '<p>Mùa hè 2020 - chúng tôi mời bạn đến Hội thảo âm nhạc quốc tế, sẽ được tổ chức trực tuyến trong năm nay và sẽ có sẵn cho nhiều đối tượng hơn.</p>\r\n<p>Khóa học được thiết kế cho những người muốn bắt đầu cuộc phiêu lưu với âm nhạc hoặc đào sâu và phát triển các kỹ năng của họ.</p>\r\n<p>Giáo viên của chúng tôi là những sinh viên tốt nghiệp Học viện Âm nhạc và Đại học Châu Âu, và cũng là những nghệ sĩ tích cực xuất hiện trong các phòng hòa nhạc uy tín nhất, bao gồm cả tại Carnegie Hall. Kết hợp trở thành một nhạc sĩ với niềm đam mê giảng dạy, họ có thể hỗ trợ hiệu quả hơn cho sự phát triển âm nhạc của học sinh.</p>\r\n<p>Tất cả các bài học là cá nhân, chương trình được chuẩn bị đặc biệt cho cá nhân người tham gia.</p>', 'Kiểm tra', '/images/oferta/lato.jpg'),
(4, 4, '暑期課程', '2020年國際音樂研討會', '<p>2020年夏季-我們邀請您參加今年在網上舉辦的國際音樂研討會，並向更多的聽眾開放</p>\r\n<p>本課程是為希望通過音樂開始冒險或深化和發展技能的人們而設計的\r\n</p>\r\n<p>我們的老師是歐洲音樂學院和大學的畢業生，也是活躍在最負盛名的音樂廳，包括卡內基音樂廳的藝術家。作為音樂家和對教學的熱情相結合，他們可以更有效地支持學生的音樂發展</p>\r\n<p>所有課程都是個別的，該課程是專門為個人參與者準備的</p>', '檢查', '/images/oferta/lato.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `sort_index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `menu`
--

INSERT INTO `menu` (`id`, `code`, `sort_index`) VALUES
(1, 'banner', 1),
(2, 'o-szkole', 2),
(3, 'oferta', 3),
(4, 'oferta-sezonowa', 4),
(5, 'galeria', 5),
(6, 'nauczyciele', 6),
(7, 'referencje', 7),
(8, 'kontakt', 8),
(9, 'sklep', 9);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `menu_translation`
--

CREATE TABLE `menu_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `nav_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `menu_translation`
--

INSERT INTO `menu_translation` (`id`, `languages_id`, `menu_id`, `nav_link`) VALUES
(1, 1, 1, 'Strona główna'),
(2, 1, 2, 'O szkole'),
(3, 1, 3, 'Oferta'),
(4, 1, 4, 'Kursy letnie'),
(5, 1, 5, 'Galeria'),
(6, 1, 6, 'Nauczyciele'),
(7, 1, 7, 'Referencje'),
(8, 1, 8, 'Kontakt'),
(9, 2, 1, 'Home'),
(10, 2, 2, 'School'),
(11, 2, 3, 'Programmes'),
(12, 2, 4, 'Summer school'),
(13, 2, 5, 'Gallery'),
(14, 2, 6, 'Teachers'),
(15, 2, 7, 'References'),
(16, 2, 8, 'Contact us'),
(17, 3, 1, 'Trang chủ'),
(18, 3, 2, 'Về trường học'),
(19, 3, 3, 'Gói hàng giới thiệu'),
(20, 3, 4, 'Summer school'),
(21, 3, 5, 'Trưng bày'),
(22, 3, 6, 'Giáo viên'),
(23, 3, 7, 'Lời khen giới thiệu'),
(24, 3, 8, 'Liên lạc'),
(25, 4, 1, '主页'),
(26, 4, 2, '学校简介'),
(27, 4, 3, '课程开设'),
(28, 4, 4, 'Summer school'),
(29, 4, 5, '艺术展示'),
(30, 4, 6, '教师风采'),
(31, 4, 7, '他人荐语'),
(32, 4, 8, '联系我们'),
(33, 1, 9, 'Sklep');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `offer`
--

CREATE TABLE `offer` (
  `id` int(10) UNSIGNED NOT NULL,
  `courses_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `offer`
--

INSERT INTO `offer` (`id`, `courses_id`, `category_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 2),
(11, 11, 2),
(12, 12, 2),
(13, 13, 2),
(14, 14, 2),
(15, 15, 2),
(16, 16, 2),
(17, 17, 2),
(18, 18, 2),
(19, 10, 3),
(20, 11, 3),
(21, 12, 3),
(22, 13, 3),
(23, 14, 3),
(24, 15, 3),
(25, 16, 3),
(26, 17, 3),
(27, 18, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `positions`
--

CREATE TABLE `positions` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `positions`
--

INSERT INTO `positions` (`id`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `positions_translation`
--

CREATE TABLE `positions_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `positions_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `positions_translation`
--

INSERT INTO `positions_translation` (`id`, `languages_id`, `positions_id`, `name`) VALUES
(1, 1, 1, 'Założycielka Konwersatorium Muzycznego'),
(2, 1, 2, 'Specjalista w zakresie planowania strategicznego'),
(3, 1, 3, 'Dyrektor'),
(4, 1, 4, 'Nauczyciel'),
(8, 2, 1, 'Founder of the Music Conversatory'),
(9, 2, 2, 'Strategic planning expert'),
(10, 2, 3, 'Director'),
(11, 2, 4, 'Teacher'),
(12, 3, 1, 'Người sáng lập Konwersatorium Muzyczne'),
(13, 3, 2, 'Chuyên gia kế hoạch chiến lược'),
(14, 3, 3, 'Giám đốc'),
(15, 3, 4, 'Giáo viên'),
(16, 4, 1, '音乐学校的创始人'),
(17, 4, 2, '战略策划专家'),
(18, 4, 3, '導向器'),
(19, 4, 4, '教师');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `references_category`
--

CREATE TABLE `references_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `references_category`
--

INSERT INTO `references_category` (`id`, `code`) VALUES
(1, 'parents'),
(2, 'pupils'),
(3, 'other');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `references_category_translation`
--

CREATE TABLE `references_category_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `references_category_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) NOT NULL,
  `heading_2` varchar(255) NOT NULL,
  `short_desc` varchar(1000) NOT NULL,
  `button` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `references_category_translation`
--

INSERT INTO `references_category_translation` (`id`, `languages_id`, `references_category_id`, `heading_3`, `heading_2`, `short_desc`, `button`) VALUES
(1, 1, 1, 'REFERENCJE RODZICÓW', 'Dziękujemy za zaufanie!', '<p>Można tutaj poznać historie zadowolonych rodziców, których dzieci kształciły się w Konwersatorium Muzycznym.</p>', 'Rodzice...'),
(2, 1, 2, 'REFERENCJE UCZNIÓw', 'Dziękujemy za pracowity czas!', '<p>Można poczytać tutaj historie zadowolonych uczniów.</p>', 'Uczniowie'),
(3, 1, 3, 'REFERENCJE - FILMY', 'Dziękujemy za pracowity czas!', '<p>Można poczytać tutaj historie zadowolonych uczniów.</p>', 'Referencje - filmy'),
(4, 2, 1, '', '', '', 'Parents...'),
(5, 2, 2, '', '', '', 'Pupils...'),
(6, 2, 3, '', '', '', 'Watch the references - clips!'),
(7, 3, 1, 'PHỤ HUYNH GIỚI THIỆU – CA NGỢI', 'Chúng tôi cảm ơn là đã tin tưởng chúng tôi!', 'Ở đây có thể đọc những câu chuyện của những phụ huynh mà rất hài lòng, khi con cái của họ theo học ở Konwersatorium Muzyczne.', 'Phụ huynh'),
(8, 3, 2, 'TRẺ EM PHÁT BIỂU', 'Chúng tôi cảm ơn đã dành thời gian quý báu và tích cực!', 'Ở đây có thể đọc những câu chuyện của các cháu học sinh đang rất hài lòng.', 'Học viên'),
(9, 3, 3, '', '', '', 'Hãy xem các phim!'),
(10, 4, 1, '', '', '', '家长说'),
(11, 4, 2, '', '', '', '学生说'),
(12, 4, 3, '', '', '', '点击观看');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `references_no`
--

CREATE TABLE `references_no` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `references_no`
--

INSERT INTO `references_no` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `references_translation`
--

CREATE TABLE `references_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED DEFAULT '4',
  `references_no_id` int(10) UNSIGNED DEFAULT NULL,
  `references_category_id` int(10) UNSIGNED DEFAULT NULL,
  `references_type_id` int(10) UNSIGNED DEFAULT NULL,
  `long_desc` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `references_translation`
--

INSERT INTO `references_translation` (`id`, `languages_id`, `references_no_id`, `references_category_id`, `references_type_id`, `long_desc`) VALUES
(1, 1, 1, 1, 3, '<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fgosia.jakubowska%2Fposts%2F10158054037115535&width=500" width="500" height="219" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>\r\n<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fnatalia.skupien.9%2Fposts%2F2955185414542043&width=500" width="500" height="219" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>\r\n<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3D723821698070399%26id%3D100013277264679&width=500" width="500" height="162" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>\r\n<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fnina.majewskakrzyzewska%2Fposts%2F2757623387693235&width=500" width="500" height="219" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>\r\n<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Faleksandra.kazimierczak.37%2Fposts%2F2389065331189122&width=500" width="500" height="162" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>\r\n<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fjan.mielczarski%2Fposts%2F4351714028187288&width=500" width="500" height="219" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>\r\n<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpawel.zamorski%2Fposts%2F10216907963633005&width=500" width="500" height="219" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>\r\n<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fdamminh%2Fposts%2F10219881728087803&width=500" width="500" height="199" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>\r\n<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Finga.domanska%2Fposts%2F10219635236302850&width=500" width="500" height="219" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>\r\n<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fle.duythien.7%2Fposts%2F10156751540277030&width=500" width="500" height="199" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>\r\n<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fmonika.rykiel.9%2Fposts%2F2727469160713645&width=500" width="500" height="219" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>\r\n<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Furszula.wachnik.3%2Fposts%2F246266309852635&width=500" width="500" height="257" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>\r\n<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fsweeteire%2Fposts%2F10223181701391422&width=500" width="500" height="219" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>\r\n<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3D775607546229765%26id%3D100013415795855&width=500" width="500" height="142" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>\r\n<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Femilia.cieslak.357%2Fposts%2F3400347976649883&width=500" width="500" height="142" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>\r\n<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3D747917385665851%26id%3D100013427886634&width=500" width="500" height="142" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>\r\n<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fleafeon.poke.7%2Fposts%2F2466992120025219&width=500" width="500" height="142" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>\r\n<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3D741474862970818%26id%3D100013249337056&width=500" width="500" height="142" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>'),
(2, 1, 2, 1, 1, '<p>Chciałbym polecić lekcje w Konwersatorium Muzycznym, w których bierze udział moja córka Helenka.</p>\r\n<p>Do Konwersatorium Muzycznego trafiliśmy trochę przypadkiem, trochę na próbę. Miało być tylko na jeden miesiąc, ale po miesiącu okazało się, ze moja 6 letnia córka, która wcześniej nigdy nie uczyła się gry na żadnym instrumencie rozpoznaje nuty i coraz bardziej lubi grę na pianinie. Po wakacjach było już jasne, że ze szkoły nie zrezygnujemy, a po kolejnym miesiącu w naszym mieszkaniu pojawiło się pianino. Mimo upływu czasu Helenka nadal z ogromną radością chodzi na zajęcia. Myślę, ze zasługa to tylko głównie wspaniałej nauczycielki Pani Bogny Kołodziej, dzięki niej Helenka z radością siada do grania, nie zmuszana, za to z ogromną motywacją.</p>\r\n<p>Kiedy spytałam Helenki dlaczego tak bardzo lubi chodzić na te zajęcia, to usłyszałam, ze dlatego, że Pani Bogna jest miła, że może nauczyć się czytać nowe nuty, poznaje instrumenty, że świetnie się na zajęciach bawi, często gra w ciekawe gry, a nie tylko na pianinie.</p>\r\n<p>Ja również cenię tę szkołę właśnie za to, że Helenka może się rozwijać muzycznie w bardzo szerokim zakresie. Uczy się nie tylko gry na instrumencie, ale odbiera edukację muzyczną z prawdziwego zdarzenia. Niezwykle dumna jestem, kiedy słysząc w radiu utwór muzyczny Helenka potrafi mnie zaskoczyć mówiąc: „Mamo, to ten Vivaldi”.</p>\r\n<p>Szczerze polecam Konwersatorium Muzyczne tym, którym zależy na rozwoju i uwrażliwieniu muzycznym dziecka bez stresu kojarzonego w „tradycyjną” szkołą muzyczną. Tu dziecko ma szansę nauczyć się czerpać ogromną radość z grania.</p>\r\n<p class="podpis">– Marta Mazurkiewicz</p>\r\n<p>My z synem mieliśmy niebywałą (!) przyjemność poznać obie Panie na przesłuchaniu. I ja, i Kuba (!) wychodziliśmy oczarowani. Pełen profesjonalizm połączony z sercem i dla muzyki, i dla dzieci, i do ich nauczania, a dodatkowo samo miejsce chyba zaczarowane. Widać, że dzieci przychodzą tu, bo lubią, a nie – bo muszą. Nie zdecydowaliśmy się wyłącznie z powodów finansowych, ale kibicujemy i podpisujemy się pod opinią Mamy Helenki. Mama Jakuba</p>\r\n<p class="podpis">– Magdalena Czerwińska-Strzelczyk</p>\r\n<p>Jestem mamą dwóch córek, które równolegle rozpoczęły naukę u Pani Bogny. Już po kilku zajęciach widać było jak chętnie dziewczyny przyjeżdżają do Konwersatorium i jak (niejednokrotnie) trudno ustalić w domu grafik ćwiczeń obydwu pianistek :). Pianino (sztuk jeden) pojawiło się bowiem już po czwartej lekcji i muzyka jest już stale obecna w naszym domu.</p>\r\n<p>Zafascynowana entuzjazmem córek także sama oddałam się w cierpliwą opiekę pedagogiczną pani Grażyny:).</p>\r\n<p>Nauka gry na pianinie u pani Bogny i pani Grażyny to nie tylko nauka nut. To także świetna zabawa, przyjemność, relaks i doskonale spędzony czas. Ucząc się gry na pianinie (czasem też na fortepianie), wszystkie trzy zupełnie inaczej reagujemy na muzykę, inaczej jej słuchamy i dla każdej z nas ma ona swoją niepowtarzalną wartość.</p>\r\n<p>Jako rodzice jesteśmy zafascynowani tym jak muzyka pozwoliła otworzyć się naszym córkom oraz ile sprawia im radości i satysfakcji.</p>\r\n<p>Godny podziwu jest niezwykły talent pedagogiczny pani Bogny, zapał i zaangażowanie emanujące z niej na każdej lekcji połączony z nowatorskimi i ciekawymi metodami nauki. To przykład nauczyciela, który pracując z pasją potrafi „zarazić” nią swoich uczniów… Zresztą zaczynając naukę gry na pianinie jako dorosła osoba z panią Grażyną, nie mam wątpliwości, że talent pani Bogny jest po prostu „wrodzony”:).</p>\r\n<p>Serdecznie dziękujemy i zdecydowanie rekomendujemy to magiczne miejsce oraz wspaniałe, ciepłe a jednocześnie profesjonalne nauczycielki.</p>\r\n<p class="podpis">– Ewelina Stobiecka (dumna mama)</p>\r\n<p>Jestem ojcem 5,5-letniej Natalki.</p>\r\n<p>W maju 2014 roku Natalka rozpoczęła swoją przygodę nauki gry na pianinie w Konwersatorium Muzycznym prowadzonym przy ul. Poznańskiej 39 w Warszawie przez Panie Grażynę i Bognę Kołodziej. Od początku nauki gry opiekę nad córką sprawuje Pani Bogna.</p>\r\n<p>Jako rodzic jestem bardzo mile zaskoczony metodyką nauki gry, którą stosuje się na tych zajęciach. Użycie klocków Lego, puzzli, różnych gier i zabaw słuchowych poprzeplatane nauka nut, układu klawiatury, instrumentów i historią kompozytorów skutkuje tym, że córce trudno jest przerwać lekcje i wracać do domu.</p>\r\n<p>Na pozytywne efekty nauki tez długo nie trzeba czekać ponieważ rozpoznawanie melodii i ich twórców, a także samodzielna gra pierwszych kolęd czy melodii „Sto lat” wniosło do naszego domu wiele radości i ciepła.</p>\r\n<p>A o radości na zajęciach dużo by pisać. Pani Bogna wkłada ją w każdą lekcję.</p>\r\n<p>Tak przynajmniej słyszałem przez drzwi.</p>\r\n<p class="podpis">– Grzegorz Sienkiewicz</p>\r\n<p>Nasza córka zaczęła lekcje na pianinie w konserwatorium, gdy miała skończone pięć lat. Nie wiedzieliśmy czy jej się spodoba gra na pianinie, ani czy my będziemy w stanie pomóc jej w nauce. Po pół roku nauki gry na pianinie, nie tylko moja córka z chęcią zasiada do instrumentu, ale również mój mąż zaczął grać.</p>\r\n<p>Razem z mężem cieszymy się, że sukces dziecka w nauce to jest wspólna praca nauczyciela, rodzica i oczywiście dziecka. Nauczyciel przy tym ma główną rolę, bo to on wyznacza kierunek tempo i treść nauki. Bez dobrego przewodnika byłoby trudno o powodzenie. Bardzo dziękujemy Pani Bogna za jej zaangażowanie i wiarę w umiejętności dziecka.</p>\r\n<p class="podpis">– Katarzyna Proctor</p>\r\n<p>Jestem mamą 4-letniego chłopca, który drugi rok (dwa razy w tygodniu po 50 minut) uczestniczy w zajęcia prowadzonych przez Panią Bognę Kołodziej.</p>\r\n<p>Przez ten czas Pani Bogna dała się poznać jako osoba bardzo zaangażowana w prowadzone przez siebie zajęcia, szalenie kreatywna i potrafiąca dostosować program nauczania do indywidualnych potrzeb dziecka. Pani Bogna znakomicie radzi sobie z moim Synem, który dobrze się bawiąc nabywa wiedzę i umiejętności muzyczne (Syn nie raz zadziwił mnie swoją znajomością instrumentów muzycznych na koncertach w Filharmonii jak i utworów).</p>\r\n<p>Zajęcia są ciekawe i wszechstronnie rozwijające muzycznie. Syn bardzo chętnie w nich uczestniczy, a jest dzieckiem pełnym energii i nie potrafiący długo wytrwać w miejscu.</p>\r\n<p>Dodatkowo Pani Bogna jest osobą miłą, cierpliwą i lubiącą dzieci. Szczerze polecam zajęcia z Panią Bogną.</p>\r\n<p class="podpis">– D.W.</p>\r\n<p>Pracuję jako scenograf i dekorator wnętrz na planach filmowych. Codziennie w mojej pracy znam gam się z brakiem czasu, zmiennością sytuacji i dużą nerwowością. Jako dziecko uczyłam się gry na pianinie. I po latach zatęskniłam do gry na instrumencie. W domu pojawiło się pianino. Myślałam, ze pogodzenie tej trudnej pracy z lekcjami w Konwersatorium będzie wręcz niemożliwe.</p>\r\n<p>Ale udaje się i daje mi to ogromną satysfakcję. To taka godzina tylko dla mnie. Odpoczywam, wyłączam się i robię cos zupełnie innego. Swoista muzykoterapia. Z lekcji wychodzę z otwarta głowa, pełna energii i nowych pomysłów na Zycie. No i zaczyna coraz lepiej grać! Ostatnio zapisałam na zajęcia tez mojego męża. Marzeniem moim jest żebyśmy sobie grali kiedyś na 4 ręce.</p>\r\n<p class="podpis">– Ineza Bodyk</p>'),
(3, 1, 3, 1, 2, '<img src="/images/referencje/rodzice1.jpg"/>\r\n<img src="/images/referencje/rodzice2.jpg"/>\r\n<img src="/images/referencje/rodzice3.jpg"/>\r\n<img src="/images/referencje/rodzice4.jpg"/>'),
(4, 1, 4, 2, 2, '<img src="/images/referencje/iwonka.jpg" />\r\n<p>Najlepsze referencje od uczennicy 7-letniej Iwonki</p>\r\n<img src="/images/referencje/ania.jpg" />\r\n<p>„A to moja kochana pani” 6-letnia Ania</p>\r\n<img src="/images/referencje/kasia.jpg" />\r\n<p>I jeszcze wspaniałe referencje od 4-letniej Kasi</p>\r\n<img src="/images/referencje/ania2.jpg" />\r\n<p>Rymowane od 6-letniej Ani</p>\r\n<img src="/images/referencje/klara.jpg" />\r\n<p>Narysowałam swoją lekcje. Gram na pianinie, nogi oparte mam na czerwonym podnóżku, a Pani Bogna siedzi obok. Gram swój ulubiony utwór – Mając przyjaciela. (Widać wyraźnie nutę C, natomiast nutę A lewa ręka gra 3-cim palcem.) Właśnie skończyłam grać utwór i patrzę na Panią Bognę czy dobrze, a ona się uśmiecha\r\n<br /><strong>- Referencja od 4-letniej Klary</strong></p>'),
(5, 1, 5, 2, 4, '<iframe width="100%" height="400px" src="https://www.youtube.com/embed/Aw2FCwkYY-4" frameborder="0" allowfullscreen></iframe>\r\n<p>Dlaczego warto grać opowiada Ola Nguyen</p>\r\n<iframe width="100%" height="400px" src="https://www.youtube.com/embed/jiIlKmdi7PM" frameborder="0" allowfullscreen></iframe>\r\n<p>Moja Pani dużo się śmieje – mówi Iwonka</p>'),
(6, 1, 6, 3, 4, '<p style="text-align: justify;">Pan Mateusz Walczak niedawno rozpoczął swoją przygodę z muzyką – uczy się w klasie dla dorosłych w Konwersatorium Muzycznym w Warszawie. Opowiada dlaczego rozpoczął naukę jako dorosły człowiek i kto go zainspirował.</p>\r\n<p class="text-center">\r\n    <iframe width="474" height="267" src="https://www.youtube.com/embed/izE7hMfGOdM?feature=oembed" frameborder="0" allowfullscreen=""></iframe>\r\n</p>\r\n<p style="text-align: justify;">Nasz absolwent Krzysztof Ratajski, obecnie studiuje na Uniwersytecie Muzycznym Fryderyka Chopina w Warszawie. Rozpoczął naukę mając 13 lat, teraz spełnia swoje marzenia.</p>\r\n<p class="text-center">\r\n    <iframe width="474" height="356" src="https://www.youtube.com/embed/FE88kuazhe4?feature=oembed" frameborder="0" allowfullscreen=""></iframe>\r\n</p>\r\n<p>Joanna Andrychowska studiuje na Uniwersytecie Medycznym w Warszawie. Granie daje jej radość i chwile odpoczynku od codziennych spraw.</p>\r\n<p class="text-center">\r\n    <iframe width="474" height="356" src="https://www.youtube.com/embed/lxIauHG_b1w?feature=oembed" frameborder="0" allowfullscreen=""></iframe>\r\n</p>\r\n<p>Absolwent Jakub Mroziewicz opowiada o swojej edukacji muzycznej i jak „muzyka pozwala przenieść się do innego świata”.</p>\r\n<p class="text-center">\r\n    <iframe width="474" height="356" src="https://www.youtube.com/embed/HTVFx-d50NM?feature=oembed" frameborder="0" allowfullscreen=""></iframe>\r\n</p>\r\n<p>Pani Elżbieta Domańska opowiada o naszej nietypowej szkole.</p>\r\n<p class="text-center">\r\n    <iframe width="474" height="356" src="https://www.youtube.com/embed/EPvJMtkcuMw?feature=oembed" frameborder="0" allowfullscreen=""></iframe>\r\n</p>\r\n<p>Nasza absolwentka Anna Pachowska opowiada jak chciała przestać uczyć się grać i dlaczego nadal gra.</p>\r\n<p class="text-center">\r\n    <iframe width="474" height="356" src="https://www.youtube.com/embed/T41jlO6RwiY?feature=oembed" frameborder="0" allowfullscreen=""></iframe>\r\n</p>\r\n<p style="text-align: justify;">Pan Szymon Kulik uczy się w klasie fortepianu w Konwersatorium Muzycznym w Warszawie. Opowiada o roli muzyki w jego życiu i o tym, że jak się czegoś pragnie to warto spróbować i spełnić marzenia.</p>\r\n<p class="text-center">\r\n    <iframe width="474" height="267" src="https://www.youtube.com/embed/UxMTV9FzfdQ?feature=oembed" frameborder="0" allowfullscreen=""></iframe>\r\n</p>\r\n<p style="text-align: justify;">Czy można spełnić marzenia i nauczyć się grać? Pani Joanna Pawłowska kilka lat temu rozpoczęła naukę gry na fortepianie w Konwersatorium Muzycznym. Obie jej córki uczyły się grać, przestały dopiero na studiach i wtedy zdecydowała się Pani Joanna na rozpoczęcie nauki od samego początku. Dziś nie żałuje swojej decyzji.</p>\r\n<p class="text-center">\r\n    <iframe width="474" height="356" src="https://www.youtube.com/embed/o6aRvld594Q?feature=oembed" frameborder="0" allowfullscreen=""></iframe>\r\n</p>\r\n<p>Pan Jean-Jacques Granas</p>\r\n<p class="text-center">\r\n    <iframe width="474" height="356" src="https://www.youtube.com/embed/1sCHQfmQfOU?feature=oembed" frameborder="0" allowfullscreen=""></iframe>\r\n</p>'),
(7, 2, 1, 1, 3, ''),
(8, 2, 2, 1, 1, ''),
(9, 2, 4, 2, 2, '<img src="/images/referencje/iwonka.jpg" />\r\n<p>The best references from a 7-years old pupil, Iwona</p>\r\n<img src="/images/referencje/ania.jpg" />\r\n<p>„This is my beloved Teacher” Ania, 6-years old</p>\r\n<img src="/images/referencje/kasia.jpg" />\r\n<p>A wonderful testimonial of 4 years old Kasia</p>\r\n<img src="/images/referencje/ania2.jpg" />\r\n<p>From 6 years old Ania</p>\r\n<img src="/images/referencje/klara.jpg" />\r\n<p>“I drew my piano lesson. I play piano, my legs rest on a red stool, and Ms Bogna sits next to me. I play my favorite music piece “I’ve got a friend” (You can clearly see C note, and I play A note with the third finger or my left hand). I’ve just finish playing my piece and I’m looking at Ms Bogna to see if it was ok, and she is smiling.”\r\n<br />- references of 4 years old Klara.</p>'),
(10, 2, 5, 2, 4, '<iframe width="100%" height="400px" src="https://www.youtube.com/embed/Aw2FCwkYY-4" frameborder="0" allowfullscreen></iframe>\r\n<p>Why it is worth to play an instrument? explains Ola Nguyen</p>\r\n<iframe width="100%" height="400px" src="https://www.youtube.com/embed/jiIlKmdi7PM" frameborder="0" allowfullscreen></iframe>\r\n<p>“My teacher laughs a lot!” says Iwona</p>'),
(11, 2, 6, 3, 4, '<p style="text-align: justify;">Mr Mateusz Just has recently started his adventure with music – he takes piano class for adults at the Music Conversatory. He talks why did he start learning as an adult, and who had inspired him.</p>\r\n<p class="text-center">\r\n    <iframe width="474" height="267" src="https://www.youtube.com/embed/izE7hMfGOdM?feature=oembed" frameborder="0" allowfullscreen=""></iframe>\r\n</p>\r\n<p style="text-align: justify;">Our alumnus, Krzysztof Ratajski, studies currently at the Fryderyk Chopin University of Music. He began to learn to play piano, when he was 13 years old, and now he enjoys his dreams coming true.</p>\r\n<p class="text-center">\r\n    <iframe width="474" height="356" src="https://www.youtube.com/embed/FE88kuazhe4?feature=oembed" frameborder="0" allowfullscreen=""></iframe>\r\n</p>\r\n<p>Joanna Andrychowska studies at the Medical University of Warsaw. Playing an instrument gives her joy and a time to relax from daily chores.</p>\r\n<p class="text-center">\r\n    <iframe width="474" height="356" src="https://www.youtube.com/embed/lxIauHG_b1w?feature=oembed" frameborder="0" allowfullscreen=""></iframe>\r\n</p>\r\n<p>Our alumnus, Jakub Mroziewicz, talks about his musical education, and how “music makes it possible to transfer oneself to another world”.</p>\r\n<p class="text-center">\r\n    <iframe width="474" height="356" src="https://www.youtube.com/embed/HTVFx-d50NM?feature=oembed" frameborder="0" allowfullscreen=""></iframe>\r\n</p>\r\n<p>Ms Elzbieta Domanska talks about our unique school.</p>\r\n<p class="text-center">\r\n    <iframe width="474" height="356" src="https://www.youtube.com/embed/EPvJMtkcuMw?feature=oembed" frameborder="0" allowfullscreen=""></iframe>\r\n</p>\r\n<p>Our alumnus, Anna Pachowska, explains how she wanted to give up and why she continues to play piano.</p>\r\n<p class="text-center">\r\n    <iframe width="474" height="356" src="https://www.youtube.com/embed/T41jlO6RwiY?feature=oembed" frameborder="0" allowfullscreen=""></iframe>\r\n</p>\r\n<p style="text-align: justify;">Mr Szymon Kulik learns to play piano at the Music Conversatory in Warsaw. He talks about the importance of music in his life, and how essential it is, when you want something, to try and make the dream come true.</p>\r\n<p class="text-center">\r\n    <iframe width="474" height="267" src="https://www.youtube.com/embed/UxMTV9FzfdQ?feature=oembed" frameborder="0" allowfullscreen=""></iframe>\r\n</p>\r\n<p style="text-align: justify;">Can you make your dreams come true and learn to play piano? A few years ago, Ms Joanna Pawlowska began to learn to play piano at the Music Conversatory. Both her daughters had learned it, and had stopped when had entered university. Then, Ms J decided to star learning from the very beginning. Today, she doesn’t regret the decision.</p>\r\n<p class="text-center">\r\n    <iframe width="474" height="356" src="https://www.youtube.com/embed/o6aRvld594Q?feature=oembed" frameborder="0" allowfullscreen=""></iframe>\r\n</p>\r\n<p>Mr Jean-Jacques Granas</p>\r\n<p class="text-center">\r\n    <iframe width="474" height="356" src="https://www.youtube.com/embed/1sCHQfmQfOU?feature=oembed" frameborder="0" allowfullscreen=""></iframe>\r\n</p>'),
(12, 3, 1, 1, 3, ''),
(13, 3, 2, 1, 1, '<p>Tôi xin giới thiệu các lớp học trong Konwersatorium Muzyczne, con gái Helena của tôi đang học ở đây.</p>\r\n<p>Cháu nhập học Konwersatorium Muzyczne  vừa vô tình và cũng vừa theo yêu cầu. Định cho học thử một tháng, nhưng sau tháng đó thì cô con gái 6 tuổi, mà trước đây chưa hề học chơi bất cứ một nhạc cụ nào, đã quen biết rất nhiều nốt nhạc và ngày càng thích chơi đàn piano. Sau kỳ nghỉ hè thì mọi chuyện đã rõ ràng là vẫn sẽ tiếp tục học ở trường, một tháng sau đó thì trong nhà chúng tôi xuất hiện thêm chiếc đàn piano. Thời gian trôi qua, Helena vẫn rất vui mừng cắp sách tới trường. Tôi cho là đó là công lao của cô giáo tuyệt vời Bogna Kołodziej, nhờ cô giáo mà Helena rất thích thú ngồi học đàn, không hề bị ép buộc, mà còn rất quyết tâm học.</p>\r\n<p>Khi tôi hỏi Helena tại sao con thích đi học môn này thế, thì nghe thấy cháu trả lời là cô Bogna thật dễ thương và cháu có thể học thuộc những nốt nhạc mới, quen dần với các nhạc cụ và khi cháu đi học thì rất vui, trong lớp có nhiều trò chơi thú vị, không chỉ ngồi chơi đàn piano.</p>\r\n<p>Tôi cũng đánh giá tốt trường này bởi vì Helena có thể phát triển về âm nhạc với lĩnh vực sâu rộng. Cháu không chỉ được học chơi đàn piano, mà được đón nhận kiến thức âm nhạc thực sự. Tôi rất tự hào khi nghe thấy trong đài có bản nhạc thì Helena có thể làm cho tôi ngạc nhiên: ”Mẹ ơi, đây là bài của nhạc sỹ Vivaldi đấy”.</p>\r\n<p>Tôi chân thành khuyên nên chọn Trường Nhạc, nếu các bạn muốn con cái mình phát triển và có sự nhạy cảm âm nhạc, vì học ở đây không hề bị bệnh stress như các cháu bé vẫn thường có khi học ở các trường nhạc truyền thống. Ở đây trẻ em có cơ hội học thêm và lại cảm thấy rất vui khi chơi đàn.</p>\r\n<p class="podpis">– Marta Mazurkiewicz</p>\r\n<p>Chúng tôi cùng với con trai rất hân hạnh được làm quen với cả 2 cô giáo khi đến thi thử. Cả tôi và cả Kuba ra khỏi trường như là đang mê ngủ. Rất chuyên nghiệp, mà rất đầy nhiệt huyết dành cho âm nhạc, cho trẻ em, cho sự ngiệp giáo dục, ngoài ra nơi này là sự huyền bí. Có điều rõ ràng là trẻ em đến đây học là vì các cháu thích học, chứ không phải vì bắt buộc. Chúng tôi chưa cho cháu nhập học chỉ là do hoàn cảnh kinh tế chưa cho phép, nhưng chúng tôi hoàn toàn ủng hộ và đồng ý với những ý kiến của mẹ cháu Helena – mẹ của Kuba.</p>\r\n<p class="podpis">– Magdalena Czerwińska-Strzelczyk</p>\r\n<p>Tôi là mẹ của hai cháu gái, cả hai đang cùng học ở chỗ cô Bogna. Chỉ sau vài buổi học là có thể thấy là các cháu rất thích đi học Konwersatorium Muzyczne và không chỉ một lần đã thấy là rất khó mà xếp lịch cho công việc tự luyện tập ở nhà cho cả 2 cháu. Vì chỉ có 1 chiếc đàn piano, chúng tôi mua ngay sau khi các cháu mới học được có 4 buổi và như vậy trong nhà chúng tôi tiếng đàn đã xuất hiện thường xuyên và cố định.</p>\r\n<p>Thấy các cháu ham học, tôi cũng kiên trì học chơi đàn cùng với cô Grazyna.</p>\r\n<p>Khi được học cùng với cô Bogna và với bà Grazyna thì chúng tôi không chỉ học các nốt nhạc. Đó còn là sự vui chơi, thời gian tiêu khiển, rất dễ chịu, được nghỉ ngơi thư giãn và nói chung thời gian trôi rất thú vị. Học chơi đàn piano (nhỏ) và thỉnh thoảng đàn dương cầm (to), tất cả 3 chúng tôi có cảm nhận âm nhạc hoàn toàn khác nhau, nghe nhạc một cách khác nhau và đối với mỗi chúng tôi thì âm nhạc đều có giá trị phi thường.</p>\r\n<p>Làm cha mẹ, chúng tôi cảm thấy rất tự hào là âm nhạc đã cho phép các con của chúng tôi rộng mở tâm hồn và các cháu đang có rất nhiều điều thú vị và sự hài lòng.</p>\r\n<p>Tài năng sư phạm phi thường của cô Bogna thật ấn tượng, niềm đam mê công việc của cô thường được biệu lộ ở trong từng tiết học, với những phương pháp dạy đầy sự sáng chế và lại rất thú vị. Đó là một thí dụ về người giáo viên làm việc với lòng đam mê và có phương pháp giảng dạy làm cho các học trò của mình bị “lây” niềm say mê âm nhạc. Với tư các là người lớn, mà mới bắt đầu học chơi đàn piano cùng với bà Grazyna, tôi không còn nghi ngờ gì về tài năng của cô Bogna chẳng qua là “được sinh ra”.</p>\r\n<p>Chúng tôi chân thành cảm ơn và xin giới thiệu với các bạn nơi này, đó là một chốn mê hoặc, là một điểm đến tuyệt vời, ấm cúng, cùng với các cô giáo chuyên nghiệp.</p>\r\n<p class="podpis">– Ewelina Stobiecka (người mẹ tự hào)</p>\r\n<p>Tôi là cha của cháu Natalia 5 tuổi rưỡi.</p>\r\n<p>Vào tháng 05.2014 Natalia bắt đầu cuộc phiêu lưu với âm nhạc của mình, học chơi đàn piano ở Trường Nhạc trên phố Poznańska 39 ở Vác-sa-va do 2 cô giáo Grażyna và Bogna Kolodziej dạy. Từ lúc mới học, cô Bogna dạy cháu.</p>\r\n<p>Tôi rất ngạc nhiên về phương pháp giảng dạy mà các cô áp dụng ở trường. Các cô giáo áp dụng cả những viên Lego, những mảnh ghép puzzli, những trò chơi khác nhau trong các buổi học nốt nhạc, học nút đàn, nhạc cụ và lịch sử các nhà soạn nhạc, điều đó làm cho con gái tôi không muốn rời buổi học để đi về nhà.</p>\r\n<p>Không cần phải đợi lâu, mà cũng đã xuất hiện những hiệu quả tích cực, bởi vì cháu đã nhận ra được các âm điệu của những bài nhạc và các tác giả, ngoài ra cháu còn tự chơi được những bài thánh ca đầu tiên hay là bài hát “Trăm tuổi” chúc sinh nhật, mang lại nhiều niềm vui và sự ấm cúng cho ngôi nhà của chúng tôi.Có thể viết rất nhiều về những niềm vui khi học đàn.</p>\r\n<p>Cô Bogna mang lại sự vui tươi trong từng giờ học.</p>\r\n<p>Ít ra tôi cũng có thể nghe được điều đó qua cánh cửa.</p>\r\n<p class="podpis">– Grzegorz Sienkiewicz</p>\r\n<p>Con gái của chúng tôi bắt đầu học đàn piano trong trường khi cháu mới được 5 tuổi. Trước đó thì chúng tôi không biết cháu có thích chơi đàn hay không, hoặc là chúng tôi sẽ có thể giúp gì cho cháu. Sau nửa năm học đàn, không chỉ con gái chúng tôi thích thú ngồi chơi đàn, mà chồng tôi cũng bắt đầu đánh đàn.</p>\r\n<p>Cùng với chồng, chúng tôi vui mừng là thành quả của con gái là do sự cộng tác của cô giáo, của cha mẹ và của chính đứa trẻ. Nhưng rõ ràng là công lao của cô giáo là chính, bởi vì cô tạo ra hướng phát triển và nội dung học tập. Không có người dẫn đường tốt thì khó mà thành công. Chúng tôi rất cảm ơn cô Bogna về sự nhiệt tình và niềm tin vào khả năng của cháu.</p>\r\n<p class="podpis">– Katarzyna Proctor</p>\r\n<p>Tôi là mẹ của chái trai 4 tuổi, đả học năm thứ hai (hai lần trong tuần, mỗi lân phút), do có Bogna Kołodziej dạy.</p>\r\n<p>Suốt quá trình này, cô Bogna cho thấy được đó là một người rất ham mê công việc, các buổi học đầy tính sáng tạo và cô biết chọn ra những chương trình học cho từng cháu một cách rất tốt, tùy theo nhu cầu của từng đứa trẻ. Cô Bogna đã có mối quan hệ tốt với con trai tôi, cháu có thêm được kiến thức và kỹ năng âm nhạc (không một lần con trai đã làm chúng tôi phải ngạc nhiên về sự thông thạo đối với các loại nhạc cụ ở các buổi hòa nhạc ở Nhạc viện và thông thạo cả các tác phẩm nữa).</p>\r\n<p>Các buổi học rất thú vị và đó là sự phát triển âm nhạc toàn năng. Con trai tôi rất thích thú học, cháu là một đứa trẻ đầy năng lượng và không ngồi yên được lâu tại một chổ.</p>\r\n<p>Ngoài ra, cô Bogna rất dễ thương, dễ chịu, kiên trì và rất yêu thích trẻ em. Tôi chân thành khuyên nên học cùng cô Bogna.</p>\r\n<p class="podpis">– D.W.</p>\r\n<p>Tôi làm việc với tư cách là nhà dựng cảnh và trang trí nội thất trong các hiện trường quay phim. Hàng ngày trong công việc, tôi phải lo toan với vấn đề rất thiếu thời gian, vì nhiều tình huống thay đổi khác nhau và nói chung rất hay bị lo lắng. Hồi thơ ấu tôi cũng có học chơi đàn piano. Sau nhiều năm tôi nhớ lại loại nhạc cụ này. Vậy là trong nhà tôi đã xuất hiện chiếc đàn piano. Tôi đã nghĩ là công việc tôi khó khăn như vậy thì khó mà kết hợp được với công việc học đàn ở Trường Nhạc.</p>\r\n<p>Vậy mà cũng đã thu xếp được và như vậy tôi cảm thấy rất hài lòng. Giờ học là khoảng thời gian chỉ dành cho riêng tôi. Khi đó tôi nghỉ ngơi, không lo nghĩ gì chuyện khác và tôi đang làm một công việc hoàn toàn khác. Một dạng kiểu như như là được điều trị bằng âm nhạc. Học xong tiết học, tôi cảm thấy sảng khoái, đầy nhiệt huyết và nhiều sáng kiến mới cho cuộc sống. Và tất nhiên là tôi chơi đàn ngày càng khá hơn. Gần đây tôi xếp lịch ghi tên cả chồng tôi vào lớp học đàn. Tôi có niềm mơ ước là đến một khi nào đó chúng tôi sẽ có thể cùng chơi với nhau trên 1 chiếc đàn – biểu diễn 4 tay.</p>\r\n<p class="podpis">– Ineza Bodyk</p>'),
(14, 3, 3, 1, 2, '<img src="/images/referencje/rodzice1.jpg" />\r\n<img src="/images/referencje/rodzice2.jpg" />\r\n<img src="/images/referencje/rodzice3.jpg" />\r\n<img src="/images/referencje/rodzice4.jpg" />\r\n'),
(15, 3, 4, 2, 2, '<img src="/images/referencje/iwonka.jpg" />\r\n<p>Lời khen ngợi tốt nhất là của một cháu người Việt 7 tuổi - Iwonka Nguyen</p>\r\n<img src="/images/referencje/ania.jpg" />\r\n<p>“ Còn đây là cô giáo thân yêu của con” – Ania 6 tuổi.</p>\r\n<img src="/images/referencje/kasia.jpg" />\r\n<p>Còn có lời khen tuyệt vời của cháu Kasia 4 tuổi.</p>\r\n<img src="/images/referencje/ania2.jpg" />\r\n<p>Thơ của Ania 6 tuổi.</p>\r\n<img src="/images/referencje/klara.jpg" />\r\n<p>Cháu vẽ các bàn học của mình.Cháu chơi đàn piano, chân đặt lên chiếc ghế đỏ, còn cô Bogna ngồi bên cạnh. Cháu chơi bài yêu thích – Có bạn. (Nốt nhạc C, thay cho nốt A, tay trái ngón thứ 3) Cháu vừa chơi xong 1 bài và nhìn cô Bogna xem phản ứng, mà cô đang cười <br /><strong>- Cháu Klara 4 tuổi khen</strong></p>'),
(16, 3, 5, 2, 4, '<iframe width="100%" height="400px" src="https://www.youtube.com/embed/Aw2FCwkYY-4" frameborder="0" allowfullscreen></iframe>\r\n<p>Tại sao nên chơi đàn – Ola Nguyễn nói</p>\r\n<iframe width="100%" height="400px" src="https://www.youtube.com/embed/jiIlKmdi7PM" frameborder="0" allowfullscreen></iframe>\r\n<p>Cô giáo của cháu rất hay cười – Iwonka Nguyen nói.</p>\r\n'),
(17, 3, 6, 3, 4, ''),
(19, 4, 1, 1, 3, ''),
(20, 4, 2, 1, 1, ''),
(21, 4, 3, 1, 2, '<img src="/images/referencje/rodzice1.jpg" />\r\n<img src="/images/referencje/rodzice2.jpg" />\r\n<img src="/images/referencje/rodzice3.jpg" />\r\n<img src="/images/referencje/rodzice4.jpg" />'),
(22, 4, 4, 2, 2, ''),
(23, 4, 5, 2, 4, ''),
(24, 4, 6, 3, 4, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `references_type`
--

CREATE TABLE `references_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `references_type`
--

INSERT INTO `references_type` (`id`, `name`) VALUES
(1, 'text'),
(2, 'img'),
(3, 'facebook'),
(4, 'movie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shop_item_category`
--

CREATE TABLE `shop_item_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `shop_item_category`
--

INSERT INTO `shop_item_category` (`id`, `code`) VALUES
(1, 'ebook'),
(2, 'book'),
(3, 'cd'),
(4, 'course');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shop_item_category_translation`
--

CREATE TABLE `shop_item_category_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `shop_item_category_id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `shop_item_category_translation`
--

INSERT INTO `shop_item_category_translation` (`id`, `languages_id`, `shop_item_category_id`, `category`) VALUES
(1, 1, 1, 'ebook'),
(2, 1, 2, 'książka'),
(3, 1, 3, 'cd'),
(4, 1, 4, 'kurs');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shop_item_details`
--

CREATE TABLE `shop_item_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_item_category_id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL,
  `img_thumbnail` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `author` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `shop_item_details`
--

INSERT INTO `shop_item_details` (`id`, `shop_item_category_id`, `img`, `img_thumbnail`, `quantity`, `price`, `author`) VALUES
(1, 1, '/images/shop/item/temp.jpg', '/images/shop/item/temp.jpg', 10, '45.99', 'Jan Kowalski'),
(2, 1, '/images/shop/item/temp.jpg', '/images/shop/item/temp.jpg', 5, '45.99', 'Jan Kowalski'),
(3, 2, '/images/shop/item/temp.jpg', '/images/shop/item/temp.jpg', 2, '45.99', 'Jan Kowalski'),
(4, 4, '/images/shop/item/temp.jpg', '/images/shop/item/temp.jpg', 2, '45.99', 'Jan Kowalski'),
(5, 1, '/images/shop/item/temp.jpg', '/images/shop/item/temp.jpg', 6, '45.99', 'Jan Kowalski'),
(6, 2, '/images/shop/item/temp.jpg', '/images/shop/item/temp.jpg', 4, '45.99', 'Jan Kowalski'),
(7, 1, '/images/shop/item/temp.jpg', '/images/shop/item/temp.jpg', 5, '45.99', 'Jan Kowalski'),
(8, 2, '/images/shop/item/temp.jpg', '/images/shop/item/temp.jpg', 5, '45.99', 'Jan Kowalski'),
(9, 4, '/images/shop/item/temp.jpg', '/images/shop/item/temp.jpg', 6, '45.99', 'Jan Kowalski'),
(10, 1, '/images/shop/item/temp.jpg', '/images/shop/item/temp.jpg', 5, '45.99', 'Jan Kowalski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shop_item_details_translation`
--

CREATE TABLE `shop_item_details_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `shop_item_details_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_desc` varchar(2000) DEFAULT NULL,
  `long_desc` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `shop_item_details_translation`
--

INSERT INTO `shop_item_details_translation` (`id`, `languages_id`, `shop_item_details_id`, `title`, `short_desc`, `long_desc`) VALUES
(1, 1, 1, 'Tytył Lorem ipsum', 'krótki opis - Lorem Ipsum', 'długi opis - Lorem Ipsum'),
(2, 1, 2, 'Tytuł', 'Krótki opis', 'Długi opis'),
(3, 1, 3, 'Tytuł', 'Krótki opis', 'Długi opis'),
(4, 1, 4, 'Tytuł', 'Krótki opis', 'Długi opis'),
(5, 1, 5, 'Tytuł', 'Krótki opis', 'Długi opis'),
(6, 1, 6, 'Tytuł', 'Krótki opis', 'Długi opis'),
(7, 1, 7, 'Tytuł', 'Krótki opis', 'Długi opis'),
(8, 1, 8, 'Tytuł', 'Krótki opis', 'Długi opis'),
(9, 1, 9, 'Tytuł', 'Krótki opis', 'Długi opis'),
(10, 1, 10, 'Tytuł', 'Krótki opis', 'Długi opis');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shop_item_main_translation`
--

CREATE TABLE `shop_item_main_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `heading_3` varchar(255) DEFAULT NULL,
  `heading_2` varchar(255) DEFAULT NULL,
  `short_desc` varchar(2000) DEFAULT NULL,
  `long_desc` varchar(5000) DEFAULT NULL,
  `button` varchar(255) DEFAULT NULL,
  `button_show` varchar(255) NOT NULL,
  `button_add` varchar(255) NOT NULL,
  `button_remove` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `shop_item_main_translation`
--

INSERT INTO `shop_item_main_translation` (`id`, `languages_id`, `heading_3`, `heading_2`, `short_desc`, `long_desc`, `button`, `button_show`, `button_add`, `button_remove`, `img`) VALUES
(1, 1, 'Sklep', 'Zapraszamy na zakupy', '<p>Polecamy ebooki, kursy wideo, ksiązki...</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n<p>W naszej ofercie znajdują się:</p>\r\n<ul class="text-left">\r\n<li>ebooki</li>\r\n<li>kursy</li>\r\n<li>książki</li>\r\n</ul>\r\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>', 'Przejdź do sklepu', 'Zobacz', 'Dodaj', 'Usuń', '/images/shop/main/ebook.jpg\r\n');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `specialization`
--

CREATE TABLE `specialization` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `specialization`
--

INSERT INTO `specialization` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `specialization_translation`
--

CREATE TABLE `specialization_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `languages_id` int(10) UNSIGNED NOT NULL,
  `specialization_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `specialization_translation`
--

INSERT INTO `specialization_translation` (`id`, `languages_id`, `specialization_id`, `name`) VALUES
(1, 1, 1, 'wiolonczelista'),
(2, 1, 2, 'pianista'),
(3, 1, 3, 'saksofonista'),
(4, 1, 4, 'wokalistka'),
(5, 1, 5, 'logopeda'),
(6, 1, 6, 'wokalista'),
(7, 1, 7, 'gitarzysta'),
(8, 1, 8, 'pianistka'),
(16, 2, 1, 'cellist'),
(17, 2, 2, 'pianist'),
(18, 2, 3, 'saxophonist'),
(19, 2, 4, 'singer'),
(20, 2, 5, 'speech therapist'),
(21, 2, 6, 'singer'),
(22, 2, 7, 'guitarist'),
(23, 2, 8, 'pianist'),
(24, 3, 1, 'Nhạc sỹ violonsen'),
(25, 3, 2, 'Nghệ sĩ piano'),
(26, 3, 3, 'Nhạc sỹ saxofon'),
(27, 3, 4, NULL),
(28, 3, 5, NULL),
(29, 3, 6, NULL),
(30, 3, 7, 'Nhạc sỹ ghita'),
(31, 3, 8, 'Nghệ sĩ piano'),
(32, 4, 1, '演奏家'),
(33, 4, 2, '演奏家'),
(34, 4, 3, '演奏家'),
(35, 4, 4, '声乐教师'),
(36, 4, 5, NULL),
(37, 4, 6, '声乐教师'),
(38, 4, 7, '吉他演奏家'),
(39, 4, 8, NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `common_desc_id` (`common_desc_id`);

--
-- Indexes for table `category_translation`
--
ALTER TABLE `category_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `common_desc`
--
ALTER TABLE `common_desc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `common_desc_translation`
--
ALTER TABLE `common_desc_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`),
  ADD KEY `common_desc_id` (`common_desc_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `common_desc` (`common_desc_id`),
  ADD KEY `course_type_id` (`course_type_id`);

--
-- Indexes for table `courses_heading_translation`
--
ALTER TABLE `courses_heading_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indexes for table `courses_translation`
--
ALTER TABLE `courses_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`),
  ADD KEY `courses_id` (`courses_id`);

--
-- Indexes for table `course_name`
--
ALTER TABLE `course_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_name_translation`
--
ALTER TABLE `course_name_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`),
  ADD KEY `course_name_id` (`course_name_id`);

--
-- Indexes for table `course_type`
--
ALTER TABLE `course_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_type_translation`
--
ALTER TABLE `course_type_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`),
  ADD KEY `course_type_id` (`course_type_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_name_id` (`course_name_id`);

--
-- Indexes for table `employee_translation`
--
ALTER TABLE `employee_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indexes for table `emp_heading_translation`
--
ALTER TABLE `emp_heading_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indexes for table `emp_positions`
--
ALTER TABLE `emp_positions`
  ADD PRIMARY KEY (`employee_id`,`positions_id`),
  ADD KEY `job_post_id` (`positions_id`);

--
-- Indexes for table `emp_specialization`
--
ALTER TABLE `emp_specialization`
  ADD PRIMARY KEY (`employee_id`,`specialization_id`),
  ADD KEY `specialization_id` (`specialization_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_about_info_translation`
--
ALTER TABLE `main_about_info_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indexes for table `main_banner`
--
ALTER TABLE `main_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_banner_translation`
--
ALTER TABLE `main_banner_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_banner_id` (`main_banner_id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indexes for table `main_contact_details_translation`
--
ALTER TABLE `main_contact_details_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indexes for table `main_contact_translation`
--
ALTER TABLE `main_contact_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indexes for table `main_counter`
--
ALTER TABLE `main_counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_counter_translation`
--
ALTER TABLE `main_counter_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`),
  ADD KEY `main_counter_id` (`main_counter_id`);

--
-- Indexes for table `main_facts`
--
ALTER TABLE `main_facts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_facts_translation`
--
ALTER TABLE `main_facts_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_facts_id` (`main_facts_id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indexes for table `main_progress_heading_translation`
--
ALTER TABLE `main_progress_heading_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indexes for table `main_progress_translation`
--
ALTER TABLE `main_progress_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indexes for table `main_references_translation`
--
ALTER TABLE `main_references_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indexes for table `main_special_offer_details`
--
ALTER TABLE `main_special_offer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_special_offer_details_translation`
--
ALTER TABLE `main_special_offer_details_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`),
  ADD KEY `main_special_offer_details_id` (`main_special_offer_details_id`);

--
-- Indexes for table `main_special_offer_translation`
--
ALTER TABLE `main_special_offer_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_translation`
--
ALTER TABLE `menu_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`courses_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions_translation`
--
ALTER TABLE `positions_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`),
  ADD KEY `positions_id` (`positions_id`);

--
-- Indexes for table `references_category`
--
ALTER TABLE `references_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `references_category_translation`
--
ALTER TABLE `references_category_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`),
  ADD KEY `references_category` (`references_category_id`);

--
-- Indexes for table `references_no`
--
ALTER TABLE `references_no`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `references_translation`
--
ALTER TABLE `references_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`),
  ADD KEY `references_no_id` (`references_no_id`),
  ADD KEY `references_category_id` (`references_category_id`),
  ADD KEY `references_type_id` (`references_type_id`);

--
-- Indexes for table `references_type`
--
ALTER TABLE `references_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_item_category`
--
ALTER TABLE `shop_item_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_item_category_translation`
--
ALTER TABLE `shop_item_category_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`),
  ADD KEY `shop_item_category_id` (`shop_item_category_id`);

--
-- Indexes for table `shop_item_details`
--
ALTER TABLE `shop_item_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_item_category_id` (`shop_item_category_id`);

--
-- Indexes for table `shop_item_details_translation`
--
ALTER TABLE `shop_item_details_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`),
  ADD KEY `shop_item_details_id` (`shop_item_details_id`);

--
-- Indexes for table `shop_item_main_translation`
--
ALTER TABLE `shop_item_main_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialization_translation`
--
ALTER TABLE `specialization_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_id` (`languages_id`),
  ADD KEY `specialization_id` (`specialization_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `category_translation`
--
ALTER TABLE `category_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT dla tabeli `common_desc`
--
ALTER TABLE `common_desc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `common_desc_translation`
--
ALTER TABLE `common_desc_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT dla tabeli `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT dla tabeli `courses_heading_translation`
--
ALTER TABLE `courses_heading_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `courses_translation`
--
ALTER TABLE `courses_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT dla tabeli `course_name`
--
ALTER TABLE `course_name`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT dla tabeli `course_name_translation`
--
ALTER TABLE `course_name_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT dla tabeli `course_type`
--
ALTER TABLE `course_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT dla tabeli `course_type_translation`
--
ALTER TABLE `course_type_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT dla tabeli `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT dla tabeli `employee_translation`
--
ALTER TABLE `employee_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT dla tabeli `emp_heading_translation`
--
ALTER TABLE `emp_heading_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `main_about_info_translation`
--
ALTER TABLE `main_about_info_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `main_banner`
--
ALTER TABLE `main_banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `main_banner_translation`
--
ALTER TABLE `main_banner_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `main_contact_details_translation`
--
ALTER TABLE `main_contact_details_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT dla tabeli `main_contact_translation`
--
ALTER TABLE `main_contact_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `main_counter`
--
ALTER TABLE `main_counter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `main_counter_translation`
--
ALTER TABLE `main_counter_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT dla tabeli `main_facts`
--
ALTER TABLE `main_facts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `main_facts_translation`
--
ALTER TABLE `main_facts_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT dla tabeli `main_progress_heading_translation`
--
ALTER TABLE `main_progress_heading_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `main_progress_translation`
--
ALTER TABLE `main_progress_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT dla tabeli `main_references_translation`
--
ALTER TABLE `main_references_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `main_special_offer_details`
--
ALTER TABLE `main_special_offer_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `main_special_offer_details_translation`
--
ALTER TABLE `main_special_offer_details_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT dla tabeli `main_special_offer_translation`
--
ALTER TABLE `main_special_offer_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT dla tabeli `menu_translation`
--
ALTER TABLE `menu_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT dla tabeli `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT dla tabeli `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `positions_translation`
--
ALTER TABLE `positions_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT dla tabeli `references_category`
--
ALTER TABLE `references_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `references_category_translation`
--
ALTER TABLE `references_category_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT dla tabeli `references_no`
--
ALTER TABLE `references_no`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT dla tabeli `references_translation`
--
ALTER TABLE `references_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT dla tabeli `references_type`
--
ALTER TABLE `references_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `shop_item_category`
--
ALTER TABLE `shop_item_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `shop_item_category_translation`
--
ALTER TABLE `shop_item_category_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `shop_item_details`
--
ALTER TABLE `shop_item_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT dla tabeli `shop_item_details_translation`
--
ALTER TABLE `shop_item_details_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT dla tabeli `shop_item_main_translation`
--
ALTER TABLE `shop_item_main_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT dla tabeli `specialization_translation`
--
ALTER TABLE `specialization_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`common_desc_id`) REFERENCES `common_desc` (`id`);

--
-- Ograniczenia dla tabeli `category_translation`
--
ALTER TABLE `category_translation`
  ADD CONSTRAINT `category_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `category_translation_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Ograniczenia dla tabeli `common_desc_translation`
--
ALTER TABLE `common_desc_translation`
  ADD CONSTRAINT `common_desc_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `common_desc_translation_ibfk_2` FOREIGN KEY (`common_desc_id`) REFERENCES `common_desc` (`id`);

--
-- Ograniczenia dla tabeli `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`common_desc_id`) REFERENCES `common_desc` (`id`),
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`course_type_id`) REFERENCES `course_type` (`id`);

--
-- Ograniczenia dla tabeli `courses_heading_translation`
--
ALTER TABLE `courses_heading_translation`
  ADD CONSTRAINT `courses_heading_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `courses_translation`
--
ALTER TABLE `courses_translation`
  ADD CONSTRAINT `courses_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `courses_translation_ibfk_2` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`);

--
-- Ograniczenia dla tabeli `course_name_translation`
--
ALTER TABLE `course_name_translation`
  ADD CONSTRAINT `course_name_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `course_name_translation_ibfk_2` FOREIGN KEY (`course_name_id`) REFERENCES `course_name` (`id`);

--
-- Ograniczenia dla tabeli `course_type_translation`
--
ALTER TABLE `course_type_translation`
  ADD CONSTRAINT `course_type_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `course_type_translation_ibfk_2` FOREIGN KEY (`course_type_id`) REFERENCES `course_type` (`id`);

--
-- Ograniczenia dla tabeli `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`course_name_id`) REFERENCES `course_name` (`id`);

--
-- Ograniczenia dla tabeli `employee_translation`
--
ALTER TABLE `employee_translation`
  ADD CONSTRAINT `employee_translation_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `employee_translation_ibfk_3` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `emp_heading_translation`
--
ALTER TABLE `emp_heading_translation`
  ADD CONSTRAINT `emp_heading_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `emp_positions`
--
ALTER TABLE `emp_positions`
  ADD CONSTRAINT `emp_positions_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `emp_positions_ibfk_2` FOREIGN KEY (`positions_id`) REFERENCES `positions` (`id`);

--
-- Ograniczenia dla tabeli `emp_specialization`
--
ALTER TABLE `emp_specialization`
  ADD CONSTRAINT `emp_specialization_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `emp_specialization_ibfk_2` FOREIGN KEY (`specialization_id`) REFERENCES `specialization` (`id`);

--
-- Ograniczenia dla tabeli `main_about_info_translation`
--
ALTER TABLE `main_about_info_translation`
  ADD CONSTRAINT `main_about_info_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `main_banner_translation`
--
ALTER TABLE `main_banner_translation`
  ADD CONSTRAINT `main_banner_translation_ibfk_1` FOREIGN KEY (`main_banner_id`) REFERENCES `main_banner` (`id`),
  ADD CONSTRAINT `main_banner_translation_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `main_contact_details_translation`
--
ALTER TABLE `main_contact_details_translation`
  ADD CONSTRAINT `main_contact_details_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `main_contact_translation`
--
ALTER TABLE `main_contact_translation`
  ADD CONSTRAINT `main_contact_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `main_counter_translation`
--
ALTER TABLE `main_counter_translation`
  ADD CONSTRAINT `main_counter_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `main_counter_translation_ibfk_2` FOREIGN KEY (`main_counter_id`) REFERENCES `main_counter` (`id`);

--
-- Ograniczenia dla tabeli `main_facts_translation`
--
ALTER TABLE `main_facts_translation`
  ADD CONSTRAINT `main_facts_translation_ibfk_1` FOREIGN KEY (`main_facts_id`) REFERENCES `main_facts` (`id`),
  ADD CONSTRAINT `main_facts_translation_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `main_progress_heading_translation`
--
ALTER TABLE `main_progress_heading_translation`
  ADD CONSTRAINT `main_progress_heading_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `main_progress_translation`
--
ALTER TABLE `main_progress_translation`
  ADD CONSTRAINT `main_progress_translation_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `main_references_translation`
--
ALTER TABLE `main_references_translation`
  ADD CONSTRAINT `main_references_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `main_special_offer_details_translation`
--
ALTER TABLE `main_special_offer_details_translation`
  ADD CONSTRAINT `main_special_offer_details_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `main_special_offer_details_translation_ibfk_2` FOREIGN KEY (`main_special_offer_details_id`) REFERENCES `main_special_offer_details` (`id`);

--
-- Ograniczenia dla tabeli `main_special_offer_translation`
--
ALTER TABLE `main_special_offer_translation`
  ADD CONSTRAINT `main_special_offer_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `menu_translation`
--
ALTER TABLE `menu_translation`
  ADD CONSTRAINT `menu_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `menu_translation_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);

--
-- Ograniczenia dla tabeli `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `offer_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Ograniczenia dla tabeli `positions_translation`
--
ALTER TABLE `positions_translation`
  ADD CONSTRAINT `positions_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `positions_translation_ibfk_2` FOREIGN KEY (`positions_id`) REFERENCES `positions` (`id`);

--
-- Ograniczenia dla tabeli `references_category_translation`
--
ALTER TABLE `references_category_translation`
  ADD CONSTRAINT `references_category_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `references_category_translation_ibfk_2` FOREIGN KEY (`references_category_id`) REFERENCES `references_category` (`id`);

--
-- Ograniczenia dla tabeli `references_translation`
--
ALTER TABLE `references_translation`
  ADD CONSTRAINT `references_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `references_translation_ibfk_2` FOREIGN KEY (`references_no_id`) REFERENCES `references_no` (`id`),
  ADD CONSTRAINT `references_translation_ibfk_3` FOREIGN KEY (`references_category_id`) REFERENCES `references_category` (`id`),
  ADD CONSTRAINT `references_translation_ibfk_4` FOREIGN KEY (`references_type_id`) REFERENCES `references_type` (`id`);

--
-- Ograniczenia dla tabeli `shop_item_category_translation`
--
ALTER TABLE `shop_item_category_translation`
  ADD CONSTRAINT `shop_item_category_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `shop_item_category_translation_ibfk_2` FOREIGN KEY (`shop_item_category_id`) REFERENCES `shop_item_category` (`id`);

--
-- Ograniczenia dla tabeli `shop_item_details`
--
ALTER TABLE `shop_item_details`
  ADD CONSTRAINT `shop_item_details_ibfk_1` FOREIGN KEY (`shop_item_category_id`) REFERENCES `shop_item_category` (`id`);

--
-- Ograniczenia dla tabeli `shop_item_details_translation`
--
ALTER TABLE `shop_item_details_translation`
  ADD CONSTRAINT `shop_item_details_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `shop_item_details_translation_ibfk_2` FOREIGN KEY (`shop_item_details_id`) REFERENCES `shop_item_details` (`id`);

--
-- Ograniczenia dla tabeli `shop_item_main_translation`
--
ALTER TABLE `shop_item_main_translation`
  ADD CONSTRAINT `shop_item_main_translation_ibfk_1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`);

--
-- Ograniczenia dla tabeli `specialization_translation`
--
ALTER TABLE `specialization_translation`
  ADD CONSTRAINT `specialization_translation_ibfk_1` FOREIGN KEY (`specialization_id`) REFERENCES `specialization` (`id`),
  ADD CONSTRAINT `specialization_translation_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `specialization_translation_ibfk_3` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `specialization_translation_ibfk_4` FOREIGN KEY (`specialization_id`) REFERENCES `specialization` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
