<?php
require 'vendor/autoload.php'; // Load Twilio SDK

use Twilio\Rest\Client;

/* 
#Uncomment If You Want To Include Sms
// Twilio API Credentials
$account_sid = "Account_SID";
$auth_token = "Auth_Token";
$twilio_number = "Twillio_Number"; // Must be a valid Twilio number

*/

// Get Form Data
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$doctor = $_POST['doctor'];
$date = $_POST['date'];
$time = $_POST['time'];
$problem = $_POST['problem'];

/*

// Ensure the phone number is in the correct format (+91 for India)
if (!preg_match('/^\+91\d{10}$/', $mobile)) {
    $mobile = "+91" . ltrim($mobile, '0'); // Add +91 if missing
}

// Create CSV File if it doesn’t exist
$file = 'appointments.csv';
if (!file_exists($file)) {
    $header = ['Name', 'Email', 'Mobile', 'Doctor', 'Date', 'Time', 'Problem'];
    $fp = fopen($file, 'w');
    fputcsv($fp, $header);
    fclose($fp);
}

*/

// Save Appointment Data to CSV
$fp = fopen($file, 'a');
fputcsv($fp, [$name, $email, $mobile, $doctor, $date, $time, $problem]);
fclose($fp);

// Create SMS Message
$messageBody = "
Appointment Confirmation:
Name: $name
Doctor: $doctor
Date: $date
Time: $time
Problem: $problem
From: Reisha SIES Hospital";

/*

try {
    $client = new Client($account_sid, $auth_token);
    $client->messages->create(
        $mobile, // User's phone number
        [
            'from' => $twilio_number,
            'body' => $messageBody
        ]
    );

*/

    // JavaScript Alert with Confirmation and Reload (Redirects to HTML Page)
    echo "<script>
        alert('✅ Appointment booked! You have received an SMS on your registered phone number.');
        window.location.href = 'index.html'; // Change this to your actual HTML page
    </script>";
} catch (Exception $e) {
    echo "<script>
        alert('❌ Error: " . $e->getMessage() . "');
        window.location.href = 'index.html'; // Change this to your actual HTML page
    </script>";
}
?>
