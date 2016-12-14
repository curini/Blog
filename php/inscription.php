<?php

	include 'db.php';
	include_once '../securimage/securimage.php';
	
	session_start ();

	$db = new db();
	$mysqli = $db->connect();

	$securimage = new Securimage();

	$resultat = $db->query($mysqli,"SELECT mail FROM utilisateur");

	function cryptage($val){
		return sha1("poulet".$val."roti");
	}

	if($securimage->check($_POST['captcha_code']) == false){
		$db->close($mysqli);
		header('location: ../index.php?pb=s');
	}

	elseif (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['prenom']) && !empty($_POST['nom']) ) {

		if($resultat != NULL){
			foreach($resultat as $email){
				if($email['mail'] === $_POST['email'])
					$err = 1;
			}
		}
		if(!isset($err) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$db->update($mysqli,"INSERT INTO utilisateur VALUES ('".$_POST['email']."','".cryptage($_POST['password'])."','".$_POST['prenom']."','".$_POST['nom']."',0)");

			$db->update($mysqli,"INSERT INTO creation VALUES ('".$_POST['email']."',0,'".cryptage($_POST['email'])."')");
			
			$db->close($mysqli);

			include 'email.php';
			header('location: ../index.php?pb=o');
		}
		else{
			$db->close($mysqli);
			header('location:../index.php?pb=m');
		}

	}
	else{
		$db->close($mysqli);
		header('location: ../index.php?pb=p');
	}

?>
