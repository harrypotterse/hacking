<?php

#=================================================================================
#===========================  تصمين الملفات==========================================
require_once '../FileConnection/Data_connection.php';
require_once '../Classes/Achieve.php';
require_once '../Classes/Component.php';
#=================================================================================
#===========================  تعريف الكلاسات==========================================
$a = new Achieve();
$Component = new Component();
#==============================$array_var=array();
$array_var[] = $forename = filter_var($_POST['forename'], FILTER_SANITIZE_STRING);
$array_var[] = $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
$array_var[] = $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
$array_var[] = $Password = filter_var($_POST['Password'], FILTER_SANITIZE_STRING);
$array_var[] = $confirm_password = filter_var($_POST['confirm_password'], FILTER_SANITIZE_STRING);
//$array_var[] = $Password = password_hash(filter_var($_POST['Password'], FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);
//$array_var[] = $confirm_password = password_hash(filter_var($_POST['confirm_password'], FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);
#===========================  تعريف الكلاسات==========================================
$true = TRUE;
$msgerr = "";
if (!$a->empty_filed($forename)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($last_name)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($email)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Password)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($confirm_password)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if ($true):
    try {
        $sql = "INSERT INTO `registration` (`id`,`forename`,`last_name`,`email`,`Password`,`confirm_password`) VALUES (NULL, ?,?,?,?,?)";
        $array = array();
        $a->sql($Data_communication, $sql, $array_var);
        echo '<script>window.location.href = "login.php";</script>';
        exit();
        //header("location: ");
    } catch (PDOException $ex) {
        echo $ex;
    }
endif;
?>