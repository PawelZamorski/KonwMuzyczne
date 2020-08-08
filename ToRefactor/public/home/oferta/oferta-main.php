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
    $result = mysqli_query($connection, "SELECT heading_3, heading_2, button, paragraph 
        FROM courses_heading_translation, languages
        WHERE courses_heading_translation.languages_id = languages.id
        AND languages.code = '$lang';");

    // Step 3: Use returned data
    $data_heading = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // Step 4: Release returned data
    mysqli_free_result($result);



	// Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT category.id, category, img 
        FROM category, category_translation, languages
        WHERE category_translation.category_id = category.id
        AND category_translation.languages_id = languages.id
        AND languages.code = '$lang';");
?>

<section id="oferta" class="secondary-color text-center scrollto clearfix ">
    <div class="row clearfix">
        <div class="section-heading">
            <h3><?php echo $data_heading['heading_3']; ?></h3>
            <h2 class="section-title"><?php echo $data_heading['heading_2']; ?></h2>
        </div>

        <?php
        // Step 3: Use returned data
        /* associative array */
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            echo 
            '<div class="pricing-block col-3 wow fadeInUp" data-wow-delay="0.8s">
                <div class="pricing-block-content">
                    <h3>' . $row['category'] . '</h3>
                    <p class="pricing-sub">' . $data_heading['paragraph'] . '</p>
                    <span><a href="/home/oferta/oferta-category.php?category_id=' . $row['id'] . '"><img src=' . $row['img'] . ' alt="Zdjęcie ' . $row['category'] . '"/></a></span>
                    <a href="/home/oferta/oferta-category.php?category_id=' . $row['id'] . '" class="button">' . $data_heading['button'] . '</a>
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