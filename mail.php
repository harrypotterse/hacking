<?php
//=======================file class==================================
require_once './FileConnection/Data_connection.php';
require_once './FileConnection/Extra_functions.php';
require_once './Classes/Achieve.php';
require_once './Classes/Component.php';
require_once './Classes/Session.php';
//=========================================================
$session = new Session("index.php");
$user = $session->get_session_data("user");
 $id_user = sql_feth_id($Data_communication, array($user));

$class = new Achieve();
$Component = new Component();
//================================================================
if (isset($_GET['logout'])) {
    $array_var[] = "Inactive";
    $array_var[] = $user;
    $SQL = "UPDATE `sign_up` SET `active`= ? WHERE `sign_up`.`Email`= ?;";
    $array = array();
    $class->sql($Data_communication, $SQL, $array_var);
}
$session->logout("logout");
//==========================================================
$fotter = $Component->fetchObject_SQL($Data_communication, "SELECT * FROM `page_components` where id = 1");
//==========================================================
$id = 5;
require_once './app/Visits.php';
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
                            <h2>الأشعارات
                            </h2></br>
                        </div>
                    </div>
                </div>
            </div> 
        </section>
        <!-- ========== Start Blog ========== -->
        <section class="blog" id="blog"  style="background:#292929;">
            <div class="container">
                <div class="main-title">
                    <h2>الأشعارات</h2>             
                </div>
                <?php
                $query = "select * from  message    where user = ? ";
                $array = array($id_user);
                $rows = $class->sql_feth($Data_communication, $query, $array);
                if (count($rows) > 0) :
                    foreach ($rows as $value):
                        $id = $value['id'];
                        $user = $value['user'];
                        $Subject = $value['Subject'];
                        $message = $value['message'];
                        $pic = $value['pic'];
                        $file_pointer="Public/message/$pic";
                        if (file_exists($file_pointer)) {
                             $file_pointer="Public/message/$pic";
                        } else {
                         $file_pointer=$pic;
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- New Item -->
                                <div class="post wow fadeInLeft" data-wow-duration="1.7s">
                                    <!-- Post Image -->
                                    <div class="post-img">
                                        <img src="<?php echo $file_pointer; ?>" class="img-responsive" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <div class="post-title">
                                            <a href="#"><h4><?php echo $Subject; ?></h4></a>
                                        </div>
                                        <div class="post-text">
                                            <p>
                                                <?php echo $message; ?>
                                            </p>
                                        </div>

                                    </div>
                                </div>  
                            </div>       
                        </div>  
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </section>
        <!-- ========== End Blog ========== -->
        <!-- ========== End Resume ========== -->
        <!-- ========== Start Skills ========== -->
        <section class="skills">
        </section>
        <!-- ========== End Skills ========== -->
        <!-- ========== End Portfolio ========== -->
        <?php require_once './Basiccomponents/footer.php'; ?>
        <!-- ========== End Footer ========== -->
        <!-- ========== Start Scroll To Top  ========== -->
        <a href="#" class="scroll-top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!-- ========== End Scroll To Top  ========== --> 
        <!-- ========== Js ========== -->
        <?php require_once './Basiccomponents/js.php'; ?>
    </body>
    <!-- Mirrored from anwar-theme.netlify.com/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Sep 2019 19:02:11 GMT -->
</html>