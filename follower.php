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
$class = new Achieve();
$Component = new Component();
//==========================================================
if (isset($_GET['logout'])) {
    $array_var[] = "Inactive";
    $array_var[] = $user;
    $SQL = "UPDATE `sign_up` SET `active`= ? WHERE `sign_up`.`Email`= ?;";
    $array = array();
    $class->sql($Data_communication, $SQL, $array_var);
}
$session->logout("logout");
//===========================================================
$fotter = $Component->fetchObject_SQL($Data_communication, "SELECT * FROM `page_components` where id = 1");
$query = "select * from  follower ORDER BY `follower`.`id` DESC limit 1;";
$array = array();
$rows = $class->sql_feth($Data_communication, $query, $array);
if (count($rows) > 0) :
    foreach ($rows as $value):
        (int) $ids = trim($value['id']);
        $YouTube = $value['YouTube'];
        $Title = $value['Title'];
        $Subtitle = $value['Subtitle'];
        $Explanation = $value['Explanation'];
        $Download = $value['Download'];
        $pic1 = $value['pic1'];
        $pic2 = $value['pic2'];
        $url = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", $YouTube);
    endforeach;
endif;
//=============================================================
$id = 4;
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
                            <h2>تطبيق متابع
                            </h2></br>
                        </div>
                    </div>
                </div>
            </div> 
        </section>
        <!-- ========== Start About Me ========== -->
        <!-- ========== Start About Me ========== -->
        <?php
        require_once './software_components/About_Me.php';
        ?>
        <!-- ========== End About Me ========== -->
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