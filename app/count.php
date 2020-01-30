<?php
require_once '../Classes/Achieve.php';
require_once '../FileConnection/Data_connection.php';
$class = new Achieve();
$sec = trim(filter_var($_POST['sec'], FILTER_SANITIZE_NUMBER_INT));
try {
    $query = "select * from  job  where id = ? ;";
    $array = array($sec);
    $rows = $class->sql_feth($Data_communication, $query, $array);
    if (count($rows) > 0) :
        $a = 0;
        foreach ($rows as $value):
            $a++;
            $id = $value['id'] ;
            $Views = $value['Views']+ $a;
            $SQL = "UPDATE `job` SET `Views`= ?  WHERE `job`.`id`= ?;";
            $array = array($Views,$id);
            $class->sql($Data_communication, $SQL, $array);
        endforeach;
    endif;
    
} catch (PDOException $exc) {
    $Data_communication = null;
} finally {
    $Data_communication = null;
}

