<?php
session_start();
error_reporting(0);
include_once("include/settings.php");
$um_id=$_SESSION['id'];
$sql="SELECT * FROM `orders` WHERE `umpire_id`='$um_id'";
$sel=mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Sanction Umpire | The Players Association</title>
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
	<!-- Custom Css End -->
    </head>
<body>

<?php  $page_name=basename($_SERVER['PHP_SELF']);?>
<?php
if(isset($_SESSION['id'])){
include "header2.php";
}
else{
    include "header.php";
}
?>
<div class="main-middle">
    <div class="home-slider">
		<div id="carouselHacked" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="images/sanction-banner.jpg" alt="" title="">
                    <div class="carousel-caption">
                        <h2 class="animate bounceInDown animated">View Orders</h2>
                        <!-- <h3 class="animate bounceInDown animated" style="animation-delay: 0.3s;">National Softball Association</h3>  -->
                    </div>
                </div>
            </div>
        </div>
    </div>

	<section class="section-1 team-1">

        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-sm-12">

                    <h3 class="text-center"> View Orders </h3>

                    <div class="table-responsive">

                        <table class="table table-bordered cart">
                            <tr>
                                    <th class="text-center" >Product </th>

                                    <th class="text-center" >Product Bought</th>

                                    <th class="text-center" >Product Quantities</th>

                                    <!-- <th class="text-center" >Transaction ID</th>

                                    <th class="text-center" >Total Amount</th>

                                    <th class="text-center" >Date</th> -->

                                </tr>



                                    <?
                                            while($order=mysqli_fetch_assoc($sel)){
                                                $product[]=$order['product_name'];
                                               // die;

                                                $r=implode("''",$product);
                                                $s=explode(",",$r);

                                                $quantity[]=$order['product_quantity'];
                                               // die;
                                                $q=implode(" ",$quantity);
                                              $t=explode(",",$q);
                                                // var_dump($t);
                                                // exit();

                                ?>
                                <?php

                                    foreach ( $s as $key ) {

                                        // foreach ($key as $t) {
                                        //     foreach ($t as $value) {



                                                            $sql2="SELECT `product_image` FROM `tbl_products` WHERE `product_name` IN ('$key')";
                                                $result=mysqli_query($con,$sql2);


                                            ?>
                                        <tr>


                                    <td class="text-center">
                                      <?php while($ord=mysqli_fetch_assoc($result)){ ?>
                                        <img height="100" width="100" src="http://tech599.com/~tech599/tech599.com/johnonk/the-players-association/v1/admin/<?=$ord['product_image'] ?>">
                                      <?php } ?>

                                    </td>

                                    <td class="text-center"><?=$key ?></td>

                                     <td class="text-center"><?=$order['product_quantity'] ?></td>

                                     <!--  <td class="text-center"><?=$value ?></td>  -->
                                  <?
                          //     }
                          // }

                          }
                              ?>

                                    <!-- <td class="text-center"><?=$order['transaction_id'] ?></td>

                                    <td class="text-center">$<?=$order['amount'] ?></td>

                                    <td class="text-center"><?=$order['date'] ?></td> -->
                                    </tr>
                                    <?
                                   }
                                ?>



                                </table>

                            </div>

                        </div>
                </div>

            </div>

        </div>

    </section>

</div>

<?php include "footer.php"; ?>
<!-- Home Slider Js Start -->
	<script type="text/javascript">$('#carouselHacked').carousel();</script>
	<script type="text/javascript" src="js/wow.js"></script>
    <script type="text/javascript">
		new WOW().init();
		$(document).ready(function() {
			jQuery.fn.carousel.Constructor.TRANSITION_DURATION = 90000
		});
    </script>
