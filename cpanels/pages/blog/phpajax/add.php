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
$array_var = array();
$Subject = filter_var($_POST['Subject'], FILTER_SANITIZE_STRING);
$Date = date("Y-m-d");
$Abstract = filter_var($_POST['Abstract'], FILTER_SANITIZE_STRING);
$Explanation = $_POST['Explanation'];
//=========================
$file_name = $_FILES['uploadFile']['name'];
$file_size = $_FILES['uploadFile']['size'];
$file_tmp = $_FILES['uploadFile']['tmp_name'];
$file_type = $_FILES['uploadFile']['type'];
$error = $_FILES['uploadFile']['error'];
$extensions = array("jpeg", "jpg", "png", "gif");
$ext = pathinfo($file_name, PATHINFO_EXTENSION);
//=================================
if (!$a->empty_filed($Subject)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;

if (!$a->empty_filed($Abstract)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Explanation)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!file_exists($file_tmp)) {
    $msgerr .= "<div class='alert alert-danger alert-autocloseable-danger'>من فضك قم بتحميل الصورة </div>";
    $true = FALSE;
}
if ($true == TRUE):
    try {
        $array_var = array();
        $array_var[] = $Subject = filter_var($_POST['Subject'], FILTER_SANITIZE_STRING);
        $array_var[] = date("Y-m-d");
        $array_var[] = $Abstract = filter_var($_POST['Abstract'], FILTER_SANITIZE_STRING);
        $array_var[] = $_POST['Explanation'];
        $array_var[] = files_add($file_tmp, $file_name, "../../../../Public/$tabel/");
        $sql = "INSERT INTO `blog` (`id`,`Subject`,`Date`,`Abstract`,`Explanation`,`Image`) VALUES (NULL, ?,?,?,?,?)";
        $array = array();
        $a->sql($Data_communication, $sql, $array_var);
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