<?php
define('classcss', 'img-thumbnail');
define("width", "100");
define("Certain", "#");
?>
<tbody>
    <tr>
        <?php
        $query = "select * from  app  ORDER BY `app`.`id` DESC ";
        $array = array();
        $rows = $class->sql_feth($Data_communication, $query, $array);
        if (count($rows) > 0) :
            foreach ($rows as $value):
                $id = $value['id'];
                $Title = $value['Title'];
                $Short_title = $value['Short_title'];
                $Explanation = $value['Explanation'];
                $image = $value['image'];
                $Download_it = $value['Download_it'];
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
                            <li><a href="#" id="<?php echo $id; ?>"  Image="<?php echo $image; ?>"  class="del">والحذف</a></li>
                        </ul>
                    </div>

                </td>
                <td><?php echo  $Short_title ; ?></td>
                <td><?php echo  $Title ; ?></td>
                <td><img src="./../../../Public/app/<?php echo $image; ?>" class="<?php echo classcss; ?>" width="<?php echo width; ?>" alt="Cinque Terre"></td>
                <td><?php echo $id; ?></td>
            </tr>
            <?php
        endforeach;
    endif;
    ?>
</tbody>