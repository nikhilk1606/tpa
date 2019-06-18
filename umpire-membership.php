<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Sanction Umpire | TPA</title>
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
                        <h2 class="animate bounceInDown animated">Umpire Membership</h2>
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
                	<?php if (isset($_SESSION['id'])){ ?>
                	<div class="row">
                <div class="col-xs-12 col-sm-12 btn-center">
                    <a href="view_orders.php" class="btn btn-primary u-login">My Orders</a>
                </div>
            </div>
        <? } ?>
                    <p>
                        Do you have TPA Account Yet?
                    </p>
                    <p>
                        If you already have an account. Use your director login and password as you have always done to log in and access your online functions.
                    </p>
                    <p>
                        If you are a coach or team manager, or an umpire you must create an account first before you can apply for membership. This will ensure we have good contact information for you and will allow TPA to track your teams across seasons and improve your abilities with regard to annually resanctioning. It also will allow you to update your name, email address, and phone number in a single location and ensure that these updates are applied to ALL of your teams going forward.
                    </p>
                    <p>
                        If you are an umpire, you must create your account and link your umpire ID # to it. Look for the Umpire ID field when you create your account to add it.
                    </p> 
                </div>
            </div> <?php if (!isset($_SESSION['id'])){ ?>
                
            <div class="row">
                <div class="col-xs-12 col-sm-12 btn-center">
                    <a href="umpire_login.php" class="btn btn-primary u-login">Login</a>
                </div>
            </div>
        <?php } ?>
        </div>
    </section>
  <!--   <section class="pay">
        <div class="container">
            <div class="col-xs-12 col-sm-6">
                <div class="boxe-1">
                    <h3>Pay $25.00 USD and become Sanction Player</h3>

                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="boxe-1">
                    <h3>Continue Free as a Roster</h3>
                </div>
            </div>
        </div>
    </section>  -->
</div>

<!-- <section class="team-2">
    <div class="container">
        <div class="bs-docs-example login-frm">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="text-center">Login</h3>
                                <form enctype="multipart/form-data" method="post" id="frm_testimonials" name="frm_testimonials" role="form">
                                    <div class="form-group control-group">
                                        <label for="fname">Email<span class="red_star">*</span></label>
                                        <input id="text" name="login_id" placeholder="login_id" class="form-control"  />
                                    </div>
                                    <div class="form-group control-group">
                                        <label for="fname">Password<span class="red_star">*</span></label>
                                        <input id="password" name="password" type="password" placeholder="Password" class="form-control"  />
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Submit" id="btnsbt" name="login">
                                    <a href="forgotpass.php" class="btn forgot-pass">Forgot Password</a>
                                    <hr>
                                    <p>Don't have an Account? <a href="registration.php">Register Here</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
    </div>
</section> -->

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
<!-- Home Slider Js End -->
<!-- <div class="section12">
                    <div class="container">
                    <div class="row">
                    <div class="col-sm-6">
                        <form class="form-horizontal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" id="chkout-form" method="post" >   -->
                           <!-- Identify your business so that you can collect the payments. -->
                        <!--    <input type="hidden" name="business" value="mileybutler000-buyer-1@gmail.com">
            -->
                           <!-- Specify a Buy Now button. -->
                           <!-- <input type="hidden" name="cmd" value="_xclick"> -->

                           <!-- Show logo on paypal link page -->
                           <!-- <input type="hidden" name="image_url" value="images/logo.png">
        -->
                           <!-- Specify details about the item that buyers will purchase. -->
                           <!--<input type="hidden" name="item_name" value="<?php //echo $details['prod_name']; ?>">-->

                           <!-- <input type="hidden" name="item_number" value="1">

                           <input type="hidden" name="amount" value="<?php// echo $payment;?>">

                           <input type="hidden" name="currency_code" value="USD">

                           <input type="hidden" name="no_shipping" value="1">
        -->
                           <!-- Return method - 2 For Post -->
                           <!-- <input type='hidden' name='rm' value='2'>
            -->
                           <!-- Specify URLs -->
                           <!-- <input type='hidden' name='cancel_return' value="http://tech599.com/~tech599/tech599.com/johnonk/the-players-association/v1/cancel.php">

                           <input type='hidden' name='return' value="http://tech599.com/~tech599/tech599.com/johnonk/the-players-association/v1/player_success.php"> -->


                           <!-- Display the payment button. -->
                          <!--  <div class="text-center">
                             <input type="image" src="images/btn_paynowCC_LG.gif" border="0" name="playersubmit" alt="PayPal - The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                               </div>

                                           </form></div>
                    </div></div></div> -->
