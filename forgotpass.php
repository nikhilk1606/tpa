<?php
include_once("include/settings.php");
include_once("include/functions.php");
$user = new User();
extract($_POST);
if (isset($_POST['login'])) {

    $table = "tbl_users";
    $fields = "*";
    $where = " email ='" . $_POST['email'] . "' ";
    $sql = @mysql_query("select " . $fields . " from " . $table . " where " . $where . "");
    $num_rows = @mysql_num_rows($sql);
    if ($num_rows > 0) {
        $records = @mysql_fetch_assoc($sql);
        $to = $_POST['email'];
        $host = $_SERVER['HTTP_HOST'];
        $uri = $_SERVER['SCRIPT_URI'];

        $subject = "Penthouse Club - Your Forgot Password";
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: \" Penthouse Club- Your Password \"<noreply@$host>\n";
        $message = '<html><head></head><body style="font: 12px Verdana; color:#000000">
                <p><b>Hello  ' . $records['user_name'] . '</b>,</p>
                <p>We have received a request that you forgot your password of The Penthouse Club  <br/>
                Please use the following login credentials.
                </p>
                <br>
                <p>Your Email ID: <span style="color:black">' . $records['email'] . '</span></p>
                <p>Your password: <span style="color:black">' . $records['password'] . '</span></p>
                <br>
                <p><b>Best regards,</b></p>
             <p><b>The Penthouse Club .</b></p>

                </body>
        </html>';


        mail($to, $subject, $message, $headers);

        $_SESSION['success'] = "Your Password has been sent to your email address. please check Spam/Junk folder as well if you don't found in your inbox.";
        $_SESSION['flag'] = 1;
        header('location:forgotpass.php');
        exit();
    } else {
        // Registration Failed
        $_SESSION['error'] = 'The e-mail address was not found in our records, please try again.';
        header("location: forgotpass.php");
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
        <title>Sanction Player | The Players Association</title>
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
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <?php if (isset($_SESSION['uid'])) { ?>
        <?php include_once("common/left_sidebar.php"); ?>
        <?php include_once("common/profile_section.php"); ?>
    <?php } ?>
</div><!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-8">
            <?php if (isset($_SESSION['success']) && $_SESSION['success'] != "") { ?>
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
            <h3>Forgot Password</h3>
            <div class="bs-docs-example">
                <div class="row">
                    <div class="col-lg-12">
                        <form enctype="multipart/form-data" method="post" id="frm_testimonials" name="frm_testimonials" role="form">

                            <div class="form-group control-group">
                                <label for="fname">Email<span class="red_star">*</span></label>
                                <input id="email" name="email" placeholder="Username" class="form-control"  />
                            </div>
                            <input type="submit" class="btn btn-primary" value="Submit" id="btnsbt" name="login">
                            <a href="login.php">Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.row -->
</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->
<script>
    $(document).ready(function () {

        $("#frm_testimonials").validate({
            rules: {
                email: {required: true,
                    email: true
                }
            },
            highlight: function (element) {
                $(element).closest('.frm_testimonials').removeClass('success').addClass('error');
            },
            messages: {
                email: {
                    required: "Please enter your Email Address.",
                    email: "Please enter valid Email Address."
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