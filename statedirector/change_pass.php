<?php
include_once("../include/settings.php");
include_once("../include/functions.php");
$user = new User();
$user = new User();
    if(!isset($_SESSION['sd_id'])) { 
	 header('location: state_director_login.php'); exit;
	}
	
$admin_ids = $_SESSION['sd_id'];
extract($_POST);
if(isset($_POST['login'])){
	
		$table = "state_director";
		$fields = "*";
		 $where = " sd_id ='".$admin_ids."' and password ='".$oldpass."' "; 
		 $sql=@mysql_query("select ".$fields." from ".$table." where ".$where."");
		  $num_rows=@mysql_num_rows($sql);
		  
		  if($num_rows > 0)
		  {
			  $records=@mysql_fetch_assoc($sql);
              $to = $email;
		      $myup = mysql_query("update `state_director` set `password` = '".$newpass."' where `sd_id`=".$admin_ids);
					
 $_SESSION['success'] =  "Your Password has been updated";
 $_SESSION['flag'] = 1;
 header('location:change_pass.php');
 exit();

		}else {
			// Registration Failed
			$_SESSION['error']='Your old password is incorrect,Please enter valid old password.'; 
		    header("location: change_pass.php");exit;
		}
 }
?>

<?php include_once("common/head.php");?>

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

    <div class="col-xs-12 col-sm-6">
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
      <h3>Change Password </h3>
          <div class="bs-docs-example">
          <div class="row">
            <div class="col-xs-12 col-sm-12">
              <form enctype="multipart/form-data" method="post" id="frm_testimonials" name="frm_testimonials" role="form">  
                <div class="form-group control-group">
                  <label for="fname">Old Password<span class="red_star">*</span></label>
  			          <input type="password" name="oldpass" id="oldpass" class="form-control" >
                </div>
		 
          		  <div class="form-group control-group">
                  <label for="fname">New Password<span class="red_star">*</span></label>
          			  <input type="password" name="newpass" id="newpass" class="form-control" >
                </div>
		 
          		  <div class="form-group control-group">
                  <label for="fname">Confirm Password<span class="red_star">*</span></label>
          			  <input type="password" name="cpass" id="cpass" class="form-control" >  
                </div> 

                <input type="submit" class="btn btn-primary btn-search" value="Submit" id="btnsbt" name="login">
		
              </form>
            </div>
          </div>
          </div>
    </div>
  </div><!-- /.row -->
</div><!-- /#page-wrapper -->
<script>
$(document).ready(function () {
	
	$("#frm_testimonials").validate({
          rules: {
            oldpass:{required: true},
			newpass:{required: true},
			cpass:{required: true,
					 equalTo: "#newpass"}
			
           
        },
        highlight: function (element) {
		    $(element).closest('.frm_testimonials').removeClass('success').addClass('error');
        },
		messages: {			
		 oldpass:{required: "Please enter your old password."},
			newpass:{required:"Please enter your new password."},
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
<?php include "common/foot.php"; ?>