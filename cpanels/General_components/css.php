<?php
require_once '../../../Classes/Session.php';
$session = new Session("../examples/login.php");
$session->logout("logout");
$session->session_exist("users");
$user = $session->get_session_data("users");
if ($session->session_exist("users") == TRUE):
else :
    header("location: ../examples/login.php");
    session_destroy();
    exit();
endif;
$a = new Achieve();
?>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">-->
<!-- Bootstrap 3.3.4 -->
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- jvectormap -->
<link rel="stylesheet" href="../../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->

<link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
<link href="../../General_files/css/navtop.css" rel="stylesheet" type="text/css"/>
<link href="../../General_files/css/nav.css" rel="stylesheet" type="text/css"/>
<link href="../../General_files/css/tabel.css" rel="stylesheet" type="text/css"/>
<link href="../../General_files/css/add.css" rel="stylesheet" type="text/css"/>
<link rel="icon" type="image/png" sizes="32x32" href="cpanel-icon-26.ico">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


