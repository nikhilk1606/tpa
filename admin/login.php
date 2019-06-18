<?php
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
        header("location: index.php");
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
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <?php if (isset($_SESSION['id'])) { ?>
        <?php include_once("../common/left_sidebar.php"); ?>
        <?php include_once("../common/profile_section.php"); ?>
    <?php } ?>
</div><!-- /.navbar-collapse -->
</nav>
<!-- <script type="text/javascript">
    $(document).ready(function() {
        $("#selection").change(function() {
            location = $("#selection option:selected").val();
        });
    });
</script> -->

<div class="logo">
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <a href="index.php"><img src="images/logo.png" class="img-responsive"  alt="The Players Association"></a>
        </div>
    </div>
</div>

<div id="page-wrapper">
    <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8">
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
             <h3 class="text-center">Login </h3>
                    <div class="bs-docs-example">
                        <div class="row">
                            <div class="login-list">
                                <div class="col-xs-12 col-sm-12">
                                    <form name="jump" id="frm" method="post" class="log-drop center">
                                        <select name="menu" id="selected" class="form-control">
                                            <option value="#">Select Login</option>
                                            <option value="admin_login.php">Admin</option>
                                            <option value="director/director_login.php">Director</option>
                                            <!-- <option value="statedirector/state_director_login.php">State Director (Manager)</option> -->
                                        </select>
                                        <input type="submit" name="sub" class="btn-submit" value="Submit">
                                    </form>
                                </div>
                            </div>

                            <!-- <div class="col-lg-12">
                                <form enctype="multipart/form-data" method="post" id="frm_testimonials" name="frm_testimonials" role="form">
                                    <div class="form-group control-group">
                                        <label for="fname">Email<span class="red_star">*</span></label>
                                        <input id="text" name="login_id" placeholder="login_id" class="form-control"  />
                                    </div>
                                    <div class="form-group control-group">
                                        <label for="fname">Password<span class="red_star">*</span></label>
                                        <input id="password" name="password" type="password" placeholder="Password" class="form-control"  />
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Submit" id="btnsbt" name="login">
                                    <a href="forgotpass.php" class="btn forgot-pass">Forgot Password</a>
                                    <hr>
                                    <p>Don't have an Account? <a href="registration.php">Register Here</a></p>
                                </form>
                            </div> -->
                        </div>
                    </div>
        </div>
    </div><!-- /.row -->
</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->

<script type="text/javascript">
$('#frm').on('submit',function () {
          var nextPage= $('select option:selected').val();
          $(this).attr('action',nextPage);
          return true;
      });
</script>

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
