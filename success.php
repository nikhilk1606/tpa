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
     $program=$_SESSION['program'];       
                    $txnid = $_POST['txn_id'];
                    $payment = $_POST['payment_gross'];
                    $date = $_POST['payment_date'];

      $sql3 = "SELECT * FROM `states` WHERE `id`=$state";
      $result3=mysqli_query($con,$sql3);
      $row3=mysqli_fetch_array($result3);
      $state1=$row3['name'];
      $abbr=$row3['abbr'];
      
            $sql2 = "INSERT INTO `umpire_sanction`(`first_name`, `last_name`, `email`, `address`, `city`, `state`, `zip`, `home`, `mobile`, `login_id`, `password`, `payment`, `txn_id`) VALUES ('$fname','$lname','$email','$address','$city','$state1','$zip','$home','$mobile','$loginid','$password','$payment','$txnid')";
            $result1=mysqli_query($con,$sql2);
          
          if ($result1) {
     $last_id = mysqli_insert_id($con);

      }
      $a=str_pad($last_id, 5, '0', STR_PAD_LEFT);
      $umpire_id=$a.$abbr;
       $sql41="UPDATE `umpire_sanction` SET `umpire_id`='$umpire_id' WHERE `id`='$last_id'";
      $result4=mysqli_query($con,$sql41);
         // $to=$email;
          $to = "$email ,mike111taylor@gmail.com";
       $subject = "The Players Association ";
       $message  = "";
       $message  = '';  
       $message .= '<table border="1" width="100%" cellpadding="10">';
       $message .= "<tr><td colspan='2' style='background-color:rgba(39,39,39,0.3);'><center><b>Payment Confirmation</b></center></td></tr>";
       $message .= "<tr><td width='30%'><b>Name :</b> </td><td>".$fname."".$lname."</td></tr>";
       $message .= "<tr><td width='30%'><b>Transaction Id :</b> </td><td>".$txnid."</td></tr>";
       $message .= "<tr><td width='30%'><b>Transation Date :</b> </td><td>".$date."</td></tr>";
       $message .= "<tr><td><b>Email:</b> </td><td>". $email ."</td></tr>";
       $message .= "<tr><td><b>Phone:</b> </td><td>". $home ."</td></tr>";
       $message .= "<tr><td><b>Mobile:</b> </td><td>". $mobile ."</td></tr>";
       $message .= "<tr><td><b>Address:</b> </td><td>". $address ."</td></tr>";
       $message .= "<tr><td><b>City:</b> </td><td>". $city ."</td></tr>";
       $message .= "<tr><td><b>State:</b> </td><td>". $state1 ."</td></tr>";   
       $message .= "<tr><td><b>Umpire ID:</b> </td><td>". $umpire_id ."</td></tr>";   
       $message .= "<tr><td><b>loginid:</b> </td><td>". $loginid ."</td></tr>";       
       $message .= "<tr><td><b>Payment Preference:</b> </td><td>" .$payment. "</td></tr>";
       $message .= "<tr><td><b>Date:</b> </td><td>". $date ."</td></tr>";       
       $message .= "</table>";
       $message .= "";          
         $header = "From:mike222taylor@gmail.com \r\n";
        // $header .= "Cc:afgh@somedomain.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
       //echo $message;
         $retval = mail ($to,$subject,$message,$header);         
         if( $retval == true ) {
           ?>  

          <div class="succes-msg">
            <div class="container">     
              <div class="row">
                <div class="success"><?php echo "Payment Received Successfully...";?></div>
              </div>
            </div>
          </div>
        <?php }else {
           ?>       
          <div class="payment-not">
            <div class="container">
              <div class="row">
                <div class="error"><?php echo "Payment could not be Received...";?></div>
              </div>
            </div>
          </div>
    <?php 
         }
include ("footer.php"); ?>