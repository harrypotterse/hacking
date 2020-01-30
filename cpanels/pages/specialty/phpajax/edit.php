<?php

error_reporting("E_ALL & ~E_NOTIC");
require_once '../Settings.php';
require_once '../../../../Classes/Achieve.php';
require_once '../../../../FileConnection/Data_connection.php';
require_once '../../../../FileConnection/Extra_functions.php';
$a = new Achieve();
$true = TRUE;
$msgerr = "";
$array_var = array();
$tabel = tabel;
$array_var[] = $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
$array_var[] = $Specialty = filter_var($_POST['Specialty'], FILTER_SANITIZE_STRING);
$array_var[] = $Icon = filter_var($_POST['Icon'], FILTER_SANITIZE_STRING);
//=========================
//=======================PHPMailer==================================
if (!$a->empty_filed($id)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Specialty)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Icon)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if ($true == TRUE):
    try {
        $array_var = array();
        $array_var[] = $Specialty = filter_var($_POST['Specialty'], FILTER_SANITIZE_STRING);
        $array_var[] = $Icon = filter_var($_POST['Icon'], FILTER_SANITIZE_STRING);
        $array_var[] = $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $SQL = "UPDATE `specialty` SET `Specialty`= ?,`Icon`= ? WHERE `specialty`.`id`= ?;";
        $array = array();
        $a->sql($Data_communication, $SQL, $array_var);
        echo("<meta http-equiv='refresh' content=?>");
        $msgerr .= "<div class='alert alert-success'>تم تعديل الخبر بنجاح</div>";
    } catch (PDOException $ex) {
        echo $ex;
    }
endif;
echo $msgerr;
?>