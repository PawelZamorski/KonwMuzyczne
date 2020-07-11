<!-- Get data from the database -->
<?php
    session_start();
    $lang = $_SESSION['lang'];

    $home_path = '/../../../../';

    require(__DIR__ . $home_path . 'config/config.php');

    $item_id = $_GET["item_id"];
	
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
    $result = mysqli_query($connection, "SELECT shop_item_category_translation.category, shop_item_details.id, shop_item_details.img, shop_item_details.price, shop_item_details.author, 
    shop_item_details_translation.title, shop_item_details_translation.short_desc, shop_item_details_translation.long_desc

    FROM shop_item_details, shop_item_details_translation, shop_item_category_translation, languages 
    WHERE shop_item_details_translation.shop_item_details_id = $item_id    
    AND shop_item_details_translation.shop_item_details_id = shop_item_details.id

    AND shop_item_details.shop_item_category_id = shop_item_category_translation.shop_item_category_id
    AND shop_item_category_translation.languages_id = languages.id
    
    AND shop_item_details_translation.languages_id = languages.id
    AND languages.code = '$lang';");

    // Step 3: Use returned data
    $data = mysqli_fetch_assoc($result);

    // Step 4: Release returned data
    mysqli_free_result($result);
    // Step 5: Close connection
    mysqli_close($connection);

?>

<!DOCTYPE html>
<html>
<head lang="pl-PL">
    <?php
        $title = $data['category'];
        require(__DIR__ . $home_path . 'templates/head.php');
    ?>
</head>
<body>
    <!-- Facebook Chat -->
    <?php require(__DIR__ . $home_path . 'lib/facebook/chat.php') ?>
    <!-- End of Facebook Chat -->

    <!-- Preloader -->
    <?php require(__DIR__ . $home_path . 'templates/preloader.php') ?>
    <!-- End of Preloader-->

    <!-- Page Border -->
    <?php // require(__DIR__ . $home_path . 'templates/page-border.php') ?>
    <!-- End of Page Border -->

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
            <!-- Course Details -->
            <section id="about" class="introduction scrollto">
                <div class="row clearfix">
                    <div class="col-3">
                        <div class="section-heading">
                            <h3 class="uppercase"><?php echo $data['category'] ?></h3>
                            <h2 class="section-title"><?php echo $data['title'] ?></h2>
                            <p>
                                <img src=<?php echo $data['img'] ?> alt="<?php echo $data['title'] ?>"/>
                            </p>
                        </div>
                    </div>
                    <div class="col-2-3 alignToPhoto">
                        <!-- Short description -->
                        <?php echo $data['short_desc'] ?>
                        <!-- Long description -->
                        <?php echo $data['long_desc'] ?>
                        <!-- Short author -->
                        <?php echo $data['author'] ?>
                        <!-- Short title -->
                        <?php echo $data['title'] ?>
                        <!-- Short price -->
                        <?php echo $data['price'] ?>
                        <!-- Common description -->
                        <?php // echo $data['common_desc'] ?>

                    </div>
                </div>
            </section>
            <!-- End of Course Details -->
        </main>
        <!-- End of Main Content Area -->
        <!--Footer-->
        <?php require(__DIR__ . $home_path . 'templates/footer.php'); ?>
        <!--End of Footer-->
    </div>
	<!--End of Wrapper-->

    <!-- JavaScript -->
    <?php
    require(__DIR__ . $home_path . 'templates/js-resources.php');
    ?>
    <!-- End of Javascript -->
</body>
