<?php



ob_start(); // Start buffering

if (!defined('VI_CURRENT_FILE')){define('VI_CURRENT_FILE', __FILE__);define('VI_S_ID', 18454);}





include_once("../../include/settings.php");

include_once("../../include/functions.php");

$user = new User();

    if(!isset($_SESSION['user_id'])) { 

	 header('location: login.php'); exit;

	}

?>

<?php include_once("common/header.php");?>

      </nav>



      <div id="page-wrapper">
        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <?php include_once("common/profile_section.php"); ?>
          </div>
        </div>


        <div class="row">
          <div class="col-xs-12 col-sm-2">
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <?php include_once("common/left_sidebar.php"); ?> 
            </div>
          </div>

          <div class="col-sm-10"> 
            <h1>Dashboard</h1> 
            <ol class="breadcrumb"> 
              <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li> 
            </ol> 
          </div> 
        </div> 
      </div> 

<?php include_once("common/footer.php");?>