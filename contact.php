<?php

include('config.php');
include('header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  echo "Hey, $name! , we will be giving you a call shortly!";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Greeting Form</title>
<style>
	body {
    background-color: #ED30D7;
		}
</style>
  </head>
  <body>
    <h1>Contact Us Form</h1>
    <form method="post">
      <label for="name">Enter your name:</label>
      <input type="text" id="name" name="name">
	<br>
	<label for="Number">Enter your number:</label>
      <input type="text" id="number" name="number">
	<br>
      <button type="submit">Submit</button>
    </form>
  </body>
</html>


