<?php

namespace Konwersatorium\Models;

use Konwersatorium\Domain\Employee;
use Konwersatorium\Domain\EmployeeMain;
use Konwersatorium\Domain\Positions;
use Konwersatorium\Domain\Specialization;
use Konwersatorium\Exceptions\NotFoundException;
use Konwersatorium\Exceptions\DbException;
use Konwersatorium\Services\GoogleTranslate;

class EmployeeModel extends AbstractModel {

    public function getAll($lang) {
        $itemArr = array();

        $query = "SELECT employee.id, employee.name, employee_translation.long_desc, employee.img, employee.img_thumbnail, course_name_translation.course_name 
        FROM employee, employee_translation, course_name_translation, languages
        WHERE course_name_translation.course_name_id = employee.course_name_id
        AND course_name_translation.languages_id = languages.id

        AND employee_translation.employee_id = employee.id
        AND employee_translation.languages_id = languages.id

        AND languages.code = ?;";

        // TODO: should try catch block be used ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();


        // get employee position data
        $query = "SELECT emp_positions.employee_id, positions_translation.name
        FROM emp_positions, positions, positions_translation, languages 
        WHERE emp_positions.positions_id = positions.id 
        AND positions_translation.positions_id = positions.id 
        AND positions_translation.languages_id = languages.id 
        AND languages.code = ?;";

        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result_position = $stmt->get_result();

        // multidimentional array where key is employee_id and value is an array of positions assotiated with the employee 
        $positions_array = array();

        while($row_positions = $result_position->fetch_assoc()){
            $employee_id = $row_positions['employee_id'];

            // Add positions to the array. At first check if the key (employee_id) already exist
            if(array_key_exists($employee_id, $positions_array)) {
                $value = $positions_array[$employee_id]; // get value from the main array. The value is the type of array
                array_push($value, $row_positions['name']); // push element to the array
                $positions_array[$employee_id] = $value; // assign value to the main array
            } else {
                // Add element to main array
                $positions_array[$employee_id] = array($row_positions['name']);
            }
        };


        // get employee specialization data
        $query = "SELECT emp_specialization.employee_id, specialization_translation.name 
        FROM emp_specialization, specialization_translation, languages 
        WHERE emp_specialization.specialization_id = specialization_translation.specialization_id
        AND specialization_translation.languages_id = languages.id
        AND languages.code = ?;";

        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result_specialization = $stmt->get_result();

        // multidimentional array where key is employee_id and value is an array of positions assotiated with the employee 
        $specialization_array = array();

        while($row = $result_specialization->fetch_assoc()){
            $employee_id = $row['employee_id'];

            // Add specialization to the array. At first check if the key (employee_id) already exist
            if(array_key_exists($employee_id, $specialization_array)) {
                $value = $specialization_array[$employee_id]; // get value from the main array. The value is the type of array
                array_push($value, $row['name']); // push element to the array
                $specialization_array[$employee_id] = $value; // assign value to the main array
            } else {
                // Add element to main array
                $specialization_array[$employee_id] = array($row['name']);
            }
        };


        // Fetch associative array
        while ($row = $result->fetch_assoc()) {
            // get employee position
            $position = $positions_array[$row['id']];
            // get employee specialization
            if (isset($specialization_array[$row['id']])) {
                $specialization = $specialization_array[$row['id']];
            } else {
                $specialization = '';
            }

            array_push($itemArr, new Employee($row['id'], $row['name'], $row['long_desc'], $row['img'], $row['img_thumbnail'], $row['course_name'], $position, $specialization));
        }
        // Check if there are any data
        if (empty($itemArr)) {
            throw new NotFoundException();
        }
        return $itemArr;
    }

    public function getEmployeeById($lang, $employee_id) {
        $query = "SELECT employee.id, employee.name, employee_translation.long_desc, img, img_thumbnail, course_name_translation.course_name
        FROM employee, employee_translation, course_name_translation, languages
        WHERE employee.id = ?

        AND course_name_translation.course_name_id = employee.course_name_id
        AND course_name_translation.languages_id = languages.id

        AND employee_translation.employee_id = employee.id
        AND employee_translation.languages_id = languages.id

        AND languages.code = ?;";

        // TODO: should be used try catch block ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('is', $employee_id, $lang); // bind params to the statement. First param: data type, ie 'i' stands for integer, 's' for string
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch first row
        $row = $result->fetch_assoc();
        // Check if there are any data
        if (empty($row)) {
            throw new NotFoundException();
        }

        // get employee position data
        $query = "SELECT positions_translation.positions_id, positions_translation.name
        FROM emp_positions, positions, positions_translation, languages 
        WHERE emp_positions.employee_id = ?

        AND emp_positions.positions_id = positions.id
        AND positions_translation.positions_id = positions.id
        AND positions_translation.languages_id = languages.id

        AND languages.code = ?;";

        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('is', $employee_id, $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch first row
        $row_positions = $result->fetch_assoc();
        $positions_object = new Positions($row_positions['positions_id'], $row_positions['name']);


        // get employee specialization data
        $query = "SELECT specialization_translation.specialization_id, specialization_translation.name 
        FROM emp_specialization, specialization_translation, languages 
        WHERE emp_specialization.employee_id = ?
        AND emp_specialization.specialization_id = specialization_translation.specialization_id
        AND specialization_translation.languages_id = languages.id
        AND languages.code = ?;";

        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('is', $employee_id, $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();

        // multidimentional array where key is specialization_id and value is an array of positions assotiated with the employee 
        $specialization_object_array = array();

        while($row_specialization = $result->fetch_assoc()){
            $specialization_id = $row_specialization['specialization_id'];

            // Add specialization to the array. At first check if the key (employee_id) already exist
            if(array_key_exists($specialization_id, $specialization_object_array)) {
                $emp_specialization_array = $specialization_object_array[$specialization_id]; // get value from the main array. The value is the type of associative array
                $temp_array = array($row_specialization['specialization_id'] => new Specialization($row_specialization['specialization_id'], $row_specialization['name']));
                $emp_specialization_array = array_merge($emp_specialization_array, $temp_array); // merge arrays
                $specialization_object_array[$specialization_id] = $emp_specialization_array; // assign new value to the main array
            } else {
                // Add element to main array
                $specialization_object_array[$specialization_id] = array($row_specialization['specialization_id'] => new Specialization($row_specialization['specialization_id'], $row_specialization['name']));
            }
        };

        return new Employee($row['id'], $row['name'], $row['long_desc'], $row['img'], $row['img_thumbnail'], $row['course_name'], $positions_object, $specialization_object_array);
    }

    public function getEmployeeMain($lang) {
        $query = "SELECT heading_3, heading_2
        FROM emp_heading_translation, languages 
        WHERE emp_heading_translation.languages_id = languages.id
        AND languages.code = ?;";

        // TODO: should try catch block be used ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch first row
        $row = $result->fetch_assoc();
        // Check if there are any data
        if (empty($row)) {
            throw new NotFoundException();
        }

        return new EmployeeMain($row['heading_3'], $row['heading_2']);
    }


    /* Returns array of Course name objects */
    public function getAllCourseNames($lang) {
        // get employee position data
        $query = "SELECT course_name_id, course_name 
        FROM course_name_translation, languages
        WHERE course_name_translation.languages_id = languages.id
        AND languages.code = ?;";

        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();

        // multidimentional array where key is employee_id and value is an array of positions assotiated with the employee 
        $course_names_array = array();

        while($row = $result->fetch_assoc()) {
            $temp_array = array($row['course_name']);
            // Add position object to the array
            $course_names_array[$row['course_name_id']] = $row['course_name'];
        }
        return $course_names_array;
    }


    /* Returns array of Position objects */
    public function getAllPositions($lang) {
        // get employee position data
        $query = "SELECT positions_translation.positions_id, positions_translation.name
        FROM positions_translation, languages 
        WHERE positions_translation.languages_id = languages.id
        AND languages.code = ?;";

        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();

        // multidimentional array where key is employee_id and value is an array of positions assotiated with the employee 
        $positions_object_array = array();

        while($row = $result->fetch_assoc()) {
            // Add position object to the array
            $positions_object_array[$row['positions_id']] = new Positions($row['positions_id'], $row['name']);
        }
        return $positions_object_array;
    }

    /* Returns array of Specialization objects */
    public function getAllSpecializations($lang) {
        // get employee position data
        $query = "SELECT specialization_translation.specialization_id, specialization_translation.name
        FROM specialization_translation, languages 
        WHERE specialization_translation.languages_id = languages.id
        AND languages.code = ?;";

        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();

        // multidimentional array where key is employee_id and value is an array of positions assotiated with the employee 
        $specialization_object_array = array();

        while($row = $result->fetch_assoc()) {
            // Add position object to the array
            $specialization_object_array[$row['specialization_id']] = new Specialization($row['specialization_id'], $row['name']);
        }

        return $specialization_object_array;
    }

    function updateEmployeeById($lang, $employee_id) {
        $employee_id= $_POST['employee_id'];
        $name = $_POST['name'];
        $course_name_id = $_POST['course_name_id'];
        $img = $_POST['img'];
        $img_thumbnail = $_POST['img_thumbnail'];
        $long_desc = $_POST['long_desc'];
        $positions_id = $_POST['positions_id'];
        if(isset($_POST['specialization_id'])) { // specialization_id may not be set
            $specialization_id = $_POST['specialization_id'];
        } else {
            $specialization_id = array(); // Create empty array to process further steps (remove data from emp_specialization table)
        }

        // Update main data
        // Step 2: Perform database query
        $sql = "UPDATE employee
        SET
        name = '$name',
        course_name_id = $course_name_id,
        img = '$img',
        img_thumbnail = '$img_thumbnail'
        WHERE employee.id = $employee_id;";

        if ($this->conn->query($sql) === TRUE) {
//            echo "Record updated successfully";
        } else {
            throw new DbException($this->conn->error);
        }

        $sql = "UPDATE employee_translation
        SET
        long_desc = '$long_desc'
        WHERE employee_id = $employee_id
        AND languages_id = (SELECT id FROM languages WHERE code = '$lang');";

        if ($this->conn->query($sql) === TRUE) {
//            echo "Record updated successfully";
        } else {
            throw new DbException($this->conn->error);
        }

        
        // Insert data
        // Step 2: Perform database query
        $sql = "UPDATE emp_positions
        SET positions_id = $positions_id
        WHERE employee_id = $employee_id;";

        if ($this->conn->query($sql)  === TRUE) {
//            echo "Record updated successfully";
        } else {
            throw new DbException($this->conn->error);
        }

        // Insert data
        // Step 2: Perform database query
        // At first delet old data
        $sql = "DELETE FROM emp_specialization
            WHERE employee_id = $employee_id;";

        if ($this->conn->query($sql)  === TRUE) {
            if  (!empty($specialization_id)) { // Check if there is any data to be insert
                // Prepare data, change from array to string
                $counter = 0;
                $values = "";
                foreach($specialization_id as $value) {
                    if($counter === (count($specialization_id) - 1)) {
                        $values .= "($employee_id, $value)";
                    } else {
                        $values .= "($employee_id, $value), ";
                    }

                    $counter += 1;
                }
                // Insert new data
                $sql = "INSERT INTO emp_specialization (employee_id, specialization_id)
                    VALUES $values;";
                if ($this->conn->query($sql)  === TRUE) {
//                    echo "Unbelivable Success: Record updated successfully";
                } else {
                    throw new DbException($this->conn->error);
                }
            }
        } else {
            throw new DbException($this->conn->error);
        }

    }

    function deleteEmployeeById($lang, $employee_id) {
        // Update main data
        // Step 2: Perform database query
        $sql = "DELETE FROM employee WHERE id = $employee_id;";

        if ($this->conn->query($sql) === TRUE) {
//            echo "Record updated successfully";
        } else {
            throw new DbException($this->conn->error);
        }
    }

    function createEmployee($lang) {
        $name = $_POST['name'];
        $course_name_id = $_POST['course_name_id'];
        $img = $_POST['img'];
        $img_thumbnail = $_POST['img_thumbnail'];
        $long_desc = $_POST['long_desc'];
        $positions_id = $_POST['positions_id']; // 0 means no position
        if(isset($_POST['specialization_id'])) { // specialization_id may not be set
            $specialization_id = $_POST['specialization_id'];
        } else {
            $specialization_id = array(); // Create empty array to process further steps (remove data from emp_specialization table)
        }

        // Insert main data
        // Step 2: Perform database query
        $sql = "INSERT INTO employee (`name`, `course_name_id`, `img_thumbnail`, `img`)
        VALUES ('$name', $course_name_id, '$img_thumbnail', '$img');";

        if ($this->conn->query($sql) === TRUE) {
            // Get last id
            $employee_last_id = $this->conn->insert_id;
//            echo "Record updated successfully";
        } else {
            throw new DbException($this->conn->error);
        }
    
        // TODO: check if  = $employee_last_id is not -1
        // Insert translation data
        // Step 2: Perform database query
        // Use Google Translate to translate from polish to english
        $google_translate_service = new GoogleTranslate();
        $long_desc_en = $google_translate_service->translate($long_desc, 'en');
        // Use english translation to translate to vietnamies and chinies
        $long_desc_vi = $google_translate_service->translate($long_desc_en, 'vi');
        $long_desc_zh = $google_translate_service->translate($long_desc_en, 'zh');

        $sql = "INSERT INTO employee_translation
        (languages_id, employee_id, long_desc)
        VALUES
        (1, $employee_last_id, '$long_desc'),
        (2, $employee_last_id, '$long_desc_en'),
        (3, $employee_last_id, '$long_desc_vi'),
        (4, $employee_last_id, '$long_desc_zh');";

        if ($this->conn->query($sql) === TRUE) {
//            echo "Record updated successfully";
        } else {
            throw new DbException($this->conn->error);
        }

        // TODO: check if  = $employee_last_id is not -1
        // Insert data
        // Step 2: Perform database query
        if ($positions_id > 0) {
            $sql = "INSERT INTO emp_positions
            (employee_id, positions_id)
            VALUES
            ($employee_last_id, $positions_id);";
    
            if ($this->conn->query($sql)  === TRUE) {
    //            echo "Record updated successfully";
            } else {
                throw new DbException($this->conn->error);
            }    
        }

        // TODO: check if  = $employee_last_id is not -1
        // Insert data
        // Step 2: Perform database query
        if  (!empty($specialization_id)) { // Check if there is any data to be insert
            // Prepare data, change from array to string
            $counter = 0;
            $values = "";
            foreach($specialization_id as $value) {
                if($counter === (count($specialization_id) - 1)) {
                    $values .= "($employee_last_id, $value)";
                } else {
                    $values .= "($employee_last_id, $value), ";
                }

                $counter += 1;
            }
        
            // Insert new data
            $sql = "INSERT INTO emp_specialization (employee_id, specialization_id)
                VALUES $values;";
            if ($this->conn->query($sql)  === TRUE) {
//                    echo "Unbelivable Success: Record updated successfully";
            } else {
                throw new DbException($this->conn->error);
            }

        } else {
            throw new DbException($this->conn->error);
        }
    }

}