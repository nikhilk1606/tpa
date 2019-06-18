<?php
include_once("../../include/settings.php");
// include_once("../../include/functions.php");
// $user = new User();
    if(!isset($_SESSION['id'])) { 
	 header('location: login.php'); exit;
	}

$admin_ids = $_SESSION['id'];
extract($_POST);

		  // $table = "team_sanction";
		  // $fields = "*";
		  // $where = " id ='".$admin_ids."' "; 
		  // $sql2=@mysql_query("select ".$fields." from ".$table." where ".$where."");
		  // $records2=@mysql_fetch_assoc($sql2);
		  
      $sql="SELECT * FROM `team_sanction` WHERE `id`='$admin_ids'";
      $res=mysqli_query($con,$sql);
      $records2=mysqli_fetch_array($res);
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
      <h3>Managers Profile </h3>
          <div class="bs-docs-example">
          <div class="row">
            <div class="col-xs-12 col-sm-12">
              <form enctype="multipart/form-data" method="post" id="frm_testimonials" name="frm_testimonials" role="form">
        				<div class="form-group control-group">
                    <label for="fname">User Name<span class="red_star">*</span></label>
        						<input type="text" name="login_id" id="login_id" class="form-control" value="<?php echo $records2['team_loginid'];?>" readonly >
                </div>
		 
                <div class="form-group control-group">
                  <label for="fname">Email<span class="red_star">*</span></label>
			            <input type="text" name="email" id="email" class="form-control" value="<?php echo $records2['team_email'];?>" readonly >
                </div>
		 
		            <div class="form-group control-group">
                  <label for="fname"> Password<span class="red_star">*</span></label>
			            <input type="password" name="password" id="password" class="form-control" value="<?php echo $records2['team_password'];?>" readonly >
                </div> 
               
                <a href="profile_change.php" class="btn btn-primary" >Edit Profile</a>  
              </form>
            </div>
          </div>
          </div>
    </div>
  </div>
</div>  

<?php include ("common/foot.php"); ?>


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