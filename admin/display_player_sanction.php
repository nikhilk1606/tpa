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
$table = "player_sanction";
$rowsPerPage = 10;
$sql = "SELECT * FROM `player_sanction` WHERE `del_status`='0' ORDER BY `id` DESC";
$limtQry = $user->getPagingQuery($sql, $rowsPerPage); /* for pagination */
$pagingLink = $user->getPagingLink($sql, $rowsPerPage, "display_player_sanction.php");
$user_list = $user->getRows($limtQry);
$i = 1;
if (isset($_GET['action']) == "delete" && $_GET['deleteid'] != "") {
    $id = $_GET['deleteid'];
    $sq="UPDATE `player_sanction` SET `del_status`='1' WHERE `id`='$id' ";
    $del=mysqli_query($con,$sq);
    if ($del) {
        $_SESSION['success'] = "You successfully deleted record.";
        echo "<script type='text/javascript'>window.location.href = 'display_player_sanction.php';</script>";
       exit;
    }
}
$table = "player_sanction";
$rowsPerPage = 10;
$sql = "SELECT * FROM `player_sanction` WHERE `del_status`='0' order by `id` desc";
if(isset($_GET["fname"]) || isset($_GET["lname"]) || isset($_GET["state"]) )
{
    $fname=$_GET["fname"];
    $lname=$_GET["lname"];
    $state=$_GET["state"];
     $sql = "SELECT * FROM `player_sanction` WHERE (`first_name` like   '%$fname%' OR `last_name` like '$lname'   OR `state` like '$state') AND `del_status`='0' order by `id` desc";
}
$limtQry = $user->getPagingQuery($sql, $rowsPerPage); /* for pagination */
$pagingLink = $user->getPagingLink($sql, $rowsPerPage, "display_player_sanction.php");
$user_list = $user->getRows($limtQry);
$i = 1;
$result = mysqli_query($con,$sql);
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
            <form name="search" method="get" class="form1">
                <div class="col-xs-12 col-sm-12 box-border">
                 <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="fname" placeholder="First Name" value="<?php echo $_GET["fname"];?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lname" placeholder="Last Name" value="<?php echo $_GET["lname"];?>" class="form-control">
                        </div>
                    </div>                    
                    <div class="col-sm-4">
                        <div class="form-group control-group">
                            <label>State <span>*</span></label>
                            <select name="state" class="form-control"  id="state">
                                <option value="">Select State </option>
                                <?php
                                $sql1 = "SELECT * FROM `states` WHERE 1";
                                $result1=mysqli_query($con,$sql1); ?>
                                <option value="<?php echo $_GET["state"];?>"><?php echo $_GET["state"];?></option>
                                <?php while($row1=mysqli_fetch_assoc($result1)){ ?>                        
                                <option value="<?=$row1['name']?>"><?=$row1['name']?></option>
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
                </div>  
                <br>           
            </form>

                   <div class="row box-border">
                    <div class="col-lg-12">
                    <h3 class="text-center">Sanction Players </h3>
                        <div class="table-responsive">
                            <form name="frm_admin_users" id="frm_admin_users" action="delete_sanction_player.php" method="post">
                            <table class="table table-bordered">
                                
                                <th class="text-center">ID</th>
                                <th class="text-center">Player First Name</th>
                                <th class="text-center">Player Last Name</th>
                                <th class="text-center">Player ID</th>
                                <th class="text-center">Class</th>
                                <th class="text-center">Email Address</th>
                                <th class="text-center">DOB</th>
                                <th class="text-center">State</th>
                                <!-- <th>Address</th>
                                <th>City</th>-->                                
                                <!--<th>Zip Code</th>
                                <th>Home Phone</th>
                                <th>Mobile Number</th>
                                <th>Class</th>
                                <th>LoginId</th> -->
                                 <?php
                            if ($user_list) {
                                if (isset($_GET['page'])) {
                                    $pns = $_GET['page'] - $i;
                                }
                                ?>
                                <th colspan="2" class="text-center">Functions</th>
                                 
                                 <?php while($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>                                   
                                        
                                     <td class="text-center"><?=$row['id'] ?></td> 
                                    <td class="text-center"><?=$row['first_name'] ?></td>
                                    <td class="text-center"><?=$row['last_name'] ?></td>
                                    <td class="text-center"><?=$row['player_id'] ?></td>
                                    <td class="text-center"><?=$row['class'] ?></td>
                                    <td class="text-center"><?=$row['email'] ?></td>
                                   <td class="text-center"><?php echo date('d-M-Y',strtotime($row["dob"]));?></td> 
                                    <!-- <td class="text-center"><?=$row["dob"]?></td>  -->
                                    <td class="text-center"><?=$row['state'] ?></td>
                                    <td class="text-center"><a href="single_player_sanction.php?id=<?php echo $row["id"]; ?>">View Player Details<!-- <button>Edit</button> <i class="fa fa-pencil-square-o" aria-hidden="true"> </i>--></a></td>
                                    <td class="text-center"><a href="edit_player_sanction.php?id=<?php echo $row["id"]; ?>"><!-- <button>Edit</button> --><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="delete_player_sanction.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete this record?');"><!-- <button>Delete</button> --><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                            <?php
                             $i++; } 
                             } else { ?>
                            <tr><td colspan="9">No Records Found</td></tr>
                        <?php } ?>
                        <?php if (count($user_list) > 0) { ?>                            
                        <?php } ?>
                            </table>
                        </form>
                        </div>
                    </div>
                </div>
        </div>
         <div class="row">
        <div class="col-lg-12 f-right">
           <!--  <?= $pagingLink ?> -->
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
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
       yearRange: "-90:+00"
    });
  } );
  </script>