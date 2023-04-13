<?php
session_start();
$errors = array();
// insert config.php

include('config.php');
 include('header.php');

if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    } else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login - My Ecommerce Website</title>
</head>
<body>
  <h1>Login</h1>
  <form method="post" action="login.php">
    <?php include('errors.php'); ?>
    <div>
      <label>Username</label>
      <input type="text" name="username" value="<?php echo $username; ?>">
    </div>
    <div>
      <label>Password</label>
      <input type="password" name="password">
    </div>
    <div>
      <button type="submit" name="login">Login</button>
    </div>
  </form>
</body>
</html>