<?php
session_start();
include_once("include/settings.php");
$payment=$_SESSION['payment'];
$_SESSION['fname']        =           $_POST['fname'];
$_SESSION['lname']        =           $_POST['lname'];
$_SESSION['email']        =           $_POST['email'];
$_SESSION['address']      =           $_POST['address'];
$_SESSION['city']         =           $_POST['city'];
$_SESSION['state']        =           $_POST['state'];
$_SESSION['zip']          =           $_POST['zip'];
$_SESSION['home']         =           $_POST['home'];
$_SESSION['mobile']       =           $_POST['mobile'];
$_SESSION['password']     =           $_POST['password'];
$_SESSION['loginid']      =           $_POST['loginid'];
$_SESSION['cpassword']    =           $_POST['cpassword'];
$_SESSION['submitbtn']    =           $_POST['submitbtn'];
$_SESSION['submit']       =           $_POST['submit'];
$_SESSION['mfane']        =           $_POST['mfname'];
$_SESSION['mlname']       =           $_POST['mlname'];
$_SESSION['asstm_fname']  =           $_POST['asstm_fname'];
$_SESSION['asstm_lname']  =           $_POST['asstm_lname'];
$_SESSION['tname']        =           $_POST['tname'];
$_SESSION['program']      =           $_POST['program'];
$_SESSION['sub']          =           $_POST['sub'];
$_SESSION['age_group']    =           $_POST['age_group'];
$prod_name                =           "Team Sanction Fee";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Umpire Sanction | The Players Association</title>
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
  include "header2.php";
}
else
{ include "header.php";
} ?>
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/media.css">
        <link rel="stylesheet" href="css/font-awesome.css"/>
      <div class="col-xs-12 col-sm-12">
               <h4 class="red-text">Teams have to pay $25 for Sanction </h4> 
      </div>
<div class="section12">
<div class="container">
<div class="row">
<div class="col-sm-12 text-center" style="padding:80px 0;">
    <form class="form-horizontal" action="https://www.paypal.com/cgi-bin/webscr" id="chkout-form" method="post" >                 <!-- <form class="form-horizontal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" id="chkout-form" method="post" >  -->    
                           <!-- Identify your business so that you can collect the payments. -->
                           
                          <!--  <input type="hidden" name="business" value="mileybutler000-buyer-1@gmail.com"> -->
                           <input type="hidden" name="business" value="playtpa@gmail.com">
           
                           <!-- Specify a Buy Now button. -->
                           <input type="hidden" name="cmd" value="_xclick">
                           
                           <!-- Show logo on paypal link page -->
                           <input type="hidden" name="image_url" value="images/logo.png">
       
                           <!-- Specify details about the item that buyers will purchase. -->
                           <input type="hidden" name="item_name" value="<?php echo $prod_name; ?>">
                           
                           <input type="hidden" name="item_number" value="1">
                           
                           <input type="hidden" name="amount" value="<?php echo $payment;?>">
                           
                           <input type="hidden" name="currency_code" value="USD"> 
                           
                           <input type="hidden" name="no_shipping" value="1">
       
                           <!-- Return method - 2 For Post -->
                           <input type='hidden' name='rm' value='2'>
           
                           <!-- Specify URLs -->
                           <input type='hidden' name='cancel_return' value="http://tech599.com/~tech599/tech599.com/johnonk/the-players-association/v1/cancel.php">
           
                           <input type='hidden' name='return' value="http://tech599.com/~tech599/tech599.com/johnonk/the-players-association/v1/team_success.php">
                            
                           
                           <!-- Display the payment button. -->
                           <div class="text-center">
                             <input type="image" src="images/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                           </div>
                               
                       </form></div>
</div></div></div>
                <?php include "footer.php"; ?>
