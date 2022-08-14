<?php 




require("vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($subject, $body, $email, $name, $html = false) { 
    
    //Configuration host
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->host = 'smtp.gmail.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $phpmailer->Port = 465;
    $phpmailer->Username = "laloromario95@gmail.com";
    $phpmailer->Password = "icqkipujzqoqdbgu";

    // Destination
    $phpmailer->setFrom("laloromario95@gmail.com", "my company");
    $phpmailer->addAddress($email, $name);

    //Define content of my email
    $phpmailer>isHTML($html);                                  //Set email format to HTML
    $phpmailer->Subject = $subject;
    $phpmailer->Body    = $body;
    
    //send email
    $phpmailer->send();

}

?>