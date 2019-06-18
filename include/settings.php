<?php
error_reporting(0);
session_start();
define('DB_SERVER','localhost');
define('DB_USERNAME','tech599_players');
define('DB_PASSWORD','HWH24qW4AJ4x');
define('DB_DATABASE','tech599_theplayersassociation');
$sitepath="http://tech599.com/~tech599/tech599.com/johnonk/the-players-association/v1/admin/uploads/download.jpg";
class DB_Class {
	function __construct() 
	{
		$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die('Oops connection error -> ' . mysqli_error());
		mysql_select_db(DB_DATABASE,$connection) or die('Database error.. -> ' . mysql_error());
		mysql_query('SET NAMES utf8');
	}
}
$con=mysqli_connect('localhost','tech599_players','HWH24qW4AJ4x','tech599_theplayersassociation');

?>
