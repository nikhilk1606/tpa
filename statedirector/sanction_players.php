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
$sql3 = "SELECT * FROM `states` WHERE `id`=$state";
      $result3=mysqli_query($con,$sql3);
      $row3=mysqli_fetch_array($result3);
      $state1=$row3['name'];
      $table = "player_sanction";
      $rowsPerPage = 10;
      $sql = "SELECT * from player_sanction order by id desc";

    $sql4 = "SELECT * from player_sanction WHERE `state`='$state1' AND  `del_status`='0' order by id desc";
    $result4=mysqli_query($con,$sql4);

$limtQry = $user->getPagingQuery($sql, $rowsPerPage); /* for pagination */
$pagingLink = $user->getPagingLink($sql, $rowsPerPage, "sanction_players.php");
$user_list = $user->getRows($limtQry);
$i = 1;
if (isset($_GET['action']) == "delete" && $_GET['deleteid'] != "") {

    $id = $_GET['deleteid'];
    // $del = $user->delet_record($table, "id", $id, "1");
    $sq="UPDATE `player_sanction` SET `del_status`='1' WHERE `id`='$id'";
    $del=mysqli_query($con,$sq);
    if ($del) {
        $_SESSION['success'] = "You successfully deleted record.";
        echo "<script type='text/javascript'>window.location.href = 'sanction_players.php';</script>";
       // header("location: manage_users.php");
        exit;
    }
}
?>
<?php include_once("common/head.php"); ?>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <?php include_once("common/profile_section.php"); ?>
</div><!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper" class="main-wrapper">
    <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?= $_SESSION['success'] ?>
            <?php
            unset($_SESSION['success']);
            unset($_SESSION['flag']);
            ?>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-md-2 padding0">
        	<?php include_once("common/left_sidebar.php");?>
        </div>
        <div class="col-md-10 padding0 white-back">
                       
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-list" aria-hidden="true"></i> All Users List <!-- <a href="add_user.php" class="add-new-h2">Add New</a> --> </li>
            </ol>
            
            <div class="table-responsive">
                 <form name="search" method="get" class="form1">
                 <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>State <span>*</span></label>
                            <select name="state" class="form-control"  id="state">
                                <option value="">Select State </option>
                                    <?php
                                    $sql1 = "SELECT * FROM `states` WHERE 1";
                                    $result1=mysqli_query($con,$sql1);
                                    while($row1=mysqli_fetch_assoc($result1)){ ?>
                                <option value="<?=$row1['id']?>"><?=$row1['name']?></option>
                                <?php } ?>
                            </select>
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
                <form name="frm_admin_users" id="frm_admin_users" action="delete_user.php" method="post">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width:50px;" ></th>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>sanction_id</th>
                                <th>Email</th>                                
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            if ($user_list) {
                                if (isset($_GET['page'])) {
                                    $pns = $_GET['page'] - $i;
                                }
                                ?>
                               <!--  <th colspan="2" class="text-center">Functions</th> -->
                                 
                                 <?php while($row = mysqli_fetch_assoc($result4)) { ?>
                                <tr>
                                    <!-- <td>
                                            <center><input name="checkbox[]" class="case" type="checkbox" id="checkbox[]" value="<?=$row['id']; ?>" /></center>
                                        </td> -->
                                        <td>
                                            <?php if (isset($_GET['page']))
                                                echo $i + $rowsPerPage * $pns;
                                            else if ($siteroot)
                                                echo $i;
                                            ?> 
                                        </td>
                                     <td><?=$row['id'] ?></td> 
                                    <td><?=$row['first_name'] ?></td>
                                    <td><?=$row['last_name'] ?></td>
                                    <td><?=$row['player_id'] ?></td>                                   
                                    <td><?=$row['email'] ?></td>
                                        <!-- <td class="text-center">
                                        	<a href="view_user.php?&editid=<?php echo $row['id'] ?>" class="view">
                                                <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                                            </a>
                                            <a href="edit_user.php?editid=<?php echo $row['id'] ?>" class="edit">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit"></i>
                                            </a>
                                            <a onclick="return checkDel()" href="manage_users.php?action=delete&&deleteid=<?php echo $row['id'] ?>" class="delet">
                                                <i class="fa fa-trash" aria-hidden="true" title="Delete"></i>
                                            </a>                                           
                                        </td> -->
                                    </tr>
                                <?php $i++; } ?>
                        </tbody>

                        <?php } else { ?>
                            <tr><td colspan="9">No Records Found</td></tr>
                        <?php } ?>
                        <?php if (count($user_list) > 0) { ?>
                            <!-- <tfoot>
                            <th colspan="9">
                                <input type="submit"  name="btn_delete_all" class="btn btn-danger"   value="Delete Selected">
                            </th>
                            </tfoot> -->
                        <?php } ?>
                    </table>
                </form>
            </div>
        </div>
    </div><!-- /.row -->

    <div class="row">
        <div class="col-lg-12 f-right">
            <!-- <?= $pagingLink ?> -->
        </div>
    </div>

</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->   
<?php include_once("common/foot.php"); ?>