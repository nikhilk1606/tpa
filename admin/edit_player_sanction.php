<?php
// including the database connection file
include_once("../include/settings.php");

if(isset($_POST['update']))
{
    $id=$_POST['id'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zipcode=$_POST['zipcode'];
    $home=$_POST['home'];
    $mobile=$_POST['mobile'];
    $class=$_POST['class'];
    $dob       =  date('Y-m-d',strtotime($_POST['date']));
    // checking empty fields
    // if(empty($first_name) || empty($last_name) || empty($email) || empty($address) || empty($city) || empty($state) || empty($zipcode) || empty($home) || empty($mobile) || empty($program) ||empty($dob) ) {
    //     if(empty($first_name)) {
    //         echo "<font color='red'>First Name field is empty.</font><br/>";
    //     }
    //     if(empty($last_name)) {
    //         echo "<font color='red'>Last Name field is empty.</font><br/>";
    //     }if(empty($email)) {
    //         echo "<font color='red'>Email field is empty.</font><br/>";
    //     }if(empty($address)) {
    //         echo "<font color='red'>Address field is empty.</font><br/>";
    //     }if(empty($city)) {
    //         echo "<font color='red'>City field is empty.</font><br/>";
    //     }if(empty($state)) {
    //         echo "<font color='red'>State field is empty.</font><br/>";
    //     }if(empty($zipcode)) {
    //         echo "<font color='red'>Zip Code field is empty.</font><br/>";
    //     }
    //     if(empty($home)) {
    //         echo "<font color='red'>Home field is empty.</font><br/>";
    //     }

    //     if(empty($mobile)) {
    //         echo "<font color='red'>Mobile field is empty.</font><br/>";
    //     }
    //     if(empty($class)) {
    //         echo "<font color='red'>Class field is empty.</font><br/>";
    //     }
    //     if(empty($dob)){
    //         echo"<font color='red'>Date of Birth is empty.</font><br/> ";
    //     }
    // } else {
        //updating the table
       $result = mysqli_query($con, "UPDATE `player_sanction` SET `first_name`='$first_name', `last_name` = '$last_name', `email` = '$email', `address` = '$address', `city` = '$city', `state` = '$state', `zipcode` = '$zipcode', `home` = '$home', `mobile` = '$mobile' , `class` = '$class',`dob`='$dob' WHERE `id`=$id");

        //redirectig to the display page. In our case, it is index.php
        header("Location: display_player_sanction.php");
    
}
?>
<?php
//getting id from url
$id=$_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM player_sanction WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $id=$res['id'];
    $first_name=$res['first_name'];
    $last_name=$res['last_name'];
    $email=$res['email'];
    $address=$res['address'];
    $city=$res['city'];
    $state=$res['state'];
    $zipcode=$res['zipcode'];
    $home=$res['home'];
    $mobile=$res['mobile'];
    $class=$res['class'];
    $Dob=$res['dob'];
    $division=$res['division'];
}
?>

<?php  $page_name=basename($_SERVER['PHP_SELF']);?>
<?php include_once("../common/header.php"); ?>

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

        <div class="col-xs-12 col-sm-10">
            <form name="form1" class="box-border" method="post" action="edit_player_sanction.php?id=<?php echo $_GET['id'];?>">
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" value="<?php echo $first_name;?>">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="<?php echo $last_name;?>">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $email;?>">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="<?php echo $address;?>">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                        <label>City</label>
                        <input type="text" name="city" class="form-control" value="<?php echo $city;?>">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                        <label>State</label>
                        <input type="text" name="state" class="form-control" value="<?php echo $state;?>">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                        <label>Zip Code</label>
                        <input type="text" name="zipcode" class="form-control" value="<?php echo $zipcode;?>">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                        <label>Home</label>
                        <input type="text" name="home" class="form-control" value="<?php echo $home;?>">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group control-group">
                        <label>Mobile</label>
                        <input type="text" name="mobile" class="form-control" value="<?php echo $mobile;?>">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">


                    <div class="form-group control-group">

                      <label>class <span>*</span></label>

                      <select name="class" id="class" class="form-control">

                        <option value="">Select Class</option>

                       <option value=" A"> A</option>

                       <option value=" B"> B</option>

                       <option value=" C"> C</option>

                       <option value=" D"> D</option>

                       <option value=" E"> E</option>

                      </select>

                  

                  </div>
                </div>
                <div class="col-sm-4">
              <div class="form-group control-group">
                <label>Date of Birth <span>*</span></label>
                <input type="text" name="date" id="datepicker" class="form-control"value="<?=$Dob?>" placeholder="Date of Birth" readonly>
              </div>
            </div>
                <div class="col-xs-12 col-sm-12 text-center">
                    <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                    <input type="submit" class="btn btn-primary btn-search send-btn" name="update" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "-90:+00"
    });
  } );
  </script>