<tbody>
    <tr>
        <?php
        $query = "select * from  sign_up ORDER BY `sign_up`.`id` DESC;";
        $array = array();
        $rows = $a->sql_feth($Data_communication, $query, $array);
        if (count($rows) > 0) :
            foreach ($rows as $value):
                $id = $value['id'];
                $Name = $value['Name'];
                $Email = $value['Email'];
                $password = $value['password'];
                $Re = $value['Re'];
                $firstCharacter = set_first_cher($Email)[0];
                ?>
                <td id="op">
                    <a href="#" style="font-size: 24px;color: #00c0ef;" class="fa fa-remove del" id="<?php echo $id; ?>" class="del" ></a>
                </div>
            </td>
            <td><?php echo $Name; ?></td>
            <td><?php echo $Email; ?></td>
            <td><?php echo $Name; ?></td>
            <td><span <?php echo set_first_cher_coler($Email) ?>  class="badge boxs"><?php echo $firstCharacter; ?></td>
        </tr>
        <?php
    endforeach;
endif;
?>
</tbody>