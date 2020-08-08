<?php
    require(__DIR__ . '/../../../config/config.php');

    $employee_id= $_POST['employee_id'];
    $name = $_POST['name'];
    $course_name_id = $_POST['course_name_id'];
    $img = $_POST['img'];
    $img_thumbnail = $_POST['img_thumbnail'];
    $long_desc = $_POST['long_desc'];
    $positions_id = $_POST['positions_id'];
    if(isset($_POST['specialization_id'])) { // specialization_id may not be set
        $specialization_id = $_POST['specialization_id'];
    } else {
        $specialization_id = array(); // Create empty array to process further steps (remove data from emp_specialization table)
    }

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
    $sql = "UPDATE employee
    SET
    name = '$name',
    course_name_id = $course_name_id,
    img = '$img',
    img_thumbnail = '$img_thumbnail',
    long_desc = '$long_desc'
    WHERE employee.id = $employee_id;";

    if (mysqli_query($connection, $sql)) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . mysqli_error($connection);
      }
    
    // Insert data
	// Step 2: Perform database query
    $sql = "UPDATE emp_positions
    SET positions_id = $positions_id
    WHERE employee_id = $employee_id;";

    if (mysqli_query($connection, $sql)) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . mysqli_error($connection);
      }

    // Insert data
    // Step 2: Perform database query
    // At first delet old data
    $sql = "DELETE FROM emp_specialization
        WHERE employee_id = $employee_id;";

    if (mysqli_query($connection, $sql)) {
        if  (!empty($specialization_id)) { // Check if there is any data to be insert
            // Prepare data, change from array to string
            $counter = 0;
            $values = "";
            foreach($specialization_id as $value) {
                if($counter === (count($specialization_id) - 1)) {
                    $values .= "($employee_id, $value)";
                } else {
                    $values .= "($employee_id, $value), ";
                }

                $counter += 1;
            }
            // Insert new data
            $sql = "INSERT INTO emp_specialization (employee_id, specialization_id)
                VALUES $values;";
            if (mysqli_query($connection, $sql)) {
                echo "Unbelivable Success: Record updated successfully";
            } else {
                echo "Error updating record: " . mysqli_error($connection);
            }
        }
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
    
    // Step 5: Close connection
    mysqli_close($connection);

    header("Location: /admin/nauczyciele/nauczyciele.php");
?>