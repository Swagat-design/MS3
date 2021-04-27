<?php
include "ad.php";
    session_start();
include "db.php";

$brandSql = "SELECT * FROM brands";
$brandQuery = mysqli_query($con,$brandSql);

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
<link rel="stylesheet" href="css/chat-bot-style.css"/>
<!script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!link rel="stylesheet" href="css/bootstrap.min.css"/>
        <!script src="js/jquery2.js"></script>
        <!script src="js/bootstrap.min.js"></script>
        <!script src="main.js"></script>
        <!link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

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
</style>
</head>
<body>
<div class="bs-example">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a href="index.php" class="navbar-brand">Mobile Store</a>
            <ul class="navbar-nav ">
                <li class="nav-item ">
                <a class="nav-link active"  href="index.php" ><i class="fas fa-home"></i>Home</a>
            </li>
               <li class="nav-item">
                <a class="nav-link"  href="products.php" ><span class="fas fa-mobile-alt"></span>Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="cart.php"><span class="fas fa-shopping-cart"></span>Cart</a>
            </li>
            <?php if(isset($_SESSION['uid'])){ ?>
                    <li class="nav-item">

                        <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo "Hi,".$_SESSION["name"]; ?></a>

                          <ul class="dropdown-menu dropdown-menu-right">
                             <div style="width:200px ; text-align: center">
                            <li><a href="cart.php" ><span class="fas fa-shopping-cart"></span>Cart</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a href="customer_order.php" >Orders</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a href="logout.php" >Logout</a></li>
                        </ul>
                    </li>
                <?php } 
                else { ?>

                    <li class="nav-item">
                        <a class="nav-link"  href="login_form.php" ><span class="fas fa-user-alt"></span>Login</a>
                    </li>
                <?php } ?>
               
            </ul>
        </nav>
    </div>

    <div class="container-fluid">
        <!-- Swiper -->
        <!-- <h2 class="mb-5 text-center text-primary">Our Products</h2> -->
        <?php /*<div class="swiper-container">
            <div class="swiper-wrapper">
                <?php while($products = mysqli_fetch_assoc($query)){ ?>
                    <div class="swiper-slide">
                        <img class="border" width="100%" src="product_images/<?php echo $products['product_image'] ?>" >
                    </div>
                <?php } ?>

            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>

              <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div> */ ?>
    </div>
    
    <div class="px-1 mb-5 container-fluid">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php 
                $sliderImages = array('banner1.jpg', 'banner2.jpg','banner3.jpg' );
                foreach($sliderImages as $sliderImage){ ?>
                    <div class="swiper-slide">
                        <img class="border" width="100%" height="500" src="images/<?php echo $sliderImage ?>" >
                    </div>
                <?php } ?>

            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>

              <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
       
    </div>
     <!-- <div class="p-1 my-5 container-fluid">
        <div class="overflow-hidden banner">
            <img src="images/banner2.jpg" alt="Banner" class="img-responsive w-100">
        </div>
    </div> -->

    <div class="mb-5 overflow-hidden container-fluid">
        <!-- Swiper -->
        <h2 class="mb-5 text-center text-primary">Our Brands</h2>
        <div class="swiper-container-brand">
            <div class="swiper-wrapper">
                <?php while($brands= mysqli_fetch_assoc($brandQuery)){ ?>
                    <div class="swiper-slide">
                        <div class="p-5 border rounded border-primary brand-title">
                            <?php echo $brands['brand_title']; ?>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <!-- Add Pagination -->
            <div class="mt-5 text-center swiper-pagination-brand"></div>

              <!-- Add Arrows -->
            <div class="swiper-button-next-brand"></div>
            <div class="swiper-button-prev-brand"></div>
        </div>
    </div>

    <footer class="p-4 bg-primary">
        <div class="text-center">
            Copyright &copy; Swagat 
        </div>
    </footer>

    <div id="chat-bot">
        <div class="wrapper shadow-lg">
            <div class="title d-flex justify-content-sm-between px-3">
                Mobile Store Bot 
                <span style="font-size: 40px; cursor: pointer" class="hide-bot">&#x2212;</span>
            </div>
            <div class="form">
                <div class="bot-inbox inbox">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="msg-header">
                        <p>Hello there, how can I help you?</p>
                    </div>
                </div>
            </div>
            <div class="typing-field">
                <div class="input-data">
                    <input id="data" type="text" placeholder="Type something here.." required>
                    <button id="send-btn">Send</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $(".hide-bot").click(function(){
                $("#chat-bot .form").toggle('slow');
                $("#chat-bot .typing-field").toggle('slow');
            });
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>

    <script>var CURRENCY = '<?php echo CURRENCY; ?>';</script>

     <!-- Swiper JS -->
     <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 30,
        // freeMode: true,
        pagination: {
        el: '.swiper-pagination',
        clickable: true,
        },
        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      loop: true,
      grabCursor: true,
    });

    var swiper = new Swiper('.swiper-container-brand', {
        slidesPerView: 3,
        spaceBetween: 0,
        // freeMode: true,
        pagination: {
        el: '.swiper-pagination-brand',
        clickable: true,
        },
        navigation: {
        nextEl: '.swiper-button-next-brand',
        prevEl: '.swiper-button-prev-brand',
      },
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      loop: true,
      grabCursor: true,
    });
    </script>
</body>
</html>