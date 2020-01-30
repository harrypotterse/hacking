<?php
$query = "select * from  app ORDER BY `app`.`id` DESC limit 1;";
$array = array();
$rows = $class->sql_feth($Data_communication, $query, $array);
if (count($rows) > 0) :
    foreach ($rows as $value):
        $id = $value['id'];
        $Title = $value['Title'];
        $Short_title = $value['Short_title'];
        $Explanation = $value['Explanation'];
        $image = $value['image'];
        $Download_it = $value['Download_it'];
        $Page = password_hash("app", PASSWORD_DEFAULT);
        ?>

        <section class="about-me" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="text-center">
                            <img class="img-responsive" src="Public/app/<?php echo $image; ?>" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="about-info">
                            <div class="main-title">
                                <h2><?php echo $Title; ?></h2>
                            </div>
                            <h3><?php echo $Short_title; ?></h3>
                            <p><?php echo $Explanation; ?>

                            </p>
                            <a href="single.php?id=<?php echo $id; ?>&Page=<?php echo $Page ?>" class="main-btn">لمعرفه البرامج</a>
                        </div>
                    </div>
                </div> 
            </div>
        </section>
        <?php
    endforeach;
endif;
?>