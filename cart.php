<?php
session_start();
$details="Product Purchasing";
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
  foreach($_SESSION["shopping_cart"] as $key => $value) {
    if($_POST["code"] == $key){
    unset($_SESSION["shopping_cart"][$key]);
    $status = "<div class='box' style='color:red;'>
    Product is removed from your cart!</div>";
    }
    if(empty($_SESSION["shopping_cart"]))
    unset($_SESSION["shopping_cart"]);
      }   
    }
}
// print_r($_SESSION["shopping_cart"]);
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
    
}
?>

<!-- <html>
<head>

<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head> -->
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
} ?>

<section class="shop-banner">
  <div class="home-slider">
    <div id="carouselHacked" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="images/shop-banner.jpg" alt="" title="">
                    <div class="carousel-caption">
                        <h2 class="animate bounceInDown animated">Shop</h2>
                        <h3 class="animate bounceInDown animated" style="animation-delay: 0.3s;">The Players Association</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<div style="width:700px; margin:50 auto;">

<h2 class="text-center" > Shopping Cart</h2>   



<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>  
<table class="table">
<tbody>
<tr>
<td class="text-center">ITEM</td>
<td class="text-center">ITEM NAME</td>
<td class="text-center">QUANTITY</td>
<td class="text-center">UNIT PRICE</td>
<td class="text-center">ITEMS TOTAL</td>
</tr> 
<?php   
foreach ($_SESSION["shopping_cart"] as $product){
  $pro=$product['product_id'];
?>
<tr>
<td class="text-center"><img src="http://tech599.com/~tech599/tech599.com/johnonk/the-players-association/v1/admin/uploads/<?=$product['image_name']?>" width="50" height="40" /></td>
<td class="text-center"><?php echo $product["product_name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td class="text-center">
<form method='post' action=''name="chkout-form" id="chkout-form">
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<input type="number" name="quantity" id="quantity" min="1" value="<?=$product['quantity']?>" onchange="test(this.value)">

</form>
</td>
<td class="text-center"><?php echo "$".$product["product_price"]; ?></td>
<td class="text-center"><?php echo "$".$product["product_price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["product_price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>

  <?php
}else{
  echo "<h3>Your cart is empty!</h3>";
  }
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>


<br /><br />

</div>
<? if($cart_count!= 0){ ?>
<div cla ss="section12">
        <div class="">
          <div class="row">
            <div class="col-sm-12 text-center">
              <form class="form-horizontal" action="https://www.paypal.com/cgi-bin/webscr" id="chkout-form" method="post" >
                 <!-- Identify your business so that you can collect the payments. -->
                 
                 <input type="hidden" name="business" value="playtpa@gmail.com">

                 <!-- Specify a Buy Now button. -->
                 <input type="hidden" name="cmd" value="_xclick">

                 <!-- Show logo on paypal link page -->
                 <input type="hidden" name="image_url" value="images/logo.png">

                 <!-- Specify details about the item that buyers will purchase. -->
                 <input type="hidden" name="item_name" value="<?php echo $details?>">

                 <input type="hidden" name="item_number" value="1">

                 <input type="hidden" name="amount" value="<?php echo $total_price;?>">

                 <input type="hidden" name="currency_code" value="USD">

                 <input type="hidden" name="no_shipping" value="1">

                 <!-- Return method - 2 For Post -->
                 <input type='hidden' name='rm' value='2'>

                 <!-- Specify URLs -->
                 <input type='hidden' name='cancel_return' value="http://tech599.com/~tech599/tech599.com/johnonk/the-players-association/v1/product_cancel.php">

                 <input type='hidden' name='return' value="http://tech599.com/~tech599/tech599.com/johnonk/the-players-association/v1/product_success.php">


                 <!-- Display the payment button. -->
                <div class="text-center">
                <input type="image" id="submit_form" src="images/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                  <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    <? } ?>
    </div>
<!-- Footer Start -->
<?php include"footer.php";?>
<!-- Footer End -->

  </body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script>
 function test(value) {
  var amount=value;
  
   if (amount < 1 ) {
     
     alert('The quantity  must not be zero.');exit();
   } else {
     
     document.forms['chkout-form'].submit();

   }
 }
</script>
