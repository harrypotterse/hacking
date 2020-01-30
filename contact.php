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
$contact = $Component->fetchObject_SQL($Data_communication, "SELECT * FROM `page_components` where id = 2");
//==========================================================
$id=6;
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
                            <h2>التواصل
                            </h2></br>
                        </div>
                    </div>
                </div>
            </div> 
        </section>
        <!-- ========== Start Blog ========== -->
        <!-- ========== Start Contact ========== -->
        <?php require_once './software_components/Contact_pag.php'; ?>
        <!-- ========== End Contact ========== -->
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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="js/jquery.form.js" type="text/javascript"></script>
        <script src="Development/form.js" type="text/javascript"></script>
    </body>
    <!-- Mirrored from anwar-theme.netlify.com/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Sep 2019 19:02:11 GMT -->
</html>