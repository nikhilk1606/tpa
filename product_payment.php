<?php
 session_start();
 include_once("include/settings.php");

// require_once("phpmailer/class.phpmailer.php");


 if(isset($_POST['proceed_payment'])){
 // print_r($_POST);die;

  $cust_name = $_POST['cust_name'];
  $cust_email = $_POST['cust_email'];
  $cust_address = $_POST['cust_address'];
  $cust_city = $_POST['cust_city'];
  $cust_state = $_POST['cust_state'];
  $cust_zip = $_POST['cust_zip'];
  $cust_country = $_POST['cust_country'];
  $cust_phone = $_POST['cust_phone'];
  $amount = $_POST['amount'];

$_SESSION['payment']      =   $amount;

$_SESSION['cust_name'] = $cust_name;
$_SESSION['cust_email'] = $cust_email;
$_SESSION['cust_address'] = $cust_address;
$_SESSION['cust_city'] = $cust_city;
$_SESSION['cust_state'] = $cust_state;
$_SESSION['cust_zip'] = $cust_zip;
$_SESSION['cust_country'] = $cust_country;
$_SESSION['cust_phone'] = $cust_phone;


// print_r($_POST);
// echo $amount; die;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Shop | The Players Association</title>
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
<?php //include("common/header.php"); ?>
      <div class="section12">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center" style="padding:80px 0;">
              <form class="form-horizontal" action="https://www.paypal.com/cgi-bin/webscr" id="chkout-form" method="post" >
                 <!-- Identify your business so that you can collect the payments. -->
               
                 <input type="hidden" name="business" value="playtpa@gmail.com">
                 <!-- Specify a Buy Now button. -->
                 <input type="hidden" name="cmd" value="_xclick">

                 <!-- Show logo on paypal link page -->
                 <input type="hidden" name="image_url" value="images/logo.png">

                 <!-- Specify details about the item that buyers will purchase. -->
                 <!--<input type="hidden" name="item_name" value="<?php //echo $details['prod_name']; ?>">-->

                 <input type="hidden" name="item_number" value="1">

                 <input type="hidden" name="amount" value="<?php echo $amount;?>">

                 <input type="hidden" name="currency_code" value="USD">

                 <input type="hidden" name="no_shipping" value="1">

                 <!-- Return method - 2 For Post -->
                 <input type='hidden' name='rm' value='2'>

                 <!-- Specify URLs -->
                 <input type='hidden' name='cancel_return' value="http://tech599.com/~tech599/tech599.com/johnonk/the-players-association/v1/product_cancel.php">

                 <input type='hidden' name='return' value="http://tech599.com/~tech599/tech599.com/johnonk/the-players-association/v1/product_success.php">


                 <!-- Display the payment button. -->
                <div class="text-center">
                <input type="image" id="submit_form" src="images/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                  <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    <?php include("common/footer.php"); ?>
  </body>
</html>
