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
$YouTube = filter_var($_POST['YouTube'], FILTER_SANITIZE_URL);
$Title = filter_var($_POST['Title'], FILTER_SANITIZE_STRING);
$Subtitle = filter_var($_POST['Subtitle'], FILTER_SANITIZE_STRING);
$Explanation = $_POST['Explanation'];
$Download = filter_var($_POST['Download'], FILTER_SANITIZE_URL);
$pic1 = filter_var($_POST['pic1'], FILTER_SANITIZE_URL);
$pic2 = filter_var($_POST['pic2'], FILTER_SANITIZE_URL);
//=================================
if (!$a->empty_filed($YouTube)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Title)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Subtitle)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لات3ترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Explanation)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتتر4ك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Download)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك5 حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($pic1)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتت6رك حقل فارغ</div>";
    $true = FALSE;
else:
    if (filter_var(!$pic1, FILTER_VALIDATE_URL)) {
        $msgerr .= "<div class='alert alert-danger'>الرابط غير صالح</div>";
        $true = FALSE;
    }
endif;
if (!$a->empty_filed($pic2)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
else:
    if (filter_var(!$pic2, FILTER_VALIDATE_URL)) {
        $msgerr .= "<div class='alert alert-danger'>الرابط غير صالح</div>";
        $true = FALSE;
    }
endif;
if ($true == TRUE):
    try {
        $array_var = array();
        $array_var[] = $YouTube = filter_var($_POST['YouTube'], FILTER_SANITIZE_STRING);
        $array_var[] = $Title = filter_var($_POST['Title'], FILTER_SANITIZE_STRING);
        $array_var[] = $Subtitle = filter_var($_POST['Subtitle'], FILTER_SANITIZE_STRING);
        $array_var[] = $_POST['Explanation'];
        $array_var[] = $Download = filter_var($_POST['Download'], FILTER_SANITIZE_STRING);
        $array_var[] = $pic1 = filter_var($_POST['pic1'], FILTER_SANITIZE_STRING);
        $array_var[] = $pic2 = filter_var($_POST['pic2'], FILTER_SANITIZE_STRING);
        $array_var[] = $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $SQL = "UPDATE `follower` SET `YouTube`= ?,`Title`= ?,`Subtitle`= ?,`Explanation`= ?,`Download`= ?,`pic1`= ?,`pic2`= ? WHERE `follower`.`id`= ?;";
        $array = array();
        $a->sql($Data_communication, $SQL, $array_var);
        $msgerr .= "<div class='alert alert-success'>تم تعديل الخبر بنجاح</div>";
    } catch (PDOException $ex) {
        echo $ex;
    }
endif;
echo $msgerr;
?>