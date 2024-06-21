<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['first_name'])) {
    echo "<script>alert('You are not logged in.'); window.location.href = './login.html';</script>";
    exit();
}

$first_name = $_SESSION['first_name'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Dashboard</title>

</head>
<body>

<div class="container">
  <h1>Dashboard</h1>
  <div class="welcome-message">
    <h2>Welcome, <?php echo htmlspecialchars($first_name); ?>!</h2>
    <p>Número de ID: <span id="idNumber"></span></p>
    <p>Rol: <span id="userRole"></span></p>
  </div>
  <div class="options">
    <div class="option-button" onclick="goTo('gestion_granjas')">Gestión de Granjas</div>
    <div class="option-button" onclick="goTo('gestion_cultivos')">Gestión de Cultivos</div>
    <div class="option-button" onclick="goTo('gestion_inventarios')">Gestión de Inventarios</div>
    <div class="option-button" onclick="goTo('programacion_labor_logistica')">Programación de Labores Logísticas</div>
    <div id="signOutButton" onclick="signOut()">Cerrar Sesión</div>
  </div>
</div>

</body>
</html>
