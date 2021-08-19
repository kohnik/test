<?php

$method = $_SERVER['REQUEST_METHOD'];

/* https://api.telegram.org/botXXXXXXXXXXXXXXXXXXXXXXX/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее в @BotFather
в ответе сервера взять поле chat.id, значение с минусом для chat_id*/

if ( $method === 'POST' ) {

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
		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid; width: 50%;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid; width: 50%;'>$value</td>
			</tr>
			";
		  $txt .= "<b>".$key."</b> ".$value."%0A";
		}
	}
}
$message = "<table style='width: 520px;'>$message</table>";

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
function adopt($text) {
	return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <'.$email_from.'>' . PHP_EOL .
'Reply-To: '.$admin_email.'' . PHP_EOL;

mail($admin_email, adopt($form_subject), $message, $headers );
