<?php 
session_start();
// if(!isset($_SESSION["uid"])){
// 	header("location:index.php");
// }
$userLoggedIn = isset($_SESSION["uid"]);
// var_dump($userLoggedIn);
if(!isset($_GET['pid']) || $_GET['pid'] == 0 || empty($_GET['pid'])){
    header("location:products.php");
}

$pid = $_GET['pid'];
include "db.php";

$sql = "SELECT p.*, c.cat_title, c.cat_id, b.brand_id, b.brand_title 
        FROM products p JOIN categories c ON c.cat_id = p.product_cat 
        JOIN brands b ON b.brand_id = p.product_brand
        WHERE product_id = '$pid'";
$query = mysqli_query($con,$sql);

$product = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo $product['product_title'] ?></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/product_detail.css"/>
        <!script src="js/jquery2.js"></script>
        <!script src="js/bootstrap.min.js"></script>
        <!-- <script src="main.js"></script> -->
        <script src="js/login-register-popup.js"></script>
        
        <!link rel="stylesheet" type="text/css" href="style.css">

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
	<!-- <script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script> -->
    <script src="https://www.jqueryscript.net/demo/Product-Carousel-Magnifying-Effect-exzoom/jquery.exzoom.js"></script>
    <link href="https://www.jqueryscript.net/demo/Product-Carousel-Magnifying-Effect-exzoom/jquery.exzoom.css" rel="stylesheet" type="text/css"/>

     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
    <!-- Page Content -->
    <div class="bs-example">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a href="#" class="navbar-brand">Mobile Store</a>
            <ul class="navbar-nav ">
                <li class="nav-item ">
                <a class="nav-link active"  href="index.php" ><span class="fas fa-home"></span>Home</a>
            </li>
               <li class="nav-item">
                <a class="nav-link"  href="products.php"><span class="fas fa-mobile-alt"></span>Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="cart.php"><span class="fas fa-shopping-cart"></span>Cart</a>
            <?php if(isset($_SESSION['uid'])){ ?>
                    <li class="nav-item">

                        <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo "Hi,".$_SESSION["name"]; ?></a>

                          <ul class="dropdown-menu dropdown-menu-right">
                             <div style="width:200px;text-align: center;">
                            <li><a href="cart.php" style="text-decoration:none; color:blue;"><span class="fas fa-shopping-cart"></span>Cart</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a href="customer_order.php" style="text-decoration:none; color:blue;">Orders</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a href="logout.php" style="text-decoration:none; color:blue;">Logout</a></li>
                        </ul>
                    </li>
                <?php } else { ?>

                    <li class="nav-item">
                        <a class="nav-link"  href="login_form.php" ><span class="fas fa-user-alt"></span>Login</a>
                    </li>
                <?php } ?>

			</ul>
		</nav>
	</div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12" id="product_msg">
            </div>
           
            <!--Section: Block Content-->
            <div class="card col-md-12">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<?php /*<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="product_images/<?php echo $product['product_image'] ?>" /></div>
						  <div class="tab-pane" id="pic-2"><img src="product_images/<?php echo $product['product_image2'] ? $product['product_image2'] : $product['product_image'] ?>" /></div>
						  <div class="tab-pane" id="pic-3"><img src="product_images/<?php echo $product['product_image3'] ? $product['product_image3'] : $product['product_image'] ?>" /></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="product_images/<?php echo $product['product_image'] ?>" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="product_images/<?php echo $product['product_image2'] ? $product['product_image2'] : $product['product_image'] ?>" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="product_images/<?php echo $product['product_image3'] ? $product['product_image3'] : $product['product_image'] ?>" /></a></li>
						</ul> */ ?>

                        <div class="exzoom" id="exzoom">
                            <!-- Images -->
                            <div class="exzoom_img_box">
                                <ul class='exzoom_img_ul'>
                                    <li><img src="product_images/<?php echo $product['product_image'] ?>"/></li>
                                    <li><img src="product_images/<?php echo $product['product_image2'] ? $product['product_image2'] : $product['product_image'] ?>"/></li>
                                    <li><img src="product_images/<?php echo $product['product_image3'] ? $product['product_image3'] : $product['product_image'] ?>"/></li>
                                
                                </ul>
                            </div>
                            <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav -->
                            <div class="exzoom_nav"></div>
                            <!-- Nav Buttons -->
                            <!-- <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                                <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                            </p> -->
                        </div>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?php echo $product['product_title'] ?></h3>
						<!-- <div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 reviews</span>
						</div> -->
						<p class="mt-1 product-description"><?php echo $product['product_desc'] ?></p>
						<h3 class="mt-0 text-primary">
                                Price: <span><?php echo $product['product_price']." ".CURRENCY ?></span>
                        </h3>
						<!-- <h5 class="sizes">sizes:
							<span class="size" data-toggle="tooltip" title="small">s</span>
							<span class="size" data-toggle="tooltip" title="medium">m</span>
							<span class="size" data-toggle="tooltip" title="large">l</span>
							<span class="size" data-toggle="tooltip" title="xtra large">xl</span>
						</h5> -->
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <td>Brand</td>
                                <td><?php echo $product['brand_title'] ?></td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td><?php echo $product['cat_title'] ?></td>
                            </tr>
                            <tr>
                                <td>Battery</td>
                                <td><?php echo $product['product_battery'] ? $product['product_battery'] : '2000' ?></td>
                            </tr>
                            <tr>
                                <td>Ram</td>
                                <td><?php echo $product['product_ram'] ? $product['product_ram'] : '8' ?></td>
                            </tr>
                            <tr>
                                <td>Storage</td>
                                <td><?php echo $product['product_storage'] ? $product['product_storage'] : '16' ?></td>
                            </tr>
                            <tr>
                                <td>Camera</td>
                                <td><?php echo $product['product_camera'] ? $product['product_camera'] : '8' ?></td>
                            </tr>
                            <tr>
                                <td>Remaining</td>
                                <td><?php echo $product['product_qty'] ? $product['product_qty'] : '8' ?></td>
                            </tr>
                        </table>
						<div class="action">
                            <?php if(!isset($_SESSION['uid'])){
                                echo '<a class="btn btn-primary btn-lg" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Add to Cart</a>';
                            } else {
                                echo '<button pid='.$product['product_id'].' id="product" class="btn btn-primary btn-lg">Add To Cart</button>';
                            }
                            ?>
							
						</div>
                        <div class="mt-5">
                            <?php foreach (explode(",",$product['product_keywords']) as $keyword) { ?>
                                <span class="p-2 badge-pill badge-info"> <?php echo $keyword ?></span>
                            <?php } ?>
                        </div>
					</div>
				</div>
			</div>
		</div>


        </div>

    </div>

<!--modal-->
<div class="modal fade login" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h4 class="modal-title">Login with</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="box">
                        <div class="content">
                            <div class="division">
                            </div>
                            <div class="error" id="e_msg"></div>
                            <div class="form loginBox popup_login">
                                <?php include('includes/login.php'); ?>
                            </div>
                        </div>
                </div>
                <div class="box">
                    <div class="content registerBox" style="display:none;">
                        <div class="col-md-12" id="signup_msg">
                            <!--Alert from signup form-->
                        </div>
                        <div class="form">
                            <?php include('includes/customer_registration.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
        <div class="modal-footer">
            <div class="forgot login-footer">
                <span>Looking to
                        <a href="javascript: showRegisterForm();">create an account</a>
                ?</span>
            </div>
            <div class="forgot register-footer" style="display:none">
                    <span>Already have an account?</span>
                    <a href="javascript: showLoginForm();">Login</a>
            </div>
        </div>
        </div>
    </div>
</div>

<style>
#loading
{
	text-align:center; 
	background: url('loader.gif') no-repeat center; 
	height: 150px;
}
</style>
<script>var CURRENCY = '<?php echo CURRENCY; ?>';</script>
<script>
$(function(){

$("#exzoom").exzoom({

  // thumbnail nav options
  "navWidth": 60,
  "navHeight": 60,
  "navItemNum": 5,
  "navItemMargin": 7,
  "navBorder": 1,

  // autoplay
  "autoPlay": true,

  // autoplay interval in milliseconds
  "autoPlayTimeout": 5000
  
});

});
</script>
<script src="main.js"></script>

</body>

</html>
