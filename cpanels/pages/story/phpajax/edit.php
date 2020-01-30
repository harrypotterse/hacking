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
$file_name = $_FILES['uploadFile']['name'];
$file_size = $_FILES['uploadFile']['size'];
$file_tmp = $_FILES['uploadFile']['tmp_name'];
$file_type = $_FILES['uploadFile']['type'];
$error = $_FILES['uploadFile']['error'];
$extensions = array("jpeg", "jpg", "png", "gif");
$id= filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
$ext = pathinfo($file_name, PATHINFO_EXTENSION);
$Title = filter_var($_POST['Title'], FILTER_SANITIZE_STRING);
$Subtitle = filter_var($_POST['Subtitle'], FILTER_SANITIZE_STRING);
$Subject = $_POST['Subject'];
//=================================
if (!$a->empty_filed($id)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Title)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Subtitle)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Subject)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;


if ($true == TRUE):
    try {
        $array_var = array();
        $array_var[] = files_modified($file_tmp, "../../../../Public/$tabel/", $_POST['file'], $file_name);
        $array_var[] = $Title = filter_var($_POST['Title'], FILTER_SANITIZE_STRING);
        $array_var[] = $Subtitle = filter_var($_POST['Subtitle'], FILTER_SANITIZE_STRING);
        $array_var[] = $Subject = filter_var($_POST['Subject'], FILTER_SANITIZE_STRING);
        $array_var[] = $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $SQL = "UPDATE `story` SET `Image`= ?,`Title`= ?,`Subtitle`= ?,`Subject`= ? WHERE `story`.`id`= ?;";
        $array = array();
        $a->sql($Data_communication, $SQL, $array_var);
        $msgerr .= "<div class='alert alert-success'>تم تعديل الخبر بنجاح</div>";
    } catch (PDOException $ex) {
        echo $ex;
    }
endif;
echo $msgerr;
?>