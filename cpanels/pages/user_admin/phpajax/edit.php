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
$user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
$mail = filter_var($_POST['mail'], FILTER_SANITIZE_STRING);
//=================================
if (!$a->empty_filed($id)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($user)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($password)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($mail)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;

if ($true == TRUE):
    try {
        $array_var = array();

        $array_var[] = $user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
        $array_var[] = $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $array_var[] = $mail = filter_var($_POST['mail'], FILTER_SANITIZE_STRING);
        $array_var[] = $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

        $SQL = "UPDATE `user_admin` SET `user`= ?,`password`= ?,`mail`= ? WHERE `user_admin`.`id`= ?;";
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