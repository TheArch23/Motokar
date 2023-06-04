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

// Retrieve data from database
$sql = "SELECT * FROM locations";
$result = mysqli_query($conn, $sql);

if (!$result) {
  die("Error executing query: " . mysqli_error($conn));
}

// Build array of location data
$locations = array();
while ($row = mysqli_fetch_assoc($result)) {
  $locations[] = $row;
}

// Return location data as JSON
header("Content-type: application/json");
echo json_encode($locations);

// Close database connection
mysqli_close($conn);
?>
