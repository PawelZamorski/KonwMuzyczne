<!-- Get data from the database -->
<?php
    require(__DIR__ . '/../../../config/config.php');
    
    $offer_id = $_GET['offer_id'];
	
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

    // Get main data
	// Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT course_name.course_name, courses.long_desc, courses.short_desc, courses.img, courses.movie, common_desc.common_desc, category.category, course_type.type 
        FROM courses, course_name, offer, category, course_type, common_desc  
        WHERE offer.id=$offer_id 
        AND courses.id = offer.courses_id 
        AND category.id = offer.category_id 
        AND course_name.id = courses.course_name_id
        AND course_type.id = courses.course_type_id
        AND common_desc.id = courses.common_desc_id;");
    // Step 3: Use returned data
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // Step 4: Release returned data
    mysqli_free_result($result);
    
    // Get unique data from category
    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT id, category FROM category;");    
    // Step 3: Use returned data
    $data_category = ""; // string that is displayed in the table
    $array_category = array(); // array for JS function
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $array_category[$row['id']] = $row['category'];

        if ($row['category'] == $data['category']) {
            $data_category .= '<option value="' . $row['id'] . '" selected>' . $row['category'] . '</option>';
        } else {
            $data_category .= '<option value="' . $row['id'] . '">' . $row['category'] . '</option>';
        }
    }
    // Step 4: Release returned data
    mysqli_free_result($result);

    // Get unique data from course_type
    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT id, course_type.type FROM course_type;");    
    // Step 3: Use returned data
    $data_course_type = ""; // string that is displayed in the table
    $array_course_type = array(); // array for JS function
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $array_course_type[$row['id']] = $row['type'];

        if ($row['type'] == $data['type']) {
            $data_course_type .= '<option value="' . $row['id'] . '" selected>' . $row['type'] . '</option>';
        } else {
            $data_course_type .= '<option value="' . $row['id'] . '">' . $row['type'] . '</option>';
        }
    }
    // Step 4: Release returned data
    mysqli_free_result($result);

    // Get unique data from course_name
    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT id, course_name FROM course_name;");    
    // Step 3: Use returned data
    $data_course_name = ""; // string that is displayed in the table
    $array_course_name = array(); // array for JS function
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $array_course_name[$row['id']] = $row['course_name'];

        if ($row['course_name'] == $data['course_name']) {
            $data_course_name .= '<option value="' . $row['id'] . '" selected>' . $row['course_name'] . '</option>';
        } else {
            $data_course_name .= '<option value="' . $row['id'] . '">' . $row['course_name'] . '</option>';
        }
    }
    // Step 4: Release returned data
    mysqli_free_result($result);

    // Get unique data from common_desc
    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT id, common_desc FROM common_desc;");    
    // Step 3: Use returned data
    $data_common_desc = ""; // string that is displayed in the table
    $array_common_desc = array(); // array for JS function
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $array_common_desc[$row['id']] = $row['common_desc'];

        if ($row['common_desc'] == $data['common_desc']) {
            $data_common_desc .= '<option value="' . $row['id'] . '" selected>' . $row['common_desc'] . '</option>';
        } else {
            $data_common_desc .= '<option value="' . $row['id'] . '">' . $row['common_desc'] . '</option>';
        }
    }
    // Step 4: Release returned data
    mysqli_free_result($result);

?>

<!DOCTYPE html>
<html>
<head lang="pl-PL">
    <?php 
        $title = 'Oferta edycja | Panel administracyjny';
        require(__DIR__ . '/../templates/head-admin.php');
    ?>
</head>
<body>
<!-- Container -->
<div class="container-fluid">
    <?php require(__DIR__ . '/../templates/menu-admin.php'); ?>

    <?php
    echo
    '<form id="offerForm" action="/admin/oferta/oferta-crud-update.php" method="post">
        <input name="offer_id" value="' . $offer_id . '" hidden>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Element</th>
                    <th scope="col">Zawartość</th>
                </tr>
            </thead>
            <tbody id="data">
                <tr>
                    <th scope="row">Kategoria</th>
                    <td><select id="category" class="form-control custom-select mb-3" name="category_id">' . $data_category .'</select></td>
                </tr>
                <tr>
                    <th scope="row">Typ kursu</th>
                    <td><select id="courseType" class="form-control custom-select mb-3" name="course_type_id">' . $data_course_type .'</select></td>
                </tr>
                <tr>
                    <th scope="col">Nazwa kursu</th>
                    <td><select id="courseName" class="form-control custom-select mb-3" name="course_name_id">' . $data_course_name .'</select></td>
                </tr>
                <tr>
                    <th scope="col">Krótki opis</th>
                    <td><textarea id="shortDesc" class="form-control" name="short_desc" cols="100">' . $data['short_desc'] . '</textarea></td>
                </tr>
                <tr>
                    <th scope="col">Wspólny opis</th>
                    <td><select id="commonDesc" class="form-control custom-select mb-3" name="common_desc_id">' . $data_common_desc . '</select></td>
                </tr>
                <tr>
                    <th scope="col">Długi opis</th>
                    <td><textarea id="longDesc" class="form-control" name="long_desc" cols="100" oninput="display(this)">' . $data['long_desc'] . '</textarea></td>
                </tr>
                <tr>
                    <th scope="col">Zdjęcie</th>
                    <td><input id="img" class="form-control" type="text" name="img" value="' . $data['img'] . '"></td>
                </tr>
                <tr>
                    <th scope="col">Film</th>
                    <td><input id="movie" class="form-control" type="text" name="movie" value="' . $data['movie'] . '"></td>
                </tr>';
    ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary btn-lg btn-block" onclick="submitForm(this)">Aktualizuj</button>
    </form>

    <h2>Podgląd oferty</h2>
    <hr>
</div>
<!-- End of Container -->
<!-- Container -->
<div class="container">
<!-- Main Content Area -->
<main id="content">
    <!-- Course Details -->
    <section id="about" class="introduction scrollto">
        <div class="row clearfix">
            <div class="col-3">
                <div class="section-heading">
                    <h3 id="categoryIn" class="uppercase"></h3>
                    <h2 id="courseNameIn" class="section-title"></h2>
                    <p>
                        <img id="imgIn" src="" alt=""/>
                    </p>
                </div>
            </div>
            <div class="col-2-3 alignToPhoto">
                <!-- Youtube Movie-->
                <div>
                    <div class="iframe-container">
                        <iframe id="movieIn" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <!--End of Youtube Movie-->
                <div class="myTooltip">
                    <span class="tooltiptext">Krótki opis</span>
                    <div id="shortDescIn"></div>
                </div>
                <div class="myTooltip">
                    <span class="tooltiptext">Wspólny opis</span>
                    <div id="commonDescIn" class="myTooltip"></div>
                </div>
                <div class="myTooltip">
                    <span class="tooltiptext">Długi opis</span>
                    <div id="longDescIn" class="myTooltip"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Course Details -->
</main>
</div>
<!-- End of Container -->


<!-- Proagate table and build element on load function -->
<script>
    // Build JS array from PHP array

    // function -> select category 
    array_category = <?php echo json_encode($array_category); ?>;
    // Built element on load
    window.addEventListener('load', (event) => {
        document.getElementById("categoryIn").innerHTML = array_category[document.getElementById("category").value];
    });
    // Add event listener
    document.getElementById("category").addEventListener("change", function(){
        document.getElementById("categoryIn").innerHTML = array_category[this.value];
    });

    // function -> select course name 
    array_course_name = <?php echo json_encode($array_course_name); ?>;
    // Built element on load
    window.addEventListener('load', (event) => {
        document.getElementById("courseNameIn").innerHTML = array_course_name[document.getElementById("courseName").value];
    });
    // Add event listener
    document.getElementById("courseName").addEventListener("change", function(){
        document.getElementById("courseNameIn").innerHTML = array_course_name[this.value];
    });

    // function -> short description
    // Built element on load
    window.addEventListener('load', (event) => {
        document.getElementById("shortDescIn").innerHTML = document.getElementById("shortDesc").value;
    });
    // Add event listener
    document.getElementById("shortDesc").addEventListener("input", function(){
        document.getElementById("shortDescIn").innerHTML = document.getElementById("shortDesc").value;
    });

    // function -> select course name 
    array_common_desc = <?php echo json_encode($array_common_desc); ?>;
    // Built element on load
    window.addEventListener('load', (event) => {
        document.getElementById("commonDescIn").innerHTML = array_common_desc[document.getElementById("commonDesc").value];
    });
    // Add event listener
    document.getElementById("commonDesc").addEventListener("change", function(){
        document.getElementById("commonDescIn").innerHTML = array_common_desc[this.value];
    });

    // function -> long description
    // Built element on load
    window.addEventListener('load', (event) => {
        document.getElementById("longDescIn").innerHTML = document.getElementById("longDesc").value;
    });
    // Add event listener
    document.getElementById("longDesc").addEventListener("input", function(){
        document.getElementById("longDescIn").innerHTML = document.getElementById("longDesc").value;
    });

    // function -> img
    // Built element on load
    window.addEventListener('load', (event) => {
        document.getElementById("imgIn").src = document.getElementById("img").value;
        document.getElementById("imgIn").alt = "Zdjęcie " + document.getElementById("img").value;
    });
    // Add event listener
    document.getElementById("img").addEventListener("input", function(){
        document.getElementById("imgIn").src = document.getElementById("img").value;
        document.getElementById("imgIn").alt = "Zdjęcie " + document.getElementById("img").value;
    });

    // function -> movie
    // Built element on load
    window.addEventListener('load', (event) => {
        document.getElementById("movieIn").src = document.getElementById("movie").value;
    });
    // Add event listener
    document.getElementById("movie").addEventListener("input", function(){
        document.getElementById("movieIn").src = document.getElementById("movie").value;
    });

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

<?php	
	// Step 5: Close connection
    mysqli_close($connection);

    // Garbage collector - garbage collector is automatic if variable is out of the scope
    unset($data);
?>
