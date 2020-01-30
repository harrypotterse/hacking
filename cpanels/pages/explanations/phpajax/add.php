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
$Department = filter_var($_POST['Department'], FILTER_SANITIZE_STRING);
$Link = filter_var($_POST['Link'], FILTER_SANITIZE_URL);
//=========================
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
        $array_var[] = $Department = filter_var($_POST['Department'], FILTER_SANITIZE_STRING);
        $array_var[] = $Link = filter_var($_POST['Link'], FILTER_SANITIZE_STRING);
        $sql = "INSERT INTO `explanations` (`id`,`Department`,`Link`) VALUES (NULL, ?,?)";
        $array = array();
        $a->sql($Data_communication, $sql, $array_var);
        //============================================
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