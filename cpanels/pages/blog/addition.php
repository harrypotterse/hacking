<?php require_once './Settings.php'; ?>
<?php require_once '../../../FileConnection/Data_connection.php'; ?>
<?php require_once '../../../FileConnection/Extra_functions.php'; ?>
<?php require_once '../../../Classes/Achieve.php'; ?>
<?php require_once '../../../Classes/Component.php'; ?>
<?php $class = new Achieve();?>
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
                                        <form action="addition.php"  method="post" enctype="multipart/form-data">
                                            <div class="content">
                                                <div class='col-lg-offset-2 col-lg-10 '>
                                                    <div class="input-group margin">
                                                        <input type="text" class="form-control input-lg" name="Subject">
                                                        <span class="input-group-btn ">
                                                            <button class="btn btn-info btn-flat btn-lg" type="button">الموضوع</button>
                                                        </span>
                                                    </div> 
                                                    <div class="input-group margin">
                                                        <textarea class="form-control custom-control" rows="10" style="resize:none" name="Abstract"></textarea>     
                                                        <span class="input-group-addon btn btn-primary">شرح مختصر</span>
                                                    </div>
                                                    <div class="form-group margin">
                                                        <button class="btn btn-info btn-flat btn-block" type="button">الموضوع</button>
                                                        <textarea class="form-control ckeditor" rows="10" id="comment "    name="Explanation" required="تفاصيل الخبر"></textarea>
                                                    </div>
                                                    <span class="control-fileupload">
                                                        <label for="file">Choose a file :</label>
                                                        <input type="file" id="uploadFile" name="uploadFile">
                                                    </span>  
                                                    <input type="submit" class="btn btn-info btn-block btn-lg margin btn" name="sub" value="اضافة موضوع جديد">
                                                </div>
                                            </div>

                                        </form>


                                    </div><!-- /.box-body -->

                                </div><!-- /.box -->

                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </section><!-- /.content -->
                    <div class="content ">
                        <div id="targetLayer">
                            <?php
                            error_reporting("E_ALL & ~E_NOTIC");
                            if ($_SERVER["REQUEST_METHOD"] == "POST") :
                                if(isset($_POST['sub'])):
                                $a = new Achieve();
                                $true = TRUE;
                                $msgerr = "";
                                $tabel = tabel;
                                $array_var = array();
                                $Subject = filter_var($_POST['Subject'], FILTER_SANITIZE_STRING);
                                $Date = date("Y-m-d");
                                $Abstract = filter_var($_POST['Abstract'], FILTER_SANITIZE_STRING);
                                $Explanation = $_POST['Explanation'];
                                $file_name = $_FILES['uploadFile']['name'];
                                $file_size = $_FILES['uploadFile']['size'];
                                $file_tmp = $_FILES['uploadFile']['tmp_name'];
                                $file_type = $_FILES['uploadFile']['type'];
                                $error = $_FILES['uploadFile']['error'];
                                $extensions = array("jpeg", "jpg", "png", "gif");
                                $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                                if (!$a->empty_filed($Subject)):
                                    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
                                    $true = FALSE;
                                endif;

                                if (!$a->empty_filed($Abstract)):
                                    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
                                    $true = FALSE;
                                endif;
                                if (!$a->empty_filed($Explanation)):
                                    $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
                                    $true = FALSE;
                                endif;
                                if (!file_exists($file_tmp)) {
                                    $msgerr .= "<div class='alert alert-danger alert-autocloseable-danger'>من فضك قم بتحميل الصورة </div>";
                                    $true = FALSE;
                                }
                                if ($true == TRUE):
                                    try {
                                        $array_var = array();
                                        $array_var[] = $Subject = filter_var($_POST['Subject'], FILTER_SANITIZE_STRING);
                                        $array_var[] = date("Y-m-d");
                                        $array_var[] = $Abstract = filter_var($_POST['Abstract'], FILTER_SANITIZE_STRING);
                                        $array_var[] = $_POST['Explanation'];
                                        $array_var[] = files_add($file_tmp, $file_name, "../../../Public/$tabel/");
                                        $sql = "INSERT INTO `blog` (`id`,`Subject`,`Date`,`Abstract`,`Explanation`,`Image`) VALUES (NULL, ?,?,?,?,?)";
                                        $array = array();
                                        $a->sql($Data_communication, $sql, $array_var);
                                        $msgerr .= "<div class='alert alert-success'>تم بنجاح اضافة موضوع جديد</div>";
                                        $section = Page;
                                        $labal = label;
                                        $time = time();
                                        $sql = "INSERT INTO `latest_additions` (`id`, `Section`, `Time`,`label`) VALUES (NULL, ?, ?,?);";
                                        $array = array($section, $time, $labal);
                                        $a->sql($Data_communication, $sql, $array);
                                    } catch (PDOException $ex) {
                                        echo $ex;
                                    }
                                endif;
                                echo $msgerr;
                            endif;
                               endif;
                            ?>

                        </div>
                    </div>
                </div>

            </div><!-- /.content-wrapper -->
            <?php require_once '../../General_components/fotter.php'; ?>

        </div><!-- ./wrapper -->
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
