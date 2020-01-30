<?php
session_start();
session_regenerate_id(TRUE);
require_once '../../../Classes/Achieve.php';
require_once '../../../FileConnection/Data_connection.php';
$a = new Achieve();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.4 -->
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">
        <style>
          
            b, strong {
                font-weight: 700;
            }
            .login-box {
    width: 507px;
    max-height: 577px;
}
input.form-control {
    height: 54px;
}
span.glyphicon.glyphicon-envelope.form-control-feedback {
    font-size: 21px;
    margin-top: 10px;
    margin-right: 17px;
}
.login-box-body .form-control-feedback, .register-box-body .form-control-feedback {
     font-size: 21px;
    margin-top: 10px;
    margin-right: 17px;
}
.login-box-body {
    background: #631115;
    color: white;
    opacity: 0.9;
}
button.btn.btn-primary.btn-block.btn-flat {
    background: white;
    color: black;
    font-size: 20px;
    font-family: tahoma;
    font-weight: 700;
    text-transform: capitalize;
    width: 344%;
    margin-left: -332px;
}
.login-box-body {
    background: #7d4294;
    color: white;
    opacity: 0.9;
}
        </style>
    </head>
    <body class="login-page" style="/* background: url(hd-4kwallpaper-nature-flower-forest-flowers-ocean-1500661-wallhere.com.jpg) repeat fixed; */background: -webkit-linear-gradient(45deg, #4158d0, #c850c0);background: -o-linear-gradient(45deg, #4158d0, #c850c0);background: -moz-linear-gradient(45deg, #4158d0, #c850c0);background: linear-gradient(45deg, #4158d0, #c850c0);">
        <div class="login-box">
            <div class="login-logo">
                <img src="" alt=""/>

            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="<?php
                $a->form_htmlspecialchars()
                ?>" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="username" placeholder="username">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control"  name="password" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div><!-- /.col -->
                    </div>
                </form>
                <div class="social-auth-links text-center">         
                </div><!-- /.social-auth-links -->
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
        <?php
        if ($a->post()) {
            $username = $_POST['username'];
            $passwords = $_POST['password'];
            $hand = TRUE;
            if (!$a->empty_filed($username)) {
                $hand = false;
            }
            if (!$a->empty_filed($passwords)) {
                $hand = false;
            }
            if ($hand) {       
                $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
                $passwords = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
                //-----------------------------------------------
                $sql = "SELECT * FROM user_admin  WHERE user=? AND  password=? ";
                $query = $Data_communication->prepare($sql);
                $query->execute(array($username, $passwords));
                echo $query->rowCount();
                if ($query->rowCount() >= 1) {
                    $_SESSION['users'] = $username;
                    $_SESSION['time_start_login'] = time();   
                    header("location: ../home/spreadsheet.php");
                    exit();
                } else {
                    
                }
            }
        }
        ?>
        <!-- jQuery 2.1.4 -->
        <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.4 -->
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="../../plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>
