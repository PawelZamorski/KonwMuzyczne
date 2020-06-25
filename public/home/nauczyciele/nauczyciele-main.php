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
    $result = mysqli_query($connection, "SELECT employee.id as id, name, img_thumbnail, course_name 
    FROM employee, course_name 
    WHERE employee.course_name_id = course_name.id;");

	// Step 2: Perform database query
    $result_positions = mysqli_query($connection, "SELECT emp_positions.employee_id, positions.name 
    FROM emp_positions, positions 
    WHERE emp_positions.positions_id = positions.id;");

    // multidimentional array where key is employee_id and value is an array of positions assotiated with the employee 
    $positions_array = array();

    while($row_positions = mysqli_fetch_array($result_positions, MYSQLI_ASSOC)){
        $employee_id = $row_positions['employee_id'];

        // Add positions to the array. At first check if the key (employee_id) already exist
        if(array_key_exists($employee_id, $positions_array)) {
            $value = $positions_array[$employee_id]; // get value from the main array. The value is the type of array
            array_push($value, $row_positions['name']); // push element to the array
            $positions_array[$employee_id] = $value; // assign value to the main array
        } else {
            // Add element to main array
            $positions_array[$employee_id] = array($row_positions['name']);
        }
    };

	// Step 2: Perform database query
    $result_emp_specialization = mysqli_query($connection, "SELECT emp_specialization.employee_id, specialization.name 
    FROM emp_specialization, specialization 
    WHERE emp_specialization.specialization_id = specialization.id;");

    // multidimentional array where key is employee_id and value is an array of positions assotiated with the employee 
    $emp_specialization_array = array();

    while($row_emp_specialization = mysqli_fetch_array($result_emp_specialization, MYSQLI_ASSOC)){
        $employee_id = $row_emp_specialization['employee_id'];

        // Add specialization to the array. At first check if the key (employee_id) already exist
        if(array_key_exists($employee_id, $emp_specialization_array)) {
            $value = $emp_specialization_array[$employee_id]; // get value from the main array. The value is the type of array
            array_push($value, $row_emp_specialization['name']); // push element to the array
            $emp_specialization_array[$employee_id] = $value; // assign value to the main array
        } else {
            // Add element to main array
            $emp_specialization_array[$employee_id] = array($row_emp_specialization['name']);
        }
    };

?>

<div class="row clearfix">
    <div class="section-heading">
        <h3>NAUCZYCIELE</h3>
        <h2 class="section-title">Kim jesteśmy?</h2>
    </div>

    <?php
    // Step 3: Use returned data
    /* associative array */
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

        echo 
        '<blockquote class="col-3 testimonial classic">
            <a href="/home/nauczyciele/nauczyciele-details.php?employee_id=' . $row['id'] . '"><img src=' . $row['img_thumbnail'] . ' alt="Zdjęcie ' . $row['name'] . '"/></a>
            <h3><a href="/home/nauczyciele/nauczyciele-details.php?employee_id=' . $row['id'] . '">' . $row['name'] . '</a></h3>
            <h4>' . $row['course_name'] . '</h4>
            <footer>' . implode(" ", $positions_array[$row['id']]);

        if(array_key_exists($row['id'], $emp_specialization_array)) {
        echo 
            ' ' . implode(" ", $emp_specialization_array[$row['id']]);
        }

        echo
           '</footer>
        </blockquote>';
    }
    ?>

</div>

<?php
	// Step 4: Release returned data
	mysqli_free_result($result);
    mysqli_free_result($result_positions);
    mysqli_free_result($result_emp_specialization);
    	
	// Step 5: Close connection
	mysqli_close($connection);
?>