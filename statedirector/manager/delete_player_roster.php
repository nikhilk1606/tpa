<?php
session_start();
include_once("../../include/settings.php");
    if(!isset($_SESSION['id'])) {
	 header('location: ../../team_login.php'); exit;
	}
$admin_ids = $_SESSION['id'];
extract($_POST);
$roster_id=$_SESSION['roster_id'];
$id=$_REQUEST['id'];
$sql = "DELETE FROM `add_rosters` WHERE`roster_id`='$roster_id' AND `player_id`='$id'";
$res=mysqli_query($con,$sql);
if($res){
$query="UPDATE `player_sanction` SET `status`='0' WHERE `id`='$id'";

$result = mysqli_query($con,$query);
}
if($result){
$_SESSION['success'] = "Player successfully removed from roster!!";

// header("Location: add_roster_players.php");
// echo"<script>window.location='add_roster_players.php';</script>";
echo "<script type='text/javascript'>window.location.href = 'add_roster_players.php?id=$roster_id';</script>";
die();
}

 
?>
