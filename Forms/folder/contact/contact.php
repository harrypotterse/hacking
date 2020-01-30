<?php
try {
   $messagesend = "
<h1 style=' font-size: 50px; font-family: tahoma; color: #2cd9ee; text-align: left; text-transform: uppercase;  '>
اتصل بنا
</h1>
<table style='background: #fafafa;font-family: tahoma;font-size: 12px;line-height: 51px;border: 1px ridge;padding: 0.5%;width: 100%;direction: rtl;text-align: center;/* box-shadow: -1px 4px #626262; */'>
    <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>الاسم الاول </td>
<td style=' border: 1px solid #ffffff;  font-family: tahoma;'>$name</td>
    </tr>
      <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>الاسم الاخير </td>
<td style=' border: 1px solid #ffffff;  font-family: tahoma;'>$last_name</td>
    </tr>
    <tr>
     <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>الايميل</td>
<td style=' border: 1px solid #ffffff;  font-family: tahoma;'>$email</td>
    </tr>
    <tr>
     <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>رقم الجوال </td>
<td style=' border: 1px solid #ffffff; font-family: tahoma; '>$phone</td>
    </tr>
         <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>الرسالة</td>
<td style=' border: 1px solid #ffffff; font-family: tahoma; '>$message</td>
    </tr>
</table>";
    $to = "mr.bean.mg22@gmail.com";
    $addAddress = "Mail message : $email";
    $mail->SMTPDebug =0;
    $mail->isSMTP();
    $mail->Host = 'a2plcpnl0890.prod.iad2.secureserver.net';
    $mail->SMTPAuth = true;
    $mail->Username = 'test@digi-gates.com';
    $mail->Password = 'test@digi-gates.com';
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('test@digi-gates.com', 'test@digi-gates.com');
    $mail->addAddress($to);
    $mail->isHTML(true);
    $mail->Subject = $addAddress;
    $mail->MsgHTML($messagesend);
    $mail->send();
} catch (Exception $exc) {
    echo $exc->getMessage();
}
?>