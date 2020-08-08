<!-- Get data from the database -->
<?php
    session_start();
    $lang = $_SESSION['lang'];

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
    $result = mysqli_query($connection, "SELECT course_name_translation.course_name, courses_translation.long_desc, courses_translation.short_desc, courses.img, courses.movie, common_desc_translation.common_desc, category_translation.category, course_type_translation.type 
        FROM courses, courses_translation, offer, course_name_translation, category, category_translation, course_type_translation, common_desc_translation, languages
        WHERE offer.id=$offer_id
        AND courses.id = offer.courses_id 

        AND course_name_translation.course_name_id = courses.course_name_id
        AND course_name_translation.languages_id = languages.id

        AND courses_translation.courses_id = courses.id
        AND courses_translation.languages_id= languages.id

        AND course_type_translation.course_type_id = courses.course_type_id
        AND course_type_translation.languages_id = languages.id

        AND common_desc_translation.common_desc_id = courses.common_desc_id
        AND common_desc_translation.languages_id = languages.id

        AND category_translation.category_id = offer.category_id
        AND category_translation.languages_id = languages.id

        AND languages.code = '$lang';");

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
            <!-- Course Details -->
            <section id="about" class="introduction scrollto">
                <div class="row clearfix">
                    <div class="col-3">
                        <div class="section-heading">
                            <h3 class="uppercase"><?php echo $data['category'] ?></h3>
                            <h2 class="section-title"><?php echo $data['course_name'] ?></h2>
                            <p>
                                <img src=<?php echo $data['img'] ?> alt="<?php echo $data['course_name'] ?>"/>
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

    // Garbage collector - garbage collector is automatic if variable is out of the scope
    unset($data);
?>
</html>