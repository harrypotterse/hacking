<?php require_once './Settings.php'; ?>
<?php require_once '../../../FileConnection/Data_connection.php'; ?>
<?php require_once '../../../FileConnection/Extra_functions.php'; ?>
<?php require_once '../../../Classes/Achieve.php'; ?>
<?php require_once '../../../Classes/Component.php'; ?>
<?php
$class = new Achieve();
$query = "select * from  success_stories  where id = ? ";
$array_var = array();
$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$array = array($id);
$query = "select * from  app ORDER BY `app`.`id` DESC limit 1;";
$rows = $class->sql_feth($Data_communication, $query, $array);
if (count($rows) > 0) :
    foreach ($rows as $value):
        $id = $value['id'];
        $Title = $value['Title'];
        $Short_title = $value['Short_title'];
        $Explanation = $value['Explanation'];
        $image = $value['image'];
        $Download_it = $value['Download_it'];
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

            <!-- Content Wrapper. Contains page content -->

            <div class="content-wrapper">

                <div class="content">
                    <!-- Content Wrapper. Contains page content -->

                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <!--                        <h1 style="text-align: right; direction: rtl;">
                                                    Data Tables
                                                    <small>advanced tables</small>
                                                </h1>-->
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
                                                        <input type="hidden" name="file" value="<?php echo $image; ?>" >
                                                        <span class="input-group-btn ">
                                                            <button class="btn btn-info btn-flat btn-lg" type="button">ID</button>
                                                        </span>
                                                    </div>


                                                    <div class="input-group margin">
                                                        <div class="radio radio-info">
                                                            <input type="radio" name="radio1[]" id="radio1" value="option1" checked="checked">
                                                            <label for="radio1">
                                                                رابط البرنامج
                                                            </label>
                                                        </div>
                                                        <hr>
                                                        <div class="radio radio-info">
                                                            <input type="radio" name="radio1[]" id="radio2" value="option2">
                                                            <label for="radio2">
                                                                تحميل البرنامج
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="input-group margin">
                                                        <input type="text" class="form-control input-lg" name="Title" value="<?php echo  $Title ; ?>">
                                                        <span class="input-group-btn ">
                                                            <button class="btn btn-info btn-flat btn-lg" type="button">العنوان</button>
                                                        </span>
                                                    </div>
                                                    <div class="input-group margin">
                                                        <input type="text" class="form-control input-lg" name="Short_title" value="<?php echo  $Short_title ; ?>">
                                                        <span class="input-group-btn ">
                                                            <button class="btn btn-info btn-flat btn-lg" type="button">العنوان المختصر</button>
                                                        </span>
                                                    </div>
                                                    <div class="form-group margin">
                                                        <button class="btn btn-info btn-flat btn-block" type="button">الموضوع</button>
                                                        <textarea class="form-control" rows="5" id="textarea"  class="textarea" name="Explanation" placeholder="مواعيد العمل"><?php echo  $Explanation ; ?></textarea>
                                                    </div>


                                                    <span class="control-fileupload">
                                                        <label for="file">الصورة :</label>
                                                        <input type="file" id="uploadFile" name="uploadFile">
                                                    </span>  
                                                    <br>
                                                    <span class="control-fileupload Load" style="display: none">
                                                        <label for="file">تحميل البرنامج :</label>
                                                        <input type="file" id="uploadFile" name="Download">
                                                    </span>             
                                                    <div class="input-group margin Link" >
                                                        <input type="text" class="form-control input-lg" name="url" value="<?php echo  $Download_it ; ?>">
                                                        <span class="input-group-btn ">
                                                            <button class="btn btn-info btn-flat btn-lg" type="button">رابط البرنامج</button>
                                                        </span>
                                                    </div>
                                                    <input type="submit" class="btn btn-info btn-block btn-lg margin btn" value="تعديل الموضوع">
                                                    <img src="../../../Public/app/<?php echo  $image ; ?>" class=" img-responsive img-thumbnail" width="150"  >

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
                <script>
            $(document).ready(function () {
                $('#radio1').change(function () {
                    $('.Load').slideUp();
                    $('.Link').slideDown();
                });
                $('#radio2').change(function () {
                    $('.Load').slideDown();
                    $('.Link').slideUp();

                });
            });
        </script>

    </body>
</html>
