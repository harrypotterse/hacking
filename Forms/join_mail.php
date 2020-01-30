<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"):
    try {
        require_once '../FileConnection/Data_connection.php';
        require_once '../Classes/Achieve.php';
        require_once '../FileConnection/Extra_functions.php';

        $a = new Achieve();
        $maile = filter_var($_POST['text'], FILTER_SANITIZE_EMAIL);
        $true = TRUE;

        if (!$a->empty_filed($maile)):
            $true = FALSE;
            echo 'f';
        endif;
        if (!$a->Validate_E_mail($maile)):
            $true = FALSE;
            echo 'e';
        endif;
        if ($true):
            try {
                $sql = "INSERT INTO `join_mail` (`id`,`Mail`) VALUES (NULL, ?)";
                $array = array($maile);
                $a->sql($Data_communication, $sql, $array);
                //=======================================================

                echo 1;
            } catch (Exception $ex) {
                $Data_communication = null;
            } finally {
                $Data_communication = null;
            }
        endif;
    } catch (PDOException $ex) {
        $Data_communication = NULL;
    } finally {
        $Data_communication = NULL;
    }
 endif;