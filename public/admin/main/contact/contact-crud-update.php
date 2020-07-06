<?php
    require(__DIR__ . '/../../../../config/config.php');

    $id = $_POST['id'];
    $heading_3 = $_POST['heading_3'];
    $heading_2 = $_POST['heading_2'];
    $email_name = $_POST['email_name'];
    $email_email = $_POST['email_email'];
    $email_message = $_POST['email_message'];
    $button = $_POST['button'];

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
    $sql = "UPDATE main_contact_translation
        SET
        heading_3 = '$heading_3',
        heading_2 = '$heading_2',
        email_name = '$email_name',
        email_email = '$email_email',
        email_message = '$email_message',
        button = '$button'
        WHERE id = $id;";

    if (mysqli_query($connection, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
    
    // Step 5: Close connection
    mysqli_close($connection);

  //  header("Location: /admin/nauczyciele/nauczyciele.php");
?>
