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
    $result = mysqli_query($connection, "SELECT pht.id, heading_3, heading_2, button
        FROM main_progress_heading_translation as pht, languages as l
        WHERE languages_id = l.id
        AND l.code = '$lang';");
    
    // Step 3: Use returned data
    $data = mysqli_fetch_assoc($result);

    // Step 4: Release returned data
	mysqli_free_result($result);

	// Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT pt.id, short_desc, percent
        FROM main_progress_translation as pt, languages as l
        WHERE languages_id = l.id
        AND l.code = '$lang';");

?>

<?php
    echo
    '<form action="/admin/main/about/progress-heading-crud-update.php" method="post">
        <input type="text" name="id" value="' . $data['id'] . '" readonly hidden>
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
                    <td><textarea id="heading3" class="form-control" name="heading_3" cols="100">' . $data['heading_3'] . '</textarea></td>
                </tr>
                <tr>
                    <th scope="col">Opis</th>
                    <td><textarea id="heading2" class="form-control" name="heading_2" cols="100">' . $data['heading_2'] . '</textarea></td>
                </tr>
                <tr>
                    <th scope="col">Przycisk</th>
                    <td><textarea id="button" class="form-control" name="button" cols="100">' . $data['button'] . '</textarea></td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Aktualizuj</button>
    </form>';
?>

<?php
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    echo
    '<form action="/admin/main/about/progress-crud-update.php" method="post">
        <input type="text" name="id" value="' . $row['id'] . '" readonly hidden>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Element</th>
                    <th scope="col">Zawartość</th>
                </tr>
            </thead>
            <tbody id="data">
                <tr>
                    <th scope="col">Opis</th>
                    <td><textarea class="form-control" name="short_desc" cols="100">' . $row['short_desc'] . '</textarea></td>
                </tr>
                <tr>
                    <th scope="col">Procent (TODO: musi by jako liczba%)</th>
                    <td><textarea class="form-control" name="percent" cols="100">' . $row['percent'] . '</textarea></td>
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

    <?php
    mysqli_data_seek($result, 0);

    echo
    '<div id="progress" class="secondary-color text-center clearfix " style="margin-bottom: 20px;">
        <div class="row clearfix">
            <div class="section-heading">
                <h3>' . $data['heading_3'] . '</h3>
                <h2 class="section-title">' . $data['heading_2'] . '</h2>
            </div>
            <div class="pricing-block col-1 wow fadeInUp" data-wow-delay="0.4s">
                <ul class="stats">';

                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo 
                    '<li data-width="' . $row['percent'] . '">' . $row['short_desc'] . '<span>' . $row['percent'] . '</span></li>';
                }
                echo
                '</ul>
                <!--Call to Action-->
                <a href="badania-naukowe.html" class="button" style="margin: 30px 0;">' . $data['button'] . '</a>
                <!--End Call to Action-->
            </div>
        </div>
    </div>';

    ?>

</div>

<?php  	
	// Step 4: Release returned data
	mysqli_free_result($result);
	
	// Step 5: Close connection
    mysqli_close($connection);

?>
