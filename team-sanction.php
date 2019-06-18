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
if(isset($_SESSION['id'])){
  include "header2.php";
}
else
{ include "header.php";
} ?>

 <div class="team-sanction">
     <div class="pagetitle_container"> 
        <div class="container">
            <h1 id="ctl00_Content_h1PageHeader" class="page_header">Team Sanction Form</h1> 
        </div>
    </div>
     <div class="container">
         <div class="row">
            <div class="container-fluid" style="padding:15px 0;">
                <div id="ctl00_Content_pnlTeamType"> 
                    <div class="col-md-12 dualwindow_right">
                        <!-- <select name="ctl00$Content$ddlTeamType" onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$Content$ddlTeamType\&#39;,\&#39;\&#39;)&#39;, 0)" id="ctl00_Content_ddlTeamType">
                            <option selected="selected" value="none">Please Select Sanction type</option>
                            <option value="a">Adult</option>
                            <option value="y">Youth</option>
                            <option value="f">Fall Season</option>
                            <option value="o">Outlaw Softball</option>
                            <option value="renew">Team Renewal</option>

                        </select> -->
                        <div class="s-line">
                            <a href="adult_team_registration.php" class="team-menu"><p>Adult Membership</p></a>
                            <a href="youth_team_membership.php" class="team-menu"><p>Youth Membership</p></a>
                            <a href="fall-season.php" class="team-menu"><p>Fall Season</p></a>
                           <!--  <a href="outlaw-softball.php" class="team-menu"><p>Outlaw Softball</p></a> -->
                            <a href="team-renewal.php" class="team-menu"><p>Team Renewal</p></a>
                        </div>
                        <input type="hidden" name="ctl00$Content$hiddenTeamType" id="ctl00_Content_hiddenTeamType" />
                        <input type="hidden" name="ctl00$Content$hiddenIsRenewal" id="ctl00_Content_hiddenIsRenewal" />
                        <input type="hidden" name="ctl00$Content$hiddenTeamId" id="ctl00_Content_hiddenTeamId" />
                        <input type="hidden" name="ctl00$Content$hiddenSeason" id="ctl00_Content_hiddenSeason" />
                    </div> 
                </div>
                
                <div id="ctl00_Content_pnlCustomInstructions"> 
                    <div class="col-md-12 dualwindow_left">
                        <span class="errormsg r-text">Important Note From TPA Headquarters:<br />Coaches <b><i><u>MUST HAVE THEIR OWN</u></i></b> TPA User account for their team.  This will ensure proper information appearing on rosters and team contact information.</span>
                            
                        <span id="ctl00_Content_lblCustomInstructions"><div style="padding-bottom: 15px;">Coaches:<br />Once submitted your area, state, or regional director will be notified of a <span style="text-decoration: underline">pending</span> sanction waiting for him or her online.  <span style="color: Black; text-decoration: underline;">All forms will remain pending until payment is received.</span><span style="color: Black;">Once your payment has been received your sanction number will be approved and you will be notified.</span></div>                  <div style="padding-bottom: 15px;">All information submitted will be saved on a secure server.  The information on this form shall be treated as private information and only the team name will be available to the general public.</div>                  <div style="padding-bottom: 15px;">Sanction Fees are:<br />Adult <font color="red">Teams</font> $40.00 USD<br />Youth <font color="red">Teams</font> $30.00 USD<br /><span style="color: Black">For a complete list of SOFTBALL area, state, or regional directors</span> <a href="#">Click Here</a>.</div></span>
                    </div> 
                </div>  
            </div>
        </div>
    </div>
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