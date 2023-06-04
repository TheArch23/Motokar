<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>

  <link rel="stylesheet" href="styles.css">

</head>

<body>

  <div class="form-container">
    
      <form method="POST" action="">
        <h3>Registration Page</h3>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required>

        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>

        <input type="submit" name="submit" value="Register" class="form-btn">
      </form>
  </div>
    

    <?php
      /*$host = "localhost:3307"; // Your MySQL host
      $user = "username"; // Your MySQL username
      $password = "password"; // Your MySQL password
      $database = "fnb_db"; // Your MySQL database name

      $conn = mysqli_connect($host, $user, $password, $database);
      */
      require_once "db_conn.php";

      if(isset($_POST["submit"])) {
        
        $name = $_POST["name"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        
        $user_id = 'AD'.strval(rand(10000, 99999));

        $sql = "INSERT INTO admin (adm_id, adm_name, adm_username, adm_password, adm_email, adm_phonenum) VALUES ('$user_id', '$name', '$username', '$password', '$email', '$phone')";
        $result = mysqli_query($conn, $sql);

        // Check if the insert was successful
        if($result) {
          // Close the database connection
          mysqli_close($conn);
      ?>

      <script>
        // Display the user ID in a pop-up
        alert('Registration successful. Your user ID is <?php echo $user_id; ?>');

        // Redirect to signup.php after the pop-up is displayed
        window.location.href = 'signup.php';
      </script>

      <?php
        } else {
          echo "Registration failed. Please try again.";
        }

        mysqli_close($conn);
      }
    ?>

</body>
</html>
