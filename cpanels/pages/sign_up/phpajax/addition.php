<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'autoload.php';
$mail = new PHPMailer(true);
try {
    $body = "
<h1 style=' font-size: 50px; font-family: tahoma; color: #2cd9ee; text-align: left; text-transform: uppercase;  '>
Contact Us
</h1>
<table style='background: #fafafa;font-family: tahoma;font-size: 12px;line-height: 51px;border: 1px ridge;padding: 0.5%;width: 100%;direction: rtl;text-align: center;/* box-shadow: -1px 4px #626262; */'>
    <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>firstname</td>
<td style=' border: 1px solid #ffffff;  font-family: tahoma;'>$firstname</td>
    </tr>
      <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>lastname</td>
<td style=' border: 1px solid #ffffff;  font-family: tahoma;'>$lastname</td>
    </tr>
    <tr>
          <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>email</td>
<td style=' border: 1px solid #ffffff;  font-family: tahoma;'>$email</td>
    </tr>
    <tr>
          <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>subject</td>
<td style=' border: 1px solid #ffffff;  font-family: tahoma;'>$subject</td>
    </tr>
    <tr>
              <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>the message</td>
<td style=' border: 1px solid #ffffff;  font-family: tahoma;'>$message</td>
    </tr>
    <tr>
</table>";
    $to = "mr.bean.mg22@gmail.com";
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'mail.7huck.com ';
    $mail->SMTPAuth = true;
    $mail->Username = 'huckcom@7huck.com ';
    $mail->Password = 'huckcom@7huck.com ';
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('huckcom@7huck.com ', 'huckcom@7huck.com ');
    $mail->addAddress($to);
    $mail->isHTML(true);
    $mail->Subject = "Script implemented";
    $mail->Body = $body;
    $mail->send();
} catch (Exception $exc) {
    echo $exc->getMessage();
}

?>