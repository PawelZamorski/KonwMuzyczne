<?php
    require(__DIR__ . '/../../../config/config.php');

    $offer_id = $_POST['offer_id'];
    $category_id = $_POST['category_id'];
    $course_type_id = $_POST['course_type_id'];
    $course_name_id = $_POST['course_name_id'];
    $short_desc = $_POST['short_desc'];
    $common_desc_id = $_POST['common_desc_id'];
    $long_desc = $_POST['long_desc'];
    $img = $_POST['img'];
    $movie = $_POST['movie'];
	
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

    // Get main data
	// Step 2: Perform database query
    $sql = "UPDATE courses, offer 
    SET category_id = $category_id,
    course_type_id = $course_type_id,
    course_name_id = $course_name_id,
    short_desc = '$short_desc',
    common_desc_id = $common_desc_id,
    long_desc = '$long_desc',
    img = '$img',
    movie = '$movie'
    WHERE offer.id = $offer_id
    AND courses.id = offer.courses_id;";

    if (mysqli_query($connection, $sql)) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . mysqli_error($connection);
      }
    
    // Step 5: Close connection
    mysqli_close($connection);

    header("Location: /admin/oferta/oferta.php");
?>