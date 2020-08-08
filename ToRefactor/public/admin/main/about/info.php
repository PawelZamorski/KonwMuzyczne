<?php
    //$lang = $_SESSION['lang']; // Get language

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
    $result = mysqli_query($connection, "SELECT info.id, info.heading_3, info.heading_2, info.short_desc, info.long_desc
        FROM main_about_info_translation as info, languages as l
        WHERE info.languages_id = l.id
        AND l.code = '$lang';");

    // Step 3: Use returned data
    $data = mysqli_fetch_assoc($result);
?>

<?php
    echo
    '<form id="offerForm" action="/admin/main/about/info-crud-update.php" method="post">
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
                    <th scope="col">Krótki Opis</th>
                    <td><textarea id="shortDesc" class="form-control" name="short_desc" cols="100">' . $data['short_desc'] . '</textarea></td>
                </tr>
                <tr>
                    <th scope="col">Długi Opis</th>
                    <td><textarea id="longDesc" class="form-control" name="long_desc" cols="100">' . $data['long_desc'] . '</textarea></td>
                </tr>';
    ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Aktualizuj</button>
    </form>

    <h2>Podgląd</h2>
    <hr>
</div>
<!-- End of Table -->
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-3">
            <div class="section-heading">
                <h3 id="heading3In"></h3>
                <h2 id="heading2In" class="section-title"></h2>
                <p id="shortDescIn" class="section-subtitle"></p>
            </div>
        </div>
        <div id="longDescIn" class="col-2">
        </div>
    </div>
</div>

<?php  	
	// Step 4: Release returned data
	mysqli_free_result($result);
	
	// Step 5: Close connection
    mysqli_close($connection);

?>
