-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Cze 2020, 18:20
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
  `category` varchar(255) NOT NULL,
  `common_desc_id` int(10) UNSIGNED DEFAULT NULL,
  `long_desc` varchar(2000) DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`id`, `category`, `common_desc_id`, `long_desc`, `img`) VALUES
(1, 'dla dzieci', 2, '<p>Wierzymy, że aby edukacja była skuteczna, potrzebny jest dobry kontakt z nauczycielem. Bez ocen i egzaminów. Pakiet startowy to 4 lekcje, aby spróbować pracy z wybranym nauczycielem. Poznać jego metody pracy, dynamikę zajęć oraz zobaczyć czy to jest najlepszy nauczyciel dla dziecka. Potem jest możliwość spróbować pracy z drugim nauczycielem. Uważnie słuchamy dziecka, a dla rodziców jest to sprawdzenie czy dziecko chętnie uczestniczy w zajęciach, czy cieszy się na myśl o lekcjach, czy wolałoby mieć dłuższe lekcje.</p>\r\n<p>Koszt pakietu 4 lekcje to 300zł</p>\r\n<p>W naszej szkole rozpoznając naukę stacjonarnie na początku nie trzeba mieć własnego instrumentu. Podczas pierwszego spotkania doradzamy wybór instrumentu. Dzieci wędrują po szkole i próbują grać na różnych, sprawdzamy co je zachwyci i zainteresuje.</p>\r\n<p>Zajęcia online są dostępne z uwzględnieniem występujących różnic czasu. Zajęcia przeznaczone są zarówno dla dzieci początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>', '/images/oferta-ikony/dzieci.jpg'),
(2, 'dla dorosłych', 2, '<p>Wierzymy, że aby edukacja była skuteczna, potrzebny jest dobry kontakt z nauczycielem. Bez ocen i egzaminów. Pakiet startowy to 4 lekcje, aby spróbować pracy z wybranym nauczycielem. Poznać jego metody pracy, dynamikę zajęć oraz zobaczyć czy to jest najlepszy nauczyciel dla Państwa. Potem jest możliwość spróbować pracy z drugim nauczycielem.</p>\r\n<p>Koszt pakietu 4 lekcje to 300zł</p>\r\n<p>Wiele osób marzyło o tym, aby grać, ale nie miało takiej możliwości. W dzisiejszym świecie cały czas się spieszymy. Gonią nas terminy, projekty i zadania do zrealizowania, kolejne sprawdziany, ważne egzaminy i cały czas nowe rzeczy do nauczenia się, zapamiętania. Stałe podnoszenie kwalifikacji to zadania i cele do osiągnięcia w wyznaczonym terminie. Powszechny jest brak czasu dla rodziny, przyjaciół i samego siebie.</p>\r\n<p>W pogoni za sukcesem, zapominamy o najważniejszym – o Sobie. Dzięki muzyce można oderwać się od codzienności i przenieść się w inny świat.</p>\r\n<p>W Konwersatorium mamy specjalne programy dla dorosłych, którzy chcą nauczyć się grać i śpiewać od podstaw, albo wrócić do instrumentu, na którym grali w dzieciństwie i mieli przerwę. Zajęcia prowadzone są w komfortowych warunkach. Nauczyciele z pasją i radością przekazują wiedze. Mamy dużo utworów do grania w duecie z nauczycielem, wiec nie są to żmudne ćwiczenia techniczne, lecz wspólne tworzenie muzyki. Bez ocen i egzaminów.</p>\r\n<p>Zajęcia online są dostępne z uwzględnieniem występujących różnic czasu. Zajęcia przeznaczone są zarówno dla osób dorosłych początkujących, jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>', '/images/oferta-ikony/dorosli.jpg'),
(3, 'dla seniorów', 2, '<p>Spełnij marzenie! Zawsze chciałeś grać? Nie było czasu? Zabrakło możliwości? Zapraszamy na nowy program nauki gry dedykowany dla osób 50+. Nasi słuchacze mają 60+, 70+ i nawet 80+ bo nigdy nie jest za późno aby rozpocząć przygodę z muzyką.</p>\r\n<p>Wierzymy, że aby edukacja była skuteczna, potrzebny jest dobry kontakt z nauczycielem. Bez ocen i egzaminów. Pakiet startowy to 4 lekcje, aby spróbować pracy z wybranym nauczycielem. Poznać jego metody pracy, dynamikę zajęć oraz zobaczyć czy to jest najlepszy nauczyciel dla Państwa. Potem jest możliwość spróbować pracy z drugim nauczycielem.</p>\r\n<p>Koszt pakietu 4 lekcje to 300zł</p>\r\n<p>Jak dowodzą najnowsze badania naukowe, granie na instrumencie rozwija mózg, zapobiega chorobie Alzhaimera i poprawia zdolność manualne.</p>\r\n<p>Lekcje prowadzone są w przyjaznej, rodzinnej atmosferze. Nauczyciele z pasją i radością przekazują wiedze. Bez ocen i egzaminów. Na zajęciach mamy dużo utworów do grania w duecie z nauczycielem, wiec nie są to żmudne ćwiczenia techniczne, lecz wspólne tworzenie muzyki. Lekcje są pełne radości i satysfakcji z rozwoju własnych umiejętności.</p>\r\n<p>Zajęcia online są dostępne z uwzględnieniem występujących różnic czasu. Zajęcia przeznaczone są zarówno dla osób dorosłych 50+ początkującyc,h jak też dla już grających i zaawansowanych. Materiały do nauki – nuty przesyłamy mejlem. Zajęcia odbywają się online indywidualnie – na żywo w uzgodnionym terminie. Lekcje są dostępne w języku polskim i angielskim.</p>', '/images/oferta-ikony/senior.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `common_desc`
--

CREATE TABLE `common_desc` (
  `id` int(10) UNSIGNED NOT NULL,
  `common_desc` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `common_desc`
--

INSERT INTO `common_desc` (`id`, `common_desc`) VALUES
(1, '<p>Zapisy i informacje 883 489 184</p>'),
(2, '<p><b>ZAPISZ SIĘ JUŻ TERAZ!</p><p>Liczba miejsc ograniczona. Zacznij grać i spełnij marzenia. Zapisy i informacje 883 489 184</b></p><p><b>Chcesz mieć pewność? Wypróbuj pakiet startowy – 4 lekcje, aby przekonać się czy to jest najlepszy nauczyciel dla Ciebie!</b></p><p>Koszt pakietu 4 lekcje to 300zł.</p><p>Lekcje prowadzimy w secesyjnej kamienicy w centrum Warszawy, a teraz także online – zajęcia dostępne w całej Polsce oraz na świecie. Zajęcia online są dostępne z uwzględnieniem występujących różnic czasu.</p>'),
(3, '<p><b>ZAPISZ SWOJE DZIECKO JUŻ TERAZ!<br>Liczba miejsc ograniczona. Niech Twoje dziecko zacznie grać i spełni marzenia. Zapisy i informacje 883 489 184</b></p><p><b>Chcesz mieć gwarancje? Wypróbuj pakiet startowy – 4 lekcje, aby przekonać się czy to jest najlepszy nauczyciel dla Twojego dziecka!</b></p><p>Koszt pakietu 4 lekcje to 300zł</p>');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `courses`
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
-- Zrzut danych tabeli `courses`
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
-- Struktura tabeli dla tabeli `course_name`
--

CREATE TABLE `course_name` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `course_name`
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
-- Struktura tabeli dla tabeli `course_type`
--

CREATE TABLE `course_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `course_type`
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
  `button` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `main_progress_heading_translation`
--

INSERT INTO `main_progress_heading_translation` (`id`, `languages_id`, `heading_3`, `heading_2`, `button`) VALUES
(1, 1, 'Efekty', 'Jakie korzyści daje muzyka?', 'Więcej'),
(2, 2, 'Effects', 'What benefits can music give you?', 'More'),
(3, 3, 'Hiệu quả', 'Âm nhạc mang lại những lợi ích gì?', 'Hơn nữa'),
(4, 4, '学习的效果', '音乐能带给你什么？', '其他');

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
(12, 4, '自尊感', '79%');

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
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `positions`
--

INSERT INTO `positions` (`id`, `name`) VALUES
(1, 'Założycielka Konwersatorium Muzycznego'),
(2, 'Specjalista w zakresie planowania strategicznego'),
(3, 'Dyrektor'),
(4, 'Nauczyciel');

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
(18, 4, 3, NULL),
(19, 4, 4, '教师');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `specialization`
--

CREATE TABLE `specialization` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `specialization`
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
-- Indexes for table `employee_translation`
--
ALTER TABLE `employee_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
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
-- AUTO_INCREMENT dla tabeli `common_desc`
--
ALTER TABLE `common_desc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT dla tabeli `course_name`
--
ALTER TABLE `course_name`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT dla tabeli `course_type`
--
ALTER TABLE `course_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT dla tabeli `main_references_translation`
--
ALTER TABLE `main_references_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
-- Ograniczenia dla tabeli `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`common_desc_id`) REFERENCES `common_desc` (`id`),
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`course_type_id`) REFERENCES `course_type` (`id`);

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
