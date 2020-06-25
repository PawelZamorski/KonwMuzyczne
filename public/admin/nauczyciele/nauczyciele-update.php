<!-- Get data from the database -->
<?php
    require(__DIR__ . '/../../../config/config.php');
    
    $employee_id = $_GET['employee_id'];
	
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
    $result = mysqli_query($connection, "SELECT employee.id as id, employee.name, employee.long_desc, employee.img_thumbnail, employee.img, course_name.course_name 
        FROM employee, course_name 
        WHERE employee.id = $employee_id
        AND course_name.id = employee.course_name_id;");

    // Step 3: Use returned data
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
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


    // Create arrays from positions name data:
    // 1). Get data from emp_positions table. It is needed to know which positions the employee has
    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT positions_id FROM emp_positions 
        WHERE employee_id = $employee_id;");
    $positions_id_array = array();
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $positions_id_array[] = $row['positions_id'];
    }
    // Step 4: Release returned data
    mysqli_free_result($result);
    // 2). Get data from positions name.
    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT id, name FROM positions;");    
    // Step 3: Use returned data
    $data_positions_name = ""; // string that is displayed in the table
    $array_positions_name = array(); // array for JS function
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $array_positions_name[$row['id']] = $row['name'];

        if(in_array($row['id'], $positions_id_array)) {
            $data_positions_name .= '<option value="' . $row['id'] . '" selected>' . $row['name'] . '</option>';
        } else {
            $data_positions_name .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
        }
    }
    // Step 4: Release returned data
    mysqli_free_result($result);

    // Get unique data from specialization name
    // 1). Get data from emp_specialization table. It is needed to know which specialization the employee has
    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT specialization_id FROM emp_specialization 
        WHERE employee_id = $employee_id;");
    $specialization_id_array = array();
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $specialization_id_array[] = $row['specialization_id'];
    }
    // Step 4: Release returned data
    mysqli_free_result($result);
    // Step 2: Perform database query
    $result = mysqli_query($connection, "SELECT id, name FROM specialization;");    
    // Step 3: Use returned data
    $data_specialization_name = ""; // string that is displayed in the table
    $array_specialization_name = array(); // array for JS function
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $array_specialization_name[$row['id']] = $row['name'];

        if (in_array($row['id'], $specialization_id_array)) {
            $data_specialization_name .= 
            '<div class="form-check-inline">
                <input class="form-check-input" type="checkbox" id="' . $row['name'] . '" name="specialization_id[]" value="' . $row['id'] . '" checked>
                <label class="form-check-label" for="' . $row['name'] . '">' . $row['name'] . '</label>
            </div>';
        } else {
            $data_specialization_name .= 
            '<div class="form-check-inline">
                <input class="form-check-input" type="checkbox" id="' . $row['name'] . '" name="specialization_id[]" value="' . $row['id'] . '">
                <label class="form-check-label" for="' . $row['name'] . '">' . $row['name'] . '</label>
            </div>';
        }
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
    '<form id="offerForm" action="/admin/nauczyciele/nauczyciele-crud-update.php" method="post">
        <input name="employee_id" value="' . $employee_id . '" hidden>
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
                    <td><textarea id="name" class="form-control" name="name" cols="100">' . $data['name'] . '</textarea></td>
                </tr>
                <tr>
                    <th scope="col">Nazwa kursu</th>
                    <td><select id="courseName" class="form-control custom-select mb-3" name="course_name_id">' . $data_course_name .'</select></td>
                </tr>
                <tr>
                    <th scope="col">Stanowisko</th>
                    <td><select id="positionsName" class="form-control custom-select mb-3" name="positions_id">' . $data_positions_name .'</select></td>
                </tr>
                <tr>
                    <th scope="col">Specjalizacja</th>
                    <td>' . $data_specialization_name . '</td>
                </tr>
                <tr>
                    <th scope="col">Zdjęcie</th>
                    <td><input id="img" class="form-control" type="text" name="img" value="' . $data['img'] . '"></td>
                </tr>
                <tr>
                    <th scope="col">Zdjęcie - thumbnail/square</th>
                    <td><input id="imgThumbnail" class="form-control" type="text" name="img_thumbnail" value="' . $data['img_thumbnail'] . '"></td>
                </tr>
                <tr>
                    <th scope="col">Długi opis</th>
                    <td><textarea id="longDesc" class="form-control" name="long_desc" cols="100" oninput="display(this)">' . $data['long_desc'] . '</textarea></td>
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
    // Built element on load
    window.addEventListener('load', (event) => {
        document.getElementById("nameIn").innerHTML = document.getElementById("name").value;
    });
    // Add event listener
    document.getElementById("name").addEventListener("input", function(){
        document.getElementById("nameIn").innerHTML = document.getElementById("name").value;
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

    // function -> select positions name
    array_positions_name = <?php echo json_encode($array_positions_name); ?>;
    // Built element on load
    window.addEventListener('load', (event) => {
        document.getElementById("positionsNameIn").innerHTML = array_positions_name[document.getElementById("positionsName").value];
    });
    // Add event listener
    document.getElementById("positionsName").addEventListener("change", function(){
        document.getElementById("positionsNameIn").innerHTML = array_positions_name[this.value];
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

    // function -> long description
    // Built element on load
    window.addEventListener('load', (event) => {
        document.getElementById("longDescIn").innerHTML = document.getElementById("longDesc").value;
    });
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
