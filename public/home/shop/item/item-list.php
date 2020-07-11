<?php
    session_start();
    $lang = $_SESSION['lang'];

    $home_path = '/../../../../';

    require(__DIR__ . $home_path . 'config/config.php');

    $category_id = 1;

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
    $result = mysqli_query($connection, "SELECT heading_3, heading_2, button_show, button_add, button_remove
        FROM shop_item_main_translation, languages
        WHERE shop_item_main_translation.languages_id = languages.id
        AND languages.code = '$lang';");

    // Step 3: Use returned data
    $data_heading = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // Step 4: Release returned data
    mysqli_free_result($result);


    // Get data from table category (description of category)
    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT  shop_item_category_translation.category, shop_item_details.id, shop_item_details.img_thumbnail, shop_item_details.price, shop_item_details.author, shop_item_details_translation.title
    FROM shop_item_details, shop_item_details_translation, shop_item_category_translation, languages 
    WHERE shop_item_details_translation.shop_item_details_id = shop_item_details.id

    AND shop_item_details.shop_item_category_id = shop_item_category_translation.shop_item_category_id
    AND shop_item_category_translation.languages_id = languages.id
    
    AND shop_item_details_translation.languages_id = languages.id
    AND languages.code = '$lang';");

    // Step 3: Use returned data
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head lang="pl-PL">
    <?php
        $title = $data_heading['heading_3'];
        require(__DIR__ . $home_path . 'templates/head.php');
    ?>
</head>
<body>
    <!-- Facebook Chat -->
    <?php //require(__DIR__ . $home_path . 'lib/facebook/chat.php') ?>
    <!-- End of Facebook Chat -->

    <!-- Preloader -->
    <?php // require(__DIR__ . $home_path . 'templates/preloader.php') ?>
    <!-- End of Preloader-->

    <!--Wrapper-->
    <div id="wrapper-shop">
        <div id="wrapper-shop-menu">
            <!-- Menu Top -->
            <?php require(__DIR__ . $home_path . 'templates/menu-top.php') ?>
            <!-- End of Menu Top -->
            <div id="main-menu">
                <header class="scrollto clearfix landing-page" data-enllax-ratio=".5">
                    <!-- Menu Main -->
                    <?php require(__DIR__ . $home_path . 'templates/menu-main.php') ?>
                    <!-- End of Menu Main -->
                </header>
            </div>
        </div>




        <!--Main Content Area-->
		<main id="content">
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
                                <h3>' . $row['title'] . '</h3>
                                <p class="pricing-sub">' . $row['category'] . '</p>
                                <span><a href="item-details.php?item_id=' . $row['id'] . '"><img src=' . $row['img_thumbnail'] . ' alt="' . $row['title'] . ' ' . $row['category'] . '"/></a></span>
                                <a href="item-details.php?item_id=' . $row['id'] . '" class="button">' . $data_heading['button_show'] . '</a>
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
        <?php require(__DIR__ . $home_path . 'templates/footer.php'); ?>
        <!--End of Footer-->
    </div>
	<!--End of Wrapper-->

    <!-- JavaScript -->
    <?php
    require(__DIR__ . $home_path . "templates/js-resources.php");
    ?>
    <!-- End of Javascript -->
</body>
</html>

<?php
	// Step 4: Release returned data
	mysqli_free_result($result);
	
	// Step 5: Close connection
	mysqli_close($connection);
?>

