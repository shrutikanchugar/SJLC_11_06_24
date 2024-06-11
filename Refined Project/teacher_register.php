<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jklcnew";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $pcontact = $_POST['pcontact'];
    $scontact = $_POST['scontact'];
    $em_contact = $_POST['em_contact'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    $sql = "INSERT INTO teacher_register (teacher_name, teacher_contact1, teacher_contact2, teacher_emergency_contact, teacher_gender, teacher_address, teacher_email, teacher_password)
            VALUES ('$fullname', '$pcontact', '$scontact', '$em_contact', '$gender', '$address', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<h3>Data stored in the database successfully. Please browse your localhost phpMyAdmin to view the updated data.</h3>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
