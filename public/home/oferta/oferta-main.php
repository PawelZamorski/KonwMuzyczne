<?php

    require(__DIR__ . '/../../../config/config.php');
	
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
    $result = mysqli_query($connection, "SELECT id, category, img FROM category;");
?>

<div class="row clearfix">
    <div class="section-heading">
        <h3>Twój wybór</h3>
        <h2 class="section-title">Nasza oferta</h2>
    </div>

    <?php
    // Step 3: Use returned data
    /* associative array */
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo 
        '<div class="pricing-block col-3 wow fadeInUp" data-wow-delay="0.8s">
            <div class="pricing-block-content">
                <h3>' . $row['category'] . '</h3>
                <p class="pricing-sub">indywidualne</p>
                <span><a href="/home/oferta/oferta-category.php?category_id=' . $row['id'] . '"><img src=' . $row['img'] . ' alt="Zdjęcie ' . $row['category'] . '"/></a></span>
                <a href="/home/oferta/oferta-category.php?category_id=' . $row['id'] . '" class="button">Sprawdź</a>
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