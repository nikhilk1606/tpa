<?php
include_once("../include/settings.php");
include_once("../include/functions.php");
$user = new User();
$delete_ids='';
if(isset($_POST['btn_delete_all'])=="Delete Selected")
{
	$delete_ids=implode(',',$_POST['checkbox']);
}
$table="sanction_players";
$condition="id in(".$delete_ids.")";
// $del = mysql_query("delete from " . $table . " where id IN(" . $delete_ids . ")");
$sql="UPDATE `player_sanction` SET `del_status`='1' WHERE `id`='$delete_ids' ";
$del=mysqli_query($con,$sql);
if($del){
	 $_SESSION['success'] = "You successfully deleted records.";	
	// echo "<script type='text/javascript'>window.location.href = 'display_player_sanction.php';</script>";
	 header("location: display_player_sanction.php"); 
	exit;
}
?>