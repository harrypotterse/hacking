<?php

error_reporting("E_ALL & ~E_NOTIC");
require_once '../Settings.php';
require_once '../../../../Classes/Achieve.php';
require_once '../../../../FileConnection/Data_connection.php';
$a = new Achieve();
$true = TRUE;
$msgerr = "";
$array_var = array();
$youtube = filter_var($_POST['youtube'], FILTER_SANITIZE_STRING);
$story_id = filter_var($_POST['story_id'], FILTER_SANITIZE_NUMBER_INT);
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
        $sql = "INSERT INTO `facts` (`id`,`story_id`,`youtube`) VALUES (NULL, ?,?)";
        $a->sql($Data_communication, $sql, $array_var);
        $msgerr .= "<div class='alert alert-success'>تم بنجاح اضافة موضوع جديد</div>";
//    ===============================================
        $section = Pageadd;
        $labal = label;
        $time = time();
        $sql = "INSERT INTO `latest_additions` (`id`, `Section`, `Time`,`label`) VALUES (NULL, ?, ?,?);";
        $array = array($section, $time, $labal);
        $a->sql($Data_communication, $sql, $array);
    } catch (PDOException $ex) {
        echo $ex;
    }
endif;
echo $msgerr;
?>