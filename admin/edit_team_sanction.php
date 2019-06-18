<?php
// including the database connection file
include_once("../include/settings.php");

if(isset($_POST['update']))
{
    // print_r($_POST);die;
    $id=$_POST['id'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $asst_manager_first_name=$_POST['asst_manager_first_name'];
    $asst_manager_last_name=$_POST['asst_manager_last_name'];
    $team_name=$_POST['team_name'];
    $team_email=$_POST['team_email'];
    $team_Address=$_POST['team_Address'];
    $team_city=$_POST['team_city'];
    $team_state=$_POST['team_state'];
    $team_zip=$_POST['team_zip'];
    $team_phone=$_POST['team_phone'];
    $team_mobile=$_POST['team_mobile'];
    $team_program=$_POST['team_program'];
    // checking empty fields
    if(empty($first_name) || empty($last_name) || empty($asst_manager_first_name) || empty($asst_manager_last_name) || empty($team_name) || empty($team_email) || empty($team_Address) || empty($team_city) || empty($team_state) || empty($team_zip) || empty($team_phone) || empty($team_mobile) || empty($team_program))  {
        if(empty($first_name)) {
            echo "<font color='red'>First Name field is empty.</font><br/>";
        }
        if(empty($last_name)) {
            echo "<font color='red'>Last Name field is empty.</font><br/>";
        }if(empty($asst_manager_first_name)) {
            echo "<font color='red'>Assistant Manager First Name field is empty.</font><br/>";
        }if(empty($asst_manager_last_name)) {
            echo "<font color='red'>Assistant Manager Last Name field is empty.</font><br/>";
        }if(empty($team_name)) {
            echo "<font color='red'>Team Name field is empty.</font><br/>";
        }if(empty($team_email)) {
            echo "<font color='red'>Team Email field is empty.</font><br/>";
        }if(empty($team_Address)) {
            echo "<font color='red'>Team Address field is empty.</font><br/>";
        }
        if(empty($team_city)) {
            echo "<font color='red'>Team City field is empty.</font><br/>";
        }

        if(empty($team_state)) {
            echo "<font color='red'>Team State field is empty.</font><br/>";
        }

        if(empty($team_zip)) {
            echo "<font color='red'>Team Zip field is empty.</font><br/>";
        }
        if(empty($team_phone)) {
            echo "<font color='red'>Team Phone field is empty.</font><br/>";
        }
        if(empty($team_mobile)) {
            echo "<font color='red'>Team Mobile field is empty.</font><br/>";
        }
        if(empty($team_program)) {
            echo "<font color='red'>Team Program field is empty.</font><br/>";
        }
    } else {

        //updating the table
        $result = mysqli_query($con, "UPDATE team_sanction SET first_name = '$first_name', last_name = '$last_name', asst_manager_first_name = '$asst_manager_first_name', asst_manager_last_name = '$asst_manager_last_name', team_name = '$team_name', team_email = '$team_email', team_Address = '$team_Address' , team_city = '$team_city' , team_state = '$team_state', team_zip = '$team_zip', team_phone = '$team_phone', team_mobile = '$team_mobile', team_program = '$team_program' WHERE id=$id");

        //redirectig to the display page. In our case, it is index.php
        header("Location: display_team_sanction.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM team_sanction WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $id = $res['id'];
    $first_name=$res['first_name'];
    $last_name=$res['last_name'];
    $asst_manager_first_name=$res['asst_manager_first_name'];
    $asst_manager_last_name=$res['asst_manager_last_name'];
    $team_name=$res['team_name'];
    $team_email=$res['team_email'];
    $team_Address=$res['team_Address'];
    $team_city=$res['team_city'];
    $team_state=$res['team_state'];
    $team_zip=$res['team_zip'];
    $team_phone=$res['team_phone'];
    $team_mobile=$res['team_mobile'];
    $team_program=$res['team_program'];
}
?>

<?php  $page_name=basename($_SERVER['PHP_SELF']);?>
<?php include_once("../common/header.php"); ?>

<div id="page-wrapper">
<div class="edit-team">
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
            <form name="form1" method="post" action="edit_team_sanction.php?id=<?php echo $_GET['id'];?>">
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                        <label for="fname">First Name </label>
                        <input type="text" name="first_name" class="form-control" value="<?php echo $first_name;?>">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                   <div class="form-group control-group">
                       <label for="lname">Last Name</label>
                       <input type="text" name="last_name" class="form-control" value="<?php echo $last_name;?>">
                   </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                        <label for="manager-first">Assistant Manager First Name</label>
                       <input type="text" name="asst_manager_first_name" class="form-control" value="<?php echo $asst_manager_first_name;?>">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                        <label for="manager-last">Assistant Manager Last Name</label>
                       <input type="text" name="asst_manager_last_name" class="form-control" value="<?php echo $asst_manager_last_name;?>">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                       <label for="team-name">Team Name</label>
                       <input type="text" name="team_name" class="form-control" value="<?php echo $team_name;?>">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                       <label for="team-email">Team Email</label>
                       <input type="text" name="team_email" class="form-control" value="<?php echo $team_email;?>">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                       <label for="team-address">Team Address</label>
                       <input type="text" name="team_Address" class="form-control" value="<?php echo $team_Address;?>">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                       <label for="team-city">Team City</label>
                       <input type="text" name="team_city" class="form-control" value="<?php echo $team_city;?>">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                       <label for="team-state">Team State</label>
                       <select name="team_state" class="form-control"  id="state">
                          <option value="<?php echo $team_state;?>"><?php echo $team_state;?> </option>
                         <?php

                         $sql1 = "SELECT * FROM `states` WHERE 1";
                       $result=mysqli_query($con,$sql1);
                         while($row=mysqli_fetch_assoc($result)){ ?>
                         <option value="<?=$row['name']?>"><?=$row['name']?></option>
                         <?php } ?>
                       </select>
                       <!-- <input type="text" name="team_state" class="form-control" value="<?php //echo $team_state;?>"> -->
                    </div>
                </div>


                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                       <label for="team-zip">Team Zip</label>
                       <input type="text" name="team_zip" class="form-control" value="<?php echo $team_zip;?>">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                       <label for="team-phone">Team Phone</label>
                       <input type="text" name="team_phone" class="form-control" value="<?php echo $team_phone;?>">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                       <label for="team-mobile">Team Mobile</label>
                       <input type="text" name="team_mobile" class="form-control" value="<?php echo $team_mobile;?>">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                       <label for="team-program">Team Program</label>
                       <input type="text" name="team_program" class="form-control" value="<?php echo $team_program;?>">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 text-center">
                    <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                    <input type="submit" class="btn btn-primary btn-search" name="update" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>
</div>
