<?php
session_start();
include_once("../include/settings.php");
include_once("../include/functions.php");
$user = new User();

if (!isset($_SESSION['id'])) {
    header('location: admin_login.php');
    exit;
}

/* for edit get edit data */
if (isset($_GET['id'])) {
    $t_id=$_GET['id'];
    $sql="SELECT * FROM `add_tournament_details` WHERE `tournament_id`='$t_id'";
    $res=mysqli_query($con,$sql);
    $edit_records=mysqli_fetch_array($res);
    
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
        <div class="col-lg-10 col-sm-offset-2">
            <h4>View Tournament <a href="view_tournament.php" class="add-new-h2">All Tournament</a> 
                <a href="javascript:void(0)" class="add-new-h2" style="float:right;margin-right: 11px;text-decoration:none;" onClick="return goBack();">Back</a></h4>
            <!-- <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <h4>View Tournament</h4>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <a href="view_tournament.php" class="add-new-h2">All Tournament</a>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <a href="javascript:void(0)" class="add-new-h2" style="float:right;margin-right: 11px;text-decoration:none;" onClick="return goBack();">Back</a>
                </div>
            </div> -->

            <div class="bs-docs-example">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered">
                            <tr>
                                <th>Tournament Name</th>
                                <td>  <?php echo ($edit_records['tournament_name'] != "") ? ucwords($edit_records['tournament_name']) : "Not Available"; ?></td>
                            </tr>
                            <tr>
                                <th>Tournament Type</th>
                                <td> <?php echo ($edit_records['tournament_type'] != "") ? ucwords($edit_records['tournament_type']) : "Not Available"; ?></td>
                            </tr>
                            <tr>
                                <th>Age Group</th>
                                <td><?php echo ($edit_records['age_group'] != "") ? $edit_records['age_group'] : "Not Available"; ?></td>
                            </tr>
                            <tr>
                                <th>Season</th>
                                <td><?php echo ($edit_records['season'] != "") ? $edit_records['season'] : "Not Available"; ?></td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td><?php echo ($edit_records['city'] != "") ? $edit_records['city'] : "Not Available"; ?></td>
                            </tr>
                            <tr>
                                <th>State</th>
                                <td><?php echo ($edit_records['state'] != "") ? $edit_records['state'] : "Not Available"; ?></td>
                            </tr>
                            <tr>
                                <th>Division</th>
                                <td><?php echo ($edit_records['divison'] != "") ? $edit_records['divison'] : "Not Available"; ?></td>
                            </tr>
                            <tr>
                                <th>Class</th>
                                <td><?php echo ($edit_records['class'] != "") ? $edit_records['class'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Start Date</th>
                                <td><?php echo ($edit_records['start_date'] != "") ? $edit_records['start_date'] : "Not Available"; ?></td>
                            </tr>                    
                            <tr>
                                <th>End Date</th>
                                <td><?php echo ($edit_records['end_date'] != "") ? $edit_records['end_date'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Program</th>
                                <td><?php echo ($edit_records['program'] != "") ? $edit_records['program'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Age</th>
                                <td><?php echo ($edit_records['age'] != "") ? $edit_records['age'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Game Format</th>
                                <td><?php echo ($edit_records['game_format'] != "") ? $edit_records['game_format'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Open Signup</th>
                                <td><?php echo ($edit_records['open_signup'] != "") ? $edit_records['open_signup'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Must Qualify</th>
                                <td><?php echo ($edit_records['must_qulify'] != "") ? $edit_records['must_qulify'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Fee</th>
                                <td><?php echo ($edit_records['fee'] != "") ? $edit_records['fee'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Field Count</th>
                                <td><?php echo ($edit_records['field_count'] != "") ? $edit_records['field_count'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Max Teams</th>
                                <td><?php echo ($edit_records['max_teams'] != "") ? $edit_records['max_teams'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Berth</th>
                                <td><?php echo ($edit_records['berth'] != "") ? $edit_records['berth'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Berth Count</th>
                                <td><?php echo ($edit_records['berth_count'] != "") ? $edit_records['berth_count'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Pre Pay Req</th>
                                <td><?php echo ($edit_records['pre_pay_req'] != "") ? $edit_records['pre_pay_req'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Last Date</th>
                                <td><?php echo ($edit_records['last_date'] != "") ? $edit_records['last_date'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Director Phone</th>
                                <td><?php echo ($edit_records['director_phone'] != "") ? $edit_records['director_phone'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Director Email</th>
                                <td><?php echo ($edit_records['director_email'] != "") ? $edit_records['director_email'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Park Name</th>
                                <td><?php echo ($edit_records['park_name'] != "") ? $edit_records['park_name'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Address</th>
                                <td><?php echo ($edit_records['address'] != "") ? $edit_records['address'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Phone</th>
                                <td><?php echo ($edit_records['phone'] != "") ? $edit_records['phone'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Directions</th>
                                <td><?php echo ($edit_records['directions'] != "") ? $edit_records['directions'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Lighted Fields</th>
                                <td><?php echo ($edit_records['lighted_fields'] != "") ? $edit_records['lighted_fields'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Comments</th>
                                <td><?php echo ($edit_records['comments'] != "") ? $edit_records['comments'] : "Not Available"; ?></td>
                            </tr>

                            <tr>
                                <th>Rules</th>
                                <td><?php echo ($edit_records['rules'] != "") ? $edit_records['rules'] : "Not Available"; ?></td>
                            </tr>
                        </table>

                        
                    
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
