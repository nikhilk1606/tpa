<?php
error_reporting(0);
session_start();
/*define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'tech599_player');
define('DB_PASSWORD', '{ss3%6zB[q?W');
define('DB_DATABASE', 'tech599_the-players-association');

class DB_Class {
	function __construct() 
	{
		$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die('Oops connection error -> ' . mysqli_error());
		mysqli_select_db(DB_DATABASE, $connection) or die('Database error -> ' . mysql_error());
		mysqli_query('SET NAMES utf8');
	}
}*/
//$con=mysqli_connect('localhost','tech599_players','HWH24qW4AJ4x','tech599_theplayersassociation');
$con = mysqli_connect("localhost","tech599_player","{ss3%6zB[q?W","tech599_the-players-association");
?>
