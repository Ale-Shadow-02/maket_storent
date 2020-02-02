<?php 

$phone = $_POST['user-phone'];
$name = $_POST['user-name'];
$text = $_POST['user-text'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'sasha.ten.66@bk.ru';                 // Наш логин
$mail->Password = 'Shadow_02';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('sasha.ten.66@bk.ru', 'Ура! Заявка!');   // От кого письмо 
$mail->addAddress('dvoryadkin66@mail.ru');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Это новая заявка с сайта Maket Storent';
$mail->Body    = 'Пользователь: ' . $name . ' оставил заявку <br> 
	Телефон: ' . $phone . '<br>Текст сообщения: <br>' .$text;
$mail->AltBody = 'Это альтернативный текст';

if(!$mail->send()) {
    echo "Error";
} else {
    header('location:../thanks.html');
}

?>