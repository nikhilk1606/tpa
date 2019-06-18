<?php
  include_once('../include/settings.php');
  if (!isset($_SESSION['id'])) {
    header('location: admin_login.php');
    exit;
  }
  $id=$_REQUEST['id'];
  $query = "DELETE FROM tbl_products WHERE product_id = $id";
  $result = mysqli_query($con,$query) or die ( mysqli_error());
  if ($result) {
    $_SESSION['success'] = "Product deleted successfully";
  }
  else{
    $_SESSION['error'] = "Problem while deleting product";
  }
  header("Location: product_list.php");
  die();
?>
