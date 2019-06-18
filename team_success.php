<?php
session_start();
include_once("include/settings.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Sanction | The Players Association</title>
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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- Custom Css End -->
    </head>
<body>

<?php  $page_name=basename($_SERVER['PHP_SELF']);?>
<?php
if(isset($_SESSION['id'])){
  include ("header2.php");
}
else
{ include ("header.php");
} ?>
<center><h1>Success Page</h1>   </center>
<?php
     $fname=$_SESSION["fname"];
     $lname=$_SESSION['lname'];
     $email=$_SESSION["email"];
     $home=$_SESSION["home"];
     $mobile=$_SESSION['mobile'];
     $address=$_SESSION["address"];
     $city=$_SESSION['city'];
     $state=$_SESSION['state'];
     $loginid=$_SESSION['loginid'];
     $zip=$_SESSION['zip'];
     $password= $_SESSION['password'];
     $cpassword=$_SESSION['cpassword'];
     $payment=$_SESSION["payment"];
     $submitbtn=$_SESSION['submitbtn'];
     $submit=$_SESSION['submit'];
     $sub=$_SESSION['sub'];
     $hear=$_SESSION["hear"];
     $mfname= $_SESSION['mfane'] ;
     $mlname= $_SESSION['mlname'];
     $asstm_fname=$_SESSION['asstm_fname'];
     $asstm_lname=$_SESSION['asstm_lname'];
     $tname=$_SESSION['tname'];
     $program=$_SESSION['program'];
     $age_group=$_SESSION['age_group'];
                    $txnid = $_POST['txn_id'];
                    $payment = $_POST['payment_gross'];
                    $date = $_POST['payment_date'];

      $sql3 = "SELECT * FROM `states` WHERE `id`=$state";
      $result3=mysqli_query($con,$sql3);
      $row3=mysqli_fetch_array($result3);
      $state1=$row3['name'];
      $abbr=$row3['abbr'];
      $y=date("Y");

  $sql="INSERT INTO `team_sanction`(`first_name`, `last_name`, `asst_manager_first_name`, `asst_manager_last_name`, `team_name`,`age_group`, `team_email`, `team_Address`, `team_city`, `team_state`, `team_zip`, `team_phone`, `team_mobile`, `team_program`, `team_loginid`, `team_password`, `payment`, `txn_id`) VALUES ('$mfname','$mlname','$asstm_fname','$asstm_lname','$tname','$age_group','$email','$address','$city','$state1','$zip','$home','$mobile','$program','$loginid','$password','$payment','$txnid')";
  $result=mysqli_query($con,$sql);

 if ($result) {
     $last_id = mysqli_insert_id($con);
      }
      $a=str_pad($last_id, 5, '0', STR_PAD_LEFT);

      $team_id=$y.$abbr.$a;
       $sql41="UPDATE `team_sanction` SET `team_id`='$team_id' WHERE id='$last_id'";
      $result4=mysqli_query($con,$sql41);
       //$to = "mike111taylor@gmail.com";
       $to= $_SESSION['email'];
       $subject = "The Players Association ";
       $message  = "";
       $message  = '';
       $message .= '<table border="1" width="100%" cellpadding="10">';
       $message .= "<tr><td colspan='2' style='background-color:rgba(39,39,39,0.3);'><center><b>Payment Confirmation</b></center></td></tr>";
       $message .= "<tr><td width='30%'><b>ManagerName :</b> </td><td>".$mfname."".$mlname."</td></tr>";
       $message .= "<tr><td width='30%'><b>Asst. Manager Name :</b> </td><td>".$asstm_fname."".$asstm_lname."</td></tr>";
       $message .= "<tr><td width='30%'><b>Team Name :</b> </td><td>".$tname."</td></tr>";
       $message .= "<tr><td width='30%'><b>Transaction Id :</b> </td><td>".$txnid."</td></tr>";
       $message .= "<tr><td width='30%'><b>Transation Date :</b> </td><td>".$date."</td></tr>";
       $message .= "<tr><td><b>Email:</b> </td><td>". $email ."</td></tr>";
       $message .= "<tr><td><b>Phone:</b> </td><td>". $home ."</td></tr>";
       $message .= "<tr><td><b>Mobile:</b> </td><td>". $mobile ."</td></tr>";
       $message .= "<tr><td><b>Address:</b> </td><td>". $address ."</td></tr>";
       $message .= "<tr><td><b>City:</b> </td><td>". $city ."</td></tr>";
       $message .= "<tr><td><b>State:</b> </td><td>". $state1 ."</td></tr>";
       $message .= "<tr><td><b>Team ID:</b> </td><td>". $team_id ."</td></tr>";
       $message .= "<tr><td><b>loginid:</b> </td><td>". $loginid ."</td></tr>";

       $message .= "<tr><td><b>Payment Preference:</b> </td><td>" .$payment. "</td></tr>";
       $message .= "<tr><td><b>Date:</b> </td><td>". $date ."</td></tr>";

       $message .= "</table>";
       $message .= "";

         $header = "From:mike222taylor@gmail.com \r\n";

         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
       //echo $message;
         $retval2 = mail ($to,$subject,$message,$header);
         if( $retval2 == true ) {
           ?>
        <div class="success"><?php echo "Payment Received Successfully...";?></div>
        <?php }else {
           ?>
        <div class="error"><?php echo "Payment could not be Received...";?></div>
    <?php
         }

?>

<?php
//session_destroy();
include ("footer.php"); ?>
