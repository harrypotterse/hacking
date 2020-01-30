<?php
error_reporting("E_ALL & ~E_NOTIC");
require_once '../../../../FileConnection/Data_connection.php';
require_once '../../../../Classes/Achieve.php';
require_once '../Settings.php';
$id = $_POST['id'];
$tabel = tabel;
if (isset($id) && !empty($id) && is_numeric($id)) {
    try {
        $a = new Achieve();
        $id = $a->Filter_int($id);
        if ($query = $Data_communication->prepare("DELETE FROM explanations  WHERE  id =?"));
        $query->bindValue(1, $id, PDO::PARAM_INT);
        if ($query->execute()) {
          
        }
    } catch (PDOException $ex) {
        
    }
}
?>