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
$fotter = $Component->fetchObject_SQL($Data_communication, "SELECT * FROM `page_components` where id = 1");
$contact = $Component->fetchObject_SQL($Data_communication, "SELECT * FROM `page_components` where id = 2");
//==================================================================================
if (isset($_GET['logout'])) {
    $array_var[] = "Inactive";
    $array_var[] = $user;
    $SQL = "UPDATE `sign_up` SET `active`= ? WHERE `sign_up`.`Email`= ?;";
    $array = array();
    $class->sql($Data_communication, $SQL, $array_var);
}
$session->logout("logout");
//=============================================================
$id = 1;
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
        <section class="home" id="home">
            <div id="particles-js"></div>
            <div class="overlay">
                <div class="container">
                    <div class="intro display-table">
                        <div class="display-table-cell">
                            <h1>مرحبا انا احمد الكعبي</h1>
                            <h3>موقعي الخاص بالشروحات الخاصة
                            </h3></br>
                            <p> الهندسة الأجتماعية  <span></span></p>
                            </br>
                            </br>
                            <?php
                            if (!$session->session_exist__comp('user')):
                                ?>
                                <div class="my-btn">
                                    <a href="form.php" target="_blank" class="main-btn">سجل معنا</a>
                                </div>
                                <?php
                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="arrow">
                        <a href="#about">تعرف علي المزيد</a>
                    </div>
                </div>
            </div> 
        </section>
        <!-- ========== Start About Me ========== -->
        <?php
        require_once './software_components/About_index.php';
        ?>
        <!-- ========== End About Me ========== -->
        <!-- ========== Start Services ========== -->
        <?php require_once './software_components/Services.php'; ?>
        <!-- ========== End Services ========== -->
        <!-- ========== End Resume ========== -->
        <!-- ========== Start Skills ========== -->
        <section class="skills">
        </section>
        <!-- ========== End Skills ========== -->
        <!-- ========== Start Portfolio ========== -->
        <?php //require_once './software_components/Portfolio_index.php'; ?>
        <?php require_once './software_components/Portfolio.php'; ?>
        <!-- ========== End Portfolio ========== -->
        <!-- ========== Start Fun Facts ========== -->
        <?php require_once './software_components/Facts.php'; ?>
        <!-- ========== End Fun Facts ========== -->
        <!-- ========== Start Testimonials ========== -->
        <?php require_once './software_components/Testimonials.php'; ?>
        <!-- ========== End Testimonials ========== -->
        <!-- ========== Start Blog ========== -->
        <?php require_once './software_components/Blog_index.php'; ?>
        <!-- ========== End Blog ========== -->
        <!-- ========== Start Contact ========== -->
        <?php require_once './software_components/Contact_pag.php'; ?>
        <!-- ========== End Contact ========== -->
        <!-- ========== Start Footer ========== -->
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