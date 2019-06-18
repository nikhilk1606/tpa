<?php
session_start();
include_once("include/settings.php");
$login_id=$_POST["hps_level"];
	 //$sql="SELECT email FROM umpire_sanction WHERE email= \'mike111taylor@gmail.com\'";
	$sql="SELECT  * FROM umpire_sanction WHERE login_id='$login_id'";	
	$result=mysqli_query($con,$sql);
	$count=mysqli_num_rows($result);
if($count==0){echo "0";}else{echo "1"; }


?>