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



$Fname_from = $_POST['firstname']; 
$Lname_from = $_POST['lastname']; 
$Email_from = $_POST['email']; 
$Phonenumber_from = $_POST['pnumber']; 
$Description_from = $_POST['description']; 
$Checkbox_from = $_POST['whatwearebuilding'];
$Dropdown_from = $_POST['budget'];
$Timeline_from = $_POST['timeline'];

$from = "EffluxCompany Website <noreply@effluxcompany.com>";
$to = "EffluxCompany Webmaster <info@effluxcompany.com>";
$subject = "From EffluxCompany.com Contact Form";
$body = "Hi, new entry from the contact form of www.EffluxCompany.com website\n\n 
FirstName: $Fname_from\n
LastName: $Lname_from\n
Email: $Email_from\n
PhoneNumber: $Phonenumber_from\n
Description: $Description_from\n
WeAreBuilding: $Checkbox_from\n
Budget: $Dropdown_from\n
TimeLine: $Timeline_from\n";


$myautomailresult = myautomatedmail($to,$subject,$body);
if ($myautomailresult == "success") {
    $mailformsuccessmsg = "Email sent successfully";
} else {
    $mailformerrormsg = "Failure in sending email: $myautomailresult";
 }

header('Location: ../index.html?formsent=yes');

?>