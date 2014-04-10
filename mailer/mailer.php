<?php 
  require("phpmailer/class.smtp.php");
  require("phpmailer/class.phpmailer.php");
  define('GUSER', 'sdiri.marwen@gmail.com'); // GMail username
  define('GPWD', 'kebilyvyyvjecpuv'); // GMail password
  
  if (isset($_GET['mail']) && isset($_GET['sujet']) && isset($_GET['texte'])){
  echo "test 111 " ;
  if (smtpmailer('sdiri.marwen@gmail.com', $_GET["mail"], 'TunisianWath', $_GET['sujet'], $_GET["texte"])) {
	echo "done !   ";
}
}
if (!empty($error)) echo $error;
  
  function smtpmailer($to, $from, $from_name, $subject, $body) { 
	global $error;
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->CharSet="UTF-8";
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = "465"; 
	$mail->Username = GUSER;  
	$mail->Password = GPWD;           
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'message sent successfully :)';
		return true;
	}
}


 
  
  
?>