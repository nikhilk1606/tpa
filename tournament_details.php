<?php

include_once("include/settings.php");
$tournament_id=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Tournament Schedule | The Players Association</title>
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
<div class="home-slider">
    <div id="carouselHacked" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="images/tournament-banner.jpg" alt="" title="">
                <div class="carousel-caption"> 
                    <h2 class="animate bounceInDown animated">Tournament Details</h2>
                    <h3 class="animate bounceInDown animated" style="animation-delay: 0.3s;">The Players Association</h3> 
                </div>
            </div>  
        </div> 
    </div>
</div>
<section class="tournament-table">    
    <div class="container"> 
        <div class="bor-1"> 
            <div class="row">

                <?php
                        $sql2="SELECT * FROM `add_tournament_details` WHERE `tournament_id`=$tournament_id";
                                $result2=mysqli_query($con,$sql2);
                        while ($row6=mysqli_fetch_assoc($result2)) { ?>

                <div class="col-xs-12 col-sm-6">
                    <div class="InfoCell tour-head">
                        <a href="javascript:void(0)" class="add-new-h2" style="float:right;margin-right: 11px;text-decoration:none;" onClick="return goBack();">Back</a></h3>
                        <label>Tournament Name:&nbsp;&nbsp;</label>
                        <span> <?=$row6['tournament_name'] ?> </span>
                    </div>
                </div>
                <!-- <div class="col-xs-12 col-sm-6">
                    <a href="#sign-up.php"><button class="btn btn-primary sign-btn">Sign Up</button></a>
                </div> -->
            </div>
            <div class="row">   
                <div class="col-xs-12 col-sm-12">
                    <h3 class="text-center">Director Details</h3>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Phone:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblLastDateToEnter" class="smalltext"><?=$row6['director_phone'] ?></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Email:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblLastDateToEnter" class="smalltext"><?=$row6['director_email'] ?></span>
                        </div>
                    </div>
               
                    <div class="col-xs-12 col-sm-12">
                        <hr class="mid-line">
                        <h3 class="text-center">Tournament Details</h3>
                    </div> 
                    
                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Start Date:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblLastDateToEnter" class="smalltext"><?=$row6['start_date'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>End Date:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblDivision" class="smalltext"><?=$row6['end_date'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>City:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblProgram" class="smalltext"><?=$row6['city'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>State:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblClasses" class="smalltext"><?=$row6['state'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Classes:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblAgeGroup" class="smalltext"><?=$row6['class'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Division:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblAges" class="smalltext"><?=$row6['division'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Age Group:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblTourneyType" class="smalltext"><?=$row6['age_group'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Age:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblGameFormat" class="smalltext"><?=$row6['age'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Season:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblOpenSignup" class="smalltext"><?=$row6['season'] ?></span>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Last Date to Enter:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblMustQualify" class="smalltext"><?=$row6['last_date'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Program:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblFee" class="smalltext"><?=$row6['program'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Class:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblFieldCount" class="smalltext"><?=$row6['class'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Tournament Type:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblMaxTeams" class="smalltext"><?=$row6['tournament_type'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Game Format:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblBerth" class="smalltext"><?=$row6['game_format'] ?></span>
                        </div>
                    </div>

                    
                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Open Signup:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblBerthCount" class="smalltext"><?=$row6['open_signup'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Must Qualify:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblPrepayReqd" class="smalltext"><?=$row6['must_qualify'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Tournament Fee:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblPrepayReqd" class="smalltext"><?=$row6['fee'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Field Count:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblPrepayReqd" class="smalltext"><?=$row6['field_count'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Max. Teams:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblPrepayReqd" class="smalltext"><?=$row6['max_teams'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Berth:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblPrepayReqd" class="smalltext"><?=$row6['berth'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Berth Count:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblPrepayReqd" class="smalltext"><?=$row6['berth_count'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>PrePay Req'd:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblPrepayReqd" class="smalltext"><?=$row6['pre_pay_req'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12">
                        <hr class="mid-line">
                        <h3 class="text-center">Park Details</h3>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Park Name:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblPrepayReqd" class="smalltext"><?=$row6['park_name'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Address:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblPrepayReqd" class="smalltext"><?=$row6['address'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Phone:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblPrepayReqd" class="smalltext"><?=$row6['phone'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Directions:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblPrepayReqd" class="smalltext"><?=$row6['directions'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Lighted Fields:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblPrepayReqd" class="smalltext"><?=$row6['lighted_fields'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Comments:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblPrepayReqd" class="smalltext"><?=$row6['comments'] ?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="InfoCell">
                            <bluetag>Rules:&nbsp;&nbsp;</bluetag>
                            <span id="ctl00_Content_lblPrepayReqd" class="smalltext"><?=$row6['rules'] ?></span>
                        </div>
                    </div>  

                    <?php
                    }

                    ?>  
                </div>
            </div>
        </div>
    </div>
</section>





<?php include "footer.php"; ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.js"></script>

<script type="text/javascript">
    function goBack() {
        window.history.back()

    }
</script>
                

