<section class="facts">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="fact-item wow fadeInLeft" data-wow-duration="1.7s">
                    <h4><span class="fact-icon"><i class="fa fa-code"></i></span>عدد الفيديوهات</h4>
                    <span class="fact-number" data-from="0" data-to="
                                              <?php
                    $sql = "select * from  application_videos ";
                    $array_var = array();
                    echo  $explanations = $class->count($Data_communication, $sql, $array_var);
                    ?>
                          " data-speed="2500"></span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="fact-item wow fadeInLeft" data-wow-duration="1.7s">
                    <h4><span class="fact-icon"><i class="fa fa-users"></i></span>عدد التطبيقات</h4>
                    <span class="fact-number" data-from="0" data-to="
                                               <?php
                    $sql = "select * from  app ";
                    $array_var = array();
                    echo  $explanations = $class->count($Data_communication, $sql, $array_var);
                    ?>
                          " data-speed="2500"></span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="fact-item wow fadeInLeft" data-wow-duration="1.7s">
                    <h4><span class="fact-icon"><i class="fa fa-clock-o"></i></span>الدروس والشروحات </h4>
                    <span class="fact-number" data-from="0" data-to="
                                                <?php
                    $sql = "select * from  explanations ";
                    $array_var = array();
                    echo  $explanations = $class->count($Data_communication, $sql, $array_var);
                    ?>
                          " data-speed="2500"></span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="fact-item wow fadeInLeft" data-wow-duration="1.7s">
                    <h4><span class="fact-icon"><i class="fa fa-coffee"></i></span>عدد التدوينات</h4>
                    <span class="fact-number" data-from="0" data-to="
                                                 <?php
                    $sql = "select * from  blog ";
                    $array_var = array();
                    echo  $explanations = $class->count($Data_communication, $sql, $array_var);
                    ?>
                          " data-speed="2500"></span>
                </div>
            </div>
        </div>
    </div>
</section>