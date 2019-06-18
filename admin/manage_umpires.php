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
    $del = $user->delet_record($table, "id", $id, "1");
    if ($del) {
        $_SESSION['success'] = "You successfully deleted record.";
        header("location: manage_umpires.php");
        exit;
    }
}
?>
<?php include_once("../common/header.php"); ?>
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
            <h3>All Team Players List <span><a href="add_teams.php" class="add-new-h2">Add New</a></span> </h3>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($user_list) {
                                if (isset($_GET['page'])) {
                                    $pns = $_GET['page'] - $i;
                                }
                                foreach ($user_list as $single_user)
                                 {
                                    ?>
                                    <tr>
                                        <td>
                                            <center><input name="checkbox[]" class="case" type="checkbox" id="checkbox[]" value="<?php echo $single_user['team_id']; ?>" /></center>
                                        </td>
                                        <td>
                                            <?php if (isset($_GET['page']))
                                                echo $i + $rowsPerPage * $pns;
                                            else if ($siteroot)
                                                echo $i;
                                            ?> 
                                        </td>
                                       
                                            <?php 
                                             
                                             $sql1= "SELECT * FORM `umpire_sanction`";
                                             $result1=mysqli_query($con,$sql1);
                                            while($row=mysqli_fetch_assoc($result1)) { 
                                            $fname= $row['first_name'];
                                            $lname=  $row['last_name'];
                                            $email= $row['email'];
                                            $city = $row['city'];
                                            $state= $row['state'];
                                            $mobile=$row['mobile'];
                                            $login_id=$row['login_id'];

                                        
                                        echo"<td>".$row['id']."</td>";
                                        echo"<td>".$fname."</td>";
                                        echo"<td>".$lname."</td>";
                                        echo"<td>".$email."</td>";                            
                                        echo"<td>".$city."</td>";
                                        echo"<td>".$state."</td>";
                                        echo"<td>".$mobile."</td>";
                                        echo"<td>".$login_id."</td>";
                                        
                                        }

                                        ?>
                                        
                                        <td>
                                            <a href="#add_teamplayers.php?editid=<?php echo $single_user['user_id'] ?>">
                                                <img src="images/edit.png" width="16" height="16"  title="Edit" />
                                            </a>
                                            <a onclick="return checkDel()" href="#manage_teamplayers.php?action=delete&&deleteid=<?php echo $single_user['user_id'] ?>">
                                                <img src="images/delete.png" width="16" height="16"  title="Delete" />
                                            </a>

                                            <a href="#view_teamplayers.php?&editid=<?php echo $single_user['user_id'] ?>">
                                                <img src="images/view.png" width="16" height="16"  title="View" />
                                            </a>
                                        </td>
                                    </tr>
                                <?php $i++; 
                            } ?>
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
    </div> 

    <div class="row">
        <div class="col-sm-10 col-sm-offset-2">
            <?= $pagingLink ?>
        </div>
    </div> 
</div>    
<?php// include_once("common/footer.php"); ?>