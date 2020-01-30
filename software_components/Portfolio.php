<section class="portfolio" id="portfolio" style="background: #292929;">
    <div class="container">
        <div class="filter-menu">
            <ul id="control" class="list-filter list-unstyled">
                <li class="active" data-filter="all">الكل</li>
                <?php
                $query = "select * from  sections_explanations ORDER BY `sections_explanations`.`id` DESC ;";
                $array = array();
                $rows = $class->sql_feth($Data_communication, $query, $array);
                if (count($rows) > 0) :
                    foreach ($rows as $value):
                        $id = $value['id'];
                        $name = $value['name'];
                        ?>
                        <li data-filter="<?php echo $id; ?>"><?php echo $name; ?></li>
                        <?php
                    endforeach;
                endif;
                ?>

            </ul>
        </div>
        <div class="portfolio-content">
            <div id="filtr-container" class="row">
                <?php
                $query = "select * from  explanations ORDER BY `explanations`.`id` DESC ;";
                $array = array();
                $rows = $class->sql_feth($Data_communication, $query, $array);
                if (count($rows) > 0) :
                    foreach ($rows as $value):
                        $id = $value['id'];
                        $Department = $value['Department'];
                        $Link = $value['Link'];
                        ?>
                        <div class="col-md-4 col-sm-6 filtr-item" data-category="<?php echo  $Department ; ?>" data-sort="value">
                            <div class="item">
                                <div class="item">
                                    <iframe width="100%" height="300" src="<?php echo  $Link ; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
                                </div>
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