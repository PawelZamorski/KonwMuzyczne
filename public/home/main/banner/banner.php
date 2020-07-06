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
    $result = mysqli_query($connection, "SELECT b.img, bt.name, bt.long_desc, bt.button
        FROM main_banner as b, main_banner_translation as bt, languages as l
        WHERE bt.main_banner_id = b.id
        AND bt.languages_id = l.id
        AND l.code = '$lang';");

    // Step 3: Use returned data
    $data = mysqli_fetch_assoc($result);
?>

<div id="banner-content" class="row clearfix transp-background">
    <div class="col-38">
        <div class="section-heading">
            <h1 class="capitalize"><?php echo $data['name'] ?></h1>
            <h2><?php echo $data['long_desc'] ?></h2>
        </div>
        <!--Call to Action-->
        <a href="#kontakt" class="button color-white border-gold" id="call-to-action"><?php echo $data['button'] ?></a>
        <!--End Call to Action-->
    </div>
</div>


<?php  	
	// Step 4: Release returned data
	mysqli_free_result($result);
	
	// Step 5: Close connection
    mysqli_close($connection);

?>
