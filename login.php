<?php
session_start();
$errors = array();

// insert config.php
include('config.php');
include('header.php');

if (isset($_POST['login']))
{
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($password)) { array_push($errors, "Password is required"); }
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
 
  	 $result = mysqli_query($db, $query);

	   if (empty($username)) { array_push($errors, "Username is required"); }
	   if (empty($password)) { array_push($errors, "Password is required"); }
	 
	   if (count($errors) == 0) {
		 $password = md5($password);
		 $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		 $results = mysqli_query($db, $query);
		 if (mysqli_num_rows($results) == 1) {
		   $_SESSION['username'] = $username;
		   $_SESSION['success'] = "You are now logged in";
		   header('location: shop.php');
		 } else {
		   array_push($errors, "Wrong username/password combination");
		   echo "0 results";
		 }
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

