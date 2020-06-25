<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <!--Page Title-->
        <title>Program Meloman | Konwersatorium Muzyczne</title>
        <!--Meta Keywords and Description-->
        <meta name="keywords" content="fortepian, śpiew, nauczyciel, nauka gry dla dzieci, nauka gry dla dorosłych, pianino, centrum warszawy, aleje jerozolimskie">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <!--Favicon-->
        <link rel="shortcut icon" href="/images/favicon.ico" title="Favicon" />
        <!-- Main CSS Files -->
        <link rel="stylesheet" href="/css/style.css?v=<?= filemtime("../css/style.css") ?>">
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
            <!--Main Content Area-->
            <main id="content">
                <!--Introduction-->
                <section id="about" class="introduction scrollto">
                    <div class="row clearfix">
                        <div class="col-3">
                            <div class="section-heading">
                                <h3>FOR ADULTS</h3>
                                <h2 class="section-title">Music Lover Programme</h2>
                                <p><img src="images/oferta/meloman.jpg" /></p>
                            </div>
                        </div>
                        <div class="col-2-3 alignToPhoto">
                            <p>The programme is designed for adults who want to develop their musical knowledge without the necessity to learn how to play.</p>
                            <p>A music lover is an expert in music. Such a person can recognize a good performance, notice its important elements, and surprise others with an interesting anecdote about the composer. Concert hall has no secrets. A music lover knows when to clap, and which concerts to attend. It is a person who have knowledge about art.</p>
                            <p>The programme is selected in accordance with your interests, and it includes among others:</p>
                            <ul>
                                <li>history of music</li>
                                <li>musical literature</li>
                                <li>lives and works of great composers</li>
                                <li>world canon of musical masterpieces</li>
                                <li>watching and analyzing selected fragments of operas and ballets</li>
                                <li>rules of music</li>
                            </ul>
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