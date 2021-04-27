<?php
require "config/constants.php";
session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
header("location:index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Under Process</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
        <script src="js/jquery2.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="main.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
<style>
    .bs-example{
        margin: 0px;
    }
    .navbar{
        margin-bottom: 1rem;
    }
    .navbar-nav 
    {
margin-left: auto;
    }
.navbar-dark .navbar-nav .nav-link {
    color: white;
}
.panel-primary>.panel-heading {
    color: #fff;
    background-color: #337ab7;
    border-color: #337ab7;
}
.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.dropdown-menu {
    position: absolute;
    top: 100%;
    right: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #fff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgb(0 0 0 / 18%);
    box-shadow: 0 6px 12px rgb(0 0 0 / 18%);
}

</style>
</head>
<body>
<div class="bs-example">
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
        <a href="#" class="navbar-brand">Mobile Store</a>
            <ul class="navbar-nav ">
                <li class="nav-item ">
                <a class="nav-link active"  href="index.php" ><span class="glyphicon glyphicon-home"></span>Home</a>
            </li>
               <li class="nav-item">
                <a class="nav-link"  href="products.php"><span class="glyphicon glyphicon-modal-window"></span>Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a>
            </li>
				<li class="nav-item">
					<a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo "Hi,".$_SESSION["name"]; ?></a>
					  <ul class="dropdown-menu dropdown-menu-right">
						 <div style="width:200px;">
						<li><a href="cart.php" style="text-decoration:none; color:blue;"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
						<li class="divider"></li>
						<li><a href="customer_order.php" style="text-decoration:none; color:blue;">Orders</a></li>
						<li class="divider"></li>
						<li><a href="logout.php" style="text-decoration:none; color:blue;">Logout</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
	
	
				
</body>
</html>
















































