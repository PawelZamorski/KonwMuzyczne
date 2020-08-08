<?php
    $lang = $_SESSION['lang'];
    require(__DIR__ . '/../config/config.php');

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
    $result_menu = mysqli_query($connection, "SELECT menu.sort_index, menu.code, menu_translation.nav_link
        FROM menu, menu_translation, languages
        WHERE menu_translation.menu_id = menu.id

        AND menu_translation.languages_id = languages.id
        AND languages.code = '$lang';");

?>

<div id="header" class="nav-collapse">
    <div class="row clearfix">
        <div class="col-1">
            <div id="logo">
                <a href="index.html"><img src="/images/logo-mini.png" id="navigation-logo" alt="Landing Page" /></a>
            </div>
            <aside>
                <!--Social Icons in Header-->
                <ul class="social-icons">
                    <li>
                        <a title="Dla Polskich Studentów" href="/?lang=pl">
                            <img src="/images/flags/poland.png" />
                        </a>
                    </li>
                    <li>
                        <a title="For Vietnamese Students" href="/?lang=vi">
                            <img src="/images/flags/vietnam.png" />
                        </a>
                    </li>
                    <li>
                        <a title="For English Students" href="/?lang=en">
                            <img src="/images/flags/england.png"  />
                        </a>
                    </li>
                    <li>
                        <a title="For Chinese Students" href="/?lang=zh">
                            <img src="/images/flags/china.png" />
                        </a>
                    </li>
                    <li>
                        <a id="fb-icon" target="_blank" title="facebook" href="https://www.facebook.com/konwersatoriummuzyczne/">
                            <img src="/images/flags/fb-art.png" />
                        </a>
                    </li>
                    <li>
                        <a target="_blank" title="instagram" href="https://www.instagram.com/konwersatoriummuzyczne/">
                            <img src="/images/flags/ig-art.png" />
                        </a>
                    </li>
                    <li>
                        <a target="_blank" title="YouTube" href="https://www.youtube.com/channel/UCpISipwaVRA4S16_j3ntGWA">
                            <img src="/images/flags/yt-art.png" />
                        </a>
                    </li>
                </ul>
                <!--End of Social Icons in Header-->
            </aside>
            <!--Main Navigation-->

            <?php

                // for the JavaScript menu scroll to work
                $a = '';
// TODO: check the following code, especially $a = '/index.php';. configure htaccess and apache
                if ($_SERVER['PHP_SELF'] != '/index.php') {
                    $a = '/index.php';
                }

            ?>
            
            <nav id="nav-main">
                <ul>
                <?php
                    while($row = mysqli_fetch_array($result_menu, MYSQLI_ASSOC)){
                        echo 
                        '<li>
                            <a href="' . $a . '#' . $row['code'] . '">' . $row['nav_link'] . '</a>
                        </li>';
                    }
                ?>
                    <li class="mobile-links">
                        <a title="Dla Polskich Studentów" href="/?lang=pl">
                            <img src="/images/flags/poland.png" />
                        </a>
                    </li>
                    <li class="mobile-links">
                        <a title="For Vietnamese Students" href="/?lang=vi">
                            <img src="/images/flags/vietnam.png" />
                        </a>
                    </li>
                    <li class="mobile-links">
                        <a title="For English Students" href="/?lang=en">
                            <img src="/images/flags/england.png"  />
                        </a>
                    </li>
                    <li class="mobile-links">
                        <a title="For Chinese Students" href="/?lang=zh">
                            <img src="/images/flags/china.png" />
                        </a>
                    </li>
                    <li class="mobile-links">
                        <a href="https://www.facebook.com/konwersatoriummuzyczne/"><img src="/images/flags/fb-art.png">Dołącz do nas na Facebooku</a>
                    </li>
                    <li class="mobile-links">
                        <a href="https://www.instagram.com/konwersatoriummuzyczne/"><img src="/images/flags/fb-art.png">Dołącz do nas na Instagram</a>
                    </li>
                    <li class="mobile-links">
                        <a href="https://www.youtube.com/channel/UCpISipwaVRA4S16_j3ntGWA" target="_blank"><img src="/images/flags/yt-art.png">Sprawdź nasz kanał YouTube</a>
                    </li>
                </ul>
            </nav>
            <!--End of Main Navigation-->
            <div id="nav-trigger">
                <span></span>
            </div>
            <nav id="nav-mobile">
            </nav>
        </div>
    </div>
</div>
<!--End of Header-->

<?php  	
	// Step 4: Release returned data
	mysqli_free_result($result_menu);
	
	// Step 5: Close connection
    mysqli_close($connection);
?>