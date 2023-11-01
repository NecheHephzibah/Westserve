<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


// Database connection function
function connectToDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "task_manager";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}

// Function to sanitize user input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to validate user input
function validateInput($name, $email, $phone) {
    $nameErr = $emailErr = $phoneErr = "";

    if (empty($name)) {
        $nameErr = "Please enter a valid name";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nameErr = "Only letters, spaces, hyphens, and apostrophes allowed";
    }

    if (empty($email)) {
        $emailErr = "Please enter a valid email";
    }

    if (empty($phone)) {
        $phoneErr = "Please enter a valid phone number";
    } elseif (!preg_match("/^[+0-9][0-9]*$/", $phone)) {
        $phoneErr = "Please enter a valid phone number";
    }

    return [
        "nameErr" => $nameErr,
        "emailErr" => $emailErr,
        "phoneErr" => $phoneErr
    ];
}

// Function to insert data into the database
function insertDataToDatabase($conn, $name, $email, $phone, $state, $city, $message) {
    $name = test_input($name);
    $email = test_input($email);
    $phone = test_input($phone);
    $state = test_input($state);
    $city = test_input($city);
    $message = test_input($message);

    $sql = "INSERT INTO westeserve_clients (name, email, phone, state, city, message) 
            VALUES ('$name', '$email', '$phone', '$state', '$city', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Data successfully inserted
        return true;
    } else {
        // Error occurred while inserting data
        return false;
    }
}

// Function to send an email
function sendEmail($email, $name) {
    require 'email-config.php';
    require 'PHPMailer-master\src\Exception.php';
    require 'PHPMailer-master\src\PHPMailer.php';
    require 'PHPMailer-master\src\SMTP.php';
   

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'neche.bless@gmail.com';
    $mail->Password = 'cr1y1ngb@b1';
    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('neche.bless@gmail.com', 'Chinecherem Onovo');
    $mail->addAddress($email, $name);

    $mail->isHTML(true);
    $mail->Subject = 'Thank you for your submission';
    $mail->Body = 'Thank you for submitting your form. We have received your data.';

    if ($mail->send()) {
        // Email successfully sent
        echo 'Email sent successfully';
    } else {
        // Email sending failed
        echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }
}

// Main code execution
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = connectToDatabase();
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $state = $_POST["state"];
    $city = $_POST["city"];
    $message = $_POST["message"];
    
    $validationResults = validateInput($name, $email, $phone);

    $nameErr = $validationResults["nameErr"];
    $emailErr = $validationResults["emailErr"];
    $phoneErr = $validationResults["phoneErr"];

    if (empty($nameErr) && empty($emailErr) && empty($phoneErr)) {
        if (insertDataToDatabase($conn, $name, $email, $phone, $state, $city, $message)) {
            if (sendEmail($email, $name)) {
                header("Location: thank_you.php");
                exit;
            } else {
                echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            }
        } else {
            echo 'Database error: Data could not be inserted.';
        }
    }
    
    $conn->close();
}
?>
