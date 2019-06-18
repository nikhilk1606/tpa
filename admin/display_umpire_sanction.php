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
// fetch code
$table = "umpire_sanction";
$rowsPerPage = 10;
$sql = "SELECT * from umpire_sanction order by id desc";
$limtQry = $user->getPagingQuery($sql, $rowsPerPage); /* for pagination */
$pagingLink = $user->getPagingLink($sql, $rowsPerPage, "display_umpire_sanction.php");
$user_list = $user->getRows($limtQry);
$i = 1;
if (isset($_GET['action']) == "delete" && $_GET['deleteid'] != "") {

    $id = $_GET['deleteid'];
    $query="UPDATE `umpire_sanction` SET `del_status`='1' WHERE `id`='$id'";
    $del=mysqli_query($con,$sql);
    // $del = $user->delet_record($table, "id", $id, "1");
    if ($del) {
        $_SESSION['success'] = "You successfully deleted record.";
        echo "<script type='text/javascript'>window.location.href = 'display_umpire_sanction.php';</script>";
       // header("location: manage_users.php");
        exit;
    }
}
$sql = "SELECT * from umpire_sanction where del_status='0' order by id desc";
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
                <div class="col-sm-10 box-border">
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
                    <h3 class="text-center"> Manage Umpire Sanction </h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                                    <th>#</th>
                                    <th>SR NO.</th>
                                    <th>Umpire First Name</th>
                                    <th>Umpire Last Name</th>
                                    <th class="text-center">Email Address</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Umpire ID</th>
                                    <?php
                            if ($user_list) {
                                if (isset($_GET['page'])) {
                                    $pns = $_GET['page'] - $i;
                                }
                                ?>
                                    <th colspan="3" class="text-center">Functions</th>
                                    <?php while($row = mysqli_fetch_assoc($result)) {?>
                                    <tr>
                                        <td>
                                           
                                        </td><td>
                                        <?php if (isset($_GET['page']))
                                                echo $i + $rowsPerPage * $pns;
                                            else if ($siteroot)
                                                echo $i;
                                            ?> 
                                        </td>
                                        <!-- <td><?=$row['id'] ?></td> -->
                                        <td><?=$row['first_name'] ?></td>
                                        <td><?=$row['last_name'] ?></td>
                                        <td><?=$row['email'] ?></td>
                                        <td><?=$row['address'] ?></td>
                                        <td><?=$row['city'] ?></td>
                                        <td><?=$row['state'] ?></td>
                                        <!-- <td><?=$row['zip'] ?></td>
                                        <td><?=$row['home'] ?></td>
                                        <td><?=$row['mobile'] ?></td>
                                        <td><?=$row['login_id'] ?></td>
                                        <td><?=$row['payment'] ?></td>
                                        <td><?=$row['txn_id'] ?></td> -->
                                        <td><?=$row['umpire_id'] ?></td>
                                        <td>
                                        <a href="edit_umpire_sanction.php?id=<?php echo $row["id"]; ?>"><!-- <button>Edit</button> --> <i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit"></i></a>
                                        <a href="delete_umpire_sanction.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete this record?');"><!-- <button>Delete</button> --><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a></td>
                                        <!-- <td><?=$row['login_id'] ?></td> -->
                                    </tr> <?php
                             $i++; } 
                             } else { ?>
                            <tr><td colspan="9">No Records Found</td></tr>
                        <?php } ?>
                        <?php if (count($user_list) > 0) { ?>
                            <!-- <tfoot>
                           <th colspan="9">
                                <input type="submit" id="btn_delete_all" name="btn_delete_all" class="btn btn-danger" onClick="return deleteConfirm();"  value="Delete Selected">
                            </th>
                            </tfoot> -->
                        <?php } ?>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 f-right">
                                <?= $pagingLink ?>
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
    $(document).ready(function () {
        $("#frm_testimonials").validate({
            rules: {
                email: {required: true,
                    email: true
                },
                password: {required: true}
            },
            highlight: function (element) {
                $(element).closest('.frm_testimonials').removeClass('success').addClass('error');
            },
            messages: {
                email: {
                    required: "Please enter Email Address.",
                    email: "Please enter valid Email Address."
                },
                password: {
                    required: "Please enter the Password."
                }
            }
        });

    });

</script>
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