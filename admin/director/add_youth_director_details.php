<?php
include_once("../include/settings.php");
include_once("../include/functions.php");

$user = new User();
error_reporting(0);
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
    exit;
}
$admin_ids = $_SESSION['user_id'];
extract($_POST);

$t_state      = $_POST['t_state'];
$director     = $_POST['director'];

if(isset($_POST['submit']))
{
    $sql2="INSERT INTO `youth_director`(`director_name`,`state_id`) VALUES ('$director','$t_state')";
  $result2=mysqli_query($con,$sql2);
}



?>
<?php include_once("../common/header.php"); ?>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <?php include_once("../common/left_sidebar.php"); ?>
    <?php include_once("../common/profile_section.php"); ?>
</div><!-- /.navbar-collapse -->
</nav>
<?php
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
<div class="row">
  <div class="col-sm-10 col-sm-offset-1">
    <form method="post" action="<?php $_SERVER['PHP_SELF'];?>" id="cform">
     <span> Add Director Selection</span>
                <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Team State*</label>
                    <select name="t_state" class="form-control" required  id="t_state"required> 
                    <option>Select State </option>
                    <?php 
                     $sql1 = "SELECT * FROM `states` WHERE `country_id`=231";
                    $result=mysqli_query($con,$sql1);
                      while($row=mysqli_fetch_assoc($result)){?>
                        <option value="<?=$row['id']?>"><?=$row['name']?></option> 
                    <?php } ?> 
                  </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Add Director *</label>
                    <input type="text" name="director" class="form-control" placeholder="director Name" required>
                  </div>
                </div>
              </div>
        <div class="row">
        <div class="col-sm-12 text-center">
          <button class="btn" name="submit" value="submit">Register</button>
        </div> 
      </div>
    </form>
  </div>
</div>