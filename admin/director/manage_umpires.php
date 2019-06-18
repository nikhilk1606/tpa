<?php
include_once("../include/settings.php");
include_once("../include/functions.php");

$user = new User();
error_reporting(0);
if (!isset($_SESSION['user_id'])) {
    //header('location: login.php');
    exit;
}
$admin_ids = $_SESSION['user_id'];
extract($_POST);
$table = " umpire_sanction";
$rowsPerPage = 10;
$sql = "SELECT * from umpire_sanction order by id desc";
$limtQry = $user->getPagingQuery($sql, $rowsPerPage); /* for pagination */
$pagingLink = $user->getPagingLink($sql, $rowsPerPage, "manage_umpires.php");
$user_list = $user->getRows($limtQry);
$i = 1;
if (isset($_GET['action']) == "delete" && $_GET['deleteid'] != "") {

    $id = $_GET['deleteid'];
    $del = $user->delet_record($table, "user_id", $id, "1");
    if ($del) {
        $_SESSION['success'] = "You successfully deleted record.";
        header("location: manage_teamplayers.php");
        exit;
    }
}
?>
<?php include_once("../common/header.php"); ?>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <?php include_once("../common/left_sidebar.php"); ?>
    <?php include_once("../common/profile_section.php"); ?>
</div><!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">
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
        <div class="col-lg-12">
            <h3>All Umpires List <span><a href="add_umpires.php" class="add-new-h2">Add New</a></span> </h3>
            <div class="table-responsive">
                <form name="frm_admin_users" id="frm_admin_users" action="delete_umpires.php" method="post">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width:50px;" >

                                </th>
                                <th>#</th>
                               
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Mobile</th>
                                <th>Login ID</th>
                                <!-- <th>Registered On</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($user_list) {
                                if (isset($_GET['page'])) {
                                    $pns = $_GET['page'] - $i;
                                }
                                
                                    ?>
                                    <tr>
                                        <td>
                                            <center><input name="checkbox[]" class="case" type="checkbox" id="checkbox[]" value="" /></center>
                                        </td>
                                        <td>
                                            <?php if (isset($_GET['page']))
                                                echo $i + $rowsPerPage * $pns;
                                            else if ($siteroot)
                                                echo $i;
                                            ?> 
                                        </td>
                                        <td>
                                         <?php

                                        $sql1= "SELECT * FORM `umpire_sanction`";
                                        $result1=mysqli_query($con,$sql1);
                                        if (mysqli_num_rows($result1) > 0) {
                                        while($row=mysqli_fetch_assoc($result1)) { 
        
                                         echo"<td>".$row['id']."</td>";
                                        echo"<td>".$row['first_name']."</td>";
                                        echo"<td>".$row['last_name']."</td>";
                                        echo"<td>".$row['email']."</td>";                            
                                        echo"<td>".$row['city']."</td>";
                                        echo"<td>".$row['state']."</td>";
                                        echo"<td>".$row['mobile']."</td>";
                                        echo"<td>".$row['login_id']."</td>";
                                        
                                        }
                                    }

                                        ?>
                                            
                                            <a href="add_umpires.php?editid=<?php echo $row['id'] ?>">
                                                <img src="../images/edit.png" width="16" height="16"  title="Edit" />
                                            </a>
                                            <a onclick="return checkDel()" href="manage_umpires.php?action=delete&&deleteid=<?php echo $row['id'] ?>">
                                                <img src="../images/delete.png" width="16" height="16"  title="Delete" />
                                            </a>

                                            <a href="view_umpire.php?&editid=<?php echo $row['id'] ?>">
                                                <img src="../images/view.png" width="16" height="16"  title="View" />
                                            </a>
                                        </td>
                                    </tr>
                                <?php $i++; 
                             ?>
                        </tbody>

                        <?php } else { ?>
                            <tr><td colspan="7">No Records Found</td></tr>
                        <?php } ?>
                        <?php if (count($user_list) > 0) { ?>
                            <tfoot>
                            <th colspan="7">
                                <input type="submit" id="btn_delete_all" name="btn_delete_all" class="btn btn-danger" onClick="return deleteConfirm();"  value="Delete Selected">
                            </th>
                            </tfoot>
                        <?php } ?>
                    </table>
                </form>
            </div>
        </div>
    </div><!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <?= $pagingLink ?>
        </div>
    </div>

</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->   
