<tbody>
    <tr>
        <?php
        $query = "select * from  facts ORDER BY `facts`.`id` DESC ;";
        $array = array();
        $rows = $class->sql_feth($Data_communication, $query, $array);
        if (count($rows) > 0) :
            foreach ($rows as $value):
                $id = $value['id'];
                $url = $value['youtube'];
                $id = $value['id'];
                $story_id = $value['story_id'];
                $url = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", $url);
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
                            <li><a href="#" id="<?php echo $id; ?>" class="del">والحذف</a></li>
        <!--                             <li><a href="#" id="<?php //echo $id;       ?>" Image="<?php //echo $Image;       ?>" >والحذف</a></li>-->
                        </ul>
                    </div>
                </td>
                <td><?php
                 
                    $query = "select * from  story where id = ? ";
                    $array = array($id);
                    $rows = $class->sql_feth($Data_communication, $query, $array);
                    if (count($rows) > 0) :
                        foreach ($rows as $value):
                            echo  $Title = $value['Title'];
                        endforeach;
                    endif;
                    ?></td>
                <td><iframe width="400" height="315" src="<?php echo $url; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                <td>&nbsp;<img src="https://img.icons8.com/material/24/000000/health-data.png"></td>
            </tr>
            <?php
        endforeach;
    endif;
    ?>
</tbody>