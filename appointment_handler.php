<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $doctor = $_POST['doctor'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $problem = $_POST['problem'];

    // Define the CSV file path
    $file = 'appointments.csv';

    // Check if the file exists, if not, create it and add headers
    if (!file_exists($file)) {
        $header = ['Name', 'Email', 'Mobile', 'Doctor', 'Date', 'Time', 'Problem'];
        $fp = fopen($file, 'w');
        fputcsv($fp, $header);
        fclose($fp);
    }

    // Append appointment data to the file
    $fp = fopen($file, 'a');
    fputcsv($fp, [$name, $email, $mobile, $doctor, $date, $time, $problem]);
    fclose($fp);

    // Redirect to success page
    echo "<script>alert('Appointment booked successfully!'); window.location.href='index.html';</script>";
} else {
    echo "Invalid request!";
}
?>
