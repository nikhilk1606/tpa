<?php
include_once('../include/settings.php');
$id=$_REQUEST['id'];
// $query = "DELETE FROM team_sanction WHERE id = $id";
$query="UPDATE `team_sanction` SET `del_status`='1' WHERE `id`='$id'";
$del = mysqli_query($con,$query);
if($del){
$_SESSION['success'] = "You successfully deleted records.";
header("Location: display_team_sanction.php");
exit; 
}
?>