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
        <title>Team Membership | The Players Association</title>
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
if(isset($_SESSION['id'])){ include "header2.php"; }
else{
    include "header.php";

}
 ?>


<div class="main-middle">
    <div class="home-slider">
		<div id="carouselHacked" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="images/membership-banner.jpg" alt="" title="">
                    <div class="carousel-caption"> 
                        <h2 class="animate bounceInDown animated">Team Membership</h2>
                        <h3 class="animate bounceInDown animated" style="animation-delay: 0.3s;"></h3> 
                    </div>
                </div>  
            </div> 
        </div>
    </div>

	<section class="section-1 team-1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <p>
                        Do you have The Players Association Account Yet? 
                    </p>
                    <p>
                        If you already have an account. Use your director login and password as you have always done to log in and access your online functions. 
                    </p>
                    <p>
                        If you are a coach or team manager, or an umpire you must create an account first before you can apply for membership. This will ensure we have good contact information for you and will allow The Players Association to track your teams across seasons and improve your abilities with regard to annually resanctioning. It also will allow you to update your name, email address, and phone number in a single location and ensure that these updates are applied to ALL of your teams going forward. 
                    </p>
                    <p>
                        If you are an adult player, you must create your account and link your player ID # to it. Look for the Player ID field when you create your account to add it. 
                    </p>
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
<!-- Home Slider Js End -->