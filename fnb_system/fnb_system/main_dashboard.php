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
    <title>Main Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    
    
    
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
            <script>
                function initMap(){
                    var map = new google.maps.Map(document.getElementById('map'),{
                        center: {lat: 3.835494698164611, lng: 103.30153448244816}, 
	                    zoom: 18.5,
                        //mapId: "ddc8a75e51aea808",
                        styles: [
                            {
                            "featureType": "all",
                            "elementType": "labels",
                            "stylers": [
                                { "visibility": "off" }
                            ]
                            }
                        ]
                    });
                }
                
            </script>
            
            <script async
             src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmkbSwFIwQr1ebOxSP6HUo0OKE6D4KmdA&callback=initMap&libraries=&v=weekly&map_ids=ddc8a75e51aea808 defer">
            </script>
            
        </section>
    </div>

    <footer id="main-footer">
        <p>Copyright &copy; 2023 Food & Beverage Map System</p>
    </footer>
                    
</body>
</html>                    
                    

                <!--<script src="script.js"></script>
                            <script async defer
                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmkbSwFIwQr1ebOxSP6HUo0OKE6D4KmdA&map_ids=ddc8a75e51aea808&callback=initMap">
                            </script>
                            <script>function initMap() {} // now it IS a function and it is in global

                                $(() => {
                                initMap = function() {
                                    // your code like...
                                    var map = new google.maps.Map(document.getElementById('map'), {
                                    center: {lat: 3.835494698164611, lng: 103.30153448244816}, 
                                    zoom: 18.5,
                    
                                    styles: [
                                        {
                                            "featureType": "all",
                                            "elementType": "labels",
                                            "stylers": [
                                            { "visibility": "off" }
                                            ]
                                        }
                                    ]});
                                    
                                }
                                })
                            </script>