<?php

error_reporting("E_ALL & ~E_NOTIC");
#=================================================================================
#===========================  تصمين الملفات==========================================
require_once '../FileConnection/Data_connection.php';
require_once '../Classes/Achieve.php';
require_once '../Classes/Component.php';
#=================================================================================
#===========================  تعريف الكلاسات==========================================
$a = new Achieve();
$Component = new Component();
$true = TRUE;
$msgerr = "";
#=================================================================================
$array_var = array();
$Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
$Email = trim(filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL));
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
$Re = filter_var($_POST['Re'], FILTER_SANITIZE_STRING);
#===========================  تعريف الكلاسات==========================================

if (!$a->empty_filed($Name)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Email)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($password)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Re)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if($password != $Re):
     $msgerr .= "<div class='alert alert-danger'>كلمة السر غير متطابقة</div>";
    $true = FALSE;  
endif ;
echo $msgerr;
if ($true):
    try {
        $array_var = array();
        $array_var[] = $Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
        $array_var[] = $Email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
        $array_var[] = $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $array_var[] = $Re = filter_var($_POST['Re'], FILTER_SANITIZE_STRING);
        $sql = "INSERT INTO `sign_up` (`id`,`Name`,`Email`,`password`,`Re`) VALUES (NULL, ?,?,?,?)";
        $array = array();
        $a->sql($Data_communication, $sql, $array_var);
        echo 1;
    } catch (PDOException $ex) {
        echo $ex;
    }
endif;
?>