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
$Features = filter_var($_POST['Features'], FILTER_SANITIZE_STRING);
$Apps = filter_var($_POST['Apps'], FILTER_SANITIZE_STRING);


//=================================
if (!$a->empty_filed($id)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Features)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Apps)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;

echo '<pre>';
print_r($_POST);
echo '</pre>';

if ($true == TRUE):
    try {
        $array_var = array();
        $array_var[] = $Features = filter_var($_POST['Features'], FILTER_SANITIZE_STRING);
        $array_var[] = $Apps = filter_var($_POST['Apps'], FILTER_SANITIZE_NUMBER_INT);
        $array_var[] = $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        echo '<pre>';
        print_r($array_var);
        echo '</pre>';
        $SQL = "UPDATE `features` SET `Features`= ?,`Apps`= ? WHERE `features`.`id`= ?;";
        $a->sql($Data_communication, $SQL, $array_var);
        $msgerr .= "<div class='alert alert-success'>تم تعديل الخبر بنجاح</div>";
    } catch (PDOException $ex) {
        echo $ex;
    }
endif;
echo $msgerr;
?>