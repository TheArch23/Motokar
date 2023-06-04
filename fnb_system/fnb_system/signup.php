<?php
session_start();
require_once "db_conn.php";

$errors = []; // Array to store error messages

if (isset($_POST["submit"])) {
    $role = $_POST["role"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $table = "";
    $redirect_url = "";

    if ($role == "customer") {
        $table = "customer";
        $redirect_url = "customer_dashboard.php";
        $username_field = "cust_username";
        $password_field = "cust_password";
    } else if ($role == "owner") {
        $table = "owner";
        $redirect_url = "owner_dashboard.php";
        $username_field = "own_username";
        $password_field = "own_password";
    } else if ($role == "admin") {
        $table = "admin";
        $redirect_url = "admin_dashboard.php";
        $username_field = "adm_username";
        $password_field = "adm_password";
    }

    $sql = "SELECT * FROM $table WHERE $username_field='$username' AND $password_field='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION["user_id"] = $row["user_id"];
            header("Location: $redirect_url");
            exit();
        } else {
            $errors[] = "Invalid username or password.";
        }
    } else {
        $errors[] = "Database query error: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>

  <link rel="stylesheet" href="styles.css">

</head>
  <body>
    <div class="form-container">
    
    <form method="POST" action="">
      <h3>Login Page</h3>
      <?php if (!empty($errors)) { ?>
        <div class="error-message">
          <?php foreach ($errors as $error) { ?>
            <p><?php echo $error; ?></p>
          <?php } ?>
        </div>
      <?php } ?>
      <label for="role">Role Type</label>
      <select id="role" name="role">
        <option value="customer">Customer</option>
        <option value="owner">Owner</option>
        <option value="admin">Admin</option>
      </select>

      <label for="username">Username</label>
      <input type="text" id="username" name="username" placeholder="Enter your username" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>

      <input type="submit" name="submit" value="Login" class="form-btn">

      <p>Don't have an account? <a href="role.php">Register now</a></p>
      
    </form>
  </div>
    
  </body>
</html>
