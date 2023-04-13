<?php
session_start();
// insert config.php

include('config.php');
 include('header.php');

$query = "SELECT * FROM products";
$results = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Shop - My Ecommerce Website</title>
  <style>
        /* Add some basic styles to the page */
        body {
            font-family: Arial, sans-serif;
	    background-color: #A633A6;
        }
        h1 {
            text-align: center;
        }
        ul {
            list-style: none;
            padding: 0;
			text-align: center;
        }
        li {
            margin-bottom: 20px;
			text-align: center;
        }
        table {
            border-collapse: collapse;
            margin: 20px 0;
            width: 100%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
        .add-to-cart {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
	</style>
</head>
<body>
  <h1>Bakery Shop</h1>
  <ul>
        <li>
            <img src="/images/TrojanTart.jpg" alt="Bread" width="1000" height="500" >
            <h2>Trojan Tart</h2>
            <p>$2.99</p>
            <input type="number" name="quantity" min="1" max="10" value="1">
            <button class="add-to-cart" data-product="bread">Add to Cart</button>
        </li>
        <li>
            <img src="/images/SSLShortbreadCookies.jpg" alt="Muffin" width=500 height=500>
            <h2>SSL Shortbread Cookies</h2>
            <p>$1.99</p>
            <input type="number" name="quantity" min="1" max="10" value="1">
            <button class="add-to-cart" data-product="muffin">Add to Cart</button>
        </li>
        <li>
            <img src="/images/FirewallFudgeBrowniesCookies.jpg " alt="Cookie" width="500" height="500">
            <h2>Firewall Fudge Brownie Cookies</h2>
            <p>$0.99</p>
            <input type="number" name="quantity" min="1" max="10" value="1">
            <button class="add-to-cart" data-product="cookie">Add to Cart</button>
        </li>
    </ul>
    <?php if (isset($_SESSION['username'])) : ?>
    <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
    <p><a href="logout.php">Logout</a></p>
  <?php else : ?>
    <p><a href="login.php">Login</a> or <a href="register.php">Register</a> to start shopping.</p>
  <?php endif; ?>
</div>
</body>
</html>
