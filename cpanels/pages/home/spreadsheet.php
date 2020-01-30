<?php require_once './Settings.php'; ?>
<?php require_once '../../../FileConnection/Data_connection.php'; ?>
<?php require_once '../../../FileConnection/Extra_functions.php'; ?>
<?php require_once '../../../Classes/Achieve.php'; ?>
<?php require_once '../../../Classes/Session.php'; ?>
<?php $a = new Achieve(); ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo Page; ?></title>
        
        <?php require_once '../../General_components/css.php'; ?>
        <link href="../../General_files/css/home.css" rel="stylesheet" type="text/css"/>
        <link href="../../General_files/css/home_tow.css" rel="stylesheet" type="text/css"/>
        <link href="../../General_files/css/edit_home.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="skin-blue fixed sidebar-mini">
        <div class="wrapper">
            
            <?php require_once '../../General_components/top_nave.php'; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php require_once '../../General_components/nav.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container">
                          <?php require_once '../../General_files/php/ap_hom.php'; ?>
                </div>
                <div class="content">
                    <?php require_once './php/myCarousel.php'; ?>
                    <?php require_once './php/box.php'; ?>
                      <?php require_once './php/counter_db.php'; ?>
                    <?php require_once './php/timeline.php'; ?>
                    
                      
                    <?php// require_once './php/imgmap.php'; ?>
                  
                      <?php require_once './php/latest_additions.php'; ?>
                
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>

</div><!-- /.content-wrapper -->
<?php require_once '../../General_files/php/del_box.php'; ?>
<?php require_once '../../General_components/fotter.php'; ?> 
</div><!-- ./wrapper -->
<?php require_once '../../General_components/js.php'; ?>
        <script src="../../General_files/js/Shortcuts.js" type="text/javascript"></script>
</body>
</html>
