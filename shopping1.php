<?php
session_start();
require_once("include/dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
  case "add":
    if(!empty($_POST["quantity"])) {
      $productByCode = $db_handle->runQuery("SELECT * FROM tbl_products WHERE code='" . $_GET["code"] . "'");
      $itemArray = array($productByCode[0]["code"]=>array('product_name'=>$productByCode[0]["product_name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'product_price'=>$productByCode[0]["product_price"], 'product_image'=>$productByCode[0]["product_image"]));

      if(!empty($_SESSION["cart_item"])) {
        if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
          foreach($_SESSION["cart_item"] as $k => $v) {
              if($productByCode[0]["code"] == $k) {
                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                  $_SESSION["cart_item"][$k]["quantity"] = 0;
                }
                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
              }
          }
        } else {
          $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
        }
      } else {
        $_SESSION["cart_item"] = $itemArray;
      }
    }
  break;
  case "remove":
    if(!empty($_SESSION["cart_item"])) {
      foreach($_SESSION["cart_item"] as $k => $v) {
          if($_GET["code"] == $k)
            unset($_SESSION["cart_item"][$k]);
          if(empty($_SESSION["cart_item"]))
            unset($_SESSION["cart_item"]);
      }
    }
  break;
  case "empty":
    unset($_SESSION["cart_item"]);
  break;
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
      <link rel="stylesheet" href="css/font-awesome.css"/>
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
      <link href="css/style2.css" type="text/css" rel="stylesheet" />
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- Custom Css End -->
  </head>
  <body>
<?php  $page_name=basename($_SERVER['PHP_SELF']);?>
<?php
if(isset($_SESSION['user_id'])){
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


<section class="section-checkout">
  <div class="container">
    <div class="row">
      <div id="shopping-cart">
        <?php if (isset($_SESSION['error']) && $_SESSION['error'] != "") { ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?= $_SESSION['error'] ?>
            <?php unset($_SESSION['error']); ?>
            </div>
        <?php } ?>
      <div class="txt-heading shop-head">Shopping Cart</div>


      <?php
      if(isset($_SESSION["cart_item"])){
          $total_quantity = 0;
          $total_price = 0;
      ?>

      <div class="table-responsive">
          <table class="table table-bordered table-hover tbl-cart" cellpadding="10" cellspacing="1">
          <tbody>
          <tr>
          <th style="text-align:left;">Name</th>
          <th style="text-align:left;">Code</th>
          <th style="text-align:right;" width="5%">Quantity</th>
          <th style="text-align:right;" width="10%">Unit Price</th>
          <th style="text-align:right;" width="10%">Price</th>
          <th style="text-align:center;" width="5%">Remove</th>
          </tr>
          <?php
              foreach ($_SESSION["cart_item"] as $item){
                  $item_price = $item["quantity"]*$item["product_price"];
              ?>
                  <tr>
                  <td><img src="http://tech599.com/~tech599/tech599.com/johnonk/the-players-association/v1/admin/<?php echo $item["product_image"]; ?>" class="cart-item-image" /><?php echo $item["product_name"]; ?></td>
                  <td><?php echo $item["code"]; ?></td>
                  <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                  <td  style="text-align:right;"><?php echo "$ ".$item["product_price"]; ?></td>
                  <td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
                  <td style="text-align:center;"><a href="shopping.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="images/icon-delete.png" alt="Remove Item" /></a></td>
                  </tr>
                  <?php
                  $total_quantity += $item["quantity"];
                  $total_price += ($item["product_price"]*$item["quantity"]);
              }
              ?>

          <tr>
          <td colspan="2" align="right">Total:</td>
          <td align="right"><?php echo $total_quantity; ?></td>
          <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
          <td></td>
          </tr>
          </tbody>
          </table>
        <?php
      } else {
      ?>
      <div class="no-records">Your Cart is Empty</div>
      <?php
      }
      ?>
      <div class="align-right">
        <a id="btnEmpty" class="btn btn-primary empty-btn" href="shopping.php?action=empty">Empty Cart</a>
        <a href="checkout_page.php"><button class="btn-primary check-btn btn-action" name="check_out">Go To Checkout</button></a>
      </div>
      </div>
    </div>
  </div>
</div>
</section>



<section class="product-dis">
  <div class="container">
    <div class="row">
      <div id="product-grid">
        <div class="txt-heading shop-head">Products</div>
        <?php
        $product_array = $db_handle->runQuery("SELECT * FROM tbl_products ORDER BY product_id ASC");
        if (!empty($product_array)) {
          foreach($product_array as $key=>$value){
        ?>
         <div class="col-xs-12 col-sm-3">
          <div class="product">
            <form method="post" action="shopping.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
            <div class="hover15 m-height">
              <img class="img-responsive" src="http://tech599.com/~tech599/tech599.com/johnonk/the-players-association/v1/admin/<?php echo $product_array[$key]["product_image"]; ?>" >
            </div>
            <div class="img-caption">
            <h4 class="wow bounceIn delay1"><?php echo $product_array[$key]["product_name"]; ?></h4>
            <p><?php echo "$".$product_array[$key]["product_price"]; ?></p>
            <p><input type="number" class="product-quantity" name="quantity" value="1" min="1" size="2" style="max-width:50%;"/></p>
            <input type="submit" class="btn btn-primary cart-btn" value="Add to Cart" class="btnAddAction" />
            </div>
            </form>
          </div>
        </div>
        <?php
          }
        }
        ?>
      </div>
    </div>
  </div>
</section>
    <div class="clearfix"></div>
  <?php include ("footer.php"); ?>
  </body>
</html>
