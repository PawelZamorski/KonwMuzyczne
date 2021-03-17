<?php

namespace Konwersatorium\Models;

use Konwersatorium\Domain\Employee;
use Konwersatorium\Domain\EmployeeMain;
use Konwersatorium\Exceptions\NotFoundException;
use Konwersatorium\Exceptions\DbException;

use Konwersatorium\Services\GoogleTranslate;

// OK
class EmployeeModel extends AbstractModel {

    public function getEmployeeMain($lang) {
        $query = "SELECT heading_3, heading_2
            FROM emp_heading_translation, languages 
            WHERE emp_heading_translation.languages_id = languages.id
            AND languages.code = ?;";

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

    public function getEmployeeAll($lang) {
        $itemArr = array();

        $query = "SELECT e.id, e.full_name, e.img, e.img_thumbnail, e_t.position, e_t.specialization, e_t.long_desc 
            FROM employee as e, employee_translation as e_t, languages
            WHERE e.id = e_t.employee_id 
            AND e_t.languages_id = languages.id

            AND languages.code = ?;";

        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        // Get the result
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            array_push($itemArr, new Employee($row['id'], $row['full_name'], $row['img'], $row['img_thumbnail'], 
                $row['position'], $row['specialization'], $row['long_desc']));
        }

        // Check if there are any data
        if (empty($itemArr)) {
            throw new NotFoundException();
        }
        return $itemArr;
    }

    public function getEmployeeById($lang, $employee_id) {
        $query = "SELECT e.id, e.full_name, e.img, e.img_thumbnail, e_t.position, e_t.specialization, e_t.long_desc 
            FROM employee as e, employee_translation as e_t, languages
            WHERE e.id = ?
            AND e.id = e_t.employee_id 
            
            AND e_t.languages_id = languages.id
            AND languages.code = ?;";

        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('is', $employee_id, $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch first row
        $row = $result->fetch_assoc();
        // Check if there are any data
        if (empty($row)) {
            throw new NotFoundException();
        }

        return new Employee($row['id'], $row['full_name'], $row['img'], $row['img_thumbnail'], 
            $row['position'], $row['specialization'], $row['long_desc']);
    }

    function updateEmployeeById($lang, $employee_id) {
        $full_name = $_POST['full_name'];
        $img = $_POST['img_original'];
        // check if there is new img
        if ($_FILES['img']['size'] !== 0 && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            // TODO: delete old file
            // image path
            $img_folder = 'images/user-images/';            
            // set path to be stored in db
            $img = '/' . $img_folder . $_FILES['img']['name'];        

            // save file
            // TODO use general error or create specific one    
            if ($this->uploadFile($img_folder, 'img') === false) {
                throw new NotFoundException('File not uploaded');
            }
        }
        $img_thumbnail = $_POST['img_thumbnail_original'];
        // check if there is new img_thumbnail
        if ($_FILES['img_thumbnail']['size'] !== 0 && $_FILES['img_thumbnail']['error'] === UPLOAD_ERR_OK) {
            // TODO: delete old file
            // image path
            $img_folder = 'images/user-images/';            
            // set path to be stored in db
            $img_thumbnail = '/' . $img_folder . $_FILES['img_thumbnail']['name'];        

            // save file
            // TODO use general error or create specific one    
            if ($this->uploadFile($img_folder, 'img_thumbnail') === false) {
                throw new NotFoundException('File not uploaded');
            }
        }
        // employee_translation
        $position = $_POST['position'];
        $specialization = $_POST['specialization'];
        $long_desc = $_POST['long_desc'];

        // Update main data
        // Step 2: Perform database query
        $sql = "UPDATE employee
            SET
            full_name = '$full_name',
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
            long_desc = '$long_desc',
            position = '$position',
            specialization = '$specialization'
            WHERE employee_id = $employee_id
            AND languages_id = (SELECT id FROM languages WHERE code = '$lang');";

        if ($this->conn->query($sql) === TRUE) {
//            echo "Record updated successfully";
        } else {
            throw new DbException($this->conn->error);
        }
    }

    function createEmployee($lang) {
        $full_name = $_POST['full_name'];
        $img = '';
        // check if there is new img
        if ($_FILES['img']['size'] !== 0 && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            // TODO: delete old file
            // image path
            $img_folder = 'images/user-images/';            
            // set path to be stored in db
            $img = '/' . $img_folder . $_FILES['img']['name'];        

            // save file
            // TODO use general error or create specific one    
            if ($this->uploadFile($img_folder, 'img') === false) {
                throw new NotFoundException('File not uploaded');
            }
        }
        $img_thumbnail = '';
        // check if there is new img_thumbnail
        if ($_FILES['img_thumbnail']['size'] !== 0 && $_FILES['img_thumbnail']['error'] === UPLOAD_ERR_OK) {
            // TODO: delete old file
            // image path
            $img_folder = 'images/user-images/';            
            // set path to be stored in db
            $img_thumbnail = '/' . $img_folder . $_FILES['img_thumbnail']['name'];        

            // save file
            // TODO use general error or create specific one    
            if ($this->uploadFile($img_folder, 'img_thumbnail') === false) {
                throw new NotFoundException('File not uploaded');
            }
        }
        // employee_translation
        $position = $_POST['position'];
        $specialization = $_POST['specialization'];
        $long_desc = $_POST['long_desc'];

        $employee_last_id = '';
        // Insert main data
        // Step 2: Perform database query
        $sql = "INSERT INTO employee (`full_name`, `img_thumbnail`, `img`)
        VALUES ('$full_name', '$img_thumbnail', '$img');";

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

        $position_en = $google_translate_service->translate($position, 'en');
        // Use english translation to translate to vietnamies and chinies
        $position_vi = $google_translate_service->translate($position_en, 'vi');
        $position_zh = $google_translate_service->translate($position_en, 'zh');

        $specialization_en = $google_translate_service->translate($specialization, 'en');
        // Use english translation to translate to vietnamies and chinies
        $specialization_vi = $google_translate_service->translate($specialization_en, 'vi');
        $specialization_zh = $google_translate_service->translate($specialization_en, 'zh');

        $long_desc_en = $google_translate_service->translate($long_desc, 'en');
        // Use english translation to translate to vietnamies and chinies
        $long_desc_vi = $google_translate_service->translate($long_desc_en, 'vi');
        $long_desc_zh = $google_translate_service->translate($long_desc_en, 'zh');

        $sql = "INSERT INTO employee_translation
        (languages_id, employee_id, position, specialization, long_desc)
        VALUES
        (1, $employee_last_id, '$position', '$specialization', '$long_desc'),
        (2, $employee_last_id, '$position_en', '$specialization_en', '$long_desc_en'),
        (3, $employee_last_id, '$position_vi', '$specialization_vi', '$long_desc_vi'),
        (4, $employee_last_id, '$position_zh', '$specialization_zh', '$long_desc_zh');";

        if ($this->conn->query($sql) === TRUE) {
//            echo "Record updated successfully";
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


    private function uploadFile($target_dir, $post_field_name) {
        if (($_FILES[$post_field_name]['name']!="")){
            // Where the file is going to be stored
            $target_file = $target_dir . basename($_FILES[$post_field_name]['name']); // The basename() function returns the filename from a path.
            
            return move_uploaded_file($_FILES[$post_field_name]['tmp_name'], $target_file);
        }
    }

}