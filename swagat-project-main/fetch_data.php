<?php

//fetch_data.php

session_start();
include "db.php";

if(isset($_POST["action"]))
{
	
	$query = "SELECT * FROM products WHERE product_status = '1'";
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		 AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	if(isset($_POST["brand"]))
	{
		$brand_filter = implode("','", $_POST["brand"]);
		$query .= "
		 AND product_brand IN('".$brand_filter."')
		";
	}
	if(isset($_POST["category"]))
	{
		$category_filter = implode("','", $_POST["category"]);
		$query .= "
		 AND product_cat IN('".$category_filter."')
		";
	}

	$result = mysqli_query($con,$query) or die(mysqli_error($con));
	$output = '';
	if(mysqli_num_rows($result) > 0)
	{
		
		foreach($result as $row)
		{
			if(!isset($_SESSION['uid'])){
				$addCartButton = '<a class="btn btn-success btn-xs" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Add to Cart</a>';
			} else {
				$addCartButton = '<button pid='.$row['product_id'].' id="product" class="btn btn-success btn-xs">Add To Cart</button>';
			}
			$output .= '
			<div class="mb-5 col-sm-4 col-lg-3 col-md-3">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:100%;">
					<img src="product_images/'. $row['product_image'] .'" alt="" class="img-responsive" >
					<p align="center"><strong><a href="#">'. $row['product_title'] .'</a></strong></p>
					<h4 style="text-align:center;" class="text-danger" >'. $row['product_price'] .' '.CURRENCY.'</h4>
					<div class="mt-4 d-flex justify-content-between">'
						.$addCartButton.
						'<a href="product_detail.php?pid='.$row['product_id'].'" class="quicklook btn btn-danger btn-xs">Explore</a>
					</div>
				</div>

			</div>
			';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>