<?php
session_start();
$errors = array();

// insert config.php
include('config.php');
include('header.php');

if (isset($_POST['login']))
{
	$username = $_POST['username'];
    $password = $_POST['password'];
    
    // get the salt from the database
    $salt_query = "SELECT salt FROM users WHERE username = '$username'";
    $salt_result = mysqli_query($db, $salt_query);
    $row = mysqli_fetch_assoc($salt_result);
    $salt = $row['salt'];
    
    // encrypt the input password using AES-256-CBC algorithm
    $encrypted_password = openssl_encrypt($password, 'aes-256-cbc', $salt);
    
    // hash the encrypted input password using SHA-256 algorithm
    $hashed_password = hash('sha256', $encrypted_password);
    
    // check if the username and hashed password match the database
    $login_query = "SELECT * FROM users WHERE username = '$username' AND password = '$hashed_password'";
    $login_result = mysqli_query($db, $login_query);
    $row = mysqli_fetch_assoc($login_result);
    
    if($row) {
        // login successful, set session variables
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        
        // redirect to the dashboard page
        header("Location: dashboard.php");
        exit();
    } else {
        // login failed
        echo "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login - My Ecommerce Website</title>
<style>
	body{background-image:url("images/bake.jpg") ;}
</style>
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
					<!--VGhlc2UgYXJlIG5vdCB0aGUgY3JlZGVudGlhbHMgeW91cmUgbG9va2luZyBmb3IsIEdvIHRvIHJvYm90cw---- >
</body>
</html>

