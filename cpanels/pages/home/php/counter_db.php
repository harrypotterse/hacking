<div class="container-fluid">
    <div class="row">
        <div class="row" style="background: white;box-shadow: inset 2px -1px 4px black;background: white;box-shadow: inset 2px -1px 4px black;background-image: url(https://www.a1websites.co.nz/wp-content/uploads/2016/09/responsive-design.jpg);background-repeat: no-repeat;background-position: center center;background-attachment: fixed;">                   
            <div class="container">
                <div class="row" >     
                    <h1 style="color: white;font-family: 'Lalezar', cursive;" id="dbcounth"> افضل الصفحات</h1>
                    <?php
                    $sql = "SELECT * FROM `counter_db`  ORDER BY `counter_db`.`count` DESC limit 1  ";
                    $sql2 = "SELECT * FROM `counter_db` ORDER BY `counter_db`.`count` DESC";

                    $sth = $Data_communication->prepare($sql);
                    $sth->execute();
                    $sth->bindColumn('count', $count);
                    $result = $sth->fetchAll();
                    (int) $count;

                    $array = array();
                    $rows = $a->sql_feth($Data_communication, $sql2, $array);
                    foreach ($rows as $value) :
                        $id = $value['id'];
                        $pag = $value['pag'];
                        $label = $value['label'];
                        $count_lab = $value['count'];
                        $time = $value['time'];
                        $pag_ar = $value['pag_ar'];
                        ?>
                        <div class="progress">
                            <div data-percentage="0%" style="width: <?php echo round($count_lab / $count * 100) ?>%;" class="<?php echo $label; ?>" role="progressbar" aria-valuemin="0" aria-valuemax="100"><?php echo $pag_ar; ?></div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>

        </div>
    </div>
</div>