<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Session
 *
 * @author harrypotter
 */
class Session {

    public $direction_ = "";

    public function __construct($direction) {
        error_reporting("E_ALL & ~E_NOTIC");
        $this->direction_ = $direction;
        $this->init_session();
        if (!isset($_SESSION)) {
            $this->init_session();
            $this->session_regenerate_id();
        } else {
//            session_destroy();
//            header("location: index.php");
//            exit();
        }
    }

    public function init_session() {
        session_start();
    }

    //put your code here
    public function session_regenerate_id() {
        return session_regenerate_id(TRUE);
    }

    public function hash($hash) {
        return password_hash($hash, PASSWORD_DEFAULT);
    }

    public function form_htmlspecialchars() {
        return htmlspecialchars($_SERVER["PHP_SELF"]);
    }

    public function password_verify($session, $hash) {
        if (password_verify($_SESSION[$session], $_SESSION[$hash])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_session_data($session_name) {
        return $_SESSION[$session_name];
    }

    public function set_session_data($session_name, $data) {
        return $_SESSION[$session_name] = $data;
    }

    public function get_session_all() {
        echo '<pre>';
        return print_r($_SESSION);
        echo '<pre>';
    }

    public function get_array_all($array) {
        echo '<pre>';
        return print_r($array);
        echo '<pre>';
    }

    public function Session_protection($session_name) {
        return htmlentities(filter_var($session_name, FILTER_SANITIZE_STRING));
    }

    public function session_exist($session_name) {
        if (isset($_SESSION[$session_name])) {
            return true;
        } else {


            return FALSE;
        }
    }

    public function session_exist__($session_name) {
        if (isset($_SESSION[$session_name])) {
            return true;
        } else {
            echo '11';
            return false;
            header("location: $this->direction_");
            session_destroy();
            exit();
        }
    }

    public function session_exist__comp($session_name) {
        if (isset($_SESSION[$session_name])) {
            return true;
        } else {
            return false;
        }
    }

    public function session_destroy() {
        session_destroy();
        header("location: $this->direction_");
        exit();
    }

    public function session_id() {
        return session_id();
    }

    public function checkup($sql, $par) {
        $query = $Data_communication->prepare($sql);
        $query->execute(array($par));
        if ($query->rowCount() >= 1) {
            return TRUE;
        } else {
            session_destroy();
        }
    }

    public function logout($QUERY_STRING) {
        if ($_SERVER['QUERY_STRING'] == $QUERY_STRING) {
            session_destroy();
            header("location: $this->direction_");
            exit();
        }
    }

}
