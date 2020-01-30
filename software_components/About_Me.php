<section class="about-me" id="about" style="background:#292929;">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="text-center">
                    <iframe width="100%" height="300" src="<?php echo $url; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
                    <h2>فيديو شرح البرنامج</h2>
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="about-image">
                    <img class="img-responsive" src="<?php echo $pic1; ?>" alt="">
                </div>
                <div class="about-image" style="margin-top:44px;">
                    <img class="img-responsive" src="<?php echo $pic2; ?>" alt="">
                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="about-info">
                    <div class="main-title">
                        <h2>برنامج متابع</h2>
                    </div>
                    <h3><?php echo $Subtitle; ?></h3>
                    <p>
                        <?php echo $Explanation; ?>
                    </p>
                    <div class="personal-info" style="background:#323232;">
                        <h3 style="color:#b6172c">مميزات البرنامج</h3>
                        <?php
                        $query = "select * from  follower_featuress  where follower_id = ?";
                        $array = array($ids);
                        $rows = $class->sql_feth($Data_communication, $query, $array);

                        if (count($rows) > 0) :
                            $a = 0;
                            foreach ($rows as $value):
                                $a++;
                                $id = $value['id'];
                                $follower_id = $value['follower_id'];
                                $Features = $value['Features'];
                                ?>
                                <p><span><?php echo $a; ?></span><?php echo $Features; ?></p>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                    <?php
                    if ($session->session_exist__comp('user')):
                        ?>
                        <a href="<?php echo $Download; ?>" class="main-btn">تحميل البرنامج <i class="fa fa-apple" aria-hidden="true"></i></a>
    <!--                            <a href="#" class="main-btn">تحميل البرنامج <i class="fa fa-google-play" aria-hidden="true"></i></a>-->
                        <?php
                    else:
                        echo "<p><span>من فضلك قم <a href='form.php'>بتسجيل الدخول</a> حتي تتمن من تحميل البرنامج</span></p>";
                    endif;
                    ?>
                </div>
            </div>
        </div> 
    </div>
</section>