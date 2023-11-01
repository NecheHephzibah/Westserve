<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer-master\src\PHPMailer.php'; // Adjust the path to your PHPMailer autoload.php file

// Create a new PHPMailer instance
$mail = new PHPMailer();

// Set the mailer to use SMTP
$mail->isSMTP();

// Set the SMTP server and port
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587; // Use the appropriate port for your email provider

// Set SMTP authentication
$mail->SMTPAuth = true;
$mail->Username = 'neche.bless@gmail.com';
$mail->Password = 'cr1y1ngb@b1';

// Enable SMTP encryption (TLS or SSL)
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use ENCRYPTION_SMTPS for SSL

// Set your 'From' and 'From Name' for outgoing emails
$mail->setFrom('neche.bless@gmail.com', 'Chukwunonso Patrick');

// Add other configuration settings as needed

// Important: Do not call $mail->send() in this script; it's for configuration only
?>
