<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">  
            <div class="pull-left image">
                <img src="a.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $session->get_session_data("users"); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-list-ul"></i>
                    <span>أهم الصفحات</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../testimonials/spreadsheet.php"><i class="fa fa-circle-o"></i>اراء العملاء</a></li>
                    <li class="active"><a href="../contact/spreadsheet.php"><i class="fa fa-circle-o"></i> التواصل</a></li>
                    <li class="active"><a href="../blog/spreadsheet.php"><i class="fa fa-circle-o"></i>المدونة</a></li>


                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-home"></i>
                    <span>تطبيق متابع</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../follower/spreadsheet.php"><i class="fa fa-circle-o"></i> تطبيق متابع</a></li>
                    <li><a href="../follower_featuress/spreadsheet.php"><i class="fa fa-circle-o"></i> المميزات</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-home"></i>
                    <span>الشروحات</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../explanations/spreadsheet.php"><i class="fa fa-circle-o"></i> الشروحات</a></li>
                    <li><a href="../sections_explanations/spreadsheet.php"><i class="fa fa-circle-o"></i> اقسام الشروحات</a></li>
                </ul>
            </li>     
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-home"></i>
                    <span>قصة اليوم</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../story/spreadsheet.php"><i class="fa fa-circle-o"></i> قصة اليوم</a></li>
                    <li><a href="../facts/spreadsheet.php"><i class="fa fa-circle-o"></i> اليوتيوب</a></li>
                </ul>
            </li>   
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-home"></i>
                    <span>التطبيقات</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../app/spreadsheet.php"><i class="fa fa-circle-o"></i> التطبيقات</a></li>
                    <li><a href="../application_videos/spreadsheet.php"><i class="fa fa-circle-o"></i> فيديوهات للشرح</a></li>
                    <li><a href="../features/spreadsheet.php"><i class="fa fa-circle-o"></i> مميزات البرنامج</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-home"></i>
                    <span>اشعارات المستخدمين</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../sign_up/spreadsheet.php"><i class="fa fa-circle-o"></i> المستخدمين</a></li>
                    <li><a href="../message/spreadsheet.php"><i class="fa fa-circle-o"></i>الاشعارات</a></li>
                    <li><a href="../sign_up/addition.php"><i class="fa fa-circle-o"></i> اشعارات البريد</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>مكونات الصفحات</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>             
                <ul class="treeview-menu">
                    <li><a href="../Footer/Modify.php"><i class="fa fa-circle-o"></i> الفوتر</a></li>
                    <li><a href="../Contact_page/Modify.php"><i class="fa fa-circle-o"></i> صفحة التواصل</a></li>
                    <li><a href="../services/Modify.php"><i class="fa fa-circle-o"></i> الخدمات</a></li>
                </ul>
            </li>
            <li class="header">LABELS</li>
            <li><a href="../home/spreadsheet.php"><i class="fa fa-circle-o text-aqua"></i> <span>الصفحة الرئسية</span></a></li>
            <li><a href="../latest_additions/spreadsheet.php"><i class="fa fa-circle-o text-red"></i> <span>اخر الاضافات</span></a></li>
            <li><a href="../counter_db/spreadsheet.php"><i class="fa fa-circle-o text-yellow"></i> <span>افضل الصفحات</span></a></li>
            <li><a href="../user_admin/spreadsheet.php"><i class="fa fa-circle-o text-aqua"></i> <span>مستخدمين لوحة التحكم</span></a></li>
            <li><a href="?logout"><i class="fa fa-circle-o text-aqua"></i> <span>تسجيل الخروج</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
