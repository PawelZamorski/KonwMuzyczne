<?php
    session_start();
    $lang = $_SESSION['lang']; // Get language

    require(__DIR__ . '/../../../../config/config.php');
	
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
    $result = mysqli_query($connection, "SELECT heading_3, heading_details, long_desc_1, long_desc_2, main_special_offer_details.img_1, main_special_offer_details.img_2
        FROM main_special_offer_details, main_special_offer_details_translation, languages
        WHERE main_special_offer_details_translation.main_special_offer_details_id = main_special_offer_details.id
        
        AND main_special_offer_details_translation.languages_id = languages.id
        AND languages.code = '$lang';");

    // Step 3: Use returned data
    $data = mysqli_fetch_assoc($result);
	// Step 4: Release returned data
	mysqli_free_result($result);
?>
<!DOCTYPE html>
<html>
<head lang="pl-PL">
    <?php
        $title = $data['heading_3'];
        require(__DIR__ . '/../../../../templates/head.php');
    ?>
</head>
<body>
    <!-- Facebook Chat -->
    <?php require(__DIR__ . '/../../../../lib/facebook/chat.php') ?>
    <!-- End of Facebook Chat -->

    <!-- Preloader -->
    <?php require(__DIR__ . '/../../../../templates/preloader.php') ?>
    <!-- End of Preloader-->

    <!-- Page Border -->
    <?php require(__DIR__ . '/../../../../templates/page-border.php') ?>
    <!-- End of Page Border -->

    <!--Wrapper-->
    <div id="wrapper">
        <header id="banner" class="scrollto clearfix landing-page" data-enllax-ratio=".5">
            <!-- Menu -->
            <?php require(__DIR__ . '/../../../../templates/menu.php') ?>
            <!-- End of Menu -->
        </header>
        <!--Main Content Area-->
        <!-- Main Content Area -->
        <main id="content">
            <section id="about" class="introduction scrollto">
                <div class="row clearfix" style="padding-bottom: 15px;">
                    <div class="col-3">
                        <div class="section-heading">
                            <h3><?php echo $data['heading_details'] ?></h3>
                            <h2 class="section-title"><?php echo $data['heading_3'] ?></h2>
                            <p><img src="<?php echo $data['img_1'] ?>" /></p>
                        </div>
                    </div>
                    <div class="col-2-3 alignToPhoto">
                        <?php echo $data['long_desc_1'] ?>
                    </div>
                </div>
                <div class="row clearfix" style="padding-top: 15px;">
                    <div class="col-2-3">
                    <?php echo $data['long_desc_2'] ?>
                    </div>
                    <!-- img na prawo -->
                    <div class="col-3">
                        <img src="<?php echo $data['img_2'] ?>" />
                    </div>
                </div>
            </section>
            <!--Pricing Tables-->
            
            <?php include(__DIR__ . '/../../oferta/oferta-main.php'); ?>


            <!--End of Pricing Tables-->
        </main>
        <!-- End of Main Content Area -->
        <!--Footer-->
        <?php require(__DIR__ . '/../../../../templates/footer.php'); ?>
        <!--End of Footer-->
    </div>
	<!--End of Wrapper-->

    <!-- JavaScript -->
    <?php
    require(__DIR__ ."/../../../../templates/js-resources.php");
    ?>
    <!-- End of Javascript -->
</body>


<?php  	

	
	// Step 5: Close connection
    mysqli_close($connection);

?>