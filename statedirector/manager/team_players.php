<?php
session_start();
include_once("../../include/settings.php");
error_reporting(0);
if (!isset($_SESSION['id'])) {
    header('location: ../../team_login.php');
    exit;
}
$admin_ids = $_SESSION['id'];
// extract($_POST);
 $id=$_GET['id'];
$sq="SELECT * FROM `team_sanction` WHERE `id`='$admin_ids'";
$rs=mysqli_query($con,$sq);
  $sr="UPDATE `player_sanction` SET `team_id`='$admin_ids' WHERE `id`='$id'";
$sd=mysqli_query($con,$sr);
if ($sd) {
    $_SESSION['success']="Player Successfully added to the team";
    // header("location:team_players.php");
    // exit();
}
?>
<?php  $page_name=basename($_SERVER['PHP_SELF']);?>
<?php include_once("common/head.php");?>
      </nav>
<!-- Collect the nav links, forms, and other content for toggling -->
<!DOCTYPE html>
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

        <div class="col-xs-12 col-sm-10">
            <?php 
            if (isset($_SESSION['success']) && $_SESSION['success'] != "") { ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button>
                        <?= $_SESSION['success'] ?>
                    <?php unset($_SESSION['success']); ?>
                    </div>
                <?php } ?>
            <?php if (isset($_SESSION['error']) && $_SESSION['error'] != "") { ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button>
                        <?= $_SESSION['error'] ?>
                    <?php unset($_SESSION['error']); ?>
                    </div>
            <?php } ?>
            <?php
            while($sr=mysqli_fetch_assoc($rs)){
    $program=$sr['team_program'];
     $class=substr($program,-1,1);
    $st=$sr['team_state'];
}
 $sql="SELECT * FROM `player_sanction` WHERE `del_status`='0' AND `class`='$class' AND `state`='$st' AND `team_id`='0' ";
// echo $sql="SELECT * FROM `player_sanction` WHERE `del_status`='0' AND `player_status`='1' AND `team_status`='0'";
$result = mysqli_query($con, $sql);

?>      
<h3 class="text-center">All Players List </h3>
                   <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <form method="get" action="">
                            <table class="table table-bordered">
                                <th class="text-center">ID</th>
                                <th class="text-center">Player First Name</th>
                                <th class="text-center">Player Last Name</th>
                                <th class="text-center">Player ID</th>
                                <!-- <th class="text-center">Email Address</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">City</th>-->
                                <th class="text-center">State</th>
                                <th class="text-center">Class</th>                
                                <th colspan="2" class="text-center">Functions</th>
                                 <?php while($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td class="text-center"><?=$row['id'] ?></td>
                                    <td class="text-center"><?=$row['first_name'] ?></td>
                                    <td class="text-center"><?=$row['last_name'] ?></td>
                                    <td class="text-center"><?=$row['player_id'] ?></td>
                                    <!-- <td class="text-center"><?=$row['email'] ?></td>
                                    <td class="text-center"><?=$row['address'] ?></td>
                                    <td class="text-center"><?=$row['city'] ?></td>-->
                                    <td class="text-center"><?=$row['state'] ?></td>                                    
                                    <td class="text-center"><?=$row['class'] ?></td>
                                    <td class="text-center"> <a href="team_players.php?id=<?php echo $row["id"]; ?>"><!-- <button>Edit</button> --><i class="fa fa-plus" aria-hidden="true"></i></a>
                                     <a href="delete_team_players.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete this record?');"><!-- <button>Delete</button> --><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                            <?php } ?>
                            </table>
                        </form>
                        </div>
                    </div>
                </div>
                <?php 

                 ?>
                <h3 class="text-center">Team Players </h3>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <th class="text-center">ID</th>
                                <th class="text-center">Player First Name</th>
                                <th class="text-center">Player Last Name</th>
                                <th class="text-center">Player ID</th>
                                <!-- <th class="text-center">Email Address</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">City</th>-->
                                <th class="text-center">State</th>
                                <th class="text-center">Class</th>                
                                <th colspan="2" class="text-center">Functions</th>
                                <?php
                                $sql="SELECT * FROM `player_sanction` WHERE `del_status`='0' AND `player_status`='1' AND `team_id`='$admin_ids'";
                                    $result1 = mysqli_query($con, $sql);
                                  while($row2 = mysqli_fetch_assoc($result1)) { ?>
                                <tr>
                                    <td class="text-center"><?=$row2['id'] ?></td>
                                    <td class="text-center"><?=$row2['first_name'] ?></td>
                                    <td class="text-center"><?=$row2['last_name'] ?></td>
                                    <td class="text-center"><?=$row2['player_id'] ?></td>
                                    <!-- <td class="text-center"><?=$row['email'] ?></td>
                                    <td class="text-center"><?=$row['address'] ?></td>
                                    <td class="text-center"><?=$row['city'] ?></td>-->
                                    <td class="text-center"><?=$row2['state'] ?></td>                                    
                                    <td class="text-center"><?=$row2['class'] ?></td>
                                    <td class="text-center">
                                     <a href="remove_team_player.php?id=<?php echo $row2["id"]; ?>" onclick="return confirm('Are you sure you want to delete this record?');"><!-- <button>Delete</button> --><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                            <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
     
<?php include_once("common/foot.php"); ?>

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

</div><!-- /#wrapper -->

<script>
    function checkDel() {
        if (confirm("Are you sure want to delete?")) {
            return true;
        } else {
            return false;
        }
    }
</script>    
