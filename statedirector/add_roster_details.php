<?php
session_start();
 $roster_id=$_SESSION['roster_id'];
include_once("../include/settings.php");
include_once("../include/functions.php");
$user = new User();
$insert_id=$_GET['id'];


$sql="SELECT * FROM `player_sanction` WHERE `id`='$insert_id' ";
$result=mysqli_query ($con,$sql);
 $sql2="SELECT * FROM `rosters` WHERE `r_id`='$roster_id' ";
$result1=mysqli_query($con,$sql2);

while ($row=mysqli_fetch_assoc($result)) {
 $player_id=$row['player_id']; 
	   $class=$row['class'];echo"<br>";
	while($row2=mysqli_fetch_assoc($result1)){
	    $class1=$row2['class']; echo"<br>";
		 strcmp('$class', '$class1');
		if($class == $class1){

		   $sql1="INSERT INTO `add_rosters`(`roster_id`, `player_id`, `player_sanction_id`) VALUES ('$roster_id','$insert_id','$player_id')";
		$result2=mysqli_query($con,$sql1);
		
		}
		else{
		$_SESSION['error']="Player has different class";
		echo "<script type='text/javascript'>window.location.href = 'add_roster_players.php?id=$roster_id';</script>";
		 // header("location:add_roster_players.php");
		exit();
		}
	}
}
if($result2){
	 $up="UPDATE `player_sanction` SET `status`='1' WHERE `id`=$insert_id";
	$res=mysqli_query($con,$up);
}
if($res){
	$_SESSION['message']="Player Inserted Successfully";
	echo "<script type='text/javascript'>window.location.href = 'add_roster_players.php?id=$roster_id';</script>";
	 // header("location:add_roster_players.php");
	exit();
}
else
{
	$_SESSION['error']="Please Try again later";
	echo "<script type='text/javascript'>window.location.href = 'add_roster_players.php?id=$roster_id';</script>";
	 // header("location:add_roster_players.php");
	exit();
}
?>