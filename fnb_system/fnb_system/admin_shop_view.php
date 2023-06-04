<?php
    // Connect to the database
    $servername = "localhost:3307";
    $username = "username";
    $password = "password";
    $dbname = "food_db";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if shop ID is provided in the query string
    if (isset($_GET['id'])) {
        $shopId = $_GET['id'];

        // Retrieve shop details from the database
        $shopSql = "SELECT * FROM shop WHERE shop_id = '$shopId'";
        $shopResult = mysqli_query($conn, $shopSql);

        if ($shopResult) {
            $shop = mysqli_fetch_assoc($shopResult);

            // Retrieve menu details from the database
            $menuSql = "SELECT * FROM menu WHERE shop_id = '$shopId'";
            $menuResult = mysqli_query($conn, $menuSql);

            $menus = array();
            if ($menuResult) {
                while ($row = mysqli_fetch_assoc($menuResult)) {
                    $menus[] = $row;
                }
            } else {
                echo "Error retrieving menu details: " . mysqli_error($conn);
                exit;
            }
        } else {
            echo "Error retrieving shop details: " . mysqli_error($conn);
            exit;
        }
    } else {
        echo "Invalid request.";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Details</title>
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
                <h3>&nbsp;&nbsp;-&nbsp;<a href="editaccount.php">Edit Account</a></h3>
                <h3>&nbsp;&nbsp;- Delete Account</h3>
            <h1>Favourite (Likes)</h1>
            <h1>Report</h1>
            <h1>Log-out</h1>
            
        </aside>
        <section id="main-content">
            <div class="shop-details">
                <h2><?php echo $shop['shop_name']; ?></h2>
                <p><strong>Address:</strong> <?php echo $shop['shop_address']; ?></p>
                <p><strong>Phone Number:</strong> <?php echo $shop['shop_phonenum']; ?></p>
                <p><strong>Email:</strong> <?php echo $shop['shop_email']; ?></p>
                <p><strong>Operation Hour:</strong> <?php echo $shop['shop_operationhour']; ?></p>
            </div>
            <div class="menu-section">
                <h2>Menu</h2>
                <?php foreach ($menus as $menu): ?>
                    <div class="menu-item">
                        <img src="<?php echo $menu['menu_image']; ?>" alt="Menu Image">
                        <h3><?php echo $menu['menu_name']; ?></h3>
                        <p><?php echo $menu['menu_description']; ?></p>
                        <p><strong>Price:</strong> <?php echo $menu['menu_price']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="go-home">
                <a href="customer_dashboard.php">Go Home</a>
            </div>
        </section>
    </div>
    <!--<footer id="main-footer">
        <p>Copyright &copy; 2023 Food & Beverage Map System</p>
    </footer>-->
</body>
</html>
