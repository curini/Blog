<?php

class db{

	var $server ="";// server (ex:localhost)
	var $user = "";//user to connect (ex: root)
	var $pass = "";// password to connect
	var $db = "";//name of database

	function connect(){
		if($mysqli = mysqli_connect($this->server,$this->user,$this->pass,$this->db))
			return $mysqli;
		else{
			return null;
		}
	}
	
	function query($mysqli,$query){
		$row = NULL;
		$results = mysqli_query($mysqli,$query);
		while($res = mysqli_fetch_assoc($results)){
			$row[] = $res;
		}
		mysqli_free_result($results);
		return $row;
	}
	
	function update($mysqli,$query){
		mysqli_query($mysqli,$query);
	}
	
	function close($mysqli){
		mysqli_close ($mysqli);
	}
}

?>
