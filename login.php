<?php
session_start();

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
    $id_number = $conn->real_escape_string($_POST['id_number']);

    $sql = "SELECT * FROM users WHERE first_name = '$first_name' AND id_number = '$id_number'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['first_name'] = $first_name;
        echo "<script>alert('Inicio de Sesion Exitoso!'); window.location.href = './dashboard.php';</script>";
    } else {
        echo "<script>alert('Nombre o Numero ID Invalido.'); window.location.href = 'login.html';</script>";
    }
}


$conn->close();
?>
