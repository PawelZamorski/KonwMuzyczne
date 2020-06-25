<!DOCTYPE html>
<html>
    <head lang="pl-PL">
        <?php
            $title = 'Referencje rodzinne';
            require($_SERVER['DOCUMENT_ROOT']."/head.php");
        ?>
    </head>
    <body>
        <!-- Preloader -->
        <div id="preloader">
            <div id="status" class="la-ball-triangle-path">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <!--End of Preloader-->
        <div class="page-border" data-wow-duration="0.7s" data-wow-delay="0.2s">
            <div class="top-border wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"></div>
            <div class="right-border wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;"></div>
            <div class="bottom-border wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"></div>
            <div class="left-border wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
        </div>
        <div id="wrapper">
            <header id="banner" class="scrollto clearfix" data-enllax-ratio=".5">
                <?php include 'menu.php' ?>
            </header>
            <!--Main Content Area-->
            <main id="content">
                <!--Introduction-->
                <section class="introduction scrollto">
                    <div class="row clearfix">
                        <div class="col-3">
                            <div class="section-heading">
                                <h3>REFERENCJE DZIECI</h3>
                                <h2 class="section-title">Dziękujemy za pracowity czas!</h2>
                                <p class="section-subtitle">Można poczytać tutaj historie zadowolonych uczniów.</p>
                            </div>
                        </div>
                        <div class="col-2-3">
                            <img src="/images/referencje/iwonka.jpg" />
                            <p>Najlepsze referencje od uczennicy 7-letniej Iwonki</p>
                            <img src="/images/referencje/ania.jpg" />
                            <p>„A to moja kochana pani” 6-letnia Ania</p>
                            <img src="/images/referencje/kasia.jpg" />
                            <p>I jeszcze wspaniałe referencje od 4-letniej Kasi</p>
                            <img src="/images/referencje/ania2.jpg" />
                            <p>Rymowane od 6-letniej Ani</p>
                            <img src="/images/referencje/klara.jpg" />
                            <p>Narysowałam swoją lekcje. Gram na pianinie, nogi oparte mam na czerwonym podnóżku, a Pani Bogna siedzi obok. Gram swój ulubiony utwór – Mając przyjaciela. (Widać wyraźnie nutę C, natomiast nutę A lewa ręka gra 3-cim palcem.) Właśnie skończyłam grać utwór i patrzę na Panią Bognę czy dobrze, a ona się uśmiecha
                            <br /><strong>- Referencja od 4-letniej Klary</strong></p>
                            <div style="margin-top:50px" class="text-center">
                                <iframe width="100%" height="400px" src="https://www.youtube.com/embed/Aw2FCwkYY-4" frameborder="0" allowfullscreen></iframe>
                                <p>Dlaczego warto grać opowiada Ola Nguyen</p>
                                <iframe width="100%" height="400px" src="https://www.youtube.com/embed/jiIlKmdi7PM" frameborder="0" allowfullscreen></iframe>
                                <p>Moja Pani dużo się śmieje – mówi Iwonka</p>
                            </div>
                        </div>
                    </div>
                </section>
                <!--End of Introduction-->
                <!--Footer-->
                <?php
                    include($_SERVER['DOCUMENT_ROOT']."/footer.php");
                ?>
                <!--End of Footer-->
            </div>
            <!-- Include JavaScript resources -->
            <script src="/js/jquery.1.8.3.min.js"></script>
            <script src="/js/wow.min.js"></script>
            <script src="/js/featherlight.min.js"></script>
            <script src="/js/featherlight.gallery.min.js"></script>
            <script src="/js/jquery.enllax.min.js"></script>
            <script src="/js/jquery.scrollUp.min.js"></script>
            <script src="/js/jquery.easing.min.js"></script>
            <script src="/js/jquery.waypoints.min.js"></script>
            <script src="/js/images-loaded.min.js"></script>
            <script src="/js/lightbox.min.js"></script>
            <script src="/js/site.js"></script>
        </body>
    </html>