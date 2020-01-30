<?php

error_reporting("E_ALL & ~E_NOTIC");
require_once '../../../../Classes/Achieve.php';
require_once '../../../../FileConnection/Data_connection.php';
require_once '../../../../FileConnection/Extra_functions.php';
require_once '../Settings.php';
$a = new Achieve();
$true = TRUE;
$msgerr = "";
$tabel = tabel;
$array_var = array();
$array_var[] = $Specialty = filter_var($_POST['Specialty'], FILTER_SANITIZE_STRING);
$array_var[] = $Icon = filter_var($_POST['Icon'], FILTER_SANITIZE_STRING);
//=========================
//=================================
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
        $sql = "INSERT INTO `specialty` (`id`,`Specialty`,`Icon`) VALUES (NULL, ?,?)";
        $a->sql($Data_communication, $sql, $array_var);
        $msgerr .= "<div class='alert alert-success'>تم بنجاح اضافة موضوع جديد</div>";
//    ===============================================
        $section = Page;
        $labal = label;
        $time = time();
        $sql = "INSERT INTO `latest_additions` (`id`, `Section`, `Time`,`label`) VALUES (NULL, ?, ?,?);";
        $array = array($section, $time, $labal);
        $a->sql($Data_communication, $sql, $array);
    } catch (PDOException $ex) {
        echo $ex;
    } finally {
        $Data_communication = NULL;
    }
endif;
echo $msgerr;
?>