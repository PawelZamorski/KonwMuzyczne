<?php
    require(__DIR__ . '/../../../../config/config.php');

    $id = $_POST['id'];
    $languages_id = $_POST['languages_id'];
    $name = $_POST['name'];
    $long_desc = $_POST['long_desc'];
    $button = $_POST['button'];
    $img = $_POST['img'];

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

/* TOSO: use sql transaction */


    // Get main data
	// Step 2: Perform database query
    $sql = "UPDATE main_banner_translation
        SET
        name = '$name',
        long_desc = '$long_desc',
        button = '$button'
        WHERE main_banner_id = $id
        AND languages_id = $languages_id;";

    if (mysqli_query($connection, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
    
    // Step 5: Close connection
    mysqli_close($connection);

  //  header("Location: /admin/nauczyciele/nauczyciele.php");
?>