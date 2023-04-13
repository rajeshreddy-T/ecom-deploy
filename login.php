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
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
 
  	 $result = mysqli_query($db, $query);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0)
    {
	// Output data of each row
 	$_SESSION['username'] = $username;
    	$_SESSION['success'] = "You are now logged in";
    	header('location: shop.php');
    	echo "Succesfully Logged in  ";
   
} else {
array_push($errors, "Wrong username/password combination");
	echo "0 results";
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

