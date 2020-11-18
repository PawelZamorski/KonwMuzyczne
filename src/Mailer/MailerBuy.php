<?php

namespace Konwersatorium\Mailer;

use Konwersatorium\Core\Config;

class MailerBuy {
    private $config_recaptcha;
    private $config_mailer;
    private $config_domain;

    // data send by POST
    private $name = "";
    private $email = "";
    private $offer_id = "";
    private $offer_category = "";
    private $offer_name = "";
    private $lang = "";
    private $res_no = "";


    public function __construct() {
        // get config data
        $this->config_recaptcha = Config::getConfig()->get('recaptcha'); // returns array
        $this->config_mailer = Config::getConfig()->get('mailer'); // returns array
        $this->config_domain = Config::getConfig()->get('domain'); // returns string


        // set data from POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST['name'])) $this->name = $_POST['name'];
            if(isset($_POST['email'])) $this->email = $_POST['email'];
            if(isset($_POST['offerId'])) $this->offer_id = $_POST['offerId'];
            if(isset($_POST['offerCategory'])) $this->offer_category = $_POST['offerCategory'];
            if(isset($_POST['offerName'])) $this->offer_name = $_POST['offerName'];
            if(isset($_POST['lang'])) {
                $this->lang = $_POST['lang'];
                // TODO: use database to select languages
                if($this->lang != 'pl' && $this->lang != 'en' && $this->lang != 'vi' && $this->lang != 'zh') {
                    $this->lang = 'pl';
                }
            } else {
                $this->lang = 'pl';
            }    
        }
    }

    public function getData() {
        return array("name"=>$this->name, "email"=>$this->email, "offer_id"=>$this->offer_id, "offer_category"=>$this->offer_category,
                    "offer_name"=>$this->offer_name, "lang"=>$this->lang);
    }

    public function isFormDataValid() {
        // TODO: data are set up in constructor. Use data from object
        // TODO: validate data in seperate function
        // Only process POST reqeusts.
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the form fields and remove whitespace.
            $this->name = strip_tags(trim($_POST["name"]));
            $this->name = str_replace(array("\r","\n"),array(" "," "),$this->name);
            $this->email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    
            // Check that data was sent to the mailer.
            if ( empty($this->name) OR !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                // Set a 400 (bad request) response code and exit.
                http_response_code(400);
                return false;
            } else {
                http_response_code(200);
                return true;
            }
        }
    }

    public function isRecaptchaValid() {
//            $secretKey = $this->config_recaptcha['secretKey'];
        
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

    public function isEmailSend() {
        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        // $recipient = "bogna.kolodziej@wp.pl";
        // $recipient = "sekretariat@konwersatoriummuzyczne.pl";
        $recipient = $this->email;

        // Set the email subject.
        $subject = "Konwersatorium Muzyczne: Potwierdzenie rezerwacji kursu";

        // Build the email content.
        $email_content = $this->createEmail();
//            $email_content = "Witamy $name\n";
//            $email_content .= "Dziękujemy za dokonanie rezerwacji kursu:\n$message\n";

        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=UTF-8';
        // Additional headers
//            $headers[] = 'From: sekretariat@konwersatoriummuzyczne.pl';
        
        $headers[] = 'From: ' . $this->config_mailer['from'];

        // Send the email.
        $mail=mail($recipient, $subject, $email_content, implode("\r\n", $headers));

        if ($mail) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            return true;
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            return false;
        }
    }

    public function setResNo($res_no) {
        $this->res_no = $res_no;
    }

    private function createEmail() {

        if($this->lang == 'en' | $this->lang == 'vi' | $this->lang == 'zh' ) {
            // TODO: refactor -> move to config or function. It is used also in OfferController
            // dotpay chk value - the order of values must be kept. For more info check the dotpay website: 
            // https://www.dotpay.pl/developer/doc/api_payment/pl/#ochrona-integralnosci-parametrow-przekierowania-chk
            $chkParametersChain = "ifhFAPPwsaml1GV5u5JaqUBkqshCqhfa" . "en" . "730320" . "100" . "EUR" . $this->res_no
            . "http://testwebproject.eu" . "0" . "KonwersatoriumMuzyczne";
            $chkValue = hash('sha256', $chkParametersChain);
            include '/email/reservation-version-en.php';
        } else {
            // TODO: refactor -> move to config or function. It is used also in OfferController
            // dotpay chk value - the order of values must be kept. For more info check the dotpay website: 
            // https://www.dotpay.pl/developer/doc/api_payment/pl/#ochrona-integralnosci-parametrow-przekierowania-chk
            $chkParametersChain = "ifhFAPPwsaml1GV5u5JaqUBkqshCqhfa" . "pl" . "730320" . "400" . "PLN" . $this->res_no
            . "http://testwebproject.eu" . "0" . "KonwersatoriumMuzyczne";
            $chkValue = hash('sha256', $chkParametersChain);
            include '/email/reservation-version-pl.php';
        }
    
        return $email_content;
    }
}

?>