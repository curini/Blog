<?php

	include 'db.php';

	session_start();

	$db = new db();
	$mysqli = $db->connect();
	
	if(!empty($_POST['message']) && !empty($_SESSION['login'])){
		$resultat = $db->update($mysqli,"INSERT INTO activite VALUES ('".$_SESSION['login']."','".$_POST['message']."','".$_SESSION['ip']."','".$_SESSION['systeme']."','".$_SESSION['navigateur']."',NOW(),0,NULL)");
		echo "INSERT INTO activite VALUES ('".$_SESSION['login']."','".$_POST['message']."','".$_SESSION['ip']."','".$_SESSION['systeme']."','".$_SESSION['navigateur']."',NOW(),0,NULL)";
		$db->update($mysqli,"UPDATE utilisateur SET nombre_message = nombre_message +1 WHERE  mail = '".$_SESSION['login']."' ");
	}
	
	$db->close($mysqli);
		
	header('location: ../home.php');
?>
