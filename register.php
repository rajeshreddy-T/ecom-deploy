<?php
session_start();
$errors = array();
// insert config.php

include('config.php');
 include('header.php');


if (isset($_POST['register'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) { array_push($errors, "Passwords do not match"); }

    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) {
    if ($user['username'] === $username) {
    array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
        array_push($errors, "Email already exists");
      }
    }

    if (count($errors) == 0) {    
    // generate a random salt
    $salt = openssl_random_pseudo_bytes(32);
    
    // encrypt the password using AES-256-CBC algorithm
    $encrypted_password = openssl_encrypt($password_2, 'aes-256-cbc', $salt);
    
    // hash the encrypted password using SHA-256 algorithm
    $hashed_password = hash('sha256', $encrypted_password);

    $query = "INSERT INTO users (username, email, password,salt) VALUES ('$username', '$email', '$password','$salt')";
    
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
    }
}
?>
    
    <!DOCTYPE html>
    <html>
    <head>
      <title>Register - My Ecommerce Website</title>
    </head>
    <body>
      <h1>Register</h1>
      <form method="post" action="register.php">
        <?php include('errors.php'); ?>
        <div>
          <label>Username</label>
          <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div>
          <label>Email</label>
          <input type="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div>
          <label>Password</label>
          <input type="password" name="password_1">
        </div>
        <div>
          <label>Confirm Password</label>
          <input type="password" name="password_2">
        </div>
        <div>
          <button type="submit" name="register">Register</button>
        </div>
      </form>
    </body>
    </html>
