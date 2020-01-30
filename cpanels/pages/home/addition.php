<?php require_once './Settings.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo Pageadd; ?></title>
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
                            <li class="active">اضافة موضوع جديد</li>
                        </ol>
                    </section>
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <?php require_once '../../General_files/php/ap.php'; ?>
                                    <div class="box-body">
                                        <div class="content">
                                            <div class='col-lg-offset-2 col-lg-10 '>

                                                <div class="input-group margin">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info btn-flat" type="button">حقل نصي</button>
                                                    </span>
                                                </div>
                                                <div class="input-group margin">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info btn-flat" type="button">حقل نصي</button>
                                                    </span>
                                                </div>


                                                <div class="input-group margin">
                                                    <textarea class="form-control custom-control" rows="3" style="resize:none"></textarea>     
                                                    <span class="input-group-addon btn btn-primary">مكون نصي كبير</span>
                                                </div>
                                                <div class="form-group margin">
                                                    <label for="comment" id="comment">مواعيد العمل</label>
                                                    <textarea class="form-control" rows="5" id="textarea"  class="textarea" name="Dates" placeholder="مواعيد العمل"></textarea>
                                                </div>

                                                <span class="control-fileupload">
                                                    <label for="file">Choose a file :</label>
                                                    <input type="file" id="file">
                                                </span>    
                                                <input type="submit" class="btn btn-info btn-block btn-lg margin btn" value="اضافة موضوع جديد">

                                            </div>
                                        </div>
                                    </div><!-- /.box-body -->

                                </div><!-- /.box -->

                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </section><!-- /.content -->

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
