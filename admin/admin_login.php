<?php
session_start();
include_once("../include/settings.php");
include_once("../include/functions.php");
$user = new User();

extract($_POST);
if (isset($_POST['login'])) {
    $table = "admin";
    $fields = "*";
    $where = " login_id ='" . $_POST['login_id'] . "'  and password = '" . $_POST['password'] . "' ";
    $sql = @mysql_query("select " . $fields . " from " . $table . " where " . $where . "");
    $num_rows = @mysql_num_rows($sql);
    if ($num_rows > 0) {
        $records = @mysql_fetch_assoc($sql);
        $_SESSION['id'] = true;
        $_SESSION['email'] = $records['email'];
        $_SESSION['id'] = $records['id'];

        header("location:index.php");
        exit;

    } else {
        // Registration Failed
        $_SESSION['error'] = "Email Or Password is wrong , Please try again";
        header("location: login.php");
        exit;
    }
}
?>
<?php include_once("../common/header.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Admin Login | The Players Association</title>
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
<?php include "header.php"; ?>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <?php if (isset($_SESSION['uid'])) { ?>
        <?php include_once("common/left_sidebar.php"); ?>
        <?php include_once("common/profile_section.php"); ?>
    <?php } ?>
</div><!-- /.navbar-collapse -->
</nav>

<div class="logo top-50">
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <a href="index.php"><img src="images/logo.png" class="img-responsive"  alt="The Players Association"></a>
        </div>
    </div>
</div>

<section class="login-sect top-20">
    <div class="container">
        <div id="page-wrapper pad-left-0">
            <div class="row">
                <div class="col-xs-12 col-sm-offset-2 col-sm-8">
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
                    <h3 class="text-center">Login </h3>
                    <div class="bs-docs-example">
                        <div class="row">
                            <div class="col-sm-12">
                                <form enctype="multipart/form-data" method="post" id="frm_testimonials" name="frm_testimonials" role="form">
                                    <div class="form-group control-group">
                                        <label for="fname">Username<span class="red_star">*</span></label>
                                        <input id="text" name="login_id" placeholder="Username" class="form-control"  />
                                    </div>
                                    <div class="form-group control-group">
                                        <label for="fname">Password<span class="red_star">*</span></label>
                                        <input id="password" name="password" type="password" placeholder="Password" class="form-control"  />
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Submit" id="btnsbt" name="login">
                                    <a href="forgotpass.php" class="btn forgot-pass">Forgot Password</a>
                                    <!-- <hr>
                                    <p>Don't have an Account? <a href="registration.php">Register Here</a></p> -->
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
                login_id: {required: true },
                password: {required: true}
            },
            highlight: function (element) {
                $(element).closest('.frm_testimonials').removeClass('success').addClass('error');
            },
            messages: {
                login_id: {
                    required: "Please enter User name."},
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
