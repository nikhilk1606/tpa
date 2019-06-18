<?php

  include_once('../include/settings.php');

  if (!isset($_SESSION['id'])) {

    header('location: admin_login.php');

    exit;

  }
  $umpire_id=$_REQUEST['id'];
   $s1="SELECT `del_status` FROM `umpire_sanction` WHERE `umpire_id`='$umpire_id'";
  $r2=mysqli_query($con,$s1);
  while ($r3=mysqli_fetch_assoc($r2)) {
    $de_um=$r3['del_status'];
    if($de_um=='1'){
      $sql2="UPDATE `umpire_sanction` SET `del_status`='0' WHERE `umpire_id`='$umpire_id'";
      $result2=mysqli_query($con,$sql2);
    }
  } 
 if($result2){
  $_SESSION['success']="Restore Umpire Successfully";
  header("location:restore_users.php");
  exit();
 }
 else {
   $_SESSION['error']="Please enter valid Umpire sanction ID";
  header("location:restore_users.php");
  exit;
 }