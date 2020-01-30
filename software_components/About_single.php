<section class="about-me" id="about" style="background:#292929;">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="about-image" style="margin-top:44px;">
                    <img class="img-responsive" src="Public/app/<?php echo $image; ?>" alt="">
                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="about-info">
                    <div class="main-title">
                        <h2>شرح البرنامج</h2>
                    </div>
                    <h3><?php echo $Short_title; ?></h3>
                    <p><?php echo $Explanation; ?>
                    </p>
                    <div class="personal-info" style="background:#323232;">
                        <h3 style="color:#b6172c">مميزات البرنامج</h3>
                        <?php
                        $query = "select * from  features  where  Apps = ? ;";
                        $array = array($array[0]);
                        $rows = $class->sql_feth($Data_communication, $query, $array);
                        if (count($rows) > 0) :
                            $num = 0;
                            foreach ($rows as $value):
                                $num ++;
                                $id = $value['id'];
                                $Features = $value['Features'];
                                $Apps = $value['Apps'];
                                ?>
                                <p><span><?php echo $num; ?></span>	<?php echo $Features; ?></p>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                    <?php
                   if($session->session_exist__comp('user')): 
                        ?>
                    <a href="<?php echo  $Download_it ; ?>" class="main-btn"><?php echo $btn; ?> </a>
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