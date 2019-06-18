<?php
session_start();
include_once("../include/settings.php");
include_once("../include/functions.php");

if(isset($_POST['sub'])){
$mfname    =   $_POST['mfname'];
$mlname    =   $_POST['mlname'];
$email    =   $_POST['email'];
$address  =   $_POST['address'];
$city     =   $_POST['city'];
$state    =   $_POST['state'];
$zip      =   $_POST['zip'];
$home     =   $_POST['home'];
$mobile   =   $_POST['mobile'];
$loginid  =   $_POST['loginid'];
$password =   $_POST['password'];
$cpassword =  $_POST['cpassword'];
$st=1;
$_SESSION['mfname']    =   $_POST['mfname'];
$_SESSION['mlname']    =   $_POST['mlname'];
$_SESSION['email']    =   $_POST['email'];
$_SESSION['address']  =   $_POST['address'];
$_SESSION['city']     =   $_POST['city'];
$_SESSION['state']    =   $_POST['state'];
$_SESSION['zip']      =   $_POST['zip'];
$_SESSION['home']     =   $_POST['home'];
$_SESSION['mobile']   =   $_POST['mobile'];
$_SESSION['password'] =   $_POST['password'];
$_SESSION['loginid'] =   $_POST['loginid'];
$_SESSION['cpassword']=   $_POST['cpassword'];
$_SESSION['submitbtn']=$_POST['submitbtn'];
      $sql3 = "SELECT * FROM `states` WHERE `id`=$state";
      $result3=mysqli_query($con,$sql3);
      $row3=mysqli_fetch_array($result3);
      $state1=$row3['name'];
        
            $sql2 = "INSERT INTO `state_director`(`first_name`, `last_name`, `email`, `address`, `city`, `state`, `zip`, `home`, `mobile`, `login_id`, `password`,`status`) VALUES ('$mfname','$mlname','$email','$address','$city','$state1','$zip','$home','$mobile','$loginid','$password','$st')";
            // echo $sql2;die;
            $result1=mysqli_query($con,$sql2);
          
  //$to="mike111taylor@gmail.com";
  $to = $_POST['email'];
  $subject  = "New State Director Registration";
  $message    = "";
  $message    = '';  
  $message   .= '<table border="1" width="100%" cellpadding="10">';
  $message   .= "<tr><td colspan='2' style='background-color:rgba(81, 39, 101, 0.3);'><center><b>Registration Details</b></center></td></tr>";
  $message   .= "<tr><td width='30%'><b>Name :</b> </td><td>". $mfname."</td></tr>";
  $message   .= "<tr><td width='30%'><b>Last Name :</b> </td><td>". $mlname."</td></tr>";
  $message   .= "<tr><td><b>Email :</b> </td><td>". $email ."</td></tr>";
  $message   .= "<tr><td><b>Phone Number :</b> </td><td>". $home ."</td></tr>";
  $message   .= "<tr><td><b>Mobile Number :</b> </td><td>". $mobile ."</td></tr>";
  $message   .= "<tr><td><b>State :</b> </td><td>". $state1 ."</td></tr>";
  $message   .= "<tr><td><b>City :</b> </td><td>". $city ."</td></tr>";
  $message   .= "<tr><td><b> LoginID:</b> </td><td>". $loginid ."</td></tr>";
  $message   .= "<tr><td><b> Class:</b> </td><td>". $class ."</td></tr>";
  $message   .= "<tr><td><b> Division:</b> </td><td>". $division ."</td></tr>";
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
      header('location:state_director_login.php');
      exit;
    }
      
    }else
    {
      $_SESSION['error']="Your registration has been failed. Please try again. ";
      header('location:state_director_registration.php');
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
        <title>State Director Registration | The Players Association</title>
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
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Custom Css End -->
    </head>
<body>

<?php  $page_name=basename($_SERVER['PHP_SELF']);?>
<?php 
if(isset($_SESSION['id'])){
  include "common/header2.php";
}
else
{ include "common/header.php";
} ?>


<div class="adult-1">
  <div class="container"> 
    <div class="row dualwindow_left">
      <div class="col-sm-12">
        <form method="post" id="cform">
         <h3 class="text-center p-b-10">State Director Registration</h3>
             
            <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>State Director First Name <span>*</span></label>
                <input type="text" name="mfname" id="mfname" class="form-control" placeholder="Manager First Name" >
              </div>
            </div>  
              
            <div class="col-sm-6">
              <div class="form-group">
                <label>State Director Last Name <span>*</span></label>
                <input type="text" name="mlname" id="mlname" class="form-control" placeholder="Manager Last Name" >
              </div>
            </div> 
          </div>
                     
            <div class="row">         
            <div class="col-sm-6">
              <div class="form-group">
                <label>Email Address <span>*</span></label>
                <input type="email" name="email" id="email"class="form-control" placeholder="Email Address">
                <div id="txtHint"></div>
              </div>
            </div>
                             
            <div class="col-sm-6">
              <div class="form-group">
                <label>Address <span>*</span></label>
                <input type="text" name="address"id="address"class="form-control" placeholder="Address" >
              </div>
            </div>
          </div>

            <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
              <label>city <span>*</span></label>                    
                <input type="text-center" name="city" id="city" class="form-control" placeholder="City" >
              </div>
            </div>

            <div class="col-sm-6">  
              <div class="form-group">
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
            <div class="col-sm-6">
              <div class="form-group">
              <label>Zip Code <span>*</span></label>                    
                <input type="Number" name="zip" id="zip" class="form-control" placeholder="Zip Code" min="0" minlength="5" maxlength="5" >
              </div>
            </div> 

            <div class="col-sm-6">
              <div class="form-group">
                <label>home phone <span>*</span></label>
                <input type="Number" name="home" id="home" class="form-control" placeholder="Home Phone">
              </div>
            </div> 
          </div>

            <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Mobile Number <span>*</span></label>
                <input type="Number" name="mobile" id=mobile class="form-control" placeholder="Mobile Number"  minlength="10" maxlength="10">
              </div>
            </div>  
          
            <div class="col-sm-6">
              <div class="form-group">
              <label>LoginID <span>*</span></label>                    
                <input type="text" name="loginid" id="loginid" class="form-control" placeholder="Login id" >
                <div id="txtHint1"></div>
              </div>
            </div>
          </div>

            <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>password <span>*</span></label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label>Confirm Password <span>*</span></label>
                <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password" >
              </div>
            </div>
          </div>
            
            
              <div class="col-sm-12 text-center p-b-10">
                <button class="btn btn-primary register-btn" name="sub" value="submit" />Register</button>
              </div> 
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
 



<?php include ("common/footer.php"); ?>
<!-- Home Slider Js Start -->
    <!-- <script src="jquery-1.9.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">$('#carouselHacked').carousel();</script>
    <script type="text/javascript" src="js/wow.js"></script>
    <script type="text/javascript">
        new WOW().init();
        $(document).ready(function() {
            jQuery.fn.carousel.Constructor.TRANSITION_DURATION = 90000
        });
    </script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<!-- Home Slider Js End -->

 <script type="text/javascript">
        $("#cform").validate({
            errorClass: "error", //Defines error class as 'error'
            errorElement: "div",
            ignore: ".ignore",
            rules: 
            {
                mfname : {required : true},
                mlname : {required : true},
                email : {required : true, email : true},
                home : {required : true,minlength:10,maxlength:12},
                mobile : {required : true,minlength:10,maxlength:12},               
                address : {required : true},
                city : {required : true},
                zip : {required : true},
                state : {required : true},
                loginid : {required : true},
                password : {required : true, minlength :7},
                cpassword : {required : true, equalTo: "#password"}               
            },
            messages : {
                mfname : {required : "Please enter first name."},
                mlname : {required : "Please enter last name."},
                email : {required : "Please enter email id.", email : "please enter valid email."},
                home : {required : "Please enter phone no."},
                mobile:{required: "please enter mobile no"},
                address : {required : "Please enter address."},
                city : {required : "Please enter city."},
                zipcode : {required : "Please enter zipcode."},
                state : {required : "Please choose state."},
                loginid:{required:"Please enter loginid"},
                password : {required : "Please enter password.", minlength :"Password should contain atleast 7 alphanumeric character."},
                cpassword : {required : "Please enter confirm password.", equalTo: "Password & Confirm password should be matched."}          
            },
            errorPlacement:function(error,element)
            {
                if(element.attr("name")=="agree")
                {
                    error.insertAfter($("#pperror"));
                }
                else
                {
                    error.insertAfter(element);
                }
            }
        });
        </script>
 <script type="text/javascript">
// This is for email already exist or not
  $(document).ready(function() {          
    $("#email").blur(function(event){
       var  email=$(this).val();     
       $.post( 
          'check_state.php',
          { hps_level:email},                  
          function(data) {
            //alert(data);
            if(data==1 )
            {
              $("#email").focus();
              $("#txtHint").html("<span class='notavail'>Already exist please use another </span>");
            }
            else
            {
             $('#txtHint').html("<span class='avail'>Available.</span>"); 
            }
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
          'check_state_login.php',
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
      
        
        
