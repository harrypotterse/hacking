<?php
define('Page', 'مميزات متابع');
define('Link', 'https://image.flaticon.com/icons/svg/2134/2134671.svg');
define('label', 'label label-primary');
define('tabel', 'follower_featuress');
define('preview', 'follower_featuress');
function app($Data_communication,$class,$id){
  $query = "select * from  follower  where id =  ? ";
$array = array($id);
 $rows = $class->sql_feth($Data_communication, $query, $array);
if (count($rows) > 0) :
foreach ($rows as $value):
    echo   $Title=$value['Title'];
endforeach;
endif;     
}
?>