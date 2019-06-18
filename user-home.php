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
        <title>User Home | The Players Association</title>
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
<?php
if(isset($_SESSION['message']) && $_SESSION['flag']==0)
           {
             ?>
             <div class="alert alert-danger">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <?php echo $_SESSION['message']; ?>
             </div>
             <?php
           }
           else if(isset($_SESSION['message']) && $_SESSION['flag']==1)
           {
             ?>
               <div class="alert alert-success text-center">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <?php echo $_SESSION['message']; ?>
               </div>
               <?php
           }
      
           unset($_SESSION['message']);
           unset($_SESSION['flag']);
         ?>
<section class="home-section1">    
    <div class="pagetitle_container">
        <div class="container">
            <h1 id="ctl00_Content_h1PageHeader" class="page_header">User Homepage</h1>
        </div>
    </div>
    <div class="container" style="padding:15px 0;">
        <div id="divWelcome" class="divWelcome">
            <div class="col-md-6 col-sm-12">
                <div class="dualwindow_left">
                    <h1 class="hpTitle">Welcome to the TPA User Homepage</h1>
                    <h2 class="hpSubTitle">Helpful Links:</h2>
                    <ul style="list-style:none;" class="f-15">
                        <li><a id="ctl00_Content_HyperLink7" href="#" style="visibility: hidden; display; none;">Register a Youth Player</a></li>
                        <li><a id="ctl00_Content_HyperLink1" href="team-sanction.php">Team Membership</a></li>
                        <li><a id="ctl00_Content_HyperLink3" href="#">Register as a Player</a></li>
                        <li><a id="ctl00_Content_HyperLink4" href="#">Register as a Director</a></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="dualwindow_right">
                    <div class="col-md-12"  style="padding:0;">
                        <input type="submit" name="ctl00$Content$btnFavorite" value="Make This Homepage My Default" id="ctl00_Content_btnFavorite" class="FavoriteHomeButton1" />
                        <span id="ctl00_Content_lblFavoriteMessage" class="errormsg" style="float:left; clear:left;"></span>
                    </div>
                    <h1 class="hpTitleSmall">News and Updates:</h1>
                    <ul class="f-15">
                            <li><a id="ctl00_Content_HeadlinesRepeater_ctl01_LnkHeadline" href="#NewsArticleView.aspx?id=2AY">2019 Winter World Series</a></li>
                        
                            <li><a id="ctl00_Content_HeadlinesRepeater_ctl02_LnkHeadline" href="#NewsArticleView.aspx?id=2AB">2019 TPA Fastpitch World Series Dates & Locations</a></li>
                        
                            <li><a id="ctl00_Content_HeadlinesRepeater_ctl03_LnkHeadline" href="#NewsArticleView.aspx?id=220">2019 TPA-BPA National Convention</a></li>
                        
                            <li><a id="ctl00_Content_HeadlinesRepeater_ctl04_LnkHeadline" href="#NewsArticleView.aspx?id=2GI">TPA Scholarship Winners </a></li>
                        
                            <li><a id="ctl00_Content_HeadlinesRepeater_ctl05_LnkHeadline" href="#NewsArticleView.aspx?id=222">TPA Podcast</a></li>
                        </ul>
                    <a id="ctl00_Content_lnkMoreHeadlines" class="ViewMoreLink2" href="#News.aspx">More Headlines &#9654</a>
                </div>
            </div>
        </div>
    </div>
</section>


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