   <section class="about-me" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="about-image">
                            <img class="img-responsive" src="images/logo.gif" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="about-info">
                            <div class="main-title">
                                <h2>اهلا بكم , انا احمد الكعبي</h2>
                                <span>01.</span>
                            </div>
                            <h3>مختص في أمن المعلومات والأمن السيبراني </h3>
                            <p>سيأخذكم الموقع لزيارة عوالم قد تكون معلومة لدى البعض ولكنها مجهولة لدى الأغلبية. </br>
                                سنبحر معاً في عالم امن المعلومات والامن السيبراني لنصل الى المعرفة والقدرة على اكتشاف الثغرات الأمنية وتجنب إستغلالها من قبل الغير مصرح لهم.</br>
                                قد تساعدك المعرفة في حماية نفسك وعائلتك ووطنك من التقنية التي بين يديك.
                            </p>
                            <div class="personal-info">
                                <h3 style="color:#b6172c">سنواكب المستقبل لنبحث عن موقع قدم في
                                    وظائف المستقبل</h3>
                                <p><span>1</span>	أدارة المخاطر الأمنية.</p>
                                <p><span>2</span>	مدقق امن سيبراني</p>
                                <p><span>3</span>	اخصائي امن شبكات</p>
                                <p><span>4</span>	اخصائي توعية امنية</p>
                                <p><span>5</span>	مهندسة منصة الامن السيراني.</p>
                                <p><span>6</span>		محلل الامن السيبراني.</p>
                            </div>
                            <?php
                      if(!$session->session_exist__comp('user')):          
                    ?>
                            <a href="form.php" target="_blank" class="main-btn">هل ستكون معنا؟</a>
                            <?php
                 endif;
                ?>
                        </div>
                    </div>
                </div> 
            </div>
        </section>