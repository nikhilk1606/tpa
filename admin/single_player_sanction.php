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

    $program=$_POST['program'];

    // checking empty fields

    if(empty($first_name) || empty($last_name) || empty($email) || empty($address) || empty($city) || empty($state) || empty($zipcode) || empty($home) || empty($mobile) || empty($program))  {

        if(empty($first_name)) {

            echo "<font color='red'>First Name field is empty.</font><br/>";

        }

        if(empty($last_name)) {

            echo "<font color='red'>Last Name field is empty.</font><br/>";

        }if(empty($email)) {

            echo "<font color='red'>Email field is empty.</font><br/>";

        }if(empty($address)) {

            echo "<font color='red'>Address field is empty.</font><br/>";

        }if(empty($city)) {

            echo "<font color='red'>City field is empty.</font><br/>";

        }if(empty($state)) {

            echo "<font color='red'>State field is empty.</font><br/>";

        }if(empty($zipcode)) {

            echo "<font color='red'>Zip Code field is empty.</font><br/>";

        }

        if(empty($home)) {

            echo "<font color='red'>Home field is empty.</font><br/>";

        }



        if(empty($mobile)) {

            echo "<font color='red'>Mobile field is empty.</font><br/>";

        }

        if(empty($program)) {

            echo "<font color='red'>Program field is empty.</font><br/>";

        }

    } else {

        //updating the table

        $result = mysqli_query($con, "UPDATE player_sanction SET first_name='$first_name', last_name = '$last_name', email = '$email', address = '$address', city = '$city', state = '$state', zipcode = '$zipcode', home = '$home', mobile = '$mobile' , program = '$program' WHERE id=$id");



        //redirectig to the display page. In our case, it is index.php

        header("Location: display_player_sanction.php");

    }

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

    $player_id=$res['player_id'];

    $address=$res['address'];

    $city=$res['city'];

    $state=$res['state'];

    $zipcode=$res['zipcode'];

    $home=$res['home'];

    $mobile=$res['mobile'];

    // $division=$res['division'];

    $class=$res['class'];

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

            <!-- <form name="form1"> -->

                <div class="col-xs-12 col-sm-4">

                    <div class="form-group control-group">

                        <label>First Name</label>

                        <input type="text" name="first_name" class="form-control" value="<?php echo $first_name;?>" readonly>

                    </div>

                </div>

                <div class="col-xs-12 col-sm-4">

                    <div class="form-group control-group">

                        <label>Last Name</label>

                        <input type="text" name="last_name" class="form-control" value="<?php echo $last_name;?>" readonly>

                    </div>

                </div>

                <div class="col-xs-12 col-sm-4">

                    <div class="form-group control-group">

                        <label>Email</label>

                        <input type="text" name="email" class="form-control" value="<?php echo $email;?>" readonly>

                    </div>

                </div>

                <div class="col-xs-12 col-sm-4">

                    <div class="form-group control-group">

                        <label>Player Number</label>

                        <input type="text" name="address" class="form-control" value="<?php echo $player_id;?>" readonly>

                    </div>

                </div>

                <div class="col-xs-12 col-sm-4">

                    <div class="form-group control-group">

                        <label>Address</label>

                        <input type="text" name="address" class="form-control" value="<?php echo $address;?>" readonly>

                    </div>

                </div>

                <div class="col-xs-12 col-sm-4">

                    <div class="form-group control-group">

                        <label>City</label>

                        <input type="text" name="city" class="form-control" value="<?php echo $city;?>" readonly>

                    </div>

                </div>

                <div class="col-xs-12 col-sm-4">

                    <div class="form-group control-group">

                        <label>State</label>

                        <input type="text" name="state" class="form-control" value="<?php echo $state;?>" readonly>

                    </div>

                </div>

                <div class="col-xs-12 col-sm-4">

                    <div class="form-group control-group">

                        <label>Zip Code</label>

                        <input type="text" name="zipcode" class="form-control" value="<?php echo $zipcode;?>" readonly>

                    </div>

                </div>

                <div class="col-xs-12 col-sm-4">

                    <div class="form-group control-group">

                        <label>Home</label>

                        <input type="text" name="home" class="form-control" value="<?php echo $home;?>" readonly>

                    </div>

                </div>

                <div class="col-xs-12 col-sm-4">

                    <div class="form-group control-group">

                        <label>Mobile</label>

                        <input type="text" name="mobile" class="form-control" value="<?php echo $mobile;?>" readonly>

                    </div>

                </div>

                <!-- <div class="col-xs-12 col-sm-4">

                    <div class="form-group control-group">

                        <label>Division</label>

                        <input type="text" name="program" class="form-control" value="<?php //echo $division;?>" readonly>

                    </div>

                </div> -->

                <div class="col-xs-12 col-sm-4">

                    <div class="form-group control-group">

                        <label>Class</label>

                        <input type="text" name="program" class="form-control" value="<?php echo $class;?>" readonly>

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 text-center">



                    <a href="display_player_sanction.php" class="btn btn-primary btn-search">View Players</a>

                    <!-- <input type="submit" class="btn btn-primary send-btn" name="update" value="Update"> -->

                </div>

            <!-- </form> -->

        </div>

    </div>

</div>
</div>

<?php include_once("common/footer.php"); ?>

