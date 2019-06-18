<?php
session_start();
include_once("include/settings.php");
$sql="SELECT * FROM `tbl_products`WHERE 1";
$result=mysqli_query($con,$sql);
if (isset($_POST['code']) && $_POST['code']!=""){
  $code = $_POST['code'];
 $result2 = mysqli_query($con,"SELECT * FROM `tbl_products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result2);
$product_id=$row['product_id'];
$_SESSION['product_id']=$product_id;
$image = $row['image_name'];
$product = $row['product_name'];
$price = $row['product_price'];
$code = $row['code'];

$cartArray = array(
  $code=>array(
  'product_id'=>$product_id,
  'image_name'=>$image,
  'code'=>$code,
  'product_price'=>$price,
  'quantity'=>1,
  'product_name'=>$product)
);

if(empty($_SESSION["shopping_cart"])) {
  $_SESSION["shopping_cart"] = $cartArray;
  $status = "<div class='box'>Product is added to your cart!</div>";
}else{
  $array_keys = array_keys($_SESSION["shopping_cart"]);
  if(in_array($code,$array_keys)) {
    $status = "<div class='box' style='color:red;'>
    Product is already added to your cart!</div>";  
  } else {
  $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
  $status = "<div class='box'>Product is added to your cart!</div>";
  }

  }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Shop | The Players Association</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />

    <!-- Bootstrap Css Start -->
      <!--   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
  <!-- Bootstrap Css End -->

    <!-- Custom Css Start -->
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/media.css">
        <link rel="stylesheet" href="css/font-awesome.css"/>
  <!-- Custom Css End -->
    </head>
<body>

<?php  $page_name=basename($_SERVER['PHP_SELF']);?>
<?php
if(isset($_SESSION['id'])){
  include "header2.php";
}
else
{ include "header.php";
} 
?>
<section class="shop-banner">
  <div class="home-slider">
    <div id="carouselHacked" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="images/shop-banner.jpg" alt="" title="">
                    <div class="carousel-caption">
                        <h2 class="animate bounceInDown animated">Shop</h2>
                        <h3 class="animate bounceInDown animated" style="animation-delay: 0.3s;">TPA</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section 2-1 Start -->
<section class="section-2-1">
  <div class="container">
    
<div style="clear:both;"></div>
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
    <div class="row products">
      <?php while($row = mysqli_fetch_assoc($result)) { ?>
      <div class="col-sm-3 pt-25 para-s fadeInUp wow">
        <div class="product">
           <form method='post' action=''>
            <div class="hover15 m-height"><img src="http://tech599.com/~tech599/tech599.com/johnonk/the-players-association/v1/admin/<?=$row['product_image']?>" class="img-responsive"></div>
              <div class="img-caption">
                <h4 class="wow bounceIn delay1"><?=$row['product_name'] ?></h4>
               
                <p class="wow fadeInUp delay1">
                
                <span><h3 class="text-center">$ <?=$row['product_price'] ?></h3></span>
                </p>
               
               <input type='hidden' name='code' value="<?=$row['code']?>" />

               <?php if(isset($_SESSION['u_id'])){  ?><button type='submit' class='form-control donate paynow-btn'>Buy Now</button> 
             <?php } else{ ?>
                        <a href="umpire_login.php" class="form-control donate paynow-btn text-center"> Buy Now</a>
                      <?php } ?>
                   </div>
            </form>
        </div>
      </div>
    <?php }?>
    </div>
  </div>
</section>
<!-- Section 2-1 End -->

<!-- Footer Start -->
<?php include"footer.php";?>
<!-- Footer End -->

  </body>
</html>
