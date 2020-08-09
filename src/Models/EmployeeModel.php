<?php

namespace Konwersatorium\Models;

use Konwersatorium\Domain\Employee;
use Konwersatorium\Domain\EmployeeMain;
use Konwersatorium\Exceptions\NotFoundException;

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

        while($row_specialization = $result_specialization->fetch_assoc()){
            $employee_id = $row_specialization['employee_id'];

            // Add specialization to the array. At first check if the key (employee_id) already exist
            if(array_key_exists($employee_id, $specialization_array)) {
                $value = $specialization_array[$employee_id]; // get value from the main array. The value is the type of array
                array_push($value, $row_specialization['name']); // push element to the array
                $specialization_array[$employee_id] = $value; // assign value to the main array
            } else {
                // Add element to main array
                $specialization_array[$employee_id] = array($row_specialization['name']);
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

        return new Employee($row['id'], $row['name'], $row['long_desc'], $row['img'], $row['img_thumbnail'], $row['course_name'], '', '');
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

}