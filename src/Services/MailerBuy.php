<?php

namespace Konwersatorium\Services;

use Konwersatorium\Core\Config;
use Konwersatorium\Domain\OfferReservation;

class MailerBuy {
    private $config_mailer;
    private $config_domain;

    private $offerReservation;

    public function __construct($offerReservation) {
        // get config data
        $this->config_mailer = Config::getConfig()->get('mailer'); // returns array
        $this->config_domain = Config::getConfig()->get('domain'); // returns string

        $this->offerReservation = $offerReservation;
    }


    public function isEmailSend($lang) {
        // Set the recipient email address.
        // $recipient = "sekretariat@konwersatoriummuzyczne.pl";
        $recipient = $this->offerReservation->getEmail();

        // Set the email subject.
        $subject = "Konwersatorium Muzyczne: Potwierdzenie rezerwacji kursu";
       
        // Build the email content.
        $email_content = $this->createEmail($lang);

        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        // Use plain text and html version of an email
        // $headers[] = 'Content-Type: multipart/alternative; boundary=boundary1q2w3e4r5t6y';
        
        $headers[] = 'Content-type: text/html; charset=UTF-8';
        // Additional headers
        // $headers[] = 'From: sekretariat@konwersatoriummuzyczne.pl';
        
        $headers[] = 'From: ' . $this->config_mailer['from'];

        // Send the email.
        set_time_limit(120); // extend the execution time 
        $mail=mail($recipient, $subject, $email_content, implode("\r\n", $headers));

//        if (true) {

        if ($mail) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            $this->sendInfoToAdmin();
            return true;
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            return false;
        }
    }

    private function sendInfoToAdmin() {
        // Set the recipient email address.
        $recipient = "sekretariat@konwersatoriummuzyczne.pl";


        // Set the email subject.
        $subject = "Nowa rezerwacja kursu. Numer rezerwacji: " . $this->offerReservation->getResNo();
       
        // Build the email content.
        $email_content = "Zarejestrowano rezerwację kursu. 
                        <br> Numer rezerwacji: " . $this->offerReservation->getResNo() . "
                        <br> Imię: " . $this->offerReservation->getName() . "
                        <br> Email: " . $this->offerReservation->getEmail() . "
                        <br> Kategoria: " . $this->offerReservation->getOfferCategory() . "
                        <br> Nazwa kursu: " . $this->offerReservation->getOfferName() . "
                        <br> Data rezerwacji: " . $this->offerReservation->getResDate() . "
                        ";

        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        // Use plain text and html version of an email
        // $headers[] = 'Content-Type: multipart/alternative; boundary=boundary1q2w3e4r5t6y';
        
        $headers[] = 'Content-type: text/html; charset=UTF-8';
        // Additional headers
        // $headers[] = 'From: sekretariat@konwersatoriummuzyczne.pl';
        
        $headers[] = 'From: ' . $this->config_mailer['from'];

        // Send the email.
        set_time_limit(120); // extend the execution time 
        $mail=mail($recipient, $subject, $email_content, implode("\r\n", $headers));

        // TODO: log if email not send
    }


    private function createEmail($lang) {
        $email_content= "";

        if($lang == 'en' | $lang == 'vi' | $lang == 'zh' ) {
            $email_content = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
            <html lang='pl' xml:lang='pl' xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
            <head>
                <meta http-equiv='Content-type' content='text/html; charset=utf-8' />
                <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />
                <meta http-equiv='X-UA-Compatible' content='IE=edge' />
                <meta name='format-detection' content='date=no' />
                <meta name='format-detection' content='address=no' />
                <meta name='format-detection' content='telephone=no' />
                <meta name='x-apple-disable-message-reformatting' />
                <link href='https://fonts.googleapis.com/css?family=Cinzel:400,700,900|Roboto+Slab:300,400,700|Old+Standard+TT:400,400i,700' rel='stylesheet' />
                <title>Konwersatorium Muzyczne</title>
            
                <style type='text/css' media='screen'>
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
            <body class='body' style='padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#f4f4f4; -webkit-text-size-adjust:none;'>
                <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#f4f4f4'>
                    <tr>
                        <td align='center' valign='top'>
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                    <td align='center' class='outer' style='padding: 60px 0px;'>
                                        <table width='650' border='0' cellspacing='0' cellpadding='0' class='mobile-shell'>
                                            <tr>
                                                <td class='td2' bgcolor='#ffffff' style='width:610px; min-width:610px; font-size:0pt; line-height:0pt; padding:20px; margin:0; font-weight:normal;'>
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                        <tr>
                                                            <!-- Container -->
                                                            <td class='container' style='padding:27px; border:3px solid #d2c1a1;'>
                                                                <!-- Header -->
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                                    <tr>
                                                                        <td class='img-center' style='font-size:0pt; line-height:0pt; text-align:center;'>
                                                                            <img src='" . $this->config_domain . "/images/email/logo.jpg' width='130' height='110' border='0' alt='' />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class='h1 center pb30' style='color:#333333; font-family:Cinzel, Georgia, serif; font-size:40px; line-height:46px; text-transform:uppercase; text-align:center; padding-bottom:30px;'>
                                                                            <multiline>
                                                                                <a href='" . $this->config_domain . "' target='_blank' class='link-grey' style='color:#cdcdcd; text-decoration:none;'>
                                                                                    Konwersatorium muzyczne
                                                                                </a>
                                                                            </multiline>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <!-- Horizontal Line -->
                                                                <table>
                                                                    <tr>
                                                                        <td class='fluid-img pb40' style='font-size:0pt; line-height:0pt; text-align:center; padding-bottom:40px;'>
                                                                            <img src='" . $this->config_domain . "/images/email/separator.jpg' width='550' height='45' border='0' alt='' />
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <!-- END Horizontal Line -->
                                                                <!-- END Header -->
                                                                <!-- Main -->
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                                    <tr>
                                                                        <td class='h2 pb20' style='color:#333333; font-family:Cinzel, Georgia, serif; font-size:30px; line-height:38px; text-align:center; padding-bottom:20px;'>
                                                                            Thank you for your reservation
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class='text pb30' style='color:#333333; font-family:Roboto, Georgia, serif; font-size:16px; line-height:34px; text-align:justify; font-weight:300; padding-bottom:30px;'>
                                                                            <multiline>
                                                                                Below you will find details confirming your reservation.
                                                                            </multiline>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class='text' style='color:#333333; font-family:Roboto, Georgia, serif; font-size:16px; line-height:28px; text-align:justify; font-weight:300;'>
                                                                            <multiline>
                                                                            " . $this->offerReservation->getOfferCategory() . ", " . $this->offerReservation->getOfferCategory() . "
                                                                            </multiline>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class='text' style='color:#333333; font-family:Roboto, Georgia, serif; font-size:16px; line-height:28px; text-align:justify; font-weight:300;'>
                                                                            <multiline>
                                                                                The course consists of 4 lessons, 30 min each, and costs €99.
                                                                                The booking is valid for 30 days since the day of the purchase.
                                                                                Times and dates of the lessons are discussed individually over a phone (call +64 883 489 184) or e-mail (sekretariat@konwersatoriummuzyczne.pl).
                                                                                The payment is non-refundable, even if you choose to withdraw from the course.
                                                                                In case of fortuitous events, a substitute teacher will be assigned to you.
                                                                                Lessons can be cancelled 24 hours before a scheduled time, at the latest, cancelling any time after the deadline will not be acknowledged and such lesson will be considered as taken.
                                                                            </multiline>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class='text pb30' style='color:#333333; font-family:Roboto, Georgia, serif; font-size:16px; line-height:28px; text-align:justify; font-weight:300; padding-bottom:30px;'>
                                                                            <multiline>
                                                                             Order No. " . $this->offerReservation->getResNo() . "
                                                                            </multiline>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class='text pb30' style='color:#333333; font-family:Roboto, Georgia, serif; font-size:16px; line-height:28px; text-align:justify; font-weight:300; padding-bottom:30px;'>
                                                                            <multiline>
                                                                                The payment can be done by a traditional bank transfer, an online payment or directly at the premises of the Music Conversatory.                                                                    
                                                                                <!-- Version with online payment - link must contain res_no -->
                                                                                See the details below. To make an online payment, please follow the link:
                <!-- Go back to konwersatoriummuzyczne page with payment options -->
                <a href='https://www.konwersatoriummuzyczne.pl/offer/buy/payment/" . $lang . "/" . $this->offerReservation->getOfferId() . "/" . $this->offerReservation->getId() . "/" . $this->offerReservation->getResNo() . "' style='font-weight: bold; color: #d2c1a1'>Konwersatorium Muzyczne / Online Payment</a>
                                                                            </multiline>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class='text' style='color:#333333; font-family:Roboto, Georgia, serif; font-size:16px; line-height:30px; text-align:left; font-weight:300; padding-bottom:30px;'>
                                                                            Bank transfer details and the office address:<br>
                                                                            Bogna Kołodziej Konwersatorium Muzyczne<br>
                                                                            ul. Aleje Jerozolimskie 47/20<br>
                                                                            00-697 Warszawa<br>
                                                                            Santander Bank Polska SA. nr konta: 82109018700000000146786604
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class='text pb30' style='color:#333333; font-family:Roboto, Georgia, serif; font-size:16px; line-height:28px; text-align:justify; font-weight:300; padding-bottom:30px;'>
                                                                            <multiline>
                                                                                The reservation is valid for 7 more days. If a payment is not made within that time, the reservation will be cancelled.
                                                                            </multiline>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <!-- END Main -->
                                                                <!-- Horizontal Line -->
                                                                <table>
                                                                    <tr>
                                                                        <td class='fluid-img pb40' style='font-size:0pt; line-height:0pt; text-align:center; padding-bottom:40px;'>
                                                                            <img src='" . $this->config_domain . "/images/email/separator.jpg' width='550' height='45' border='0' alt='' />
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <!-- END Horizontal Line -->
                                                                
                                                                <!-- Footer -->
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                                    <tr>
                                                                        <td class='text pb30' style='color:#666666; font-family:Roboto, Georgia, serif; font-size:14px; line-height:24px; text-align:left; font-weight:300; padding-bottom:30px;'>
                                                                            <multiline>
                                                                                If you have any questions, please contact the sales department:<br>
                                                                                <span class='link2' style='color:#666666; text-decoration:none;'>
                                                                                    Call us<br>+48 22 628 01 13<br>+48 883 489 184
                                                                                </span>
                                                                                <br>
                                                                                <a href='mailto:sekretariat@konwersatoriummuzyczne.pl' target='_blank' class='link2' style='color:#666666; text-decoration:none;'>
                                                                                    <span class='link2' style='color:#666666; text-decoration:none;'>
                                                                                        Write to us<br>sekretariat@konwersatoriummuzyczne.pl
                                                                                    </span>
                                                                                </a>
                                                                            </multiline>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class='pb30' align='center' style='padding-bottom:30px;'>
                                                                            <table border='0' cellspacing='0' cellpadding='0'>
                                                                                <tr>
                                                                                    <td class='img' width='55' style='font-size:0pt; line-height:0pt; text-align:center;'>
                                                                                        <a href='https://www.facebook.com/KonwersatoriumMuzyczne/' target='_blank'>
                                                                                            <img src='" . $this->config_domain . "/images/email/icon_facebook.jpg' width='34' height='34' border='0' alt='' />
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class='text-footer pb10' style='color:#999999; font-family:Roboto, Georgia, serif; font-size:14px; line-height:26px; text-align:center; padding-bottom:10px;'>
                                                                            <multiline>
                                                                                <a href='" . $this->config_domain . "' style='color: #d2c1a1'>Konwersatorium Muzyczne</a>
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
            </html>";

        } else {
            $email_content = "
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html lang='pl' xml:lang='pl' xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
<head>
    <meta http-equiv='Content-type' content='text/html; charset=utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta name='format-detection' content='date=no' />
    <meta name='format-detection' content='address=no' />
    <meta name='format-detection' content='telephone=no' />
    <meta name='x-apple-disable-message-reformatting' />
    <link href='https://fonts.googleapis.com/css?family=Cinzel:400,700,900|Roboto+Slab:300,400,700|Old+Standard+TT:400,400i,700' rel='stylesheet' />
    <title>Konwersatorium Muzyczne</title>

    <style type='text/css' media='screen'>
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
<body class='body' style='padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#f4f4f4; -webkit-text-size-adjust:none;'>
    <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#f4f4f4'>
        <tr>
            <td align='center' valign='top'>
                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                    <tr>
                        <td align='center' class='outer' style='padding: 60px 0px;'>
                            <table width='650' border='0' cellspacing='0' cellpadding='0' class='mobile-shell'>
                                <tr>
                                    <td class='td2' bgcolor='#ffffff' style='width:610px; min-width:610px; font-size:0pt; line-height:0pt; padding:20px; margin:0; font-weight:normal;'>
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                            <tr>
                                                <!-- Container -->
                                                <td class='container' style='padding:27px; border:3px solid #d2c1a1;'>
                                                    <!-- Header -->
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                        <tr>
                                                            <td class='img-center' style='font-size:0pt; line-height:0pt; text-align:center;'>
                                                                <img src='" . $this->config_domain . "/images/email/logo.jpg' width='130' height='110' border='0' alt='' />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class='h1 center pb30' style='color:#333333; font-family:Cinzel, Georgia, serif; font-size:40px; line-height:46px; text-transform:uppercase; text-align:center; padding-bottom:30px;'>
                                                                <multiline>
                                                                    <a href='" . $this->config_domain . "' target='_blank' class='link-grey' style='color:#cdcdcd; text-decoration:none;'>
                                                                        Konwersatorium muzyczne
                                                                    </a>
                                                                </multiline>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <!-- Horizontal Line -->
                                                    <table>
                                                        <tr>
                                                            <td class='fluid-img pb40' style='font-size:0pt; line-height:0pt; text-align:center; padding-bottom:40px;'>
                                                                <img src='" . $this->config_domain . "/images/email/separator.jpg' width='550' height='45' border='0' alt='' />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <!-- END Horizontal Line -->
                                                    <!-- END Header -->
                                                    <!-- Main -->
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                        <tr>
                                                            <td class='h2 pb20' style='color:#333333; font-family:Cinzel, Georgia, serif; font-size:30px; line-height:38px; text-align:center; padding-bottom:20px;'>
                                                                Dziękujemy za dokonanie rezerwacji
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class='text pb30' style='color:#333333; font-family:Roboto, Georgia, serif; font-size:16px; line-height:34px; text-align:justify; font-weight:300; padding-bottom:30px;'>
                                                                <multiline>
                                                                    Poniżej załączamy informacje o złożonym Zamówieniu.
                                                                </multiline>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class='text' style='color:#333333; font-family:Roboto, Georgia, serif; font-size:16px; line-height:28px; text-align:justify; font-weight:300;'>
                                                                <multiline>
                                                                    Kurs  " . $this->offerReservation->getOfferCategory() . ", " . $this->offerReservation->getOfferCategory() . "
                                                                </multiline>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class='text' style='color:#333333; font-family:Roboto, Georgia, serif; font-size:16px; line-height:28px; text-align:justify; font-weight:300;'>
                                                                <multiline>
                                                                    Pakiet obejmuje 4 godziny lekcyjne po 30 minut i jest w cenie 400 PLN. Do wykorzystania w ciągu 30 dni od daty zakupu. 
                                                                    Terminy zajęć są ustalane indywidualnie – telefonicznie 883 489 184 lub mejlowo sekretariat@konwersatoriummuzyczne.pl  
                                                                    Opłata nie podlega zwrotowi w przypadku rezygnacji z usług świadczonych przez Konwersatorium Muzyczne. 
                                                                    W sytuacji zaistnienia zdarzeń losowych zapewniamy zastępstwo nauczyciela prowadzącego. 
                                                                    Lekcje można odwoływać najpóźniej 24h przed planowaną lekcją, po tym terminie lekcja traktowana jest jako przeprowadzona.
                                                                </multiline>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class='text pb30' style='color:#333333; font-family:Roboto, Georgia, serif; font-size:16px; line-height:28px; text-align:justify; font-weight:300; padding-bottom:30px;'>
                                                                <multiline>
                                                                    Zamówienie nr " . $this->offerReservation->getResNo() .
                                                                "</multiline>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class='text pb30' style='color:#333333; font-family:Roboto, Georgia, serif; font-size:16px; line-height:28px; text-align:justify; font-weight:300; padding-bottom:30px;'>
                                                                <multiline>
                                                                    Płatność można uregulować tradycyjnym przelewem lub bezpośrednio w biurze Konwersatorium Muzycznego.
                                                                    Szczegółowe informacje zamieszczone są poniżej.
                                                                    
                                                                    <!-- Version with online payment - link must contain data required by dotpay gateway -->
                                                                        Płatność można uregulować tradycyjnym przelewem, płatnością online lub bezpośrednio w biurze Konwersatorium Muzycznego.
                                                                        W celu dokonania płatności online prosimy o skorzystanie z następującego linku: 
                    <!-- Go back to konwersatoriummuzyczne page with payment options -->
    <a href='https://www.konwersatoriummuzyczne.pl/offer/buy/payment/" . $lang . "/" . $this->offerReservation->getOfferId() . "/" . $this->offerReservation->getId() . "/" . $this->offerReservation->getResNo() . "' style='font-weight: bold; color: #d2c1a1'>Konwersatorium Muzyczne / Online Payment</a>

                                                                </multiline>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class='text' style='color:#333333; font-family:Roboto, Georgia, serif; font-size:16px; line-height:30px; text-align:left; font-weight:300; padding-bottom:30px;'>
                                                                Dane do przelewu oraz adres biura:<br>
                                                                Bogna Kołodziej Konwersatorium Muzyczne<br>
                                                                ul. Aleje Jerozolimskie 47/20<br>
                                                                00-697 Warszawa<br>
                                                                Santander Bank Polska SA. nr konta: 82109018700000000146786604
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class='text pb30' style='color:#333333; font-family:Roboto, Georgia, serif; font-size:16px; line-height:28px; text-align:justify; font-weight:300; padding-bottom:30px;'>
                                                                <multiline>
                                                                    Rezerwacja ważna jest przez okres 7 dni. W przypadku braku płatności w podanym terminie rezerwacja zostaje anulowana.
                                                                </multiline>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <!-- END Main -->
                                                    <!-- Horizontal Line -->
                                                    <table>
                                                        <tr>
                                                            <td class='fluid-img pb40' style='font-size:0pt; line-height:0pt; text-align:center; padding-bottom:40px;'>
                                                                <img src='" . $this->config_domain . "/images/email/separator.jpg' width='550' height='45' border='0' alt='' />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <!-- END Horizontal Line -->
                                                    
                                                    <!-- Footer -->
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                        <tr>
                                                            <td class='text pb30' style='color:#666666; font-family:Roboto, Georgia, serif; font-size:14px; line-height:24px; text-align:left; font-weight:300; padding-bottom:30px;'>
                                                                <multiline>
                                                                    W przypadku pytań prosimy o kontakt z działem sprzedaży:<br>
                                                                    <span class='link2' style='color:#666666; text-decoration:none;'>
                                                                        Zadzwoń<br>+48 22 628 01 13<br>+48 883 489 184
                                                                    </span>
                                                                    <br>
                                                                    <a href='mailto:sekretariat@konwersatoriummuzyczne.pl' target='_blank' class='link2' style='color:#666666; text-decoration:none;'>
                                                                        <span class='link2' style='color:#666666; text-decoration:none;'>
                                                                            Napisz<br>sekretariat@konwersatoriummuzyczne.pl
                                                                        </span>
                                                                    </a>
                                                                </multiline>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class='pb30' align='center' style='padding-bottom:30px;'>
                                                                <table border='0' cellspacing='0' cellpadding='0'>
                                                                    <tr>
                                                                        <td class='img' width='55' style='font-size:0pt; line-height:0pt; text-align:center;'>
                                                                            <a href='https://www.facebook.com/KonwersatoriumMuzyczne/' target='_blank'>
                                                                                <img src='" . $this->config_domain . "/images/email/icon_facebook.jpg' width='34' height='34' border='0' alt='' />
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class='text-footer pb10' style='color:#999999; font-family:Roboto, Georgia, serif; font-size:14px; line-height:26px; text-align:center; padding-bottom:10px;'>
                                                                <multiline>
                                                                    <a href='" . $this->config_domain . "' style='color: #d2c1a1'>Konwersatorium Muzyczne</a>
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
</html>";
        }
    
        return $email_content;
    }
}

?>