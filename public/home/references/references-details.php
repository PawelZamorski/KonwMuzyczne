<!-- Get data from the database -->
<?php
    session_start();
    $lang = $_SESSION['lang']; // Get language

    $references_category_id = $_GET["references_category_id"];

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
    $result = mysqli_query($connection, "SELECT * 
        FROM references_category_translation, languages
        WHERE references_category_id = $references_category_id

        AND references_category_translation.languages_id = languages.id
        AND languages.code = '$lang';");

    // Step 3: Use returned data
    $data = mysqli_fetch_assoc($result);
	// Step 4: Release returned data
	mysqli_free_result($result);

    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT references_translation.long_desc
        FROM references_translation, languages
        WHERE references_translation.references_category_id = $references_category_id

        AND references_translation.languages_id = languages.id
        AND languages.code = '$lang';");

?>

<!DOCTYPE html>
<html>
<head lang="pl-PL">
    <?php
        $title = $data['heading_3'];
        require(__DIR__ . '/../../../templates/head.php');
    ?>
</head>
<body>
    <!-- Facebook Chat -->
    <?php require(__DIR__ . '/../../../lib/facebook/chat.php') ?>
    <!-- End of Facebook Chat -->

    <!-- Preloader -->
    <?php require(__DIR__ . '/../../../templates/preloader.php') ?>
    <!-- End of Preloader-->

    <!-- Page Border -->
    <?php require(__DIR__ . '/../../../templates/page-border.php') ?>
    <!-- End of Page Border -->

    <!--Wrapper-->
    <div id="wrapper">
        <header id="banner" class="scrollto clearfix landing-page" data-enllax-ratio=".5">
            <!-- Menu -->
            <?php require(__DIR__ . '/../../../templates/menu.php') ?>
            <!-- End of Menu -->
        </header>
        <!--Main Content Area-->
        <main id="content">
            <!-- References Parents -->
            <section class="introduction scrollto">
                <div class="row clearfix">
                    <div class="col-3">
                        <div class="section-heading">
                            <h3><?php echo $data['heading_3'] ?></h3>
                            <h2 class="section-title"><?php echo $data['heading_2'] ?></h2>
                            <p class="section-subtitle"><?php echo $data['short_desc'] ?></p>
                        </div>
                    </div>
                    <div class="col-2-3">
                        <?php 
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                echo $row['long_desc'];
                            }
                        ?>
                    </div>
                </div>
            </section>
            <!--End of References Parents -->
        </main>
        <!-- End of Main Content Area -->
        <!--Footer-->
        <?php require(__DIR__ . '/../../../templates/footer.php'); ?>
        <!--End of Footer-->
    </div>
	<!--End of Wrapper-->

    <!-- JavaScript -->
    <?php
    require(__DIR__ ."/../../../templates/js-resources.php");
    ?>
    <!-- End of Javascript -->
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