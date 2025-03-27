<?php
require 'vendor/autoload.php'; // Load Twilio SDK

use Twilio\Rest\Client;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Twilio API Credentials
    $account_sid = "AC5f84a48a47c8a1325fca7e73dd994694";
    $auth_token = "8d766da967ce21b0a41b6dca6cf0a658";
    $twilio_number = "+12314033756"; // Must be a valid Twilio number

    // Get Form Data
    $name = $_POST['name'];
    $email = $_POST['email']; 
    $mobile = $_POST['number']; // Updated to match form field name
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Ensure the phone number is in the correct format (+91 for India)
    if (!preg_match('/^\+91\d{10}$/', $mobile)) {
        $mobile = "+91" . ltrim($mobile, '0'); // Add +91 if missing
    }

    // Create SMS Message
    $messageBody = "Query Received:
    Name: $name
    Subject: $subject
    Message: $message
    From: Reisha SIES Hospital";

    try {
        // Send SMS using Twilio
        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            $mobile, // User's phone number
            [
                'from' => $twilio_number,
                'body' => $messageBody
            ]
        );

        // Define the CSV file path
        $file = 'queries.csv';

        // Check if the file exists, if not, create it and add headers
        if (!file_exists($file)) {
            $header = ['Name', 'Email', 'Number', 'Subject', 'Message'];
            $fp = fopen($file, 'w');
            fputcsv($fp, $header);
            fclose($fp);
        }

        // Append query data to the file
        $fp = fopen($file, 'a');
        fputcsv($fp, [$name, $email, $mobile, $subject, $message]);
        fclose($fp);

        // JavaScript Alert with Confirmation and Redirect
        echo "<script>
            alert('✅ Your query has been submitted successfully! You will receive a response soon.');
            window.location.href = 'index.html'; // Change this to your actual HTML page
        </script>";
    } catch (Exception $e) {
        echo "<script>
            alert('❌ Error: " . $e->getMessage() . "');
            window.location.href = 'index.html'; // Change this to your actual HTML page
        </script>";
    }
} else {
    echo "<script>
        alert('❌ Invalid request!');
        window.location.href = 'index.html'; // Change this to your actual HTML page
    </script>";
}
?>
