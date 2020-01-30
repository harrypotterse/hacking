<?php
error_reporting("E_ALL & ~E_NOTIC");
require_once '../../../../FileConnection/Data_connection.php';
require_once '../../../../FileConnection/Extra_functions.php';
require_once '../../../../Classes/Achieve.php';
$a = new Achieve();
$true = TRUE;
$msgerr = "";
//=================================
$file_name = $_FILES['uploadFile']['name'];
$file_size = $_FILES['uploadFile']['size'];
$file_tmp = $_FILES['uploadFile']['tmp_name'];
$file_type = $_FILES['uploadFile']['type'];
$error = $_FILES['uploadFile']['error'];
$extensions = array("jpeg", "jpg", "png", "gif");
$ext = pathinfo($file_name, PATHINFO_EXTENSION);
$array_var = array();
$user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
$Subject = filter_var($_POST['Subject'], FILTER_SANITIZE_STRING);
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
$Email= trim(filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL));

//=========================
if (!$a->empty_filed($user)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Subject)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($message)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if ($true == TRUE):
    try {
        $array_var = array();
        $array_var[] = $user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
        $array_var[] = $Subject = filter_var($_POST['Subject'], FILTER_SANITIZE_STRING);
        
        $array_var[] = $message = $_POST['message'];
        if (!file_exists($file_tmp)) {
            $array_var[] = "images/blog/1.jpg";
        } else {
            $array_var[] = files_add($file_tmp, $file_name, "../../../../Public/message/");
        }
        $sql = "INSERT INTO `message` (`id`,`user`,`Subject`,`message`,`pic`) VALUES (NULL, ?,?,?,?)";
        $array = array();
        $a->sql($Data_communication, $sql, $array_var);
        echo("<meta http-equiv='refresh' content=?>");
        $msgerr .= "<div class='alert alert-success'>تم ارسال الرسالة بنجاح</div>";
    } catch (PDOException $ex) {
        echo $ex;
    }
endif;
echo $msgerr;
?>