<section id="testimonials" class="testimonials">
    <div class="container">
        <div class="main-title">
            <h2>اراء العملاء</h2>
            <span>04.</span>
        </div>
        <div class="row">
            <div class="col-md-12 owl-carousel owl-theme">
                <?php
                $query = "select * from  testimonials ORDER BY `testimonials`.`id` DESC limit 7;";
                $array = array();
                $rows = $class->sql_feth($Data_communication, $query, $array);
                if (count($rows) > 0) :
                    foreach ($rows as $value):
                        $id = $value['id'];
                        $comment = $value['comment'];
                        $Image = $value['Image'];
                        $name = $value['name'];
                        $Function = $value['Function'];
               
                ?>
                <!-- New Item -->
                <div class="testimonial-box">
                    <div class="description">
                        <span class="quote-left"><i class="fa fa-quote-left"></i></span>
                        <span class="quote-right"><i class="fa fa-quote-right"></i></span>
                        <p><?php echo  $comment ; ?></p>
                    </div>
                    <div class="client-pic">
                        <img src="Public/testimonials/<?php echo  $Image ; ?>" alt="client">
                    </div>
                    <div class="client-details">
                        <h6> <?php echo  $name ; ?> </h6>
                        <span><?php echo  $Function ; ?></span>
                    </div>
                </div>
                <?php
                 endforeach;
                endif;    
            ?>
            </div>
        </div>
    </div>
</section>