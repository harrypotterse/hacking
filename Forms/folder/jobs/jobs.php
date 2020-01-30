<?php
try {
    $to = "mr.bean.mg22@gmail.com";
    $addAddress = "أستماره التوظيف : $First_Name   $Last_Name";
    $mail->SMTPDebug = 0;
    $messagesend = "
<h1 style=' font-size: 50px; font-family: tahoma; color: #2cd9ee; text-align: left; text-transform: uppercase;  '>
أستماره التوظيف
</h1>
<table style='background: #fafafa;font-family: tahoma;font-size: 12px;line-height: 51px;border: 1px ridge;padding: 0.5%;width: 100%;direction: rtl;text-align: center;/* box-shadow: -1px 4px #626262; */'>
    <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>الاسم الاول </td>
<td style=' border: 1px solid #ffffff;  font-family: tahoma;'>$First_Name</td>
    </tr>
      <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>الاسم الاخير </td>
<td style=' border: 1px solid #ffffff;  font-family: tahoma;'>$Last_Name</td>
    </tr>
    <tr>
     <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>الايميل</td>
<td style=' border: 1px solid #ffffff;  font-family: tahoma;'>$Email</td>
    </tr>
    <tr>
     <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>رقم الجوال </td>
<td style=' border: 1px solid #ffffff; font-family: tahoma; '>$mobile</td>
    </tr>
         <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>النوع</td>
<td style=' border: 1px solid #ffffff; font-family: tahoma; '>$Kind</td>
    </tr>
         <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>المدينة</td>
<td style=' border: 1px solid #ffffff; font-family: tahoma; '>$City</td>
    </tr>
         <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>المؤهل</td>
<td style=' border: 1px solid #ffffff; font-family: tahoma; '>$qualification</td>
    </tr>
         <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>الفرع</td>
<td style=' border: 1px solid #ffffff; font-family: tahoma; '>$Branch</td>
    </tr>
        <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>نوع الوظيفة  </td>
<td style=' border: 1px solid #ffffff; font-family: tahoma; '>$Job_type</td>
    
    </tr>
            <tr>
<td style=' width: 100px; text-transform: uppercase; padding: 1%; border: 1px solid #ffffff; font-family: tahoma; '>التاريخ </td>
<td style=' border: 1px solid #ffffff; font-family: tahoma; '>$date</td>
    
    </tr>
</table>";
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
    for ($ct = 0; $ct < count($_FILES['fileselect']['tmp_name']); $ct++) {
        $mail->AddAttachment($_FILES['fileselect']['tmp_name'][$ct], $_FILES['fileselect']['name'][$ct]);
    }
    $mail->send();
} catch (Exception $exc) {
    echo $exc->getMessage();
}
?>
?>