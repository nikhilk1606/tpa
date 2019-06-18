<?php
session_start();
include_once("include/settings.php");
if(isset($_POST['submitbtn'])){

$fname    =   $_POST['fname'];
$lname    =   $_POST['lname'];
$email    =   $_POST['email'];
$address  =   $_POST['address'];
$city     =   $_POST['city'];
$state    =   $_POST['state'];
$zip      =   $_POST['zip'];
$home     =   $_POST['home'];
$mobile   =   $_POST['mobile'];
$nsa      =   $_POST['nsa'];
$loginid  =   $_POST['loginid'];
$password =   $_POST['password'];
$cpassword =  $_POST['cpassword'];
$class     =  $_POST['class'];
$division  =  $_POST['division'];
$dob       =  date('Y-m-d',strtotime($_POST['date'])); 
$payment=25;
$_SESSION['payment']=$payment;
$_SESSION['fname']    =   $_POST['fname'];
$_SESSION['lname']    =   $_POST['lname'];
$_SESSION['email']    =   $_POST['email'];
$_SESSION['address']  =   $_POST['address'];
$_SESSION['city']     =   $_POST['city'];
$_SESSION['state']    =   $_POST['state'];
$_SESSION['zip']      =   $_POST['zip'];
$_SESSION['home']     =   $_POST['home'];
$_SESSION['mobile']   =   $_POST['mobile'];
$_SESSION['class']   =   $_POST['class'];
$_SESSION['division']   =   $_POST['division'];
$_SESSION['password'] =   $_POST['password'];
$_SESSION['loginid'] =   $_POST['loginid'];
$_SESSION['cpassword']=   $_POST['cpassword'];
$_SESSION['submitbtn']= $_POST['submitbtn'];


// $checkid = "SELECT player_id from sanction_player WHERE state = '$state'";
      $sql3 = "SELECT * FROM `states` WHERE `id`=$state";
      $result3=mysqli_query($con,$sql3);
      $row3=mysqli_fetch_array($result3);
      $state1=$row3['name'];
       $abbr=$row3['abbr'];
       $a=substr($abbr, 0, 1);
       $b=substr($abbr, -1, 1);
       $first = strtoupper(substr($fname, 0,1));
       $last = strtoupper(substr($lname, 0,1));

        $sql = "SELECT * FROM player_sanction WHERE player_id LIKE '$first$last%_%_%_%_%_%$abbr' ";
        $checksql = mysqli_query($con, $sql);
        $row_count = mysqli_num_rows($checksql);
        $count = $row_count + 1;
        $c = str_pad($count, 5, '0', STR_PAD_LEFT);
         $player_id = $first.$last.$c.$abbr;

            $sql2 = "INSERT INTO `player_sanction`(`first_name`, `last_name`, `email`, `address`, `city`, `state`, `zipcode`, `home`, `mobile`, `class`, `division`, `login_id`, `password`,`player_id`,`dob`) VALUES ('$fname','$lname','$email','$address','$city','$state1','$zip','$home','$mobile','$class','$division','$loginid','$password','$player_id','$dob')";
            $result1=mysqli_query($con,$sql2);

  //$to="mike111taylor@gmail.com";
  $to = $_POST['email'];
  $subject  = "New  Registration";
  $message    = "";
  $message    = '';
  $message   .= '<table border="1" width="100%" cellpadding="10">';
  $message   .= "<tr><td colspan='2' style='background-color:rgba(81, 39, 101, 0.3);'><center><b>Registration Details</b></center></td></tr>";
  $message   .= "<tr><td width='30%'><b>Name :</b> </td><td>". $fname."</td></tr>";
  $message   .= "<tr><td width='30%'><b>Last Name :</b> </td><td>". $lname."</td></tr>";
  $message   .= "<tr><td><b>Email :</b> </td><td>". $email ."</td></tr>";
  $message   .= "<tr><td><b> Player ID:</b> </td><td>". $player_id ."</td></tr>";
  $message   .= "<tr><td><b>Phone Number :</b> </td><td>". $home ."</td></tr>";
  $message   .= "<tr><td><b>Mobile Number :</b> </td><td>". $mobile ."</td></tr>";
  $message   .= "<tr><td><b>State :</b> </td><td>". $state1 ."</td></tr>";
  $message   .= "<tr><td><b>City :</b> </td><td>". $city ."</td></tr>";
  $message   .= "<tr><td><b> LoginID:</b> </td><td>". $loginid ."</td></tr>";
  $message   .= "<tr><td><b> Class:</b> </td><td>". $class ."</td></tr>";
  $message   .= "<tr><td><b>Details: </td><td>".$fname . " ". $lname. " ". "thank you for registering as a player with TPA. Your player number is ".$player_id." ". "This will be your player number forever with TPA. To be place on a roster, please give your player number to your teams manager so he/she can add you to the teams roster</td></b></tr>";
  $message   .= "</table>";
  $message   .= "";
  $headers    = 'MIME-Version: 1.0' . "\r\n";
  $headers   .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers   .= "From: TPA The Players Association.<$email>" . "\r\n";
  $headers   .= "X-Priority: 3\r\n";
  $headers   .= "X-Mailer: PHP". phpversion() ."\r\n";
  // echo $message;
  $respond=mail($to,$subject,$message,$headers);
  if($respond)
  {
      if($result1){

      $_SESSION['success']="Your registration has been successfully completed. You have been login Now with your login id and password.";
      header('location:player_login.php');
      exit;
    }

    }else
    {
      $_SESSION['error']="Your registration has been failed. Please try again. ";
      header('location:player_login.php');
      exit;
    }
  }
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Player Sanction | The Players Association</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />

    <!-- Bootstrap Css Start -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
  <!-- Bootstrap Css End -->

    <!-- Custom Css Start -->
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/media.css">
        <link rel="stylesheet" href="css/font-awesome.css"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
  <!-- Custom Css End -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    </head>
<body>

<?php  $page_name=basename($_SERVER['PHP_SELF']);?>
<?php
if(isset($_SESSION['id'])){
  include "header2.php";
}
else
{ include "header.php";
} ?>
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/media.css">
        <link rel="stylesheet" href="css/font-awesome.css"/>


<section class="regsiter-form">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 dualwindow_left">
        <h3 class="text-center">Player Sanction Page</h3>
        <form method="post" name="cform" id="cform"role="form" class="playform">
          <div class="row ">

             <div class="col-sm-4">
              <div class="form-group control-group">
                <label>Player First Name <span>*</span></label>
                <input type="text" name="fname" id="fname" class="form-control" placeholder="Player First Name">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group control-group">
                <label>Player Last Name <span>*</span></label>
                <input type="text" name="lname" id="lname" class="form-control" placeholder="Player Last Name">
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group control-group">
                <label>Email Address <span>*</span></label>
                <input type="email" name="email" id="email"class="form-control" placeholder="Email Address">
                <div id="txtHint"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group control-group">
                <label>Address <span>*</span></label>
                <input type="text" name="address"id="address"class="form-control" placeholder="Address">
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group control-group">
              <label>city <span>*</span></label>
                <input type="text-center" name="city" id="city" class="form-control" placeholder="City">
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group control-group">
                  <label>State <span>*</span></label>
                  <select name="state" class="form-control"  id="state">
                     <option value="">Select State </option>
                    <?php

                    $sql1 = "SELECT * FROM `states` WHERE 1";
                  $result=mysqli_query($con,$sql1);
                    while($row=mysqli_fetch_assoc($result)){ ?>
                    <option value="<?=$row['id']?>"><?=$row['name']?></option>
                    <?php } ?>
                  </select>
              </div>
            </div>
         </div>

         <div class="row">
            <div class="col-sm-4">
              <div class="form-group control-group">
              <label>Zip Code <span>*</span></label>
                <input type="Number" name="zip" id="zip" class="form-control" placeholder="Zip Code" minlength="5" maxlength="5">
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group control-group">
                <label>home phone <span>*</span></label>
                <input type="Number" name="home" id="home"class="form-control" placeholder="Home Phone" >
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group control-group">
                <label>Mobile Number <span>*</span></label>
                <input type="Number" name="mobile" id=mobile class="form-control" placeholder="Mobile Number" minlength="10" maxlength="10">
              </div>
            </div>
            </div>
             <div class="row">
            <div class="col-sm-4">
              <div class="form-group control-group">
                <label>class <span>*</span></label>
                <select name="class" id="class" class="form-control">
                  <option value="">Select Class</option>
                 <option value="A"> A</option>
                 <option value="B"> B</option>
                 <option value="C"> C</option>
                 <option value="D"> D</option>
                 <option value="E"> E</option>
                </select>
            </div>
            </div>

           <!--  <div class="col-sm-4">
              <div class="form-group control-group">
                <label>Division <span>*</span></label>
                <select name="division" id="division" class="form-control">
                      <option selected="selected" value="">Division</option>
                      <option value="men">Men</option>
                      <option value="women">Women</option>
                      <option value="coed">COED</option>
                      <option value="35+">35+</option>
                      <option value="county">County/Community</option>
                </select>
              </div>
            </div> -->


            <div class="col-sm-4">
              <div class="form-group control-group">
              <label>LoginID <span>*</span></label>
                <input type="text" name="loginid" id="loginid" class="form-control" placeholder="Login id" >
                <div id="txtHint1"></div>
              </div>
            </div>



            <div class="col-sm-4">
              <div class="form-group control-group">
                <label>password <span>*</span></label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group control-group">
                <label>Confirm Password <span>*</span></label>
                <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password">
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group control-group">
                <label>Date of Birth <span>*</span></label>
                <input type="text" name="date" id="datepicker" class="form-control" placeholder="Date of Birth" readonly>
              </div>
            </div>

          </div>


            <div class="col-sm-12 text-center">
              <button class="btn btn-primary register-btn" type="submit" name="submitbtn" value="submit" onclick="return PasswordValidate()" />Register</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>


 <?php include "footer.php"; ?>
<!-- Home Slider Js Start -->

  <script type="text/javascript">$('#carouselHacked').carousel();</script>
  <script type="text/javascript" src="js/wow.js"></script>
    <script type="text/javascript">
    new WOW().init();
    $(document).ready(function() {
      jQuery.fn.carousel.Constructor.TRANSITION_DURATION = 90000
    });
    </script>
<!-- Home Slider Js End -->

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        $("#cform").validate({
            rules: {
                fname : {required : true},
                lname : {required : true},
                email : {required : true, email : true},
                home : {required : true},
                mobile : {required : true},
                class:{required:true},
                division:{required:true},
                address : {required : true},
                city : {required : true},
                zip : {required : true},
                state : {required : true},
                loginid : {required : true},
                password : {required : true, minlength :7},
                cpassword : {required : true, equalTo: "#password"},
                date: {required:true}
            },
            highlight: function (element) {
                $(element).closest('.cform').removeClass('success').addClass('error');
            },
            messages: {
              fname : {required : "Please enter First name."},
                lname : {required : "Please enter Last name."},
                email : {required: "Please enter Email Address.",
                    email: "Please enter valid Email Address."},
                home : {required : "Please enter phone number"},
                mobile : {required : "Please enter mobile number"},
                address : {required : "Please enter Address."},
                city : {required :"Please enter city"},
                zip : {required : "Please enter zipcode"},
                state : {required : "Please choose state"},
                loginid : {required : "Please enter Login ID"},
                class:{required:"Please select class"},
                division:{required:"Please select division"},

                password : {required : "Please enter Password", minlength :"Password should contain atleast 7 alphanumeric character."},
                cpassword : {required : "Please enter Confirm Password.", equalTo: "Password & Confirm password should be matched."},
                date:{required:"Please Select Date of Birth."}

            }
        });

    });

</script>
<script type="text/javascript">
    function PasswordValidate() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("cpassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>
<script type="text/javascript">
  function ValidateEmail(email)
      {

       if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(cform.email.value))
        {
          return (true)
        }
          alert("You have entered an invalid email address!")
          $('#email').val('');
      }
</script>
<script type="text/javascript">
// This is for email already exist or not
  $(document).ready(function() {
    $("#email").blur(function(event){
       var  email=$(this).val();
       $.post(
          'check_play.php',
          { hps_level:email},
          function(data) {
            //alert(data);
            if(data==1 )
            {
              $("#email").focus();
              $("#txtHint").html("<span class='notavail'>Already exist please use another </span>");
            }
           /* else
            {
             $('#txtHint').html("<span class='avail'>Available.</span>");
            }*/
          }
       );
    });
 });
</script>
<script type="text/javascript">
// This is for email already exist or not
  $(document).ready(function() {
    $("#loginid").blur(function(event){
       var  loginid=$(this).val();
       $.post(
          'play_login.php',
          { hps_level:loginid},
          function(data) {
            //alert(data);
            if(data==1 )
            {
              $("#loginid").focus();
              $("#txtHint1").html("<span class='notavail'>Already exist please use another.</span>");
            }
            else
            {
             $('#txtHint1').html("<span class='avail'>Available.</span>");
            }
          }
       );
    });
 });
</script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "-90:+00"
    });
  } );
  </script>