<?php

function myautomatedmail($to,$subject,$body)
{

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


$Fname_from = $_POST['name']; 
$Address_from = $_POST['Address']; 
$State_from = $_POST['State']; 
$Email_from = $_POST['email']; 
$Phonenumber_from = $_POST['Pnumber']; 
$Description_from = $_POST['Description']; 
$Radio_from = $_POST['whatwearebuilding'];
$Budget_from = $_POST['amount'];
$Timeline_from = $_POST['timeline'];


// MANDATORY FIELDS 
 $error_message = "";
        $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
          if(!preg_match($email_exp,$Email_from)) {
            $error_message .= 'The email address you entered does not appear to be valid.<br />';
          }
            $string_exp = "/^[A-Za-z .'-]+$/";
          if(!preg_match($string_exp,$Fname_from)) {
            $error_message .= 'The First name you entered does not appear to be valid.<br />';
          }
          
           $string_exp = "/^(NA|[0-9+-]+)$/";
          if(!preg_match($string_exp,$Phonenumber_from)) {
            $error_message .= 'The Phone Number you entered does not appear to be valid.<br />';
          }
           if(strlen($error_message) > 0) {
            died($error_message);
          }

$from = "EffluxCompany Website <noreply@effluxcompany.com>";
$to = "EffluxCompany Webmaster <info@effluxcompany.com>";
$subject = "From EffluxCompany.com Process Form";
$body = "Hi, new entry from the contact form of www.EffluxCompany.com website\n\n 
Full Name: $Fname_from\n
Email: $Email_from\n
Phone Number: $Phonenumber_from\n
Address: $Address_from\n
State: $State_from
Description: $Description_from\n
We Are Building: $Radio_from\n
Budget: $Budget_from\n
Time Line: $timeline_from\n";


$myautomailresult = myautomatedmail($to,$subject,$body);
if ($myautomailresult == "success") {
    $mailformsuccessmsg = "Email sent successfully";
} else {
    $mailformerrormsg = "Failure in sending email: $myautomailresult";
 }

header('Location: ../index.html?formsent=yes');

?>