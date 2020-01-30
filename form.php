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
$id=2;
require_once './app/Visits.php';
//================================================================
if (isset($_GET['logout'])) {
    $array_var[] = "Inactive";
    $array_var[] = $user;
    $SQL = "UPDATE `sign_up` SET `active`= ? WHERE `sign_up`.`Email`= ?;";
    $array = array();
    $class->sql($Data_communication, $SQL, $array_var);
}
$session->logout("logout");
//===========================================================
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Title -->
        <title>الهندسة الاجتماعية</title>
        <!-- Favicon --> 
        <link rel="icon" href="images/ahmed2.png">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
        <!-- Meta tag Keywords -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Meta tag Keywords -->
        <!-- css files -->
        <link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/rtl.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/font-awesome.min.css" rel="stylesheet"> <!-- Font-Awesome-Icons-CSS -->
        <!-- css files -->
        <!-- Online-fonts -->
        <!-- //Online-fonts -->
    </head>
    <body>
        <!-- main -->
        <div class="main">
            <canvas id="myCanvas"></canvas>
            <div class="main-w3l">
                <h1 class="logo-w3"><a href="index.php"><img src="images/ahmed.png" style="width:120px;" /></a></h1>
                <?php
                require_once './Additionalcomponents/login.php'; 
                require_once './Additionalcomponents/reg.php';
            ?>
               
                <div class="clear"></div>
                <!-- //main -->
                <!--footer-->
                <div class="footer-w3l">
                    <p>جميع الحقوق محفوظه&copy; 2019 <a href="#" target="_blank"> احمد الكعبي</a></p>
                </div>
                <!--//footer-->
            </div>
        </div>
        <!--scripts--> 
        <!-- js -->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <!-- //js -->
        <!-- particles-JavaScript -->
        <script src="js/particles.min.js"></script>
        <script>
            window.onload = function () {
                Particles.init({
                    selector: '#myCanvas',
                    color: '#eba7a7',
                    connectParticles: true,
                    minDistance: 90
                });
            };
        </script>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="js/jquery.form.js" type="text/javascript"></script>
        <script src="Development/form.js" type="text/javascript"></script>
        <script src="Development/login.js" type="text/javascript"></script>
        <!-- //particles-JavaScript -->
        <!--//scripts--> 
    </body>
</html>