<?php
include_once("../../include/settings.php");
include_once("../../include/functions.php");
$user = new User();
error_reporting(0);
extract($_POST);
    if(!isset($_SESSION['user_id'])) { 
   header('location: login.php'); exit;
  }

<?php include_once("common/header.php");?>

      </nav>
<!-- Collect the nav links, forms, and other content for toggling -->
<!DOCTYPE html>
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

        <div class="col-xs-12 col-sm-10">
            <h3 class="text-center">Tournament Add</h3>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="col-xs-12 col-sm-4 bot-10">
               <label>Age Group</label>
               <input name="age" type="text" id="age" class="form-control"> 
            </div>

            <div class="col-xs-12 col-sm-4 bot-10">
               <label>Season</label>
               <input name="season" type="text" id="season" class="form-control"> 
            </div>

            <div class="col-xs-12 col-sm-4 bot-10">
                <label>State/Region</label>
                <select name="state" class="form-control" required  id="state"required>
                     <?php 
                     $sql1 = "SELECT * FROM `states` WHERE `country_id`=231";
                    $result=mysqli_query($con,$sql1);
                      while($row=mysqli_fetch_assoc($result)){?>
                        <option value="<?=$row['id']?>"><?=$row['name']?></option> 
                    <?php } ?> 
                </select>
            </div>
            <div class="col-xs-12 col-sm-4 bot-10">
               <label>Division</label>
               <input name="division" type="text" id="division" class="form-control"> 
            </div>

            <div class="col-xs-12 col-sm-4 bot-10">
               <label>Class</label>
               <input name="class" type="text" id="class" class="form-control"> 
            </div>

            <div class="col-xs-12 col-sm-4 bot-10">
               <label>Start Date</label>
               <input name="txtstartdate" type="text" id="txtstartdate" class="form-control"> 
            </div>

            <div class="col-xs-12 col-sm-4 bot-10">
               <label>End Date</label>
               <input name="txtenddate" type="text" id="txtenddate" class="form-control"> 
            </div> 
    
            <div class="col-xs-12 col-sm-12">
                <button class="btn btn-primary search-btn">Submit</button>
            </div>
        </div>
    </div>
</div>

<?php include ("footer.php"); ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript">
 $("#txtstartdate").datepicker({
  minDate: 0,
  onSelect: function(date) {
    alert("123");
    $("#txtenddate").datepicker('option', 'minDate', date);
  }
});
$("#txtenddate").datepicker({});
</script>
</body>
</html>
