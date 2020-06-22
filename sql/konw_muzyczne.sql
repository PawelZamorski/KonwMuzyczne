-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 10:58 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konw_muzyczne`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `common_desc_id` int(10) UNSIGNED DEFAULT NULL,
  `long_desc` varchar(2000) DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `common_desc_id`, `long_desc`, `img`) VALUES
(1, 'dla dzieci', 2, '<p>Wierzymy, że aby edukacja była skuteczna, potrzebny jest dobry kontakt z nauczycielem. Bez ocen i egzaminów. Pakiet startowy to 4 lekcje, aby spróbować pracy z wybranym nauczycielem. Poznać jego metody pracy, dynamikę zajęć oraz zobaczyć czy to jest najlepszy nauczyciel dla dziecka. Potem jest możliwość spróbować pracy z drugim nauczycielem. Uważnie słuchamy dziecka, a dla rodziców jest to sprawdzenie czy dziecko chętnie uczestniczy w zajęciach, czy cieszy się na myśl o lekcjach, czy wolałoby mieć dłuższe lekcje.</p>\r\n<p>Koszt pakietu 4 lekcje to 300zł</p>\r\n<p>W naszej szkole rozpoznając naukę stacjonarnie na początku nie trzeba mieć własnego instrumentu. Podczas pierwszego spotkania doradzamy wybór instrumentu. Dzieci wędrują po szkole i próbują grać na różnych, sprawdzamy co je zachwyci i zainteresuje.</p>\r\n<p>Zajęcia online są dostępne z uwzględnieniem występujących różnic czasu. Zajęcia przeznaczone są zarówno dla dzieci początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>', '/images/oferta-ikony/dzieci.jpg'),
(2, 'dla dorosłych', 2, '<p>Wierzymy, że aby edukacja była skuteczna, potrzebny jest dobry kontakt z nauczycielem. Bez ocen i egzaminów. Pakiet startowy to 4 lekcje, aby spróbować pracy z wybranym nauczycielem. Poznać jego metody pracy, dynamikę zajęć oraz zobaczyć czy to jest najlepszy nauczyciel dla Państwa. Potem jest możliwość spróbować pracy z drugim nauczycielem.</p>\r\n<p>Koszt pakietu 4 lekcje to 300zł</p>\r\n<p>Wiele osób marzyło o tym, aby grać, ale nie miało takiej możliwości. W dzisiejszym świecie cały czas się spieszymy. Gonią nas terminy, projekty i zadania do zrealizowania, kolejne sprawdziany, ważne egzaminy i cały czas nowe rzeczy do nauczenia się, zapamiętania. Stałe podnoszenie kwalifikacji to zadania i cele do osiągnięcia w wyznaczonym terminie. Powszechny jest brak czasu dla rodziny, przyjaciół i samego siebie.</p>\r\n<p>W pogoni za sukcesem, zapominamy o najważniejszym – o Sobie. Dzięki muzyce można oderwać się od codzienności i przenieść się w inny świat.</p>\r\n<p>W Konwersatorium mamy specjalne programy dla dorosłych, którzy chcą nauczyć się grać i śpiewać od podstaw, albo wrócić do instrumentu, na którym grali w dzieciństwie i mieli przerwę. Zajęcia prowadzone są w komfortowych warunkach. Nauczyciele z pasją i radością przekazują wiedze. Mamy dużo utworów do grania w duecie z nauczycielem, wiec nie są to żmudne ćwiczenia techniczne, lecz wspólne tworzenie muzyki. Bez ocen i egzaminów.</p>\r\n<p>Zajęcia online są dostępne z uwzględnieniem występujących różnic czasu. Zajęcia przeznaczone są zarówno dla osób dorosłych początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>', '/images/oferta-ikony/dorosli.jpg'),
(3, 'dla seniorów', 2, '<p>Spełnij marzenie! Zawsze chciałeś grać? Nie było czasu? Zabrakło możliwości? Zapraszamy na nowy program nauki gry dedykowany dla osób 50+. Nasi słuchacze mają 60+, 70+ i nawet 80+ bo nigdy nie jest za późno aby rozpocząć przygodę z muzyką.</p>\r\n<p>Wierzymy, że aby edukacja była skuteczna, potrzebny jest dobry kontakt z nauczycielem. Bez ocen i egzaminów. Pakiet startowy to 4 lekcje, aby spróbować pracy z wybranym nauczycielem. Poznać jego metody pracy, dynamikę zajęć oraz zobaczyć czy to jest najlepszy nauczyciel dla Państwa. Potem jest możliwość spróbować pracy z drugim nauczycielem.</p>\r\n<p>Koszt pakietu 4 lekcje to 300zł</p>\r\n<p>Jak dowodzą najnowsze badania naukowe, granie na instrumencie rozwija mózg, zapobiega chorobie Alzhaimera i poprawia zdolność manualne.</p>\r\n<p>Lekcje prowadzone są w przyjaznej, rodzinnej atmosferze. Nauczyciele z pasją i radością przekazują wiedze. Bez ocen i egzaminów. Na zajęciach mamy dużo utworów do grania w duecie z nauczycielem, wiec nie są to żmudne ćwiczenia techniczne, lecz wspólne tworzenie muzyki. Lekcje są pełne radości i satysfakcji z rozwoju własnych umiejętności.</p>\r\n<p>Zajęcia online są dostępne z uwzględnieniem występujących różnic czasu. Zajęcia przeznaczone są zarówno dla osób dorosłych 50+ początkującyc,h jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>', '/images/oferta-ikony/senior.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `common_desc`
--

CREATE TABLE `common_desc` (
  `id` int(10) UNSIGNED NOT NULL,
  `common_desc` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `common_desc`
--

INSERT INTO `common_desc` (`id`, `common_desc`) VALUES
(1, '<p>Zapisy i informacje 883 489 184</p>'),
(2, '<p><b>ZAPISZ SIĘ JUŻ TERAZ!</p><p>Liczba miejsc ograniczona. Zacznij grać i spełnij marzenia. Zapisy i informacje 883 489 184</b></p><p><b>Chcesz mieć pewność? Wypróbuj pakiet startowy – 4 lekcje, aby przekonać się czy to jest najlepszy nauczyciel dla Ciebie!</b></p><p>Koszt pakietu 4 lekcje to 300zł.</p><p>Lekcje prowadzimy w secesyjnej kamienicy w centrum Warszawy, a teraz także online – zajęcia dostępne w całej Polsce oraz na świecie. Zajęcia online są dostępne z uwzględnieniem występujących różnic czasu.</p>'),
(3, '<p><b>ZAPISZ SWOJE DZIECKO JUŻ TERAZ!<br>Liczba miejsc ograniczona. Niech Twoje dziecko zacznie grać i spełni marzenia. Zapisy i informacje 883 489 184</b></p><p><b>Chcesz mieć gwarancje? Wypróbuj pakiet startowy – 4 lekcje, aby przekonać się czy to jest najlepszy nauczyciel dla Twojego dziecka!</b></p><p>Koszt pakietu 4 lekcje to 300zł</p>');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_name_id` int(10) UNSIGNED NOT NULL,
  `long_desc` varchar(5000) DEFAULT NULL,
  `short_desc` varchar(500) DEFAULT NULL,
  `common_desc_id` int(10) UNSIGNED DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `course_type_id` int(10) UNSIGNED DEFAULT NULL,
  `img_thumbnail` varchar(255) NOT NULL,
  `movie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name_id`, `long_desc`, `short_desc`, `common_desc_id`, `img`, `course_type_id`, `img_thumbnail`, `movie`) VALUES
(1, 1, '<p>Zajęcia przeznaczone są zarówno dla dzieci początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Logorytmika to innowacyjne zajęcia łączące zajęcia logopedyczne z rytmiką. Wpływają one  na narząd artykulacyjny, sferę słuchową i słuchowo-ruchową. Celem zajęć jest harmonijne stymulowanie mowy oraz uwrażliwienie dziecka na rytm, melodię, tempo, dynamikę, barwę dźwięku. Są to cechy wspólne dla mowy i muzyki.</p>\r\n<p>Zajęcia z logorytmiki prowadzone są poprzez zabawę wykorzystują:</p>\r\n<ul>\r\n<li>ćwiczenia oddechowe</li>\r\n<li>ćwiczenia słowne</li>\r\n<li>ćwiczenia słuchowe</li>\r\n<li>ćwiczenia rytmiczne</li>\r\n<li>ćwiczenia ruchowe</li>\r\n<li>ćwiczenia rozwijające słownik dziecka</li>\r\n</ul>\r\n<p>Zajęcia są skierowane przede wszystkim do najmłodszych.</p>', '', 3, '/images/oferta/logorytmika.jpg', 1, '/images/oferta-ikony/logorytmika.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(2, 2, '<p>Zajęcia przeznaczone są zarówno dla osób dorosłych początkujących, jak też dla już śpeiwających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Kołysanki – śpiewanki to autorski program Bogny Kołodziej skierowany do mam i kobiet w ciąży, dbających o wszechstronny rozwój i bliski kontakt z dzieckiem od samego początku. W programie indywidualnych zajęć muzycznych znajduje się praca nad głosem poprzez naukę śpiewania i nucenia kołysanek oraz słuchania śpiewanek dla dzieci z różnych obszarów etnicznych świata:</p>\r\n<ul>\r\n<li>Kołysanki polskie</li>\r\n<li>Kołysanki irlandzkie</li>\r\n<li>Kołysanki włoskie</li>\r\n<li>Kołysanki afrykańskie</li>\r\n<li>Kołysanki japońskie</li>\r\n</ul>\r\n<p>Dodatkowo elementy muzykoterapii pomagają w radzeniu sobie z napięciami i stresami dnia codziennego. Ćwiczenia z instrumentami podczas słuchania wybranych fragmentów muzyki (nie tylko klasycznej) maja działanie relaksujące, wzmacniające poczucie radości oraz satysfakcji z życia, zarówno u matki jak i jej dziecka.</p>', '<p>Indywidualne lekcje śpiewu dla dorosłych</p>', 2, '/images/oferta/kolysanki.jpg', 2, '/images/oferta-ikony/kolysanki.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(3, 3, '<p>Zajęcia przeznaczone są zarówno dla dzieci początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Logopedia muzyczna to innowacyjne zajęcia łączące zajęcia logopedyczne z rytmiką. Wpływają one na narząd artykulacyjny, sferę słuchową i słuchowo-ruchową. Celem zajęć jest harmonijne stymulowanie mowy oraz uwrażliwienie dziecka na rytm, melodię, tempo, dynamikę, barwę dźwięku. Są to cechy wspólne dla mowy i muzyki.</p>\r\n<p>Zajęcia z logopedii prowadzone są poprzez zabawę i wykorzystują:</p>\r\n<ul>\r\n<li>ćwiczenia logopedyczne</li>\r\n<li>ćwiczenia oddechowe</li>\r\n<li>ćwiczenia słowne</li>\r\n<li>ćwiczenia słuchowe</li>\r\n<li>ćwiczenia rytmiczne</li>\r\n<li>ćwiczenia dużej i małej motoryki</li>\r\n<li>ćwiczenia rozwijające słownik dziecka</li>\r\n</ul>\r\n<p>Zajęcia ukierunkowane są na korygowanie wad wymowy wykorzystując w tym celu m.in. piosenki oraz specjalne ćwiczenia logopedyczne. U dziecka usprawnia się aparat mowy oraz poprawia komunikacja językowa. Dodatkową korzyścią jest rozwój małej motoryki i terapia ręki. Program jest układany indywidualnie według potrzeb dziecka. Oferujemy diagnozę oraz terapię logopedyczną, z wykorzystaniem muzyki.</p>\r\n<p>Oferujemy specjalny program poprawiający wymowę dla dzieci mieszkających poza granicami Polski. Nasi nauczyciele prowadzą zajęcia także w jezyku angielskim.</p>', '<p>Zajęcia są indywidualne i przeznaczone dla dzieci przedszkolnych i wczesnoszkolnych w wieku od 3 do 6 lat.</p>', 3, '/images/oferta/logopedia.jpg', 3, '/images/oferta-ikony/logopedia.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(4, 4, '<p>Zajęcia przeznaczone są zarówno dla dzieci początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Lekcje gry na fortepianie przeznaczone są dla dzieci od lat 5-ciu i mają na celu wychowanie melomanów, którym sztuka będzie towarzyszyła przez całe życie.</p>\r\n<p>Po stresach i trudach szkolnej codzienności granie daje ukojenie oraz niezbędny relaks. Podczas lekcji uczniowie mogą się odprężyć i zanurzyć w świecie dźwięków. Tutaj są najważniejsi, otoczeni bezcennym zaufaniem wzmacniającym poczucie bezpieczeństwa. Tutaj mogą być autentyczni - muzyka pomaga im wyrazić emocje, rozładować napięcie i stresy.</p>\r\n<p>Nowy, lepszy sposób traktowania uczniów jako ważnych osób, których słowa, myśli i emocje mają znaczenie. Podczas zajęć dzieci uczą się nie tylko grać na instrumencie, ale również rozmawiają z nauczycielem o różnych nurtujących ich problemach.</p>\r\n<p>Program dostosowywany do wieku oraz umiejętności każdego ucznia obejmuje:</p>\r\n<ul>\r\n<li>czytanie nut wg autorskiej metody Grażyny Kołodziej</li>\r\n<li>utwory solo i w duetach na 4 ręce</li>\r\n<li>muzyczne filmy</li>\r\n<li>kształcenie słuchu</li>\r\n<li>solfeż</li>\r\n<li>historia i teoria muzyki</li>\r\n<li>gry i zabawy muzyczne</li>\r\n</ul>\r\n<p>Program zawiera obszerną literaturę muzyczną, w skład której wchodzą m.in. utwory klasyczne, jazzowe, muzyką filmowa np. z bajek Disneya), etniczną, a także kolędy i pastorałki.</p>\r\n<p>Nauka obejmuje 3 etapy:</p>\r\n<ol>\r\n<li>podstawowy</li>\r\n<li>średni</li>\r\n<li>zaawansowany, z możliwością przygotowania na Uniwersytet Muzyczny lub na konkursy pianistyczne.</li>\r\n</ol>\r\n<p>Dodatkową korzyścią są organizowane cykliczne warsztaty i lekcje mistrzowskie, dzięki prężnie działającej współpracy międzynarodowej Konwersatorium Muzycznego z nauczycielami fortepianu z różnych krajów - m.in. z Niemiec, Wielkiej Brytanii, Finlandii i USA.</p>', '<p>Indywidualne lekcje fortepianu w systemie mistrz-uczeń dla dzieci 5+</p>', 3, '/images/oferta/fortepian-dzieci.jpg', 4, '/images/oferta-ikony/fortepian-dzieci.jpg', 'https://www.youtube.com/embed/b4h8Ot88kcA?&rel=0'),
(5, 5, '<p>Zajęcia przeznaczone są zarówno dla dzieci początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Kontakt z muzyka jest ekscytująca przygodą. Nauka gry, prowadzona w naszej szkole, ma cechy innowacyjnej edukacyjnej. Nie ma ocen, egzaminów. Dzieci są najważniejsze, ich wypowiedzi, ich myśli i odczucia. Podczas zajęć panuje serdeczna, przyjacielska atmosfera życzliwości, która zapewnia poczucie bezpieczeństwa i komfortu. Dzięki temu zwiększa się samoocena i poczucie własnej skuteczności.</p>\r\n<p>Podczas zajęć uczniowie nabywają umiejętności muzycznych, a także uczą się jak najlepiej można zarządzać własnym czasem. Jak organizować obowiązki, znajdować czas na naukę, odrobienie pracy domowej, granie na instrumencie, a także czas dla siebie, na relaks.</p>\r\n<p>W programie:</p>\r\n<ul>\r\n<li>Piosenki znane i lubiane</li>\r\n<li>Muzyczne gry i zabawy z głosem</li>\r\n<li>Nauka improwizacji</li>\r\n<li>Projekcje wokalnych dzieł muzycznych (oper, oratoriów i musicali)</li>\r\n<li>Muzyczne bajki grajki</li>\r\n</ul>\r\n<p>Zajęcia rozwijają muzykalność, a także aparat i płynność mowy. Zajęcia uczą relaksacji i rozładowywania napięć z ciała. Celem lekcji śpiewu jest rozbudzenie miłość do muzyki i zwiększenie pewność siebie.</p>\r\n<p><b>NOWOŚĆ Czasami łatwiej jest zacząć śpiewać z koleżanką, szczególnie dzieciom nieśmiałym - dlatego zapraszamy na nasze najnowsze zajęcia Zespół wokalny. W kameralnych 3-4 osobowych grupach dzieci mogą spróbować swoich sił w bezpiecznej, przyjaznej atmosferze.</b></p>', '<p>Indywidualne lekcje śpiewu w systemie mistrz-uczeń dla dzieci 5+.</p>', 3, '/images/oferta/spiew-dla-dzieci.jpg', 5, '/images/oferta-ikony/spiew-dzieci.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(6, 6, '<p>Zajęcia przeznaczone są zarówno dla dzieci początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p><p>Zajęcia muzyczne rozwijają kreatywność uczniów w sprzyjającej atmosferze. Właściwymi metodami, dobieranymi przez nauczyciela do indywidualnych potrzeb ucznia, można poprawić pamięć i znacznie rozwinąć koncentrację. Cechy te są bardzo przydatne w szkole, a ponadto niezwykle istotne w dorosłym życiu – tym prywatnym i zawodowym.</p><p>Podczas lekcji uczniowie zapoznają sie z nowymi utworami, co wspiera rozwój umiejętności analitycznych, czytania ze zrozumieniem, interpretacji nut oraz szybszej oceny materiału. Jak pokonać napotkane trudności? Jak dostrzegać podobieństwa w utworze muzycznym? Jak interpretować nieznane elementy muzyczne? Lekcje muzyki pomagają uczniom doskonalić umiejętność logicznego myślenia.</p>\r\n<ul>\r\n  <li>czytanie nut</li>\r\n  <li>muzyczne filmy</li>\r\n  <li>kształcenie słuchu</li>\r\n  <li>solfeż</li>\r\n  <li>historia i teoria muzyki</li>\r\n  <li>gry i zabawy muzyczne</li>\r\n</ul>               \r\n<p>Program zawiera obszerną literaturę muzyczną, w skład której wchodzą m.in. utwory klasyczne, jazzowe, muzyką filmowa np. z bajek Disneya), etniczną, a także kolędy i pastorałki.</p><p>W programie zajęć utwory solowe, a także duety - utwory z towarzyszeniem drugiej gitary</p><p>W szkole posiadamy gitarę, więc na lekcje nie trzeba przynosić własnej – jest to komfortowe rozwiązanie. Przez pierwszy miesiąc próbny nie trzeba posiadać w domu instrumentu.</p>', '<p>Indywidualne lekcje gry na gitarze klasycznej w systemie mistrz-uczeń dla dzieci 5+.</p>', 2, '/images/oferta/gitara-dla-dzieci.jpg', 6, '/images/oferta-ikony/gitara-dzieci.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(7, 7, '<p>Zajęcia przeznaczone są zarówno dla dzieci początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Zajęcia wzmacniają poczucie własnej wartości. Dzieci w bezpieczniej i sprzyjającej nauce atmosferze czerpią radość i przyjemność z muzyki. Wspólne muzykowanie buduje bliską relację z nauczycielem, bo muzyka może łączy ludzi i tworzy relację partnerską.</p>\r\n<p>Granie na instrumentach w duetach (początkowo a nauczycielem, a później razem z innymi uczniami) uczy współpracy, która jest niezbędna w dorosłym życiu. Uczy również zadaniowości, pracy w grupie, wspólnego poszukiwania najlepszych rozwiązań, słuchania i rozumienia innych.</p>\r\n<p>Poznając nowe utwory, uczniowie uczą się, jak poszerzać umiejętności i pokonywać przeszkody. Jak szukać odpowiednich i skutecznych metod rozwiązywania trudnych zadań. Nabywają determinację i wytrwałość, nie poddają się w sytuacjach kryzysowych, mają odwagę, by zmierzać się z problemami i poszukiwać rozwiązać. Uczą się wytrwałości w dążeniu do doskonałości.</p>\r\n<p>Program dostosowywany do wieku oraz umiejętności każdego ucznia obejmuje:</p>\r\n<ul>\r\n<li>czytanie nut</li>\r\n<li>muzyczne filmy</li>\r\n<li>kształcenie słuchu</li>\r\n<li>solfeż</li>\r\n<li>historia i teoria muzyki</li>\r\n<li>gry i zabawy muzyczne</li>\r\n</ul>\r\n<p>Program zawiera obszerną literaturę muzyczną, w skład której wchodzą m.in. utwory klasyczne, jazzowe, muzyką filmowa np. z bajek Disneya), etniczną, a także kolędy i pastorałki.</p>\r\n<p>W programie zajęć utwory solowe, a także duety - utwory z towarzyszeniem drugiej wiolonczeli lub fortepianu</p>\r\n<p>W szkole posiadamy specjalną dla dzieci małą wiolonczelę, więc na lekcje nie trzeba przynosić własnego – jest to komfortowe rozwiązanie. Przez pierwszy miesiąc próbny nie trzeba posiadać w domu instrumentu.</p>', '<p>Indywidualne lekcje gry na wiolonczeli w systemie mistrz-uczeń dla dzieci 5+.</p>', 2, '/images/oferta/wiolonczela-dzieci.jpg', 7, '/images/oferta-ikony/wiola-dzieci.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(8, 8, '<p>Zajęcia przeznaczone są zarówno dla dzieci początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>W ekscytującej atmosferze dzieci zapoznają się z nowymi dźwiękami i utworami muzycznymi, co wspiera rozwijaniu się wyobraźni. Nauczyciele pilnują, aby wzmacniać poczucie wartości uczniów, poprzez okazywanie im szacunku.</p>\r\n<p>Gra na instrumencie to międzynarodowy język wyrażania emocji i myśli, czasem niemożliwych do opowiedzenia słowami. Przy okazji jest to świetna zabawa. Poprzez muzykę uczniowie uczą się lepiej wyrażać siebie, mówić o swoich przeżyciach wewnętrznych i poznawać samych siebie.</p>\r\n<p>Program dostosowywany do wieku oraz umiejętności każdego ucznia obejmuje:</p>\r\n<ul>\r\n<li>czytanie nut</li>\r\n<li>muzyczne filmy</li>\r\n<li>kształcenie słuchu</li>\r\n<li>solfeż</li>\r\n<li>historia i teoria muzyki</li>\r\n<li>gry i zabawy muzyczne</li>\r\n</ul>\r\n<p>Program zawiera obszerną literaturę muzyczną, w skład której wchodzą m.in. utwory klasyczne, jazzowe, muzyka filmowa np. z bajek Disneya, etniczna, a także kolędy i pastorałki. W skład literatury muzycznej wchodzą także utwory oryginalnie napisane na saksofon jak i transkrypcje utworów z innych instrumentów.</p>\r\n<p>W programie zajęć utwory solowe, a także duety - utwory z towarzyszeniem drugiego saksofonu lub fortepianu, a także nauka improwizacji.</p>\r\n<p>W szkole posiadamy saksofon, więc na lekcje nie trzeba przynosić własnego – jest to komfortowe rozwiązanie. Przez pierwszy miesiąc próbny nie trzeba posiadać w domu instrumentu.</p>', '<p>Indywidualne lekcje gry na saksofonie w systemie mistrz-uczeń dla dzieci 8+.</p>', 2, '/images/oferta/saksofon-dla-dzieci.jpg', 8, '/images/oferta-ikony/saksofon-dzieci.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(9, 9, '<p>Zajęcia przeznaczone są zarówno dla dzieci początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Indywidualne zajęcia umuzykalniające to specjalny program wprowadzając w świat dźwięków i muzyki. Zajęcia rozbudzające miłość do muzyki na całe życie, skierowane do dzieci w wieku 3-6 lat, gdy są szczególnie otwarte i chłonne na nową wiedzę. Plan zajęć dostosowywany jest do możliwości i potrzeb każdego dziecka.</p>\r\n<p>Ten autorski program Bogny Kołodziej zapewnia potężną dawkę muzyki, ruchu i zabawy, które pobudzają do rozwoju i dostarczają dużo radości. Dodatkowym zyskiem jest jednoczesne przygotowanie do rozpoczęcia w przyszłości nauki gry na wybranym instrumencie.</p><p>Program nauki muzyki i kształcenia słuchu zawiera m.in:</p>\r\n<ul>\r\n<li>Muzyczne gry i zabawy</li>\r\n<li>Śpiewanie znanych i lubianych piosenek</li>\r\n<li>Muzyczne projekcje filmowe</li>\r\n<li>Samodzielną improwizację muzyczną dzieci na pianinie i innych instrumentach</li>\r\n<li>Muzyczne bajki grajki</li>\r\n<li>Prezentację fragmentów wielkich dzieł orkiestrowych</li>\r\n<li>Mini koncerty – muzyka na żywo</li>\r\n</ul>', '<p>Indywidualne zajęcia umuzykalniające dla dzieci 3+</p>', 2, '/images/oferta/umuzykalnienie.jpg', 9, '/images/oferta-ikony/umuzykalnienie.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(10, 4, 'Zajęcia przeznaczone są zarówno dla osób dorosłych początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Wiele osób od dziecka marzyło o nauce gry na fortepianie, niestety nie miało takiej możliwości. Niespełnione marzenia z dzieciństwa często powracają po latach, a ich realizacja zapewnia wiele radości, satysfakcji i relaksu. Autorski sposób nauki czytania nut gwarantuje łatwości i szybkość nauki czytania nut.</p>\r\n<p>Program przygotowywany jest według Państwa zainteresowań, składa się m.in. z:</p>\r\n<ul>\r\n<li>utworów klasycznych</li>\r\n<li>jazz, blues, rock’n’roll</li>\r\n<li>przebojów zespołów takich jak The Beatles i Abba</li>\r\n<li>tematów z oper i baletów</li>\r\n<li>muzyki filmowej</li>\r\n<li>musicalów</li>\r\n<li>pop</li>\r\n<li>muzyki etnicznej</li>\r\n</ul>\r\n<p>Program dla dorosłych pozwala nie tylko zrealizować marzenia, ale również zarazić nimi własne dzieci. Często naukę rozpoczynają równolegle rodzice i dzieci, którzy podczas ćwiczeń przy instrumencie w domu nawzajem sobie pomagają. Taka muzyczna współpraca pozwala lepiej rozumieć własne dziecko i nawiązać z nim jeszcze bliższy kontakt, także poprzez granie z nim na 4 ręce.</p>', '<p>Indywidualne lekcje gry na fortepianie w systemie mistrz-uczeń. Posiadamy specjalny autorski program nauczania dla osób dorosłych pod podstaw.</p>', 2, '/images/oferta/fortepian-dorosli.jpg', 4, '/images/oferta-ikony/fortepian-dorosli.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(11, 5, '<p>Zajęcia przeznaczone są zarówno dla osób dorosłych początkujących, jak też dla już śpiewających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>W dzieciństwie każdy z nas śpiewał piosenki na wyjazdach, przy ognisku, podczas uroczystości szkolnych czy w chórze. Sprawiało to zawsze wiele radości i satysfakcji, z czasem jednak o tym zapomnieliśmy. Co więcej osoby dorosłe żyjące w ciągłym pośpiechu często zapominają o podstawowej czynności, jaką jest prawidłowe oddychanie. Zajęcia w klasie śpiewu pozwalają uwolnić głos, by znów poczuć się wolnym i radosnym. I na nowo odkryć swój muzyczny potencjał.</p>\r\n<p>Program przygotowywany jest według Państwa zainteresowań, składa się m.in. z:</p>\r\n<ul>\r\n<li>pieśni klasyczne</li>\r\n<li>standardy musicalowe i jazzowe</li>\r\n<li>arie i utwory klasyczne</li>\r\n<li>piosenki popularne i etniczne</li>\r\n</ul>\r\n<p>Podczas zajęć poznają Państwo technik naturalnego rezonowania i wzmacniania głosu, prawidłowego korzystania z mechanizmów oddychania oraz właściwiej emisji głosu. Zajęcia są dla osób, które pragną rozwijać się wokalnie i poprawić swoje samopoczucie poprzez pracę z głosem.</p>', '<p>Indywidualne lekcje śpiewu w systemie mistrz-uczeń. Posiadamy specjalny autorski program nauczania dla osób dorosłych pod podstaw.</p>', 2, '/images/oferta/spiew-dla-doroslych.jpg', 5, '/images/oferta-ikony/spiew-dorosli.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(12, 6, '<p>Zajęcia przeznaczone są zarówno dla osób dorosłych początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Gitara kojarzy się z płonącym kominkiem i ciepłą rodzinna atmosferą. Jej dźwięki przyjemnie budują nastrój. Jest to instrument, który łatwo ze sobą zabrać i grać w dowolnym miejscu na całym świecie. Szczególnie że wspólne śpiewanie wzmacnia przyjacielskie więzi i tworzy niezapomniane wspomnienia.</p>\r\n<p>Program przygotowywany jest według Państwa zainteresowań, składa się m.in. z:</p>\r\n<ul>\r\n<li>utworów klasycznych</li>\r\n<li>jazzu, blues, rock’n’roll</li>\r\n<li>przebojów zespołów takich jak The Beatles i Abba</li>\r\n<li>tematów z oper i baletów</li>\r\n<li>muzyki filmowej</li>\r\n<li>musicalów</li>\r\n<li>pop</li>\r\n<li>muzyki etnicznej</li>\r\n</ul>\r\n<p>Autorski sposób nauki czytania nut gwarantuje łatwości i szybkość nauki czytania nut. W programie są utwory solowe, a także w duecie – na dwie gitary. Dodatkowo lekcje są wzbogacone o ciekawostki z historii muzyki.</p>\r\n<p>Dla zaawansowanych nauka gry na gitarze elektrycznej.</p>\r\n<p>W szkole posiadamy gitarę, więc na lekcje nie trzeba przynosić własnej – jest to komfortowe rozwiązanie. Przez pierwszy miesiąc nie trzeba posiadać w domu instrumentu.</p>', '<p>Indywidualne lekcje gry na gitarze klasycznej w systemie mistrz-uczeń. Posiadamy specjalny autorski program nauczania dla osób dorosłych pod podstaw.</p>', 2, '/images/oferta/gitara-dla-doroslych.jpg', 6, '/images/oferta-ikony/gitara-dorosli.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(13, 7, '<p>Zajęcia przeznaczone są zarówno dla osób dorosłych początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Ciepłe i śpiewne brzmienie instrumentu zapewnia wyjątkową, komfortową atmosferę. Jest to wyjątkowy instrument, do którego można się przytulić. W tym zabieganym świecie daje poczucie bezpieczeństwa i uspokaja. Można przy nim znaleźć chwile dla siebie, tylko dla siebie.</p>\r\n<p>Program przygotowywany jest według Państwa zainteresowań, składa się m.in. z:</p>\r\n<ul>\r\n<li>utworów klasycznych</li>\r\n<li>jazzu, blues, rock’n’roll</li>\r\n<li>przebojów zespołów takich jak The Beatles i Abba</li>\r\n<li>tematów z oper i baletów</li>\r\n<li>muzyki filmowej</li>\r\n<li>musicalów</li>\r\n<li>pop</li>\r\n<li>muzyki etnicznej</li>\r\n</ul>\r\n<p>Autorski sposób nauki czytania nut gwarantuje łatwości i szybkość nauki czytania nut. W programie zajęć utwory solowe, a także duety - utwory z towarzyszeniem drugiej wiolonczeli lub fortepianu</p>\r\n<p>W szkole posiadamy wiolonczelę, więc na lekcje nie trzeba przynosić własnej – jest to komfortowe rozwiązanie. Przez pierwszy miesiąc próbny nie trzeba posiadać w domu instrumentu.</p>', '<p>Indywidualne lekcje gry na wiolonczeli w systemie mistrz-uczeń. Posiadamy specjalny autorski program nauczania dla osób dorosłych pod podstaw.</p>', 2, '/images/oferta/wiolonczela-dorosli.jpg', 7, '/images/oferta-ikony/wiola-dorosli.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(14, 8, '<p>Zajęcia przeznaczone są zarówno dla osób dorosłych początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Magiczny, błyszczący, pełen siły - saksofon uwodzi i oczarowuje. Jego dźwięki wyrażają uczucia, których nie sposób ubrać w słowa. Posiada potężne możliwości brzmienia i wprowadza wyjątkowy nastrój podczas spotkań w gronie najbliższych.</p>\r\n<p>Program przygotowywany jest według Państwa zainteresowań, składa się m.in. z:</p>\r\n<ul>\r\n<li>utworów klasycznych</li>\r\n<li>jazzu, blues, rock’n’roll</li>\r\n<li>przebojów zespołów takich jak The Beatles i Abba</li>\r\n<li>tematów z oper i baletów</li>\r\n<li>muzyki filmowej</li>\r\n<li>musicalów</li>\r\n<li>pop</li>\r\n<li>muzyki etnicznej</li>\r\n</ul>\r\n<p>Autorski sposób nauki czytania nut gwarantuje łatwości i szybkość nauki czytania nut. W programie zajęć utwory solowe, a także duety - utwory z towarzyszeniem drugiego saksofonu lub fortepianu, a także nauka improwizacji. Dodatkowo lekcje są wzbogacone o ciekawostki z historii muzyki.</p>\r\n<p>W szkole posiadamy saksofon, więc na lekcje nie trzeba przynosić własnego – jest to komfortowe rozwiązanie. Przez pierwszy miesiąc próbny nie trzeba posiadać w domu instrumentu.</p>', '<p>Indywidualne lekcje gry na saksofonie w systemie mistrz-uczeń. Posiadamy specjalny autorski program nauczania dla osób dorosłych pod podstaw.</p>', 2, '/images/oferta/saksofon-dla-doroslych.jpg', 8, '/images/oferta-ikony/saksofon-dorosli.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(15, 10, '<p>Lekcje śpiewu w kameralnych grupach. Posiadamy specjalny autorski program nauczania dla osób dorosłych pod podstaw.</p>\r\n<p>W dzieciństwie każdy z nas śpiewał piosenki na wyjazdach, przy ognisku, podczas uroczystości szkolnych czy w chórze. Sprawiało to zawsze wiele radości i satysfakcji, z czasem jednak o tym zapomnieliśmy. Co więcej osoby dorosłe żyjące w ciągłym pośpiechu często zapominają o podstawowej czynności, jaką jest prawidłowe oddychanie. Zajęcia w klasie śpiewu pozwalają uwolnić głos, by znów poczuć się wolnym i radosnym. I na nowo odkryć swój muzyczny potencjał.</p>\r\n<p>Prowadzimy zajęcia w następujących grupach tematycznych:</p>\r\n<ul>\r\n<li>Chór klasyczny</li>\r\n<li>Zespół jazzowy - z utworami musicalowymi</li>\r\n<li>Chór gospel</li>\r\n<li>Music band – piosenki ogniskowe, szanty, szlagiery przy akompaniamencie gitary</li>\r\n</ul>\r\n<p>Podczas zajęć poznają Państwo technik naturalnego rezonowania i wzmacniania głosu, prawidłowego korzystania z mechanizmów oddychania oraz właściwiej emisji głosu. Zajęcia są dla osób, które pragną rozwijać się wokalnie i poprawić swoje samopoczucie poprzez pracę z głosem.Wspólne śpiewanie rozwija poczucie więzi i wzmacnia kontakty międzyludzkie.</p>\r\n<p>Zajęcia są prowadzone w grupach dla dzieci i w oddzielnych grupach dla dorosłych</p>', '<p>NOWOŚĆ! ZAPISZ SIĘ JUŻ TERAZ NA PAŹDZIERNIK 2019</p><p>Liczba miejsc ograniczona. Zacznij śpiewać i spełnij marzenia.</p>', 1, '/images/oferta/zespol.jpg', 5, '/images/oferta-ikony/zespol.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(16, 11, '<p>Zajęcia przeznaczone są zarówno dla osób dorosłych początkujących, jak też dla zaawansowanych. Materiały do nauki – przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Od czasów starożytnego Rzymu sztuka oratorska była wysoko ceniona. Mówca musiał wykazać się nie tylko znakomitą dykcją, ale również wiedzą jak skutecznie przekazać swoje przesłanie, aby być zrozumianym i zapamiętanym. W dzisiejszych czasach mówcy, którzy porywają swoją charyzmą opanowali do perfekcji pracę nad oddechem i prawidłową emisją głosu w mowie.</p>\r\n<p>Program przygotowywany jest według Państwa zainteresowań i przeznaczony jest dla:</p>\r\n<ul>\r\n<li>aktorów</li>\r\n<li>dziennikarzy telewizyjnych</li>\r\n<li>polityków</li>\r\n<li>biznesmenów</li>\r\n<li>obcokrajowców</li>\r\n</ul>\r\n<p>Poprzez zajęcia logopedyczno-muzyczne można poprawić wymowę i odkryć naturalny potencjał drzemiącego w każdym mówcy. Dodatkowo zajęcia uczą prawidłowych technik relaksacyjnych, które usprawniają i ułatwiają codzienną prace głosem w świetle kamer i mikrofonów, a także drodze własnego samodoskonalenia.</p>', '<p>Indywidualne lekcje retoryki w systemie mistrz-uczeń. Program jest przeznaczony jest dla osób dorosłych.</p>', 2, '/images/oferta/retoryka.jpg', 10, '/images/oferta-ikony/retoryka.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(17, 12, '<p>Zajęcia przeznaczone są zarówno dla osób dorosłych początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>W dzisiejszym świecie cały czas się spieszymy. Gonią nas terminy, projekty i zadania do zrealizowania. Uczniowie mają kolejne sprawdziany, ważne egzaminy i cały czas nowe rzeczy do nauczenia się i zapamiętania. Dorośli mają pracę, a w niej zadania i cele do osiągnięcia w wyznaczonym terminie. Powszechny jest brak czasu dla rodziny, przyjaciół i samego siebie.</p>\r\n<p>W pogoni za sukcesem, zapominamy o najważniejszym – o Sobie. Czasami trzeba się zatrzymać. Musicfulness to program, który pomaga odzyskać równowagę i poczucie harmonii.</p>\r\n<p>Program obejmuje:</p>\r\n<ul>\r\n<li>techniki relaksacyjne</li>\r\n<li>ćwiczenia oddechowe</li>\r\n<li>elementy muzykoterapii</li>\r\n<li>naukę słuchania i koncentracji</li>\r\n<li>naukę skupienia się na tu i teraz</li>\r\n</ul>\r\n<p>To wyjątkowy program pozwalający zwolnić, zatrzymać się i odpocząć. To czas, w którym można bezpiecznie wyciszyć się i zregenerować. Muzyka pozwala zredukować stres i poprawić jakość swojego życia.</p>\r\n<p>Program Musicfulness nawiązuje do Mindfulness, wykorzystując muzykę i jej dobroczynne oddziaływanie na ciało i umysł człowieka.</p>', '<p>Zajęcia są indywidualne i przeznaczone dla młodzieży oraz dorosłych.</p>', 2, '/images/oferta/musicfulness.jpg', 11, '/images/oferta-ikony/musicfulness.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(18, 13, '<p>Materiały do nauki – przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n<p>Meloman to znawca muzyki. Potrafi rozpoznać dobre wykonanie, zwrócić uwagę na istotne elementy dzieła muzycznego, a także zaskoczyć ciekawą anegdotą o kompozytorze. Sala koncertowa nie ma przed nim tajemnic. Wie, kiedy należy klaskać i na jakie koncerty warto się wybrać. Jest osobą, która zna się na sztuce.</p>\r\n<p>Program przygotowywany jest według Państwa zainteresowań, składa się m.in. z:</p>\r\n<ul>\r\n<li>historia muzyki</li>\r\n<li>literatura muzyczna</li>\r\n<li>życie i twórczość wielkich kompozytorów</li>\r\n<li>światowy kanon arcydzieł muzycznych</li>\r\n<li>oglądanie i analizowanie wybranych fragmentów z oper i baletów</li>\r\n<li>zasady muzyki</li>\r\n</ul>', '<p>Indywidualne zajęcia dla osób dorosłych, chcących rozwijać swoją wiedzę muzyczna bez konieczności nauki gry na instrumencie.</p><p>Chcesz mieć pewność? Wypróbuj pakiet startowy – 4 lekcje, aby przekonać się czy to jest najlepszy nauczyciel dla Ciebie!</p>', 2, '/images/oferta/meloman.jpg', 12, '/images/oferta-ikony/meloman.jpg', 'https://www.youtube.com/embed/r6ThuFthhsE?&rel=0'),
(20, 15, '						<p>Lekcje prowadzimy w secesyjnej kamienicy w centrum Warszawy, a teraz także online – zajęcia dostępne w całej Polsce oraz na świecie.</p>\r\n						<p>Zajęcia online są dostępne z uwzględnieniem występujących różnic czasu. Materiały do nauki – przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>\r\n                            <p>Tworzenie muzyki to kreatywna sztuka wyobraźni. Daje niepowtarzalną możliwość aby poprzez sztukę, jaką jest muzyka wyrazić bogactwo własnego wewnętrznego świata, pełnego różnych emocji i poszukiwań. Podczas zajęć jest okazja do wykształcenia własnego punktu widzenia na temat dzieł wybitnych kompozytorów, stosowanych przez nich środków technicznych oraz materiału dźwiękowego.</p>\r\n                            <p>Żeby odnaleźć swój styl kompozycji trzeba znać cały wachlarz możliwości i móc odkryć swoją indywidualność w twórczości. W programie zajęć nauka komponowania w różnych stylach:</p>\r\n                            <ul>\r\n                                <li>barok</li>\r\n                                <li>klasycyzm</li>\r\n                                <li>romantyzm</li>\r\n                                <li>techniki dodekafoniczne</li>\r\n                                <li>aleatoryzm</li>\r\n                                <li>muzyka elektroakustyczna</li>\r\n                                <li>muzyka filmowa</li>\r\n                                <li>nurt minimal music</li>\r\n                            </ul>\r\n                            <p>W trakcje zajęć wykorzystywane są nowoczesne techniki komputerowe - programy do edycji nut oraz tworzenia muzyki. Praca nad własnymi kompozycjami odbywa się tradycyjnie na papierze nutowym, a także na laptopie lub tablecie.</p>\r\n', '                            <p>Indywidualne lekcje w klasie kompozycji w systemie mistrz-uczeń. Program jest przeznaczony dla osób dorosłych posiadających podstawową wiedzę na temat muzyki oraz znających główne zasady notacji muzycznej.</p>\r\n', 3, '/images/oferta/kompozycja.jpg', 13, '/images/oferta-ikony/kompozycja.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_name`
--

CREATE TABLE `course_name` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_name`
--

INSERT INTO `course_name` (`id`, `course_name`) VALUES
(1, 'Logorytmika'),
(2, 'Kołysanki-śpiewanki'),
(3, 'Logopedia muzyczna'),
(4, 'Klasa fortepianu'),
(5, 'Klasa śpiewu'),
(6, 'Klasa gitary'),
(7, 'Klasa wiolonczeli'),
(8, 'Klasa saksofonu'),
(9, 'Pierwsze kroki'),
(10, 'Chór i Zespół wokalny'),
(11, 'Wystąpienia publiczne'),
(12, 'Program Musicfulness'),
(13, 'Program Meloman'),
(14, 'Dyrektor kreatywny'),
(15, 'Klasa kompozycji');

-- --------------------------------------------------------

--
-- Table structure for table `course_type`
--

CREATE TABLE `course_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_type`
--

INSERT INTO `course_type` (`id`, `type`) VALUES
(1, 'Logorytmika'),
(2, 'Kołysanki'),
(3, 'Logopedia'),
(4, 'Fortepian'),
(5, 'Śpiew'),
(6, 'Gitara'),
(7, 'Wiolonczela'),
(8, 'Saksofon'),
(9, 'Pierwsze kroki'),
(10, 'Wystąpienia publiczne'),
(11, 'Musicfulness'),
(12, 'Meloman'),
(13, 'kompozycja');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `course_name_id` int(10) UNSIGNED DEFAULT NULL,
  `long_desc` varchar(5000) DEFAULT NULL,
  `img_thumbnail` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `course_name_id`, `long_desc`, `img_thumbnail`, `img`) VALUES
(1, 'prof. Grażyna Kołodziej', 4, '<p>Absolwentka Akademii Muzycznej w Łodzi w klasie fortepianu prof. Marii Wiłkomirskiej. Doświadczenia z pracy w kilku państwowych szkołach muzycznych zaowocowało założeniem w 1996 roku Konwersatorium Muzycznego w Warszawie. Specjalizuje się w nauczaniu młodzieży i dorosłych własną autorską metodą i programem. Przykłada dużą uwagę do szczegółów zarówno muzycznych jak i technicznych, aby osiągnąć swobodę i satysfakcję. Uznaje pasję za drogocenną wartość, której należy pozwolić zakwitnąć we własnym tempie.</p>', '/images/user-images/grazyna-square.jpg', '/images/user-images/grazyna.jpg'),
(2, 'Dr Julian Kołodziej', 14, '<p>Specjalista w zakresie planowania strategicznego, zarządzania projektami oraz zintegrowanych inwestycji terytorialnych. W wiodącej firmie konsultingowej prowadził projekty doradcze z zakresu rozwoju społeczno-gospodarczego i rewitalizacji dla podmiotów administracji samorządowej, instytucji publicznych oraz sektora biznesu. Kierował projektem badawczo-wdrożeniowym dot. rewitalizacji w Instytucie Historii Nauki PAN.</p>', '/images/user-images/julian-square.jpg', '/images/user-images/julian.jpg'),
(3, 'Bogna Kołodziej', 4, '<p>Specjalizuje się w edukacji najmłodszych, uczy gry na fortepianie dzieci i młodzież w wieku od 3 do 15 lat. Ukończyła Uniwersytet Warszawskie i odbyła praktyki na Akademii Muzycznej w Warszawie. W ciągu 10 lat pracy w Konwersatorium Muzycznym wykształciła ponad 100 dzieci. Zapewnia atmosferę zabawy na lekcji i zamienia żmudną edukację w ekscytującą przygodę z nauką. Jest kreatywnym nauczycielem, który konstruuje własne pomoce dydaktyczne. Istotny jest dla niej kontakt z dzieckiem oparty na szacunku i zaufaniu.</p>', '/images/user-images/bogna-square.jpg', '/images/user-images/bogna.jpg'),
(4, 'Joanna Banaszczyk', 7, '<p>Absolwentka Akademii Muzycznej im. I.J. Paderewskiego w Poznaniu. Brała udział w międzynarodowych kursach solistycznych i akademiach orkiestrowych. Jako członkini I, CULTURE Orchestra wystąpiła w takich salach koncertowych jak Concertgebouw w Amsterdamie, BOZAR w Brukseli, Elbphilharmonie w Hamburgu czy Opera Berlioz w Montpellier. Największą satysfakcję czerpie ze wspólnego grania z innymi muzykami. Zapewnia przyjazną atmosferę podczas zajęć. Zależy jej na pogłębieniu u ucznia miłości do muzyki i rozbudzeniu jego zainteresowania wiolonczelą. Prowadzi klasę wiolonczeli dla dzieci i dla dorosłych.</p>', '/images/user-images/joanna-square.jpg', '/images/user-images/joanna.jpg'),
(5, 'Filip Zaborowski', 4, '<p>Absolwent Uniwersytetu Muzycznego Fryderyka Chopina w Warszawie. Swoje umiejętności pianistyczne doskonalił także na Uniwersytecie Muzycznym w Barcelonie, Hiszpanii. Solista, kameralista oraz reżyser dźwięku. Laureat konkursów pianistycznych, m.in. w Paryżu i Berlinie. Stale się doskonali i bierze udział w międzynarodowych kursach mistrzowskich. W nauczaniu jest cierpliwy i opanowany, przekazuje istotę muzykowania w miłej, pozytywnej atmosferze oraz przykłada wagę do kreatywnego urozmaicania lekcji. Prowadzi klasę fortepianu dla dzieci i dorosłych.</p>', '/images/user-images/filip-square.jpg', '/images/user-images/filip.jpg'),
(6, 'Jakub Muras', 8, '<p>Absolwent Uniwersytetu Muzycznego MUK w Wiedniu. Związany z Uniwersytetem Muzycznym&nbsp;im. F. Chopina w Warszawie. Regularnie bierze udział w licznych koncertach, festiwalach, konkursach oraz seminariach o zasięgu krajowym jak i międzynarodowym w charakterze solisty, a także z orkiestrami symfonicznymi jak o kameralisty. Ceni wszechstronny rozwój podczas kursów mistrzowskich. Założyciel kwartetu saksofonowego The Whoop Group oraz wielokrotny stypendysta Ministra Kultury i Edukacji Artystycznej. Niezwykle energiczny i pozytywnie nastawiony do świata. Potrafi rozbudzić miłość do muzyki i chęć do pracy.</p>', '/images/user-images/jakub-square.jpg', '/images/user-images/jakub.jpg'),
(7, 'Kamila Piątkowska', 7, '<p>Absolwentka Uniwersytetu Muzycznego w Warszawie oraz  Royal Irish Academy of Music w Dublinie. Grała z orkiestrą pod batutą  m.in. Krzysztofa Pendereckiego, Jerzego Maksymiuka. Solistka podczas trasy koncertowej Rock meets classic 2019 z udziałem legend światowego rocka - Deep Purple, Thin Lizzy, Sweet, Kevin Cronin, Mike Reno, Anna Maria Kaufmann, a także na Open’er Festival. Koncertuje w Polsce, Europie i Azji. Jest pełna pasji i z radością przekazuje wiedzę muzyczną. Wspiera w postępach i pomaga pokonać trudności techniczne. Zajęcia prowadzi ciekawie i skutecznie.</p>', '/images/user-images/kamilaw-square.jpg', '/images/user-images/kamilaw.jpg'),
(8, 'Karolina Nawrocka', 5, '<p>Absolwentka Akademii Muzycznej Łodzi. Bierze udział w wielu wydarzeniach artystycznych, koncertuje w Polsce na scenach teatralnych, a także w Filharmonii. Podczas zajęć szczególną uwagę zwraca na pozbywanie się napięć z organizmu, naturalną technikę wokalną, dykcję i interpretację. W połączeniu z pozytywnym myśleniem, wiarą we własne możliwości i przyjacielską atmosferą na zajęciach zachęca do rozwijania swoich umiejętności wokalnych. Cechuje ją cierpliwość i profesjonalne, indywidualne podejście do każdego ucznia.</p>', '/images/user-images/karolina-square.jpg', '/images/user-images/karolina.jpg'),
(9, 'Anita Szwacińska', 5, '<p>Absolwentka Uniwersytetu Muzycznego w Warszawie. Fascynuje ją kultura śródziemnomorska, w szczególności obszar Italii i włoskie pieśni. Jest kreatywna i pełna pasji. Podczas zajęć pomaga uwolnić głos, nawet nieśmiałym osobom. Pracy nauczyciela poświęca się z oddaniem i zachęca swoich uczniów do ciągłego rozwoju. Jest życzliwa i wspierająca w podróży po muzycznym świecie.</p>', '/images/user-images/anita-square.jpg', '/images/user-images/anita.jpg'),
(10, 'Alicja Niździńska', 5, '<p>Absolwentka Logopedii ogólnej i klinicznej na wydziale Lekarskim Warszawskiego Uniwersytetu Medycznego. Absolwentka wydziału wokalno - estradowego w Warszawie. Zdobywczyni nagród w konkursach wokalnych. Wielokrotnie współpracowała i występowała z różnymi zespołami muzycznymi, w których śpiewała, grała na pianinie lub dyrygowała. Autorka projektu społecznego "Heart Melodies - Muzyką do serc". Od dziecka muzyka jest jej pasją i sprawia jej radość, którą pragnie dzielić się z innymi i czynić z niej pomocną wartość. W praktyce zawodowej wykorzystuje swoje muzyczne oraz logopedyczne umiejętności. Pracuje z najmłodszymi dziećmi, mającymi 1,5 roku oraz z dorosłymi. Prowadzi zajęcia logopedyczne, logorytmiczne oraz klasę śpiewu.</p>', '/images/user-images/ala-square.jpg', '/images/user-images/ala.jpg'),
(11, 'Maciej Włodowski', 5, '<p>Absolwent Akademii Muzycznej w Łodzi. Obecnie związany z Uniwersytetem Muzycznym Fryderyka Chopina w Warszawie. Uczestniczy w kursach wokalnych w Polsce oraz na świecie. Podczas zajęć szczególną uwagę zwraca na pozbywanie się napięć z organizmu, naturalną technikę wokalną, dykcję i interpretację. Jest kreatywny i z pasją pokazuje świat muzyki. Sympatyczną atmosferą na zajęciach zachęca do rozwijania swoich umiejętności wokalnych. Cechuje go cierpliwość i profesjonalne, indywidualne podejście do każdego ucznia.</p>', '/images/user-images/maciej-square.jpg', '/images/user-images/maciej.jpg'),
(12, 'Katarzyna Stasiewicz', 7, '<p>Absolwentka Uniwersytetu Muzycznego Fryderyka Chopina w Warszawie. Laureatka wielu konkursów ogólnopolskich i międzynarodowych w zakresie gry solowej i kameralnej. Odbyła liczne kursy solowe u wielu wybitnych artystów. Prowadzi aktywną działalność koncertową, a jej grę cechuje duża muzykalność i wrażliwość – poza dojrzałymi interpretacjami poszukuje możliwie najciekawszego brzmienia instrumentu. Występowała w Polsce, a także m.in. w Szwajcarii, Włoszech, Austrii, Danii, Kanadzie, Korei Południowej oraz na Węgrzech. Podczas swoich zajęć kreatynie wprowadza w świat muzyki dzieci oraz osoby dorosłe i pokazuje im fascynujący świat wiolonczeli.</p>', '/images/user-images/kasia-square.jpg', '/images/user-images/kasia.jpg'),
(13, 'Daniel Peszko', 6, '<p>Związany z Uniwersytetem Muzycznym im. F. Chopina w Warszawie. Brał udział w ogólnopolskich kursach mistrzowskich oraz w warsztatach muzycznych. Koncertuje w Polsce jako solista, a także gra w zespołach kameralnych – duet, trio, kwartet oraz orkiestra gitarowa. Nagrywa płyty CD, na swym koncie ma m.in. płytę z kwartetem. Jest odważny, lubi podejmować nowe wyzwania. Cechuje go innowacyjność i pomysłowość podczas prowadzonych lekcji.</p>', '/images/user-images/daniel-square.jpg', '/images/user-images/daniel.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `emp_positions`
--

CREATE TABLE `emp_positions` (
  `employee_id` int(10) UNSIGNED NOT NULL,
  `positions_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_positions`
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
-- Table structure for table `emp_specialization`
--

CREATE TABLE `emp_specialization` (
  `employee_id` int(10) UNSIGNED NOT NULL,
  `specialization_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_specialization`
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
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `id` int(10) UNSIGNED NOT NULL,
  `courses_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer`
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
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`) VALUES
(1, 'Założycielka Konwersatorium Muzycznego'),
(2, 'Specjalista w zakresie planowania strategicznego'),
(3, 'Dyrektor'),
(4, 'Nauczyciel');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`id`, `name`) VALUES
(1, 'wiolonczelista'),
(2, 'pianista'),
(3, 'saksofonista'),
(4, 'wokalistka'),
(5, 'logopeda'),
(6, 'wokalista'),
(7, 'gitarzysta'),
(8, 'pianistka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `common_desc_id` (`common_desc_id`);

--
-- Indexes for table `common_desc`
--
ALTER TABLE `common_desc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `common_desc` (`common_desc_id`),
  ADD KEY `course_type_id` (`course_type_id`);

--
-- Indexes for table `course_name`
--
ALTER TABLE `course_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_type`
--
ALTER TABLE `course_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_name_id` (`course_name_id`);

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
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `common_desc`
--
ALTER TABLE `common_desc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `course_name`
--
ALTER TABLE `course_name`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `course_type`
--
ALTER TABLE `course_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`common_desc_id`) REFERENCES `common_desc` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`common_desc_id`) REFERENCES `common_desc` (`id`),
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`course_type_id`) REFERENCES `course_type` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`course_name_id`) REFERENCES `course_name` (`id`);

--
-- Constraints for table `emp_positions`
--
ALTER TABLE `emp_positions`
  ADD CONSTRAINT `emp_positions_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `emp_positions_ibfk_2` FOREIGN KEY (`positions_id`) REFERENCES `positions` (`id`);

--
-- Constraints for table `emp_specialization`
--
ALTER TABLE `emp_specialization`
  ADD CONSTRAINT `emp_specialization_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `emp_specialization_ibfk_2` FOREIGN KEY (`specialization_id`) REFERENCES `specialization` (`id`);

--
-- Constraints for table `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `offer_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
