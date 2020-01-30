<?php

//    [qualification] => جامعي
//    [Branch] => فرع الريان
//    [Job_type] => موظف
//    [First_Name] => a
//    [Last_Name] => aaaaaaaaaaaaa
//    [mobile] => aaaaaaaaaaaaaaaa
//    [Email] => aaaaaaaaaaa
//    [Kind] => أنثي
//    [City] => الرياض
//    [date] => 2234-11-11
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
    $Variable_Matrix[] = $First_Name = filter_var($_POST['First_Name'], FILTER_SANITIZE_STRING);
    $Variable_Matrix[] = $Last_Name = filter_var($_POST['Last_Name'], FILTER_SANITIZE_STRING);
    $Variable_Matrix[] = $mobile = filter_var($_POST['mobile'], FILTER_SANITIZE_NUMBER_INT);
    $Variable_Matrix[] = $Email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
    $Variable_Matrix[] = $Kind = filter_var($_POST['Kind'], FILTER_SANITIZE_STRING);
    $Variable_Matrix[] = $City = filter_var($_POST['City'], FILTER_SANITIZE_STRING);
    $Variable_Matrix[] = $qualification = filter_var($_POST['qualification'], FILTER_SANITIZE_STRING);
    $Variable_Matrix[] = $date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
    $Variable_Matrix[] = $Kind = filter_var($_POST['Kind'], FILTER_SANITIZE_STRING);
    $Variable_Matrix[] = $Branch = filter_var($_POST['Branch'], FILTER_SANITIZE_STRING);
    $Variable_Matrix[] = $Job_type = filter_var($_POST['Job_type'], FILTER_SANITIZE_STRING);
//=======================Check the fields==================================

    if (!$a->empty_filed($First_Name)):
        echo 2;
        $true = FALSE;
    endif;
    if (!$a->empty_filed($Last_Name)):
        echo 3;
        $true = FALSE;
    endif;
    if (!$a->empty_filed($mobile)):
        echo 4;
        $true = FALSE;
    endif;
    if (!$a->empty_filed($Email)):
        echo 5;
        $true = FALSE;
    endif;
    if (!$a->empty_filed($Kind)):
        echo 6;
        $true = FALSE;
    endif;
    if (!$a->empty_filed($City)):
        echo 7;
        $true = FALSE;
    endif;
    if (!$a->empty_filed($qualification)):
        echo 8;
        $true = FALSE;
    endif;
    if (!$a->empty_filed($date)):
        echo 9;
        $true = FALSE;
    endif;
    if (!$a->empty_filed($Kind)):
        echo 10;
        $true = FALSE;
    endif;
    if (!$a->empty_filed($Branch)):
        echo 11;
        $true = FALSE;
    endif;
    if (!$a->empty_filed($Job_type)):
        echo 12;
        $true = FALSE;
    endif;

//=======================######################==================================
    if ($true):
        try {
            require_once './jobs/jobs.php';
            $sql = "INSERT INTO `functions` (`id`,`Forename`,`last_name`,`mobile`,`Email`,`Type`,`City`,`qualification`,`Date`,`Kind`,`Branch`,`Position_Type`) VALUES (NULL, ?,?,?,?,?,?,?,?,?,?,?)";
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