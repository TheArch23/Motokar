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

    // Retrieve owner details from the database
    $sql = "SELECT * FROM owner";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Error retrieving owner details: " . mysqli_error($conn);
        exit;
    }

    $owner = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Account Details</title>
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
                <h3>&nbsp;&nbsp;-&nbsp;<a href="owner_account_view.php">Edit Account</a></h3>
                <h3>&nbsp;&nbsp;- Delete Account</h3>
            <h1>Favourite (Likes)</h1>
            <h1>Report</h1>
            <h1>Log-out</h1>
            
        </aside>

        
        <section id="main-content">
        <h1>Owner Account Details</h1>
        <div>
            <p><strong>Owner ID:</strong> <?php echo $owner['own_id']; ?></p>
            <p><strong>Name:</strong> <?php echo $owner['own_name']; ?></p>
            <p><strong>Username:</strong> <?php echo $owner['own_username']; ?></p>
            <p><strong>Password:</strong> <?php echo $owner['own_password']; ?></p>
            <p><strong>Email Address:</strong> <?php echo $owner['own_email']; ?></p>
            <p><strong>Phone Number:</strong> <?php echo $owner['own_phonenum']; ?></p>
        </div>

        <div class="go-home">
            <a href="owner_dashboard.php">Go Home</a>
        </div>

        </section>
        
        
            
        </section>
    </div>    
    <footer id="main-footer">
        <p>Copyright &copy; 2023 Food & Beverage Map System</p>
    </footer>
</body>
</html>