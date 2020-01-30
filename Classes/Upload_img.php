<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Upload_img
 *
 * @author harrypotter
 */
class Upload_img {

    public $allowed = array("image/jpeg", "image/gif", "application/pdf");
    public $size=500000;

    //put your code here
    public function certain($file_type) {
        $allowed = array("image/jpeg", "image/gif", "application/pdf");
        if (!in_array($file_type, $this->allowed)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function file_exists($target_file) {
        if (file_exists($target_file)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function size($FILES) {
        if ($FILES > $this->size) {
            return FALSE;
        } else {
            return TRUE;    
        }
    }

}
