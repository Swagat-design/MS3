<?php 
session_start();

$userLoggedIn = isset($_SESSION["uid"]);
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Products</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
        <script src="js/jquery2.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="main.js"></script>
        <script src="js/login-register-popup.js"></script>
        
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick.css"/>

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<!-- <script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script> -->

     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

	
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
</style>
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
            </li>
            <?php if(isset($_SESSION['uid'])){ ?>
                    <li class="nav-item">

                        <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo "Hi,".$_SESSION["name"]; ?></a>

                          <ul class="dropdown-menu dropdown-menu-right">
                             <div style="width:200px;text-align: center">
                            <li><a href="cart.php" style="text-decoration:none; color:blue;"><span class="fas fa-shopping-cart"></span>Cart</a></li>
                            <li class="divider"></li>
                            <li><a href="customer_order.php" style="text-decoration:none; color:blue;">Orders</a></li>
                            <li class="divider"></li>
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
            <div class="col-md-3">                				
				<div class="list-group">
					<h3>Price</h3>
					<input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
                </div>				
                <div class="list-group">
					<h3>Brand</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
					<?php

                    $query = "SELECT DISTINCT * FROM brands ";
                    $result = mysqli_query($con,$query) or die(mysqli_error($con));
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['brand_id']; ?>"  > <?php echo $row['brand_title']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                </div>

				<div class="list-group">
					<h3>Category</h3>
                    <?php

                    $query = "
                    SELECT DISTINCT * FROM categories ORDER BY cat_id DESC
                    ";
                    $result = mysqli_query($con,$query) or die(mysqli_error($con));
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector categories" value="<?php echo $row['cat_id']; ?>" > <?php echo $row['cat_title']; ?></label>
                    </div>
                    <?php    
                    }

                    ?>
                </div>
                
            </div>

            <div class="col-md-9">
            	<br />
                <div class="row filter_data">

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
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        //store data in variable
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');
        var category = get_filter('categories');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, category:category},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:1000,
        max:65000,
        values:[1000, 65000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>

</body>

</html>
