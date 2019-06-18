<?php
session_start();
include_once('../include/settings.php');
if (!isset($_SESSION['id'])) {

    header('location: admin_login.php');

    exit;

}
$id=$_REQUEST['id'];
// $query = "DELETE FROM player_sanction WHERE id = $id";
$query="UPDATE `player_sanction` SET `del_status`='1' WHERE `id`='$id'";
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: display_player_sanction.php");
?>

