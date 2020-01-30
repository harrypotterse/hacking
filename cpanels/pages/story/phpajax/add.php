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
$file_name = $_FILES['uploadFile']['name'];
$file_size = $_FILES['uploadFile']['size'];
$file_tmp = $_FILES['uploadFile']['tmp_name'];
$file_type = $_FILES['uploadFile']['type'];
$error = $_FILES['uploadFile']['error'];
$extensions = array("jpeg", "jpg", "png", "gif");
$ext = pathinfo($file_name, PATHINFO_EXTENSION);
$Title = filter_var($_POST['Title'], FILTER_SANITIZE_STRING);
$Subtitle = filter_var($_POST['Subtitle'], FILTER_SANITIZE_STRING);
$Subject = $_POST['Subject'];
//=========================
if (!$a->empty_filed($Title)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Subtitle)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Subject)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if ($true == TRUE):
    try {
        $array_var = array();
        $array_var[] = files_add($file_tmp, $file_name, "../../../../Public/$tabel/");
        $array_var[] = $Title = filter_var($_POST['Title'], FILTER_SANITIZE_STRING);
        $array_var[] = $Subtitle = filter_var($_POST['Subtitle'], FILTER_SANITIZE_STRING);
        $array_var[] = $Subject = $_POST['Subject'];
        $sql = "INSERT INTO `story` (`id`,`Image`,`Title`,`Subtitle`,`Subject`) VALUES (NULL, ?,?,?,?)";
        $array = array();
        $story_id = $a->sql($Data_communication, $sql, $array_var);
        //============================================
        foreach ($_POST['story_id'] as $key => $value) {
            $array_var1 = array();
            $array_var1[] = $story_id;
            $array_var1[] = $youtube = filter_var($value, FILTER_SANITIZE_URL);
            $sql = "INSERT INTO `facts` (`id`,`story_id`,`youtube`) VALUES (NULL, ?,?)";
            $array = array();
            $a->sql($Data_communication, $sql, $array_var1);
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