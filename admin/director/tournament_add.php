<?php
include_once("../../include/settings.php");
include_once("../../include/functions.php");
$user = new User();
error_reporting(0);
extract($_POST);
    if(!isset($_SESSION['user_id'])) { 
   header('location: login.php'); exit;
  }
$age_group=$_POST['age_group'];
$age=$_POST['age'];
$season=$_POST['season'];
$state=$_POST['state'];
$division=$_POST['division'];
$class=$_POST['class'];
$s_date=date("Y-m-d",strtotime($_POST['txtstartdate']));
$e_date=date("Y-m-d",strtotime($_POST['txtenddate']));
$l_date=date("Y-m-d",strtotime($_POST['txtdate']));
$program=$_POST['program'];
$tournament_type=$_POST['tournament_type'];
$game_format=$_POST['game_format'];
$open_signup=$_POST['open_signup'];
$must_qualify=$_POST['must_qualify'];
$fee=$_POST['fee'];
$field_count=$_POST['field_count'];
$max_teams=$_POST['max_teams'];
$berth=$_POST['berth'];
$berth_count=$_POST['berth_count'];
$prepay=$_POST['prepay'];
$park_name=$_POST['park_name'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$directions=$_POST['directions'];
$lighted_fields=$_POST['lighted_fields'];
$comments=$_POST['comments'];
$rules=$_POST['rules'];
$tournament_name=$_POST['tournament_name'];
$phone_no=$_POST['phone_no'];
$city=$_POST['city'];
$email=$_POST['email'];
$sql3 = "SELECT * FROM `states` WHERE `id`=$state";
  
  $result3=mysqli_query($con,$sql3);
   $row3=mysqli_fetch_array($result3);
       $state1=$row3['name'];

 $sql1="INSERT INTO `add_tournament_details`( `age_group`, `season`, `city`, `state`, `division`, `class`, `start_date`, `end_date`, `tournament_type`, `tournament_name`, `program`, `age`, `game_format`, `open_signup`, `must_qualify`, `fee`, `field_count`, `max_teams`, `berth`, `berth_count`, `pre_pay_req`, `last_date`, `director_phone`, `director_email`, `park_name`, `address`, `phone`, `directions`, `lighted_fields`, `comments`, `rules`) VALUES  
 	('$age_group','$season','$city','$state1','$division','$class','$s_date','$e_date','$tournament_type','$tournament_name','$program','$age','$game_format','$open_signup','$must_qualify','$fee','$field_count','$max_teams','$berth','$berth_count','$prepay','$l_date','$phone_no','$email','$park_name','$address','$phone','$directions','$lighted_fields','$comments','$rules')";
 	
	$result2=mysqli_query($con,$sql1);
	if($result2){
		$_SESSION['success']="details has been added successfully.";

	}
?>
<?php include_once("common/header.php");?>

      </nav>
<!-- Collect the nav links, forms, and other content for toggling -->
<!DOCTYPE html>
<div id="page-wrapper">
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

<?php
 if(isset($_SESSION['message']) && $_SESSION['flag']==0)
           {
             ?>
             <div class="alert alert-danger">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <?php echo $_SESSION['message']; ?>
             </div>
             <?php
           }
           else if(isset($_SESSION['message']) && $_SESSION['flag']==1)
           {
             ?>
               <div class="alert alert-success text-center">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <?php echo $_SESSION['message']; ?>
               </div>
               <?php
           }
      
           unset($_SESSION['message']);
           unset($_SESSION['flag']);
         ?>

        <div class="col-xs-12 col-sm-10">
            <h3 class="text-center">Tournament Add</h3>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
		               	<label>Age Group</label>
		               	<input name="age_group" type="text" id="age_group" class="form-control"> 
		            </div>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>Age</label>
	               		<input name="age" type="text" id="age" class="form-control"> 
	               	</div>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>Season</label>
	               		<select name="season" id=season class="form-control" required>
                            <option selected="selected" value="">Season</option>
                            <option value="Jan,Feb,March Season">Jan,Feb,March Season</option>
                            <option value="April,May,June Season">April,May,June Season</option>
                            <option value="July,August,September Season">July,August,September Season</option>
                            <option value="October,November,December Season">October,November,December Season</option>
                           
                        </select> 
	               	</div>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>City</label>
	               		<input name="city" type="text" id="city" class="form-control"> 
	               	</div>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
                		<label>State/Region</label>
		                <select name="state" class="form-control" required  id="state"required>
		                     <?php 
		                     $sql1 = "SELECT * FROM `states` WHERE `country_id`=231";
		                    $result=mysqli_query($con,$sql1);
		                      while($row=mysqli_fetch_assoc($result)){?>
		                        <option value="<?=$row['id']?>"><?=$row['name']?></option> 
		                    <?php } ?> 
		                </select>
		            </div>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>Start Date</label>
	               		<input name="txtstartdate" type="text" id="txtstartdate" class="form-control"readonly> 
	               	</div>
	            </div>


	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>End Date</label>
	               		<input name="txtenddate" type="text" id="txtenddate" class="form-control"readonly> 
	               	</div>
	            </div> 

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>Last Date To Enter</label>
	               		<input name="txtdate" type="text" id="txtdate" class="form-control"readonly> 
	               	</div>
	            </div> 

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>Division</label>
	               		<!-- <input name="division" type="text" id="division" class="form-control">  -->
	               		<select name="division" id=division class="form-control">
                            <option selected="selected" value="division">Division</option>
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
		               	<label>Program</label>
		               	<input name="program" type="text" id="program" class="form-control"> 
		            </div>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>Class</label>
	               		<!-- <input name="class" type="text" id="class" class="form-control">  -->
	               		<select name="class" id="class" class="form-control">
                            <option selected="selected" value="class">Class</option>
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

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>Tournament Type</label>
	               		<input name="tournament_type" type="text" id="tournament_type" class="form-control"> 
	               	</div>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>Tournament name</label>
	               		<input name="tournament_name" type="text" id="tournament_name" class="form-control"> 
	               	</div>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>Game Format</label>
	               		<input name="game_format" type="text" id="game_format" class="form-control"> 
	               	</div>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>Open Signup</label>
	               		<input name="open_signup" type="text" id="open_signup" class="form-control"> 
	               	</div>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>Must Qualify</label>
	               		<input name="must_qualify" type="text" id="must_qualify" class="form-control"> 
	               	</div>
	            </div>
            
	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>Fee</label>
	               		<input name="fee" type="text" id="fee" class="form-control"> 
	               	</div>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>Field Count</label>
	               		<input name="field_count" type="text" id="field_count" class="form-control">
	               	</div>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>Max. Teams</label>
	               		<input name="max_teams" type="text" id="max_teams" class="form-control"> 
	               	</div>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>Berth</label>
	               		<input name="berth" type="text" id="berth" class="form-control"> 
	               	</div>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>Berth Count</label>
	               		<input name="berth_count" type="text" id="berth_count" class="form-control"> 
	               	</div>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>PrePay Req'd</label>
	               		<input name="prepay" type="text" id="prepay" class="form-control"> 
	               	</div>
	            </div>


	            <div class="col-xs-12 col-sm-12">
	            	<h3 class="text-center">Director Contact</h3>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	            		<label>Phone</label>
	            		<input name="phone_no" type="text" id="phone_no" class="form-control">
	            	</div>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	            		<label>Email</label>
	            		<input name="email" type="email" id="email" class="form-control">
	            	</div>
	            </div>


	            <div class="col-xs-12 col-sm-12">
           			<h3 class="text-center">Park Details/Location</h3>
           		</div>

            <div class="col-xs-12 col-sm-4">
            	<div class="form-group control-group">
               		<label>Park  Name</label>
               		<input name="park_name" type="text" id="park_name" class="form-control"> 
               	</div>
            </div>
            <div class="col-xs-12 col-sm-4">
            	<div class="form-group control-group">
               		<label>Address</label>
               		<input name="address" type="text" id="address" class="form-control"> 
               	</div>
            </div>
            <div class="col-xs-12 col-sm-4">
            	<div class="form-group control-group">
               		<label>Phone</label>
               		<input name="phone" type="text" id="phone" class="form-control"> 
               	</div>
            </div>
            <div class="col-xs-12 col-sm-4">
            	<div class="form-group control-group">
               		<label>Directions</label>
               		<input name="directions" type="text" id="directions" class="form-control"> 
               	</div>
            </div>
            <div class="col-xs-12 col-sm-4">
            	<div class="form-group control-group">
               		<label>Lighted Fields</label>
               		<input name="lighted_fields" type="text" id="lighted_fields" class="form-control"> 
               	</div>
            </div>
            <div class="col-xs-12 col-sm-4">
            	<div class="form-group control-group">
               		<label>Comments</label>
               		<input name="comments" type="text" id="comments" class="form-control"> 
               	</div>
            </div>

            <div class="col-xs-12 col-sm-4">
            	<div class="form-group control-group">
               		<label>Rules</label>
               		<input name="rules" type="text" id="rules" class="form-control"> 
               	</div>
            </div>

    
            <div class="col-xs-12 col-sm-12">
                <button class="btn btn-primary search-btn">Submit</button>
            </div>
        </div>
    </div>
</div>

<?php include ("footer.php"); ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript">
 $("#txtstartdate").datepicker({
  minDate: 0,
  onSelect: function(date) {
    //alert("123");
    $("#txtenddate").datepicker('option', 'minDate', date);
  }
});

$("#txtenddate").datepicker({});
$("#txtdate").datepicker({});

</script>
</body>
</html>
