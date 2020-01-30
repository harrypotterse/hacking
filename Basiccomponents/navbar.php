<nav class="navbar navbar-default ">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button class="menu-toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
            <!-- logo -->
            <a class="navbar-brand" href="index.php"><img src="images/ahmed.png" style="width:90px;" /></a>
        </div>
        <!-- Collect the nav links, and other content for toggling -->
        <div class="navbar-links" >
            <!-- links -->
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-brand text-center visible-xs-block"><a href="index.php"><img src="images/ahmed.png" style="width:120px;" /></a></li>
                <li><a  href="index.php"  >الرئيسية</a></li>
                <li><a class="active" href="services.php" >الخدمات</a></li>
                <li><a  href="explains.php">الشروحات</a></li>
                <li><a href="#" >المتجر</a></li>
                <li><a href="blog.php">المدونة</a></li>
                <li><a href="contact.php" >التواصل</a></li>
                <?php
                if (!$session->session_exist__comp('user')):
                    ?>
                    <li><div class="my-btn">
                            <a href="form.php" target="_blank" class="main-btn">سجل معنا</a>
                        </div></li>
                    <?php
                else:
                    ?>
                          <li><div class="my-btn">
                            <a href="mail.php"  class="main-btn">الأشعارات</a>&nbsp;&nbsp;
                        </div></li>
                    <li><div class="my-btn">
                            <a href="?logout"  class="main-btn">تسجيل الخروج</a>&nbsp;&nbsp;
                        </div></li>
                <?php
                endif;
                ?>
            </ul>
        </div>
    </div>
</nav>