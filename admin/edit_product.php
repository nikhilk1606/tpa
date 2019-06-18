<?php
session_start();
include_once("../include/settings.php");
include_once("../include/functions.php");
$user       = new User();

if (!isset($_SESSION['id'])) {
    header('location: admin_login.php');
    exit;
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$res = mysqli_query($con, "SELECT * FROM tbl_products WHERE product_id=$id");
$row1 = mysqli_fetch_assoc($res);
?>
<?php
  if (isset($_POST['submit'])) {
    $name       = $_POST['name'];
    $quantity   = $_POST['quantity'];
    $price      = $_POST['price'];
    $desc       = $_POST['desc'];

    $fileExistsFlag = 0;
    $fileName = $_FILES['upload_photo']['name'];

    $query = "SELECT image_name FROM tbl_products WHERE image_name='$fileName'";
    $result = $con->query($query) or die("Error : ".mysqli_error($con));
    while($row = mysqli_fetch_array($result)) {
      if($row['image_name'] == $fileName) {
        $fileExistsFlag = 1;
      }
    }
    /*
    * If file is not present in the destination folder
    */
    if($fileExistsFlag == 0) {
      $target = "uploads/";
      $fileTarget = $target.$fileName;
      $tempFileName = $_FILES["upload_photo"]["tmp_name"];

      $result = move_uploaded_file($tempFileName,$fileTarget);
      /*
      *  If file was successfully uploaded in the destination folder
      */
      if($result) {

        $query = "UPDATE tbl_products SET image_name = '$fileName', product_name = '$name', product_quantity = '$quantity', product_price = '$price', product_desc = '$desc', product_image = '$fileTarget' WHERE product_id = $id ";
        $con->query($query) or die("Error : ".mysqli_error($con));
        $_SESSION['success'] = "Product updated successfully";
      }
      else {
        $query = "UPDATE tbl_products SET product_name = '$name', product_quantity = '$quantity', product_price = '$price', product_desc = '$desc' WHERE product_id = $id ";
        $con->query($query) or die("Error : ".mysqli_error($con));
        $_SESSION['success'] = "Product updated successfully";

      }
      mysqli_close($con);
    }
    /*
    * If file is already present in the destination folder
    */
    else {
      $_SESSION['error'] = "File <html><b><i>".$fileName."</i></b></html> already exists in your folder. Please rename the file and try again.";
      mysqli_close($con);
    }
    header("Location:product_list.php");
    die();
  }
  ?>
<?php include_once("../common/header.php"); ?>

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
    <div class="col-xs-12 col-sm-10">
      <?php if(isset($_SESSION['success']) && $_SESSION['success']!= ""){?>
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?=$_SESSION['success']?>
            <?php unset($_SESSION['success']);?>
        </div>
        <?php }?>
        <?php if(isset($_SESSION['error']) && $_SESSION['error']!= ""){?>
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?=$_SESSION['error']?>
            <?php unset($_SESSION['error']);?>
        </div>
        <?php }?>
      <form class="dualwindow_left" id="cform" method="POST" novalidate="novalidate" enctype="multipart/form-data">
        <div class="form-group col-sm-6 wow fadeInUp delay4" style="visibility: visible; animation-name: fadeInUp;">
          <label>Product Name</label>
          <input type="text" name="name" class="form-control str" placeholder="Product Name" value="<?php echo $row1['product_name'];?>" required>
        </div>
        <div class="form-group col-sm-6 wow fadeInUp delay3" style="visibility: visible; animation-name: fadeInUp;">
          <label>Product Quantity</label>
          <input type="text" name="quantity" class="form-control" id="" placeholder="Product Quantity" value="<?php echo $row1['product_quantity'];?>" required>
        </div>
        <div class="form-group col-sm-6 wow fadeInUp delay2" style="visibility: visible; animation-name: fadeInUp;">
          <label>Product Price</label>
          <input type="text" name="price" class="form-control" placeholder="Product Price" value="<?php echo $row1['product_price'];?>">
        </div>
        <div class="form-group col-sm-6 wow fadeInUp delay2" style="visibility: visible; animation-name: fadeInUp;">
          <label>Product Images</label>
          <input type="file" name="upload_photo" class="form-control">
        </div>
        <div class="form-group col-sm-12 wow fadeInUp delay1" style="visibility: visible; animation-name: fadeInUp;">
          <label>Product Description</label>
          <textarea class="form-control" name="desc" rows="3" placeholder="<?php echo $row1['product_desc'];?>"></textarea>
        </div>
         <button type="submit" name="submit" class="btn btn-primary search-btn">Update</button>
      </form>
   </div>
  </div>
</div>
