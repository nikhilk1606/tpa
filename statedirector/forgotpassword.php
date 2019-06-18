<?php
include_once("../include/settings.php");
include_once("../include/functions.php");
$user = new User();
extract($_POST);
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $sql="SELECT * FROM `state_director` WHERE `email`='$email' ";
        $res=mysqli_query($con,$sql);
        $num_rows=mysqli_num_rows($res);
    if ($num_rows > 0) {
        $records = mysqli_fetch_assoc($res);
        
        $to = $email;
        $host = $_SERVER['HTTP_HOST'];
        $uri = $_SERVER['SCRIPT_URI'];

        $subject = "The Players Association - Your Forgot Password";
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: \" The Players Association- Your Password \"<noreply@$host>\n";
        $message = '<html><head></head><body style="font: 12px Verdana; color:#000000">
                <p><b>Hello  ' . $records['first_name'] ." ".$records['last_name'] . '</b>,</p>
                <p>We have received a request that you forgot your password of The The Players Association  <br/>
                Please use the following login credentials.
                </p>
                <br>
                <p>Your Email ID: <span style="color:black">' . $records['email'] . '</span></p>
                <p>Your password: <span style="color:black">' . $records['password'] . '</span></p>
                <br>
                <p><b>Best regards,</b></p>
             <p><b>The The Players Association .</b></p>

                </body>
        </html>';


        mail($to, $subject, $message, $headers);

        $_SESSION['success'] = "Your Password has been sent to your email address. please check Spam/Junk folder as well if you don't found in your inbox.";
        
        echo "<script type='text/javascript'>window.location.href = 'forgotpassword.php';</script>";
        // header('location:forgotpass.php');
        exit();
    } else {
        // Registration Failed
        $_SESSION['error'] = 'The e-mail address was not found in our records, please try again.';
        // header("location: forgotpass.php");
        echo "<script type='text/javascript'>window.location.href = 'forgotpassword.php';</script>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>State Director Login | The Players Association</title>
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
<?php include_once("common/header.php"); ?>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <?php if (isset($_SESSION['sd_id'])) { ?>
        <?php //include_once("common/left_sidebar.php"); ?>
        <?php //include_once("common/profile_section.php"); ?>
    <?php } ?>
</div><!-- /.navbar-collapse -->
</nav>

<!-- <div class="logo">
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <a href="index.php"><img src="images/logo.png" class="img-responsive"  alt="The Players Association"></a>
        </div>
    </div>    
</div> -->

<section class="login-sec top-20">
    <div class="container">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?php 
                    if (isset($_SESSION['success']) && $_SESSION['success'] != "") { ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?= $_SESSION['success'] ?>
                            <?php unset($_SESSION['success']); ?>
                            </div>
                        <?php } ?>
                    <?php if (isset($_SESSION['error']) && $_SESSION['error'] != "") { ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?= $_SESSION['error'] ?>
                            <?php unset($_SESSION['error']); ?>
                            </div>
                    <?php } ?>
                    <h3 class="text-center">State Director Login </h3>
                    <div class="bs-docs-example">
                        <div class="row">
                            <div class="col-sm-12">
                                
                                 <form method="post" action="" name="contact_form" id="contact_form" class="signin-form logform-back">
                    <div class="row contact-form footer-form"> 
                        <div class="col-xs-12 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="md-form">
                                <label>Enter your email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="E-Mail"> 
                            </div>
                        </div>
                        <div class="col-xs-4 col-md-4 wow bounceInUp m-t-20 text-center" style="visibility: visible; animation-name: bounceInUp;">
                            <input type="submit" value="submit" name="submit" id="submit" class="btn btn-primary submit-btn">
                        </div>
                    </div>
                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "footer.php"; ?>
<!-- Home Slider Js Start -->
    <script type="text/javascript">$('#carouselHacked').carousel();</script>
    <script type="text/javascript" src="js/wow.js"></script>
    <script type="text/javascript">
        new WOW().init();
        $(document).ready(function() {
            jQuery.fn.carousel.Constructor.TRANSITION_DURATION = 90000
        });
    </script>
<!-- Home Slider Js End -->

</div><!-- /#wrapper -->
<script>
    $(document).ready(function () {
        $("#frm_testimonials").validate({
            rules: {
                email: {required: true,
                    email: true
                },
                password: {required: true}
            },
            highlight: function (element) {
                $(element).closest('.frm_testimonials').removeClass('success').addClass('error');
            },
            messages: {
                email: {
                    required: "Please enter Email Address.",
                    email: "Please enter valid Email Address."
                },
                password: {
                    required: "Please enter the Password."
                }
            }
        });

    });

</script>
<script>
    function checkDel() {
        if (confirm("Are you sure want to delete?")) {
            return true;
        } else {
            return false;
        }
    }
</script>    
<?php include_once("common/footer.php"); ?>