<?php
session_start();
include_once('../include/settings.php');
include_once("../include/functions.php");
$user = new User();
error_reporting(1);
if (!isset($_SESSION['sd_id'])) {
    header('location: state_director_login.php');
    exit;
}
$admin_ids = $_SESSION['sd_id'];
extract($_POST);
$id=$_REQUEST['id'];
// $query = "DELETE FROM player_sanction WHERE id = $id";
"UPDATE `player_sanction` SET `del_status`='1' WHERE `id`='$id'";
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: display_player_sanction.php"); 
?>