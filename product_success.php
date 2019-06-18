<?php
session_start();
include_once("include/settings.php");
$user_id=$_SESSION['u_id'];
$_SESSION['album_id']=$id;
$cart=$_SESSION["shopping_cart"];
$txnid = $_POST['txn_id'];
          $payment = $_POST['payment_gross'];
          $date = $_POST['payment_date'];
           $sql="SELECT * FROM `umpire_sanction` WHERE `id`='$user_id'";
          $res=mysqli_query($con,$sql);
          $ro=mysqli_fetch_array($res);
          $email=$ro['email'];
          $name=$ro['first_name'];
          $lname=$ro['last_name'];
          $address=$ro['address'];
          $city=$ro['city'];
          $state=$ro['state'];
          $zip=$ro['zip'];

          
foreach ($_SESSION["shopping_cart"] as $product){
  $product_id=$product['product_id'];
 
$pro_name = $product['product_name'];
          // print_r($pro_name);die;
          $b = explode(" ",$pro_name);
          $a[] = implode(" ",$b);
          $pro_quantity = $product['quantity'];
          $d = explode(" ",$pro_quantity);
          $e[] = implode(" ",$d);
        }
        // print_r($a);die;
        $c = implode(",", $a);
        $f = implode(",",$e);


              $sql2 = "INSERT INTO `orders`(`umpire_id` ,`product_name`, `product_quantity`, `transaction_id`, `amount`, `date`) VALUES ('$user_id','$c','$f','$txnid','$payment','$date')";
            $result1=mysqli_query($con,$sql2);
if($result1){
   $to=$email;
          //$to = "mike111taylor@gmail.com";
       $subject = "The Players Association ";
       $message  = "";
       $message  = '';
       $message .= '<table border="1" width="100%" cellpadding="10">';
       $message .= "<tr><td colspan='2' style='background-color:rgba(39,39,39,0.3);'><center><b>Payment Confirmation</b></center></td></tr>";
       $message .= "<tr><td width='30%'><b>Name :</b> </td><td>".$name." ".$lname."</td></tr>";
       $message .= "<tr><td width='30%'><b>Transaction Id :</b> </td><td>" .$txnid. "</td></tr>";

        foreach ($_SESSION["shopping_cart"] as $product){



       $message .= "<tr><td width='30%'><b>Products Bought :</b> </td><td>".$product['product_name']." Product   Quantity :- ".$product['quantity']."</td></tr>";
       }
       $message .= "<tr><td width='30%'><b>Transation Date :</b> </td><td>".$date."</td></tr>";
       $message .= "<tr><td><b>Email:</b> </td><td>". $email ."</td></tr>";
       $message .= "<tr><td><b>Address:</b> </td><td>". $address ."</td></tr>";
       $message .= "<tr><td><b>City:</b> </td><td>". $city ."</td></tr>";
       $message .= "<tr><td><b>Zip :</b> </td><td>". $zip ."</td></tr>";
       $message .= "<tr><td><b>State:</b> </td><td>". $state ."</td></tr>";
       
       $message .= "<tr><td><b>Payment Amount:</b> </td><td> $ " .$payment. "</td></tr>";
       $message .= "</table>";
       $message .= "";
         $header = "From:mike222taylor@gmail.com \r\n";
         $header .= "Cc:mike111taylor@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
       //echo $message;
         $retval = mail ($to,$subject,$message,$header);

}


 


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
 <?
 if($retval == true){

  unset($_SESSION["shopping_cart"]); 
  ?>
  <div class="success"><?php echo "Payment Received Successfully...";?></div>
        <?php }else {
           ?>
    <div class="error"><?php echo "Payment could not be Received...";?></div>
    <?php
         }
         ?>
<? include ("footer.php"); ?>
</body>
</html>
