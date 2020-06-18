<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <!--Page Title-->
        <title>Śpiew dla dzieci | Konwersatorium Muzyczne</title>
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
	<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v7.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_GB/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="178702878826960"
  logged_in_greeting="How can we help you?"
  logged_out_greeting="How can we help you?">
      </div>
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
                                <h3>FOR CHILDREN</h3>
                                <h2 class="section-title">Singing Class</h2>
                                <p><img src="images/oferta/spiew-dla-dzieci.jpg" /></p>
                            </div>
                        </div>
                        <div class="col-2-3 alignToPhoto">
                            <p>Individual singing classes based on a master-pupil system for children 5+.</p>
                            <p><b>Sing up now! The number of slots is limited.</b></p>
							<p>Afraid of commitments? Try a starter package - 4 lessons to check what's best for your child!</p>
							<p>Now special price - 99€ for 4 lessons</p>
							<p>We offer lessons in an Art Nouveau building in the center of Warsaw, and also online - available across the world.</p>
							<p>Online lessons are available in accordance with time zone differences. Lessons are intended for adult first-timers, beginners, and advanced players. Learning materials – everything you need you will receive by email. Online lessons are adjusted to individual needs of every student – live in an agreed time. Lessons are available in English.</p>
							<p>Contact with music is an exciting adventure. Lessons at our school have elements of innovative education. There are no grades or exams. Children are most important, as well as their opinions, thoughts, and feelings. During lessons, there is a warm friendly atmosphere, which gives a sense of security and comfort. It improves self-esteem and sense of own effectiveness.</p>
                            <p>Through the learning process, pupils quire music skills, but also master time-management: how to schedule responsibilities, find time to study, do homework, play an instrument, and have time for oneself to relax.</p>
                            <p>The programme includes:</p>
                            <ul>
                                <li>popular songs</li>
                                <li>musical games with voice</li>
                                <li>improvisations</li>
                                <li>screenings of vocal masterpieces (operas, oratorios, and musicals)</li>
                                <li>musical fairytales</li>
                            </ul>
                            <p>The aim is to awaken a love for music and to improve self-confidence.</p>
                            <p>Lessons develop musicality, as well as vocal organs and speech smoothness. They also equip pupils with relaxation techniques, how to relieve body tensions. Singing lessons aim at awakening a love for music and improving self-confidence.</p>
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