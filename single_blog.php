<?php
//=======================file class==================================
require_once './FileConnection/Data_connection.php';
require_once './FileConnection/Extra_functions.php';
require_once './Classes/Achieve.php';
require_once './Classes/Component.php';
require_once './Classes/Session.php';
//=========================================================
$session = new Session("login.php");
$class = new Achieve();
$Component = new Component();
//==========================================================
$fotter = $Component->fetchObject_SQL($Data_communication, "SELECT * FROM `page_components` where id = 1");
$pag = "blog";
$Page = $_GET['Page'];
$msg = true;
$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
if (!password_verify($pag, $Page)) {
    $msg = FALSE;
    header('Location: blog.php');
    exit();
}
if (empty($id)) {
    $msg = FALSE;
    header('Location: blog.php');
    exit();
} elseif (empty($Page)) {
    $msg = FALSE;
    header('Location: blog.php');
    exit();
}
if (is_int($id)):
    $msg = FALSE;
    header('Location: blog.php');
    exit();
endif;
if (!basename($_SERVER['PHP_SELF']) == "single_blog.php"):   
    $msg = FALSE;
    header('Location: blog.php');
    exit();
endif;
if ($msg == TRUE) :
//================================================================
    $query = "select * from  blog  where id= ? ";
    $array = array($id);
    $rows = $class->sql_feth($Data_communication, $query, $array);
    if (count($rows) > 0) :
        $array = array();
        foreach ($rows as $value):
            $id = $value['id'];
            $Subject = $value['Subject'];
            $Date = $value['Date'];
            $Abstract = $value['Abstract'];
            $Explanation = $value['Explanation'];
            $Image = $value['Image'];
        endforeach;
    endif;
endif;
?>
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <?php require_once './Basiccomponents/head.php'; ?>
    <body>
        <!-- ========== Start Loading ========== -->
        <div class="preloader">
            <div class="loading-overlay">
                <div class="loading-inner">
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <!-- ========== End Loading ========== -->
        <!-- ========== Start Navbar ========== -->
        <div class="cursor cursor-small"></div>
        <canvas class="cursor cursor-canvas" resize></canvas>
        <!-- END CURSOR AREA -->
        <!-- OFF CANVAS MENU START -->
        <div class="offcanves-menu-overlay"></div>
        <?php require_once './Basiccomponents/navbar.php'; ?>
        <!-- ========== End Navbar ========== -->
        <section class="home" id="home" style="height:540px;;">
            <div id="particles-js"></div>
            <div class="overlay">
                <div class="container">
                    <div class="intro display-table">
                        <div class="display-table-cell sub-pages">
                            <h2>
                                <?php
                                echo $Subject;
                                ?>
                            </h2></br>
                        </div>
                    </div>
                </div>
            </div> 
        </section>
        <!-- ========== Start About Me ========== -->
        <?php // require_once './software_components/About_single.php';  ?>
        <?php //require_once './software_components/facts_single.php';?>
        <!-- ========== End About Me ========== -->
        <!-- ========== Start Blog ========== -->
     <section class="about-me" id="about" style="background:#292929;">
            <div class="container">

                <div class="row">

                    <div class="col-lg-5 col-md-6">

                        <div class="about-image" style="margin-top:44px;">
                            <img class="img-responsive" src="Public/blog/<?php echo  $Image ; ?>" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="about-info">
                            <div class="main-title">
                                <h2><?php echo  $Subject ; ?></h2>
                            </div>
                         
                            <p>
                                <?php echo  $Explanation ; ?>
                            </p>
                       
                        </div>
                    </div>
                </div> 
            </div>
        </section>
        <!-- ========== End Blog ========== -->
        <!-- ========== End Portfolio ========== -->
        <?php require_once './Basiccomponents/footer.php'; ?>
        <!-- ========== End Footer ========== -->
        <!-- ========== Start Scroll To Top  ========== -->
        <a href="#" class="scroll-top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!-- ========== End Scroll To Top  ========== --> 
        <!-- ========== Js ========== -->
        <!-- jQuery -->
        <?php require_once './Basiccomponents/js.php'; ?>
    </body>
    <!-- Mirrored from anwar-theme.netlify.com/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Sep 2019 19:02:11 GMT -->
</html>