<?php

namespace Konwersatorium\Services;

use Konwersatorium\Core\Config;

class RecaptchaValidator {

    private $config_recaptcha;

    public function __construct() {
        // get config data
        $this->config_recaptcha = Config::getConfig()->get('recaptcha'); // returns array
    }

    public function isRecaptchaValid(): bool {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            'secret' => $this->config_recaptcha['secretKey'],
            'response' => $_POST['g-recaptcha-response'],
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ));

        $resp = json_decode(curl_exec($ch));
        curl_close($ch);

        if($resp->success) {
            http_response_code(200);
            return true;
        } else {
            // captcha failure
            http_response_code(403);
            // echo "Captcha nie została potwierdzona.";
            return false;
        }
    }

}

?>