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
    $result = mysqli_query($connection, "SELECT info.id, info.languages_id, info.heading_3, info.heading_2, info.short_desc, info.long_desc
        FROM main_about_info_translation as info, languages as l
        WHERE info.languages_id = l.id
        AND l.code = '$lang';");

    // Step 3: Use returned data
    $data_info = mysqli_fetch_assoc($result);
?>

<div class="row clearfix">
    <div class="col-3">
        <div class="section-heading">
            <h3><?php echo $data_info['heading_3'] ?></h3>
            <h2 class="section-title"><?php echo $data_info['heading_2'] ?></h2>
            <p class="section-subtitle"><?php echo $data_info['short_desc'] ?></p>
        </div>
    </div>
    <div class="col-2">
        <?php echo $data_info['long_desc'] ?>
    </div>
</div>

<?php  	
	// Step 4: Release returned data
	mysqli_free_result($result);
	
	// Step 5: Close connection
    mysqli_close($connection);

?>
