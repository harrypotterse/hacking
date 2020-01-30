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
$comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
$Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
$Function = filter_var($_POST['Function'], FILTER_SANITIZE_STRING); //=========================
$file_name = $_FILES['uploadFile']['name'];
$file_size = $_FILES['uploadFile']['size'];
$file_tmp = $_FILES['uploadFile']['tmp_name'];
$file_type = $_FILES['uploadFile']['type'];
$error = $_FILES['uploadFile']['error'];
$extensions = array("jpeg", "jpg", "png", "gif");
$ext = pathinfo($file_name, PATHINFO_EXTENSION);
//=================================
if (!$a->empty_filed($_POST['id'])):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($_POST['comment'])):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($_POST['Name'])):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($_POST['Function'])):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if ($true == TRUE):
    try {
        $array_var[] = $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
        $array_var[] = $Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
        $array_var[] = $Function = filter_var($_POST['Function'], FILTER_SANITIZE_STRING);
        $array_var[] = files_modified($file_tmp, "../../../../Public/$tabel/", $_POST['file'], $file_name);
        $array_var[] = $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $SQL = "UPDATE `success_stories` SET `comment`= ?,`Name`= ?,`Function`= ?,`Image`= ? WHERE `success_stories`.`id`= ?;";
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