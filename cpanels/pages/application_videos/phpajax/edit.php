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

$id= filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
$id_app = filter_var($_POST['id_app'], FILTER_SANITIZE_STRING);
$Video = filter_var($_POST['Video'], FILTER_SANITIZE_URL);


//=================================
if (!$a->empty_filed($id)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($id_app)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Video)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
    else:
         if (filter_var(!$Video, FILTER_VALIDATE_URL)) {
          $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
          $true = FALSE;
          }
endif;
if ($true == TRUE):
    try {
        $array_var=array();
        $array_var[]=$id_app = filter_var($_POST['id_app'], FILTER_SANITIZE_STRING);
        $array_var[]=$Video = filter_var($_POST['Video'], FILTER_SANITIZE_STRING);
        $array_var[]=$id= filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $SQL = "UPDATE `application_videos` SET `id_app`= ?,`Video`= ? WHERE `application_videos`.`id`= ?;";
        $array = array();
        $a->sql($Data_communication, $SQL, $array_var);
        $msgerr .= "<div class='alert alert-success'>تم تعديل الخبر بنجاح</div>";
    } catch (PDOException $ex) {
        echo $ex;
    }
endif;
echo $msgerr;
?>