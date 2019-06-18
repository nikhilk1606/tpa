<?php
session_start();
include_once("../include/settings.php");
error_reporting(1);
extract($_POST);
    if(!isset($_SESSION['id'])) { 
    echo "<script type='text/javascript'>window.location.href = 'admin_login.php';</script>";

    exit;
  }
  $sanction_id=$_POST['sanction_id'];
$sql = "SELECT * from `player_sanction` order by `id` desc";
if(isset($_POST['submit'])){
    $sql4 = "SELECT * from `player_sanction` WHERE `player_id`='$sanction_id' AND  `del_status`='0'";
    $result4=mysqli_query($con,$sql4);
}
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
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?= $_SESSION['success'] ?>
                            <?php unset($_SESSION['success']); ?>
                            </div>
                        <?php } ?>
                    <?php if (isset($_SESSION['error']) && $_SESSION['error'] != "") { ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?= $_SESSION['error'] ?>
                            <?php unset($_SESSION['error']); ?>
                            </div>
                    <?php } ?>
<div class="table-responsive">
                  <form name="search" method="post" class="form1">
                   <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Please Enter Player Sanction ID <span>*</span></label>
                          <input type="text" name="sanction_id" class="form-control" placeholder="Sanction ID">
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
                
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <!-- <th style="width:50px;" ></th> -->
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>sanction_id</th>
                                <th>Email</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                 <?php while($row = mysqli_fetch_assoc($result4)) { ?>
                                <tr>
                                     <td><?=$row['id'] ?></td>
                                    <td><?=$row['first_name'] ?></td>
                                    <td><?=$row['last_name'] ?></td>
                                    <td><?=$row['player_id'] ?></td>
                                    <td><?=$row['email'] ?></td>
                                    <td class="text-center"><a href="assign_to_roster.php?pid=<?php echo $row["id"]; ?>">Assign to Roster<!-- <button>Edit</button> <i class="fa fa-pencil-square-o" aria-hidden="true"> </i>--></a></td>
                                    </tr>
                                <?php  } ?>
                        </tbody>
                    </table>
                
            </div>
        </div>


</div>
    </div>
</div>

<?php include ("footer.php"); ?>