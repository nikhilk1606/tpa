<?php
session_start();
include_once("include/settings.php");
$echeck="select email from player_sanction where email=".$_POST['email'];
   $echk=mysqli_query($con,$echeck);
   $ecount=mysqli_num_rows($echk);
  if($ecount!=0)
   {
      echo "Email already exists";
   }
   ?>