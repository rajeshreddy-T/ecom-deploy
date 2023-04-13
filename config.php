<!-- db config -->
<?php
// Path: config.php
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','wordpressuser');
define('DB_PASS','password');
define('DB_NAME','project2');
// Establish database connection.
$db = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  
?>
