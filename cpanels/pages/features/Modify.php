<?php require_once './Settings.php'; ?>
<?php require_once '../../../FileConnection/Data_connection.php'; ?>
<?php require_once '../../../FileConnection/Extra_functions.php'; ?>
<?php require_once '../../../Classes/Achieve.php'; ?>
<?php require_once '../../../Classes/Component.php'; ?>
<?php
$class = new Achieve();
$query = "select * from  features  where id = ? ";
$array_var = array();
$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$array = array($id);
$rows = $class->sql_feth($Data_communication, $query, $array);
if (count($rows) > 0) :
    foreach ($rows as $value):
        $id = $value['id'];
        $Features = $value['Features'];
        $Apps = $value['Apps'];

    endforeach;
endif;
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
            <div class="content-wrapper">
                <div class="content">
                    <section class="content-header">
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-pagelines"></i> الرئسية</a></li>
                            <li><a href="spreadsheet.php"><?php echo Page; ?></a></li>
                            <li class="active">تعديل البيانات</li>
                        </ol>
                    </section>
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <?php require_once '../../General_files/php/ap.php'; ?>
                                    <div class="box-body">
                                        <form action="phpajax/edit.php" id="uploadImage" method="post" enctype="multipart/form-data">
                                            <div class="content">
                                                <div class='col-lg-offset-2 col-lg-10 '>
                                                    <div class="input-group margin" style="display: none">
                                                        <input type="text" class="form-control input-lg" name="id" value="<?php echo $id; ?>">
                                                        <input type="hidden" name="file" value="<?php echo $Image; ?>" >
                                                        <span class="input-group-btn ">
                                                            <button class="btn btn-info btn-flat btn-lg" type="button">ID</button>
                                                        </span>
                                                    </div>
                                                    <div class="input-group margin">
                                                        <select class="form-control input-lg" id="sel1"     name="Apps" >
                                                            <?php
                                                            $query = "select * from  app  ORDER BY `app`.`id` DESC ;";
                                                            $array = array();
                                                            $rows = $class->sql_feth($Data_communication, $query, $array);
                                                            if (count($rows) > 0) :
                                                                foreach ($rows as $value):
                                                                    $id_f = $value['id'];
                                                                    $Title = $value['Title'];
                                                                    $Short_title = $value['Short_title'];
                                                                    $Explanation = $value['Explanation'];
                                                                    $image = $value['image'];
                                                                    $Download_it = $value['Download_it'];
                                                                    ?>
                                                                    <option  <?= $id__ == $id_f ? ' selected="selected"' : ''; ?> value="<?php echo $id_f; ?>"><?php echo $Title; ?></option>
                                                                    <?php
                                                                endforeach;
                                                            endif;
                                                            ?>
                                                        </select>                                     
                                                        <span class="input-group-btn ">
                                                            <button class="btn btn-info btn-flat btn-lg" type="button">التطبيق</button>
                                                        </span>
                                                    </div>
                                                    <div class="input-group margin">
                                                        <input type="text" class="form-control input-lg" name="Features" value="<?php echo $Features; ?>">
                                                        <span class="input-group-btn ">
                                                            <button class="btn btn-info btn-flat btn-lg" type="button">المميزات</button>
                                                        </span>
                                                    </div>

                                                    <input type="submit" class="btn btn-info btn-block btn-lg margin btn" value="تعديل الموضوع">

                                                </div>

                                            </div>
                                        </form>

                                    </div><!-- /.box-body -->

                                </div><!-- /.box -->

                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </section><!-- /.content -->
                    <div class="content">
                        <div id="targetLayer">

                        </div>
                    </div>
                </div>

            </div><!-- /.content-wrapper -->
            <?php require_once '../../General_components/fotter.php'; ?>

        </div><!-- ./wrapper -->
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <?php require_once '../../General_components/js.php'; ?>
        <script>
            $(function () {
                $('input[type=file]').change(function () {
                    var t = $(this).val();
                    var labelText = 'File : ' + t.substr(12, t.length);
                    $(this).prev('label').text(labelText);
                })
            });

        </script>
        <script type="text/javascript">
            tinymce.init({
                selector: "#textarea",
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table paste"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
        </script>

    </body>
</html>
