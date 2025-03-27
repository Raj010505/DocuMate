DocuMate

Overview

DocuMate is a lightweight and efficient web-based application designed to manage hospital operations, patient records, doctor schedules, and billing. Built using HTML, CSS, JavaScript, Bootstrap (Frontend) and PHP with CSV (Backend Database), this system provides an easy-to-use interface for hospitals and clinics.

Features

✅ Patient Management – Add, edit, and manage patient records stored in CSV.
✅ Doctor & Staff Management – Maintain doctor schedules and staff details.
✅ Appointment System – Allow patients to book and manage appointments.
✅ Pharmacy Management – Track medicine stock and availability.
✅ Bootstrap UI – Responsive and modern design with Bootstrap.
✅ CSV-Based Storage – Uses CSV instead of SQL for data management.
✅ SMS Service ( OPTIONAL )

Installation & Setup

Prerequisites

A web server with PHP support (XAMPP, WAMP, or LAMP)

Any modern web browser (Chrome, Firefox, Edge, etc.)


Steps to Run Locally

1. Download & Extract the Project

Clone the repository or download the ZIP:

git clone https://github.com/Raj010505/DocuMate

Extract the files inside the htdocs (XAMPP) or your server directory.



2. Start Apache & PHP Server

Open XAMPP Control Panel → Start Apache & PHP.

If using a manual PHP server, run:

php -S localhost:8000



3. Access the Application

Open the browser and go to:

http://localhost:8000/

For Creating CSV DataBase

1. In form tag of appointment.html, index.html, service.html add attribute action="appointment_handler.php" method="post"
2. In form tag of contact.html add attribute action="query_handler.php" method="post"

Optional
For Integrating SMS Service For Appointments & Queries

1. Uncomment SMS Section in appointment_handler.php & query_handler.php
2. Download composer as per your OS
3. Install Composer In Your Folder using command 'composer install'
4. Install Twilio using command 'composer require twilio/sdk'
5. 1️⃣ Ensure Twilio SMS is Enabled

Log in to Twilio Console
https://console.twilio.com/

Check your Twilio phone number supports SMS.


2️⃣ Verify Your Number (For Free Trial)

Free Twilio accounts can only send SMS to verified numbers.

Verify your mobile number in Twilio Console > Messaging > Verified Numbers.


3️⃣ Use a Paid Twilio Plan for Unlimited SMS

To send SMS to any number, upgrade your Twilio account.

Contributing

Contributions are welcome! Fork this repo, create a new branch, and submit a pull request.

License

This project is licensed under the MIT License.

Contact

For any issues or queries, contact dubey.raj2005@gmail.com.
