<?php

function myautomatedmail($to,$subject,$body)
{
// multiple recipients
// $to  = 'tosbitechnology@yahoo.com' . ', '; // note the comma
// $to .= 'info@tosbitechnology.com';

// subject
// $subject = 'Birthday Reminders for August';

// message
//$bodycontent = str_replace("\n","<br>","$body");
$message = "
$body";

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
// $headers .= 'To: Teejay Maya <info@teejaymaya.com>, Boss <ceo@tosbitechnology.com>' . "\r\n";
$headers .= 'From: EffluxCompany Website <noreply@effluxcompany.com>' . "\r\n";
// $headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
// $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);
    $mresult="success";
    return $mresult; 
}
function died($error) {
            // ERROR MESSAGES TO THE USER
            echo "We are very sorry, but there were error(s) found with the form you submitted. ";
            echo "These errors appear below.<br /><br />";
            echo $error."<br /><br />";
            echo "Please go back and fix these errors.<br /><br />";
            die();
        }


$Fname_from = $_POST['nname']; 
$Email_from = $_POST['eemail']; 
$Message_from = $_POST['messages']; 

// MANDATORY FIELDS 
$error_message = "";
        $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
          if(!preg_match($email_exp,$Email_from)) {
            $error_message .= 'The email address you entered does not appear to be valid.<br/>
            Please use the back button on your browser to go back to the <br>
             Contact Us Form<br />';
          }

$string_exp = "/^[A-Za-z .'-]+$/";
          if(!preg_match($string_exp,$Fname_from)) {
            $error_message .= 'The Full Name you entered does not appear to be valid. <br> 
            Please use the back button on your browser to go back to the <br>
             Contact Us Form<br />';
          } 
          if(strlen($error_message) > 0) {
            die($error_message);
          }

$from = "EffluxCompany Website <noreply@effluxcompany.com>";
$to = "EffluxCompany Webmaster <info@effluxcompany.com>";
$subject = "From EffluxCompany.com Contact Form";
$body = "Hi, new entry from the CONTACT US FORM of www.EffluxCompany.com website<br><br>  
Full name: $Fname_from\n 
Email: $Email_from\n 
Message: $Message_from\n ";

$myautomailresult = myautomatedmail($to,$subject,$body);
if ($myautomailresult == "success") {
    $mailformsuccessmsg = "Email sent successfully";
} else {
    $mailformerrormsg = "Failure in sending email: $myautomailresult";
 }

header('Location: ../index.html?formsent=yes');

?>