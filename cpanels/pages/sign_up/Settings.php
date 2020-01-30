<?php

define('Page', 'الاشعارات');
define('Link', 'https://image.flaticon.com/icons/svg/1161/1161833.svg');
define('label', 'label label-danger');
define('SMTP_PORT', '');
define('SMTP_EMAIL', '');

function maile($class,$Data_communication) {
    $query = "select * from  sign_up ";
    $array = array();
    $Emails=array();
    $rows = $class->sql_feth($Data_communication, $query, $array);
    if (count($rows) > 0) :
        foreach ($rows as $value):
            $Emails[] = $value['Email'];
        endforeach;
    endif;
    return $Emails;
}

?>