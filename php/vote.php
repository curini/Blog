<?php

	include 'db.php';

	session_start();

	$db = new db();
	$mysqli = $db->connect();
	
	if(!empty($_GET['message']) && !empty($_SESSION['login'])){
		$resultat = $db->update($mysqli,"UPDATE activite SET 
vote=".$_GET['vote']." WHERE id = ".$_GET['id']."");
		
	}
	
	$db->close($mysqli);
		
	header('location: ../home.php')
?>
