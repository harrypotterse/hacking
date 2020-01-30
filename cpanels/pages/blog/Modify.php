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
$query = "select * from  blog  where id = ?";
$array = array($id);
$rows = $class->sql_feth($Data_communication, $query, $array);
if (count($rows) > 0) :
    foreach ($rows as $value):
        $id = $value['id'];
        $Subject = $value['Subject'];
        $Date = $value['Date'];
        $Abstract = $value['Abstract'];
        $Explanation = $value['Explanation'];
        $Image = $value['Image'];
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
                                        <form action=""  method="post" enctype="multipart/form-data">
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
                                                        <input type="text" class="form-control input-lg" name="Subject" value="<?php echo $Subject; ?>">
                                                        <span class="input-group-btn ">
                                                            <button class="btn btn-info btn-flat btn-lg" type="button">العنوان</button>
                                                        </span>
                                                    </div>

                                                    <div class="input-group margin">
                                                        <textarea class="form-control custom-control" rows="10" style="resize:none" name="Abstract"><?php echo $Abstract; ?></textarea>     
                                                        <span class="input-group-addon btn btn-primary">شرح مختصر</span>
                                                    </div>

                                                    <div class="form-group margin">
                                                        <button class="btn btn-info btn-flat btn-block" type="button">الموضوع</button>
                                                        <textarea class="form-control ckeditor" rows="10" id="comment "    name="Explanation" required="تفاصيل الخبر"><?php echo $Explanation; ?></textarea>

                                                    </div>
                                                    <span class="control-fileupload">
                                                        <label for="file">Choose a file :</label>
                                                        <input type="file" id="uploadFile" name="uploadFile">
                                                    </span>  
                                                    <input type="submit" class="btn btn-info btn-block btn-lg margin btn" value="تعديل الموضوع" name="sub">
                                                    <img src="../../../Public/blog/<?php echo $Image; ?>" class=" img-responsive img-thumbnail" width="150"  >

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
                            <?php
                         
                          error_reporting("E_ALL & ~E_NOTIC");
                            if ($_SERVER["REQUEST_METHOD"] == "POST") :
                                if (isset($_POST['sub'])):
                                    $a = new Achieve();
                                    $true = TRUE;
                                    $msgerr = "";
                                    $tabel = tabel;
                                    $file_name = $_FILES['uploadFile']['name'];
                                    $file_size = $_FILES['uploadFile']['size'];
                                    $file_tmp = $_FILES['uploadFile']['tmp_name'];
                                    $file_type = $_FILES['uploadFile']['type'];
                                    $error = $_FILES['uploadFile']['error'];
                                    $extensions = array("jpeg", "jpg", "png", "gif");
                                    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                                    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
                                    $Subject = filter_var($_POST['Subject'], FILTER_SANITIZE_STRING);
                                    $Date = date("Y-m-d");
                                    $Abstract = filter_var($_POST['Abstract'], FILTER_SANITIZE_STRING);
                                    $Explanation = filter_var($_POST['Explanation'], FILTER_SANITIZE_STRING);
                                    if (!$a->empty_filed($id)):
                                        $msgerr .= "<div class='alert alert-danger'>من فضلك لاتترك حقل فارغ</div>";
                                        $true = FALSE;
                                    endif;
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
                                    if ($true == TRUE):
                                        try {
                                            $array_var = array();
                                            $array_var[] = $Subject = filter_var($_POST['Subject'], FILTER_SANITIZE_STRING);
                                            $array_var[] = $Date = date("Y-m-d");
                                            $array_var[] = $Abstract = filter_var($_POST['Abstract'], FILTER_SANITIZE_STRING);
                                            $array_var[] = $Explanation = filter_var($_POST['Explanation'], FILTER_SANITIZE_STRING);
                                            $array_var[] = files_modified($file_tmp, "../../../Public/$tabel/", $_POST['file'], $file_name);
                                            $array_var[] = $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
                                            $SQL = "UPDATE `blog` SET `Subject`= ?,`Date`= ?,`Abstract`= ?,`Explanation`= ?,`Image`= ? WHERE `blog`.`id`= ?;";
                                            $array = array();
                                            $a->sql($Data_communication, $SQL, $array_var);
                                            $msgerr .= "<div class='alert alert-success'>تم التعديل بنجاح</div>";
                                            $section = Page;
                                            $labal = label;
                                            $time = time();
                                            $sql = "INSERT INTO `latest_additions` (`id`, `Section`, `Time`,`label`) VALUES (NULL, ?, ?,?);";
                                            $array = array($section, $time, $labal);
                                            $a->sql($Data_communication, $sql, $array);
                                        } catch (PDOException $ex) {
                                            //echo $ex;
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
