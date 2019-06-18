<?php
include_once("../../include/settings.php");
include_once("../../include/functions.php");

$user = new User();
error_reporting(0);
if (!isset($_SESSION['user_id'])) {
    //header('location: login.php');
    exit;
}
$admin_ids = $_SESSION['user_id'];
extract($_POST);
$table = " tbl_players";
$rowsPerPage = 10;
$sql = "SELECT * from tbl_user order by user_id desc";
$limtQry = $user->getPagingQuery($sql, $rowsPerPage); /* for pagination */
$pagingLink = $user->getPagingLink($sql, $rowsPerPage, "manage_teamplayers.php");
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
            <h3>All Team Players List<a href="add_teamplayers.php" class="add-new-h2">Add New</a></h3>
            <div class="table-responsive">
                <form name="frm_admin_users" id="frm_admin_users" action="delete_teamplayers.php" method="post">
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
                                <th>Zipcode</th>
                                <th>HomePhone</th>
                                <th>Mobile</th>
                                <th>Login ID</th>
                                <th>Registered On</th>
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
                                            <center><input name="checkbox[]" class="case" type="checkbox" id="checkbox[]" value="<?php echo $single_user['user_id']; ?>" /></center>
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
                                             $post1="select player_id from tbl_players where player_id=".$single_user['user_id'];       
                                              $postquery=mysql_query($post1);
                                             echo $counpost=mysql_num_rows($postquery);
                                               // $postStmt = $db->prepare($post1);
                                               // $postStmt   ->  execute(); 
                                               // echo $ccc=$postStmt->rowCount(); //fetchColumn();
                                              //$Userpost   = $postStmt1   ->  fetchAll(PDO::FETCH_ASSOC);  
                                             
                                            ?>
                                            
                                        </td>	
                                        <td><?php echo ($single_user['first_name']!="")?ucwords($single_user['first_name']):"Not Available"; ?></td>
                                         <td><?php echo ($single_user['last_name']!="")?ucwords($single_user['last_name']):"Not Available"; ?></td>
                                        <td><?php echo ($single_user['player_email']!="")?$single_user['player_email']:"Not Available"; ?></td>
                                        <td><?php echo ($single_user['player_city']!="")?$single_user['player_city']:"Not Available"; ?></td>
                                         <td><?php echo ($single_user['player_state']!="")?ucwords($single_user['player_state']):"Not Available"; ?></td>
                                          <td><?php echo ($single_user['player_zipcode']!="")?ucwords($single_user['player_zipcode']):"Not Available"; ?></td>
                                           <td><?php echo ($single_user['player_homephone']!="")?ucwords($single_user['player_homephone']):"Not Available"; ?></td>
                                            <td><?php echo ($single_user['player_mobile']!="")?ucwords($single_user['player_mobile']):"Not Available"; ?></td>
                                             <td><?php echo ($single_user['player_login_id']!="")?ucwords($single_user['first_name']):"Not Available"; ?></td>
                                        <td><?php echo ($single_user['player_login_id']!="")?date("F j, Y h:i A", strtotime($single_user['registered_date'])):"Not Available"; ?></td>
                                        <td>
                                            <a href="add_teamplayers.php?editid=<?php echo $single_user['user_id'] ?>">
                                                <img src="images/edit.png" width="16" height="16"  title="Edit" />
                                            </a>
                                            <a onclick="return checkDel()" href="manage_teamplayers.php?action=delete&&deleteid=<?php echo $single_user['user_id'] ?>">
                                                <img src="images/delete.png" width="16" height="16"  title="Delete" />
                                            </a>

                                            <a href="view_teamplayers.php?&editid=<?php echo $single_user['user_id'] ?>">
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
    </div><!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <?= $pagingLink ?>
        </div>
    </div>

</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->   
<?php// include_once("common/footer.php"); ?>