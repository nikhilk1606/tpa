<?php
session_start();
include_once("../include/settings.php");
include_once("../include/functions.php");
$user = new User();
error_reporting(0);
extract($_POST);
    if(!isset($_SESSION['sd_id'])) {
   header('location: state_director_login.php'); exit;
  }
  $sd_id=$_SESSION['sd_id'];
if (isset($_POST['submit'])) {

    $roster_name = $_POST['r-name'];
	$team_name = $_POST['t-name'];
	$sanctionid = $_POST['sanction-id'];
	$division = $_POST['division'];
	$class = $_POST['class'];
    /*$check = "SELECT sanction_id FROM rosters WHERE sanction_id = '$sanctionid'";
    $sql2 = mysqli_query($con,$check);
    $res = mysqli_fetch_assoc($sql2);*/



	// if(empty($roster_name) || empty($team_name) || empty($sanctionid) || empty($division) || empty($class)){
    if(empty($roster_name) || empty($division) || empty($class)){
		if(empty($roster_name)) {
            echo "<font color='red'>Roster Name field is empty.</font><br/>";
        }
        if(empty($team_name)) {
            echo "<font color='red'>Team Name field is empty.</font><br/>";
        }
        if(empty($class)) {
            echo "<font color='red'>Class cannot be empty.</font><br/>";
        }

      $_SESSION['error']='Please enter all the details.';
      // header('Location : roster-add.php');exit;
	}

    /*if (isset($res)>0) {
       $_SESSION['error']='Please provide another sanction id.';
        }*/
        $sql="INSERT INTO `rosters`(`sd_id`,`roster_name`,`division`, `class`) VALUES ('$sd_id','$roster_name','$division','$class')";
		 $result=mysqli_query($con,$sql);
		$_SESSION['success']='Rosters added successfully.';
}
?>

<?php include_once("common/head.php");?>


<section class="roster-add">
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <?php include_once("common/profile_section.php"); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-2">
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <?php include_once("common/left_sidebar.php"); ?>
            </div>
        </div>

        <div class="col-xs-12 col-sm-10">
            <?php
            if (isset($_SESSION['error'])) { ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button>
                        <?= $_SESSION['error'] ?>
                    <?php unset($_SESSION['error']); ?>
                    </div>
                <?php } ?>
                <?php
            if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button>
                        <?= $_SESSION['success'] ?>
                    <?php unset($_SESSION['success']); ?>
                    </div>
                <?php }
                unset($_SESSION['success']);
           unset($_SESSION['error']); ?>
            <h3 class="text-center">Roster Add</h3>
            <form method="post">
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                        <label>Roster Name</label>
                        <input name="r-name" type="text" id="r-name" class="form-control pd-b-10">
                    </div>
                </div>
               <!--  <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                        <label>Team Name</label>
                        <input name="t-name" type="text" id="t-name" class="form-control pd-b-10">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                        <label>Sanction Id</label>
                        <input name="sanction-id" type="text" id="sanction-id" class="form-control pd-b-10">
                    </div>
                </div> -->

                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                        <label>Division</label>
                        <!--<input name="division" type="text" id="division" class="form-control pd-b-10">-->
                        <select name="division" id=division class="form-control" class="form-control pd-b-10" required>
                            <option selected="selected" value="">Division</option>
                            <option value="men">Men</option>
                            <option value="women">Women</option>
                            <option value="coed">COED</option>
                            <option value="35+">35+</option>
                            <option value="county">County/Community</option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                        <label>Class</label>
                        <!-- <input name="class" type="text" id="class" class="form-control pd-b-10">-->
                        <select name="class" id="class" class="form-control" class="form-control pd-b-10" required>
                            <option selected="selected" value="">Class</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="Rec">Rec</option>
                            <option value="upper">UPPER</option>
                            <option value="lower">LOWER</option>
                        </select>
                    </div>
                </div>
                <!-- <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                        <label>Capacity</label>
                        <input name="capacity" type="text" id="capacity" class="form-control pd-b-10">
                    </div>
                </div> -->

                <div class="col-xs-12 col-sm-12 text-center">
                    <button type="submit" name="submit" class="btn btn-primary search-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script type="text/javascript" src="js/wow.js"></script>
<?php include "common/foot.php"; ?>
