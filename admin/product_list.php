<?php
include_once("../include/settings.php");
include_once("../include/functions.php");
$user = new User();

error_reporting(0);
if (!isset($_SESSION['id'])) {
    header('location: admin_login.php');
    exit;
}

$sql="SELECT * FROM `tbl_products`";
$result = mysqli_query($con, $sql);

?>
<?php  $page_name=basename($_SERVER['PHP_SELF']);?>
<?php include_once("../common/header.php"); ?>
</nav>

<div id="page-wrapper">
<div class="add-product">
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
    <div class="col-xs-12 col-sm-10 box-border">

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
    <h3 class="text-center">Shopping Products List </h3>
       <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Product Quantity</th>
                    <th>Product Price</th>
                    <th>Product Desc</th>


                    <th class="text-center">Product Image</th>

                    <th></th>
                    <!-- <th colspan="2" class="text-center">Functions</th> -->
                     <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?=$row['product_id'] ?></td>
                        <td><?=$row['product_name'] ?></td>
                        <td><?=$row['product_quantity'] ?></td>
                        <td><?=$row['product_price'] ?></td>
                        <td><?=$row['product_desc'] ?></td>
                        <td><img height="50" width="100" src="http://tech599.com/~tech599/tech599.com/johnonk/the-players-association/v1/admin/<?=$row['product_image'] ?>"></td>



                        <td><a href="edit_product.php?id=<?php echo $row["product_id"]; ?>"><!-- <button>Edit</button> --><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                         <a href="delete_product.php?id=<?php echo $row["product_id"]; ?>" onclick="return confirm('Are you sure you want to delete this record?');">
                          <!-- <button>Delete</button> --> <i class="fa fa-trash" aria-hidden="true"></i></a></td>

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

