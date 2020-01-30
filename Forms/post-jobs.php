<?php
#=================================================================================
#===========================  تصمين الملفات==========================================
require_once '../FileConnection/Data_connection.php';
require_once '../Classes/Achieve.php';
require_once '../Classes/Component.php';
require_once '../Classes/Session.php';
$Session= new Session("login.php");
#=================================================================================
#===========================  تعريف الكلاسات==========================================
$a = new Achieve();
$Component = new Component();
$user = $Session->get_session_data("id");
//=======================
$file_name = $_FILES['Files']['name'];
$file_size = $_FILES['Files']['size'];
$file_tmp = $_FILES['Files']['tmp_name'];
$file_type = $_FILES['Files']['type'];
$error = $_FILES['Files']['error'];
$extensions = array("jpeg", "jpg", "png", "gif", "pdf");
$ext = pathinfo($file_name, PATHINFO_EXTENSION);
//=================================
#==============================$array_var=array();
$Title = filter_var($_POST['Title'], FILTER_SANITIZE_STRING);
$Company = filter_var($_POST['Company'], FILTER_SANITIZE_STRING);
$Keywords = filter_var($_POST['Keywords'], FILTER_SANITIZE_STRING);
$Minimum = filter_var($_POST['Minimum'], FILTER_SANITIZE_STRING);
$Maximum = filter_var($_POST['Maximum'], FILTER_SANITIZE_STRING);
$specialty = filter_var($_POST['specialty'], FILTER_SANITIZE_STRING);
$Email = filter_var($_POST['Email'], FILTER_SANITIZE_STRING);
$Country = filter_var($_POST['Country'], FILTER_SANITIZE_STRING);
$City = filter_var($_POST['City'], FILTER_SANITIZE_STRING);
#===========================  تعريف الكلاسات==========================================
$true = TRUE;
$msgerr = "";
if (!$a->empty_filed($Title)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Company)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Keywords)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Minimum)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Maximum)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($specialty)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Email)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($Country)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
if (!$a->empty_filed($City)):
    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
    $true = FALSE;
endif;
//=======================
//=================================
if ($true):
    try {
        $array_var[] = $Title = filter_var($_POST['Title'], FILTER_SANITIZE_STRING);
        $array_var[] = $Company = filter_var($_POST['Company'], FILTER_SANITIZE_STRING);
        $array_var[] = $Keywords = filter_var($_POST['Keywords'], FILTER_SANITIZE_STRING);
        $array_var[] = $Minimum = filter_var($_POST['Minimum'], FILTER_SANITIZE_STRING);
        $array_var[] = $Maximum = filter_var($_POST['Maximum'], FILTER_SANITIZE_STRING);
        $array_var[] = $specialty = filter_var($_POST['specialty'], FILTER_SANITIZE_STRING);
        $array_var[] = $Email = filter_var($_POST['Email'], FILTER_SANITIZE_STRING);
        $array_var[] = $Country = filter_var($_POST['Country'], FILTER_SANITIZE_STRING);
        $array_var[] = $City = filter_var($_POST['City'], FILTER_SANITIZE_STRING);
        $array_var[] = $Date = date('Y-m-d');
        $array_var[] = $Today = time();
        $array_var[] = $Month = date('m');
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $target_pathss = '../Public/job/' . time() . rand(100, 100) . "." . $extension;
        $fildb = rand(100, 100) . "." . $extension;
        if (move_uploaded_file($file_tmp, $target_pathss)) {
            $array_var[] = $target_path = time() . rand(100, 100) . "." . $extension;
        }
        $array_var[] = $User_type = "user";
        $array_var[] = $Views = 0;
        $array_var[] = $Acceptance = 0;
        $array_var[] = $url = "//img0cf.b8cdn.com/images/people/emp-no-logo120X120.png";
        $array_var[] = $user;
        $sql = "INSERT INTO `job` (`id`,`Title`,`Company`,`Keywords`,`Minimum`,`Maximum`,`specialty`,`Email`,`Country`,`City`,`Date`,`Today`,`Month`,`File`,`User_type`,`Views`,`Acceptance`,`url`,`id_user`) VALUES (NULL, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $array = array();
        $a->sql($Data_communication, $sql, $array_var);
        echo 1;
    } catch (PDOException $ex) {
        echo $ex;
    }
endif;
?>