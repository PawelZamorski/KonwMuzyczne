<?php
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
    $result = mysqli_query($connection, "SELECT heading_3, heading_2, long_desc, button, img
        FROM main_special_offer_translation, languages
        WHERE main_special_offer_translation.languages_id = languages.id
        AND languages.code = '$lang';");

    // Step 3: Use returned data
    $data = mysqli_fetch_assoc($result);

	// Step 4: Release returned data
	mysqli_free_result($result);

	// Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT main_special_offer_details_id, heading_3, heading_2, main_special_offer_details.img_1
        FROM main_special_offer_details, main_special_offer_details_translation, languages
        WHERE main_special_offer_details.id = main_special_offer_details_translation.main_special_offer_details_id
        
        AND main_special_offer_details_translation.languages_id = languages.id
        AND languages.code = '$lang';");

?>


<section id="oferta-sezonowa" class="secondary-color text-center scrollto clearfix ">
    <div class="row clearfix">
        <div class="section-heading">
            <h3><?php echo $data['heading_3'] ?></h3>
            <h2 class="section-title"><?php echo $data['heading_2'] ?></h2>
        </div>
        <!-- <div class="col-3 col-100">
                <img src="<?php echo $data['img'] ?>" alt="<?php echo $data['heading_3'] ?>">
        </div> -->
        <div class="col-3">
            <?php echo $data['long_desc'] ?>
        </div>



<?php
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo
        '<div class="pricing-block col-3 wow fadeInUp" data-wow-delay="0.6s">
            <div class="pricing-block-content">
                <h3>' . $row['heading_3'] . '</h3>
                <p class="pricing-sub">' . $row['heading_2'] . '</p>
                <span><a href="/home/main/special-offer/special-offer-details.php?main_special_offer_details_id=' . $row['main_special_offer_details_id'] . '"><img src="' . $row['img_1'] . '" alt="' . $row['heading_3'] . '" /></a></span>
                <a href="/home/main/special-offer/special-offer-details.php?main_special_offer_details_id=' . $row['main_special_offer_details_id'] . '" class="button">'. $data['button'] .'</a>
            </div>
        </div>';
    }
?>

    </div>
</section>


<?php  	
	// Step 4: Release returned data
	mysqli_free_result($result);
	
	// Step 5: Close connection
    mysqli_close($connection);

?>
