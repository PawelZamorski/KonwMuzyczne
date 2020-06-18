<!DOCTYPE html>
<html>
    <head lang="pl-PL">
        <meta charset="UTF-8">
        <!--Page Title-->
        <title>Filip Zaborowski | Konwersatorium Muzyczne</title>
        <!--Meta Keywords and Description-->
        <meta name="keywords" content="fortepian, śpiew, nauczyciel, nauka gry dla dzieci, nauka gry dla dorosłych, pianino, centrum warszawy, aleje jerozolimskie">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <!--Favicon-->
        <link rel="shortcut icon" href="/images/favicon.ico" title="Favicon" />
        <!-- Main CSS Files -->
        <link rel="stylesheet" href="/css/style.css?v=<?= filemtime("css/style.css") ?>">
        <!-- Namari Color CSS -->
        <link rel="stylesheet" href="/css/namari-color.css">
        <!--Icon Fonts - Font Awesome Icons-->
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <!-- Animate CSS-->
        <link href="/css/animate.css" rel="stylesheet" type="text/css">
        <!--Google Webfonts-->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
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
        </div>
        <!--Main Content Area-->
        <main id="content">
            <!--Introduction-->
            <section id="about" class="introduction scrollto fixpaddings">
                <div class="row clearfix">
                    <div class="col-1">
                        <div class="section-heading">
                            <h3>Klasa fortepianu</h3>
                            <h2 class="section-title">Filip Zaborowski</h2>
                        </div>
                    </div>
                    <div class="col-3">
                        <p><img src="/images/user-images/filip.jpg" alt="Filip Zaborowski" class="topMargin"></p>
                    </div>
                    <div class="col-3">
                        <p>Absolwent Uniwersytetu Muzycznego Fryderyka Chopina w Warszawie. Swoje umiejętności pianistyczne doskonalił także na Uniwersytecie Muzycznym w Barcelonie, Hiszpanii. Solista, kameralista oraz reżyser dźwięku. Laureat konkursów pianistycznych, m.in. w Paryżu i Berlinie. Stale się doskonali i bierze udział w międzynarodowych kursach mistrzowskich. W nauczaniu jest cierpliwy i opanowany, przekazuje istotę muzykowania w miłej, pozytywnej atmosferze oraz przykłada wagę do kreatywnego urozmaicania lekcji. Prowadzi klasę fortepianu dla dzieci i dorosłych.</p>
                    </div>
                </div>
            </div>
        </section>
        <!--End of Introduction-->
        <!--Footer-->
        <footer id="landing-footer" class="clearfix">
            <div class="row clearfix">
                <p id="copyright" class="col-2"></p>
                <!--Social Icons in Footer-->
                <ul class="col-2 social-icons">
                    <li>
                        <a target="_blank" title="Facebook" href="https://www.facebook.com/KonwersatoriumMuzyczne/">
                            <i class="fa fa-facebook fa-1x"></i><span>Facebook</span>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" title="YouTube" href="https://www.youtube.com/channel/UCpISipwaVRA4S16_j3ntGWA">
                            <i class="fa fa-youtube fa-1x"></i><span>YouTube</span>
                        </a>
                    </li>
                </ul>
                <!--End of Social Icons in Footer-->
            </div>
        </footer>
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