<!DOCTYPE html>
<html>
    <head lang="pl-PL">
        <?php
            $title = 'O szkole';
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
                <section id="about" class="introduction scrollto">
                    <div class="row clearfix">
                        <div class="col-3">
                            <div class="section-heading">
                                <h3>O SZKOLE</h3>
                                <h2 class="section-title">Czym jest nasza szkoła?</h2>
                                <p class="section-subtitle">Konwersatorium Muzyczne jest ekskluzywną szkołą o profilu pianistycznym dla dzieci, młodzieży i dorosłych.</p>
                            </div>
                        </div>
                        <div class="col-2-3">
                            <div>
                                <p>Zostało założone w 1996 roku w secesyjnej kamienicy w centrum Warszawy przez profesor Grażynę Kołodziej.</p>
                                <p>Zaufało nam już ponad 200 uczniów w wieku od 2 do 65 lat nie tylko z Polski, ale również z krajów Europy i Azji. W gronie absolwentów Konwersatorium Muzycznego są prawnicy, lekarze, managerowie, ekonomiści, architekci, naukowcy i oczywiście muzycy.</p>
                                <p>Naszym celem jest wychowanie melomanów, którzy czerpią przyjemność z grania i pragną, aby muzyka towarzyszyła im przez całe życie.</p>
                                <p>Gwarantujemy indywidualne podejście do każdego ucznia nastawione na rozwój osobisty przez kontakt z muzyką, na który każdy zasługuje. Znajdujemy ukryty talent.</p>
                                <p>Jest to najlepsza inwestycja w przyszłość własną lub swojego dziecka.</p>
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