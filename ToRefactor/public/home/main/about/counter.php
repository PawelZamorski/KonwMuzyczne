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
    $result = mysqli_query($connection, "SELECT mct.heading_3, mc.counter, mct.short_desc
        FROM main_counter as mc, main_counter_translation as mct, languages as l
        WHERE mct.languages_id = l.id
        AND mct.main_counter_id = mc.id
        AND l.code = '$lang';");

?>

<div id="counter" class="secondary-color text-center clearfix " style="margin-bottom: 20px;">
    <?php
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo
        '<div class="pricing-block col-3 wow fadeInUp" data-wow-delay="0.4s">
            <div class="pricing-block-content">
                <h3>' . $row['heading_3'] . '</h3>
                <span class="count">' . $row['counter'] . '</span>
                <br />
                ' . $row['short_desc'] . '
            </div>
        </div>';
    }
    ?>
</div>

<?php  	
	// Step 4: Release returned data
	mysqli_free_result($result);
	
	// Step 5: Close connection
    mysqli_close($connection);

?>
