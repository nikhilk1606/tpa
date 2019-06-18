<?php
session_start();

$total_quantity=0;
$total_price=0;
// $cart = $_SESSION["cart_item"];

if(!empty($_SESSION["cart_item"])){

foreach ($_SESSION["cart_item"] as $item){

        $item_price = $item["quantity"]*$item["product_price"];
        $total_quantity += $item["quantity"];
		$total_price += ($item["product_price"]*$item["quantity"]);
	}
	// echo $total_price;
}

 
?>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Player Sanction | The Players Association</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />

    <!-- Bootstrap Css Start -->
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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- Custom Css End -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="css/style2.css" type="text/css" rel="stylesheet" />
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

<div id="shopping-cart">
    <div class="container">
        <h3 class="text-center">Your Cart</h3>


<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	

<div class="table-responsive">
<table class="tbl-cart table-bordered table-hover cart-table" >
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
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

</tr>
</tbody>
</table>
</div>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>
</div>


<section class="check-out-form">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 dualwindow_left">
                <h3 class="text-center">Customer Details</h3>
                <form name="frm_customer_detail" action="product_payment.php" method="POST"> 
                    <div class="frm-customer-detail">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4">
                                <div class="form-group control-group input-field">
                                    <input type="hidden" name="amount" id="amount" class="form-control"  value="<?php echo $total_price;?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="form-group control-group input-field">
                                    <input type="text" name="cust_name" id="cust_name" class="form-control" placeholder="Customer Name" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="form-group control-group input-field">
                                    <input type="text" name="cust_email" id="cust_email" class="form-control" placeholder="Email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-4">
                                <div class="form-group control-group input-field">
                                    <input type="text" name="cust_address" class="form-control" placeholder="Address" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">                        
                                <div class="form-group control-group input-field">
                                    <input type="text" name="cust_city" class="form-control" placeholder="City" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="form-group control-group input-field">
                                    <input type="text" name="cust_state" class="form-control"  placeholder="State" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-4">                        
                                <div class="form-group control-group input-field">
                                    <input type="text" name="cust_zip" class="form-control" placeholder="Zip Code" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="form-group control-group input-field">
                                    <input type="text" name="cust_country" class="form-control" placeholder="Country" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="form-group control-group input-field">
                                    <input type="text" name="cust_phone" class="form-control" placeholder="Phone " required>
                                </div>
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-12 text-center">
                         <input type="submit" class="btn btn-primary btn-action" name="proceed_payment" value="Proceed to Payment">
                        </div>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


     <?php include "footer.php"; ?>

</body>