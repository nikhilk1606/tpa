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
                    $id=$_SESSION['id'];   
                    $txnid = $_POST['txn_id'];
                    $payment = $_POST['payment_gross'];
                    $date = $_POST['payment_date'];

      $sql3 = "SELECT * FROM `states` WHERE `id`=$state";
      $result3=mysqli_query($con,$sql3);
      $row3=mysqli_fetch_array($result3);
      $state1=$row3['name'];
       $sql="SELECT * FROM `player_sanction` WHERE id= $id";
       $result=mysqli_query($con,$sql);

        
       
            $sql3 = "UPDATE `player_sanction` SET `payment`='$payment',`txn_id`='$txnid'  WHERE `id`= '$id'";
            $result3=mysqli_query($con,$sql3);
          
          while ($row=mysqli_fetch_assoc($result)) {
         
       
          $to = "mike111taylor@gmail.com";
       $subject = "The Players Association ";
       $message  = "";
       $message  = '';  
       $message .= '<table border="1" width="100%" cellpadding="10">';
       $message .= "<tr><td colspan='2' style='background-color:rgba(39,39,39,0.3);'><center><b>Payment Confirmation</b></center></td></tr>";
       $message .= "<tr><td width='30%'><b>Name :</b> </td><td>".$row['first_name']."".$row['last_name']."</td></tr>";
       $message .= "<tr><td width='30%'><b>Transaction Id :</b> </td><td>".$txnid."</td></tr>";
       $message .= "<tr><td width='30%'><b>Transation Date :</b> </td><td>".$date."</td></tr>";
       $message .= "<tr><td><b>Email:</b> </td><td>". $row['email'] ."</td></tr>";
       $message .= "<tr><td><b>Phone:</b> </td><td>". $row['home'] ."</td></tr>";
       $message .= "<tr><td><b>Mobile:</b> </td><td>". $row['mobile'] ."</td></tr>";
       $message .= "<tr><td><b>Address:</b> </td><td>". $row['address'] ."</td></tr>";
       $message .= "<tr><td><b>City:</b> </td><td>". $row['city'] ."</td></tr>";
       $message .= "<tr><td><b>State:</b> </td><td>". $row['state'] ."</td></tr>";      
       $message .= "<tr><td><b>loginid:</b> </td><td>". $row['login_id'] ."</td></tr>";       
       $message .= "<tr><td><b>Payment Preference:</b> </td><td>" .$payment. "</td></tr>";
       $message .= "<tr><td><b>Date:</b> </td><td>". $date ."</td></tr>";       
       $message .= "</table>";
       $message .= "";          
         $header = "From:mike222taylor@gmail.com \r\n";
        // $header .= "Cc:afgh@somedomain.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
       //echo $message;
         $retval1 = mail ($to,$subject,$message,$header);        
         if( $retval1 == true ) {
           ?>       
<div class="success"><?php echo "Payment Received Successfully...";?></div>
        <?php }else {
           ?>       
<div class="error"><?php echo "Payment could not be Received...";?></div>
    <?php 
         }
        }        
include ("footer.php"); 
?>