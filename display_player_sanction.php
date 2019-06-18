<?php
//include_once("include/settings.php");
//include_once("include/functions.php");
//$user = new User();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tech";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// fetch code
$sql = "SELECT id, first_name, last_name, email, address, city, state, zipcode, home, mobile, program, login_id FROM player_sanction";
$result = mysqli_query($conn, $sql);

//if (mysqli_num_rows($result) > 0) {
    // output data of each row
//     while($row = mysqli_fetch_assoc($result)) {
//        // echo "id: " . $row["id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. "<br>";
//        // print_r($row);
//     }
// } else {
//     echo "0 results";
// }

// mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Login | The Players Association</title>
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
<!-- <?php include "header.php"; ?> -->

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <?php if (isset($_SESSION['uid'])) { ?>
   <!--      <?php include_once("common/left_sidebar.php"); ?>
        <?php include_once("common/profile_section.php"); ?> -->
    <?php } ?>
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
                                <table>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Zip</th>
                                    <th>Home</th>
                                    <th>Mobile</th>
                                    <th>Program</th>
                                    <th>Functions</th>
                                    <?php while($row = mysqli_fetch_assoc($result)) {?>
                                    <tr>
                                        <td><?=$row['id'] ?></td>
                                        <td><?=$row['first_name'] ?></td>
                                        <td><?=$row['last_name'] ?></td>
                                        <td><?=$row['email'] ?></td>
                                        <td><?=$row['address'] ?></td>
                                        <td><?=$row['city'] ?></td>
                                        <td><?=$row['state'] ?></td>
                                        <td><?=$row['zipcode'] ?></td>
                                        <td><?=$row['home'] ?></td>
                                        <td><?=$row['mobile'] ?></td>
                                        <td><?=$row['program'] ?></td>
                                        <td><a href=""><button>Single View</button></a>
                                        <a href="edit_player_sanction.php?id=<?php echo $row["id"]; ?>"><button>Edit</button></a>
                                        <a href="delete_player_sanction.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete this record?');"><button>Delete</button></a></td>
                                        <!-- <td><?=$row['login_id'] ?></td> -->
                                    </tr>
                                <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <?php include "footer.php"; ?> -->
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
<!-- <?php include_once("common/footer.php"); ?> -->