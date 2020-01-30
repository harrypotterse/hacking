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
$follower_id = filter_var($_POST['follower_id'], FILTER_SANITIZE_STRING);
$Features = filter_var($_POST['Features'], FILTER_SANITIZE_STRING);

if (!$a->empty_filed($follower_id)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Features)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;

if ($true == TRUE):
    try {
        $array_var = array();
        $array_var = array();
        $array_var[] = $follower_id = filter_var($_POST['follower_id'], FILTER_SANITIZE_NUMBER_INT);
        $array_var[] = $Features = filter_var($_POST['Features'], FILTER_SANITIZE_STRING);
        $sql = "INSERT INTO `follower_featuress` (`id`,`follower_id`,`Features`) VALUES (NULL, ?,?)";
        $array = array();
        $a->sql($Data_communication, $sql, $array_var);
        //============================================
        foreach ($_POST['Features'] as $key => $value) {
            $array_var1 = array();
            $array_var1[] = $follower_id = $id_f;
            $array_var1[] = $Features = $value;
            $sql2 = "INSERT INTO `follower_featuress` (`id`,`follower_id`,`Features`) VALUES (NULL, ?,?)";
            $a->sql($Data_communication, $sql2, $array_var1);
        }
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
    }
endif;
echo $msgerr;
?>