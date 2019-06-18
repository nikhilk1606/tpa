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
  if(isset($_POST['tour_submit'])){
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
      $_SESSION['success']="Tournament details has been added successfully.";
    }
}
?>
<?php include_once("common/head.php");?>

      </nav>
<!-- Collect the nav links, forms, and other content for toggling -->
<!DOCTYPE html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
</head>
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


        <div class="col-xs-12 col-sm-10">
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
            <h3 class="text-center">Tournament Add</h3>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"name="cform" id="cform">
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
                    <select name="season" id=season class="form-control">
                            <option selected="selected" value="">Season</option>
                            <option value="Jan,Feb,March Season">Jan,Feb,March Season</option>
                            <option value="April,May,June Season">April,May,June Season</option>
                            <option value="Jully,August,September Season">Jully,August,September Season</option>
                            <option value="Octomber,November,December Season">Octomber,November,December Season</option>

                        </select>
                    <!-- <input name="season" type="text" id="season" class="form-control">  -->
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
                    <select name="state" class="form-control"  id="state">
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
                <button input type="submit" name="tour_submit" class="btn btn-primary search-btn">Submit</button>
            </div>
        </div>
    </div>
</div>

<?php include ("common/foot.php"); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.js"></script>

<script>
    $(document).ready(function () {
        $("#cform").validate({
            rules: {
                age_group : {required : true},
                age : {required : true},
                season : {required : true},
                city : {required : true},
                state : {required : true},
                txtstartdate:{required:true},
                txtenddate:{required:true},
                txtdate : {required : true},
                division : {required : true},
                program : {required : true},
                class : {required : true},
                tournament_type : {required : true},
                tournament_name : {required : true},
                game_format : {required : true},
                open_signup : {required : true},
                must_qualify : {required : true},
                fee : {required : true},
                field_count : {required : true},
                max_teams : {required : true},
                berth : {required : true},
                berth_count : {required : true},
                prepay: {required:true},
                phone_no: {required:true},
                email : {required : true, email : true}
            },
            highlight: function (element) {
                $(element).closest('.cform').removeClass('success').addClass('error');
            },
            messages: {
              age_group : {required : "Please Enter Age Group."},
                age : {required : "Please Enter Age."},
                
                season : {required : "Please Select Season"},
                city : {required :"Please Enter City"},
                 state : {required : "Please Choose State"},
               
                txtstartdate : {required : "Please Select Start Date."},
                
                txtenddate : {required : "Please Select End Date"},
               
                txtdate : {required : "Please Select Last Date"},
                class:{required:"Please select class"},
                division:{required:"Please select division"},

                program : {required : "Please Enter Program."},
               tournament_type : {required : "Please Enter Tournament Type."},
               tournament_name : {required : "Please Enter Tournament Name."},
               game_format : {required : "Please Enter Game Format."},
               open_signup : {required : "Please Enter Open Signup."},
               must_qualify : {required : "Please Enter Must Qualify."},
               fee : {required : "Please Enter Fee."},
               field_count : {required : "Please Enter field_count."},
               max_teams : {required : "Please Enter Max Teams."},
               berth : {required : "Please Enter Berth."},
               berth_count : {required : "Please Enter berth_count."},
               prepay : {required : "Please Enter PrePay Req'd."},
                phone_no : {required : "Please Enter Mobile Number"},
                email : {required: "Please Enter Email Address.",
                    email: "Please Enter Valid Email Address."}
            }
        });

    });

</script>
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
