<?php
define('classcss', 'img-thumbnail');
define("width", "100");
define("Certain", "#");
?>
<tbody>
    <tr>
        <?php
        $query = "select * from  user_admin ORDER BY `user_admin`.`id` DESC limit 1;";
        $array = array();
        $rows = $class->sql_feth($Data_communication, $query, $array);
        if (count($rows) > 0) :
            foreach ($rows as $value):
                $id = $value['id'];
                $user = $value['user'];
                $password = $value['password'];
                $mail = $value['mail'];
    
        ?>
        <td id="op">



            <div class="btn-group">
                <button type="button" class="btn btn-info"> <li class="fa fa-database"></li></button>
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="Modify.php?id=<?php echo $id; ?>">التعديل</a></li>
                    <li><a href="#" id="<?php echo $id; ?>"  Image="<?php echo $Image; ?>"  class="del">والحذف</a></li>
                </ul>
            </div>

        </td>
        <td><?php echo   $user ; ?></td>
        <td><?php echo   $mail ; ?></td>
        <td><img src="Boy-Avatar-PNG-Photo.png" width="150" alt=""/></td>
        <td><?php echo $id; ?></td>
    </tr>
    <?php
    endforeach;
    endif;
    ?>
</tbody>