<?php
// Database configuration
$host = "localhost: 3307"; // Host name
$user = "username"; // Database username
$password = "password"; // Database password
$database = "food_db"; // Database name

// Create a database connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
