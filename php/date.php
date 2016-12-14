<?php
	function calendrier(){

		$mois = date("m");
		$jour = date("N");
		$nb = date("d");
		$an = date("Y");

		if($mois == 1)
			$mois = "Janvier";
		else if($mois == 2)
			$mois = "Fevrier";
		else if($mois == 3)
			$mois = "Mars";
		else if($mois == 4)
			$mois = "Avril";
		else if($mois == 5)
			$mois = "Mai";
		else if($mois == 6)
			$mois = "Juin";
		else if($mois == 7)
			$mois = "Juillet";
		else if($mois == 8)
			$mois = "Août";
		else if($mois == 9)
			$mois = "Septembre";
		else if($mois == 10)
			$mois = "Octobre";
		else if($mois == 11)
			$mois = "Novembre";
		else
			$mois = "Décembre";


		if($jour == 1)
			$jour = "Lundi";
		else if($jour == 2)
			$jour = "Mardi";
		else if($jour == 3)
			$jour = "Mercredi";
		else if($jour == 4)
			$jour = "Jeudi";
		else if($jour == 5)
			$mois = "Vendredi";
		else if($jour == 6)
			$jour = "Samedi";
		else
			$jour = "Dimanche";


		return $jour." ".$nb." ".$mois." ".$an;

	}
?>