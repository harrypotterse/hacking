<?php require_once './Settings.php'; ?>
<?php require_once '../../../FileConnection/Data_connection.php'; ?>
<?php require_once '../../../FileConnection/Extra_functions.php'; ?>
<?php require_once '../../../Classes/Achieve.php'; ?>
<?php require_once '../../../Classes/Component.php'; ?>
<?php
$class = new Achieve();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo Page; ?></title>
        <?php require_once '../../General_components/css.php'; ?>
    </head>
    <body class="skin-blue sidebar-mini">
        <div class="wrapper">
            <?php require_once '../../General_components/top_nave.php'; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php require_once '../../General_components/nav.php'; ?>

            <!-- Content Wrapper. Contains page content -->

            <div class="content-wrapper">

                <div class="content" style="
                     box-shadow: 13px 1px 4px black;
                     background: white;
                     box-shadow: inset 2px -1px 4px black;
                     background-image: url(https://www.jakpost.travel/imgfiles/full/7/73742/web-development-wallpaper.jpg);
                     background-repeat: no-repeat;
                     background-position: center center;
                     background-attachment: fixed;
                     ">
                    <!-- Content Wrapper. Contains page content -->

                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <img src="<?php echo Link; ?>" width="150"><br>
                                    <h3 class="box-title" style="text-align: right;direction: rtl;"><?php echo Page; ?></h3>
                                </div><!-- /.box-header -->

                                </section>
                                <!-- Main content -->
                                <section class="content">
                                    <div class="row">
                                        <div class="row">                   
                                            <div class="container">
                                                <div class="row" >     
                                                    <h1 style="color: white;font-family: 'Cairo', sans-serif ;" id="dbcounth"> افضل الصفحات</h1>
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

                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </section><!-- /.content -->

                </div>

            </div><!-- /.content-wrapper -->
            <?php require_once '../../General_files/php/del_box.php'; ?>
            <?php require_once '../../General_components/fotter.php'; ?>
        </div><!-- ./wrapper -->
        <?php require_once '../../General_components/js.php'; ?>

        <script>
            $(document).on("click", '.del', function (event) {
                var id = $(this).attr('id');
                var Image = $(this).attr('Image');
                $('#delete').modal('show');
                $("#del2").click(function () {
                    $.post('./phpajax/Delete_the_file.php', {id: id, Image: Image}, function (data) {
                        //  alert(data);
                        location.reload();
                    });
                });
            });
        </script>

    </body>
</html>
