<!-- Get data from the database -->
<?php
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
    
    // Get unique data from course_name
    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT id, course_name FROM course_name;");    
    // Step 3: Use returned data
    $data_course_name = ""; // string that is displayed in the table
    $array_course_name = array(); // array for JS function
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $array_course_name[$row['id']] = $row['course_name'];
        $data_course_name .= '<option value="' . $row['id'] . '">' . $row['course_name'] . '</option>';
    }
    // Step 4: Release returned data
    mysqli_free_result($result);

    // Create arrays from positions name data:
    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT id, name FROM positions;");    
    // Step 3: Use returned data
    $data_positions_name = ""; // string that is displayed in the table
    $array_positions_name = array(); // array for JS function
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $array_positions_name[$row['id']] = $row['name'];
        $data_positions_name .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
    // Step 4: Release returned data
    mysqli_free_result($result);

    // Get unique data from specialization name
    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT id, name FROM specialization;");    
    // Step 3: Use returned data
    $data_specialization_name = ""; // string that is displayed in the table
    $array_specialization_name = array(); // array for JS function
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $array_specialization_name[$row['id']] = $row['name'];
        $data_specialization_name .= 
        '<div class="form-check-inline">
            <input class="form-check-input" type="checkbox" id="' . $row['name'] . '" name="specialization_id[]" value="' . $row['id'] . '">
            <label class="form-check-label" for="' . $row['name'] . '">' . $row['name'] . '</label>
        </div>';
    }
    // Step 4: Release returned data
    mysqli_free_result($result);

?>

<!DOCTYPE html>
<html>
<head lang="pl-PL">
    <?php 
        $title = 'Nauczyciele edycja | Panel administracyjny';
        require(__DIR__ . '/../templates/head-admin.php');
    ?>
</head>
<body>
<!-- Container -->
<div class="container-fluid">
    <?php require(__DIR__ . '/../templates/menu-admin.php'); ?>

    <?php
    echo
    '<form id="offerForm" action="/admin/nauczyciele/nauczyciele-crud-add.php" method="post">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Element</th>
                    <th scope="col">Zawartość</th>
                </tr>
            </thead>
            <tbody id="data">
                <tr>
                    <th scope="col">Imię i nazwisko</th>
                    <td><textarea id="name" class="form-control" name="name" cols="100"></textarea></td>
                </tr>
                <tr>
                    <th scope="col">Nazwa kursu</th>
                    <td><select id="courseName" class="form-control custom-select mb-3" name="course_name_id"><option selected>Wybierz opcję (opcjonalnie)</option>' . $data_course_name . '</select></td>
                </tr>
                <tr>
                    <th scope="col">Stanowisko</th>
                    <td><select id="positionsName" class="form-control custom-select mb-3" name="positions_id"><option selected>Wybierz opcję (opcjonalnie)</option>' . $data_positions_name .'</select></td>
                </tr>
                <tr>
                    <th scope="col">Specjalizacja</th>
                    <td>' . $data_specialization_name . '</td>
                </tr>
                <tr>
                    <th scope="col">Zdjęcie</th>
                    <td><input id="img" class="form-control" type="text" name="img" value=""></td>
                </tr>
                <tr>
                    <th scope="col">Zdjęcie - thumbnail/square</th>
                    <td><input id="imgThumbnail" class="form-control" type="text" name="img_thumbnail" value=""></td>
                </tr>
                <tr>
                    <th scope="col">Długi opis</th>
                    <td><textarea id="longDesc" class="form-control" name="long_desc" cols="100" oninput="display(this)"></textarea></td>
                </tr>';
    ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary btn-lg btn-block" onclick="submitForm(this)">Dodaj</button>
    </form>

    <h2>Podgląd</h2>
    <hr>
</div>
<!-- End of Container -->

<!-- Container -->
<div class="container">
<main id="content">
    <!-- Employee -->
    <section id="about" class="introduction scrollto fixpaddings">
        <div class="row clearfix">
            <div class="col-1">
                <div class="section-heading">
                    <h3 id="courseNameIn"></h3>
                    <h2 id="nameIn" class="section-title"></h2>
                </div>
            </div>
            <div class="col-3">
                <p><img id="imgIn" src="" alt="" class="topMargin"></p>
            </div>
            <div class="col-3">
                <p id="longDescIn"></p>
            </div>
        </div>
    </section>
    <!--End of Employee -->
</main>
</div>
<!-- End of Container -->

<!-- Proagate table and build element on load function -->
<script>
    // Build JS array from PHP array

    // function -> name
    // Add event listener
    document.getElementById("name").addEventListener("input", function(){
        document.getElementById("nameIn").innerHTML = document.getElementById("name").value;
    });

    // function -> select course name 
    array_course_name = <?php echo json_encode($array_course_name); ?>;
    // Add event listener
    document.getElementById("courseName").addEventListener("change", function(){
        document.getElementById("courseNameIn").innerHTML = array_course_name[this.value];
    });

    // function -> img
    // Add event listener
    document.getElementById("img").addEventListener("input", function(){
        document.getElementById("imgIn").src = document.getElementById("img").value;
        document.getElementById("imgIn").alt = "Zdjęcie " + document.getElementById("img").value;
    });

    // function -> long description
    // Add event listener
    document.getElementById("longDesc").addEventListener("input", function(){
        document.getElementById("longDescIn").innerHTML = document.getElementById("longDesc").value;
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
