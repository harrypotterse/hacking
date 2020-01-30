<?php require_once './Settings.php'; ?>
<?php require_once '../../../FileConnection/Data_connection.php'; ?>
<?php require_once '../../../FileConnection/Extra_functions.php'; ?>
<?php require_once '../../../Classes/Achieve.php'; ?>
<?php require_once '../../../Classes/Component.php'; ?>
<?php
$a = new Achieve();
$Component = new Component();
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
                <div class="content">
                    <!-- Content Wrapper. Contains page content -->
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <img src="<?php echo Link; ?>" width="150"><br>
                                    <h3 class="box-title" style="text-align: right;direction: rtl;"><?php echo Page; ?></h3>
                                </div><!-- /.box-header -->
                                <ol class="breadcrumb">
                                    <li><a href="../home/spreadsheet.php"><i class="fa fa-pagelines"></i> الرئسية</a></li>
                                    <li><a href="spreadsheet.php"><?php echo Page; ?></a></li>
                                    <li class="active">جدول عرض البيانات</li>
                                </ol>
                                </section>
                                <!-- Main content -->
                                <section class="content">
                                    <div class="row">
                                        <div class="box-body">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 186.284px;"> حذف</th>
                                                        <th>الحالة</th>
                                                        <th>الرسالة</th>
                                                        <th>البريد</th>
                                                        <th>  الاسم </th>
                                                        <th># </th>
                                                    </tr>
                                                </thead>
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
                                            $active = $value['active'];
                                            $firstCharacter = set_first_cher($Email)[0];
                                            $Page = password_hash("sign_up", PASSWORD_DEFAULT);
                                            if ($active == "Inactive"):
                                                $active = "<a type='button' class='btn btn-danger btn-sm'>Inactive</a>";
                                            else:
                                                $active = "<a type='button' class='btn btn-success btn-sm'>Active</a>";
                                            endif;
                                            ?>
                                                                <td id="op">
                                                                    <a href="#" style="font-size: 24px;color: #00c0ef;" class="fa fa-remove del" id="<?php echo $id; ?>" class="del" ></a>
                                                                    </div>
                                                                </td>
                                                                <td><?php echo $active; ?></td>
                                                                <td><a type="button" class="btn btn-info btn-sm" href="Modify.php?id=<?php echo $id; ?>&Page=<?php echo $Page ?>">ارسال رسالة</a></td>
                                                                <td><?php echo $Email; ?></td>
                                                                <td><?php echo $Name; ?></td>
                                                                <td><span <?php echo set_first_cher_coler($Email) ?>  class="badge boxs"><?php echo $firstCharacter; ?></td>
                                                            </tr>
                                                            <?php
                                    endforeach;
                                    endif;
                                    ?>
                                                </tbody>
                                            </table>
                                        </div><!-- /.box-body -->

                                    </div><!-- /.box -->

                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </section><!-- /.content -->
                    <div class="btn-group btn-group-justified">
                        <a href="../home/spreadsheet.php" class="btn btn-primary bg-purple ">الرئسية</a>
                        <a href="#" class="btn btn-primary bg-orange  ">العودة الي الموقع</a>
                    </div>
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
        <script src="../../General_files/js/Shortcuts.js" type="text/javascript"></script>
    </body>
</html>
