<?php
include_once("include/settings.php");

extract($_POST);
$login_id=$_POST['login_id'];
$password=$_POST['password'];
if (isset($_POST['login'])) {
     $sql="SELECT * FROM `team_sanction` WHERE `team_loginid`='$login_id' AND `team_password`='$password' ";
    $res=mysqli_query($con,$sql);

    // $table = "team_sanction";
    // $fields = "*";
    // $where = "team_loginid ='" . $_POST['login_id'] . "'  and team_password = '" . $_POST['password'] . "' ";
    // $sql = @mysql_query("select " . $fields . " from " . $table . " where " . $where . "");
     $num_rows = mysqli_num_rows($res);
    if ($num_rows > 0) {
        while($records = mysqli_fetch_assoc($res)){
        // $records = @mysql_fetch_assoc($sql);
        $_SESSION['id'] = true;
        $_SESSION['email'] = $records['team_email'];
        $_SESSION['user_id'] = $records['team_sanction_id'];
        $_SESSION['id']= $records['id'];
            $_SESSION['success']="You have been Login successfully.";
           // header("location: team-sanction.php");
            header("location: statedirector/manager/index.php");
            exit;
}
    } else {
        // Registration Failed
        $_SESSION['error'] = "Email Or Password is wrong , Please try again";
        header("location: team_login.php");
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
        <title>Team Login | The Players Association</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
<body>

    <?php  $page_name=basename($_SERVER['PHP_SELF']);?>
<?php include "header.php"; ?>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    
</div><!-- /.navbar-collapse -->
</nav>

<section class="login-sect">
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
                    <h3 class="text-center">Login </h3>
                    <div class="bs-docs-example">
                        <div class="row">
                            <div class="col-lg-12">
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
                                    <a href="forgot_team.php" class="btn forgot-pass">Forgot Password</a>
                                    <hr>
                                    <p>Don't have an Account? <a href="team_registration.php">Click here to Sanction Team</a></p>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
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
                login_id: {required: true
                    
                },
                password: {required: true}
            },
            highlight: function (element) {
                $(element).closest('.frm_testimonials').removeClass('success').addClass('error');
            },
            messages: {
                login_id: {
                    required: "Please enter Username"
                    
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