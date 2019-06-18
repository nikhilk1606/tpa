<?php
include_once("../../include/settings.php");
include_once("../../include/functions.php");
$user = new User();

error_reporting(0);
if (!isset($_SESSION['id'])) {
    header('location: login.php');
    exit;
}
$admin_ids = $_SESSION['id'];
extract($_POST);

// fetch code
/*$sql = "SELECT id, first_name, last_name, email, address, city, state, zipcode, home, mobile, program, login_id FROM player_sanction";*/

/*$sql="SELECT `id`, `first_name`, `last_name`, `email`, `address`, `city`, `state`, `zipcode`, `home`, `mobile`, `class`, `division`, `login_id`, `password`, `payment`, `txn_id`, `player_id` FROM `player_sanction`";*/
$sql="SELECT * FROM `player_sanction` WHERE 1";
$result = mysqli_query($con, $sql);
?>
<?php  $page_name=basename($_SERVER['PHP_SELF']);?>
<?php include_once("common/head.php");?>

      </nav>
<!-- Collect the nav links, forms, and other content for toggling -->
<!DOCTYPE html>
<div id="page-wrapper">
        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <?php include_once("common/profile_section.php"); ?>
          </div>
        </div>


        <div class="row">
          <div class="col-xs-12 col-sm-2">
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <?php include_once("common/left_sidebar.php"); ?> 
            </div>
          </div>

        <div class="col-xs-12 col-sm-10">
            <?php 
            if (isset($_SESSION['success']) && $_SESSION['success'] != "") { ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button>
                        <?= $_SESSION['success'] ?>
                    <?php unset($_SESSION['success']); ?>
                    </div>
                <?php } ?>
            <?php if (isset($_SESSION['error']) && $_SESSION['error'] != "") { ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button>
                        <?= $_SESSION['error'] ?>
                    <?php unset($_SESSION['error']); ?>
                    </div>
            <?php } ?>
            <h3 class="text-center">Sanction Players </h3>
                   <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <th>ID</th>
                                <th>Player First Name</th>
                                <th>Player Last Name</th>
                                <th>Player ID</th>
                                <th class="text-center">Email Address</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Zip Code</th>
                                <th>Home Phone</th>
                                <th>Mobile Number</th>
                                <th>Class</th>
                                <th>LoginId</th>                                
                                <th colspan="2" class="text-center">Functions</th>
                                 <?php while($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?=$row['id'] ?></td>
                                    <td><?=$row['first_name'] ?></td>
                                    <td><?=$row['last_name'] ?></td>
                                    <td><?=$row['player_id'] ?></td>
                                    <td><?=$row['email'] ?></td>
                                    <td><?=$row['address'] ?></td>
                                    <td><?=$row['city'] ?></td>
                                    <td><?=$row['state'] ?></td>
                                    <td><?=$row['zipcode'] ?></td>
                                    <td><?=$row['home'] ?></td>
                                    <td><?=$row['mobile'] ?></td>
                                    <td><?=$row['class'] ?></td>
                                    <td><?=$row['login_id'] ?></td>

                                        
                                    <td><a href="edit_player_sanction.php?id=<?php echo $row["id"]; ?>"><!-- <button>Edit</button> --><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="delete_player_sanction.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete this record?');"><!-- <button>Delete</button> --><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                    
                                </tr>
                            <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
</div>
     
<?php include_once("common/foot.php"); ?>

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
