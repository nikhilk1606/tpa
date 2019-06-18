<?php

session_start();

include_once('../include/settings.php');

include_once("../include/functions.php");

$user = new User();

error_reporting(1);
 $roster_id=$_SESSION['roster_id'];
if (!isset($_SESSION['id'])) {
    header('location: admin_login.php');
    exit;
}

$admin_ids = $_SESSION['id'];

extract($_POST);

 $id=$_GET['id'];

// $query = "DELETE FROM player_sanction WHERE id = $id";
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
echo "<script type='text/javascript'>window.location.href = 'roster_details.php?id=$roster_id';</script>";
die();
}
?>