<?php
session_start();
include_once("include/settings.php");
include_once("include/functions.php");
$user     = new User();
$user_id            =   $_SESSION['id'];
$manager_fname      =   $_POST['mfname'];
$manager_lname      =   $_POST['mlname'];
$asst_manager_fname =   $_POST['asstm_fname'];
$asst_manager_lname =   $_POST['asstm_lname'];
$email              =   $_POST['email'];
$address            =   $_POST['address'];
$city               =   $_POST['city'];
$state              =   $_POST['state'];
$zip                =   $_POST['zip'];
$home               =   $_POST['home'];
$mobile             =   $_POST['mobile'];
$tname              =   $_POST['tname'];
$loginid            =   $_POST['loginid'];
$password           =   $_POST['password'];
$cpassword          =   $_POST['cpassword'];
$program            =   $_POST['program'];


$sql3 = "SELECT * FROM `states` WHERE `id`=$state";
  
  $result3=mysqli_query($con,$sql3);
   $row3=mysqli_fetch_array($result3);
      $state1=$row3['name'];


if(isset($_POST['submit'])){
  if($password===$cpassword){
  $sql="INSERT INTO `team_sanction`(`first_name`, `last_name`, `asst_manager_first_name`, `asst_manager_last_name`, `team_name`, `team_email`, `team_Address`, `team_city`, `team_state`, `team_zip`, `team_phone`, `team_mobile`, `team_program`, `team_loginid`, `team_password`) VALUES ('$manager_fname','$manager_lname','$asst_manager_fname','$asst_manager_lname','$tname','$email','$address','$city','$state1','$zip','$home','$mobile','$program','$loginid','$password')";
  $result=mysqli_query($con,$sql);
}else
{
  $_SESSION['flag']=0;
  $_SESSION['errormsg']='your password does not match please try again.';
  header("location:team_registration.php");
}
}
    if($result){
      $_SESSION['flag']=1;
      $_SESSION['success']='Your team Rewgistration Successfuly done.';
      header("location:team_login.php");
      exit;
    }



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
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Director Registration | The Players Association</title>
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


<div class="adult-1">
  <div class="container">  
    <div class="row dualwindow_left">
      <div class="col-sm-12">
        <form method="post" action="<?php $_SERVER['PHP_SELF'];?>" id="cform">
         <center> <h3>Director Registration</h3></center>
           <div class="col-sm-4">
              <div class="form-group">
                <label>First Name *</label>
                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name"pattern="[A-Za-z]{3,}"title="enter at least 3 character" required>
              </div>
            </div>  
            <div class="col-sm-4">
              <div class="form-group">
                <label>Last Name *</label>
                <input type="text" name="lastname" id="lastlname" class="form-control" placeholder="Last Name"pattern="[A-Za-z]{1,}"title="enter at least 3 character" required>
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
                <input type="text" name="address"id="address"class="form-control" placeholder="Address" required>
              </div>
            </div>          
            <div class="col-sm-4">
              <div class="form-group">
              <label>city <span>*</span></label>                    
                <input type="text-center" name="city" id="city" class="form-control" placeholder="City" pattern="[A-Za-z]{1,}"title="enter at least 3 character"required>
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
                <input type="Number" name="home" id="home"class="form-control" placeholder="Home Phone" required minlength="10" maxlength="10">
              </div>
            </div>          
            <div class="col-sm-4">
              <div class="form-group">
                <label>Mobile Number <span>*</span></label>
                <input type="Number" name="mobile" id=mobile class="form-control" placeholder="Mobile Number" required minlength="10" maxlength="10">
              </div>
            </div> 
            <div class="col-sm-4">
              <div class="form-group">
              <label>LoginID <span>*</span></label>                    
                <input type="text" name="loginid" id="loginid" class="form-control" placeholder="Login id"pattern="[A-Za-z,0-9]{1,}"title="enter at least 3 character" required>
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
          <div class="row">
            <div class="col-sm-12 text-center">
              <button class="btn btn-primary send-btn" name="submit" value="submit">Register</button>
            </div> 
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</form>
</div>
</div>
</div>



<?php include "footer.php"; ?>
<!-- Home Slider Js Start -->
    <script src="jquery-1.9.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">$('#carouselHacked').carousel();</script>
    <script type="text/javascript" src="js/wow.js"></script>
    <script type="text/javascript">
        new WOW().init();
        $(document).ready(function() {
            jQuery.fn.carousel.Constructor.TRANSITION_DURATION = 90000
        });
    </script>
<!-- Home Slider Js End -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
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
            
      
        
        
