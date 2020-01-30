<?php

function count_like($cnn, $query, $key) {
//
//    $sql = "select * from  job where  Country  LIKE :keyword ";
//    $array_var = array();
//    $password_resets = $a->count($Data_communication, $sql, $array_var);

    $stmt = $cnn->prepare($query);
    $stmt->bindValue(':keyword', '%' . $key . '%', PDO::PARAM_STR);

    $stmt->execute();
    return $stmt->rowCount();
}

function sql_feth($Data_communication, $array) {
    $sth = $Data_communication->prepare("SELECT * FROM `registration` where email = ?");
    $sth->execute($array);
    $xssa = $sth->fetchAll();
    $full_name = null;
    foreach ($xssa as $ll):
        $full_name = $ll['forename'] . "  " . $ll['last_name'];
    endforeach;
    return $full_name;
}

function sel_user($Data_communication, $array) {
    $sth = $Data_communication->prepare("SELECT * FROM `registration` where user = ?");
    $sth->execute($array);
    $xssa = $sth->fetchAll();
    foreach ($xssa as $ll):
        $full_name = $ll['forename'] . "  " . $ll['last_name'];
    endforeach;
    return $full_name;
}

function sql_feth_id($Data_communication, $array) {
    $sth = $Data_communication->prepare("SELECT * FROM `sign_up` where Email = ?");
    $sth->execute($array);
    $xssa = $sth->fetchAll();
    $full_name = null;
    foreach ($xssa as $ll):
        $full_name = $ll['id'];
    endforeach;
    return $full_name;
}

function id_g($cnn, $id) {
    $query = "select * from pictures  where id =?  ";
    $sth = $cnn->prepare($query);
    $array = array($id);
    $sth->execute($array);
    $xssa = $sth->fetchAll();
    foreach ($xssa as $ll):
        echo $ll['Title'];
    endforeach;
}

function data_mysql__($date) {
    if (!empty($date)) {
        $timestamp = strtotime($date);
        if ($timestamp === FALSE) {
            $timestamp = strtotime(str_replace('/', '-', $date));
        }
        return $date = date('Y-M-d', $timestamp);
    }
}

function googel_ads($Data_communication, $contact, $Bottom) {
    $query = "select * from  googel_ads where Page = ? and Location = ? ";
    $sth = $Data_communication->prepare($query);
    $array = array($contact, $Bottom);
    $sth->execute($array);
    $xssa = $sth->fetchAll();
    if (count($xssa) > 0) :
        foreach ($xssa as $value):
            echo $ads = $value['ads'];
        endforeach;
    endif;
}

function count_comant($cnn, $id) {
    $sql = "SELECT * FROM `cv` where user = ?  ";
    $array = array($id);
    try {
        $sth = $cnn->prepare($sql);
        $sth->execute($array);
        //   echo $sth->rowCount();
        if ($sth->rowCount() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    } finally {
        
    }
}

function login2($cnn, $array) {
    $sql = "SELECT * FROM `registration` where email= ?  and Password = ?";
    try {
        $sth = $cnn->prepare($sql);
        $sth->execute($array);
        echo $sth->rowCount();
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    } finally {
        $cnn = NULL;
    }
}

function login($email, $password, $cnn) {
    $sql = "SELECT * FROM `registration` WHERE `email`=?";
    $user = $sth = $cnn->prepare($sql);
    $sth->execute([$email]);
    $user = $sth->fetchAll();
    return password_verify($password, $user['password']);
}

function rowCount($cnn, $sql, $array) {
    try {
        $sth = $cnn->prepare($sql);
        $sth->execute($array);
        return $sth->rowCount();
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    } finally {
        $cnn = null;
    }
}

function rowCount_int($cnn, $sql, $id) {
    $array = array($id);
    try {
        $sth = $cnn->prepare($sql);
        $sth->execute($array);
        return $sth->rowCount();
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    } finally {
        
    }
}

function data_mysql($date) {
    if (!empty($date)) {
        $timestamp = strtotime($date);
        if ($timestamp === FALSE) {
            $timestamp = strtotime(str_replace('/', '-', $date));
        }
        return $date = date('Y-m-d', $timestamp);
    }
}

function set_lang($sql_eng, $sql_ar) {
    if ($_SESSION['lang'] == "ar") {
        return $sql_ar;
    } elseif ($_SESSION['lang'] == "eng") {
        return $sql_eng;
    } else {
        return $sql_ar;
    }
}

function function_that_shortens_text_but_doesnt_cutoff_words($text, $length) {
    if (strlen($text) > $length) {
        $text = substr($text, 0, strpos($text, ' ', $length));
    }

    return $text;
}

function files_modified($File, $Track, $default_path, $file_name, $int = 100) {
    try {
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $file;

        if (!file_exists($File)) {

            return $target_path = filter_var($default_path, FILTER_SANITIZE_STRING);
        } else {

//====================================================
            $DelFilePath = filter_var($default_path, FILTER_SANITIZE_STRING);
            $Images = $Track . $DelFilePath;
            if (file_exists($Images)) {
                unlink($Images);
            } else {
                
            }
//=====================================================
            $target_path = $Track . time() . rand($int, $int) . "." . $extension;
            if (move_uploaded_file($File, $target_path)) {
//  $target_path = time() . $file_name;

                return $target_patsh = time() . rand($int, $int) . "." . $extension;
                $file = $target_patsh;
            }
        }
    } catch (Exception $ex) {
        
    }
}

function files_add($File, $file_name, $Track, $int = 100) {
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
    $target_path = $Track . time() . rand($int, $int) . "." . $extension;
    if (move_uploaded_file($File, $target_path)) {
        return $target_patsh = time() . rand($int, $int) . "." . $extension;
        ;
    }
}

function set_first_cher($firstCharacter) {
    return $firstCharacter = strtoupper(substr($firstCharacter, 0, 1));
}

function set_first_cher_arabic($firstCharacter) {
    return $firstCharacter = strtoupper(substr($firstCharacter, 0, 2));
}

function set_first_cher_coler($firstCharacter) {
    $firstCharacter = strtoupper(substr($firstCharacter, 0, 1));
#    $array = array("#2aa556", "#40b7ff", "#ff7f40", "#ff40a0", "#ff4040", "#acb4b3", "#3d8346", "#2b4970", "#2b706d", "#217618", "#27dd93", "#7727dd", "#27badd", "#c0c7b1", "#e8c177", "#77e2e8", "#e877b5", "#7f3b60", "#3b4c7f", "#7f3b7c", "#0e97db", "#0edb9a", "##5796b6", "#b66957", "#3b7e7f", "#27aadd");
    $array = array("#2aa556", "#40b7ff", "#ff7f40", "#ff40a0", "#ff4040", "#acb4b3", "#3d8346", "#2b4970", "#2b706d", "#217618", "#27dd93", "#7727dd", "#27badd", "#c0c7b1", "#e8c177", "#77e2e8", "#e877b5", "#7f3b60", "#3b4c7f", "#7f3b7c", "#0e97db", "#0edb9a", "##5796b6", "#b66957", "#3b7e7f", "#27aadd");

    if ($firstCharacter == 'A' && $firstCharacter == 'ب') {
        return $style = "style=\"background:$array[0];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'B') {
        return $style = "style=\"background:$array[1];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'C') {
        return $style = "style=\"background:$array[2];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'D') {
        return $style = "style=\"background:$array[3];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'E') {
        return $style = "style=\"background:$array[4];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'F') {
        return $style = "style=\"background:$array[5];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'J') {
        return $style = "style=\"background:$array[6];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'K') {
        return $style = "style=\"background:$array[7];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'L') {
        return $style = "style=\"background:$array[8];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'M') {
        return $style = "style=\"background:$array[9];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'N') {
        return $style = "style=\"background:$array[10];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'O') {
        return $style = "style=\"background:$array[11];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'P') {
        return $style = "style=\"background:$array[12];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'Q') {
        return $style = "style=\"background:$array[13];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'R') {
        return $style = "style=\"background:$array[14];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'S') {
        return $style = "style=\"background:$array[15];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'T') {
        return $style = "style=\"background:$array[16];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'U') {
        return $style = "style=\"background:$array[17];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'V') {
        return $style = "style=\"background:$array[18];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'W') {
        return $style = "style=\"background:$array[19];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'X') {
        return $style = "style=\"background:$array[20];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'W') {
        return $style = "style=\"background:$array[21];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'Z') {
        return $style = "style=\"background:$array[22];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'H') {
        return $style = "style=\"background:$array[23];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'I') {
        return $style = "style=\"background:$array[24];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'Y') {
        return $style = "style=\"background:$array[25];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }

    return $style = "style=\"background:$array[25];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
}

function set_first_cher_coler_arabic($firstCharacter) {
    $firstCharacter = strtoupper(substr($firstCharacter, 0, 2));
#    $array = array("#2aa556", "#40b7ff", "#ff7f40", "#ff40a0", "#ff4040", "#acb4b3", "#3d8346", "#2b4970", "#2b706d", "#217618", "#27dd93", "#7727dd", "#27badd", "#c0c7b1", "#e8c177", "#77e2e8", "#e877b5", "#7f3b60", "#3b4c7f", "#7f3b7c", "#0e97db", "#0edb9a", "##5796b6", "#b66957", "#3b7e7f", "#27aadd");
    $array = array("#2aa556", "#40b7ff", "#ff7f40", "#ff40a0", "#ff4040", "#acb4b3", "#3d8346", "#2b4970", "#2b706d", "#217618", "#27dd93", "#7727dd", "#27badd", "#c0c7b1", "#e8c177", "#77e2e8", "#e877b5", "#7f3b60", "#3b4c7f", "#7f3b7c", "#0e97db", "#0edb9a", "##5796b6", "#b66957", "#3b7e7f", "#27aadd");

    if ($firstCharacter == 'ه') {
        return $style = "style=\"background:$array[0];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'ل') {
        return $style = "style=\"background:$array[1];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'ح') {
        return $style = "style=\"background:$array[2];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'م') {
        return $style = "style=\"background:$array[3];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'ق') {
        return $style = "style=\"background:$array[4];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'و') {
        return $style = "style=\"background:$array[5];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'ش') {
        return $style = "style=\"background:$array[6];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'ر') {
        return $style = "style=\"background:$array[7];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'ب') {
        return $style = "style=\"background:$array[8];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'ت') {
        return $style = "style=\"background:$array[9];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'س') {
        return $style = "style=\"background:$array[10];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'ك') {
        return $style = "style=\"background:$array[11];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'ن') {
        return $style = "style=\"background:$array[12];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'خ') {
        return $style = "style=\"background:$array[13];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'ص') {
        return $style = "style=\"background:$array[14];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'س') {
        return $style = "style=\"background:$array[15];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'ف') {
        return $style = "style=\"background:$array[16];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'ا') {
        return $style = "style=\"background:$array[17];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'ع') {
        return $style = "style=\"background:$array[18];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'ض') {
        return $style = "style=\"background:$array[19];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'ج') {
        return $style = "style=\"background:$array[20];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'د') {
        return $style = "style=\"background:$array[21];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'غ') {
        return $style = "style=\"background:$array[22];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'ط') {
        return $style = "style=\"background:$array[23];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'ز') {
        return $style = "style=\"background:$array[24];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'ي') {
        return $style = "style=\"background:$array[25];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'ث') {
        return $style = "style=\"background:$array[25];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }
    if ($firstCharacter == 'ظ') {
        return $style = "style=\"background:$array[25];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
    }

    return $style = "style=\"background:$array[25];width: 50px;height: 50px;font-size: 39px;font-family: tahoma;border-radius: 26px;\" ";
}

function remove_words($words) {
    $words = preg_replace('/0/', '', $words); // remove numbers
    $words = preg_replace('/1/', '', $words); // remove numbers
    $words = preg_replace('/2/', '', $words); // remove numbers
    $words = preg_replace('/3/', '', $words); // remove numbers
    $words = preg_replace('/4/', '', $words); // remove numbers
    $words = preg_replace('/5/', '', $words); // remove numbers
    $words = preg_replace('/6/', '', $words); // remove numbers
    $words = preg_replace('/7/', '', $words); // remove numbers
    $words = preg_replace('/8/', '', $words); // remove numbers
    $words = preg_replace('/9/', '', $words); // remove numbers
    return trim($words);
}


