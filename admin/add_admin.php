<?php
session_start();
include_once("../include/settings.php");
error_reporting(1);
extract($_POST);
    if(!isset($_SESSION['id'])) { 
       echo "<script type='text/javascript'>window.location.href = 'login.php';</script>";


    exit;
  }
  $first=$_POST['first'];
  $last=$_POST['last'];
  $email=$_POST['email'];
  $login_id=$_POST['login_id'];
  $password=$_POST['password'];
  $c_pass=$_POST['c_pass'];

  if(isset($_POST['submit'])){
  	$sql="INSERT INTO `admin`(`first_name`, `last_name`, `email`, `login_id`, `password`) VALUES ('$first','$last','$email','$login_id','$password')";
  	$res=mysqli_query($con,$sql);
 if($res){
  	$_SESSION['success']="Admin has been added successfully";
  	header("location: add_admin.php");
  	exit();
  }else{
  	$_SESSION['error']="Error has been occured please try again";
  	header("location: add_admin.php");
  	exit();
  }
  }
 
?>
<?php include_once("../common/header.php");?>

      </nav>
<!-- Collect the nav links, forms, and other content for toggling -->
<!DOCTYPE html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	</head>
<div id="page-wrapper">
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

            <h3 class="text-center">Add New Admin</h3>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>"id="frm_testimonials" method="post">
	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
		               	<label>First Name</label>
		               	<input name="first" type="text" id="first" class="form-control" placeholder="First Name"> 
		            </div>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>Last Name </label>
	               		<input name="last" type="text" id="last" class="form-control" placeholder="Last Name"> 
	               	</div>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>Email </label>
	               		<input name="email" type="email" id="email" class="form-control" placeholder="email"> 
	               		
	               	</div>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>LoginID</label>
	               		<input name="login_id" type="text" id="login_id" class="form-control" placeholder="Login ID"> 
	               	</div>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
                		<label>Password </label>
	               		<input name="password" type="password" id="password" class="form-control" placeholder="Password"> 
		            </div>
	            </div>

	            <div class="col-xs-12 col-sm-4">
	            	<div class="form-group control-group">
	               		<label>Confirm Password</label>
	               		<input name="c_pass" type="text" id="c_pass" class="form-control" placeholder="Confirm Password"> 
	               	</div>
	            </div>
    
            <div class="col-xs-12 col-sm-12">
                <button name="submit" class="btn btn-primary search-btn">Submit</button>
            </div>
        </div>
    </div>
</div>

<?php include ("footer.php"); ?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        $("#frm_testimonials").validate({
            rules: {
            	first:{required:true},
            	last:{required:true},
            	email:{required:true,
            		email:true},

                login_id: {required: true },
                password : {required : true, minlength :7},
                c_pass : {required : true, equalTo: "#password"},
            },
            highlight: function (element) {
                $(element).closest('.frm_testimonials').removeClass('success').addClass('error');
            },
            messages: {
            	 first : {required : "Please enter First name."},
                last : {required : "Please enter Last name."},
                email : {required: "Please enter Email Address.",
                    email: "Please enter valid Email Address."},
                login_id: {
                    required: "Please enter User name."},
               password : {required : "Please enter Password", minlength :"Password should contain atleast 7 alphanumeric character."},
                c_pass : {required : "Please enter Confirm Password.", equalTo: "Password & Confirm password should be matched."}
            }
        });

    });

</script>
</body>
</html>