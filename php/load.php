<?php
	include 'db.php';
	include 'xml.php';

	$db = new db();
	$mysqli = $db->connect();

    $xml = createXml();

	$resultat = $db->query($mysqli,"SELECT * FROM activite,utilisateur WHERE mail = email ORDER BY heure DESC LIMIT 20");

	if($resultat != NULL){
		foreach($resultat as $res){
			echo "
	<div class='message-box'>
		<p id='texte-box".$res['id']."'>
                           ".$res['message']."
                </p>
                <button class='add' id='add".$res['id']."' > + </button>
                <span id='vote".$res['id']."'>".$res['vote']."</span>
                <button class='min' id='min".$res['id']."' > - </button>
		<i>".$res['prenom']." ".$res['nom']."  ".$res['heure']."</i>
	</div>
	<script src='js/bouton.js'></script>";

	              $xml .= '<item>';
	              $xml .= '<title>Message de '.$res['prenom'].' '.$res['nom'].'</title>';
	              $xml .= '<link>'.$_SERVER['SERVER_NAME'].'</link>';
	              $xml .= '<pubDate>'.$res['heure'].'</pubDate>'; 
	              $xml .= '<description>'.$res['message'].'</description>';
	              $xml .= '</item>';	
		}

                $xml .= '</channel>';
                $xml .= '</rss>';
                fileXml($xml);				
	}

?>
