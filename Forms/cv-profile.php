<?php
error_reporting("E_ALL & ~E_NOTIC");
try {
#=================================================================================
#===========================  تصمين الملفات==========================================
    require_once '../FileConnection/Data_connection.php';
    require_once '../Classes/Achieve.php';
    require_once '../Classes/Component.php';
#=================================================================================
#===========================  تعريف الكلاسات==========================================
    $a = new Achieve();
    $Component = new Component();
//=======================
    $file_name = $_FILES['Files_img']['name'];
    $file_size = $_FILES['Files_img']['size'];
    $file_tmp = $_FILES['Files_img']['tmp_name'];
    $file_type = $_FILES['Files_img']['type'];
    $error = $_FILES['Files_img']['error'];
    $extensions = array("jpeg", "jpg", "png", "gif", "pdf");
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
//=================================
#==============================$array_var=array();
    $array_var = array();
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
    $Age = filter_var($_POST['Age'], FILTER_SANITIZE_STRING);
    $mobile = filter_var($_POST['mobile'], FILTER_SANITIZE_STRING);
    $Mail = filter_var($_POST['Mail'], FILTER_SANITIZE_EMAIL);
    $Country = filter_var($_POST['Country'], FILTER_SANITIZE_STRING);
    $City = filter_var($_POST['City'], FILTER_SANITIZE_STRING);
    $Degree = filter_var($_POST['Degree'], FILTER_SANITIZE_STRING);
    $College = filter_var($_POST['College'], FILTER_SANITIZE_STRING);
    $Function = filter_var($_POST['Function'], FILTER_SANITIZE_STRING);
    $Specialty = filter_var($_POST['Specialty'], FILTER_SANITIZE_STRING);
    $Description = filter_var($_POST['Description'], FILTER_SANITIZE_STRING);
    $Files = filter_var($_POST['Files'], FILTER_SANITIZE_STRING);
#===========================  تعريف الكلاسات==========================================
    $true = TRUE;
    $msgerr = "";
    if (!$a->empty_filed($id)):
        $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
        $true = FALSE;
    endif;
    if (!$a->empty_filed($Name)):
        $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
        $true = FALSE;
    endif;
    if (!$a->empty_filed($Age)):
        $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
        $true = FALSE;
    endif;
    if (!$a->empty_filed($mobile)):
        $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
        $true = FALSE;
    endif;
    if (!$a->empty_filed($Mail)):
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
    if (!$a->empty_filed($Degree)):
        $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
        $true = FALSE;
    endif;
    if (!$a->empty_filed($College)):
        $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
        $true = FALSE;
    endif;
    if (!$a->empty_filed($Function)):
        $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
        $true = FALSE;
    endif;
    if (!$a->empty_filed($Specialty)):
        $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
        $true = FALSE;
    endif;
    if (!$a->empty_filed($Description)):
        $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
        $true = FALSE;
    endif;
    if (!$a->empty_filed($Files)):
        $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
        $true = FALSE;
    endif;
    if (!file_exists($file_tmp)) {
      $array_var[] = $target_path = filter_var($_POST['Files'], FILTER_SANITIZE_STRING);
}

//==============================================================================================================
    if ($true):
        try {
            $SQL = "UPDATE `cv` SET `Name`= ?,`Age`= ?,`mobile`= ?,`Mail`= ?,`Country`= ?,`City`= ?,`Degree`= ?,`College`= ?,`Function`= ?,`Specialty`= ?,`Description`= ? , `Files`= ?  WHERE `cv`.`id`= ?;";
            $array_var = array();
            $array_var[] = $Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
            $array_var[] = $Age = filter_var($_POST['Age'], FILTER_SANITIZE_STRING);
            $array_var[] = $mobile = filter_var($_POST['mobile'], FILTER_SANITIZE_STRING);
            $array_var[] = $Mail = filter_var($_POST['Mail'], FILTER_SANITIZE_STRING);
            $array_var[] = $Country = filter_var($_POST['Country'], FILTER_SANITIZE_STRING);
            $array_var[] = $City = filter_var($_POST['City'], FILTER_SANITIZE_STRING);
            $array_var[] = $Degree = filter_var($_POST['Degree'], FILTER_SANITIZE_STRING);
            $array_var[] = $College = filter_var($_POST['College'], FILTER_SANITIZE_STRING);
            $array_var[] = $Function = filter_var($_POST['Function'], FILTER_SANITIZE_STRING);
            $array_var[] = $Specialty = filter_var($_POST['Specialty'], FILTER_SANITIZE_STRING);
            $array_var[] = $Description = filter_var($_POST['Description'], FILTER_SANITIZE_STRING);
            if (!file_exists($file_tmp)) {
                $array_var[] = $target_path = filter_var($_POST['Files'], FILTER_SANITIZE_STRING);
            } else {
                $DelFilePath = filter_var($_POST['Files'], FILTER_SANITIZE_STRING);
                $Images = "../Public/cv/" . $DelFilePath;
                if (file_exists($Images)) {
                    unlink($Images);
                } else {
                    
                }
                $extension = pathinfo($file_name, PATHINFO_EXTENSION);
                $extension = pathinfo($file_name, PATHINFO_EXTENSION);
                $target_pathss = '../Public/cv/' . time() . rand(100, 100) . "." . $extension;
                $fildb = rand(100, 100) . "." . $extension;
                if (move_uploaded_file($file_tmp, $target_pathss)) {
                    $array_var[] = $target_path = time() . rand(100, 100) . "." . $extension;
                }
            }
            $array_var[] = $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
            $a->sql($Data_communication, $SQL, $array_var);
            echo 1;
        } catch (PDOException $ex) {
            echo $ex;
        }
    endif;
} catch (Exception $ex) {
    
} finally {
    $Data_communication = NULL;
}
?>



