<?php
define('classcss', 'img-thumbnail');
define("width", "500");
define("Certain", "#");
?>
<tbody>
    <tr>
        <?php
        $query = "select * from  blog ORDER BY `blog`.`id` DESC ;";
        $array = array();
        $rows = $class->sql_feth($Data_communication, $query, $array);
        if (count($rows) > 0) :
            foreach ($rows as $value):
                $id = $value['id'];
                $Subject = $value['Subject'];
                $Date = $value['Date'];
                $Abstract = $value['Abstract'];
                $Explanation = $value['Explanation'];
                $Image = $value['Image'];
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
                <td><?php echo $Abstract; ?></td>
                <td><?php echo $Subject; ?></td>
                <td><img src="./../../../Public/blog/<?php echo $Image; ?>" class="<?php echo classcss; ?>" width="<?php echo width; ?>" alt="Cinque Terre"></td>
                <td>&nbsp;<img src="https://img.icons8.com/material/20/31b0d5/health-data.png"></td>
            </tr>
            <?php
        endforeach;
    endif;
    ?>
</tbody>