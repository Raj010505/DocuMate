<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Define the CSV file path
    $file = 'queries.csv';

    // Check if the file exists, if not, create it and add headers
    if (!file_exists($file)) {
        $header = ['Name', 'Email', 'Subject', 'Message'];
        $fp = fopen($file, 'w');
        fputcsv($fp, $header);
        fclose($fp);
    }

    // Append query data to the file
    $fp = fopen($file, 'a');
    fputcsv($fp, [$name, $email, $subject, $message]);
    fclose($fp);

    // Redirect to success page
    echo "<script>alert('Your query has been submitted successfully!'); window.location.href='index.html';</script>";
} else {
    echo "Invalid request!";
}
?>
