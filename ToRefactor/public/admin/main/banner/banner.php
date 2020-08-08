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
    $result = mysqli_query($connection, "SELECT b.id, b.img, bt.name, bt.long_desc, bt.button, l.id as languages_id
        FROM main_banner as b, main_banner_translation as bt, languages as l
        WHERE bt.main_banner_id = b.id
        AND bt.languages_id = l.id
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
        '<form id="offerForm" action="/admin/main/banner/banner-crud-update.php" method="post">
            <input type="text" name="id" value="' . $data['id'] . '" readonly hidden>
            <input type="text" name="languages_id" value="' . $data['languages_id'] . '" readonly hidden>
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Element</th>
                        <th scope="col">Zawartość</th>
                    </tr>
                </thead>
                <tbody id="data">
                    <tr>
                        <th scope="col">Nazwa</th>
                        <td><textarea id="name" class="form-control" name="name" cols="100">' . $data['name'] . '</textarea></td>
                    </tr>
                    <tr>
                        <th scope="col">Opis</th>
                        <td><textarea id="longDesc" class="form-control" name="long_desc" cols="100">' . $data['long_desc'] . '</textarea></td>
                    </tr>
                    <tr>
                        <th scope="col">Przycisk</th>
                        <td><textarea id="button" class="form-control" name="button" cols="100">' . $data['button'] . '</textarea></td>
                    </tr>
                    <tr>
                        <th scope="col">Zdjęcie</th>
                        <td><input id="img" class="form-control" type="text" name="img" value="' . $data['img'] . '"></td>
                    </tr>';
        ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary btn-lg btn-block" onclick="submitForm(this)">Aktualizuj</button>
        </form>

        <h2>Podgląd</h2>
        <hr>
    </div>
    <!-- End of Table -->
    <div class="container-fluid">
        <header id="banner" class="scrollto clearfix landing-page" data-enllax-ratio=".5">
            <div id="banner-content" class="row clearfix transp-background">
                <div class="col-38">
                    <div class="section-heading">
                        <h1 id="nameIn" class="capitalize"></h1>
                        <h2 id="longDescIn" ><?php echo $data['long_desc'] ?></h2>
                    </div>
                    <!--Call to Action-->
                    <a id="buttonIn" href="#kontakt" class="button color-white border-gold" id="call-to-action"><?php echo $data['button'] ?></a>
                    <!--End Call to Action-->
                </div>
            </div>
        </header>
    </div>


<!-- Propagate table and build element on load function -->
<script>
    // Build JS array from PHP array

    // function -> name
    // Built element on load
    window.addEventListener('load', (event) => {
        document.getElementById("nameIn").innerHTML = document.getElementById("name").value;
    });
    // Add event listener
    document.getElementById("name").addEventListener("input", function(){
        document.getElementById("nameIn").innerHTML = document.getElementById("name").value;
    });

    // function -> long_desc
    // Built element on load
    window.addEventListener('load', (event) => {
        document.getElementById("longDescIn").innerHTML = document.getElementById("longDesc").value;
    });
    // Add event listener
    document.getElementById("longDesc").addEventListener("input", function(){
        document.getElementById("longDescIn").innerHTML = document.getElementById("longDesc").value;
    });

    // function -> button
    // Built element on load
    window.addEventListener('load', (event) => {
        document.getElementById("buttonIn").innerHTML = document.getElementById("button").value;
    });
    // Add event listener
    document.getElementById("button").addEventListener("input", function(){
        document.getElementById("buttonIn").innerHTML = document.getElementById("button").value;
    });

// TODO: image is in background via CSS
    // function -> img
    // Built element on load
//    window.addEventListener('load', (event) => {
//        document.getElementById("imgIn").src = document.getElementById("img").value;
//        document.getElementById("imgIn").alt = "Zdjęcie " + document.getElementById("img").value;
//    });
    // Add event listener
//    document.getElementById("img").addEventListener("input", function(){
//        document.getElementById("imgIn").src = document.getElementById("img").value;
//        document.getElementById("imgIn").alt = "Zdjęcie " + document.getElementById("img").value;
//    });

</script>

<!-- textarea function -->
<script>
    const tx = document.getElementsByTagName('textarea');
    for (let i = 0; i < tx.length; i++) {
        tx[i].setAttribute('style', 'height:' + (tx[i].scrollHeight) + 'px;overflow-y:hidden;');        
        tx[i].addEventListener("input", OnInput, false);
    }

    function OnInput() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    }

</script>

<script>
    function submitForm() {
        const element = document.getElementById("offerForm");
        element.submit();
    }
</script>
</body>
</html>