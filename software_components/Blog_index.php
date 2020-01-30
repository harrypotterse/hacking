<section class="blog" id="blog">
    <div class="container">
        <div class="main-title">
            <h2>المدونة</h2>
            <span>05.</span>
        </div>
        <div class="row">
            <?php
            $query = "select * from  blog ORDER BY `blog`.`id` DESC limit 3;";
            $array = array();
            $rows = $class->sql_feth($Data_communication, $query, $array);
            if (count($rows) > 0) :
                foreach ($rows as $value):
                    $id = $value['id'];
                    $Subject = $value['Subject'];
                    $Date = $value['Date'];
                    $Abstract = $value['Abstract'];
                    $Explanation = $value['Explanation'];
                    $Image = $value['Image'];
                    $Page = password_hash("blog", PASSWORD_DEFAULT);

                    ?>
                    <div class="col-md-12">
                        <!-- New Item -->
                        <div class="post wow fadeInLeft" data-wow-duration="1.7s">
                            <!-- Post Image -->
                            <div class="post-img">
                                <img src="Public/blog/<?php echo  $Image ; ?>" class="img-responsive" alt="">
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <div class="post-title">
                                    <a href="single_blog.php?id=<?php echo $id; ?>&Page=<?php echo $Page ?>"><h4><?php echo  $Subject ; ?></h4></a>
                                </div>
                                <ul class="post-info list-unstyled">
                                    <li>
                                        <i class="fa fa-calendar"></i>
                                        <span><?php echo  $Date ; ?></span>
                                    </li>
                                 
                                </ul>
                                <div class="post-text">
                                    <p>
                                        <?php echo  $Abstract ; ?>
                                    </p>
                                </div>
                                <div class="post-footer">
                                    <a href="single_blog.php?id=<?php echo $id; ?>&Page=<?php echo $Page ?>" class="post-more">للمزيد <i class="fa fa-angle-double-right"></i></a>
                                    <div class="post-category">
                                        <a href="single_blog.php?id=<?php echo $id; ?>&Page=<?php echo $Page ?>" >امن المعلومات</a>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>   

                    <?php
                endforeach;
            endif;
            ?>

        </div>
    </div>
</section>