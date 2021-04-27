<?php
//require "config/constants.php";

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
<title>Home</title>
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
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<style>
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
.swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
    .brand-title{
        height: auto;
        width: 150px;
    }
</style>
</head>
<body>
<div class="bs-example">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a href="index.php" class="navbar-brand">Mobile Store</a>
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

                        <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo "Hi,".$_SESSION["name"]; ?></a>

                          <ul class="dropdown-menu dropdown-menu-right">
                             <div style="width:200px;text-align: center;">
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
	<div class="container-fluid">
	
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<h1>Customer Order details</h1>
						<hr/>
						<?php
							include_once("db.php");
							$user_id = $_SESSION["uid"];
							$orders_list = "SELECT o.order_id,o.user_id,o.product_id,o.qty,o.trx_id,o.p_status,p.product_title,p.product_price,p.product_image FROM orders o,products p WHERE o.user_id='$user_id' AND o.product_id=p.product_id";
							$query = mysqli_query($con,$orders_list);
							if (mysqli_num_rows($query) > 0) {
								while ($row=mysqli_fetch_array($query)) {
									?>
										<div class="row">
											<div class="col-md-6">
												<img style="float:right;" src="product_images/<?php echo $row['product_image']; ?>" class="img-responsive img-thumbnail"/>
											</div>
											<div class="col-md-6">
												<table>
													<tr><td>Product Name</td><td><b><?php echo $row["product_title"]; ?></b> </td></tr>
													<tr><td>Product Price</td><td><b><?php echo  CURRENCY." ".$row["product_price"]; ?></b></td></tr>
													<tr><td>Quantity</td><td><b><?php echo $row["qty"]; ?></b></td></tr>
													<tr><td>Transaction Id</td><td><b><?php echo $row["trx_id"]; ?></b></td></tr>
												</table>
											</div>
										</div>
									<?php
								}
							}
						?>
						
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>
















































