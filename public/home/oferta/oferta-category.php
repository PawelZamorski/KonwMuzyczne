<?php
    require(__DIR__ . '/../../../config/config.php');

    $category_id = $_GET["category_id"];

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

    // Get data from table category (description of category)
    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT category.id as category_id, category, long_desc, img, common_desc 
    FROM category, common_desc 
    WHERE category.id=$category_id 
    AND category.common_desc_id=common_desc.id;");
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // Step 4: Release returned data
	mysqli_free_result($result);

    // Get data from table courses based on condition on table offer ()
    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT offer.id as offer_id, courses.img_thumbnail, category.category, course_type.type 
        FROM courses, offer, category, course_type 
        WHERE offer.category_id=$category_id 
        AND courses.id = offer.courses_id 
        AND category.id = offer.category_id 
        AND course_type.id = courses.course_type_id;");
?>

<!DOCTYPE html>
<html>
<head lang="pl-PL">
    <?php
        $title = 'Oferta';
        require(__DIR__ . '/../../../templates/head.php');
    ?>
</head>
<body>
	<!-- Preloader
	<div id="preloader">
		<div id="status" class="la-ball-triangle-path">
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>
	End of Preloader-->
	<div class="page-border" data-wow-duration="0.7s" data-wow-delay="0.2s">
		<div class="top-border wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"></div>
		<div class="right-border wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;"></div>
		<div class="bottom-border wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"></div>
		<div class="left-border wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
	</div>

	<!--Wrapper-->
	<div id="wrapper">
		<div>
            <?php require(__DIR__ . '/../../../templates/menu.php') ?>
		</div>
			<!--Main Content Area-->
		<main id="content">
			<section id="about" class="introduction scrollto">
				<div class="row clearfix">
					<div class="col-3">
						<div class="section-heading">
							<h3>ZAPRASZAMY</h3>
							<h2 class="section-title">Lekcje indywidualne <?php echo $data['category'] ?></h2>
							<p><img src=<?php echo $data['img'] ?> alt="Lekcje indywidualne <?php echo $data['category'] ?>" /></p>
						</div>
					</div>
					<div class="col-2-3 alignToPhoto">
                    <?php echo $data['common_desc'] ?>
                    <?php echo $data['long_desc'] ?>
					</div>
				</div>
			</section>
			<!--Pricing Tables-->
			<section id="oferta" class="secondary-color text-center scrollto clearfix ">
				<div class="row clearfix">
					<div class="section-heading">
						<h3>Twój wybór</h3>
						<h2 class="section-title">Nasza oferta</h2>
					</div>

                    <?php
                    // Step 3: Use returned data
                    /* associative array */
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        echo 
                        '<div class="pricing-block col-3 wow fadeInUp" data-wow-delay="0.8s">
                            <div class="pricing-block-content">
                                <h3>' . $row['type'] . '</h3>
                                <p class="pricing-sub">' . $row['category'] . '</p>
                                <span><a href="oferta-details.php?offer_id=' . $row['offer_id'] . '"><img src=' . $row['img_thumbnail'] . ' alt="Zdjęcie ' . $row['type'] . ' ' . $row['category'] . '"/></a></span>
                                <a href="oferta-details.php?offer_id=' . $row['offer_id'] . '" class="button">Sprawdź</a>
                            </div>
                        </div>';
                    }
                    ?>
				</div>
			</section>
			<!--End of Pricing Tables-->
		</main>
		<!--End Main Content Area-->
		<!--Footer-->
        <?php require(__DIR__ ."/../../../templates/footer.php"); ?>
		<!--End of Footer-->
	</div>
	<!--End of Wrapper-->
<!-- Include JavaScript resources -->
<script src="/js/jquery.1.8.3.min.js"></script>
<script src="/js/wow.min.js"></script>
<script src="/js/featherlight.min.js"></script>
<script src="/js/featherlight.gallery.min.js"></script>
<script src="/js/jquery.enllax.min.js"></script>
<script src="/js/jquery.scrollUp.min.js"></script>
<script src="/js/jquery.easing.min.js"></script>
<script src="/js/jquery.stickyNavbar.min.js"></script>
<script src="/js/jquery.waypoints.min.js"></script>
<script src="/js/images-loaded.min.js"></script>
<script src="/js/lightbox.min.js"></script>
<script src="/js/site.js"></script>
<script src="/js/contact.js"></script>
<script src="/js/stats.js"></script>
<script src="/js/youtube-modal.js"></script>
<script src="/js/newsletter-modal.js"></script>


</body>

<?php
	// Step 4: Release returned data
	mysqli_free_result($result);
	
	// Step 5: Close connection
	mysqli_close($connection);
?>

</html>