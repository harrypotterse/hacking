<section class="blog" id="blog" style="margin-bottom:88px;background:#292929;">
    <div class="container">
        <div class="main-title">
            <h2>تطبيقات اخري</h2>
        </div>
        <div class="row">
            <?php
            $query = "select * from  app where  id = ? ";
            $array = array($id_prev);
            $rows = $class->sql_feth($Data_communication, $query, $array);
            if (count($rows) > 0) :
                foreach ($rows as $value):
                    $id = $value['id'];
                    $Title = $value['Title'];
                    $Short_title = $value['Short_title'];
                    $Explanation = function_that_shortens_text_but_doesnt_cutoff_words(strip_tags($value['Explanation']), 250);
                    $image = $value['image'];
                    $Download_it = $value['Download_it'];
                    $Page = password_hash("app", PASSWORD_DEFAULT);
                    ?>
                    <div class="col-md-6">
                        <!-- New Item -->
                        <div class="post wow fadeInLeft" data-wow-duration="1.7s">
                            <!-- Post Image -->
                            <div class="post-img">
                                <img src="Public/app/<?php echo $image; ?>" class="img-responsive" alt="">
                                <div class="post-category">
                                    <a href="single.php?id=<?php echo $id; ?>&Page=<?php echo $Page ?>">التطبيق السابق</a>
                                </div>
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <div class="post-title">
                                    <a href="#"><h4><?php echo $Title; ?></h4></a>
                                </div>

                                <div class="post-text">
                                    <p>
                                        <?php echo $Explanation; ?>
                                    </p>
                                </div>
                                <div class="post-footer">
                                    <a href="single.php?id=<?php echo $id; ?>&Page=<?php echo $Page ?>" class="post-more">للمزيد <i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
            <?php
            $query = "select * from  app where  id = ? ";
            $array = array($id_next);
            $rows = $class->sql_feth($Data_communication, $query, $array);
            if (count($rows) > 0) :
                foreach ($rows as $value):
                    $id = $value['id'];
                    $Title = $value['Title'];
                    $Short_title = $value['Short_title'];
                    $Explanation = function_that_shortens_text_but_doesnt_cutoff_words(strip_tags($value['Explanation']), 250);
                    $image = $value['image'];
                    $Download_it = $value['Download_it'];
                    $Page = password_hash("app", PASSWORD_DEFAULT);
                    ?>
                    <div class="col-md-6">
                        <!-- New Item -->
                        <div class="post wow fadeInRight" data-wow-duration="1.7s">
                            <!-- Post Image -->

                            <div class="post-content">
                                <div class="post-title">
                                    <a href="#"><h4><?php echo $Title; ?></h4></a>
                                </div>

                                <div class="post-text">
                                    <p>
                                        <?php echo $Explanation; ?>
                                    </p>
                                </div>
                                <div class="post-footer">
                                    <a href="single.php?id=<?php echo $id; ?>&Page=<?php echo $Page ?>" class="post-more">للمزيد <i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="post-img2">
                                <img src="images/blog/2.jpg" class="img-responsive" alt="">
                                <div class="post-category">
                                    <a href="single.php?id=<?php echo $id; ?>&Page=<?php echo $Page ?>">التطبيق التالي</a>
                                </div>

                            </div>
                            <!-- Post Content -->

                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>

        </div>
    </div>
</section>