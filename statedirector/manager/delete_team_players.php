<?php
session_start();
include_once("../../include/settings.php");
error_reporting(1);

$id=$_GET['id'];
$sq="UPDATE  `player_sanction` SET `del_status`='1' WHERE `id`='$id'";
$rs=mysqli_query($con,$sq);
if($rs){
	$_SESSION['success']="delete team player successfully";
	header("location:team_players.php");
	exit();
}

?>