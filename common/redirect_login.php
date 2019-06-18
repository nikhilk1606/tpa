<?php
//if not in session then redirect to home page.
include_once("../include/config.php");
include_once("include/functions.php");
if(empty($_SESSION['user_details'])){
	header("location:".SITEROOT);	
}
?>