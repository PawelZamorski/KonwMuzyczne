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
    $result = mysqli_query($connection, "SELECT f.icon, ft.fact
        FROM main_facts as f, main_facts_translation as ft, languages as l
        WHERE ft.main_facts_id = f.id
        AND ft.languages_id = l.id
        AND l.code = '$lang';");

?>


<!--Content Section-->
<div id="facts" class="scrollto clearfix spacious">
    <div class="row no-padding-bottom clearfix">

    <?php
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo
        '<div class="col-2 icon-block icon-top wow fadeInUp" data-wow-delay="0.1s">
            <!--Icon-->
            <div class="icon">
                <i class="fa ' . $row['icon'] . ' fa-2x"></i>
            </div>
            <div class="icon-block-description">
                ' . $row['fact'] . '
            </div>
        </div>';
        }
    ?>

    </div>
</div>


<?php  	
	// Step 4: Release returned data
	mysqli_free_result($result);
	
	// Step 5: Close connection
    mysqli_close($connection);

?>
