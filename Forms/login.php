<?php

require_once '../Classes/Achieve.php';
require_once '../Classes/Session.php';
require_once '../FileConnection/Data_connection.php';
require_once '../FileConnection/Extra_functions.php';
//=======================PHPMailer==================================
$class = new Achieve();
$session = new Session("index.php");
$hand = TRUE;
$msgerr = null;
$Email = filter_var($_POST['Email'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
//=======================PHPMailer==================================
if ($_SERVER["REQUEST_METHOD"] == "POST") :
    if (!$class->empty_filed($Email)):
        $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
        $true = FALSE;
    endif;
    if (!$class->empty_filed($password)):
        $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
        $true = FALSE;
    endif;
    try {
        $sql = "SELECT * FROM sign_up  WHERE Email=? AND  password=? ";
        $query = $Data_communication->prepare($sql);
        $query->execute(array($Email, $password));
        if ($query->rowCount() >= 1) {
             $_SESSION['user'] = $Email;
            $_SESSION['has'] = $session->hash($Email);
            //==================================
            $array_var = array();
            $array_var[] = $active = "active";
            $array_var[] = $Email;
            $SQL = "UPDATE `sign_up` SET `active`= ? WHERE `sign_up`.`Email`= ?;";
            $array = array();
            $class->sql($Data_communication, $SQL, $array_var);
            echo '<script>window.location.href = "index.php";</script>';
            exit();
        } else {
            echo 1;
        }
    } catch (Exception $ex) {
        echo $ex;
        $Data_communication = null;
    } finally {
        $Data_communication = null;
    }    
   endif;
