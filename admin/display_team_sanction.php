<?php
include_once("../include/settings.php");
include_once("../include/functions.php");

$user = new User();
error_reporting(0);
if (!isset($_SESSION['id'])) {
    header('location: login.php');
    exit;
}
$admin_ids = $_SESSION['id'];
extract($_POST);
$table = "team_sanction";
$rowsPerPage = 10;
    $sql = "SELECT * from team_sanction WHERE `del_status`='0' order by id desc";
$limtQry = $user->getPagingQuery($sql, $rowsPerPage); /* for pagination */
$pagingLink = $user->getPagingLink($sql, $rowsPerPage, "display_team_sanction.php");
$user_list = $user->getRows($limtQry);
$i = 1;
if (isset($_GET['action']) == "delete" && $_GET['deleteid'] != "") {

    $id = $_GET['deleteid'];
    $query="UPDATE `team_sanction` SET `del_status`='1' WHERE `id`='$id'";
    $del=mysqli_query($con,$query);
    // $del = $user->delet_record($table, "id", $id, "1");
    if ($del) {
        $_SESSION['success'] = "You successfully deleted record.";
        // echo "<script type='text/javascript'>window.location.href = 'display_team_sanction.php';</script>";
       header("location: display_team_sanction.php");
        exit;
    }
}

$sql = "SELECT * FROM `team_sanction` WHERE `del_status`='0'order by `id` desc";
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
        <div class="col-xs-12 col-sm-10 box-border">
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
            <h3 class="text-center">Sanction Teams </h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <!-- <th>#</th> -->
                        <th>ID</th>
                        <th>Manager First Name</th>
                        <th>Manager Last Name</th>
                        <th>Asst. Manager First Name</th>
                        <th>Asst. Manager Last Name</th>
                        <th>Team Name</th>
                        <th>Team ID</th>
                        <th class="text-center">Email Address</th>
                        <!-- <th>Address</th>
                        <th>City</th> -->
                       <!--  <th>State</th> -->
                        <!-- <th>Zip Code</th>
                        <th>Home Phone</th>
                        <th>Mobile Number</th> -->
                       <!--  <th>Team Registered For</th> -->
                       <!--  <th>Team Loginid</th>
                        <th>Payment</th>
                        <th>TransactionID</th> -->
                        <?php
                            if ($user_list) {
                                if (isset($_GET['page'])) {
                                    $pns = $_GET['page'] - $i;
                                }
                                ?>
                        <th colspan="2" class="text-center">Functions</th>

                        <?php while($row = mysqli_fetch_assoc($result)) {?>
                        <tr>
                            
                                        
                             <td><?=$row['id'] ?></td> 
                            <td><?=$row['first_name'] ?></td>
                            <td><?=$row['last_name'] ?></td>
                            <td><?=$row['asst_manager_first_name'] ?></td>
                            <td><?=$row['asst_manager_last_name'] ?></td>
                            <td><?=$row['team_name'] ?></td>
                            <td><?=$row['team_id'] ?></td>
                            <td><?=$row['team_email'] ?></td>
                            
                            <td>
                                        <a href="edit_team_sanction.php?id=<?php echo $row["id"]; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a href="delete_team_sanction.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                           
                        </tr>
                   <?php
                             $i++; } 
                             } else { ?>
                            <tr><td colspan="9">No Records Found</td></tr>
                        <?php } ?>
                        <?php if (count($user_list) > 0) { ?>
                           
                        <?php } ?>
                    </table>
                </div>
        </div>
         <div class="row">
        <div class="col-lg-12 f-right">
            <!-- <?= $pagingLink ?> -->
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
<?php include_once("common/footer.php"); ?>

