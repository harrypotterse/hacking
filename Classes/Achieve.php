<?php

/*
  Texts
  And numbers
  Links
  Email Address
  Date
  Time
 * 
 */

class Achieve {

//التعامل مع النصوص
//عدد الكلمات في الجملة
    function get_num_of_words($string) {
        $string = preg_replace('/\s+/', ' ', trim($string));
        $words = explode(" ", $string);
        return count($words);
    }

    function all_file($path) {
        foreach (scandir(dirname(__FILE__)) as $filename) {
            $path = dirname(__FILE__) . '/' . $filename;
            if (is_file($path)) {
                require $path;
            }
        }
    }

//التعامل مع النموذج
//  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])
    public function form_htmlspecialchars() {
        return htmlspecialchars($_SERVER["PHP_SELF"]);
    }

    public function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    function clean_($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }

    function cleanString($text) {
        $utf8 = array(
            '/[áàâãªä]/u' => 'a',
            '/[ÁÀÂÃÄ]/u' => 'A',
            '/[ÍÌÎÏ]/u' => 'I',
            '/[íìîï]/u' => 'i',
            '/[éèêë]/u' => 'e',
            '/[ÉÈÊË]/u' => 'E',
            '/[óòôõºö]/u' => 'o',
            '/[ÓÒÔÕÖ]/u' => 'O',
            '/[úùûü]/u' => 'u',
            '/[ÚÙÛÜ]/u' => 'U',
            '/ç/' => 'c',
            '/Ç/' => 'C',
            '/ñ/' => 'n',
            '/Ñ/' => 'N',
            '/–/' => '-', // UTF-8 hyphen to "normal" hyphen
            '/[’‘‹›‚]/u' => ' ', // Literally a single quote
            '/[“”«»„]/u' => ' ', // Double quote
            '/ /' => ' ', // nonbreaking space (equiv. to 0x160)
        );
        return preg_replace(array_keys($utf8), array_values($utf8), $text);
    }

    public function Filter_texts($string) {
        $string = filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $string = filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
//        $string = filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
//        $string = filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $string = filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP);
        $string = filter_var($string, FILTER_SANITIZE_STRING);
        $string = trim($string);
        $string = stripslashes($string);
        $string = htmlspecialchars($string);
        $string = $this->clean($string);
        $string = $this->clean_($string);


        return $string;
    }

    public function Filter_int($string) {
        $string = filter_var($string, FILTER_SANITIZE_NUMBER_INT);
        $string = trim($string);
        $string = stripslashes($string);
        $string = htmlspecialchars($string);
        return $string;
    }

    public function Filter_texts_basc($string) {
        $string = filter_var($string, FILTER_SANITIZE_STRING);
        $string = trim($string);
        $string = stripslashes($string);
        $string = htmlspecialchars($string);
        return $string;
    }

    public function check_up($string) {
        $string = trim($string);
        $string = stripslashes($string);
        $string = htmlspecialchars($string);
    }

    public function post() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") :
            return TRUE;
        else :
            return FALSE;
        endif;
    }

    public function get() {
        if ($_SERVER["REQUEST_METHOD"] == "get") :
            return TRUE;
        else :
            return FALSE;
        endif;
    }

    public function empty_filed_isset($string) {
        if (!empty($string) && isset($string)) :
            return TRUE;
        else:
            return FALSE;
        endif;
    }

    public function empty_filed($string) {
        if (!empty($string)) :
            return TRUE;
        else:
            return FALSE;
        endif;
    }

    public function Validate_E_mail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function Validate_URL($url) {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function existence_query($url) {

        if (!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function int_rang($int, $max, $min) {
        if (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function highlightWords($string, $word) {

        $string = str_replace($word, "<span class='highlight'>" . $word . "</span>", $string);
        /*         * * return the highlighted string ** */
        return $string;
    }

    function Custom_character($string, $array) {
        foreach ($array as $key) {
            $string = trim(str_replace($key, ' ', $string));
        }

        return $string;
    }

    function limit_text($text, $limit) {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }

    public function Mailsystems_live($email) {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = strtolower($email);


        if (stristr($email, '@live.com') === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function Mailsystems_hotmail($email) {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = strtolower($email);
        if (stristr($email, '@hotmail.com') === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function Mailsystems_yahoo($email) {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = strtolower($email);


        if (stristr($email, '@yahoo.com') === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function Mailsystems_gmail($email) {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = strtolower($email);
        if (stristr($email, '@gmail.com') === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function Mailsystems($email) {
        if ($this->Mailsystems_gmail($email) || $this->Mailsystems_hotmail($email) || $this->Mailsystems_live($email) || $this->Mailsystems_yahoo($email)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function integer($int) {
        // $int = filter_var($int, FILTER_SANITIZE_NUMBER_INTG);
        if (is_numeric($int)):
            return TRUE;
        else:
            return FALSE;
        endif;
    }

    public function int_filter($int) {
        $int = filter_var($int, FILTER_SANITIZE_NUMBER_INT);
        $int = trim(str_replace("+", '', $int));
        $int = trim(str_replace("-", '', $int));
        $int = trim(str_replace("%", '', $int));
        $int = trim(str_replace("/", '', $int));
        return $int;
    }

    public function data($data) {
        $int = filter_var($int, FILTER_SANITIZE_);
        if (is_numeric($int)):
            return TRUE;
        else:
            return FALSE;
        endif;
    }

    function unserializeForm($str) {
        $strArray = explode("&", $str);
        foreach ($strArray as $item) {
            $array = explode("=", $item);
            $returndata[] = $array;
        }
        return $returndata;
    }

    public function time_since($start) {
        $end = time();
        $diff = $end - $start;
        $days = floor($diff / 86400); //calculate the days
        $diff = $diff - ($days * 86400); // subtract the days
        $hours = floor($diff / 3600); // calculate the hours
        $diff = $diff - ($hours * 3600); // subtract the hours
        $mins = floor($diff / 60); // calculate the minutes
        $diff = $diff - ($mins * 60); // subtract the mins
        $secs = $diff; // what's left is the seconds;
        if ($secs != 0) {
            $secs .= " seconds";
            if ($secs == "1 seconds")
                $secs = "1 second";
        } else
            $secs = '';
        if ($mins != 0) {
            $mins .= " mins ";
            if ($mins == "1 mins ")
                $mins = "1 min ";
            $secs = '';
        } else
            $mins = '';
        if ($hours != 0) {
            $hours .= " hours ";
            if ($hours == "1 hours ")
                $hours = "1 hour ";
            $secs = '';
        } else
            $hours = '';
        if ($days != 0) {
            $days .= " days ";
            if ($days == "1 days ")
                $days = "1 day ";
            $mins = '';
            $secs = '';
            if ($days == "-1 days ") {
                $days = $hours = $mins = '';
                $secs = "less than 10 seconds";
            }
        } else
            $days = '';
        return "$days $hours $mins $secs ago";
    }

    public function time_since_ar($start) {
        $end = time();
        $diff = $end - $start;
        $days = floor($diff / 86400); //calculate the days
        $diff = $diff - ($days * 86400); // subtract the days
        $hours = floor($diff / 3600); // calculate the hours
        $diff = $diff - ($hours * 3600); // subtract the hours
        $mins = floor($diff / 60); // calculate the minutes
        $diff = $diff - ($mins * 60); // subtract the mins
        $secs = $diff; // what's left is the seconds;
        if ($secs != 0) {
            $secs .= " ثانية";
            if ($secs == "1 ثانية")
                $secs = "1 ثانية";
        } else
            $secs = '';
        if ($mins != 0) {
            $mins .= " دقيقة ";
            if ($mins == "1 دقيقة ")
                $mins = "1 دقيقة ";
            $secs = '';
        } else
            $mins = '';
        if ($hours != 0) {
            $hours .= " hours ";
            if ($hours == "1 hours ")
                $hours = "1 hour ";
            $secs = '';
        } else
            $hours = '';
        if ($days != 0) {
            $days .= " days ";
            if ($days == "1 days ")
                $days = "1 day ";
            $mins = '';
            $secs = '';
            if ($days == "-1 days ") {
                $days = $hours = $mins = '';
                $secs = "less than 10 seconds";
            }
        } else
            $days = '';
        return "$days $hours $mins $secs ago";
    }

    public function FILTER_SANITIZE_STRING($string) {
        $string = filter_var($string, FILTER_SANITIZE_STRING);
        $string = htmlspecialchars($string);
        return $string;
    }

    public function FILTER_SANITIZE_EMAIL($string) {
        $string = filter_var($string, FILTER_SANITIZE_EMAIL);
        $string = htmlspecialchars($string);
        return $string;
    }

    public function FILTER_SANITIZE($string) {
        $string = filter_var($string, FILTER_SANITIZE_URL);
        $string = htmlspecialchars($string);
        return $string;
    }

    public function FILTER_SANITIZE_INT($string) {
        $string = filter_var($string, FILTER_SANITIZE_NUMBER_INT);
        $string = htmlspecialchars($string);
        return $string;
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function del_row($cnn, $id, $string_sql) {
        try {
            $sth = $cnn->prepare($string_sql);
            $sth->execute(array($id));
        } catch (PDOException $ex) {
            
        }
    }

    public function updata($cnn, $string_sql, $var1, $id) {
        try {
            $sth = $cnn->prepare($string_sql);
            $sth->execute(array($var1, $id));
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function row_db($cnn, $query, $array) {
        try {

            $stmt = $cnn->prepare($query);
            $stmt->execute($array);
            if ($stmt->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        } finally {
            $cdn = null;
            $stmt = null;
        }
    }

    public function count($cnn, $query, $array) {
        try {

            $stmt = $cnn->prepare($query);
            $stmt->execute($array);
            return $stmt->rowCount();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        } finally {
            $cdn = null;
            $stmt = null;
        }
    }

    public function row_db_profile($cnn, $query, $array) {
        try {

            $stmt = $cnn->prepare($query);
            $stmt->execute($array);
            if ($stmt->rowCount() > 1) {
                return true;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        } finally {
            $cdn = null;
            $stmt = null;
        }
    }

    public function existing($cnn, $query, $arra) {

             try {

            $stmt = $cnn->prepare($query);
            $stmt->execute($array);
            if ($stmt->rowCount() > 1) {
                return true;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        } finally {
            $cdn = null;
            $stmt = null;
        }
    }

    public function sql($Data_communication, $query, $array) {
        $sth = $Data_communication->prepare($query);
        $sth->execute($array);
        return $id = $Data_communication->lastInsertId();
    }

    public function sql_feth($Data_communication, $query, $array) {
        $sth = $Data_communication->prepare($query);
        $sth->execute($array);
        $xssa = $sth->fetchAll();
        return $xssa;
    }

    public function sql_feth_var($Data_communication, $query, $array) {
        $sth = $Data_communication->prepare($query);
        $sth->execute($array);
        $xssa = $sth->fetchAll();
        $array_key = array();
        foreach ($xssa as $value) {
            $array_key[] = $value;
        }
        return $array_key;
    }

    public function coulam_name($Data_communication, $tablename) {
        try {
            $select = $Data_communication->query('SELECT * FROM ' . $tablename);
            $total_column = $select->columnCount();
            for ($counter = 0; $counter <= $total_column; $counter ++) {
                $meta = $select->getColumnMeta($counter);
                $column[] = $meta['name'];
            }
            return $column;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function Notifications($tabel, $Data_communication) {
        try {
            $Query = "select * from $tabel  where Notifications ='0' ";
            $stmt = $Data_communication->prepare($Query);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function Number_results($Query, $array, $Data_communication) {
        try {
            $stmt = $Data_communication->prepare($Query);
            $stmt->execute($array);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function selectdCheck($value1, $value2) {
        if ($value1 == $value2) {
            echo 'selected="selected"';
        } else {
            echo '';
        }
        return;
    }

    public function array__($array) {
        echo '<pre>';
        print_r($array);
        echo '<pre/>';
    }

}
