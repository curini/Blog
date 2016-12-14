<?php

	include 'db.php';
	include 'cookie.php';

	$db = new db();
	$mysqli = $db->connect();

	function cryptage($val){
		return sha1("poulet".$val."roti");
	}

	if (isset($_POST['login']) && isset($_POST['password'])) {
	
		$resultat = $db->query($mysqli,"SELECT * FROM utilisateur WHERE mail='".$_POST['login']."' AND password='".cryptage($_POST['password'])."' ");
		if ($resultat != NULL) {

			$result = $db->query($mysqli,"SELECT * FROM creation WHERE email='".$_POST['login']."' ");
			if($result != NULL){
				foreach($result as $var){

					if( $var['actif'] == 1){

						session_start ();

						$_SESSION['login'] = $_POST['login'];
						$_SESSION['password'] = $_POST['password'];

						$_SESSION['ip'] =  $_SERVER['REMOTE_ADDR']; 

						$_SESSION['navigateur'] =  getBrowser();
						$_SESSION['systeme'] = getOS();
						
						$db->close($mysqli);

						header ('location: ../home.php');
					}
				}
			}
			else{

				$db->close($mysqli);
				header('location: ../index.php?pb=o');     
			}
		}
		else{
			$db->close($mysqli);
			header('location: ../index.php?pb='.cryptage($_POST['password']));

		}
	}

?>
