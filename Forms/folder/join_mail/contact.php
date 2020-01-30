<?php
require_once '../Settings.php';
try {
    $file = "contact_form.php";
    $body = file_get_contents($file);
    $body = str_replace("{{col1}}", "الاسم الاول ", $body);
    $body = str_replace("{{col2}}", "اللقب", $body);
    $body = str_replace("{{col3}}", "الايميل", $body);
    $body = str_replace("{{col4}}", "رقم الجوال ", $body);
    $body = str_replace("{{col5}}", "الرسالة ", $body);
    //==================================================================  
    $body = str_replace("{{name1}}", $name, $body);
    $body = str_replace("{{name2}}", $email, $body);
    $body = str_replace("{{name3}}", $phone, $body);
    $body = str_replace("{{name4}}", $Membership, $body);
    $body = str_replace("{{name5}}", $Identity, $body);
    $to = "mr.bean.mg22@gmail.com";
    $addAddress = "Mail message : $email";
    $mail->SMTPDebug = 0;
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
    $mail->MsgHTML($body);
    $mail->send();
} catch (Exception $exc) {
    echo $exc->getMessage();
}
?>
?>