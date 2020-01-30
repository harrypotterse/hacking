<?php
try {
    $Data_communication = new PDO("mysql:host=localhost;dbname=hacking;charset=utf8", "root", "");
    $Data_communication->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $Data_communication->exec('SEt NAMES utf8');
} catch (PDOException $exc) {
    echo 'NOT conected' . $exc->getMessage();
}
?>


