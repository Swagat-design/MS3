<?php

require "config/constants.php";
session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Cart</title>
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

		 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<style>
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
</style>
</head>
<body>
<div class="bs-example">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a href="#" class="navbar-brand">Mobile Store</a>
            <ul class="navbar-nav ">
                <li class="nav-item ">
                <a class="nav-link active"  href="index.php" ><i class="fas fa-home"></i>Home</a>
            </li>
             <li class="nav-item">
                <a class="nav-link"  href="products.php"><span class="fas fa-mobile-alt"></span>Products</a>
            </li>
            <?php if(isset($_SESSION['uid'])){ ?>
                    <li class="nav-item">

                        <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo "Hi,".$_SESSION["name"]; ?></a>

                          <ul class="dropdown-menu dropdown-menu-right">
                             <div style="width:200px;text-align: center;">
                            <li><a href="cart.php" style="text-decoration:none; color:blue;"><span class="fas fa-shopping-cart"></span>Cart</a></li>
                            <li class="divider"></li>
                            <li><a href="customer_order.php" style="text-decoration:none; color:blue;">Orders</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php" style="text-decoration:none; color:blue;">Logout</a></li>
                        </ul>
                    </li>
                <?php } else { ?>

                    <li class="nav-item">
                        <a class="nav-link"  href="login_form.php" ><span class="glyphicon glyphicon-user"></span>Login</a>
                    </li>
                <?php } ?>
               
        </ul>
    </nav>
</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg">
				<!--Cart Message--> 
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Cart Checkout</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2 col-xs-2"><b>Action</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Image</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Name</b></div>
							<div class="col-md-2 col-xs-2"><b>Quantity</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Price</b></div>
							<div class="col-md-2 col-xs-2"><b>Price in <?php echo CURRENCY; ?></b></div>
						</div>
						<div id="cart_checkout"></div>
						<!--<div class="row">
							<div class="col-md-2">
								<div class="btn-group">
									<a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
									<a href="" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
								</div>
							</div>
							<div class="col-md-2"><img src='product_images/imges.jpg'></div>
							<div class="col-md-2">Product Name</div>
							<div class="col-md-2"><input type='text' class='form-control' value='1' ></div>
							<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
							<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
						</div> -->
						<!--<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b>Total Rs500000</b>
							</div> -->
						</div> 
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
			
		</div>

<script>var CURRENCY = '<?php echo CURRENCY; ?>';</script>
</body>	
</html>
















		