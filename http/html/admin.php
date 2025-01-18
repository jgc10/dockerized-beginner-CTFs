<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <h1>Admin Panel</h1>
    <p>CIT{5851da33b2ed6c79ab0c61b4fcbe8749}</p>
    <a href="logout.php">Logout</a>
</body>
</html>
