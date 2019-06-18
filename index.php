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
        <title>Home | TPA</title>
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
else
{ include "header.php";
} ?>

<div class="main-middle">
    <div class="home-slider">
		<div id="carouselHacked" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="images/home-slider1.jpg" alt="" title="">
                    <div class="carousel-caption">
                        <h2 class="animate bounceInDown animated">TPA</h2>
                        <!-- <h3 class="animate bounceInDown animated" style="animation-delay: 0.3s;">National Softball Association</h3> -->
                        <a href="#about-us.php" class="learnmore wow rubberBand del4">LEARN MORE</a>
                    </div>
                </div>
                <div class="item">
                    <img src="images/home-slider2.jpg" alt="" title="">
                    <div class="carousel-caption">
                        <h2 class="animate bounceInDown animated">TPA</h2>
                        <!-- <h3 class="animate bounceInDown animated" style="animation-delay: 0.3s;">National Softball Association</h3> -->
                        <a href="#about-us.php" class="learnmore wow rubberBand del4">LEARN MORE</a>
                    </div>
                </div>
                <div class="item">
                    <img src="images/home-slider1.jpg" alt="" title="">
                    <div class="carousel-caption">
                        <h2 class="animate bounceInDown animated">TPA</h2>
                        <!-- <h3 class="animate bounceInDown animated" style="animation-delay: 0.3s;">National Softball Association</h3> -->
                        <a href="#about-us.php" class="learnmore wow rubberBand del4">LEARN MORE</a>
                    </div>
                </div>
                <div class="item">
                    <img src="images/home-slider2.jpg" alt="" title="">
                    <div class="carousel-caption">
                        <h2 class="animate bounceInDown animated">TPA</h2>
                        <!-- <h3 class="animate bounceInDown animated" style="animation-delay: 0.3s;">National Softball Association</h3> -->
                        <a href="#about-us.php" class="learnmore wow rubberBand del4">LEARN MORE</a>
                    </div>
                </div>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#carouselHacked" data-slide-to="0" class="active"></li>
                <li data-target="#carouselHacked" data-slide-to="1"></li>
                <li data-target="#carouselHacked" data-slide-to="2"></li>
                <li data-target="#carouselHacked" data-slide-to="3"></li>
            </ol>
            <a class="left carousel-control" href="#carouselHacked" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carouselHacked" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
        </div>
    </div>

	<section class="section-1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <p>
                        Today more than ever, conducting your business in a cost-effective manner is a crucial ingredient to success. If you are spending a significant amount of time and money in securing qualifying tournaments and post season tournaments, you are probably losing thousands of dollars each year.
                    </p>
                    <ul class="red-line">
                        <li><p>COMMITMENT</p></li>
                        <li><p>PROFESSIONALISM</p></li>
                        <li><p>CHARACTER</p></li>
                        <li><p>TEAMWORK</p></li>
                        <li><p>RESPECT</p></li>
                        <li><p>EXCELLENCE</p></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section-2">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="col-xs-12 col-sm-4 wow bounceIn delay3">
                        <img src="images/team-membership.jpg" class="img-responsive">
                        <div class="img-caption">
                            <h3>team membership</h3>
                            <p>Short overview about the team and team membership will be here Short overview about the team and team membership will be here.</p>
                             <a href="team_login.php"><button class="btn btn-primary home-join">Join Now <i class="fa fa-arrow-right"></i></button></a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 wow bounceIn delay2">
                        <img src="images/umpire-membership.jpg" class="img-responsive">
                        <div class="img-caption">
                            <h3>umpire membership</h3>
                            <p>Short overview about the team and team membership will be here Short overview about the team and team membership will be here.</p>
                            <?php if(isset($_SESSION['id'])){ ?>
                            <a href="umpire-membership.php"><button class="btn btn-primary home-join">Join Now <i class="fa fa-arrow-right"></i></button></a>
                            <?php } else { ?>
                                <a href="umpire-membership.php"><button class="btn btn-primary home-join">Join Now <i class="fa fa-arrow-right"></i></button></a>
                                <?php } ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 wow bounceIn delay1">
                        <img src="images/saction-player.jpg" class="img-responsive">
                        <div class="img-caption">
                            <h3>sanction player</h3>
                            <p>Short overview about the team and team membership will be here Short overview about the team and team membership will be here.</p>
                            <?php if(isset($_SESSION['id'])){ ?>
                            <a href="player_login.php"><button class="btn btn-primary home-join">Join Now <i class="fa fa-arrow-right"></i></button></a>
                            <?php } else { ?>
                                <a href="player_login.php"><button class="btn btn-primary home-join">Join Now <i class="fa fa-arrow-right"></i></button></a>
                                 <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-3">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <h3>featured products</h3>
                    <div class="col-xs-12 col-sm-4 prod">
                        <div class="img-sect">
                            <img src="images/product1.jpg" class="img-responsive">
                        </div>
                        <div class="prod-caption">
                            <h3>2019 Team Sanction Fees</h3>
                            <p class="line-1">Short about classification request or quantity will be here</p>
                            <p class="price">$25.00</p>
                            <p class="details"><a href="team-membership.php">View Details</a></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 prod">
                        <div class="img-sect">
                            <img src="images/product2.jpg" class="img-responsive">
                        </div>
                        <div class="prod-caption">
                            <h3>2019 Umpire Sanction Fees</h3>
                            <p class="line-1">Short about classification request or quantity will be here</p>
                            <p class="price">$50.00</p>
                            <p class="details"><a href="umpire-membership.php">View Details</a></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 prod">
                        <div class="img-sect">
                            <img src="images/product3.jpg" class="img-responsive">
                        </div>
                        <div class="prod-caption">
                            <h3>Softball Balls</h3>
                            <p class="line-1">Short about classification request or quantity will be here</p>
                            <p class="price">$60.00</p>
                            <p class="details"><a href="shopping.php">View Details</a></p>
                        </div>
                    </div>
                    <!-- <div class="col-xs-12 col-sm-3 prod">
                        <div class="img-sect">
                            <img src="images/product4.jpg" class="img-responsive">
                        </div>
                        <div class="prod-caption">
                            <h3>Nokana Softball Gloves</h3>
                            <p class="line-1">Nokona X2 Elite V1175 11.75</p>
                            <p class="price">$55.00</p>
                            <p class="details"><a href="shopping.php">View Details</a></p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <div class="what-ido">
    	<div class="container">
        	<h2>Meet our staff members</h2>
        	<ul class="ul clearfix">
            	<li>
                	<a href="mailto:">
                		<span><img src="images/staff1.jpg" alt="" title=""></span>
                        <div class="staff-caption">
                            <h3>Clay Hild</h3>
                            <p>Owner / Executive Officer</p>
                            <p><i class="fa fa-phone"></i><a href="tel:812-557-2140"> 812-557-2140</a></p>
                        </div>
                    </a>
                </li>
            	<li>
                	<a href="mailto:">
                		<span><img src="images/staff2.jpg" alt="" title=""></span>
                        <div class="staff-caption">
                            <h3>Bill Chard</h3>
                            <p>President</p>
                            <p><i class="fa fa-phone"></i><a href="tel:979-331-4551"> 979-331-4551</a></p>
                        </div>
                    </a>
                </li>
            	<li>
                	<a href="mailto:">
                		<span><img src="images/staff3.jpg" alt="" title=""></span>
                        <div class="staff-caption">
                            <h3>Reece Taylor</h3>
                            <p>Kentucky State Director</p>
                            <p><i class="fa fa-phone"></i><a href="tel:859-230-4402"> 859-230-4402</a></p>
                        </div>
                    </a>
                </li>
            	<!-- <li>
                	<a href="mailto:">
                		<span><img src="images/staff4.jpg" alt="" title=""></span>
                        <div class="staff-caption">
                            <h3>Tony "Truth" Blackburn</h3>
                            <p>Kentucky Rec director</p>
                            <p><i class="fa fa-phone"></i><a href="tel:859-536-7966"> 859-536-7966</a></p>
                        </div>
                    </a>
                </li> -->
            </ul>
        </div>
    </div>
    <section class="section-4">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <h3>our sanctioning board members</h3>
                    <ul>
                        <li>
                            <img src="images/member1.jpg" class="img-responsive">
                            <h3>Zach Anderson</h3>
                            <p>Board Members</p>
                        </li>
                        <li>
                            <img src="images/member2.jpg" class="img-responsive">
                            <h3>Rob Lawrence</h3>
                            <p>Board Members</p>
                        </li>
                        <li>
                            <img src="images/member3.jpg" class="img-responsive">
                            <h3>Shawn Ballard</h3>
                            <p>Board Members</p>
                        </li>
                        <li>
                            <img src="images/member4.jpg" class="img-responsive">
                            <h3>Jack Vaught</h3>
                            <p>Board Members</p>
                        </li>
                        <li>
                            <img src="images/member5.jpg" class="img-responsive">
                            <h3>Brice Ernest</h3>
                            <p>Board Members</p>
                        </li>
                    </ul>
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
