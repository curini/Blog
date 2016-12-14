 <?php
 
	require '../PHPMailer/PHPMailerAutoload.php';
	
	$mail = new PHPMailer;

	$mail->isMail();                                      
	$mail->Host = 'smtp.gmail.com';           
	$mail->Port = 587;                                   
	$mail->SMTPAuth = true;                              
	$mail->Username = 'xxxxxx@gmail.com'; // gmail address              
	$mail->Password = 'xxxxxxxxx';  // password               
	$mail->SMTPSecure = 'tls';                          
	
	$mail->From = $mail->Username;
	$mail->FromName = 'no reply';
	
	
	
	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$mail->AddAddress($_POST['email'], $_POST['prenom']); 
	}
	
	$mail->IsHTML(true);                           
	$mail->Subject = "Inscription sur la plateforme de boite";
	$mail->Body    = "
			<div style='width:80%;margin:auto;'>
			<h2 style='background-color:#4E69A2;color:#eee;margin-bottom:10px;padding:3px;'>
                        DIALOG BOX
                        </h2>
			<h4>Bonjour ".$_POST['prenom'].",</h4>
			<p>Votre identiant est : ".$_POST['email']." .</p>
			<p>Pour valider votre compte cliquer sur ce lien: 
                        <a style='display:block;width:145px;border:2px solid #4E69A2;color:#eee;text-decoration:none;outline:none;text-align:center;margin-top:10px;font-size:20px;border-radius:3px;' href=".$_SERVER['SERVER_NAME']."'/validation.php?mess=".cryptage($_POST['email'])."'>Cliquer ici</a> 
                        </p>
			<p>Merci pour votre inscription,</p>
			<i>L'administrateur du site dialog-box</i>
                        <p style='font-size:9px;'>Ceci est un mail automatique ne pas repondre,vous devez confirmez votre adresse email pour acceder à votre espace</p>
			</div>";	
	
	if(!$mail->Send()) {
		exit;
	}
	
	

?>
    
