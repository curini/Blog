<?php
	include 'php/db.php';
	session_start ();

	function cryptage($val){
		return sha1("poulet".$val."roti");
	}
	
	if(!empty($_SESSION['login'])){
		$db = new db();
		$mysqli = $db->connect();

		$utilisateur = $db->query($mysqli,"SELECT * FROM utilisateur WHERE mail='".$_SESSION['login']."' AND password='".cryptage($_SESSION['password'])."' ");
		
		include 'html/header.html';
		include 'html/home.html';
		include 'html/footer.html';	
	}
	else{
		header('location: index.php');
	}

?>
