<?php

//=======================require file==================================
require_once '../FileConnection/Data_connection.php';
require_once '../Classes/Achieve.php';
require_once '../FileConnection/Extra_functions.php';
require_once '../FileConnection/Extra_functions.php';

//=======================PHPMailer==================================
$a = new Achieve();
$true = TRUE;
$msgerr = "";

//=======================PHPMailer==================================
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'autoload.php';
$mail = new PHPMailer(true);
//=========================(entry the form)===================================
if ($_SERVER["REQUEST_METHOD"] == "POST"):
//=======================Variable Matrix==================================
    $Variable_Matrix = array();
    $Variable_Matrix[] = $Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
    $Variable_Matrix[] = $last_name = filter_var($_POST['last-name'], FILTER_SANITIZE_STRING);
    $Variable_Matrix[] = $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $Variable_Matrix[] = $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
    $Variable_Matrix[] = $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
//=======================Check the fields==================================
 
    //========================================================== 

    if (!$a->empty_filed($message)):
        $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك محتوي الرسالة فارغ</div>";
        $true = FALSE;
    elseif (strlen($message) < 10) :
        $msgerr .= "<div class='alert alert-danger'>محتوي الرسالة يجب ان يحتوي علي عشرة احرف </div>";
        $true = FALSE;
    endif;
    if (!$a->empty_filed($Name)):
        $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك محتوي الاسم فارغ</div>";
        $true = FALSE;
    endif;
    if (!$a->empty_filed($last_name)):
        $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك محتوي الاسم الاخير  فارغ</div>";
        $true = FALSE;
    endif;
    if (!$a->empty_filed($phone)):
        $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك محتوي رقم الموبيل فارغ</div>";
        $true = FALSE;
    endif;
    if (!$a->empty_filed($email)):
        $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك محتوي البريد الالكتروني فارغ</div>";
        $true = FALSE;
    endif;
//=======================######################==================================
    if ($true):
        try {
           require_once './contact/contact.php';
            $sql = "INSERT INTO `contact` (`id`,`Forename`,`Title`,`Email`,`mobile`,`message`) VALUES (NULL, ?,?,?,?,?)";
            $array = array();
            $a->sql($Data_communication, $sql, $Variable_Matrix);
            echo 1;
        } catch (PDOException $ex) {
            echo $ex;
        } finally {
            $Data_communication = null;
        }
    endif;
    echo $msgerr;
endif;
?>