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
    $result = mysqli_query($connection, "SELECT ft.id, ft.main_facts_id, f.icon, ft.fact
        FROM main_facts as f, main_facts_translation as ft, languages as l
        WHERE ft.main_facts_id = f.id
        AND ft.languages_id = l.id
        AND l.code = '$lang';");

?>

<?php
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    echo
    '<form action="/admin/main/about/facts-crud-update.php" method="post">
        <input type="text" name="id" value="' . $row['id'] . '" readonly hidden>
        <input type="text" name="main_facts_id" value="' . $row['main_facts_id'] . '" readonly hidden>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Element</th>
                    <th scope="col">Zawartość</th>
                </tr>
            </thead>
            <tbody id="data">
            <tr>
                <th scope="col">Ikona (TODO: musi by jako favicon)</th>
                <td><textarea class="form-control" name="icon" cols="100">' . $row['icon'] . '</textarea></td>
            </tr>
                <tr>
                    <th scope="col">Opis</th>
                    <td><textarea class="form-control" name="fact" cols="100">' . $row['fact'] . '</textarea></td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Aktualizuj</button>
    </form>';
    }
?>


    <h2>Podgląd</h2>
    <hr>
</div>
<!-- End of Table -->
<div class="container-fluid">
    <!--Content Section-->
    <div id="facts" class="scrollto clearfix spacious">
        <div class="row no-padding-bottom clearfix">

        <?php
        mysqli_data_seek($result, 0);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            echo
            '<div class="col-2 icon-block icon-top wow fadeInUp" data-wow-delay="0.1s">
                <!--Icon-->
                <div class="icon">
                    <i class="fa ' . $row['icon'] . ' fa-2x"></i>
                </div>
                <div class="icon-block-description">
                    ' . $row['fact'] . '
                </div>
            </div>';
            }
        ?>

        </div>
    </div>

</div>

<?php  	
	// Step 4: Release returned data
	mysqli_free_result($result);
	
	// Step 5: Close connection
    mysqli_close($connection);

?>
