<?php
// Start session to store OTP
session_start();

// Include PHPMailer library for sending emails
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Function to send OTP to email
function sendOTPEmail($email, $otp) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Set your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@example.com';
        $mail->Password = 'your-email-password';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('your-email@example.com', 'JK Learning Centre');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP for Registration';
        $mail->Body = "Your OTP for registration is: $otp";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Function to send OTP to phone number
function sendOTPPhone($phone, $otp) {
    // Implement your SMS gateway API to send OTP to phone
    // For example, using Twilio API

    // $twilio_sid = 'your_twilio_sid';
    // $twilio_token = 'your_twilio_token';
    // $twilio_phone = 'your_twilio_phone';

    // $client = new Twilio\Rest\Client($twilio_sid, $twilio_token);
    // $message = $client->messages->create(
    //     $phone,
    //     array(
    //         'from' => $twilio_phone,
    //         'body' => "Your OTP for registration is: $otp"
    //     )
    // );

    // return $message->sid ? true : false;

    // Dummy return true for now
    return true;
}

// Generate a 6-digit OTP
$otp = rand(100000, 999999);

// Store the OTP in session
$_SESSION['otp'] = $otp;

$email = $_POST['email'];
$phone = $_POST['phone'];

if (sendOTPEmail($email, $otp) && sendOTPPhone($phone, $otp)) {
    echo "OTP has been sent to your email and phone.";
} else {
    echo "Failed to send OTP. Please try again.";
}
?>
