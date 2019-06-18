<?php
session_start();

include_once("../include/settings.php");
include_once("../include/functions.php");
$user = new User();
    if(!isset($_SESSION['sd_id'])) {

   header('location: state_director_login.php'); exit;

  }
  $roster_id=$_GET['rid'];
  	 $p_id=$_SESSION['pid'];
    $sql="SELECT * FROM `player_sanction` WHERE `id`='$p_id' ";
    $result21=mysqli_query ($con,$sql);
    while($fetch = mysqli_fetch_assoc($result21))
    {
      $player_id=$fetch['player_id'];
    }
   $qry = "SELECT * FROM `add_rosters` WHERE `roster_id`= '$roster_id' AND `player_id` = '$p_id'";
  $qry11 = mysqli_query($con,$qry);
  $rowcount = mysqli_num_rows($qry11);
  while($result_qry = mysqli_fetch_assoc($qry11)){
    $ro_id = $result_qry['ro_id'];
  }

  if($rowcount > 0){
    // echo "hello";die;
    $_SESSION['error']="Player is already in this roster";
		echo "<script type='text/javascript'>window.location.href = 'assign_to_roster.php?pid=$p_id';</script>";
    exit();
  }else
    {
       $sql1="INSERT INTO `add_rosters`(`roster_id`, `player_id`, `player_sanction_id`) VALUES ('$roster_id','$p_id','$player_id')";
      $result2=mysqli_query($con,$sql1);
    }
  if($result2){
  	 $up="UPDATE `player_sanction` SET `status`='1' WHERE `id`=$p_id";
  	$res=mysqli_query($con,$up);
  }
  if($res){
  	$_SESSION['success']="Player Inserted Successfully to roster";
  	echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
    unset($_SESSION['pid']);
  	 // header("location:add_roster_players.php");
  	exit();
  }
  else
  {
  	$_SESSION['error']="Please Try again later";
  	echo "<script type='text/javascript'>window.location.href = 'assign_to_roster.php?pid=$p_id';</script>";
  	 // header("location:add_roster_players.php");
  	exit();
  }
// $sql="SELECT * FROM `player_sanction` WHERE `id`='$player_id' ";
// $result=mysqli_query ($con,$sql);
//  $sql2="SELECT * FROM `rosters` WHERE `r_id`='$roster_id' ";
// $result1=mysqli_query($con,$sql2);
//
// while ($row=mysqli_fetch_assoc($result)) {
//  $player_id=$row['player_id'];
// 	   $class=$row['class'];echo"<br>";
// 	while($row2=mysqli_fetch_assoc($result1)){
// 	    $class1=$row2['class']; echo"<br>";
// 		 strcmp('$class', '$class1');
// 		if($class == $class1){
//
// 		   $sql1="INSERT INTO `add_rosters`(`roster_id`, `player_id`, `player_sanction_id`) VALUES ('$roster_id','$player_id','$player_id')";
// 		$result2=mysqli_query($con,$sql1);
//
// 		}
// 		else{
// 		$_SESSION['error']="Player has different class";
// 		echo "<script type='text/javascript'>window.location.href = 'add_roster_players.php?id=$roster_id';</script>";
// 		 // header("location:add_roster_players.php");
// 		exit();
// 		}
// 	}
// }
// if($result2){
// 	 $up="UPDATE `player_sanction` SET `status`='1' WHERE `id`=$player_id";
// 	$res=mysqli_query($con,$up);
// }
// if($res){
// 	$_SESSION['message']="Player Inserted Successfully";
// 	echo "<script type='text/javascript'>window.location.href = 'add_roster_players.php?id=$roster_id';</script>";
// 	 // header("location:add_roster_players.php");
// 	exit();
// }
// else
// {
// 	$_SESSION['error']="Please Try again later";
// 	echo "<script type='text/javascript'>window.location.href = 'add_roster_players.php?id=$roster_id';</script>";
// 	 // header("location:add_roster_players.php");
// 	exit();
// }
?>
