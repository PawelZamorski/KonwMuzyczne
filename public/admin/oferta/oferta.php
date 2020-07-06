<!-- Get data from the database -->
<?php

    session_start();
    $lang = $_SESSION['lang'];

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
    $result = mysqli_query($connection, "SELECT offer.id as id, category_translation.category, course_type_translation.type, course_name_translation.course_name 
        FROM offer, category_translation, course_type_translation, course_name_translation, courses, languages 
        WHERE courses.id = offer.courses_id

        AND course_name_translation.course_name_id = courses.course_name_id
        AND course_name_translation.languages_id = languages.id

        AND category_translation.category_id = offer.category_id
        AND category_translation.languages_id = languages.id

        AND course_type_translation.course_type_id = courses.course_type_id
        AND course_type_translation.languages_id = languages.id

        AND languages.code = '$lang';");
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
