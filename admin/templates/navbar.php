<?php 
require_once('../config/constants.php'); ?>

 <nav class="p-0 shadow navbar navbar-dark fixed-top bg-primary flex-md-nowrap">
  <a class="mr-0 navbar-brand col-sm-3 col-md-2" href="#">Mobile Store</a>
  <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
  <ul class="px-3 navbar-nav">
    <li class="nav-item text-nowrap">
    	<?php
    		if (isset($_SESSION['admin_id'])) {
    			?>
    				<a class="nav-link" href="../admin/admin-logout.php">Sign out</a>
    			<?php
    		}else{
    			$uriAr = explode("/", $_SERVER['REQUEST_URI']);
    			$page = end($uriAr);
    			if ($page === "login.php") {
    				?>
	    				<a class="nav-link" href="../admin/register.php">Register</a>
	    			<?php
    			}else{
    				?>
	    				<a class="nav-link" href="../admin/login.php">Login</a>
	    			<?php
    			}


    			
    		}

    	?>
      
    </li>
  </ul>
</nav>
<script type="text/javascript"> var BASE_URL = "<?php echo BASE_URL; ?>" </script>