<?php
$id="11";
$query = "SELECT * FROM `counter_db` where id = $id ";
$array = array();
$value="count";
define("row", $value);
$rows = $class->sql_feth($Data_communication, $query, $array);
foreach ($rows as $key):
    (int) $index = $key[row];
    $vist= $index + 1;
    $time= time();
    $array=array($vist,$time);
    $query="UPDATE `counter_db` SET `count` = ? , `time` = ?  WHERE `counter_db`.`id` =$id;";
    $class->sql($Data_communication,$query,$array);
endforeach;

