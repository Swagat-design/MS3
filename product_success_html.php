<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Mobile Store</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
<style>
	table tr td {padding:10px;}
    
    .navbar{
        margin-bottom: 0rem;
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
                <a class="nav-link active"  href="index.php" ><span class="glyphicon glyphicon-home"></span>Home</a>
            </li>
               <li class="nav-item">
                <a class="nav-link"  href="products.php" ><span class="glyphicon glyphicon-modal-window"></span>Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link"  href="customer_registration.php?register=1" ><span class="glyphicon glyphicon-user"></span>Register</a>
            </li> -->
                <?php if(isset($_SESSION['uid'])){ ?>
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
                <?php } else { ?>

                    <li class="nav-item">
                        <a class="nav-link"  href="login_form.php" ><span class="glyphicon glyphicon-user"></span>Login</a>
                    </li>
                <?php } ?>
               
            </ul>
        </nav>
    </div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
	
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<h1>Thankyou </h1>
						<hr/>
						<p>Hello <?php echo "<b>".$_SESSION["name"]."</b>"; ?>,Your payment process is 
						successfully completed and your Transaction id is <b><?php echo $trx_id; ?></b><br/>
						you can continue your Shopping <br/></p>
						<a href="index.php" class="btn btn-success btn-lg">Continue Shopping</a>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>