<!-- Get data from the database -->
<?php
    require(__DIR__ . '/../../../config/config.php');

    $offer_id = $_GET["offer_id"];
	
	// Step 1: Create connection
	$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	
	// Test if connection happend
	if(mysqli_connect_errno()){
		die("DB connection failed: " . 
			mysqli_connect_error() .
			" (" . mysqli_connect_errno() . ")"
		);
	}
	
	if(!$connection){
		die("Could not connect: " . mysqli_connect_error());
	}
    // Good practice: SET NAMES 'utf8' for MySQL using set_charset method
    mysqli_set_charset($connection, "utf8mb4");

	// Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT course_name.course_name, courses.long_desc, courses.short_desc, courses.img, courses.movie, common_desc.common_desc, category.category, course_type.type 
        FROM courses, offer, course_name, category, course_type, common_desc 
        WHERE offer.id=$offer_id 
        AND courses.id = offer.courses_id 
        AND category.id = offer.category_id
        AND course_name.id = courses.course_name_id  
        AND course_type.id = courses.course_type_id
        AND common_desc.id = courses.common_desc_id;");

    // Step 3: Use returned data
    $data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head lang="pl-PL">
    <?php
        $title = $data['type'] . ' ' . $data['category'];
        require(__DIR__ . '/../../../templates/head.php');
    ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144996818-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-144996818-1');
    </script>
</head>
<body>
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml : true,
                version : 'v6.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/pl_PL/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your customer chat code -->
    <div class="fb-customerchat"
        attribution=setup_tool
        page_id="178702878826960"
        logged_in_greeting="Witam, w czym możemy pomóc?"
        logged_out_greeting="Witam, w czym możemy pomóc?">
    </div>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status" class="la-ball-triangle-path">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- End of Preloader -->
    <!-- Frame -->
    <div class="page-border" data-wow-duration="0.7s" data-wow-delay="0.2s">
        <div class="top-border wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"></div>
        <div class="right-border wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;"></div>
        <div class="bottom-border wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"></div>
        <div class="left-border wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
    </div>
    <!-- End of Frame -->
    <!-- Menu -->
    <div id="wrapper">
        <header id="banner" class="scrollto clearfix" data-enllax-ratio=".5">
            <?php require(__DIR__ . '/../../../templates/menu.php') ?>
        </header>
    </div>
    <!-- End of Menu -->
    <!-- Main Content Area -->
    <main id="content">
        <!-- Course Details -->
        <section id="about" class="introduction scrollto">
            <div class="row clearfix">
                <div class="col-3">
                    <div class="section-heading">
                        <h3 class="uppercase"><?php echo $data['category'] ?></h3>
                        <h2 class="section-title"><?php echo $data['course_name'] ?></h2>
                        <p>
                            <img src=<?php echo $data['img'] ?> alt="zdjęcie <?php echo $data['course_name'] ?>"/>
                        </p>
                    </div>
                </div>
                <div class="col-2-3 alignToPhoto">
                    <!-- Youtube Movie-->
                    <div>
                        <div class="iframe-container">
                            <iframe src="<?php echo $data['movie'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    <!--End of Youtube Movie-->
                    <!-- Short description -->
                    <?php echo $data['short_desc'] ?>
                    <!-- Common description -->
                    <?php echo $data['common_desc'] ?>
                    <!-- Long description -->
                    <?php echo $data['long_desc'] ?>
                </div>
            </div>
        </section>
        <!-- End of Course Details -->
    </main>
    <!-- End of Main -->
    <!--Footer-->
    <?php require(__DIR__ ."/../../../templates/footer.php"); ?>
    <!--End of Footer-->
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

<?php  	
	// Step 4: Release returned data
	mysqli_free_result($result);
	
	// Step 5: Close connection
    mysqli_close($connection);

    // Garbage collector - garbage collector is automatic if variable is out of the scope
    unset($data);
?>
</html>