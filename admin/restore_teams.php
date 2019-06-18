<?php

  include_once('../include/settings.php');

  if (!isset($_SESSION['id'])) {

    header('location: admin_login.php');

    exit;

  }
  $team_id=$_REQUEST['id'];
  $s="SELECT `del_status` FROM `team_sanction` WHERE `team_id`='$team_id'";
  $rs=mysqli_query($con,$s);
  while($r1=mysqli_fetch_assoc($rs)){
     $de_tm=$r1['del_status'];
    if ($de_tm=='1') {
      $sql1="UPDATE `team_sanction` SET `del_status`='0' WHERE `team_id`='$team_id'";
      $result1=mysqli_query($con,$sql1);
    }
  }
 if($result1){
  $_SESSION['success']="Restore Team Successfully";
  header("location:restore_users.php");
  exit();
 }
 else {
   $_SESSION['error']="Please enter valid Team sanction ID";
  header("location:restore_users.php");
  exit;
 }
 ?>