<?php
session_start();
include_once("include/settings.php");
include_once("include/functions.php");
$user     = new User();
$user_id      = $_SESSION['user_id'];
$season       = $_POST['season'];
$tname        = $_POST['tname'];
$div          = $_POST['div'];
$program      = $_POST['program'];
$class        = $_POST['class'];
$sec_name     = $_POST['sec_name'];
$sec_contact  = $_POST['sec_phone'];
$sec_email    = $_POST['sec_email'];
$t_state      = $_POST['t_state'];
$director     = $_POST['director'];
$comment      = $_POST['comment'];
$sql3 = "SELECT * FROM `states` WHERE `id`=$t_state";
  
  $result3=mysqli_query($con,$sql3);
   $row3=mysqli_fetch_array($result3);
      $state1=$row3['name'];


if(isset($_POST['submit'])){
  $sql="INSERT INTO `tbl_adult_team_registration`(`user_id`, `season`, `team_name`, `team_division`, `team_program`, `team_class`, `team_sec_name`, `team_sec_phone`, `team_sec_email`, `team_state`, `team_director`, `team_comment`) VALUES ('$user_id','$season','$tname','$div','$program','$class','$sec_name','$sec_contact','$sec_email','$state1','$director','$comment')";
  $result=mysqli_query($con,$sql);
}
    if($result){
      $_SESSION['success']='Your team Rewgistration Successfuly done.';
      header("location:user-home.php");
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
        <title>Adult Team Registration | The Players Association</title>
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


<div class="adult-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12 dualwindow_left">
                    <span class="errormsg r-text">Important Note From TPA Headquarters:<br>Coaches <b><i><u>MUST HAVE THEIR OWN</u></i></b> TPA User account for their team.  This will ensure proper information appearing on rosters and team contact information.</span>
                        
                    <span id="ctl00_Content_lblCustomInstructions"><div style="padding-bottom: 15px;">Coaches:<br>Once submitted your area, state, or regional director will be notified of a <span style="text-decoration: underline">pending</span> sanction waiting for him or her online.  <span style="color: Black; text-decoration: underline;">All forms will remain pending until payment is received.</span><span style="color: Black;">Once your payment has been received your sanction number will be approved and you will be notified.</span></div>                  <div style="padding-bottom: 15px;">All information submitted will be saved on a secure server.  The information on this form shall be treated as private information and only the team name will be available to the general public.</div>                  <div style="padding-bottom: 15px;">Sanction Fees are:<br>Adult <font color="red">Teams</font> $40.00 USD<br>Youth <font color="red">Teams</font> $30.00 USD<br><span style="color: Black">For a complete list of SOFTBALL area, state, or regional directors</span> <a href="./StateDirectorList.aspx">Click Here</a>.</div></span>
                </div>
    </div>

    <div class="row dualwindow_left">
      <div class="col-sm-12">
        <form method="post" action="<?php $_SERVER['PHP_SELF'];?>" id="cform">
          <h3>Adult Team Registration details</h3>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>Season *</label>
                <select name="season" id="season" class="form-control">
                  <?php
                  $sql4 = "SELECT * FROM `adult_registration_details` WHERE `user_id`=1";
                  $result4=mysqli_query($con,$sql4); 
                  while($row4=mysqli_fetch_assoc($result4)) { ?>
                  <option value="<?=$row4['adult_season']?>"><?=$row4['adult_season']?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>team Name *</label>
                <input type="text" name="tname" id="tname" class="form-control" placeholder="Team Name"pattern="[A-Za-z]{3,}"title="enter at least 3 character" required>
              </div>
            </div>
           
            <div class="col-sm-4">
              <div class="form-group">
                <label>Division *</label>
                <select name="div" id="div" class="form-control">
                  <?php
                    $sql4 = "SELECT * FROM `adult_registration_details` WHERE `user_id`=1";
                    $result4=mysqli_query($con,$sql4);
                   while($row5=mysqli_fetch_assoc($result4)) { ?>
                  <option value="<?=$row5['adult_division']?>"><?=$row5['adult_division']?></option>
                <?php } ?>
              </select>
            </div>
            </div>
            
            <div class="col-sm-4">
              <div class="form-group">
                <label>program *</label>
                <select name="program" id="program" class="form-control">
                  <?php
                    $sql4 = "SELECT * FROM `adult_registration_details` WHERE `user_id`=1";
                    $result4=mysqli_query($con,$sql4);
                   while($row6=mysqli_fetch_assoc($result4)) { ?>
                  <option value="<?=$row6['adult_program']?>"><?=$row6['adult_program']?></option>
                <?php } ?>
                </select>
            </div>
            </div>
           
            <div class="col-sm-4">
              <div class="form-group">
                <label>targeted class *</label>
                <select name="class" id="class" class="form-control">
                  <?php 
                  $sql4       =   "SELECT * FROM `adult_registration_details` WHERE `user_id`=1";
                  $result4    =   mysqli_query($con,$sql4);
                  while($row7=mysqli_fetch_assoc($result4)) { ?>
                  <option value="<?=$row7['adult_class']?>"><?=$row7['adult_class']?></option>
                <?php } ?>
                </select>
            </div>
            </div>
          </div>

              <h3>team contact info</h3>
              <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Secondary contact Name *</label>
                        <input type="text" name="sec_name" class="form-control" placeholder="Secondary contact Name"pattern="[A-Za-z]{3,}"title="enter at least 3 character" required>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Secondary Contact Phone *</label>
                        <input type="text" name="sec_phone" class="form-control" placeholder="Last Name" required>
                      </div>
                    </div>
                   
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Secondary contact Email*</label>
                        <input type="email" name="sec_email" class="form-control" placeholder="Secondary Contact email" required>
                      </div>
                    </div>
                  </div>
                  <h3>Director Selection</h3>
                    <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Team State*</label>
                        <select name="t_state" class="form-control" required  id="t_state"required> 
                        <option>Select State </option>
                        <?php 
                         $sql1 = "SELECT * FROM `states` WHERE `country_id`=231";
                        $result=mysqli_query($con,$sql1);
                          while($row=mysqli_fetch_assoc($result)){?>
                            <option value="<?=$row['name']?>"><?=$row['name']?></option> 
                        <?php } ?> 
                      </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>your Director *</label>
                        <input type="text" name="director" class="form-control" placeholder="Director Name" required>
                      </div>
                    </div>
                   
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Comment </label>
                        <textarea name="comment"rows="4" class="form-control" cols="50" required></textarea>
                      </div>
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

 
            
      
        
        
