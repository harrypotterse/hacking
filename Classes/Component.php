<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Component
 *
 * @author YAHYA
 */
class Component {

    public function Number_columns($Data_communication, $tabel) {
        $count = $Data_communication->prepare("select * from $tabel ");
        $count->execute();
        return $count->columnCount();
    }

    public function fetchObject($Data_communication, $tabel) {
        $get_data = $Data_communication->query("SELECT * FROM `$tabel`");
        $prd_data = $get_data->fetchObject();
        return $prd_data;
    }

    public function fetchObject_SQL($Data_communication, $sql) {
        $get_data = $Data_communication->query($sql);
        $prd_data = $get_data->fetchObject();
        return $prd_data;
    }

    public function Malcom_xx_up($id, $array, $Data_communication, $tablename) {
        $keys = array_keys($array);
        $count = count($array);
        if ($count == 1) {
            $valyes = array_values($array);
            $val = $valyes[0];
            try {


                $select = $Data_communication->query('SELECT * FROM ' . $tablename);
                $total_column = $select->columnCount();
                for ($counter = 0; $counter <= $total_column; $counter ++) {
                    $meta = $select->getColumnMeta($counter);
                    $column[] = $meta['name'];
                }
                $coulam = $column[0];

                $coulam1 = $column[1];

                //----------------------------------------------------------
                $sql = "UPDATE `$tablename` SET `$coulam1` = :$coulam1  WHERE  `id` = :id;";

                if ($statement = $Data_communication->prepare($sql)) {
                    $statement->bindValue(":$coulam1", $val, PDO::PARAM_STR);
                    $statement->bindValue(":id", $id, PDO::PARAM_INT);
                    if ($statement->execute()) {
                        echo $this->msg_up;
                    }
                }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        } else if ($count == 2) {
            $valyes = array_values($array);
            $val = $valyes[1];
            try {


                $select = $Data_communication->query('SELECT * FROM ' . $tablename);
                $total_column = $select->columnCount();
                for ($counter = 0; $counter <= $total_column; $counter ++) {
                    $meta = $select->getColumnMeta($counter);
                    $column[] = $meta['name'];
                }
                $coulam = $column[0];

                $coulam1 = $column[1];

                //----------------------------------------------------------
                $sql = "UPDATE `$tablename` SET `$coulam1` = :$coulam1  WHERE  `id` = :id;";

                if ($statement = $Data_communication->prepare($sql)) {
                    $statement->bindValue(":$coulam1", $val, PDO::PARAM_STR);
                    $statement->bindValue(":id", $id, PDO::PARAM_INT);
                    if ($statement->execute()) {
                        echo $this->msg_up;
                    }
                }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        } elseif ($count == 3) {
            $valyes = array_values($array);
            $val = $valyes[0];
            $val2 = $valyes[1];
            $val3 = $valyes[2];

            try {


                $select = $Data_communication->query('SELECT * FROM ' . $tablename);
                $total_column = $select->columnCount();
                for ($counter = 0; $counter <= $total_column; $counter ++) {
                    $meta = $select->getColumnMeta($counter);
                    $column[] = $meta['name'];
                }
                $coulam = $column[0];
                $coulam1 = $column[1];

                $coulam2 = $column[2];

                //----------------------------------------------------------
                $sql = "UPDATE `$tablename` SET `$coulam1` = :$coulam1, `$coulam2` = :$coulam2  WHERE  `id` = :id;";

                if ($statement = $Data_communication->prepare($sql)) {
                    $statement->bindValue(":$coulam1", $val2, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam2", $val3, PDO::PARAM_STR);
                    $statement->bindValue(":id", $id, PDO::PARAM_INT);
                    if ($statement->execute()) {
                        echo $this->msg_up;
                    }
                }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        } elseif ($count == 4) {
            $valyes = array_values($array);
            $val = $valyes[0];
            $val2 = $valyes[1];
            $val3 = $valyes[2];
            $val4 = $valyes[3];
            try {


                $select = $Data_communication->query('SELECT * FROM ' . $tablename);
                $total_column = $select->columnCount();
                for ($counter = 0; $counter <= $total_column; $counter ++) {
                    $meta = $select->getColumnMeta($counter);
                    $column[] = $meta['name'];
                }
                $coulam = $column[0];
                $coulam1 = $column[1];

                $coulam2 = $column[2];

                $coulam3 = $column[3];

                //----------------------------------------------------------
                $sql = "UPDATE `$tablename` SET `$coulam1` = :$coulam1, `$coulam2` = :$coulam2, `$coulam3` = :$coulam3  WHERE  `id` = :id;";

                if ($statement = $Data_communication->prepare($sql)) {
                    $statement->bindValue(":$coulam1", $val2, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam2", $val3, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam3", $val4, PDO::PARAM_STR);
                    $statement->bindValue(":id", $id, PDO::PARAM_INT);
                    if ($statement->execute()) {
                        echo $this->msg_up;
                    }
                }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        } elseif ($count == 5) {

            try {


                $select = $Data_communication->query('SELECT * FROM ' . $tablename);
                $total_column = $select->columnCount();
                for ($counter = 0; $counter <= $total_column; $counter ++) {
                    $meta = $select->getColumnMeta($counter);
                    $column[] = $meta['name'];
                }
                $coulam = $column[0];

                $coulam1 = $column[1];

                $coulam2 = $column[2];

                $coulam3 = $column[3];

                $coulam4 = $column[4];

                $valyes = array_values($array);
                $val = $valyes[0];
                $val2 = $valyes[1];
                $val3 = $valyes[2];
                $val4 = $valyes[3];
                $val5 = $valyes[4];
                //----------------------------------------------------------
                $sql = "UPDATE `$tablename` SET `$coulam1` = :$coulam1, `$coulam2` = :$coulam2, `$coulam3` = :$coulam3, `$coulam4` = :$coulam4  WHERE  `id` = :id;";

                if ($statement = $Data_communication->prepare($sql)) {
                    $statement->bindValue(":$coulam1", $val2, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam2", $val3, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam3", $val4, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam4", $val5, PDO::PARAM_STR);
                    $statement->bindValue(":id", $id, PDO::PARAM_INT);
                    if ($statement->execute()) {
                        echo $this->msg_up;
                    }
                }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        } elseif ($count == 6) {

            try {


                $select = $Data_communication->query('SELECT * FROM ' . $tablename);
                $total_column = $select->columnCount();
                for ($counter = 0; $counter <= $total_column; $counter ++) {
                    $meta = $select->getColumnMeta($counter);
                    $column[] = $meta['name'];
                }
                $coulam = $column[0];

                $coulam1 = $column[1];

                $coulam2 = $column[2];

                $coulam3 = $column[3];

                $coulam4 = $column[4];

                $coulam5 = $column[5];

                $valyes = array_values($array);
                $val = $valyes[0];
                $val2 = $valyes[1];
                $val3 = $valyes[2];
                $val4 = $valyes[3];
                $val5 = $valyes[4];
                $val6 = $valyes[5];
                //----------------------------------------------------------
                $sql = "UPDATE `$tablename` SET `$coulam1` = :$coulam1, `$coulam2` = :$coulam2, `$coulam3` = :$coulam3, `$coulam4` = :$coulam4, `$coulam5` = :$coulam5  WHERE  `id` = :id;";

                if ($statement = $Data_communication->prepare($sql)) {
                    $statement->bindValue(":$coulam1", $val2, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam2", $val3, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam3", $val4, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam4", $val5, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam5", $val6, PDO::PARAM_STR);
                    $statement->bindValue(":id", $id, PDO::PARAM_INT);
                    if ($statement->execute()) {
                        echo $this->msg_up;
                    }
                }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        } elseif ($count == 7) {

            try {


                $select = $Data_communication->query('SELECT * FROM ' . $tablename);
                $total_column = $select->columnCount();
                for ($counter = 0; $counter <= $total_column; $counter ++) {
                    $meta = $select->getColumnMeta($counter);
                    $column[] = $meta['name'];
                }
                $coulam = $column[0];

                $coulam1 = $column[1];

                $coulam2 = $column[2];

                $coulam3 = $column[3];

                $coulam4 = $column[4];

                $coulam5 = $column[5];

                $coulam6 = $column[6];


                //----------------------------------------------------------
                $valyes = array_values($array);
                $val = $valyes[0];
                $val2 = $valyes[1];
                $val3 = $valyes[2];
                $val4 = $valyes[3];
                $val5 = $valyes[4];
                $val6 = $valyes[5];
                $val7 = $valyes[6];
                $sql = "UPDATE `$tablename` SET `$coulam1` = :$coulam1, `$coulam2` = :$coulam2, `$coulam3` = :$coulam3, `$coulam4` = :$coulam4, `$coulam5` = :$coulam5 , `$coulam6` = :$coulam6  WHERE  `id` = :id;";

                if ($statement = $Data_communication->prepare($sql)) {
                    $statement->bindValue(":$coulam1", $val2, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam2", $val3, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam3", $val4, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam4", $val5, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam5", $val6, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam6", $val7, PDO::PARAM_STR);
                    $statement->bindValue(":id", $id, PDO::PARAM_INT);
                    if ($statement->execute()) {
                        echo $this->msg_up;
                    }
                }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        } elseif ($count == 8) {

            try {


                $select = $Data_communication->query('SELECT * FROM ' . $tablename);
                $total_column = $select->columnCount();
                for ($counter = 0; $counter <= $total_column; $counter ++) {
                    $meta = $select->getColumnMeta($counter);
                    $column[] = $meta['name'];
                }
                $coulam = $column[0];

                $coulam1 = $column[1];

                $coulam2 = $column[2];

                $coulam3 = $column[3];

                $coulam4 = $column[4];

                $coulam5 = $column[5];

                $coulam6 = $column[6];

                $coulam7 = $column[7];

                $val = $valyes[0];
                $val2 = $valyes[1];
                $val3 = $valyes[2];
                $val4 = $valyes[3];
                $val5 = $valyes[4];
                $val6 = $valyes[5];
                $val7 = $valyes[6];
                $val8 = $valyes[7];
                //----------------------------------------------------------
                $sql = "UPDATE `$tablename` SET `$coulam1` = :$coulam1, `$coulam2` = :$coulam2, `$coulam3` = :$coulam3, `$coulam4` = :$coulam4, `$coulam5` = :$coulam5 , `$coulam6` = :$coulam6, `$coulam7` = :$coulam7  WHERE  `id` = :id;";

                if ($statement = $Data_communication->prepare($sql)) {
                    $statement->bindValue(":$coulam1", $val2, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam2", $val3, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam3", $val4, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam4", $val5, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam5", $val6, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam6", $val7, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam7", $val8, PDO::PARAM_STR);
                    $statement->bindValue(":id", $id, PDO::PARAM_INT);
                    if ($statement->execute()) {
                        echo $this->msg_up;
                    }
                }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        } elseif ($count == 9) {

            try {


                $select = $Data_communication->query('SELECT * FROM ' . $tablename);
                $total_column = $select->columnCount();
                for ($counter = 0; $counter <= $total_column; $counter ++) {
                    $meta = $select->getColumnMeta($counter);
                    $column[] = $meta['name'];
                }
                $coulam = $column[0];

                $coulam1 = $column[1];

                $coulam2 = $column[2];

                $coulam3 = $column[3];

                $coulam4 = $column[4];

                $coulam5 = $column[5];

                $coulam6 = $column[6];

                $coulam7 = $column[7];

                $coulam8 = $column[8];

                //----------------------------------------------------------
                $valyes = array_values($array);
                $val = $valyes[0];
                $val2 = $valyes[1];
                $val3 = $valyes[2];
                $val4 = $valyes[3];
                $val5 = $valyes[4];
                $val6 = $valyes[5];
                $val7 = $valyes[6];
                $val8 = $valyes[7];
                $val9 = $valyes[8];

                $sql = "UPDATE `$tablename` SET `$coulam1` = :$coulam1, `$coulam2` = :$coulam2, `$coulam3` = :$coulam3, `$coulam4` = :$coulam4, `$coulam5` = :$coulam5 , `$coulam6` = :$coulam6, `$coulam7` = :$coulam7, `$coulam8` = :$coulam8   WHERE  `id` = :id;";

                if ($statement = $Data_communication->prepare($sql)) {
                    $statement->bindValue(":$coulam1", $val2, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam2", $val3, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam3", $val4, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam4", $val5, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam5", $val6, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam6", $val7, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam7", $val8, PDO::PARAM_STR);
                    $statement->bindValue(":$coulam8", $val9, PDO::PARAM_STR);
                    $statement->bindValue(":id", $id, PDO::PARAM_INT);
                    if ($statement->execute()) {
                        echo $this->msg_up;
                    }
                }
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        }

        //----------------------------------------------------------
    }

    public function Malcom_xx_ins($array, $Data_communication, $tablename) {
        $keys = array_keys($array);


        $count = count($array);
        $count;


        if ($count == 1) {
            $string = array_values($array);

            $string[0];



            $select = $Data_communication->query('SELECT * FROM ' . $tablename);
            $total_column = $select->columnCount();
            for ($counter = 0; $counter <= $total_column; $counter ++) {
                $meta = $select->getColumnMeta($counter);
                $column[] = $meta['name'];
            }
            $coulam = $column[0];

            $coulam1 = $column[1];

            try {
                $val = $string[0];
                $string_SQL = "INSERT INTO `$tablename` ($coulam1 ) VALUES (?);";
                $sth = $Data_communication->prepare($string_SQL);
                $sth->bindParam(1, $val, PDO::PARAM_STR);
                if ($sth->execute()) {
                    echo $this->msg_ins;
                } else {
                    echo "Input failure to the database";
                }
            } catch (PDOException $ex) {
                $ex->getMessage() . "err";
            }
            $Data_communication = NULL;
        } elseif ($count == 2) {
            $string = array_values($array);
            $val = $string[0];
            $val2 = $string[1];
            //كده البحث عن عمودين


            $select = $Data_communication->query('SELECT * FROM ' . $tablename);
            $total_column = $select->columnCount();
            for ($counter = 0; $counter <= $total_column; $counter ++) {
                $meta = $select->getColumnMeta($counter);
                $column[] = $meta['name'];
            }
            $coulam = $column[0];

            $coulam1 = $column[1];

            $coulam2 = $column[2];


            //----------------------------------------------------------

            try {
                $string_SQL = "INSERT INTO `$tablename` ($coulam1 ,$coulam2) VALUES (?, ?);";

                $sth = $Data_communication->prepare($string_SQL);
                $sth->bindParam(1, $val, PDO::PARAM_STR);
                $sth->bindParam(2, $val2, PDO::PARAM_STR);
                if ($sth->execute()) {
                    echo $this->msg_ins;
                } else {
                    echo "Input failure to the database";
                }
            } catch (PDOException $ex) {
                $ex->getMessage() . "err";
            }
            $Data_communication = NULL;
        } elseif ($count == 3) {
            $valyes = array_values($array);
            $val = $valyes[0];
            $val2 = $valyes[1];
            $val3 = $valyes[2];



            $select = $Data_communication->query('SELECT * FROM ' . $tablename);
            $total_column = $select->columnCount();
            for ($counter = 0; $counter <= $total_column; $counter ++) {
                $meta = $select->getColumnMeta($counter);
                $column[] = $meta['name'];
            }
            $coulam = $column[0];

            $coulam1 = $column[1];

            $coulam2 = $column[2];

            $coulam3 = $column[3];


            //----------------------------------------------------------

            try {
                $string_SQL = "INSERT INTO `$tablename` ($coulam1 ,$coulam2,$coulam3) VALUES (?, ?, ?);";
                $sth = $Data_communication->prepare($string_SQL);
                $sth->bindParam(1, $val, PDO::PARAM_STR);
                $sth->bindParam(2, $val2, PDO::PARAM_STR);
                $sth->bindParam(3, $val3, PDO::PARAM_STR);
                if ($sth->execute()) {
                    echo $this->msg_ins;
                }
            } catch (PDOException $ex) {
                $ex->getMessage() . "err";
            }
            //كده البحث عن ثلاثة اعمدة
        } elseif
        ($count == 4) {
            $count;
            $valyes = array_values($array);
            $val = $valyes[0];
            $val2 = $valyes[1];
            $val3 = $valyes[2];
            $val4 = $valyes[3];


            $select = $Data_communication->query('SELECT * FROM ' . $tablename);
            $total_column = $select->columnCount();
            for ($counter = 0; $counter <= $total_column; $counter ++) {
                $meta = $select->getColumnMeta($counter);
                $column[] = $meta['name'];
            }
            $coulam = $column[0];

            $coulam1 = $column[1];

            $coulam2 = $column[2];

            $coulam3 = $column[3];

            $coulam4 = $column[4];


            //----------------------------------------------------------

            try {
                $string_SQL = "INSERT INTO `$tablename` ($coulam1 ,$coulam2,$coulam3,$coulam4) VALUES (?, ?, ?, ?);";
                $sth = $Data_communication->prepare($string_SQL);
                $sth->bindParam(1, $val, PDO::PARAM_STR);
                $sth->bindParam(2, $val2, PDO::PARAM_STR);
                $sth->bindParam(3, $val3, PDO::PARAM_STR);
                $sth->bindParam(4, $val4, PDO::PARAM_STR);
                if ($sth->execute()) {
                    echo $this->msg_ins;
                }
            } catch (PDOException $ex) {
                $ex->getMessage() . "err";
            }
            //كده البحث عن اربع اعمدة
        } elseif ($count == 5) {

            //كده البحث عن خمس اعمدة


            $select = $Data_communication->query('SELECT * FROM ' . $tablename);
            $total_column = $select->columnCount();
            for ($counter = 0; $counter <= $total_column; $counter ++) {
                $meta = $select->getColumnMeta($counter);
                $column[] = $meta['name'];
            }
            $coulam = $column[0];

            $coulam1 = $column[1];

            $coulam2 = $column[2];

            $coulam3 = $column[3];
            $coulam4 = $column[4];
            $coulam5 = $column[5];


            //----------------------------------------------------------
            $valyes = array_values($array);
            $val = $valyes[0];
            $val2 = $valyes[1];
            $val3 = $valyes[2];
            $val4 = $valyes[3];
            $val5 = $valyes[4];
            try {
                $string_SQL = "INSERT INTO `$tablename` ($coulam1 ,$coulam2,$coulam3,$coulam4,$coulam5) VALUES (?, ?, ?, ?, ?);";
                $sth = $Data_communication->prepare($string_SQL);
                $sth->bindParam(1, $val, PDO::PARAM_STR);
                $sth->bindParam(2, $val2, PDO::PARAM_STR);
                $sth->bindParam(3, $val3, PDO::PARAM_STR);
                $sth->bindParam(4, $val4, PDO::PARAM_STR);
                $sth->bindParam(5, $val5, PDO::PARAM_STR);
                if ($sth->execute()) {
                    echo $this->msg_ins;
                }
            } catch (PDOException $ex) {
                $ex->getMessage() . "err";
            }
        } elseif ($count == 6) {
            $valyes = array_values($array);
            $val = $valyes[0];
            $val2 = $valyes[1];
            $val3 = $valyes[2];
            $val4 = $valyes[3];
            $val5 = $valyes[4];
            $val6 = $valyes[5];


            $select = $Data_communication->query('SELECT * FROM ' . $tablename);
            $total_column = $select->columnCount();
            for ($counter = 0; $counter <= $total_column; $counter ++) {
                $meta = $select->getColumnMeta($counter);
                $column[] = $meta['name'];
            }
            $coulam = $column[0];

            $coulam1 = $column[1];

            $coulam2 = $column[2];

            $coulam3 = $column[3];

            $coulam4 = $column[4];

            $coulam5 = $column[5];

            $coulam6 = $column[6];


            //----------------------------------------------------------
            $valyes = array_values($array);
            $val = $valyes[0];
            $val2 = $valyes[1];
            $val3 = $valyes[2];
            $val4 = $valyes[3];
            $val5 = $valyes[4];
            $val6 = $valyes[5];
            try {
                $string_SQL = "INSERT INTO `$tablename` ($coulam1 ,$coulam2,$coulam3,$coulam4,$coulam5,$coulam6) VALUES (?, ?, ?, ?, ?, ?);";
                $sth = $Data_communication->prepare($string_SQL);
                $sth->bindParam(1, $val, PDO::PARAM_STR);
                $sth->bindParam(2, $val2, PDO::PARAM_STR);
                $sth->bindParam(3, $val3, PDO::PARAM_STR);
                $sth->bindParam(4, $val4, PDO::PARAM_STR);
                $sth->bindParam(5, $val5, PDO::PARAM_STR);
                $sth->bindParam(6, $val6, PDO::PARAM_STR);
                if ($sth->execute()) {
                    $this->msg_ins;
                }
            } catch (PDOException $ex) {
                $ex->getMessage() . "err";
            }
        } elseif ($count == 7) {



            $select = $Data_communication->query('SELECT * FROM ' . $tablename);
            $total_column = $select->columnCount();
            for ($counter = 0; $counter <= $total_column; $counter ++) {
                $meta = $select->getColumnMeta($counter);
                $column[] = $meta['name'];
            }
            $coulam = $column[0];

            $coulam1 = $column[1];

            $coulam2 = $column[2];

            $coulam3 = $column[3];

            $coulam4 = $column[4];

            $coulam5 = $column[5];

            $coulam6 = $column[6];

            $coulam7 = $column[7];



            $valyes = array_values($array);
            $val = $valyes[0];
            $val2 = $valyes[1];
            $val3 = $valyes[2];
            $val4 = $valyes[3];
            $val5 = $valyes[4];
            $val6 = $valyes[5];
            $val7 = $valyes[6];
            //----------------------------------------------------------

            try {
                $string_SQL = "INSERT INTO `$tablename` ($coulam1 ,$coulam2,$coulam3,$coulam4,$coulam5,$coulam6,$coulam7) VALUES (?, ?, ?, ?, ?, ?, ?);";
                $sth = $Data_communication->prepare($string_SQL);
                $sth->bindParam(1, $val, PDO::PARAM_STR);
                $sth->bindParam(2, $val2, PDO::PARAM_STR);
                $sth->bindParam(3, $val3, PDO::PARAM_STR);
                $sth->bindParam(4, $val4, PDO::PARAM_STR);
                $sth->bindParam(5, $val5, PDO::PARAM_STR);
                $sth->bindParam(6, $val6, PDO::PARAM_STR);
                $sth->bindParam(7, $val7, PDO::PARAM_STR);
                if ($sth->execute()) {
                    echo $this->msg_ins;
                }
            } catch (PDOException $ex) {
                $ex->getMessage() . "err";
            }
        } elseif ($count == 8) {



            $select = $Data_communication->query('SELECT * FROM ' . $tablename);
            $total_column = $select->columnCount();
            for ($counter = 0; $counter <= $total_column; $counter ++) {
                $meta = $select->getColumnMeta($counter);
                $column[] = $meta['name'];
            }
            $coulam = $column[0];

            $coulam1 = $column[1];

            $coulam2 = $column[2];

            $coulam3 = $column[3];

            $coulam4 = $column[4];

            $coulam5 = $column[5];

            $coulam6 = $column[6];

            $coulam7 = $column[7];

            $coulam8 = $column[8];


            //----------------------------------------------------------

            try {
                $valyes = array_values($array);
                $val = $valyes[0];
                $val2 = $valyes[1];
                $val3 = $valyes[2];
                $val4 = $valyes[3];
                $val5 = $valyes[4];
                $val6 = $valyes[5];
                $val7 = $valyes[6];
                $val8 = $valyes[7];
                $val9 = $valyes[8];
                $string_SQL = "INSERT INTO `$tablename` ($coulam1 ,$coulam2,$coulam3,$coulam4,$coulam5,$coulam6,$coulam7,$coulam8,) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
                $sth = $Data_communication->prepare($string_SQL);
                $sth->bindParam(1, $val, PDO::PARAM_STR);
                $sth->bindParam(2, $val2, PDO::PARAM_STR);
                $sth->bindParam(3, $val3, PDO::PARAM_STR);
                $sth->bindParam(4, $val4, PDO::PARAM_STR);
                $sth->bindParam(5, $val5, PDO::PARAM_STR);
                $sth->bindParam(6, $val6, PDO::PARAM_STR);
                $sth->bindParam(7, $val7, PDO::PARAM_STR);
                $sth->bindParam(8, $val8, PDO::PARAM_STR);
                if ($sth->execute()) {
                    echo $this->msg_ins;
                }
            } catch (PDOException $ex) {
                $ex->getMessage() . "err";
            }
        } elseif ($count == 9) {



            $select = $Data_communication->query('SELECT * FROM ' . $tablename);
            $total_column = $select->columnCount();
            for ($counter = 0; $counter <= $total_column; $counter ++) {
                $meta = $select->getColumnMeta($counter);
                $column[] = $meta['name'];
            }
            $coulam = $column[0];

            $coulam1 = $column[1];

            $coulam2 = $column[2];

            $coulam3 = $column[3];

            $coulam4 = $column[4];

            $coulam5 = $column[5];

            $coulam6 = $column[6];

            $coulam7 = $column[7];

            $coulam8 = $column[8];
            $coulam9 = $column[9];


            //----------------------------------------------------------

            try {
                $valyes = array_values($array);
                $val = $valyes[0];
                $val2 = $valyes[1];
                $val3 = $valyes[2];
                $val4 = $valyes[3];
                $val5 = $valyes[4];
                $val6 = $valyes[5];
                $val7 = $valyes[6];
                $val8 = $valyes[7];
                $val9 = $valyes[8];
                $string_SQL = "INSERT INTO `$tablename` ($coulam1 ,$coulam2,$coulam3,$coulam4,$coulam5,$coulam6,$coulam7,$coulam8,$coulam9) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?);";
                $sth = $Data_communication->prepare($string_SQL);
                $sth->bindParam(1, $val, PDO::PARAM_STR);
                $sth->bindParam(2, $val2, PDO::PARAM_STR);
                $sth->bindParam(3, $val3, PDO::PARAM_STR);
                $sth->bindParam(4, $val4, PDO::PARAM_STR);
                $sth->bindParam(5, $val5, PDO::PARAM_STR);
                $sth->bindParam(6, $val6, PDO::PARAM_STR);
                $sth->bindParam(7, $val7, PDO::PARAM_STR);
                $sth->bindParam(8, $val8, PDO::PARAM_STR);
                if ($sth->execute()) {
                    echo $this->msg_ins;
                }
            } catch (PDOException $ex) {
                $ex->getMessage() . "err";
            }
        } elseif ($count == 10) {



            $select = $Data_communication->query('SELECT * FROM ' . $tablename);
            $total_column = $select->columnCount();
            for ($counter = 0; $counter <= $total_column; $counter ++) {
                $meta = $select->getColumnMeta($counter);
                $column[] = $meta['name'];
            }
            $coulam = $column[0];

            $coulam1 = $column[1];

            $coulam2 = $column[2];

            $coulam3 = $column[3];

            $coulam4 = $column[4];

            $coulam5 = $column[5];

            $coulam6 = $column[6];

            $coulam7 = $column[7];

            $coulam8 = $column[8];
            $coulam9 = $column[9];


            //----------------------------------------------------------

            try {
                $valyes = array_values($array);
                $val = $valyes[0];
                $val2 = $valyes[1];
                $val3 = $valyes[2];
                $val4 = $valyes[3];
                $val5 = $valyes[4];
                $val6 = $valyes[5];
                $val7 = $valyes[6];
                $val8 = $valyes[7];
                $val9 = $valyes[8];
                $string_SQL = "INSERT INTO `$tablename` ($coulam1 ,$coulam2,$coulam3,$coulam4,$coulam5,$coulam6,$coulam7,$coulam8,$coulam9) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?);";
                $sth = $Data_communication->prepare($string_SQL);
                $sth->bindParam(1, $val, PDO::PARAM_STR);
                $sth->bindParam(2, $val2, PDO::PARAM_STR);
                $sth->bindParam(3, $val3, PDO::PARAM_STR);
                $sth->bindParam(4, $val4, PDO::PARAM_STR);
                $sth->bindParam(5, $val5, PDO::PARAM_STR);
                $sth->bindParam(6, $val6, PDO::PARAM_STR);
                $sth->bindParam(7, $val7, PDO::PARAM_STR);
                $sth->bindParam(8, $val8, PDO::PARAM_STR);
                if ($sth->execute()) {
                    echo $this->msg_ins;
                }
            } catch (PDOException $ex) {
                $ex->getMessage() . "err";
            }
        } elseif ($count == 11) {



            $select = $Data_communication->query('SELECT * FROM ' . $tablename);
            $total_column = $select->columnCount();
            for ($counter = 0; $counter <= $total_column; $counter ++) {
                $meta = $select->getColumnMeta($counter);
                $column[] = $meta['name'];
            }
            $coulam = $column[0];

            $coulam1 = $column[1];

            $coulam2 = $column[2];

            $coulam3 = $column[3];

            $coulam4 = $column[4];

            $coulam5 = $column[5];

            $coulam6 = $column[6];

            $coulam7 = $column[7];

            $coulam8 = $column[8];
            $coulam9 = $column[9];


            //----------------------------------------------------------

            try {
                $valyes = array_values($array);
                $val = $valyes[0];
                $val2 = $valyes[1];
                $val3 = $valyes[2];
                $val4 = $valyes[3];
                $val5 = $valyes[4];
                $val6 = $valyes[5];
                $val7 = $valyes[6];
                $val8 = $valyes[7];
                $val9 = $valyes[8];
                $string_SQL = "INSERT INTO `$tablename` ($coulam1 ,$coulam2,$coulam3,$coulam4,$coulam5,$coulam6,$coulam7,$coulam8,$coulam9) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?);";
                $sth = $Data_communication->prepare($string_SQL);
                $sth->bindParam(1, $val, PDO::PARAM_STR);
                $sth->bindParam(2, $val2, PDO::PARAM_STR);
                $sth->bindParam(3, $val3, PDO::PARAM_STR);
                $sth->bindParam(4, $val4, PDO::PARAM_STR);
                $sth->bindParam(5, $val5, PDO::PARAM_STR);
                $sth->bindParam(6, $val6, PDO::PARAM_STR);
                $sth->bindParam(7, $val7, PDO::PARAM_STR);
                $sth->bindParam(8, $val8, PDO::PARAM_STR);
                if ($sth->execute()) {
                    echo $this->msg_ins;
                }
            } catch (PDOException $ex) {
                $ex->getMessage() . "err";
            }
        } elseif ($count == 12) {



            $select = $Data_communication->query('SELECT * FROM ' . $tablename);
            $total_column = $select->columnCount();
            for ($counter = 0; $counter <= $total_column; $counter ++) {
                $meta = $select->getColumnMeta($counter);
                $column[] = $meta['name'];
            }
            $coulam = $column[0];

            $coulam1 = $column[1];

            $coulam2 = $column[2];

            $coulam3 = $column[3];

            $coulam4 = $column[4];

            $coulam5 = $column[5];

            $coulam6 = $column[6];

            $coulam7 = $column[7];

            $coulam8 = $column[8];
            $coulam9 = $column[9];


            //----------------------------------------------------------

            try {
                $valyes = array_values($array);
                $val = $valyes[0];
                $val2 = $valyes[1];
                $val3 = $valyes[2];
                $val4 = $valyes[3];
                $val5 = $valyes[4];
                $val6 = $valyes[5];
                $val7 = $valyes[6];
                $val8 = $valyes[7];
                $val9 = $valyes[8];
                $string_SQL = "INSERT INTO `$tablename` ($coulam1 ,$coulam2,$coulam3,$coulam4,$coulam5,$coulam6,$coulam7,$coulam8,$coulam9) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?);";
                $sth = $Data_communication->prepare($string_SQL);
                $sth->bindParam(1, $val, PDO::PARAM_STR);
                $sth->bindParam(2, $val2, PDO::PARAM_STR);
                $sth->bindParam(3, $val3, PDO::PARAM_STR);
                $sth->bindParam(4, $val4, PDO::PARAM_STR);
                $sth->bindParam(5, $val5, PDO::PARAM_STR);
                $sth->bindParam(6, $val6, PDO::PARAM_STR);
                $sth->bindParam(7, $val7, PDO::PARAM_STR);
                $sth->bindParam(8, $val8, PDO::PARAM_STR);
                if ($sth->execute()) {
                    echo $this->msg_ins;
                }
            } catch (PDOException $ex) {
                $ex->getMessage() . "err";
            }
        }
    }

}
