<?php
	$mes ="";
	
	if(isset($_GET['pb'])){
		if($_GET['pb'] == 'p')
			$mes = "<p class='message-info'>Il faut remplir tous les champs afin de compléter l'inscription.</p>";
		else if($_GET['pb'] == 'm')
			$mes = "<p class='message-info'>L'adresse mail est déja utilé par un utilisateur, il faut en inscrire une autre.</p>";
		else if($_GET['pb'] == 'o')
			$mes = "<p class='message-info'>Pour vous connecter, cliquez sur le lien envoyer à votre boîte mail.</p>";
		else if($_GET['pb'] == 's')
			$mes = "<p class='message-info'>Mauvais code transmis.</p>";
	}

?>