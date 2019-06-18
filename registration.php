<?php
session_start();
include_once("include/settings.php");
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
      $sql3 = "SELECT * FROM `states` WHERE `id`=$state";
      $result3=mysqli_query($con,$sql3);
      $row3=mysqli_fetch_array($result3);
      $state1=$row3['name'];
        if(isset($_POST['submit'])) 
        {
          if($password===$cpassword)
          {
            $sql2 = "INSERT INTO `tbl_users`(`first_name`,`last_name`,`email`,`address`,`city`,`state`,`zip`,`home`,`mobile`,`nsa`,`login_id`,`password`) VALUES ('$fname','$lname','$email','$address','$city','$state1','$zip','$home','$mobile','$nsa','$loginid','$password')";
            $result1=mysqli_query($con,$sql2);
          }
        }
  $to="mike111taylor@gmail.com";
  $subject  = "New  Registration";
  $message    = "";
  $message    = '';  
  $message   .= '<table border="1" width="100%" cellpadding="10">';
  $message   .= "<tr><td colspan='2' style='background-color:rgba(81, 39, 101, 0.3);'><center><b>Registration Details</b></center></td></tr>";
  $message   .= "<tr><td width='30%'><b>Name :</b> </td><td>". $fname."</td></tr>";
  $message   .= "<tr><td width='30%'><b>Last Name :</b> </td><td>". $lname."</td></tr>";
  $message   .= "<tr><td><b>Email :</b> </td><td>". $email ."</td></tr>";
  $message   .= "<tr><td><b>Phone Number :</b> </td><td>". $home ."</td></tr>";
  $message   .= "<tr><td><b>Mobile Number :</b> </td><td>". $mobile ."</td></tr>";
  $message   .= "<tr><td><b>State :</b> </td><td>". $state1 ."</td></tr>";
  $message   .= "<tr><td><b>City :</b> </td><td>". $city ."</td></tr>";
  $message   .= "<tr><td><b> LoginID:</b> </td><td>". $loginid ."</td></tr>";
  $message   .= "</table>";
  $message   .= ""; 
  $headers    = 'MIME-Version: 1.0' . "\r\n";
  $headers   .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
  $headers   .= "From: TPA The Players Association.<$email>" . "\r\n";
  $headers   .= "X-Priority: 3\r\n";
  $headers   .= "X-Mailer: PHP". phpversion() ."\r\n";
 // echo $message;
  $respond=mail($to,$subject,$message,$headers);
  if($result1)
  {
      $_SESSION['flag'] = 1;
      $_SESSION['message']="Your registration has been successfully completed. Now you can login with your loginID and Password, Thank you.";
      header('location:login.php');
      exit;
    }
   
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Home | The Players Association</title>
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
  <!-- Custom Css End -->
    </head>
<body>

<?php  $page_name=basename($_SERVER['PHP_SELF']);?>
<?php
if(isset($_SESSION['user_id'])){
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
      <div class="col-sm-12">
        <h3 class="text-center">Registration Form</h3>
        <form method="post" action="<?php $_SERVER['PHP_SELF'];?>" id="cform">
          <div class="row dualwindow_left">
            <div class="col-sm-4">
              <div class="form-group">
                <label>First Name <span>*</span></label>
                <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name"pattern="[A-Za-z]{3,}"title="enter at least 3 character"  required>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Last Name <span>*</span></label>
                <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name"pattern="[A-Za-z]{3,}"title="enter at least 3 character" required>
              </div>
            </div>
          
            <div class="col-sm-4">
              <div class="form-group">
                <label>Email Address <span>*</span></label>
                <input type="email" name="email" id="email"class="form-control" placeholder="Email Address" onchange="ValidateEmail(email)" id="email" required>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Address</label>
                <input type="text" name="address"id="address"class="form-control" placeholder="Address"pattern="[A-Za-z]{3,}"title="enter at least 3 character">
              </div>
            </div>
          
            <div class="col-sm-4">
              <div class="form-group">
              <label>city <span>*</span></label>                    
                <input type="text-center" name="city" id="city" class="form-control" placeholder="City" pattern="[A-Za-z]{3,}"title="enter at least 3 character"required>
              </div>
            </div>

            <div class="col-sm-4">  
              <div class="form-group">
                  <label>State <span>*</span></label>
                  <select name="state" class="form-control" required  id="state"required> 
                     <option>Select State </option>
                   <?php 
                   echo $sql1 = "SELECT * FROM `states` WHERE `country_id`=231";
                  $result=mysqli_query($con,$sql1);
                    while($row=mysqli_fetch_assoc($result)){?>
                      <option value="<?=$row['id']?>"><?=$row['name']?></option> 
                    <?php } ?> 
                  </select>
              </div>
            </div>
         
            <div class="col-sm-4">
              <div class="form-group">
              <label>Zip Code <span>*</span></label>                    
                <input type="Number" name="zip" id="zip" class="form-control" placeholder="Zip Code" min="0" minlength="6" maxlength="6" required>
              </div>
            </div>
          
            <div class="col-sm-4">
              <div class="form-group">
                <label>home phone <span>*</span></label>
                <input type="Number" name="home" id="home" class="form-control" placeholder="Home Phone" required minlength="10" maxlength="10">
              </div>
            </div>
          
            <div class="col-sm-4">
              <div class="form-group">
                <label>Mobile Number <span>*</span></label>
                <input type="Number" name="mobile" id=mobile class="form-control" placeholder="Mobile Number" required minlength="10" maxlength="10">
              </div>
            </div>      
            <!-- <div class="col-sm-4">
              <div class="form-group">
                <label>TPA player if any <span>*</span></label>
                <input type="text" name="nsa" id="nsa" class="form-control" placeholder="TPA player" required>
              </div>
            </div> -->
          
            <div class="col-sm-4">
              <div class="form-group">
              <label>LoginID <span>*</span></label>                    
                <input type="text" name="loginid" id="loginid" class="form-control" placeholder="Login id"pattern="[A-Za-z]{2,}"title="enter at least 3 character" required>
              </div>
            </div>
         
            <div class="col-sm-4">
              <div class="form-group">
                <label>password <span>*</span></label>
                <input type="password" name="password"id="password"class="form-control" placeholder="Password" required>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Confirm Password <span>*</span></label>
                <input type="password" name="cpassword"id="cpassword" class="form-control" placeholder="Confirm Password" required>
              </div>
            </div>
           
            <div class="col-sm-12 text-center">
              <button class="btn btn-primary register-btn" name="submit" value="submit">Register</button>
            </div> 
          </div>
        </form>
      </div>
    </div>
  </div>
</section>


 <?php include "footer.php"; ?>
<!-- Home Slider Js Start -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
  <script type="text/javascript">$('#carouselHacked').carousel();</script>
  <script type="text/javascript" src="js/wow.js"></script>
    <script type="text/javascript">
    new WOW().init();
    $(document).ready(function() {
      jQuery.fn.carousel.Constructor.TRANSITION_DURATION = 90000
    });
    </script>
<!-- Home Slider Js End -->        
        <script type="text/javascript">
        $("#cform").validate({
            errorClass: "error", //Defines error class as 'error'
            errorElement: "div",
            ignore: ".ignore",
            rules: 
            {
                fname : {required : true},
                lname : {required : true},
                email : {required : true, email : true},
                phone : {required : true,minlength:10,maxlength:12},
                mobile : {required : true,minlength:10,maxlength:12},
                nsa : {required : true},
                address : {required : true},
                city : {required : true},
                zip : {required : true},
                state : {required : true},
                loginid : {required : true},
                password : {required : true, minlength :7},
                cpassword : {required : true, equalTo: "#password"}               
            },
            messages : {
                fname : {required : "Please enter first name."},
                lname : {required : "Please enter last name."},
                email : {required : "Please enter email id.", email : "please enter valid email."},
                phone : {required : "Please enter phone no."minlength:phone number should be 10 },
                mobile:{required: "please enter mobile no",minlength:mobile number should be 10 }
                address : {required : "Please enter address."},
                city : {required : "Please enter city."},
                zipcode : {required : "Please enter postcode."},
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
  function ValidateEmail(email) 
      {

       if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.email.value))
        {
          return (true)
        }
          alert("You have entered an invalid email address!")
          $('#email').val('');
      }
</script>