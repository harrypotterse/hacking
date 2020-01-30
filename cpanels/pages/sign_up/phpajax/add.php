<?php

error_reporting("E_ALL & ~E_NOTIC");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../autoload.php';
$mail = new PHPMailer(true);
require_once '../Settings.php';
require_once '../../../../Classes/Achieve.php';
require_once '../../../../FileConnection/Data_connection.php';
$a = new Achieve();
$true = TRUE;
$msgerr = "";
$array_var = array();
$array_var[] = $Title = filter_var($_POST['Title'], FILTER_SANITIZE_STRING);
$array_var[] = $Subject = filter_var($_POST['Subject'], FILTER_SANITIZE_STRING);
//=========================================
$body = "
<h1 style=' font-size: 50px; font-family: tahoma; color: #2cd9ee; text-align: left; text-transform: uppercase;  '>
الهندسة الاجتماعية
</h1>
<table style='background: #fafafa;font-family: tahoma;font-size: 12px;line-height: 51px;border: 1px ridge;padding: 0.5%;width: 100%;direction: rtl;text-align: center;/* box-shadow: -1px 4px #626262; */'>
    <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>firstname</td>
<td style=' border: 1px solid #ffffff;  font-family: tahoma;'>$Title</td>
    </tr>
      <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>lastname</td>
<td style=' border: 1px solid #ffffff;  font-family: tahoma;'>$Subject</td>
    </tr>
</table>";
//==================================
if (!$a->empty_filed($Title)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Subject)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;

if ($true == TRUE):
    try {
        $x = maile($a, $Data_communication);
        //==========================================================
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'mail.7huck.com ';
        $mail->SMTPAuth = true;
        $mail->Username = 'huckcom@7huck.com ';
        $mail->Password = 'huckcom@7huck.com ';
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('huckcom@7huck.com ', 'huckcom@7huck.com ');
        $nb = count($x);
        for ($i = 0; $i < $nb; $i++) {
            $mail->addAddress($x[$i]);
        }
        $mail->isHTML(true);
        $mail->Subject = "الهندسة الاجتماعية";
        $mail->Body = $body;
        $mail->send();
        $msgerr .= "<div class='alert alert-success'>تم بنجاح اضافة موضوع جديد</div>";
//    ===============================================
    } catch (PDOException $ex) {
        echo $ex;
    }
endif;
echo $msgerr;
?>