<?php
session_start();
include_once("../include/settings.php");
include_once("../include/functions.php");

$email=$_POST["hps_level"];
	 //$sql="SELECT email FROM umpire_sanction WHERE email= \'mike111taylor@gmail.com\'";
	$sql="SELECT  * FROM state_director WHERE email='$email'";	
	$result=mysqli_query($con,$sql);
	$count=mysqli_num_rows($result);
if($count==0){echo "0";}else{echo "1"; }


?>