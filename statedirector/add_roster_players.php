<?php
session_start();
include_once("../include/settings.php");
include_once("../include/functions.php");
$user = new User();
error_reporting(1);
if (!isset($_SESSION['sd_id'])) {
    header('location: state_director_login.php');
    exit;
}
$admin_ids = $_SESSION['sd_id'];
extract($_POST);
$state=$_GET['state'];
$roster_id=$_GET['id'];
$_SESSION['roster_id']=$roster_id;
 $sql3 = "SELECT * FROM `states` WHERE `id`=$state";
      $result3=mysqli_query($con,$sql3);
      $row3=mysqli_fetch_array($result3);
      $state1=$row3['name'];
      $table = "player_sanction";
      $rowsPerPage = 10;
      $sql5="SELECT * FROM `rosters` WHERE `r_id`='$roster_id'";
      $result2=mysqli_query($con,$sql5);
      $sql = "SELECT * from player_sanction order by id desc";
      $sql6 ="SELECT * FROM `state_director` WHERE `sd_id`='$admin_ids'";
      $result5=mysqli_query($con,$sql6);
$sanction_id=$_POST['sanction_id'];
if(isset($_POST['submit'])){

    $sql8 = "SELECT * from `player_sanction` WHERE `player_id`='$sanction_id' AND `del_status`='0'";
    $result8=mysqli_query($con,$sql8);
}

?>
<?php include_once("common/head.php"); ?>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <?php include_once("common/profile_section.php"); ?>
</div><!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper" class="main-wrapper">

    <div class="row">
        <div class="col-md-2 padding0">
        	<?php include_once("common/left_sidebar.php");?>
        </div>
        <div class="col-md-10 padding0 white-back">

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
                    while ($row3=mysqli_fetch_array($result2)) {
                        echo "<!-- <span class="."text-center"."> --><h2>".$row3['roster_name']."</h2><!-- </span> -->";

                    }
                 ?>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-list" aria-hidden="true"></i> Add Roster Player</li>
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
                <br>
                <form name="frm_admin_users" id="frm_admin_users" action="add_roster_details.php" method="post">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                               <!--  <th style="width:50px;" ></th> -->
                                
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
                                    <!-- <td class="text-center">
                                            <center><input name="checkbox[]" class="case" type="checkbox" id="checkbox[]" value="<?=$row2['id']; ?>" /></center>
                                        </td> -->
                                        
                                    <!-- <td class="text-center"><?=$row2['id'] ?></td> -->
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
            </div>
        </div>
    </div><!-- /.row -->

   

</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->




        <div class="col-md-10 col-sm-offset-2 padding0 white-back">
            <div class="table-responsive">
<span class="text-center"><h2></h2></span>
<table class="table table-bordered">
                        <thead>
                            <tr>
                                
                               <!--  <th class="text-center">#</th> -->
                                <th class="text-center">First Name</th>
                                <th class="text-center">Last Name</th>
                                <th class="text-center">sanction_id</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    $sq="SELECT * FROM `add_rosters` WHERE roster_id='$roster_id' ";
                    $re=mysqli_query($con,$sq);
                    while($ro=mysqli_fetch_array($re)){
                     $ro_id=$ro['roster_id'];
                     $pl_id= $ro['player_id'];
                     $sql4 = "SELECT * FROM `player_sanction` WHERE `id`='$pl_id' order by `id` desc";
                    $result4=mysqli_query($con,$sql4);
                     while($row = mysqli_fetch_assoc($result4)) { ?>
                                <tr>
                                   <!-- <td class="text-center"><?=$row['id'] ?></td> -->
                                    <td class="text-center"><?=$row['first_name'] ?></td>
                                    <td class="text-center"><?=$row['last_name'] ?></td>
                                    <td class="text-center"><?=$row['player_id'] ?></td>
                                    <td class="text-center"><?=$row['email'] ?></td>
                                    <td class="text-center"><a href="delete_player_roster.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete player from roster ?');"> <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                    </tr>
                        </tbody>
                       <?php }
                   }
                   ?>
                    </table>
            </div>
        </div>
    <!-- </div>
</div>
 -->
<?php include_once("common/foot.php"); ?>
