<?php

namespace Konwersatorium\Mailer;

use Konwersatorium\Core\Config;

class MailerBuy {
    private $config_recaptcha;
    private $config_mailer;

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
        $this->config_recaptcha = Config::getConfig()->get('recaptcha');
        $this->config_mailer = Config::getConfig()->get('mailer');

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
        $email_content = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html lang="pl" xml:lang="pl" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
        <head>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="format-detection" content="date=no" />
            <meta name="format-detection" content="address=no" />
            <meta name="format-detection" content="telephone=no" />
            <meta name="x-apple-disable-message-reformatting" />
            <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700,900|Roboto+Slab:300,400,700|Old+Standard+TT:400,400i,700" rel="stylesheet" />
            <title>Konwersatorium Muzyczne</title>

            <style type="text/css" media="screen">
                /* Linked Styles */
                body { padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#f4f4f4; -webkit-text-size-adjust:none }
                a { color:#333333; text-decoration:none }
                p { padding:0 !important; margin:0 !important } 
                img { -ms-interpolation-mode: bicubic; /* Allow smoother rendering of resized image in Internet Explorer */ }
                .mcnPreviewText { display: none !important; }
        /* Preheader declaration in style block in addition to inline for Outlook */
                .preheader { display:none !important;
                            visibility:hidden; opacity:0; color:transparent; height:0; width:0; }

                        
                /* Mobile styles */
                @media only screen and (max-device-width: 480px), only screen and (max-width: 480px) {
                    .mobile-shell { width: 100% !important; min-width: 100% !important; }

                    .text-header,
                    .m-center { text-align: center !important; }
                    .holder { padding: 0 10px !important; }

                    .text-nav { font-size: 10px !important; }

                    .center { margin: 0 auto !important; }

                    .td { width: 100% !important; min-width: 100% !important; }
                    .td2 { width: 100% !important; min-width: 100% !important; padding: 10px !important; }

                    .m-br-15 { height: 15px !important; }
                    .bg { height: auto !important; } 

                    .h0 { height: 0px !important; }

                    .m-td,
                    .m-hide { display: none !important; width: 0 !important; height: 0 !important; font-size: 0 !important; line-height: 0 !important; min-height: 0 !important; }

                    .m-block { display: block !important; }

                    .p30-15 { padding: 30px 15px !important; }
                    .p15-15 { padding: 15px 15px !important; }
                    .p30-0 { padding: 30px 0px !important; }
                    .p0-15-30 { padding: 0px 15px 30px 15px !important; }
                    .p0-15 { padding: 0px 15px 0px 15px !important; }
                    .mp0 { padding: 0px !important; }
                    .mp20-0-0 { padding: 20px 0px 0px 0px !important }
                    .mp30 { padding-bottom: 30px !important; }
                    .container { padding: 20px 0px !important; }
                    .outer { padding: 0px !important }

                    .fluid-img img { width: 100% !important; max-width: 100% !important; height: auto !important; }

                    .column,
                    .column-top,
                    .column-dir,
                    .column-empty,
                    .column-empty2,
                    .column-empty3,
                    .column-bottom,
                    .column-dir-top,
                    .column-dir-bottom { float: left !important; width: 100% !important; display: block !important; }

                    .column-empty { padding-bottom: 10px !important; }
                    .column-empty2 { padding-bottom: 25px !important; }
                    .column-empty3 { padding-bottom: 45px !important; }

                    .content-spacing { width: 15px !important; }
                    .content-spacing2 { width: 25px !important; }
                }
            </style>
        </head>
        <body class="body" style="padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#f4f4f4; -webkit-text-size-adjust:none;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f4f4f4">
                <tr>
                    <td align="center" valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="center" class="outer" style="padding: 60px 0px;">
                                    <table width="650" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
                                        <tr>
                                            <td class="td2" bgcolor="#ffffff" style="width:610px; min-width:610px; font-size:0pt; line-height:0pt; padding:20px; margin:0; font-weight:normal;">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <!-- Container -->
                                                        <td class="container" style="padding:27px; border:3px solid #d2c1a1;">
                                                            <!-- Header -->
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td class="img-center" style="font-size:0pt; line-height:0pt; text-align:center;">
                                                                        <img src="http://konwersatoriummuzyczne.pl/imageNewsletter/bon2/t4_logo.jpg" width="130" height="110" border="0" alt="" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="h1 center pb30" style="color:#333333; font-family:"Cinzel", Georgia, serif; font-size:40px; line-height:46px; text-transform:uppercase; text-align:center; padding-bottom:30px;">
                                                                        <multiline>
                                                                            <a href="https://www.konwersatoriummuzyczne.pl/images/logo-mini.png" target="_blank" class="link-grey" style="color:#cdcdcd; text-decoration:none;">
                                                                                Konwersatorium muzyczne
                                                                            </a>
                                                                        </multiline>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- Horizontal Line -->
                                                            <table>
                                                                <tr>
                                                                    <td class="fluid-img pb40" style="font-size:0pt; line-height:0pt; text-align:center; padding-bottom:40px;">
                                                                        <img src="http://konwersatoriummuzyczne.pl/imageNewsletter/bon2/t4_separator.jpg" width="550" height="45" border="0" alt="" />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- END Horizontal Line -->
                                                            <!-- END Header -->
                                                            <!-- Main -->
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td class="h2 pb20" style="color:#333333; font-family:"Cinzel", Georgia, serif; font-size:30px; line-height:38px; text-align:center; padding-bottom:20px;">
                                                                        Dziękujemy za dokonanie rezerwacji
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text pb30" style="color:#333333; font-family:"Roboto Slab", Georgia, serif; font-size:16px; line-height:34px; text-align:justify; font-weight:300; padding-bottom:30px;">
                                                                        <multiline>
                                                                            Poniżej załączamy informacje o złożonym Zamówieniu.
                                                                        </multiline>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text" style="color:#333333; font-family:"Roboto Slab", Georgia, serif; font-size:16px; line-height:28px; text-align:justify; font-weight:300;">
                                                                        <multiline>
                                                                            Kurs ' . $this->offer_category . ' ' . $this->offer_name .
                                                                        '</multiline>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text" style="color:#333333; font-family:"Roboto Slab", Georgia, serif; font-size:16px; line-height:28px; text-align:justify; font-weight:300;">
                                                                        <multiline>
                                                                            Pakiet obejmuje 4 godziny lekcyjne po 30 minut w cenie 400 PLN. Terminy zajęć są ustalane indywidualnie.
                                                                        </multiline>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text pb30" style="color:#333333; font-family:"Roboto Slab", Georgia, serif; font-size:16px; line-height:28px; text-align:justify; font-weight:300; padding-bottom:30px;">
                                                                        <multiline>
                                                                            Zamówienie nr ' . $this->res_no . 
                                                                        '</multiline>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text pb30" style="color:#333333; font-family:"Roboto Slab", Georgia, serif; font-size:16px; line-height:28px; text-align:justify; font-weight:300; padding-bottom:30px;">
                                                                        <multiline>
                                                                            Płatność można uregulować tradcyjnym przelewem, płatnością online lub bezpośrednio w biurze Konwersatorium Muzycznego. Szegółowe informacje zamieszcone sa poniżej.
                                                                            W celu dokonania płatności online prosimy o skorzystanie z następującego linku: <a href="http://testwebproject.eu/offer/buy/pl/11" style="font-weight: bold; color: #d2c1a1">Konwersatorium Muzyczne/Płatność</a>
                                                                        </multiline>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text" style="color:#333333; font-family:"Roboto Slab", Georgia, serif; font-size:16px; line-height:30px; text-align:left; font-weight:300; padding-bottom:30px;">
                                                                        Dane do przelewu oraz adres biura:<br>
                                                                        Konwersatorium Muzyczne<br>
                                                                        ul. Poznańska 39<br>
                                                                        00-697 Warszawa<br>
                                                                        Alior bank S.A. nr konta: 28 24 1028 4007 2120 0000 5588
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text pb30" style="color:#333333; font-family:"Roboto Slab", Georgia, serif; font-size:16px; line-height:28px; text-align:justify; font-weight:300; padding-bottom:30px;">
                                                                        <multiline>
                                                                            Rezerwacja ważna jest przez okres 7 dni. W przypadku braku płatności w podanym okresie rezerwacja zostaje anulowana.
                                                                        </multiline>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- END Main -->
                                                            <!-- Horizontal Line -->
                                                            <table>
                                                                <tr>
                                                                    <td class="fluid-img pb40" style="font-size:0pt; line-height:0pt; text-align:center; padding-bottom:40px;">
                                                                        <img src="http://konwersatoriummuzyczne.pl/imageNewsletter/bon2/t4_separator.jpg" width="550" height="45" border="0" alt="" />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- END Horizontal Line -->
                                                            
                                                            <!-- Footer -->
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td class="text pb30" style="color:#666666; font-family:"Roboto Slab", Georgia, serif; font-size:14px; line-height:24px; text-align:left; font-weight:300; padding-bottom:30px;">
                                                                        <multiline>
                                                                            W przypadku pytań prosimy o kontakt z działem sprzedaży:<br>
                                                                            <span class="link2" style="color:#666666; text-decoration:none;">
                                                                                Zadzwoń<br>+48 22 628 01 13<br>+48 883 489 184
                                                                            </span>
                                                                            <br>
                                                                            <a href="mailto:sekretariat@konwersatoriummuzyczne.pl" target="_blank" class="link2" style="color:#666666; text-decoration:none;">
                                                                                <span class="link2" style="color:#666666; text-decoration:none;">
                                                                                    Napisz<br>sekretariat@konwersatoriummuzyczne.pl
                                                                                </span>
                                                                            </a>
                                                                        </multiline>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pb30" align="center" style="padding-bottom:30px;">
                                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td class="img" width="55" style="font-size:0pt; line-height:0pt; text-align:center;">
                                                                                    <a href="https://www.facebook.com/KonwersatoriumMuzyczne/" target="_blank">
                                                                                        <img src="http://konwersatoriummuzyczne.pl/imageNewsletter/bon2/t4_ico_facebook.jpg" width="34" height="34" border="0" alt="" />
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-footer pb10" style="color:#999999; font-family:"Roboto Slab", Georgia, serif; font-size:14px; line-height:26px; text-align:center; padding-bottom:10px;">
                                                                        <multiline>
                                                                            <a href="https://www.konwersatoriummuzyczne.pl/" style="color: #d2c1a1">Konwersatorium Muzyczne</a>
                                                                        </multiline>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- END Footer -->
                                                        <!-- END Container -->
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </body>
        </html>';

        return $email_content;
    }
}

?>