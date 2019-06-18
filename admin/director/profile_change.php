<?php
include_once("../../include/settings.php");
include_once("../../include/functions.php");

$user = new User();
    if(!isset($_SESSION['user_id'])) { 
	 header('location: login.php'); exit;
	}

$admin_ids = $_SESSION['user_id'];
extract($_POST);

		 $table = "tbl_users";
		 $fields = "*";
		 $where = " user_id ='".$admin_ids."' "; 
		 $sql2=@mysql_query("select ".$fields." from ".$table." where ".$where."");
		 $records2=@mysql_fetch_assoc($sql2);
		 $email = $records2['email'];
		  
if(isset($_POST['login'])){
	

 $myup = mysql_query("update `tbl_users` set `email`='".$_POST['email']."' , `password` = '".$_POST['password']."',`login_id`='".$_POST['login_id']."' where `user_id`=".$admin_ids);


	if($myup)
	{
		
			  $to = $_POST['email'];
		      $host = $_SERVER['HTTP_HOST'];
			  $uri = $_SERVER['SCRIPT_URI'];
			  $subject = "Penthouse Club - Your Profile Updated";	
			  $headers = 'MIME-Version: 1.0' . "\r\n";
			  $headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			  $headers .= "From: \" Penthouse Club- Your Password \"<noreply@$host>\n";

					  	  $message = '<html><head></head><body style="font: 12px Verdana; color:#000000">
										<p><b>Hello  '.$_POST['user_name'].'</b>,</p>
										<p>We have received a request that you updated your profile of The Penthouse Club  <br/>
										Please use the following login credentials.
										</p>
										
 										<p>Your Email ID: <span style="color:black">'.$_POST['email'].'</span></p>
 		
		<p>Your password: <span style="color:black">'.$_POST['password'].'</span></p>
										
 									   	
										 <p><b>Best regards,</b></p>
									     <p><b>The Penthouse Club .</b></p>
										
										</body>
									</html>';
						
		 mail($to,$subject,$message,$headers);
		
		
	 $_SESSION['success'] =  "Your Email and Password has been updated";
	 $_SESSION['flag'] = 1;
	 header('location:profile.php');
	 exit();
	}
	else{
		
			$_SESSION['error']="Email and Password is not changed , Please try again";
			header("location: profile_change.php");exit;
	}
			
 }

?>
<?php include_once("common/header.php");?> 

     	 

      <div id="page-wrapper">
		
        <?php if(isset($_SESSION['success']) && $_SESSION['success']!= ""){?>
        <div class="alert alert-success">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        	<?=$_SESSION['success']?>
            <?php unset($_SESSION['success']);?>
        </div>
        <?php }?>
        <?php if(isset($_SESSION['error']) && $_SESSION['error']!= ""){?>
        <div class="alert alert-danger">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        	<?=$_SESSION['error']?>
            <?php unset($_SESSION['error']);?>
        </div>
        <?php }?>

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
	        <div class="col-xs-12 col-sm-6">
	            <h3>Edit Admin Profile </h3>
	                <div class="bs-docs-example">
	                <div class="row">
	                  <div class="col-xs-12 col-sm-12">
	                    <form enctype="multipart/form-data" method="post" id="frm_testimonials" name="frm_testimonials" role="form">
							<div class="form-group control-group">
		                        <label for="fname">User Name<span class="red_star">*</span></label>
								<input type="text" name="login_id" id="login_id" class="form-control" value="<?php echo $records2['login_id'];?>" >
							</div>	

		                    <div class="form-group control-group">
		                        <label for="fname">Email<span class="red_star">*</span></label>
								<input type="text" name="email" id="email" class="form-control" value="<?php echo $records2['email'];?>" >
		                    </div>
							 
							<div class="form-group control-group">
			                    <label for="fname"> Password<span class="red_star">*</span></label>
								<input type="password" name="password" id="password" class="form-control" value="<?php echo $records2['password'];?>" >
			                </div>
							 
							<div class="form-group control-group">
		                        <label for="fname">Confirm Password<span class="red_star">*</span></label>
								<input type="password" name="cpass" id="cpass" class="form-control" value="<?php echo $records2['password'];?>" >
		                    </div>
		                     
		                    <input type="submit" class="btn btn-primary" value="Update Profile" id="btnsbt" name="login">
							<input type="button" class="btn btn-primary" value="Cancel" name="Reset" onclick="goBack();">			
	                    </form>
	                  </div>
	                </div>
	            </div>
	        </div>
        </div>
      </div>
    </div>

    <?php include_once("common/footer.php");?>

	
	   <script type="text/javascript">
function goBack() {
    window.history.back()
}
</script>
<script>
$(document).ready(function () {
	
	$("#frm_testimonials").validate({
          rules: {
		user_name:{required: true},
            email:{required: true,email:true},
		 password:{required: true},
			cpass:{required: true,
					equalTo: "#password"}
			
           
        },
        highlight: function (element) {
		    $(element).closest('.frm_testimonials').removeClass('success').addClass('error');
        },
		messages: {	
	user_name:{required: "Please Enter User Name"},
		
		 email:{required: "Please enter Email Address.",
				email:"Please enter valid Email Address"
			},
			password:{required:"Please enter your new password."},
			cpass:{ required:"Please enter confirm password.",
					equalTo: "New password and confirm password fields do not match."
				  },
 },
    });
	
});

</script>
<script>
function checkDel(){
	if (confirm("Are you sure want to delete?")) {
        return true;
    } else {
        return false;
    }	
}
</script>    
<?php include_once("common/footer.php");?>