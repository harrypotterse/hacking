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
                                        <div class="box-body">
                                            <div class="col-lg-offset-2 col-lg-8 col-lg-offset-2">
                                                <table class="table table-hover ss" style="background: white;">
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
                                                            <td>&nbsp;<img src="https://img.icons8.com/material/20/31b0d5/health-data.png"></td>
                                                            <td></td>
                                                            <td><span class="<?php echo $label; ?>"><?php echo $Section; ?></span></td>
                                                            <td><?php echo $a->time_since($Time); ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </table>
                                            </div>
                                        </div><!-- /.box-body -->

                                    </div><!-- /.box -->

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
