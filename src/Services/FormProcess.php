<?php

namespace Konwersatorium\Services;

use Konwersatorium\Services\Validator;
use Konwersatorium\Exceptions\LogicException;
use Konwersatorium\Domain\OfferReservation;


class FormProcess {
    private $validatorInstance;

    public function __construct() {
        // TODO Validator should be a static method
        $this->validatorInstance = new Validator();
    }

    /*
    * Processes Form data send by POST method.
    * Uses different validator method to validate email address (name of input must be 'email')
    * 
    * @param $result - declare associative array, where key is the name of the input field send by POST method. Use empty string as a value, just to create array
    * 
    * @return assoc array with bool 'isFormValid' and associative array of Results 'result'. 
    * 'isFormValid' is true if all data in form are valid.
    * 'result' is an associative array of type Result. Result contains:
    *  a) boolean 'success' - true if that input is valid, or false otherwise
    *  b) string 'message'
    */
    public function processForm($lang, $arrFields) {
        // check if data were send by POST method
        if ($_SERVER["REQUEST_METHOD"] != "POST") throw new LogicException('No data were send by POST method');

        // flag true if all inputs in form are valid. Default is false.
        $isFormValid = false;
        // assoc array of type Result
        $validatorResult = array();


        // loop through $result array and insert validated Result.
        // NOTE: In order to be able to directly modify array elements within the loop precede $value with &. In that case the value will be assigned by reference.
        foreach($arrFields as $key => $val) { // NOTE: use & before $val to acces the value by reference and keep changes
            // validate email
            if(isset($_POST[$val])) { 
                // use different method to validate email
                if($val == 'email') {
                    $validatorResult[$val] = $this->validatorInstance->validateEmail($_POST[$val]);
                } else {
                    $validatorResult[$val] = $this->validatorInstance->validateText($_POST[$val]);
                }
            } else {
                throw new LogicException('The form field ' . $val . ' was not send by POST method.');
            }
        }
// print_r($result);

        // check if all inputs are valid
        $isFormValid = $this->isFormValid($validatorResult);

        return array('isFormValid'=>$isFormValid, 'validatorResult'=>$validatorResult);
    }

    /*
    * Return a OfferReservation object
    * Parses form values to OfferReservation bean object
    *
    * @param $validatorResult - associative array of ValidatorResult objects
    * @return: OfferReservation
    */
    public function parseFormToOfferReservation($lang, $validatorResult) {
        //Form field names:
        // 'offerId', 'offerCategory', 'offerName', 'name' ,'surname', 'street', 'town', 'postcode', 'country', 'currency', 'email'

        $offer_id = intval($validatorResult['offerId']->getValue());
        $name = $validatorResult['name']->getValue();
        $email = $validatorResult['email']->getValue();

        // prepare the data to be inserted
        $res_no = date('YmdHis');
        $res_date = date('Y-m-d');
        $res_active = 1;
        $res_paid = 0;

        // use lang to set up amount and currency
        $amount = '40000'; // amount in polish grosze 
        $currency = 'PLN';
        if($lang == 'en' || $lang == 'vi' || $lang == 'zh') {
            $amount = '10000'; // amount in cents
            $currency = 'EUR';
        }
        // create description
        $offer_category = $validatorResult['offerCategory']->getValue();
        $offer_name = $validatorResult['offerName']->getValue();
        $description = $offer_category . ' ' . $offer_name;

        return new OfferReservation(-1, $offer_id, $name, $email, $res_no, $res_date, $res_active, $res_paid,
            $amount, $currency, $description);
    }


    // Return true if all inputs are valid. False if any input is invalid.
    private function isFormValid($assocArrResult) {
        foreach($assocArrResult as $val) {
            if($val->getIsSuccess() != true) return false;
        }
        return true;
    }

}

?>