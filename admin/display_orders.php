<?php
session_start();
include_once("../include/settings.php");
error_reporting(0);

if (!isset($_SESSION['id'])) {

    header('location: login.php');

    exit;

}

$admin_ids = $_SESSION['id'];

extract($_POST);





$sql1 = "SELECT * from `orders`";

$sql2 = mysqli_query($con,$sql1);

?>



    <?php  $page_name=basename($_SERVER['PHP_SELF']);?>

<?php include_once("../common/header.php"); ?>

</nav>
        <div id="page-wrapper">

            <div class="row">

                <div class="col-xs-12 col-sm-12">

                    <?php include_once("../common/profile_section.php"); ?>

                </div>

            </div>

            <div class="row">

                <div class="col-xs-12 col-sm-2">

                    <div class="collapse navbar-collapse navbar-ex1-collapse">

                        <?php include_once("../common/left_sidebar.php"); ?>

                    </div>

                </div>

                <div class="col-sm-10 box-border">

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

                    <h3 class="text-center"> View Orders </h3>

                    <div class="table-responsive">

                        <table class="table table-bordered">
                            <tr>
                                    <th> Name</th>

                                    <th> Email</th>

                                    <th class="text-center"> Phone</th>

                                    <th>Address</th>

                                    <th>City</th>

                                    <th>Zip Code</th>

                                    <th>State</th>

                                    <th>Product Bought</th>

                                    <th>Product Quantities</th>

                                    <th>Transaction ID</th>

                                    <th>Total Amount</th>

                                    <th>Date</th>

                                    
                                </tr>
                                   

                                         <?php while($order_list = mysqli_fetch_assoc($sql2))

                                         {
                                            $u_id=$order_list['umpire_id'];
                                            $result1=mysqli_query($con,"SELECT * FROM `umpire_sanction` WHERE `id`='$u_id'");
                                            while($order=mysqli_fetch_assoc($result1)){
                                            ?>

                                             <tr>

                                      

                                        <td><?=$order['first_name']?>&nbsp;<?=$order['last_name']?></td>

                                        <td><?=$order['email'] ?></td>

                                        <td><?=$order['mobile'] ?></td>

                                        <td><?=$order['address'] ?></td>

                                        <td><?=$order['city'] ?></td>

                                        <td><?=$order['zip'] ?></td>

                                         <td><?=$order['state'] ?></td>

                                        <td><?=$order_list['product_name'] ?></td>

                                        <td><?=$order_list['product_quantity'] ?></td>

                                        <td><?=$order_list['transaction_id'] ?></td>

                                        <td>$<?=$order_list['amount'] ?></td>

                                        <td><?=$order_list['date'] ?></td>

                                      <?php } 
                                        }
                                      ?>

                                  </tr>

                                </table>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-12 f-right">



                            </div>

                        </div>

            </div>

        </div>
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

    function checkDel() {

        if (confirm("Are you sure want to delete?")) {

            return true;

        } else {

            return false;

        }

    }

</script>

<?php include_once("common/footer.php"); ?>

