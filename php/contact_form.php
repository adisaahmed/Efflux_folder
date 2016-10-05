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



$Fname_from = $_POST['fullname']; 
$Email_from = $_POST['email']; 
$Phonenumber_from = $_POST['pnumber']; 
$Subject_from = $_POST['subjected'];
$Message_from = $_POST['messaged']; 


$from = "EffluxCompany Website <noreply@effluxcompany.com>";
$to = "EffluxCompany Webmaster <info@effluxcompany.com>";
$subject = "From EffluxCompany.com Contact Form";
$body = "Hi, new entry from the CONTACT US FORM PAGE of www.EffluxCompany.com website<br><br>  
Fullname: $Fname_from<br>  
Email: $Email_from<br> 
PhoneNumber: $Phonenumber_from<br> 
Subject: $Subject_from<br> 
Message: $Message_from<br> ";

$myautomailresult = myautomatedmail($to,$subject,$body);
if ($myautomailresult == "success") {
    $mailformsuccessmsg = "Email sent successfully";
} else {
    $mailformerrormsg = "Failure in sending email: $myautomailresult";
 }

header('Location: ../index.html?formsent=yes');

?>