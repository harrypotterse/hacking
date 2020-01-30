<div class="content">
    <div class="row">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <?php
                        $sql = "select * from  app ";
                        $array_var = array();
                        $job = $a->count($Data_communication, $sql, $array_var);
                        ?>
                        <h3><?php echo $job; ?></h3>
                        <p>التطبيقات</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <?php
                        $sql = "select * from  blog ";
                        $array_var = array();
                        $cv = $a->count($Data_communication, $sql, $array_var);
                        ?>
                        <h3><?php echo $cv; ?><sup style="font-size: 20px"></sup></h3>
                        <p>التدوينات</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <?php
                        $sql = "select * from  sign_up ";
                        $array_var = array();
                        $registration = $a->count($Data_communication, $sql, $array_var);
                        ?>
                        <h3><?php echo $registration; ?></h3>
                        <p>عدد الاعضاء</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <?php
                        $sql = "select * from  user_admin ";
                        $array_var = array();
                        $user_admin = $a->count($Data_communication, $sql, $array_var);
                        ?>
                        <h3><?php echo $user_admin; ?></h3>
                        <p>مستخدمين لوحة التحكم</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
        </div>
    </div>
</div>