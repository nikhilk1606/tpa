<?php
session_start();
include_once("../include/settings.php");

error_reporting(1);
if (!isset($_SESSION['id'])) {
    header('location: admin_login.php');
    exit;
}
$sql="SELECT * FROM `rosters`";
$result = mysqli_query($con, $sql);
?>
<?php  $page_name=basename($_SERVER['PHP_SELF']);?>
<?php include_once("../common/header.php"); ?>
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
            <h3 class="text-center">Rosters List </h3>
                   <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <th class="text-center">ID</th>
                                <th class="text-center">Roster Name</th>
                                
                                <th class="text-center">Manager Name</th>
                                <th class="text-center">State Director Name</th>
                                <!-- <th>Team Name</th>
                                <th>Sanction Id</th> -->
                                <th class="text-center">Division</th>
                                <th class="text-center">Class</th>                              
                                <!-- <th colspan="2" class="text-center">Functions</th> -->
                                 <?php while($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                 <td class="text-center"><?=$row['r_id'] ?></td>
                                    <td class="text-center"><a href="roster_details.php?id=<?=$row['r_id']?>"><?=$row['roster_name'] ?></a></td>
                                    <?php 
                                    $sd_id=$row['sd_id'];
                                    $man_id=$row['man_id'];
                                   
                                   
                                    $sql1="SELECT * FROM `state_director` WHERE `sd_id`='$sd_id'";
                                    $result1=mysqli_query($con,$sql1);
                                    ?>
                                    <td class="text-center">
                                    <?php
                                      $man_detail="SELECT * FROM `team_sanction` WHERE `id`='$man_id'";
                                    $details=mysqli_query($con,$man_detail);
                                     while($man=mysqli_fetch_assoc($details)){ 
                                    echo $man['first_name']." ".$man['last_name'];
                                 } ?>
                                </td>
                                    <td class="text-center"> <?php
                                    while ($row2=mysqli_fetch_assoc($result1)) { ?>
                                        <?=$row2['first_name']." ".$row2['last_name']?>

                                  <?php } ?>
                                  </td>
                                  
                                    
                                    <td class="text-center"><?=$row['division'] ?></td>
                                    <td class="text-center"><?=$row['class'] ?></td>
                                    <!-- <td class="text-center"><a href="edit_player_sanction.php?id=<?php echo $row["id"]; ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="delete_player_sanction.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete this record?');">
                                    	 <i class="fa fa-trash" aria-hidden="true"></i></a></td> -->
                                    
                                </tr>
                            <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
     
<?php include_once("common/footer.php"); ?>
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