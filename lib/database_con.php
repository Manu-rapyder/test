<?php
class connect {
	public $conn;

	function __construct() { 
		$this->conn = mysqli_connect("localhost","intotech_intonat","intonat@123","intotech_intonation_demo") or die ('Failed to connect to the database');
	}
	function __destruct() {
		$ans=$this->conn->close();
	}
}

?>