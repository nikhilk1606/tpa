<?php



ob_start(); // Start buffering

if (!defined('VI_CURRENT_FILE')){define('VI_CURRENT_FILE', __FILE__);define('VI_S_ID', 18454);}





include_once("../include/settings.php");

include_once("../include/functions.php");

$user = new User();

    if(!isset($_SESSION['id'])) { 
echo "<script type='text/javascript'>window.location.href = 'login.php';</script>";
	 // header('location: login.php'); 
     exit;

	}

?>

<?php include_once("../common/header.php");?> 

      </nav>



      <div id="page-wrapper">
        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <?php include_once("../common/profile_section.php"); ?>
          </div>
        </div>


        <div class="row">
          <div class="col-xs-12 col-sm-2">
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <?php include_once("../common/left_sidebar.php"); ?> 
            </div>
          </div>

          <div class="col-sm-10 box-border"> 
            <h1>Dashboard</h1> 
            <ol class="breadcrumb"> 
              <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li> 
            </ol> 
    
            	<div class="col-md-3 col-sm-6">
                	<div class="total-box">
                    	<div class="col-sm-9">
                        <h3><?php
            $opt="select * from `player_sanction`";
            $exec=mysqli_query($con,$opt);
            echo $usercount=mysqli_num_rows($exec);?></h3>
            <a href="display_player_sanction.php">
            <h5>Total Sanction Players</h5></a>
                        </div>
                    	<div class="col-sm-3">
                        	<i class="fa fa-user navbar-nav" aria-hidden="true"></i>
                        </div> 
                    </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                	<div class="total-box">
                    	<div class="col-sm-9">
                        <h3><?php
            $opt1="select * from `team_sanction`";
            $exec1=mysqli_query($con,$opt1);
            echo $usercount=mysqli_num_rows($exec1);?></h3>
            <a href="display_team_sanction.php">
            <h5>Total Sanction Teams</h5></a>
                        </div>
                    	<div class="col-sm-3">
                        	<i class="fa fa-user" aria-hidden="true"></i>
                        </div> 
                    </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                	<div class="total-box">
                    	<div class="col-sm-9">
                        <h3><?php
            $opt2="select * from `umpire_sanction`";
            $exec2=mysqli_query($con,$opt2);
            echo $usercount=mysqli_num_rows($exec2);?></h3>
            <a href="display_umpire_sanction.php">
            <h5>Total Sanction Umpires</h5></a>
                        </div>
                    	<div class="col-sm-3">
                        	<i class="fa fa-user" aria-hidden="true"></i>
                        </div> 
                    </div>
                    </div>
                  </div>
                </div>
</div> 
<?php include_once("common/footer.php");?>