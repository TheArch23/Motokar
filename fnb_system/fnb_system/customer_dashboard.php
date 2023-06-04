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
    $sql = "SELECT shop_id, shop_name, shop_address, shop_latitude, shop_longitude FROM shop";
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
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="secstyles.css">

</head>
<body>
    <header id="main-header">
        <div class="dashboard-container">
            <h1>Food & Beverage Mapping System</h1>
        </div>
        
    </header>
    <div id="outer-container">
        <aside id="sidebar">
            <h1>My Account</h1>
                <h3>&nbsp;&nbsp;-&nbsp;<a href="customer_account_view.php">View Account</h3>
                <h3>&nbsp;&nbsp;-&nbsp;<a href="customer_account_edit.php">Edit Account</a></h3>
                <h3>&nbsp;&nbsp;- Delete Account</h3>
            <h1>Favourite (Likes)</h1>
            <h1>Report</h1>
            <h1>Log-out</h1>
            
        </aside>

        <!--style="width: 100%; height: 600px; box-sizing: border-box; overflow: hidden;" -->
        <section id="main-map">
        <div id="map" ></div>
        
        <script>
                function initMap(){
                    var map = new google.maps.Map(document.getElementById('map'),{
                        center: {lat: 3.835494698164611, lng: 103.30153448244816}, 
                        zoom: 18.5,
                        mapId: "ddc8a75e51aea808",
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

                    // Retrieve shop data from PHP variable
                    var shopData = <?php echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC)); ?>;

                    // Add markers for each shop
                    shopData.forEach(function(shop) {
                        var marker = new google.maps.Marker({
                            position: {lat: parseFloat(shop.shop_latitude), lng: parseFloat(shop.shop_longitude)},
                            map: map,
                            title: shop.shop_name
                        });

                        // Create info window for each marker
                        var infoWindow = new google.maps.InfoWindow();

                        // Add click event listener to the marker
                        marker.addListener('click', function() {
                            infoWindow.setContent('<strong>' + shop.shop_name + '</strong>');
                            infoWindow.open(map, marker);
                        });

                        // Add click event listener to the shop name in the info window
                        infoWindow.addListener('domready', function() {
                            var shopNameElement = document.querySelector('.gm-style-iw strong');
                            shopNameElement.addEventListener('click', function() {
                                window.location.href = 'customer_shop_view.php?id=' + shop.shop_id;
                            });
                        });
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
    
    <?php
    // Display error messages
    if (!empty($errors)) {
        echo '<div class="error-message">';
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo '</div>';
    }
    ?>
</body>
</html>           