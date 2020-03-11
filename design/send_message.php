<?php 
$to = $_POST['email'];
$subject = "Contact us";
$txt =  "Hi,<br>"
        .$_POST['name']." has enquiried through your website contact form.<br><br>"
        ."His contact details are as follows: <br>"
        .$_POST['name']."<br>"
        .$_POST['email']."<br>"
        .$_POST['contact']."<br>"
        .$_POST['message']."<br>";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";        
$headers .= "From: info@settlleinusa.com" . "\r\n";

mail($to,$subject,$txt,$headers);

$to = $_POST['email'];
$subject = "Contact us";
$txt =  "Hi ".$_POST['name'].",<br>"
        ." Thanks for your enquiry at settlleinusa.com.<br><br>"
        ."Our support person will contact you soon.<br>"
        ."<br>"
        ."Regards,<br>"
        ."Support Team<br>";

mail($to,$subject,$txt,$headers);

header("Location: http://settlleinusa.com/contact/");
die;
?>