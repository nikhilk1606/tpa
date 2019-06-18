<?php

  include_once('../include/settings.php');

  if (!isset($_SESSION['id'])) {

    header('location: admin_login.php');

    exit;

  }

   $id=$_REQUEST['id'];

  $sq="DELETE FROM `add_tournament_details` WHERE `tournament_id`='$id'";
  $re=mysqli_query($con,$sq);
  
 if($re){
  $_SESSION['success']="Delete Tournament Successfully";
  header("location:view_tournament.php");
  exit;
 }
 else {
   $_SESSION['error']="please try again";
  header("location:view_tournament.php");
  exit;
 }
 

?>

