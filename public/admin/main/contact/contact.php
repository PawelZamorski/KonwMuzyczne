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
        FROM main_contact_translation, languages as l
        WHERE languages_id = l.id
        AND l.code = '$lang';");

    // Step 3: Use returned data
    $data = mysqli_fetch_assoc($result);


    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT t.id, detail
        FROM main_contact_details_translation as t, languages as l
        WHERE languages_id = l.id
        AND l.code = '$lang';");

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
    '<form action="/admin/main/contact/contact-crud-update.php" method="post">
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
                    <th scope="col">Email: imię</th>
                    <td><textarea class="form-control" name="email_name" cols="100">' . $data['email_name'] . '</textarea></td>
                </tr>
                <tr>
                    <th scope="col">Email: adres email</th>
                    <td><textarea class="form-control" name="email_email" cols="100">' . $data['email_email'] . '</textarea></td>
                </tr>
                <tr>
                    <th scope="col">Email: message</th>
                    <td><textarea class="form-control" name="email_message" cols="100">' . $data['email_message'] . '</textarea></td>
                </tr>
                <tr>
                    <th scope="col">Button</th>
                    <td><textarea class="form-control" name="button" cols="100">' . $data['button'] . '</textarea></td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Aktualizuj</button>
    </form>';
?>

<?php
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    echo
    '<form action="/admin/main/contact/contact-details-crud-update.php" method="post">
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
                    <th scope="col">Tytuł</th>
                    <td><textarea class="form-control" name="detail" cols="100">' . $row['detail'] . '</textarea></td>
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
    <section id="kontakt" class="scrollto text-center" data-enllax-ratio=".2">
        <div class="section-heading">
            <h3><?php echo $data['heading_3'] ?></h3>
            <h2 class="section-title"><?php echo $data['heading_2'] ?></h2>
        </div>
        <div class="row clearfix">
            <div class="col-2">
                <div class="google-maps">
    <!--                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4887.590899055631!2d21.009294!3d52.228934!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471eccf2e795e4bb%3A0xdab272eb2a228b21!2sAleje+Jerozolimskie+47%2C+Warszawa%2C+Poland!5e0!3m2!1sen!2spl!4v1504094526830" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                </div>
            </div>
            <div class="col-2"> 
                <form id="ajax-contact" method="post" action="/mailer.php">
                    <div class="field">
                        <input type="text" id="name" name="name" placeholder="<?php echo $data['email_name'] ?>" required>
                    </div>
                    <div class="field">
                        <input type="email" id="email" name="email" placeholder="<?php echo $data['email_email'] ?>" required>
                    </div>
                    <div class="field">
                        <textarea id="message" name="message" placeholder="<?php echo $data['email_message'] ?>" required></textarea>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LePgS8UAAAAACsBnGlHt1kk4lZrlxsvQFsy8GQR">
                    </div>
                    <div class="field">
                        <button id="button" class="button" type="submit"><?php echo $data['button'] ?></button>
                    </div>
                </form>
                <div id="form-messages">
                    <p></p>
                </div>
            </div>
        </div>
        <div id="address" class="row clearfix">
        <?php
            mysqli_data_seek($result, 0);

            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                echo
                '<div class="col-3">' . $row['detail'] . '</div>';
            }
        ?>
        </div>
    </section>
</div>
<?php
	// Step 4: Release returned data
	mysqli_free_result($result);
	
	// Step 5: Close connection
    mysqli_close($connection);

?>
