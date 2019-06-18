<?php
session_start();
include_once("include/settings.php");
 $id= $_SESSION['id'];
 $team_id=$_POST['teams'];
if(isset($_POST['submit'])){
     $sql1 = "UPDATE `player_sanction` SET `player_status`='1', `team_id`='$team_id' WHERE `id`='$id'";
    $result1=mysqli_query($con,$sql1);

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Sanction Player | The Players Association</title>
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
                    <img src="images/sanction-banner.jpg" alt="" title="">
                    <div class="carousel-caption"> 
                        <h2 class="animate bounceInDown animated">Sanction Player</h2>
                        <!-- <h3 class="animate bounceInDown animated" style="animation-delay: 0.3s;">National Softball Association</h3>  -->
                    </div>
                </div>  
            </div> 
        </div>
    </div>
    <div class="container">
            <div class="row login-play">
                <div class="col-xs-12 col-sm-12">
                    <?php
                    if($result1){ 
                      echo "<span><h1> Your Player Sanction Id has been sent to the Manager</h1></span>";
                    }
                    if(isset($_SESSION['id'])){
                    $sql="SELECT  * FROM `player_sanction` WHERE `id`='$id'";
                    $result=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_assoc($result)){ ?>
                       <span> <h3><?=$row['first_name']?>    <?=$row['last_name']?></h3>  
                        <p>Thank you for registering as a player with TPA. Your player number is <strong><?=$row['player_id']?>. </strong> <br> This will be your player number forever with TPA. To be place on a roster, please give your player number to your teams manager so he/she can add you to the teams roster.Any questions please contact your state director or the National Office.

                            

                        Thank You</p></span>
                         <?php
                }
                }
                ?>
                   
                <!-- <form method="post">
                    <div class="col-sm-4">
              <div class="form-group control-group">
                  <label>Teams <span>*</span></label>
                  <select name="teams" class="form-control"  id="teams">
                     <option value="">Select Team </option>
                    <?php
                    $st=$row['state'];
                    $sql1 = "SELECT * FROM `team_sanction` WHERE `team_state`='$st' ";
                  $result=mysqli_query($con,$sql1);
                    while($row=mysqli_fetch_assoc($result)){ ?>
                    <option value="<?=$row['id']?>"><?=$row['team_name']?></option>
                    <?php } ?>
                  </select>
              </div>
            </div> 
                    
                    <input type="submit" class="btn btn-primary" name="submit">
             
                </form> -->
                
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
