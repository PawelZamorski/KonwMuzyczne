<?php
session_start();

// set up language
$_SESSION['lang'] = 'pl'; // default language

if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    if ($lang === 'pl' || $lang === 'en' || $lang === 'zh' || $lang === 'vi' ) { // use language code
        $_SESSION['lang'] = $lang;
    }
}

?>

<!DOCTYPE html>
<html>
<head lang="<?php echo $_SESSION['lang'] ?>">
    <?php
        $title = 'Konwersatorium Muzyczne w Warszawie';
        require(__DIR__ . '/../templates/head.php');
    ?>

    <!--  Google recaptcha -->
    <?php require(__DIR__ . '/../lib/google/recaptcha-js.php') ?>
    <!-- End of Google recaptcha -->

    <!-- Facebook Pixel Code -->
    <?php require(__DIR__ . '/../lib/facebook/pixel.php') ?>
    <!-- End of Facebook Pixel Code -->
</head>
<body>
    <!-- Facebook Chat -->
    <?php require(__DIR__ . '/../lib/facebook/chat.php') ?>
    <!-- End of Facebook Chat -->

    <!-- Preloader -->
    <?php require(__DIR__ . '/../templates/preloader.php') ?>
    <!-- End of Preloader-->
    
    <!-- Page Border -->
    <?php require(__DIR__ . '/../templates/page-border.php') ?>
    <!-- End of Page Border -->
    
    <!--Wrapper-->
	<div id="wrapper">
		<header id="banner" class="scrollto clearfix landing-page" data-enllax-ratio=".5">
            <!-- Menu -->
            <?php require(__DIR__ . '/../templates/menu.php') ?>
            <!-- End of Menu -->

			<!--Banner Content-->
    		<?php require(__DIR__ . '/home/main/banner/banner.php') ?>
			<!--End of Banner -->
        </header>
		<!--Main Content Area-->
		<main id="content">
            <!-- About -->
            <?php require(__DIR__ . '/home/main/about/about.php') ?>        
			<!-- End of About -->
            
            <!--Movies Gallery-->
            <?php require(__DIR__ . '/home/main/movies-gallery/movies-gallery.php') ?>
			<!--End of Movies Gallery-->
            
			<!-- Main Offer -->
    		<?php require(__DIR__ . '/home/oferta/oferta-main.php') ?>
			<!-- End of Main Offer -->

			<!-- Special Offer -->
            <?php require(__DIR__ . '/home/main/special-offer/special-offer-main.php') ?>
            <!-- End of Special Offer -->

			<!--Gallery-->
            <?php require(__DIR__ . '/home/main/gallery/gallery.php') ?>
			<!--End of Gallery-->

            <!-- Main Nauczyciele -->
            <?php require(__DIR__ . '/home/nauczyciele/nauczyciele-main.php') ?>
			<!-- End of Main Nauczyciele -->

            <!-- References-->
            <?php require(__DIR__ . '/home/main/references/references.php') ?>
            <!-- End of References-->
            
            <!-- Contact -->
            <?php require(__DIR__ . '/home/main/contact/contact.php') ?>
            <!-- End of Contact -->

		</main>
		<!--End of Main Content Area-->
		<!--Footer-->
        <?php
        require(__DIR__ ."/../templates/footer.php");
        ?>
		<!--End of Footer-->
    </div>
	<!--End of Wrapper-->
    
    <!-- JavaScript -->
    <?php
    require(__DIR__ ."/../templates/js-resources.php");
    ?>
    <!-- End of Javascript -->
</body>
</html>