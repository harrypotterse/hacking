<?php

require_once '../Classes/Achieve.php';
require_once '../FileConnection/Data_connection.php';
require_once '../FileConnection/Extra_functions.php';
try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") :
        $a = new Achieve();
        $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        $hand = TRUE;
        if (!$a->empty_filed($email)) {
            $hand = false;
        }
        if ($hand):
            $sql = "SELECT * FROM registration  WHERE email=?  ";
            $query = $Data_communication->prepare($sql);
            $query->execute(array($email));
            $xssa = $query->fetchAll();
            if ($query->rowCount() >= 1) {
                $email;
                $query = "select * from  registration where email = ? ;";
                $array = array($email);
                $rows = $a->sql_feth($Data_communication, $query, $array);
                if (count($rows) > 0) :
                    foreach ($rows as $value):
                         $Password = $value['Password'];
                        //=======================PHPMailer==================================
                        //=======================PHPMailer==================================
                    endforeach;
                endif;
            } else {
                
            }
        endif;
    endif;
} catch (PDOException $ex) {
    
} finally {
    $Data_communication = null;
}
