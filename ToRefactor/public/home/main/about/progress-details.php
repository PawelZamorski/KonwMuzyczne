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
    $result = mysqli_query($connection, "SELECT heading_3, heading_2, short_desc, long_desc
        FROM main_progress_heading_translation, languages as l
        WHERE languages_id = l.id
        AND l.code = '$lang';");

    // Step 3: Use returned data
    $data = mysqli_fetch_assoc($result);

    // Step 4: Release returned data
    mysqli_free_result($result);

    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT short_desc, percent
        FROM main_progress_translation, languages as l
        WHERE languages_id = l.id
        AND l.code = '$lang';");

?>


<!DOCTYPE html>
<html>
<head lang="pl-PL">
    <?php
        $title = 'Badania';
        require(__DIR__ . '/../../../../templates/head.php');
    ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144996818-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-144996818-1');
    </script>
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
            <!--Introduction-->
            <section class="introduction scrollto">
                <div class="row clearfix">
                    <div class="col-3">
                        <div class="section-heading">
                            <h3><?php echo $data['heading_3'] ?></h3>
                            <h2 class="section-title"><?php echo $data['heading_2'] ?></h2>
                        </div>
                    </div>
                    <div id="progress" class="col-2-3">
                    <?php echo $data['short_desc'] ?>
                    <ul class="stats" style="width:80%; margin:40px 0;">
                        <?php
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                echo 
                                '<li data-width="' . $row['percent'] . '">' . $row['short_desc'] . '<span>' . $row['percent'] . '</span></li>';
                            }
                        ?>
                    </ul>
                    <?php echo $data['long_desc'] ?>
                </div>
            </section>
        </main>
        <!--End Main Content Area-->
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

?>
