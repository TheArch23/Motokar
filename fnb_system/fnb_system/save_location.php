<?php
// Connect to database
$servername = "localhost:3307"; 
$username = "username";
$password = "password";
$dbname = "food_db";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get input data
$name = $_POST['name'];
$address = $_POST['address'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Insert data into database
$sql = "INSERT INTO locations (name, address, latitude, longitude)
VALUES ('$name', '$address', '$latitude', '$longitude')";

if (mysqli_query($conn, $sql)) {
    header("Location: main_dashboard.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
