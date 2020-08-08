<?php
    session_start();
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
    $result = mysqli_query($connection, "SELECT *
        FROM main_references_translation, languages as l
        WHERE languages_id = l.id
        AND l.code = '$lang';");

    // Step 3: Use returned data
    $data = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html>
<head lang="<?php echo $lang ?>">
    <?php 
        $title = 'Nauczyciele edycja | Panel administracyjny';
        require(__DIR__ . '/../../templates/head-admin.php');
    ?>
</head>
<body>
    <?php require(__DIR__ . '/../../templates/menu-admin.php'); ?>
<div>
<?php
    echo
    '<form action="/admin/main/references/references-crud-update.php" method="post">
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
                    <td><textarea class="form-control" name="heading_3" cols="100">' . $data['heading_3'] . '</textarea></td>
                </tr>
                <tr>
                    <th scope="col">Opis</th>
                    <td><textarea class="form-control" name="heading_2" cols="100">' . $data['heading_2'] . '</textarea></td>
                </tr>
                <tr>
                    <th scope="col">Button rodzice</th>
                    <td><textarea class="form-control" name="button_1" cols="100">' . $data['button_1'] . '</textarea></td>
                </tr>
                <tr>
                    <th scope="col">Button uczniowie</th>
                    <td><textarea class="form-control" name="button_2" cols="100">' . $data['button_2'] . '</textarea></td>
                </tr>
                <tr>
                    <th scope="col">Button inne</th>
                    <td><textarea class="form-control" name="button_3" cols="100">' . $data['button_3'] . '</textarea></td>
                </tr>
                <tr>
                    <th scope="col">Partnerzy</th>
                    <td><textarea class="form-control" name="partners" cols="100">' . $data['partners'] . '</textarea></td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Aktualizuj</button>
    </form>';
?>

<h2>Podgląd</h2>
    <hr>
</div>
<!-- End of Table -->
<div class="container-fluid">
    <section id="referencje" class="scrollto text-center clearfix" data-enllax-ratio=".2" style="padding-top:15px;">
        <div class="section-heading">
            <h3><?php echo $data['heading_3'] ?></h3>
            <h2 class="section-title"><?php echo $data['heading_2'] ?></h2>
        </div>
        <div class="pricing-block col-3 wow fadeInUp" data-wow-delay="0.4s">
            <a href="referencje-rodzice.html" class="button"><?php echo $data['button_1'] ?></a>
        </div>
        <div class="pricing-block col-3 wow fadeInUp" data-wow-delay="0.4s">
            <a href="referencje-uczniowie.html" class="button"><?php echo $data['button_2'] ?></a>
        </div>
        <div class="pricing-block col-3 wow fadeInUp" data-wow-delay="0.4s">
            <a href="referencje-filmy.html" class="button"><?php echo $data['button_3'] ?></a>
        </div>
        <div class="col-1">
            <h2 class="section-title" style="font-size: 140%; margin-top: 50px;"><?php echo $data['partners'] ?></h2>
        </div>
        <div class="col-1 wow fadeInUp" data-wow-delay="0.4s">
            <ul class="partners">
                <li><img src="/images/partnerzy/partner1.jpg" /></li>
                <li><img src="/images/partnerzy/partner2.jpg" /></li>
                <li><img src="/images/partnerzy/partner3.jpg" /></li>
                <li><img src="/images/partnerzy/partner4.jpg" /></li>
                <li><img src="/images/partnerzy/partner5.jpg" /></li>
                <li><img src="/images/partnerzy/partner6.jpg" /></li>
                <li><img src="/images/partnerzy/partner7.jpg" /></li>
            </ul>
        </div>
    </section>
</div>
<?php  	
	// Step 4: Release returned data
	mysqli_free_result($result);
	
	// Step 5: Close connection
    mysqli_close($connection);

?>
