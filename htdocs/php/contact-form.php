<?php
	$errors = '';

	if(empty($_POST['name']) || 
	   empty($_POST['email']) || 
	   empty($_POST['message']) ||
	   $_POST['name'] == 'Name*' ||
	   $_POST['message'] == 'Nachricht*'
	) {
	    $errors .= "Fehler: Felder mit * sind erforderlich";
	}

	if(empty($_POST['phone']) ||
	   $_POST['phone'] == 'Telefon'
	) {
		$_POST['phone'] = 'keine Angabe';
	}

	require '../vendor/autoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->Host = 'localhost';
    $mail->Port = 25;
    //Use a fixed address in your own domain as the from address
    $mail->setFrom('webmaster@dengs.eu', 'Webmaster dengs.eu');
    //Send the message to yourself
    $mail->addAddress('marco@dengs.eu', 'Marco Dengs');
    //Put the submitter's address in a reply-to header
    $mail->addReplyTo($_POST['email'], $_POST['name']);
    //Define the Subject
    $mail->Subject = 'Kontaktformular dengs.eu';
    //Keep it simple - don't use HTML
    $mail->isHTML(false);
    //Message
    $mail->Body =  <<<EOT
E-Mail: {$_POST['email']}
Name: {$_POST['name']}
Telefon: {$_POST['phone']}
Nachricht:
{$_POST['message']}
EOT;

	if(empty($errors)) {
		$mail->send();
	}
?>

<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<title>Contact form handler</title>
	<style>
		#positive { color: #009900; }
		#negative { color: #ff0000; }
	</style>
</head>
<body>
<?php
	if(empty($errors)) {
		echo '<div id="positive"><strong>Erfolgreich!<br>Danke für das Ausfüllen des Kontaktformulars.</strong></div>';
	} else {
		echo '<div id="negative"><strong>'.$errors.'</strong></div>';
	}
?>
</body>
</html>