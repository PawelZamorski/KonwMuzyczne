<?php
    session_start();
    $lang = $_SESSION['lang'];

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

	// Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT heading_3, heading_2, button, paragraph, heading_3_category 
        FROM courses_heading_translation, languages
        WHERE courses_heading_translation.languages_id = languages.id
        AND languages.code = '$lang';");

    // Step 3: Use returned data
    $data_heading = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // Step 4: Release returned data
    mysqli_free_result($result);


    // Get data from table category (description of category)
    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT  category.img, common_desc_translation.common_desc, category_translation.category, category_translation.long_desc 
    FROM category, category_translation, common_desc_translation, languages 
    WHERE category.id=$category_id 
    AND category.common_desc_id=common_desc_translation.common_desc_id
    AND common_desc_translation.languages_id = languages.id

    AND category_translation.category_id = category.id
    AND category_translation.languages_id = languages.id
    
    AND languages.code = '$lang';");

    // Step 3: Use returned data
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // Step 4: Release returned data
	mysqli_free_result($result);

    // Get data from table courses based on condition on table offer ()
    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT offer.id as offer_id, courses.img_thumbnail, category_translation.category, course_type_translation.type 
        FROM courses, offer, category, category_translation, course_type_translation, languages
        WHERE offer.category_id=$category_id 
        AND courses.id = offer.courses_id 
        AND category.id = offer.category_id 

        AND course_type_translation.course_type_id = courses.course_type_id
        AND course_type_translation.languages_id = languages.id

        AND category_translation.category_id = category.id
        AND category_translation.languages_id = languages.id

        AND languages.code = '$lang';");
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
			<section id="about" class="introduction scrollto">
				<div class="row clearfix">
					<div class="col-3">
						<div class="section-heading">
							<h3><?php echo $data_heading['heading_3_category'] ?></h3>
							<h2 class="section-title uppercase"><?php echo $data['category'] ?></h2>
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
						<h3><?php echo $data_heading['heading_3'] ?></h3>
						<h2 class="section-title"><?php echo $data_heading['heading_2'] ?></h2>
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
                                <span><a href="oferta-details.php?offer_id=' . $row['offer_id'] . '"><img src=' . $row['img_thumbnail'] . ' alt="' . $row['type'] . ' ' . $row['category'] . '"/></a></span>
                                <a href="oferta-details.php?offer_id=' . $row['offer_id'] . '" class="button">' . $data_heading['button'] . '</a>
                            </div>
                        </div>';
                    }
                    ?>
				</div>
			</section>
			<!--End of Pricing Tables-->
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

<?php
	// Step 4: Release returned data
	mysqli_free_result($result);
	
	// Step 5: Close connection
	mysqli_close($connection);
?>

</html>