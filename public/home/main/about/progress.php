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
    $result = mysqli_query($connection, "SELECT heading_3, heading_2, button
        FROM main_progress_heading_translation, languages as l
        WHERE languages_id = l.id
        AND l.code = '$lang';");
    
    // Step 3: Use returned data
    $data = mysqli_fetch_assoc($result);

    // Step 4: Release returned data
	mysqli_free_result($result);

	// Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT short_desc, percent
        FROM main_progress_translation, languages as l
        WHERE languages_id = l.id
        AND l.code = '$lang';");

?>

<?php
echo
'<div id="progress" class="secondary-color text-center clearfix " style="margin-bottom: 20px;">
    <div class="row clearfix">
        <div class="section-heading">
            <h3>' . $data['heading_3'] . '</h3>
            <h2 class="section-title">' . $data['heading_2'] . '</h2>
        </div>
        <div class="pricing-block col-1 wow fadeInUp" data-wow-delay="0.4s">
            <ul class="stats">';

            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                echo 
                '<li data-width="' . $row['percent'] . '">' . $row['short_desc'] . '<span>' . $row['percent'] . '</span></li>';
            }
            echo
            '</ul>
            <!--Call to Action-->
            <a href="/home/main/about/progress-details.php" class="button" style="margin: 30px 0;">' . $data['button'] . '</a>
            <!--End Call to Action-->
        </div>
    </div>
</div>';

?>


<?php  	
	// Step 4: Release returned data
	mysqli_free_result($result);
	
	// Step 5: Close connection
    mysqli_close($connection);

?>
