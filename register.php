<?php
$servername = "localhost";
$username = "root"; // change this to your MySQL username
$password = ""; // change this to your MySQL password
$dbname = "user_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $id_number = $conn->real_escape_string($_POST['id_number']);

    $sql = "INSERT INTO users (first_name, last_name, id_number) VALUES ('$first_name', '$last_name', '$id_number')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful!'); window.location.href = './login.html';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "'); window.location.href = './registration.html';</script>";
    }
}

$conn->close();
?>
