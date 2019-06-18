<?php
include_once("../include/settings.php");
include_once("../include/functions.php");
$user = new User();

if (!isset($_SESSION['user_id'])) {
   header('location: login.php');
    //exit;
}

/* for edit get edit data */
if (isset($_GET['editid'])) {
    $table = "tbl_players";
    $fields = "*";
    $where = "player_id = '{$_GET['editid']}'";
    $edit_records = $user->select_records($table, $fields, $where);
    $table2 = "tbl_team";
    $adoption_list = $user->select_records($table2, $fields, $where, '1');
    
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



    <div class="row">
        <div class="col-lg-12">
            <h3>View User <a href="manage_teamplayers.php" class="add-new-h2">All Users</a> 
                <a href="javascript:void(0)" class="add-new-h2" style="float:right;margin-right: 11px;text-decoration:none;" onClick="return goBack();">Back</a></h3>

            <div class="bs-docs-example">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered">
                            <tr>
                                <th>First Name</th>
                                <td>  <?php echo ($edit_records[0]['player_first_name'] != "") ? ucwords($edit_records[0]['player_first_name']) : "Not Available"; ?></td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td> <?php echo ($edit_records[0]['player_last_name'] != "") ? ucwords($edit_records[0]['player_last_name']) : "Not Available"; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo ($edit_records[0]['player_email'] != "") ? $edit_records[0]['player_email'] : "Not Available"; ?></td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td><?php echo ($edit_records[0]['player_city'] != "") ? $edit_records[0]['player_city'] : "Not Available"; ?></td>
                            </tr>
                            <tr>
                                <th>State</th>
                                <td><?php echo ($edit_records[0]['player_State'] != "") ? $edit_records[0]['player_state'] : "Not Available"; ?></td>
                            </tr>
                            <tr>
                                <th>Zipcode</th>
                                <td><?php echo ($edit_records[0]['player_zipcode'] != "") ? $edit_records[0]['player_zipcode'] : "Not Available"; ?></td>
                            </tr>
                            <tr>
                                <th>homephone</th>
                                <td><?php echo ($edit_records[0]['player_homephone'] != "") ? $edit_records[0]['player_homephone'] : "Not Available"; ?></td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td><?php echo ($edit_records[0]['player_mobile'] != "") ? $edit_records[0]['player_mobile'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Login ID</th>
                                <td><?php echo ($edit_records[0]['player_login_id'] != "") ? $edit_records[0]['player_login_id'] : "Not Available"; ?></td>
                            </tr>                    
                            <tr>
                                <th>Registered Date</th>
                                <td><?php echo date("F j, Y H:i:s", strtotime($edit_records[0]['registered_date'])) ?></td>
                            </tr>
                        </table>

                        <h3 class="page-header">User Activities</h3>

                        <h4 class="text-primary"><strong></strong></h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 15px;">#</th>
                                    <th>Team</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                               <!--  <?php /*if (isset($adoption_list) && !empty($adoption_list)) {*/ ?>
                                    <?php /*foreach ($adoption_list as $adoption) {*/ ?>
                                        <tr>
                                            <td><?php /*echo $adoption['pet_adoption_id'];*/ ?></td>	
                                            <td><?php /*if($adoption['pet_adoption_photo']!="")*/ ?><img src="<?php /*echo $adoption['pet_adoption_photo'];*/ ?>" class="img-thumbnail" style="margin:10px;width:75px; height: 50px;"></td> 
                                            <td><?php /*echo $adoption['adoption_type'];*/ ?></td>
                                            <td><?php /*echo date("F j, Y h:i A", strtotime($adoption['adoption_date']));*/ ?></td>
                                            <td><a href="view_pet_adoption.php?&editid=<?php /*echo $adoption['pet_adoption_id'];*/ ?>">View Details</a></td>
                                        </tr>
                                    <?php //} ?>
                                <?php// } else { ?> -->
                                    <tr>
                                        <td colspan="5"><p class="text-center">No Records Found</p></td>
                                    </tr>
                               <!--  <?php// } ?> -->
                            </tbody>
                        </table>
                        
                        <hr>
                        
                       <!--  <h4 class="text-primary"><strong>Pet Sale/Buy Section</strong></h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 15px;">#</th>
                                    <th>Pet Photo</th>
                                    <th>Type</th>
                                    <th>Posted Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> -->
                               <!--  <?php if (isset($sale_buy_list) && !empty($sale_buy_list)) { ?>
                                    <?php foreach ($sale_buy_list as $sale_buy) { ?>
                                        <tr>
                                            <td><?php echo $sale_buy['pet_sale_buy_id']; ?></td>	
                                            <td><?php if($sale_buy['image']!="") ?><img src="<?php echo $sale_buy['image']; ?>" class="img-thumbnail" style="margin:10px;width:75px; height: 50px;"></td> 
                                            <td><?php echo $sale_buy['type']; ?></td>
                                            <td><?php echo date("F j, Y h:i A", strtotime($sale_buy['date'])); ?></td>
                                            <td><a href="view_pet_sale_buy.php?&editid=<?php echo $sale_buy['pet_sale_buy_id']; ?>">View Details</a></td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="5"><p class="text-center">No Records Found</p></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        
                        <hr>
                        
                        <h4 class="text-primary"><strong>Pet Report Section</strong></h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 15px;">#</th>
                                    <th>Pet Photo</th>
                                    <th>Type</th>
                                    <th>Posted Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($lost_found_list) && !empty($lost_found_list)) { ?>
                                    <?php foreach ($lost_found_list as $lost_found) { ?>
                                        <tr>
                                            <td><?php echo $lost_found['lost_found_id']; ?></td>	
                                            <td><?php if($lost_found['image']!="") ?><img src="<?php echo $lost_found['image']; ?>" class="img-thumbnail" style="margin:10px;width:75px; height: 50px;"></td> 
                                            <td><?php echo $lost_found['report_type']; ?></td>
                                            <td><?php echo date("F j, Y h:i A", strtotime($lost_found['report_date_time'])); ?></td>
                                            <td><a href="view_pet_report.php?&editid=<?php echo $lost_found['lost_found_id']; ?>">View Details</a></td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="5"><p class="text-center">No Records Found</p></td>
                                    </tr>
                                <?php } ?> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.row -->
</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->
<script type="text/javascript">
    function goBack() {
        window.history.back()
    }
</script>
<?php// include_once("common/footer.php"); ?>