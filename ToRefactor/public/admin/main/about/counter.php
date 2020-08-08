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
    $result = mysqli_query($connection, "SELECT mct.id, mct.heading_3, mct.short_desc, mct.main_counter_id, mc.counter
        FROM main_counter as mc, main_counter_translation as mct, languages as l
        WHERE mct.languages_id = l.id
        AND mct.main_counter_id = mc.id
        AND l.code = '$lang';");

?>


<?php
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    echo
    '<form action="/admin/main/about/counter-crud-update.php" method="post">
        <input type="text" name="id" value="' . $row['id'] . '" readonly hidden>
        <input type="text" name="main_counter_id" value="' . $row['main_counter_id'] . '" readonly hidden>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Element</th>
                    <th scope="col">Zawartość</th>
                </tr>
            </thead>
            <tbody id="data">
                <tr>
                    <th scope="col">Tytuł</th>
                    <td><textarea id="heading3" class="form-control" name="heading_3" cols="100">' . $row['heading_3'] . '</textarea></td>
                </tr>
                <tr>
                    <th scope="col">Krótki Opis</th>
                    <td><textarea id="shortDesc" class="form-control" name="short_desc" cols="100">' . $row['short_desc'] . '</textarea></td>
                </tr>
                <tr>
                    <th scope="col">Licznik</th>
                    <td><textarea id="counter" class="form-control" name="counter" cols="100">' . $row['counter'] . '</textarea></td>
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

    <div id="counter" class="secondary-color text-center clearfix " style="margin-bottom: 20px;">
        <?php
        mysqli_data_seek($result, 0);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            echo
            '<div class="pricing-block col-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="pricing-block-content">
                    <h3>' . $row['heading_3'] . '</h3>
                    <span class="count">' . $row['counter'] . '</span>
                    <br />
                    ' . $row['short_desc'] . '
                </div>
            </div>';
        }
        ?>
    </div>
</div>
<?php  	
	// Step 4: Release returned data
	mysqli_free_result($result);
	
	// Step 5: Close connection
    mysqli_close($connection);
?>
