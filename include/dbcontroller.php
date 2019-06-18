<?php
class DBController {
	private $host = "localhost";
	private $user = "tech599_players";
	private $password = "HWH24qW4AJ4x";
	private $database = "tech599_theplayersassociation";
	private $conn;
	// $sitepath="http://tech599.com/~tech599/tech599.com/johnonk/the-players-association/v1/admin/uploads/download.jpg";
	function __construct() {
		$this->conn = $this->connectDB();
	}

	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}

	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}

	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;
	}
}
?>
