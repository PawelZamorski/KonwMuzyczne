<!-- Get data from the database -->
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
    $result = mysqli_query($connection, "SELECT offer.id as id, category.category, course_type.type, course_name.course_name 
        FROM offer, category, course_type, course_name, courses 
        WHERE category.id = offer.category_id 
        AND course_name.id = courses.course_name_id
        AND course_type.id = courses.course_type_id
        AND courses.id = offer.courses_id;");
?>

<!DOCTYPE html>
<html>
<head lang="pl-PL">
    <?php 
        $title = 'Oferta | Panel administracyjny';
        require(__DIR__ . '/../templates/head-admin.php');
    ?>
</head>
<body>
    <?php require(__DIR__ . '/../templates/menu-admin.php'); ?>

    <table class="table table-hover table-bordered">
        <caption style="caption-side: top;">Lista oferowanych kursów</caption>
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Kategoria</th>
                <th scope="col">Typ kursu</th>
                <th scope="col">Nazwa kursu</th>
                <th scope="col">Edycja</th>
            </tr>
        </thead>
        <tbody>

        <?php
            // Step 3: Use returned data
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            echo '<tr>
                    <th scope="row">' . $row['id'] . '</th>
                    <td>' . $row['category'] . '</td>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['course_name'] . '</td>
                    <td><a href="/admin/oferta/oferta-update.php/?offer_id=' . $row['id'] . '" class="btn btn-light" role="button" aria-pressed="true">Edytuj</a></td>                    
                </tr>';
            }
        ?>
        </tbody>
    </table>
</body>
</html>

<?php  	
	// Step 4: Release returned data
	mysqli_free_result($result);
	
	// Step 5: Close connection
    mysqli_close($connection);

    // Garbage collector - garbage collector is automatic if variable is out of the scope
    unset($data);
?>
