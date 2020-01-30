<section class="facts" id="facts">
    <div class="overlay"></div>
    <div class="container">
        <div class="main-title">
            <h2>فيديوهات  للخطوات</h2>
        </div>
        <div class="row">
            <?php
            $query = "select * from  facts  where story_id =  ? ;";
            $array = array($id);
            $rows = $class->sql_feth($Data_communication, $query, $array);
            if (count($rows) > 0) :
                foreach ($rows as $value):
                    $id = $value['id'];
                    $youtube = $value['youtube'];
                    $url = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", $youtube);
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
