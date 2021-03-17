<?php

namespace Konwersatorium\Models;

use Konwersatorium\Domain\OfferBuy;
use Konwersatorium\Domain\OfferReservation;
use Konwersatorium\Domain\OfferPaymentPolicy;
use Konwersatorium\Exceptions\NotFoundException;
use Konwersatorium\Exceptions\DBException;

class ShopModel extends AbstractModel {
    
    public function getOfferBuy($lang) {
        $query = "SELECT *  
        FROM shop_buy_translation, languages
        WHERE shop_buy_translation.languages_id = languages.id
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

        return new OfferBuy($row['heading_3_buy'], $row['heading_2_buy'], $row['heading_2_payment'], $row['heading_2_payment_1'], $row['heading_2_payment_2'],
            $row['heading_2_payment_3'], $row['info_main'], $row['info_buy'], $row['info_course'], $row['info_price'], $row['info_expiration'], $row['info_buy_contact'], $row['info_payment'], $row['button_confirm'],
            $row['button_pay'], $row['button_payment_policy'], $row['info_account'], $row['info_address'], $row['info_payment_gateway']);        
    }


    /* */
    public function createOfferReservation($offer_id, $name, $email, $amount, $currency, $description) {
        // last id from offer_reservation table
        $offer_reservation_last_id = 0;

        // prepare the data to be inserted
        $res_no = date('YmdHis');
        $res_date = date('Y-m-d');
        $res_active = 1;
        $res_paid = 0;
            
        // Insert main data
        // Step 2: Perform database query
        $sql = "INSERT INTO shop_client_reservations (`offer_id`, `name`, `email`, `res_no`, `res_date`, `res_active`, `res_paid`,
                `amount`, `currency`, `description`)
        VALUES ($offer_id, '$name', '$email', '$res_no', '$res_date', $res_active, $res_paid, 
                $amount, '$currency', '$description');";
        // TODO: should return boolean value
        if ($this->conn->query($sql) === TRUE) {
            // get last id of inserted entity
            $offer_reservation_last_id = $this->conn->insert_id;
            return $offer_reservation_last_id;
//            echo "Record added successfully";
        } else {
//            echo "Error updating record: " . $this->conn->error;
            // if 0 - error
            return 0;
        }
    }

        /* */
        public function createOfferReservation_2($offerReservation) {
            // last id from offer_reservation table
            $offer_reservation_last_id = 0;
            
            // values
            $offer_id = $offerReservation->getOfferId();
            $offer_category = $offerReservation->getOfferCategory();
            $offer_name = $offerReservation->getOfferName();
            $lang_code = $offerReservation->getLangCode();
            $name = $offerReservation->getName();
            $surname = $offerReservation->getSurname();
            $street = $offerReservation->getStreet();
            $town = $offerReservation->getTown();
            $postcode = $offerReservation->getPostcode();
            $country = $offerReservation->getCountry();
            $email = $offerReservation->getEmail();
            $res_no = $offerReservation->getResNo();
            $res_date = $offerReservation->getResDate();
            $res_active = $offerReservation->getResActive();
            $res_paid = $offerReservation->getResPaid();
            $amount = $offerReservation->getAmount();
            $currency = $offerReservation->getCurrency();
            $lesson_type = $offerReservation->getLessonType();

            // Insert main data
            // Step 2: Perform database query
            $sql = "INSERT INTO shop_client_reservations (`offer_id`, `offer_category`, `offer_name`, `lang_code`, `name`,
            `surname`, `street`, `town`, `postcode`, `country`, `email`, `res_no`, `res_date`,
            `res_active`, `res_paid`, `amount`, `currency`, `lesson_type`)

            VALUES ($offer_id, '$offer_category', '$offer_name', '$lang_code', '$name',
                '$surname', '$street', '$town', '$postcode', '$country', '$email', '$res_no', '$res_date',
                $res_active, $res_paid, $amount, '$currency', '$lesson_type');";
            // TODO: should return boolean value
            if ($this->conn->query($sql) === TRUE) {
                // get last id of inserted entity
                $last_id = $this->conn->insert_id;
    //            echo "Record added successfully";
            } else {
                throw new DbException($this->conn->error);
            }

            return $this->getOfferReservationById($last_id);
        }
    

    public function getOfferReservationById($id) {
        $query = "SELECT *
            FROM shop_client_reservations
            WHERE id = ?;";

        // TODO: should try catch block be used ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('i', $id); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch first row
        $row = $result->fetch_assoc();
        // Check if there are any data
        if (empty($row)) {
            throw new NotFoundException();
        }

        return new OfferReservation($row['id'], $row['offer_id'], $row['offer_category'], $row['offer_name'], $row['lang_code'], $row['name'],
            $row['surname'], $row['street'], $row['town'], $row['postcode'], $row['country'], $row['email'], $row['res_no'], $row['res_date'],
            $row['res_active'], $row['res_paid'], $row['amount'], $row['currency'], $row['lesson_type']);
    }

    public function updateOfferReservationStatusById($id) {
        $sql = "UPDATE  shop_client_reservations SET
            res_active = 0,
            res_paid = 1
            WHERE id = $id;";

        if ($this->conn->query($sql) === TRUE) {
    //            echo "Record updated successfully";
        } else {
                throw new DbException($this->conn->error);
        }    
    }

    public function getResNo($id) {
        $query = "SELECT res_no
        FROM shop_client_reservations
        WHERE id = ?;";

        // TODO: should try catch block be used ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('i', $id); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch first row
        $row = $result->fetch_assoc();
        // Check if there are any data
        if (empty($row)) {
            throw new NotFoundException();
        }
        return $row['res_no'];        
    }

    public function getId($res_no) {
        $query = "SELECT id
        FROM shop_client_reservations
        WHERE res_no = ?;";

        // TODO: should try catch block be used ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $res_no); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch first row
        $row = $result->fetch_assoc();
        // Check if there are any data
        if (empty($row)) {
            throw new NotFoundException();
        }
        return $row['id'];
    }

    public function getItemQuantity($offer_id) {
        $query = "SELECT siq.quantity as quantity
        FROM offer, shop_item_quantity_to_courses as siqtc, shop_item_quantity as siq
        WHERE offer.courses_id = siqtc.courses_id
        AND siqtc.shop_item_quantity_id = siq.id
        AND offer.id = ?;";

        // TODO: should try catch block be used ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('i', $offer_id); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch first row
        $row = $result->fetch_assoc();
        // Check if there are any data
        if (empty($row)) {
            throw new NotFoundException();
        }
        return $row['quantity'];
    }

    public function updateItemQuantity($offer_id, $quantity) {
        $query = "UPDATE shop_item_quantity SET shop_item_quantity.quantity = $quantity
            WHERE shop_item_quantity.id = (SELECT siqtc.shop_item_quantity_id
                FROM offer, shop_item_quantity_to_courses as siqtc
                WHERE offer.courses_id = siqtc.courses_id
                AND offer.id = $offer_id);";

        if ($this->conn->query($query) === TRUE) {
            // echo  "Record updated successfully";
        } else {
            throw new DbException($this->conn->error);
        }
    }
    
}