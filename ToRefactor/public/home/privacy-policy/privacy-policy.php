﻿<!DOCTYPE html>
<html>
<head lang="pl-PL">
    <?php
        $title = 'Polityka prywatności';
        require(__DIR__ . '/../../../templates/head.php');
    ?>
</head>
<body>
    <!-- Facebook Chat -->
    <?php require(__DIR__ . '/../../../lib/facebook/chat.php') ?>
    <!-- End of Facebook Chat -->

    <!-- Preloader -->
    <?php require(__DIR__ . '/../../../templates/preloader.php') ?>
    <!-- End of Preloader-->

    <!-- Page Border -->
    <?php require(__DIR__ . '/../../../templates/page-border.php') ?>
    <!-- End of Page Border -->

    <!--Wrapper-->
    <div id="wrapper">
        <header id="banner" class="scrollto clearfix landing-page" data-enllax-ratio=".5">
            <!-- Menu -->
            <?php require(__DIR__ . '/../../../templates/menu.php') ?>
            <!-- End of Menu -->
        </header>
        <!--Main Content Area-->
        <main id="content">
            <!--Polityka Prywatnosci-->
            <section id="politykaPrywatnosci" class="introduction scrollto">
                <div class="secondary-color text-center clearfix" style="margin-bottom: 20px;">
                    <div class="row clearfix">
                        <div class="col-1">
                            <div class="section-heading">
                                <h2 class="section-title">POLITYKA PRYWATNOŚCI<br>Konwersatorium Muzyczne</h2>				
                            </div>
                            <div class="padding-150 wow fadeInUp" data-wow-delay="0.4s">
                                <p>Na tej stronie dowiesz się w jaki sposób Konwersatorium Muzyczne przetwarza dane osobowe. Tutaj także możesz skontaktować się z osobą odpowiedzialną za ochronę danych osobowych.
                                </p>
                                <ol type="I">
                                    <li>Postanowienia Ogólne</li>
                                        <ol>
                                            <li>Administratorem danych jest Bogna Kołodziej Konwersatorium Muzyczne z siedzibą w Warszawie, Aleje Jerozolimskie 47/20 00-697, NIP: 5262790537, REGON: 141095362. Ochrona danych odbywa się zgodnie z wymogami powszechnie obowiązujących przepisów prawa, a ich przechowywanie ma miejsce na zabezpieczonych serwerach.</li>
                                            <li>Dla interpretacji terminów stosuje się słowniczek Regulaminu lub tak jak zostało to opisane w Polityce Prywatności (jeżeli wynika to bezpośrednio z opisu).</li>
                                            <li>Na potrzeby lepszego odbioru Polityki Prywatności termin „Użytkownik” zastąpiony został określeniem „Ty”,  „Administrator” – „My”. Termin „RODO” oznacza Rozporządzenie Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016 r. w sprawie ochrony osób fizycznych w związku z przetwarzaniem danych osobowych i w sprawie swobodnego przepływu takich danych oraz uchylenia dyrektywy 95/46/WE.</li>
                                            <li>Dane osobowe podawane w formularzu na landing page’u są traktowane jako poufne i nie są widoczne dla osób nieuprawnionych.</li>
                                        </ol>
                                    <li>Administrator Danych</li>
                                        <ol>
                                            <li>Usługodawca jest administratorem danych swoich klientów. Oznacza to, że jeśli posiadasz Konto na naszej stronie, to przetwarzamy Twoje dane jak: imię, nazwisko, adres e-mail, numer telefonu.</li>
                                            <li>Usługodawca jest także administratorem osób zapisanych na newsletter.</li>
                                            <li>Dane osobowe przetwarzane są:a. zgodnie z przepisami dotyczącymi ochrony danych osobowych,b. zgodnie z wdrożoną Polityką Prywatności,c. w zakresie i celu niezbędnym do nawiązania, ukształtowania treści Umowy, zmiany bądź jej rozwiązania oraz prawidłowej realizacji Usług świadczonych drogą elektroniczną,d. w zakresie i celu niezbędnym do wypełnienia uzasadnionych interesów (prawnie usprawiedliwionych celów), a przetwarzanie nie narusza praw i wolności osoby, której dane dotyczą w zakresie i celu zgodnym ze zgodą wyrażoną przez Ciebie jeśli [przykładowo] zapisałeś się na newsletter.</li>
                                            <li>Każda osoba, której dane dotyczą (jeżeli jesteśmy ich administratorem) ma prawo dostępu do danych, sprostowania, usunięcia lub ograniczenia przetwarzania, prawo sprzeciwu, prawo wniesienia skargi do organu nadzorczego.</li>
                                            <li>Kontakt z osobą nadzorującą przetwarzanie danych osobowych w organizacji Usługodawcy jest możliwy drogą elektroniczną pod adresem e-mail: sekretariat@konwersatoriummuzyczne.pl.</li>
                                            <li>Zastrzegamy sobie prawo do przetwarzania Twoich danych po rozwiązaniu Umowy lub cofnięciu zgody tylko w zakresie na potrzeby dochodzenia ewentualnych roszczeń przed sądem lub jeżeli przepisy krajowe albo unijne bądź prawa międzynarodowego obligują nas do retencji danych.</li>
                                            <li>Usługodawca ma prawo udostępniać dane osobowe Użytkownika oraz innych jego danych podmiotom upoważnionym na podstawie właściwych przepisów prawa (np. organom ścigania).</li>
                                            <li>Usunięcie danych osobowych może nastąpić na skutek cofnięcia zgody bądź wniesienia prawnie dopuszczalnego sprzeciwu na przetwarzanie danych osobowych.</li>
                                            <li>Usługodawca nie udostępniania danych osobowych innym podmiotom aniżeli upoważnionym na podstawie właściwych przepisów prawa.</li>
                                            <li>Dane osobowe przetwarzają osoby wyłącznie upoważnione przez nas albo przetwarzający, z którymi ściśle współpracujemy.</li>
                                        </ol>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Polityka Prywatnosci-->
            </section>
        </main>
        <!-- End of Main Content Area -->
        <!--Footer-->
        <?php require(__DIR__ . '/../../../templates/footer.php'); ?>
        <!--End of Footer-->
    </div>
	<!--End of Wrapper-->

    <!-- JavaScript -->
    <?php
    require(__DIR__ ."/../../../templates/js-resources.php");
    ?>
    <!-- End of Javascript -->
</body>
</html>