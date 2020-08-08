<!-- Get data from the database -->
<?php
    // TODO: offer is added only in polish -> add empty fields to other langages and then update
    $lang = 'pl';
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

    // Get unique data from category
    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT category_id, category 
        FROM category_translation, languages
        WHERE category_translation.languages_id = languages.id
        AND languages.code = '$lang';");    
    // Step 3: Use returned data
    $data_category = ""; // string that is displayed in the table
    $array_category = array(); // array for JS function
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $array_category[$row['category_id']] = $row['category'];
        $data_category .= '<option value="' . $row['category_id'] . '">' . $row['category'] . '</option>';
    }
    // Step 4: Release returned data
    mysqli_free_result($result);

    // Get unique data from course_type
    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT course_type_id, course_type_translation.type 
    FROM course_type_translation, languages    
    WHERE course_type_translation.languages_id = languages.id
    AND languages.code = '$lang';");    
    
    // Step 3: Use returned data
    $data_course_type = ""; // string that is displayed in the table
    $array_course_type = array(); // array for JS function
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $array_course_type[$row['course_type_id']] = $row['type'];
        $data_course_type .= '<option value="' . $row['course_type_id'] . '">' . $row['type'] . '</option>';
    }
    // Step 4: Release returned data
    mysqli_free_result($result);

    // Get unique data from course_name_translation
    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT course_name_id, course_name 
        FROM course_name_translation, languages
        WHERE course_name_translation.languages_id = languages.id
        AND languages.code = '$lang';");    
    // Step 3: Use returned data
    $data_course_name = ""; // string that is displayed in the table
    $array_course_name = array(); // array for JS function
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $array_course_name[$row['course_name_id']] = $row['course_name'];
        $data_course_name .= '<option value="' . $row['course_name_id'] . '">' . $row['course_name'] . '</option>';
    }
    // Step 4: Release returned data
    mysqli_free_result($result);

    // Get unique data from common_desc
    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT common_desc_id, common_desc 
        FROM common_desc_translation, languages
        WHERE common_desc_translation.languages_id = languages.id
        AND languages.code = '$lang';");    
    // Step 3: Use returned data
    $data_common_desc = ""; // string that is displayed in the table
    $array_common_desc = array(); // array for JS function
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $array_common_desc[$row['common_desc_id']] = $row['common_desc'];
        $data_common_desc .= '<option value="' . $row['common_desc_id'] . '">' . $row['common_desc'] . '</option>';
    }
    // Step 4: Release returned data
    mysqli_free_result($result);

?>

<!DOCTYPE html>
<html>
<head lang="pl-PL">
    <?php 
        $title = 'Oferta add | Panel administracyjny';
        require(__DIR__ . '/../templates/head-admin.php');
    ?>
</head>
<body>
<!-- Container -->
<div class="container-fluid">
    <?php require(__DIR__ . '/../templates/menu-admin.php'); ?>

    <?php
    echo
    '<form id="offerForm" action="/admin/oferta/oferta-crud-add.php" method="post">
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
                    <td><select id="category" class="form-control custom-select mb-3" name="category_id"><option selected>Wybierz opcję (obowiązkowe)</option>' . $data_category .'</select></td>
                </tr>
                <tr>
                    <th scope="row">Typ kursu</th>
                    <td><select id="courseType" class="form-control custom-select mb-3" name="course_type_id"><option selected>Wybierz opcję (opcjonalnie)</option>' . $data_course_type .'</select></td>
                </tr>
                <tr>
                    <th scope="col">Nazwa kursu</th>
                    <td><select id="courseName" class="form-control custom-select mb-3" name="course_name_id"><option selected>Wybierz opcję (obowiązkowe)</option>' . $data_course_name .'</select></td>
                </tr>
                <tr>
                    <th scope="col">Krótki opis</th>
                    <td><textarea id="shortDesc" class="form-control" name="short_desc" cols="100"></textarea></td>
                </tr>
                <tr>
                    <th scope="col">Wspólny opis</th>
                    <td><select id="commonDesc" class="form-control custom-select mb-3" name="common_desc_id"><option selected>Wybierz opcję (opcjonalnie)</option>' . $data_common_desc . '</select></td>
                </tr>
                <tr>
                    <th scope="col">Długi opis</th>
                    <td><textarea id="longDesc" class="form-control" name="long_desc" cols="100" oninput="display(this)"></textarea></td>
                </tr>
                <tr>
                    <th scope="col">Zdjęcie</th>
                    <td><input id="img" class="form-control" type="text" name="img" value=""></td>
                </tr>
                <tr>
                    <th scope="col">Film</th>
                    <td><input id="movie" class="form-control" type="text" name="movie" value=""></td>
                </tr>';
    ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary btn-lg btn-block" onclick="submitForm(this)">Dodaj ofertę</button>
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
    // Add event listener
    document.getElementById("category").addEventListener("change", function(){
        document.getElementById("categoryIn").innerHTML = array_category[this.value];
    });

    // function -> select category 
    array_category = <?php echo json_encode($array_category); ?>;
    // Add event listener
    document.getElementById("category").addEventListener("change", function(){
        document.getElementById("categoryIn").innerHTML = array_category[this.value];
    });

    // function -> select course name 
    array_course_name = <?php echo json_encode($array_course_name); ?>;
    // Add event listener
    document.getElementById("courseName").addEventListener("change", function(){
        document.getElementById("courseNameIn").innerHTML = array_course_name[this.value];
    });

    // function -> short description
    // Add event listener
    document.getElementById("shortDesc").addEventListener("input", function(){
        document.getElementById("shortDescIn").innerHTML = document.getElementById("shortDesc").value;
    });

    // function -> select course name 
    array_common_desc = <?php echo json_encode($array_common_desc); ?>;
    // Add event listener
    document.getElementById("commonDesc").addEventListener("change", function(){
        document.getElementById("commonDescIn").innerHTML = array_common_desc[this.value];
    });

    // function -> long description
    // Add event listener
    document.getElementById("longDesc").addEventListener("input", function(){
        document.getElementById("longDescIn").innerHTML = document.getElementById("longDesc").value;
    });

    // function -> img
    // Add event listener
    document.getElementById("img").addEventListener("input", function(){
        document.getElementById("imgIn").src = document.getElementById("img").value;
        document.getElementById("imgIn").alt = "Zdjęcie " + document.getElementById("img").value;
    });

    // function -> movie
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
