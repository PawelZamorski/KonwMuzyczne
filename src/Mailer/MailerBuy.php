<?php

    namespace Konwersatorium\Mailer;

    use Konwersatorium\Core\Config;

    class MailerBuy {
        private $config_recaptcha;
        private $config_mailer;

        // data send by POST
        private $name = "";
        private $email = "";

        public function __construct() {
            // get config data
            $config_recaptcha = Config::getConfig()->get('recaptcha');
            $config_mailer = Config::getConfig()->get('mailer');
        }

        public function isFormDataValid() {
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
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, array(
              'secret' => "6Ld1ldUZAAAAABC60092Ulf9Xa4IUAJoi6M6ERE_",
              'response' => $_POST['g-recaptcha-response'],
              'remoteip' => $_SERVER['REMOTE_ADDR']
            ));
  
            $resp = json_decode(curl_exec($ch));
            curl_close($ch);

            if($resp->success) {
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
            $email_content = "Witamy - test";
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
    }

?>