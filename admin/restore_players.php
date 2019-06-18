<?php

  include_once('../include/settings.php');

  if (!isset($_SESSION['id'])) {

    header('location: admin_login.php');

    exit;

  }

   $id=$_REQUEST['id'];

  $sq="SELECT `del_status` FROM `player_sanction` WHERE `player_id`='$id'";
  $re=mysqli_query($con,$sq);
  while($r=mysqli_fetch_assoc($re)){
    $de_pl=$r['del_status'];
    if($de_pl=='1'){
  
    $sql="UPDATE `player_sanction` SET `del_status`='0' WHERE `player_id`='$id'";
    $result=mysqli_query($con,$sql);
     }
  }
 if($result){
  $_SESSION['success']="Restore Player Successfully";
  header("location:restore_users.php");
  exit;
 }
 else {
   $_SESSION['error']="Please enter valid player sanction ID";
  header("location:restore_users.php");
  exit;
 }
 

?>

