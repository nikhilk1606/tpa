<?php
session_start();
include_once("../include/settings.php");
include_once("../include/functions.php");

$user = new User();
error_reporting(1);
extract($_POST);
    if(!isset($_SESSION['id'])) { 
    echo "<script type='text/javascript'>window.location.href = 'login.php';</script>";

    exit;
  }
     $pid = $_GET['pid'];
     $_SESSION['pid'] = $pid;
     
     $playsql = "SELECT * FROM `player_sanction` WHERE `id`= '$pid'";
     $playres = mysqli_query($con,$playsql);
    //  while($play_val = mysqli_fetch_assoc($playres)){

    // }

     $sql="SELECT * FROM `rosters`";
    $result = mysqli_query($con,$sql);
    $limtQry = $user->getPagingQuery($sql, $rowsPerPage); /* for pagination */
    $pagingLink = $user->getPagingLink($sql, $rowsPerPage, "assign_to_roster.php");
    $user_list = $user->getRows($limtQry);
    // $i = 1;

?>
<?php include_once("../common/header.php");?>

      </nav>
<!-- Collect the nav links, forms, and other content for toggling -->
<!DOCTYPE html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    </head>
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


                <h3 class="text-center">Select Roster to assign player </h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Roster Name</th>


                        <th class="text-center">Division</th>
                        <th class="text-center">Class</th>
                        </tr>
                         <?php while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                         <td class="text-center"><?=$row['r_id'] ?></td>

                            <td class="text-center"><a href="assign_player.php?rid=<?=$row['r_id'];?>"><?=$row['roster_name'];?></a></td>

                           
                            <td class="text-center"><?=$row['division'] ?></td>
                            <td class="text-center"><?=$row['class'] ?></td>
                            

                        </tr>
                    <?php } ?>
                    </table>
                </div>

            </div>
    </div>
</div>

<?php include_once("common/foot.php"); ?>
