<?php

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
    $parentname = $_POST['parentname'];
    $pcontact = $_POST['pcontact'];
    $scontact = $_POST['scontact'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $subject = $_POST['select'];

    $sql = "INSERT INTO student_register (student_name, parent_name, student_contact1, student_contact2, student_gender, student_address, student_email, student_password, student_subject)
            VALUES ('$fullname', '$parentname','$pcontact', '$scontact','$gender', '$address', '$email', '$password', '$subject')";

    if ($conn->query($sql) === TRUE) {
        echo "<h3>Data stored in the database successfully. Please browse your localhost phpMyAdmin to view the updated data.</h3>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
