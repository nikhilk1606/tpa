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
$age_group          =   $_POST['age_group'];
 $age_group;

$_SESSION['mfane']        =     $_POST['mfname'];
$_SESSION['mlname']       =     $_POST['mlname'];
$_SESSION['asstm_fname']  =     $_POST['asstm_fname'];
$_SESSION['asstm_lname']  =     $_POST['asstm_lname'];
$_SESSION['email']        =     $_POST['email'];
$_SESSION['address']      =     $_POST['address'];
$_SESSION['city']         =     $_POST['city'];
$_SESSION['state']        =     $_POST['state'];
$_SESSION['zip']          =     $_POST['zip'];
$_SESSION['home']         =     $_POST['home'];
$_SESSION['mobile']       =     $_POST['mobile'];
$_SESSION['tname']        =     $_POST['tname'];
$_SESSION['loginid']      =     $_POST['loginid'];
$_SESSION['password']     =     $_POST['password'];
$_SESSION['cpassword']    =     $_POST['cpassword'];
$_SESSION['program']      =     $_POST['program'];
$prod_name                =     "Team sanction fee";
$_SESSION['age_group']    =     $age_group;
$payment=25;

$_SESSION['sub']          =     $_POST['sub'];
$_SESSION['payment']      =     $payment;
//print_r($_SESSION);



$sql3 = "SELECT * FROM `states` WHERE `id`=$state";
  
  $result3=mysqli_query($con,$sql3);
   $row3=mysqli_fetch_array($result3);
      $state1=$row3['name'];


/*if(isset($_POST['sub'])){
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
      $_SESSION['success']='Your team Registration Successfuly done.';
      header("location:team_login.php");
      exit;
    }*/



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
        <title>Team Sanction | The Players Association</title>
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
       <!--  <script src="jquery-3.3.1.min.js"></script> -->
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
        <form method="post" action="team_payment.php" name="cform" id="cform">
         <center> <h3>Team Membership / Sanction Page </h3></center>
           <div class="col-sm-12">
            <div class="row">               
              <div class="col-xs-12 col-sm-12 p-b-10">
                      <h4>Age Group</h4>
                      <div class="b-1 team-check">
                          <label class="radio-inline top-radio">
                            <input type="radio" name="age_group" value="adult" id="adult">Adult
                          </label>
                          <label class="radio-inline top-radio">
                            <input type="radio" name="age_group" value="youth" id="youth">Youth
                          </label>
                      </div> 
                  </div>
              </div>
              <div class="form-group">
                <label>Team Name <span>*</span></label>
                <input type="text" name="tname" id="tname" class="form-control" placeholder="Team Name" >
              </div>
            </div> 
           <div class="row">
           <div class="col-sm-6">
              <div class="form-group">
                <label>Manager First Name <span>*</span></label>
                <input type="text" name="mfname" id="mfname" class="form-control" placeholder="Manager First Name">
              </div>
            </div>  
            <div class="col-sm-6">
              <div class="form-group">
                <label> Asst. Manager First Name <span>*</span></label>
                <input type="text" name="asstm_fname" id="asstm_fname" class="form-control" placeholder="Asst Manager First Name">
              </div>
            </div>
          </div>
          <div class="row"> 
            <div class="col-sm-6">
              <div class="form-group">
                <label>Manager Last Name <span>*</span></label>
                <input type="text"name="mlname" id="mlname" class="form-control" placeholder="Manager Last Name">
              </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                  <label>Asst. Manager Last Name <span>*</span></label>
                  <input type="text" name="asstm_lname" id="asstm_lname" class="form-control" placeholder="Asst Manager Last Name">
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
                <input type="text" name="address"id="address"class="form-control" placeholder="Address">
              </div>
            </div>
          </div>
          <div class="row">          
            <div class="col-sm-6">
              <div class="form-group">
              <label>city <span>*</span></label>                    
                <input type="text-center" name="city" id="city" class="form-control" placeholder="City">
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
                <input type="Number" name="zip" id="zip" class="form-control" placeholder="Zip Code" min="0" minlength="5" maxlength="5">
              </div>
            </div>          
            <div class="col-sm-6">
              <div class="form-group">
                <label>home phone <span>*</span></label>
                <input type="Number" name="home" id="home"class="form-control" placeholder="Home Phone">
              </div>
            </div>
          </div>
          <div class="row">          
            <div class="col-sm-6">
              <div class="form-group">
                <label>Mobile Number <span>*</span></label>
                <input type="Number" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number"  minlength="10" maxlength="10">
              </div>
            </div>    

            <div class="col-sm-6">
              <div class="form-group">
                <label>registering for <span>*</span></label>
                <select name="program" id="program" class="form-control">
                  <option placeholder="Select Registration" value="">Select registration</option>
                 <option value="Mens A">Men's A</option>
                 <option value="Mens B">Men's B</option>
                 <option value="Mens C">Men's C</option>
                 <option value="Mens D">Men's D</option>
                 <option value="Mens E">Men's E</option>
                 <option value="Mens Rec">Men's Rec</option>
                 <option value="Womens Upper">Women's Upper</option>
                 <option value="Womens Lower">Women's Lower</option>
                 <option value="Coed Upper">Coed Upper</option>
                 <option value="Coed Lower">Coed Lower</option>
                 <option value="35+ Upper">35+ Upper</option>
                 <option value="35+ Lower">35+ Lower</option>
                </select>
            </div>
            </div>
          </div>
          <div class="row"> 
            <div class="col-sm-6">
              <div class="form-group">
              <label>LoginID <span>*</span></label>                    
                <input type="text" name="loginid" id="loginid" class="form-control" placeholder="Login id">
                <div id="txtHint1"></div>
              </div>
            </div>         
            <div class="col-sm-6">
              <div class="form-group">
                <label>password <span>*</span></label>
                <input type="password" name="password"id="password"class="form-control" placeholder="Password" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Confirm Password <span>*</span></label>
                <input type="password" name="cpassword"id="cpassword" class="form-control" placeholder="Confirm Password">
              </div>
            </div>
          </div>
          <div class="row"> 
            <div class="col-sm-12 text-center">
              <button class="btn btn-primary register-btn" type="submit" name="submitbtn" value="submit" onclick="return PasswordValidate()">Click here to Pay </button>
            </div> 
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

   
<?php include ("footer.php"); ?>

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
                age_group:{required:true},
                tname:{required:true},
                mfname:{required:true},
                mlname:{required:true},
                asstm_fname:{required:true},
                asstm_lname:{required:true},
                email : {required : true, email : true},
                home : {required : true},
                mobile : {required : true},
                program:{required:true},
                address : {required : true},
                city : {required : true},
                zip : {required : true},
                state : {required : true},
                loginid : {required : true},
                 password : {required : true, minlength :7},
                 cpassword : {required : true, equalTo: "#password"}               
            },
            messages : {
                age_group: {required:"Please select any one age group"},
                tname:{required:"Please enter team name"},
                mfname:{required:"Please enter manager first name"},
                mlname:{required:"Please enter manager last name"},
                asstm_fname:{required:"Please enter asst manager first name"},
                asstm_lname:{required:"Please enter asst manager last name"},
                email : {required : "Please enter email id.", email : "please enter valid email."},
                home : {required : "Please enter numbers only"},
                mobile:{required: "Please enter numbers only"},
                address : {required : "Please enter address."},
                city : {required : "Please enter city."},
                zipcode : {required : "Please enter numbers only."},
                state : {required : "Please choose state."},
                program:{required:"Please select registerd for"},
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
           //return $('#cform').jqxValidator('validate');
        });
       
        </script>
   <script type="text/javascript">
    function PasswordValidate() {
        var email = document.getElementById("email").value;
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

       if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.email.value))
        {
          return (true)
        }
          alert("You have entered an invalid email address!")
          $('#email').val('');
      }
</script>
<script type="text/javascript">
              $(document).ready(function()
              {
                  $('input[name="phone"]').mask('(000) 000-0000');
                  
                $(".str").keypress(function(event)
                {
                  var inputValue = event.which;
                  // allow letters and whitespaces only.
                  if(!((inputValue >= 65 && inputValue <= 90) || (inputValue >= 97 && inputValue <= 122)) && (inputValue != 32 && inputValue != 0)) 
                  { 
                      event.preventDefault(); 
                  }
                });

                $(".num").keypress(function (e) 
                {
                  if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
                  {
                      return false;
                  }
                });
            });
        </script>
  <script type="text/javascript">
// This is for email already exist or not
  $(document).ready(function() {          
    $("#email").blur(function(event){
       var  email=$(this).val();     
       $.post( 
          'check_team.php',
          { hps_level:email},                  
          function(data) {
            //alert(data);
            if(data==1 )
            {
              $("#email").focus();
              $("#txtHint").html("<span class='notavail'>Already exist please use another </span>");
            }
            /*else
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
          'team_loginid.php',
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
        
        
