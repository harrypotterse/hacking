<?php
define('classcss', 'img-thumbnail');
define("width", "200");
define("Certain", "#");
?>
<tbody>
    <tr>
        <?php
        $query = "select * from  success_stories  ORDER BY `success_stories`.`id` DESC ";
        $array = array();
        $rows = $class->sql_feth($Data_communication, $query, $array);
        if (count($rows) > 0) :
            foreach ($rows as $value):
                $id = $value['id'];
                $comment = $value['comment'];
                $Image = $value['Image'];
                $Name = $value['Name'];
                $Function = $value['Function'];
                ?>
                <td id="op">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info">العمليات الاساسية</button>
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="Modify.php?id=<?php echo $id; ?>">التعديل</a></li>
                            <li><a href="#" id="<?php echo $id; ?>"  Image="<?php echo $Image; ?>" class="del">والحذف</a></li>
                            <li><a href="<?php echo Certain; ?>">معاينة</a></li>
        <!--                             <li><a href="#" id="<?php //echo $id;     ?>" Image="<?php //echo $Image;     ?>" >والحذف</a></li>-->
                        </ul>
                    </div>
                </td>
                <td><?php echo $Function; ?></td>
                <td><?php echo $Name; ?></td>
                <td><?php echo $comment; ?></td>
                <td><img src="./../../../Public/success_stories/<?php echo $Image; ?>" class="<?php echo classcss; ?>" width="<?php echo width; ?>" alt="Cinque Terre"></td>
                <td><?php echo $id; ?></td>
            </tr>
            <?php
        endforeach;
    endif;
    ?>
</tbody>