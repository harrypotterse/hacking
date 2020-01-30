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
$array_var=array();
$Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
$Email = filter_var($_POST['Email'], FILTER_SANITIZE_STRING);
$Subject = filter_var($_POST['Subject'], FILTER_SANITIZE_STRING);
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
#===========================  تعريف الكلاسات==========================================
if (!$a->empty_filed($Name)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Email)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Subject)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($message)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if ($true):
    try {
        $sql = "INSERT INTO `contact` (`id`,`Name`,`Mail`,`message`) VALUES (NULL, ?,?,?)";
        $array = array();
        $a->sql($Data_communication, $sql, $array_var);
        echo 1;
    } catch (PDOException $ex) {
        echo $ex;
    }
endif;
?>