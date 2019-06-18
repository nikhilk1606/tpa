<?php
session_start();
include_once("../include/settings.php");
include_once("../include/functions.php");
$user = new User();
$roster_id=$_GET['id'];
$_SESSION['roster_id']=$roster_id;
$s="SELECT * FROM `rosters` WHERE `r_id`='$roster_id'";
$r=mysqli_query($con,$s);
error_reporting(1);
if (!isset($_SESSION['id'])) {
    header('location: admin_login.php');
    exit;
}
$sql1="SELECT * FROM `rosters`where`r_id`='$roster_id'";
$result = mysqli_query($con, $sql1);
$sanction_id=$_POST['sanction_id'];
if(isset($_POST['submit'])){
    $sql8 = "SELECT * from `player_sanction` WHERE `player_id`='$sanction_id' AND  `del_status`='0'";
    $result8=mysqli_query($con,$sql8);
}
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
        <div class="col-xs-12 col-sm-10 box-border">
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
           <div class="col-md-10 padding0 white-back">
            <ol class="breadcrumb">
              <li class="active">
                <i class="fa fa-list" aria-hidden="true"></i>
                <?php $ro=mysqli_fetch_array($r);
                echo $ro['roster_name'];
                ?>  
              </li>
            </ol>

            <div class="table-responsive">
                <form name="search" method="post" class="form1">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Please Enter Player Sanction ID <span>*</span></label>
                          <input type="text" name="sanction_id" class="form-control"Placeholder="Sanction ID">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <input type="submit" name="submit" value="Search" class="btn btn-primary btn-search">
                    </div>
                  </div>
                </form>
                <form name="frm_admin_users" id="frm_admin_users" action="add_roster_details.php" method="post">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                              
                                <th class="text-center">First Name</th>
                                <th class="text-center">Last Name</th>
                                <th class="text-center">sanction_id</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Class</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php while($row2 = mysqli_fetch_assoc($result8)) { ?>
                                <tr>
                                    
                                    <td class="text-center"><?=$row2['first_name'] ?></td>
                                    <td class="text-center"><?=$row2['last_name'] ?></td>
                                    <td class="text-center"><?=$row2['player_id'] ?></td>
                                    <td class="text-center"><?=$row2['email'] ?></td>
                                    <td class="text-center"><?=$row2['class'] ?></td>
                                    <td class="text-center"><a href="add_roster_details.php?id=<?=$row2["id"] ?>""><i class="fa fa-plus" aria-hidden="true"></i></a></td>
                                    </tr>
                                <?php  }
                                 ?>
                        </tbody>
                    </table>
                </form>
            <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width:50px;" ></th>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>sanction_id</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             $sq="SELECT * FROM `add_rosters` WHERE `roster_id`='$roster_id' ";
                            $re=mysqli_query($con,$sq);
                            while($rs=mysqli_fetch_array($re)){
                              
                              $pl_id= $rs['player_id'];
                                 $sq1 = "SELECT * FROM `player_sanction` WHERE `id`='$pl_id' AND `status`='1' order by `id` desc";
                                $re4=mysqli_query($con,$sq1);
                                 while($rw2 = mysqli_fetch_assoc($re4)) {  ?>
                                <tr>
                                    <td>
                                    </td>
                                    <td><?=$rw2['id'] ?></td>
                                    <td><?=$rw2['first_name'] ?></td>
                                    <td><?=$rw2['last_name'] ?></td>
                                    <td><?=$rw2['player_id'] ?></td>                                   
                                    <td><?=$rw2['email'] ?></td>
                                     <td class="text-center"><a href="delete_player_roster.php?id=<?=$rw2['id'] ?>" onclick="return confirm('Are you sure you want to delete player from roster ?');"> <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                                <? } } ?>
                        </tbody>
                    </table>
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


