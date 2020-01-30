<section class="facts">
    <div class="overlay"></div>
    <div class="container">
        <div class="main-title">
            <h2>فيديوهات للشرح</h2>
        </div>
        <div class="row">
            <?php
            $query = "select * from  application_videos  where id_app = ? ;";
            $array = array($id__);
            $rows = $class->sql_feth($Data_communication, $query, $array);
            if (count($rows) > 0) :
                foreach ($rows as $value):
                    $id = $value['id'];
                    $id_app = $value['id_app'];
                    $Video = $value['Video'];
                    $url = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", $Video);
                    ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="fact-item wow fadeInLeft" data-wow-duration="1.7s">
                            <iframe width="100%" height="300" src="<?php echo $url; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>