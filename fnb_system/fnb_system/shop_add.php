<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $shopName = $_POST['shop_name'];
    $shopType = $_POST['shop_type'];
    $phoneNumber = $_POST['shop_phonenum'];
    $email = $_POST['shop_email'];
    $operationHours = $_POST['shop_operationhour'];
    $address = $_POST['shop_address'];
    $latitude = $_POST['shop_latitude'];
    $longitude = $_POST['shop_longitude'];
    $menus = $_POST['menu_name'];
    $descriptions = $_POST['menu_description'];
    $prices = $_POST['menu_price'];
    $images = $_FILES['menu_image'];

    // Connect to the database (replace with your own database details)
    $servername = "localhost:3307";
    $username = "username";
    $password = "password";
    $dbname = "food_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Generate random shop ID
    $shopId = "SH" . str_pad(rand(0, 999), 3, "0", STR_PAD_LEFT);

    // Insert shop details into the database
    $sql = "INSERT INTO shop (shop_id, shop_name, shop_type, shop_phonenum, shop_email, shop_operationhour, shop_address, shop_latitude, shop_longitude) 
            VALUES ('$shopId', '$shopName', '$shopType', '$phoneNumber', '$email', '$operationHours', '$address', '$latitude', '$longitude')";

    if ($conn->query($sql) === TRUE) {
        // Insert menu details into the database
        for ($i = 0; $i < count($menus); $i++) {
            $menuName = $menus[$i];
            $description = $descriptions[$i];
            $price = $prices[$i];
            $imageName = $images['name'][$i];
            $imageTmpName = $images['tmp_name'][$i];

            // Move uploaded menu image to a folder (replace with your desired folder path)
            move_uploaded_file($imageTmpName, "menu_images/" . $imageName);

            // Insert menu details into the database
            $menuSql = "INSERT INTO menu (shop_id, menu_name, menu_description, menu_price, menu_image) 
                        VALUES ('$shopId', '$menuName', '$description', '$price', '$imageName')";
            $conn->query($menuSql);
        }


        echo "<script>
            alert('Shop added successfully! Shop ID: $shopId');
            window.location.href = 'owner_dashboard.php';
        </script>";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Shop Details</title>
    <link rel="stylesheet" href="secstyles.css">
    <script>
        function addMenuItem() {
            var menuItem = document.createElement("div");
            menuItem.className = "menu_item";

            menuItem.innerHTML = `
                <label for="menu_name">Menu Name:</label>
                <input type="text" name="menu_name[]" required>
                <br><br>
                <label for="menu_description">Menu Description:</label>
                <textarea name="menu_description[]" required></textarea>
                <br><br>
                <label for="menu_price">Menu Price:</label>
                <input type="number" name="menu_price[]" required>
                <br><br>
                <label for="menu_image">Menu Image:</label>
                <input type="file" name="menu_image[]">
                <br><br>
            `;

            document.getElementById("menu_items").appendChild(menuItem);
        }
    </script>
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
                <h3>&nbsp;&nbsp;-&nbsp;<a href="editaccount.php">Edit Account</a></h3>
                <h3>&nbsp;&nbsp;- Delete Account</h3>
            <h1>My Shop</h1>
                <h3>&nbsp;&nbsp;- View Shop</h3>
                <h3>&nbsp;&nbsp;-&nbsp;<a href="shop_add.php">Add Shop</a></h3>
                <h3>&nbsp;&nbsp;- Edit Shop</h3>
                <h3>&nbsp;&nbsp;- Delete Shop</h3>
            <h1>Favourite (Likes)</h1>
            <h1>Report</h1>
            <h1>Log-out</h1>
            
        </aside>

        
        <section id="main-content">
        <h2>Add Shop Details</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <label for="shop_name">Shop Name:</label>
            <input type="text" name="shop_name" required><br><br>

            <label for="shop_type">Shop Type:</label>
            <input type="text" name="shop_type" required><br><br>

            <label for="shop_phonenum">Phone Number:</label>
            <input type="tel" name="shop_phonenum" required><br><br>

            <label for="shop_email">Email:</label>
            <input type="email" name="shop_email" required><br><br>

            <label for="shop_operationhour">Operation Hours:</label>
            <input type="text" name="shop_operationhour" required><br><br>

            <label for="shop_address">Shop Address:</label>
            <input type="text" name="shop_address" required><br><br>

            <label for="latitude">Latitude:</label>
            <input type="text" name="shop_latitude" required><br><br>

            <label for="longitude">Longitude:</label>
            <input type="text" name="shop_longitude" required><br><br>

            <h3>Menu:</h3>
            <div id="menu_items">
                <div class="menu_item">
                    <label for="menu_name">Menu Name:</label>
                    <input type="text" name="menu_name[]" required>
                    <br><br>
                    <label for="menu_description">Menu Description:</label>
                    <textarea name="menu_description[]" required></textarea>
                    <br><br>
                    <label for="menu_price">Menu Price:</label>
                    <input type="number" name="menu_price[]" required>
                    <br><br>
                    <label for="menu_image">Menu Image:</label>
                    <input type="file" name="menu_image[]">
                    <br><br>
                </div>
            </div>

            <button type="button" onclick="addMenuItem()">Add Another Menu</button>
            <br><br>

            <input type="submit" value="Submit">
        </form>

        </section>
        
        
            
    
    </div>    
    <!--<footer id="main-footer">
        <p>Copyright &copy; 2023 Food & Beverage Map System</p>
    </footer>-->
</body>
</html>