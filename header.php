<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Add your CSS files here -->
	<link rel="stylesheet" href="css/styles.css">

	<!-- Add your JavaScript files here -->
	<script src="js/jquery.min.js"></script>
	<script src="js/main.js"></script>

	<!-- Add any additional meta tags or links here -->
	<meta name="description" content="Your website description here">
	
	<style>
		/* Add your custom styles here */
		header {
			background-color: #CB37D6;
			padding: 10px 20px;
			color: white;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		
		nav {
			display: flex;
			flex-direction: row;
			align-items: center;
		}
		
		nav ul {
			margin: 0;
			padding: 0;
			list-style: none;
			display: flex;
			flex-direction: row;
		}
		
		nav li {
			margin-right: 20px;
		}
		
		nav li:last-child {
			margin-right: 0;
		}
		
		nav a {
			color: white;
			text-decoration: none;
			font-size: 18px;
			font-weight: bold;
			text-transform: uppercase;
		}
		
		nav a:hover {
			color: #333;
		}
		
		.logo {
			font-size: 24px;
			font-weight: bold;
			text-transform: uppercase;
			margin-right: 20px;
			text-align: center ;
		}
	</style>
</head>
<body>
	<header>
	<img src="/images/iplqaZA.png " width="150" height="150" alt="Logo">
 <div class="logo">Welcome to Cyber Bake Shop!</div>
		
		<nav>
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="shop.php">Shop</a></li>			
                <?php if(isset($_SESSION['user_id'])) : ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php else : ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</nav>
	</header>
