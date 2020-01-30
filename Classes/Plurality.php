<?php

function Number_of_records($Data_communication, $limit) {
    $query = "SELECT count(id) AS id FROM cv ";
    $sth = $Data_communication->prepare($query);
    $sth->execute();
    $xssa = $sth->fetchAll();
    $count = array();
    if (count($xssa) > 0) :
        foreach ($xssa as $value):
            $count[] = (int) $id = $value['id'];
            $count[] = $pages = ceil($id / $limit);
        endforeach;
        return $count;
    endif;
}

function Number_of_records2($Data_communication, $limit,$Keywords) {
    $query = "SELECT count(id) AS id FROM job  Company LIKE ? or  Country LIKE ? or City LIKE  ?  specialty LIKE ?  Minimum LIKE ?  Maximum LIKE ?  Keywords LIKE ? ;";
     $Query = "select  * from job  where City LIKE ?";

    $sth = $Data_communication->prepare($Query);
    $sth->bindValue(1, '%' . $Keywords . '%', PDO::PARAM_STR);
    $sth->execute();
        $count[] = $sth->rowCount();
    $xssa = $sth->fetchAll();
    $count = array();
    if (count($xssa) > 0) :
        foreach ($xssa as $value):
             (int) $id = $value['id'];
            $count[] = $pages = ceil($id / $limit);
        endforeach;
        return $count;
    endif;
}

?>
