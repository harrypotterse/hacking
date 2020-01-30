<div class="row container-fluid"  style="
     background: beige;
     box-shadow: 13px 1px 4px black;
     background: white;
     box-shadow: inset 2px -1px 4px black;
     background-image: url(https://www.jakpost.travel/imgfiles/full/7/73742/web-development-wallpaper.jpg);
     background-repeat: no-repeat;
     background-position: center center;
     background-attachment: fixed;
     ">
    <div class="container">
        <div class="row" >
            <div class="col-xs-12" style=";margin-top: 35px;">
                <div class="box" style="
                     border: navajowhite;
                     ">
                    <div class="box-header">
                        <h3 class="box-title">اخر الاضافات</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover ss">
                            <?php
                            $SQL = "SELECT * FROM `latest_additions` ORDER BY `latest_additions`.`id` DESC limit 20";
                            $array = array();
                            $rows = $a->sql_feth($Data_communication, $SQL, $array);
                            foreach ($rows as $key):
                                $id = $key['id'];
                                $Section = $key['Section'];
                                $Time = $key['Time'];
                                $label = $key['label'];
                                ?>         


                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td></td>
                                    <td><span class="<?php echo $label; ?>"><?php echo $Section; ?></span></td>
                                    <td><?php echo $a->time_since($Time); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </div>
</div>