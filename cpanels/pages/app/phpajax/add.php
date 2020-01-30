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
$Title = filter_var($_POST['Title'], FILTER_SANITIZE_STRING);
$Short_title = filter_var($_POST['Short_title'], FILTER_SANITIZE_STRING);
$Explanation = $_POST['Explanation'];
$url = filter_var($_POST['url'], FILTER_SANITIZE_URL);
//=========================
$file_name = $_FILES['uploadFile']['name'];
$file_size = $_FILES['uploadFile']['size'];
$file_tmp = $_FILES['uploadFile']['tmp_name'];
$file_type = $_FILES['uploadFile']['type'];
$error = $_FILES['uploadFile']['error'];
$extensions = array("jpeg", "jpg", "png", "gif");
$ext = pathinfo($file_name, PATHINFO_EXTENSION);
//=================================
$file_name2 = $_FILES['Download']['name'];
$file_size2 = $_FILES['Download']['size'];
$file_tmp2 = $_FILES['Download']['tmp_name'];
$file_type2 = $_FILES['Download']['type'];
$error2 = $_FILES['Download']['error'];
$extensions2 = array("jpeg", "jpg", "png", "gif");
$ext2 = pathinfo($file_name, PATHINFO_EXTENSION);
//=================================

if (!$a->empty_filed($Title)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Short_title)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Explanation)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if ($true == TRUE):
    try {
        $array_var = array();
        $array_var[] = $Title = filter_var($_POST['Title'], FILTER_SANITIZE_STRING);
        $array_var[] = $Short_title = filter_var($_POST['Short_title'], FILTER_SANITIZE_STRING);
        $array_var[] = $Explanation = $_POST['Explanation'];
        $array_var[] = files_add($file_tmp, $file_name, "../../../../Public/$tabel/");
        if (empty($_POST['url'])):
            if (!file_exists($file_tmp2)) {
                $msgerr .= "<div class='alert alert-danger alert-autocloseable-danger'>من فضلك قم بتحميل البرنامج</div>";
                $true = FALSE;
            } else {
                $array_var[] = files_add($file_tmp2, $file_name2, "../../../../Public/$tabel/");
            }
        else:
            $array_var[] = filter_var($_POST['url'], FILTER_SANITIZE_URL);
        endif;

        if ($true== TRUE):
            $sql = "INSERT INTO `app` (`id`,`Title`,`Short_title`,`Explanation`,`image`,`Download_it`) VALUES (NULL, ?,?,?,?,?)";
            $array = array();
            $a->sql($Data_communication, $sql, $array_var);
            $msgerr .= "<div class='alert alert-success'>تم بنجاح اضافة موضوع جديد</div>";
        endif;
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