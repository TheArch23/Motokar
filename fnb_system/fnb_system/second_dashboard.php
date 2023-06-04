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
    
  
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <title>Main Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <script type="module" src="./script.js"></script>
    
    
</head>
<body>
    <header id="main-header">
        <div class="dashboard-container">
            <h1>Food & Beverage Mapping System</h1>
        </div>
        
    </header>
    <div id="outer-container">
        <aside id="sidebar">
            <h1><a href="index.php">add shop</a></h1>
            <h1>test</h1>
            <h1>test</h1>
            <h1>test</h1>
            <h1>test</h1>
        </aside>
        
        <section id="main-map">
        <div id="map" style="width: 100%; height: 600px; box-sizing: border-box; overflow: hidden;"></div>


            <!--<script async
             src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmkbSwFIwQr1ebOxSP6HUo0OKE6D4KmdA&callback=initMap&libraries=&v=weekly&map_ids=ddc8a75e51aea808 defer">
            </script>
            -->
        </section>
    </div>

    <footer id="main-footer">
        <p>Copyright &copy; 2023 Food & Beverage Map System</p>
    </footer>
                    
</body>
</html>