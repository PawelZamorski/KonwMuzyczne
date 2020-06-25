<!-- Get data from the database -->
<?php
    require(__DIR__ . '/../../../config/config.php');

    $employee_id = $_GET["employee_id"];
	
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
    $result = mysqli_query($connection, "SELECT name, long_desc, img, course_name 
        FROM employee, course_name 
        WHERE employee.id = $employee_id
        AND employee.course_name_id = course_name.id;");

    // Step 3: Use returned data
    $data = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
    <head lang="pl-PL">
        <?php
            $title = $data['name'];
            require(__DIR__ . '/../../../templates/head.php');
        ?>
    </head>
    <body>
        <!-- Preloader -->
        <div id="preloader">
            <div id="status" class="la-ball-triangle-path">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <!--End of Preloader-->
        <div class="page-border" data-wow-duration="0.7s" data-wow-delay="0.2s">
            <div class="top-border wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"></div>
            <div class="right-border wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;"></div>
            <div class="bottom-border wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"></div>
            <div class="left-border wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
        </div>
        <div id="wrapper">
            <header id="banner" class="scrollto clearfix" data-enllax-ratio=".5">
                <?php require(__DIR__ . '/../../../templates/menu.php'); ?>
            </header>
        </div>
        <!--Main Content Area-->
        <main id="content">
            <!-- Employee -->
            <section id="about" class="introduction scrollto fixpaddings">
                <div class="row clearfix">
                    <div class="col-1">
                        <div class="section-heading">
                            <h3><?php echo $data['course_name'] ?></h3>
                            <h2 class="section-title"><?php echo $data['name'] ?></h2>
                        </div>
                    </div>
                    <div class="col-3">
                        <p><img src="<?php echo $data['img'] ?>" alt="<?php echo $data['name'] ?>" class="topMargin"></p>
                    </div>
                    <div class="col-3">
                        <?php echo $data['long_desc'] ?>
                    </div>
                </div>
            </section>
        <!--End of Employee -->
        <!--Footer-->
        <?php require(__DIR__ . '/../../../templates/footer.php'); ?>
        <!--End of Footer-->
    </div>
    <!-- Include JavaScript resources -->
    <script src="/js/jquery.1.8.3.min.js"></script>
    <script src="/js/wow.min.js"></script>
    <script src="/js/featherlight.min.js"></script>
    <script src="/js/featherlight.gallery.min.js"></script>
    <script src="/js/jquery.enllax.min.js"></script>
    <script src="/js/jquery.scrollUp.min.js"></script>
    <script src="/js/jquery.easing.min.js"></script>
    <script src="/js/jquery.waypoints.min.js"></script>
    <script src="/js/images-loaded.min.js"></script>
    <script src="/js/lightbox.min.js"></script>
    <script src="/js/site.js"></script>
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