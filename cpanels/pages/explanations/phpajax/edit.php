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
$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
$Department = filter_var($_POST['Department'], FILTER_SANITIZE_STRING);
$Link = filter_var($_POST['Link'], FILTER_SANITIZE_STRING);
//=================================
if (!$a->empty_filed($id)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Department)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Link)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
else:
    if (filter_var(!$Link, FILTER_VALIDATE_URL)) {
        $msgerr .= "<div class='alert alert-danger'>من فضلك ادخل الرابط</div>";
        $true = FALSE;
    }
endif;
if ($true == TRUE):
    try {
        $array_var = array();
        $array_var[] = $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $array_var[] = $Department = filter_var($_POST['Department'], FILTER_SANITIZE_STRING);
        $array_var[] = $Link = filter_var($_POST['Link'], FILTER_SANITIZE_STRING);
        $SQL = "UPDATE `explanations` SET `Department`= ?,`Link`= ? WHERE `explanations`.`id`= ?;";
        $array = array();
        $a->sql($Data_communication, $SQL, $array_var);
        $msgerr .= "<div class='alert alert-success'>تم تعديل الخبر بنجاح</div>";
    } catch (PDOException $ex) {
        echo $ex;
    }
endif;
echo $msgerr;
?>