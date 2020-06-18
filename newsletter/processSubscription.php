<?php
set_time_limit(300);

// define variables and set to empty values
$nameErr = "";
$emailErr = "";
$checkboxErr = "";
$date = date("Y-n-j");
$name = "";
$email = "";
$checkbox = "";

$message = "Proszę wprowadzić poprawne dane";

// Letter Content

// Flag that checks if the data ($name and $emial) are set up correctly. If are set up write them to the data base. 
$dataSetup = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "First Name is required";
    $dataSetup = false;
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $dataSetup = false;
  } else {
    $email = test_input($_POST["email"]);
    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $email = "";
        $dataSetup = false;
      }
  }

  if (empty($_POST["checkbox"])) {
    $checkboxErr = "Checkbox is required";
    $dataSetup = false;
  } else {
    $checkbox = test_input($_POST["checkbox"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Write data to the database
if($dataSetup === true) {
  // Check if email exist
  if(! emailExist($email)) {
    $file = fopen("database.csv","a+");
    echo fwrite($file,"$date,$name,$email,false\n");
    fclose($file);
    $message = "Saved";

    // Send confirmation email
    $to = $email;
    $subject = "Potwierdzenie subskrypcji";
    $txt = file_get_contents('subscriptionLetter.html');
    // Replace 'placeholderForEmail' with $email value
    $txt = str_replace("placeholderForEmail", "$email", $txt);;
    // To send HTML mail, the Content-type header must be set
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=UTF-8';
    // Additional headers
    $headers[] = "From: sekretariat@konwersatoriummuzyczne.pl";
    mail($to, $subject, $txt, implode("\r\n", $headers));
  } else {
    // CHECK IT - WHAT IF SOMEONE DOESN'T CONFIRMED A SUBSCRIPTION - "Podany adres email istnieje na naszej liście mailingowej."
    $message = "Exist";
  }
}

// Search if the email exist
function emailExist($data) {
    $file = fopen("database.csv", "r");
    while(! feof($file)) {
        $array = fgetcsv($file);
        if ($array[2] === $data) {
            fclose($file);
            return true;
        }
    }
    fclose($file);
    return false;
}

echo "Response from processSubscription.php file. <br> " . $message;
?>