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
    $result = mysqli_query($connection, "SELECT *
        FROM main_references_translation, languages as l
        WHERE languages_id = l.id
        AND l.code = '$lang';");

    // Step 3: Use returned data
    $data = mysqli_fetch_assoc($result);
    // Step 4: Release returned data
	mysqli_free_result($result);

	// Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT references_category_id, button
        FROM references_category_translation, languages
        WHERE languages_id = languages.id
        AND languages.code = '$lang';");

?>

<section id="referencje" class="scrollto text-center clearfix" data-enllax-ratio=".2" style="padding-top:15px;">
    <div class="section-heading">
        <h3><?php echo $data['heading_3'] ?></h3>
        <h2 class="section-title"><?php echo $data['heading_2'] ?></h2>
    </div>

<?php 

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    echo
    '<div class="pricing-block col-3 wow fadeInUp" data-wow-delay="0.4s">
        <a href="/home/references/references-details.php?references_category_id=' . $row['references_category_id'] . '" class="button">' . $row['button'] . '</a>
    </div>';
    }
?>
    <div class="col-1">
        <h2 class="section-title" style="font-size: 140%; margin-top: 50px;"><?php echo $data['partners'] ?></h2>
    </div>
    <div class="col-1 wow fadeInUp" data-wow-delay="0.4s">
        <ul class="partners">
            <li><img src="/images/partnerzy/partner1.jpg" /></li>
            <li><img src="/images/partnerzy/partner2.jpg" /></li>
            <li><img src="/images/partnerzy/partner3.jpg" /></li>
            <li><img src="/images/partnerzy/partner4.jpg" /></li>
            <li><img src="/images/partnerzy/partner5.jpg" /></li>
            <li><img src="/images/partnerzy/partner6.jpg" /></li>
            <li><img src="/images/partnerzy/partner7.jpg" /></li>
        </ul>
    </div>
</section>

<?php  	
    // Step 4: Release returned data
	mysqli_free_result($result);
	
	// Step 5: Close connection
    mysqli_close($connection);

?>
