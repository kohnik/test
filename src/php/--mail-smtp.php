<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$c = true;
$project_name = "siteName";
$form_subject = "Letter from siteName";
$email_from  = "klausvolley@gmail.com";
$name_from = "Admin siteName ";
$token = "1398641283:AAHEKJTJs4LO61owcBVwXOhCY4bMVfVF5X8";
$chat_id = "-491412641";
#will be sent to this mail
$admin_email  = "adebos@yandex.ru";

$txt = "<b>Site</b> ".$project_name."%0A";
$message = "
		" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
			<td style='padding: 10px; border: #e9e9e9 1px solid; width: 50%;'><b>Site</b></td>
			<td style='padding: 10px; border: #e9e9e9 1px solid; width: 50%;'>$project_name</td>
		</tr>
		";
foreach ( $_POST as $key => $value ) {
	if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" && $key != "email_from" ) {
		$message .= "
		" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
			<td style='padding: 10px; border: #e9e9e9 1px solid; width: 50%;'><b>$key</b></td>
			<td style='padding: 10px; border: #e9e9e9 1px solid; width: 50%;'>$value</td>
		</tr>
		";
		$txt .= "<b>".$key."</b> ".$value."%0A";
	}
}
$message = "<table style='width: 520px;'>$message</table>";

try {
  $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

  $mail = new PHPMailer;
  $mail->isSMTP();
  $mail->Port = 587;
  $mail->Host = 'xxxxx';
  $mail->SMTPAuth = true;
  $mail->Username = 'xxxxx';
  $mail->Password = 'xxxxx';
  $mail->CharSet = 'utf-8';
  $mail->From = $email_from;
  $mail->FromName = $name_from;
  $mail->AddAddress($admin_email);
  $mail->IsHTML(true);
  $mail->Subject = $form_subject;
  $mail->Body = $message;
  if($_FILES['Attachment'] && $_FILES['Attachment']['error'] == 0) {
    $mail->AddAttachment($_FILES['Attachment']['tmp_name'], $_FILES['Attachment']['name']);

    $url = "https://api.telegram.org/bot{$token}/sendDocument";
    $_document = $_FILES['Attachment']['tmp_name'];
    $document = new CURLFile(realpath($_document));
    $document->setPostFilename($_FILES['Attachment']['name']);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ["chat_id" => $chat_id, "document" => $document]);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type:multipart/form-data"]);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $out = curl_exec($ch);
    curl_close($ch);
  }
  if(!$mail->send()) echo 0;
  else echo 1;

} catch (Exception $e) {

echo $e->getMessage();
}

?>
