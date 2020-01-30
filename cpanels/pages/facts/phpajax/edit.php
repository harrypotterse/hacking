<?php

error_reporting("E_ALL & ~E_NOTIC");
require_once '../../../../FileConnection/Data_connection.php';
require_once '../../../../Classes/Achieve.php';
$a = new Achieve();
$true = TRUE;
$msgerr = "";
//=================================
$array_var = array();
$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
$youtube = filter_var($_POST['youtube'], FILTER_SANITIZE_STRING);
//=========================

if (!$a->empty_filed($id)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($youtube)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
else:
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $youtube)) {
        $msgerr .= "<div class='alert alert-danger'>الرابط غير صالح </div>";
        $true = FALSE;
    }
endif;
if ($true == TRUE):
    try {

        $array_var = array();
        $array_var[] = $story_id = filter_var($_POST['story_id'], FILTER_SANITIZE_NUMBER_INT);
        $array_var[] = $youtube = filter_var($_POST['youtube'], FILTER_SANITIZE_URL);
        $array_var[] = $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT); 
        $SQL = "UPDATE `facts` SET `story_id`= ?,`youtube`= ? WHERE `facts`.`id`= ?;";
        $array = array();
        $a->sql($Data_communication, $SQL, $array_var);
        $msgerr .= "<div class='alert alert-success'>تم تعديل الخبر بنجاح</div>";
    } catch (PDOException $ex) {
        echo $ex;
    }
endif;
echo $msgerr;
?>