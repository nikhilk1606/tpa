<?php
include_once("include/settings.php");
include_once("include/functions.php");

$user = new User();
error_reporting(0);
extract($_POST);
$age=$_POST['age'];
$season=$_POST['season'];
$state=$_POST['state'];
$division=$_POST['division'];
$class=$_POST['class'];
$s_date=date("Y-m-d",strtotime($_POST['txtstartdate']));
$e_date=date("Y-m-d",strtotime($_POST['txtenddate']));
$sql3 = "SELECT * FROM `states` WHERE `id`=$state";
  
  $result3=mysqli_query($con,$sql3);
   $row3=mysqli_fetch_array($result3);
       $state1=$row3['name'];

echo $sql1="INSERT INTO `add_tournament_details`(`age_gorup`, `season`, `state`, `division`, `class`, `start_date`, `end_date`) VALUES ('$age','$season','$state1','$division','$class','$s_date','$e_date')";
	$result2=mysqli_query($con,$sql1);
	if($result2){
		$_SESSION['success']="details has been added successfully.";

	}
?>

<!-- Collect the nav links, forms, and other content for toggling -->
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
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/redmond/jquery-ui.css">
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
<section class="tournament-add">
    <div class="container">
        <div class="row dualwindow_left">
            <h3 class="text-center">Tournament Add</h3>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="col-xs-12 col-sm-4 bot-10">
               <label>Age Group</label>
               <input name="age" type="text" id="age" class="form-control"> 
            </div>

            <div class="col-xs-12 col-sm-4 bot-10">
               <label>Season</label>
              <select name="season" id=season class="form-control" required>
                            <option selected="selected" value="">Season</option>
                            <option value="Jan,Feb,March Season">Jan,Feb,March Season</option>
                            <option value="April,May,June Season">April,May,June Season</option>
                            <option value="July,August,September Season">July,August,September Season</option>
                            <option value="October,November,December Season">October,November,December Season</option>
                           
                        </select>
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
</section>

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
